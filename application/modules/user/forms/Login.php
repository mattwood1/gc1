<?php
class User_Form_Login extends Twitter_Form
{
	public function init()
	{
		// Make this form horizontal
		$this->setAttrib("horizontal", true);

		$this->addElement("text", "email", array(
			"label" => "Email",
			"placeholder" => "Your username"
		))
		
		->addElement("password", "password", array(
			"label" => "Password",
			"required" => true,
			"placeholder" => "Your password"
		))
		
		->addElement("submit", "login", array("label" => "Login"))
		
		/*
		->addElement('Link', 'forgotton', array(
				'label' => 'Forgotton Password',
				'url' => array('action' => 'forgotton')
		))
		/*
		->addElement("link", 'register', array(
				'label' => 'Registration',
				'url' => array('action' => 'registration')
		))
		*/
		;
	}
}