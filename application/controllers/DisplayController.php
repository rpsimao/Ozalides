<?php

class DisplayController extends Zend_Controller_Action
{

    public function init()
    {
        $this->registos = new Application_Model_Registos();
        $this->optimus = new Application_Model_Optimus();
    }

    public function preDispatch()
    {
        if ($this->_helper->FlashMessenger->hasMessages()) {
            $this->view->messages = $this->_helper->FlashMessenger->getMessages();
        }
    }

    public function indexAction()
    {
        $this->view->records = $this->registos->getNotFinish();
    }

    public function todayAction()
    {
        $this->_helper->viewRenderer->setRender('index');
        $today = date('Y-m-d');
        
        $this->view->records = $this->registos->getByDate($today);
        
        
    }

    public function dateAction()
    {
        if ($this->getRequest()->isPost()) {
	        $this->_helper->viewRenderer->setRender('index');

	        $this->form = new Application_Form_Searchdate();

	        $registos = $this->registos->getByDate($this->_request->getPost('dia'));

	        $howManyRecords = count($registos);


	        if ($howManyRecords > 0)
	        {
		        $this->view->records = $registos;

	        } else {

		        $this->view->records = 0;
		        $this->_helper->flashMessenger->addMessage('error');
		        $this->_helper->flashMessenger->addMessage('Não existem registos para o dia ' . $this->_request->getPost('dia'));

	        }



        }     
        
    }

    public function obraAction()
    {
    if ($this->getRequest()->isPost()) {
            $this->form = new Application_Form_Searchdate();
           
                $this->redirect("/job/details/" . $this->_request->getPost('searchobra'));
        }     
    }


}







