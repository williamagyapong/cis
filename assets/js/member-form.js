$(document).ready(function(){
    $(function(){
       $('#id_birth_date').datepicker();
    })
/*
      $('#hello').dialog({
          draggable:false,
          resizable:false,
          modal:true,
          show: 'slideDown',
          hide: 'slideUp'
      });*/
    $(document).change(function() {
      // toggle some fields visibility for member type specifics
      if($('#is_child').prop('checked')) {
         $('#id_phone').removeAttr('required');
         $('#id_picture').removeAttr('required');
         $('#other_phone').hide();
         $('#marriage').hide();
         $('#next_of_kin').hide();
         $('#baptism').hide();
         $('#ministry').hide();
         $('#phone_required').hide();
         $('#picture_required').hide();
      } else{
              $('#id_phone').attr('required','');
              $('#id_picture').attr('required','');
              $('#other_phone').show();
              $('#phone_required').show();
              $('#picture_required').show();
              $('#marriage').show();
              $('#next_of_kin').show();
              $('#baptism').show();
              $('#ministry').show();
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