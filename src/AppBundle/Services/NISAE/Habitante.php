<?php

namespace AppBundle\Services\NISAE;

class Habitante
{

    /**
     * @var string $DatosInteres
     */
    protected $DatosInteres = null;

    /**
     * @var string $TipoDocumento
     */
    protected $TipoDocumento = null;

    /**
     * @var string $NumDocumento
     */
    protected $NumDocumento = null;

    /**
     * @var string $Nombre
     */
    protected $Nombre = null;

    /**
     * @var string $Apellido1
     */
    protected $Apellido1 = null;

    /**
     * @var string $Apellido2
     */
    protected $Apellido2 = null;

    /**
     * @var string $FechaNacimiento
     */
    protected $FechaNacimiento = null;

    /**
     * @var string $CodigoPaisNacimiento
     */
    protected $CodigoPaisNacimiento = null;

    /**
     * @var string $NombrePaisNacimiento
     */
    protected $NombrePaisNacimiento = null;

    /**
     * @var string $CodigoProvinciaNacimiento
     */
    protected $CodigoProvinciaNacimiento = null;

    /**
     * @var string $NombreProvinciaNacimiento
     */
    protected $NombreProvinciaNacimiento = null;

    /**
     * @var string $CodigoMunicipioNacimiento
     */
    protected $CodigoMunicipioNacimiento = null;

    /**
     * @var string $NombreMunicipioNacimiento
     */
    protected $NombreMunicipioNacimiento = null;

    /**
     * @var string $Sexo
     */
    protected $Sexo = null;

    /**
     * @var string $FechaAltaPadron
     */
    protected $FechaAltaPadron = null;

    /**
     * @var DomicilioPadron $DomicilioPadron
     */
    protected $DomicilioPadron = null;

    /**
     * @param string $DatosInteres
     * @param string $TipoDocumento
     * @param string $NumDocumento
     * @param string $Nombre
     * @param string $Apellido1
     * @param string $Apellido2
     * @param string $FechaNacimiento
     * @param string $CodigoPaisNacimiento
     * @param string $NombrePaisNacimiento
     * @param string $CodigoProvinciaNacimiento
     * @param string $NombreProvinciaNacimiento
     * @param string $CodigoMunicipioNacimiento
     * @param string $NombreMunicipioNacimiento
     * @param string $Sexo
     * @param string $FechaAltaPadron
     * @param DomicilioPadron $DomicilioPadron
     */
    public function __construct($DatosInteres=null, $TipoDocumento=null, $NumDocumento=null, $Nombre=null, $Apellido1=null, $Apellido2=null, $FechaNacimiento=null, $CodigoPaisNacimiento=null, $NombrePaisNacimiento=null, $CodigoProvinciaNacimiento=null, $NombreProvinciaNacimiento=null, $CodigoMunicipioNacimiento=null, $NombreMunicipioNacimiento=null, $Sexo=null, $FechaAltaPadron=null, $DomicilioPadron=null)
    {
      $this->DatosInteres = $DatosInteres;
      $this->TipoDocumento = $TipoDocumento;
      $this->NumDocumento = $NumDocumento;
      $this->Nombre = $Nombre;
      $this->Apellido1 = $Apellido1;
      $this->Apellido2 = $Apellido2;
      $this->FechaNacimiento = $FechaNacimiento;
      $this->CodigoPaisNacimiento = $CodigoPaisNacimiento;
      $this->NombrePaisNacimiento = $NombrePaisNacimiento;
      $this->CodigoProvinciaNacimiento = $CodigoProvinciaNacimiento;
      $this->NombreProvinciaNacimiento = $NombreProvinciaNacimiento;
      $this->CodigoMunicipioNacimiento = $CodigoMunicipioNacimiento;
      $this->NombreMunicipioNacimiento = $NombreMunicipioNacimiento;
      $this->Sexo = $Sexo;
      $this->FechaAltaPadron = $FechaAltaPadron;
      $this->DomicilioPadron = $DomicilioPadron;
    }

    /**
     * @return string
     */
    public function getDatosInteres()
    {
      return $this->DatosInteres;
    }

    /**
     * @param string $DatosInteres
     * @return \nisae\Habitante
     */
    public function setDatosInteres($DatosInteres)
    {
      $this->DatosInteres = $DatosInteres;
      return $this;
    }

    /**
     * @return string
     */
    public function getTipoDocumento()
    {
      return $this->TipoDocumento;
    }

    /**
     * @param string $TipoDocumento
     * @return \nisae\Habitante
     */
    public function setTipoDocumento($TipoDocumento)
    {
      $this->TipoDocumento = $TipoDocumento;
      return $this;
    }

    /**
     * @return string
     */
    public function getNumDocumento()
    {
      return $this->NumDocumento;
    }

    /**
     * @param string $NumDocumento
     * @return \nisae\Habitante
     */
    public function setNumDocumento($NumDocumento)
    {
      $this->NumDocumento = $NumDocumento;
      return $this;
    }

