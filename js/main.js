

jQuery(function($) {

	//Ajax contact
	var form = $('.contact-form');
		form.submit(function () {
			$this = $(this);
			$.post($(this).attr('action'), function(data) {
			$this.prev().text(data.message).fadeIn().delay(3000).fadeOut();
		},'json');
		return false;
	});

	//Goto Top
	$('.gototop').click(function(event) {
		 event.preventDefault();
		 $('html, body').animate({
			 scrollTop: $("body").offset().top
		 }, 500);
	});	
	//End goto top		




});

/*$( document ).ready(function() {

$('#menu1').on('click touchstart', function () {
	if($('.menu').hasClass('inactive'))
	{
		$('.menu').show();
		$('.menu').removeClass('inactive');
		$('.menu').addClass('showul');
	}
	else
	{
		$('.menu').hide();
		$('.menu').removeClass('showul');
		$('.menu').addClass('inactive');
	}

});
});*/