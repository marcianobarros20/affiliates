 
  $(document).ready(function() {
      /*
       *  Simple image gallery. Uses default settings
       */

$('#course_id').change(function(){

$('#show_class_div').submit();
});


$('#quize_course_id').change(function(){
if($(this).val()!='')
{
$('#question_div').show();
$('#select_option_div').show();

}
else
{
  $('#question_div').hide();
  $('#select_option_div').hide();

}
});




$('#answer_option').change(function(){
  var ans_opt=$('#answer_option').val();
if($(this).val()!='')
{
$('#insert_answer_div').show();
$('#correct_answer_div').show();
$('#subit_div').show();
  var result="";
  //alert(ans_opt);
  for(i=0; i<=ans_opt-1; i++)
  {

    var serial=i+1;
    
    result+=serial+'.&nbsp;'+'<input type="text" placeholder="Enter Option" name="option_value[]" style="width: 120px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
    
  }
  $('#print').html(result);
  $('#correct-ans').html('<select name="cor_ans" id="corr-ans"><option value="">--Select--</option></select>');
}
else
{
  $('#insert_answer_div').hide();
  $('#correct_answer_div').hide();
  $('#subit_div').hide();
  

}
});

$(document).delegate("input[type=text][name='option_value[]']", 'keyup', function(){
           //option = '';
           option ='<option value="">--Select--</option>';
           $("input[type=text][name='option_value[]']").each(function(){
            var str=$(this).val();
           str=str.replace(/</g,'&lt;');
           str=str.replace(/>/g,'&gt;');
               if($(this).val() != ''){
                  //option +='<option>--Select--</option>'
                   option += '<option value="' + str + '">'+str+'</option>';
               }
           });

           $('#corr-ans').html(option);
       });







 $('#course_media').change(function(){

if($(this).val()!='')
 {
    $('.media').addClass('required');
  }
  else
  {
    $('.media').removeClass('required');
  }
 });
         
   $('#button_showdiv').click(function(){

      $('#add_course_div').toggle();

    });
      
    $('#add_course').validate();
    $('#add_class').validate();
    $('#add_popup').validate();
    $('#add_quize').validate();
    //$('#quize_ques').validate();
    //$('#print').validate();
    //$('#correct-ans').validate();

      

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
  






function change_course_status(action,courseid)
{
   if(action=="Not Available")
   {
       var conf=confirm("You sure you want to make it Not Available !");
            if(conf)
            {
              var status=1;
              var res= $.ajax({
                  type : 'post',
                  url : 'Ajax/change_course_status',
                  data : 'co_id='+courseid+'& status='+status,
                  async : false,
                  success : function(msg)
                   {

                       if(msg)
                       {
                        window.location.reload();
                      }

                   }
                  });

            }
    }
    else
    {
       var conf=confirm("You sure you want to make it Available !");
            if(conf)
            {
              var status=0;
              var res= $.ajax({
                  type : 'post',
                  url : 'Ajax/change_course_status',
                  data : 'co_id='+courseid+'& status='+status,
                  async : false,
                  success : function(msg)
                   {

                       if(msg)
                       {
                        window.location.reload();
                      }

                   }
                  });

            }

    }
}

/*function delete_course(courseid)
{
   var conf=confirm("You sure you want to Delete !");
            if(conf)
            {
              
              var res= $.ajax({
                  type : 'post',
                  url : 'Ajax/delete_course',
                  data : 'co_id='+courseid,
                  async : false,
                  success : function(msg)
                   {

                       if(msg)
                       {
                        window.location.reload();
                       }

                   }
                  });

            }  

}*/
function view_course(courseid)
{
  //alert(courseid);
    var res= $.ajax({
        type : 'post',
        url : 'admin/courses/view_course',
        data : 'co_id='+courseid,
        async : false,
          success : function(msg)
                   {
                       alert(msg);
                       
                   }
                  });

}
         

function delete_class(courseid)
  {
    var conf=confirm("You sure you want to Delete !");
            if(conf)
            {
              
              var res= $.ajax({
                  type : 'post',
                  url : 'Ajax/delete_class',
                  data : 'co_id='+courseid,
                  async : false,
                  success : function(msg)
                   {

                       if(msg)
                       {
                        window.location.reload();
                       }

                   }
                  });

            } 
  }

  function change_class_status(action,courseid)
{
   if(action=="Not Available")
   {
       var conf=confirm("You sure you want to make it Not Available !");
            if(conf)
            {
              var status=1;
              var res= $.ajax({
                  type : 'post',
                  url : 'Ajax/change_class_status',
                  data : 'cl_id='+courseid+'& status='+status,
                  async : false,
                  success : function(msg)
                   {

                       if(msg)
                       {
                        window.location.reload();
                      }

                   }
                  });

            }
    }
    else
    {
       var conf=confirm("You sure you want to make it Available !");
            if(conf)
            {
              var status=0;
              var res= $.ajax({
                  type : 'post',
                  url : 'Ajax/change_class_status',
                  data : 'cl_id='+courseid+'& status='+status,
                  async : false,
                  success : function(msg)
                   {

                       if(msg)
                       {
                        window.location.reload();
                      }

                   }
                  });

            }

    }
}

function delete_image(id)
{
  var conf=confirm("You sure you want to delete this image !");
            if(conf)
            {
              var status=0;
              var res= $.ajax({
                  type : 'post',
                  url : 'Ajax/delete_image',
                  data : 'tr_id='+id,
                  async : false,
                  success : function(msg)
                   {

                       if(msg==1)
                       {

                        $('#img_'+id).hide();
                         $('#msg').html('<font color="green">image deleted successfully</font>');
                       }
                       else
                       {
                         $('#msg').html('<font color="red">error occured while delete</font>');
                       }

                   }
                  });

            }

}

function delete_file(id)
{
  
var conf=confirm("You sure you want to delete this file !");
            if(conf)
            {
              var status=0;
              var res= $.ajax({
                  type : 'post',
                  url : 'Ajax/delete_file',
                  data : 'tr_id='+id,
                  async : false,
                  success : function(msg)
                   {

                       if(msg==1)
                       {

                        $('#file_'+id).hide();
                         $('#msg').html('<font color="green">file deleted successfully</font>');
                       }
                       else
                       {
                         $('#msg').html('<font color="red">error occured while delete</font>');
                       }

                   }
                  });

            }

}

function delete_media(id)
{
var conf=confirm("You sure you want to delete this media !");
            if(conf)
            {
              var status=0;
              var res= $.ajax({
                  type : 'post',
                  url : 'Ajax/delete_media',
                  data : 'tr_id='+id,
                  async : false,
                  success : function(msg)
                   {

                       if(msg==1)
                       {

                        $('#video_'+id).hide();
                         $('#msg').html('<font color="green">media deleted successfully</font>');
                       }
                       else
                       {
                         $('#msg').html('<font color="red">error occured while delete</font>');
                       }

                   }
                  });

            }

}

function delete_popup(videoid)
{
  //alert(videoid);
  var conf=confirm("You sure you want to delete this video !");
            if(conf)
            {
                  var res= $.ajax({
                  type : 'post',
                  url : 'admin/welcome/delete_popup',
                  data : 'vid='+videoid,
                  async : false,
                  success : function(msg)
                   {
                      // alert(msg);
                       if(msg)
                       {
                        window.location.reload();
                      }
                       

                   }
                  });

            }
}

function change_status_popup(action,videoid)
{

  if(action=="Active")
  {
    var conf=confirm("You sure you want to Active this video !");
            if(conf)
            {   
                var res= $.ajax({
                  type : 'post',
                  url : 'admin/welcome/make_active',
                  data : 'vid='+videoid,
                  async : false,
                  success : function(msg)
                   {
                      // alert(msg);
                       if(msg)
                       {
                        window.location.reload();
                      }
                       

                   }
                  });

            }
  }
  else
  {
    var conf=confirm("You sure you want to Active this video !");
            if(conf)
            {    var status=1;
                 var res= $.ajax({
                  type : 'post',
                  url : 'admin/welcome/change_status_popup',
                  data : 'vid='+videoid+'& status='+status,
                  async : false,
                  success : function(msg)
                   {
                      
                       if(msg)
                       {
                        window.location.reload();
                      }
                       

                   }
                  });

            }
  }
  
}