    /**
     * @return string
     */
    public function getNombre()
    {
      return $this->Nombre;
    }

    /**
     * @param string $Nombre
     * @return \nisae\Habitante
     */
    public function setNombre($Nombre)
    {
      $this->Nombre = $Nombre;
      return $this;
    }

    /**
     * @return string
     */
    public function getApellido1()
    {
      return $this->Apellido1;
    }

    /**
     * @param string $Apellido1
     * @return \nisae\Habitante
     */
    public function setApellido1($Apellido1)
    {
      $this->Apellido1 = $Apellido1;
      return $this;
    }

    /**
     * @return string
     */
    public function getApellido2()
    {
      return $this->Apellido2;
    }

    /**
     * @param string $Apellido2
     * @return \nisae\Habitante
     */
    public function setApellido2($Apellido2)
    {
      $this->Apellido2 = $Apellido2;
      return $this;
    }

    /**
     * @return string
     */
    public function getFechaNacimiento()
    {
      return $this->FechaNacimiento;
    }

    /**
     * @param string $FechaNacimiento
     * @return \nisae\Habitante
     */
    public function setFechaNacimiento($FechaNacimiento)
    {
      $this->FechaNacimiento = $FechaNacimiento;
      return $this;
    }

    /**
     * @return string
     */
    public function getCodigoPaisNacimiento()
    {
      return $this->CodigoPaisNacimiento;
    }

    /**
     * @param string $CodigoPaisNacimiento
     * @return \nisae\Habitante
     */
    public function setCodigoPaisNacimiento($CodigoPaisNacimiento)
    {
      $this->CodigoPaisNacimiento = $CodigoPaisNacimiento;
      return $this;
    }

    /**
     * @return string
     */
    public function getNombrePaisNacimiento()
    {
      return $this->NombrePaisNacimiento;
    }

    /**
     * @param string $NombrePaisNacimiento
     * @return \nisae\Habitante
     */
    public function setNombrePaisNacimiento($NombrePaisNacimiento)
    {
      $this->NombrePaisNacimiento = $NombrePaisNacimiento;
      return $this;
    }

    /**
     * @return string
     */
    public function getCodigoProvinciaNacimiento()
    {
      return $this->CodigoProvinciaNacimiento;
    }

    /**
     * @param string $CodigoProvinciaNacimiento
     * @return \nisae\Habitante
     */
    public function setCodigoProvinciaNacimiento($CodigoProvinciaNacimiento)
    {
      $this->CodigoProvinciaNacimiento = $CodigoProvinciaNacimiento;
      return $this;
    }

    /**
     * @return string
     */
    public function getNombreProvinciaNacimiento()
    {
      return $this->NombreProvinciaNacimiento;
    }

    /**
     * @param string $NombreProvinciaNacimiento
     * @return \nisae\Habitante
     */
    public function setNombreProvinciaNacimiento($NombreProvinciaNacimiento)
    {
      $this->NombreProvinciaNacimiento = $NombreProvinciaNacimiento;
      return $this;
    }

    /**
     * @return string
     */
    public function getCodigoMunicipioNacimiento()
    {
      return $this->CodigoMunicipioNacimiento;
    }

    /**
     * @param string $CodigoMunicipioNacimiento
     * @return \nisae\Habitante
     */
    public function setCodigoMunicipioNacimiento($CodigoMunicipioNacimiento)
    {
      $this->CodigoMunicipioNacimiento = $CodigoMunicipioNacimiento;
      return $this;
    }

    /**
     * @return string
     */
    public function getNombreMunicipioNacimiento()
    {
      return $this->NombreMunicipioNacimiento;
    }

    /**
     * @param string $NombreMunicipioNacimiento
     * @return \nisae\Habitante
     */
    public function setNombreMunicipioNacimiento($NombreMunicipioNacimiento)
    {
      $this->NombreMunicipioNacimiento = $NombreMunicipioNacimiento;
      return $this;
    }

    /**
     * @return string
     */
    public function getSexo()
    {
      return $this->Sexo;
    }

    /**
     * @param string $Sexo
     * @return \nisae\Habitante
     */
    public function setSexo($Sexo)
    {
      $this->Sexo = $Sexo;
      return $this;
    }

    /**
     * @return string
     */
    public function getFechaAltaPadron()
    {
      return $this->FechaAltaPadron;
    }

    /**
     * @param string $FechaAltaPadron
     * @return \nisae\Habitante
     */
    public function setFechaAltaPadron($FechaAltaPadron)
    {
      $this->FechaAltaPadron = $FechaAltaPadron;
      return $this;
    }

    /**
     * @return DomicilioPadron
     */
    public function getDomicilioPadron()
    {
      return $this->DomicilioPadron;
    }

    /**
     * @param DomicilioPadron $DomicilioPadron
     * @return \nisae\Habitante
     */
    public function setDomicilioPadron($DomicilioPadron)
    {
      $this->DomicilioPadron = $DomicilioPadron;
      return $this;
    }

}
