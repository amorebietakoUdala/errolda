<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Auditoria
 *
 * @ORM\Table(name="Auditoria")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Entity\AuditoriaRepository")
 */
class Auditoria
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime")
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=25)
     */
    private $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="dni", type="string", length=10, nullable=true)
     */
    private $dni;

    /**
     * @var string
     *
     * @ORM\Column(name="motivo", type="string", length=255, nullable=true)
     */
    private $motivo;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255, nullable=true)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido1", type="string", length=255, nullable=true)
     */
    private $apellido1;
    
    /**
     * @var string
     *
     * @ORM\Column(name="apellido2", type="string", length=255, nullable=true)
     */
    private $apellido2;

    /**
    * @ORM\ManyToOne (targetEntity="User")
    */
    private $usuario;
    
    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return Auditoria
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    
        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     *
     * @return Auditoria
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    
        return $this;
    }

    /**
     * Get tipo
     *
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set dni
     *
     * @param string $dni
     *
     * @return Auditoria
     */
    public function setDni($dni)
    {
        $this->dni = $dni;
    
        return $this;
    }

    /**
     * Get dni
     *
     * @return string
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * Get motivo
     *
     * @return string
     */
    public function getMotivo() {
	return $this->motivo;
    }
    
    /**
     * Set motivo
     *
     * @param string $motivo
     *
     * @return Auditoria
     */
    public function setMotivo($motivo) {
	$this->motivo = $motivo;
	return $this;
    }

    public function getNombre() {
	return $this->nombre;
    }

    public function getApellido1() {
	return $this->apellido1;
    }

    public function getApellido2() {
	return $this->apellido2;
    }

    public function setNombre($nombre) {
	$this->nombre = $nombre;
    }

    public function setApellido1($apellido1) {
	$this->apellido1 = $apellido1;
    }

    public function setApellido2($apellido2) {
	$this->apellido2 = $apellido2;
    }

    public function getUsuario() {
	return $this->usuario;
    }

    public function setUsuario($usuario) {
	$this->usuario = $usuario;
    }

}

