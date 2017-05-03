<?php

namespace Mundial\Model;

use Zend\Json\Json;

/**
 * Representa un bloque de contenido cuyos datos se obtienen a partir de un
 * archivo JSON.
 *
 */
class BloqueJSON 
{
    
    /**
     * Directorio base dentro del cual se buscan los archivos de datos
     *
     * @var string
     */
    
    const UTF8_DECODE = 'decode';
    const UTF8_ENCODE = 'encode';
    
    private $directorioBase;
    private $directorioBaseLocal = "/local/aplicaciones/docs-mundial";
    private $directorioBaseProduccion = "/local/docs-brasil-2014";
    private $ambiente;

    public function __construct()
    {
    }
    
    /**
     * Obtiene los datos del módulo a partir de un archivo.
     *
     * @param $archivo string Nombre del archivo (relativo al directorio base)
     * @return array 
     */
    public function getData($archivo = null, $utf8 = null)
    {
        $this->ambiente = getenv('APPLICATION_ENV');
        if(!isset($archivo)){
            return false;
        }
        
        if($this->ambiente=="development"){
            $this->directorioBase = $this->directorioBaseLocal;
        } else {
            $this->directorioBase = $this->directorioBaseProduccion;
        }
        
        $rutaArchivo = rtrim($this->directorioBase, '/') . '/' . $archivo;
        $json = file_get_contents($rutaArchivo);
        if ($json === false){
            return false;
            //throw new InvalidArgumentException("Archivo de datos no encontrado: $rutaArchivo");
        }
        
        if ($utf8 === 'decode') {
            $json = utf8_decode ($json);
        } elseif($utf8 === 'encode') {
            $json = utf8_encode ($json);
        } 
        
        $datos = Json::decode($json, Json::TYPE_OBJECT);
        return $datos;
    }
    
}