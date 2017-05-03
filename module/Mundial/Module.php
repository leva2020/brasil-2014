<?php
namespace Mundial;

use Zend\ModuleManager\ModuleManager;
use Zend\Mvc\MvcEvent;
use Mundial\Listener\MetatagsSeo;
use Mundial\Listener\MetatagsSeoDynamic;

class Module
{

    public function init(ModuleManager $moduleManager)
    {
        $sharedEvents = $moduleManager->getEventManager()->getSharedManager();
        $sharedEvents->attach(__NAMESPACE__, 'dispatch', function($e) {
            // This event will only be fired when an ActionController under the MyModule namespace is dispatched.
            $controller = $e->getTarget();
            $controller->layout('layout/mundial');
            $config = $controller->getServiceLocator()->get('config');
        }, 100);
    }
   	
	public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                    __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getConfig()
    {
        $moduleConfig = include __DIR__ . '/config/module.config.php';
        $metatagsSeo = include __DIR__ . '/config/metatags-seo.config.php';
        $env = getenv('APPLICATION_ENV');
        $rutasJson = include __DIR__ . '/config/rutas-json.config' . $env . '.php';
        $config = array_merge($moduleConfig, $rutasJson, $metatagsSeo);
        return $config;
    }
    
    public function onBootstrap(MvcEvent $e) {
        /* @var $e MvcEvent */
        $em = $e->getApplication()->getEventManager();
        $sharedManager = $em->getSharedManager();
        $sm = $e->getApplication()->getServiceManager();

        $config = $sm->get('config');

        $phpRenderer = $sm->get('Zend\View\Renderer\PhpRenderer');
        $seo = new MetatagsSeo($phpRenderer, $config['metatags_seo']);
        $em->attachAggregate($seo);
        $sharedManager->attach('Zend\Mvc\Controller\AbstractActionController',  'dispatch', function($e)
        		use ($sm,$em,$phpRenderer) {
        	$controller = $e->getTarget();
        	$seoDin = new MetatagsSeoDynamic($phpRenderer);
        	
        	$controller->getEventManager()->attachAggregate($seoDin);
        	
        }, 2);
        
    }
}