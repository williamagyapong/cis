<?php 
require_once 'settings.php';
$middleware = new Middleware();
$settings = new Settings();

 if(Input::exist('token', 'get'))
 	{
 		switch(Input::get('token'))
 		{
 			case 'create_fam_ui':
 			 $middleware->createFamilyUi();
       break;

 			case 'new_ministry_ui':
 			 $middleware->newMinistryUi();
 			 break;

 			case 'new_zone_ui':
 			 $middleware->newZoneUi();
            break;

            case 'crop_image':
            $image = Session::get('uploaded_pic');
            echo "<div class=\"w3-container\" style=\"\">
                        <img id=\"cropbox\" class=\"w3-left w3-card w3-border w3-border-dark-grey\" src=\"../assets/images/$image\" alt=\"member picture\" width=\"200\" height=\"200\" style=\"max-width:200px; height: 200px\">
                    </div>";
            /*echo "<input type=\"hidden\" id=\"x\" name=\"x\" />
                    <input type=\"hidden\" id=\"y\" name=\"y\" />
                    <input type=\"hidden\" id=\"w\" name=\"w\" />
                    <input type=\"hidden\" id=\"h\" name=\"h\" />
             ";*/
             break;
 		}
 	}


 if(Input::exist('token'))
 	{
 		switch(Input::get('token'))
 		{
 			case 'upload_image':
                  $folder = 'assets/images/members/';
                  $or_w = 500;
                  $image = $_FILES['picture']['tmp_name'];
                  $filename = basename($_FILES['picture']['name']);

                  list($width, $height) = getimagesize($image);
                  $or_h = ($height/$width)* $or_w;

                  $src = imagecreatefromjpeg($image);
                  $tmp = imagecreatetruecolor($or_w, $or_h);
                  imagecopyresampled($tmp, $src, 0, 0, 0, 0, $or_w, $or_h, $width, $height);
                  imagejpeg($tmp, $folder.$filename);

                  imagedestroy($tmp);
                  imagedestroy($src);
                  Session::put('uploaded_pic', $filename);
                  $response = array('image'=>$filename);

                  echo json_encode($response);
 			/*$image = $_FILES['picture'];
 			$temp = explode(".", $image["name"]);
			$newfilename = round(microtime(true)) . '.' . end($temp);
			//move_uploaded_file($_FILES["file"]["tmp_name"], "../img/imageDirectory/" . $newfilename);
 			if(move_uploaded_file($image['tmp_name'], "assets/images/members/".$newfilename))
            {
            	Session::put('uploaded_pic', $newfilename);
            	echo $newfilename;
            } */
                 break;

                 case 'save_cropped':
                  $path = 'assets/images/members/';
                  $file = Session::get('uploaded_pic');
                  $location = $path.$file;
                  $newFile = time().'_'.$file;
                  $newloc = $path.$newFile;
                  
                  $targ_w = $targ_h = 250;
                  
                  $img_r = imagecreatefromjpeg($location);
                  $dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

                  imagecopyresampled($dst_r,$img_r,0,0,Input::get('x'),Input::get('y'),
                  $targ_w,$targ_h,Input::get('w'),Input::get('h'));

                  imagejpeg($dst_r, $path.$newFile);
                  Session::put('cropped_image', $newFile);
                  // delete original image
                  if(file_exists($path.Session::get('uploaded_pic')))
                  {
                     unlink($path.Session::get('uploaded_pic'));
                  }
                  Session::delete('uploaded_pic');//remove session
                  $response = array('image'=>$newFile);
                  echo json_encode($response);
                  break;

                 case 'load_original_image':
                   echo json_encode(array('image'=>Session::get('uploaded_pic')));
                   break;
                case 'add_ministry':
                  DBHandler::getInstance()->insert('ministries', array('name'=>Input::get('name')));
                  break;
 		}
 	}

    

    if(Input::exist('settings'))
      {
            switch(Input::get('settings'))
            {
                  case 'add_language':
                   $settings->addLanguage();
                  break;

                  case 'reset_password':
                   //$settings->resetPassword();
                  break;

            }
      }