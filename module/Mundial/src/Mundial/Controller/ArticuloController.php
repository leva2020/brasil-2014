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

class ArticuloController extends AbstractActionController
{
    public function indexAction()
    {
        $config = $this->getServiceLocator()->get('config');
        
        $this->getServiceLocator()->get('viewhelpermanager')->get('HeadLink')->appendStylesheet('/mundial-brasil-2014/css/cssArticulo/stylesArticulo.css')
                                                                             ->appendStylesheet('/mundial-brasil-2014/css/cssArticulo/generales.css');
        $seccion = $this->params()->fromRoute('seccion');
        $titulo = $this->params()->fromRoute('titulo');
        $id = $this->params()->fromRoute('id');
        $urlJsonArticulos = $config['mundial_rutas_json']['json_articulos'];
        $url = $urlJsonArticulos. '/' . $seccion . '/ARTICULO-WEB-ARTICULO_BRASIL-' . $id . '.html';
        $json = file_get_contents($url);
        $json = json_decode($json,true);
        
        $i=0;$relacionados = '';
        if($json['relacionados']):
            foreach($json['relacionados'] as $rel):
                if($i<2):
                    $relacionados[] = $rel;
                endif;
                $i++;
            endforeach;
        endif;
        
        
        $params = array(
            'title'         => 'Mundial Brasil 2014: ' . utf8_decode($json['articulo']['titulo_seo']),
            'description'   => (utf8_decode($json['articulo']['sumario'])),
            'keywords'      => $json['articulo']['keywords'],
        );
        $this->getEventManager()->trigger('metaSet',$this,$params);
        /*
        $datosOpen['titulo'] = $json['articulo']['titulo'];
        $datosOpen['sumario'] = $json['articulo']['sumario'];
        $datosOpen['imagen_baja'] = $json['multimedia']['imagen_baja'];
        $datosOpen['url'] = $json['articulo']['url'];
        $this->getEvent()->getViewModel()->datosOpen = $datosOpen;
        */        
        $view =  new ViewModel(array(
                'articulo'      => $json['articulo'],
                'multimedia'    => $json['multimedia'],
                'relacionados'  => $relacionados,
            ));
        return $view;
    }
}