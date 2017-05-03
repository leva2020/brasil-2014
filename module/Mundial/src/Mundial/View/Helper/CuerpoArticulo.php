<?php 
namespace Elecciones\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\View\Model\ViewModel;
use Zend\ServiceManager\ServiceLocatorAwareInterface;  
use Zend\ServiceManager\ServiceLocatorInterface;

class CuerpoArticulo extends AbstractHelper
{
    public function __invoke($datos = false, $tipoRelacionado = false)
    {
        $vm = new ViewModel();
        $vm->setTemplate('elecciones/helper/cuerpo-articulo');
        $vm->setVariables(array( 
            'noticia'  => $datos,
        ));
        return $this->getView()->render($vm);
    }
}