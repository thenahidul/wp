(function($) {
	jQuery('.page-scroll').click(function(event) {
		var offset = jQuery('header').outerHeight();
		jQuery('html, body').animate({
			scrollTop: jQuery('#content').offset().top - offset
		}, 900);
		return false;
	});
	jQuery('.learnmore-btn').click(function(event) {
		var offset = jQuery('header').outerHeight();
		jQuery('html, body').animate({
			scrollTop: jQuery('#how-sent-works').offset().top - offset
		}, 900);
		return false;
	});

})(jQuery);

