<?php

namespace AppBundle\Services\NISAE;

class DomicilioPadron
{

    /**
     * @var string $CodigoProvinciaResidencia
     */
    protected $CodigoProvinciaResidencia = null;

    /**
     * @var string $NombreProvinciaResidencia
     */
    protected $NombreProvinciaResidencia = null;

    /**
     * @var string $CodigoMunicipioResidencia
     */
    protected $CodigoMunicipioResidencia = null;

    /**
     * @var string $NombreMunicipioResidencia
     */
    protected $NombreMunicipioResidencia = null;

    /**
     * @var string $CodigoViaCalle
     */
    protected $CodigoViaCalle = null;

    /**
     * @var string $NombreViaCastellano
     */
    protected $NombreViaCastellano = null;

    /**
     * @var string $NombreViaEuskera
     */
    protected $NombreViaEuskera = null;

    /**
     * @var string $Bloque
     */
    protected $Bloque = null;

    /**
     * @var string $Portal
     */
    protected $Portal = null;

    /**
     * @var string $Bis
     */
    protected $Bis = null;

    /**
     * @var string $Escalera
     */
    protected $Escalera = null;

    /**
     * @var string $Planta
     */
    protected $Planta = null;

    /**
     * @var string $Puerta
     */
    protected $Puerta = null;

    /**
     * @var string $CodigoPostal
     */
    protected $CodigoPostal = null;

    /**
     * @param string $CodigoProvinciaResidencia
     * @param string $NombreProvinciaResidencia
     * @param string $CodigoMunicipioResidencia
     * @param string $NombreMunicipioResidencia
     * @param string $CodigoViaCalle
     * @param string $NombreViaCastellano
     * @param string $NombreViaEuskera
     * @param string $Bloque
     * @param string $Portal
     * @param string $Bis
     * @param string $Escalera
     * @param string $Planta
     * @param string $Puerta
     * @param string $CodigoPostal
     */
    public function __construct($CodigoProvinciaResidencia=null, $NombreProvinciaResidencia=null, $CodigoMunicipioResidencia=null, $NombreMunicipioResidencia=null, $CodigoViaCalle=null, $NombreViaCastellano=null, $NombreViaEuskera=null, $Bloque=null, $Portal=null, $Bis=null, $Escalera=null, $Planta=null, $Puerta=null, $CodigoPostal=null)
    {
      $this->CodigoProvinciaResidencia = $CodigoProvinciaResidencia;
      $this->NombreProvinciaResidencia = $NombreProvinciaResidencia;
      $this->CodigoMunicipioResidencia = $CodigoMunicipioResidencia;
      $this->NombreMunicipioResidencia = $NombreMunicipioResidencia;
      $this->CodigoViaCalle = $CodigoViaCalle;
      $this->NombreViaCastellano = $NombreViaCastellano;
      $this->NombreViaEuskera = $NombreViaEuskera;
      $this->Bloque = $Bloque;
      $this->Portal = $Portal;
      $this->Bis = $Bis;
      $this->Escalera = $Escalera;
      $this->Planta = $Planta;
      $this->Puerta = $Puerta;
      $this->CodigoPostal = $CodigoPostal;
    }

    /**
     * @return string
     */
    public function getCodigoProvinciaResidencia()
    {
      return $this->CodigoProvinciaResidencia;
    }

    /**
     * @param string $CodigoProvinciaResidencia
     * @return \nisae\DomicilioPadron
     */
    public function setCodigoProvinciaResidencia($CodigoProvinciaResidencia)
    {
      $this->CodigoProvinciaResidencia = $CodigoProvinciaResidencia;
      return $this;
    }

    /**
     * @return string
     */
    public function getNombreProvinciaResidencia()
    {
      return $this->NombreProvinciaResidencia;
    }

    /**
     * @param string $NombreProvinciaResidencia
     * @return \nisae\DomicilioPadron
     */
    public function setNombreProvinciaResidencia($NombreProvinciaResidencia)
    {
      $this->NombreProvinciaResidencia = $NombreProvinciaResidencia;
      return $this;
    }

