<?php 
namespace Mundial\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\View\Model\ViewModel;
use Zend\ServiceManager\ServiceLocatorAwareInterface;  
use Zend\ServiceManager\ServiceLocatorInterface;

class FormatoFecha extends AbstractHelper
{
    public function __invoke($datetime, $formato = "articulo")
    {
        $meses =array("","Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        $hora = date("g:i a, j F Y",$datetime);
        $hora = date("g:i a, j F Y",$datetime);
        $tiempo = date("g:i a",$datetime);
        $dia = date("j",$datetime);
        $mes = date("n",$datetime);
        $anio = date("Y",$datetime);
        
        if($formato == 'articulo'):
            $hora = $tiempo . " " . $dia . " de ".$meses[$mes]." del ".$anio;
            $hora = str_replace(array('am', 'pm'), array('a.m.', 'p.m.'), $hora);
            $htmlFecha = '<h4 class="ti4-M14">' . $hora . '</h4>';
            
            
            
        elseif($formato == 'relacionados'):
            $hora = $meses[$mes] . ' ' . $dia . ' de ' . $anio;
            $htmlFecha = '<span class="fecha-M14">'.$hora.'</span>';
        else:
            $hora = date(DATE_RFC2822,$datetime);
            $htmlFecha = '<span><span class="ico-time">&#xe01b;</span> Última actualización hace </span><span class="tiempo-articulo" title=" ' . $hora . '"></span>';
        endif;
    
        return $htmlFecha;
    }
}