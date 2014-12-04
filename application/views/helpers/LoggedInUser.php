<?php
class Zend_View_Helper_LoggedInUser
{
	protected $view;
	
	function setView($view)
	{
		$this->view = ($view);	
	}
	
	function LoggedInUser()
	{
		$auth = Zend_Auth::getInstence();
		if($auth->hasIdentity())
		{
			$logoutUrl = $this->view->url(array('controller'=>'auth', 'action'=>'logout'));
			$user = $auth->get->Identity();
			$username = $this->view->escape(ucfirst($user->username));

			$sting = 'Logged in as' . $username . ' | <a href="' . $logoutUrl . '">Log out</a>';
		}
		else 
		{
			$loginUrl = $this->view-url(array('controller'=>'auth', 'action'=>'identify'));
			$string = '<a href="' . $loginUrl . '">Log in</a>';
		}
		return $string;
	}
}