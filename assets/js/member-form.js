$(document).ready(function(){
    /*$(function(){
       $('#id_birth_date').datepicker();
    })*/
/*
      $('#hello').dialog({
          draggable:false,
          resizable:false,
          modal:true,
          show: 'slideDown',
          hide: 'slideUp'
      });*/
    $(document).change(function() {
      // toggle father field inputs visibility
      if($('#id_is_father_member').prop('checked')) {
          $('.father').addClass('w3-hide');
          $('.father :input').prop('disabled', true);
          $('#father_token_field').show();

      } else{
          $('.father').removeClass('w3-hide');
          $('.father :input').prop('disabled', false);
          $('#father_token_field').hide();

          if($('#id_is_father_deceased').prop('checked')) {
            $('#father_field').addClass('w3-hide');
            $('#father_field :input').prop('disabled', true);
            
            } else{
                $('#father_field').removeClass('w3-hide');
                $('#father_field :input').prop('disabled', false);
            }
      }
      
      // toggle mother field inputs visibility
      if($('#id_is_mother_member').prop('checked')) {
          $('.mother').addClass('w3-hide');
          $('.mother :input').prop('disabled', true);
          $('#mother_token_field').show();
      } else{
          $('.mother').removeClass('w3-hide');
          $('.mother :input').prop('disabled',false);
          $('#mother_token_field').hide();

          if($('#id_is_mother_deceased').prop('checked')) {
          $('#mother_field').addClass('w3-hide');
          $('#mother_field :input').prop('disabled', true);
          
        } else{
            $('#mother_field').removeClass('w3-hide');
            $('#mother_field :input').prop('disabled', false);  
        }
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
         $('#ministry').hide();
         $('#phone_required').hide();
         $('#picture_required').hide();
         //disable form controls
         $('#marriage :input').prop('disabled', true);
         $('#spouse :input').prop('disabled', true);
         $('#next_of_kin :input').prop('disabled', true);
         $('#baptism :input').prop('disabled', true);
         $('#ministry :input').prop('disabled', true);

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
              $('#ministry').show();
              //enable form controls
              $('#marriage :input').prop('disabled', false);
              $('#spouse :input').prop('disabled', false);
              $('#next_of_kin :input').prop('disabled', false);
              $('#baptism :input').prop('disabled', false);
              $('#ministry :input').prop('disabled', false);
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
      if((maritalStatus=='single')||(maritalStatus=='widowed')||(maritalStatus=='')) {
          $('#spouse').addClass('w3-hide');
          $('#spouse :input').prop('disabled', true);
      } else {
          $('#spouse').removeClass('w3-hide');
          $('#spouse :input').prop('disabled', false);

          if($('#is_spouse_member').prop('checked')) {
              $('#spouse_token_field').show();
              $('#spouse_field').addClass('w3-hide');
              $('#spouse_field :input').prop('disabled', true);

            } else{
                $('#spouse_token_field').hide();
                $('#spouse_field').removeClass('w3-hide');
                $('#spouse_field :input').prop('disabled', false);
                
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