<?php
class Middleware extends Model
{
  private  $text = 'w3-input w3-border w3-border-dark-grey';
  private $textBox = 'w3-input w3-border w3-border-dark-grey';
  private $checkBox = 'w3-check w3-border w3-border-dark-grey';
  private $select = 'w3-select w3-border w3-border-dark-grey';

  /**
  * provides interface for creating families
  * @param
  * @var
  */
  public function createFamilyUi()
  {
  	  echo "<div style=\"width:\" class=\"w3-margin\"><br><br>
          <div class=\"w3-container w3-blue-grey\">
          <h2 class=\"w3-center\">Create Family</h2>
          </div>
          <form action=\"\" method=\"post\" class=\"w3-container w3-card-4 w3-padding w3-card w3-padding-34\">
            <div class=\"w3-row-padding\">
              <div class=\"w3-row w3-section\">
                <div class=\"w3-col l2 md4\">
                  <label>Father:</label>
                </div>
                <div class=\"w3-col l10 md8\">
                  <input type=\"text\" name=\"father\" class=\"w3-input w3-border\" placeholder=\"Please select from suggestions\">
                </div>
              </div>
              <div class=\"w3-row w3-section\">
                <div class=\"w3-col l2 md4\">
                  <label>Mother:</label>
                </div>
                <div class=\"w3-col l10 md8\">
                  <input type=\"text\" name=\"mother\" class=\"w3-input w3-border\" placeholder=\"Please select from suggestions\">
                </div>
              </div>
              <div class=\"w3-row w3-section\">
                <div class=\"w3-col l2 md4\">
                  <label>Head:</label>
                </div>
                <div class=\"w3-col l10 md8\">
                  <select name=\"fam_head\" class=\"w3-select w3-border\" required=\"required\">
                    <option value=\"father\">Father</option>
                      <option value=\"mother\">Mother</option>
                  </select>
                </div>
              </div>
              <div class=\"w3-row w3-section\">
                <div class=\"w3-col l2 md4\">
                  <label>children:</label>
                </div>
                <div class=\"w3-col l10 md8\">
                  <select name=\"children\" class=\"w3-select w3-border\" multiple required>
                  <option>Please select as many as apply</option>
                  <option>----------------</option>
                  <option>----------------</option>
                  <option>----------------</option>
                  <option>----------------</option>
                  <option>----------------</option>
                </select>
                </div>
              </div>
              <div class=\"w3-row w3-section\">
                <div class=\"w3-col l2 md4\">
                  
                </div>
                <div class=\"w3-col l10 md8 w3-right\">
                   <span onclick=\"popDownModal()\" class=\"btn btn-primary w3-padding w3-margin-right\">Cancel</span>
                   <button class=\"btn btn-primary w3-padding w3-margin-left\">Save</button>
                </div>
              </div>
            </div>
        </form>
      </div>";
  }


  /**
  * provides interface for creating families
  * @param
  * @var
  */
  public function newMinistryUi($ministryObject)
  {
    $members = $ministryObject->get();
  	echo "<br><br><div class=\"w3-margin\">
		  <div class=\"w3-container w3-blue-grey\">
		    <h2 class=\"w3-center\">Create a New Ministry</h2>
		  </div>
		  <form action=\"../process.php\" method=\"post\" class=\"w3-container w3-card-4 w3-padding w3-card w3-padding-34\">
		    <div class=\"w3-row-padding\">
		      <label class=\"w3-bold\" for=\"id_name\">Ministry Name:</label><br>
		      <input id=\"id_name\" type=\"text\" name=\"ministry_name\" class=\"w3-input w3-border w3-border-dark-grey\" required><br>
          <label class=\"w3-bold\" for=\"id_leader\">Leader:</label><br>
          <select id=\"id_leader\" name=\"member_id\" class=\"w3-select w3-border w3-border-dark-grey\" required>
              <option value=\"\">-------------</option>";
            foreach($members as $member) {
              echo "<option value=\"$member->id\">".$member->f_name.' '.$member->m_name.' '.$member->l_name."</option> ";   
            }
             echo "<option value=\"0\">None</option>
               </select>
           <input type=\"hidden\" name=\"add_token\" value=\"add_ministry\">
		      <button class=\"btn btn-primary w3-margin-top\">Submit</button>
		    </div>
		  </form>
		</div>";
  }

