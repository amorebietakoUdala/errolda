<?php

    namespace AppBundle\Entity;

    use Doctrine\ORM\Mapping as ORM;
    use AppBundle\Entity\Provincia;
    use JMS\Serializer\Annotation as Serializer;
    use JMS\Serializer\Annotation\ExclusionPolicy;
    use JMS\Serializer\Annotation\Expose;
    use JMS\Serializer\Annotation\MaxDepth;

    /**
     * Biztanleen taula
     *
     * @ORM\Table(name="TBWPMUNI")
     * @ORM\Entity(repositoryClass="AppBundle\Repository\MunicipioRepository")
     * @ExclusionPolicy("all")
     */
    class Municipio
    {

        /**
         * @var string
         * @Expose
	 * @ORM\ManyToOne (targetEntity="Provincia")
         * @ORM\JoinColumn (name="MUCLAPRO", referencedColumnName="PRCLAPRO")
	 * @ORM\Id
         */
        private $provincia;

        /**
         * @var string
         * @Expose
         * @ORM\Column(name="MUCLAMUN", type="string", nullable=true)
	 * @ORM\Id
         */
        private $claveMunicipio;

        /**
         * @var string
         * @Expose
         * @ORM\Column(name="MUDIGITO", type="string", nullable=true)
         */
        private $digito;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="MUDESCAM", type="string", nullable=true)
         */
        private $descripcionCas;

        /**
         * @var string
         * @Expose
         * @ORM\Column(name="MUDESCRE", type="string", nullable=true)
         */
        private $descripcionEus;

	public function getProvincia() {
	    return $this->provincia;
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

	public function setProvincia(Provincia $provincia) {
	    $this->provincia = $provincia;
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

	public function getClaveMunicipio() {
	    return $this->claveMunicipio;
	}

	public function setClaveMunicipio($claveMunicipio) {
	    $this->claveMunicipio = $claveMunicipio;
	}



}
