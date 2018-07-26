<?php

namespace AppBundle\Services\NISAE;

class Retorno
{

    /**
     * @var DatosTraza $DatosTraza
     */
    protected $DatosTraza = null;

    /**
     * @var DatosConsulta $DatosConsulta
     */
    protected $DatosConsulta = null;

    /**
     * @var EstadoResultado $EstadoResultado
     */
    protected $EstadoResultado = null;

    /**
     * @var DatosSalidaPadron $DatosSalidaPadron
     */
    protected $DatosSalidaPadron = null;

    /**
     * @param Traza $DatosTraza
     * @param DatosConsulta $DatosConsulta
     * @param EstadoResultado $EstadoResultado
     * @param DatosSalidaPadron $DatosSalidaPadron
     */
    public function __construct($DatosTraza, $DatosConsulta, $EstadoResultado, $DatosSalidaPadron)
    {
      $this->DatosTraza = $DatosTraza;
      $this->DatosConsulta = $DatosConsulta;
      $this->EstadoResultado = $EstadoResultado;
      $this->DatosSalidaPadron = $DatosSalidaPadron;
    }

    /**
     * @return Traza
     */
    public function getDatosTraza()
    {
      return $this->DatosTraza;
    }

    /**
     * @param Traza $DatosTraza
     * @return \nisae\Retorno
     */
    public function setDatosTraza($DatosTraza)
    {
      $this->DatosTraza = $DatosTraza;
      return $this;
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
     * @return \nisae\Retorno
     */
    public function setDatosConsulta($DatosConsulta)
    {
      $this->DatosConsulta = $DatosConsulta;
      return $this;
    }

    /**
     * @return EstadoResultado
     */
    public function getEstadoResultado()
    {
      return $this->EstadoResultado;
    }

    /**
     * @param EstadoResultado $EstadoResultado
     * @return \nisae\Retorno
     */
    public function setEstadoResultado($EstadoResultado)
    {
      $this->EstadoResultado = $EstadoResultado;
      return $this;
    }

    /**
     * @return DatosSalidaPadron
     */
    public function getDatosSalidaPadron()
    {
      return $this->DatosSalidaPadron;
    }

    /**
     * @param DatosSalidaPadron $DatosSalidaPadron
     * @return \nisae\Retorno
     */
    public function setDatosSalidaPadron($DatosSalidaPadron)
    {
      $this->DatosSalidaPadron = $DatosSalidaPadron;
      return $this;
    }

}
