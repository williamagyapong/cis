<?php
 require_once '../settings.php';

$user = new User();
if($user->logout()) {
  Session::deleteAll();	
  Redirect::to('../index.php');
}
 
 
?>