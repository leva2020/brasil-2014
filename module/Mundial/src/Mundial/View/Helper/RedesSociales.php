<?php 
namespace Mundial\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\View\Model\ViewModel;
use Zend\ServiceManager\ServiceLocatorAwareInterface;  
use Zend\ServiceManager\ServiceLocatorInterface;

class RedesSociales extends AbstractHelper
{
    public function __invoke($datos, $vista)
    {
        $url="http://".$_SERVER['HTTP_HOST']. $_SERVER['REQUEST_URI'];
        
        if($vista == 'articulo'):
            $vista = 'redes-sociales-articulo';
        elseif($vista == 'multimedia' || $vista == 'seccion'):
            $vista = 'redes-sociales-multimedia';
        endif;
        $vm = new ViewModel();
        $vm->setTemplate('mundial/helper/'.$vista);
        $vm->setVariables(array( 
            'titulo'        => $datos['titulo'],
            'url'           => 'http://www.eltiempo.com'.$datos['url'],
            //'url'           => $url,
        ));
        return $this->getView()->render($vm);
    }
}
?>