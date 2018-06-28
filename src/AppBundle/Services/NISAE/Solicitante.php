<?php

namespace AppBundle\Services\NISAE;

class Solicitante
{

    /**
     * @var IdentificadorSolicitante $IdentificadorSolicitante
     */
    protected $IdentificadorSolicitante = null;

    /**
     * @var NombreSolicitante $NombreSolicitante
     */
    protected $NombreSolicitante = null;

    /**
     * @var UnidadTramitadora $UnidadTramitadora
     */
    protected $UnidadTramitadora = null;

    /**
     * @var Procedimiento $Procedimiento
     */
    protected $Procedimiento = null;

    /**
     * @var Finalidad $Finalidad
     */
    protected $Finalidad = null;

    /**
     * @var Consentimiento $Consentimiento
     */
    protected $Consentimiento = null;

    /**
     * @var Funcionario $Funcionario
     */
    protected $Funcionario = null;

    /**
     * @var IdExpediente $IdExpediente
     */
    protected $IdExpediente = null;

    /**
     * @param IdentificadorSolicitante $IdentificadorSolicitante
     * @param NombreSolicitante $NombreSolicitante
     * @param UnidadTramitadora $UnidadTramitadora
     * @param Procedimiento $Procedimiento
     * @param Finalidad $Finalidad
     * @param Consentimiento $Consentimiento
     * @param Funcionario $Funcionario
     * @param IdExpediente $IdExpediente
     */
    public function __construct($IdentificadorSolicitante, $NombreSolicitante, $UnidadTramitadora, $Procedimiento, $Finalidad, $Consentimiento, $Funcionario, $IdExpediente)
    {
      $this->IdentificadorSolicitante = $IdentificadorSolicitante;
      $this->NombreSolicitante = $NombreSolicitante;
      $this->UnidadTramitadora = $UnidadTramitadora;
      $this->Procedimiento = $Procedimiento;
      $this->Finalidad = $Finalidad;
      $this->Consentimiento = $Consentimiento;
      $this->Funcionario = $Funcionario;
      $this->IdExpediente = $IdExpediente;
    }

    /**
     * @return IdentificadorSolicitante
     */
    public function getIdentificadorSolicitante()
    {
      return $this->IdentificadorSolicitante;
    }

    /**
     * @param IdentificadorSolicitante $IdentificadorSolicitante
     * @return \nisae\Solicitante
     */
    public function setIdentificadorSolicitante($IdentificadorSolicitante)
    {
      $this->IdentificadorSolicitante = $IdentificadorSolicitante;
      return $this;
    }

    /**
     * @return NombreSolicitante
     */
    public function getNombreSolicitante()
    {
      return $this->NombreSolicitante;
    }

    /**
     * @param NombreSolicitante $NombreSolicitante
     * @return \nisae\Solicitante
     */
    public function setNombreSolicitante($NombreSolicitante)
    {
      $this->NombreSolicitante = $NombreSolicitante;
      return $this;
    }

    /**
     * @return UnidadTramitadora
     */
    public function getUnidadTramitadora()
    {
      return $this->UnidadTramitadora;
    }

    /**
     * @param UnidadTramitadora $UnidadTramitadora
     * @return \nisae\Solicitante
     */
    public function setUnidadTramitadora($UnidadTramitadora)
    {
      $this->UnidadTramitadora = $UnidadTramitadora;
      return $this;
    }

    /**
     * @return Procedimiento
     */
    public function getProcedimiento()
    {
      return $this->Procedimiento;
    }

    /**
     * @param Procedimiento $Procedimiento
     * @return \nisae\Solicitante
     */
    public function setProcedimiento($Procedimiento)
    {
      $this->Procedimiento = $Procedimiento;
      return $this;
    }

    /**
     * @return Finalidad
     */
    public function getFinalidad()
    {
      return $this->Finalidad;
    }

    /**
     * @param Finalidad $Finalidad
     * @return \nisae\Solicitante
     */
    public function setFinalidad($Finalidad)
    {
      $this->Finalidad = $Finalidad;
      return $this;
    }

    /**
     * @return Consentimiento
     */
    public function getConsentimiento()
    {
      return $this->Consentimiento;
    }

    /**
     * @param Consentimiento $Consentimiento
     * @return \nisae\Solicitante
     */
    public function setConsentimiento($Consentimiento)
    {
      $this->Consentimiento = $Consentimiento;
      return $this;
    }

    /**
     * @return Funcionario
     */
    public function getFuncionario()
    {
      return $this->Funcionario;
    }

    /**
     * @param Funcionario $Funcionario
     * @return \nisae\Solicitante
     */
    public function setFuncionario($Funcionario)
    {
      $this->Funcionario = $Funcionario;
      return $this;
    }

    /**
     * @return IdExpediente
     */
    public function getIdExpediente()
    {
      return $this->IdExpediente;
    }

    /**
     * @param IdExpediente $IdExpediente
     * @return \nisae\Solicitante
     */
    public function setIdExpediente($IdExpediente)
    {
      $this->IdExpediente = $IdExpediente;
      return $this;
    }

}
