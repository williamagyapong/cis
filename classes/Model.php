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

    protected $table = 'users';
    protected $table2 = 'members';
    protected $table3 = 'families';
    protected $table4 = 'children';
    protected $table5 = 'visitors';
    protected $table6 = 'occasions';
    protected $table7 = 'ministries';
    protected $table8 = 'zones';
    protected $table9 = 'languages';
    protected $table10 = 'regions';
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