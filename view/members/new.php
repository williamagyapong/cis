<?php
    require_once '../settings.php';
    $member = new Member();
    $zones = $member->getZone();
    $ministries = $member->getMinistry();
    $regions = $member->getRegion();
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard | CIS</title>
    <?php require_once '../include/head_elements.html';?>
    <link rel="stylesheet" href="../assets/css/jquery.Jcrop.min.css" type="text/css" />
</head>
<body>
<div id="wrapper">
    <!-- NAV TOP  -->
     <?php require '../include/header.php';?>
       
    <?php require '../include/sidemenu.php';?>
    <div id="page-wrapper" >
      <div id="page-inner">
        <main class="w3-row w3-padding">
        
            <div  class="page-background w3-white w3-card-4" style="margin-top:40px;max-width:960px;margin-left:auto;margin-right:auto">
                <div class="w3-container w3-blue-grey w3-opacity w3-hover-opacity-off">
                  <h2>Membership Form</h2>
                </div>
              <form id="member_form" action="../process.php" method="post" enctype="multipart/form-data" class="w3-container w3-card-4 w3-padding w3-card w3-padding-34">
                <div class="w3-row-padding">
                    <input type='hidden' name='csrf_token' value="<?php echo Token::generate();?>" />
                    <div class="w3-col m6 l6">
                    	<div class="w3-row w3-margin w3-opacity w3-hover-opacity-off">
                            <div class="w3-container w3-blue-grey w3-margin-bottom">
                              <h4>Identity</h4>
                            </div>
                            <div class="fieldWrapper w3-margin-bottom">
                                <label class="w3-text-grey"><b><label for="id_first_name">First name<span class="w3-text-red w3-large">*</span></label></b></label><br>
                                <input type="text" name="first_name" class="w3-input w3-border w3-border-dark-grey" maxlength="32" required id="id_first_name" />
                            </div>
                            <div class="fieldWrapper w3-margin-bottom">
                                
                                <label class="w3-text-grey"><b><label for="id_middle_name">Middle name</label></b></label><br>
                                <input type="text" name="middle_name" class="w3-input w3-border w3-border-dark-grey" maxlength="64" id="id_middle_name" />
                            </div>
                            <div class="fieldWrapper w3-margin-bottom">
                                
                                <label class="w3-text-grey"><b><label for="id_last_name">Last name<span class="w3-text-red w3-large">*</span></label></b></label><br>
                                <input type="text" name="last_name" class="w3-input w3-border w3-border-dark-grey" maxlength="64" required id="id_last_name" />
                            </div>
                            <div class="fieldWrapper w3-margin-bottom">
                                
                                <label class="w3-text-grey"><b><label for="id_gender">Gender<span class="w3-text-red w3-large">*</span></label></b></label><br>
                                <select name="gender" class="w3-select w3-border w3-border-dark-grey" required id="id_gender">
                                  <option value="" selected>---------</option>

                                  <option value="M">Male</option>

                                  <option value="F">Female</option>

                                </select>
                            </div>
                            <div class="fieldWrapper w3-margin-bottom">
                                
                                <label class="w3-text-grey"><b><label for="id_birth_date">Date of birth<span class="w3-text-red w3-large">*</span></label></b></label><br>
                                <input type="date" name="birth_date" class="w3-input w3-border w3-border-dark-grey" required id="id_birth_date" />
                            </div>
                            <div class="fieldWrapper w3-margin-bottom">
                                
                                <div class="w3-row">
                                    <div class="w3-col m6 l6">
                                        <label class="w3-text-grey"><b><label for="id_home_town">Home Town<span class="w3-text-red w3-large">*</span></label></b></label><br>
                                        <input type="text" name="home_town" class="w3-input w3-border w3-border-dark-grey" required id="id_home_town" />
                                    </div>
                                    <div class="w3-col m6 l6">
                                        <label class="w3-text-grey"><b><label for="id_home_region">Region<span class="w3-text-red w3-large">*</span></label></b></label><br>
                                        <select name="home_region" class="w3-select w3-border w3-border-dark-grey" required id="id_home_region">
                                             <option value="" selected>----------</option>
                                            <?php foreach($regions as $region):?>
                                             <option value="<?php echo $region->name;?>">
                                                <?php echo $region->name;?>
                                             </option>
                                             <?php endforeach;?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="fieldWrapper w3-margin-bottom">
                                
                                <label class="w3-text-grey"><b><label for="id_languages">Languages<span class="w3-text-red w3-large">*</span></label></b></label><br>
                                <select name="languages[]" class="w3-select w3-border w3-border-dark-grey" required id="id_languages" size="3" multiple>
                                  <?php foreach($settings->getLanguage() as $language):?>
                                      <option class="w3-padding-left" value="<?php echo $language->name;?>"><?php echo $language->name;?></option>
                                  <?php endforeach;?>
                                </select>
                            </div>
                            <div class="fieldWrapper w3-margin-bottom">
                                
                                <label class="w3-text-grey"><b><label for="id_picture">Picture<span class="w3-text-red w3-large">*</span></label></b></label><br>
                                <div id="image_preview" class="w3-container" style="">
                                    <!-- load image here after cropping -->
                                </div>
                                <!--  modal for image cropping -->
                                <div id="crop_modal0" class="w3-modal" style="padding-top:50px">
                                  <div class="page-background w3-modal-content w3-white w3-border w3-border-dark-grey w3-text-grey" style="background: #000; height:100%;width:45%;overflow:auto">
                                    <div class="w3-container w3-blue">
                                          <h4 class="">Crop</h4>
                                      </div><br><br>
                                    <div class="w3-container w3-margin-top content">
                                      <div class="w3-display-middle">
                                         <!-- <img src="../assets/images/system/ajax-loader.gif" alt="Loading..." class="w3-display-middle"> -->
                                         <img src="" alt="member picture" id="cropbox" width="500" height="666">
                                      </div>
                                       <!-- load content on request -->
                                    </div><br>
                                    <footer class="w3-container">
                                       <button type="button" class="w3-button w3-border w3-display-bottomright w3-margin w3-hover-blue-grey w3-large" name="button" onclick="dismissCropPanel(); checkCoords()">OK</button>
                                    </footer>
                                  </div>
                                </div>
                                <input type="hidden" name="saved_picture">
                                <input class="w3-input" type="file" name="picture" id="id_picture" required />
                                <!-- include input controls for cropping picture -->
                                <input type="hidden" id="x" name="x" />
                                <input type="hidden" id="y" name="y" />
                                <input type="hidden" id="w" name="w" />
                                <input type="hidden" id="h" name="h" />
                            </div>
                        </div>
                        <div class="w3-row w3-margin w3-opacity w3-hover-opacity-off">
                            <div class="w3-container w3-blue-grey w3-margin-bottom">
                              <h4>Contact</h4>
                            </div>
                            <div class="fieldWrapper w3-margin-bottom">
                                
                                <label class="w3-text-grey"><b><label for="id_phone">Phone<span class="w3-text-red w3-large">*</span></label></b></label><br>
                                <input type="number" name="phone" class="w3-input w3-border w3-border-dark-grey" min="0" maxlength="50" required id="id_phone" />
                            </div>
                            <div class="fieldWrapper w3-margin-bottom">
                                
                                <label class="w3-text-grey"><b><label for="id_phone_other">Phone(Other)</label></b></label><br>
                                <input type="number" name="phone_other" class="w3-input w3-border w3-border-dark-grey" min="0" maxlength="50" id="id_phone_other" />
                            </div>
                            <div class="fieldWrapper w3-margin-bottom">
                                
                                <label class="w3-text-grey"><b><label for="id_email">Email address</label></b></label><br>
                                <input type="email" name="email" class="w3-input w3-border w3-border-dark-grey" maxlength="254" id="id_email" />
                            </div>
                        </div>
                        <div class="w3-row w3-margin w3-opacity w3-hover-opacity-off">
                            <div class="w3-container w3-blue-grey w3-margin-bottom">
                              <h4>Baptism</h4>
                            </div>
                            <div class="fieldWrapper w3-margin-bottom">
                                
                                <div class="w3-row">
                                    <div class="w3-col m6 l6">
                                       <label class="w3-text-grey"><b><label for="id_is_baptised">Is baptised:</label></b></label>
                                       <input type="checkbox" name="baptismal_status" class="w3-check w3-border w3-border-dark-grey" id="id_is_baptised" /> 
                                    </div>
                                    <div class="w3-col m6 l6 w3-hide baptism">
                                       <div>
                                           <label class="w3-text-grey"><b><label for="id_date_baptised">Date:</label></b></label>
                                        <input type="date" name="date_baptised" class="w3-border w3-border-dark-grey" id="id_date_baptised" required />  
                                       </div> 
                                    </div>
                                </div>
                            </div>
                            <div class="fieldWrapper w3-hide w3-margin-bottom baptism">
                                
                                <div class="w3-row w3-margin-bottom">
                                    <div class="w3-col m6 l6">
                                       <label class="w3-text-grey"><b><label for="id_where_baptised">Congregation:</label></b></label>
                                        <select id="id_where_baptised" name="where_baptised" class="w3-select w3-border w3-border-dark-grey" required>
                                            <option value="" selected>---------</option>
                                            <option value="gbawe">Gbawe Church</option>
                                            <option value="other church">Other Church</option>
                                        </select>    
                                    </div>
                                    <div class="w3-col m6 l6">
                                        <label class="w3-text-grey"><b><label for="id_other_baptised">If other specify:</label></b></label>
                                        <input type="text" name="other_baptised_cong" class="w3-input w3-border w3-border-dark-grey" id="id_other_baptised" placeholder="Name of other Church" disabled />  
                                    </div>
                                </div>
                                <div class="w3-row">
                                    <label class="w3-text-grey"><b><label for="id_contact_person">Contact Person (Minister)</label></b></label>
                                    <div class="w3-row">
                                        <div class="w3-col m6 l6">
                                            <label class="w3-text-grey"><b><label for="id_contact_person">Name:</label></b></label>
                                            <input type="text" name="contact_person" maxlength="225" class="w3-input w3-border w3-border-dark-grey" id="id_contact_person" disabled />
                                        </div>
                                        <div class="w3-col l6 m6">
                                            <label class="w3-text-grey"><b><label for="contact_person_phone">Contact:</label></b></label>
                                            <input type="text" name="contact_person_phone" class="w3-input w3-border w3-border-dark-grey" id="contact_person_phone" disabled />
                                        </div>
                                    </div>  
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w3-col m6 l6">
                        <div class="w3-row w3-margin w3-opacity w3-hover-opacity-off">
                            <div class="w3-container w3-blue-grey w3-margin-bottom">
                              <h4>About</h4>
                            </div>
                            <div class="fieldWrapper w3-margin-bottom">
                              <div class="w3-row">
                                  <div class="w3-col m6 l6">
                                      <label class="w3-text-grey"><b><label for="id_occupation">Occupation<span class="w3-text-red w3-large">*</span></label></b></label>
                                     <input type="text" name="occupation" class="w3-input w3-border w3-border-dark-grey" maxlength="64" required id="id_occupation" />
                                  </div>
                                  <div class="w3-col m6 l6">
                                      <label class="w3-text-grey"><b><label for="id_residence">Residence<span class="w3-text-red w3-large">*</span></label></b></label>
                                      <input type="text" name="residence" class="w3-input w3-border w3-border-dark-grey" maxlength="50" required id="id_residence" />
                                  </div>
                              </div>
                            </div>
                            <div class="fieldWrapper w3-margin-bottom">
                                
                                
                            </div>
                            <div class="fieldWrapper w3-margin-bottom">
                                <label class="w3-text-grey"><b><label for="id_education">Highest Educational Level<span class="w3-text-red w3-large">*</span></label></b></label><br>
                                <input type="text" name="education" class="w3-input w3-border w3-border-dark-grey" maxlength="50" required id="id_education" />
                            </div>
                            <div class="fieldWrapper w3-margin-bottom">
                                <div class="w3-row">
                                    <div class="w3-col m6 l6">
                                        <label class="w3-text-grey"><b><label for="id_marital">Marital Status<span class="w3-text-red w3-large">*</span></label></b></label>
                                        <select name="marital_status" class="w3-select w3-border w3-border-dark-grey" required id="id_marital">
                                          <option value="" selected>---------</option>
                                          <option value="single">Single</option>
                                          <option value="married">Married</option>
                                          <option value="divorced">Divorced</option>
                                          <option value="separated">Separated</option>
                                          <option value="widowed">widowed</option>
                                        </select>
                                    </div>
                                    <div class="w3-col m6 l6">
                                        <label class="w3-text-grey"><b><label for="id_kids">Kids<span class="w3-text-red w3-large">*</span></label></b></label>
                                        <input type="number" name="kids" class="w3-input w3-border w3-border-dark-grey" min="0" id="id_kids" required />
                                    </div>
                                </div>
                            </div>
                            <div class="fieldWrapper w3-margin-bottom">
                                <div class="w3-row">
                                    <div class="w3-col m6 l6">
                                        <label class="w3-text-grey"><b><label for="id_blood">Blood Group:</label></b></label><br>
                                        <select name="blood_group" class="w3-select w3-border w3-border-dark-grey" id="id_blood">
                                            <option value="" selected>---------</option>
                                            <option value="O">O</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="AB">AB</option>
                                        </select> 
                                    </div>
                                    <div class="w3-col m6 l6">
                                        <label class="w3-text-grey"><b><label for="id_sickle">Sickle cell Status:</label></b></label><br>
                                        <select name="sickling_status" class="w3-select w3-border w3-border-dark-grey" id="id_sickle">
                                            <option value="" selected>---------</option>
                                            <option value="AA">AA</option>
                                            <option value="AS">AS</option>
                                            <option value="SS">SS</option>
                                            <option value="AB">AB</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="w3-row w3-margin w3-opacity w3-hover-opacity-off">
                            <div class="w3-container w3-blue-grey">
                              <h4>Church Activity</h4>
                            </div>
                            <div class="fieldWrapper">
                                <br>
                                <label class="w3-text-grey"><b><label for="id_zone">Zone<span class="w3-text-red w3-large">*</span></label></b></label><br>
                                <select name="zone" class="w3-select w3-border w3-border-dark-grey" id="id_zone" required>
            					  <option value="" selected>----------</option>
                                  <option value="6">None</option>
                                  <?php foreach($zones as $zone):?>
                                  <option value="<?php echo $zone->id;?>"><?php echo $zone->name;?></option>
                                  <?php endforeach;?>
            					</select>
            	            </div>
                            <div class="fieldWrapper">
                                <br>
                                <label class="w3-text-grey"><b><label for="id_ministry">Ministry<span class="w3-text-red w3-large">*</span></label></b></label><br>
                                <select name="ministry" class="w3-select w3-border w3-border-dark-grey" id="id_ministry" required>
                                  <option value="" selected>----------</option>
                                  <option value="6">None</option>
            					  <?php foreach($ministries as $ministry): ?>
                                  <option value="<?php echo $ministry->id; ?>"><?php echo $ministry->name; ?></option>
                                  <?php endforeach; ?>
            					</select>
                            </div>
                        </div>
                        <div id="parents_field" class="w3-row w3-margin w3-opacity w3-hover-opacity-off">
                            <div class="w3-container w3-blue-grey">
                              <h4>Parents<span class="w3-large"></span></h4>
                            </div><br>
                            <fieldset class="w3-border w3-border-dark-grey">
                                <legend class="w3-text-red w3-border w3-border-dark-grey w3-center">Father</legend>
                                <div class="w3-row">
                                    <div class="w3-col m6 l6">
                                        <label class="w3-text-grey"><b><label for="id_is_father_member">Is Member:</label></b></label> 
                                       <input type="checkbox" name="is_father_member" class="w3-check w3-border w3-border-dark-grey" id="id_is_father_member"/>
                                    </div>
                                    <div class="w3-col m6 l6">
                                        <label class="w3-text-grey"><b><label for="id_is_mother_deceased">Is Deceased:</label></b></label>
                                        <input type="checkbox" name="is_father_deceased" class="w3-check w3-border w3-border-dark-grey" id="id_is_father_deceased"/>
                                    </div>
                                </div>
                                <div id="father_field" class="w3-row fieldWrapper">
                                    <div class="w3-col m6 l6">
                                        <label class="w3-text-grey"><b><label for="id_father_name">Full name:</label></b></label><br>
                                       <input type="text" name="father_name" class="w3-input w3-border w3-border-dark-grey" maxlength="150" id="id_father_name" required/>
                                    </div>
                                    <div class="w3-col m6 l6">
                                        <label class="w3-text-grey"><b><label for="id_father_contact">Contact:</label></b></label><br>
                                        <input type="number" name="father_contact" class="w3-input w3-border w3-border-dark-grey" id="id_father_contact" min="0" maxlength="10" required/>
                                    </div>
                                </div>
                            </fieldset><br>
                            <fieldset class="w3-border w3-border-dark-grey">
                                <legend class="w3-text-red w3-border w3-border-dark-grey w3-center">Mother</legend>
                                <div class="w3-row">
                                    <div class="w3-col m6 l6">
                                        <label class="w3-text-grey"><b><label for="id_is_mother_member">Is Member:</label></b></label>
                                        <input type="checkbox" name="is_mother_member" class="w3-check w3-border w3-border-dark-grey" id="id_is_mother_member"/>
                                    </div>
                                    <div class="w3-col m6 l6">
                                        <label class="w3-text-grey"><b><label for="id_is_mother_member">Is Deceased:</label></b></label>
                                        <input type="checkbox" name="id_is_mother_deceased" class="w3-check w3-border w3-border-dark-grey" id="id_is_mother_deceased" />
                                    </div>
                                </div>
                                <div id="mother_field" class="w3-row fieldWrapper">
                                <br>
                                <div class="w3-col m6 l6">
                                    <label class="w3-text-grey"><b><label for="id_mother_name">Full name:</label></b></label><br>
                                   <input type="text" name="mother_name" class="w3-input w3-border w3-border-dark-grey" maxlength="150" id="id_mother_name" required>
                                </div>
                                <div class="w3-col m6 l6">
                                    <label class="w3-text-grey"><b><label for="id_mother_contact">Contact</label></b></label><br>
                                    <input type="number" name="mother_contact" class="w3-input w3-border w3-border-dark-grey" min="0" maxlength="10" id="id_mother_contact" required/>
                                </div>
                            </div>
                            </fieldset>
                    </div>
                    <div class="w3-row w3-margin w3-opacity w3-hover-opacity-off">
                    <div class="w3-container w3-blue-grey w3-margin-bottom">
                        <h4>Next of Kin</h4>
                    </div>
                    <div class="fieldWrapper w3-margin-bottom">
                         <div class="w3-margin-bottom">
                             <label class="w3-text-grey"><b><label for="next_kin_name">Full name:</label></b></label><br>
                             <input type="text" name="next_kin_name" class="w3-input w3-border w3-border-dark-grey" maxlength="150" id="next_kin_name" required/>
                         </div>
                         <div id="next_kin_field" class="w3-row">
                            <div class="w3-col m6 l6">
                                <label class="w3-text-grey"><b><label for="next_kin_name">Relationship:</label></b></label>
                                <input type="text" name="next_kin_relation" class="w3-input w3-border w3-border-dark-grey" maxlength="150" id="next_kin_relation" required/> 
                            </div>
                            <div class="w3-col m6 l6">
                                <label class="w3-text-grey"><b><label for="next_kin_contact">Contact:</label></b></label><br>
                                <input type="number" name="next_kin_contact" class="w3-input w3-border w3-border-dark-grey" id="next_kin_contact" min="0" maxlength="10" required/>
                            </div>
                        </div>                                   
                    </div>
                </div>
                </div>
                <div class="w3-row-padding w3-center">
                    <a href="index.php" class="btn btn-primary w3-margin w3-padding-left-24 padding-right">Cancel</a>
                    <input id="image_upload_token" type="hidden" name="token" value="upload_image">
                    <input id="add_member" type="hidden" name="add_token"  value="add_member">
                    <button type="submit" class="btn btn-primary w3-margin" onclick="">Save Details</button>
                </div>
             </form>
        </div>
      </main>
    </div>
  </div>
