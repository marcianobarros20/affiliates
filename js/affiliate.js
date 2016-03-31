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


    