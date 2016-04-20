<?php

class AjaxController extends Zend_Controller_Action
{

    public function init()
    {
        $this->_helper->layout()->disableLayout(); 
        $this->_helper->viewRenderer->setNoRender(true);
    }

    public function indexAction()
    {
        // action body
    }

    public function datetimeAction()
    {
        $now = Zend_Date::now()->toString('YYYY-MM-dd HH:mm:ss');
        
        $this->getResponse()->appendBody($now);
    }

    public function removejobAction()
    {
        $obra = $this->_getParam('obra');
        $db = new Application_Model_Registos();
        $db->deleteRecord($obra);
    }


	public function jobsAction()
	{

		$obra = $this->_getParam('q');
		$db = new Application_Model_Registos();
		$rows = $db->ajaxJob($obra);

		foreach ( $rows as $row) {

			$obras[] = $row["obra"];
		}


		$jobs = Zend_Json_Encoder::encode($obras);


		$this->getResponse()->appendBody($jobs);

	}


}





