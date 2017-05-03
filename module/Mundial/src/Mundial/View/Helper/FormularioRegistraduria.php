<?php 
namespace Elecciones\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\View\Model\ViewModel;
use Zend\ServiceManager\ServiceLocatorAwareInterface;  
use Zend\ServiceManager\ServiceLocatorInterface;

class FormularioRegistraduria extends AbstractHelper
{
    public function __invoke()
    {
        $vm = new ViewModel();
        $vm->setTemplate('elecciones/helper/formulario-registraduria');
        /*$vm->setVariables(array( 
            'noticia'  => $datos,
        ));*/
        return $this->getView()->render($vm);
    }
}
?>