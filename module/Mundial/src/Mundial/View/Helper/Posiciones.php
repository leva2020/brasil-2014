<?php

namespace Mundial\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\View\Model\ViewModel;

class Posiciones extends AbstractHelper {

    public function __invoke($datos, $equipoAct) {

        //print '<pre>';var_dump($datos);print '</pre>';
        $grupo = array();

        foreach ($datos as $equipo):
            $nom = $equipo['abreviatura_equipo'];
            $grupo[$nom]['nom'] = $equipo['abreviatura_equipo'];
            $grupo[$nom]['pts'] = $equipo['puntos'];
            $grupo[$nom]['pj'] = $equipo['pj'];
            $grupo[$nom]['gf'] = $equipo['gf'];
            $grupo[$nom]['gc'] = $equipo['gc'];
            $grupo[$nom]['gd'] = $equipo['difg'];
            $grupo[$nom]['pg'] = $equipo['pg'];
            $selected = '';//print $equipo['nombre_ficha'];
            if ($equipo['nombre_ficha'] == $equipoAct):
                $selected = 'selected';
            endif;
            $grupo[$nom]['equipo_sel'] = $selected;
        endforeach;

        //$grupo = array_sort($grupo, 'gf', SORT_DESC);
        $grupo = array_sort($grupo, 'pts', SORT_DESC);
        
        $vm = new ViewModel();
        $vm->setTemplate('mundial/helper/posiciones');
        $vm->setVariables(array(
            'grupo' => $grupo,
            'selected' => $selected,
        ));
        return $this->getView()->render($vm);
    }

}