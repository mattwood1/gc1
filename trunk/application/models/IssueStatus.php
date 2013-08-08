<?php
class Coda_Model_IssueStatus extends Doctrine_Record 
{

    public function setTableDefinition()
    {
        	
        $this->setTableName('issueStatus');
        
        /*
    issueStatusId 	int(11) 			No 		auto_increment 	Browse distinct values 	Change 	Drop 	Primary 	Unique 	Index 	Fulltext
	status 	text 	utf8_general_ci 		No
         */
        	
        $this->hasColumn('issueStatusId', 'integer', 11, array(
                'type' 			=> 'integer',
                'fixed' 		=> 0,
                'unsigned' 		=> true,
                'primary' 		=> true,
                'autoincrement' => true,
                'length' 		=> '11',
        ));
    
        $this->hasColumn('status', 'string', 1000, array(
                'type'				=> 'string',
                'length' 			=> '1000'
        ));
    }
    
    public function setUp()
    {
	    $this->hasMany('Coda_Model_Issue as issues', array(
	    		'local' => 	'issueStatusId',
	    		'foreign' => 'status'
	    ));
    }
}