</div>
        <?php require_once'../include/modals.php';?>
    
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <?php require_once'../include/scripts.html';?>
    <script src="../assets/js/jquery.Jcrop.min.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function(){
/*
            $('#hello').dialog({
                draggable:false,
                resizable:false,
                modal:true,
                show: 'slideDown',
                hide: 'slideUp'
            });*/
            $(document).change(function() {
            // toggle baptism field inputs visibility
            if($('#id_is_baptised').prop('checked')) {
                $('.baptism').removeClass('w3-hide');
                $('.baptism :input').prop('disabled', false)
            } else {
                $('.baptism').addClass('w3-hide');
                $('.baptism :input').prop('disabled', true)
            }
            
            // make specify other Congregation required
            var whereBaptised = $('#id_where_baptised').val();
            if(whereBaptised=='other church') {
               $('#id_other_baptised').prop('disabled', false)
               $('#id_contact_person').prop('disabled', false) 
               $('#contact_person_phone').prop('disabled', false)
            } else {
                    $('#id_other_baptised').prop('disabled', true)
                    $('#id_contact_person').prop('disabled', true)
                    $('#contact_person_phone').prop('disabled', true) 
            }

        })

        // member picture loading
            var picture = $('input[name="picture"]');
            picture.change(function(){

                if(picture.val() !='') {
                 var formData = new FormData($('#member_form')[0]);
                 $.ajax({
                    type: 'post',
                    url:'../controller.php',
                    data: formData,
                    dataType:'json',
                    encode:true,
                    cache: false,
                    contentType: false,
                    processData: false
                 })
                 .done(function(response) {
                    showCropPanel('../controller.php','crop_image', response.image);
        
                 })
                 .fail(function(){
                    console.log('failed to upload picture')
                 })
            }

                // crop picture
            $(function(){
              $('#cropbox').Jcrop({
                aspectRatio: 1,
                onSelect: updateCoords
              });
            });

            function updateCoords(c){
              $('#x').val(c.x);
              $('#y').val(c.y);
              $('#w').val(c.w);
              $('#h').val(c.h);
            };
            })
            
    })

    </script>
   
</body>
</html>