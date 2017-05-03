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

class CargarMasController extends AbstractActionController {

    public function indexAction() {
        $config = $this->getServiceLocator()->get('config');
        $contador = $this->params()->fromRoute('contador');
        $procede = $this->params()->fromRoute('procede');

        $equipo = '';
        $procedeFicha = explode('_', $procede);
        if ($procedeFicha[0] == 'ficha-equipo'):
            $procede = 'ficha-equipo';
            $equipo = $procedeFicha[1];
        endif;

        if ($procede == 'home_colombia'):
            $urlColombia = $config['mundial_rutas_json']['json_modulos_home'] . '/noticias-colombia.txt';
            $jsonColombia = file_get_contents($urlColombia);
            $json = json_decode($jsonColombia, true);
        elseif ($procede == 'home_curiosidades'):
            $urlCuriosidades = $config['mundial_rutas_json']['json_modulos_home'] . '/noticias-curiosidades.txt';
            $jsonCuriosidades = file_get_contents($urlCuriosidades);
            $json = json_decode($jsonCuriosidades, true);
        elseif ($procede == 'home_mundo'):
            $urlMundo = $config['mundial_rutas_json']['json_modulos_home'] . '/noticias-mundo.txt';
            $urlMundo = file_get_contents($urlMundo);
            $json = json_decode($urlMundo, true);
        elseif ($procede == 'home_multimedia'):
            $urlMultimedia = $config['mundial_rutas_json']['json_modulos_home'] . '/multimedia-destacados.txt';
            $urlMultimedia = file_get_contents($urlMultimedia);
            $json = json_decode($urlMultimedia, true);
        elseif ($procede == 'home_opinion'):
            $urlOpinion = $config['mundial_rutas_json']['json_modulos_home'] . '/noticias-opinion.txt';
            $urlOpinion = file_get_contents($urlOpinion);
            $json = json_decode($urlOpinion, true);
            $json = $json['noticias'];
        elseif ($procede == 'videos'):
            $urlAct = explode('/', $_SERVER['HTTP_REFERER']);
            $idUrl = array_pop($urlAct);
            $urlVideos = $config['mundial_rutas_json']['json_multimedia'] . '/multimedia/ultim-videos.txt';
            $urlVideos = file_get_contents($urlVideos);
            $jsonDatos = json_decode($urlVideos, true);
            foreach($jsonDatos as $datos):
                if($datos['info']['id'] != $idUrl):
                    $json[] = $datos;
                endif;
            endforeach;
        elseif ($procede == 'fotos'):
            $urlAct = explode('/', $_SERVER['HTTP_REFERER']);
            $idUrl = array_pop($urlAct);
            $urlFotos = $config['mundial_rutas_json']['json_multimedia'] . '/multimedia/ultim-fotos.txt';
            $urlFotos = file_get_contents($urlFotos);
            $jsonDatos = json_decode($urlFotos, true);
            foreach($jsonDatos as $datos):
                if($datos['info']['id'] != $idUrl):
                    $json[] = $datos;
                endif;
            endforeach;
        elseif ($procede == 'opinion'):
            $urlNotas = $config['mundial_rutas_json']['json_seccion'] . '/' . $procede . '/noticias-principales.txt';
            $urlNotas = file_get_contents($urlNotas);
            $jsonNotas = json_decode($urlNotas, true);

            $urlNotas = $config['mundial_rutas_json']['json_seccion'] . '/' . $procede . '/ultim-noticias.txt';
            $urlNotas = file_get_contents($urlNotas);
            $jsonNotas2 = json_decode($urlNotas, true);
            $json = array_merge($jsonNotas, $jsonNotas2);
        elseif ($procede == 'ficha-equipo'):
            $urlNotas = $config['mundial_rutas_json']['json_seccion'] . '/equipos/' . $equipo . '/ultim-noticias.txt';
            $urlNotas = file_get_contents($urlNotas);
            $jsonNotas = json_decode($urlNotas, true);

            $urlNotas = $config['mundial_rutas_json']['json_seccion'] . '/equipos/' . $equipo . '/mas-noticias.txt';
            $urlNotas = file_get_contents($urlNotas);
            $jsonNotas2 = json_decode($urlNotas, true);
            $json = array_merge($jsonNotas, $jsonNotas2);
        elseif ($procede == 'curiosidades'):
            $urlMasNotas = $config['mundial_rutas_json']['json_multimedia'] . '/' . $procede . '/ultim-noticias.txt';
            $jsonMasNotas = file_get_contents($urlMasNotas);
            $json = json_decode($jsonMasNotas, true);
        elseif ($procede == 'seleccion-colombia'):
            $urlMasNotas = $config['mundial_rutas_json']['json_multimedia'] . '/noticias/' . $procede . '/ultim-noticias.txt';
            $jsonMasNotas = file_get_contents($urlMasNotas);
            $json = json_decode($jsonMasNotas, true);
        elseif ($procede == 'selecciones-del-mundo'):
            $urlMasNotas = $config['mundial_rutas_json']['json_multimedia'] . '/noticias/' . $procede . '/ultim-noticias.txt';
            $jsonMasNotas = file_get_contents($urlMasNotas);
            $json = json_decode($jsonMasNotas, true);
        elseif($procede == 'redes-sociales-notas1'):
            $urlNotas = $config['mundial_rutas_json']['json_seccion'] . '/social/noticias-hashtag-1.txt';
            $urlNotas = file_get_contents($urlNotas);
            $json = json_decode($urlNotas, true);
        elseif($procede == 'redes-sociales-notas2'):
            $urlNotas = $config['mundial_rutas_json']['json_seccion'] . '/social/noticias-hashtag-2.txt';
            $urlNotas = file_get_contents($urlNotas);
            $json = json_decode($urlNotas, true);
        elseif($procede == 'redes-sociales-notas3'):
            $urlNotas = $config['mundial_rutas_json']['json_seccion'] . '/social/noticias-hashtag-3.txt';
            $urlNotas = file_get_contents($urlNotas);
            $json = json_decode($urlNotas, true);
        endif;

        //print '<pre>'; var_dump($json); print '<pre>';

        $notas = new ViewModel(array(
            'notas' => $json,
            'contador' => $contador,
            'seccion' => $procede,
            'procede' => $procede,
            'equipo' => $equipo,
                )
        );
        $notas->setTerminal(true);
        return $notas;
    }

}