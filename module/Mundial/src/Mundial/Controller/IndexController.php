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
use Mundial\Model\BloqueJson;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $config = $this->getServiceLocator()->get('config');
        $this->getServiceLocator()->get('viewhelpermanager')->get('HeadLink')->appendStylesheet('/mundial-brasil-2014/css/cssHome/home.css')
                                                                             ->appendStylesheet('/mundial-brasil-2014/css/cssHome/generales.css');
        $json = file_get_contents($config['mundial_rutas_json']['json_noticias_principales']);
        $json = json_decode($json,true);
        return array(
            'notas'         => $json['noticias'],
        );
    }
}