$(document).ready(function(){

     // toggle some fields visibility for member type specifics
        // mainly necessary when user selects add new child from dasboard page
      if($('#is_child').prop('checked')) {
         $('#id_phone').removeAttr('required');
         $('#id_picture').removeAttr('required');
         $('#other_phone').hide();
         $('#marriage').hide();
         $('#spouse').addClass('w3-hide');
         $('#next_of_kin').hide();
         $('#baptism').hide();
         $('#phone_required').hide();
         $('#picture_required').hide();
         //disable form controls
         $('#marriage :input').prop('disabled', true);
         $('#spouse :input').prop('disabled', true);
         $('#next_of_kin :input').prop('disabled', true);
         $('#baptism :input').prop('disabled', true);

      } else{
              $('#id_phone').attr('required','');
              $('#id_picture').attr('required','');
              $('#other_phone').show();
              $('#phone_required').show();
              $('#picture_required').show();
              $('#marriage').show();
              $('#spouse').removeClass('w3-hide');
              $('#next_of_kin').show();
              $('#baptism').show();
              //enable form controls
              $('#marriage :input').prop('disabled', false);
              $('#spouse :input').prop('disabled', false);
              $('#next_of_kin :input').prop('disabled', false);
              $('#baptism :input').prop('disabled', false);
      }
    
    $(document).change(function() {
      if(!$('#id_is_father_deceased').prop('checked')) {
           $('#father_contact_field').removeClass('w3-hide');
           $('#father_contact_field :input').prop('disabled', false);
           $('#father_name_field').addClass("w3-col m6 l6");
              
      } else{
          $('#father_contact_field').addClass('w3-hide');
          $('#father_contact_field :input').prop('disabled', true);
          $('#father_name_field').removeClass("w3-col m6 l6");
      }
      
      // toggle mother field inputs visibility
      if(!$('#id_is_mother_deceased').prop('checked')) {
           $('#mother_contact_field').removeClass('w3-hide');
           $('#mother_contact_field :input').prop('disabled', false);
           $('#mother_name_field').addClass("w3-col m6 l6");
          
              
      } else{
          $('#mother_contact_field').addClass('w3-hide');
          $('#mother_contact_field :input').prop('disabled', true);
          $('#mother_name_field').removeClass("w3-col m6 l6");
          
      }

      
      // toggle some fields visibility for member type specifics
      if($('#is_child').prop('checked')) {
         $('#id_phone').removeAttr('required');
         $('#id_picture').removeAttr('required');
         $('#other_phone').hide();
         $('#marriage').hide();
         $('#spouse').addClass('w3-hide');
         $('#next_of_kin').hide();
         $('#baptism').hide();
         $('#phone_required').hide();
         $('#picture_required').hide();
         //disable form controls
         $('#marriage :input').prop('disabled', true);
         $('#spouse :input').prop('disabled', true);
         $('#next_of_kin :input').prop('disabled', true);
         $('#baptism :input').prop('disabled', true);

      } else{
              $('#id_phone').attr('required','');
              $('#id_picture').attr('required','');
              $('#other_phone').show();
              $('#phone_required').show();
              $('#picture_required').show();
              $('#marriage').show();
              $('#spouse').removeClass('w3-hide');
              $('#next_of_kin').show();
              $('#baptism').show();
              //enable form controls
              $('#marriage :input').prop('disabled', false);
              $('#spouse :input').prop('disabled', false);
              $('#next_of_kin :input').prop('disabled', false);
              $('#baptism :input').prop('disabled', false);
      }
      // toggle baptism field inputs visibility
      if($('#id_is_baptised').prop('checked')) {
          $('.baptism').removeClass('w3-hide');
          $('.baptism :input').prop('disabled', false)
      } else {
          $('.baptism').addClass('w3-hide');
          $('.baptism :input').prop('disabled', true)
      }
      
      // make specify other Congregation required
      var whereBaptised = $('#id_where_baptised').val();
      if(whereBaptised=='other church') {
         $('#id_other_baptised').prop('disabled', false)
         $('#id_contact_person').prop('disabled', false) 
         $('#contact_person_phone').prop('disabled', false)
      } else {
              $('#id_other_baptised').prop('disabled', true)
              $('#id_contact_person').prop('disabled', true)
              $('#contact_person_phone').prop('disabled', true) 
      }

      // toggle spouse inputs visibility
      var maritalStatus = $('#marital_status').val();
      if((maritalStatus=='single')||(maritalStatus=='')) {
          $('#spouse').addClass('w3-hide');
          $('#spouse :input').prop('disabled', true);
      } else {
          //
          if(!$('#is_child').prop('checked')){
              $('#spouse').removeClass('w3-hide');
              $('#spouse :input').prop('disabled', false);
          }
          
          //control contact field visibility
          if(maritalStatus=='widowed') {
              $('#spouse_contact_field').addClass('w3-hide');
              $('#spouse_contact_field :input').prop('disabled', true);
              $('#spouse_name_field').removeClass("w3-col m6 l6");
          } else{
                  $('#spouse_contact_field').removeClass('w3-hide');
                  $('#spouse_contact_field :input').prop('disabled', false);
                  $('#spouse_name_field').addClass("w3-col m6 l6");
          }

      }

  })

  // member picture loading
      var picture = $('input[name="picture"]');
      picture.change(function(){

          if(picture.val() !='') {
           var formData = new FormData($('#member_form')[0]);
           $.ajax({
              type: 'post',
              url:'../controller.php',
              data: formData,
              dataType:'json',
              encode:true,
              cache: false,
              contentType: false,
              processData: false
           })
           .done(function(response) {
              showCropPanel('../controller.php','crop_image', response.image);
  
           })
           .fail(function(){
              console.log('failed to upload picture')
           })
      }

          // crop picture
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
      })
            
    })