<?php

namespace AppBundle\Services;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;
use AppBundle\Entity\Habitante;
use AppBundle\Entity\Auditoria;

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
    
    public function erroldaKolektiboa (Request $request, Habitante $habitante) {
	$zertarako = $request->query->get('zertarako');
	$em = $this->em;

	$bilaketa = ['municipio' => '003','entidad' => '0002']; // AMOREBIETA
	$entidadesActivas = $em->getRepository('AppBundle:Entidad')->findAllActive($bilaketa);
	$entidad = $entidadesActivas[0];

	$ultimaVariacion = $em->getRepository('AppBundle:Variacion')->findUltimaVariacionHabitante($habitante);
	$claveVivienda = $habitante->getClaveVivienda();
	$bilaketa = ['claveVivienda' => $claveVivienda];
	$habitantes = $em->getRepository('AppBundle:Habitante')->findHabitantesActuales($bilaketa);
	$movimientos_parciales = [];
	foreach ($habitantes as $habitante) {
	    $bilaketa = ['claveInicialHabitante' => $habitante->getClaveInicialHabitante()];
	    $movimientos_parciales[] = $em->getRepository('AppBundle:Variacion')->findUltimoCambioDomicilio($habitante);
	}
//	dump($habitantes, $movimientos_parciales);die;
	$auditoria = $this->guardarRegistroAuditoria('colectivo',$habitante->getNumDocumento(),$zertarako);
	$emaitza = ['entidad' => $entidad,
	    'variacion' => $ultimaVariacion,
	    'habitantes' => $habitantes,
	    'auditoria' => $auditoria,
	    'variacionesVivienda' => $movimientos_parciales,

	];
	return $emaitza;
    }

    public function erroldaBanakoa (Request $request, Habitante $habitante){
	$parametros = $request->query->all();
	$em = $this->em;
	$zertarako = null;
	if (array_key_exists('zertarako', $parametros) ) {
	    $zertarako = $parametros['zertarako'];
	}
	$bilaketa = ['municipio' => '003','entidad' => '0002']; // AMOREBIETA
	$entidadesActivas = $em->getRepository('AppBundle:Entidad')->findAllActive($bilaketa);
	$entidad = $entidadesActivas[0];
	$claveVivienda = $habitante->getClaveVivienda();
	$bilaketa = ['claveVivienda' => $claveVivienda];
	$ultimaVariacion = $em->getRepository('AppBundle:Variacion')->findUltimaVariacion($bilaketa);
	$auditoria = $this->guardarRegistroAuditoria('individual',$habitante->getNumDocumento(),$zertarako);
	$emaitza = ['entidad' => $entidad,
	    'variacion' => $ultimaVariacion,
	    'habitante' => $habitante,
	    'auditoria' => $auditoria,
	];
	return $emaitza;
    }

    public function erroldaMugimenduak (Request $request, $habitantes, $numDocumento){
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
	$auditoria = $this->guardarRegistroAuditoria('movimientos',$numDocumento,$zertarako);
	$emaitza = [
	    'movimientos' => $movimientos,
	    'domicilios' => $domicilios,
	    'habitante' => $habitante,
	    'auditoria' => $auditoria,
	    ];
	return $emaitza;
    }

    private function guardarRegistroAuditoria ($tipo, $dni, $motivo = null) {
//	$this->em = $this->getDoctrine()->getManager();
	$auditoria = new Auditoria();
	$auditoria->setFecha(new \DateTime());
	$auditoria->setTipo($tipo);
	$auditoria->setDni($dni);
	$auditoria->setMotivo($motivo);
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
}
