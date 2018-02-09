<?php
  require_once'settings.php';
   if(Input::exist('login')) {
    $errorMsg = [];
      //protect against csrf attacks
      if(!Token::check(Input::get('csrf_token'))) $errorMsg[] =" ";
              
              $validate = new Validation();

              $validation = $validate->check($_POST, array(
                          'username' => array('required'=> true),
                          'password' => array('required'=> true)
                ));

              if($validation->passed()) {
                //log user in
                $user = new User();

                //$remember = (Input::get('remember')=='on')? true: false;
                $login = $user->login(Input::get('username'), Input::get('password'));
                if($login) {
                   Redirect::to('view/index.php');
                  //header('Location: profile.php');
                } else {
                          $errorMsg[] = "Invalid log in credentials. Please try again";
                }
              } else {

                  $errorMsg[] = $validation->errors();
                /*foreach($validation->errors() as $error) {
                  echo '<li>'.$error.'</li>';
                }*/
                
              }
            }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>CIS</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
     <link rel="icon" type="jpg/png" href="assets/images/worldwide.png"/>
      <!-- JQUERY-UI STYLES-->
    <!-- <link href="../assets/css/jquery-ui.min.css" rel="stylesheet" /> -->
     <link rel="stylesheet" type="text/css" href="assets/css/w3.css">
     <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" href="assets/css/cis.css"/>
    <style type="text/css">
      @media (max-width:600px){.w3-hide-small{display:none!important}}
      @media (min-width:993px){.w3-hide-large{display:none!important}}

    </style>
  </head>
  <body>
   <div id="container">
            
    <div class="header">
          <img style="margin:10px 2px 2px 10px;float:left;" height="53" width="80" src="assets/images/system/worldwide.png" alt="CIS"/>
         <h3 class="headtext w3-hide-large" title="<?php echo Config::get('app/name');?>"> &nbsp;<?php echo Config::get('app/abbr_name');?> </h3>
         <h3 class="headtext w3-hide-small"> &nbsp;<?php echo Config::get('app/name');?> </h3>
    </div>
    <form id="stdloginform" action="index.php" method="post">
      <input type="hidden" name="csrf_token" value="<?php echo Token::generate() ;?>">
      <div class="menubar">
       <h3 style="font-size:1.5em;color:#ffffff;text-align:center;margin:0 0 5px 5px;"><i>...<?php echo Config::get('client/name');?>...</i></h3>
       <ul id="menu">
                   
        </ul>

      </div>
      <div class="page">
                
                <table cellpadding="30" cellspacing="10" >
              
                <tr>
                    <td>User Name</td>
                    <td><input style="padding-left: 10px;" type="text" tabindex="1" name="username" value="<?php echo Input::get('username');?>" required /></td>

                </tr>
                <tr>
                    <td>Password</td>
                    <td><input style="padding-left: 10px;" type="password" tabindex="2" name="password" value="<?php echo Input::get('username');?>" required/></td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input id="login_btn" type="submit" tabindex="3" value="Log In" name="login" class="subbtn" />
                    </td><td></td>
                </tr>
              </table>


        </div>
       </form>
       <div id="login_msg"  class=" w3-card-4 w3-white w3-text-red w3-bold w3-large w3-center">
        
        <?php
        if(isset($errorMsg))
        {
          foreach($errorMsg as $messages) 
          {
             echo $messages.'<hr><br>';
          }
        }
      ?>
      </div>
       <div>
        <?php include'include/footer.php';?>
       </div>
    </div>
       <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-3.2.1.min.js"></script>
      <!-- JQUERY UI SCRIPTS -->
    <script src="assets/js/jquery-ui.min.js"></script>

    <script>
     
    </script>
  </body>
</html>
