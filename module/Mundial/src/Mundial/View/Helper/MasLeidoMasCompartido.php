<?php
namespace Elecciones\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\View\Model\ViewModel;
use Contenido\Model\DatosJSON;
use Zend\ServiceManager\ServiceLocatorAwareInterface;  
use Zend\ServiceManager\ServiceLocatorInterface;

class MasLeidoMasCompartido extends AbstractHelper implements ServiceLocatorAwareInterface
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
        $config = $this->getServiceLocator()->getServiceLocator()->get('Config');
    	$datosJSON = $this->getServiceLocator()->getServiceLocator()->get('datosJson');
        $json = $datosJSON->getData($config['elecciones_rutas_json']['json_mas_leido_compartido']);

        //print '<pre>'; var_dump($json); print '</pre>';
        $vm = new ViewModel();
        $vm->setTemplate('elecciones/helper/mas-leido-mas-compartido');
        
        $vm->setVariables(array( 
                'compartidas'       => $json['compartidas'],
                'leidas'            => $json['leidas'],
            ));
        return $this->getView()->render($vm);
    }
}
