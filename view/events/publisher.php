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
    <title>Publisher | CIS</title>
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
                  <h3>Event Publisher</h3>
               </div>
            </div>
            <div class="w3-col m6 l6">
              <h3>
                
              </h3>
            </div>
        </div>              
         <!-- /. ROW  -->
          <hr />
        <div class="row">
          <div class="col-md-12 col-sm-6">
            <!-- content goes here -->
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
