<?php
/**
|----------------------------------------------------
|    REGISTER SESSION
|----------------------------------------------------
*/
    session_start(); 

/**
|----------------------------------------------------
|     SET THE DEFAULT BEHAVIOURS
|----------------------------------------------------
*/
     # time zone
     date_default_timezone_set("UTC");
     
     # error reporting
     error_reporting(0);


/**
|----------------------------------------------------
|     GLOBAL VARIABLES
|----------------------------------------------------
*/

// set global variables
$GLOBALS['config'] = array(
        'mysql'=>array(
              'host'=>'127.0.0.1',
              'db'=>'new_cis_db',
              'password'=>'',
              'username'=>'root'
        	),

        'remember'=>array(
             'cookie_name'=>'hash',
             'cookie_expiry'=>604800
        	),

        'session'=>array(
             'session_name'=>'user',
             'token_name'=>'csrf_token'
        	),

        'app'=>array(
              'name'=>'Church Information System',
              'abbr_name'=>'CIS',
              'base_url'=>'/cis',
              'version'=>'1.0',
              
          ),
        'developer'=>array(
              'name'=>'Agyapong William',
              'contact'=>'0501426834',
              'email'=>'willisco413@gmail.com',
          ),
        'client'=>array(
              'name'=>'Gbawe Church of Christ',
              'contact1'=>'0200665525',
              'contact2'=>'0200665525'
          )
	);


/**
|---------------------------------------------
|      IMPORT FILES/CLASSES
|---------------------------------------------
*/

// autoload classes
spl_autoload_register(function($class_name){
    require_once 'classes/'.$class_name.'.php';
});

// access functions
require_once 'functions.php';





/**
|---------------------------------------------
|      ROUTING 
|---------------------------------------------
*/
   //all url requests are resolved here
   Redirect::route();

  
/**
|---------------------------------------------
|      SYSTEM CONVENTIONS
|---------------------------------------------

  <> General Conventions <>
  1.
  2.
  3.
  
  <> Error Codes <>
  1. 
  2. 
  3. 

*/



?>
