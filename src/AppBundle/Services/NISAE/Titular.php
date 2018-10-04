<?php

namespace AppBundle\Services\NISAE;

class Titular
{

    /**
     * @var TipoDocumentacion $TipoDocumentacion
     */
    protected $TipoDocumentacion = null;

    /**
     * @var Documentacion $Documentacion
     */
    protected $Documentacion = null;

    /**
     * @var NombreCompleto $NombreCompleto
     */
    protected $NombreCompleto = null;

    /**
     * @var Nombre $Nombre
     */
    protected $Nombre = null;

    /**
     * @var Apellido1 $Apellido1
     */
    protected $Apellido1 = null;

    /**
     * @var Apellido2 $Apellido2
     */
    protected $Apellido2 = null;

    /**
     * @param TipoDocumentacion $TipoDocumentacion
     * @param Documentacion $Documentacion
     * @param NombreCompleto $NombreCompleto
     * @param Nombre $Nombre
     * @param Apellido1 $Apellido1
     * @param Apellido2 $Apellido2
     */
    public function __construct($TipoDocumentacion, $Documentacion, $NombreCompleto, $Nombre, $Apellido1, $Apellido2)
    {
      $this->TipoDocumentacion = $TipoDocumentacion;
      $this->Documentacion = $Documentacion;
      $this->NombreCompleto = $NombreCompleto;
      $this->Nombre = $Nombre;
      $this->Apellido1 = $Apellido1;
      $this->Apellido2 = $Apellido2;
    }

    /**
     * @return TipoDocumentacion
     */
    public function getTipoDocumentacion()
    {
      return $this->TipoDocumentacion;
    }

    /**
     * @param TipoDocumentacion $TipoDocumentacion
     * @return \nisae\Titular
     */
    public function setTipoDocumentacion($TipoDocumentacion)
    {
      $this->TipoDocumentacion = $TipoDocumentacion;
      return $this;
    }

    /**
     * @return Documentacion
     */
    public function getDocumentacion()
    {
      return $this->Documentacion;
    }

    /**
     * @param Documentacion $Documentacion
     * @return \nisae\Titular
     */
    public function setDocumentacion($Documentacion)
    {
      $this->Documentacion = $Documentacion;
      return $this;
    }

    /**
     * @return NombreCompleto
     */
    public function getNombreCompleto()
    {
      return $this->NombreCompleto;
    }

    /**
     * @param NombreCompleto $NombreCompleto
     * @return \nisae\Titular
     */
    public function setNombreCompleto($NombreCompleto)
    {
      $this->NombreCompleto = $NombreCompleto;
      return $this;
    }

    /**
     * @return Nombre
     */
    public function getNombre()
    {
      return $this->Nombre;
    }

    /**
     * @param Nombre $Nombre
     * @return \nisae\Titular
     */
    public function setNombre($Nombre)
    {
      $this->Nombre = $Nombre;
      return $this;
    }

    /**
     * @return Apellido1
     */
    public function getApellido1()
    {
      return $this->Apellido1;
    }

    /**
     * @param Apellido1 $Apellido1
     * @return \nisae\Titular
     */
    public function setApellido1($Apellido1)
    {
      $this->Apellido1 = $Apellido1;
      return $this;
    }

    /**
     * @return Apellido2
     */
    public function getApellido2()
    {
      return $this->Apellido2;
    }

    /**
     * @param Apellido2 $Apellido2
     * @return \nisae\Titular
     */
    public function setApellido2($Apellido2)
    {
      $this->Apellido2 = $Apellido2;
      return $this;
    }

}
