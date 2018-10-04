<?php

namespace AppBundle\Services\NISAE;

class Procedimiento
{

    /**
     * @var CodProcedimiento $CodProcedimiento
     */
    protected $CodProcedimiento = null;

    /**
     * @var NombreProcedimiento $NombreProcedimiento
     */
    protected $NombreProcedimiento = null;

    /**
     * @param CodProcedimiento $CodProcedimiento
     * @param NombreProcedimiento $NombreProcedimiento
     */
    public function __construct($CodProcedimiento, $NombreProcedimiento)
    {
      $this->CodProcedimiento = $CodProcedimiento;
      $this->NombreProcedimiento = $NombreProcedimiento;
    }

    /**
     * @return CodProcedimiento
     */
    public function getCodProcedimiento()
    {
      return $this->CodProcedimiento;
    }

    /**
     * @param CodProcedimiento $CodProcedimiento
     * @return \nisae\Procedimiento
     */
    public function setCodProcedimiento($CodProcedimiento)
    {
      $this->CodProcedimiento = $CodProcedimiento;
      return $this;
    }

    /**
     * @return NombreProcedimiento
     */
    public function getNombreProcedimiento()
    {
      return $this->NombreProcedimiento;
    }

    /**
     * @param NombreProcedimiento $NombreProcedimiento
     * @return \nisae\Procedimiento
     */
    public function setNombreProcedimiento($NombreProcedimiento)
    {
      $this->NombreProcedimiento = $NombreProcedimiento;
      return $this;
    }

}
