<?php 
namespace Mundial\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\View\Model\ViewModel;
use Zend\ServiceManager\ServiceLocatorAwareInterface;  
use Zend\ServiceManager\ServiceLocatorInterface;

class DatosOmniture extends AbstractHelper implements ServiceLocatorAwareInterface
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
    
    public function __invoke()
    {
        $referer = '';
        if(isset($_SERVER['HTTP_REFERER'])):
            $referer = $_SERVER['HTTP_REFERER'];
        endif;
        $path = $this->getServiceLocator()->getServiceLocator()->get('router')->getRequestUri()->getPath();
        $lenght = strlen($path);
        $string = explode('/', $path);
                
        $pageName = 'Especial Mundial Brasil 2014 - Home';
        $channel = 'Especial Mundial Brasil 2014 - Home';
        if(isset($string[2]) == 'multimedia' || isset($string[2]) == 'noticias'):
            if($string[2] == 'multimedia'):
                $channel = $string[3];
            else:
                $channel = $string[2];
            endif;
            $tituloArt = $string[4];
            if($string[2] == 'curiosidades'):
                $tituloArt = $string[3];
            endif;
            $tituloArt = str_replace('-', ' ', $tituloArt);
            $pageName = ucfirst($tituloArt);
        endif;
        $vm = new ViewModel();
        $vm->setTemplate('mundial/helper/datos-omniture');
        $vm->setVariables(array( 
            'pageName'  => $pageName,
            'channel'   => $channel,
            'referer'   => $referer,
        ));
        return $this->getView()->render($vm);
    }
}