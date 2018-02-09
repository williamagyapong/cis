<?php
require_once 'settings.php';
$member = new Member();
//$user = new User();date('-m-d', strtotime($year));
$nextYear = (string)(date('Y') +1);
//var_dump($nextYear);
//var_dump(date('2019'.'-m-d')); 
echo date('Y-m-d H:i:s');   
print_array($_SESSION);
$where = "`id` = '4' AND `type` = 'spouse'";
//DBHandler::getInstance()->updatespecial('users', ['phone'=>4, 'name'=>'william', 'gender'=>'male'], $where);
//print_array(DBHandler::getInstance()->)
/*
MARRIAGE REGISTER:
 date, spouse name, place of marriage, bride/bridegroom info/details->name, data of birth, blood group
 
BAPTISM REGISTER:
 date, evangelism minister/leader, baptiser/administered by, person's info->name, date of birth, 
*/

?>
