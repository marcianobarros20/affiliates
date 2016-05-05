    $(document).ready(function() {
      /*
       *  Simple image gallery. Uses default settings
       */

      $('.fancybox').fancybox();
}); 
  
      
setTimeout(function() {

    hello();
}, 5000);

function hello()
{
//alert('hi');
  var res= $.ajax({
                  type : 'post',
                  url : 'Ajax/Fngetvideo',
                  
                  async : false,
                  success : function(msg)
                   {
                    var con=$('#video_open').val();
                       //alert(msg);
                       
                       if(msg!='' && con!=1)
                       {
                        $('#various1').click();
                       $('#inline1').html(msg);
                       $('#video_open').val(1);
                       //$('#myModal').modal('show');

                        }
                        else if($('.fancybox-overlay').length==0){
                         $('#video_open').val(0);
                        }

                   }
                  });

  var hmvideo=document.getElementById("homepageVideo");
hmvideo.onended = function() {
 $('.fancybox-close').click();
}
}






function show_video(id,cl_id,co_id)
{
// alert(id);
 var res= $.ajax({
                  type : 'post',
                  url : 'Ajax/Fngetvideoclass',
                  data:'id='+id+'& cl_id='+cl_id+'& co_id='+co_id,
                  async : false,
                  success : function(msg)
                   {
                 
                       $('#inline2').html(msg);

                   }
                  });
var vid = document.getElementById("myVideo");
vid.onended = function() {
  
   var res= $.ajax({
                  type : 'post',
                  url : 'Ajax/Fncompletevideoclass',
                  data:'id='+id+'& cl_id='+cl_id+'& co_id='+co_id,
                  async : false,
                  success : function(msg)
                   {
                      if(msg==0)
                      {
                       $('.status_'+cl_id).html('Status: Completed Full Training.');
                      }
                      else
                      {
                         $('.status_'+cl_id).html('Status: Need to Complete This Training.');
                      }
                      
                     
                   }
                  });
};
}


function open_new_class(cl_id,co_id)
{
   var res= $.ajax({
                  type : 'post',
                  url : 'Ajax/Fnchktrainingstatus',
                  data:'cl_id='+cl_id+' &co_id='+co_id,
                  async : false,
                  success : function(msg)
                   {
                    if(msg==0)
                    {
                       $('.err').html('');     
                      
                       if($('.class_'+cl_id).hasClass('inactive'))
                       {
                         $('#class_'+cl_id).show();
                         $('.class_'+cl_id).removeClass('inactive');
                         $('.class_'+cl_id).addClass('showactive');

                       }
                       else
                       {
                         $('#class_'+cl_id).hide();
                         $('.class_'+cl_id).removeClass('showactive');
                         $('.class_'+cl_id).addClass('inactive');
                       }

                     }
                     else
                     {
                      $('#err_msg_'+cl_id).html('Sorry! your previous trainings are still left.');
                     }
                   }
                  });
}


function fnchkTraining(co_id)
{
 alert(co_id);
}