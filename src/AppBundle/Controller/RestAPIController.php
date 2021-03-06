<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Habitante;
use AppBundle\Entity\Auditoria;
use AppBundle\Entity\Variacion;
use Psr\Log\LoggerInterface;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use AppBundle\Services\ErroldaService;


class RestAPIController extends FOSRestController
{
    private $logger;
    
    public function __construct(LoggerInterface $logger) {
	$this->logger = $logger;
    }


    /**
     * Erroldan dauden pertsonen zerrenda atera.
     *
     * @ApiDoc(
     *   resource = true,
     *   description = "Erroldan dauden pertsonen zerrenda eskuratu",
     *  filters={
     *       {"name"="numDocumento", "dataType"="string"},
     *       {"name"="claveDocumento", "dataType"="string"},
     *       {"name"="nombre", "dataType"="string"},
     *       {"name"="apellido1", "dataType"="string"},
     *       {"name"="apellido2", "dataType"="string"},
     *       {"name"="sexo", "dataType"="string", "values"="V o M"},
     *       {"name"="limit", "dataType"="int", "values"="Default 100"},
     *  },
     *  statusCodes = {
     *     200 = "Zuzena denean"
     *   }
     * )
     *
     * @return array|View
     * @Annotations\View()
     * @Get("/api/habitantes")
     */
    public function listAction(Request $request)
    {
	$query = $request->query->all();
	$limit = 100;
	if (array_key_exists('limit', $query)) {
	    $limit = $query['limit'];
	    unset($query['limit']);
	}
	
	$order = ['numDocumento' => 'ASC'];
	$habitantes = $this->getDoctrine()->getRepository(Habitante::class)
		    ->findBy($query,$order,$limit);
	
	$view = View::create();
        $view->setData($habitantes);
        header( 'content-type: txt/html; charset=UTF-8' );
        header( "access-control-allow-origin: *" );

	return $view;
    }
    

    /**
     * Banako Errolda Txartela.
     *
     * @ApiDoc(
     *   resource = true,
     *   description = "Banako Errolda Txartela",
     *  filters={
     *       {"name"="numDocumento", "dataType"="string"},
     *       {"name"="limit", "dataType"="int", "values"="Default 100"},
     *  },
     *  statusCodes = {
     *     200 = "Zuzena denean"
     *   }
     * )
     *
     * @return array|View
     * @Annotations\View()
     * @Get("/api/banakoa")
     */
    public function erroldaBanakoaAction (Request $request, ErroldaService $erroldaService ){
	$em = $this->getDoctrine()->getManager();
	$numDocumento = $request->get('numDocumento');
	$bilaketa = ['numDocumento' => $numDocumento];
	$habitante = $em->getRepository('AppBundle:Habitante')->findOneBy($bilaketa);
	if ($habitante == null ) {
	    $this->addFlash('error', 'Ez da herritarra aurkitu',['dni' => $numDocumento]);
	    return $this->render('erroldaTxartela/error.html.twig',['dni' => $numDocumento]);
	}
	$emaitza = $erroldaService->erroldaBanakoa($request, $habitante);
	$view = View::create();
        $view->setData($emaitza);
        header( 'content-type: txt/html; charset=UTF-8' );
        header( "access-control-allow-origin: *" );

	return $view;
    }

}
