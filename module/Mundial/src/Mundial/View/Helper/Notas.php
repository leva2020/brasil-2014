<?php 
namespace Mundial\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\View\Model\ViewModel;

class Notas extends AbstractHelper
{
    public function __invoke($datos = false, $clase = '', $vista = "notas")
    {
        $vm = new ViewModel();
        $vm->setTemplate('mundial/helper/'.$vista);
        $vm->setVariables(array( 
            'vista'  => $datos,
            'clase'   => $clase,
        ));
        return $this->getView()->render($vm);
    }
}