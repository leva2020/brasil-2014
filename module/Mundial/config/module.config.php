<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
    'router' => array(
        'routes' => array(
            'mundial' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/brazil-2014-dev',
                    'defaults' => array(
                        'controller' => 'Mundial\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'articulo' => array(
                        'type'    => 'segment',
                        'options' => array(
                            'route'    => '/:seccion/:titulo/:id',
                            'constraints' => array(
                                'seccion' => '[a-zA-Z][a-zA-Z0-9/_-]*',
                                'titulo' => '[a-zA-Z0-9_-]*',
                                'id'     => '[0-9]+',
                            ),
                            'defaults' => array(
                                'controller' => 'Mundial\Controller\Articulo',
                                'action'     => 'index',
                            ),
                        ),
                    ),
                ),
            ),
            'mundial_cargar_mas' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/brazil-2014-dev/cargar-mas/:contador/:procede',
                    'constraints' => array(
                        'contador' => '[0-9]+',
                        //'seccion' => '[a-zA-Z0-9_-]*',
                        'procede' => '[a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        'controller' => 'Mundial\Controller\CargarMas',
                        'action'     => 'index',
                    ),
                ),
            ),
            'mundial_calendario' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/brazil-2014-dev/calendario',
                    'defaults' => array(
                        'controller' => 'Mundial\Controller\Calendario',
                        'action'     => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'grupos' => array(
                        'type'    => 'segment',
                        'options' => array(
                            'route'    => '/grupos',
                            'defaults' => array(
                                'controller' => 'Mundial\Controller\Calendario',
                                'action'     => 'grupos',
                            ),
                        ),
                    ),              
                    'posiciones' => array(
                        'type'    => 'segment',
                        'options' => array(
                            'route'    => '/posiciones',
                            'defaults' => array(
                                'controller' => 'Mundial\Controller\Calendario',
                                'action'     => 'posiciones',
                            ),
                        ),
                    ),
                ),
            ),
            'mundial_opinion' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/brazil-2014-dev/:seccion',
                    'constraints' => array(
                        'seccion' => 'opinion',
                    ),
                    'defaults' => array(
                        'controller' => 'Mundial\Controller\Opinion',
                        'action'     => 'index',
                    ),
                ),
            ),
            'mundial_colombia' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/brazil-2014-dev/noticias/:seccion',
                    'constraints' => array(
                        'seccion' => 'seleccion-colombia',
                    ),
                    'defaults' => array(
                        'controller' => 'Mundial\Controller\Colombia',
                        'action'     => 'index',
                    ),
                ),
            ),
            'mundial_selecciones' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/brazil-2014-dev/noticias/:seccion',
                    'constraints' => array(
                        'seccion' => 'selecciones-del-mundo',
                    ),
                    'defaults' => array(
                        'controller' => 'Mundial\Controller\Selecciones',
                        'action'     => 'index',
                    ),
                ),
            ),
            'mundial_curiosidades' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/brazil-2014-dev/:seccion',
                    'constraints' => array(
                        'seccion' => 'curiosidades',
                    ),
                    'defaults' => array(
                        'controller' => 'Mundial\Controller\Curiosidades',
                        'action'     => 'index',
                    ),
                ),
            ),
            'mundial_social' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/brazil-2014-dev/:seccion',
                    'constraints' => array(
                        'seccion' => 'redes-sociales',
                    ),
                    'defaults' => array(
                        'controller' => 'Mundial\Controller\Social',
                        'action'     => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'notas1' => array(
                        'type'    => 'segment',
                        'options' => array(
                            'route'    => '/notas1',
                            'defaults' => array(
                                'controller' => 'Mundial\Controller\Social',
                                'action'     => 'notas1',
                            ),
                        ),
                    ),              
                    'notas2' => array(
                        'type'    => 'segment',
                        'options' => array(
                            'route'    => '/notas2',
                            'defaults' => array(
                                'controller' => 'Mundial\Controller\Social',
                                'action'     => 'notas2',
                            ),
                        ),
                    ),
                    'notas3' => array(
                        'type'    => 'segment',
                        'options' => array(
                            'route'    => '/notas3',
                            'defaults' => array(
                                'controller' => 'Mundial\Controller\Social',
                                'action'     => 'notas3',
                            ),
                        ),
                    ),
                ),
                
            ),
            'mundial_ficha_equipo' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/brazil-2014-dev/ficha-de-equipo/:equipo',
                    'constraints' => array(
                        'equipo' => '(brasil|colombia|argentina|japon|grecia|costa-de-marfil|croacia|mexico|camerun|espana|holanda|chile|australia|uruguay|costa-rica|inglaterra|italia|suiza|ecuador|francia|honduras|argentina|iran|nigeria|bosnia|alemania|portugal|ghana|estdos-unidos|alemania|portugal|ghana|estdos-unidos|belgica|argelia|rusia|corea)',
                    ),
                    'defaults' => array(
                        'controller' => 'Mundial\Controller\FichaEquipo',
                        'action'     => 'index',
                    ),
                ),
            ),
            'mundial_multimedia' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/brazil-2014-dev/:seccion',
                    'constraints' => array(
                        'seccion' => 'multimedia',
                    ),
                    'defaults' => array(
                        'controller' => 'Mundial\Controller\Multimedia',
                        'action'     => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'video' => array(
                        'type'    => 'segment',
                        'options' => array(
                            'route'    => '/videos/:titulo/:id',
                            'constraints' => array(
                                'titulo' => '[a-zA-Z0-9_-]*',
                                'id'     => '[0-9]+',
                            ),
                            'defaults' => array(
                                'controller' => 'Mundial\Controller\Video',
                                'action'     => 'index',
                            ),
                        ),
                    ),                    
                    'galeria' => array(
                        'type'    => 'segment',
                        'options' => array(
                            'route'    => '/fotos/:titulo/:id',
                            'constraints' => array(
                                'titulo' => '[a-zA-Z0-9_-]*',
                                'id'     => '[0-9]+',
                            ),
                            'defaults' => array(
                                'controller' => 'Mundial\Controller\Galeria',
                                'action'     => 'index',
                            ),
                        ),
                    ),
                    'infografia' => array(
                        'type'    => 'segment',
                        'options' => array(
                            'route'    => '/infografias/:titulo/:id',
                            'constraints' => array(
                                'titulo' => '[a-zA-Z0-9_-]*',
                                'id'     => '[0-9]+',
                            ),
                            'defaults' => array(
                                'controller' => 'Mundial\Controller\Infografia',
                                'action'     => 'index',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'mundial\Controller\Index'              => 'Mundial\Controller\IndexController',
            'mundial\Controller\Articulo'           => 'Mundial\Controller\ArticuloController',
            'mundial\Controller\CargarMas'          => 'Mundial\Controller\CargarMasController',
            'mundial\Controller\Video'              => 'Mundial\Controller\VideoController',
            'mundial\Controller\Galeria'            => 'Mundial\Controller\GaleriaController',
            'mundial\Controller\Infografia'         => 'Mundial\Controller\InfografiaController',
            'mundial\Controller\Calendario'         => 'Mundial\Controller\CalendarioController',
            'mundial\Controller\Opinion'            => 'Mundial\Controller\OpinionController',
            'mundial\Controller\Colombia'           => 'Mundial\Controller\ColombiaController',
            'mundial\Controller\Selecciones'        => 'Mundial\Controller\SeleccionesController',
            'mundial\Controller\Curiosidades'       => 'Mundial\Controller\CuriosidadesController',
            'mundial\Controller\Multimedia'         => 'Mundial\Controller\MultimediaController',
            'mundial\Controller\FichaEquipo'        => 'Mundial\Controller\FichaEquipoController',
            'mundial\Controller\Social'             => 'Mundial\Controller\SocialController',
        ),
    ),
    'view_helpers' => array(
        'invokables' => array(
            'header'                    => 'Mundial\View\Helper\Header',
            'footer'                    => 'Mundial\View\Helper\Footer',
            'menu'                      => 'Mundial\View\Helper\Menu',
            'carouselPpal'              => 'Mundial\View\Helper\CarouselPpal',
            'renderVideo'               => 'Mundial\View\Helper\RenderVideo',
            'formatoFecha'              => 'Mundial\View\Helper\FormatoFecha',
            'pauta'                     => 'Mundial\View\Helper\Pauta',
            'modulosHome'               => 'Mundial\View\Helper\ModulosHome',
            'redesSociales'             => 'Mundial\View\Helper\RedesSociales',
            'datosOmniture'             => 'Mundial\View\Helper\DatosOmniture',
            'recursoRelPpal'            => 'Mundial\View\Helper\RecursoRelPpal',
            'notas'                     => 'Mundial\View\Helper\Notas',
            'otrosTemas'                => 'Mundial\View\Helper\OtrosTemas',
            'posiciones'                => 'Mundial\View\Helper\Posiciones',
            'notasPpalSecciones'        => 'Mundial\View\Helper\NotasPpalSecciones',
        ),
    ),
    'view_manager' => array(
        'base_path' => '/mundial-brasil-2014/',
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/mundial/404',
        'not_found_layout'         => 'error/mundial/404',
        'exception_template'       => 'error/mundial/index',
        'layout' => 'layout/mundial',
        'template_map' => array(
            'layout/mundial' => __DIR__ . '/../view/layout/mundial.phtml',
            'layout/calendario' => __DIR__ . '/../view/layout/calendario.phtml',
            'error/mundial/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/mundial/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array (
            __DIR__ . '/../view',
        ),
    ),
    'service_manager' => array(
        'invokables' => array(
            'datosJson' => 'Contenido\Model\DatosJSON',
        ),
    ),
);