<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

    protected function _initRegistry ()
    {
         
        Zend_Registry::set('registos',   new Zend_Config_Ini(APPLICATION_PATH . '/configs/application.ini', 'registos'));
        Zend_Registry::set('optimus',     new Zend_Config_Ini(APPLICATION_PATH . '/configs/application.ini', 'optimus'));
        Zend_Registry::set('chapas',     new Zend_Config_Ini(APPLICATION_PATH . '/configs/application.ini', 'chapas'));
    }    
    
    
    protected function _initHeader ()
    {
    
        $this->bootstrap('layout');
        $layout = $this->getResource('layout');
        $view = $layout->getView();
        $view->addHelperPath(APPLICATION_PATH . "/views/helpers", "Application_View_Helper");
        $view->doctype("HTML5");
        $view->headTitle('Fernandes & Terceiro, S.A. :: Ozalides');
        $view->headMeta()->setCharset('utf-8');
        $view->headScript()->appendFile('http://cdn.fterceiro.pt/library/js/jquery/2/2.1.1.js', 'text/javascript');
        //$view->headScript()->appendFile('http://cdn.fterceiro.pt/library/js/jqueryui/latest/min.js', 'text/javascript');
	    $view->headScript()->appendFile('http://cdn.fterceiro.pt/library/js/jqueryui/bootstrap/jquery-ui-1.9.2.custom.min.js', 'text/javascript');
        $view->headScript()->appendFile('/js/app.bootstrap.js', 'text/javascript');
        //$view->headLink()->appendStylesheet('http://cdn.fterceiro.pt/library/js/jqueryui/themes/overcast/jquery-ui.css');
	    $view->headLink()->appendStylesheet('http://cdn.fterceiro.pt/library/js/jqueryui/themes/bootstrap/jquery-ui-1.9.2.custom.css');
        $view->headScript()->appendFile('http://cdn.fterceiro.pt/library/bootstrap3/js/bootstrap.min.js','text/javascript');
	    $view->headScript()->appendFile('http://cdn.fterceiro.pt/library/bootstrap3/js/bootstrap3-typeahead.min.js','text/javascript');
        $view->headLink()->appendStylesheet('http://cdn.fterceiro.pt/library/bootstrap3/css/bootstrap.min.css');
	    $view->headLink()->appendStylesheet('http://cdn.fterceiro.pt/library/bootstrap3/css/font-awesome.min.css');
        $view->headLink()->appendStylesheet('/css/styles.css');
        $view->headLink()->headLink(array(
                'rel' => 'icon' ,
                'href' => 'http://static.fterceiro.pt/assets/public/images/favicon.ico', 'type'=>"image/x-icon"), 'PREPEND');
        $view->headMeta()->appendHttpEquiv('X-UA-Compatible', 'chrome=1');
        $view->headMeta()->appendName('Author', 'Ricardo Simao');
        $view->headMeta()->appendName('Email', 'ricardo.simao@fterceiro.pt');
        $view->headMeta()->appendName('Copyright', 'Fernandes e Terceiro, S.A.');
        $view->headMeta()->appendName('Zend Framework', Zend_Version::VERSION);
        $view->headMeta()->appendName('PHP',  phpversion());
        $view->headMeta()->appendName('Version', '@@BuildNumber@@');
        $view->headMeta()->appendName('BuildDate', '@@BuildDate@@');
    }
    
    protected function _initRoutes()
    {
         
        $router = Zend_Controller_Front::getInstance()->getRouter();
         
        $route = new Zend_Controller_Router_Route('/job/details/:obra', array(
                'controller' => 'job' ,
                'action' => 'details'));
        $router->addRoute('job_details', $route);
        
        $route = new Zend_Controller_Router_Route('/job/redirect/:eskojob', array(
                'controller' => 'job' ,
                'action' => 'redirect'));
        $router->addRoute('job_redirect', $route);


        
    }
}

