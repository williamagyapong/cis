<?php
require_once '../settings.php';
 $user = new User();
 $member = new Member();
 $members = $member->get();
 $birthdays = $member->getBirthDays();
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
        <div class="row">
          <div class="col-md-12">
           <h3 class="w3-text-blue-grey w3-card-4 w3-margin w3-padding w3-white w3-center"><?php echo (count($birthdays)==0)?"No Birthdays for the period <span class=\"w3-text-orange\">":"Here are Birthdays for the period <span class=\"w3-text-orange\">";?><i><?php echo date('jS M, Y'); ?></i></span> to <span class="w3-text-orange"><i><?php echo date('jS M, Y', strtotime(date('Y-m-d'))+604800); ?></i></span></h3>   
          </div>
        </div>             
         <!-- /. ROW  -->
          <hr />
       <div class="w3-row">
          <div class="w3-half">
              <?php echo (count($birthdays)!=0)?"<img src=\"../assets/images/system/birthday3.jpg\" width=\"200\" height=\"150\">":"";?>
          </div>
          <div class="w3-half">
              <?php echo (count($birthdays)!=0)?"<img src=\"../assets/images/system/birthday3.jpg\" width=\"200\" height=\"150\" style=\"margin-left: 40%;\">":"";?>
              <!-- <img src="../assets/images/system/birthday3.jpg" width="200" height="150"> -->
          </div>
             <!-- /. ROW  -->           
         </div>
      <div class="row">
        <div class="col-md-12 col-sm-6"><br>
            <div class="panel panel-default">
                <div class="panel-head">
                    <div class="panel-body">
                        <div class="table-responsive">
                           <table class="table table-striped table-bordered table-hover" id="birthday_table">
                             <thead>
                               <tr>
                                 <th>Name</th>
                                 <th>Date of Birth</th>
                                 <!-- <th>Ministry</th> -->
                                 <th>Residence</th>
                                 <th>Zone</th>
                                 <th>Phone</th>
                               </tr>
                             </thead>
                             <tbody>
                               <?php foreach($birthdays as $person):?>
                                <tr>
                                  <td title="Click to view details" class="w3-text-blue-grey" onclick="<?php echo "popUpModal2('members/profile.php','get_member_details','".$person->id."')"?>" style="cursor: pointer;"><?php echo $person->f_name.' '.$person->m_name.' '.$person->l_name;?></td>
                                  <td class="w3-center">
                                    <?php echo date('jS/M', strtotime($person->birth_date));?>
                                  </td>

                                  <!-- <td><?php echo $member->getMinistry($person->ministry_id)->name;?></td> -->
                                  <td><?php echo $person->residence;?></td>
                                  <td><?php echo $member->getZone($person->zone_id)->name;?></td>
                                  <td><?php echo $person->phone;?></td>
                                </tr>
                               <?php endforeach;?>
                             </tbody>
                           </table>
                           <div class="w3-center w3-text-pink">
                               <h4><?php echo (count($birthdays)!=0)?"<i>God bless you with His special love!</i> <img src=\"../assets/images/system/like-2.png\" width=\"50\" height=\"30\">":"";?></h4>
                           </div>
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
            $('#birthday_table').dataTable({
                "order":[[2,"asc"]]
            });
        })
    </script>
</body>
</html>
