<?php

namespace AppBundle\Services\NISAE;

class EstadoResultado
{

    /**
     * @var string $Resultado
     */
    protected $Resultado = null;

    /**
     * @var string $Descripcion
     */
    protected $Descripcion = null;

    /**
     * @var string $MotivosError
     */
    protected $MotivosError = null;

    /**
     * @param string $Resultado
     * @param string $Descripcion
     * @param string $MotivosError
     */
    public function __construct($Resultado, $Descripcion, $MotivosError)
    {
      $this->Resultado = $Resultado;
      $this->Descripcion = $Descripcion;
      $this->MotivosError = $MotivosError;
    }

    /**
     * @return string
     */
    public function getResultado()
    {
      return $this->Resultado;
    }

    /**
     * @param string $Resultado
     * @return \nisae\EstadoResultado
     */
    public function setResultado($Resultado)
    {
      $this->Resultado = $Resultado;
      return $this;
    }

    /**
     * @return string
     */
    public function getDescripcion()
    {
      return $this->Descripcion;
    }

    /**
     * @param string $Descripcion
     * @return \nisae\EstadoResultado
     */
    public function setDescripcion($Descripcion)
    {
      $this->Descripcion = $Descripcion;
      return $this;
    }

    /**
     * @return string
     */
    public function getMotivosError()
    {
      return $this->MotivosError;
    }

    /**
     * @param string $MotivosError
     * @return \nisae\EstadoResultado
     */
    public function setMotivosError($MotivosError)
    {
      $this->MotivosError = $MotivosError;
      return $this;
    }

}
