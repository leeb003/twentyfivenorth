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
 * Add the general section
 */
twentyfivenorth_Kirki::add_section( 'general', array(
    'title'      => esc_attr__( 'General', 'twentyfivenorth' ),
    'priority'   => 2,
    'capability' => 'edit_theme_options',
) );

/* Add the site color choices */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'        => 'color',
    'settings'    => 'color_primary',
    'label'       => __( 'Primary Site Color', 'twentyfivenorth' ),
    'section'     => 'general',
    'default'     => '#fec107',
    'priority'    => 10,
    'alpha'       => true,
) );
/* Add the site color choices */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'        => 'color',
    'settings'    => 'color_secondary',
    'label'       => __( 'Secondary Site Color', 'twentyfivenorth' ),
    'section'     => 'general',
    'default'     => '#46505c',
    'priority'    => 10,
    'alpha'       => true,
) );
/* Google Maps API Key */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'      => 'text',
    'settings'  => 'google_key',
    'label'     => __('Google Maps API Key', 'twentyfivenorth'),
    'priority'  => 10,
    'default'   => '',
    'description'=> __('Insert your Google Maps API Key if using the theme map sections.  More information can be found at Google...', 'twentyfivenorth') . '<a target="_blank" href="https://developers.google.com/maps/documentation/javascript/get-api-key">Google Maps API</a>',
    'section'   => 'general',
) );

/* Add the body typography control */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'        => 'typography',
    'settings'    => 'body_typography',
    'label'       => esc_attr__( 'Body Typography', 'twentyfivenorth' ),
    'description' => esc_attr__( 'Select the main typography options for your site.', 'twentyfivenorth' ),
    'help'        => esc_attr__( 'The typography options you set here apply to all content on your site.', 'twentyfivenorth' ),
    'section'     => 'general',
    'priority'    => 10,
    'default'     => array(
        'font-family'    => 'Roboto',
        'variant'        => 'regular',
        'font-size'      => '14px',
        'line-height'    => '26px',
        'letter-spacing' => '0.015em',
        'color'          => '#6e6e6e',
    ),
    'output' => array(
        array(
            'element' => '.wrapper',
        ),
    ),
) );

/* Add the header typography control H1 */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'        => 'typography',
    'settings'    => 'h1__typography',
    'label'       => esc_attr__( 'H1 Typography', 'twentyfivenorth' ),
    'description' => esc_attr__( 'Select the typography options for your H1 headers.', 'twentyfivenorth' ),
    'help'        => esc_attr__( 'The typography options you set here will apply to the H1 elements of your site.', 'twentyfivenorth' ),
    'section'     => 'general',
    'priority'    => 10,
    'default'     => array(
        'font-family'    => 'Roboto',
        'variant'        => 'regular',
        'font-size'      => '40px',
        'line-height'    => '1.5',
        'letter-spacing' => '0',
        'color'          => '#333333',
    ),
    'output' => array(
        array(
            'element' => array( 'h1' ),
        ),
    ),
) );

/* Add the header typography control H2 */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'        => 'typography',
    'settings'    => 'h2__typography',
    'label'       => esc_attr__( 'H2 Typography', 'twentyfivenorth' ),
    'description' => esc_attr__( 'Select the typography options for your H1 headers.', 'twentyfivenorth' ),
    'help'        => esc_attr__( 'The typography options you set here will apply to the H2 elements of your site.', 'twentyfivenorth' ),
    'section'     => 'general',
    'priority'    => 10,
    'default'     => array(
        'font-family'    => 'Roboto',
        'variant'        => '900',
        'font-size'      => '36px',
        'line-height'    => '36px',
        'letter-spacing' => '0',
        'color'          => '#46505c',
    ),
    'output' => array(
        array(
            'element' => array( 'h2' ),
        ),
    ),
) );

/* Add the header typography control H3 */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'        => 'typography',
    'settings'    => 'h3__typography',
    'label'       => esc_attr__( 'H3 Typography', 'twentyfivenorth' ),
    'description' => esc_attr__( 'Select the typography options for your H1 headers.', 'twentyfivenorth' ),
    'help'        => esc_attr__( 'The typography options you set here will apply to the H3 elements on your site.', 'twentyfivenorth' ),
    'section'     => 'general',
    'priority'    => 10,
    'default'     => array(
        'font-family'    => 'Roboto',
        'variant'        => '600',
        'font-size'      => '27px',
        'line-height'    => '35px',
        'letter-spacing' => '0',
        'color'          => '#46505c',
    ),
    'output' => array(
        array(
            'element' => array( 'h3' ),
        ),
    ),
) );

/* Add the header typography control H4 */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'        => 'typography',
    'settings'    => 'h4__typography',
    'label'       => esc_attr__( 'H4 Typography', 'twentyfivenorth' ),
    'description' => esc_attr__( 'Select the typography options for your H1 headers.', 'twentyfivenorth' ),
    'help'        => esc_attr__( 'The typography options you set here will apply to the H4 elements on your site.', 'twentyfivenorth' ),
    'section'     => 'general',
    'priority'    => 10,
    'default'     => array(
        'font-family'    => 'Roboto',
        'variant'        => '500',
        'font-size'      => '25px',
        'line-height'    => '25px',
        'letter-spacing' => '0',
        'color'          => '#46505c',
    ),
    'output' => array(
        array(
            'element' => array( 'h4' ),
			'element' => array( '.posts-navigation h2, .post-navigation h2'),
		),
    ),
) );

/* Add the header typography control H5 */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'        => 'typography',
    'settings'    => 'h5__typography',
    'label'       => esc_attr__( 'H5 Typography', 'twentyfivenorth' ),
    'description' => esc_attr__( 'Select the typography options for your H5 headers.', 'twentyfivenorth' ),
    'help'        => esc_attr__( 'The typography options you set here will apply to the H5 elements on your site.', 'twentyfivenorth' ),
    'section'     => 'general',
    'priority'    => 10,
    'default'     => array(
        'font-family'    => 'Roboto',
        'variant'        => 'regular',
        'font-size'      => '1.25em',
        'line-height'    => '1.5',
        'letter-spacing' => '0',
        'color'          => '#46505c',
    ),
    'output' => array(
        array(
            'element' => array( 'h5' ),
        ),
    ),
) );

/* Add the header typography control H6 */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'        => 'typography',
    'settings'    => 'h6__typography',
    'label'       => esc_attr__( 'H6 Typography', 'twentyfivenorth' ),
    'description' => esc_attr__( 'Select the typography options for your H6 headers.', 'twentyfivenorth' ),
    'help'        => esc_attr__( 'The typography options you set here will apply to the H6 elements on your site.', 'twentyfivenorth' ),
    'section'     => 'general',
    'priority'    => 10,
    'default'     => array(
        'font-family'    => 'Roboto',
        'variant'        => 'regular',
        'font-size'      => '1.25em',
        'line-height'    => '1.5',
        'letter-spacing' => '0',
        'color'          => '#46505c',
    ),
    'output' => array(
        array(
            'element' => array( 'h6' ),
        ),
    ),
) );

/**
 * Add the Header section
 **/
twentyfivenorth_Kirki::add_section( 'header_section', array(
	'title'			=> __( 'Header', 'twentyfivenorth' ),
	'description'	=> __( 'Header Settings', 'twentyfivenorth' ),
	'priority'		=> 2,
	'capability'	=> 'edit_theme_options'
) );
/* Logo field */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
	'type' 			=> 'image',
	'settings'		=> 'header_logo',
	'label'			=> __('Insert your logo', 'twentyfivenorth'),
	'section'		=> 'header_section',
	'description'	=> __( 'Be sure to add a logo that will fit well', 'twentyfivenorth'),
	'priority'		=> 10,
	'default'		=> ''
) );
/* Enable Social Links */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
	'type'			=> 'checkbox',
	'settings'		=> 'header_social',
	'label'			=> __('Enable Header social links?', 'twentyfivenorth'),
	'section'		=> 'header_section',
	'description' 	=> __('Choose to display social links in the header', 'twentyfivenorth'),
	'default'		=> '0',
	'priority'		=> '10',
) );
/* Social Link Repeater fields */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'          => 'repeater',
    'settings'      => 'header_social_pick',
    'label'         => __('Social Links', 'twentyfivenorth'),
    'section'       => 'header_section',
    'description'   => __('Choose the social network and set a link.', 'twentyfivenorth'),
    'priority'      => '10',
	'row_label'   => array(          // row_label is not yet documented in Kirki
		'type' => 'text',
		'value' => __('Social Link', 'twentyfivenorth'),
	),
	'active_callback'	=> array(  // Kirki field dependency
		array(
			'setting'	=> 'header_social',
			'operator'	=> '==',
			'value'		=> 1
		),
	),
	'default'		=> array(
	),

	'fields' => array(
		'social_url' => array(
			'type'        => 'text',
			'label'	      => __('Social URL', 'twentyfivenorth'),
			'description' => __('This is the Link URL', 'twentyfivenorth'),
			'default'	  => '',
		),
		'social_choice' => array(
			'type'		  => 'select',
			'label'		  => __('Social Network', 'twentyfivenorth'),
			'default'	  => '',
			'choices' => twentyfivenorth_social_icons(),
		),
	)
) );

/**
 * Add the Footer section
 **/
