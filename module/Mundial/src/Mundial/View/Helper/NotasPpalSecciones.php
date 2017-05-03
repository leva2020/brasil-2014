<?php 
namespace Mundial\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\View\Model\ViewModel;
//use Zend\ServiceManager\ServiceLocatorAwareInterface;  
//use Zend\ServiceManager\ServiceLocatorInterface;

class NotasPpalSecciones extends AbstractHelper
{
    public function __invoke($datos, $pos)
    {
        
        $vm = new ViewModel();
        $vm->setTemplate('mundial/helper/notas-ppal-secciones');
        $vm->setVariables(array( 
            'nota'  => $datos,
            'pos'   => $pos,
        ));
        return $this->getView()->render($vm);
    }
}