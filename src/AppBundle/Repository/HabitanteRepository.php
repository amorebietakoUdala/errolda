<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query;

/**
 * HabitanteRepository
 *
 * This class was generated by the PhpStorm "Php Annotations" Plugin. Add your own custom
 * repository methods below.
 */
class HabitanteRepository extends EntityRepository
{

    /**
    * @return QueryBuilder
    */
    public function findHabitantesActuales( $criteria = null )
    {
	$claveVivienda = $criteria['claveVivienda'];
	$qb = $this->createQueryBuilder('h')
		->select('h')
		->andWhere('h.claveVivienda = :claveVivienda')
		->andWhere('h.fechaBaja = :fechaBaja')
		->orderBy('h.numOrdenHabitante','ASC');
	
        $qb->setParameter( 'claveVivienda', $claveVivienda );
	$qb->setParameter( 'fechaBaja', '' );
        $result = $qb->getQuery()->getResult();
//	dump($result);die;
	return $result;
    }

    /**
    * @return QueryBuilder
    */
    public function findHabitantes( $criteria = null )
    {
	$qb = $this->createQueryBuilder('h')->select('h');
	foreach ( $criteria as $eremua => $filtroa ) {
	    $qb->andWhere('h.'.$eremua.' = :'.$eremua)
		->setParameter($eremua, $filtroa);
	}
	$qb->andWhere('h.fechaBaja = :fechaBaja');
	$qb->orderBy('h.numOrdenHabitante','ASC');
	$qb->setParameter( 'fechaBaja', '' );
        $result = $qb->getQuery()->getResult();
	return $result;
    }

    /**
    * @return QueryBuilder
    */
    public function findHabitantesPorOrdenVariacion ( $criteria = null )
    {
	$qb = $this->createQueryBuilder('h')->select('h');
	foreach ( $criteria as $eremua => $filtroa ) {
	    $qb->andWhere('h.'.$eremua.' = :'.$eremua)
		->setParameter($eremua, $filtroa);
	}
	$qb->orderBy('h.fechaVariacion','ASC');
        $result = $qb->getQuery()->getResult();
	return $result;
    }

}
