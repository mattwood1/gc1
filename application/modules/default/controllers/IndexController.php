<?php
class Default_IndexController extends Coda_Controller
{
    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
    	//$this->view->title = "Hobbies and Clubs.co.uk - Homepage";
    	
    	$clubs = Doctrine_Core::getTable('Coda_Model_Club')->findAll();
    	
    	$this->view->clubs = $clubs;
    }
}

