<?php
/**
 *  Dynamic style generation for Kirki to output
 * 
 */
if( ! function_exists('tfn_accent_color') ){
function tfn_primary_color(){
	$output = array (
        array(
            'element'  => 'a, a:active',
            'property' => 'color',
        ),
        array(
            'element'  => '.alert-status',
            'property' => 'background-color'
        ),
        array(
            'element'  => '.alert-status',
            'property' => '.border-color'
        ),
        array(
            'element'  => '.infoblock h3:after',
            'property' => 'border-color'
        ),
        array(
            'element'  => '.infoblock ul li:before, .infoblock ul li::after',
            'property' => 'color'
        ),
        array(
            'element'  => 'a.detail-switch i',
            'property' => 'background-color'
        ),
        array(
            'element'  => '.sqft',
            'property' => 'color'
        ),
        array(
            'element'  => '.navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active > a:focus, .navbar-default .navbar-nav > .active > a:hover, .navbar-default .navbar-nav > .open > a, .navbar-default .navbar-nav > .open > a:focus, .navbar-default .navbar-nav > .open > a:hover, .navbar-default .navbar-nav > li > a, .navbar-default .navbar-nav > li > a:focus',
            'property' => 'color'
        ),
		array(
			'element'  => '.navbar.navbar-default .navbar-nav > li > a:hover',
			'property' => 'color',
		),
        array(
            'element'  => '.navbar-brand  img.smaller-logo',
            'property' => 'background-color'
        ),
        array(
            'element'  => '.dropdown-menu > .active > a, .dropdown-menu > .active > a:focus, .dropdown-menu > .active > a:hover, .navbar-default .navbar-nav .open .dropdown-menu > li > a:focus, .navbar-default .navbar-nav .open .dropdown-menu > li > a:hover, .navbar-default .navbar-nav .open .dropdown-menu > .active > a, .navbar-default .navbar-nav .open .dropdown-menu > .active > a:focus,.navbar-default .navbar-nav .open .dropdown-menu > .active > a:hover',
            'property' => 'background-color'
        ),
        array(
            'element'  => '.navbar-nav > li > .dropdown-menu',
            'property' => 'border-color'
        ),
        array(
            'element'  => '.btn-sec',
            'property' => 'background-color'
        ),
        array(
            'element'  => '.btn-sec',
            'property' => 'border-color'
        ),
        array(
            'element'  => '.btn-third',
            'property' => 'border-color'
        ),
        array(
            'element'  => '.btn-third',
            'property' => 'color'
        ),
		array(
			'element'  => '.top-info-sect h1',
			'property' => 'color'
		),
		array(
			'element'  => '.top-cta',
			'property' => 'background-color'
		),
		array( 
			'element'  => '.features i',
			'property' => 'color'
		),		
		array(
			'element'  => '.btn-pri.vtour',
			'property' => 'border-color'
		),
		array(
			'element'  => '.decagon .rct',
			'property' => 'background-color'
		),
		array(
			'element'  => '.add-item i',
			'property' => 'color'
		),
		array(
			'element'  => 'ul.filter > li > a:hover, ul.filter > li > a:hover, ul.filter > li.active a',
			'property' => 'background-color'
		),
		array(
			'element'  => '.bl-date',
			'property' => 'background-color'
		),
		array(
			'element'  => '.bl-title h3',
			'property' => 'color'
		),
		array(
			'element'  => '.bl-comments i, .bl-views i',
			'property' => 'color'
		),
		array(
			'element'  => '.agent-info h3',
			'property' => 'color'
		),
		array(
			'element'  => '.contact-items',
			'property' => 'background-color'
		),
		array(
			'element'  => '.owl-carousel-agents .owl-prev, .owl-carousel-agents .owl-next',
			'property' => 'border-color'
		),
		array(
            'element'  => '.owl-carousel-agents .owl-prev, .owl-carousel-agents .owl-next',
            'property' => 'color'
        ),
		array(
			'element'  => '.owl-carousel-agents .owl-prev:hover,.owl-carousel-agents .owl-next:hover',
			'property' => 'background-color'
		),
		array(
			'element'  => '.agent-data > h4',
			'property' => 'color'
		),
		array(
			'element'  => '.agent-social a:hover',
			'property' => 'color'
		),
		array(
            'element'  => '.agent-social a:hover',
            'property' => 'border-color'
        ),
		array(
			'element'  => '.stars i',
			'property' => 'color'
		),
		array(
			'element'  => '.slide .quote-person span',
			'property' => 'color'
		),
		array(
			'element'  => '.owl-carousel-testimonials .owl-dots .owl-dot.active span, .owl-theme .owl-dots .owl-dot:hover span',
			'property' => 'background-color'
		),
		array(
			'element'  => '.statement h4',
			'property' => 'color'
		),
		array(
			'element'  => '.statement h4::before',
			'property' => 'border-color'
		),
		array(
			'element'  => '.icon-holder .icon-surround',
			'property' => 'border-color'
		),
		array(
			'element'  => '.icon-surround i',
			'property' => 'color'
		),
		array(
			'element'  => '.blog-header-inner h1::after',
			'property' => 'border-color'
		),
		array(
			'element'  => '.blog-sidebar a:hover',
			'property' => 'color'
		),
		array(
			'element'  => '.tfn-tags ul li a:hover',
			'property' => 'border-color'
		),
		array(
			'element'  => '.tfn-tags ul li a:hover',
			'property' => 'background-color'
		),
		array(
			'element'  => '.search-form .submits:hover',
			'property' => 'background-color'
		),
		array(
            'element'  => '.search-form .submits:hover',
            'property' => 'border-color'
        ),
		array(
			'element'  => '.sb-title i',
			'property' => 'color'
		),
		array(
			'element'  => '.comment-actions a:hover',
			'property' => 'background-color'
		),	
		array(
			'element'  => '.comment-meta-content cite a:hover, .comment-meta-content p a:hover',
			'property' => 'color'
		),
		array(
			'element'  => '.comment-form input[type="submit"]',
			'property' => 'background-color'
		),
		array(
			'element'  => '.footer_icons a:hover',
			'property' => 'color'
		),
    );
	return $output;
}
}

