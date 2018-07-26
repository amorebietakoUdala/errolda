<?php

namespace AppBundle\Services\NISAE;

class Peticion
{

    /**
     * @var Atributos $Atributos
     */
    protected $Atributos = null;

    /**
     * @var Solicitudes $Solicitudes
     */
    protected $Solicitudes = null;

    /**
     * @param Atributos $Atributos
     * @param Solicitudes $Solicitudes
     */
    public function __construct($Atributos, $Solicitudes)
    {
      $this->Atributos = $Atributos;
      $this->Solicitudes = $Solicitudes;
    }

    /**
     * @return Atributos
     */
    public function getAtributos()
    {
      return $this->Atributos;
    }

    /**
     * @param Atributos $Atributos
     * @return \nisae\Peticion
     */
    public function setAtributos($Atributos)
    {
      $this->Atributos = $Atributos;
      return $this;
    }

    /**
     * @return Solicitudes
     */
    public function getSolicitudes()
    {
      return $this->Solicitudes;
    }

    /**
     * @param Solicitudes $Solicitudes
     * @return \nisae\Peticion
     */
    public function setSolicitudes($Solicitudes)
    {
      $this->Solicitudes = $Solicitudes;
      return $this;
    }

}
