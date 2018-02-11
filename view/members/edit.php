<?php
    require_once '../../settings.php';
    $member = new Member();
    $settings = new Settings();
    $zones = $member->getZone();
    $ministries = $member->getMinistry();
    $regions = $member->getRegion();
    $memberId = Input::get('unique_id');
    $father = $member->getRelation($memberId, 'father');
    $mother = $member->getRelation($memberId, 'mother');
    $spouse = $member->getRelation($memberId,'spouse');
    $nextOfKin = $member->getRelation($memberId, 'next_of_kin');
    $memberData = $member->get($memberId);
    $bloodGroups = array('A','B','AB', 'O');
    $sickleCells = array('AA', 'AS', 'SS');

?>
<link rel="stylesheet" href="../assets/css/jquery.Jcrop.min.css" type="text/css" />
<main class="w3-row w3-padding">
  <label class="w3-text-grey w3-large  w3-hide" for="is_child">Is a child:</label>
  <input id="is_child" type="checkbox" value="child" class="w3-check w3-border w3-border-dark-grey  w3-hide">
  <div  class="page-background w3-white w3-card-4" style="margin-top:40px;max-width:960px;margin-left:auto;margin-right:auto">
      <div class="w3-container w3-blue-grey">
        <h3>Profile of <span class="w3-text-orange"><?php echo $memberData->f_name.' '.$memberData->l_name;?></span> <span class="fa fa-arrow-right w3-text-dark-grey"></span> editing mode <span onclick="popDownModal('#edit_modal .content', 'edit_modal')" class="fa fa-times w3-right w3-button w3-hover-red" style="padding: 10px;cursor: pointer;" title="Close"></span></h3>

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
                      <input type="text" name="first_name" value="<?php echo $memberData->f_name;?>" class="w3-input w3-border w3-border-dark-grey" maxlength="32" required id="id_first_name" />
                  </div>
                  <div class="fieldWrapper w3-margin-bottom">
                      
                      <label class="w3-text-grey"><b><label for="id_middle_name">Middle name</label></b></label><br>
                      <input type="text" name="middle_name" value="<?php echo $memberData->m_name;?>" class="w3-input w3-border w3-border-dark-grey" maxlength="64" id="id_middle_name" />
                  </div>
                  <div class="fieldWrapper w3-margin-bottom">
                      
                      <label class="w3-text-grey"><b><label for="id_last_name">Last name/Surname<span class="w3-text-red w3-large">*</span></label></b></label><br>
                      <input type="text" name="last_name" value="<?php echo $memberData->l_name;?>" class="w3-input w3-border w3-border-dark-grey" maxlength="64" required id="id_last_name" />
                  </div>
                  <div class="fieldWrapper w3-margin-bottom">
                      
                      <label class="w3-text-grey"><b><label for="id_gender">Gender<span class="w3-text-red w3-large">*</span></label></b></label><br>
                      <select name="gender" class="w3-select w3-border w3-border-dark-grey" required id="id_gender">
                        <?php echo ($memberData->gender=='M')?"<option value=\"M\" selected>Male</option>":"<option value=\"M\">Male</option>";?>
                        <?php echo ($memberData->gender=='F')?"<option value=\"F\" selected>Female</option>":"<option value=\"F\">Female</option>";?>
                      </select>
                  </div>
                  <div class="fieldWrapper w3-margin-bottom">
                      
                      <label class="w3-text-grey"><b><label for="id_birth_date">Date of birth<span class="w3-text-red w3-large">*</span></label></b></label><br>
                      <input type="date" name="birth_date" value="<?php echo $memberData->birth_date;?>" class="w3-input w3-border w3-border-dark-grey" required id="id_birth_date" />
                  </div>
                  <div class="fieldWrapper w3-margin-bottom">
                      
                      <div class="w3-row">
                          <div class="w3-col m6 l6">
                              <label class="w3-text-grey"><b><label for="id_home_town">Home Town<span class="w3-text-red w3-large">*</span></label></b></label><br>
                              <input type="text" name="home_town" value="<?php echo $memberData->home_town;?>" class="w3-input w3-border w3-border-dark-grey" required id="id_home_town" />
                          </div>
                          <div class="w3-col m6 l6">
                              <label class="w3-text-grey"><b><label for="id_home_region">Region<span class="w3-text-red w3-large">*</span></label></b></label><br>
                              <select name="home_region" class="w3-select w3-border w3-border-dark-grey" required id="id_home_region">
                                  <?php foreach($regions as $region):?>
                                    <?php if($memberData->region_id==$region->id): ?>
                                      <option value="<?php echo $region->id;?>" selected><?php echo $region->name;?></option>
                                    <?php else:?>
                                       <option value="<?php echo $region->id;?>"><?php echo $region->name;?></option>
                                    <?php endif;?>
                                   <?php endforeach;?>
                              </select>
                          </div>
                      </div>
                  </div>
                  <div class="fieldWrapper w3-margin-bottom">
                      
                      <label class="w3-text-grey"><b><label for="id_languages">Languages<span class="w3-text-red w3-large">*</span></label></b></label><br>
                      <select name="languages[]" class="w3-select w3-border w3-border-dark-grey" required id="id_languages" size="3" multiple>
                        <?php foreach($settings->getLanguage() as $language):?>
                            <?php foreach(json_decode($memberData->languages) as $languageId):?>
                              <?php if($languageId==$language->id):?>
                                <option class="w3-padding-left" value="<?php echo $language->id;?>" selected><?php echo $language->name;?></option>
                              <?php else:?>
                                <option class="w3-padding-left" value="<?php echo $language->id;?>"><?php echo $language->name;?></option>
                              <?php endif;?>
                            <?php endforeach;?>
                        <?php endforeach;?>
                      </select>
                  </div>
                  <div class="fieldWrapper w3-margin-bottom">
                      
                      <label class="w3-text-grey"><b><label for="id_picture">Picture<span id="picture_required" class="w3-text-red w3-large">*</span></label></b></label><br>
                      <div id="image_preview" class="w3-container" style="">
                          <!-- load image here after cropping -->
                          <img src="../assets/images/members/<?php echo $memberData->picture;?>" width="200" height="200">
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
                      <input type="hidden" name="saved_picture" value="<?php echo $memberData->picture;?>" />
                      <input class="w3-input" type="file" name="picture" value="<?php echo $memberData->picture;?>" id="id_picture" />
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
                      
                      <label class="w3-text-grey"><b><label for="id_phone">Phone<span id="phone_required" class="w3-text-red w3-large">*</span></label></b></label><br>
                      <input type="text" name="phone" value="<?php echo $memberData->phone;?>" class="w3-input w3-border w3-border-dark-grey numberonly" min="0" maxlength="10" required id="id_phone" />
                  </div>
                  <div id="other_phone" class="fieldWrapper w3-margin-bottom">
                      
                      <label class="w3-text-grey"><b><label for="id_phone_other">Phone(Other)</label></b></label><br>
                      <input type="text" name="phone_other" value="<?php echo $memberData->phone_other;?>" class="w3-input w3-border w3-border-dark-grey numberonly" min="0" maxlength="10" id="id_phone_other" />
                  </div>
                  <div class="fieldWrapper w3-margin-bottom">
                      
                      <label class="w3-text-grey"><b><label for="id_email">Email address</label></b></label><br>
                      <input type="email" name="email" value="<?php echo $memberData->email;?>" class="w3-input w3-border w3-border-dark-grey" maxlength="254" id="id_email" />
                  </div>
              </div>
              <div id="baptism" class="w3-row w3-margin w3-opacity w3-hover-opacity-off">
                  <div class="w3-container w3-blue-grey w3-margin-bottom">
                    <h4>Baptism</h4>
                  </div>
                  <div class="fieldWrapper w3-margin-bottom">
                      
                      <div class="w3-row">
                          <div class="w3-col m6 l6">
                             <label class="w3-text-grey"><b><label for="id_is_baptised">Is baptised:</label></b></label>
                               <input type="checkbox" name="baptismal_status" class="w3-check w3-border w3-border-dark-grey" id="id_is_baptised" <?php echo ($memberData->baptismal_status=='baptised')?'checked':''?> /> 
                          </div>
                          <div class="w3-col m6 l6 w3-hide baptism">
                             <div>
                                 <label class="w3-text-grey"><b><label for="id_date_baptised">Date:</label></b></label>
                              <input type="date" name="date_baptised" value="<?php echo $memberData->baptised_on;?>" class="w3-border w3-border-dark-grey" id="id_date_baptised" disabled required />  
                             </div> 
                          </div>
                      </div>
                  </div>
                  <div class="fieldWrapper w3-hide w3-margin-bottom baptism">
                      
                      <div class="w3-row w3-margin-bottom">
                          <div class="w3-col m6 l6">
                             <label class="w3-text-grey"><b><label for="id_where_baptised">Congregation:</label></b></label>
                              <select id="id_where_baptised" name="where_baptised" class="w3-select w3-border w3-border-dark-grey" disabled required>
                                  <?php echo ($memberData->baptised_at=='')?"<option value=\"\" selected>----------</option>":"<option value=\"\">----------</option>";?>
                                  <?php echo ($memberData->baptised_at=='Gbawe')?"<option value=\"Gbawe\" selected>Gbawe Church</option>":"<option value=\"Gbawe\">Gbawe Church</option>";?>
                                  <?php echo (($memberData->baptised_at!='Gbawe')&&($memberData->baptised_at!=''))?"<option value=\"other church\" selected>Other Church</option>":"<option value=\"other church\">Other Church</option>";?> 
                                  <!-- <option value="other church">Other Church</option> -->
                              </select>    
                          </div>
                          <div class="w3-col m6 l6">
                              <label class="w3-text-grey"><b><label for="id_other_baptised">If other specify:</label></b></label>
                              <input type="text" name="other_baptised_cong" value="<?php echo (($memberData->baptised_at!='Gbawe')&&($memberData->baptised_at!=''))?"$memberData->baptised_at":'';?>" class="w3-input w3-border w3-border-dark-grey" id="id_other_baptised" placeholder="Name of other Church" disabled required />  
                          </div>
                      </div>
                      <div class="w3-row">
                        <?php $contactPerson = json_decode($memberData->b_contact_person);?>
                          <label class="w3-text-grey"><b><label for="id_contact_person">Contact Person (Minister)</label></b></label>
                          <div class="w3-row">
                              <div class="w3-col m6 l6">
                                  <label class="w3-text-grey"><b><label for="id_contact_person">Name:</label></b></label>
                                  <input type="text" name="contact_person" value="<?php echo ($memberData->b_contact_person!='')?$contactPerson->name:'';?>" maxlength="225" class="w3-input w3-border w3-border-dark-grey" id="id_contact_person" disabled />
                              </div>
                              <div class="w3-col l6 m6">
                                  <label class="w3-text-grey"><b><label for="contact_person_phone">Contact:</label></b></label>
                                  <input type="text" name="contact_person_phone" value="<?php echo ($memberData->b_contact_person!='')?$contactPerson->phone:''; ?>" class="w3-input w3-border w3-border-dark-grey numberonly" id="contact_person_phone" min="0" maxlength="10" disabled />
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
                           <input type="text" name="occupation" value="<?php echo $memberData->occupation;?>" class="w3-input w3-border w3-border-dark-grey" maxlength="64" required id="id_occupation" />
                        </div>
                        <div class="w3-col m6 l6">
                            <label class="w3-text-grey"><b><label for="id_residence">Residence<span class="w3-text-red w3-large">*</span></label></b></label>
                            <input type="text" name="residence" value="<?php echo $memberData->residence;?>" class="w3-input w3-border w3-border-dark-grey" maxlength="50" required id="id_residence" />
                        </div>
                    </div>
                  </div>
                  <div class="fieldWrapper w3-margin-bottom">
                      <label class="w3-text-grey"><b><label for="id_education">Highest Educational Level<span class="w3-text-red w3-large">*</span></label></b></label><br>
                      <input type="text" name="education" value="<?php echo $memberData->education;?>" list="education_list" class="w3-input w3-border w3-border-dark-grey" maxlength="50" required id="id_education" autocomplete="off" />
                      <datalist id="education_list">
                        <option value="Tertiary">
                            <option value="O Level">
                            <option value="Senior High">
                            <option value="Junior High">
                            <option value="Primary">
                            <option value="Kindergarten">
                            <option value="None">
                      </datalist>
                  </div>
                  <div class="fieldWrapper w3-margin-bottom">
                      <div class="w3-row">
                          <div class="w3-col m6 l6">
                              <label class="w3-text-grey"><b><label for="id_blood">Blood Group:</label></b></label><br>
                              <select name="blood_group" class="w3-select w3-border w3-border-dark-grey" id="id_blood">
                                <option value="" selected>---------</option>
                                <?php foreach($bloodGroups as $bloodGroup):?>
                                   <?php echo ($bloodGroup==$memberData->blood_group)?"<option value='".$bloodGroup."' selected>$bloodGroup</option>":"<option value='".$bloodGroup."'>$bloodGroup</option>";?>
                                 <?php endforeach;?>
                              </select> 
                          </div>
                          <div class="w3-col m6 l6">
                              <label class="w3-text-grey"><b><label for="id_sickle">Sickle cell Status:</label></b></label><br>
                              <select name="sickling_status" class="w3-select w3-border w3-border-dark-grey" id="id_sickle">
                                  <option value="" selected>---------</option>
                                  <?php foreach($sickleCells as $sickleCell):?>
                                   <?php echo ($sickleCell==$memberData->sickling_status)?"<option value='".$sickleCell."' selected>$sickleCell</option>":"<option value='".$sickleCell."'>$sickleCell</option>";?>
                                 <?php endforeach;?>
                              </select>
                          </div>
                      </div>
                  </div>
                  <div id="marriage" class="fieldWrapper w3-margin-bottom">
                      <div class="w3-row">
                          <div class="w3-col m6 l6">
                              <label class="w3-text-grey"><b><label for="marital_status">Marital Status<span class="w3-text-red w3-large">*</span></label></b></label>
                              <select name="marital_status" class="w3-select w3-border w3-border-dark-grey" required id="marital_status">
                                <option value="" selected>---------</option>
                                <?php echo ($memberData->marital_status=='single')?"<option value=\"single\" selected>Single</option>":"<option value=\"single\">Single</option>";?>
                                <?php echo ($memberData->marital_status=='married')?"<option value=\"married\" selected>Married</option>":"<option value=\"married\">Married</option>";?>
                                <?php echo ($memberData->marital_status=='divorced')?"<option value=\"divorced\" selected>Divorced</option>":"<option value=\"divorced\">Divorced</option>";?>
                                <?php echo ($memberData->marital_status=='separated')?"<option value=\"separated\" selected>Separated</option>":"<option value=\"separated\">Separated</option>";?>
                                <?php echo ($memberData->marital_status=='widowed')?"<option value=\"widowed\" selected>widowed</option>":"<option value=\"widowed\">widowed</option>";?>
                              </select>
                          </div>
                          <div class="w3-col m6 l6">
                              <label class="w3-text-grey"><b><label for="id_kids">Kids<span class="w3-text-red w3-large">*</span></label></b></label>
                              <input type="number" name="kids" value="<?php echo $memberData->kids;?>" class="w3-input w3-border w3-border-dark-grey" min="0" id="id_kids" required />
                          </div>
                      </div>
                  </div>
                  <div id="spouse" class="w3-margin-bottom">
                    <div class="w3-container w3-blue-grey w3-margin-bottom">
                      <h5>Spouse</h5>
                    </div>
                    <div class="w3-row">
                          <div class="w3-col m6 l6">
                              <label class="w3-text-grey"><b><label for="is_spouse_member">Is Member:</label></b></label> 
                             <?php echo ($spouse->member=='yes')?"<input type=\"checkbox\" name=\"is_spouse_member\" value=\"yes\" class=\"w3-check w3-border w3-border-dark-grey\" id=\"is_spouse_member\" checked />":"<input type=\"checkbox\" name=\"is_spouse_member\" value=\"yes\" class=\"w3-check w3-border w3-border-dark-grey\" id=\"is_spouse_member\" />";?>
                          </div>
                      </div>
                      <div id="spouse_field" class="w3-row">
                          <div id="spouse_name_field" class="w3-col m6 l6">
                              <label class="w3-text-grey"><b><label for="spouse_name">Full name:</label></b></label><br>
                             <input type="text" name="spouse_name" value="<?php echo $spouse->name;?>" class="w3-input w3-border w3-border-dark-grey" maxlength="225" id="spouse_name" required/>
                          </div>
                          <div id="spouse_contact_field" class="w3-col m6 l6">
                              <label class="w3-text-grey"><b><label for="spouse_contact">Contact:</label></b></label><br>
                              <input type="text" name="spouse_contact" value="<?php echo $spouse->contact;?>" class="w3-input w3-border w3-border-dark-grey numberonly" id="spouse_contact" min="0" maxlength="10" required/>
                          </div>
                      </div>
                  </div>
              </div>

              <div  class="w3-row w3-margin w3-opacity w3-hover-opacity-off">
                  <div class="w3-container w3-blue-grey">
                    <h4>Church Participation</h4>
                  </div>
                  <div class="fieldWrapper">
                      <br>
                      <label class="w3-text-grey"><b><label for="id_zone">Zone<span class="w3-text-red w3-large">*</span></label></b></label><br>
                      <select name="zone" class="w3-select w3-border w3-border-dark-grey" id="id_zone" required>
                        <?php foreach($zones as $zone):?>
                          <?php echo ($memberData->zone_id==$zone->id)?"<option value=\"$zone->id\" selected>$zone->name</option>":"<option value=\"$zone->id\">$zone->name</option>";?>
                        <?php endforeach;?>
                      </select>
                </div>
                  <div id="ministry" class="fieldWrapper">
                      <br>
                      <label class="w3-text-grey"><b><label for="id_ministry">Ministry<span class="w3-text-red w3-large">*</span></label></b></label><br>
                      <select name="ministry" class="w3-select w3-border w3-border-dark-grey" id="id_ministry" required>
                        <option value="" selected>----------</option>
                        <?php foreach($ministries as $ministry): ?>
                          <?php echo ($memberData->ministry_id==$ministry->id)?"<option value=\"$ministry->id\" selected>$ministry->name</option>":"<option value=\"$ministry->id\">$ministry->name</option>";?>
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
                              <label class="w3-text-grey"><b><label for="is_father_member">Is Member:</label></b></label> 
                              <?php echo ($father->member=='yes')?"<input type=\"checkbox\" name=\"is_father_member\" value=\"yes\" class=\"w3-check w3-border w3-border-dark-grey\" id=\"is_father_member\" checked />": "<input type=\"checkbox\" name=\"is_father_member\" value=\"yes\" class=\"w3-check w3-border w3-border-dark-grey\" id=\"is_father_member\" />";?>
                          </div>
                          <div class="w3-col m6 l6 father">
                              <label class="w3-text-grey"><b><label for="is_father_deceased">Is Deceased:</label></b></label>
                              <?php echo ($father->deceased=='yes')?"<input type=\"checkbox\" name=\"is_father_deceased\" value=\"yes\" class=\"w3-check w3-border w3-border-dark-grey\" id=\"is_father_deceased\" checked />": "<input type=\"checkbox\" name=\"is_father_deceased\" value=\"yes\" class=\"w3-check w3-border w3-border-dark-grey\" id=\"is_father_deceased\" />";?>
                          </div>
                      </div>
                      <div id="father_field" class="w3-row father">
                          <div id="father_name_field" class="w3-col m6 l6">
                              <label class="w3-text-grey"><b><label for="id_father_name">Full name:</label></b></label><br>
                             <input type="text" name="father_name" value="<?php echo $father->name;?>" class="w3-input w3-border w3-border-dark-grey" maxlength="225" id="id_father_name" required/>
                          </div>
                          <div id="father_contact_field" class="w3-col m6 l6">
                              <label class="w3-text-grey"><b><label for="father_contact">Contact:</label></b></label><br>
                              <input type="text" name="father_contact" value="<?php echo $father->contact;?>" class="w3-input w3-border w3-border-dark-grey numberonly" id="father_contact" min="0" maxlength="10" required />
                          </div>
                      </div>
                  </fieldset><br>
                  <fieldset class="w3-border w3-border-dark-grey">
                      <legend class="w3-text-red w3-border w3-border-dark-grey w3-center">Mother</legend>
                      <div class="w3-row">
                          <div class="w3-col m6 l6">
                              <label class="w3-text-grey"><b><label for="is_mother_member">Is Member:</label></b></label>
                              <?php echo ($mother->member=='yes')?"<input type=\"checkbox\" name=\"is_mother_member\" value=\"yes\" class=\"w3-check w3-border w3-border-dark-grey\" id=\"is_mother_member\" checked />": "<input type=\"checkbox\" name=\"is_mother_member\" value=\"yes\" class=\"w3-check w3-border w3-border-dark-grey\" id=\"is_mother_member\" />";?>
                          </div>
                          <div class="w3-col m6 l6 mother">
                              <label class="w3-text-grey"><b><label for="is_mother_deceased">Is Deceased:</label></b></label>
                              <?php echo ($mother->deceased=='yes')?"<input type=\"checkbox\" name=\"is_mother_deceased\" value=\"yes\" class=\"w3-check w3-border w3-border-dark-grey\" id=\"is_mother_deceased\" checked />": "<input type=\"checkbox\" name=\"is_mother_deceased\" value=\"yes\" class=\"w3-check w3-border w3-border-dark-grey\" id=\"is_mother_deceased\" />";?>
                          </div>
                      </div>
                      <div id="mother_field" class="w3-row mother">
                      <div id="mother_name_field" class="w3-col m6 l6">
                          <label class="w3-text-grey"><b><label for="id_mother_name">Full name:</label></b></label><br>
                         <input type="text" name="mother_name" value="<?php echo $mother->name;?>" class="w3-input w3-border w3-border-dark-grey" maxlength="225" id="id_mother_name" required />
                      </div>
                      <div id="mother_contact_field" class="w3-col m6 l6">
                          <label class="w3-text-grey"><b><label for="mother_contact">Contact</label></b></label><br>
                            <input type="text" name="mother_contact" value="<?php echo $mother->contact;?>" class="w3-input w3-border w3-border-dark-grey numberonly" min="0" maxlength="10" id="mother_contact" required/>
                        </div>
                    </div>
                    </fieldset>
            </div>
            <div id="next_of_kin" class="w3-row w3-margin w3-opacity w3-hover-opacity-off">
            <div class="w3-container w3-blue-grey w3-margin-bottom">
                <h4>Next of Kin</h4>
            </div>
            <div class="fieldWrapper w3-margin-bottom">
                 <div class="w3-margin-bottom">
                     <label class="w3-text-grey"><b><label for="next_kin_name">Full name:</label></b></label><br>
                     <input type="text" name="next_kin_name" value="<?php echo $nextOfKin->name;?>" class="w3-input w3-border w3-border-dark-grey" maxlength="225" id="next_kin_name" required/>
                 </div>
                 <div id="next_kin_field" class="w3-row">
                    <div class="w3-col m6 l6">
                        <label class="w3-text-grey"><b><label for="next_kin_name">Relationship:</label></b></label>
                        <input type="text" name="next_kin_relation" value="<?php echo $nextOfKin->relationship;?>" class="w3-input w3-border w3-border-dark-grey" maxlength="150" id="next_kin_relation" placeholder="e.g. father, mother, son" list="next_kin_relation_data" required autocomplete="off" /> 
                        <datalist id="next_kin_relation_data">
                          <option value="father">
                          <option value="mother">
                          <option>son</option>
                          <option>daughter</option>
                          <option>uncle</option>
                          <option>aunt</option>
                          <option>nephew</option>
                          <option>niece</option>
                          <option>grandson</option>
                          <option>granddaughter</option>
                          <option>brother</option>
                          <option>sister</option>
                          <option>friend</option>
                        </datalist>
                    </div>
                    <div class="w3-col m6 l6">
                        <label class="w3-text-grey"><b><label for="next_kin_contact">Contact:</label></b></label><br>
                        <input type="text" name="next_kin_contact" value="<?php echo $nextOfKin->contact;?>" class="w3-input w3-border w3-border-dark-grey numberonly" id="next_kin_contact" min="0" maxlength="10" required/>
                    </div>
                </div>                                   
            </div>
        </div>
        </div>
        <div class="w3-row-padding w3-center">
            <a href="javascript:void()" onclick="popDownModal('#edit_modal .content', 'edit_modal')" class="btn btn-primary w3-margin w3-padding-left-24 padding-right">Cancel</a>
            <input id="image_upload_token" type="hidden" name="token" value="upload_image">
            <input type="hidden" name="member_id" value="<?php echo $memberData->id;?>">
            <input id="add_member" type="hidden" name="add_token"  value="update_member_profile">
            <button type="submit" class="btn btn-primary w3-margin" onclick="">Save Changes</button>
        </div>
     </form>
  </div>
