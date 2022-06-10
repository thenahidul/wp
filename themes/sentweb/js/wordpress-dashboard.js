(function ($) {
	"use strict";

	// jQuery('.plugin-update-tr, #update-nag, .update-nag, .update-plugins').hide();

	var postFormat = jQuery('.post-format-icon');

	var galleryFormat = jQuery('.post-format-gallery');
	var audioFormat = jQuery('.post-format-audio');
	var videoFormat = jQuery('.post-format-video');

	var galleryField = jQuery('.acf-field-gallery');
	var audioField = jQuery('[data-name="audio"]');
	var videoField = jQuery('[data-name="video"]');

	jQuery(galleryField).hide();
	jQuery(audioField).hide();
	jQuery(videoField).hide();

	// is checked
	if( jQuery('#post-format-gallery').is(':checked') ){ 
		jQuery(galleryField).show();
		jQuery(audioField).hide();
		jQuery(videoField).hide();
	} else {
		jQuery(galleryField).hide();
	}

	if( jQuery('#post-format-audio').is(':checked') ){ 
		jQuery(audioField).show();
		jQuery(galleryField).hide();
		jQuery(videoField).hide();
	} else {
		jQuery(audioField).hide();
	}

	if( jQuery('#post-format-video').is(':checked') ){ 
		jQuery(videoField).show();
		jQuery(audioField).hide();
		jQuery(galleryField).hide();
	} else {
		jQuery(videoField).hide();
	}


	jQuery(postFormat).on('click', function() {
		jQuery(galleryField).hide();
		jQuery(audioField).hide();
		jQuery(videoField).hide();
	});

	jQuery(galleryFormat).on('click', function() {
		jQuery(galleryField).show();
		jQuery(audioField).hide();
		jQuery(videoField).hide();
	});

	jQuery(audioFormat).on('click', function() {
		jQuery(audioField).show();
		jQuery(galleryField).hide();
		jQuery(videoField).hide();
	});

	jQuery(videoFormat).on('click', function() {
		jQuery(videoField).show();
		jQuery(audioField).hide();
		jQuery(galleryField).hide();
	});


}(jQuery));