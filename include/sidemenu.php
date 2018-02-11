 <nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
		<li class="text-center">
            <img id="user_image" src="../assets/images/users/<?php echo $user->data()->image;?>" class="user-image img-responsive"/>
		</li>
            <li>
                <a class="w3-hover-text-grey"  href="index.php"><i class="fa fa-dashboard fa-2x w3-text-blue"></i> Dashboard</a>
            </li>
             <li>
                <a class="w3-hover-text-grey"  href="#"><i class="fa fa-calendar fa-2x w3-text-blue w3-hover-text-grey"></i> Events<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="index.php?page=publisher">Publish Event</a>
                    </li>
                	<li>
                		<?php if(count($birthdays)==0):?>
                            <a href="index.php?page=birthdays">Birthdays</a>
                        <?php else:?>
                            <a href="index.php?page=birthdays">Birthdays<span class="w3-badge w3-small w3-red"><?php echo count($birthdays)?></span></a>
                        <?php endif;?>
                	</li>
                    <li>
                        <a href="index.php?page=funerals">Funerals</a>
                    </li>
                    <li>
                        <a href="index.php?page=invitations">Invitations</a>
                    </li>
                	<li>
                		<a href="index.php?page=marriage_notices">Marriages</a>
                	</li>
                	
                	<li>
                		<a href="index.php?page=other_events">Others</a>
                	</li>
                </ul>
            </li>
            <!-- Members Dropdown -->
            <li>
                <a class="w3-hover-text-grey" href="#"><i class="fa fa-users fa-2x w3-text-blue"></i> Members<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="index.php?page=new_member"><i class="fa fa-plus-square"></i> New</a>
                    </li>
                    <li>
                        <a href="index.php?page=members_list"><i class="fa fa-table"></i> List</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-user"></i> Families<span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                          <li>
                            <a href="javascript:void()" onclick="popUpModal('../controller.php','create_fam_ui')"><i class="fa fa-plus-square"></i>New</a>
                          </li>
                          <li>
                            <a href="index.php?page=create_family"><i class="fa fa-table"></i> List</a>
                          </li>
                        </ul>
                    </li>
                    <li>
                        <a href="index.php?page=">Attendance</a>
                    </li>
                    <li>
                        <a href="index.php?page=">Visitation Guide</a>
                    </li>
                    <li>
                        <a href="index.php?page=">Visitors</a>
                    </li>
                    <li>
                        <a href="index.php?page="><i class="fa fa-times"></i> Remove</a>
                    </li>
                </ul>
            </li>
			
			<!-- Ministries Dropdown -->                 
            <li>
                <a class="w3-hover-text-grey" href="#"><i class="fa fa-sitemap fa-2x w3-text-blue"></i> Ministries<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="javascript:void()" onclick="popUpModal('../controller.php','new_ministry_ui')"><i class="fa fa-plus-square"></i> New</a>
                    </li>
                    <li>
                        <a href="javascript:void()" onclick="popUpModal('../controller.php','ministries_ui')"><i class="fa fa-table"></i> List</a>
                    </li>
                </ul>
              </li>
              <!-- Zones Dropdown -->                 
            <li>
                <a class="w3-hover-text-grey" href="#"><i class="fa fa-sitemap fa-2x w3-text-blue"></i> Zones<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="javascript:void()" onclick="popUpModal('../controller.php','new_zone_ui')"><i class="fa fa-plus-square"></i> New</a>
                    </li>
                    <li>
                        <a href="javascript:void()" onclick="popUpModal('../controller.php','zones_ui')"><i class="fa fa-table"></i> List</a>
                    </li>
                </ul>
              </li>
              <!-- Register -->
              <li>
                <a class="w3-hover-text-grey" href="#"><i class="fa fa-book fa-2x w3-text-blue"></i>Register<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="index.php?page=baptisms">Baptism</a>
                    </li>
                    <li>
                        <a href="index.php?page=marriages">Marriage</a>
                    </li>
                    <li>
                        <a href="index.php?page=deaths">Death</a>
                    </li>
                     
                </ul>
              </li>

              <!-- Cashflow Dropdown -->
              <li>
                <a class="w3-hover-text-grey" href="#"><i class="fa fa-money fa-2x w3-text-blue"></i> Cashflow<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="index.php?page=cashflow">Summary</a>
                    </li>
                    <li>
                        <!-- <a href="income.html">Income</a><li> -->
                        <a href="#">Income<span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li>
                                <a href="index.php?page=">Summary</a>
                            </li>
                            <li>
                                <a href="index.php?page=">Add income</a>
                            </li>
                        </ul>
                       
                    </li>
                    </li>
                    <li>
                        <!-- Accounts -->
                        <a class="w3-hover-text-grey" href="#">Expense<span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li>
                                <a href="index.php?page=">Summary</a>
                            </li>
                            <li>
                                <a href="index.php?page=">Add expense</a>
                            </li>
                        </ul>
                    </li>
                </ul>
              </li>

              <!-- Settings Dropdown -->
              <li>
                <a class="w3-hover-text-grey" href="#"><i class="fa fa-cog fa-2x w3-spin w3-text-blue"></i> Settings<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                   <!--  <li>
                        <a href="index.php?page=admin_profile">Profile</a>
                    </li> -->
                    <li>
                        <a href="index.php?page=system_settings">System</a>
                    </li>
                    <li>
                        <a href="index.php?page=exit">Exit</a>
                    </li>
                </ul>
              </li>

              <!-- Blank Page -->
          <!-- <li  >
                <a  href="blank.html"><i class="fa fa-square-o fa-3x"></i> Blank Page</a>
            </li> -->	
        </ul>
       
    </div>
    
</nav>  
<!-- /. NAV SIDE  -->