$(document).ready(function(){
$('#edit_category').validate();
$('#add_category').validate();
$('#add_blog').validate();
 $( "#change_password" ).validate({
  rules: {
    old_password: "required",
    new_password:"required",

    conf_password: {

      equalTo: "#new_password"
    }
  }
});
 


 	$( "#edit_password_button" ).click(function() {
     	$("#edit_password_div").toggle();
 	});

    $( "#edit_profile_picture_button" ).click(function() {
     	$("#edit_profile_picture_div").toggle();
 	});
 	

});

   function old_password_chk()
{
    var old_pass=$('#old_password').val();
    var res= $.ajax({
    type : 'post',

    url : 'Ajax/Fnoldpasswordchk',

    data : 'o_pass='+old_pass,
    async : false,
    success : function(msg){ 
    if(msg==1)
      {
           $('#old_password').val('');
           $('#msg_pass').html('<font color="red">Old Password does not match</font>');
        }
        else
        {
          $('#msg_pass').html('<font color="green">Old password Match</font>');
        }
   }
    }); 
  
}
