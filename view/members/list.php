<?php
require_once '../settings.php';
$member = new Member();
$adults = $member->getAdults();
$children = $member->getChildren();
$members = $member->get();
//$baptisedMembers = $member->getBaptised();
//$NotBaptisedMembers = $member->getBaptised('not');
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Members | CIS</title>
    <?php require_once '../include/head_elements.html';?>
    <style type="text/css">
      a{
        color:#428bca;
      }
    </style>
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
               <h2 class="w3-text-dark-grey"><span><span class="w3-badge w3-xlarge w3-padding w3-blue-grey">Members</span></span></h2>   
              </div>
              <div class="w3-col m6 l6">
              <h3>
                Total Membership: <span class="w3-blue w3-large w3-text-white badge"><?php echo count($members);?></span>
                <a href="index.php?page=new_member" class="w3-right btn btn-primary">New</a>
              </h3>
            </div>
            </div><hr />
            <div class="row">
                <div class="col-md-12 col-sm-6">
                    <div class="panel panel-default">
                        <!-- <div class="panel-heading">
                           panel header goes here
                        </div> -->
                        <div class="panel-body">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#all" data-toggle="tab">All</a>
                                </li>
                                <li class=""><a href="#adults" data-toggle="tab">Adults</a>
                                </li>
                                <li class=""><a href="#children" data-toggle="tab">Children</a>
                                </li>
                                <li class=""><a href="#baptised" data-toggle="tab">Baptised</a>
                                <li class=""><a href="#not_baptised" data-toggle="tab">Not Baptised</a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <!-- all members tab -->
                                <div class="tab-pane fade active in" id="all">
                                  <br>
                                    <div class="table-responsive">
                                       <table class="table table-striped table-bordered table-hover" id="members_table">
                                         <thead>
                                           <tr>
                                             <th>Member ID</th>
                                             <th>Name</th>
                                             <th>Baptised</th>
                                             <th>Ministry</th>
                                             <th>Residence</th>
                                             <th>Zone</th>
                                             <th>Phone</th>
                                             <th></th>
                                             <th></th>
                                           </tr>
                                         </thead>
                                         <tbody>
                                           <?php foreach($members as $person):?>
                                            <tr>
                                              <td title="Click to view details" onclick="<?php echo "popUpModal2('members/profile.php','get_member_details','".$person->id."')"?>" style="cursor: pointer;" class="w3-text-blue"><?php echo $person->member_code;?></td>

                                              <td title="Click to view details" onclick="<?php echo "popUpModal2('members/profile.php','get_member_details','".$person->id."')"?>" style="cursor: pointer;"><?php echo $person->f_name.' '.$person->m_name.' '.$person->l_name;?></td>
                                              <td class="w3-center">
                                                <?php echo ($person->baptismal_status=='baptised')?'<i class="fa fa-check w3-text-blue"></i>':'<i class="fa fa-close w3-text-red"></i>';?>
                                              </td>

                                              <td><?php echo $member->getMinistry($person->ministry_id)->name;?></td>
                                              <td><?php echo $person->residence;?></td>
                                              <td><?php echo $member->getZone($person->zone_id)->name;?></td>
                                              <td><?php echo $person->phone;?></td>

                                              <td style="cursor: pointer;" title="Edit Record"><span onclick="<?php echo "popUpLargeModal('members/edit.php','get_member_details','".$person->id."')"?>" class="fa fa-pencil-square-o w3-text-blue"></span></td>

                                              <td style="cursor: pointer;" title="Delete Record"><span class="fa fa-trash w3-text-red"></span></td>
                                            </tr>
                                           <?php endforeach;?>
                                         </tbody>
                                       </table>
                                     </div>
                                </div>
                                <!-- adults tab -->
                                <div class="tab-pane fade" id="adults">
                                     <br>
                                     <div class="table-responsive">
                                       <table class="table table-striped table-bordered table-hover" id="adults_table">
                                         <thead>
                                           <tr>
                                             <th>Member ID</th>
                                             <th>Name</th>
                                             <th>Baptised</th>
                                             <th>Ministry</th>
                                             <th>Residence</th>
                                             <th>Zone</th>
                                             <th>Phone</th>
                                             <th></th>
                                             <th></th>
                                           </tr>
                                         </thead>
                                         <tbody>
                                           <?php foreach($adults as $person):?>
                                            <tr>
                                              <td title="Click to view details" onclick="<?php echo "popUpModal2('members/profile.php','get_member_details','".$person->id."')"?>" style="cursor: pointer;" class="w3-text-blue"><?php echo $person->member_code;?></td>

                                              <td title="Click to view details" onclick="<?php echo "popUpModal2('members/profile.php','get_member_details','".$person->id."')"?>" style="cursor: pointer;"><?php echo $person->f_name.' '.$person->m_name.' '.$person->l_name;?></td>
                                              <td class="w3-center">
                                                <?php echo ($person->baptismal_status=='baptised')?'<i class="fa fa-check w3-text-blue"></i>':'<i class="fa fa-close w3-text-red"></i>';?>
                                              </td>

                                              <td><?php echo $member->getMinistry($person->ministry_id)->name;?></td>
                                              <td><?php echo $person->residence;?></td>
                                              <td><?php echo $member->getZone($person->zone_id)->name;?></td>
                                              <td><?php echo $person->phone;?></td>

                                              <td style="cursor: pointer;" title="Edit Record"><span onclick="<?php echo "popUpLargeModal('members/edit.php','get_member_details','".$person->id."')"?>" class="fa fa-pencil-square-o w3-text-blue"></span></td>

                                              <td style="cursor: pointer;" title="Delete Record"><span class="fa fa-trash w3-text-red"></span></td>
                                            </tr>
                                           <?php endforeach;?>
                                         </tbody>
                                       </table>
                                     </div>
                                </div>
                                <!-- children tab -->
                                <div class="tab-pane fade" id="children">
                                  <br>
                                   <div class="table-responsive">
                                     <table class="table table-striped table-bordered table-hover" id="children_table">
                                       <thead>
                                         <tr>
                                           <th>Member ID</th>
                                           <th>Name</th>
                                           <th>Baptised</th>
                                           <th>Ministry</th>
                                           <th>Residence</th>
                                           <th>Zone</th>
                                           <th>Phone</th>
                                           <th></th>
                                           <th></th>
                                         </tr>
                                       </thead>
                                       <tbody>
                                         <?php foreach($children as $person):?>
                                          <tr>
                                            <td title="Click to view details" onclick="<?php echo "popUpModal2('members/profile.php','get_member_details','".$person->id."')"?>" style="cursor: pointer;" class="w3-text-blue"><?php echo $person->member_code;?></td>

                                            <td title="Click to view details" onclick="<?php echo "popUpModal2('members/profile.php','get_member_details','".$person->id."')"?>" style="cursor: pointer;"><?php echo $person->f_name.' '.$person->m_name.' '.$person->l_name;?></td>
                                            <td class="w3-center">
                                              <?php echo ($person->baptismal_status=='baptised')?'<i class="fa fa-check w3-text-blue"></i>':'<i class="fa fa-close w3-text-red"></i>';?>
                                            </td>

                                            <td><?php echo $member->getMinistry($person->ministry_id)->name;?></td>
                                            <td><?php echo $person->residence;?></td>
                                            <td><?php echo $member->getZone($person->zone_id)->name;?></td>
                                            <td><?php echo $person->phone;?></td>

                                            <td style="cursor: pointer;" title="Edit Record"><span onclick="<?php echo "popUpLargeModal('members/edit.php','get_member_details','".$person->id."')"?>" class="fa fa-pencil-square-o w3-text-blue"></span></td>

                                            <td style="cursor: pointer;" title="Delete Record"><span class="fa fa-trash w3-text-red"></span></td>
                                          </tr>
                                         <?php endforeach;?>
                                       </tbody>
                                     </table>
                                   </div>
                                </div>
                                <!-- baptised tab -->
                                <div class="tab-pane fade" id="baptised">
                                  <br>
                                   <div class="table-responsive">
                                       <table class="table table-striped table-bordered table-hover" id="baptised_table">
                                         <thead>
                                           <tr>
                                             <th>Member ID</th>
                                             <th>Name</th>
                                             <th>Baptised</th>
                                             <th>Ministry</th>
                                             <th>Residence</th>
                                             <th>Zone</th>
                                             <th>Phone</th>
                                             <th></th>
                                             <th></th>
                                           </tr>
                                         </thead>
                                         <tbody>
                                           <?php foreach($members as $person):
                                              if($person->baptismal_status !='baptised') continue;
                                           ?>
                                            <tr>
                                              <td title="Click to view details" onclick="<?php echo "popUpModal2('members/profile.php','get_member_details','".$person->id."')"?>" style="cursor: pointer;" class="w3-text-blue"><?php echo $person->member_code;?></td>

                                              <td title="Click to view details" onclick="<?php echo "popUpModal2('members/profile.php','get_member_details','".$person->id."')"?>" style="cursor: pointer;"><?php echo $person->f_name.' '.$person->m_name.' '.$person->l_name;?></td>
                                              <td class="w3-center">
                                                <?php echo ($person->baptismal_status=='baptised')?'<i class="fa fa-check w3-text-blue"></i>':'<i class="fa fa-close w3-text-red"></i>';?>
                                              </td>

                                              <td><?php echo $member->getMinistry($person->ministry_id)->name;?></td>
                                              <td><?php echo $person->residence;?></td>
                                              <td><?php echo $member->getZone($person->zone_id)->name;?></td>
                                              <td><?php echo $person->phone;?></td>

                                              <td style="cursor: pointer;" title="Edit Record"><span onclick="<?php echo "popUpLargeModal('members/edit.php','get_member_details','".$person->id."')"?>" class="fa fa-pencil-square-o w3-text-blue"></span></td>

                                              <td style="cursor: pointer;" title="Delete Record"><span class="fa fa-trash w3-text-red"></span></td>
                                            </tr>
                                           <?php endforeach;?>
                                         </tbody>
                                       </table>
                                     </div>
                                </div>
                                <div class="tab-pane fade" id="not_baptised">
                                   <br>
                                    <div class="table-responsive">
                                       <table class="table table-striped table-bordered table-hover" id="not_baptised_table">
                                         <thead>
                                           <tr>
                                             <th>Member ID</th>
                                             <th>Name</th>
                                             <th>Baptised</th>
                                             <th>Ministry</th>
                                             <th>Residence</th>
                                             <th>Zone</th>
                                             <th>Phone</th>
                                             <th></th>
                                             <th></th>
                                           </tr>
                                         </thead>
                                         <tbody>
                                           <?php foreach($members as $person):
                                              if($person->baptismal_status =='baptised') continue;//skip all those baptised;
                                           ?>
                                            <tr>
                                              <td title="Click to view details" onclick="<?php echo "popUpModal2('members/profile.php','get_member_details','".$person->id."')"?>" style="cursor: pointer;" class="w3-text-blue"><?php echo $person->member_code;?></td>

                                              <td title="Click to view details" onclick="<?php echo "popUpModal2('members/profile.php','get_member_details','".$person->id."')"?>" style="cursor: pointer;"><?php echo $person->f_name.' '.$person->m_name.' '.$person->l_name;?></td>
                                              <td class="w3-center">
                                                <?php echo ($person->baptismal_status=='baptised')?'<i class="fa fa-check w3-text-blue"></i>':'<i class="fa fa-close w3-text-red"></i>';?>
                                              </td>

                                              <td><?php echo $member->getMinistry($person->ministry_id)->name;?></td>
                                              <td><?php echo $person->residence;?></td>
                                              <td><?php echo $member->getZone($person->zone_id)->name;?></td>
                                              <td><?php echo $person->phone;?></td>

                                              <td style="cursor: pointer;" title="Edit Record"><span onclick="<?php echo "popUpLargeModal('members/edit.php','get_member_details','".$person->id."')"?>" class="fa fa-pencil-square-o w3-text-blue"></span></td>

                                              <td style="cursor: pointer;" title="Delete Record"><span class="fa fa-trash w3-text-red"></span></td>
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
            </div>
            <div class="row">
              <div class="col-md-12">
                 <span>Hint: click on member ID or name to view details</span>
               </div>
            </div>             
          </div>
        </div>

     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <?php require_once'../include/modals.php';?>
    <?php require_once'../include/scripts.html';?>
    
    <script>
      $(document).ready(function () {
          // advanced table for all
          $('#members_table').dataTable({
             "order":[[1, "asc"]]
          });
          // advanced table for adults
          $('#adults_table').dataTable({
             "order":[[1, "asc"]]
          });
          // advanced table for children
          $('#children_table').dataTable({
             "order":[[1, "asc"]]
          });
          // advanced table for  baptised
          $('#baptised_table').dataTable({
             "order":[[1, "asc"]]
          });
          // advanced table for not baptised
          $('#not_baptised_table').dataTable({
             "order":[[1, "asc"]]
          });
      });
    </script>
</body>
</html>
