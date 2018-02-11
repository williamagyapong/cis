<?php
require_once '../settings.php';
 $user = new User();
 $member = new Member();
 
  


?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Profile | CIS</title>
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
          <div class="w3-row" id="top-page">
              <div class="w3-col m6 l6">  
                 <div class="w3-padding-left w3-mobile">
                    <h3>System Administrator Profile</h3>
                 </div>
              </div>
              <div class="w3-col m6 l6">
                <h3>
                  
                </h3>
              </div>
          </div>              
           <!-- /. ROW  -->
            <hr />
          <div class="w3-row">
                <div class="w3-col m6 l4">
                  sdsfdds
                </div>
                <div class="w3-col m6 l4">
                  sdsfdds
                </div>
                 <div class="w3-third w3-container">
                  <div class="w3-container w3-white w3-opacity w3-hover-opacity-off">
                    <p id="reset_password" class="w3-blue-grey w3-center"><b>Reset Password</b></p>
                    <div class="">
                      <form id="reset_password_form" action="../controller.php" method="post" class="w3-container w3-card-4 w3-padding w3-card w3-padding-34">
                        <div class="w3-row-padding">
                         <label class="w3-bold" for="old_password">Old Password:</label><br>
                          <input type="password" name="old_password" id="old_password" class="w3-input w3-border w3-border-dark-grey" required maxlength="32"><br>

                          <label class="w3-bold" for="new_password">New Password:</label><br>
                          <input id="new_password" type="password" name="new_password" class="w3-input w3-border w3-border-dark-grey" required maxlength="32"><br>

                          <label class="w3-bold" for="new_password_again">Retype New Password:</label><br>
                          <input id="new_password_again" type="password" name="new_password_again"  class="w3-input w3-border w3-border-dark-grey" required maxlength="32">

                          <input type="hidden" name="settings" value="reset_password">
                          <button onclick="effectSettingsChanges('reset_password_form','reset_password')" id="reset_password" class="btn btn-primary w3-margin-top">RESET</button>
                         <img class="w3-margin-top" style="margin-left: 70px;" src="../assets/images/system/ajax-loader.gif">
                        </div>
                      </form>
                    </div>
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
   <script>
        $(document).ready(function() {
            
        })
    </script>
</body>
</html>
