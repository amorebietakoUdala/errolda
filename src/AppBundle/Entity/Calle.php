<?php

    namespace AppBundle\Entity;

    use Doctrine\ORM\Mapping as ORM;
    use AppBundle\Entity\TipoVia;
    use JMS\Serializer\Annotation as Serializer;
    use JMS\Serializer\Annotation\ExclusionPolicy;
    use JMS\Serializer\Annotation\Expose;
    use JMS\Serializer\Annotation\MaxDepth;

    /**
     * Biztanleen taula
     *
     * @ORM\Table(name="TBWPCALL")
     * @ORM\Entity(repositoryClass="AppBundle\Repository\CalleRepository")
     * @ExclusionPolicy("all")
     */
    class Calle
    {
        /**
         * @var string
         * @Expose
	 * @ORM\Id
         * @ORM\Column (name="CACLAMUN")
         */
        private $municipio;

	/**
         * @var string
         * @Expose
	 * @ORM\Id
         * @ORM\Column(name="CACLACAL", type="string", nullable=true)
         */
        private $id;

	/**
	* @ORM\ManyToOne (targetEntity="TipoVia")
	* @ORM\JoinColumn ( name="CATIPVIA", referencedColumnName="TVCLAVEC")
	* @MaxDepth(2)
	* @Expose
	*/
        private $tipoVia;

        /**
         * @var string
         * @Expose
         * @ORM\Column(name="CADESCRI", type="string", nullable=true)
         */
        private $descripcion;

        /**
         * @var string
         * @Expose
         * @ORM\Column(name="CAIDENTI", type="string", nullable=true)
         */
        private $identificacion;
	
	/**
         * @var string
         * @Expose
         * @ORM\Column(name="CAFECHAL", type="string", nullable=true)
         */
        private $fechaAlta;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="CAFECHBA", type="string", nullable=true)
         */
        private $fechaBaja;

	public function getMunicipio() {
	    return $this->municipio;
	}

	public function getId() {
	    return $this->id;
	}

	public function getTipoVia() {
	    return $this->tipoVia;
	}

	public function getDescripcion() {
	    return trim($this->descripcion);
	}

	public function getIdentificacion() {
	    return $this->identificacion;
	}

	public function getFechaAlta() {
	    return $this->fechaAlta;
	}

	public function getFechaBaja() {
	    return $this->fechaBaja;
	}

	public function setMunicipio($municipio) {
	    $this->municipio = $municipio;
	}

	public function setTipoVia(TipoVia $tipoVia) {
	    $this->tipoVia = $tipoVia;
	}

	public function setDescripcion($descripcion) {
	    $this->descripcion = $descripcion;
	}

	public function setIdentificacion($identificacion) {
	    $this->identificacion = $identificacion;
	}

	public function setFechaAlta($fechaAlta) {
	    $this->fechaAlta = $fechaAlta;
	}

	public function setFechaBaja($fechaBaja) {
	    $this->fechaBaja = $fechaBaja;
	}

	public function getProvincia() {
	    return $this->PROVINCIACODE;
	}

}
