<?php

class Settings extends Model 
{
	/**
	* add new language
	* @param
	* @var
	* @return
	*/
	public function addLanguage()
	{
		if($this->db->insert($this->languages, [
												'type'=>Input::get('type'),
												'name'=>Input::get('language')
		                                    ])) return true;
			return false;
	}


	/**
	* retrieve languages
	* @param
	* @var
	* @return
	*/
	public function getLanguage($token=null)
	{

		if($token)
		{
			//fetch a particular language
			return $this->db->get($this->languages, ['id','=',$token])->first();	
		} 
		else
		{
			// fetch all languages
			return $this->db->get($this->languages, [])->all();
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
		
	}

}




