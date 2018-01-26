<?php

class Member extends Model 
{

    /**
	* retrieve members records
	* @param
	* @var
	* @return
	*/
	public function get($id = null)
	{
		if($id)
		{
			//select a particular member
			return $this->db->select("SELECT * FROM {$this->members} WHERE `id`='$id'")->first();
		}
		else
		{
			//select all members
	        //return $this->db->select("SELECT * FROM {$this->table2} ORDER BY `f_name` ASC")->all();
	        return $this->db->get($this->members, array())->all();
			
		}
		
	}



    /**
	* fetch total number of adults
	* @param void
	* @var
	* @return int
	*/
	public function getAdults($childAgeLimit=18)
	{
        $members = $this->get();
        $data    = []; //initialize empty data array
        $thisYear = date('Y');
        foreach($members as $member) {
        	$birthYear = date('Y', strtotime($member->birth_date));
        	$age = $thisYear - $birthYear;
        	if($age>=$childAgeLimit) {
        		$data[] = $member;
        	}
        }
        return $data;
		//return $this->db->select("SELECT * FROM {$this->table2} WHERE `age`>={$childAgeLimit} ORDER BY `f_name` ASC")->all();
	}


	/**
	* fetch total number of children
	* @param void
	* @var
	* @return int
	*/
	public function getChildren($childAgeLimit=18)
	{
        $members = $this->get();
        $data    = []; //initialize empty data array
        $thisYear = date('Y');
        foreach($members as $member) {
        	$birthYear = date('Y', strtotime($member->birth_date));
        	$age = $thisYear - $birthYear;
        	if($age<$childAgeLimit) {
        		$data[] = $member;
        	}
        }
        return $data;
	}



	/**
	* fetch total number of children
	* @param token | string
	* @var
	* @return array
	*/
	public function getBaptised($token = null)
	{
		if($token) {
			return $this->db->get($this->members, array('baptismal_status', '=','not baptised'))->all();
		} else {
			return $this->db->get($this->members, array('baptismal_status', '=','baptised'))->all();
		}
	}

    
    /**
	* fetch all birthdays within a week
	* @param period in days | int
	* @var
	* @return array
	*/
    public function getBirthDays($period=7)
    {
    	$members = $this->get();
    	$data    = []; //initialize empty data array
    	$dateLimit = $period*24*3600;
    	foreach($members as $member) {
    		$birthDayToSeconds = strtotime(date('Y-').date('m-d',strtotime($member->birth_date)));
    		$todayToSeconds = strtotime(date('Y-m-d'));
    		$timeLeft = $birthDayToSeconds-$todayToSeconds;
    		if($timeLeft<0) {
    			continue;//skip past birthdays
    		}
    		if($timeLeft>=0 && $timeLeft <=$dateLimit) {
    			//get birthdays from today till the next seven days
    			$data[] = $member;
    		}
    	}
    	return $data;
    }


	/**
	* retrieve members records
	* @param
	* @var
	* @return
	*/
	public function getMinistry($memberId=null)
	{
		if($memberId)
		{
			return $this->db->get($this->ministries, array('id','=',$memberId))->first();
		}
		else
		{
			return $this->db->get($this->ministries, array())->all();
		}
	}


	/**
	* retrieve ministry members records
	* @param
	* @var
	* @return
	*/
	public function getMinistryMembers($ministryId=null)
	{
		if($ministryId)
		{
			return $this->db->get($this->members, array('ministry_id','=',$ministryId))->all();
		}
		return array();
	
	}


	/**
	* retrieve members records
	* @param
	* @var
	* @return
	*/
	public function getZone($zoneId=null)
	{
		if($zoneId)
		{
			return $this->db->get($this->zones, array('id','=',$zoneId))->first();
		}
		else
		{
			return $this->db->get($this->zones, array())->all();
		}
	}


	/**
	* retrieve zone members records
	* @param
	* @var
	* @return
	*/
	public function getzoneMembers($zoneId=null)
	{
		if($zoneId)
		{
			return $this->db->get($this->members, array('zone_id','=',$zoneId))->all();
		}
		return array();
	}



    /**
	* retrieve regions
	* @param
	* @var
	* @return
	*/
	public function getRegion($token=null)
	{
		if($token) {
			$field = (is_numeric($token))?'id':'name';
			return $this->db->get($this->regions, array($field,'=',$token))->first();
		} 
		else {
			return $this->db->get($this->regions, array())->all();
		}
	}


