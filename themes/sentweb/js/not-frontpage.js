(function($) {
	// Smooth scroll
	jQuery('a[href*=#]:not([href=#])').on('click',function () {
		if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
			var target = jQuery(this.hash);
			target = target.length ? target : jQuery('[name=' + this.hash.slice(1) + ']');
			if (target.length) {
				jQuery('html,body').animate({
					scrollTop: (target.offset().top - 10) // can be used navHeight
				}, 850);
				return false;
			}
		}
	});

	// move the reply comments outside of its parent comment
	jQuery('.comment').each(function() {
		 jQuery(this).find('.child-comments').insertAfter(this);
	});

})(jQuery);