twentyfivenorth_Kirki::add_section( 'footer_section', array(
    'title'         => __( 'Footer', 'twentyfivenorth' ),
    'description'   => __( 'Footer Settings', 'twentyfivenorth' ),
    'priority'      => 2,
    'capability'    => 'edit_theme_options'
) );
/* Footer Text */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'          => 'textarea',
    'settings'      => 'footer_text',
    'label'         => __('Insert your footer text', 'twentyfivenorth'),
    'section'       => 'footer_section',
    'description'   => __( 'Text for the footer area', 'twentyfivenorth'),
    'priority'      => 10,
    'default'       => ''
) );
/* Enable Social Links */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'          => 'checkbox',
    'settings'      => 'footer_social',
    'label'         => __('Enable Footer social links?', 'twentyfivenorth'),
    'section'       => 'footer_section',
    'description'   => __('Choose to display social links in the footer', 'twentyfivenorth'),
    'default'       => '0',
    'priority'      => '10',
) );
/* Social Link Repeater fields - footer */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'          => 'repeater',
    'settings'      => 'footer_social_pick',
    'label'         => __('Social Links', 'twentyfivenorth'),
    'section'       => 'footer_section',
    'description'   => __('Choose the social network and set a link.', 'twentyfivenorth'),
    'priority'      => '10',
    'row_label'   => array(          // row_label is not yet documented in Kirki
        'type' => 'text',
        'value' => __('Social Link', 'twentyfivenorth'),
    ),
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'footer_social',
            'operator'  => '==',
            'value'     => 1
        ),
    ),
    'default'       => array(
    ),

    'fields' => array(
        'social_url' => array(
            'type'        => 'text',
            'label'       => __('Social URL', 'twentyfivenorth'),
            'description' => __('This is the Link URL', 'twentyfivenorth'),
            'default'     => '',
        ),
        'social_choice' => array(
            'type'        => 'select',
            'label'       => __('Social Network', 'twentyfivenorth'),
            'default'     => '',
            'choices' => twentyfivenorth_social_icons(),
        ),
    )
) );

/**
 * Home page template settings
 */
twentyfivenorth_Kirki::add_section( 'page_home', array(
	'title'		=> __( 'Home Page', 'twentyfivenorth'),
	'priority'	=> 10,
	'capability'=> 'edit_theme_options',
) );

/* Home Page top image or slider */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'home_top',
	'label'       => __( 'Top Image or Slider', 'twentyfivenorth' ),
	'description' => __( 'Choose to use either an image or slider for the top of the home page.  Note - you need to use the Home Page template on the page you selected for your homepage.', 'twentyfivenorth'),
	'section'     => 'page_home',
	'default'     => 'topimage',
	'priority'    => 10,
	'choices'     => array(
		'topimage'   => esc_attr__( 'Top Image', 'twentyfivenorth' ),
		'slider' => esc_attr__( 'Top Slider', 'twentyfivenorth' ),
	),
) );
/* Home Page top image */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'        => 'image',
    'settings'    => 'home_image',
    'label'       => __('Home Page Top Image', 'twentyfivenorth' ),
    'priority'    => 10,
    'default'     => get_template_directory_uri() . '/img/large-main.jpg',
    'description' => esc_attr__('Choose an image for the top of your home page template - our demo image size is 1920 x 1081', 'twentyfivenorth'),
    'section'     => 'page_home',
    'output'      => array(
        array(
            'element'  => '.main-image',
            'property' => 'background-image',
        ),
    ),
	'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'home_top',
            'operator'  => '==',
            'value'     => 'topimage'
        ),
    ),
) );
/* Home Page top slider */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
	'type'		=> 'text',
	'settings'	=> 'home_slider',
	'label'		=> __('Home Page Top Slider', 'twentyfivenorth'),
	'priority'	=> 10,
	'default'	=> '',
	'description'=> __('Insert the shortcode for your slider here', 'twentyfivenorth'),
	'section'	=> 'page_home',
	'sanitize_callback' => 'wp_kses_post',
	'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'home_top',
            'operator'  => '==',
            'value'     => 'slider'
        ),
    ),
) );

/* Home Page infobox Address */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'      => 'textarea',
    'settings'  => 'home_info_address',
    'label'     => __('Top Infobox Address', 'twentyfivenorth'),
    'priority'  => 10,
    'default'   => "25 North Street / Your Town, CO 88888 United States",
    'description'=> __('Insert the property address', 'twentyfivenorth'),
    'section'   => 'page_home',
) );
/* Home Page infobox Price */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'      => 'text',
    'settings'  => 'home_info_price',
    'label'     => __('Top Infobox Price', 'twentyfivenorth'),
    'priority'  => 10,
    'default'   => __('$1,799,000', 'twentyfivenorth'),
    'description'=> __('Insert the property price', 'twentyfivenorth'),
    'section'   => 'page_home',
) );
/* Home Page infobox Description */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'      => 'textarea',
    'settings'  => 'home_info_desc',
    'label'     => __('Top Infobox Description', 'twentyfivenorth'),
    'priority'  => 10,
    'default'   => "Lovely one owner home with an open floor plan on a corner lot!  Spacious living room with fireplace and walk out to a fully fenced backyard with patio.",
    'description'=> __('Insert a property short description', 'twentyfivenorth'),
    'section'   => 'page_home',
) );
/* Home Page infobox Button Text */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'      => 'text',
    'settings'  => 'home_info_btn_text',
    'label'     => __('Top Infobox Button Text', 'twentyfivenorth'),
    'priority'  => 10,
    'default'   => __('SCHEDULE A SHOWING', 'twentyfivenorth'),
    'description'=> __('Insert the button text', 'twentyfivenorth'),
    'section'   => 'page_home',
) );
/* Home Page infobox Button Text */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'      => 'text',
    'settings'  => 'home_info_btn_url',
    'label'     => __('Top Infobox Button Url', 'twentyfivenorth'),
    'priority'  => 10,
    'default'   => __('http://www.example.com', 'twentyfivenorth'),
    'description'=> __('Insert the button url e.g. http://www.example.com', 'twentyfivenorth'),
    'section'   => 'page_home',
) );

/* Home Page enable top features section */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'home_features',
	'label'       => __( 'Top Features section.', 'twentyfivenorth' ),
	'description' => __( 'Enable or Disable the top features section for the home page.  When enabled, choices will appear below.', 'twentyfivenorth' ),
	'section'     => 'page_home',
	'default'     => 'off',
	'priority'    => 10,
	'choices'     => array(
		'on'  => __( 'Enabled', 'twentyfivenorth' ),
		'off' => __( 'Disabled', 'twentyfivenorth' ),
	),
) );

/* Top Features Section 
 * Using customizer select list since Kirki's won't let us add icons.  
 * All direct customize calls go in this block for this section 
 * The priority will keep them all in the correct order
*/
function configure_features_customize($wp_customize) {
    /* Get the icon arrays from font-arrays.php */
    $theme_font_awesome = theme_font_awesome();
    $theme_font_awesome_num = theme_font_awesome_num();
    // build new array with name and icon
    $fa_icons = array();
    foreach ($theme_font_awesome as $k => $v) {
        $fa_icons[$k] = $v . ' ' . str_replace('\f', '&#xf', $theme_font_awesome_num[$k]);
    }

    /* Linear icons */
    $theme_linearicons = theme_linearicons();
    $theme_linearicons_num = theme_linearicons_num();
    $linear_icons = array();
    foreach ($theme_linearicons as $k => $v) {
        $linear_icons[$k] = $v . ' ' . str_replace('\e', '&#xe', $theme_linearicons_num[$k]);
    }


    $wp_customize->add_setting ( 'feature_1_icon', array (
            'default' => 'icon-bed',
        )
    );
    $wp_customize->add_control ( 'feature_1_icon', array (
            'type'  => 'select',
            'label' => __('Top Feature Icon 1', 'twentyfivenorth'),
            'description'   => __('Choose the first icon for the Home Page top feature section', 'twentyfivenorth'),
            'choices'   => $linear_icons,
            'section'   => 'page_home',
            'priority'  => 11,
			'active_callback' => 'features_enabled',
        )
    );
    
    $wp_customize->add_setting ( 'feature_2_icon', array (
            'default' => 'icon-bathtub',
        )
    );
    $wp_customize->add_control ( 'feature_2_icon', array (
            'type'  => 'select',
            'label' => __('Top Feature Icon 2', 'twentyfivenorth'),
            'description'   => __('Choose the first icon for the Home Page top feature section', 'twentyfivenorth'),
            'choices'   => $linear_icons,
            'section'   => 'page_home',
            'priority'  => 13,
			'active_callback' => 'features_enabled',
        )
    );

    $wp_customize->add_setting ( 'feature_3_icon', array (
            'default' => 'icon-car2',
        )
    );
    $wp_customize->add_control ( 'feature_3_icon', array (
            'type'  => 'select',
            'label' => __('Top Feature Icon 3', 'twentyfivenorth'),
            'description'   => __('Choose the first icon for the Home Page top feature section', 'twentyfivenorth'),
            'choices'   => $linear_icons,
            'section'   => 'page_home',
            'priority'  => 15,
			'active_callback' => 'features_enabled',
        )
    );

    $wp_customize->add_setting ( 'feature_4_icon', array (
            'default' => 'icon-pencil-ruler',
        )
    );
    $wp_customize->add_control ( 'feature_4_icon', array (
            'type'  => 'select',
            'label' => __('Top Feature Icon 4', 'twentyfivenorth'),
            'description'   => __('Choose the first icon for the Home Page top feature section', 'twentyfivenorth'),
            'choices'   => $linear_icons,
            'section'   => 'page_home',
            'priority'  => 17,
			'active_callback' => 'features_enabled',
        )
    );
}

/* The check for home features being enabled to display the icons */
function features_enabled($control) {
    if( $control->manager->get_setting('home_features')->value() == 'on') {
        return true;
    } else {
        return false;
    }
}

add_action( 'customize_register', 'configure_features_customize');

