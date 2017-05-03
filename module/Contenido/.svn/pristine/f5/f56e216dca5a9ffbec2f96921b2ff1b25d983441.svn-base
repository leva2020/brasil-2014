<?php

namespace Contenido\Model;

use Zend\Json\Json;

/**
 * Representa un bloque de contenido cuyos datos se obtienen a partir de un
 * archivo JSON.
 *
 */
abstract class BloqueJSON 
{
    
    /**
     * Default cache for information provided by the adapter's describeTable() method.
     *
     * @var Zend_Cache_Core
     */
    //protected static $_defaultCache = null;
    
    /**
     * Directorio base dentro del cual se buscan los archivos de datos
     *
     * @var string
     */
    //protected $directorio_base;
    
    /**
     * Tiempo de expiración de los datos en el caché
     *
     * @var integer
     */
    //protected $tiempo_expiracion;
    
    /**
     * 
     *
     * @var Zend_Cache_Core
     */
    //protected $_cache = null;

    /**
     * Constructor de la clase.
     * 
     * Asigna el objeto caché por omisión que se tenga.
     *
     */
    /*public function __construct()
    {
        $this->setCache(self::$_defaultCache);
    }*/
    
    /**
     * Obtiene los datos del módulo a partir de un archivo.
     *
     * @param $archivo string Nombre del archivo (relativo al directorio base)
     * @return array 
     */
    public static function getData($archivo)
    {
        /*$rutaArchivo = rtrim($this->directorio_base, '/') . '/' . $archivo;
        
        if ($this->_cache){
            $datos = $this->_cache->load($rutaArchivo);
            if ($datos !== false){
                return $datos;
            }
        }
        $json = file_get_contents($rutaArchivo);
        if ($json === false){
            throw new InvalidArgumentException("Archivo de datos no encontrado: $rutaArchivo");
        }
        $datos = Zend_Json::decode($json, Zend_Json::TYPE_OBJECT);

        if ($this->_cache){
            $this->_cache->save($datos, $rutaArchivo, $specificLifetime=$this->tiempo_expiracion);
        }

        return $datos;*/
        $content_directory = "http://m.eltiempo.com/contenido";
        return Json::decode(file_get_contents($content_directory.$archivo));
    }

    /*public function getCache($cache)
    {
        return $this->_cache;    
    }
    
    public function setCache($cache)
    {
        $this->_cache = self::_setupCache($cache);    
    }*/
    
    /**
     * 
     * 
     * @param mixed $cache Either a Cache object, or a string naming a Registry key
     * @return Zend_Cache_Core
     * @throws Zend_Db_Table_Exception
     */
    /*protected static final function _setupCache($cache)
    {
        if ($cache === null) {
            return null;
        }
        if (is_string($cache)) {
            require_once 'Zend/Registry.php';
            $cache = Zend_Registry::get($cache);
        }
        if (!$cache instanceof Zend_Cache_Core) {
            require_once 'Zend/Db/Table/Exception.php';
            throw new Zend_Db_Table_Exception('Argument must be of type Zend_Cache_Core, or a Registry key where a Zend_Cache_Core object is stored');
        }
        return $cache;
    }*/
    
    /**
     * Sets the default metadata cache for information returned by Zend_Db_Adapter_Abstract::describeTable().
     *
     * If $defaultCache is null, then no metadata cache is used by default.
     *
     * @param  mixed $cache Either a Cache object, or a string naming a Registry key
     * @return void
     */
    /*public static function setDefaultCache($cache = null)
    {
        self::$_defaultCache = self::_setupCache($cache);
    }*/
    
}