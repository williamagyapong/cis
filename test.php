<?php
require_once 'settings.php';
$user = new User();
$member = new Member();
//$user = new User();date('-m-d', strtotime($year));
$nextYear = (string)(date('Y') +1);
$mData = $member->get(36);
print_array(json_decode($mData->languages));
//var_dump($nextYear);
//var_dump(date('2019'.'-m-d'));

//echo date('m');

//print_array(DBHandler::getInstance()->)
/*
MARRIAGE REGISTER:
 date, spouse name, place of marriage, bride/bridegroom info/details->name, data of birth, blood group
 
BAPTISM REGISTER:
 date, evangelism minister/leader, baptiser/administered by, person's info->name, date of birth, 
*/

?>

