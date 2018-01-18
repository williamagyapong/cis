<?php 
 $user = new User();
 $settings = new Settings();
?>
<nav id="header" class="navbar navbar-default navbar-cls-top w3-card-4" role="navigation" style="margin-bottom: 0">
	<div class="navbar-header">
	    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	    </button>
	    <a class="" href="../index.php"><img style="margin:10px 2px 2px 10px;float:left;" height="53" width="80" src="../assets/images/system/worldwide.png" alt="CIS"/></a> 
	    <span class="headtext w3-hide-large" style="cursor: pointer;" title="<?php echo Config::get('app/name');?>">CIS</span>
	</div>

	<span class="headtext w3-hide-small"> &nbsp;<?php echo Config::get('app/name');?> </span>
	<div style="color: white;padding: 15px 50px 5px 50px;float: right;font-size: 16px;"><i>...<?php echo Config::get('client/name');?>...</i> 
	</div>
</nav>   