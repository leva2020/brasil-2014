<?php 
namespace Mundial\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\View\Model\ViewModel;
use Zend\ServiceManager\ServiceLocatorAwareInterface;  
use Zend\ServiceManager\ServiceLocatorInterface;

class CarouselPpal extends AbstractHelper
{
    public function __invoke($datos)
    {
        $vm = new ViewModel();
        $vm->setTemplate('mundial/helper/carousel-ppal');
        $vm->setVariables(array( 
            'notas'  => $datos,
        ));
        return $this->getView()->render($vm);
    }
}