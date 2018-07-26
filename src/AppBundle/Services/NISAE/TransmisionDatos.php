<?php

namespace AppBundle\Services\NISAE;

class TransmisionDatos
{

    /**
     * @var DatosGenericos $DatosGenericos
     */
    protected $DatosGenericos = null;

    /**
     * @var DatosEspecificos $DatosEspecificos
     */
    protected $DatosEspecificos = null;

    /**
     * @param DatosGenericos $DatosGenericos
     * @param DatosEspecificos $DatosEspecificos
     */
    public function __construct($DatosGenericos, $DatosEspecificos)
    {
      $this->DatosGenericos = $DatosGenericos;
      $this->DatosEspecificos = $DatosEspecificos;
    }

    /**
     * @return DatosGenericos
     */
    public function getDatosGenericos()
    {
      return $this->DatosGenericos;
    }

    /**
     * @param DatosGenericos $DatosGenericos
     * @return \nisae\TransmisionDatos
     */
    public function setDatosGenericos($DatosGenericos)
    {
      $this->DatosGenericos = $DatosGenericos;
      return $this;
    }

    /**
     * @return DatosEspecificos
     */
    public function getDatosEspecificos()
    {
      return $this->DatosEspecificos;
    }

    /**
     * @param DatosEspecificos $DatosEspecificos
     * @return \nisae\TransmisionDatos
     */
    public function setDatosEspecificos($DatosEspecificos)
    {
      $this->DatosEspecificos = $DatosEspecificos;
      return $this;
    }

}
