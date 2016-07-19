<?php
/**
 *TwentyFiveNorth Theme Customizer.
 *
 * @packageTwentyFiveNorth
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function twentyfivenorth_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'twentyfivenorth_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function twentyfivenorth_customize_preview_js() {
	wp_enqueue_script( 'twentyfivenorth_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'twentyfivenorth_customize_preview_js' );

/**
 * Add the theme configuration
 */
twentyfivenorth_Kirki::add_config( 'twentyfivenorth_theme', array(
	'option_type' => 'theme_mod',
	'capability'  => 'edit_theme_options',
) );

/**
 * Add the logo section
 **/
twentyfivenorth_Kirki::add_section( 'header_logo', array(
	'title'			=> __( 'Logo', 'twentyfivenorth' ),
	'description'	=> __( 'Add Your Logo', 'twentyfivenorth' ),
	'priority'		=> 2,
	'capability'	=> 'edit_theme_options'
) );
/* Logo field */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
	'type' 			=> 'image',
	'settings'		=> 'header_logo',
	'label'			=> __('Insert your logo', 'twentyfivenorth'),
	'section'		=> 'header_logo',
	'description'	=> __( 'Be sure to add a logo that will fit well', 'twentyfivenorth'),
	'priority'		=> 10,
	'default'		=> ''
) );

/**
 * Add the typography section
 */
twentyfivenorth_Kirki::add_section( 'typography', array(
	'title'      => esc_attr__( 'Typography', 'twentyfivenorth' ),
	'priority'   => 2,
	'capability' => 'edit_theme_options',
) );

/* Add the body-typography control */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
	'type'        => 'typography',
	'settings'    => 'body_typography',
	'label'       => esc_attr__( 'Body Typography', 'twentyfivenorth' ),
	'description' => esc_attr__( 'Select the main typography options for your site.', 'twentyfivenorth' ),
	'help'        => esc_attr__( 'The typography options you set here apply to all content on your site.', 'twentyfivenorth' ),
	'section'     => 'typography',
	'priority'    => 10,
	'default'     => array(
		'font-family'    => 'Roboto',
		'variant'        => '400',
		'font-size'      => '16px',
		'line-height'    => '1.5',
		// 'letter-spacing' => '0',
		'color'          => '#333333',
	),
	'output' => array(
		array(
			'element' => 'body',
		),
	),
) );

/* Add the body-typography control */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
	'type'        => 'typography',
	'settings'    => 'headers_typography',
	'label'       => esc_attr__( 'Headers Typography', 'twentyfivenorth' ),
	'description' => esc_attr__( 'Select the typography options for your headers.', 'twentyfivenorth' ),
	'help'        => esc_attr__( 'The typography options you set here will override the Body Typography options for all headers on your site (post titles, widget titles etc).', 'twentyfivenorth' ),
	'section'     => 'typography',
	'priority'    => 10,
	'default'     => array(
		'font-family'    => 'Roboto',
		'variant'        => '400',
		// 'font-size'      => '16px',
		// 'line-height'    => '1.5',
		// 'letter-spacing' => '0',
		// 'color'          => '#333333',
	),
	'output' => array(
		array(
			'element' => array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', '.h1', '.h2', '.h3', '.h4', '.h5', '.h6' ),
		),
	),
) );

/**
 * Add the Custom Code (CSS, JS) section
 */
twentyfivenorth_Kirki::add_section( 'custom_code', array(
    'title'      => esc_attr__( 'Custom Code', 'twentyfivenorth' ),
    'priority'   => 3,
    'capability' => 'edit_theme_options',
) );

/* Custom CSS */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
	'type'		=> 'code',
	'settings'	=> 'css_code',
	'label'		=> esc_attr__( 'Custom CSS Code', 'twentyfivenorth' ),
	'section'	=> 'custom_code',
	'priority'	=> 10,
	'default'	=> '',
	'choices'	=> array(
		'language' => 'css',
		'theme'	   => 'railscasts',
		'height'   => '250',
	),
) );

/* Custom JS */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'      => 'code',
    'settings'  => 'js_code',
    'label'     => esc_attr__( 'Custom Javascript Code', 'twentyfivenorth' ),
    'section'   => 'custom_code',
    'priority'  => 10,
    'default'   => '',
    'choices'   => array(
        'language' => 'javascript',
        'theme'    => 'railscasts',
        'height'   => '250',
    ),
) );
