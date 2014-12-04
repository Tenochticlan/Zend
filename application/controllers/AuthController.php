<?php
	class AuthController extends Zend_Controller_Action
	{
		public function indexAction()
		{
			$this->_forward('login');
		} 
		
		public function loginAction()
		{
			$flashMessenger = $this->_helper->FlashMessenger;
			$flashMessenger->setNamespace('actionErrors');
			$this->view->ationErrors = $flashMessenger->getMessages();
		}
		public function identifyAction()
		{
			if($this->getRequest()->isPost())
			{
				$formData = $this->_getFormData();

				if(empty($formData['username']) || empty($formData['password']))
				{
					$this->_flashMessage('Empty username or password.');
				}
				else
				{
					$authAdapter = $this->_getAuthAdapter($formData);
					$auth = Zend_Auth::getInstance();
					$result = $auth->authenticate($authAdapter);
					if(!$result->isValid())
					{
						$this->_flashMessage('login fehlgeschlagen');
					}
					else
					{
						$data = $authAdapter->getResultRowOpject(null, 'password');
						$auth->getStorage()->write($data);
						
						$this->_redirect($this->_redirectUrl);
					}	
				}
			}
			$this->_redirect('/auth/login');
		}
		protected function _flashMessage($message)
		{
			$flashMessenger = $this->_helper->FlashMessenger;
			$flashMessenger->setNamespace('actionErrors');
			$FlashMessenger->addMessage($message);
		}
		protected function _getAuthAdapter($formData)
		{
			$dbAdapter = Zend_Registry::get('db');
			
			$authAdapter = new Zend_Auth_Adapter_DbTable($dbAdapter);
			$authAdapter-> setTableName('Benutzer')
					->setIdentityColumn('name')
					->setCredentialColumn('Passwort')
					->setCredentialTreatment('SHA1(?)');
			
			// salt für mehr sicherheit
			$config = Zend_Registry::get('config');
			$salt = $config->auth->salt;
			$password = $salt.$formData['password'];
			$authAdapter->setIdentity($formData['username']);
			$authAdapter->setCredential($password);
			
			return $authAdapter;
		}
	}