    /**
     * @return string
     */
    public function getCodigoMunicipioResidencia()
    {
      return $this->CodigoMunicipioResidencia;
    }

    /**
     * @param string $CodigoMunicipioResidencia
     * @return \nisae\DomicilioPadron
     */
    public function setCodigoMunicipioResidencia($CodigoMunicipioResidencia)
    {
      $this->CodigoMunicipioResidencia = $CodigoMunicipioResidencia;
      return $this;
    }

    /**
     * @return string
     */
    public function getNombreMunicipioResidencia()
    {
      return $this->NombreMunicipioResidencia;
    }

    /**
     * @param string $NombreMunicipioResidencia
     * @return \nisae\DomicilioPadron
     */
    public function setNombreMunicipioResidencia($NombreMunicipioResidencia)
    {
      $this->NombreMunicipioResidencia = $NombreMunicipioResidencia;
      return $this;
    }

    /**
     * @return string
     */
    public function getCodigoViaCalle()
    {
      return $this->CodigoViaCalle;
    }

    /**
     * @param string $CodigoViaCalle
     * @return \nisae\DomicilioPadron
     */
    public function setCodigoViaCalle($CodigoViaCalle)
    {
      $this->CodigoViaCalle = $CodigoViaCalle;
      return $this;
    }

    /**
     * @return string
     */
    public function getNombreViaCastellano()
    {
      return $this->NombreViaCastellano;
    }

    /**
     * @param string $NombreViaCastellano
     * @return \nisae\DomicilioPadron
     */
    public function setNombreViaCastellano($NombreViaCastellano)
    {
      $this->NombreViaCastellano = $NombreViaCastellano;
      return $this;
    }

    /**
     * @return string
     */
    public function getNombreViaEuskera()
    {
      return $this->NombreViaEuskera;
    }

    /**
     * @param string $NombreViaEuskera
     * @return \nisae\DomicilioPadron
     */
    public function setNombreViaEuskera($NombreViaEuskera)
    {
      $this->NombreViaEuskera = $NombreViaEuskera;
      return $this;
    }

    /**
     * @return string
     */
    public function getBloque()
    {
      return $this->Bloque;
    }

    /**
     * @param string $Bloque
     * @return \nisae\DomicilioPadron
     */
    public function setBloque($Bloque)
    {
      $this->Bloque = $Bloque;
      return $this;
    }

    /**
     * @return string
     */
    public function getPortal()
    {
      return $this->Portal;
    }

    /**
     * @param string $Portal
     * @return \nisae\DomicilioPadron
     */
    public function setPortal($Portal)
    {
      $this->Portal = $Portal;
      return $this;
    }

    /**
     * @return string
     */
    public function getBis()
    {
      return $this->Bis;
    }

    /**
     * @param string $Bis
     * @return \nisae\DomicilioPadron
     */
    public function setBis($Bis)
    {
      $this->Bis = $Bis;
      return $this;
    }

    /**
     * @return string
     */
    public function getEscalera()
    {
      return $this->Escalera;
    }

    /**
     * @param string $Escalera
     * @return \nisae\DomicilioPadron
     */
    public function setEscalera($Escalera)
    {
      $this->Escalera = $Escalera;
      return $this;
    }

    /**
     * @return string
     */
    public function getPlanta()
    {
      return $this->Planta;
    }

    /**
     * @param string $Planta
     * @return \nisae\DomicilioPadron
     */
    public function setPlanta($Planta)
    {
      $this->Planta = $Planta;
      return $this;
    }

    /**
     * @return string
     */
    public function getPuerta()
    {
      return $this->Puerta;
    }

    /**
     * @param string $Puerta
     * @return \nisae\DomicilioPadron
     */
    public function setPuerta($Puerta)
    {
      $this->Puerta = $Puerta;
      return $this;
    }

    /**
     * @return string
     */
    public function getCodigoPostal()
    {
      return $this->CodigoPostal;
    }

    /**
     * @param string $CodigoPostal
     * @return \nisae\DomicilioPadron
     */
    public function setCodigoPostal($CodigoPostal)
    {
      $this->CodigoPostal = $CodigoPostal;
      return $this;
    }

}
