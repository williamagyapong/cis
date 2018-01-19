<?php
require_once '../settings.php';
$member = new Member();
$members = $member->get();
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard | CIS</title>
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
               <h2 class="w3-text-red">Members</h2>   
              </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                 <div class="panel panel-default">
                   <div class="panel-body">
                     <div class="table-responsive">
                       <table class="table table-striped table-bordered table-hover" id="members_table">
                         <thead>
                           <tr>
                             <th>Member ID</th>
                             <th>Name</th>
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
                              <td><?php echo $member->getMinistry($person->ministry_id)->name;?></td>
                              <td><?php echo $person->residence;?></td>
                              <td><?php echo $member->getZone($person->zone_id)->name;?></td>
                              <td><?php echo $person->phone;?></td>
                              <td title="Edit Record"><span onclick="<?php echo "popUpEditModal('members/edit.php','get_member_details','".$person->id."')"?>" class="fa fa-pencil-square-o w3-text-blue"></span></td>
                              <td title="Delete Record"><span class="fa fa-trash w3-text-red"></span></td>
                            </tr>
                           <?php endforeach;?>
                         </tbody>
                       </table>
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
          $('#members_tabl').dataTable({
             "order":[[1, "asc"]]
          });
      });
    </script>
</body>
</html>
