<?php
function escape($str)
{
  //$str =  mysql_real_escape_string($str);
  //$str =  strip_tags($str);
  //$str =  htmlentities($str);

  return $str;
}


function print_array($array)
{
	echo "<pre>";
	 print_r($array);
	echo "</pre>";
}

function display($content)
{
	
}


function truncateString($string)
{
	$length = strlen($string);
	if($length >= 19)
	{
		return substr($string, 0,17)."...";
	}else{
		return $string;
	}
}

/*
* change the background color and text color of active page link
*/
function activePage($page){
	$script = $_SERVER["SCRIPT_NAME"];
	$base_url = explode('/', $script)[1];
	$page = '/'.$base_url.'/'.$page;
	if ($page == $script) {

		return "w3-white w3-text-red";
	}
}

function deleteFile()
{
	$filename = $_POST['delete_file'];
  if (file_exists($filename)) {
    unlink($filename); //unlink('path/to/file.jpg');
    echo 'File '.$filename.' has been deleted';
  } else {
    echo 'Could not delete '.$filename.', file does not exist';
  }
}

function uploadFile()
{
	$allowedExts = array("gif", "jpeg", "jpg", "png");
      $temp = explode(".", $_FILES["file"]["name"]);
      $extension = end($temp);
      if ((($_FILES["file"]["type"] == "image/gif")
      || ($_FILES["file"]["type"] == "image/jpeg")
      || ($_FILES["file"]["type"] == "image/jpg")
      || ($_FILES["file"]["type"] == "image/pjpeg")
      || ($_FILES["file"]["type"] == "image/x-png")
      || ($_FILES["file"]["type"] == "image/png"))
      && ($_FILES["file"]["size"] < 100000)
      && in_array($extension, $allowedExts))
        {
        if ($_FILES["file"]["error"] > 0)
          {
          echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
          }
        else 
          {

            $fileName = $temp[0].".".$temp[1];
            $temp[0] = rand(0, 3000); //Set to random number
            $fileName;

          if (file_exists("../img/imageDirectory/" . $_FILES["file"]["name"]))
            {
            echo $_FILES["file"]["name"] . " already exists. ";
            }
          else
            {
            move_uploaded_file($_FILES["file"]["tmp_name"], "../img/imageDirectory/" . $_FILES["file"]["name"]);
            echo "Stored in: " . "../img/imageDirectory/" . $_FILES["file"]["name"];
            }
          }
        }
      else
        {
        echo "Invalid file";
        }

        /*$temp = explode(".", $_FILES["file"]["name"]);
		$newfilename = round(microtime(true)) . '.' . end($temp);
		move_uploaded_file($_FILES["file"]["tmp_name"], "../img/imageDirectory/" . $newfilename);*/

}