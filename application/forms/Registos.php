<?php

class Application_Form_Registos extends Zend_Form
{

    public function init()
    {
        $config = Zend_Registry::get('optimus');
        $db = Zend_Db::factory($config->database);
        
       $this->setMethod("POST");
       $this->setAction('/job/');

       
       
       $obra = new Zend_Form_Element_Text('obra');
       $obra->setLabel('Nº Obra:');
       $obra->setRequired(TRUE);
       $obra->setAttribs(array('placeholder' => "Insira o nº obra"));
       $obra->addValidator(new Zend_Validate_Db_RecordExists(array('table'=>'job', 'field'=>'j_number','adapter'=>$db)))->addErrorMessage("Não foi encontrada uma obra com o Nº %value%");
       $this->addElement($obra);
       
       $submit = new Zend_Form_Element_Submit('submit');
       $submit->setLabel('Enviar');
       $submit->setAttrib('class', 'btn btn-primary');
       $this->addElement($submit);
       
    }


}

