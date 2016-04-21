 
  
      
setInterval(function() {
    hello();
}, 10000);

function hello()
{
//alert('hi');
  var res= $.ajax({
                  type : 'post',
                  url : 'Ajax/Fngetvideo',
                  
                  async : false,
                  success : function(msg)
                   {
                       //alert(msg);
                       if(msg!='')
                       {
                       $('#video_play').html(msg);
                       $('#myModal').modal('show');

                        }

                   }
                  });
}