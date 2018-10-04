<?php

namespace AppBundle\Services\NISAE;

class DatosSalidaPadron
{

    /**
     * @var Habitantes $Habitantes
     */
    protected $Habitantes = null;

    /**
     * @param Habitantes $Habitantes
     */
    public function __construct($Habitantes)
    {
      $this->Habitantes = $Habitantes;
    }

    /**
     * @return Habitantes
     */
    public function getHabitantes()
    {
      return $this->Habitantes;
    }

    /**
     * @param Habitantes $Habitantes
     * @return \nisae\DatosSalidaPadron
     */
    public function setHabitantes($Habitantes)
    {
      $this->Habitantes = $Habitantes;
      return $this;
    }

}