/* Top Feature 1 Text */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'      => 'text',
    'settings'  => 'feature_1_text',
    'label'     => __('Top Feature Text 1', 'twentyfivenorth'),
    'priority'  => 12,
    'default'   => '4 Bedrooms',
    'description'=> __('Add your short description', 'twentyfivenorth'),
    'section'   => 'page_home',
	'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'home_features',
            'operator'  => '==',
            'value'     => 'on'
        ),
    ),
) );

/* Top Feature 2 Text */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'      => 'text',
    'settings'  => 'feature_2_text',
    'label'     => __('Top Feature Text 2', 'twentyfivenorth'),
    'priority'  => 14,
    'default'   => '4 Bathrooms',
    'description'=> __('Add your short description', 'twentyfivenorth'),
    'section'   => 'page_home',
	'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'home_features',
            'operator'  => '==',
            'value'     => 'on'
        ),
    ),
) );

/* Top Feature 3 Text */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'      => 'text',
    'settings'  => 'feature_3_text',
    'label'     => __('Top Feature Text 3', 'twentyfivenorth'),
    'priority'  => 16,
    'default'   => '3 Car Garage',
    'description'=> __('Add your short description', 'twentyfivenorth'),
    'section'   => 'page_home',
	'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'home_features',
            'operator'  => '==',
            'value'     => 'on'
        ),
    ),
) );

/* Top Feature 4 Text */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'      => 'text',
    'settings'  => 'feature_4_text',
    'label'     => __('Top Feature Text 4', 'twentyfivenorth'),
    'priority'  => 18,
    'default'   => '4078 sq.ft.',
    'description'=> __('Add your short description', 'twentyfivenorth'),
    'section'   => 'page_home',
	'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'home_features',
            'operator'  => '==',
            'value'     => 'on'
        ),
    ),
) );

/* Seperator */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'      => 'custom',
    'settings'  => 'seperator',
    'label'     => '',
    'section'   => 'page_home',
    'default'   => '<div style="height:1px;border-bottom:1px solid #ccc;"></div>',
    'priority'  => 13
) );

/* Home Page Sections Repeater fields */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'          => 'repeater',
    'settings'      => 'home_sections',
    'label'         => __('Home Page Sections', 'twentyfivenorth'),
    'section'       => 'page_home',
    'description'   => __('Add, Remove, and sort your home page sections.  Sections are setup in the Configure Sections Tab.', 'twentyfivenorth'),
    'priority'      => 20,
    'row_label'   => array(          // row_label is not yet documented in Kirki
        'type' => 'text',
        'value' => __('Page Section', 'twentyfivenorth'),
    ),
    'default'       => array(
    ),

    'fields' => array(
        'section' => array(
            'type'        => 'select',
            'label'       => __('Section', 'twentyfivenorth'),
            'description' => __('Choose a section', 'twentyfivenorth'),
            'default'     => '',
			'choices' => array(
            	'highlights' => __('Property Highlights', 'twentyfivenorth'),
            	'gallery'    => __('Photo Gallery', 'twentyfivenorth'),
            	'additional' => __('Additional Information', 'twentyfivenorth'),
            	'posts'      => __('Recent Posts', 'twentyfivenorth'),
            	'agent'      => __('Featured Agent', 'twentyfivenorth'),
				'builder'	 => __('Page Builder Section', 'twentyfivenorth'),
        	),
        ),
		'page'	=> array(
			'type'        => 'dropdown-pages',
			'label'       => __( 'Page Builder Choice', 'twentyfivenorth' ),
			'description' => __( 'If this is a Page Builder Section, choose the page with content to use.', 'twentyfivenorth'),
			'default'     => '',
		),
    )
) );

/**
 * About Us template settings
 */
twentyfivenorth_Kirki::add_section( 'page_about', array(
    'title'     => __( 'About Us Page', 'twentyfivenorth'),
    'priority'  => 10,
    'capability'=> 'edit_theme_options',
) );

/* About Us Sections Repeater fields */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'          => 'repeater',
    'settings'      => 'about_sections',
    'label'         => __('About Us Sections', 'twentyfivenorth'),
    'section'       => 'page_about',
    'description'   => __('Add, Remove, and sort your about us page sections.  Sections are setup in the Configure Sections Tab.', 'twentyfivenorth'),
    'priority'      => 10,
    'row_label'   => array(          // row_label is not yet documented in Kirki
        'type' => 'text',
        'value' => __('Page Section', 'twentyfivenorth'),
    ),
    'default'       => array(
    ),

    'fields' => array(
        'section' => array(
            'type'        => 'select',
            'label'       => __('Section', 'twentyfivenorth'),
            'description' => __('Choose a section', 'twentyfivenorth'),
            'default'     => '',
            'choices' => array(
				'na'			=> __('Select A Section', 'twentyfivenorth'),
                'topagents'     => __('Top Agents Slider', 'twentyfivenorth'),
                'testimonials'  => __('Testimonials', 'twentyfivenorth'),
                'contact'       => __('Contact Us Section', 'twentyfivenorth'),
                'aboutmap'      => __('Map', 'twentyfivenorth'),
                'builder'       => __('Page Builder Section', 'twentyfivenorth'),
            ),
        ),
        'page'  => array(
            'type'        => 'dropdown-pages',
            'label'       => __( 'Page Builder Choice', 'twentyfivenorth' ),
            'description' => __( 'If this is a Page Builder Section, choose the page with content to use.', 'twentyfivenorth'),
            'default'     => '',
        ),
    )
) );



/**
 * Add the 404 page template settings
 */
twentyfivenorth_Kirki::add_section( 'page_404', array(
	'title'		=> esc_attr__( '404 Page', 'twentyfivenorth' ),
	'priority'	=> 10,
	'capability'=> 'edit_theme_options',
) );
/* 404 Page Background Image */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
	'type'		=> 'image',
	'settings'	=> 'background_404',
	'label'		=> __('404 Page background image', 'twentyfivenorth' ),
	'priority'	=> 10,
	'default'	=>  get_template_directory_uri() . '/img/gallery-bg.jpg',
	'description'=> esc_attr__('Choose an image for the background for your 404 page template - our demo image size is 1920 x 1438', 'twentyfivenorth'),
	'section'   => 'page_404',
	'output' => array(
        array(
            'element' => '.overlay-col',
			'property' => 'background-image',
        ),
    ),
) );
/* 404 Top Heading */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'      => 'textarea',
    'settings'  => 'page_404_heading',
    'label'     => __('Top Heading', 'twentyfivenorth'),
    'priority'  => 10,
    'default'   => "The Page Cannot Be Found",
    'description'=> __('Insert the Heading below 404', 'twentyfivenorth'),
    'section'   => 'page_404',
) );
/* 404 Heading Description */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'      => 'textarea',
    'settings'  => 'page_404_hdesc',
    'label'     => __('Heading description', 'twentyfivenorth'),
    'priority'  => 10,
    'default'   => 'The page you are looking for has either moved or does not exist.  Please use the link below to return to our home page.',
    'description'=> __('Insert the description below the heading', 'twentyfivenorth'),
    'section'   => 'page_404',
) );
/* 404 Banner */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'      => 'textarea',
    'settings'  => 'page_404_banner',
    'label'     => __('Banner Text', 'twentyfivenorth'),
    'priority'  => 10,
    'default'   => 'Let us help you find your way home.',
    'description'=> __('Insert the text for the banner below', 'twentyfivenorth'),
    'section'   => 'page_404',
) );
/* 404 Banner Button Text */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'      => 'text',
    'settings'  => 'page_404_btn',
    'label'     => __('Banner Button Text', 'twentyfivenorth'),
    'priority'  => 10,
    'default'   => 'Go Home',
    'description'=> __('Insert the home button text', 'twentyfivenorth'),
    'section'   => 'page_404',
) );

/**
 * Configure Sections - Configuration of the Home and about us page sections, also will be available via shortcode
 */
twentyfivenorth_Kirki::add_section( 'configure_sections', array(
	'title'		=> esc_attr__( 'Configure Sections', 'twentyfivenorth' ),
	'priority'	=> 10,
	'capability'=> 'edit_theme_options',
) );

/* Section to configure choice */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
	'type'        => 'select',
	'settings'	  => 'section_choice',
	'priority'	  => 10,
	'default'	  => 'na',
	'section'	  => 'configure_sections',
	'label'       => __('Section', 'twentyfivenorth'),
	'description' => __('Choose a section', 'twentyfivenorth'),
	'default'     => '',
	'choices' => array(
		'na'		   => __('Choose a section', 'twentyfivenorth'),
		'highlights'   => __('Home - Property Highlights', 'twentyfivenorth'),
		'gallery'      => __('Home - Photo Gallery', 'twentyfivenorth'),
		'additional'   => __('Home - Additional Information', 'twentyfivenorth'),
		'posts'        => __('Home - Recent Posts', 'twentyfivenorth'),
		'agent'        => __('Home - Featured Agent', 'twentyfivenorth'),
		'topagents'    => __('About - Top Agents', 'twentyfivenorth'),
		'testimonials' => __('About - Testimonials', 'twentyfivenorth'),
		'contact'      => __('About - Contact', 'twentyfivenorth'),
		'aboutmap'     => __('About - Map', 'twentyfivenorth'),
    ),
	/* 'transport' => 'postMessage', */  // just prevent refreshing, nothing needs to be sent...I think
	/* Doesn't work with active_callback dependencies...maybe we can do our own javascript to hide / show options this way */
) );

/* Highlight Title */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
	'type'			=> 'text',
	'settings'		=> 'highlights_title',
	'priority'		=> 10,
	'default'		=> 'Property Highlights',
	'section'		=> 'configure_sections',
	'label'			=> __('Set the Highlights section title', 'twentyfivenorth'),
	'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'highlights'
        ),
    ),
) );
/* Highlights Description */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'          => 'textarea',
    'settings'      => 'highlights_desc',
    'priority'      => 10,
    'default'       => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut blandit nisi a dictum tristique.',
    'section'       => 'configure_sections',
    'label'         => __('Set the Highlights section description', 'twentyfivenorth'),
	'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'highlights'
        ),
    ),
) );

