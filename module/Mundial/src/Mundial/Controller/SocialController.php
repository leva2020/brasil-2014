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

class SocialController extends AbstractActionController
{
    public function indexAction()
    {
        $config = $this->getServiceLocator()->get('config');
        $this->getServiceLocator()->get('viewhelpermanager')->get('HeadLink')->appendStylesheet('/mundial-brasil-2014/css/cssSocial/social_movil.css')
                                                                             ->prependStylesheet('/mundial-brasil-2014/css/cssSocial/generales.css')
                                                                             ->prependStylesheet('/mundial-brasil-2014/css/cssSocial/flexslider.css')
                                                                             ->prependStylesheet('/mundial-brasil-2014/css/cssSocial/reset.css');
        $seccion = $this->params()->fromRoute('seccion');
        $urlJson = $config['mundial_rutas_json']['json_seccion'];
        
        $urlNotas = $urlJson. '/social/noticias-principales.txt';
        $jsonNotas = file_get_contents($urlNotas);
        $notas = json_decode($jsonNotas,true);
        
        
        
        $compartir = array('titulo'=>'Seccion Opinion', 'url'=> $_SERVER['REQUEST_URI']);
        
        /*$this->getEvent()->getViewModel()->datosOpen = $datosOpen;*/
        $view =  new ViewModel(array(
                    'notas'         => $notas,
                    'compartir'     => $compartir,
                ));
        return $view;
    }
    
    public function notas1Action()
    {
        $view =  new ViewModel;
        $view->setTerminal(true);
        return $view;
    }
    
    public function notas2Action()
    {
        $view =  new ViewModel;
        $view->setTerminal(true);
        return $view;
    }
    
    public function notas3Action()
    {
        $view =  new ViewModel;
        $view->setTerminal(true);
        return $view;
    }
    
}