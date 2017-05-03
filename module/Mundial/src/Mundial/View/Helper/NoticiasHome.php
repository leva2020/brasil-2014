<?php 
namespace Elecciones\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\View\Model\ViewModel;
use Zend\ServiceManager\ServiceLocatorAwareInterface;  
use Zend\ServiceManager\ServiceLocatorInterface;

class NoticiasHome extends AbstractHelper
{
    public function __invoke($vista = "noticias-home-principales", $datos = false, $seccion = 'false', $procede)
    {
        $vm = new ViewModel();
        $vm->setTemplate('elecciones/helper/'.$vista);
        $vm->setVariables(array( 
            'noticias'  => $datos,
            'seccion'   => $seccion,
            'procede'   => $procede,
        ));
        return $this->getView()->render($vm);
    }
}