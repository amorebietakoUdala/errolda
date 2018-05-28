<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use AppBundle\Entity\Habitante;
use Doctrine\ORM\Query;

/**
 * VariacionRepository
 *
 * This class was generated by the PhpStorm "Php Annotations" Plugin. Add your own custom
 * repository methods below.
 */
class VariacionRepository extends EntityRepository
{

    /**
    * @return Array
    */
    public function findUltimaVariacion ( $criteria )
    {
	$claveVivienda = $criteria['claveVivienda'];
	$qb = $this->createQueryBuilder('v')
		->select('v')
		->andWhere('v.claveVivienda = :claveVivienda')
		->andWhere('v.tipoVariacion <> :tipoVariacion')
		->orderBy('v.fechaVariacion','DESC');
	
        $qb->setParameter( 'claveVivienda', $claveVivienda );
	$qb->setParameter( 'tipoVariacion', 'BM' );
        $result = $qb->getQuery()->getResult();
//	dump($result[0]);die;
	return $result[0];
    }

    public function findUltimaVariacionHabitante ( Habitante $habitante )
    {
	$claveInicialHabitante = $habitante->getClaveInicialHabitante();
	$qb = $this->createQueryBuilder('v')
		->select('v')
		->andWhere('v.claveInicialHabitante = :claveInicialHabitante')
		->andWhere('v.tipoVariacion <> :tipoVariacion')

		->orderBy('v.fechaVariacion','DESC');
	
	$qb->setParameter( 'tipoVariacion', 'MD' );
	$qb->setParameter( 'claveInicialHabitante', $claveInicialHabitante );
        $result = $qb->getQuery()->getResult();
//	dump($result[0]);die;
	return $result[0];
    }

    public function findUltimoCambioDomicilio ( Habitante $habitante )
    {
	$claveInicialHabitante = $habitante->getClaveInicialHabitante();
	$qb = $this->createQueryBuilder('v')
		->select('v')
		->andWhere('v.claveInicialHabitante = :claveInicialHabitante')
		->andWhere('v.tipoVariacion = :tipoVariacion')

		->orderBy('v.fechaVariacion','DESC');
	$qb->setParameter( 'tipoVariacion', 'MC' );
	$qb->setParameter( 'claveInicialHabitante', $claveInicialHabitante );
	$result = $qb->getQuery()->getResult();
	if ( count($result) > 0)
	    return $result[0];
	else return null;
    }

    /**
    * @return Array
    */
    public function findVariaciones ( $criteria )
    {
	$fechaVariacion = null;
	if ( array_key_exists('fechaVariacion', $criteria) ) {
	    $fechaVariacion = $criteria['fechaVariacion'];
	    unset($criteria["fechaVariacion"]);
	}; 
	$qb = $this->createQueryBuilder('v')
		->select('v');
		if ( $criteria ) {
		    foreach ( $criteria as $eremua => $filtroa ) {
			$qb->andWhere('v.'.$eremua.' = :'.$eremua)
			    ->setParameter($eremua, $filtroa);
		    }
		}
		$qb->andWhere('v.tipoVariacion = :tipoVariacion');
		$qb->orderBy('v.fechaVariacion','ASC');
	if ( $fechaVariacion !== null ) {
	    $qb->andWhere('v.fechaVariacion >= :fechaVariacion');
	    $qb->setParameter( 'fechaVariacion', $fechaVariacion );
	}
	$qb->setParameter( 'tipoVariacion', 'MD' );
        $result = $qb->getQuery()->getResult();
	return $result;
    }

        /**
    * @return Array
    */
    public function findVariacionesUltimos10Anios ( $criteria )
    {
	$date = date("Y")-10;
	$criteria['fechaVariacion'] = $date.'0101';
	$result = $this->findVariaciones($criteria);
	return $result;
    }

}
