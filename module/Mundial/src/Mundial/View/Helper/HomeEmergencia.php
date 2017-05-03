<?php 
namespace Elecciones\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\View\Model\ViewModel;
//use Contenido\Model\DatosJSON;
use Zend\ServiceManager\ServiceLocatorAwareInterface;  
use Zend\ServiceManager\ServiceLocatorInterface;

class HomeEmergencia extends AbstractHelper implements ServiceLocatorAwareInterface
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
    
    public function __invoke($json)
    {
        $vm = new ViewModel();
        $vm->setTemplate('elecciones/helper/home-emergencia');
        $fecha = $json['articulo']['fecha_mod'];
        //2014-02-13T20:06:45Z
        $fecha = date('Y-m-d\TH:i:s\Z', $fecha); 
        $vm->setVariables(array( 
                'titulosEmergencia'     => $json['titulos_emergencia'],
                'articulo'              => $json['articulo'],
                'imagen'                => $json['imagen'],
                'relacionados'          => $json['relacionados'],
                'secundarios'           => $json['secundarios'],
                'parametroActivo'       => $json['titulos_emergencia']['emergencia_movil'],
                'fecha'                 => $fecha,
            ));
        return $this->getView()->render($vm);
    }
}