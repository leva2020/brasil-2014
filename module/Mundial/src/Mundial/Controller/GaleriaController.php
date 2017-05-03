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

class GaleriaController extends AbstractActionController
{
    public function indexAction()
    {
        $config = $this->getServiceLocator()->get('config');
        $this->getServiceLocator()->get('viewhelpermanager')->get('HeadLink')->appendStylesheet('/mundial-brasil-2014/css/cssGaleria/galerias_movil.css')
                                                                             ->prependStylesheet('/mundial-brasil-2014/css/cssGaleria/generales.css')
                                                                             ->prependStylesheet('/mundial-brasil-2014/css/cssGaleria/flexslider_gal.css')
                                                                             ->prependStylesheet('/mundial-brasil-2014/css/cssGaleria/reset.css');
        $seccion = $this->params()->fromRoute('seccion');
        $titulo = $this->params()->fromRoute('titulo');
        $id = $this->params()->fromRoute('id');
        $urlJsonVideo = $config['mundial_rutas_json']['json_multimedia'];
        $url = $urlJsonVideo. '/' . $seccion . '/fotos/GALERIAFOTOS-WEB-GALERIA_BRASIL-' . $id . '.html';
        $json = file_get_contents($url);
        $galeria = json_decode($json,true);
        
        //print '<pre>'; var_dump($json); print('</pre>');
        
        $params = array(
            'title'         => utf8_decode($galeria['info']['titulo']),
            'description'   => utf8_decode($galeria['info']['descripcion']),
            'keywords'      => $galeria['keywords'],
        );
        /*
        $datosOpen['titulo'] = utf8_decode($video['titulo']);
        $datosOpen['sumario'] = utf8_decode($video['sumario']);
        $datosOpen['imagen_baja_art'] = $video['imagen']['imagen_baja'];
        $datosOpen['url'] = 'http://m.eltiempo.com' . $video['url'];
        $datosOpen['procede'] = 'video';
        
        $this->getEvent()->getViewModel()->datosOpen = $datosOpen;*/
        $this->getEventManager()->trigger('metaSet',$this,$params);
        $view =  new ViewModel(array(
                        'galeria'         => $galeria,
                        'titulo'        => $galeria['info']['titulo'],
                        'sumario'       => $galeria['info']['descripcion'],
                        'fecha'         => $galeria['info']['fecha'],
                        'imagenes'      => $galeria['imagenes'],
                    ));
        return $view;
    }
}