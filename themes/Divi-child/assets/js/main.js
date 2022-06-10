(function ($) {
	$(document).ready(function () {
	    
	    var headerHeight = $('#main-header:not(.et-fixed-header)').outerHeight();
	    $('.et_section_search_innerpage').css({'margin-top' : headerHeight + 'px'});
	    
	    if( $(".owl-carousel").length ) {
    		$(".owl-carousel").owlCarousel({
    			center: true,
    			loop: true,
    			margin: 10,
    			nav: true,
    			items: 1,
    			dots: true,
    			autoHeight: true,
    			autoplay: true,
    			autoplayTimeout: 5000,
    			stopOnHover: true,
    			// lazyLoad: true,
    			smartSpeed: 500,
    			slideTransition: "ease"
    		});
	    }
	});
})(jQuery);
