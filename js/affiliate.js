    function change_status(param, param1)
    {
        if (param=="Approve")
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
            var conf=confirm("You sure you want to Reject this user!");
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


       function show_tier3(uid)
       {
        alert(uid);
       }

    