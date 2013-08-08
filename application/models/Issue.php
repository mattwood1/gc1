<?php
class Coda_Model_Issue extends Doctrine_Record 
{

    public function setTableDefinition()
    {
        	
        $this->setTableName('issue');
        
        $this->hasColumn('issueId', 'integer', 11, array(
                'type' 			=> 'integer',
                'fixed' 		=> 0,
                'unsigned' 		=> true,
                'primary' 		=> true,
                'autoincrement' => true,
                'length' 		=> '11'
        ));
    
        $this->hasColumn('dateCreated', 'timestamp', 25, array(
                'type'				=> 'timestamp',
                'length' 			=> '25'
        ));
    
        $this->hasColumn('dateLoggedIn', 'timestamp', 25, array(
                'type'				=> 'timestamp',
                'length' 			=> '25'
        ));
    
        $this->hasColumn('issueType', 'integer', 11, array(
                'type'				=> 'integer',
                'length' 			=> '11'
        ));
    
        $this->hasColumn('title', 'string', 1000, array(
                'type'				=> 'string',
                'length' 			=> '1000'
        ));
    
        $this->hasColumn('status', 'integer', 11, array(
                'type'				=> 'integer',
                'length' 			=> '11'
        ));
    
    }
    
    public function setUp()
    {
    	$this->hasMany('Coda_Model_IssueComment as comments', array(
    			'local' => 	'issueId',
    			'foreign' => 'issueId',
    			'cascade' => array('delete')
    	));
    	
    	$this->hasOne('Coda_Model_IssueStatus as status', array(
    			'local' => 	'issueStatusId',
    			'foreign' => 'issueStatusId'
    	));
    	
    	$this->hasOne('Coda_Model_IssueType as type', array(
    			'local' => 	'status',
    			'foreign' => 'issueTypeId'
    	));
    }
}