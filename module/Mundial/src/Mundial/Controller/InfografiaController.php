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

class InfografiaController extends AbstractActionController
{
    public function indexAction()
    {
        $config = $this->getServiceLocator()->get('config');
        $this->getServiceLocator()->get('viewhelpermanager')->get('HeadLink')->appendStylesheet('/mundial-brasil-2014/css/cssInfografia/home.css')
                                                                             ->prependStylesheet('/mundial-brasil-2014/css/cssInfografia/flexslider.css')
                                                                             ->prependStylesheet('/mundial-brasil-2014/css/cssInfografia/generales.css')
                                                                             ->prependStylesheet('/mundial-brasil-2014/css/cssInfografia/stylesInfografia.css');
        $seccion = $this->params()->fromRoute('seccion');
        $titulo = $this->params()->fromRoute('titulo');
        $id = $this->params()->fromRoute('id');
        $urlInfografia = $config['mundial_rutas_json']['json_multimedia'];
        $url = $urlInfografia. '/' . $seccion . '/infografias/INFOGRAFIA-WEB-INFOGRAFIA_BRASIL-' . $id . '.html';
        $json = file_get_contents($url);
        $infografia = json_decode($json,true);
        
        $urlOtrasInfografias = $urlInfografia. '/multimedia/ultim-infografias.txt';
        $jsonOtrasInfografias = file_get_contents($urlOtrasInfografias);
        $otrasInfografias = json_decode($jsonOtrasInfografias,true);
        foreach($otrasInfografias as $infos):
            if($infos['info']['id'] != $id):
                $otrasInfosFiltro[] = $infos;
            endif;
        endforeach;
        
        $params = array(
            'title'         => utf8_decode($infografia['titulo']),
            'description'   => utf8_decode($infografia['descripcion']),
            'keywords'      => $infografia['keywords'],
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
                        'infografia'    => $infografia,
                        'titulo'        => $infografia['titulo'],
                        'sumario'       => $infografia['descripcion'],
                        'formato'       => $infografia['formato'],
                        'fuente'        => $infografia['src'],
                        'otrasInfografias' => $otrasInfosFiltro,
                    ));
        return $view;
    }
}