<?php
class Coda_Model_Club extends Doctrine_Record 
{

    public function setTableDefinition()
    {
        	
        $this->setTableName('club');
        	
        $this->hasColumn('clubId', 'integer', 11, array(
                'type' 			=> 'integer',
                'fixed' 		=> 0,
                'unsigned' 		=> true,
                'primary' 		=> true,
                'autoincrement' => true,
                'length' 		=> '11',
        ));
        
        $this->hasColumn('userId', 'integer', 11, array(
        		'type' 			=> 'integer',
        		'length' 		=> '11',
        ));
    
        $this->hasColumn('category', 'string', 1000, array(
                'type'				=> 'string',
                'length' 			=> '1000'
        ));
    
        $this->hasColumn('title', 'string', 1000, array(
                'type'				=> 'string',
                'length' 			=> '1000'
        ));
    
        $this->hasColumn('description', 'string', 1000, array(
                'type'				=> 'string',
                'length' 			=> '1000'
        ));
    
        $this->hasColumn('logo', 'string', 1000, array(
                'type'				=> 'string',
                'length' 			=> '1000'
        ));
    
        $this->hasColumn('telephone', 'string', 1000, array(
                'type'				=> 'string',
                'length' 			=> '1000'
        ));
    
        $this->hasColumn('email', 'string', 1000, array(
                'type'				=> 'string',
                'length' 			=> '1000'
        ));
    
        $this->hasColumn('facebook', 'string', 1000, array(
                'type'				=> 'string',
                'length' 			=> '1000'
        ));
    
        $this->hasColumn('twitter', 'string', 1000, array(
                'type'				=> 'string',
                'length' 			=> '1000'
        ));
    
        $this->hasColumn('url', 'string', 1000, array(
                'type'				=> 'string',
                'length' 			=> '1000'
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
    	$this->hasMany('Coda_Model_Address as addresses', array(
    			'local' => 	'clubId',
    			'foreign' => 'clubId',
				'cascade' => array('delete')
    	));
    }
}