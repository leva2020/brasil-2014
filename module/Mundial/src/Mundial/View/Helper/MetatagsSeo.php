<?php 
namespace Elecciones\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\ServiceManager\ServiceLocatorAwareInterface;  
use Zend\ServiceManager\ServiceLocatorInterface;

class MetatagsSeo extends AbstractHelper implements ServiceLocatorAwareInterface
{
    
    public function __invoke($seccion = 'home', $type='', $tituloSeo='', $descripcion='', $tags='')
    {
        $config = $this->getServiceLocator()->getServiceLocator()->get('config');
        $metatags = $config['metatags_seo'][$seccion];
        
        $title = $metatags['title'];
        $description = $metatags['description'];
        $keywords = $metatags['keywords'];
        $newsKeywords =  $metatags['keywords'];
        
        if($type == 'articulo'):
            $title = $tituloSeo . ' - ' . ucwords($seccion);
            $description = $descripcion;
            $keywords = $tags;
            $newsKeywords =  $tags;
        elseif($type == 'especial'):
            $title = $tituloSeo . $metatags['title'];
            $description = $tituloSeo . ' : '.$descripcion;
            $keywords = $tags;
            $newsKeywords =  $tags;
        endif;
        
        $headTitle = $this->getServiceLocator()->getServiceLocator()->get('viewhelpermanager')->get('HeadTitle');
        $headTitle->prepend(utf8_encode($title));
        $headTitle->append("Noticias");
        $headTitle->append("ELTIEMPO.COM");
        $this->getServiceLocator()->getServiceLocator()->get('viewhelpermanager')->get('HeadMeta')->appendName('description',utf8_encode($description));
        $this->getServiceLocator()->getServiceLocator()->get('viewhelpermanager')->get('HeadMeta')->appendName('keywords',utf8_encode($keywords));
        $this->getServiceLocator()->getServiceLocator()->get('viewhelpermanager')->get('HeadMeta')->appendName('news_keywords',utf8_encode($newsKeywords));
        
    }
    
    public function setServiceLocator(ServiceLocatorInterface $serviceLocator)  
    {  
        $this->serviceLocator = $serviceLocator;  
        return $this;  
    }  
    /** 
     * Get the service locator. 
     * 
     * @return \Zend\ServiceManager\ServiceLocatorInterface 
     */  
    public function getServiceLocator()  
    {  
        return $this->serviceLocator;  
    }
}