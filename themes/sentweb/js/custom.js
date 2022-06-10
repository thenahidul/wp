(function ($) {
	$(document).ready(function () {

		$(".slider-learn-more a").click(function (e) {
			e.preventDefault();
			$("html, body").animate(
				{
					scrollTop: $("#content").offset().top
				},
				500
			);
		});

		$(".hidden-trigger a").on("click", function (e) {
			e.preventDefault();

			var that = $(this);
			var textSpan = that
				.closest(".vc_column-inner")
				.find(".expandable-text span");

			// textSpan.stop(true, true).slideToggle(500,'linear');

			if (that.hasClass("show-less-on")) {
				that.removeClass("show-less-on").text("Learn More");
				textSpan.addClass("hidden-it");
			} else {
				that.addClass("show-less-on").text("Show Less");
				textSpan.removeClass("hidden-it");
			}

			//if(that.closest('.video-row').length) {
			//$('.video-row').toggleClass('vc_row-flex');
			//}

			if (that.closest(".flex-center-toggle").length) {
				that.closest(".flex-center-toggle").toggleClass("vc_row-flex");
			}
		});
	});
})(jQuery);