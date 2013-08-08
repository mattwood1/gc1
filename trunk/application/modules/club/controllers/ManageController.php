<?php
/**
 * Class is designed to create, edit, and delete clubs 
 * @author Matthew Wood
 */
class Club_ManageController extends Coda_Controller
{
	private $_club;
	
	public function init()
    {
    	if (! $this->_request->user) {
    		$this->gotoRoute(array('module' => 'user', 'controller' => 'auth', 'action' => 'login'), 'default', true);
    	}
    	
    	Zend_Layout::getMvcInstance()->assign('clubs', $this->_request->user->clubs);
    	$this->_helper->layout->setLayout('manage');
		
    	if ($this->_request->getParam('id')) {
    		$this->_club = Doctrine_Core::getTable('Coda_Model_Club')->findOneBy('clubId', $this->_request->getParam('id'));
		
    	
			if ($this->_club == null && $this->_club->userId != $this->_request->user->userId) {
				$this->gotoRoute(array('action' => 'index', 'id' => null));
			}
			$this->view->club = $this->_club;
    	}
		
		$this->view->clubs = $this->_request->user->clubs;
    	
    }
	
	public function indexAction()
	{
		// List the current clubs using init function above.
	}
	
	public function overviewAction()
	{
		// List the current club using init function above.
		
		//$addresses = Coda_Model_AddressTable::getActiveAddressesByClubId($this->_request->getParam('id'));
		
	}
	
	public function createAction()
	{
		$form = new Club_Form_Club();
		
		if ($this->_request->isPost() && $form->isValid($this->_request->getPost())) {
			// Create a club.
			$zfDate = new Zend_Date();
			$this->_club = Doctrine_Core::getTable('Coda_Model_Club')->create(
					array_merge($form->getValues(), array(
							'userId' => $this->_request->user->userId,
							'dateCreated' => $zfDate->get(Zend_Date::ISO_8601))
					));
			$this->_club->save();
			
			// Goto Club manage id to add places and times
			$this->gotoRoute(array('action' => 'place', 'id' => $this->_club->clubId));
		}
		
		$this->view->form = $form;
	}
	
	public function editClubAction()
	{
		$form = new Club_Form_Club();
		
		if ($this->_request->isPost() && $form->isValid($data = $this->_request->getPost())) {
			$this->_club->fromArray($form->getValues());
			$this->_club->save();
			$this->gotoRoute(array('action' => 'overview'));
		}
		
		$form->populate($this->_club->toArray());
		
		$this->view->form = $form;
	}
	
	public function deleteClubAction()
	{
		$this->_club->delete();
		$this->gotoRoute(array('action' => 'index'));
	}
	
	public function placeAction()
	{
		// List current places
		// Addresses are got by relationship to club.		
	}
	
	public function addPlaceAction()
	{
		$form = new Club_Form_Address();
		
		if ($this->_request->isPost() && $form->isValid($this->_request->getPost())) {

			if ($this->_request->getPost('save')) {
				$zfDate = new Zend_Date();
				$address = Doctrine_Core::getTable('Coda_Model_Address')->create(
					array_merge($form->getValues(), array(
							'clubId' => $this->_request->getParam('id'),
							'dateCreated' => $zfDate->get(Zend_Date::ISO_8601))
					));
				$address->save();
				$this->gotoRoute(array('action' => 'place'));
			}
			
			if ($this->_request->getPost('lookup')) {
				$googleAddress = Coda_Google_Address::lookupAddress($form->getValues());
				$form->populate($googleAddress);
			}
			$form->addElement("submit", "save", array("label" => "Save"));
		} 
		$form->addElement("submit", "lookup", array("label" => "Lookup"));
		$this->view->form = $form;
	}
	
	public function deletePlaceAction()
	{
		// Soft delete only
		$address = Doctrine_Core::getTable('Coda_Model_Address')->findOneBy('AddressId', $this->_request->getParam('address'));
		$address->delete();
		$this->_redirectBack();
	}
	
	public function addSessionAction()
	{
		
	}
	
	public function deleteSessionAction()
	{
		
	}
}