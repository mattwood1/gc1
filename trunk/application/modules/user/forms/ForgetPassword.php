<?php
class Auth_Form_ForgetPassword extends Xigen_Form
{
    public function setup()
    {
        $emailExists = new Zend_Validate_Db_RecordExists(
                array('table' => 'user', 'field' => 'email')
        );

        $this->addElement('text', 'email', array(
            'label' => 'Please enter your Email',
            'required' => true,
            'filters' => array('StripTags', 'StringTrim'),
            'validators' => array('Alnum', $emailExists)
        ));

        $this->addSubmit('Reset password');
    }
}