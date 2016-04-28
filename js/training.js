 function now(coid,userid)
 {
         //alert(coid);
         //alert(useid);
    var res= $.ajax({
             type : 'post',
             url : 'contents/fetchcourseinfo',
             data : 'co_id='+coid+'& u_id='+userid,
             
             async : false,
             success : function(msg)
             {
                      
               alert(msg)
             }
             });




 }