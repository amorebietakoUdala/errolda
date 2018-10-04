<?php

namespace AppBundle\Services\NISAE;

class Habitantes
{

    /**
     * @var Habitante $Habitante
     */
    protected $Habitante = [];

    /**
     * @param Habitante $Habitante
     */
    public function __construct(Array $Habitante)
    {
      $this->Habitante = $Habitante;
    }

    /**
     * @return Habitante
     */
    public function getHabitante()
    {
      return $this->Habitante;
    }

    /**
     * @param Habitante $Habitante
     * @return \nisae\Habitantes
     */
    public function setHabitante(Array $Habitante)
    {
      $this->Habitante = $Habitante;
      return $this;
    }

}