/* Highlights Section Icons
 * Using customizer select list since Kirki's won't let us add icons.  
 * All direct customize calls go in this block for this section 
 * The priority will keep them all in the correct order
*/
function configure_sections_customize($wp_customize) {
    /* Get the icon arrays from font-arrays.php */
    $theme_font_awesome = theme_font_awesome();
    $theme_font_awesome_num = theme_font_awesome_num();
    // build new array with name and icon
    $fa_icons = array();
    foreach ($theme_font_awesome as $k => $v) {
        $fa_icons[$k] = $v . ' ' . str_replace('\f', '&#xf', $theme_font_awesome_num[$k]);
    }

	/* Highlights icon 1 */
    $wp_customize->add_setting ( 'highlight_1_icon', array (
            'default' => 'fa-heart',
        )
    );
    $wp_customize->add_control ( 'highlight_1_icon', array (
            'type'  => 'select',
            'label' => __('Highlight Icon 1', 'twentyfivenorth'),
            'description'   => __('Choose an icon for the Home Page Highlight Section', 'twentyfivenorth'),
            'choices'   => $fa_icons,
            'section'   => 'configure_sections',
            'priority'  => 11,
            'active_callback' => 'highlights_enabled',
        )
    );

	/* Highlights icon 2 */
    $wp_customize->add_setting ( 'highlight_2_icon', array (
            'default' => 'fa-file-image-o',
        )
    );
    $wp_customize->add_control ( 'highlight_2_icon', array (
            'type'  => 'select',
            'label' => __('Highlight Icon 2', 'twentyfivenorth'),
            'description'   => __('Choose an icon for the Home Page Highlight Section', 'twentyfivenorth'),
            'choices'   => $fa_icons,
            'section'   => 'configure_sections',
            'priority'  => 14,
            'active_callback' => 'highlights_enabled',
        )
    );
	
	/* Highlights icon 3 */
    $wp_customize->add_setting ( 'highlight_3_icon', array (
            'default' => 'fa-briefcase',
        )
    );
    $wp_customize->add_control ( 'highlight_3_icon', array (
            'type'  => 'select',
            'label' => __('Highlight Icon 3', 'twentyfivenorth'),
            'description'   => __('Choose an icon for the Home Page Highlight Section', 'twentyfivenorth'),
            'choices'   => $fa_icons,
            'section'   => 'configure_sections',
            'priority'  => 17,
            'active_callback' => 'highlights_enabled',
        )
    );
}

/* The check for highlights being selected to display the icons */
function highlights_enabled($control) {
    if( $control->manager->get_setting('section_choice')->value() == 'highlights') {
        return true;
    } else {
        return false;
    }
}

add_action( 'customize_register', 'configure_sections_customize');

/* Highlight 1 Title */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'      => 'text',
    'settings'  => 'highlight_1_title',
    'label'     => __('Highlight 1 Title', 'twentyfivenorth'),
    'priority'  => 12,
    'default'   => 'Creative Interior Design',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'highlights'
        ),
    ),
) );

/* Highlight 1 Text */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'      => 'textarea',
    'settings'  => 'highlight_1_text',
    'label'     => __('Highlight 1 Text', 'twentyfivenorth'),
    'priority'  => 13,
    'default'   => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque lauda.',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'highlights'
        ),
    ),
) );

/* Highlight 2 Title */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'      => 'text',
    'settings'  => 'highlight_2_title',
    'label'     => __('Highlight 2 Title', 'twentyfivenorth'),
    'priority'  => 15,
    'default'   => 'Fabulous Views',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'highlights'
        ),
    ),
) );

/* Highlight 2 Text */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'      => 'textarea',
    'settings'  => 'highlight_2_text',
    'label'     => __('Highlight 2 Text', 'twentyfivenorth'),
    'priority'  => 16,
    'default'   => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque lauda.',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'highlights'
        ),
    ),
) );

/* Highlight 3 Title */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'      => 'text',
    'settings'  => 'highlight_3_title',
    'label'     => __('Highlight 3 Title', 'twentyfivenorth'),
    'priority'  => 18,
    'default'   => 'Quite Neighborhood',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'highlights'
        ),
    ),
) );

/* Highlight 3 Text */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'      => 'textarea',
    'settings'  => 'highlight_3_text',
    'label'     => __('Highlight 3 Text', 'twentyfivenorth'),
    'priority'  => 19,
    'default'   => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque lauda.',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'highlights'
        ),
    ),
) );

/* Seperator */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'      => 'custom',
    'settings'  => 'seperator',
    'label'     => '',
    'section'   => 'configure_sections',
    'default'   => '<div style="height:1px;border-bottom:1px solid #ccc;"></div>',
    'priority'  => 20
) );

/* Highlight slider enable */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'highlight_slides_enable',
    'label'       => __( 'Highlight Slider', 'twentyfivenorth' ),
    'description' => __( 'Enable or disable the highlight slider. Note - you need at least 2 slides.', 'twentyfivenorth'),
    'section'     => 'configure_sections',
    'default'     => 'enable',
    'priority'    => 21,
    'choices'     => array(
        'enable'   => esc_attr__( 'Enable', 'twentyfivenorth' ),
        'disable' => esc_attr__( 'Disable', 'twentyfivenorth' ),
    ),
	'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'highlights'
        ),
    ),
) );

/* Highligh slides */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'          => 'repeater',
    'settings'      => 'highlight_slides',
    'label'         => __('Slide settings', 'twentyfivenorth'),
    'section'       => 'configure_sections',
    'description'   => __('Set up the slides for the highlights section.', 'twentyfivenorth'),
    'priority'      => 22,
    'row_label'   => array(          // row_label is not yet documented in Kirki
        'type' => 'text',
        'value' => __('Slide', 'twentyfivenorth'),
    ),
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'highlight_slides_enable',
            'operator'  => '==',
            'value'     => 'enable'
        ),
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'highlights'
        ),
    ),
    'default'       => array(
    ),

    'fields' => array(
        'slide_title' => array(
            'type'        => 'text',
            'label'       => __('Title', 'twentyfivenorth'),
            'description' => __('This is the slide title', 'twentyfivenorth'),
            'default'     => 'Interior Details',
        ),
        'slide_text' => array(
            'type'        => 'textarea',
            'label'       => __('Slide Text', 'twentyfivenorth'),
            'default'     => 'Debitis euripidis expetendis eos an, vim case complectitur ut, ex discere utroque contentiones qui. Augue vitae reprimique cu usu.',
        ),
		'slide_feature_list' => array(
			'type'		  => 'textarea',
			'label'		  => __('Feature list, separate items with commas', 'twentyfivenorth'),
			'default'	  => 'Year Built: 2016, Appliances: Included, Fireplace: Gas, Heating: Natural Gas, Laundry: Main Level, Basement: Full',
		),
		'slide_feature_text' => array(
			'type'		  => 'text',
			'label'		  => __('Slide feature text', 'twentyfivenorth'),
			'default'	  => 'Total sq.ft.',
		),
		'slide_feature_text_2' => array(
			'type'		  => 'text',
			'label'		  => __('Slide feature text 2', 'twentyfivenorth'),
			'default'	  => '4,078',
		),
		'slide_image'	=> array(
			'type'		  => 'image',
			'label'		  => __('Slide Image', 'twentyfivenorth'),
			'default'	  => '',
		),
    )
) );

/* Configure Sections Photo Section */

/* Photo Section Title */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'      => 'text',
    'settings'  => 'gallery_title',
    'label'     => __('Photo Gallery Title', 'twentyfivenorth'),
    'priority'  => 10,
    'default'   => 'Photo Gallery',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'gallery'
        ),
    ),
) );

/* Photo Section Description */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'      => 'textarea',
    'settings'  => 'gallery_text',
    'label'     => __('Photo Gallery Description', 'twentyfivenorth'),
    'priority'  => 10,
    'default'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut blandit nisi a dictum tristique.',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'gallery'
        ),
    ),
) );

/* Photo Section Banner Enable */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'gallery_banner_enable',
    'label'       => __( 'Enable Banner', 'twentyfivenorth' ),
    'description' => __( 'Enable or disable the bottom gallery banner and link.', 'twentyfivenorth'),
    'section'     => 'configure_sections',
    'default'     => 'enable',
    'priority'    => 10,
    'choices'     => array(
        'enable'   => esc_attr__( 'Enable', 'twentyfivenorth' ),
        'disable' => esc_attr__( 'Disable', 'twentyfivenorth' ),
    ),
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'gallery'
        ),
    ),
) );

