<?php

namespace AppBundle\Services\NISAE;

class X53jiServicioIntermediacion extends \SoapClient
{

    /**
     * @var array $classmap The defined classes
     */
    private static $classmap = array (
  'Consulta' => 'AppBundle\Services\NISAE\Consulta',
  'DatosConsulta' => 'AppBundle\Services\NISAE\DatosConsulta',
  'DatosEntradaPadron' => 'AppBundle\Services\NISAE\DatosEntradaPadron',
  'DatosSalidaPadron' => 'AppBundle\Services\NISAE\DatosSalidaPadron',
  'DomicilioPadron' => 'AppBundle\Services\NISAE\DomicilioPadron',
  'EstadoResultado' => 'AppBundle\Services\NISAE\EstadoResultado',
  'Habitantes' => 'AppBundle\Services\NISAE\Habitantes',
  'Habitante' => 'AppBundle\Services\NISAE\Habitante',
  'Retorno' => 'AppBundle\Services\NISAE\Retorno',
  'DatosEspecificos' => 'AppBundle\Services\NISAE\DatosEspecificos',
  'Traza' => 'AppBundle\Services\NISAE\Traza',
  'Atributos' => 'AppBundle\Services\NISAE\Atributos',
  'DatosGenericos' => 'AppBundle\Services\NISAE\DatosGenericos',
  'Emisor' => 'AppBundle\Services\NISAE\Emisor',
  'Estado' => 'AppBundle\Services\NISAE\Estado',
  'Funcionario' => 'AppBundle\Services\NISAE\Funcionario',
  'Procedimiento' => 'AppBundle\Services\NISAE\Procedimiento',
  'Respuesta' => 'AppBundle\Services\NISAE\Respuesta',
  'Solicitante' => 'AppBundle\Services\NISAE\Solicitante',
  'Titular' => 'AppBundle\Services\NISAE\Titular',
  'Transmision' => 'AppBundle\Services\NISAE\Transmision',
  'TransmisionDatos' => 'AppBundle\Services\NISAE\TransmisionDatos',
  'Transmisiones' => 'AppBundle\Services\NISAE\Transmisiones',
  'Peticion' => 'AppBundle\Services\NISAE\Peticion',
  'Solicitudes' => 'AppBundle\Services\NISAE\Solicitudes',
  'SolicitudTransmision' => 'AppBundle\Services\NISAE\SolicitudTransmision',
);

    /**
     * @param array $options A array of config values
     * @param string $wsdl The wsdl file to use
     */
    public function __construct(array $options = array(), $wsdl = null)
    {
    
  foreach (self::$classmap as $key => $value) {
    if (!isset($options['classmap'][$key])) {
      $options['classmap'][$key] = $value;
    }
  }
      $options = array_merge(array (
  'features' => 1,
), $options);
      if (!$wsdl) {
        $wsdl = 'NISAE.wsdl';
      }
      parent::__construct($wsdl, $options);
    }

    /**
     * @param Peticion $peticion
     * @return Respuesta
     */
    public function peticionSincrona(Peticion $peticion)
    {
      return $this->__soapCall('peticionSincrona', array($peticion));
    }

}
