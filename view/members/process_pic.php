<?php
	$folder = '../../assets/images/members/';
	$or_w = 500;


	if(isset($_POST['upload'])){
		$image = $_FILES['image']['tmp_name'];
		$filename = basename($_FILES['image']['name']);

		list($width, $height) = getimagesize($image);
		$or_h = ($height/$width)* $or_w;

		$src = imagecreatefromjpeg($image);
		$tmp = imagecreatetruecolor($or_w, $or_h);
		imagecopyresampled($tmp, $src, 0, 0, 0, 0, $or_w, $or_h, $width, $height);
		imagejpeg($tmp, $folder.$filename);

		imagedestroy($tmp);
		imagedestroy($src);

		$filename = urlencode($filename);
		header('location:crop.php?file='.$filename);
	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cropping Image using JCROP</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
	<h1 class="page-header text-center">Cropping Image using JCROP</h1>
	<div class="col-md-4 col-md-offset-4">
		<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
			<input type="file" name="image" id="image" required><br>
			<input type="submit" value="Upload" name="upload" class="btn btn-primary">
		</form>
	</div>
</div>
</body>
</body>
</html>