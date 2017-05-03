<?php

namespace Elecciones\Model;

/**
 * Obtener la url de una articulo.
 */
abstract class Url
{
    public static function getUrljsonarticulo($seccion,$id){
    	$url = '/local/docs-eltiempo-2013/'.$seccion."/ARTICULO-WEB-ARTICULO_JSON-".$id.".html";
        return $url;
    }
    
    public static function getUrlarticulo($seccion,$tituloseo,$id){
    	$url = $seccion."/".$tituloseo."/".$id;
        return $url;
    }
}