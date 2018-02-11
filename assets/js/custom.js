


/*=============================================================
    Authour URI: www.binarycart.com
    License: Commons Attribution 3.0

    http://creativecommons.org/licenses/by/3.0/

    100% To use For Personal And Commercial Use.
    IN EXCHANGE JUST GIVE US CREDITS AND TELL YOUR FRIENDS ABOUT US
   
    ========================================================  */


(function ($) {
    "use strict";
    var mainApp = {

        main_fun: function () {
            /*====================================
            METIS MENU 
            ======================================*/
            $('#main-menu').metisMenu();

            /*====================================
              LOAD APPROPRIATE MENU BAR
           ======================================*/
            $(window).bind("load resize", function () {
                if ($(this).width() < 768) {
                    $('div.sidebar-collapse').addClass('collapse')
                } else {
                    $('div.sidebar-collapse').removeClass('collapse')
                }
            });
     
        },

        initialization: function () {
            mainApp.main_fun();

        }

    }
    // Initializing ///

    $(document).ready(function () {
        mainApp.main_fun();
    });


    

}(jQuery));

//my custom js
//make form input accept only number values
 jQuery('.numberonly').keyup(function () { 
    if(this.value != this.value.replace(/[^0-9\.]/g,'')) {
      this.value = this.value.replace(/[^0-9\.]/g,'')
    }
    //this.value = this.value.replace(/[^0-9\.]/g,'');
});
// animate user image
 $('#user_image').mouseover(function() {
    $(this).css({"max-width":"150px", "max-height":"150px"})
 }).mouseout(function(){
    $(this).css({"max-width":"100px", "max-height":"100px"})
 })
 
    function showModal(id, token='', data='')
    {
        if(token!='' && data!='') {
            //perfor ajax request
            $.get('../controller.php', {token:token, data:data}, function(response) {
                 $('#'+id).show();
                 $('#'+id+' .content').html(response);
            })
        } else {
            // only display modal
            $('#'+id).show();
        }
    }


    function render(data, dataTarget){
        $(dataTarget).empty().html(data)
    }


    function popUpModal(url='../controller.php', token, id='') {
        // show modal
        $('#cis_modal0').show();
        $.get(url, {token:token, unique_id:id}, function(data){
            $('#cis_modal0 .w3-modal-content').animate({height: "90%"},500,function(){
           $('#cis_modal0 .w3-modal-content').animate({width: "40%"},500,function(){
             render(data, '#cis_modal0 .content');
        });
      });
        })
    
    }


    function popUpModal2(url='../controller.php', token, id='') {
        // show modal
        $('#cis_modal1').show();
        $.get(url, {token:token, unique_id:id}, function(data){
            $('#cis_modal1 .w3-modal-content').animate({height: "90%"},500,function(){
           $('#cis_modal1 .w3-modal-content').animate({width: "70%"},500,function(){
             render(data, '#cis_modal1 .content');
        });
      });
        })
    
    }

    function popUpLargeModal(url='../controller.php', token, id='') {
        // show modal
        $('#edit_modal').show();
        $.get(url, {token:token, unique_id:id}, function(data){
            $('#edit_modal .w3-modal-content').animate({height: "100%"},500,function(){
           $('#edit_modal .w3-modal-content').animate({width: "80%"},500,function(){
             render(data, '#edit_modal .content');
        });
      });
        })
    
    }

    function popDownModal(dataTarget='#cis_modal0 .content',modalId='cis_modal0'){
     $(dataTarget).empty();
     $('#'+modalId+' .w3-modal-content').animate({width: "20%"},250,function(){
        $('#'+modalId+' .w3-modal-content').animate({height: "20%"},250,function(){
            $('#'+modalId).hide();
        });
    });
}


// for cropping images
    function showCropPanel(url='../controller.php', token, image) {
        // show modal
        $('#crop_modal0').show();
        $.get(url, {token:token}, function(data){
            $('#crop_modal0 .w3-modal-content').animate({height: "100%"},500,function(){
           $('#crop_modal0 .w3-modal-content').animate({width: "45%"},500,function(){
             $('#crop_modal0 img').attr('src', '../assets/images/members/'+image);
        });
      });
        })
    
    }

    function dismissCropPanel(dataTarget='#crop_modal0 .content'){
     //$(dataTarget).detach();
     $('#crop_modal0 img').attr('src', '')
     $('#crop_modal0 .w3-modal-content').animate({width: "20%"},250,function(){
        $('#crop_modal0 .w3-modal-content').animate({height: "20%"},250,function(){
            $('#crop_modal0').hide();
        });
    });
}


    function saveCropped() {
     //var formData = $('#member_form').serialize();
     var x = $('#x').val();
     var y = $('#y').val();
     var h = $('#h').val();
     var w = $('#w').val();
     var data = {token:'save_cropped', x:x, y:y, h:h, w:w};
     $.ajax({
            type: 'post',
            url:'../controller.php',
            data: data,
            dataType:'json',
            encode:true
         })
         .done(function(response) {
            var img = '<img src=\"../assets/images/members/'+response.image+'\" width=\"200\" height=\"200\" alt=\"member picture\" class=\"w3-border w3-border-dark-grey\">';
            $('#image_preview').html(img);
            $('input[name="saved_picture"]').val(response.image);
            
         })
         .fail(function(){
            console.log('failed to save cropped image');
         })
}


   function checkCoords(){
      if (parseInt($('#w').val())) {

         saveCropped();//save the just cropped image
      } else{
         //preview original image
         $.ajax({
            type: 'post',
            url:'../controller.php',
            data: {token:'load_original_image'},
            dataType:'json',
            encode:true
         })
         .done(function(response) {
            var img = '<img src=\"../assets/images/members/'+response.image+'\" width=\"200\" height=\"200\" alt=\"member picture\">';
            $('#image_preview').html(img);
            $('input[name="saved_picture"]').val(response.image);
        
         })
         .fail(function(){
            console.log('failed load original image');
         })
            
      }
    }

   function effectSettingsChanges(formId, btnId) {
    $('#'+formId).on('submit', function(e) {
        e.preventDefault();
        $(this).addClass('w3-dark-grey');
        $('#'+btnId).hide();
        var formData = $(this).serialize();
        console.log(formData)
        $.post("../controller.php", formData, function(response) {
            setInterval(function(){
               $('#'+formId).removeClass('w3-dark-grey');
               $('#'+btnId).show();
               $('#'+formId+' :input').val('');
               window.location = "index.php?page=system_settings";
            },1500)
        })
         
     })
   }

   function allowRegistration()
   {
     console.log('function called')
     var fName = $('#member_form input[name="first_name"]').val();
        var lName = $('#member_form input[name="last_name"]').val();
        var data = {add_token:'duplicate_exist', first_name:fName, last_name:lName};
        var serverValue =4;
        $.post('../process.php', data , function(response){
            
            if(response==1) {
                console.log(response);
                $('#duplicate_details').load("../process.php?f_name="+fName+"&l_name="+lName+"&token=duplicates");
                showModal('duplicate_names')
                $('#add_member_yes').click(function(){
                    console.log('clicked yes')
                    $('#member_form').trigger('submit'); //submit form
                })
                $('#add_member_no').click(function(){
                    console.log('clicked no')
                    return false;//stop form submission
                })
                $('#add_member_cancel').click(function(){
                    console.log('clicked cancel')
                    return false;//stop form submission
                })
            } else {
                $('#member_form').trigger('submit');//submit form
            }
            
        })
        
   }


   function loadPage(url='',token='') {
    $('#cis_modal1').show();
    $('#cis_modal1 .content').load('members/w3templete-profile.html')
   }