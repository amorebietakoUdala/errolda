<?php

namespace AppBundle\Services\NISAE;

class Transmision
{

    /**
     * @var CodigoCertificado $CodigoCertificado
     */
    protected $CodigoCertificado = null;

    /**
     * @var IdSolicitud $IdSolicitud
     */
    protected $IdSolicitud = null;

    /**
     * @var IdTransmision $IdTransmision
     */
    protected $IdTransmision = null;

    /**
     * @var FechaGeneracion $FechaGeneracion
     */
    protected $FechaGeneracion = null;

    /**
     * @param CodigoCertificado $CodigoCertificado
     * @param IdSolicitud $IdSolicitud
     * @param IdTransmision $IdTransmision
     * @param FechaGeneracion $FechaGeneracion
     */
    public function __construct($CodigoCertificado, $IdSolicitud, $IdTransmision, $FechaGeneracion)
    {
      $this->CodigoCertificado = $CodigoCertificado;
      $this->IdSolicitud = $IdSolicitud;
      $this->IdTransmision = $IdTransmision;
      $this->FechaGeneracion = $FechaGeneracion;
    }

    /**
     * @return CodigoCertificado
     */
    public function getCodigoCertificado()
    {
      return $this->CodigoCertificado;
    }

    /**
     * @param CodigoCertificado $CodigoCertificado
     * @return \nisae\Transmision
     */
    public function setCodigoCertificado($CodigoCertificado)
    {
      $this->CodigoCertificado = $CodigoCertificado;
      return $this;
    }

    /**
     * @return IdSolicitud
     */
    public function getIdSolicitud()
    {
      return $this->IdSolicitud;
    }

    /**
     * @param IdSolicitud $IdSolicitud
     * @return \nisae\Transmision
     */
    public function setIdSolicitud($IdSolicitud)
    {
      $this->IdSolicitud = $IdSolicitud;
      return $this;
    }

    /**
     * @return IdTransmision
     */
    public function getIdTransmision()
    {
      return $this->IdTransmision;
    }

    /**
     * @param IdTransmision $IdTransmision
     * @return \nisae\Transmision
     */
    public function setIdTransmision($IdTransmision)
    {
      $this->IdTransmision = $IdTransmision;
      return $this;
    }

    /**
     * @return FechaGeneracion
     */
    public function getFechaGeneracion()
    {
      return $this->FechaGeneracion;
    }

    /**
     * @param FechaGeneracion $FechaGeneracion
     * @return \nisae\Transmision
     */
    public function setFechaGeneracion($FechaGeneracion)
    {
      $this->FechaGeneracion = $FechaGeneracion;
      return $this;
    }

}
