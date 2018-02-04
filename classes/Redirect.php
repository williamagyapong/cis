<?php

class Redirect
{
	public static function to($location=null) {
		if($location){
			if(is_numeric($location)) {
				switch($location) {
					case 404:
						header('HTTP/1.0 404 NOT FOUND');
						include 'include/errors/404.php';
						exit();
					break;

					case 502:
					 	header('HTTP/1.0 502 NOT PERMITTED');
					 	include 'include/errors/502.php';
					 	exit();
					break;

					case 503:
					 	header('HTTP/1.0 503 FAILURE');
					 	// echo "<a href=\"../include/errors/503.php\">error</a>";
					 	include '../include/errors/503.php';
					 	exit();
					break;

					case 401:
					 	header('HTTP/1.0 401 SYSTEM FAILURE');
					 	include 'include/errors/401.html';
					 	exit();
					break;
				}
			}

			header('Location: '.$location);
		    exit();
		}
		
	}


	public static function route()
	{
		if(Input::exist('page','get'))
	    {
	      switch(Input::get('page'))
	      {
	        case 'cashflow':
	        	include '../view/accounts/cashflow.php';
	         	exit();
	        break;

	        case 'members_list':
	         	include '../view/members/list.php';
	         	exit();
	        break;

	        case 'new_member':
	         	include '../view/members/new.php';
	         	exit();
	        break;

	        case 'edit_member_records':
	         	include '../view/members/edit.php';
	         	exit();
	        break;

	        case 'create_family':
	         	include '../view/members/create_family.php';
	         	exit();
	        break;

	        case 'ministry_members':
	         	include '../view/groups/ministries.php';
	         	exit();
	        break;

	        case 'zone_members':
	         	include '../view/groups/zones.php';
	         	exit();
	        break;

	        case 'admin_profile':
	         	include '../view/admin/admin.profile.php';
	         	exit();
	        break;

	        case 'system_settings':
	         	include '../view/admin/admin.settings.php';
	         	exit();
	        break;

	        case 'baptisms':
	         	include '../view/register/baptisms.php';
	         	exit();
	        break;

	        case 'marriages':
	         	include '../view/register/marriages.php';
	         	exit();
	        break;

	        case 'deaths':
	         	include '../view/register/deaths.php';
	         	exit();
	        break;

	        case 'publisher':
	         	include '../view/events/publisher.php';
	         	exit();
	        break;

	        case 'birthdays':
	         	include '../view/events/birthdays.php';
	         	exit();
	        break;

	        case 'funerals':
	         	include '../view/events/funerals.php';
	         	exit();
	        break;

	        case 'invitations':
	         	include '../view/events/invitations.php';
	         	exit();
	        break;

	        case 'marriage_notices':
	         	include '../view/events/marriages.php';
	         	exit();
	        break;

	        case 'other_events':
	         	include '../view/events/other.php';
	         	exit();
	        break;

	        case 'exit':
	         	include '../view/logout.php';
	         	exit();
	        break;

	        default:
	         	include '../view/index.php';
	         	exit();
	        break;

	      }
	    }
	}
}