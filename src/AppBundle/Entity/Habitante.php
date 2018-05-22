<?php

    namespace AppBundle\Entity;

    use Doctrine\ORM\Mapping as ORM;
    use JMS\Serializer\Annotation as Serializer;
    use JMS\Serializer\Annotation\ExclusionPolicy;
    use JMS\Serializer\Annotation\Expose;

    /**
     * Biztanleen taula
     *
     * @ORM\Table(name="TBWPHABI")
     * @ORM\Entity(repositoryClass="AppBundle\Repository\HabitanteRepository")
     * @ExclusionPolicy("all")
     */
    class Habitante
    {

        /**
         * @var string
         * @Expose
         * @ORM\Column(name="HACLAMUN", type="string", nullable=true)
         */
        private $municipio;

        /**
         * @var string
         * @Expose
         * @ORM\Column(name="HACLAVIV", type="string", nullable=true)
         */
        private $claveVivienda;

        /**
         * @var string
         * @Expose
         * @ORM\Column(name="HACLAORD", type="string", nullable=true)
         */
        private $numOrdenHabitante;

        /**
         * @var string
         * @Expose
         * @ORM\Column(name="HANORDEN", type="string", nullable=true)
         */
        private $numOrdenHabitantePadron91;

        /**
         * @var string
         * @Expose
         * @ORM\Column(name="HAAPELL1",type="string", nullable=true)
         */
        private $apellido1;

        /**
         * @var string
         * @Expose
         * @ORM\Column(name="HAAPELL2", type="string", nullable=true)
         */
        private $apellido2;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="HANOMBRE", type="string", nullable=true)
         */
        private $nombre;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="HASITUAC", type="string", nullable=true)
         */
        private $situacionResidencia;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="HACOSEXO", type="string", nullable=true)
         */
        private $sexo;

	/**
         * @var string
         * @Expose
	 * @ORM\ManyToOne(targetEntity="Pais")
         * @ORM\JoinColumn(name="HAPAISNA", referencedColumnName="NACLANAC")
         */
        private $paisNacimiento;

	/**
         * @var string
         * @Expose
	 * @ORM\ManyToOne(targetEntity="Provincia")
         * @ORM\JoinColumn(name="HAPROVNA", referencedColumnName="PRCLAPRO")
         */
        private $provinciaNacimiento;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="HAMUNINA", type="string", nullable=true)
         */
        private $municipioNacimiento;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="HALMUNNA", type="string", nullable=true)
         */
        private $literalMunicipioNacimiento;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="HAFECHNA", type="string", nullable=true)
         */
        private $fechaNacimiento;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="HADOBLEN", type="string", nullable=true)
         */
        private $extranjero;

	/**
         * @var string
         * @Expose
	 * @ORM\ManyToOne(targetEntity="Pais")
         * @ORM\JoinColumn(name="HANACION", referencedColumnName="NACLANAC")
         */
        private $paisNacionalidadExtranjera;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="HAFECHCA", type="string", nullable=true)
         */
        private $fechaRectificacion;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="HALEERES", type="string", nullable=true)
         */
        private $sabeLeerEscribir;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="HATITULA", type="string", nullable=true)
         */
        private $titulacionAcademica;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="HAPAISPR", type="string", nullable=true)
         */
        private $paisProcedencia;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="HAPROVPR", type="string", nullable=true)
         */
	private $provinciaProcedencia;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="HAMUNIPR", type="string", nullable=true)
         */
        private $municipioProcedencia;
	
	/**
         * @var string
         * @Expose
         * @ORM\Column(name="HAFECHPR", type="string", nullable=true)
         */
        private $anoLlegada;

        /**
         * @var string
         * @Expose
         * @ORM\Column(name="HANUMDNI", type="string", nullable=true)
         */
        private $numDocumento;

	
        /**
         * @var string
         * @Expose
         * @ORM\Column(name="HACLADNI", type="string", nullable=true)
         */
        private $claveDocumento;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="HANUMELE", type="string", nullable=true)
         */
        private $numElectoral;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="HATIPOVA", type="string", nullable=true)
         */
        private $tipoVariacion;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="HAOPERVA", type="string", nullable=true)
         */
        private $operador;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="HAFECHVA", type="string", nullable=true)
         */
        private $fechaVariacion;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="HAHORAVA", type="string", nullable=true)
         */
        private $horaVariacion;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="HATIPOAL", type="string", nullable=true)
         */
        private $tipoAlta;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="HAFECHAL", type="string", nullable=true)
         */
        private $fechaAlta;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="HATIPOMO", type="string", nullable=true)
         */
        private $tipoModificacion;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="HAFECHMO", type="string", nullable=true)
         */
        private $fechaModificacion;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="HATIPOBA", type="string", nullable=true)
         */
        private $tipoBaja;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="HAFECHBA", type="string", nullable=true)
         */
        private $fechaBaja;

	/**
         * @ORM\Column(name="HACLAINI", type="string", nullable=true)
         * @ORM\Id
         * @var string
         * @Expose
         */
        private $claveInicialHabitante;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="HACENSOE", type="string", nullable=true)
         */
        private $lugarEmpadronamiento1995;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="HAPAISCE", type="string", nullable=true)
         */
        private $paisLugarEmpadronamiento;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="HAPROVCE", type="string", nullable=true)
         */
        private $provinciaLugarEmpadronamiento;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="HAMUNICE", type="string", nullable=true)
         */
        private $municipioLugarEmpadronamiento;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="HAPAISDE", type="string", nullable=true)
         */
        private $paisDestino;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="HAPROVDE", type="string", nullable=true)
         */
        private $provinciaDestino;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="HAMUNIDE", type="string", nullable=true)
         */
        private $municipioDestino;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="HADISTDE", type="string", nullable=true)
         */
        private $distritoDestino;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="HASECCDE", type="string", nullable=true)
         */
        private $seccionDestino;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="HAESTHAB", type="string", nullable=true)
         */
        private $estadoHabitanteEnRenovacion;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="HACLAV91", type="string", nullable=true)
         */
        private $claveInicial1991;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="HACLAV96", type="string", nullable=true)
         */
        private $claveInicial1996;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="HAFECHOH", type="string", nullable=true)
         */
        private $fechaOperacion;

	/**
         * @var string
         * @Expose
         * @ORM\Column(name="HAHORAOH", type="string", nullable=true)
         */
        private $horaOperacion;

	public function getId() {
	    return $this->claveDocumento;
	}

	public function getMunicipio() {
	    return $this->municipio;
	}

	public function getClaveVivienda() {
	    return $this->claveVivienda;
	}

	public function getNumOrdenHabitante() {
	    return $this->numOrdenHabitante;
	}

	public function getNumOrdenHabitantePadron91() {
	    return $this->numOrdenHabitantePadron91;
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

	public function getSituacionResidencia() {
	    return $this->situacionResidencia;
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

	public function getTitulacionAcademica() {
	    return $this->titulacionAcademica;
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

	public function getNumElectoral() {
	    return $this->numElectoral;
	}

	public function getTipoVariacion() {
	    return $this->tipoVariacion;
	}

	public function getOperador() {
	    return $this->operador;
	}

	public function getFechaVariacion() {
	    return $this->fechaVariacion;
	}

	public function getHoraVariacion() {
	    return $this->horaVariacion;
	}

	public function getTipoAlta() {
	    return $this->tipoAlta;
	}

	public function getFechaAlta() {
	    return $this->fechaAlta;
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
	    $this->claveVivienda = $claveVivienda;
	}

	public function setNumOrdenHabitante($numOrdenHabitante) {
	    $this->numOrdenHabitante = $numOrdenHabitante;
	}

	public function setNumOrdenHabitantePadron91($numOrdenHabitantePadron91) {
	    $this->numOrdenHabitantePadron91 = $numOrdenHabitantePadron91;
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

	public function setSituacionResidencia($situacionResidencia) {
	    $this->situacionResidencia = $situacionResidencia;
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

	public function setTitulacionAcademica($titulacionAcademica) {
	    $this->titulacionAcademica = $titulacionAcademica;
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

//	public function setNumDocumento($numDocumento) {
//	    $this->numDocumento = $numDocumento;
//	}

	public function setClaveDocumento($claveDocumento) {
	    $this->claveDocumento = $claveDocumento;
	}

	public function setNumElectoral($numElectoral) {
	    $this->numElectoral = $numElectoral;
	}

	public function setTipoVariacion($tipoVariacion) {
	    $this->tipoVariacion = $tipoVariacion;
	}

	public function setOperador($operador) {
	    $this->operador = $operador;
	}

	public function setFechaVariacion($fechaVariacion) {
	    $this->fechaVariacion = $fechaVariacion;
	}

	public function setHoraVariacion($horaVariacion) {
	    $this->horaVariacion = $horaVariacion;
	}

	public function setTipoAlta($tipoAlta) {
	    $this->tipoAlta = $tipoAlta;
	}

	public function setFechaAlta($fechaAlta) {
	    $this->fechaAlta = $fechaAlta;
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

	public function setFechaOperacion($fechaOperacion) {
	    $this->fechaOperacion = $fechaOperacion;
	}

	public function setHoraOperacion($horaOperacion) {
	    $this->horaOperacion = $horaOperacion;
	}
	public function getLiteralMunicipioNacimiento() {
	    return $this->literalMunicipioNacimiento;
	}

	public function setLiteralMunicipioNacimiento($literalMunicipioNacimiento) {
	    $this->literalMunicipioNacimiento = $literalMunicipioNacimiento;
	}

}
