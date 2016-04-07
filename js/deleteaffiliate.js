function approve(uid)
    {


            var conf=confirm("You sure you want to Active this Affiliate!");
            if(conf)
            {
        //alert(uid);
        var status=1;
                  var res= $.ajax({
                  type : 'post',

                  url : 'index.php/Ajax/delete_to_active',

                  data : 'uid='+uid+'& status='+status,
                  async : false,
                  success : function(msg)
                   {
                       alert(msg);
                        window.location.reload();

                   }
                  });

        }

    }