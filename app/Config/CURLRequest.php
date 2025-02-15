<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

/**
 * Clase de configuración para CURLRequest.
 *
 * @package Config
 */
class CURLRequest extends BaseConfig
{
    /**
     * --------------------------------------------------------------------------
     * CURLRequest Share Options
     * --------------------------------------------------------------------------
     *
     * Si compartir las opciones entre solicitudes o no.
     *
     * Si es verdadero, todas las opciones no se restablecerán entre las solicitudes.
     * Puede causar un error de solicitud con encabezados innecesarios.
     *
     * @var bool
     */
    public bool $shareOptions = false;
}

