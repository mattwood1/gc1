<?php
class Coda_Model_IssueComment extends Doctrine_Record 
{

    public function setTableDefinition()
    {
        	
        $this->setTableName('issueComment');
        
        $this->hasColumn('issueCommentId', 'integer', 11, array(
                'type' 			=> 'integer',
                'fixed' 		=> 0,
                'unsigned' 		=> true,
                'primary' 		=> true,
                'autoincrement' => true,
                'length' 		=> '11',
        ));
    
        $this->hasColumn('comment', 'string', 1000, array(
                'type'				=> 'string',
                'length' 			=> '1000'
        ));
    
        $this->hasColumn('issueId', 'integer', 11, array(
                'type'				=> 'integer',
                'length' 			=> '11'
        ));
    
        $this->hasColumn('userId', 'integer', 11, array(
                'type'				=> 'integer',
                'length' 			=> '11'
        ));
    
        $this->hasColumn('email', 'string', 1000, array(
                'type'				=> 'string',
                'length' 			=> '1000',
        		'email'				=> true,
        		'unique' 			=> true
       ));
    
    
        $this->hasColumn('dateCreated', 'timestamp', 25, array(
                'type'				=> 'timestamp',
                'length' 			=> '25'
        ));
    
    }
    
    public function setUp()
    {
    	$this->hasOne('Coda_Model_Issue as issue', array(
    			'local' => 	'issueId',
    			'foreign' => 'issueId'
    	));
    }
}