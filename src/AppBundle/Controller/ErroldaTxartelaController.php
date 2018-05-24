<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Habitante;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Auditoria;
use AppBundle\Utilities\MYPDF;

/**
 * Description of ErroldaTxartelaController
 *
 * @author ibilbao

/**
* @Route("/errolda-txartela")
*/
class ErroldaTxartelaController extends Controller {

    /**
     * @Route("/kolektiboa/{numDocumento}", name="errolda_kolektiboa"))
     */
    public function erroldaKoletiboaAction (Request $request, $numDocumento){
	$this->get('logger')->debug('ErroldaTxartelaController->erroldaKoletiboaAction->numDocumento->'.$numDocumento);
	$parametros = $request->query->all();
	$zertarako = null;
	if (array_key_exists('zertarako', $parametros) ) {
	    $zertarako = $parametros['zertarako'];
	}
	$em = $this->getDoctrine()->getManager();
	$bilaketa = ['numDocumento' => $numDocumento];
	$habitante = $em->getRepository('AppBundle:Habitante')->findOneBy($bilaketa);
	
	if ($habitante == null ) {
	    $this->addFlash('error', 'Ez da herritarra aurkitu',[
		'dni' => $numDocumento
	    ]);
	    return $this->render('erroldaTxartela/error.html.twig');
	}

	$bilaketa = ['municipio' => '003','entidad' => '0002']; // AMOREBIETA
	$entidadesActivas = $em->getRepository('AppBundle:Entidad')->findAllActive($bilaketa);
	$entidad = $entidadesActivas[0];
	
	$claveVivienda = $habitante->getClaveVivienda();
	
	$bilaketa = [
	    'claveVivienda' => $claveVivienda
	];

	$habitantes = $em->getRepository('AppBundle:Habitante')->findHabitantesActuales($bilaketa);
	
	$ultimaVariacion = $em->getRepository('AppBundle:Variacion')->findUltimaVariacion($bilaketa);
	
	$auditoria = $this->guardarRegistroAuditoria('colectivo',$numDocumento,$zertarako);

	$this->get('logger')->debug('ErroldaTxartelaController->erroldaKoletiboaAction->render: /show.html.twig');
	$html = $this->render('erroldaTxartela/erroldaKoletiboa.html.twig', [
	    'entidad' => $entidad,
	    'variacion' => $ultimaVariacion,
	    'habitantes' => $habitantes,
	    'auditoria' => $auditoria,
	]);
	
	$this->sortuPDFa($html);
	
	return $html;
    }

    /**
     * @Route("/banakoa/{numDocumento}", name="errolda_banakoa"))
     */
    public function erroldaBanakoaAction (Request $request, $numDocumento){
	$em = $this->getDoctrine()->getManager();
	$bilaketa = ['numDocumento' => $numDocumento];
	$habitante = $em->getRepository('AppBundle:Habitante')->findOneBy($bilaketa);
	if ($habitante == null ) {
	    $this->addFlash('error', 'Ez da herritarra aurkitu',['dni' => $numDocumento]);
	    return $this->render('erroldaTxartela/error.html.twig',['dni' => $numDocumento]);
	}
	$emaitza = $this->erroldaBanakoaSortu($request, $habitante);
	$html = $this->render('erroldaTxartela/erroldaBanakoa.html.twig', [
	    'entidad' => $emaitza['entidad'],
	    'variacion' => $emaitza['variacion'],
	    'habitante' => $emaitza['habitante'],
	    'auditoria' => $emaitza['auditoria'],
	]);
	$this->sortuPDFa($html);
	return $html;
    }

