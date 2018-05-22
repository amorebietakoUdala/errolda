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
     * @ORM\Table(name="TBWPNACI")
     * @ORM\Entity(repositoryClass="AppBundle\Repository\PaisRepository")
     * @ExclusionPolicy("all")
     */
    class Pais
    {

        /**
         * @var string
         * @Expose
         * @ORM\Column (name="NACLANAC", type="string", nullable=true)
	 * @ORM\Id
         */
        private $id;

        /**
         * @var string
         * @Expose
         * @ORM\Column(name="NADESCAM", type="string", nullable=true)
         */
        private $descripcionCas;

        /**
         * @var string
         * @Expose
         * @ORM\Column(name="NADESCRE", type="string", nullable=true)
         */
	private $descripcionEustat;

	public function getId() {
	    return $this->id;
	}

	public function getDescripcionCas() {
	    return $this->descripcionCas;
	}

	public function getDescripcionEustat() {
	    return $this->descripcionEustat;
	}

	public function setDescripcionCas($descripcionCas) {
	    $this->descripcionCas = $descripcionCas;
	}

	public function setDescripcionEustat($descripcionEustat) {
	    $this->descripcionEustat = $descripcionEustat;
	}



}