</main>
    
    <script src="../assets/js/jquery.Jcrop.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
             // toggle baptism field inputs visibility as soon as page loads
            if($('#id_is_baptised').prop('checked')) {
                $('.baptism').removeClass('w3-hide');
                $('.baptism :input').prop('disabled', false)
            } else {
                $('.baptism').addClass('w3-hide');
                $('.baptism :input').prop('disabled', true)
            }

            if(!$('#is_father_deceased').prop('checked')) {
               $('#father_contact_field').removeClass('w3-hide');
               $('#father_contact_field :input').prop('disabled', false);
               $('#father_name_field').addClass("w3-col m6 l6");
                      
          } else{
              $('#father_contact_field').addClass('w3-hide');
              $('#father_contact_field :input').prop('disabled', true);
              $('#father_name_field').removeClass("w3-col m6 l6");
          }
          
          // toggle mother field inputs visibility
          if(!$('#is_mother_deceased').prop('checked')) {
               $('#mother_contact_field').removeClass('w3-hide');
               $('#mother_contact_field :input').prop('disabled', false);
               $('#mother_name_field').addClass("w3-col m6 l6");
              
                  
          } else{
              $('#mother_contact_field').addClass('w3-hide');
              $('#mother_contact_field :input').prop('disabled', true);
              $('#mother_name_field').removeClass("w3-col m6 l6");
              
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
          // toggle spouse inputs visibility
          var maritalStatus = $('#marital_status').val();
          if((maritalStatus=='single')||(maritalStatus=='')) {
              $('#spouse').addClass('w3-hide');
              $('#spouse :input').prop('disabled', true);
          } else {
              //
              if(!$('#is_child').prop('checked')){
                  $('#spouse').removeClass('w3-hide');
                  $('#spouse :input').prop('disabled', false);
              }
              
              //control contact field visibility
              if(maritalStatus=='widowed') {
                  $('#spouse_contact_field').addClass('w3-hide');
                  $('#spouse_contact_field :input').prop('disabled', true);
                  $('#spouse_name_field').removeClass("w3-col m6 l6");
              } else{
                      $('#spouse_contact_field').removeClass('w3-hide');
                      $('#spouse_contact_field :input').prop('disabled', false);
                      $('#spouse_name_field').addClass("w3-col m6 l6");
              }

          }
          /*var maritalStatus = $('#marital_status').val();
          //control contact field visibility
          if(maritalStatus=='widowed') {
              $('#spouse_contact_field').addClass('w3-hide');
              $('#spouse_contact_field :input').prop('disabled', true);
              $('#spouse_name_field').removeClass("w3-col m6 l6");
          } else{
                  $('#spouse_contact_field').removeClass('w3-hide');
                  $('#spouse_contact_field :input').prop('disabled', false);
                  $('#spouse_name_field').addClass("w3-col m6 l6");
          }*/

            $(document).change(function() {
            // toggle father field inputs visibility
            // toggle baptism field inputs visibility
            if($('#id_is_baptised').prop('checked')) {
                $('.baptism').removeClass('w3-hide');
                $('.baptism :input').prop('disabled', false)
            } else {
                $('.baptism').addClass('w3-hide');
                $('.baptism :input').prop('disabled', true)
            }


            if(!$('#is_father_deceased').prop('checked')) {
               $('#father_contact_field').removeClass('w3-hide');
               $('#father_contact_field :input').prop('disabled', false);
               $('#father_name_field').addClass("w3-col m6 l6");
                      
          } else{
              $('#father_contact_field').addClass('w3-hide');
              $('#father_contact_field :input').prop('disabled', true);
              $('#father_name_field').removeClass("w3-col m6 l6");
          }
          
          // toggle mother field inputs visibility
          if(!$('#is_mother_deceased').prop('checked')) {
               $('#mother_contact_field').removeClass('w3-hide');
               $('#mother_contact_field :input').prop('disabled', false);
               $('#mother_name_field').addClass("w3-col m6 l6");
              
                  
          } else{
              $('#mother_contact_field').addClass('w3-hide');
              $('#mother_contact_field :input').prop('disabled', true);
              $('#mother_name_field').removeClass("w3-col m6 l6");
              
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
          // toggle spouse inputs visibility
          var maritalStatus = $('#marital_status').val();
          if((maritalStatus=='single')||(maritalStatus=='')) {
              $('#spouse').addClass('w3-hide');
              $('#spouse :input').prop('disabled', true);
          } else {
              //
              if(!$('#is_child').prop('checked')){
                  $('#spouse').removeClass('w3-hide');
                  $('#spouse :input').prop('disabled', false);
              }
              
              //control contact field visibility
              if(maritalStatus=='widowed') {
                  $('#spouse_contact_field').addClass('w3-hide');
                  $('#spouse_contact_field :input').prop('disabled', true);
                  $('#spouse_name_field').removeClass("w3-col m6 l6");
              } else{
                      $('#spouse_contact_field').removeClass('w3-hide');
                      $('#spouse_contact_field :input').prop('disabled', false);
                      $('#spouse_name_field').addClass("w3-col m6 l6");
              }

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