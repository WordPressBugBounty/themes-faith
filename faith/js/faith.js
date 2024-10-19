var faith = faith || {},
    $ = jQuery;

/** Global Variables */

var $faithDocument = $( document );

/** Activate primary menu toggles */

faith.headerMenuToggles = {

	init: function() {

		$(".site-toggle-anchor").click(function(){
			$("#site-mobile-menu").toggleClass("is-visible");
			$(".site-toggle-anchor").toggleClass("is-visible");
			$(".site-toggle-label").toggleClass("is-visible");
			$(".site-toggle-icon").toggleClass("is-visible");
		});

		$(".sub-menu-toggle").click(function(){
			$(this).next().toggleClass("is-visible");
			$(this).toggleClass("is-visible");
		});

	},

} // faith.headerMenuToggles

/** Activate superfish menu */

faith.menuSuperfish = {

	init: function() {

		$('.sf-menu').superfish({
			'speed': 'fast',
			'delay' : 0,
			'animation': {
				'height': 'show'
			}
		});

	},

} // menuSuperfish

$faithDocument.ready( function() {

	faith.menuSuperfish.init();
	faith.headerMenuToggles.init();

} );

jQuery(document).ready(function($) { 
	
	/**
	* FlexSlider - Header Images Slideshow
	*/
	jQuery("#ilovewp-hero").flexslider({
		selector: ".ilovewp-slides > .ilovewp-slide",
		animation: "slide",
		animationLoop: false,
		initDelay: 500,
		smoothHeight: false,
		slideshow: true,
		slideshowSpeed: 5000,
		pauseOnAction: true,
		pauseOnHover: false,
		controlNav: false,
		directionNav: true,
		useCSS: true,
		touch: false,
		animationSpeed: 500,
		allowOneSlide: false,
		rtl: false,
		reverse: false,
	    start: function(slider) { slider.removeClass('ilovewp-hero-loading'); }
	});

});