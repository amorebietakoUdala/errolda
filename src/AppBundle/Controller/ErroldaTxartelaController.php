<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Services\ErroldaService;

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
    public function erroldaKoletiboaAction (Request $request, $numDocumento, ErroldaService $erroldaService){
	$em = $this->getDoctrine()->getManager();
	$zenbakia = $this->getDNIZenbakia($numDocumento);
	$bilaketa = ['numDocumento' => $zenbakia];
	$habitante = $em->getRepository('AppBundle:Habitante')->findOneBy($bilaketa);
	if ( $habitante == null ) {
	    $this->addFlash('error', 'Ez da herritarra aurkitu',['dni' => $numDocumento]);
	    return $this->render('erroldaTxartela/error.html.twig');
	}
	$emaitza = $erroldaService->erroldaKolektiboa($request, $habitante);
	$html = $this->render('erroldaTxartela/erroldaKolektiboa.html.twig', [
	    'entidad' => $emaitza['entidad'],
	    'variacion' => $emaitza['variacion'],
	    'habitantes' => $emaitza['habitantes'],
	    'auditoria' => $emaitza['auditoria'],
	    'variacionesVivienda' => $emaitza['variacionesVivienda'],
	]);
	$this->sortuPDFa($html);
    }

    /**
     * @Route("/banakoa/{numDocumento}", name="errolda_banakoa"))
     */
    public function erroldaBanakoaAction (Request $request, $numDocumento, ErroldaService $erroldaService ){
	$em = $this->getDoctrine()->getManager();
	$zenbakia = $this->getDNIZenbakia($numDocumento);
	$bilaketa = ['numDocumento' => $zenbakia];
	$habitante = $em->getRepository('AppBundle:Habitante')->findOneBy($bilaketa);
	if ($habitante == null ) {
	    $this->addFlash('error', 'Ez da herritarra aurkitu',['dni' => $numDocumento]);
	    return $this->render('erroldaTxartela/error.html.twig',['dni' => $numDocumento]);
	}
	$emaitza = $erroldaService->erroldaBanakoa($request, $habitante);
//	dump($emaitza);die;
	$html = $this->render('erroldaTxartela/erroldaBanakoa.html.twig', [
	    'entidad' => $emaitza['entidad'],
	    'variacion' => $emaitza['variacion'],
	    'habitante' => $emaitza['habitante'],
	    'auditoria' => $emaitza['auditoria'],
	]);
	$this->sortuPDFa($html);
    }

    /**
     * @Route("/mugimenduak/{numDocumento}", name="errolda_mugimenduak"))
     */
    public function erroldaMugimenduakAction (Request $request, $numDocumento, ErroldaService $erroldaService ){
	$em = $this->getDoctrine()->getManager();
	$zenbakia = $this->getDNIZenbakia($numDocumento);
	$bilaketa = ['numDocumento' => $zenbakia];
	$habitantes = $em->getRepository('AppBundle:Habitante')->findBy($bilaketa);
	if ( count($habitantes) == 0 ) {
	    $this->addFlash('error', 'Ez da herritarra aurkitu',['dni' => $numDocumento]);
	    return $this->render('erroldaTxartela/error.html.twig');
	}
	$emaitza = $erroldaService->erroldaMugimenduak($request, $habitantes, $zenbakia);
	$html = $this->render('erroldaTxartela/erroldaMugimenduak.html.twig', [
	    'movimientos' => $emaitza['movimientos'],
	    'domicilios' => $emaitza['domicilios'],
	    'habitante' => $emaitza['habitante'],
	    'auditoria' => $emaitza['auditoria'],
	]);
	$this->sortuPDFa($html);
    }

    private function getDNIZenbakia ($numDocumento) {
	$zenbakia = substr($numDocumento, 0, -1);
	return $zenbakia;
    }

    private function getDNILetra ($numDocumento) {
	$letra = substr($numDocumento, -1);
	return $letra;
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
	$sinatu = $this->getParameter('sign_pdf');
	if ( $sinatu == TRUE ) {
	    $pdf = $this->sinatuPDFa($pdf);
	}
        $pdf->Output( $filename . ".pdf", 'I' );    
    }
	
    private function sinatuPDFa ($pdf) {
	$certificate = $this->getParameter('certificate_file');
	// set additional information
	$info = array(
	    'Name' => $this->getParameter('certificate_name'),
	    'Location' => $this->getParameter('certificate_location'),
	    'Reason' => $this->getParameter('certificate_reason'),
	    'ContactInfo' => $this->getParameter('certificate_contactInfo'),
	    );
	// set document signature
	$pdf->setSignature($certificate, $certificate, 'kk', '', 2, $info);
//	// create content for signature (image and/or text)
	$pdf->Image('images/zigilua.jpg', 180, 200, 20, 20, 'JPG');
	// define active area for signature appearance
	$pdf->setSignatureAppearance(180, 60, 20, 20);
	return $pdf;
    } 
}
