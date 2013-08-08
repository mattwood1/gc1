<?php
class Club_Form_Club extends Twitter_Form
{
	public function init()
	{
		$this->setAttrib('horizontal', true);

		$this->addElement('text', 'title', array(
				'label' => 'Club Title',
				'required' => true,
				'placeholder' => 'Your Clubs Title or Name'
		));

		$this->addElement('text', 'category', array(
				'label' => 'Club Category',
				'required' => true,
				'placeholder' => 'Your Group or Club Category'
		));

		$this->addElement('textarea', 'description', array(
				'label' => 'Club Description',
				'placeholder' => 'Put a description about your club.'
		));

		$this->addElement('file', 'logo', array(
				'label' => 'Logo',
		));

		$this->addElement('text', 'telephone', array(
				'label' => 'Telephone',
		));

		$this->addElement('text', 'email', array(
				'label' => 'Email',
		));

		$this->addElement('text', 'facebook', array(
				'label' => 'Facebook URL',
		));

		$this->addElement('text', 'twitter', array(
				'label' => 'Twitter URL',
		));

		$this->addElement("submit", "submit", array("label" => "Submit"));
	}
}