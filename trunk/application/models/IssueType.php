<?php
class Coda_Model_IssueType extends Doctrine_Record 
{

    public function setTableDefinition()
    {
        	
        $this->setTableName('issueType');
        
        /*
    issueTypeId 	int(11) 			No 		auto_increment 	Browse distinct values 	Change 	Drop 	Primary 	Unique 	Index 	Fulltext
	type 	text 	utf8_general_ci 		No	
         */
        	
        $this->hasColumn('issueTypeId', 'integer', 11, array(
                'type' 			=> 'integer',
                'fixed' 		=> 0,
                'unsigned' 		=> true,
                'primary' 		=> true,
                'autoincrement' => true,
                'length' 		=> '11',
        ));
    
        $this->hasColumn('type', 'string', 1000, array(
                'type'				=> 'string',
                'length' 			=> '1000'
        ));
    }
    
    public function setUp()
    {
	    $this->hasMany('Coda_Model_Issue as issues', array(
	    		'local' => 	'issueTypeId',
	    		'foreign' => 'issueType'
	    ));
    }
}