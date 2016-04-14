  $(document).ready(function() {
      /*
       *  Simple image gallery. Uses default settings
       */
 $('.fancybox').fancybox();
});

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

 
 
    
});