/* Photo Section Banner Text */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'      => 'textarea',
    'settings'  => 'gallery_banner_text',
    'label'     => __('Photo Gallery Banner Text', 'twentyfivenorth'),
    'priority'  => 10,
    'default'   => 'TRY A 360° VIRTUAL TOUR IN THIS HOUSE',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'gallery'
        ),
		array(
            'setting'   => 'gallery_banner_enable',
            'operator'  => '==',
            'value'     => 'enable'
        ),
    ),
) );
/* Photo Section Banner Button Text */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'      => 'text',
    'settings'  => 'gallery_banner_btn_text',
    'label'     => __('Photo Gallery Banner Text', 'twentyfivenorth'),
    'priority'  => 10,
    'default'   => 'Take a Look',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'gallery'
        ),
        array(
            'setting'   => 'gallery_banner_enable',
            'operator'  => '==',
            'value'     => 'enable'
        ),
    ),
) );
/* Photo Section Banner Button Link */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'      => 'text',
    'settings'  => 'gallery_banner_btn_link',
    'label'     => __('Photo Gallery Banner Link', 'twentyfivenorth'),
	'description' => __('Link in the form http://www.example.com', 'twentyfivenorth'),
    'priority'  => 10,
    'default'   => 'http://www.example.com',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'gallery'
        ),
        array(
            'setting'   => 'gallery_banner_enable',
            'operator'  => '==',
            'value'     => 'enable'
        ),
    ),
) );
/* Photo Section Banner Enable */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'gallery_banner_btn_window',
    'label'       => __( 'Banner Button Link Window', 'twentyfivenorth' ),
    'description' => __( 'Choose to open link in new or existing window.', 'twentyfivenorth'),
    'section'     => 'configure_sections',
    'default'     => 'blank',
    'priority'    => 10,
    'choices'     => array(
        'blank'   => __( 'Blank Page', 'twentyfivenorth' ),
        'self' => __( 'Same Page', 'twentyfivenorth' ),
    ),
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'gallery'
        ),
		array(
            'setting'   => 'gallery_banner_enable',
            'operator'  => '==',
            'value'     => 'enable'
        ),
    ),
) );

/* Photo Section Background Image */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'        => 'image',
    'settings'    => 'gallery_background',
    'label'       => __( 'Photo Gallery Background Image', 'twentyfivenorth' ),
    'description' => __( 'Choose a background image for the photo gallery section.  All images and categories are set under the Port
folio Entries tab in your WordPress admin.', 'twentyfivenorth' ),
    'section'     => 'configure_sections',
    'default'     => '',
    'priority'    => 10,
    'output'      => array(
        array(
            'element'  => '.overlay-col',
            'property' => 'background-image',
        ),
    ),
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'gallery'
        ),
    ),
) );


/* 
 * Additional Information Section 
 */
/* Additional Information title */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'      => 'text',
    'settings'  => 'additional_title',
    'label'     => __('Additional Information Title', 'twentyfivenorth'),
    'priority'  => 10,
    'default'   => 'Additional Information',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'additional'
        ),
    ),
) );
/* Additional Information description */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'      => 'textarea',
    'settings'  => 'additional_text',
    'label'     => __('Additional Information Description', 'twentyfivenorth'),
    'priority'  => 10,
    'default'   => 'Lorum ipsum dolor sit amet, consectetur adipiscing elit. Ut blandit nisi a dictum tristique.',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'additional'
        ),
    ),
) );

/* Additional Information Icons */
function configure_additional_customize($wp_customize) {
    /* Linear icons */
    $theme_linearicons = theme_linearicons();
    $theme_linearicons_num = theme_linearicons_num();
    $linear_icons = array();
    foreach ($theme_linearicons as $k => $v) {
        $linear_icons[$k] = $v . ' ' . str_replace('\e', '&#xe', $theme_linearicons_num[$k]);
    }


    $wp_customize->add_setting ( 'additional_1_icon', array (
            'default' => 'icon-bandage',
        )
    );
    $wp_customize->add_control ( 'additional_1_icon', array (
            'type'  => 'select',
            'label' => __('Additional Icon 1', 'twentyfivenorth'),
            'description'   => __('Choose an icon for the Additional Information area.', 'twentyfivenorth'),
            'choices'   => $linear_icons,
            'section'   => 'configure_sections',
            'priority'  => 11,
            'active_callback' => 'additional_enabled',
        )
    );

	$wp_customize->add_setting ( 'additional_2_icon', array (
            'default' => 'icon-bus',
        )
    );
    $wp_customize->add_control ( 'additional_2_icon', array (
            'type'  => 'select',
            'label' => __('Additional Icon 2', 'twentyfivenorth'),
            'description'   => __('Choose an icon for the Additional Information area.', 'twentyfivenorth'),
            'choices'   => $linear_icons,
            'section'   => 'configure_sections',
            'priority'  => 13,
            'active_callback' => 'additional_enabled',
        )
    );
	
	$wp_customize->add_setting ( 'additional_3_icon', array (
            'default' => 'icon-cart',
        )
    );
    $wp_customize->add_control ( 'additional_3_icon', array (
            'type'  => 'select',
            'label' => __('Additional Icon 3', 'twentyfivenorth'),
            'description'   => __('Choose an icon for the Additional Information area.', 'twentyfivenorth'),
            'choices'   => $linear_icons,
            'section'   => 'configure_sections',
            'priority'  => 15,
            'active_callback' => 'additional_enabled',
        )
    );

	$wp_customize->add_setting ( 'additional_4_icon', array (
            'default' => 'icon-tree',
        )
    );
    $wp_customize->add_control ( 'additional_4_icon', array (
            'type'  => 'select',
            'label' => __('Additional Icon 4', 'twentyfivenorth'),
            'description'   => __('Choose an icon for the Additional Information area.', 'twentyfivenorth'),
            'choices'   => $linear_icons,
            'section'   => 'configure_sections',
            'priority'  => 17,
            'active_callback' => 'additional_enabled',
        )
    );
}

/* The check for the additional information section being selected to display the icons */
function additional_enabled($control) {
    if( $control->manager->get_setting('section_choice')->value() == 'additional') {
        return true;
    } else {
        return false;
    }
}

add_action( 'customize_register', 'configure_additional_customize');

/* Additional Icon Text */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'      => 'text',
    'settings'  => 'additional_1_text',
    'label'     => __('Icon 1 Text', 'twentyfivenorth'),
    'priority'  => 12,
    'default'   => 'Nearby Hostpitals',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'additional'
        ),
    ),
) );

/* Additional Icon Text */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'      => 'text',
    'settings'  => 'additional_2_text',
    'label'     => __('Icon 2 Text', 'twentyfivenorth'),
    'priority'  => 14,
    'default'   => 'Excellent Schools',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'additional'
        ),
    ),
) );

/* Additional Icon Text */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'      => 'text',
    'settings'  => 'additional_3_text',
    'label'     => __('Icon 3 Text', 'twentyfivenorth'),
    'priority'  => 16,
    'default'   => 'Nearby Shopping',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'additional'
        ),
    ),
) );

/* Additional Icon Text */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'      => 'text',
    'settings'  => 'additional_4_text',
    'label'     => __('Icon 4 Text', 'twentyfivenorth'),
    'priority'  => 18,
    'default'   => 'Neighborhood Parks',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'additional'
        ),
    ),
) );

/* Additional Button Text */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'      => 'text',
    'settings'  => 'additional_btn_text',
    'label'     => __('Additional Information Button Text', 'twentyfivenorth'),
    'priority'  => 19,
    'default'   => 'Contact Us',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'additional'
        ),
    ),
) );

/* Additional Button Text */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'      => 'text',
    'settings'  => 'additional_btn_link',
    'label'     => __('Additional Information Button Link', 'twentyfivenorth'),
    'priority'  => 20,
    'default'   => 'http://www.example.com',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'additional'
        ),
    ),
) );

/* Additional Button Window */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'additional_btn_window',
    'label'       => __( 'Button Link Window', 'twentyfivenorth' ),
    'description' => __( 'Choose to open link in new or existing window.', 'twentyfivenorth'),
    'section'     => 'configure_sections',
    'default'     => 'blank',
    'priority'    => 21,
    'choices'     => array(
        'blank'   => __( 'Blank Page', 'twentyfivenorth' ),
        'self' => __( 'Same Page', 'twentyfivenorth' ),
    ),
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'additional'
        ),
    ),
) );

/* 
 * Posts Section Configure
 */

/* Posts Title */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'      => 'text',
    'settings'  => 'posts_title',
    'label'     => __('Posts Section Title', 'twentyfivenorth'),
    'priority'  => 10,
    'default'   => 'Recent Posts',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'posts'
        ),
    ),
) );

/* Posts Description */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'      => 'textarea',
    'settings'  => 'posts_text',
    'label'     => __('Posts Section Description', 'twentyfivenorth'),
    'priority'  => 10,
    'default'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut blandit nisi a dictum tristique.',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'posts'
        ),
    ),
) );

/* Section to configure choice */
$posts_num = array();
for ($i=1;$i<=25; $i++) {
	$posts_num[$i] = $i;
}
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'        => 'select',
    'settings'    => 'posts_number',
    'priority'    => 10,
    'default'     => 'na',
    'section'     => 'configure_sections',
    'label'       => __('Posts', 'twentyfivenorth'),
    'description' => __('Choose the number of posts to display in this section', 'twentyfivenorth'),
    'default'     => '2',
    'choices' => $posts_num,
	'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'posts'
        ),
    ),
) );
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'        => 'select',
    'settings'    => 'posts_sort',
    'priority'    => 10,
    'default'     => 'na',
    'section'     => 'configure_sections',
    'label'       => __('Posts Sorting', 'twentyfivenorth'),
    'description' => __('Choose how you would like to sort the posts', 'twentyfivenorth'),
    'default'     => 'asc',
    'choices' => array( 
		'ASC' => __('Ascending', 'twentyfivenorth'),
		'DESC'=> __('Descending', 'twentyfivenorth')
	),
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'posts'
        ),
    ),
) );
/* Post Attributes */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
	'type'        => 'sortable',
	'settings'    => 'posts_atts',
	'label'       => __( 'Choose the meta attributes to display', 'twentyfivenorth' ),
	'description' => __( '3 or less recommended for display', 'twentyfivenorth' ),
	'section'     => 'configure_sections',
	'default'     => array(
		'comments',
		'like',
	),
	'choices'     => array(
		'comments' => esc_attr__( 'Comments', 'twentyfivenorth' ),
		'like' => esc_attr__( 'Like', 'twentyfivenorth' ),
		'author' => esc_attr__( 'Author', 'twentyfivenorth' ),
		'date' => esc_attr__( 'Date', 'twentyfivenorth' ),
	),
	'priority'    => 10,
	'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'posts'
        ),
    ),
) );

