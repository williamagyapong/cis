<?php

/**
*
*@author Agyapong William
*@package Wrapper classes
*@since 01/10/2016
* User class
*/

class User
{
	private $_db,
	        $_data,
	        $_sessionName,
	        $_cookieName,
	        $_loggedIN = false;
 	
 	public function __construct($user = null, $table='users') 
 	{
 		$this->_db = DBHandler::getInstance();

 		$this->_sessionName = Config::get('session/session_name');

 		if(!$user) {
 			//get current user
 			if(Session::exist($this->_sessionName)) {
 				$user = Session::get($this->_sessionName);

                if($this->find($user, $table)) {
                	$this->_loggedIN = true;
                } else {
                	//process logout
                }
 			}
 		} else {
               //get another user 
 			$this->find($user, $table);
 		}
 	}
  
	
	public function create($fields = array())
	{
		if($this->_db->insert('users', $fields)) 
		{
			throw new Exception('There was a problem creating user account.');
		}
	}


	public function find($user=null, $table)
	 {
		if($user) {
			//we can search by username because it is always going to be unique
			$field =  (is_numeric($user))? 'id': 'username';
			$data = $this->_db->get($table, array($field, '=', $user));
            
			if($data->count()) {
				$this->_data = $data->first();

				return true;
			}
		}
		return false;
	}


	public function login($username=null, $password=null, $table="users") 
	{
		$user = $this->find($username, $table);
	    
	    if($user) 
	    {  //echo $this->data()->password.' '. Hash::make($password); die();
	    	if($this->data()->password == Hash::make($password)) 
	    	{
	    		
	    		Session::put($this->_sessionName, $this->data()->id);

	    		return true;
	    	}
	    }

	    return false;
	}


	public function logout()
	{
		    
			Session::delete($this->_sessionName);
      
		     return true;
	}

    public function update($table, $fields= array(), $id=null) 
    {

    	if(!$id && $this->isLoggedIn()) {
    		$id = $this->data()->id;
    	}
 
    	if(!$this->_db->update($table, $fields, $id)) {

    		throw new Exception("There was a problem updating!");
    	}
    }

    /**
	* reset password
	* @param
	* @var
	* @return
	*/
	public function resetPassword()
	{   
		$currentPass  = Hash::make(Input::get('old_password'));
		$newPassword = Hash::make(Input::get('new_password'));
		$newPasswordMatch = Hash::make(Input::get('new_password_again'));
        if($newPassword==$newPasswordMatch) {
        	$userData = $this->_db->get('users', ['password','=', $currentPass])->first();
			if(!empty($userData)) {
				if($this->_db->update('users', ['password'=>$newPassword], $userData->id)) {
					return true;
				} else {
					return false;
				}
			}
        }
        return false;
	}


	public function exists() 
	{
		return (!empty($this->_data))? true: false;
	}

	public function data()
	{
		return $this->_data;
	}
   

	public function isLoggedIn() 
	{
		return $this->_loggedIN;
	}

}

?>