$(function(){
  //for user Registraion
  $("#regi").click(function(){
    var username = $("#username").val();
    var email = $("#email").val();
    var password = $("#password").val();
    var dataString = 'username='+username+'&email='+email+'&password='+password;
   $.ajax({    
    type : 'POST',
    url  : 'registration.php',
    data : dataString,
   success :  function(data){
    $("#state").html(data);
   }
    });
   return false;
  });
});