/* Secondary Color */
if( ! function_exists('tfn_secondary_color') ){
function tfn_secondary_color(){
	$output = array(
		 array(
            'element'  => '.navbar-default .navbar-nav > li > a',
            'property' => 'color'
        ),
		array(
			'element'  => '.infoblock ul li',
			'property' => 'color'
		),
		array(
			'element'  => 'a.detail-switch',
			'property' => 'background-color'
		),
		array(
			'element'  => '.sqft-desc',
			'property' => 'color'
		),
		array(
			'element'  => '.caret',
			'property' => 'color'
		),
		array(
			'element'  => '.btn-sec:focus, .btn-sec:hover, .btn-third:focus, .btn-third:hover',
			'property' => 'background-color'
		),
		array(
            'element'  => '.btn-sec:focus, .btn-sec:hover, .btn-third:focus, .btn-third:hover',
            'property' => 'border-color'
        ),
		array(
			'element'  => '.top-cta:hover',
			'property' => 'background-color'
		),
		array(
			'element'  => '.color-back, .virtual',
			'property' => 'background-color'
		),
		array(
			'element'  => 'ul.filter > li > a',
			'property' => 'color'
		),
		array(
			'element'  => '.contact-details span',
			'property' => 'color'
		),
		array(
			'element'  => '.contact-form .form-submit',
			'property' => 'background-color'
		),	
		array(
			'element'  => '.blog-section .bl-title h2 a, .blog-section .bl-title h2 a:hover, .blog-section .bl-title h2 a:active',
			'property' => 'color'
		),



	);
	return $output;
}
}
