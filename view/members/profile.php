<?php
  require_once'../../settings.php';
  $member = new Member();
  $settings = new Settings();
  $memberData = $member->get(Input::get('unique_id','get'));
  $languages = json_decode($memberData->languages);
  $languages = (empty($languages))?array():$languages;
  //$languages = $member->getLanguage($memberData->id)
  //print_array(json_encode(array(1,2,4,5,9)));
?>

<div class="w3-row">
	<div>
		<h4 class="w3-center">
			<span class="">Member Details </span>
			
			<span class="fa fa-edit w3-text-blue"></span>
			<!-- <img src="../assets/images/system/edit_icon2.png" width="50" height="30"> -->
			<!-- <span onclick="popDownModal('#cis_modal1 .content', 'cis_modal1')" class="fa fa-times btn btn-danger w3-right"></span> -->
			<button title="Close" class="w3-button w3-border w3-right w3-hover-red" name="button" onclick="popDownModal('#cis_modal1 .content', 'cis_modal1')"><i class="fa fa-times"></i></button>
		</h4>
	</div>
	<!-- first grid -->
	<div class="w3-col l6 m6">
	   <div class="w3-container">
	   	 <div>
	   	 	<table class="table table-striped table-bordered">
	   	 	  <tr>
	   	 	  	<td colspan="2">
	   	 	  		<img src="../assets/images/members/<?php echo $memberData->picture;?>" width="270" height="250" alt="member picture" >
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
	   	 	  	<td><?php echo date('d/m/Y', strtotime($memberData->birth_date));?></td>
	   	 	  </tr>
	   	 	  <tr>
	   	 	  	<td><b>Marital Status</b></td>
	   	 	  	<td><?php echo $memberData->marital_status;?></td>
	   	 	  </tr>
	   	 	  <?php if(($memberData->marital_status=='single')|| ($memberData->marital_status=='widowed')):?>
	   	 	      <!-- do nothing -->
	   	 	  <?php else:?>
	   	 	  <tr>
	   	 	  	<td colspan="2">
                        <div class="panel-group" id="accordion" style="margin-bottom: 0">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                    	<a data-toggle="collapse" data-parent="#accordion" href="#spouse" class="collapsed" style="display: block;text-decoration: none;">Spouse Details</a>
                                    </h4>
                                </div>
                                <div id="spouse" class="panel-collapse collapse" style="height: 0px;">
								    <div class="panel-body">
								    <?php 
								     $spouse = $member->getRelation($memberData->id,'spouse');
								     if(empty($spouse)):
								    ?>
								      <h5 class="w3-text-red"><i>Not available</i></h5>
								    <?php else:?>
								        <?php if($spouse->token==''):?>
								        	<!-- spouse is not a member -->
								        	<h5><?php echo $spouse->name;?> (Name)</h5>
								        	<h5><?php echo $spouse->contact;?> (Contact)</h5>
								        	<h5 class="w3-text-red"><i>Not a member of the church</i></h5>
								        <?php else: $spouseExist = $member->get($spouse->token);?>
								        	<!-- spouse is also a member -->
								        	<h5><?php echo $spouseExist->f_name.' '.$spouseExist->l_name;?> (Name)</h5>
								        	<h5><?php echo $spouseExist->phone;?> (Contact)</h5>
								        	<h5 class="w3-text-red"><i>Member of the church</i></h5>
								        <?php endif;?>
								     <?php endif;?>
								    </div>
								</div>
                            </div>
                        </div>
                    </div>
                 
	   	 	    </td>
	   	 	  </tr>
	   	 	  <?php endif;?>
	   	 	  <tr>
	   	 	  	<td><b>Children</b></td>
	   	 	  	<td><?php echo $memberData->kids;?></td>
	   	 	  </tr>
	   	 	  <tr>
	   	 	  	<td><b>Baptism</b></td>
	   	 	  	<td>
	   	 	  		<?php if($memberData->baptismal_status=='baptised'):?>
                       <span>
                       	 Baptised at <?php echo ucwords($memberData->baptised_at);?>
                       </span>
	   	 	  	    <?php else:?>
	   	 	  	     <span class="w3-text-red">Not Baptised</span>	
	   	 	  	    <?php endif;?>
	   	 	  </tr>
	   	 	  <tr>
	   	 	  	<td><b>Home Town</b></td>
	   	 	  	<td><?php echo ucwords($memberData->home_town).", ".$memberData->region;?></td>
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
	   	 	  		<?php 
	   	 	  		// echo implode(', ', $languages);
	   	 	  		$languageName = '';
	   	 	  		foreach($languages as $languageId) {
	   	 	  			$languageName .= $settings->getLanguage($languageId)->name.', ';
	   	 	  		}
	   	 	  		 echo rtrim($languageName, ', ');
	   	 	  		?>
	   	 	    </td>
	   	 	  </tr>
	   	 	  <tr>
	   	 	  	<td colspan="2" class="" style="padding: 10px 0 0 0">
 	  			  <div class="panel panel-default" style="margin-bottom: 0">
                    <div class="panel-heading w3-blue-grey w3-center w3-large">
                       Other Information
                    </div>
                    <div class="panel-body" style="margin-bottom: 0">
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                    	<a data-toggle="collapse" data-parent="#accordion" href="#father" class="collapsed" style="display: block;text-decoration: none;">Father Details</a>
                                    </h4>
                                </div>
                                <div id="father" class="panel-collapse collapse" style="height: 0px;">
                                    <div class="panel-body">
                                    <?php 
                                     $father = $member->getRelation($memberData->id,'father');
                                     if(empty($father)):
                                    ?>
                                      <h5 class="w3-text-red"><i>Not available</i></h5>
                                    <?php else:?>
                                        <?php if($father->token==''):?>
                                        	<!-- father is not a member -->
                                        	<h5><?php echo $father->name;?> (Name)</h5>
                                        	<h5><?php echo $father->contact;?> (Contact)</h5>
                                        	<h5 class="w3-text-red"><i>Not a member of the church</i></h5>
                                        <?php else: ?>
                                        	<!-- father is also a member -->
                                        	<?php
                                              $fatherExist = $member->get($father->token);
                                              if(empty($fatherExist)){
                                              	echo "<h5 class=\"w3-text-red\">Incorrect token number: <i class=\"w3-text-blue-grey\">$father->token</i></h5>";
                                               } else {
                                               	 echo "<h5> $fatherExist->f_name $fatherExist->l_name (Name)</h5>
                                               	     <h5> $fatherExist->phone (Contact)</h5>
                                               	     <h5 class=\"w3-text-red\"><i>Member of the church</i></h5>";
                                               }
                                        	?>
                                        <?php endif;?>
                                    <?php endif;?>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#mother" style="display: block;text-decoration: none;">Mother Details</a>
                                    </h4>
                                </div>
                                <div id="mother" class="panel-collapse collapse" style="height: auto;">
                                    <div class="panel-body">
                                    <?php 
                                     $mother = $member->getRelation($memberData->id,'mother');
                                     if(empty($mother)):
                                    ?>
                                      <h5 class="w3-text-red"><i>Not available</i></h5>
                                    <?php else:?>
                                        <?php if($mother->token==''):?>
                                        	<!-- mother is not a member -->
                                        	<h5><?php echo $mother->name;?> (Name)</h5>
                                        	<h5><?php echo $mother->contact;?> (Contact)</h5>
                                        	<h5 class="w3-text-red"><i>Not a member of the church</i></h5>
                                        <?php else: ?>
                                        	<!-- mother is also a member -->
                                        	<?php
                                              $motherExist = $member->get($mother->token);
                                              if(empty($motherExist)){
                                              	echo "<h5 class=\"w3-text-red\">Incorrect token number: <i class=\"w3-text-blue-grey\">$mother->token</i></h5>";
                                               } else {
                                               	 echo "<h5> $motherExist->f_name $motherExist->l_name (Name)</h5>
                                               	     <h5> $motherExist->phone (Contact)</h5>
                                               	     <h5 class=\"w3-text-red\"><i>Member of the church</i></h5>";
                                               }
                                        	?>
                                        <?php endif;?>
                                     <?php endif;?>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#next_of_kin" class="collapsed" style="display: block;text-decoration: none;">Next of Kin</a>
                                    </h4>
                                </div>
                                <div id="next_of_kin" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <?php 
										 $nextOfKin = $member->getRelation($memberData->id,'next_of_kin');
										 if(empty($nextOfKin)):
										?>
										  <h5 class="w3-text-red"><i>Not available</i></h5>
										<?php else:?>
										    <?php if($nextOfKin->token==''):?>
										    	<!-- next of kin is not a member -->
										    	<h5><?php echo $nextOfKin->name;?> (Name)</h5>
										    	<h5><?php echo $nextOfKin->contact;?> (Contact)</h5>
										    	<h5 class="w3-text-red"><i>Not a member of the church</i></h5>
										    <?php else:?>
										    	<!-- next of kin is also a member -->
										    	<?php
	                                              $nextOfKinExist = $member->get($nextOfKin->token);
	                                              if(empty($nextOfKinExist)){
	                                              	echo "<h5 class=\"w3-text-red\">Incorrect token number: <i class=\"w3-text-blue-grey\">$nextOfKin->token</i></h5>";
	                                               } else {
	                                               	 echo "<h5> $nextOfKinExist->f_name $nextOfKinExist->l_name (Name)</h5>
	                                               	     <h5> $nextOfKinExist->phone (Contact)</h5>
	                                               	     <h5 class=\"w3-text-red\"><i>Member of the church</i></h5>";
	                                               }
	                                        	?>
										    <?php endif;?>
										<?php endif;?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
	   	 	  	</td>
	   	 	  </tr>
	   	 	</table>
	   	 	<?php
	   	 	  //print_array($member->getRelation($memberData->id, 'father'));
	   	 	?>
	   	 </div>
	   </div>
	</div>
	<footer class="w3-container">
       <button type="button" class="w3-button w3-border w3-right w3-margin w3-hover-blue-grey" name="button" onclick="popDownModal('#cis_modal1 .content', 'cis_modal1')">close</button>
    </footer>
</div>