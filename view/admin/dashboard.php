<?php
require_once '../../settings.php';
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard | CIS</title>
    <!-- include head resources -->
    <?php require_once '../../include/head_elements.html';?>
</head>
<body>
   <div id="wrapper">
	<!-- NAV TOP  -->
     <?php require '../../include/header.php';?>
       
    <?php require '../../include/sidemenu.php';?>
    
    <div id="page-wrapper" >
      <div id="page-inner">
        <div class="row" id="top-page">
            <div class="col-md-12" >
             <h2>Welcome ....</h2>   
                <h5>Love to see you back. </h5>
            </div>
        </div>              
         <!-- /. ROW  -->
          <hr />
       <div class="row" id="master-page">
         <div class="col-md-6 col-sm-12 col-xs-12">           
		   <div class="panel panel-back noti-box">
            <div class="text-box" align="center">
                <p class="main-text">Total Children</p>
                <p class="main-text">5</p>
                <p><a href="#" class="btn btn-default btn-lg" role="button">Add New</a>
                <a href="#" class="btn btn-default btn-lg" role="button">Remove</a></p>
            </div>
           </div>
	      </div>
         <div class="col-md-6 col-sm-12 col-xs-12">           
		   <div class="panel panel-back noti-box">
	            <div class="text-box" align="center">
	                <p class="main-text">Total Adults</p>
	                <p class="main-text">150</p>
	                <p><a href="#" class="btn btn-default btn-lg" role="button">Add New</a>
	                <a href="#" class="btn btn-default btn-lg" role="button">Remove</a></p>
	            </div>
	       </div>
	     </div>    
             <!-- /. ROW  -->           
         </div>
         <!-- /. PAGE INNER  -->
        </div>
     <!-- /. PAGE WRAPPER  -->
    </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <?php require_once'../../include/scripts.html';?>    
   
</body>
</html>