/**
 * Featured Agent Section
 */

/* Agent Title */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'      => 'text',
    'settings'  => 'agent_title',
    'label'     => __('Agent Title', 'twentyfivenorth'),
    'priority'  => 10,
    'default'   => 'Presented By',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'agent'
        ),
    ),
) );

/* Agent Description */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'      => 'textarea',
    'settings'  => 'agent_desc',
    'label'     => __('Agent Description', 'twentyfivenorth'),
    'priority'  => 10,
    'default'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut blandit nisi a dictum tristique.',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'agent'
        ),
    ),
) );

/* Agent Name */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'      => 'text',
    'settings'  => 'agent_name',
    'label'     => __('Agent Name', 'twentyfivenorth'),
    'priority'  => 10,
    'default'   => 'Janice Smith',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'agent'
        ),
    ),
) );

/* Agent Credentials */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'      => 'textarea',
    'settings'  => 'agent_cred',
    'label'     => __('Agent Credentials', 'twentyfivenorth'),
    'priority'  => 10,
    'default'   => 'Realtor / Broker Associate - GRI, ABR',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'agent'
        ),
    ),
) );

/* Agent Credentials */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'      => 'textarea',
    'settings'  => 'agent_info',
    'label'     => __('Agent Information', 'twentyfivenorth'),
    'priority'  => 10,
    'default'   => 'His nonumes consequat id, ignota iriure mei in. Elit latine fastidii ex mea, ius cu solet veritus concludaturque. Mel at appetere salutatus intellegat, ut per posse iriure propriae, minim oblique ut nam. Quem necessitatibus eu sit, duo ne phaedrum aliquando dissentiet, simul persecuti te usu.',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'agent'
        ),
    ),
) );

/* Agent Photo */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'          => 'image',
    'settings'      => 'agent_photo',
    'label'         => __('Insert your agent photo', 'twentyfivenorth'),
    'section'       => 'configure_sections',
    'description'   => __( 'Demo image is 350px x 558px', 'twentyfivenorth'),
    'priority'      => 10,
    'default'       => '',
	'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'agent'
        ),
    ),
) );

/* Agent Button Text */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'      => 'text',
    'settings'  => 'agent_btn_text',
    'label'     => __('Agent Button Text', 'twentyfivenorth'),
    'priority'  => 10,
    'default'   => 'Schedule A Showing',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'agent'
        ),
    ),
) );
/* Agent Button Link */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'      => 'text',
    'settings'  => 'agent_btn_link',
    'label'     => __('Agent Button Link', 'twentyfivenorth'),
    'description' => __('Link in the form http://www.example.com', 'twentyfivenorth'),
    'priority'  => 10,
    'default'   => 'http://www.example.com',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'agent'
        ),
    ),
) );
/* Agent Button Window */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'agent_btn_window',
    'label'       => __( 'Agent Button Link Window', 'twentyfivenorth' ),
    'description' => __( 'Choose to open link in new or existing window.', 'twentyfivenorth'),
    'section'     => 'configure_sections',
    'default'     => 'blank',
    'priority'    => 10,
    'choices'     => array(
        'blank'   => __( 'Blank Page', 'twentyfivenorth' ),
        'self' => __( 'Same Page', 'twentyfivenorth' ),
    ),
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'agent'
		),
	),
) );

/* Agent Enable Infobar */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'agent_infobar',
    'label'       => __( 'Enable Infobar below agent?', 'twentyfivenorth' ),
    'section'     => 'configure_sections',
    'default'     => 'enable',
    'priority'    => 10,
    'choices'     => array(
        'enable'   => __( 'Enable', 'twentyfivenorth' ),
        'disable' => __( 'Disable', 'twentyfivenorth' ),
    ),
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'agent'
        ),
    ),
) );

/* Agent Contacts
 * Using customizer select list since Kirki's won't let us add icons.  
 * All direct customize calls go in this block for this section 
 * The priority will keep them all in the correct order
*/
function configure_agent_customize($wp_customize) {
    /* Get the icon arrays from font-arrays.php */
    $theme_font_awesome = theme_font_awesome();
    $theme_font_awesome_num = theme_font_awesome_num();
    // build new array with name and icon
    $fa_icons = array();
    foreach ($theme_font_awesome as $k => $v) {
        $fa_icons[$k] = $v . ' ' . str_replace('\f', '&#xf', $theme_font_awesome_num[$k]);
    }

    $wp_customize->add_setting ( 'agent_1_icon', array (
            'default' => 'fa-map-marker',
        )
    );
    $wp_customize->add_control ( 'agent_1_icon', array (
            'type'  => 'select',
            'label' => __('Agent Info Icon 1', 'twentyfivenorth'),
            'choices'   => $fa_icons,
            'section'   => 'configure_sections',
            'priority'  => 11,
            'active_callback' => 'agent_infobar_enabled',
        )
    );
   
    $wp_customize->add_setting ( 'agent_2_icon', array (
            'default' => 'fa-phone',
        )
    );
    $wp_customize->add_control ( 'agent_2_icon', array (
            'type'  => 'select',
            'label' => __('Agent Info Icon 2', 'twentyfivenorth'),
            'choices'   => $fa_icons,
            'section'   => 'configure_sections',
            'priority'  => 13,
            'active_callback' => 'agent_infobar_enabled',
        )
    );

    $wp_customize->add_setting ( 'agent_3_icon', array (
            'default' => 'fa-envelope-o',
        )
    );
    $wp_customize->add_control ( 'agent_3_icon', array (
            'type'  => 'select',
            'label' => __('Agent Info Icon 3', 'twentyfivenorth'),
            'choices'   => $fa_icons,
            'section'   => 'configure_sections',
            'priority'  => 15,
            'active_callback' => 'agent_infobar_enabled',
        )
    );
}

/* The check for home features being enabled to display the icons */
function agent_infobar_enabled($control) {
    if( $control->manager->get_setting('agent_infobar')->value() == 'enable'
		&& $control->manager->get_setting('section_choice')->value() == 'agent' ) {
        return true;
    } else {
        return false;
    }
}

add_action( 'customize_register', 'configure_agent_customize');

/* Agent Infobar text */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'      => 'text',
    'settings'  => 'agent_1_text',
    'label'     => __('Agent Info 1 Text', 'twentyfivenorth'),
    'priority'  => 12,
    'default'   => '25 North Street / Your Town, CO 88888 United States.',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'agent'
        ),
		array(
			'setting'	=> 'agent_infobar',
			'operator'	=> '==',
			'value'		=> 'enable'
		),
    ),
) );

/* Agent Infobar text */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'      => 'text',
    'settings'  => 'agent_2_text',
    'label'     => __('Agent Info 2 Text', 'twentyfivenorth'),
    'priority'  => 14,
    'default'   => 'Phone: (+314) 0454 3234 23',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'agent'
        ),
        array(
            'setting'   => 'agent_infobar',
            'operator'  => '==',
            'value'     => 'enable'
		),
    ),
) );

/* Agent Infobar text */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'      => 'text',
    'settings'  => 'agent_3_text',
    'label'     => __('Agent Info 3 Text', 'twentyfivenorth'),
    'priority'  => 16,
    'default'   => 'Email: NOREPLY@GMAIL.COM',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'agent'
        ),
        array(
            'setting'   => 'agent_infobar',
            'operator'  => '==',
            'value'     => 'enable'
		),
    ),
) );

/* Agent Enable Map */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'agent_map',
    'label'       => __( 'Enable Map below agent?', 'twentyfivenorth' ),
    'section'     => 'configure_sections',
    'default'     => 'enable',
    'priority'    => 17,
    'choices'     => array(
        'enable'   => __( 'Enable', 'twentyfivenorth' ),
        'disable' => __( 'Disable', 'twentyfivenorth' ),
    ),
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'agent'
        ),
    ),
) );

/* Agent Map Marker */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'          => 'image',
    'settings'      => 'agent_map_marker',
    'label'         => __('Insert your map marker', 'twentyfivenorth'),
    'section'       => 'configure_sections',
    'priority'      => 18,
    'default'       => '',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'agent'
        ),
		array(
            'setting'   => 'agent_map',
            'operator'  => '==',
            'value'     => 'enable'
        ),
    ),
) );

/* Agent Map latitude */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'          => 'text',
    'settings'      => 'agent_map_lat',
    'label'         => __('Insert the location latitude', 'twentyfivenorth'),
    'section'       => 'configure_sections',
    'priority'      => 19,
    'default'       => '39.7645187',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'agent'
        ),
		array(
            'setting'   => 'agent_map',
            'operator'  => '==',
            'value'     => 'enable'
        ),
    ),
) );

/* Agent Map longitude */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'          => 'text',
    'settings'      => 'agent_map_lng',
    'label'         => __('Insert the location longitude', 'twentyfivenorth'),
    'section'       => 'configure_sections',
    'priority'      => 20,
    'default'       => '-104.9951951',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'agent'
        ),
        array(
            'setting'   => 'agent_map',
            'operator'  => '==',
            'value'     => 'enable'
        ),
    ),
) );

/**
 * About Us - Top Agents 
 */
/* Top Agents Title */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'          => 'text',
    'settings'      => 'topagents_title',
    'label'         => __('Add your Agents Slider Title', 'twentyfivenorth'),
    'section'       => 'configure_sections',
    'priority'      => 10,
    'default'       => 'Our Top Agents',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'topagents'
        ),
    ),
) );
/* Top Agents Description */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'          => 'textarea',
    'settings'      => 'topagents_text',
    'label'         => __('Add your Agents Slider Description', 'twentyfivenorth'),
    'section'       => 'configure_sections',
    'priority'      => 10,
    'default'       => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut blandit nisi a dictum tristique.',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'topagents'
        ),
    ),
) );

