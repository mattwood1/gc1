<?php
class Coda_Model_AddressTable extends Doctrine_Record 
{
	public static function getInstance()
	{
		return Doctrine_Core::getTable('Coda_Model_Address');
	}
	
}