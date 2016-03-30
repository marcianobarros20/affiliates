

function change_status(param, param1)
{
//alert(param);
//alert(param1);
if (param=="Approve")
{


/*var status=1;
var res= $.ajax({
       type : 'post',
       url : 'Ajax/change_status',
       data : 'uid='+param1+'& status='+status,
       async : false,
    success : function(msg)
    {
  alert(msg);
       }
       }); */
}
else if(param=="Delete")
{
  
  var conf=confirm("You sure you want to delete this user!");
  if(conf)
  {
      var status=2;
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
else
{
  var status=3;
   var conf=confirm("You sure you want to delete this user!");
  if(conf)
  {
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