/* Add empty icon for no social icon to display */
$orig_social_icons = twentyfivenorth_social_icons();
$prepend = array(
	'na' => __('Select An Icon', 'twentyfivenorth')
);
$mod_social_icons = array_merge($prepend, $orig_social_icons);

/* Top Agents Section Repeater fields */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'          => 'repeater',
    'settings'      => 'topagents_agents',
    'label'         => __('Agents', 'twentyfivenorth'),
    'section'       => 'configure_sections',
    'description'   => __('Add, Remove, and sort your agents and their info.', 'twentyfivenorth'),
    'priority'      => 10,
    'row_label'   => array(          // row_label is not yet documented in Kirki
        'type' => 'text',
        'value' => __('Agent', 'twentyfivenorth'),
    ),
	'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'topagents'
        ),
    ),
    'default'       => array(
    ),

    'fields' => array(
        'agent_photo' => array(
            'type'        => 'image',
            'label'       => __('Agent Photo', 'twentyfivenorth'),
            'default'     => '',
        ),
		'agent_name' => array(
			'type'		  => 'text',
			'label'		  => __('Agent Name', 'twentyfivenorth'),
			'default'	  => 'Stephan Ivanovs'
		),
		'agent_title' => array(
			'type'		  => 'text',
			'label'		  => __('Agent Title', 'twentyfivenorth'),
			'default'	  => 'Real Estate Agent',
		),
		'agent_phone' => array(
			'type'		  => 'text',
			'label'		  => __('Agent Phone', 'twentyfivenorth'),
			'default'	  => '(220) 345 675',
		),
		'agent_email' => array(
			'type'		  => 'text',
			'label'		  => __('Agent Email', 'twentyfivenorth'),
			'default'	  => 'noreply@gmail.com',
		),
		'social_choice_1' => array(
            'type'        => 'select',
            'label'       => __('Social Network', 'twentyfivenorth'),
            'default'     => 'na',
            'choices' => $mod_social_icons,
        ),
		'social_url_1'	  => array(
			'type'		  => 'text',
			'label'		  => __('Social Link (e.g. http://www.example.com)', 'twentyfivenorth'),
			'default'	  => 'http://www.example.com',
		),
		'social_choice_2' => array(
            'type'        => 'select',
            'label'       => __('Social Network 2', 'twentyfivenorth'),
            'default'     => 'na',
            'choices' => $mod_social_icons,
        ),
        'social_url_2'    => array(
            'type'        => 'text',
            'label'       => __('Social Link 2 (e.g. http://www.example.com)', 'twentyfivenorth'),
            'default'     => 'http://www.example.com',
        ),  
		'social_choice_3' => array(
            'type'        => 'select',
            'label'       => __('Social Network 3', 'twentyfivenorth'),
            'default'     => 'na',
            'choices' => $mod_social_icons,
        ),
        'social_url_3'    => array(
            'type'        => 'text',
            'label'       => __('Social Link 3 (e.g. http://www.example.com)', 'twentyfivenorth'),
            'default'     => 'http://www.example.com',
        ),  
    )
) );

/**
 * Testimonials - Top Agents 
 */
/* Testimonials Title */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'          => 'text',
    'settings'      => 'testimonial_title',
    'label'         => __('Add your Testimonial Title', 'twentyfivenorth'),
    'section'       => 'configure_sections',
    'priority'      => 10,
    'default'       => 'Testimonials',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'testimonials'
        ),
    ),
) );

/* Testimonials Background Image */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'          => 'image',
    'settings'      => 'testimonial_bg',
    'label'         => __('Insert a background image for this section', 'twentyfivenorth'),
    'section'       => 'configure_sections',
    'description'   => __( 'Our demo uses a transparent image', 'twentyfivenorth'),
    'priority'      => 10,
    'default'       => '',
	'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'testimonials'
        ),
    ),
	'output'      => array(
        array(
            'element'  => '.testimonials-section',
            'property' => 'background-image',
        ),
    ),
) );

/* Testimonials Background Color */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'        => 'color',
    'settings'    => 'testimonial_color',
    'label'       => __( 'Testimonial Background Color', 'twentyfivenorth' ),
    'section'     => 'configure_sections',
    'default'     => 'rgba(1, 11, 32, 0.7)',
    'priority'    => 10,
    'alpha'       => true,
	'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'testimonials'
        ),
    ),
	'output'      => array(
        array(
            'element'  => '.testimonials-overlay',
            'property' => 'background-color',
        ),
    ),
) );


/* Testimonials */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'          => 'repeater',
    'settings'      => 'testimonials',
    'label'         => __('Agents', 'twentyfivenorth'),
    'section'       => 'configure_sections',
    'description'   => __('Add, Remove, and sort your testimonials.  You need at least 2 to display.', 'twentyfivenorth'),
    'priority'      => 10,
    'row_label'   => array(          // row_label is not yet documented in Kirki
        'type' => 'text',
        'value' => __('Testimonial', 'twentyfivenorth'),
    ),
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'testimonials'
        ),
    ),
    'default'       => array(
    ),

    'fields' => array(
        'testimonial' => array(
            'type'        => 'textarea',
            'label'       => __('The Testimonial', 'twentyfivenorth'),
            'default'     => 'An vel utinam impetus moderatius. Commodo copiosae ocurreret id sit. Ius enim mollis scaevola cu, at natum malis decore per. Id usu eius ancillae Doming ponderum mei ei.',
        ),
        'name' => array(
            'type'        => 'text',
            'label'       => __('Name', 'twentyfivenorth'),
            'default'     => 'Michael Richardson'
        ),
        'title' => array(
            'type'        => 'text',
            'label'       => __('Title', 'twentyfivenorth'),
            'default'     => 'Happy Client',
        ),
	),
) );

/*
 * About Page Contact Section
 */

/* Blurb 1 Title */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'          => 'text',
    'settings'      => 'contact_title_1',
    'label'         => __('First Text Section Title', 'twentyfivenorth'),
    'section'       => 'configure_sections',
    'priority'      => 10,
    'default'       => 'Our Values',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'contact'
        ),
    ),
) );

/* Blurb 1 Text */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'          => 'textarea',
    'settings'      => 'contact_text_1',
    'label'         => __('First Text Section', 'twentyfivenorth'),
    'section'       => 'configure_sections',
    'priority'      => 10,
    'default'       => 'Ex quaestio corrumpit consetetur mea, ne posse blandit nec. Quodsi oporteat constituto ea nec, ex nam dolor expetenda concludaturque. Pro ex nulla deleniti, magna soleat mollis duo an. Ut mel praesent dissentias. Has ea exerci constituto.',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'contact'
        ),
    ),
) );

/* Blurb 2 Title */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'          => 'text',
    'settings'      => 'contact_title_2',
    'label'         => __('Second Text Section Title', 'twentyfivenorth'),
    'section'       => 'configure_sections',
    'priority'      => 10,
    'default'       => 'Our Mission',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'contact'
        ),
    ),
) );

/* Blurb 2 Text */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'          => 'textarea',
    'settings'      => 'contact_text_2',
    'label'         => __('Second Text Section', 'twentyfivenorth'),
    'section'       => 'configure_sections',
    'priority'      => 10,
    'default'       => 'Ex quaestio corrumpit consetetur mea, ne posse blandit nec. Quodsi oporteat constituto ea nec, ex nam dolor expetenda concludaturque. Pro ex nulla deleniti, magna soleat mollis duo an. Ut mel praesent dissentias. Has ea exerci constituto.',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'contact'
        ),
    ),
) );

function configure_contacts_customize($wp_customize) {
    /* Linear icons */
    $theme_linearicons = theme_linearicons();
    $theme_linearicons_num = theme_linearicons_num();
    $linear_icons = array();
    foreach ($theme_linearicons as $k => $v) {
        $linear_icons[$k] = $v . ' ' . str_replace('\e', '&#xe', $theme_linearicons_num[$k]);
    }

	/* Contact Info icon 1 */
    $wp_customize->add_setting ( 'contact_1_icon', array (
            'default' => 'icon-map-marker',
        )
    );
    $wp_customize->add_control ( 'contact_1_icon', array (
            'type'  => 'select',
            'label' => __('Contact Section Icon 1', 'twentyfivenorth'),
            'description'   => __('Choose the first icon for the contact section', 'twentyfivenorth'),
            'choices'   => $linear_icons,
            'section'   => 'configure_sections',
            'priority'  => 11,
            'active_callback' => 'contact_selected',
        )
    );
	
	$wp_customize->add_setting ( 'contact_2_icon', array (
            'default' => 'icon-telephone',
        )
    );
    $wp_customize->add_control ( 'contact_2_icon', array (
            'type'  => 'select',
            'label' => __('Contact Section Icon 2', 'twentyfivenorth'),
            'description'   => __('Choose the second icon for the contact section', 'twentyfivenorth'),
            'choices'   => $linear_icons,
            'section'   => 'configure_sections',
            'priority'  => 13,
            'active_callback' => 'contact_selected',
        )
    );

	$wp_customize->add_setting ( 'contact_3_icon', array (
            'default' => 'icon-envelope',
        )
    );
    $wp_customize->add_control ( 'contact_3_icon', array (
            'type'  => 'select',
            'label' => __('Contact Section Icon 3', 'twentyfivenorth'),
            'description'   => __('Choose the third icon for the contact section', 'twentyfivenorth'),
            'choices'   => $linear_icons,
            'section'   => 'configure_sections',
            'priority'  => 15,
            'active_callback' => 'contact_selected',
        )
    );
}

