  $(document).ready(function() {
      /*
       *  Simple image gallery. Uses default settings
       */
 $('.fancybox').fancybox();
});
/*
  $(document).delegate('#list a','click',function(){
 //alert($(this).data("id"));
 var parent=$(this).data("id");
if($('.par_'+parent).hasClass("display_block"))
{
$('.par_'+parent).removeClass('display_block');
$('.par_'+parent).addClass('new_display2');
$('.param_'+parent).html(' + ');
}
else if($('.par_'+parent).hasClass("new_display2"))
{
  $('.par_'+parent).removeClass('new_display2');
$('.par_'+parent).addClass('display_block');

$('.param_'+parent).html(' - ');
}

 
 
    
});*/



$(document).delegate('#list1 a','click',function(){
 //alert($(this).data("id"));
 var parent=$(this).data("id");
 $('.btn').addClass("btn-primary");

  var res= $.ajax({
                  type : 'post',
                  url : 'Ajax/findchild',
                  data : 'parent_id='+parent,
                  async : false,
                  success : function(msg)
                   {
                    if(msg!='')
                    {
                    $( "#list1" ).append( "<div id='tier4'></div>" );
                     //$('#tier4').find('div').first().remove();
                     $('#tier4').find('div').remove();
                     $( "#tier4" ).append( "<div id='tier_"+parent+"'></div>" );
                     $(".btn").removeClass("color");
                     if($('.btn').hasClass("param_"+parent))
                      {
                        $(".param_"+parent).addClass("color");

                         if($('.btn').hasClass("color"))
                      {
                           $(".color").removeClass("btn-primary");
                      }
                      }
                     

                      $("#tier_"+parent).html(msg);
                    }
                    else
                    {
                     if($('.btn').hasClass("color"))
                      {
                           $(".btn").removeClass("color");
                      }
                       $('#tier4').find('div').first().remove(); 
                    }
                    }
                  });

    
});




  function description(uid)
{
   var res= $.ajax({
                  type : 'post',
                  url : 'Ajax/Fngetdetails',
                  data : 'uid='+uid,
                  async : false,
                  success : function(msg)
                   {
                       //alert(msg);
                       $('#chkline').html(msg);

                   }
                  });
}
function show_child_1(user_id,parent_id)
{
  
 $( "#tier4").append( "<div id='tier5"+parent_id+"'></div>" );

    var parent=user_id;
    var res= $.ajax({
                  type : 'post',
                  url : 'Ajax/findchild',
                  data : 'parent_id='+parent,
                  async : false,
                  success : function(msg)
                   {
                     if(msg!='')
                      {
                     //$('#tier'+user_id).html(msg);
                    //$('#tier5'+parent_id).find('div').first().remove();
                   $( "#tier5"+parent_id).find('div').remove();
                   $( "#tier5"+parent_id).nextAll('div').remove();
   $( "#tier5"+parent_id).append("<div id='tier_"+user_id+"'></div>" );
 $('#tier_'+user_id).html(msg);
                        $(".btn").removeClass("color");

                     if($('.btn').hasClass("child_"+user_id))
                      {
                        $(".child_"+user_id).addClass("color");
                        $(".child_"+user_id).removeClass("btn-primary");
                      }

                      } 
                   }
                  });
}

