<?php
  require_once'../../settings.php';
  $member = new Member();
  $memberData = $member->get(Input::get('unique_id','get'));
  $languages = json_decode($memberData->languages);
  $languages = (empty($languages))?array():$languages;
  //print_array($member->getLastRegistered());
?>

<div class="w3-row">
	<div>
		<h4 style="text-decoration: underline; " class="w3-center">Member Details <span class="fa fa-edit w3-text-blue"></span></h4>
	</div>
	<!-- first grid -->
	<div class="w3-col l6 m6">
	   <div class="w3-container">
	   	 <div>
	   	 	<table class="table table-striped table-bordered">
	   	 	  <tr>
	   	 	  	<td colspan="2">
	   	 	  		<img src="../assets/images/members/<?php echo $memberData->picture;?>" width="270" height="250">
	   	 	  	</td>
	   	 	  </tr>
	   	 	  <tr>
	   	 	  	<td><b>Name</b></td>
	   	 	  	<td><?php echo $memberData->f_name." ".$memberData->m_name." ".$memberData->l_name;?>
	   	 	  	</td>
	   	 	  </tr>
	   	 	  <tr>
	   	 	  	<td><b>Gender</b></td>
	   	 	  	<td><?php echo ($memberData->gender=='M')?'Male':'Female';?></td>
	   	 	  </tr>
	   	 	  <tr>
	   	 	  	<td><b>Date of Birth</b></td>
	   	 	  	<td><?php echo date('d/m/Y', strtotime($memberData->date_of_birth));?></td>
	   	 	  </tr>
	   	 	  <tr>
	   	 	  	<td><b>Marital Status</b></td>
	   	 	  	<td><?php echo $memberData->marital_status;?></td>
	   	 	  </tr>
	   	 	  <tr>
	   	 	  	<td><b>Children</b></td>
	   	 	  	<td><?php echo $memberData->kids;?></td>
	   	 	  </tr>
	   	 	  <tr>
	   	 	  	<td><b>Baptism</b></td>
	   	 	  	<td>
	   	 	  		<?php if($memberData->baptismal_status=='baptised'):?>
                       <span>
                       	 Baptised at 
                       	 <?php echo ($memberData->baptised_at=='other church')?$memberData->other_baptised_cong:$memberData->baptised_at;?>
                       </span>
	   	 	  	    <?php else:?>
	   	 	  	     <span class="w3-text-red">Not Baptised</span>	
	   	 	  	    <?php endif;?>
	   	 	  </tr>
	   	 	  <tr>
	   	 	  	<td><b>Home Town</b></td>
	   	 	  	<td><?php echo $memberData->home_town.", ".$memberData->region;?></td>
	   	 	  </tr>
	   	 	</table>
	   	 </div>
	   </div>
	</div>
	<!-- second grid -->
	<div class="w3-col l6 m6">
	  <div class="w3-container">
	   	 <div>
	   	 	<table class="table table-striped table-bordered">
	   	 	  <tr>
	   	 	  	<td><b>Residence</b></td>
	   	 	  	<td><?php echo $memberData->residence;?>
	   	 	  	</td>
	   	 	  </tr>
	   	 	  <tr>
	   	 	  	<td><b>Zone</b></td>
	   	 	  	<td><?php echo $member->getZone($memberData->zone_id)->name;?></td>
	   	 	  </tr>
	   	 	  <tr>
	   	 	  	<td><b>Phone</b></td>
	   	 	  	<td><?php echo $memberData->phone;?></td>
	   	 	  </tr>
	   	 	  <tr>
	   	 	  	<td><b>Phone(other)</b></td>
	   	 	  	<td><?php echo ($memberData->phone_other=='')?'xxxxxxxxxx':$memberData->phone_other;?></td>
	   	 	  </tr>
	   	 	  <tr>
	   	 	  	<td><b>Email</b></td>
	   	 	  	<td><?php echo ($memberData->email=='')?'<span class="w3-text-red">xxxxxxxxxx</span>':$memberData->email;?></td>
	   	 	  </tr>
	   	 	  <tr>
	   	 	  	<td><b>Education(Highest)</b></td>
	   	 	  	<td><?php echo $memberData->education;?></td>
	   	 	  </tr>
	   	 	  <tr>
	   	 	  	<td><b>Occupation</b></td>
	   	 	  	<td><?php echo $memberData->occupation;?></td>
	   	 	  </tr>
	   	 	  <tr>
	   	 	  	<td><b>Ministry</b></td>
	   	 	  	<td><?php echo $member->getMinistry($memberData->ministry_id)->name;?></td>
	   	 	  </tr>
	   	 	  <tr>
	   	 	  	<td><b>Blood Group</b></td>
	   	 	  	<td>
	   	 	  		<?php echo ($memberData->blood_group=='')?'<span class="w3-text-red">xxxxxxxxxx</span>':$memberData->blood_group;?>	
	   	 	  	</td>
	   	 	  </tr>
	   	 	  <tr>
	   	 	  	<td><b>Sickle Cell Status</b></td>
	   	 	  	<td>
	   	 	  		<?php echo ($memberData->sickling_status=='')?'<span class="w3-text-red">xxxxxxxxxx</span>':$memberData->sickling_status;?>	
	   	 	  	</td>
	   	 	  </tr>
	   	 	  <tr>
	   	 	  	<td><b><?php echo (count($languages)>1)?'Languages':'Language';?></b></td>
	   	 	  	<td>
	   	 	  		<?php echo implode(',', $languages);?>
	   	 	    </td>
	   	 	  </tr>
	   	 	</table>
	   	 </div>
	   </div>
	</div>
</div>