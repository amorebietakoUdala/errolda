<?php

namespace AppBundle\Services\NISAE;

class DatosConsulta
{

    /**
     * @var string $Territorio
     */
    protected $Territorio = null;

    /**
     * @var string $Municipio
     */
    protected $Municipio = null;

    /**
     * @param string $Territorio
     * @param string $Municipio
     */
    public function __construct($Territorio, $Municipio)
    {
      $this->Territorio = $Territorio;
      $this->Municipio = $Municipio;
    }

    /**
     * @return string
     */
    public function getTerritorio()
    {
      return $this->Territorio;
    }

    /**
     * @param string $Territorio
     * @return \nisae\DatosConsulta
     */
    public function setTerritorio($Territorio)
    {
      $this->Territorio = $Territorio;
      return $this;
    }

    /**
     * @return string
     */
    public function getMunicipio()
    {
      return $this->Municipio;
    }

    /**
     * @param string $Municipio
     * @return \nisae\DatosConsulta
     */
    public function setMunicipio($Municipio)
    {
      $this->Municipio = $Municipio;
      return $this;
    }

}
