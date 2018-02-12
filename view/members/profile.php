<?php
  require_once'../../settings.php';
  $member = new Member();
  $settings = new Settings();
  $memberData = $member->get(Input::get('unique_id','get'));
  $languages = json_decode($memberData->languages);
  $languages = (empty($languages))?array():$languages;
  
?>
<div class="w3-row">
	<div>
		<h4 class="w3-center">
			<span class="">Member Profile </span>
			
			<span onclick="<?php echo "popUpLargeModal('members/edit.php','get_member_details','".$memberData->id."')"?>" class="fa fa-edit w3-text-blue" style="cursor: pointer;" title="Edit Profile" ></span>
			<button title="Close" class="w3-button w3-border w3-right w3-hover-red" name="button" onclick="popDownModal('#cis_modal1 .content', 'cis_modal1')"><i class="fa fa-times"></i></button>
		</h4>
	</div>
	<!-- first grid -->
	<div class="w3-col l6 m6">
	   <div class="w3-container">
	   	 <div>
	   	 	<?php echo ($memberData->status==0)?"<span class=\"w3-text-red\"><i>Of Blessed Memory</i></span><span class=\"w3-text-blue-grey w3-margin-left\"><i>Died On: ".date('d/m/Y', strtotime($memberData->died_on))."</i></span>":"";?>
	   	 	<table class="table table-striped table-bordered">
	   	 	  <tr>
	   	 	  	<td colspan="2" class="w3-center w3-grey" style="padding:20px 0;">
	   	 	  		<img src="../assets/images/members/<?php echo $memberData->picture;?>" width="270" height="250" alt="member picture" >
	   	 	  	</td>
	   	 	  </tr>
	   	 	  <tr>
	   	 	  	<td><b>Name</b></td>
	   	 	  	<td><?php echo ucfirst($memberData->f_name)." ".ucfirst($memberData->m_name)." ".ucfirst($memberData->l_name);?>
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
	   	 	  	<td><?php echo ucfirst($memberData->marital_status);?></td>
	   	 	  </tr>
	   	 	  <?php if(($memberData->marital_status=='single')|| ($memberData->marital_status=='')):?>
	   	 	      <!-- do nothing -->
	   	 	  <?php else:?>
	   	 	  <tr>
	   	 	  	<td colspan="2">
                    <div class="panel-group" id="spouse_accordion" style="margin-bottom: 0">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                	<a data-toggle="collapse" data-parent="#spouse_accordion" href="#spouse" class="collapsed" style="display: block;text-decoration: none;"><img src="../assets/images/system/detail.png" width="50" height="30"> Spouse Details</a>
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
							        	<h5>Name&nbsp;<span class="fa fa-arrow-right">&nbsp;</span><span class="w3-text-blue-grey"><?php echo ucfirst($spouse->name);?></span></h5>
							        	<?php if($spouse->deceased=='yes'):?>
							        	  <h5><i>Of blessed memory</i></h5>
							            <?php else:?>
                                    	  <h5>Contact&nbsp;<span class="fa fa-arrow-right">&nbsp;</span><span class="w3-text-blue-grey"><?php echo $spouse->contact;?></span></h5>
                                    	<?php endif;?>

							        	<?php if($spouse->member==''):?>
							        	<h5 class="w3-text-red"><i>Not a member of the church</i></h5>
									    <?php else:?>
							        	<h5 class="w3-text-red"><i>Member of the church</i></h5>
							            <?php endif;?>
							     <?php endif;?>
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
	   	 	  <?php if($memberData->baptismal_status=='baptised'):?>
	   	 	  <tr>
	   	 	  	<td><b>Date of Baptism</b></td>
	   	 	  	<td>
                    <span><?php echo date('d/m/Y', strtotime($memberData->baptised_on));?></span>
	   	 	  </tr>
	   	 	  <?php endif;?>
	   	 	  <?php if($memberData->baptised_at!='Gbawe'):?>
	   	 	  <tr>
	   	 	  	<td colspan="2">
                    <div class="panel-group" id="contact_person_accordion" style="margin-bottom: 0">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                	<a data-toggle="collapse" data-parent="#contact_person_accordion" href="#contact_person" class="collapsed" style="display: block;text-decoration: none;"><img src="../assets/images/system/detail.png" width="50" height="30"> Mother Church Contact</a>
                                </h4>
                            </div>
                            <div id="contact_person" class="panel-collapse collapse" style="height: 0px;">
							    <div class="panel-body">
							    <?php 
							     $contactPerson = json_decode($memberData->b_contact_person);
							     if(empty($contactPerson)):
							    ?>
							      <h5 class="w3-text-red"><i>Not available</i></h5>
							    <?php else:?>
							        	<h5>Name&nbsp;<span class="fa fa-arrow-right">&nbsp;</span><span class="w3-text-blue-grey"><?php echo ucfirst($contactPerson->name);?></span></h5>
                                    	  <h5>Phone&nbsp;<span class="fa fa-arrow-right">&nbsp;</span><span class="w3-text-blue-grey"><?php echo $contactPerson->phone;?></span></h5>
							     <?php endif;?>
							    </div>
							</div>
                        </div>
                    </div>
	   	 	    </td>
	   	 	  </tr>
	   	 	  <?php endif;?>
	   	 	  <tr>
	   	 	  	<td><b>Home Town</b></td>
	   	 	  	<td><?php echo ucwords($memberData->home_town).", ".$member->getRegion($memberData->region_id)->name;?></td>
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
	   	 	  	<td><?php echo ($memberData->phone=='')?'<span class="w3-text-red">xxxxxxxxxx</span>':$memberData->phone;?></td>
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
                                    	<a data-toggle="collapse" data-parent="#accordion" href="#father" class="collapsed" style="display: block;text-decoration: none;"><img src="../assets/images/system/detail.png" width="50" height="30"> Father Details</a>
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
                                        	<!-- father is not a member -->
                                        	<h5>Name&nbsp;<span class="fa fa-arrow-right">&nbsp;</span><span class="w3-text-blue-grey"><?php echo $father->name;?></span></h5>
                                        	<?php if($father->deceased=='yes'):?>
								        	  <h5><i>Of blessed memory</i></h5>
								            <?php else:?>
                                        	  <h5>Contact&nbsp;<span class="fa fa-arrow-right">&nbsp;</span><span class="w3-text-blue-grey"><?php echo $father->contact;?></span></h5>
                                        	<?php endif;?>
                                        	
                                        	<?php
                                            
                                              if($father->member==''){
                                              	echo "<h5 class=\"w3-text-red\"><i>Not a member of the church</i></h5>";
                                               } else {
                                               	 echo "<h5 class=\"w3-text-red\"><i>Member of the church</i></h5>";
                                               }
                                        	?>
                                     
                                    <?php endif;?>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#mother" style="display: block;text-decoration: none;"><img src="../assets/images/system/detail.png" width="50" height="30"> Mother Details</a>
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
                                        	<h5>Name&nbsp;<span class="fa fa-arrow-right">&nbsp;</span><span class="w3-text-blue-grey"><?php echo $mother->name;?></span></h5>
                                        	<?php if($mother->deceased=='yes'):?>
								        	  <h5><i>Of blessed memory</i></h5>
								            <?php else:?>
                                        	  <h5>Contact&nbsp;<span class="fa fa-arrow-right">&nbsp;</span><span class="w3-text-blue-grey"><?php echo $mother->contact;?></span></h5>
                                        	<?php endif;?>
                                             <?php
                                            
                                              if($mother->member==''){
                                              	echo "<h5 class=\"w3-text-red\"><i>Not a member of the church</i></h5>";
                                               } else {
                                               	 echo "<h5 class=\"w3-text-red\"><i>Member of the church</i></h5>";
                                               }
                                        	?>
                                     <?php endif;?>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#next_of_kin" class="collapsed" style="display: block;text-decoration: none;"><img src="../assets/images/system/detail.png" width="50" height="30"> Next of Kin</a>
                                    </h4>
                                </div>
                                <div id="next_of_kin" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <?php 
										 $nextOfKin = $member->getRelation($memberData->id,'next_of_kin');
										 if(empty($nextOfKin)|| ($nextOfKin->name=='')):
										?>
										  <h5 class="w3-text-red"><i>Not available</i></h5>
										<?php else:?>
										    	<!-- next of kin is details -->
										    	<h5>Name&nbsp;<span class="fa fa-arrow-right"></span> <span class="w3-text-blue-grey"><?php echo $nextOfKin->name;?></span></h5>
										    	<h5>Contact&nbsp;<span class="fa fa-arrow-right"></span> <span class="w3-text-blue-grey"><?php echo $nextOfKin->contact;?></span></h5>
										    	<h5 >Relationship&nbsp;<span class="fa fa-arrow-right"></span> <span class="w3-text-blue-grey"><?php echo $nextOfKin->relationship;?></span></h5>
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