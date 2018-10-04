<?php

namespace AppBundle\Services\NISAE;

class DatosEspecificos
{

    /**
     * @var Consulta $Consulta
     */
    protected $Consulta = null;

    /**
     * @var Retorno $Retorno
     */
    protected $Retorno = null;

    /**
     * @param Consulta $Consulta
     * @param Retorno $Retorno
     */
    public function __construct($Consulta, $Retorno)
    {
      $this->Consulta = $Consulta;
      $this->Retorno = $Retorno;
    }

    /**
     * @return Consulta
     */
    public function getConsulta()
    {
      return $this->Consulta;
    }

    /**
     * @param Consulta $Consulta
     * @return \nisae\DatosEspecificos
     */
    public function setConsulta($Consulta)
    {
      $this->Consulta = $Consulta;
      return $this;
    }

    /**
     * @return Retorno
     */
    public function getRetorno()
    {
      return $this->Retorno;
    }

    /**
     * @param Retorno $Retorno
     * @return \nisae\DatosEspecificos
     */
    public function setRetorno($Retorno)
    {
      $this->Retorno = $Retorno;
      return $this;
    }

}
