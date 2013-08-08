<?php
class User_AuthController extends Coda_Controller
{
    public function init()
    {
        /* Initialize action controller here */
    }

    public function loginAction()
    {
		$form = new User_Form_Login();
		
		if ($this->_request->isPost() && $form->isValid($this->_request->getPost())) {
			// process authentication
			if ($result = $this->_performLogin($form->getValues())) {
				// login sucessful
				$zfDate = new Zend_Date();
				$user = Doctrine_Core::getTable('Coda_Model_User')->findOneBy('userId', $result->userId);
				$user->dateLoggedIn = $zfDate->get(Zend_Date::ISO_8601);
				$user->save();
				//_dexit($result);
        		$this->gotoRoute(array('module' => 'club', 'controller' => 'manage', 'action' => 'index'));
			}
		}
	
		$this->view->form = $form;
    }

    public function logoutAction()
    {
    	$auth = Zend_Auth::getInstance();
    	$auth->clearIdentity();
    	$this->_flash('You have been loggged out', Coda_Helper_Flash::INFO);
    	$this->gotoRoute(array('action' => 'login'));
    }
    
    protected function _performLogin( $credentials )
    {
    	// get out auth adapter
    	$authAdapter = $this->_getAuthAdapter();
//    	$log = Zend_Registry::get('log');
    	
    	// set credentials
    	$authAdapter->setIdentity  ($credentials['email']);
    	$authAdapter->setCredential($credentials['password']);
    
    	// attempt authentication
    	$auth = Zend_Auth::getInstance();
    	$result = $auth->authenticate( $authAdapter );

    	// successful login
    	if($result->isValid()) {
        	$user = $authAdapter->getResultRowObject();
        	$this->_flash('Log in sucess', Coda_Helper_Flash::SUCCESS);
        	return $user;
    	}
    	$this->_flash('Log in failed', Coda_Helper_Flash::ERROR);
    	return false;
    }
    
    public function changePasswordAction()
    {
    	if (! $this->_request->user) {
    		$this->gotoRoute(array('action' => 'login'));
    	}
    	
    	Zend_Layout::getMvcInstance()->assign('clubs', $this->_request->clubs);
    	$this->_helper->layout->setLayout('manage');
    	
    	$form = new User_Form_ChangePassword();
    	
    	if ($this->_request->isPost() && $form->isValid($this->_request->getPost())) {
    		// check current password
    		if (md5($form->getValue('password')) != $this->_request->user->password) {
    			$this->_flash('Password is incorrect', Coda_Helper_Flash::ERROR);
    			$this->_redirectBack();
    		}
    		
    		$this->_request->user->password = md5($form->getValue('passwordNew'));
    		$this->_request->user->save();
    		
    		
    		
    		// confirmation message
    		$this->_flash('Your password has been changed', Coda_Helper_Flash::SUCCESS);
    		$this->gotoRoute(array('module' => 'club', 'controller' => 'manage', 'action' => 'index'));
    	}
    	
    	$this->view->form = $form;
    }
    /*
    public function changeEmailAction()
    {
    	Zend_Layout::getMvcInstance()->assign('clubs', $this->_request->clubs);
    	$this->_helper->layout->setLayout('manage');
    	 
    	$form = new User_Form_ChangeEmail();
    	
    	var_dump($this->_request->user->toArray());
    	
    	if ($this->_request->isPost() && $form->isValid($this->_request->getPost())) {
    		// check current password
    		if ($form->getValue('email') != $this->_request->user->email) {
    			$this->_flash('Email address is incorrect', Coda_Helper_Flash::ERROR);
    			$this->_redirectBack();
    		}
    		
    		// change email
    		$auth = Zend_Auth::getInstance();
    		$auth->clearIdentity();
    		
    		$this->_request->user->email = $form->getValue('emailNew');
    		$this->_request->user->save();
    	
    		
    		// confirmation message
    		$this->_flash('Your email address has been changed', Coda_Helper_Flash::SUCCESS);
    		$this->gotoRoute(array('action' => 'logout'));
    	}
    	 
    	$this->view->form = $form;
    }
    */
    // returns the autentication adaptor for a doctrine table
    protected function _getAuthAdapter() {
        
    	$authAdapter = new Coda_Doctrine_Auth_Adapter(Doctrine_Core::getConnectionByTableName('Coda_Model_User'));
    
    	$authAdapter
	    	->setTableName('Coda_Model_User')
	    	->setIdentityColumn('email')
	    	->setCredentialColumn('password')
	    	->setCredentialTreatment('MD5(?)');
    
    	return $authAdapter;
    }

}

