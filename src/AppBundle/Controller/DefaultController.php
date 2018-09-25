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

/**
 * Description of ErroldaTxartelaController
 *
 * @author ibilbao
**/

class DefaultController extends Controller {

     /**
     * @Route("/", name="homepage", options={"expose" = true})
     */
    public function homeAction (Request $request){
	return $this->redirectToRoute("biztanleak_search");
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
