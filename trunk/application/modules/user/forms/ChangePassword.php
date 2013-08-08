<?php
class User_Form_ChangePassword extends Twitter_Form
{
    public function init()
    {
    	// Make this form horizontal
    	$this->setAttrib("horizontal", true);
    	

        $this->addElement('password', 'password', array(
            'label' => 'Current Password',
            'required' => true,
			'placeholder' => 'Your current password',
            'filters' => array('StripTags', 'StringTrim'),
            'validators' => array('Alnum')
        ));
        
        $this->addElement('password', 'passwordNew', array(
            'label' => 'New Password',
            'required' => true,
			'placeholder' => 'Your new password',
        	'validators'  => array(array('StringLength', false, array(4,15))),
            'filters' => array('StripTags', 'StringTrim'),
        ));
        
        $this->addElement('password', 'passwordNewConfirm', array(
            'label' => 'Password Confirm',
            'required' => true,
			'placeholder' => 'Confirm your new password',
            'filters' => array('StripTags', 'StringTrim'),
            'validators' => array(array('identical', false, array('token' => 'passwordNew')))
        ));
                
        $this->addElement("submit", "submit", array(
				"label" => "Change Password"
		));
    }
}