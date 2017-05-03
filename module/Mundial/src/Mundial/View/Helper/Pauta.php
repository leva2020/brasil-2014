<?php 
namespace Mundial\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\View\Model\ViewModel;
use Zend\ServiceManager\ServiceLocatorAwareInterface;  
use Zend\ServiceManager\ServiceLocatorInterface;


class Pauta extends AbstractHelper implements ServiceLocatorAwareInterface
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
    
    public function __invoke($idEspacio, $idSeccion = '',  $clasecss = 'pautas')
    {
        $path = $this->getServiceLocator()->getServiceLocator()->get('router')->getRequestUri()->getPath();
        $string = explode('/', $path);
        $target = '';
        
        if(isset($string[2])):
            $target = $string[2];
        else:
            $target = 'home';
        endif;
        
        if($target == 'multimedia'):
            if(isset($string[3])):
                $target = $string[3];
            else:
                $target = $string[2];
            endif;
        endif;
        $idSitio = '57741';
        $idPagina = $idSitio .'/' .$idSeccion;
        
        $vm = new ViewModel();
        $vm->setTemplate('mundial/helper/pauta');
        $vm->setVariables(array( 
                    'idEspacio' => $idEspacio,
                    'idPagina'  => $idPagina,
                    'target'    => $target,
                    'clasecss'  => $clasecss,
                ));
        //return 'hola';
        return $this->getView()->render($vm);
    }
}