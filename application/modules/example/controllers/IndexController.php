<?php
class Example_IndexController extends Coda_Controller
{
    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
			$form = new Example_Form_Example();
			if($this->_request->isPost() && $form->isValid($this->_getAllParams()))
			{
				
			}
			
			$this->view->title = "Example Zend Form using Twitter Bootstrap";
			$this->view->form = $form;
    }


}

