function approve(uid)
    {
        //alert(uid);
        var status=1;
                  var res= $.ajax({
                  type : 'post',
                  url : 'index.php/Ajax/approve',
                  data : 'uid='+uid+'& status='+status,
                  async : false,
                  success : function(msg)
                   {
                       alert(msg);
                        window.location.reload();

                   }
                  });



    }