    public function erroldaBanakoaSortu (Request $request, $habitante){
	$parametros = $request->query->all();
	$zertarako = null;
	if (array_key_exists('zertarako', $parametros) ) {
	    $zertarako = $parametros['zertarako'];
	}
	$em = $this->getDoctrine()->getManager();
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

    /**
     * @Route("/mugimenduak/{numDocumento}", name="errolda_mugimenduak"))
     */
    public function erroldaMugimenduakAction (Request $request, $numDocumento){
	$this->get('logger')->debug('ErroldaTxartelaController->erroldaMugimenduakAction->numDocumento->'.$numDocumento);
	$parametros = $request->query->all();
	$zertarako = null;
	if (array_key_exists('zertarako', $parametros) ) {
	    $zertarako = $parametros['zertarako'];
	}
	$em = $this->getDoctrine()->getManager();
	$bilaketa = ['numDocumento' => $numDocumento];
	$habitantes = $em->getRepository('AppBundle:Habitante')->findBy($bilaketa);
	if ( count($habitantes) == 0 ) {
	    $this->addFlash('error', 'Ez da herritarra aurkitu',['dni' => $numDocumento]);
	    return $this->render('erroldaTxartela/error.html.twig');
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
	$this->get('logger')->debug('ErroldaTxartelaController->erroldaMugimenduakAction->render: erroldaTxartela/erroldaMugimenduak.html.twig');
	$html = $this->render('erroldaTxartela/erroldaMugimenduak.html.twig', [
	    'movimientos' => $movimientos,
	    'domicilios' => $domicilios,
	    'habitante' => $habitante,
	    'auditoria' => $auditoria,
	]);
	
	$this->sortuPDFa($html);
	return $html;
    }

    private function guardarRegistroAuditoria ($tipo,$dni,$motivo = null) {
	$em = $this->getDoctrine()->getManager();
	$auditoria = new Auditoria();
	$auditoria->setFecha(new \DateTime());
	$auditoria->setTipo('movimientos');
	$auditoria->setDni($dni);
	$auditoria->setMotivo($motivo);
	$em->persist($auditoria);
	$em->flush();
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
    
    private function sortuPDFa($html) {
        $pdf = $this->get( "white_october.tcpdf" )->create(
            'vertical',
            PDF_UNIT,
            PDF_PAGE_FORMAT,
            true,
            'UTF-8',
            false
        );
	$certificate = 'file://C:/Netbeans/Padron-MySql/tcpdf.crt';
	
//	dump($certificate);die;

	// set additional information
	$info = array(
	    'Name' => 'Iker Bilbao',
	    'Location' => 'Ayuntamiento de Amorebieta-Etxano',
	    'Reason' => 'Firma PDF',
	    'ContactInfo' => 'informatika@amorebieta.eus',
	    );

	// set document signature
	$pdf->setSignature($certificate, $certificate, 'kk', '', 2, $info);
	$pdf->SetMargins(PDF_MARGIN_LEFT, 5, PDF_MARGIN_RIGHT);
	$pdf->SetHeaderMargin(0);
	$pdf->SetFooterMargin(0);
	$pdf->SetAutoPageBreak(TRUE, 0);
        $pdf->SetAuthor( 'Amorebitako-Etxanoko Udala' );
        $pdf->SetTitle( 'Errolda Ziurtagiria' );
        $pdf->SetSubject( 'Errolda Ziurtagiria' );
	$pdf->setPrintHeader(false);
	$pdf->setPrintFooter(true);
        $pdf->setFontSubsetting( true );
        $pdf->SetFont( 'helvetica', '', 11, '', true );
        $pdf->AddPage();

        $filename = 'ziurtagiria';

        $pdf->writeHTMLCell(
            $w = 0,
            $h = 0,
            $x = '',
            $y = '',
            $html->getContent(),
            $border = 0,
            $ln = 1,
            $fill = 0,
            $reseth = false,
            $align = '',
            $autopadding = true
        );
	// create content for signature (image and/or text)
	$pdf->Image('images/sigilua.jpg', 180, 200, 20, 20, 'JPG');

	// define active area for signature appearance
//	$pdf->setSignatureAppearance(180, 60, 20, 20);

        $pdf->Output( $filename . ".pdf", 'I' );    
    }
	
}
