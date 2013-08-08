<?php
class Coda_Model_Address extends Doctrine_Record
{

	public function setTableDefinition()
	{
		 
		$this->setTableName('address');
		 
		$this->hasColumn('addressId', 'integer', 11, array(
				'type' 			=> 'integer',
				'fixed' 		=> 0,
				'unsigned' 		=> true,
				'primary' 		=> true,
				'autoincrement' => true,
				'length' 		=> '11',
		));

		$this->hasColumn('clubId', 'integer', 11, array(
				'type' 			=> 'integer',
				'length' 		=> '11',
		));

		$this->hasColumn('premise', 'string', 1000, array(
				'type'				=> 'string',
				'length' 			=> '1000'
		));

		$this->hasColumn('street_number', 'string', 1000, array(
				'type'				=> 'string',
				'length' 			=> '1000'
		));

		$this->hasColumn('route', 'string', 1000, array(
				'type'				=> 'string',
				'length' 			=> '1000'
		));

		$this->hasColumn('locality', 'string', 1000, array(
				'type'				=> 'string',
				'length' 			=> '1000'
		));

		$this->hasColumn('postal_town', 'string', 1000, array(
				'type'				=> 'string',
				'length' 			=> '1000'
		));

		$this->hasColumn('administrative_area_level_2', 'string', 1000, array(
				'type'				=> 'string',
				'length' 			=> '1000'
		));

		$this->hasColumn('postal_code', 'string', 1000, array(
				'type'				=> 'string',
				'length' 			=> '1000'
		));

		$this->hasColumn('country', 'string', 1000, array(
				'type'				=> 'string',
				'length' 			=> '1000'
		));

		$this->hasColumn('lat', 'decimal', 10, array(
				'type'				=> 'decimal',
				'length' 			=> '10',
				'scale'				=> '6'
		));

		$this->hasColumn('lng', 'decimal', 10, array(
				'type'				=> 'decimal',
				'length' 			=> '10',
				'scale'				=> '6'
		));

		$this->hasColumn('deleted', 'integer', 1, array(
				'type'				=> 'integer',
				'length' 			=> '1',
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
		$this->hasMany('Coda_Model_Session as sessions', array(
				'local' => 	'addressId',
				'foreign' => 'addressId',
				'cascade' => array('delete')
		));
		
		$this->hasOne('Coda_Model_Club', array(
				'local' => 	'clubId',
				'foreign' => 'clubId'
		));
		
	}
}