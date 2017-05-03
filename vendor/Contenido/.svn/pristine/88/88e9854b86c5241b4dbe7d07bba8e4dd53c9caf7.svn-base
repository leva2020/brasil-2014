<?php

namespace Contenido\Model;

use Zend\Config\Reader\Json;

/**
 * Representa un bloque de contenido cuyos datos se obtienen a partir de un
 * archivo JSON.
 *
 */
class DatosJSON 
{
    public static function getData($archivo)
    {
        $reader = new Json();
        return $reader->fromFile($archivo);
    }

    public static function getDatafromString($string)
    {
        $reader = new Json();
        return $reader->fromString($string);
    }
}