<?php $filename = $_GET['file']; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
  <title>Cropping Image using JCROP</title>
   <link rel="icon" type="jpg/png" href="../../assets/images/worldwide.png"/>
  <!-- BOOTSTRAP STYLES-->
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" />
    <!-- BOOTSTRAP STYLES-->
    <link href="../../assets/css/w3.css" rel="stylesheet"/>
     <!-- FONTAWESOME STYLES-->
    <link href="../../assets/css/font-awesome.min.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="../../assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="../../assets/css/custom.css" rel="stylesheet" />
  <link rel="stylesheet" href="../../assets/css/jquery.Jcrop.min.css" type="text/css" />
	
</head>
<body>
<div class="container">
  <h1 class="page-header text-center">Cropping Image</h1>
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
  		<img src="../../assets/images/members/<?php echo $filename; ?>" id="cropbox">
  		<form action="save.php?file=<?php echo $filename; ?>" method="post" onsubmit="">
  			<input type="hidden" id="x" name="x" />
  			<input type="hidden" id="y" name="y" />
  			<input type="hidden" id="w" name="w" />
  			<input type="hidden" id="h" name="h" />
        <br>
  			<input type="submit" value="Save Image" class="btn btn-primary btn-large btn-inverse">
        <br><br>
  		</form>
    </div>
  </div>
	
</div>

 <!-- include scripts -->
 <script src="../../assets/js/jquery-3.2.1.min.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="../../assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="../../assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="../../assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="../../assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="../../assets/js/custom.js"></script>
 <script src="../../assets/js/jquery.Jcrop.min.js"></script>
 <script type="text/javascript">
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

    function checkCoords(){
     /* if (parseInt($('#w').val())) return true;
      alert('Please select a crop region then press submit.');
      return false;*/
    };

  </script>
</body>

</html>
