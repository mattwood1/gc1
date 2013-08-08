<?php
class Coda_Model_UserTable extends Doctrine_Record 
{
	public static function getInstance()
	{
		return Doctrine_Core::getTable('Coda_Model_User');
	}
}