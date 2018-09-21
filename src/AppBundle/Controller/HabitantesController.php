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
use AppBundle\Forms\HabitanteBilatzaileaForm;
use AppBundle\Entity\Habitante;
use AppBundle\Entity\Vivienda;

/**
 * Description of ErroldaTxartelaController
 *
 * @author ibilbao

/**
* @Route("/{_locale}/biztanleak")
*/

class HabitantesController extends Controller {

         /**
     * @Route("/", name="biztanleak_search", options={"expose" = true})
     */
    public function listAction (Request $request){
//	$user = $this->get('security.token_storage')->getToken()->getUser();
	$em = $this->getDoctrine()->getManager();
	$bilatzaileaForm = $this->createForm(HabitanteBilatzaileaForm::class, [
//	    'role' => $user->getRoles(),
//	    'locale' => $request->getLocale(),
	]);
	$bilatzaileaForm->handleRequest($request);
	if ( $bilatzaileaForm->isSubmitted() && $bilatzaileaForm->isValid() ) {
	    $consulta_habitante = $bilatzaileaForm->getData();
	    $habitantes = $em->getRepository(Habitante::class)->findHabitantes($this->_remove_blank_filters($consulta_habitante));
	    $viviendas = [];
	    foreach ( $habitantes as $habitante) {
		$vivienda = $em->getRepository(Vivienda::class)->findOneBy(['claveVivienda' => $habitante->getClaveVivienda()]);
		$viviendas[] = $vivienda;
	    }
//	    dump($habitantes);die;
	    return $this->render('/habitantes/search.html.twig', [
		'habitantes' => $habitantes,
		'viviendas' => $viviendas,
		'bilatzaileaForm' => $bilatzaileaForm->createView(),
	    ]);
	}
	return $this->render('/habitantes/search.html.twig', [
	    'bilatzaileaForm' => $bilatzaileaForm->createView()
	]);
    }

    private function _remove_blank_filters ($criteria) {
	$new_criteria = [];
	foreach ($criteria as $key => $value) {
	    if (!empty($value))
		$new_criteria[$key] = $value;
	}
	return $new_criteria;
    }

}