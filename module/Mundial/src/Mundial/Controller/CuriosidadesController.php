<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Mundial\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class CuriosidadesController extends AbstractActionController
{
    public function indexAction()
    {
        $config = $this->getServiceLocator()->get('config');
        $this->getServiceLocator()->get('viewhelpermanager')->get('HeadLink')->appendStylesheet('/mundial-brasil-2014/css/cssHomeSeccion/home.css')
                                                                             ->prependStylesheet('/mundial-brasil-2014/css/cssHomeSeccion/generales.css')
                                                                             ->prependStylesheet('/mundial-brasil-2014/css/cssHomeSeccion/flexslider.css')
                                                                             ->prependStylesheet('/mundial-brasil-2014/css/cssHomeSeccion/reset.css');
        $seccion = $this->params()->fromRoute('seccion');
        $urlJson = $config['mundial_rutas_json']['json_seccion'];
        
        
        $urlNotas = $urlJson. '/' . $seccion . '/noticias-principales.txt';
        $jsonNotas = file_get_contents($urlNotas);
        $notas = json_decode($jsonNotas,true);
        $i=0;
        foreach ($notas as $nota):
            if($i<3):
                $noticias[] = $nota;
            endif;
            $i++;
        endforeach;
               
        $urlOtrasTemas = $urlJson. '/otros-temas-movil.txt';
        $jsonOtrasTemas = file_get_contents($urlOtrasTemas);
        $otrosTemas = json_decode($jsonOtrasTemas,true);
        $j=0;
        foreach($otrosTemas as $tema):
            if($tema['articulo']['seccion'] != $seccion && $j<4):
                $temas[] = $tema;
                $j++;
            endif;
        endforeach;
        
        $urlVistas = $urlJson. '/mas-leidas-compartidas.txt';
        $jsonVistas = file_get_contents($urlVistas);
        $vistas = json_decode($jsonVistas,true);
        $maximoVistas = count($vistas['leidas']);
        if($maximoVistas > 2):
            $maximoVistas = 2;
        endif;
        $compartir = array('titulo'=>'Seccion Curiosidades', 'url'=> $_SERVER['REQUEST_URI']);
        
        /*$this->getEvent()->getViewModel()->datosOpen = $datosOpen;*/
        $view =  new ViewModel(array(
                    'notas'             => $noticias,
                    'otrosTemas'        => $temas,
                    'vistas'            => $vistas['leidas'],
                    'maximoVistas'      => $maximoVistas,
                    'compartir'         => $compartir,
                ));
        return $view;
    }
}