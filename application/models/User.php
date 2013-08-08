<?php
class Coda_Model_User extends Doctrine_Record 
{

    public function setTableDefinition()
    {
        	
        $this->setTableName('user');
        	
        $this->hasColumn('userId', 'integer', 11, array(
                'type' 			=> 'integer',
                'fixed' 		=> 0,
                'unsigned' 		=> true,
                'primary' 		=> true,
                'autoincrement' => true,
                'length' 		=> '11',
        ));
    
        $this->hasColumn('firstName', 'string', 1000, array(
                'type'				=> 'string',
                'length' 			=> '1000'
        ));
    
        $this->hasColumn('lastName', 'string', 1000, array(
                'type'				=> 'string',
                'length' 			=> '1000'
        ));
    
        $this->hasColumn('email', 'string', 1000, array(
                'type'				=> 'string',
                'length' 			=> '1000',
        		'email'				=> true,
        		'unique' 			=> true
        ));
    
        $this->hasColumn('password', 'string', 1000, array(
                'type'				=> 'string',
                'length' 			=> '1000'
        ));
    
        $this->hasColumn('dateCreated', 'timestamp', 25, array(
                'type'				=> 'timestamp',
                'length' 			=> '25'
        ));
    
        $this->hasColumn('dateLoggedIn', 'timestamp', 25, array(
                'type'				=> 'timestamp',
                'length' 			=> '25'
        ));
    
    }
    
    public function setUp()
    {
    	$this->hasMany('Coda_Model_Club as clubs', array(
    			'local' => 	'userId',
    			'foreign' => 'userId',
    			'cascade' => array('delete')
    	));
    }
}