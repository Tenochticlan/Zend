<?php 
class From_Login extends Zend_Form{
	
	public function init(){
		$required = array('massages'=>'Eingabe erforderlich');
		
		
		$name = $this->createElement('text','name');
		$name
			->setLabel('name')
			->setRequired(true)
			->setValidator('notEmpty',true, $required);
		$this->addElement($name);
		
		$password = $this->createElement('text','password');
		$password
			->setLabel('password')
			->setRequired(true)
			->setValidator('notEmpty',true, $required);
		$this->addElement($password);
		
		$submit = $this->createElement('submit', 'submit');
		$submit->setLabel('Anmelden');
		$this->addElement($submit);
	}	
}