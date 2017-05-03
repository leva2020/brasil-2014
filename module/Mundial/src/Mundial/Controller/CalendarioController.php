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

class CalendarioController extends AbstractActionController
{
    public function indexAction()
    {
        $this->layout('layout/calendario');
        $view =  new ViewModel;
        return $view;
    }
        
    public function gruposAction()
    {
        $this->layout('layout/calendario');
        $view =  new ViewModel;
        return $view;
    }
    
    public function posicionesAction()
    {
        $this->layout('layout/calendario');
        $view =  new ViewModel;
        return $view;
    }
}