  /**
  * provides interface for assigning ministry leader
  * @param
  * @var
  */
  public function assignMinistryLeader($ministryId=null, $memberObject)
  {
    if($ministryId) {
        $ministry = $memberObject->getMinistry($ministryId);
        $ministryMembers = $memberObject->getMinistryMembers($ministryId);
       echo "<br><br><div class=\"w3-margin\">
      <div class=\"w3-container w3-blue-grey\">
          <h2 class=\"w3-center\">Assign Ministry Leader</h2>
        </div>
        <form action=\"../process.php\" method=\"post\" class=\"w3-container w3-card-4 w3-padding w3-card w3-padding-34\">
          <input type=\"hidden\" name=\"ministry_id\" value=\"$ministry->id\">
          <div class=\"w3-row-padding\">
            <label class=\"w3-bold\" for=\"id_name\">Ministry:</label><br>
            <input id=\"id_name\" type=\"text\" name=\"name\" value=\"$ministry->name\" class=\"w3-input w3-border w3-border-dark-grey\" required readonly><br>
            <label class=\"w3-bold\" for=\"id_leader\">Choose Leader:</label><br>
            <select id=\"id_leader\" name=\"member_id\" class=\"w3-select w3-border w3-border-dark-grey\" required>
              <option value=\"\">-------------</option>";
            foreach($ministryMembers as $member) {
              echo "<option value=\"$member->id\">".$member->f_name.' '.$member->m_name.' '.$member->l_name."</option> ";   
            }
             echo "<option value=\"0\">None</option>
               </select>
             <input type=\"hidden\" name=\"add_token\" value=\"assign_ministry_leader\">
            <button class=\"btn btn-primary w3-margin-top\">Assign</button>
          </div>
        </form>
      </div>";
    }
  }
  

  /**
  * provides interface for assigning ministry leader
  * @param
  * @var
  */
  public function assignZoneLeader($zoneId=null, $memberObject)
  {
    if($zoneId) {
        $zone = $memberObject->getzone($zoneId);
        $zoneMembers = $memberObject->getzoneMembers($zoneId);
       echo "<br><br><div class=\"w3-margin\">
      <div class=\"w3-container w3-blue-grey\">
          <h2 class=\"w3-center\">Assign zone Leader</h2>
        </div>
        <form action=\"../process.php\" method=\"post\" class=\"w3-container w3-card-4 w3-padding w3-card w3-padding-34\">
          <input type=\"hidden\" name=\"zone_id\" value=\"$zone->id\">
          <div class=\"w3-row-padding\">
            <label class=\"w3-bold\" for=\"id_name\">zone:</label><br>
            <input id=\"id_name\" type=\"text\" name=\"name\" value=\"$zone->name\" class=\"w3-input w3-border w3-border-dark-grey\" required readonly><br>
            <label class=\"w3-bold\" for=\"id_leader\">Choose Leader:</label><br>
            <select id=\"id_leader\" name=\"member_id\" class=\"w3-select w3-border w3-border-dark-grey\" required>
              <option value=\"\">-------------</option>";
            foreach($zoneMembers as $member) {
              echo "<option value=\"$member->id\">".$member->f_name.' '.$member->m_name.' '.$member->l_name."</option> ";   
            }
             echo "<option value=\"0\">None</option>
              </select>
             <input type=\"hidden\" name=\"add_token\" value=\"assign_zone_leader\">
            <button class=\"btn btn-primary w3-margin-top\">Assign</button>
          </div>
        </form>
      </div>";
    }
  }



