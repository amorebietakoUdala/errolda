<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Services;

use AppBundle\Services\NISAE\Atributos;
use AppBundle\Services\NISAE\Solicitudes;
use AppBundle\Services\NISAE\SolicitudTransmision;
use AppBundle\Services\NISAE\DatosGenericos;
use AppBundle\Services\NISAE\DatosEspecificos;
use AppBundle\Services\NISAE\DatosEntradaPadron;
use AppBundle\Services\NISAE\DatosTraza;
use AppBundle\Services\NISAE\DatosConsulta;
use AppBundle\Services\NISAE\DatosSalidaPadron;
use AppBundle\Services\NISAE\Emisor;
use AppBundle\Services\NISAE\Solicitante;
use AppBundle\Services\NISAE\Titular;
use AppBundle\Services\NISAE\Transmision;
use AppBundle\Services\NISAE\Transmisiones;
use AppBundle\Services\NISAE\TransmisionDatos;
use AppBundle\Services\NISAE\Retorno;
use AppBundle\Services\NISAE\Estado;
use AppBundle\Services\NISAE\EstadoResultado;
use AppBundle\Services\NISAE\Habitantes;
use AppBundle\Services\NISAE\Habitante as HabitanteNISAE;
use AppBundle\Services\NISAE\DomicilioPadron;
use AppBundle\Entity\Habitante;
use AppBundle\Entity\Vivienda;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\Utils\Balidazioak;

class SoapErroldaService
{

    private $em = null;
    
    public function __construct(EntityManager $em) {
        $this->em = $em;
    }
    
    const ESTADOS = [
    '0001' => 'PENDIENTE',
    '0003' => 'BackOfficeV2-Petición procesa correctamente',
    '0254' => 'No se ha aportado la información mínima necesaria para tramitar la petición.',
    '0314' => 'El código de procedimiento recibido no tiene autorización para este servicio.',
    '0401' => 'La estructura del fichero recibido no corresponde con el esquema.'
    ];

    const ESTADOS_RESULTADO = [
	'0000' => 'Uno o varios datos obligatorios no han sido informados correctamente [].',
	'S' => 'Sí se han encontrado Habitantes.',
	'N' => 'No se han encontrado Habitantes.',
	'E' => 'Existen incidencias.',
    ];

    const MOTIVOS = [
	'00' => 'Tipo de documento incorrecto.',
	'01' => 'Formato de DNI/NIE incorrecto.',
	'02' => 'Formato de Fecha erróneo.',
	'03' => 'Faltan datos obligatorios.',
	'04' => 'Error en Base de datos del servicio.',
	'05' => 'Error interno del servicio.',
	'99' => 'Error general o desconocido.',
    ];

    const TERRITORIO = '48';
    const MUNICIPIO = '003';

    const TERRITORIOS= [ 
	'48' => 'Bizkaia',
	'20' => 'Gipuzkoa',
	'01' => 'Álava/Araba'
	];
    const MUNICIPIOS=[
	'059' => 'Vitoria-Gasteiz',
	'001' => 'Abaltzisketa',
	'004' => 'Albiztur',
	'005' => 'Alegia',
	'008' => 'Amezketa',
	'009' => 'Andoain',
	'010' => 'Anoeta',
	'012' => 'Arama',
	'013' => 'Aretxabaleta',
	'015' => 'Ataun',
	'016' => 'Aia',
	'017' => 'Azkoitia',
	'018' => 'Azpeitia',
	'019' => 'Beasain',
	'020' => 'Beizama',
	'023' => 'Berrobi',
	'024' => 'Bidania-Goiatz',
	'025' => 'Zegama',
	'027' => 'Zestoa',
	'029' => 'Deba',
	'034' => 'Eskoriatza',
	'040' => 'Hernani',
	'045' => 'Irun',
	'047' => 'Itsasondo',
	'048' => 'Larraul',
	'052' => 'Legorreta',
	'053' => 'Lezo',
	'054' => 'Lizartza',
	'055' => 'Arrasate/Mondragón',
	'064' => 'Pasaia',
	'065' => 'Soraluze',
	'067' => 'Errenteria',
	'069' => 'Donostia/San Sebastián',
	'071' => 'Tolosa',
	'074' => 'Bergara',
	'077' => 'Urretxu',
	'079' => 'Zarautz',
	'080' => 'Zumarraga',
	'081' => 'Zumaia',
	'901' => 'Mendaro',
	'902' => 'Lasarte-Oria',
	'903' => 'Astigarraga',
	'904' => 'Baliarrain',
	'013' => 'Barakaldo',
	'015' => 'Basauri',
	'020' => 'Bilbo/Bilbao',
	'003' => 'Amorebieta-Etxano',
    ];

