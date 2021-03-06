<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Session\SessionManager;
use Zend\Session\Container;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
//use Zend\EventManager\Event;
use Zend\ModuleManager\ModuleManager;

class Module
{

    public function init(ModuleManager $moduleManager)
    {
        $sharedEvents = $moduleManager->getEventManager()->getSharedManager();
        $sharedEvents->attach(__NAMESPACE__, 'dispatch', function($e) {
            // This event will only be fired when an ActionController under the MyModule namespace is dispatched.
            $controller = $e->getTarget();
            $controller->layout('layout/layout');
        }, 100);
    }
    
    public function onBootstrap(MvcEvent $e)
    {
        $e->getApplication()->getServiceManager()->get('translator');
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
        $this->bootstrapSession($e);
    }
    
    public function bootstrapSession($e)
    {
    	$session = $e->getApplication()
    	->getServiceManager()
    	->get('Zend\Session\SessionManager');
    	$session->start();
    
    	$container = new Container('initialized');
    	if (!isset($container->init)) {
    		$session->regenerateId(true);
    		$container->init = 1;
    	}
    }
    
    public function getServiceConfig()
    {
    	return array(
    			'factories' => array(
    					'Zend\Session\SessionManager' => function ($sm) {
    						$config = $sm->get('config');
    						if (isset($config['session'])) {
    							$session = $config['session'];
    
    							$sessionConfig = null;
    							if (isset($session['config'])) {
    								$class = isset($session['config']['class'])  ? $session['config']['class'] : 'Zend\Session\Config\SessionConfig';
    								$options = isset($session['config']['options']) ? $session['config']['options'] : array();
    								$sessionConfig = new $class();
    								$sessionConfig->setOptions($options);
    							}
    
    							$sessionStorage = null;
    							if (isset($session['storage'])) {
    								$class = $session['storage'];
    								$sessionStorage = new $class();
    							}
    
    							$sessionSaveHandler = null;
    							if (isset($session['save_handler'])) {
    								// class should be fetched from service manager since it will require constructor arguments
    								$sessionSaveHandler = $sm->get($session['save_handler']);
    							}
    
    							$sessionManager = new SessionManager($sessionConfig, $sessionStorage, $sessionSaveHandler);
    
    							if (isset($session['validator'])) {
    								$chain = $sessionManager->getValidatorChain();
    								foreach ($session['validator'] as $validator) {
    									$validator = new $validator();
    									$chain->attach('session.validate', array($validator, 'isValid'));
    
    								}
    							}
    						} else {
    							$sessionManager = new SessionManager();
    						}
    						Container::setDefaultManager($sessionManager);
    						return $sessionManager;
    					},
    			),
    	);
    }
    
    public function getConfig()
    {
        $moduleConfig = include __DIR__ . '/config/module.config.php';

        $config = $moduleConfig;

        return $config;
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
}