<?php

namespace AppBundle\Services\NISAE;

class Estado
{

    /**
     * @var CodigoEstado $CodigoEstado
     */
    protected $CodigoEstado = null;

    /**
     * @var CodigoEstadoSecundario $CodigoEstadoSecundario
     */
    protected $CodigoEstadoSecundario = null;

    /**
     * @var LiteralError $LiteralError
     */
    protected $LiteralError = null;

    /**
     * @var TiempoEstimadoRespuesta $TiempoEstimadoRespuesta
     */
    protected $TiempoEstimadoRespuesta = null;

    /**
     * @param CodigoEstado $CodigoEstado
     * @param CodigoEstadoSecundario $CodigoEstadoSecundario
     * @param LiteralError $LiteralError
     * @param TiempoEstimadoRespuesta $TiempoEstimadoRespuesta
     */
    public function __construct($CodigoEstado, $CodigoEstadoSecundario, $LiteralError, $TiempoEstimadoRespuesta)
    {
      $this->CodigoEstado = $CodigoEstado;
      $this->CodigoEstadoSecundario = $CodigoEstadoSecundario;
      $this->LiteralError = $LiteralError;
      $this->TiempoEstimadoRespuesta = $TiempoEstimadoRespuesta;
    }

    /**
     * @return CodigoEstado
     */
    public function getCodigoEstado()
    {
      return $this->CodigoEstado;
    }

    /**
     * @param CodigoEstado $CodigoEstado
     * @return \nisae\Estado
     */
    public function setCodigoEstado($CodigoEstado)
    {
      $this->CodigoEstado = $CodigoEstado;
      return $this;
    }

    /**
     * @return CodigoEstadoSecundario
     */
    public function getCodigoEstadoSecundario()
    {
      return $this->CodigoEstadoSecundario;
    }

    /**
     * @param CodigoEstadoSecundario $CodigoEstadoSecundario
     * @return \nisae\Estado
     */
    public function setCodigoEstadoSecundario($CodigoEstadoSecundario)
    {
      $this->CodigoEstadoSecundario = $CodigoEstadoSecundario;
      return $this;
    }

    /**
     * @return LiteralError
     */
    public function getLiteralError()
    {
      return $this->LiteralError;
    }

    /**
     * @param LiteralError $LiteralError
     * @return \nisae\Estado
     */
    public function setLiteralError($LiteralError)
    {
      $this->LiteralError = $LiteralError;
      return $this;
    }

    /**
     * @return TiempoEstimadoRespuesta
     */
    public function getTiempoEstimadoRespuesta()
    {
      return $this->TiempoEstimadoRespuesta;
    }

    /**
     * @param TiempoEstimadoRespuesta $TiempoEstimadoRespuesta
     * @return \nisae\Estado
     */
    public function setTiempoEstimadoRespuesta($TiempoEstimadoRespuesta)
    {
      $this->TiempoEstimadoRespuesta = $TiempoEstimadoRespuesta;
      return $this;
    }

}
