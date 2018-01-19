<?php
require_once '../settings.php';
 $user = new User();
 $member = new Member();
 $members = $member->get();
 $adults = $member->getAdults(18);
//$settings = new Settings();
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
               <div class="w3-card-4 w3-margin w3-padding" style="height: 100px;" >
                  <h2>Welcome <span class="w3-text-blue-grey"><i><?php echo ucfirst($user->data()->username);?></i></span></h2>   
                  <h5>Love to see you back. </h5>
            </div> 
            </div>
            <div class="w3-col m6 l6">
                <div class="w3-card-4 w3-margin w3-padding" style="height: 100px">
                    <h2>
                        <?php 
                        
                        $dateArr = getdate();
                        echo $dateArr['weekday'].', ';
                        echo $dateArr['month'].' ';
                        echo $dateArr['year'];
                        ?>
                    </h2>
                </div>
            </div>
        </div>              
         <!-- /. ROW  -->
          <hr />
       <div class="row" id="master-page">
         <div class="col-md-6 col-sm-12 col-xs-12">           
           <div class="panel panel-back noti-box">
            <div class="text-box" align="center">
                <p class="main-text">Children</p>
                <p class="main-text"><?php echo count($members)-count($adults);?> <img class="w3-circle w3-grey" src="../assets/images/system/ajax-loader.gif"></p>
                <p><a href="index.php?page=new_member" class="btn btn-default btn-lg" role="button">Add New</a>
                <a href="#" class="btn btn-default btn-lg" role="button">View</a></p>
            </div>
           </div>
          </div>
         <div class="col-md-6 col-sm-12 col-xs-12">           
           <div class="panel panel-back noti-box">
                <div class="text-box" align="center">
                    <p class="main-text">Adults</p>
                    <p class="main-text"><?php echo count($adults);?><img class="w3-circle w3-grey" src="../assets/images/system/ajax-loader.gif"></p>
                    <p><a href="index.php?page=new_member" class="btn btn-default btn-lg" role="button">Add New</a>
                    <a href="#" class="btn btn-default btn-lg" role="button">View</a></p>
                </div>
           </div>
         </div>    
             <!-- /. ROW  -->           
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
