<?php

namespace AppBundle\Services\NISAE;

class Transmisiones
{

    /**
     * @var TransmisionDatos $TransmisionDatos
     */
    protected $TransmisionDatos = null;

    /**
     * @param TransmisionDatos $TransmisionDatos
     */
    public function __construct($TransmisionDatos)
    {
      $this->TransmisionDatos = $TransmisionDatos;
    }

    /**
     * @return TransmisionDatos
     */
    public function getTransmisionDatos()
    {
      return $this->TransmisionDatos;
    }

    /**
     * @param TransmisionDatos $TransmisionDatos
     * @return \nisae\Transmisiones
     */
    public function setTransmisionDatos($TransmisionDatos)
    {
      $this->TransmisionDatos = $TransmisionDatos;
      return $this;
    }

}
