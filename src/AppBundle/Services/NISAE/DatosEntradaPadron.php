<?php

namespace AppBundle\Services\NISAE;

class DatosEntradaPadron
{

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
     * @param string $TipoDocumento
     * @param string $NumDocumento
     * @param string $Nombre
     * @param string $Apellido1
     * @param string $Apellido2
     * @param string $FechaNacimiento
     */
    public function __construct($TipoDocumento, $NumDocumento, $Nombre, $Apellido1, $Apellido2, $FechaNacimiento)
    {
      $this->TipoDocumento = $TipoDocumento;
      $this->NumDocumento = $NumDocumento;
      $this->Nombre = $Nombre;
      $this->Apellido1 = $Apellido1;
      $this->Apellido2 = $Apellido2;
      $this->FechaNacimiento = $FechaNacimiento;
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
     * @return \nisae\DatosEntradaPadron
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
     * @return \nisae\DatosEntradaPadron
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
     * @return \nisae\DatosEntradaPadron
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
     * @return \nisae\DatosEntradaPadron
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
     * @return \nisae\DatosEntradaPadron
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
     * @return \nisae\DatosEntradaPadron
     */
    public function setFechaNacimiento($FechaNacimiento)
    {
      $this->FechaNacimiento = $FechaNacimiento;
      return $this;
    }

}
