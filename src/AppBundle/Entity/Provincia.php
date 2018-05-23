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
     * @ORM\Table(name="TBWPPROV")
     * @ORM\Entity(repositoryClass="AppBundle\Repository\ProvinciaRepository")
     * @ExclusionPolicy("all")
     */
    class Provincia
    {

        /**
         * @var string
         * @Expose
         * @ORM\Column(name="PRCLAPRO", type="string", nullable=true)
	 * @ORM\Id
         */
        private $id;

        /**
         * @var string
         * @Expose
         * @ORM\Column(name="PRDESCAM", type="string", nullable=true)
         */
        private $descripcionCas;

        /**
         * @var string
         * @Expose
         * @ORM\Column(name="PRDESCRE", type="string", nullable=true)
         */
        private $descripcionEus;

	public function getId() {
	    return $this->id;
	}

	public function getDescripcionCas() {
	    return trim($this->descripcionCas);
	}

	public function getDescripcionEus() {
	    return trim($this->descripcionEus);
	}

	public function setDescripcionCas($descripcionCas) {
	    $this->descripcionCas = $descripcionCas;
	}

	public function setDescripcionEus($descripcionEus) {
	    $this->descripcionEus = $descripcionEus;
	}

	public function __toString() {
	    return $this->descripcionCas;
	}


}
