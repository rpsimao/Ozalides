<?php

class Application_Model_Optimus
{
    protected $job;
    protected $customers;
    
    public function __construct ()
    {
        $config = Zend_Registry::get('optimus');
        $db = Zend_Db::factory($config->database);
        Zend_Db_Table_Abstract::setDefaultAdapter($db);
    
        $this->job = new Application_Model_DbTable_Job();
        $this->customers = new Application_Model_DbTable_Customers();
    }
    
    public function getJob($jnumber)
    {
        $row = $this->job->find((int) $jnumber);
        return $row->toArray();
    }
    
    
    public function getCustomers($code)
    {
        $row = $this->customers->find($code);
        return $row->toArray();
    }

}