    public function peticionSincrona($peticion) {
	$data = json_decode(json_encode($peticion), true);

	$datosEntradaPadron = $data['Solicitudes']['SolicitudTransmision']['DatosEspecificos']['Consulta']['DatosEntradaPadron'];
	$datosConsulta = $data['Solicitudes']['SolicitudTransmision']['DatosEspecificos']['Consulta']['DatosConsulta'];
	$numDocumento = isset($datosEntradaPadron['NumDocumento']) ? $datosEntradaPadron['NumDocumento'] : null;
	$tipoDocumento = isset($datosEntradaPadron['NumDocumento']) ? $datosEntradaPadron['TipoDocumento'] : null;
	$habitantes = null;
	$criteria = null;
	
	$territorio = $datosConsulta['Territorio'];
	$municipio = $datosConsulta['Municipio'];
	
	// Si la consulta no es de amorebieta-etxano error
	if ($territorio !== '48' || $municipio !== '003' ) {
	    // Si la petición llega al ayuntamiento incorrecto qué respuesta enviamos?
	}
	
	if ( $numDocumento != null && $numDocumento != '000000000' ) {
	    if ( $tipoDocumento != 'Otros' ) {
		$numDocumentoSinLetra = substr($numDocumento, 0, -1);
		$criteria = [ 'numDocumento' => $numDocumentoSinLetra ];
	    } else {
		$criteria = [ 'numDocumento' => $numDocumento ];
	    }
	    $habitantes = $this->em->getRepository('AppBundle:Habitante')->findHabitantes($criteria);
	}
	if ( $numDocumento == '000000000' || $numDocumento == null ) {
	    $criteria = $this->__generateQueryFilters($datosEntradaPadron);
	    unset($criteria['numDocumento']);
	    unset($criteria['tipoDocumento']);
	    $criteria = $this->__remove_blank_filters($criteria);
	    $habitantes = $this->em->getRepository('AppBundle:Habitante')->findHabitantes($criteria);
	}
//	dump($criteria,$habitantes);die;
	$atributos = $data['Atributos'];
	$datosGenericos = $this->__generateDatosGenericos($data);
	$fecha_certificado = $this->__getFechaParaTraza();
	$datosTraza = new DatosTraza($atributos['IdPeticion'].$fecha_certificado,$atributos['IdPeticion'],date('c'));
	$datosConsulta = new DatosConsulta(self::TERRITORIOS[self::TERRITORIO], self::MUNICIPIOS[self::MUNICIPIO]);

	$habitantesArray = [];
	$i=0;
	if ( $habitantes != null && !empty($habitantes)) {
	    foreach ($habitantes as $habitante) {
		$vivienda = $this->em->getRepository('AppBundle:Vivienda')->findOneBy(['claveVivienda' => $habitante->getClaveVivienda()]);
		$habitantesArray[$i]['habitante'] = $habitante;
		$habitantesArray[$i]['vivienda'] = $vivienda;
		$i++;
	    }
	    $datosSalidaPadron2 = $this->__generateDatosSalidaPadronHabitantes($habitantesArray);
	    $estadoResultado = new EstadoResultado('S', self::ESTADOS_RESULTADO['S'], null);
	    $datosEspecificos = $this->__generateDatosEspecificos($datosTraza,$datosConsulta,$estadoResultado,$datosSalidaPadron2);
	    $transmisionDatos = new TransmisionDatos($datosGenericos, $datosEspecificos);
	    $trasmisiones = new Transmisiones($transmisionDatos);
	    $estado = new Estado('0003', null, self::ESTADOS['0003'],null);
	    $atributos_response = new Atributos($atributos['IdPeticion'], $atributos['NumElementos'], date('c'), $estado, $atributos['CodigoCertificado']);
	}
	else {
	    $estadoResultado = new EstadoResultado('N', self::ESTADOS_RESULTADO['N'], null);
	    $datosEspecificos = $this->__generateDatosEspecificos($datosTraza,$datosConsulta,$estadoResultado,null);
	    $transmisionDatos = new TransmisionDatos($datosGenericos, $datosEspecificos);
	    $trasmisiones = new Transmisiones($transmisionDatos);
	    $estado = new Estado('0003', null, self::ESTADOS['0003'],null);
	    $atributos_response = new Atributos($atributos['IdPeticion'], $atributos['NumElementos'], date('c'), $estado, $atributos['CodigoCertificado']);
	}
	$response = [
	    'Atributos' => $atributos_response,
	    'Transmisiones' => $trasmisiones,
	    ];
	return $response;
    }

