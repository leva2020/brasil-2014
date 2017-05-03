<?php

namespace Mundial\Listener;

use Zend\EventManager\ListenerAggregateInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\View\Renderer\PhpRenderer;
use Zend\EventManager\EventInterface;

class MetatagsSeoDynamic implements ListenerAggregateInterface{
    
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
    
    public function __construct($phpRenderer) {
    	$this->phpRenderer = $phpRenderer;
    }
    
    public function attach(EventManagerInterface $events) {
        $this->listeners[] = $events->attach('metaSet', array($this, 'metaSet'), 0);
    }
    
    public function detach(EventManagerInterface $events) {
        foreach ($this->listeners as $index => $listener) {
            if ($events->detach($listener)) {
                unset($this->listeners[$index]);
            }
        }
    }
    
    public function metaSet(EventInterface $e) {        

    	$title = $e->getParam('title');
        $description = $e->getParam('description');
        $keywords = $e->getParam('keywords');
        //$newsKeywords =  $e->getParam('keywords');

        $headTitle = $this->phpRenderer->headTitle();
        $headTitle->prepend(utf8_encode($title));
        
        //$headTitle->append("Noticias");
        //$headTitle->append("ELTIEMPO.COM");
        
        $this->phpRenderer->headMeta()->appendName('description',utf8_encode($description));
        $this->phpRenderer->headMeta()->appendName('keywords',utf8_encode($keywords));
        //$this->phpRenderer->headMeta()->appendName('news_keywords',utf8_encode($newsKeywords));
    }
}