<?php 
namespace Mundial\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\View\Model\ViewModel;
use Zend\ServiceManager\ServiceLocatorAwareInterface;  
use Zend\ServiceManager\ServiceLocatorInterface;

class RecursoRelPpal extends AbstractHelper
{
    public function __invoke($lead, $multimedia, $vista = 'recurso-rel-ppal')
    {
        $formato = $multimedia['formato'];
        if($formato == 'HTML'):
            $recurso = $multimedia['embed'];
        elseif($formato == 'AUDIO'):
            $recurso = $multimedia['audio'];
        elseif($formato == 'VIDEO'):
            $recurso['codigo'] = $multimedia['codigo'];
            $recurso['titulo'] = $lead;
            $recurso['imagen_baja'] = '';
        elseif($formato == 'IMAGEN'):
            $recurso = $multimedia['imagen_baja'];
        endif;
        $vm = new ViewModel();
        $vm->setTemplate('mundial/helper/'.$vista);
        $vm->setVariables(array( 
            'recurso'   => $recurso,
            'formato'   => $formato,
            'lead'      => $lead,
        ));
        return $this->getView()->render($vm);
    }
}