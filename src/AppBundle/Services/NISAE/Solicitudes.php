<?php

namespace AppBundle\Services\NISAE;

class Solicitudes
{

    /**
     * @var SolicitudTransmision $SolicitudTransmision
     */
    protected $SolicitudTransmision = null;

    /**
     * @var string $Id
     */
    protected $Id = null;

    /**
     * @param SolicitudTransmision $SolicitudTransmision
     * @param string $Id
     */
    public function __construct($SolicitudTransmision, $Id)
    {
      $this->SolicitudTransmision = $SolicitudTransmision;
      $this->Id = $Id;
    }

    /**
     * @return SolicitudTransmision
     */
    public function getSolicitudTransmision()
    {
      return $this->SolicitudTransmision;
    }

    /**
     * @param SolicitudTransmision $SolicitudTransmision
     * @return \nisae\Solicitudes
     */
    public function setSolicitudTransmision($SolicitudTransmision)
    {
      $this->SolicitudTransmision = $SolicitudTransmision;
      return $this;
    }

    /**
     * @return string
     */
    public function getId()
    {
      return $this->Id;
    }

    /**
     * @param string $Id
     * @return \nisae\Solicitudes
     */
    public function setId($Id)
    {
      $this->Id = $Id;
      return $this;
    }

}
