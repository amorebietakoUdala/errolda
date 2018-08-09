<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Services\SoapErroldaService;
use Symfony\Component\HttpFoundation\JsonResponse;
use \SoapServer;


/**
 * @Route("/soap/errolda-txartela")
 */
class SoapErroldaServiceController extends Controller
{
    /**
     * @Route("/banakakoa", name="soap_errolda_banakakoa")
     */
    public function soapErroldaBanakakoaAction(SoapErroldaService $soapErroldaService)
    {
        $soapServer = new \SoapServer($this->get('kernel')->getRootDir().'/Resources/config/soap/x53jiServicioIntermediacion.wsdl');
        $soapServer->setObject($soapErroldaService);

        $response = new Response();
	$response->headers->set('Content-Type', 'text/xml');

        ob_start();
        $soapServer->handle();
        $response->setContent(ob_get_clean());

        return $response;
    }
    
        /**
     * @Route("/banakakoaNoSOAP", name="soap_errolda_banakakoaNoSOAP")
     */
    public function soapErroldaBanakakoaNoSOAPAction(Request $request, SoapErroldaService $soapErroldaService)
    {
        $response = new JsonResponse();
	dump($soapErroldaService->peticionSincronaNoSOAP($request));die;
        $response->setContent($soapErroldaService->peticionSincronaNoSOAP($request));
        return $response;
    }

}

