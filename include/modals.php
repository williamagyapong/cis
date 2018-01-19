<div id="cis_modal0" class="w3-modal" style="padding-top:50px">
  <div class="page-background w3-modal-content w3-white w3-border w3-border-dark-grey w3-text-grey" style="background: #000; height:20%;width:20%;overflow:auto">
  <div class="w3-container content">
    <div class="w3-display-middle">
       <img src="../assets/images/system/ajax-loader.gif" alt="Loading..." class="w3-display-middle">

    </div>
       <!-- load content on request -->
    </div>
    <footer class="w3-container">
       <button type="button" class="w3-button w3-border w3-display-bottomright w3-margin w3-hover-blue-grey" name="button" onclick="popDownModal()">close</button>
    </footer>
  </div>
</div>

<div id="cis_modal1" class="w3-modal" style="padding-top:50px">
  <div class="page-background w3-modal-content w3-white w3-border w3-border-dark-grey w3-text-grey" style="background: #000; height:20%;width:20%;overflow:auto">
  <div class="w3-container content">
    <span id="p-close-btn" onclick="hideElement('current-modal')" class="fa fa-times w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close"></span>
    <div class="w3-display-middle w3-dark-grey">

       <img src="../assets/images/system/ajax-loader.gif" alt="Loading....." class="w3-display-middle"><br>Loading.....
       

    </div>
       <!-- load content on request -->
    </div>
    <footer class="w3-container">
       <button type="button" class="w3-button w3-border w3-display-bottomright w3-margin w3-hover-blue-grey" name="button" onclick="popDownModal('#cis_modal1 .content', 'cis_modal1')">close</button>
    </footer>
  </div>
</div>


<div id="edit_modal" class="w3-modal" style="padding-top:50px">
  <div class="page-background w3-modal-content w3-white w3-border w3-border-dark-grey w3-text-grey" style="background: #000; height:100%;width:80%;overflow:auto">
  <div class="w3-container content">
    <span id="p-close-btn" onclick="hideElement('current-modal')" class="fa fa-times w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close"></span>
    <div class="w3-display-middle w3-dark-grey">

       <img src="../assets/images/system/ajax-loader.gif" alt="Loading....." class="w3-display-middle"><br>Loading.....
       

    </div>
       <!-- load content on request -->
    </div>
    <footer class="w3-container">
       <button type="button" class="w3-button w3-border w3-display-bottomright w3-margin w3-hover-blue-grey" name="button" onclick="popDownModal('#edit_modal .content', 'edit_modal')">close</button>
    </footer>
  </div>
</div>

              <!-- The Modal 0 -->
<div id="cis_modal" class="w3-modal" style="padding-top:50px">
  <div class="w3-modal-content w3-white w3-border w3-border-dark-grey w3-text-grey" style="height:90%;width:70%;overflow:auto">
    <div class="w3-container content">
        <div class="w3-row w3-padding">
          <div class="w3-col 14 md6">
            <div class="w3-container" id="main_content">
               <img src="../assets/images/system/ajax-loader.gif" alt="Loading..." class="w3-display-middle">
            </div>
          </div>
        </div>
    </div>
    <footer class="w3-container">
       <button type="button" class="w3-button w3-border w3-display-bottomright w3-margin w3-hover-blue-grey" name="button" onclick="popDownModal()">close</button>
    </footer>
  </div>
</div>
      <!-- duplicate exist modal -->
   <div id="duplicate_names" class="w3-modal w3-round">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom w3-round" style="max-width:800px">
      <header class="w3-container w3-blue"> 
        <h3 style="display: inline;">Duplicate Names</h3>
      </header>

      <div class="w3-container w3-large w3-bold w3-padding-left">
        
         <p class="w3-padding w3-left"><img src="../assets/images/system/warning.png" width="50" height="40"></p>
        <p id="duplicate_details" class="w3-margin-top ">
          
        </p>
      </div>
      <footer class="w3-container w3-light-grey">
        <div>
          Do you want to register this member anyway?
        </div>
       <div class="w3-right">
        <button id="add_member_yes" class="w3-button" onclick="$('#duplicate_names').hide();$('#details').css('display','none')"><b>YES</b></button>
        <button id="add_member_no" class="w3-button" onclick="$('#duplicate_names').hide();$('#details').css('display','none')"><b>NO</b></button>
        <button id="add_member_cancel" class="w3-button" onclick="$('#duplicate_names').hide();$('#details').css('display','none')"><b>Cancel</b></button>
       </div>
      </footer>
    </div>
   </div>

<!-- <div class="w3-margin">
  <div class="w3-container w3-blue">
    <h2 class="w3-center">Add a New Ministry</h2>
  </div>
  <form action="../controller.php" method="post" class="w3-container w3-card-4 w3-padding w3-card w3-padding-34">
    <div class="w3-row-padding">
      <label class="w3-bold" for="id_name">Name:</label><br>
      <input id="id_name" type="text" name="name" class="w3-input w3-border w3-border-dark-grey" required>

      <label class="w3-bold" for="id_leader">Leader:</label><br>
      <input id="id_leader" type="text" name="leader" class="w3-input w3-border w3-border-dark-grey" required>
      <button class="btn btn-primary w3-margin-top">Submit</button>
    </div>
  </form>
</div> -->