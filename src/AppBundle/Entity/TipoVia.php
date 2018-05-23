<?php

    namespace AppBundle\Entity;

    use Doctrine\ORM\Mapping as ORM;
    use JMS\Serializer\Annotation as Serializer;
    use JMS\Serializer\Annotation\ExclusionPolicy;
    use JMS\Serializer\Annotation\Expose;

    /**
     * Biztanleen taula
     *
     * @ORM\Table(name="TBWPTVIA")
     * @ORM\Entity(repositoryClass="AppBundle\Repository\TipoViaRepository")
     * @ExclusionPolicy("all")
     */
    class TipoVia
    {

        /**
         * @var string
         * @Expose
         * @ORM\Column(name="TVCODVIA", type="string", nullable=true)
         */
        private $codVia;

        /**
         * @Expose
	 * @ORM\Id
         * @ORM\Column(name="TVCLAVEC", type="string", nullable=true)
         */
        private $claveCas;

        /**
         * @var string
         * @Expose
         * @ORM\Column(name="TVCLAVEE", type="string", nullable=true)
         */
        private $claveEus;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="TVCLINEC", type="string", nullable=true)
         */
        private $claveINECas;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="TVCLINEE", type="string", nullable=true)
         */
        private $claveINEEus;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="TVDESCRC", type="string", nullable=true)
         */
        private $descripcionCas;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="TVDESCRE", type="string", nullable=true)
         */
        private $descripcionEus;
	
	public function getCodVia() {
	    return $this->codVia;
	}

	public function getClaveCas() {
	    return $this->claveCas;
	}

	public function getClaveEus() {
	    return $this->claveEus;
	}

	public function getClaveINECas() {
	    return $this->claveINECas;
	}

	public function getClaveINEEus() {
	    return $this->claveINEEus;
	}

	public function getDescripcionCas() {
	    return trim($this->descripcionCas);
	}

	public function getDescripcionEus() {
	    return trim($this->descripcionEus);
	}

	public function setCodVia($codVia) {
	    $this->codVia = $codVia;
	}

	public function setClaveCas($claveCas) {
	    $this->claveCas = $claveCas;
	}

	public function setClaveEus($claveEus) {
	    $this->claveEus = $claveEus;
	}

	public function setClaveINECas($claveINECas) {
	    $this->claveINECas = $claveINECas;
	}

	public function setClaveINEEus($claveINEEus) {
	    $this->claveINEEus = $claveINEEus;
	}

	public function setDescripcionCas($descripcionCas) {
	    $this->descripcionCas = $descripcionCas;
	}

	public function setDescripcionEus($descripcionEus) {
	    $this->descripcionEus = $descripcionEus;
	}

	public function __toString() {
	    return $this->claveEus.'/'.$this->claveCas;
	}
}
