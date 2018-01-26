<?php
require_once '../settings.php';
 $user = new User();
 $member = new Member();
 $ministries = $member->getMinistry();
 $ministryMembers = [];

 if(Input::exist('ID', 'get'))
  {
    // if(empty($ministryMembers)) Redirect::to() 
    $ministryMembers = $member->getMinistryMembers(Input::get('ID'));
  }


?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ministries | CIS</title>
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
               <div class="w3-dropdown-hover w3-mobile">
                 <?php $ministryObject = $member->getMinistry(Input::get('ID')); ?>
                 <h3>
                   <span class="btn btn-default w3-large">Ministry</span><i class="fa fa-share"></i><span class=""><?php echo $ministryObject->name;?> Members<i class="w3-badge w3-blue w3-right"><?php echo count($ministryMembers)?></i></span>
                 </h3>
                 <div class="w3-dropdown-content w3-bar-block w3-text-grey w3-border-top w3-border-dark-grey w3-card-4">
                    <?php foreach($ministries as $ministry):?>
                     <a href="index.php?page=ministry_members&ID=<?php echo $ministry->id;?>" class="w3-bar-item w3-button w3-large w3-hover-dark-gray" style="text-transform:capitalize"><?php echo $ministry->name?></a>
                   <?php endforeach;?>
                 </div>
               </div>
            </div>
            <?php if($ministryObject->name !='None'):?>
            <div class="w3-col m6 l6">
              <h3>
                <span class="w3-right">Ministry Leader: <span title="Click to view details" onclick="<?php echo "popUpModal2('members/profile.php','get_member_details','".$ministryObject->leader."')"?>" style="cursor: pointer;" class="w3-text-blue-grey">
                  <?php 
                  $ministryLeader = $member->get($ministryObject->leader);
                  echo $ministryLeader->f_name.' '.$ministryLeader->l_name;
                  ?></span></span>
              </h3>
            </div>
           <?php endif;?>
        </div>              
         <!-- /. ROW  -->
          <hr />
        <div class="row">
          <div class="col-md-12 col-sm-6">
              <div class="panel panel-default">
                  <div class="panel-head">
                      <div class="panel-body">
                          <div class="table-responsive">
                             <table class="table table-striped table-bordered table-hover" id="ministry_members_table">
                               <thead>
                                 <tr>
                                   <th>Member ID</th>
                                   <th>Name</th>
                                   <!-- <th>Date of Birth</th> -->
                                   <th>Baptised</th>
                                   <th>Residence</th>
                                   <th>Zone</th>
                                   <th>Phone</th>
                                 </tr>
                               </thead>
                               <tbody>
                                 <?php foreach($ministryMembers as $person):?>
                                  <tr>
                                    <td title="Click to view details" onclick="<?php echo "popUpModal2('members/profile.php','get_member_details','".$person->id."')"?>" style="cursor: pointer;" class="w3-text-blue"><?php echo $person->member_code;?></td>

                                    <td title="Click to view details" class="w3-text-blue-grey" onclick="<?php echo "popUpModal2('members/profile.php','get_member_details','".$person->id."')"?>" style="cursor: pointer;"><?php echo $person->f_name.' '.$person->m_name.' '.$person->l_name;?></td>
<!--                                     <td class="w3-center">
                                      <?php echo date('d/m/Y', strtotime($person->birth_date));?>
                                    </td> -->

                                    <td class="w3-center">
                                      <?php echo ($person->baptismal_status=='baptised')?'<i class="fa fa-check w3-text-blue"></i>':'<i class="fa fa-close w3-text-red"></i>';?>
                                    </td>

                                    <td><?php echo $person->residence;?></td>
                                    <td><?php echo $member->getZone($person->zone_id)->name;?></td>
                                    <td><?php echo $person->phone;?></td>
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
            $('#ministry_members_table').dataTable({
                "order":[[1,"asc"]]
            });
        })
    </script>
</body>
</html>
