<?php 
namespace Mundial\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\View\Model\ViewModel;
use Zend\ServiceManager\ServiceLocatorAwareInterface;  
use Zend\ServiceManager\ServiceLocatorInterface;

class ModulosHome extends AbstractHelper
{
    public function __invoke($vista, $titulo, $idModulo, $clase, $claseExtra, $procede)
    {
        $vm = new ViewModel();
        $vm->setTemplate('mundial/helper/'.$vista);
        $vm->setVariables(array( 
            'idModulo'      => $idModulo,
            'clase'         => $clase,
            'titulo'        => $titulo,
            'claseExtra'    => $claseExtra,
            'procede'       => $procede,
        ));
        return $this->getView()->render($vm);
    }
}