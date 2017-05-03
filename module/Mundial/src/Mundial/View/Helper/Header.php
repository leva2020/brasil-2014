<?php 
namespace Mundial\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\View\Model\ViewModel;
use Zend\ServiceManager\ServiceLocatorAwareInterface;  
use Zend\ServiceManager\ServiceLocatorInterface;

class Header extends AbstractHelper implements ServiceLocatorAwareInterface
{
    public function setServiceLocator(ServiceLocatorInterface $serviceLocator)  
    {  
        $this->serviceLocator = $serviceLocator;  
        return $this;  
    }  
    /** 
     * Get the service locator. 
     * 
     * @return \Zend\ServiceManager\ServiceLocatorInterface 
     */  
    public function getServiceLocator()  
    {  
        return $this->serviceLocator;  
    }
    
    public function __invoke($titulo = '', $url = '')
    {
        $subDominio = explode('/',$_SERVER['REQUEST_URI']);
        $url= 'http://www.eltiempo.com/' . $subDominio['1'];
        $titulo = 'Mundial de fútbol Brasil 2014';
        $vm = new ViewModel();
        $vm->setTemplate('mundial/helper/header');
        $vm->setVariables(array( 
            'titulo'  => $titulo,
            'url'   => $url,
        ));
        return $this->getView()->render($vm);
    }
}