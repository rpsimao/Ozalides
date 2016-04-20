<?php

class JobController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function preDispatch()
    {
        
       $this->optimus = new Application_Model_Optimus();
       $this->registos = new Application_Model_Registos();
       $this->chapas = new Application_Model_Chapas();
       
       if ($this->_helper->FlashMessenger->hasMessages()) {
           $this->view->messages = $this->_helper->FlashMessenger->getMessages();
       }
        
    }

    public function indexAction()
    {
     if ($this->getRequest()->isPost()) {
            $this->form = new Application_Form_Registos();
            if ($this->form->isValid($_POST)) {
                $values = $this->form->getValues();
                
                $this->view->optimus = $this->optimus->getJob($values['obra']);
                $populate = $this->registos->getJob($values['obra']);
                
                $form = new Application_Form_Job();
                
                if (is_array($populate[0])) { 
                    $formpop = $form->populate($populate[0]);
                    $this->view->form = $formpop;
                } else {
                    $this->view->form = $form;
                }
                
                $this->view->chapas = $this->chapas->getChapasByJobNumber($values['obra']);
                
                
            } else {
                $this->view->errors = $this->form->getMessages();
                $this->view->form = $this->form;
            }
            
     }
        
    }

    public function processAction()
    {
        if ($this->getRequest()->isPost()) {
            $this->form = new Application_Form_Job();
            if ($this->form->isValid($_POST)) {
                $values = $this->form->getValues();
                $this->registos->insert($values);
                
                $this->_helper->flashMessenger->addMessage('success');
                $this->_helper->flashMessenger->addMessage('A obra nº' . $values['obra'] . ' foi actualizada com sucesso.');
                
                $this->redirect("/display");
            }
        }
    }

    public function detailsAction()
    {
        $jnumber = $this->_getParam('obra');
        
        $this->_helper->viewRenderer->setRender('index');
        
        $populate = $this->registos->getJob($jnumber);
        
        if ($populate)
        {
            $form = new Application_Form_Job();
	        $formpop = $form->populate($populate[0]);
	        $this->view->form = $formpop;
	        $this->view->optimus = $this->optimus->getJob($jnumber);
	        $this->view->chapas = $this->chapas->getChapasByJobNumber($jnumber);
        } else {
            
           $this->_helper->flashMessenger->addMessage('error');
           $this->_helper->flashMessenger->addMessage('Não existe registo da obra ' . $jnumber);
                
           $this->redirect("/");
        }
    }

    public function redirectAction()
    {
        $job = $this->_getParam('eskojob');
        
        $cleanjob = substr($job, 0, 5);
        
        $this->redirect('/job/details/' . $cleanjob);
    }


}







