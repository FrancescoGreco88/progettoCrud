$(document).ready(function(){

    $('.check_email').keyup(function(e){
        
      var mail =  $('.check_email').val();
            
      $.ajax({
          type:"POST",
          url:"code.php",
          data:{
              "checksub":1,
              "email_id":mail,
          },
      
          success: function (response){
              $('.mail_error').text(response);

          }
      });
    });

});