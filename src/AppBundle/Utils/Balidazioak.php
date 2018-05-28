<?php

namespace AppBundle\Utils;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Balidazioak
 *
 * @author ibilbao
 */
class Balidazioak {
    
    static public function validar_dni($dni){
	    $letra = substr($dni, -1);
	    $numeros = substr($dni, 0, -1);
	    if ( substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros%23, 1) == $letra && strlen($letra) == 1 && strlen ($numeros) == 8 ){
		    echo 'valido';
	    }else{
		    echo 'no valido';
	    }
    }
}
