 
  
      
setInterval(function() {
    hello();
}, 10000);

function hello()
{

$('#myModal').modal('show');
/*  var res= $.ajax({
                  type : 'post',
                  url : 'Ajax/Fngetdetails',
                  data : 'uid='+uid,
                  async : false,
                  success : function(msg)
                   {
                       //alert(msg);
                       $('#chkline').html(msg);

                   }
                  });*/
}