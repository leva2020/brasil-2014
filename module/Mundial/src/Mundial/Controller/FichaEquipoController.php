<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Mundial\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class FichaEquipoController extends AbstractActionController
{
    public function indexAction()
    {
        $config = $this->getServiceLocator()->get('config');
        $this->getServiceLocator()->get('viewhelpermanager')->get('HeadLink')->appendStylesheet('/mundial-brasil-2014/css/cssFichaEquipo/home.css')
                                                                             ->prependStylesheet('/mundial-brasil-2014/css/cssFichaEquipo/generales.css')
                                                                             ->prependStylesheet('/mundial-brasil-2014/css/cssFichaEquipo/flexslider.css')
                                                                             ->prependStylesheet('/mundial-brasil-2014/css/cssFichaEquipo/reset.css');
        $equipo = $this->params()->fromRoute('equipo');
        $urlJson = $config['mundial_rutas_json']['json_seccion'];
        
        $urlNotaPpal = $urlJson.'/equipos/' . $equipo . '/noticias-principales.txt';
        $jsonNotaPpal = file_get_contents($urlNotaPpal);
        $notaPpal = json_decode($jsonNotaPpal,true);
        if($notaPpal[0]['multimedia']['formato'] == 'IMAGEN'):
            $formatoPpal = 'imagen';
            $recursoPpal = $notaPpal[0]['multimedia']['imagen_baja'];
            $ttRecursoPpal = $notaPpal[0]['multimedia']['titulo'];
        elseif($notaPpal[0]['multimedia']['formato'] == 'VIDEO'):
            $formatoPpal = 'video';
        endif;
        
        $urlGrupos = $urlJson. '/tabla-posiciones.txt';
        $jsonGrupos = file_get_contents($urlGrupos);
        $grupos = json_decode($jsonGrupos,true);
        
        $urlInfo = $urlJson.'/equipos/' . $equipo . '/info-equipo.txt';
        $jsonInfo = file_get_contents($urlInfo);
        $info = json_decode($jsonInfo,true);
        
        $notasMultimedia = file_get_contents($config['mundial_rutas_json']['json_noticias_principales']);
        $notasMultimedia = json_decode($notasMultimedia,true);
        $notasMultimedia = $notasMultimedia['noticias'];
                
        $resena = $info['Resena'];
        $tecnico = $info['Tecnico'];
        $palmares = $info['Resena']['palmares'];
        //var_dump($resena);
        if($equipo == 'colombia' || $equipo == 'japon' || $equipo == 'grecia' || $equipo == 'costa-de-marfil'):
            $grupoAct = 'c';
        elseif($equipo == 'brasil' || $equipo == 'croacia' || $equipo == 'mexico' || $equipo == 'camerun'):
            $grupoAct = 'a';
        elseif($equipo == 'espana' || $equipo == 'holanda' || $equipo == 'chile' || $equipo == 'australia'):
            $grupoAct = 'b';
        elseif($equipo == 'uruguay' || $equipo == 'costa-rica' || $equipo == 'inglaterra' || $equipo == 'italia'):
            $grupoAct = 'd';
        elseif($equipo == 'suiza' || $equipo == 'ecuador' || $equipo == 'francia' || $equipo == 'honduras'):
            $grupoAct = 'e';
        elseif($equipo == 'argentina' || $equipo == 'iran' || $equipo == 'nigeria' || $equipo == 'bosnia'):
            $grupoAct = 'f';
        elseif($equipo == 'alemania' || $equipo == 'portugal' || $equipo == 'ghana' || $equipo == 'estados-unidos'):
            $grupoAct = 'g';
        elseif($equipo == 'belgica' || $equipo == 'argelia' || $equipo == 'rusia' || $equipo == 'corea-del-sur'):
            $grupoAct = 'h';
        endif;
        
        $procede = 'ficha-equipo_'.$equipo;
        if($info['Figura1']):
            $figuras[0] = $info['Figura1'];
        endif;
        if($info['Figura2']):
            $figuras[1] = $info['Figura2'];
        endif;
        if($info['Figura3']):
            $figuras[2] = $info['Figura3'];
        endif;
        $compartir = array('titulo'=>$resena['titulo'].'- Equipo de fútbol Mundial - Mundial Brasil 2014', 'url'=> $_SERVER['REQUEST_URI']);
        
        $params = array(
            'title'         => $resena['titulo'].'- Equipo de fútbol Mundial - Mundial Brasil 2014',
            'description'   => 'Selección de Fútbol de '.$resena['titulo'].': Noticias, resultados, jugadores, fotos, entrevistas, uniformes. Mundial de Fútbol Brasil 2014.',
            'keywords'      => $resena['titulo'].', mundial, selección, equipo, brasil 2014, futbol, uniformes, fotos, entrevistas',
        );
        $this->getEventManager()->trigger('metaSet',$this,$params);
        $view =  new ViewModel(array(
                    'posiciones'        => $grupos['fases'][0]['grupos'],
                    'grupoAct'          => $grupoAct,
                    'equipo'            => $equipo,
                    'notaPpal'          => $notaPpal[0],
                    'formatoPpal'       => $formatoPpal,
                    'recursoPpal'       => $recursoPpal,
                    'ttRecursoPpal'     => $ttRecursoPpal,
                    'procede'           => $procede,
                    'info'              => $info,
                    'resena'            => $resena,
                    'tecnico'           => $tecnico,
                    'palmares'          => $palmares,
                    'figuras'           => $figuras,
                    'notasMultimedia'   => $notasMultimedia,
                    'compartir'         => $compartir,
                ));
        return $view;
    }
}