/* The check for the additional information section being selected to display the icons */
function contact_selected($control) {
    if( $control->manager->get_setting('section_choice')->value() == 'contact') {
        return true;
    } else {
        return false;
    }
}

add_action( 'customize_register', 'configure_contacts_customize');

/* Contact Icon 1 Text */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'      => 'textarea',
    'settings'  => 'contact_1_text',
    'label'     => __('Contact Icon Text 1', 'twentyfivenorth'),
    'priority'  => 12,
    'default'   => '25 North Street / Your Town,<br />CO 88888 United States',
    'description'=> __('Add your short description', 'twentyfivenorth'),
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'contact'
        ),
    ),
) );

/* Contact Icon 2 Text */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'      => 'textarea',
    'settings'  => 'contact_2_text',
    'label'     => __('Contact Icon Text 2', 'twentyfivenorth'),
    'priority'  => 14,
    'default'   => '(+312) 0454 3234 23',
    'description'=> __('Add your short description', 'twentyfivenorth'),
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'contact'
        ),
    ),
) );

/* Contact Icon 3 Text */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'      => 'textarea',
    'settings'  => 'contact_3_text',
    'label'     => __('Contact Icon Text 3', 'twentyfivenorth'),
    'priority'  => 16,
    'default'   => 'Email: noreply@gmail.com',
    'description'=> __('Add your short description', 'twentyfivenorth'),
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'contact'
        ),
    ),
) );

/* Contact Form Title */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'      => 'text',
    'settings'  => 'contact_form_title',
    'label'     => __('Contact Form Title', 'twentyfivenorth'),
    'priority'  => 17,
    'default'   => 'Contact Us',
    'description'=> __('Add your contact form title', 'twentyfivenorth'),
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'contact'
        ),
    ),
) );

/* Contact Form Name Placeholder */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'      => 'text',
    'settings'  => 'contact_form_name',
    'label'     => __('Contact Form Name Placeholder', 'twentyfivenorth'),
    'priority'  => 18,
    'default'   => 'Full Name',
    'description'=> __('Add your contact form name placeholder', 'twentyfivenorth'),
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'contact'
        ),
    ),
) );

/* Contact Form Email Placeholder */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'      => 'text',
    'settings'  => 'contact_form_email',
    'label'     => __('Contact Form Email Placeholder', 'twentyfivenorth'),
    'priority'  => 19,
    'default'   => 'Email',
    'description'=> __('Add your contact form email placeholder', 'twentyfivenorth'),
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'contact'
        ),
    ),
) );

/* Contact Form Message Placeholder */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'      => 'text',
    'settings'  => 'contact_form_message',
    'label'     => __('Contact Form Message Placeholder', 'twentyfivenorth'),
    'priority'  => 20,
    'default'   => 'Message',
    'description'=> __('Add your contact form message placeholder', 'twentyfivenorth'),
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'contact'
        ),
    ),
) );

/* Contact Form Button Text */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'      => 'text',
    'settings'  => 'contact_form_btn_text',
    'label'     => __('Contact Form Button Text', 'twentyfivenorth'),
    'priority'  => 21,
    'default'   => 'Send',
    'description'=> __('Add your contact form Button Text', 'twentyfivenorth'),
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'contact'
        ),
    ),
) );

/* Contact Form Sending Message */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'      => 'text',
    'settings'  => 'contact_form_sending_text',
    'label'     => __('Contact Form Sending Text', 'twentyfivenorth'),
    'priority'  => 22,
    'default'   => 'Sending...',
    'description'=> __('Add the text to display when sending', 'twentyfivenorth'),
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'contact'
        ),
    ),
) );

/* Contact Form Email */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'      => 'text',
    'settings'  => 'contact_form_email_address',
    'label'     => __('Contact Form Email', 'twentyfivenorth'),
    'priority'  => 23,
    'default'   => '',
    'description'=> __('Add the email address to recieve the contact submission.  If not set, the admin email will be used.', 'twentyfivenorth'),
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'contact'
        ),
    ),
) );

/* Contact Form Subject */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'      => 'text',
    'settings'  => 'contact_form_subject',
    'label'     => __('Contact Form Subject', 'twentyfivenorth'),
    'priority'  => 24,
    'default'   => 'Contact Form Submission',
    'description'=> __('Add the email subject line for the contact form submissions.', 'twentyfivenorth'),
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'contact'
        ),
    ),
) );

/* Contact Form Success Message */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'      => 'textarea',
    'settings'  => 'contact_form_success_msg',
    'label'     => __('Contact Form Success Message', 'twentyfivenorth'),
    'priority'  => 25,
    'default'   => 'Thank you, Your message has been sent!',
    'description'=> __('Add the text to display on success', 'twentyfivenorth'),
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'contact'
        ),
    ),
) );

/* Contact Form Error Message */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'      => 'textarea',
    'settings'  => 'contact_form_error_msg',
    'label'     => __('Contact Form Error Message', 'twentyfivenorth'),
    'priority'  => 26,
    'default'   => 'There was a problem, and your message was not sent.  Please try and submit the form again.',
    'description'=> __('Add the text to display on error', 'twentyfivenorth'),
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'contact'
        ),
    ),
) );

/**
 * About Page Map
 */

/* About Map Marker */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'          => 'image',
    'settings'      => 'about_map_marker',
    'label'         => __('Insert your map marker', 'twentyfivenorth'),
    'section'       => 'configure_sections',
    'priority'      => 10,
    'default'       => '',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'aboutmap'
        ),
    ),
) );

/* About Map latitude */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'          => 'text',
    'settings'      => 'about_map_lat',
    'label'         => __('Insert the location latitude', 'twentyfivenorth'),
    'section'       => 'configure_sections',
    'priority'      => 10,
    'default'       => '39.7645187',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'aboutmap'
        ),
    ),
) );

/* About Map longitude */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'          => 'text',
    'settings'      => 'about_map_lng',
    'label'         => __('Insert the location longitude', 'twentyfivenorth'),
    'section'       => 'configure_sections',
    'priority'      => 10,
    'default'       => '-104.9951951',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'aboutmap'
        ),
    ),
) );

/**
 * Blog Settings
 */
twentyfivenorth_Kirki::add_section( 'blog_settings', array(
    'title'      => esc_attr__( 'Blog Settings', 'twentyfivenorth' ),
    'priority'   => 10,
    'capability' => 'edit_theme_options',
) );

/* Blog Section Title */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'        => 'text',
    'settings'    => 'blog_title',
    'label'       => __( 'Blog Title', 'twentyfivenorth' ),
    'description' => __( 'Set the title to be displayed for your blog.', 'twentyfivenorth'),
    'section'     => 'blog_settings',
    'default'     => 'Blog Entries',
    'priority'    => 10,
) );

/* Blog Top Image */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'          => 'image',
    'settings'      => 'blog_background',
    'label'         => __('Insert the blog top background image', 'twentyfivenorth'),
    'section'       => 'blog_settings',
    'priority'      => 10,
    'default'       => '',
	'output'      => array(
        array(
            'element'  => '.blog-header',
            'property' => 'background-image',
        ),
    ),
) );

/* Blog Left or Right sidebar */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'blog_sidebar',
    'label'       => __( 'Blog Sidebar', 'twentyfivenorth' ),
    'description' => __( 'Choose the blog sidebar location.', 'twentyfivenorth'),
    'section'     => 'blog_settings',
    'default'     => 'right',
    'priority'    => 10,
    'choices'     => array(
        'left'   => esc_attr__( 'Left', 'twentyfivenorth' ),
        'right' => esc_attr__( 'Right', 'twentyfivenorth' ),
    ),
) );

/* Blog Roll summary or full */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'blog_summary',
    'label'       => __( 'Blog Roll Content', 'twentyfivenorth' ),
    'description' => __( 'Choose to display a summary or full content.', 'twentyfivenorth'),
    'section'     => 'blog_settings',
    'default'     => 'summary',
    'priority'    => 10,
    'choices'     => array(
        'summary'   => esc_attr__( 'Summary', 'twentyfivenorth' ),
        'full' => esc_attr__( 'Full', 'twentyfivenorth' ),
    ),
) );

/* Blog summary length */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'        => 'slider',
    'settings'    => 'blog_summary_length',
    'label'       => __( 'Blog Summary Length', 'twentyfivenorth' ),
    'description' => __( 'Choose how many words to display for main blog view content.', 'twentyfivenorth'),
    'section'     => 'blog_settings',
    'default'     => '35',
    'priority'    => 10,
    'choices'     => array(
		'min' => '2',
		'max' => '200',
		'step' => '1'
    ),
	'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'blog_summary',
            'operator'  => '==',
            'value'     => 'summary'
        ),
    ),
	
) );

/* Blog Meta Tags */
twentyfivenorth_Kirki::add_field( 'twentyfivenorth_theme', array(
    'type'        => 'sortable',
    'settings'    => 'blog_meta',
    'label'       => __( 'Blog Meta', 'twentyfivenorth' ),
    'description' => __( 'Choose the meta tags to display with posts', 'twentyfivenorth' ),
    'section'     => 'blog_settings',
    'default'     => array(
        'comments',
        'like',
    ),
    'choices'     => array(
        'comments' => esc_attr__( 'Comments', 'twentyfivenorth' ),
        'like' => esc_attr__( 'Like', 'twentyfivenorth' ),
        'author' => esc_attr__( 'Author', 'twentyfivenorth' ),
        'date' => esc_attr__( 'Date', 'twentyfivenorth' ),
    ),
    'priority'    => 10,
) );






/**
 * Add the Custom Code (CSS, JS) section
 */
twentyfivenorth_Kirki::add_section( 'custom_code', array(
    'title'      => esc_attr__( 'Custom Code', 'twentyfivenorth' ),
    'priority'   => 10,
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

