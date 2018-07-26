<?php

namespace AppBundle\Services\NISAE;

class Atributos
{

    /**
     * @var IdPeticion $IdPeticion
     */
    protected $IdPeticion = null;

    /**
     * @var NumElementos $NumElementos
     */
    protected $NumElementos = null;

    /**
     * @var TimeStamp $TimeStamp
     */
    protected $TimeStamp = null;

    /**
     * @var Estado $Estado
     */
    protected $Estado = null;

    /**
     * @var CodigoCertificado $CodigoCertificado
     */
    protected $CodigoCertificado = null;

    /**
     * @param IdPeticion $IdPeticion
     * @param NumElementos $NumElementos
     * @param TimeStamp $TimeStamp
     * @param Estado $Estado
     * @param CodigoCertificado $CodigoCertificado
     */
    public function __construct($IdPeticion, $NumElementos, $TimeStamp, $Estado, $CodigoCertificado)
    {
      $this->IdPeticion = $IdPeticion;
      $this->NumElementos = $NumElementos;
      $this->TimeStamp = $TimeStamp;
      $this->Estado = $Estado;
      $this->CodigoCertificado = $CodigoCertificado;
    }

    /**
     * @return IdPeticion
     */
    public function getIdPeticion()
    {
      return $this->IdPeticion;
    }

    /**
     * @param IdPeticion $IdPeticion
     * @return \nisae\Atributos
     */
    public function setIdPeticion($IdPeticion)
    {
      $this->IdPeticion = $IdPeticion;
      return $this;
    }

    /**
     * @return NumElementos
     */
    public function getNumElementos()
    {
      return $this->NumElementos;
    }

    /**
     * @param NumElementos $NumElementos
     * @return \nisae\Atributos
     */
    public function setNumElementos($NumElementos)
    {
      $this->NumElementos = $NumElementos;
      return $this;
    }

    /**
     * @return TimeStamp
     */
    public function getTimeStamp()
    {
      return $this->TimeStamp;
    }

    /**
     * @param TimeStamp $TimeStamp
     * @return \nisae\Atributos
     */
    public function setTimeStamp($TimeStamp)
    {
      $this->TimeStamp = $TimeStamp;
      return $this;
    }

    /**
     * @return Estado
     */
    public function getEstado()
    {
      return $this->Estado;
    }

    /**
     * @param Estado $Estado
     * @return \nisae\Atributos
     */
    public function setEstado($Estado)
    {
      $this->Estado = $Estado;
      return $this;
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
     * @return \nisae\Atributos
     */
    public function setCodigoCertificado($CodigoCertificado)
    {
      $this->CodigoCertificado = $CodigoCertificado;
      return $this;
    }

}
