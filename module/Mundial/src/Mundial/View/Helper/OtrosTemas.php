<?php

namespace Mundial\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\View\Model\ViewModel;

class OtrosTemas extends AbstractHelper {

    public function __invoke($datos = false, $clase = '', $tema = '', $vista = "otros-temas") {
        $vm = new ViewModel();
        $vm->setTemplate('mundial/helper/' . $vista);
        $vm->setVariables(array(
            'notas' => $datos,
            //'numNotas' => $numNotas,
            'clase' => $clase,
        ));
        return $this->getView()->render($vm);
    }

}