<?php
class User_AdminController extends Coda_Controller
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
		$users = Doctrine_Core::getTable('Coda_Model_User')->findAll();
		
		$this->view->title = "User Administration";
		$this->view->users = $users;
    }


}