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
					 	include 'include/errors/503.php';
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
	        	include '../view/admin/cashflow.php';
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

	        case 'create_family':
	         	include '../view/members/create_family.php';
	         	exit();
	        break;

	        case 'system_settings':
	         	include '../view/admin/settings.php';
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