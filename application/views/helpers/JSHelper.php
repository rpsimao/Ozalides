<?php
/**
 * 
 * Enter description here ...
 * 
 * @author Ricardo Sim�o - ricardo.simao@fterceiro.pt
 * @copyright 2011 - Fernandes & Terceiro, SA
 * @copyright All right reserved.
 * @license Although this script is provided with source code it does NOT mean that this report is in the public domain.
 * 
 * @version 1.0 - Sep 18, 2012 12:41:19 PM
 * 
 * @category Printshop
 * @package 
 * 
 */
require_once 'Zend/View/Interface.php';
/**
 * JSHelper helper
 *
 * @uses viewHelper Application_View_Helper
 */
class Application_View_Helper_JSHelper
{
    /**
     *
     * @var Zend_View_Interface
     */
    public $view;
    /**
     */
    public function JSHelper ()
    {
    $request = Zend_Controller_Front::getInstance()->getRequest();
        $file_uri = 'js/' . $request->getControllerName() . '/' .
         $request->getActionName() . '.js';
        if (file_exists($file_uri)) {
            return $this->view->headScript()->appendFile('/' . $file_uri);
        } else if ($request->getControllerName() == "index" && $request->getActionName() == "search") {
            $file_uri = 'js/' . $request->getControllerName() . '/index.js';
            return $this->view->headScript()->appendFile('/' . $file_uri);
        } else if ($request->getControllerName() == "index" && $request->getActionName() == "type") {
            $file_uri = 'js/' . $request->getControllerName() . '/index.js';
            return $this->view->headScript()->appendFile('/' . $file_uri);
        }
    }
    /**
     * Sets the view field
     * 
     * @param $view Zend_View_Interface            
     */
    public function setView (Zend_View_Interface $view)
    {
        $this->view = $view;
    }
}
