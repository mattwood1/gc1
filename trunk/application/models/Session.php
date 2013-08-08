<?php
class Coda_Model_Session extends Doctrine_Record
{

	public function setTableDefinition()
	{
		 
		$this->setTableName('session');
		 
		$this->hasColumn('sessionId', 'integer', 11, array(
				'type' 			=> 'integer',
				'fixed' 		=> 0,
				'unsigned' 		=> true,
				'primary' 		=> true,
				'autoincrement' => true,
				'length' 		=> '11',
		));

		$this->hasColumn('addressId', 'integer', 11, array(
				'type' 			=> 'integer',
				'length' 		=> '11',
		));

		$this->hasColumn('description', 'string', 1000, array(
				'type'				=> 'string',
				'length' 			=> '1000'
		));

		$this->hasColumn('days', 'string', 1000, array(
				'type'				=> 'string',
				'length' 			=> '1000'
		));

		$this->hasColumn('timeStart', 'timestamp', 25, array(
				'type'				=> 'timestamp',
				'length' 			=> '25'
		));

		$this->hasColumn('timeEnd', 'timestamp', 25, array(
				'type'				=> 'timestamp',
				'length' 			=> '25'
		));

		

		$this->hasColumn('dateCreated', 'timestamp', 25, array(
				'type'				=> 'timestamp',
				'length' 			=> '25'
		));
		
		$this->hasColumn('dateModified', 'timestamp', 25, array(
				'type'				=> 'timestamp',
				'length' 			=> '25'
		));
	}

	public function setUp()
	{
		$this->hasOne('Coda_Model_Address', array(
				'local' => 	'addressId',
				'foreign' => 'addressId'
		));
		
	}
}