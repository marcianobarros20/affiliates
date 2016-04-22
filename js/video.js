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





