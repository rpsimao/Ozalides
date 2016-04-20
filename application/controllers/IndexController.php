<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }
    
    public function preDispatch ()
    {
        if ($this->_helper->FlashMessenger->hasMessages()) {
            $this->view->messages = $this->_helper->FlashMessenger->getMessages();
        }
    }

    public function indexAction()
    {
        //$retriveJob = $this->_getParam("eskojob");

	    //if ($retriveJob)  $this->view->eskojob = $retriveJob;

	    $this->view->form = new Application_Form_Registos();
    }

    public function processAction()
    {
         if ($this->getRequest()->isPost()) {
            $this->form = new Application_Form_Registos();
            if ($this->form->isValid($_POST)) {

            } else {
                $this->view->errors = $this->form->getMessages();
                $this->view->form = $this->form;
            }
            
         }
    }


}



