
    jQuery(document).ready(function(){
    jQuery(".click").click(function(){
    jQuery(".main_nav").slideToggle(700);
    });
    
    });

    function jqUpdateSize(){
    var width = jQuery('.banner_vdobox').width();
    var sqwidth = width * 33.85 / 100;
    jQuery('.banner_vdobox').css('height', sqwidth);
    };
    jQuery(document).ready(jqUpdateSize);    // When the page first loads
    jQuery(window).resize(jqUpdateSize);     // When the browser changes size
    