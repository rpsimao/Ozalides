<?php

class Application_Model_Registos
{

    protected $job;

    public function __construct ()
    {
        $config = Zend_Registry::get('registos');
        $db = Zend_Db::factory($config->database);
        Zend_Db_Table_Abstract::setDefaultAdapter($db);
        
        $this->job = new Application_Model_DbTable_Registos();
    }

    public function getJob ($jnumber)
    {
        $row = $this->job->find((int) $jnumber);
        return $row->toArray();
    }


	public function ajaxJob($jnumber)
	{
		$sql = $this->job->select()->from('registos', array("obra"));
		$sql->where('obra LIKE "'.$jnumber.'%"');

		$rows = $this->job->fetchAll($sql);

		return $rows->toArray();
	}


    public function insert (array $data)
    {
        try {
            $this->job->insert($data);
        } catch (Exception $e) {
            
            $where = $this->job->getAdapter()->quoteInto('obra = ?', 
                    (int) $data['obra']);
            $this->job->update($data, $where);
        }
    }

    public function getByDate ($date)
    {
        $sql = $this->job->select();
        $sql->where('date(`ficheirocliente_date`) = ?', $date);
        $sql->orWhere('date(`update`) = ?', $date);
        
        $rows = $this->job->fetchAll($sql);
        
        return $rows->toArray();
    }
    
    
    public function getNotFinish()
    {
        
        $sql = $this->job->select();
        $sql->where("aprovadocliente = 0");
        
        $rows = $this->job->fetchAll($sql);
        
        return $rows->toArray();
        
    }
    
    
    public function deleteRecord($jnumber)
    {
        
        $where = $this->job->getAdapter()->quoteInto('obra = ?', $jnumber);
        $this->job->delete($where);
        
        
    }
    
}

