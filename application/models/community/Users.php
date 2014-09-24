<?php 
class Users extends Zend_Db_Table_Abstract {

	protected $_name = 'user';
	protected $_rowClass = 'User';
	
	
	public function register($data)
	{
		$user = $this -> fetchNew();
		
		$user->frage = $data['f_text'];
		$user->antwort = $data['a_text'];
		
		$user->save();
		
		return $user;
	}
	
	
		
	
}
