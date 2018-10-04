<?php

namespace AppBundle\Services;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;
use AppBundle\Entity\Habitante;
use AppBundle\Entity\Auditoria;
use AppBundle\Entity\Vivienda;
use AppBundle\Entity\User;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ErroldaService
 *
 * @author ibilbao
 */
class ErroldaService {
    
    private $em = null;
    
    public function __construct(EntityManager $em) {
        $this->em = $em;
    }
    
    public function erroldaKolektiboa (Request $request, Habitante $habitante, User $user) {
	$zertarako = $request->query->get('zertarako');
	$numDocumento = $habitante->getNumDocumento();
	$em = $this->em;
	$claveVivienda = $habitante->getClaveVivienda();
	$bilaketa = ['municipio' => '003', 'claveVivienda' => $claveVivienda];
	$habitantes = $em->getRepository('AppBundle:Habitante')->findHabitantesActuales($bilaketa);
	$habitantesTotales = count($habitantes);
	$habitantes = $this->__eliminarHabitantesMayoresEdadMenosTitular($habitantes, $habitante);
	$vivienda = $em->getRepository('AppBundle:Vivienda')->findOneBy($bilaketa);
	$bilaketa = ['municipio' => $vivienda->getMunicipio(),'entidad' => $vivienda->getEntidad()]; // AMOREBIETA
	$entidadesActivas = $em->getRepository('AppBundle:Entidad')->findAllActive($bilaketa);
	$entidad = $entidadesActivas[0];
	$movimientos_parciales = [];
	foreach ($habitantes as $habitante) {
	    $bilaketa = ['claveInicialHabitante' => $habitante->getClaveInicialHabitante()];
	    $movimientos_parciales[] = $em->getRepository('AppBundle:Variacion')->findUltimoCambioDomicilio($habitante);
	}
	$auditoria = $this->guardarRegistroAuditoria('colectivo',$numDocumento,$zertarako, null, $user);
	$emaitza = ['entidad' => $entidad,
	    'vivienda' => $vivienda,
	    'habitantes' => $habitantes,
	    'habitantesTotales' => $habitantesTotales,
	    'auditoria' => $auditoria,
	    'variacionesVivienda' => $movimientos_parciales,
	];
	return $emaitza;
    }

    public function erroldaAdingabekoak (Request $request, Habitante $habitante, User $user) {
	$zertarako = $request->query->get('zertarako');
	$em = $this->em;
	$claveVivienda = $habitante->getClaveVivienda();
	$bilaketa = ['municipio' => '003', 'claveVivienda' => $claveVivienda];
	$habitantes = $em->getRepository('AppBundle:Habitante')->findHabitantesActuales($bilaketa);
//	dump($habitante, $habitantes);die;
	$menores = $this->__eliminarHabitantesMayoresEdad($habitantes);
	$vivienda = $em->getRepository('AppBundle:Vivienda')->findOneBy($bilaketa);
	$movimientos_parciales = [];
	foreach ($menores as $menor) {
	    $bilaketa = ['claveInicialHabitante' => $menor->getClaveInicialHabitante()];
	    $movimientos_parciales[] = $em->getRepository('AppBundle:Variacion')->findUltimaVariacionHabitante($menor);
	}
	$auditoria = $this->guardarRegistroAuditoria('menores',$habitante->getNumDocumento(),$zertarako, null,  $user);
	$emaitza = [
	    'vivienda' => $vivienda,
	    'menores' => $menores,
	    'auditoria' => $auditoria,
	    'variacionesVivienda' => $movimientos_parciales,
	];
	return $emaitza;
    }

    public function erroldaBanakoa (Request $request, Habitante $habitante, User $user){
	$parametros = $request->query->all();
	$em = $this->em;
	$zertarako = null;
	if (array_key_exists('zertarako', $parametros) ) {
	    $zertarako = $parametros['zertarako'];
	}
	$claveVivienda = $habitante->getClaveVivienda();
	$bilaketa = [
	    'claveVivienda' => $claveVivienda,
	    'claveInicialHabitante' => $habitante->getClaveInicialHabitante(),
	];
	$ultimaVariacion = $em->getRepository('AppBundle:Variacion')->findUltimaVariacion($bilaketa);
	$vivienda = $em->getRepository('AppBundle:Vivienda')->findOneBy(['claveVivienda' => $claveVivienda]);
	$auditoria = $this->guardarRegistroAuditoria('individual',$habitante->getNumDocumento(),$zertarako, null, $user);
	$emaitza = [
	    'variacion' => $ultimaVariacion,
	    'vivienda' => $vivienda,
	    'habitante' => $habitante,
	    'auditoria' => $auditoria,
	];
//	dump($emaitza);die;
	return $emaitza;
    }

