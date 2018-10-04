<?php

namespace AppBundle\Services\NISAE;

class DatosGenericos
{

    /**
     * @var Emisor $Emisor
     */
    protected $Emisor = null;

    /**
     * @var Solicitante $Solicitante
     */
    protected $Solicitante = null;

    /**
     * @var Titular $Titular
     */
    protected $Titular = null;

    /**
     * @var Transmision $Transmision
     */
    protected $Transmision = null;

    /**
     * @param Emisor $Emisor
     * @param Solicitante $Solicitante
     * @param Titular $Titular
     * @param Transmision $Transmision
     */
    public function __construct($Emisor, $Solicitante, $Titular, $Transmision)
    {
      $this->Emisor = $Emisor;
      $this->Solicitante = $Solicitante;
      $this->Titular = $Titular;
      $this->Transmision = $Transmision;
    }

    /**
     * @return Emisor
     */
    public function getEmisor()
    {
      return $this->Emisor;
    }

    /**
     * @param Emisor $Emisor
     * @return \nisae\DatosGenericos
     */
    public function setEmisor($Emisor)
    {
      $this->Emisor = $Emisor;
      return $this;
    }

    /**
     * @return Solicitante
     */
    public function getSolicitante()
    {
      return $this->Solicitante;
    }

    /**
     * @param Solicitante $Solicitante
     * @return \nisae\DatosGenericos
     */
    public function setSolicitante($Solicitante)
    {
      $this->Solicitante = $Solicitante;
      return $this;
    }

    /**
     * @return Titular
     */
    public function getTitular()
    {
      return $this->Titular;
    }

    /**
     * @param Titular $Titular
     * @return \nisae\DatosGenericos
     */
    public function setTitular($Titular)
    {
      $this->Titular = $Titular;
      return $this;
    }

    /**
     * @return Transmision
     */
    public function getTransmision()
    {
      return $this->Transmision;
    }

    /**
     * @param Transmision $Transmision
     * @return \nisae\DatosGenericos
     */
    public function setTransmision($Transmision)
    {
      $this->Transmision = $Transmision;
      return $this;
    }

}
