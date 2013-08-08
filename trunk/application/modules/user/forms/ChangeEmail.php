<?php
class User_Form_ChangeEmail extends Twitter_Form
{
    public function init()
    {
    	// Make this form horizontal
    	$this->setAttrib("horizontal", true);
    	

        $this
        
        ->addElement("text", "email", array(
				"label" => "Email Address",
				"required" => true,
				"placeholder" => "Your current email address",
		))
        
        ->addElement("text", "emailNew", array(
				"label" => "New Email Address",
				"required" => true,
				"placeholder" => "Your new email address",
				"validators" => array(
						'EmailAddress',
						'validator'		=> new Coda_Doctrine_Validate_NoRecordExists('Coda_Model_User', 'email')
				)
		))
		
		->addElement("submit", "submit", array(
				"label" => "Change Email"
		));
    }
}