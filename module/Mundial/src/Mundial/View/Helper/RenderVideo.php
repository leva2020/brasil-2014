<?php 
namespace Mundial\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\View\Model\ViewModel;

class RenderVideo extends AbstractHelper
{
    public function __invoke($vista, $datos, $claseDiv='', $origen = '')    
    {
        if($origen == 'despliegue'):
            //$imagen = $datos['imagen']['imagen_baja'];
            $imagen = '';
        else:
            $imagen = $datos['imagen_baja'];
        endif;
        
        $datosVideo = new ViewModel(array(
            'idVideo' => $datos['codigo'],
            'imgVideo' => $imagen,
            'titulo' => $datos['titulo'],
            'claseDiv' => $claseDiv,
        ));
        $datosVideo->setTemplate('mundial/helper/'.$vista);
        return $this->getView()->render($datosVideo);
    }
}