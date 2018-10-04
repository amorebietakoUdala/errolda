<?php

namespace AppBundle\Services\NISAE;

class Emisor
{

    /**
     * @var NifEmisor $NifEmisor
     */
    protected $NifEmisor = null;

    /**
     * @var NombreEmisor $NombreEmisor
     */
    protected $NombreEmisor = null;

    /**
     * @param NifEmisor $NifEmisor
     * @param NombreEmisor $NombreEmisor
     */
    public function __construct($NifEmisor, $NombreEmisor)
    {
      $this->NifEmisor = $NifEmisor;
      $this->NombreEmisor = $NombreEmisor;
    }

    /**
     * @return NifEmisor
     */
    public function getNifEmisor()
    {
      return $this->NifEmisor;
    }

    /**
     * @param NifEmisor $NifEmisor
     * @return \nisae\Emisor
     */
    public function setNifEmisor($NifEmisor)
    {
      $this->NifEmisor = $NifEmisor;
      return $this;
    }

    /**
     * @return NombreEmisor
     */
    public function getNombreEmisor()
    {
      return $this->NombreEmisor;
    }

    /**
     * @param NombreEmisor $NombreEmisor
     * @return \nisae\Emisor
     */
    public function setNombreEmisor($NombreEmisor)
    {
      $this->NombreEmisor = $NombreEmisor;
      return $this;
    }

}
