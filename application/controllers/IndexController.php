<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

	public function indexAction()
	{
		if (null === Zend_Auth::getInstance()->getIndentity()){
		$this->_forward('form');
		}
	}
	
	public function formAction()
	{
		$form = new LoginForm('/auth/form/');
		$this->view->formResponse = '';
		if ($this->_request->isPost()) {
			if ($form->isValid(
					$this->_request->isPost())
			) {
				$authAdapter = $form->username
				->getValidator('Authorise')
				->getAuthAdapter();
				$data = $authAdapter->getResultRowObject(
						null, 'password');
				$auth = Zend_Auth::getInstance();
				$auth->getStorage()->write($data);
				$this->_redirect($this->_redirectUrl);
			} else {
				$this->view->formResponse = '
					Entschuldigung, Es ist ein problem aufgetreten 
					bitte überprüfen sie ihre Anmeldedaten:';
			}
		}
		$this->view->form = $form;
	}
	
	
}

