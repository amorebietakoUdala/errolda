<?php

namespace AppBundle\Services\NISAE;

class Consulta
{

    /**
     * @var DatosConsulta $DatosConsulta
     */
    protected $DatosConsulta = null;

    /**
     * @var DatosEntradaPadron $DatosEntradaPadron
     */
    protected $DatosEntradaPadron = null;

    /**
     * @param DatosConsulta $DatosConsulta
     * @param DatosEntradaPadron $DatosEntradaPadron
     */
    public function __construct($DatosConsulta, $DatosEntradaPadron)
    {
      $this->DatosConsulta = $DatosConsulta;
      $this->DatosEntradaPadron = $DatosEntradaPadron;
    }

    /**
     * @return DatosConsulta
     */
    public function getDatosConsulta()
    {
      return $this->DatosConsulta;
    }

    /**
     * @param DatosConsulta $DatosConsulta
     * @return \nisae\Consulta
     */
    public function setDatosConsulta($DatosConsulta)
    {
      $this->DatosConsulta = $DatosConsulta;
      return $this;
    }

    /**
     * @return DatosEntradaPadron
     */
    public function getDatosEntradaPadron()
    {
      return $this->DatosEntradaPadron;
    }

    /**
     * @param DatosEntradaPadron $DatosEntradaPadron
     * @return \nisae\Consulta
     */
    public function setDatosEntradaPadron($DatosEntradaPadron)
    {
      $this->DatosEntradaPadron = $DatosEntradaPadron;
      return $this;
    }

}
