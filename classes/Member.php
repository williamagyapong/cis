<?php

class Member extends Model 
{

    /**
	* retrieve members records
	* @param
	* @var
	* @return
	*/
	public function get($token = null)
	{
		if($token)
		{
			//select a particular member
			if($token=='deaths'){
				//fetch dead members
				return $this->db->get($this->members, array('status','=',0))->all();

			} elseif(strlen($token)==10) {
				//fetch relation data with primary phone/memberId where relation is a member
				$sql = "SELECT * FROM {$this->members} WHERE `phone`='{$token}' OR `member_code` ='{$token}'";
				return $this->db->select($sql)->first();
			}
			else {
				//fetch a particular member's data
				return $this->db->get($this->members, array('id','=',$token))->first();
			}
		}
		else
		{
			//fetch all members
	        //return $this->db->select("SELECT * FROM {$this->table2} ORDER BY `f_name` ASC")->all();
	        return $this->db->get($this->members, array('status','=',1))->all();
			
		}
		
	}


	/**
	* fetch relations
	* @param void
	* @var
	* @return int
	*/
	public function getRelation($memberId,$token)
	{   
	
		$sql = "SELECT * FROM {$this->relations} WHERE `member_id`='{$memberId}' AND `type` = '{$token}'";
		return  $this->db->select($sql)->first();
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
	/*public function getBaptised($token = null)
	{
		if($token) {
			return $this->db->get($this->members, array('baptismal_status', '=','not baptised'))->all();
		} else {
			return $this->db->get($this->members, array('baptismal_status', '=','baptised'))->all();
		}
	}*/

    
    /**
	* fetch all birthdays within a specified period. It defaults to 7 days/1 week
	* period is used here to mean the birthday period
	* @param period in days | int
	* @var
	* @return array
	*/
    public function getBirthDays($period=7)
    {
    	$members = $this->get();
    	$data    = []; //initialize empty data array 
    	$dateLimit = $period*24*3600;//convert period in days to seconds
    	$daysLeft = 31- date('d');//days left in last month
    	$day = date('Y-12-29');
        $nextYear = (string)(date('Y') +1); //the year following the current year
    	foreach($members as $member) 
    	{
    		#where birthday period falls with the current year
    	    //find seconds equivalence to birthday
	        $birthdayToSeconds = strtotime(date('Y-').date('m-d',strtotime($member->birth_date)));
    		$todayToSeconds = strtotime(date('Y-m-d'));
    		$timeLeft = $birthdayToSeconds-$todayToSeconds;
    		//$data[] = $birthdayToSeconds.'-'.$todayToSeconds.'-'.$timeLeft.'-'.$dateLimit;
    		if($timeLeft<0) {
    			continue;//skip past birthdays
    		}
    		

    		if($timeLeft>=0 && $timeLeft <=$dateLimit) {
    			//get birthdays within the period
    			$data[] = $member;
    		}
        
            //find out whether birthday period extends into the following year
            /*if((date('m', strtotime($day)) == '12') && ($daysLeft<$period)) 
            {    
            	#fetch birthdays where birthday period extend into the following year.
            	#the magic here is simply changing the year to the next year

            	 //find seconds equivalence to birthday
    		    $birthdayToSeconds = strtotime($nextYear.date('-m-d',strtotime($member->birth_date)));
    		    $todayToSeconds = strtotime('2018-12-29');//there is a problem here
	    		$timeLeft = $birthdayToSeconds-$todayToSeconds;
	    		//$data[] = $birthdayToSeconds.'-'.$todayToSeconds.'-'.$timeLeft.'-'.$dateLimit;
	    		if($timeLeft<0) {
	    			continue;//skip past birthdays
	    		}
	    		
                //$data[] = $member;
	    		if($timeLeft>=0 && $timeLeft <=$dateLimit) {
	    			//get birthdays within the period
	    			$data[] = $member;
	    		}


            } */
    		
    	}
        //rint_array($data);
    	return $data;//output all birthdays collected
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
			//return $this->db->get($this->ministries, array())->all();
			return $this->db->select("SELECT * FROM {$this->ministries} ORDER BY `name` ASC")->all();
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
			//return $this->db->get($this->zones, array())->all();
			return $this->db->select("SELECT * FROM {$this->zones} ORDER BY `name` ASC")->all();
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

		$memberCode = $this->generateId();
		//$age = date('Y') - date('Y', strtotime(Input::get('birth_date')));
		$baptismalStatus = (Input::get('baptismal_status')=='on')?'baptised':'not baptised';
		$baptisedAt = (Input::get('where_baptised')=='Gbawe')?Input::get('where_baptised'):Input::get('other_baptised_cong');
		$bContactPerson = json_encode(array('name'=>Input::get('contact_person'), 'phone'=>Input::get('contact_person_phone')));
	
	    if($memberCode !=0)
	    {
	    	$run = $this->db->insert($this->members, [
	    										  'member_code'=>$memberCode,
												  'f_name'=>Input::get('first_name'),
												  'm_name'=>Input::get('middle_name'),
												  'l_name'=>Input::get('last_name'),
												  'gender'=>Input::get('gender'),
												  'birth_date'=>Input::get('birth_date'),
												  'home_town'=>Input::get('home_town'),
												  'region_id'=>Input::get('home_region'),
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
												  'b_contact_person'=>$bContactPerson,
												  'blood_group'=>Input::get('blood_group'),
												  'sickling_status'=>Input::get('sickling_status'),
												  'kids'=>Input::get('kids'),
												  'ministry_id'=>Input::get('ministry'),
												  'zone_id'=>Input::get('zone')
												]);
		
		if($run) 
		{
			Session::put('new_member_id', $this->db->lastInsertedId());

			// add member to users
			$year = date('Y', strtotime(Input::get('date_baptized')));

			//add spouse

			$run2 = $this->db->insert($this->relations, [
														  'member_id'=>Session::get('new_member_id'),
														  'name'=>Input::get('spouse_name'),
														  'contact'=>Input::get('spouse_contact'),
														  'type'=>'spouse',
														  'deceased'=>(Input::get('marital_status')=='widowed')?'yes':'',
														  'member'=>Input::get('is_spouse_member')
			                                            ]);
			//}
			//add father
			$run3 = $this->db->insert($this->relations, [
														  'member_id'=>Session::get('new_member_id'),
														  'type'=>'father',
														  'name'=>Input::get('father_name'),
														  'contact'=>Input::get('father_contact'),
														  'deceased'=>Input::get('is_father_deceased'),
														  'member'=>Input::get('is_father_member')
			                                            ]);

			//add mother
			$run4 = $this->db->insert($this->relations, [
														  'member_id'=>Session::get('new_member_id'),
														  'type'=>'mother',
														  'name'=>Input::get('mother_name'),
														  'contact'=>Input::get('mother_contact'),
														  'deceased'=>Input::get('is_mother_deceased'),
														  'member'=>Input::get('is_mother_member')
			                                            ]);

			//add mother
			$run5 = $this->db->insert($this->relations, [
														  'member_id'=>Session::get('new_member_id'),
														  'type'=>'next_of_kin',
														  'name'=>Input::get('next_kin_name'),
														  'contact'=>Input::get('next_kin_contact'),
														  'relationship'=>Input::get('next_kin_relation')
			                                            ]);
			if($run2&&$run3&&$run4&&$run5) {
				Session::delete('new_member_id');
				return true;
			}
			Session::put('add_new_errors', 'failed to relations data<br>');
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



    /**
	* update member records to reflect any changes
	* @param
	* @var
	* @return
	*/
	public function updateProfile()
	{   
		$date = date('Y-m-d H:i:s');
		$by = Session::get('user');
		$memberId = Input::get('member_id');
		$baptismalStatus = (Input::get('baptismal_status')=='on')?'baptised':'not baptised';
		$baptisedAt = (Input::get('where_baptised')=='Gbawe')?Input::get('where_baptised'):Input::get('other_baptised_cong');
		$bContactPerson = json_encode(array('name'=>Input::get('contact_person'), 'phone'=>Input::get('contact_person_phone')));
	
	    	$run = $this->db->update($this->members, [
												  'f_name'=>Input::get('first_name'),
												  'm_name'=>Input::get('middle_name'),
												  'l_name'=>Input::get('last_name'),
												  'gender'=>Input::get('gender'),
												  'birth_date'=>Input::get('birth_date'),
												  'home_town'=>Input::get('home_town'),
												  'region_id'=>Input::get('home_region'),
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
												  'b_contact_person'=>$bContactPerson,
												  'blood_group'=>Input::get('blood_group'),
												  'sickling_status'=>Input::get('sickling_status'),
												  'kids'=>Input::get('kids'),
												  'ministry_id'=>Input::get('ministry'),
												  'zone_id'=>Input::get('zone')
												],$memberId);
		
		if($run) 
		{
			

			// update member user status
			
			//add spouse
			/*   $run3 = true;
			if(Input::get('marital_status'=='married')||Input::get('marital_status'=='separated')||Input::get('marital_status'=='divorced')||Input::get('marital_status'=='widowed')) {
				$run3 = false;*/
				$run3 = $this->db->updateSpecial($this->relations, [
														  'name'=>Input::get('spouse_name'),
														  'contact'=>Input::get('spouse_contact'),
														  'member'=>Input::get('is_spouse_member'),
														  'deceased'=>(Input::get('marital_status')=='widowed')?'yes':'',
														  'last_modified'=>$date,
														  'modified_by'=>$by
			                                            ], "`member_id` = '{$memberId}' AND `type` = 'spouse'");
			//}
			//add father
			$run4 = $this->db->updateSpecial($this->relations, [
														  'name'=>Input::get('father_name'),
														  'contact'=>Input::get('father_contact'),
														  'deceased'=>Input::get('is_father_deceased'),
														  'member'=>Input::get('is_father_member'),
														  'last_modified'=>$date,
														  'modified_by'=>$by
			                                            ], "`member_id` = '{$memberId}' AND `type` = 'father'");

			//add mother
			$run5 = $this->db->updateSpecial($this->relations, [
														  
														  'name'=>Input::get('mother_name'),
														  'contact'=>Input::get('mother_contact'),
														  'deceased'=>Input::get('is_mother_deceased'),
														  'member'=>Input::get('is_mother_member'),
														  'last_modified'=>$date,
														  'modified_by'=>$by
			                                            ], "`member_id` = '{$memberId}' AND `type` = 'mother'");

			//add mother
			$run6 = $this->db->updateSpecial($this->relations, [
														  'name'=>Input::get('next_kin_name'),
														  'contact'=>Input::get('next_kin_contact'),
														  'relationship'=>Input::get('next_kin_relation'),
														  'last_modified'=>$date,
														  'modified_by'=>$by
			                                            ], "`member_id` = '{$memberId}' AND `type` = 'next_of_kin'");
			if($run3&&$run4&&$run5&&$run6) {
				return true;
			}
			Session::put('add_new_errors', 'failed to create user<br>');
			return false;
		}
		else
			{
				  Session::put('add_new_errors', 'registration failed<br>');
			      return false;
			}
												  
    }


}