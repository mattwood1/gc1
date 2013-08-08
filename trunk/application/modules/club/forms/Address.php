<?php
class Club_Form_Address extends Twitter_Form
{
	public function init()
	{
		$this->setAttrib('horizontal', true);

		$this->addElement('text', 'premise', array(
				'label' => 'Building'
		));
		
		$this->addElement('text', 'street_number', array(
				'label' => 'Number'
		));
		
		$this->addElement('text', 'route', array(
				'label' => 'Street',
		));

		$this->addElement('text', 'locality', array(
		));

		$this->addElement('text', 'postal_town', array(
				'label' => 'Town / City',
		));

		$this->addElement('text', 'administrative_area_level_2', array(
				'label' => 'County',
		));

		$this->addElement('text', 'postal_code', array(
				'label' => 'Postcode',
		));

		$this->addElement('text', 'country', array(
				'label' => 'Country'
		));

		/*
		$locale = new Zend_Locale('en_GB');
		$countries = $locale->getTranslationList('Territory', 'en', 2);
		asort($countries, SORT_LOCALE_STRING);
		$this->addElement('select', 'country', array(
				'label' => 'Country',
				'required' => true,
				'multiOptions' => $countries,
				'value' => 'GB'
		));
		*/
		$this->addElement('hidden', 'lat', array(
				'label' => 'Latitude',
		));

		$this->addElement('hidden', 'lng', array(
				'label' => 'Longditude'
		));

		//$this->addElement("submit", "save", array("label" => "Save"));
		//$this->addElement("submit", "lookup", array("label" => "Lookup"));
	}
}