    public function peticionSincronaNoSOAP(Request $request) {
	$numDocumento = $request->query->get('numDocumento');
	$tipoDocumento = $request->query->get('tipoDocumento');
	if ( $numDocumento != null && $numDocumento != '000000000' ) {
	    if ( $tipoDocumento != 'Otros') {
		$numDocumentoSinLetra = substr($numDocumento, 0, -1);
		$criteria = [ 'numDocumento' => $numDocumentoSinLetra ];
	    } else {
		$criteria = [ 'numDocumento' => $numDocumento ];
	    }
	} else {
	    $criteria = $request->query->all();
	    unset($criteria['numDocumento']);
	    unset($criteria['tipoDocumento']);
	    $criteria = $this->__remove_blank_filters($criteria);
	}

	$habitantes = $this->em->getRepository('AppBundle:Habitante')->findHabitantes($criteria);
//	dump($habitantes);die;
	$habitantesNISAE = [];
	$i=0;
	if ( $habitantes != null && !empty($habitantes)) {
	    foreach ($habitantes as $habitante) {
		$vivienda = $this->em->getRepository('AppBundle:Vivienda')->findOneBy(['claveVivienda' => $habitante->getClaveVivienda()]);
		$habitantesNISAE[$i]['habitante'] = $habitante;
		$habitantesNISAE[$i]['vivienda'] = $vivienda;
		$i++;
	    }
	    //dump($habitantesNISAE);die;
	}
	$habitantesNISAE2 = $this->__generateDatosSalidaPadronHabitantes($habitantesNISAE);
	
	return $habitantesNISAE2;
    }

    
    private function __getFechaParaTraza() {
	$t = microtime(true);
	$micro = sprintf("%03d",($t - floor($t)) * 1000000);
	$date = new \DateTime(date('Y-m-d H:i:s.'.$micro, $t));
	$fecha_certificado = $date->format('Ymdhis').substr($date->format('u'),1,3).'T0';
	return $fecha_certificado;
    }

    private function __generateDatosSalidaPadronHabitantes (Array $habitantesArray) {
	$habitantesNISAE = [];
	foreach ( $habitantesArray as $elemento ) {
	    $habitante = $elemento['habitante'];
	    $vivienda = $elemento['vivienda'];
	    $habitantesNISAE[] = $this->__parseHabitante($habitante,$vivienda);
	}
	$habitantes = new Habitantes($habitantesNISAE);
	$datosSalidaPadron = new DatosSalidaPadron($habitantes);
	return $datosSalidaPadron;
    }

    private function __generateDatosSalidaPadron (Habitante $habitante, Vivienda $vivienda) {
	$habitanteNISAE = $this->__parseHabitante($habitante,$vivienda);
	$habitantes = new Habitantes($habitanteNISAE);
	$datosSalidaPadron = new DatosSalidaPadron($habitantes);
	return $datosSalidaPadron;
    }

    private function __generateDatosGenericos($data) {
	$atributos = $data["Atributos"];
	$emisor = new Emisor('P00000000','EAEko Udalak – Ayuntamientos CAPV.');
	$solicitante = $data["Solicitudes"]["SolicitudTransmision"]["DatosGenericos"]["Solicitante"];
	$titular = $data["Solicitudes"]["SolicitudTransmision"]["DatosGenericos"]["Titular"];
	$transmision = new Transmision($atributos['CodigoCertificado'], $atributos['IdPeticion'], $atributos['IdPeticion'].'TR', date('c'));
	$datosGenericos = new DatosGenericos($emisor,$solicitante,$titular,$transmision);
	return $datosGenericos;
    }

    private function __generateDatosEspecificos($datosTraza,$datosConsulta,$estadoResultado,$datosSalidaPadron) {
	$retorno = new Retorno($datosTraza, $datosConsulta, $estadoResultado, $datosSalidaPadron);
	$datosEspecificos = new DatosEspecificos(null, $retorno);
	return $datosEspecificos;
    }
    
    private function __obtenerTipoDocumento($numdocumento) {
	$tipoDoc=Balidazioak::valida_nif_cif_nie($numdocumento);
	$tipos = [
	    1 => 'DNI', 
	    2 => 'CIF', 
	    3 => 'NIE'
	];
	if ($tipoDoc < 0 ) {
	    $tipo = 'Otros';
	} else {
	    $tipo = $tipos[$tipoDoc];
	}
	return $tipo;
    }

