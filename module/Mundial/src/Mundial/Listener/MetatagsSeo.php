<?php

namespace Mundial\Listener;

use Zend\EventManager\ListenerAggregateInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\Mvc\MvcEvent;
use Zend\View\Renderer\PhpRenderer;

class MetatagsSeo implements ListenerAggregateInterface{
    
    /**
     * @var array
     */
    protected $listeners;
    
    /**
     * @var PhpRenderer
     */
    protected $phpRenderer;
    
    /**
     * @var array
     */
    protected $metatagsSeoConfig;
    
    public function __construct($phpRenderer, $metatagsSeoConfig) {
        $this->phpRenderer = $phpRenderer;
        $this->metatagsSeoConfig = $metatagsSeoConfig;
    }
    
    public function attach(EventManagerInterface $events) {
        $this->listeners[] = $events->attach(MvcEvent::EVENT_ROUTE, array($this, 'metaSet'), 0);
    }
    
    public function detach(EventManagerInterface $events) {
        foreach ($this->listeners as $index => $listener) {
            if ($events->detach($listener)) {
                unset($this->listeners[$index]);
            }
        }
    }
    
    public function metaSet(MvcEvent $e) {
        $routeParams = $e->getRouteMatch()->getParams();
        $routeName = $e->getRouteMatch()->getMatchedRouteName();

        if(!isset($routeParams['seccion']) && $routeName != 'mundial') {
            return;
        }elseif($routeName == 'mundial') {
            $seccion = $routeName;
        }else {
            $seccion = $routeParams['seccion'];
        }
       
//        $seccion = $routeParams['seccion'];
        if($seccion == 'opinion/columnistas'):
            $seccion = 'opinion';
        elseif($seccion == 'noticias/otras-noticias'):
            $seccion = 'otras-noticias';
        endif;
        
        $metatags = $this->metatagsSeoConfig[$seccion];
        $title = $metatags['title'];
        $description = $metatags['description'];
        $keywords = $metatags['keywords'];
        //$newsKeywords =  $metatags['keywords'];
        
        $headTitle = $this->phpRenderer->headTitle();
        $headTitle->prepend(utf8_encode($title));
        //$headTitle->append("Noticias");
        //$headTitle->append("ELTIEMPO.COM");
        
        if(!isset($routeParams['titulo'])):
            $this->phpRenderer->headMeta()->appendName('description',utf8_encode($description));
            $this->phpRenderer->headMeta()->appendName('keywords',utf8_encode($keywords));
            //$this->phpRenderer->headMeta()->appendName('news_keywords',utf8_encode($newsKeywords));
        endif;
    }
    
}