<?php
	class AuthController extends Zend_Controller_Action
	{
		public function indexAction()
		{
			$this->_forward('login');
		}
		public function loginAction()
		{
		}
		public function identifyAction()
		{
		}
	}