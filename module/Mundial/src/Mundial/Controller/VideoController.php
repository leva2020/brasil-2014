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

class VideoController extends AbstractActionController
{
    public function indexAction()
    {
        $config = $this->getServiceLocator()->get('config');
        $this->getServiceLocator()->get('viewhelpermanager')->get('HeadLink')->appendStylesheet('/mundial-brasil-2014/css/cssVideo/galerias_movil.css')
                                                                             ->prependStylesheet('/mundial-brasil-2014/css/cssVideo/generales.css')
                                                                             ->prependStylesheet('/mundial-brasil-2014/css/cssVideo/flexslider_gal.css')
                                                                             ->prependStylesheet('/mundial-brasil-2014/css/cssVideo/reset.css');
        $seccion = $this->params()->fromRoute('seccion');
        $titulo = $this->params()->fromRoute('titulo');
        $id = $this->params()->fromRoute('id');
        $urlJsonVideo = $config['mundial_rutas_json']['json_multimedia'];
        $url = $urlJsonVideo. '/' . $seccion . '/videos/VIDEO-WEB-VIDEO_BRASIL-' . $id . '.html';
        $json = file_get_contents($url);
        $video = json_decode($json,true);
        
        //print '<pre>'; var_dump($json); print('</pre>');
        
        $params = array(
            'title'         => utf8_decode($video['titulo']),
            'description'   => utf8_decode($video['descripcion']),
            'keywords'      => $video['keywords'],
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
                        'video'         => $video,
                        'titulo'        => $video['titulo'],
                        'sumario'       => $video['descripcion'],
                        'codigo'        => $video['codigo'],
                        'fecha'         => $video['fecha'],
                        'imgVideo'      => $video['imagen']['imagen_baja'],
                    ));
        return $view;
    }
}