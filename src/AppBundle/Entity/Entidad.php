<?php

    namespace AppBundle\Entity;

    use Doctrine\ORM\Mapping as ORM;
    use AppBundle\Entity\TipoVia;
    use JMS\Serializer\Annotation as Serializer;
    use JMS\Serializer\Annotation\ExclusionPolicy;
    use JMS\Serializer\Annotation\Expose;
    use JMS\Serializer\Annotation\MaxDepth;
    use AppBundle\Entity\Provincia;

    /**
     * Biztanleen taula
     *
     * @ORM\Table(name="TBWPENTD")
     * @ORM\Entity(repositoryClass="AppBundle\Repository\EntidadRepository")
     * @ExclusionPolicy("all")
     */
    class Entidad
    {

        /**
         * @var string
         * @ORM\ManyToOne (targetEntity="Provincia")
         * @ORM\Id
	 * @ORM\JoinColumn (name="ENCLAPRO", referencedColumnName="PRCLAPRO")         * @Expose
         */
        private $provincia;

        /**
         * @var string
         * @Expose
	 * @ORM\Id
         * @ORM\Column(name="ENCLAMUN", type="string", nullable=true)
         */
        private $municipio;

        /**
         * @var string
         * @Expose
         * @ORM\Id
	 * @ORM\Column(name="ENCLAENT", type="string", nullable=true)
         */
        private $entidad;

        /**
         * @var string
         * @Expose
	 * @ORM\Id
         * @ORM\Column(name="ENCLAFEC", type="string", nullable=true)
         */
        private $fecha;

        /**
         * @var string
         * @Expose
         * @ORM\Column(name="ENDIGITO", type="string", nullable=true)
         */
        private $digito;

        /**
         * @var string
         * @Expose
         * @ORM\Column(name="ENDESCAM", type="string", nullable=true)
         */
        private $descripcionCas;

        /**
         * @var string
         * @Expose
         * @ORM\Column(name="ENDESCRE", type="string", nullable=true)
         */
        private $descripcionEus;
	

        /**
         * @var string
         * @Expose
         * @ORM\Column(name="ENFECHBA", type="string", nullable=true)
         */
        private $fechaBaja;

	public function getProvincia() {
	    return $this->provincia;
	}

	public function getMunicipio() {
	    return $this->municipio;
	}

	public function getEntidad() {
	    return $this->entidad;
	}

	public function getFecha() {
	    return $this->fecha;
	}

	public function getDigito() {
	    return $this->digito;
	}

	public function getDescripcionCas() {
	    return $this->descripcionCas;
	}

	public function getDescripcionEus() {
	    return $this->descripcionEus;
	}

	public function getFechaBaja() {
	    return $this->fechaBaja;
	}

	public function setProvincia(Provincia $provincia) {
	    $this->provincia = $provincia;
	}

	public function setMunicipio($municipio) {
	    $this->municipio = $municipio;
	}

	public function setEntidad($entidad) {
	    $this->entidad = $entidad;
	}

	public function setFecha($fecha) {
	    $this->fecha = $fecha;
	}

	public function setDigito($digito) {
	    $this->digito = $digito;
	}

	public function setDescripcionCas($descripcionCas) {
	    $this->descripcionCas = $descripcionCas;
	}

	public function setDescripcionEus($descripcionEus) {
	    $this->descripcionEus = $descripcionEus;
	}

	public function setFechaBaja($fechaBaja) {
	    $this->fechaBaja = $fechaBaja;
	}

}
