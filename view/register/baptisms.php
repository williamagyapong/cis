<?php
require_once '../settings.php';
 $user = new User();
 $member = new Member();
 $deadMembers = $member->get('deaths');
 $baptisms = [];
  


?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Baptisms | CIS</title>
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
                  <h3>Baptism Register</h3>
               </div>
            </div>
            <div class="w3-col m6 l6">
              <h3>
                Total Baptisms recorded: <span class="w3-blue w3-large w3-text-white badge"><?php echo count($baptisms);?></span>
              </h3>
            </div>
        </div>              
         <!-- /. ROW  -->
          <hr />
        <div class="row">
          <div class="col-md-12 col-sm-6">
              <div class="panel panel-default">
                  <div class="panel-head">
                      <div class="panel-body">
                          <div class="table-responsive">
                             <table class="table table-striped table-bordered table-hover" id="baptisms_table">
                               <thead>
                                 <tr>
                                   <th>Baptism ID</th>
                                   <th>Place</th>
                                   <th>Date</th>
                                   <th>Administered By</th>
                                   <th>Certificate<!--issued/not--></th>
                                   <th>Person's name</th>
                                   <th>Person's DOB</th>
                                 </tr>
                               </thead>
                               <tbody>
                                 <?php foreach($baptisms as $person):?>
                                  <tr>
                                    <td title="Click to view details" onclick="<?php echo "popUpModal2('members/profile.php','get_member_details','".$person->id."')"?>" style="cursor: pointer;" class="w3-text-blue"><?php echo $person->member_code;?></td>

                                    <td title="Click to view details" class="w3-text-blue-grey" onclick="<?php echo "popUpModal2('members/profile.php','get_member_details','".$person->id."')"?>" style="cursor: pointer;"><?php echo $person->f_name.' '.$person->m_name.' '.$person->l_name;?></td>
<!--                                     <td class="w3-center">
                                      
                                    </td> -->

                                    <td class="w3-center">
                                      <?php echo ($person->baptismal_status=='baptised')?'<i class="fa fa-check w3-text-blue"></i>':'<i class="fa fa-close w3-text-red"></i>';?>
                                    </td>
                                    <td><?php echo $member->getMinistry($person->zone_id)->name;?></td>
                                    <td><?php echo $person->residence;?></td>
                                    <td><?php echo $member->getZone($person->zone_id)->name;?></td>
                                    <td><?php echo date('d/m/Y', strtotime($person->died_on));?></td>
                                  </tr>
                                 <?php endforeach;?>
                               </tbody>
                             </table>
                           </div>
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
            $('#baptisms_table').dataTable({
                "order":[[1,"asc"]]
            });
        })
    </script>
</body>
</html>
