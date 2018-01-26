<?php
 require_once 'settings.php';
 $user = new User();
 $settings = new Settings();
 $member = new Member();
 $members = $member->get();
 $birthdays = $member->getBirthDays();
?>