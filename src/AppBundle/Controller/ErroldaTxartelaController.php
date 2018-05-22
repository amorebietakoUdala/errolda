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

/**
 * Description of ErroldaTxartelaController
 *
 * @author ibilbao

/**
* @Route("/errolda-txartela")
*/
class ErroldaTxartelaController extends Controller {

    /**
     * @Route("/kolektiboa/{numDocumento}", name="admin_egoera_show"))
     */

    public function erroldaKoletiboaAction ($numDocumento){
	$this->get('logger')->debug('ErroldaTxartelaController->erroldaKoletiboaAction->numDocumento->'.$numDocumento);
	$em = $this->getDoctrine()->getManager();
	$bilaketa = [
	    'numDocumento' => $numDocumento
	];
	
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
	
	$this->get('logger')->debug('ErroldaTxartelaController->erroldaKoletiboaAction->render: /show.html.twig');
	$html = $this->render('erroldaTxartela/erroldaKoletiboa.html.twig', [
	    'entidad' => $entidad,
	    'variacion' => $ultimaVariacion,
	    'habitantes' => $habitantes,
	]);
	
//	$this->sortuPDFa($html);
	
	return $html;
    }

    /**
     * @Route("/banakoa/{numDocumento}", name="admin_egoera_show"))
     */

    public function erroldaBanakoaAction ($numDocumento){
	$this->get('logger')->debug('ErroldaTxartelaController->erroldaBanakoaAction->numDocumento->'.$numDocumento);
	$em = $this->getDoctrine()->getManager();
	$bilaketa = [
	    'numDocumento' => $numDocumento
	];
	
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
	
	$this->get('logger')->debug('ErroldaTxartelaController->erroldaBanakoaAction->render: erroldaTxartela/erroldaBanakoa.html.twig');
	$html = $this->render('erroldaTxartela/erroldaBanakoa.html.twig', [
	    'entidad' => $entidad,
	    'variacion' => $ultimaVariacion,
//	    'habitantes' => $habitantes,
	    'habitante' => $habitante,
	]);
	
	$this->sortuPDFa($html);
	
	return $html;
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
        $pdf->SetAuthor( 'Amorebitako-Etxanoko Udala' );
        $pdf->SetTitle( 'Errolda Ziurtagiria' );
        $pdf->SetSubject( 'Errolda Ziurtagiria' );
	$pdf->setPrintHeader(false);
	$pdf->setPrintFooter(false);
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
        $pdf->Output( $filename . ".pdf", 'I' );    
    }
	
}
