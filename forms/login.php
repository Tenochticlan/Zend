<?php
include_once 'Zend/Form.php'; 
class LoginForm extends Zend_Form{
	
	public function init($action){
		
		$this->setAction($action)
			->setMethod('post')
			->setAttrib('id', 'loginForm');
		
		$this->addElement('text','username', array('label' => 'Username'));
		$username = $this->getElement('username')
						->addValidator('alnmu')
						->setRequired(true)
						->addFilter('StringTrim');
													 
		$this->addElement('password','password', array('label' => 'password'));
		$password = $this->getElement('password')
						->addValiator('StringLength', true, array(6))
						->setRequired(true)
						->addFilter('StringTrim');
		
		$submit = $this->addElement('submit', 'Login');
		
		
		
	#	$password = $this->createElement('text','password');
	#	$password
	#		->setLabel('password')
	#		->setRequired(true)
	#		->setValidator('notEmpty',true, $required);
	#	$this->addElement($password);
	#
	#	$submit = $this->createElement('submit', 'submit');
	#	$submit->setLabel('Anmelden');
	#	$this->addElement($submit);
	}	
}

