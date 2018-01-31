<?php
require_once '../settings.php';
$settings = new Settings();
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Settings | CIS</title>
    <?php require_once '../include/head_elements.html';?>
</head>
<body>
   <!-- <div class="w3-row w3-margin w3-opacity w3-hover-opacity-off">
                <div class="w3-container w3-blue-grey">
                  <h4>Login Details</h4>
                </div>
                <div class="fieldWrapper">
                    <br>
                    <label class="w3-text-grey"><b><label for="id_username">Username:</label></b></label><br>
                    <input type="text" name="username" class="w3-input w3-border w3-border-dark-grey" maxlength="150" required id="id_username" value="Please enter username" />
                </div>
                <div class="fieldWrapper">
                    <br>
                    <label class="w3-text-grey"><b><label for="id_password">Password:</label></b></label><br>
                    <input type="password" name="password" class="w3-input w3-border w3-border-dark-grey" maxlength="128" required id="id_password" />
                </div>
            </div> -->
    <div id="wrapper">
    	<!-- NAV TOP  -->
         <?php require '../include/header.php';?>
           
        <?php require '../include/sidemenu.php';?>
        <div id="page-wrapper" >
          <div id="page-inner">
            <!-- !PAGE CONTENT! -->
            <div class="w3-main" style="">

              <!-- Header -->
              <header id="portfolio">
                <div class="w3-container">
                <h1><b>System Settings</b></h1>
                <div class="w3-section w3-bottombar w3-padding-16">
                  <button class="w3-button w3-black"><a href="#first_row">First Row</a></button>
                  <button class="w3-button w3-white"><i class="fa fa-diamond w3-margin-right"></i><a href="#second_row">Second Row</a></button>
                  <button class="w3-button w3-white w3-hide-small"><i class="fa fa-photo w3-margin-right"></i></button>
                  <button class="w3-button w3-white w3-hide-small"><i class="fa fa-map-pin w3-margin-right"></i></button>
                </div>
                </div>
              </header>
              
              <!-- First Grid-->
              <div id="first_row" class="w3-row-padding">
                <div class="w3-third w3-container w3-margin-bottom">
                  <div class="w3-container w3-white w3-opacity w3-hover-opacity-off">
                    <p id="languages" class="w3-blue-grey w3-center"><b>Languages</b></p>
                    <div class="">
                      <form id="languages_form" action="../controller.php" method="post" class="w3-container w3-card-4 w3-padding w3-card w3-padding-34">
                        <div class="w3-row-padding">
                          <label class="w3-bold" for="id_current_lang">Languages Available:</label><br>
                          <select class="w3-select w3-border w3-border-dark-grey">
                            <option>----------</option>
                            <?php foreach($settings->getLanguage() as $language):?>
                              <option><?php echo $language->name;?></option>
                            <?php endforeach;?>
                          </select><br><br>

                          <label class="w3-bold" for="id_language">New Language</label><br>
                          <input id="id_language" type="text" name="language" class="w3-input w3-border w3-border-dark-grey" required autocomplete="off"><br>

                          <label class="w3-bold" for="id_type">Type</label><br>
                          <select id="id_type" type="text" name="type" value="Local" class="w3-select w3-border w3-border-dark-grey" required>
                            <option value="">---------</option>
                            <option value="local">Local</option>
                            <option value="foreign">Foreign</option>
                          </select>

                          <input type="hidden" name="settings" value="add_language">
                          <button onclick="effectSettingsChanges('languages_form', 'add_language')" id="add_language" class="btn btn-primary w3-margin-top">ADD</button><img class="w3-margin-top" style="margin-left: 70px;" src="../assets/images/system/ajax-loader.gif">
                        </div>
                      </form>
                    </div>
                   </div>
                </div>
                <div class="w3-third w3-container w3-margin-bottom">
                  <div class="w3-container w3-white w3-opacity w3-hover-opacity-off">
                    <p id="permissions" class="w3-blue-grey w3-center"><b>Permissions</b></p>
                    <div class="">
                      <form id="languages_form" action="../controller.php" method="post" class="w3-container w3-card-4 w3-padding w3-card w3-padding-34">
                        <div class="w3-row-padding">
                          <img class="w3-margin-top" style="margin-left: 70px;" src="../assets/images/system/ajax-loader.gif">
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="w3-third w3-container">
                  <div class="w3-container w3-white w3-opacity w3-hover-opacity-off">
                    <p id="reset_password" class="w3-blue-grey w3-center"><b>Reset Password</b></p>
                    <div class="">
                      <form id="reset_password_form" action="../controller.php" method="post" class="w3-container w3-card-4 w3-padding w3-card w3-padding-34">
                        <div class="w3-row-padding">
                         <label class="w3-bold" for="old_password">Old Password:</label><br>
                          <input type="password" name="old_password" id="old_password" class="w3-input w3-border w3-border-dark-grey" required maxlength="32"><br>

                          <label class="w3-bold" for="new_password">New Password:</label><br>
                          <input id="new_password" type="password" name="new_password" class="w3-input w3-border w3-border-dark-grey" required maxlength="32"><br>

                          <label class="w3-bold" for="new_password_again">Retype New Password:</label><br>
                          <input id="new_password_again" type="password" name="new_password_again"  class="w3-input w3-border w3-border-dark-grey" required maxlength="32">

                          <input type="hidden" name="settings" value="reset_password">
                          <button onclick="effectSettingsChanges('reset_password_form','reset_password')" id="reset_password" class="btn btn-primary w3-margin-top">RESET</button>
                         <img class="w3-margin-top" style="margin-left: 70px;" src="../assets/images/system/ajax-loader.gif">
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              
              <!-- Second Grid-->
              <div id="second_row" class="w3-row-padding">
                <div class="w3-third w3-container w3-margin-bottom">
                  <div class="w3-container w3-white w3-opacity w3-hover-opacity-off">
                    <p id="" class="w3-blue-grey w3-center"><b></b></p>
                    <div class="">
                      <form id="languages_form" action="../controller.php" method="post" class="w3-container w3-card-4 w3-padding w3-card w3-padding-34">
                        <div class="w3-row-padding">
                          <img class="w3-margin-top" style="margin-left: 70px;" src="../assets/images/system/ajax-loader.gif">
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="w3-third w3-container w3-margin-bottom">
                  <div class="w3-container w3-white w3-opacity w3-hover-opacity-off">
                    <p id="" class="w3-blue-grey w3-center"><b></b></p>
                    <div class="">
                      <form id="languages_form" action="../controller.php" method="post" class="w3-container w3-card-4 w3-padding w3-card w3-padding-34">
                        <div class="w3-row-padding">
                          <img class="w3-margin-top" style="margin-left: 70px;" src="../assets/images/system/ajax-loader.gif">
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="w3-third w3-container">
                  <div class="w3-container w3-white w3-opacity w3-hover-opacity-off">
                    <p id="" class="w3-blue-grey w3-center"><b></b></p>
                    <div class="">
                      <form id="languages_form" action="../controller.php" method="post" class="w3-container w3-card-4 w3-padding w3-card w3-padding-34">
                        <div class="w3-row-padding">
                          <img class="w3-margin-top" style="margin-left: 70px;" src="../assets/images/system/ajax-loader.gif">
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

              
              <div class="w3-container w3-padding-large" style="margin-bottom:32px">
                <div class="w3-row-padding" style="margin:0 -16px">
                  <div class="w3-third w3-margin-bottom">
                    <ul class="w3-ul w3-border w3-white w3-center w3-opacity w3-hover-opacity-off">
                      <li class="w3-black w3-xlarge w3-padding-32">Basic</li>
                      <li class="w3-padding-16">Web Design</li>
                      <li class="w3-padding-16">Photography</li>
                      <li class="w3-padding-16">1GB Storage</li>
                      <li class="w3-padding-16">Mail Support</li>
                      <li class="w3-padding-16">
                        <h2>$ 10</h2>
                        <span class="w3-opacity">per month</span>
                      </li>
                      <li class="w3-light-grey w3-padding-24">
                        <button class="w3-button w3-teal w3-padding-large w3-hover-black">Sign Up</button>
                      </li>
                    </ul>
                  </div>
                  
                  <div class="w3-third w3-margin-bottom">
                    <ul class="w3-ul w3-border w3-white w3-center w3-opacity w3-hover-opacity-off">
                      <li class="w3-teal w3-xlarge w3-padding-32">Pro</li>
                      <li class="w3-padding-16">Web Design</li>
                      <li class="w3-padding-16">Photography</li>
                      <li class="w3-padding-16">50GB Storage</li>
                      <li class="w3-padding-16">Endless Support</li>
                      <li class="w3-padding-16">
                        <h2>$ 25</h2>
                        <span class="w3-opacity">per month</span>
                      </li>
                      <li class="w3-light-grey w3-padding-24">
                        <button class="w3-button w3-teal w3-padding-large w3-hover-black">Sign Up</button>
                      </li>
                    </ul>
                  </div>
                  
                  <div class="w3-third">
                    <ul class="w3-ul w3-border w3-white w3-center w3-opacity w3-hover-opacity-off">
                      <li class="w3-black w3-xlarge w3-padding-32">Premium</li>
                      <li class="w3-padding-16">Web Design</li>
                      <li class="w3-padding-16">Photography</li>
                      <li class="w3-padding-16">Unlimited Storage</li>
                      <li class="w3-padding-16">Endless Support</li>
                      <li class="w3-padding-16">
                        <h2>$ 25</h2>
                        <span class="w3-opacity">per month</span>
                      </li>
                      <li class="w3-light-grey w3-padding-24">
                        <button class="w3-button w3-teal w3-padding-large w3-hover-black">Sign Up</button>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>      
              <div class="w3-black w3-center w3-padding-24">Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-opacity">w3.css</a></div>

            <!-- End page content -->
            </div>
          </div>
        </div>
    </div>

    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <?php require_once'../include/modals.php';?>
    <?php require_once'../include/scripts.html';?>
    
   
</body>
</html>
