<?php
require_once '../settings.php';
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cashflow | CIS</title>
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
                <div class="row">
                    <div class="col-md-12">
                     <h2>Cashflow</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                  <h3>Income</h3>
                <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">

                <!-- This next div makes me divide the text-box into 3 -->           
			<div class="panel panel-back noti-box col-md-12">
                <div class="text-box">
                   <div class="col-md-4" align="center">
                    
                   </div>
                <div class="col-md-4" align="center">
                    <p class="main-text">Expected Income (GHC)</p>
                    <p class="main-text">15,000</p>
                </div>
                <div class="col-md-4" align="center">
                    <p class="main-text">Realised Income (GHC)</p>
                    <p class="main-text">12,000</p>
                </div>
                </div>
            </div>
		          </div>
                <div class="col-md-12 col-sm-12 col-xs-12"> 
                <h3>Expenses</h3>          

                <!-- This next div makes me divide the text-box into 3 -->
			<div class="panel panel-back noti-box col-md-12">
                <div class="col-md-4">
                <!-- 1 of 3 divisions -->
                </div>
                <div class="col-md-4">
                <!-- 2 of 3 divisions -->
                </div>
                <div class="col-md-4">
                <!-- 3 of 3 divisions -->
                <div class="text-box" align="center">
                    <p class="main-text">Total Expenses (GHC)</p>
                    <p class="main-text">1,500</p>
                    <p><a href="#" class="btn btn-default btn-lg" role="button">Details</a></p>
                </div>
                </div>
             </div>
		     </div>

             <div class="col-md-12 col-sm-12 col-xs-12">
             <h3></h3> <!-- This h3 tag creates some space b/n the previous box and this -->        
             <!-- This next div makes me divide the text-box into 3 -->
            <div class="panel panel-back noti-box col-md-12">
                <div class="col-md-4">
                <!-- 1 of 3 divisions -->
                </div>
                <div class="col-md-4">
                <!-- 2 of 3 divisions -->
                </div>
                <div class="col-md-4">
                <!-- 3 of 3 divisions -->
                <div class="text-box" align="center">
                    <p class="main-text">Net Cashflow (GHC)</p>
                    <p class="main-text">10,500</p>
                    <p><a href="#" class="btn btn-success btn-lg" role="button">Export details</a></p>
                    
                </div>
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
    <?php require_once'../include/scripts.html';?>   
   
</body>
</html>
