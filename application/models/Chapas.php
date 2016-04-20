<?php

class Application_Model_Chapas
{

    protected $chapas;

    public function __construct ()
    {
        $config = Zend_Registry::get('chapas');
        $db = Zend_Db::factory($config->database);
        Zend_Db_Table_Abstract::setDefaultAdapter($db);
        
        $this->chapas = new Application_Model_DbTable_Chapas();
    }

    public function getChapasByJobNumber ($jnumber)
    {
        $sql = $this->chapas->select();
        $sql->where('nobra = ?', (int) $jnumber);
        
        $rows = $this->chapas->fetchAll($sql)->toArray();
        
        return $rows;
    }
}

