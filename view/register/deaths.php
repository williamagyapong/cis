<?php
require_once '../settings.php';
 $user = new User();
 $member = new Member();
 $deadMembers = $member->get('deaths');
 $id = 0;
  


?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Deaths | CIS</title>
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
                  <h3><span class="w3-badge w3-xlarge w3-padding w3-blue-grey">Death Register</span></h3>
               </div>
            </div>
            <div class="w3-col m6 l6">
              <h3>
                Total Deaths recorded: <span class="w3-blue w3-large w3-text-white badge"><?php echo count($deadMembers);?></span>
                <span class="w3-right btn btn-primary" onclick="popUpModal('../controller.php','new_death_ui')">New</span>
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
                             <table class="table table-striped table-bordered table-hover" id="dead_members_table">
                               <thead>
                                 <tr>
                                   <th></th>
                                   <th>Name</th>
                                   <th>Baptised</th>
                                   <th>Ministry</th>
                                   <th>Residence</th>
                                   <th>Zone</th>
                                   <th>Died On</th>
                                 </tr>
                               </thead>
                               <tbody>
                                 <?php foreach($deadMembers as $person): $id++;?>
                                  <tr>
                                    <!-- <td title="Click to view details" onclick="<?php echo "popUpModal2('members/profile.php','get_member_details','".$person->id."')"?>" style="cursor: pointer;" class="w3-text-blue"><?php echo $id;?></td> -->
                                     <td title="Undo" onclick="<?php echo "showModal('alert_modal', 'death_to_undo', '".$person->id."')";?>" style="cursor: pointer;">
                                       <span class="fa fa-undo w3-text-blue"></span>
                                     </td>

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
            $('#dead_members_table').dataTable({
                "order":[[6,"asc"]]
            });


            //preview image
            $(document).change(function() {
                var memberId  = $('#id_deceased').val();
                if(memberId !='') {

                     $.ajax({
                        type: 'get',
                        url:'../controller.php',
                        data: {token:'get_deceased_img', member_id:memberId},
                        dataType:'json',
                        encode:true
                     })
                     .done(function(response) {
                        var img = '<img src=\"../assets/images/members/'+response.image+'\" width=\"200\" height=\"200\" alt=\"member picture\" class\"w3-border w3-border-dark-grey\">';
                        $('#image_preview').html(img);
                    
                     })
                     .fail(function(){
                        console.log('failed load original image');
                    })
                } else {
                          $('#image_preview').html('');
                }
           })
        })


    </script>
</body>
</html>
