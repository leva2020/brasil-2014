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

class OpinionController extends AbstractActionController
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
        
        $urlCar = $urlJson. '/' . $seccion . '/caricaturas.txt';
        $jsonCar = file_get_contents($urlCar);
        $caricatura = json_decode($jsonCar,true);
        
        $urlUltNotas = $urlJson. '/' . $seccion . '/caricaturas.txt';
        $jsonUltNotas = file_get_contents($urlUltNotas);
        $ultimasNotas = json_decode($jsonUltNotas,true);
        
        $urlVistas = $urlJson. '/mas-leidas-compartidas.txt';
        $jsonVistas = file_get_contents($urlVistas);
        $vistas = json_decode($jsonVistas,true);
        $maximoVistas = count($vistas['leidas']);
        if($maximoVistas > 2):
            $maximoVistas = 2;
        endif;
        
        $compartir = array('titulo'=>'Seccion Opinion', 'url'=> $_SERVER['REQUEST_URI']);
        
        /*$this->getEvent()->getViewModel()->datosOpen = $datosOpen;*/
        $view =  new ViewModel(array(
                    'notas'         => $notas,
                    'compartir'     => $compartir,
                    'caricatura'    => $caricatura,
                    'ultimasNotas'  => $ultimasNotas,
                    'vistas'        => $vistas['leidas'],
                    'maximoVistas'  => $maximoVistas,
                ));
        return $view;
    }
}