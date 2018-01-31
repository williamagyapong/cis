<?php
/**
* A base class for project and material classes
* @author Agyapong William
* @since       
*/
class Model
{
	/**
	*set global variable for database interactions
	*@var string
	*/

    protected $users = 'users';
    protected $members = 'members';
    protected $families = 'families';
    protected $relations = 'relations';
    protected $visitors = 'visitors';
    protected $occasions = 'occasions';
    protected $ministries = 'ministries';
    protected $zones = 'zones';
    protected $languages = 'languages';
    protected $memberLanguages = 'member_languages';
    protected $regions = 'regions';
	protected $db;


	public function __construct() {
		$this->db = DBHandler::getInstance();
	}

	/**
	* fetch materials relating to a project
	* @param project id | int
	* @return array
	*/
	

}