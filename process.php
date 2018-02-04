<?php
require_once 'settings.php';
$member = new Member();
$middleware = new Middleware();

if(Input::exist('add_token'))
  {
    switch(Input::get('add_token'))
    {
      case 'add_member':
	         if($member->addMember()) Redirect::to('view/index.php?page=new_member');
	         else Redirect::to(502);
	    break;

      case 'add_ministry':
          if(DBHandler::getInstance()->insert('ministries', ['name'=>ucwords(Input::get('ministry_name')),'leader'=>Input::get('member_id')])) {
             Redirect::to('view/index.php');
          } else {
            //error
            Redirect::to(503);
          }
      break;

      case 'add_zone':
          if(DBHandler::getInstance()->insert('zones', ['name'=>ucwords(Input::get('zone_name')),'leader'=>Input::get('member_id')])) {
             Redirect::to('view/index.php');
          } else {
            //error
            Redirect::to(503);
          }
      break;

      case 'assign_ministry_leader':
          if(DBHandler::getInstance()->update('ministries', ['leader'=>Input::get('member_id')],Input::get('ministry_id'))) {
             Redirect::to('view/index.php?page=ministry_members&ID='.Input::get('ministry_id'));
          } else {
            //error
            Redirect::to(503);
          }
      break;
      
      case 'assign_zone_leader':
          if(DBHandler::getInstance()->update('zones', ['leader'=>Input::get('member_id')],Input::get('zone_id'))) {
             Redirect::to('view/index.php?page=zone_members&ID='.Input::get('zone_id'));
          } else {
            //error
            Redirect::to(503);
          }
      break;
 
  	  case 'duplicate_exist':
  	  echo	$member->duplicatesExist(/*Input::get('first_name'), Input::get('last_name')*/'william', 'Kumah');
  	  
      }

  }


 if(Input::exist('token','get'))
 	{
 		switch(Input::get('token'))
 		{
      case 'assign_ministry_leader_ui':
       $middleware->assignMinistryLeader(Input::get('unique_id'), $member);
       break;

       case 'assign_zone_leader_ui':
       $middleware->assignZoneLeader(Input::get('unique_id'), $member);
       break;

 			case 'duplicates':
 			$middleware->loadDuplicateNames(/*Input::get('f_name'), Input::get('l_name')*/'william', 'sarfo', $member);
 			break;

 			case 'get_member_details':
             $middleware->displayMemberDetails(Input::get('unique_id'), $member);
            break;
 		}
 	}
