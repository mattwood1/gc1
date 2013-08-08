<?php
class User_RegistrationController extends Coda_Controller
{
    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
    	$zfDate = new Zend_Date();
		$form = new User_Form_Registration();
		
		if ($this->_request->isPost() && $form->isValid($this->_getAllParams())) {
			//process form
					
			$user = Doctrine_Core::getTable('Coda_Model_User')->create(array(
					'firstName' => $form->getValue('firstName'),
					'lastName' => $form->getValue('lastName'),
					'email' => $form->getValue('email'),
					'password' => md5($form->getValue('password')),
					'dateCreated' => $zfDate->get(Zend_Date::ISO_8601)
			));
			if ($user->isValid()) {
				$user->save();
				$this->renderScript('registration/registered.phtml');
			}
			
			
			
		}
		
		$this->view->title = "Registration";
		$this->view->form = $form;
    }
}