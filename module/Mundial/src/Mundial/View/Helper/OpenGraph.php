<?php 
namespace Mundial\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\View\Model\ViewModel;

class OpenGraph extends AbstractHelper
{
    public function __invoke($titulo, $descripcion, $imagen = '', $enlace, $name = 'eltiempo' )
    {
        $openGraph = new ViewModel(array(
            'titulo' => $titulo,
            'descripcion' => $descripcion,
            'imagen' => $imagen,
            'enlace' => $enlace,
            'name' => $name,
        ));
        $openGraph->setTemplate('mundial/helper/open-graph');
        return $this->getView()->render($openGraph);
    }
}