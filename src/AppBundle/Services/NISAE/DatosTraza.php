<?php

namespace AppBundle\Services\NISAE;

class DatosTraza
{

    /**
     * @var string $IdTraza
     */
    protected $IdTraza = null;

    /**
     * @var string $IdSolicitud
     */
    protected $IdSolicitud = null;

    /**
     * @var string $FechaCertificado
     */
    protected $FechaCertificado = null;

    /**
     * @param string $IdTraza
     * @param string $IdSolicitud
     * @param string $FechaCertificado
     */
    public function __construct($IdTraza, $IdSolicitud, $FechaCertificado)
    {
      $this->IdTraza = $IdTraza;
      $this->IdSolicitud = $IdSolicitud;
      $this->FechaCertificado = $FechaCertificado;
    }

    /**
     * @return string
     */
    public function getIdTraza()
    {
      return $this->IdTraza;
    }

    /**
     * @param string $IdTraza
     * @return \nisae\Traza
     */
    public function setIdTraza($IdTraza)
    {
      $this->IdTraza = $IdTraza;
      return $this;
    }

    /**
     * @return string
     */
    public function getIdSolicitud()
    {
      return $this->IdSolicitud;
    }

    /**
     * @param string $IdSolicitud
     * @return \nisae\Traza
     */
    public function setIdSolicitud($IdSolicitud)
    {
      $this->IdSolicitud = $IdSolicitud;
      return $this;
    }

    /**
     * @return string
     */
    public function getFechaCertificado()
    {
      return $this->FechaCertificado;
    }

    /**
     * @param string $FechaCertificado
     * @return \nisae\Traza
     */
    public function setFechaCertificado($FechaCertificado)
    {
      $this->FechaCertificado = $FechaCertificado;
      return $this;
    }

}