  /**
  * provides interface for creating zones
  * @param
  * @var
  */
  public function newZoneUi($memberObject)
  {
    $members = $memberObject->get();
  	echo "<br><br><div class=\"w3-margin\">
		  <div class=\"w3-container w3-blue-grey\">
		    <h2 class=\"w3-center\">Create a New Zone</h2>
		  </div>
		  <form action=\"../process.php\" method=\"post\" class=\"w3-container w3-card-4 w3-padding w3-card w3-padding-34\">
		    <div class=\"w3-row-padding\">
		      <label class=\"w3-bold\" for=\"id_name\">Zone Name:</label><br>
		      <input id=\"id_name\" type=\"text\" name=\"zone_name\" class=\"w3-input w3-border w3-border-dark-grey\" required>

		      <label class=\"w3-bold\" for=\"id_leader\">Leader:</label><br>
		      <select id=\"id_leader\" name=\"member_id\" class=\"w3-select w3-border w3-border-dark-grey\" required>
              <option value=\"\">-------------</option>";
            foreach($members as $member) {
              echo "<option value=\"$member->id\">".$member->f_name.' '.$member->m_name.' '.$member->l_name."</option> ";   
            }
             echo "<option value=\"0\">None</option>
               </select>
          <input type=\"hidden\" name=\"add_token\" value=\"add_zone\">
		      <button class=\"btn btn-primary w3-margin-top\">Submit</button>
		    </div>
		  </form>
		</div>";
  }

  
  /**
  * provides interface for displaying existing ministries
  * @param
  * @var
  */
  public function ministriesUi()
  {
    $ministries = $this->db->get($this->ministries, array())->all();
    echo "<div class=\"w3-card-4 w3-margin w3-padding\">
            <h3 class=\"w3-blue-grey w3-padding w3-center\">Existing Ministries</h3>
            <ul class=\"w3-ul\">";
              foreach($ministries as $ministry) {
                 echo "<li class=\"w3-hover-blue-grey w3-hover-text-white\"><a style=\"text-decoration:none; display:block;\" href=\"index.php?page=ministry_members&ID=$ministry->id\">$ministry->name</a></li>";
              }
    echo  " </ul>
          </div>";
  }


  /**
  * provides interface for displaying existing zones
  * @param
  * @var
  */
  public function zonesUi()
  {
    $zones  = $this->db->get($this->zones, array())->all();
    echo "<div class=\"w3-card-4 w3-margin w3-padding\">
            <h3 class=\"w3-blue-grey w3-padding w3-center\">Available Zones</h3>
            <ul class=\"w3-ul\">";
              foreach($zones as $zone) {
                 echo "<li class=\"w3-hover-blue-grey w3-hover-text-white\"><a style=\"text-decoration:none; display:block;\" href=\"index.php?page=zone_members&ID=$zone->id\">$zone->name</a></li>";
              }
    echo  " </ul>
          </div>";
  }

  /**
  * provides interface for creating zones
  * @param
  * @var
  */
  public function loadDuplicateNames($firstName, $lastName, $memberObject)
  {
    $duplicates = $memberObject->getDuplicates($firstName,$lastName);
    echo "<div id=\"member_name\" class=\"w3-text-red\">".
              $firstName." ".$lastName." already exists.".
          "</div>
         <span style=\"cursor:pointer\" class=\"w3-button w3-text-blue w3-small\" onclick=\"$('#details').toggle()\">View Details</span>
         <div id=\"details\" style=\"display: none;margin-left: 20px;\">";
            echo "<div class=\"w3-container w3-card-4 w3-bold w3-padding-left w3-margin-bottom\">
                    <div class=\"w3-responsive\">
                      <table class=\"w3-table w3-bordered\">
                        <tr>
                          <th class=\"w3-center\">Member Code</th>
                          <th class=\"w3-center\">Name</th>
                          <th class=\"w3-center\">Phone</th>
                          <th class=\"w3-center\">Date of Birth</th>
                          <th class=\"w3-center\">Residence</th>
                        </tr>";
            foreach($duplicates as $duplicate)
            {
               echo    "<tr>
                          <td>".$duplicate->member_code."</td>".
                          "<td>".$duplicate->f_name." ".$duplicate->l_name."</td>".
                          "<td>".$duplicate->phone."</td>".
                          "<td>".$duplicate->date_of_birth."</td>".
                          "<td>".$duplicate->residence."</td>".
                        "</tr>";
            }                
  echo "     
                    </table>
                 </div>
              </div>
        </div>";
  }



  /**
  * provides interface for creating families
  * @param
  * @var
  */
  public function displayMemberDetails($memberId, $memberObject)
  {
    $member = $memberObject->get($memberId);

    echo "<div class=\"w3-row w3-padding\">
            <div class=\"w3-col l4 m6\">
               <div class=\"w3-display-container\">
                 <img src=\"../assets/images/members/$member->picture\" width=\"200\" height=\"200\">
                 <div class=\"w3-display-bottomleft w3-container\">
                   <h2 class=\"w3-text-white\">$member->f_name</h2>
                 </div>
               </div>
            </div>
            <div class=\"w3-col l4 m6\">
              
            </div>
            <div class=\"w3-col l4 m6\">
              
            </div>
          </div>";
  }

}