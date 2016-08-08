

jQuery(document).ready(function() {
 

	// click to hover elements
	jQuery('.click-to-hover').click(function() {
		if ( jQuery(this).hasClass('hover') ) {
			jQuery('.click-to-hover').removeClass('hover');	
		} else {
			jQuery('.click-to-hover').removeClass('hover');
			jQuery(this).addClass('hover');
		}
	});

	// smooth scrolling
	var $root = jQuery('html, body');
	jQuery('a').click(function() {
	  var href = jQuery.attr(this, 'href');
	  $root.animate({
	      scrollTop: jQuery(href).offset().top
	  }, 500, function () {
	      window.location.hash = href;
	  });
	  return false;
	});

	// sticky nav
	jQuery(window).scroll(function() {    
	  var scroll = jQuery(window).scrollTop();
	  if (scroll >= 150) {
	    jQuery(".sticky-navigation-bar").addClass("active");
	  }
	  if (scroll <= 150) {
	    jQuery(".sticky-navigation-bar").removeClass("active");
	  }
	});

	// Mobile nav toggle active
	jQuery(".mobile-nav-hamburger").click(function() {
		jQuery(".mobile-nav-main").toggleClass("active");
	});
	jQuery(".mobile-nav-main a").click(function() {
		jQuery(".mobile-nav-main").removeClass("active");
	});

});



// Placeholder support for forms in IE 







jQuery(document).ready(function ($) {
  
	var slideCount = $('#slider ul li').length;
	var slideWidth = $('#slider ul li').width();
	var slideHeight = $('#slider ul li').height();
	var sliderUlWidth = slideCount * slideWidth;
	
	$('#slider').css({ width: slideWidth, height: slideHeight });
	
	$('#slider ul').css({ width: sliderUlWidth, marginLeft: - slideWidth });
	
    $('#slider ul li:last-child').prependTo('#slider ul');

    function moveLeft() {
        $('#slider ul').animate({
            left: + slideWidth
        }, 200, function () {
            $('#slider ul li:last-child').prependTo('#slider ul');
            $('#slider ul').css('left', '');
        });
    }

    function moveRight() {
        $('#slider ul').animate({
            left: - slideWidth
        }, 200, function () {
            $('#slider ul li:first-child').appendTo('#slider ul');
            $('#slider ul').css('left', '');
        });
    }

    $('.control_prev').click(function () {
        moveLeft();
    });

    $('.control_next').click(function () {
        moveRight();
    });

});  



jQuery(document).foundation();
/* 
These functions make sure WordPress 
and Foundation play nice together.
*/

jQuery(document).ready(function() {
    
    // Remove empty P tags created by WP inside of Accordion and Orbit
    jQuery('.accordion p:empty, .orbit p:empty').remove();
    
	 // Makes sure last grid item floats left
	jQuery('.archive-grid .columns').last().addClass( 'end' );
	
	// Adds Flex Video to YouTube and Vimeo Embeds
	jQuery('iframe[src*="youtube.com"], iframe[src*="vimeo.com"]').wrap("<div class='flex-video widescreen'/>");

});