    private function __parseHabitante(Habitante $habitante, Vivienda $vivienda=null) {
	$habitanteNISAE = new HabitanteNISAE();
	$tipo=$this->__obtenerTipoDocumento($habitante->getNumDocumento().$habitante->getClaveDocumento());
	$habitanteNISAE->setTipoDocumento($tipo);
	$habitanteNISAE->setNumDocumento($habitante->getNumDocumento().$habitante->getClaveDocumento());
	$habitanteNISAE->setNombre($habitante->getNombre());
	$habitanteNISAE->setApellido1($habitante->getApellido1());
	$habitanteNISAE->setApellido2($habitante->getApellido2());
	$habitanteNISAE->setFechaNacimiento($habitante->getFechaNacimiento());
	$habitanteNISAE->setCodigoPaisNacimiento($habitante->getPaisNacionalidadExtranjera()->getId());
	$habitanteNISAE->setNombrePaisNacimiento($habitante->getPaisNacionalidadExtranjera());
	$habitanteNISAE->setCodigoProvinciaNacimiento($habitante->getProvinciaNacimiento()->getId());
	$habitanteNISAE->setNombreProvinciaNacimiento($habitante->getProvinciaNacimiento());
	$habitanteNISAE->setCodigoMunicipioNacimiento($habitante->getMunicipioNacimiento());
	$habitanteNISAE->setNombreMunicipioNacimiento($habitante->getLiteralMunicipioNacimiento());
	$habitanteNISAE->setSexo($habitante->getSexo());
	if (trim($habitante->getFechaAlta()) != '')
	    $habitanteNISAE->setFechaAltaPadron($habitante->getFechaAlta());
	else 
	    $habitanteNISAE->setFechaAltaPadron($habitante->getFechaNacimiento());
	$domicilioPadron = $this->__parseVivienda($vivienda);
	$habitanteNISAE->setDomicilioPadron($domicilioPadron);
	
	return $habitanteNISAE;
    }
    
    private function __parseVivienda (Vivienda $vivienda) {
//	dump($vivienda);die;
	$domicilioPadron = new DomicilioPadron();
	$domicilioPadron->setCodigoProvinciaResidencia(self::TERRITORIO);
	$provincia = $this->em->getRepository('AppBundle:Provincia')->findOneById('48');
	$domicilioPadron->setCodigoProvinciaResidencia($provincia->getId());
	$domicilioPadron->setNombreProvinciaResidencia($provincia->getDescripcionCas());
	$municipio = $this->em->getRepository('AppBundle:Municipio')->findOneBy([
		    'provincia' => self::TERRITORIO,
		    'claveMunicipio' => $vivienda->getMunicipio(),
		]);
	$domicilioPadron->setCodigoMunicipioResidencia($municipio->getClaveMunicipio());
	$domicilioPadron->setNombreMunicipioResidencia($municipio->getDescripcionCas());
	$domicilioPadron->setCodigoViaCalle($vivienda->getCalle()->getId());
	$domicilioPadron->setNombreViaCastellano($vivienda->getCalle()->getDescripcion());
	$domicilioPadron->setNombreViaEuskera($vivienda->getCalle()->getDescripcion());
	$domicilioPadron->setBloque($vivienda->getBloque());
	$domicilioPadron->setPortal($vivienda->getPortal());
	$domicilioPadron->setBis($vivienda->getBis());
	$domicilioPadron->setEscalera($vivienda->getEscalera());
	$domicilioPadron->setPlanta($vivienda->getPiso());
	$domicilioPadron->setPuerta($vivienda->getMano());
	$domicilioPadron->setCodigoPostal($vivienda->getCodigoPostal());
	return $domicilioPadron;
    }
    
    private function __generateQueryFilters ($datosEntradaPadron) {
	$tipoDocumento = isset($datosEntradaPadron['TipoDocumento']) ? $datosEntradaPadron['TipoDocumento'] : null;
	$numDocumento = isset($datosEntradaPadron['NumDocumento']) ? $datosEntradaPadron['NumDocumento'] : null;
//	$claveDocumento = substr($numDocumento, -1);
	if ( $tipoDocumento != null && $tipoDocumento !== 'Otros' ) {
	    $numDocumento = substr($numDocumento, 0, -1);
	}
	$nombre = isset($datosEntradaPadron['Nombre']) ? $datosEntradaPadron['Nombre'] : null;
	$apellido1 = isset($datosEntradaPadron['Apellido1']) ? $datosEntradaPadron['Apellido1'] : null;
	$apellido2 = isset($datosEntradaPadron['Apellido2']) ? $datosEntradaPadron['Apellido2'] : null;
	$fechaNacimiento = isset($datosEntradaPadron['FechaNacimiento']) ? $datosEntradaPadron['FechaNacimiento'] : null;
	$bilaketa = [
	    'numDocumento' => $numDocumento,
	    'nombre' => $nombre,
	    'apellido1' => $apellido1,
	    'apellido2' => $apellido2,
	    'fechaNacimiento' => $fechaNacimiento,
	];
	return $bilaketa;
    }
    
    
        private function __remove_blank_filters ($criteria) {
	$new_criteria = [];
	foreach ($criteria as $key => $value) {
	    if (!empty($value))
		$new_criteria[$key] = $value;
	}
	return $new_criteria;
    }
}