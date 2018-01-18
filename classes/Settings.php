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
		if($this->db->insert($this->table9, [
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
	public function getLanguage($name=null)
	{
		if(!$name)
		{
			return $this->db->get($this->table9, [])->all();
		} 
		else
		{
			return array();
		}
	}


	/**
	* retrieve languages
	* @param
	* @var
	* @return
	*/
	public function resetPassword()
	{
		
	}

}




