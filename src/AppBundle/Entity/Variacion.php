<?php

    namespace AppBundle\Entity;

    use Doctrine\ORM\Mapping as ORM;
    use JMS\Serializer\Annotation as Serializer;
    use JMS\Serializer\Annotation\ExclusionPolicy;
    use JMS\Serializer\Annotation\Expose;

    /**
     * Biztanleen taula
     *
     * @ORM\Table(name="TBWPVARI")
     * @ORM\Entity(repositoryClass="AppBundle\Repository\VariacionRepository")
     * @ExclusionPolicy("all")
     */
    class Variacion
    {

        /**
         * @var string
         * @Expose
	 * @ORM\ManyToOne (targetEntity="Habitante")
         * @ORM\JoinColumn(name="VACLIDEN", referencedColumnName="HACLAINI")
	 * @ORM\Id
         */
        private $habitante;

        /**
         * @var string
         * @Expose
         * @ORM\Column(name="VACLFALT", type="string", nullable=true)
	 * @ORM\Id
         */
        private $fechaAlta;

        /**
         * @var string
         * @Expose
         * @ORM\Column(name="VACLFVAR", type="string", nullable=true)
	 * @ORM\Id
         */
        private $fechaVariacion;

       /**
         * @var string
         * @Expose
         * @ORM\Column(name="VACLTVAR", type="string", nullable=true)
	 * @ORM\Id
         */
        private $tipoVariacion;

       /**
         * @var string
         * @Expose
         * @ORM\Column(name="VACLAVEA", type="string", nullable=true)
	 * @ORM\Id
         */
        private $claveActual;

       /**
         * @var string
         * @Expose
         * @ORM\Column(name="VACLAMUN", type="string", nullable=true)
         */
        private $claveMunicipio;

       /**
         * @var string
         * @Expose
         * @ORM\Column(name="VACLAVIV", type="string", nullable=true)
         */
        private $claveVivienda;
	
	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VACENTID", type="string", nullable=true)
         */
        private $claveEntidad;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VACENTIC", type="string", nullable=true)
         */
        private $claveEntidadColectiva;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VACDISTR", type="string", nullable=true)
         */
        private $claveDistrito;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VACSECCI", type="string", nullable=true)
         */
        private $claveSeccion;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VADISEVI", type="string", nullable=true)
         */
        private $numViviendaEnDistSecc;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VAIDENVI", type="string", nullable=true)
         */
        private $identificacionViviendaEustat;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VACMANZA", type="string", nullable=true)
         */
        private $manzana;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VACEDIFI", type="string", nullable=true)
         */
        private $edificio;
	
	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VACHABIT", type="string", nullable=true)
         */
        private $habitat;

	/**
         * @var string
         * @Expose
	 * @ORM\ManyToOne(targetEntity="Calle")
         * @ORM\JoinColumns({
         *   @ORM\JoinColumn(name="VACCALLE", referencedColumnName="CACLACAL"),
         *   @ORM\JoinColumn(name="VACLAMUN", referencedColumnName="CACLAMUN")
	 * })
         */
        private $calle;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VACASERI", type="string", nullable=true)
         */
        private $caserio;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VABLOQUE", type="string", nullable=true)
         */
	private $bloque;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VANUPORT", type="string", nullable=true)
         */
        private $portal;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VABISDUP", type="string", nullable=true)
         */
        private $bis;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VAKILOME", type="string", nullable=true)
         */
        private $kilometro;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VAESCALE", type="string", nullable=true)
         */
        private $escalera;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VANUPISO", type="string", nullable=true)
         */
        private $piso;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VANUMANO", type="string", nullable=true)
         */
        private $mano;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VAPUERTA", type="string", nullable=true)
         */
        private $puerta;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VADIRECC", type="string", nullable=true)
         */
        private $restoDireccion;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VACPOSTA", type="string", nullable=true)
         */
        private $codigoPostal;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VANUMFAM", type="string", nullable=true)
         */
        private $numeroFamilias;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VANUMPER", type="string", nullable=true)
         */
        private $numeroPersonas;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VATFNOPR", type="string", nullable=true)
         */
        private $prefijoTelefono;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VATFNONU", type="string", nullable=true)
         */
        private $restoTelefono;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VATRESPT", type="string", nullable=true)
         */
        private $transeuntesEspanolesTotal;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VATRESPV", type="string", nullable=true)
         */
        private $transeuntesEspanolesVarones;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VATRESPM", type="string", nullable=true)
         */
        private $transeuntesEspanolesMujeres;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VATREXTT", type="string", nullable=true)
         */
        private $transeuntesExtranjerosTotal;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VATREXTV", type="string", nullable=true)
         */
        private $transeuntesExtranjerosVarones;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VATREXTM", type="string", nullable=true)
         */
        private $transeuntesExtranjerosMujeres;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VAPRTOTA", type="string", nullable=true)
         */
        private $presentesTotal;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VAPRVARO", type="string", nullable=true)
         */
        private $presentesVarones;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VAPRMUJE", type="string", nullable=true)
         */
        private $presentesMujeres;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VAAUTOTA", type="string", nullable=true)
         */
        private $ausentesTotal;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VAAUVARO", type="string", nullable=true)
         */
        private $ausentesVarones;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VAAUMUJE", type="string", nullable=true)
         */
        private $ausentesMujeres;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VADENOMI", type="string", nullable=true)
         */
        private $denominacionEstablecimiento;
	
	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VACACTIV", type="string", nullable=true)
         */
        private $actividadEstablecimiento;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VATIPVIV", type="string", nullable=true)
         */
        private $tipoVivienda;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VAREVISI", type="string", nullable=true)
         */
        private $viviendaRevisada;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VAESTVIV", type="string", nullable=true)
         */
        private $estadoVivienda;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VAFECHOV", type="string", nullable=true)
         */
        private $fechaOperacionVivienda;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VAHORAOV", type="string", nullable=true)
         */
        private $horaOperacionVivienda;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VACLMUNI", type="string", nullable=true)
         */
        private $claveMunicipioVivienda;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VACLVIVI", type="string", nullable=true)
         */
        private $claveViviendaVivienda;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VACLAORD", type="string", nullable=true)
         */
	private $numOrdenHabitante;
	
	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VANORDEN", type="string", nullable=true)
         */
	private $numOrdenHabitantePadron1991;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VAAPELL1", type="string", nullable=true)
         */
	private $apellido1;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VAAPELL2", type="string", nullable=true)
         */
	private $apellido2;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VANOMBRE", type="string", nullable=true)
         */
	private $nombre;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VASITUAC", type="string", nullable=true)
         */
	private $situacion;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VACOSEXO", type="string", nullable=true)
         */
	private $sexo;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VAPAISNA", type="string", nullable=true)
         */
	private $paisNacimiento;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VAPROVNA", type="string", nullable=true)
         */
	private $provinciaNacimiento;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VAMUNINA", type="string", nullable=true)
         */
	private $municipioNacimiento;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VALMUNNA", type="string", nullable=true)
         */
	private $literalMunicipioNacimiento;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VAFECHNA", type="string", nullable=true)
         */
	private $fechaNacimiento;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VADOBLEN", type="string", nullable=true)
         */
	private $extranjero;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VANACION", type="string", nullable=true)
         */
	private $paisNacionalidadExtranjera;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VAFECHCA", type="string", nullable=true)
         */
	private $fechaRectificacion;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VALEERES", type="string", nullable=true)
         */
	private $sabeLeerEscribir;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VATITULA", type="string", nullable=true)
         */
	private $titulacion;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VAPAISPR", type="string", nullable=true)
         */
	private $paisProcedencia;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VAPROVPR", type="string", nullable=true)
         */
	private $provinciaProcedencia;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VAMUNIPR", type="string", nullable=true)
         */
	private $municipioProcedencia;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VAFECHPR", type="string", nullable=true)
         */
	private $anoLlegada;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VANUMDNI", type="string", nullable=true)
         */
	private $numDocumento;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VACLADNI", type="string", nullable=true)
         */
	private $claveDocumento;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VANUMELE", type="string", nullable=true)
         */
	private $numeroElectoral;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VATIPOVA", type="string", nullable=true)
         */
	private $tipoVariacionHabitante;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VAOPERVA", type="string", nullable=true)
         */
	private $operador;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VAFECHVA", type="string", nullable=true)
         */
	private $fechaVariacionHabitante;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VAHORAVA", type="string", nullable=true)
         */
        private $horaVariacion;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VATIPOAL", type="string", nullable=true)
         */
        private $tipoAlta;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VAFECHAL", type="string", nullable=true)
         */
        private $fechaAltaHabitante;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VATIPOMO", type="string", nullable=true)
         */
        private $tipoModificacion;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VAFECHMO", type="string", nullable=true)
         */
        private $fechaModificacion;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VATIPOBA", type="string", nullable=true)
         */
        private $tipoBaja;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VAFECHBA", type="string", nullable=true)
         */
        private $fechaBaja;

	/**
         * @ORM\Column(name="VACLAINI", type="string", nullable=true)
         * @ORM\Id
         * @var string
         * @Expose
         */
        private $claveInicialHabitante;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VACENSOE", type="string", nullable=true)
         */
        private $lugarEmpadronamiento1995;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VAPAISCE", type="string", nullable=true)
         */
        private $paisLugarEmpadronamiento;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VAPROVCE", type="string", nullable=true)
         */
        private $provinciaLugarEmpadronamiento;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VAMUNICE", type="string", nullable=true)
         */
        private $municipioLugarEmpadronamiento;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VAPAISDE", type="string", nullable=true)
         */
        private $paisDestino;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VAPROVDE", type="string", nullable=true)
         */
        private $provinciaDestino;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VAMUNIDE", type="string", nullable=true)
         */
        private $municipioDestino;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VADISTDE", type="string", nullable=true)
         */
        private $distritoDestino;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VASECCDE", type="string", nullable=true)
         */
        private $seccionDestino;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VAESTHAB", type="string", nullable=true)
         */
        private $estadoHabitanteEnRenovacion;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VACLAV91", type="string", nullable=true)
         */
        private $claveInicial1991;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VACLAV96", type="string", nullable=true)
         */
        private $claveInicial1996;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VAFECHOH", type="string", nullable=true)
         */
        private $fechaOperacionHabitante;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VAHORAOH", type="string", nullable=true)
         */
        private $horaOperacionHabitante;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VARECTCE", type="string", nullable=true)
         */
        private $rectificacionCensoElectoral;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VARECTPA", type="string", nullable=true)
         */
        private $rectificacionPadronHabitantes;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VAFECHOP", type="string", nullable=true)
         */
        private $fechaOperacion;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="VAHORAOP", type="string", nullable=true)
         */
        private $horaOperacion;

	public function getHabitante() {
	    return $this->habitante;
	}

	public function getFechaAlta() {
	    return $this->fechaAlta;
	}

	public function getFechaVariacion() {
	    return $this->fechaVariacion;
	}

	public function getTipoVariacion() {
	    return $this->tipoVariacion;
	}

	public function getClaveActual() {
	    return $this->claveActual;
	}

	public function getClaveMunicipio() {
	    return $this->claveMunicipio;
	}

	public function getClaveVivienda() {
	    return $this->claveVivienda;
	}

	public function getClaveEntidad() {
	    return $this->claveEntidad;
	}

	public function getClaveEntidadColectiva() {
	    return $this->claveEntidadColectiva;
	}

	public function getClaveDistrito() {
	    return $this->claveDistrito;
	}

	public function getClaveSeccion() {
	    return $this->claveSeccion;
	}

	public function getNumViviendaEnDistSecc() {
	    return $this->numViviendaEnDistSecc;
	}

	public function getIdentificacionViviendaEustat() {
	    return $this->identificacionViviendaEustat;
	}

	public function getManzana() {
	    return $this->manzana;
	}

	public function getEdificio() {
	    return $this->edificio;
	}

	public function getHabitat() {
	    return $this->habitat;
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
	    return $this->escalera;
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

	public function getRestoDireccion() {
	    return $this->restoDireccion;
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

	public function getTipoVivienda() {
	    return $this->tipoVivienda;
	}

	public function getViviendaRevisada() {
	    return $this->viviendaRevisada;
	}

	public function getEstadoVivienda() {
	    return $this->estadoVivienda;
	}

	public function getFechaOperacionVivienda() {
	    return $this->fechaOperacionVivienda;
	}

	public function getHoraOperacionVivienda() {
	    return $this->horaOperacionVivienda;
	}

	public function getClaveMunicipioVivienda() {
	    return $this->claveMunicipioVivienda;
	}

	public function getClaveViviendaVivienda() {
	    return $this->claveViviendaVivienda;
	}

	public function getNumOrdenHabitante() {
	    return $this->numOrdenHabitante;
	}

	public function getNumOrdenHabitantePadron1991() {
	    return $this->numOrdenHabitantePadron1991;
	}

	public function getApellido1() {
	    return $this->apellido1;
	}

	public function getApellido2() {
	    return $this->apellido2;
	}

	public function getNombre() {
	    return $this->nombre;
	}

	public function getSituacion() {
	    return $this->situacion;
	}

	public function getSexo() {
	    return $this->sexo;
	}

	public function getPaisNacimiento() {
	    return $this->paisNacimiento;
	}

	public function getProvinciaNacimiento() {
	    return $this->provinciaNacimiento;
	}

	public function getMunicipioNacimiento() {
	    return $this->municipioNacimiento;
	}

	public function getLiteralMunicipioNacimiento() {
	    return $this->literalMunicipioNacimiento;
	}

	public function getFechaNacimiento() {
	    return $this->fechaNacimiento;
	}

	public function getExtranjero() {
	    return $this->extranjero;
	}

	public function getPaisNacionalidadExtranjera() {
	    return $this->paisNacionalidadExtranjera;
	}

	public function getFechaRectificacion() {
	    return $this->fechaRectificacion;
	}

	public function getSabeLeerEscribir() {
	    return $this->sabeLeerEscribir;
	}

	public function getTitulacion() {
	    return $this->titulacion;
	}

	public function getPaisProcedencia() {
	    return $this->paisProcedencia;
	}

	public function getProvinciaProcedencia() {
	    return $this->provinciaProcedencia;
	}

	public function getMunicipioProcedencia() {
	    return $this->municipioProcedencia;
	}

	public function getAnoLlegada() {
	    return $this->anoLlegada;
	}

	public function getNumDocumento() {
	    return $this->numDocumento;
	}

	public function getClaveDocumento() {
	    return $this->claveDocumento;
	}

	public function getNumeroElectoral() {
	    return $this->numeroElectoral;
	}

	public function getTipoVariacionHabitante() {
	    return $this->tipoVariacionHabitante;
	}

	public function getOperador() {
	    return $this->operador;
	}

	public function getFechaVariacionHabitante() {
	    return $this->fechaVariacionHabitante;
	}

	public function getHoraVariacion() {
	    return $this->horaVariacion;
	}

	public function getTipoAlta() {
	    return $this->tipoAlta;
	}

	public function getFechaAltaHabitante() {
	    return $this->fechaAltaHabitante;
	}

	public function getTipoModificacion() {
	    return $this->tipoModificacion;
	}

	public function getFechaModificacion() {
	    return $this->fechaModificacion;
	}

	public function getTipoBaja() {
	    return $this->tipoBaja;
	}

	public function getFechaBaja() {
	    return $this->fechaBaja;
	}

	public function getClaveInicialHabitante() {
	    return $this->claveInicialHabitante;
	}

	public function getLugarEmpadronamiento1995() {
	    return $this->lugarEmpadronamiento1995;
	}

	public function getPaisLugarEmpadronamiento() {
	    return $this->paisLugarEmpadronamiento;
	}

	public function getProvinciaLugarEmpadronamiento() {
	    return $this->provinciaLugarEmpadronamiento;
	}

	public function getMunicipioLugarEmpadronamiento() {
	    return $this->municipioLugarEmpadronamiento;
	}

	public function getPaisDestino() {
	    return $this->paisDestino;
	}

	public function getProvinciaDestino() {
	    return $this->provinciaDestino;
	}

	public function getMunicipioDestino() {
	    return $this->municipioDestino;
	}

	public function getDistritoDestino() {
	    return $this->distritoDestino;
	}

	public function getSeccionDestino() {
	    return $this->seccionDestino;
	}

	public function getEstadoHabitanteEnRenovacion() {
	    return $this->estadoHabitanteEnRenovacion;
	}

	public function getClaveInicial1991() {
	    return $this->claveInicial1991;
	}

	public function getClaveInicial1996() {
	    return $this->claveInicial1996;
	}

	public function getFechaOperacionHabitante() {
	    return $this->fechaOperacionHabitante;
	}

	public function getHoraOperacionHabitante() {
	    return $this->horaOperacionHabitante;
	}

	public function getRectificacionCensoElectoral() {
	    return $this->rectificacionCensoElectoral;
	}

	public function getRectificacionPadronHabitantes() {
	    return $this->rectificacionPadronHabitantes;
	}

	public function getFechaOperacion() {
	    return $this->fechaOperacion;
	}

	public function getHoraOperacion() {
	    return $this->horaOperacion;
	}

	public function setHabitante($habitante) {
	    $this->habitante = $habitante;
	}

	public function setFechaAlta($fechaAlta) {
	    $this->fechaAlta = $fechaAlta;
	}

	public function setFechaVariacion($fechaVariacion) {
	    $this->fechaVariacion = $fechaVariacion;
	}

	public function setTipoVariacion($tipoVariacion) {
	    $this->tipoVariacion = $tipoVariacion;
	}

	public function setClaveActual($claveActual) {
	    $this->claveActual = $claveActual;
	}

	public function setClaveMunicipio($claveMunicipio) {
	    $this->claveMunicipio = $claveMunicipio;
	}

	public function setClaveVivienda($claveVivienda) {
	    $this->claveVivienda = $claveVivienda;
	}

	public function setClaveEntidad($claveEntidad) {
	    $this->claveEntidad = $claveEntidad;
	}

	public function setClaveEntidadColectiva($claveEntidadColectiva) {
	    $this->claveEntidadColectiva = $claveEntidadColectiva;
	}

	public function setClaveDistrito($claveDistrito) {
	    $this->claveDistrito = $claveDistrito;
	}

	public function setClaveSeccion($claveSeccion) {
	    $this->claveSeccion = $claveSeccion;
	}

	public function setNumViviendaEnDistSecc($numViviendaEnDistSecc) {
	    $this->numViviendaEnDistSecc = $numViviendaEnDistSecc;
	}

	public function setIdentificacionViviendaEustat($identificacionViviendaEustat) {
	    $this->identificacionViviendaEustat = $identificacionViviendaEustat;
	}

	public function setManzana($manzana) {
	    $this->manzana = $manzana;
	}

	public function setEdificio($edificio) {
	    $this->edificio = $edificio;
	}

	public function setHabitat($habitat) {
	    $this->habitat = $habitat;
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

	public function setRestoDireccion($restoDireccion) {
	    $this->restoDireccion = $restoDireccion;
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

	public function setTipoVivienda($tipoVivienda) {
	    $this->tipoVivienda = $tipoVivienda;
	}

	public function setViviendaRevisada($viviendaRevisada) {
	    $this->viviendaRevisada = $viviendaRevisada;
	}

	public function setEstadoVivienda($estadoVivienda) {
	    $this->estadoVivienda = $estadoVivienda;
	}

	public function setFechaOperacionVivienda($fechaOperacionVivienda) {
	    $this->fechaOperacionVivienda = $fechaOperacionVivienda;
	}

	public function setHoraOperacionVivienda($horaOperacionVivienda) {
	    $this->horaOperacionVivienda = $horaOperacionVivienda;
	}

	public function setClaveMunicipioVivienda($claveMunicipioVivienda) {
	    $this->claveMunicipioVivienda = $claveMunicipioVivienda;
	}

	public function setClaveViviendaVivienda($claveViviendaVivienda) {
	    $this->claveViviendaVivienda = $claveViviendaVivienda;
	}

	public function setNumOrdenHabitante($numOrdenHabitante) {
	    $this->numOrdenHabitante = $numOrdenHabitante;
	}

	public function setNumOrdenHabitantePadron1991($numOrdenHabitantePadron1991) {
	    $this->numOrdenHabitantePadron1991 = $numOrdenHabitantePadron1991;
	}

	public function setApellido1($apellido1) {
	    $this->apellido1 = $apellido1;
	}

	public function setApellido2($apellido2) {
	    $this->apellido2 = $apellido2;
	}

	public function setNombre($nombre) {
	    $this->nombre = $nombre;
	}

	public function setSituacion($situacion) {
	    $this->situacion = $situacion;
	}

	public function setSexo($sexo) {
	    $this->sexo = $sexo;
	}

	public function setPaisNacimiento($paisNacimiento) {
	    $this->paisNacimiento = $paisNacimiento;
	}

	public function setProvinciaNacimiento($provinciaNacimiento) {
	    $this->provinciaNacimiento = $provinciaNacimiento;
	}

	public function setMunicipioNacimiento($municipioNacimiento) {
	    $this->municipioNacimiento = $municipioNacimiento;
	}

	public function setLiteralMunicipioNacimiento($literalMunicipioNacimiento) {
	    $this->literalMunicipioNacimiento = $literalMunicipioNacimiento;
	}

	public function setFechaNacimiento($fechaNacimiento) {
	    $this->fechaNacimiento = $fechaNacimiento;
	}

	public function setExtranjero($extranjero) {
	    $this->extranjero = $extranjero;
	}

	public function setPaisNacionalidadExtranjera($paisNacionalidadExtranjera) {
	    $this->paisNacionalidadExtranjera = $paisNacionalidadExtranjera;
	}

	public function setFechaRectificacion($fechaRectificacion) {
	    $this->fechaRectificacion = $fechaRectificacion;
	}

	public function setSabeLeerEscribir($sabeLeerEscribir) {
	    $this->sabeLeerEscribir = $sabeLeerEscribir;
	}

	public function setTitulacion($titulacion) {
	    $this->titulacion = $titulacion;
	}

	public function setPaisProcedencia($paisProcedencia) {
	    $this->paisProcedencia = $paisProcedencia;
	}

	public function setProvinciaProcedencia($provinciaProcedencia) {
	    $this->provinciaProcedencia = $provinciaProcedencia;
	}

	public function setMunicipioProcedencia($municipioProcedencia) {
	    $this->municipioProcedencia = $municipioProcedencia;
	}

	public function setAnoLlegada($anoLlegada) {
	    $this->anoLlegada = $anoLlegada;
	}

	public function setNumDocumento($numDocumento) {
	    $this->numDocumento = $numDocumento;
	}

	public function setClaveDocumento($claveDocumento) {
	    $this->claveDocumento = $claveDocumento;
	}

	public function setNumeroElectoral($numeroElectoral) {
	    $this->numeroElectoral = $numeroElectoral;
	}

	public function setTipoVariacionHabitante($tipoVariacionHabitante) {
	    $this->tipoVariacionHabitante = $tipoVariacionHabitante;
	}

	public function setOperador($operador) {
	    $this->operador = $operador;
	}

	public function setFechaVariacionHabitante($fechaVariacionHabitante) {
	    $this->fechaVariacionHabitante = $fechaVariacionHabitante;
	}

	public function setHoraVariacion($horaVariacion) {
	    $this->horaVariacion = $horaVariacion;
	}

	public function setTipoAlta($tipoAlta) {
	    $this->tipoAlta = $tipoAlta;
	}

	public function setFechaAltaHabitante($fechaAltaHabitante) {
	    $this->fechaAltaHabitante = $fechaAltaHabitante;
	}

	public function setTipoModificacion($tipoModificacion) {
	    $this->tipoModificacion = $tipoModificacion;
	}

	public function setFechaModificacion($fechaModificacion) {
	    $this->fechaModificacion = $fechaModificacion;
	}

	public function setTipoBaja($tipoBaja) {
	    $this->tipoBaja = $tipoBaja;
	}

	public function setFechaBaja($fechaBaja) {
	    $this->fechaBaja = $fechaBaja;
	}

	public function setClaveInicialHabitante($claveInicialHabitante) {
	    $this->claveInicialHabitante = $claveInicialHabitante;
	}

	public function setLugarEmpadronamiento1995($lugarEmpadronamiento1995) {
	    $this->lugarEmpadronamiento1995 = $lugarEmpadronamiento1995;
	}

	public function setPaisLugarEmpadronamiento($paisLugarEmpadronamiento) {
	    $this->paisLugarEmpadronamiento = $paisLugarEmpadronamiento;
	}

	public function setProvinciaLugarEmpadronamiento($provinciaLugarEmpadronamiento) {
	    $this->provinciaLugarEmpadronamiento = $provinciaLugarEmpadronamiento;
	}

	public function setMunicipioLugarEmpadronamiento($municipioLugarEmpadronamiento) {
	    $this->municipioLugarEmpadronamiento = $municipioLugarEmpadronamiento;
	}

	public function setPaisDestino($paisDestino) {
	    $this->paisDestino = $paisDestino;
	}

	public function setProvinciaDestino($provinciaDestino) {
	    $this->provinciaDestino = $provinciaDestino;
	}

	public function setMunicipioDestino($municipioDestino) {
	    $this->municipioDestino = $municipioDestino;
	}

	public function setDistritoDestino($distritoDestino) {
	    $this->distritoDestino = $distritoDestino;
	}

	public function setSeccionDestino($seccionDestino) {
	    $this->seccionDestino = $seccionDestino;
	}

	public function setEstadoHabitanteEnRenovacion($estadoHabitanteEnRenovacion) {
	    $this->estadoHabitanteEnRenovacion = $estadoHabitanteEnRenovacion;
	}

	public function setClaveInicial1991($claveInicial1991) {
	    $this->claveInicial1991 = $claveInicial1991;
	}

	public function setClaveInicial1996($claveInicial1996) {
	    $this->claveInicial1996 = $claveInicial1996;
	}

	public function setFechaOperacionHabitante($fechaOperacionHabitante) {
	    $this->fechaOperacionHabitante = $fechaOperacionHabitante;
	}

	public function setHoraOperacionHabitante($horaOperacionHabitante) {
	    $this->horaOperacionHabitante = $horaOperacionHabitante;
	}

	public function setRectificacionCensoElectoral($rectificacionCensoElectoral) {
	    $this->rectificacionCensoElectoral = $rectificacionCensoElectoral;
	}

	public function setRectificacionPadronHabitantes($rectificacionPadronHabitantes) {
	    $this->rectificacionPadronHabitantes = $rectificacionPadronHabitantes;
	}

	public function setFechaOperacion($fechaOperacion) {
	    $this->fechaOperacion = $fechaOperacion;
	}

	public function setHoraOperacion($horaOperacion) {
	    $this->horaOperacion = $horaOperacion;
	}


}
