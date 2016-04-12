  
  $(document).ready(function() {
       
   $( "#reg_form" ).validate({
  rules: {
    password: "required",
    password_confirm: {
      equalTo: "#password"
    }
  }
});

   $( "#form-login" ).validate();

/* country onchange state will show */
      $( "#country" ).change(function() {

      var country_id=$(this).val();
       if(country_id!='')
    {
      var res= $.ajax({
    type : 'post',
    url : 'Ajax/Fngetstates',
    data : 'country_id='+country_id,
    async : false,
    success : function(msg){ 
          $('#state').html(msg);
        }
    }); 
  
    
    }
        });

      /* end country change */




      /* State onchange city will show */
      $( "#state" ).change(function() {

      var state_id=$(this).val();
       if(state_id!='')
    {
      var res= $.ajax({
    type : 'post',
    url : 'Ajax/Fngetcity',
    data : 'state_id='+state_id,
    async : false,
    success : function(msg){ 
          $('#city').html(msg);
        }
    }); 
  
    
    }
        });

      /* end state change */
/*
 google.maps.event.addDomListener(window, 'load', initialize);
function initialize() {
var autocomplete = new google.maps.places.Autocomplete(document.getElementById('address'));
google.maps.event.addListener(autocomplete, 'place_changed', function () {
// Get the place details from the autocomplete object.
var place = autocomplete.getPlace();
var location = "<b>Address</b>: " + place.formatted_address + "<br/>";
location += "<b>Latitude</b>: " + place.geometry.location.A + "<br/>";
location += "<b>Longitude</b>: " + place.geometry.location.F;
alert(location);
});
}*/


});

 google.maps.event.addDomListener(window, 'load', function () {
            var input = document.getElementById('address');
var options = {
   
   componentRestrictions: {country: 'US'}//US only
};
            var places = new google.maps.places.Autocomplete(input,options);
            google.maps.event.addListener(places, 'place_changed', function () {
                var place = places.getPlace();
                var address = place.formatted_address;
                var latitude = place.geometry.location.lat();
                var longitude = place.geometry.location.lng();
                var mesg = "Address: " + address;
                $('#lat').val(latitude);
                $('#long').val(longitude);
            });
        });

 function validate()
   {
    var err=0;
    var email=$('#email').val();
    var username=$('#username').val();

    
    if(email!='')
    {
      var res= $.ajax({
    type : 'post',
    url : 'Ajax/EmailExists',
    data : 'email='+email,
    async : false,
    success : function(msg){ 
    if(msg==1)
           {

            err=1;
            $('#err_em').html('Email already exists');
            return false;
           }
           else
           {
            err=0;
           }
        }
    }); 
  
    
    }

    if(username!='')
    {

      var res= $.ajax({
    type : 'post',
    url : 'Ajax/UserExists',
    data : 'username='+username,
    async : false,
    success : function(msg){ 
    if(msg==1)
           {
            
            err=1;
            $('#err_us').html('Username already exists');
            return false;
           }
           else
           {
            err=0;
           }
        }
    }); 
  
    
    }
if(err==1)
    {
      return false;
    }
else
{
  $('#err_em').html('');
  $('#err_us').html('');
}
   

   }


   