	/**
	* finds duplicate names
	* @param
	* @var
	* @return
	*/
	public function getDuplicates($firstName, $lastName)
	{
	   return $this->db->select("SELECT * FROM {$this->members} WHERE `f_name`='{$firstName}' AND `l_name` = '{$lastName}'")->all();
	}


	/**
	* finds duplicate names
	* @param
	* @var
	* @return
	*/
	public function duplicatesExist($firstName, $lastName)
	{
		if(count($this->getDuplicates($firstName, $lastName))>0) return true;
		
		return false;
	}


   /**
	* automatically generate unique id for members
	* @param
	* @var
	* @return
	*/
    public function getLastRegistered()
    {
    	return $this->db->select("SELECT id FROM {$this->members} ORDER BY id DESC LIMIT 1")->first();
    }

	/**
	* automatically generate unique id for members
	* @param
	* @var
	* @return
	*/
    public function generateId()
    {
    	$dateOfBirth = Input::get('birth_date');
    	$lastStr = sprintf('%06d', ($this->getLastRegistered()->id+1));
    	if(!empty($dateOfBirth))
    		{   
    			$timeStamp = strtotime($dateOfBirth);
    			$code =  date('d', $timeStamp).date('m', $timeStamp).$lastStr;
    			$result = $this->db->get($this->members, array('member_code','=', $code))->all();
    			if(count($result)==0) return $code;
    			else
    			    return false;
    		}
    }


    /**
	* add a new member to the database
	* @param
	* @var
	* @return
	*/
	public function addMember()
	{
		$father = json_encode(array('name'=>Input::get('father_name'), 'contact'=>Input::get('father_contact')));
		$mother = json_encode(array('name'=>Input::get('mother_name'), 'contact'=>Input::get('mother_contact')));
		$memberCode = $this->generateId();
		$age = date('Y') - date('Y', strtotime(Input::get('birth_date')));
		$baptismalStatus = (Input::get('baptismal_status')=='on')?'baptised':'not baptised';
		$baptisedAt = (Input::get('baptised_at')=='Gbawe')?Input::get('baptised_at'):Input::get('other_baptised_cong');
	
	    if($memberCode !=0)
	    {
	    	$run = $this->db->insert($this->members, [
	    										  'member_code'=>$memberCode,
												  'f_name'=>Input::get('first_name'),
												  'm_name'=>Input::get('middle_name'),
												  'l_name'=>Input::get('last_name'),
												  'gender'=>Input::get('gender'),
												  'birth_date'=>Input::get('birth_date'),
												  'age'=>$age,
												  'home_town'=>Input::get('home_town'),
												  'region'=>Input::get('home_region'),
												  'languages'=>json_encode($_POST['languages']),
												  'phone'=>Input::get('phone'),
												  'phone_other'=>Input::get('phone_other'),
												  'email'=>Input::get('email'),
												  'picture'=>Input::get('saved_picture'),
												  'education'=>Input::get('education'),
												  'occupation'=>Input::get('occupation'),
												  'residence'=>Input::get('residence'),
												  'marital_status'=>Input::get('marital_status'),
												  'baptismal_status'=>$baptismalStatus,
												  'baptised_on'=>Input::get('date_baptised'),
												  'baptised_at'=>$baptisedAt,
												  'blood_group'=>Input::get('blood_group'),
												  'sickling_status'=>Input::get('sickling_status'),
												  'kids'=>Input::get('kids'),
												  'ministry_id'=>Input::get('ministry'),
												  'zone_id'=>Input::get('zone'),
												  'father'=>$father,
												  'mother'=>$mother
												]);
		
		if($run) 
		{
			// add member to users
			$year = date('Y', strtotime(Input::get('date_baptized')));
			$run2 = $this->db->insert($this->users, [
				                                       'username'=>Input::get('first_name'),
				                                       'password'=>Hash::make($memberCode),
				                                       'member_id'=>$this->db->lastInsertedId(),
				                                       'role'=>'Ordinary',
				                                       'date_registered'=>date('Y-m-d')
			                                         ]);
			if($run2) return true;
			Session::put('add_new_errors', 'failed to create user<br>');
			return false;
		}
		else
			{
				  Session::put('add_new_errors', 'registration failed<br>');
			      return false;
			}
	    }
	    else
	    {
	    	Session::put('add_new_errors',$memberCode.' duplicate member code<br>');
	    	return false;//validation failed
	    }
		
												  
    }
}