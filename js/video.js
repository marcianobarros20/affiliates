    $(document).ready(function() {
      /*
       *  Simple image gallery. Uses default settings
       */

      $('.fancybox').fancybox();
}); 
  
      
setInterval(function() {

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

                 $('#class_'+cl_id).show();
                     }
                   }
                  });
}


