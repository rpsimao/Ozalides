<?php

class Application_Form_Job extends Zend_Form
{

    public function init()
    {
        
        $this->addElements(array(
                
                'obra'     => 'hidden',
                'cliente'  => 'hidden',
                'trabalho' => 'hidden',
                
                '1prova'      => 'checkbox',
                '1prova_date' => 'text',
                
                '2prova'      => 'checkbox',
                '2prova_date' => 'text',
                
                '3prova'      => 'checkbox',
                '3prova_date' => 'text',
                
                '4prova'      => 'checkbox',
                '4prova_date' => 'text',
                
                '5prova'      => 'checkbox',
                '5prova_date' => 'text',
                
                '6prova'      => 'checkbox',
                '6prova_date' => 'text',
                
                '1Emendas'      => 'checkbox',
                '1Emendas_date' => 'text',
                
                '2Emendas'      => 'checkbox',
                '2Emendas_date' => 'text',
                
                '3Emendas'      => 'checkbox',
                '3Emendas_date' => 'text',
                
                '4Emendas'      => 'checkbox',
                '4Emendas_date' => 'text',
                
                '5Emendas'      => 'checkbox',
                '5Emendas_date' => 'text',
                
                '6Emendas'      => 'checkbox',
                '6Emendas_date' => 'text',
                
                'aprovadocliente'      => 'checkbox',
                'aprovadocliente_date' => 'text',
                
                'ficheirocliente'      => 'checkbox',
                'ficheirocliente_date' => 'text',
                
                'aprovado_ozalide' => 'checkbox',
                'aprovado_mail'    => 'checkbox',
                
                'cd'       => 'checkbox',
                'mail'     => 'checkbox',
                'ftp'      => 'checkbox',
                'web'      => 'checkbox',
                'reedicao' => 'checkbox',
                
                'ficheiroclientetotal'      => 'checkbox',
                'ficheiroclientetotal_date' => 'text',

	            'linha_m'      => 'checkbox',
	            'arame_m'      => 'checkbox',
	            'sarrafado_m'  => 'checkbox',
	            'preto_m'      => 'checkbox',
	            'preto100_m'   => 'checkbox',
	            'bleed_m'      => 'checkbox',
	            'sarrafado_m'  => 'checkbox',
	            'verniz_m'     => 'checkbox',
	            'vernizuv_m'   => 'checkbox',
	            'pdfenviado_m' => 'checkbox',
	            'imposicao_m'  => 'checkbox',

	            'inks_e'     => 'checkbox',
	            'preto_e'    => 'checkbox',
	            'preto100_e' => 'checkbox',
	            'bleed_e'    => 'checkbox',
	            'batentes_e' => 'checkbox',
	            'reserva_e'  => 'checkbox',
	            'plato_e'    => 'checkbox',

	            'notas' => 'textarea',
                
                
               ));
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Enviar');
        $submit->setAttrib('class', 'btn btn-primary');
        $this->addElement($submit);
        
        foreach($this->getElements() as $element)
        {
            $element->removeDecorator('Label');
            $element->removeDecorator('DtDdWrapper');
        }
        
    }


}

