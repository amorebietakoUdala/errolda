<?php

namespace AppBundle\Services\NISAE;

class Funcionario
{

    /**
     * @var NombreCompletoFuncionario $NombreCompletoFuncionario
     */
    protected $NombreCompletoFuncionario = null;

    /**
     * @var NifFuncionario $NifFuncionario
     */
    protected $NifFuncionario = null;

    /**
     * @param NombreCompletoFuncionario $NombreCompletoFuncionario
     * @param NifFuncionario $NifFuncionario
     */
    public function __construct($NombreCompletoFuncionario, $NifFuncionario)
    {
      $this->NombreCompletoFuncionario = $NombreCompletoFuncionario;
      $this->NifFuncionario = $NifFuncionario;
    }

    /**
     * @return NombreCompletoFuncionario
     */
    public function getNombreCompletoFuncionario()
    {
      return $this->NombreCompletoFuncionario;
    }

    /**
     * @param NombreCompletoFuncionario $NombreCompletoFuncionario
     * @return \nisae\Funcionario
     */
    public function setNombreCompletoFuncionario($NombreCompletoFuncionario)
    {
      $this->NombreCompletoFuncionario = $NombreCompletoFuncionario;
      return $this;
    }

    /**
     * @return NifFuncionario
     */
    public function getNifFuncionario()
    {
      return $this->NifFuncionario;
    }

    /**
     * @param NifFuncionario $NifFuncionario
     * @return \nisae\Funcionario
     */
    public function setNifFuncionario($NifFuncionario)
    {
      $this->NifFuncionario = $NifFuncionario;
      return $this;
    }

}
