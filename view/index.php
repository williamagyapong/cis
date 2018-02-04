<?php
require_once '../settings.php';
 $user = new User();
 $member = new Member();
 $members = $member->get();
 $adults = $member->getAdults(18);
 $birthdays = $member->getBirthDays();
 $birthdaysCount = count($birthdays);
 $deaths = $member->get('deaths');

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard | CIS</title>
    <!-- include head resources -->
    <?php require_once '../include/head_elements.html';?>
</head>
<body>
   
	<div id="wrapper">
      <!-- NAV TOP  -->
     <?php require '../include/header.php';?>
       
    <?php require '../include/sidemenu.php';?>
    
    <div id="page-wrapper" >
      <div id="page-inner">
        <div class="row" id="top-page">
            <div class="w3-col m6 l6">
               <div class="w3-card-4 w3-margin w3-padding w3-white" style="height: 100px;" >
                  <h2>Welcome <span class="w3-text-blue-grey"><i><?php echo ucfirst($user->data()->username);?></i></span></h2>   
                  <h5>Love to see you back. </h5>
            </div> 
            </div>
            <div class="w3-col m6 l6">
                <div class="w3-card-4 w3-margin w3-padding" style="height: 100px">
                    <h2>
                        <?php 
                        //today's date
                        $dateArr = getdate();
                        echo $dateArr['weekday'].', ';
                        echo $dateArr['month'].' ';
                        echo $dateArr['year'];
                        ?>
                    </h2>
                </div>
            </div>
        </div>              
         <br>
         <!-- events notices banner -->
       <div class="row">
           <div class="col-md-12 col-sm-12 col-xs-12 w3-text-red w3-large w3-margin-bottom">
              <?php if($birthdaysCount !=0):?>
               <marquee>
                <?php echo $birthdaysCount?> <?php echo ($birthdaysCount==1)?' Birthday':'Birthdays'; ?>  <span class="fa fa-arrows-h w3-large w3-text-orange"></span>
                <span class="w3-text-blue-grey">
                    <?php 
                         $birthdayString = '';
                         foreach($birthdays as $person) {
                            $birthdayString .= $person->f_name.'('.date('jS/M', strtotime($person->birth_date)).'), ';
                         }
                         $birthdayString = rtrim($birthdayString, ', ');
                         echo $birthdayString;
                    ?>
                </span>
               </marquee>
              <?php endif;?>
           </div>
       </div>
       <div class="row" id="master-page">
         <div class="col-md-6 col-sm-12 col-xs-12">           
           <div class="panel panel-back noti-box">
                <div class="text-box" align="center">
                    <p class="main-text">Adults</p>
                    <p class="main-text"><span class="w3-badge w3-blue w3-padding"><?php echo count($adults);?></span><!-- &nbsp;<img class="w3-circle w3-grey" src="../assets/images/system/ajax-loader.gif"> --></p>
                    <span>out of <?php echo count($members) ?></span>
                    <p><a href="index.php?page=new_member" class="btn btn-default btn-lg" role="button">Add New</a>
                    <a href="index.php?page=members_list" class="btn btn-default btn-lg" role="button">View</a></p>
                </div>
           </div>
         </div> 
         <div class="col-md-6 col-sm-12 col-xs-12">           
           <div class="panel panel-back noti-box">
            <div class="text-box" align="center">
                <p class="main-text">Children</p>
                <p class="main-text"><span class="w3-badge w3-blue w3-padding"><?php echo count($members)-count($adults);?></span><!-- &nbsp;<img class="w3-circle w3-grey" src="../assets/images/system/ajax-loader.gif"> --></p>
                <span>out of <?php echo count($members) ?></span>
                <p><a href="index.php?page=new_member&filter=child" class="btn btn-default btn-lg" role="button">Add New</a>
                <a href="index.php?page=members_list" class="btn btn-default btn-lg" role="button">View</a></p>
            </div>
           </div>
          </div>  
         </div>
         <div class="row" id="master-page">
         <div class="col-md-4 col-sm-12 col-xs-12">           
           <div class="panel panel-back noti-box">
                <div class="text-box" align="center">
                    <p class="main-text">Baptisms</p>
                    <p class="main-text"><span class="w3-badge w3-blue w3-padding"><?php echo count($adults);?></span><!-- &nbsp;<img class="w3-circle w3-grey" src="../assets/images/system/ajax-loader.gif"> --></p>
                    <!-- <span>out of <?php echo count($members) ?></span> -->
                    <p><a href="index.php?page=" class="btn btn-default btn-lg" role="button">Register New</a>
                    <a href="index.php?page=baptisms" class="btn btn-default btn-lg" role="button">View</a></p>
                </div>
           </div>
         </div> 
         <div class="col-md-4 col-sm-12 col-xs-12">           
           <div class="panel panel-back noti-box">
            <div class="text-box" align="center">
                <p class="main-text">Marriages</p>
                <p class="main-text"><span class="w3-badge w3-blue w3-padding"><?php echo count($members)-count($adults);?></span><!-- &nbsp;<img class="w3-circle w3-grey" src="../assets/images/system/ajax-loader.gif"> --></p>
                <!-- <span>out of <?php echo count($members) ?></span> -->
                <p><a href="index.php?page=" class="btn btn-default btn-lg" role="button">Register New</a>
                <a href="index.php?page=marriages" class="btn btn-default btn-lg" role="button">View</a></p>
            </div>
           </div>
         </div>
         <div class="col-md-4 col-sm-12 col-xs-12">           
           <div class="panel panel-back noti-box">
                <div class="text-box" align="center">
                    <p class="main-text">Deaths</p>
                    <p class="main-text"><span class="w3-badge w3-blue w3-padding"><?php echo count($deaths);?></span><!-- &nbsp;<img class="w3-circle w3-grey" src="../assets/images/system/ajax-loader.gif"> --></p>
                    <!-- <span>out of <?php echo count($members) ?></span> -->
                    <p><a href="index.php?page=" class="btn btn-default btn-lg" role="button">Register New</a>
                    <a href="index.php?page=deaths" class="btn btn-default btn-lg" role="button">View</a></p>
                </div>
           </div>
         </div>           
         </div>
         <!-- /. PAGE INNER  -->
        </div>
     <!-- /. PAGE WRAPPER  -->
    </div>
   
    </div>
    <!-- require modals -->
    <?php require_once'../include/modals.php';?>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <?php require_once'../include/scripts.html';?>    
   
</body>
</html>
