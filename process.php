<?php
require_once 'settings.php';
$member = new Member();
$middleware = new Middleware();

if(Input::exist('add_token'))
  {
    switch(Input::get('add_token'))
    {
      case 'add_member':
	         if($member->addMember()) Redirect::to('views/index.php?page=new_member');
	         else Redirect::to(502);
	  break;

	  case 'duplicate_exist':
	  echo	$member->duplicatesExist(/*Input::get('first_name'), Input::get('last_name')*/'william', 'Kumah');
	  
    }

  }


 if(Input::exist('token','get'))
 	{
 		switch(Input::get('token'))
 		{
 			case 'duplicates':
 			$middleware->loadDuplicateNames(/*Input::get('f_name'), Input::get('l_name')*/'william', 'sarfo', $member);
 			break;

 			case 'get_member_details':
             $middleware->displayMemberDetails(Input::get('unique_id'), $member);
            break;
 		}
 	}