    public function erroldaMugimenduak (Request $request, $habitantes, $numDocumento, User $user){
	$parametros = $request->query->all();
	$em = $this->em;
	$zertarako = null;
	if (array_key_exists('zertarako', $parametros) ) {
	    $zertarako = $parametros['zertarako'];
	}
	foreach ($habitantes as $habitante) {
	    $bilaketa = ['claveInicialHabitante' => $habitante->getClaveInicialHabitante()];
	    $movimientos_parciales[] = $em->getRepository('AppBundle:Variacion')->findVariaciones($bilaketa);
	}
	$movimientos = $this->combinarMovimientosParciales($movimientos_parciales);
	$domicilios = [];
	$i = 1;
	foreach ( $movimientos as $movimiento ){
	    $claveDomicilioDestino = $movimiento->getClaveActual();
	    $vivienda = $em->getRepository('AppBundle:Vivienda')->findVivienda($claveDomicilioDestino);
	    $domicilios[$i] = $vivienda;
	    $i = $i +1;
	}
	$auditoria = $this->guardarRegistroAuditoria('movimientos',$numDocumento,$zertarako, null, $user);
	$emaitza = [
	    'movimientos' => $movimientos,
	    'domicilios' => $domicilios,
	    'habitante' => $habitante,
	    'auditoria' => $auditoria,
	    ];
	return $emaitza;
    }
    
    public function listAction (Request $request, Array $consulta_habitante, User $user) {
	$em = $this->em;
	$habitantes = $em->getRepository(Habitante::class)->findHabitantes($consulta_habitante);
	$viviendas = [];
	foreach ( $habitantes as $habitante) {
	    $vivienda = $em->getRepository(Vivienda::class)->findOneBy(['claveVivienda' => $habitante->getClaveVivienda()]);
	    $viviendas[] = $vivienda;
	}
	$auditoria = $this->guardarRegistroAuditoria('consulta',null,null,$consulta_habitante, $user);
	$emaitza = [
	    'habitantes' => $habitantes,
	    'viviendas' => $viviendas,
	    'auditoria' => $auditoria,
	];
	return $emaitza;
    }

    private function guardarRegistroAuditoria ($tipo, $dni = null, $motivo = null, $consulta_habitantes = null, User $user ) {
//	$this->em = $this->getDoctrine()->getManager();
	$auditoria = new Auditoria();
	$auditoria->setFecha(new \DateTime());
	$auditoria->setTipo($tipo);
	$auditoria->setDni($dni);
	$auditoria->setMotivo($motivo);
	if ($consulta_habitantes != null && array_key_exists("nombre",$consulta_habitantes))
	    $auditoria->setNombre($consulta_habitantes['nombre']);
	if ($consulta_habitantes != null && array_key_exists("apellido1",$consulta_habitantes))
	    $auditoria->setApellido1($consulta_habitantes['apellido1']);
	if ($consulta_habitantes != null && array_key_exists("apellido2",$consulta_habitantes))
	    $auditoria->setApellido1($consulta_habitantes['apellido2']);
	$auditoria->setUsuario($user);
	$this->em->persist($auditoria);
	$this->em->flush();
	return $auditoria;
    }

    private function combinarMovimientosParciales ($movimientos_parciales){
	foreach ($movimientos_parciales as $clave => $valor) {
	    foreach ($valor as $clave2 => $valor2) {
		$movimientos[] = $valor2;
	    }
	}
	return $movimientos;
    }
    
    /* Elimina todos los mayores de edad menos el titular que conviven en la misma vivienda
     * 
     * 
     * @return habitantes
     */
    
    private function __eliminarHabitantesMayoresEdadMenosTitular (Array $habitantes, Habitante $titular){
	$habitantesFiltrados = [];
	foreach ($habitantes as $habitante) {
	    if ($habitante->getNumDocumento() !== $titular->getNumDocumento()) {
		$edad = $this->__calcularEdad($habitante);
		if ($edad != null && $edad <= 17 ) {
		    $habitantesFiltrados[] = $habitante;
		}
	    } else {
		$habitantesFiltrados[] = $habitante;
	    }
	}
	return $habitantesFiltrados;
    }

    private function __eliminarHabitantesMayoresEdad (Array $habitantes){
	$habitantesFiltrados = [];
	foreach ($habitantes as $habitante) {
		$edad = $this->__calcularEdad($habitante);
		if ($edad != null && $edad <= 17 ) {
		    $habitantesFiltrados[] = $habitante;
		}
	}
	return $habitantesFiltrados;
    }

    private function __calcularEdad (Habitante $habitante){
	$hoy = new \DateTime();
	$edadHabitante = null;
	if ($habitante->getFechaNacimiento() !== null) {
	    $fechaNacimiento = \DateTime::createFromFormat('Ymd H:i:s', $habitante->getFechaNacimiento(). " 00:00:00");
	    $edadHabitante = date_diff($hoy, $fechaNacimiento);
	}
	return $edadHabitante->format("%y");
    }
}
