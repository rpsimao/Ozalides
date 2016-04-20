<?php

class Application_Form_Searchobra extends Zend_Form
{

    public function init()
    {
        $this->setAction('/display/obra/');
        $this->setMethod('POST');
        
        $this->setAttrib('class', 'navbar-search pull-right');
        $this->setDecorators(array('FormElements', 'Form'));
        $decorators = array(array('ViewHelper'), array('Errors'), array('Label'), array('HtmlTag', array('tag' => 'li', "class"=>"pull-left")));

        $rot = new Zend_Form_Element_Text('searchobra');
        $rot->setRequired(TRUE);
        $rot->setAttribs(array('class' => 'search-query size-20',"placeholder" => "Procurar por obra", "autocomplete"=>"off"));
        $rot->setDecorators($decorators);
        $this->addElement($rot);
        
              
        $submit = new Zend_Form_Element_Submit('Enviar');
        $submit->setAttribs(array('class'=>'btn btn-mini sp_left_5 sp_right_15'));
        $submit->setDecorators($decorators)->removeDecorator('Label');
        $this->addElement($submit);
    }


}

