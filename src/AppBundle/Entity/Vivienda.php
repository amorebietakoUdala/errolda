<?php

    namespace AppBundle\Entity;

    use Doctrine\ORM\Mapping as ORM;
    use JMS\Serializer\Annotation as Serializer;
    use JMS\Serializer\Annotation\ExclusionPolicy;
    use JMS\Serializer\Annotation\Expose;

    /**
     * Etxebizitzen taula
     *
     * @ORM\Table(name="TBWPVIVI")
     * @ORM\Entity(repositoryClass="AppBundle\Repository\ViviendaRepository")
     * @ExclusionPolicy("all")
     */
    class Vivienda
    {
	/**
         * @var string
         * @Expose
	 * @ORM\Id
         * @ORM\Column(name="VICLAMUN", type="string", nullable=true)
         */
        private $municipio;

	/**
         * @var string
         * @Expose
         * @ORM\Id
	 * @ORM\Column(name="VICLAVIV", type="string", nullable=true)
         */
        private $claveVivienda;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VICENTID", type="string", nullable=true)
         */
        private $entidad;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VICDISTR", type="string", nullable=true)
         */
        private $distrito;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VICSECCI", type="string", nullable=true)
         */
        private $seccion;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VIDISEVI", type="string", nullable=true)
         */
        private $numeroVivienda;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VIIDENVI", type="string", nullable=true)
         */
        private $idViviendaEustat;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VICMANZA", type="string", nullable=true)
         */
        private $manzana;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VICEDIFI", type="string", nullable=true)
         */
        private $edificio;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VICHABIT", type="string", nullable=true)
         */
        private $habitatNucleo;

	/**
         * @var string
         * @Expose
	 * @ORM\ManyToOne(targetEntity="Calle")
         * @ORM\JoinColumns({
         *   @ORM\JoinColumn(name="VICCALLE", referencedColumnName="CACLACAL"),
         *   @ORM\JoinColumn(name="VICLAMUN", referencedColumnName="CACLAMUN")
	 * })
         */
        private $calle;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VICASERI", type="string", nullable=true)
         */
        private $caserio;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VIBLOQUE", type="string", nullable=true)
         */
        private $bloque;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VINUPORT", type="string", nullable=true)
         */
        private $portal;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VIBISDUP", type="string", nullable=true)
         */
        private $bis;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VIKILOME", type="string", nullable=true)
         */
        private $kilometro;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VIESCALE", type="string", nullable=true)
         */
        private $escalera;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VINUPISO", type="string", nullable=true)
         */
        private $piso;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VINUMANO", type="string", nullable=true)
         */
	private $mano;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VIPUERTA", type="string", nullable=true)
         */
        private $puerta;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VIDIRECC", type="string", nullable=true)
         */
        private $direccion;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VICPOSTA", type="string", nullable=true)
         */
        private $codigoPostal;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VINUMFAM", type="string", nullable=true)
         */
        private $numeroFamilias;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VINUMPER", type="string", nullable=true)
         */
        private $numeroPersonas;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VITFNOPR", type="string", nullable=true)
         */
        private $prefijoTelefono;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VITFNONU", type="string", nullable=true)
         */
        private $restoTelefono;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VITRESPT", type="string", nullable=true)
         */
        private $transeuntesEspanolesTotal;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VITRESPV", type="string", nullable=true)
         */
        private $transeuntesEspanolesVarones;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VITRESPM", type="string", nullable=true)
         */
        private $transeuntesEspanolesMujeres;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VITREXTT", type="string", nullable=true)
         */
        private $transeuntesExtranjerosTotal;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VITREXTV", type="string", nullable=true)
         */
        private $transeuntesExtranjerosVarones;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VITREXTM", type="string", nullable=true)
         */
        private $transeuntesExtranjerosMujeres;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VIPRTOTA", type="string", nullable=true)
         */
        private $presentesTotal;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VIPRVARO", type="string", nullable=true)
         */
        private $presentesVarones;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VIPRMUJE", type="string", nullable=true)
         */
        private $presentesMujeres;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VIAUTOTA", type="string", nullable=true)
         */
        private $ausentesTotal;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VIAUVARO", type="string", nullable=true)
         */
        private $ausentesVarones;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VIAUMUJE", type="string", nullable=true)
         */
        private $ausentesMujeres;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VIDENOMI", type="string", nullable=true)
         */
        private $denominacionEstablecimiento;
	
	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VICACTIV", type="string", nullable=true)
         */
        private $actividadEstablecimiento;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VIREVISI", type="string", nullable=true)
         */
        private $viviendaRevisada;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VIESTVIV", type="string", nullable=true)
         */
        private $estadoVivienda;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VIFECHOV", type="string", nullable=true)
         */
        private $fechaOperacion;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VIHORAOV", type="string", nullable=true)
         */
        private $horaOperacion;
	
	private $direccionCompleta;

	public function getId() {
	    return $this->id;
	}

	public function getMunicipio() {
	    return $this->municipio;
	}

	public function getClaveVivienda() {
	    return $this->claveVivienda;
	}

	public function getEntidad() {
	    return $this->entidad;
	}

	public function getDistrito() {
	    return $this->distrito;
	}

	public function getSeccion() {
	    return $this->seccion;
	}

	public function getNumeroVivienda() {
	    return $this->numeroVivienda;
	}

	public function getIdViviendaEustat() {
	    return $this->idViviendaEustat;
	}

	public function getManzana() {
	    return $this->manzana;
	}

	public function getEdificio() {
	    return $this->edificio;
	}

	public function getHabitatNucleo() {
	    return $this->habitatNucleo;
	}

	public function getCalle() {
	    return $this->calle;
	}

	public function getCaserio() {
	    return $this->caserio;
	}

	public function getBloque() {
	    return $this->bloque;
	}

	public function getPortal() {
	    return $this->portal;
	}

	public function getBis() {
	    return $this->bis;
	}

	public function getKilometro() {
	    return $this->kilometro;
	}

	public function getEscalera() {
	    return trim($this->escalera);
	}

	public function getPiso() {
	    return $this->piso;
	}

	public function getMano() {
	    return $this->mano;
	}

	public function getPuerta() {
	    return $this->puerta;
	}

	public function getDireccion() {
	    return $this->direccion;
	}

	public function getCodigoPostal() {
	    return $this->codigoPostal;
	}

	public function getNumeroFamilias() {
	    return $this->numeroFamilias;
	}

	public function getNumeroPersonas() {
	    return $this->numeroPersonas;
	}

	public function getPrefijoTelefono() {
	    return $this->prefijoTelefono;
	}

	public function getRestoTelefono() {
	    return $this->restoTelefono;
	}

	public function getTranseuntesEspanolesTotal() {
	    return $this->transeuntesEspanolesTotal;
	}

	public function getTranseuntesEspanolesVarones() {
	    return $this->transeuntesEspanolesVarones;
	}

	public function getTranseuntesEspanolesMujeres() {
	    return $this->transeuntesEspanolesMujeres;
	}

	public function getTranseuntesExtranjerosTotal() {
	    return $this->transeuntesExtranjerosTotal;
	}

	public function getTranseuntesExtranjerosVarones() {
	    return $this->transeuntesExtranjerosVarones;
	}

	public function getTranseuntesExtranjerosMujeres() {
	    return $this->transeuntesExtranjerosMujeres;
	}

	public function getPresentesTotal() {
	    return $this->presentesTotal;
	}

	public function getPresentesVarones() {
	    return $this->presentesVarones;
	}

	public function getPresentesMujeres() {
	    return $this->presentesMujeres;
	}

	public function getAusentesTotal() {
	    return $this->ausentesTotal;
	}

	public function getAusentesVarones() {
	    return $this->ausentesVarones;
	}

	public function getAusentesMujeres() {
	    return $this->ausentesMujeres;
	}

	public function getDenominacionEstablecimiento() {
	    return $this->denominacionEstablecimiento;
	}

	public function getActividadEstablecimiento() {
	    return $this->actividadEstablecimiento;
	}

	public function getViviendaRevisada() {
	    return $this->viviendaRevisada;
	}

	public function getEstadoVivienda() {
	    return $this->estadoVivienda;
	}

	public function getFechaOperacion() {
	    return $this->fechaOperacion;
	}

	public function getHoraOperacion() {
	    return $this->horaOperacion;
	}

	public function setMunicipio($municipio) {
	    $this->municipio = $municipio;
	}

	public function setClaveVivienda($claveVivienda) {
	    $this->$claveVivienda = $claveVivienda;
	}

	public function setEntidad($entidad) {
	    $this->entidad = $entidad;
	}

	public function setDistrito($distrito) {
	    $this->distrito = $distrito;
	}

	public function setSeccion($seccion) {
	    $this->seccion = $seccion;
	}

	public function setNumeroVivienda($numeroVivienda) {
	    $this->numeroVivienda = $numeroVivienda;
	}

	public function setIdViviendaEustat($idViviendaEustat) {
	    $this->idViviendaEustat = $idViviendaEustat;
	}

	public function setManzana($manzana) {
	    $this->manzana = $manzana;
	}

	public function setEdificio($edificio) {
	    $this->edificio = $edificio;
	}

	public function setHabitatNucleo($habitatNucleo) {
	    $this->habitatNucleo = $habitatNucleo;
	}

	public function setCalle($calle) {
	    $this->calle = $calle;
	}

	public function setCaserio($caserio) {
	    $this->caserio = $caserio;
	}

	public function setBloque($bloque) {
	    $this->bloque = $bloque;
	}

	public function setPortal($portal) {
	    $this->portal = $portal;
	}

	public function setBis($bis) {
	    $this->bis = $bis;
	}

	public function setKilometro($kilometro) {
	    $this->kilometro = $kilometro;
	}

	public function setEscalera($escalera) {
	    $this->escalera = $escalera;
	}

	public function setPiso($piso) {
	    $this->piso = $piso;
	}

	public function setMano($mano) {
	    $this->mano = $mano;
	}

	public function setPuerta($puerta) {
	    $this->puerta = $puerta;
	}

	public function setDireccion($direccion) {
	    $this->direccion = $direccion;
	}

	public function setCodigoPostal($codigoPostal) {
	    $this->codigoPostal = $codigoPostal;
	}

	public function setNumeroFamilias($numeroFamilias) {
	    $this->numeroFamilias = $numeroFamilias;
	}

	public function setNumeroPersonas($numeroPersonas) {
	    $this->numeroPersonas = $numeroPersonas;
	}

	public function setPrefijoTelefono($prefijoTelefono) {
	    $this->prefijoTelefono = $prefijoTelefono;
	}

	public function setRestoTelefono($restoTelefono) {
	    $this->restoTelefono = $restoTelefono;
	}

	public function setTranseuntesEspanolesTotal($transeuntesEspanolesTotal) {
	    $this->transeuntesEspanolesTotal = $transeuntesEspanolesTotal;
	}

	public function setTranseuntesEspanolesVarones($transeuntesEspanolesVarones) {
	    $this->transeuntesEspanolesVarones = $transeuntesEspanolesVarones;
	}

	public function setTranseuntesEspanolesMujeres($transeuntesEspanolesMujeres) {
	    $this->transeuntesEspanolesMujeres = $transeuntesEspanolesMujeres;
	}

	public function setTranseuntesExtranjerosTotal($transeuntesExtranjerosTotal) {
	    $this->transeuntesExtranjerosTotal = $transeuntesExtranjerosTotal;
	}

	public function setTranseuntesExtranjerosVarones($transeuntesExtranjerosVarones) {
	    $this->transeuntesExtranjerosVarones = $transeuntesExtranjerosVarones;
	}

	public function setTranseuntesExtranjerosMujeres($transeuntesExtranjerosMujeres) {
	    $this->transeuntesExtranjerosMujeres = $transeuntesExtranjerosMujeres;
	}

	public function setPresentesTotal($presentesTotal) {
	    $this->presentesTotal = $presentesTotal;
	}

	public function setPresentesVarones($presentesVarones) {
	    $this->presentesVarones = $presentesVarones;
	}

	public function setPresentesMujeres($presentesMujeres) {
	    $this->presentesMujeres = $presentesMujeres;
	}

	public function setAusentesTotal($ausentesTotal) {
	    $this->ausentesTotal = $ausentesTotal;
	}

	public function setAusentesVarones($ausentesVarones) {
	    $this->ausentesVarones = $ausentesVarones;
	}

	public function setAusentesMujeres($ausentesMujeres) {
	    $this->ausentesMujeres = $ausentesMujeres;
	}

	public function setDenominacionEstablecimiento($denominacionEstablecimiento) {
	    $this->denominacionEstablecimiento = $denominacionEstablecimiento;
	}

	public function setActividadEstablecimiento($actividadEstablecimiento) {
	    $this->actividadEstablecimiento = $actividadEstablecimiento;
	}

	public function setViviendaRevisada($viviendaRevisada) {
	    $this->viviendaRevisada = $viviendaRevisada;
	}

	public function setEstadoVivienda($estadoVivienda) {
	    $this->estadoVivienda = $estadoVivienda;
	}

	public function setFechaOperacion($fechaOperacion) {
	    $this->fechaOperacion = $fechaOperacion;
	}

	public function setHoraOperacion($horaOperacion) {
	    $this->horaOperacion = $horaOperacion;
	}
	/**
	 * 
	 * @return String
	 */
	public function getDireccionCompleta() {
	    $direccionCompleta = $this->calle.', ';
	    $direccionCompleta = (trim($this->caserio) != '000' ? $direccionCompleta.trim($this->caserio) : $direccionCompleta);
	    $direccionCompleta = $direccionCompleta.$this->kilometro;
	    $direccionCompleta = (trim($this->bloque) != '' ? $direccionCompleta.trim($this->bloque) : $direccionCompleta);
	    $direccionCompleta = ( is_numeric(trim($this->portal)) ? $direccionCompleta.' '.intval($this->portal) : $direccionCompleta.' '.trim($this->portal));
	    $direccionCompleta = (trim($this->bis) == 'Y' ? $direccionCompleta.' BIS' : $direccionCompleta);
	    $direccionCompleta = $direccionCompleta.', ';
	    $direccionCompleta = (trim($this->escalera) != '' ? $direccionCompleta.' ESK/ESC: '.trim($this->escalera) : $direccionCompleta);
	    if (!is_numeric(trim($this->piso))) {
		$direccionCompleta = (trim($this->piso) != '' ? $direccionCompleta.' '.trim($this->piso) : $direccionCompleta);
	    } else {
		$direccionCompleta = $direccionCompleta.' '.intval($this->piso);
	    }
	    $direccionCompleta = (trim($this->mano) != '' ? $direccionCompleta.'-'.trim($this->mano) : $direccionCompleta);
	    $direccionCompleta = (trim($this->puerta) != '' ? $direccionCompleta.'-'.trim($this->puerta) : $direccionCompleta);
	    $this->direccionCompleta = $direccionCompleta;
	    return $this->direccionCompleta;
	}

	/**
	 * 
	 * @return String
	 */
	public function __toString() {
	    return $this->getDireccionCompleta();
	}
	
    }
