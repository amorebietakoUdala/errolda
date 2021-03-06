<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query;

/**
 * ViviendaRepository
 *
 * This class was generated by the PhpStorm "Php Annotations" Plugin. Add your own custom
 * repository methods below.
 */
class ViviendaRepository extends EntityRepository
{

    /**
    * @return Vivienda
    */
    public function findVivienda ( $claveActual )
    {
	$municipio = substr($claveActual,0,3);
	$claveVivienda = substr($claveActual,3,8);
	$orden = substr($claveActual,11);
//	dump($claveActual,$municipio,$claveVivienda,$orden);die;
	$qb = $this->createQueryBuilder('v')
		->select('v')
		->andWhere('v.claveVivienda = :claveVivienda')
		->andWhere('v.municipio = :municipio');
	
        $qb->setParameter( 'claveVivienda', $claveVivienda );
	$qb->setParameter( 'municipio', $municipio );
//	dump($qb->getQuery());die;
        $result = $qb->getQuery()->getSingleResult();
//	dump($result);die;
	return $result;
    }
}
