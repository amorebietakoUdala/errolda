<?php

namespace AppBundle\Services\NISAE;

class Respuesta
{

    /**
     * @var Atributos $Atributos
     */
    protected $Atributos = null;

    /**
     * @var Transmisiones $Transmisiones
     */
    protected $Transmisiones = null;

    /**
     * @param Atributos $Atributos
     * @param Transmisiones $Transmisiones
     */
    public function __construct($Atributos, $Transmisiones)
    {
      $this->Atributos = $Atributos;
      $this->Transmisiones = $Transmisiones;
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
     * @return \nisae\Respuesta
     */
    public function setAtributos($Atributos)
    {
      $this->Atributos = $Atributos;
      return $this;
    }

    /**
     * @return Transmisiones
     */
    public function getTransmisiones()
    {
      return $this->Transmisiones;
    }

    /**
     * @param Transmisiones $Transmisiones
     * @return \nisae\Respuesta
     */
    public function setTransmisiones($Transmisiones)
    {
      $this->Transmisiones = $Transmisiones;
      return $this;
    }

}
