/**************************************************************
 * 25North Javascript - scripts for index.html and home-slider.html
 *************************************************************/

(function($) {
	"use strict";

	var myTemplate = window.myTemplate || {};

	/* Scroll to top */
	$(document).on('click', '.totop', function() {
    	$('html, body').animate({scrollTop: 0}, 600, 'swing');
    	return false;
	});

	/* Smooth scroll function */
	$(document).on('click', 'ul.navbar-nav a', function(e) {
		if ( $(e.target).is('a[href*="#"]:not([href="#"])') ) {
        	if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
            	|| location.hostname == this.hostname) {

            	var target = $(this.hash);
            	target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            	if (target.length) {
                	$('html,body').animate({
                    	scrollTop: target.offset().top
                	}, 1000);
                	return false;
            	}
        	}
    	}
	});

	
    /* Enable link hover with full menu */
    function hoverNavLinks() {
        var winWidth = $(window).width();
        if (winWidth >= 992) {
            /* Hover navbar dropdowns */
            $('.navbar [data-toggle="dropdown"]').bootstrapDropdownHover({
                // see next for specifications
            });

            // ADD SLIDEDOWN ANIMATION TO DROPDOWN //
            $('.dropdown').on('show.bs.dropdown', function(e){
                $(this).find('.dropdown-menu').first().stop(true, true).slideDown("fast");
            });

            // ADD SLIDEUP ANIMATION TO DROPDOWN //
            $('.dropdown').on('hide.bs.dropdown', function(e){
                $(this).find('.dropdown-menu').first().stop(true, true).slideUp("fast");
            });
        }
    }

	/* Google Map Section */
	function initialize() {
        //var myCenter = new google.maps.LatLng(39.7645187,-104.9951951);
		var myCenter = new google.maps.LatLng(tfn_vars.agentMapLat, tfn_vars.agentMapLng);
        var mapProp = {
            center : myCenter,
            zoom : 13,
            mapTypeId : google.maps.MapTypeId.ROADMAP,
            scrollwheel: false,
            draggable: !("ontouchend" in document),
        };
        var map = new google.maps.Map(document.getElementById("mapSection"), mapProp);
        var marker = new google.maps.Marker({
            position : myCenter,
            icon : tfn_vars.agentMapMarker
        });
        marker.setMap(map);
    }

	$(window).load(function() {
		/* load in correct position function */
    	if ($('#totop .top-holder').length ) {  
        	var hash = window.location.hash;
        	var headerOffset = top;
        	if (hash.length) {
            	$(document).scrollTop( $(hash).offset().top - $('#totop .top-holder').outerHeight() );
        	}
    	}
	
		/* Isotope Image Galleries */
        myTemplate.Isotope = function () {
            // 3 column layout
            var isotopeContainer2 = $('#isotope-container2');
            if( !isotopeContainer2.length || !jQuery().isotope ) return;
            isotopeContainer2.isotope({
                itemSelector: '.isotopeSelector',
                layoutMode: 'fitRows',
            });
            $('#isotope-filters2').on( 'click', 'a', function(e) {
                $('#isotope-filters2').find('.active').removeClass('active');
                $(this).parent().addClass('active');
                var filterValue = $(this).attr('data-filter');
                isotopeContainer2.isotope({ filter: filterValue });
                e.preventDefault();
            });
        };
		// Functions Initializers
		myTemplate.Isotope();

		/* Front Page Google Map */
		if($('#mapSection').length) {
        	initialize();
        }
	});

	$(document).ready(function() {
		/* Call hoverNavLinks function */
		hoverNavLinks();

		/* Fancybox */
		$('.fancybox-media').fancybox({
			openEffect  : 'none',
			closeEffect : 'none',
			helpers : {
				media : {}
			}
		});

		myTemplate.Fancybox = function () {
			$(".fancybox-pop").fancybox({
				maxWidth	: 900,
				maxHeight	: 700,
				fitToView	: true,
				width		: '80%',
				height		: '80%',
				autoSize	: false,
				closeClick	: false,
				openEffect	: 'elastic',
				closeEffect	: 'none'
			});
		};
	
		// Functions Initializers
		myTemplate.Fancybox();

		/* Features section Owl Carousel */
		var rtl = tfn_vars.is_rtl ? tfn_vars.is_rtl : false;
		$('#owl-carousel-features').owlCarousel ({
			rtl: rtl,
			items: 1,
			animateOut: 'fadeOutLeft',
    		animateIn: 'fadeInRight',
			//autoHeight: true,
			margin: 10,
			loop: true,
			smartSpeed: 450,
			mouseDrag: false,
			nav: false
		});
		var owl = $('#owl-carousel-features').owlCarousel();
		// trigger next
		$(document).on('click', '.detail-switch', function() {
    		owl.trigger('next.owl.carousel');
			return false;
		})
	});
})(jQuery);
