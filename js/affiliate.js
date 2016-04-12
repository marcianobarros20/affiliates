 
  $(document).ready(function() {
      /*
       *  Simple image gallery. Uses default settings
       */

      

      function initialize() {

    var country = "United States"

    var myOptions = {
        zoom: 5,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    
    var map = new google.maps.Map(document.getElementById("map_canvas"),myOptions);

    var geocoder = new google.maps.Geocoder();
    geocoder.geocode( { 'address': country }, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            map.setCenter(results[0].geometry.location);
        } else {
            alert("Could not find location: " + location);
        }
    });

}

    $('.fancybox').fancybox();

    });
 function change_status(param, param1)
    {
        if (param=="Active")
        {
         // var conf=confirm("You sure you want to Approve this user!");
        
           $("#assign_reff_"+param1).toggle();

           $('#assign_code_btn_'+param1).click(function(){

             refferalcode=$.trim($('#refferal_code_'+param1).val());
              
                if(refferalcode)
                {
                  
                  var status=1;
                  var res= $.ajax({
                  type : 'post',
                  url : 'Ajax/check_refferalcode',
                  data : 'refferalcode='+refferalcode+'& uid='+param1+'& status='+status,
                  async : false,
                  success : function(msg)
                   {
                       alert(msg);
                        window.location.reload();

                   }
                  });
                }
                else
                {
                   alert("Assign Refferal Code");
                }
             });
        

        }
        else if(param=="Delete")
        { 
            var conf=confirm("You sure you want to delete this!");
            if(conf)
            {
                var status=2;
                var res= $.ajax({
                  type : 'post',
                  url : 'Ajax/delete_users',
                  data : 'uid='+param1+'& status='+status,
                  async : false,
                  success : function(msg)
                   {
                       window.location.reload();
                   }
                });
            }
        }
        else if(param=="Approve")
        { 
            var conf=confirm("You sure you want to Approve !");
            if(conf)
            {
                var status=0;
                var res= $.ajax({
                  type : 'post',
                  url : 'index.php/Ajax/delete_users',
                  data : 'uid='+param1+'& status='+status,
                  async : false,
                  success : function(msg)
                   {
                       window.location.reload();
                   }
                });
            }
        }
        else
        {      
            var conf=confirm("You sure you want to Reject this!");
            if(conf)
            {
                var status=3;
                var res= $.ajax({
                  type : 'post',
                  url : 'Ajax/change_status',
                  data : 'uid='+param1+'& status='+status,
                  async : false,
                  success : function(msg)
                  {
                     window.location.reload();
                  }
               });
            }
        }
    }

function show_child_tier3(uid) {
 // alert(uid);

                  var res= $.ajax({
                  type : 'post',
                  url : 'Ajax/show_child_tier3',
                  data : 'uid='+uid,
                  async : false,
                  success : function(msg)
                   {
                       if(msg)
                       {
                        $('#child_show_tier3'+uid).html(msg);
                       }
                       
                   }
                  });

}

function show_child_tier2(uid)
{
  

                  var res= $.ajax({
                  type : 'post',
                  url : 'Ajax/show_child_tier2',
                  data : 'uid='+uid,
                  async : false,
                  success : function(msg)
                   {

                    //alert(msg);
                    if(msg)
                       {
                        $('#child_show_tier2'+uid).html(msg);
                       }
                       
                     
                   }
                  });
       }



function show_child_tier1(uid)
{
  

                  var res= $.ajax({
                  type : 'post',
                  url : 'Ajax/show_child_tier1',
                  data : 'uid='+uid,
                  async : false,
                  success : function(msg)
                   {

                    //alert(msg);
                    if(msg)
                       {
                        $('#child_show_tier1'+uid).html(msg);
                       }
                       
                     
                   }
                  });
       }

function show_child_tier0(uid)
{
 
                  var res= $.ajax({
                  type : 'post',
                  url : 'Ajax/show_child_tier0',
                  data : 'uid='+uid,
                  async : false,
                  success : function(msg)
                   {

                    //alert(msg);
                    if(msg)
                       {
                        $('#child_show_tier0'+uid).html(msg);
                       }
                       
                     
                   }
                  });
       }



       function change_status_blog(param,id)
       {
         var conf=confirm("You sure you want to Change the status!");
            if(conf)
            {
              
              if(param=="Inactive")
              {
                var status=1;
              }
              else
              {
                var status=0;
              }
                var res= $.ajax({
                  type : 'post',
                  url : 'Ajax/blog_status',
                  data : 'b_id='+id+'& status='+status,
                  async : false,
                  success : function(msg)
                  {
                    //alert(msg)
                    if(msg)
                    {
                     window.location.reload();
                    }
                  }
               });
            }
       }


       function readFn(param,blog_id)
       {
        
        if(param=='less')
        {
        $('#main_'+blog_id).hide();
        $('#full_'+blog_id).show();
        }
        else
        {
        $('#main_'+blog_id).show();
        $('#full_'+blog_id).hide();
        }

       }

  function show_assign_div(uid)
  {
    //alert(uid);
    $('#Assign_div_'+uid).toggle();

    $('#assign_code_button_'+uid).click(function(){

             refferalcode=$.trim($('#assign_code_'+uid).val());
              
                if(refferalcode)
                {
                  
                  
                  var res= $.ajax({
                  type : 'post',
                  url : 'Ajax/assign_parent',
                  data : 'refferalcode='+refferalcode+'& uid='+uid,
                  async : false,
                  success : function(msg)
                   {
                       alert(msg);
                        window.location.reload();

                   }
                  });
                }
                else
                {
                   alert("Assign Refferal Code");
                }
             });
        


  }


  function show_tier3(uid)
  {
          //alert(uid);
          $('#show_lower_affiliates').toggle();

                  
                  /*var res= $.ajax({
                  type : 'post',
                  url : 'index.php/Ajax/user_show_tier3',
                  data : 'uid='+uid,
                  async : false,
                  success : function(msg)
                   {
                       //alert(msg);
                       $('#show_lower_affiliates_'+uid).html(msg);

                   }
                  });*/
               

  } 
  

$(document).delegate('#list a','click',function(){
 //alert($(this).data("id"));
 var parent=$(this).data("id");
if($('.par_'+parent).hasClass("display_block"))
{
$('.par_'+parent).removeClass('display_block');
$('.par_'+parent).addClass('new_display2');
$('.param_'+parent).html(' + ');
}
else if($('.par_'+parent).hasClass("new_display2"))
{
  $('.par_'+parent).removeClass('new_display2');
$('.par_'+parent).addClass('display_block');

$('.param_'+parent).html(' - ');
}

 
 
    
});


function description(uid)
{
   var res= $.ajax({
                  type : 'post',
                  url : 'Ajax/Fngetdetails',
                  data : 'uid='+uid,
                  async : false,
                  success : function(msg)
                   {
                       //alert(msg);
                       $('#chkline').html(msg);

                   }
                  });
}



