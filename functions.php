<?php
/**
 * TwentyFiveNorth functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @packageTwentyFiveNorth
 */
// Define constants
define('TWENTYFIVENORTH_ADMIN_DIR', get_template_directory() . '/admin/');
define('TWENTYFIVENORTH_INC_DIR', get_template_directory() . '/inc/');
define('TWENTYFIVENORTH_TEMPLATES_DIR', get_template_directory() . '/page-templates/');
define('TWENTYFIVENORTH_CSS_DIR', get_template_directory() . '/css/'); // used for less generation

if ( ! function_exists( 'twentyfivenorth_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function twentyfivenorth_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based onTwentyFiveNorth, use a find and replace
	 * to change 'twentyfivenorth' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'twenty-five-north', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Add html5 searchform support
	add_theme_support( 'html5', array( 'search-form' ) );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'tfnprimary' => __( 'Primary', 'twenty-five-north' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	/*
	*** Not used in this theme, remove unless required by ThemeForest
	add_theme_support( 'custom-background', apply_filters( 'twentyfivenorth_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	*/
}
endif;
add_action( 'after_setup_theme', 'twentyfivenorth_setup' );

/** 
 * WPML Language Switcher bootstrap nav layout
 */
function twentyfivenorth_lang_switch($items, $args) {
	$wpml_switcher = esc_html(get_theme_mod('wpml_switcher', ''));
	if ($wpml_switcher != '1') { return $items; }
    $languages = apply_filters( 'wpml_active_languages', NULL, array( 'skip_missing' => 0) );
    $count = count($languages);
    $icl = '';
    if(!empty ($languages) ) {
        foreach( $languages as $lang ){
            if ($lang['active']) {
                $extra_class = ' class="menu-item dropdown icl-menu"';
                $icl .= sprintf( '<li' . "%s" . '><a href="' . "%s" . '" class="dropdown-toggle"'
                     . ' data-toggle="dropdown">'
                     . '<img src="' . "%s" . '" alt="' . "%s" . '" /><span class="language-name">%s</span>'
                     . ' <span class="caret"> </span></a>',
                    $extra_class,
                    $lang['url'],
                    $lang['country_flag_url'],
                    $lang['native_name'],
                    $lang['native_name']
                );
                if ($count > 1) {  // Only create the dropdown if there is more than the current language
                    $icl .= '<ul class="dropdown-menu" role="menu">';
                }
            }
        }
        foreach ( $languages as $lang ) {
            if (!$lang['active']) {
                $icl .= sprintf( '<li class="menu-item"><a href="' . "%s" . '"><img src="' . "%s" . '" alt="'
                    . "%s" . '" /><span class="language-name">' . "%s" . '</span></a></li>',
                    $lang['url'],
                    $lang['country_flag_url'],
                    $lang['native_name'],
                    $lang['native_name']
                    );
            }
        }
        if ($count > 1) {
            $icl .= '</ul>';
        }
        $icl .= '</li>';
    }
    return $items . $icl;
}
// Add Styled Language select for wpml
add_filter('wp_nav_menu_items', 'twentyfivenorth_lang_switch', 20, 2);

/** 
 * Add custom icons to primary menu
 */
add_filter( 'wp_nav_menu_items', 'add_icons_to_nav', 25, 2);
function add_icons_to_nav( $items, $args ) {
	$header_social = get_theme_mod( 'header_social' );
	$header_social_pick = get_theme_mod( 'header_social_pick' );
	$nav_extra = '';
	$nav_sep = '';
	//print_r($args);
	if ($args->theme_location == 'tfnprimary') {
		if (empty($header_social_pick) || $header_social == 0 ) { return $items; }
		$items .= '<li class="nav-sep"><span></span></li>';
		foreach ($header_social_pick as $k => $v) {
			$items  .= '<li class="social-link">'
					. '<a href="' . esc_url($v['social_url']) . '" target="_blank">'
					. '<i class="fa ' . esc_html($v['social_choice']) . '"></i></a></li>';
		}
	}
	return $items;
}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function twentyfivenorth_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'twentyfivenorth_content_width', 640 );
}
add_action( 'after_setup_theme', 'twentyfivenorth_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function twentyfivenorth_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'twenty-five-north' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'twenty-five-north' ),
		'before_widget' => '<section id="%1$s" class="widget sidebar-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'twentyfivenorth_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function twentyfivenorth_scripts() {
	$tfn_theme = wp_get_theme();
	$templates = array(
        'page-templates/home-template.php',
        'page-templates/home-demo-sticky-template.php',
        'page-templates/home-demo-template.php'
    );
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css' );
	wp_enqueue_style( 'linearicons', get_template_directory_uri() . '/css/linearicons.min.css' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'fancybox', get_template_directory_uri() . '/css/jquery.fancybox.css' );
	wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/css/owl.carousel.css' );
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.min.css' );
	wp_enqueue_style( 'twentyfivenorth-style', get_stylesheet_uri() );
	// Other pages (not Front Page) styles
	if (!is_page_template($templates)) {
		$top_background = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
		$top_background = $top_background[0];
		$testimonial_color = get_theme_mod('testimonial_color');
		$testimonial_bg = esc_url(get_theme_mod('testimonial_bg'));
		$four_o_four_bg = esc_url(get_theme_mod('background_404'));
		$about_css = "
			.tfn-page-header.blog-header {
				background: transparent url('$top_background') no-repeat fixed top;
				background-size: cover;
			}
			.blog-header h1 {
				color: #fff;
			}
			.testimonials-overlay {
				background: $testimonial_color;
			}
			.testimonials-section {
				background-image: url('$testimonial_bg');
			}
			.overlay-col {
                background-image: url('$four_o_four_bg');
            }
			";
		wp_add_inline_style( 'twentyfivenorth-style', $about_css );
	} else { // home template
		$color_primary = get_theme_mod('color_primary', '#fec107');
		$secondary_color = get_theme_mod('color_secondary', '#46505c');
		$gallery_bg = esc_url(get_theme_mod('gallery_background', get_template_directory_uri() . '/img/gallery-bg.jpg'));
		$gallery_css = "
			.overlay-col {
				background-image: url('$gallery_bg');
			}
			.portfolio-section figure .overlay-background .inner {
			 	background: linear-gradient(to right bottom, $secondary_color 50%, $color_primary 50%);
			}";
		wp_add_inline_style( 'twentyfivenorth-style', $gallery_css );
	}


	// Scripts
	wp_enqueue_script( 'twentyfivenorth-navigation', get_template_directory_uri() . '/js/navigation.js', 
	array(), '20151215', true );
	wp_enqueue_script( 'twentyfivenorth-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', 
	array(), '20151215', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.6', true );
	wp_enqueue_script( 'bootstrap-dropdown', get_template_directory_uri() . '/js/jquery.bootstrap-dropdown-hover.min.js', 
	array('bootstrap'), '1.0.4', true ); 
	wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/js/jquery.fancybox.pack.js', array('jquery'), '', true );
	wp_enqueue_script( 'isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array('jquery'), '', true);
	wp_enqueue_script( 'owlcarousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), '', true);
	// Front Page or demo pages
	if (is_page_template($templates)) {
		$agent_map_marker = esc_url(get_theme_mod('agent_map_marker'));
    	$agent_map_lat = esc_html(get_theme_mod('agent_map_lat'));
    	$agent_map_lng = esc_html(get_theme_mod('agent_map_lng'));
    	wp_enqueue_script( 'twentyfivenorth-js', get_template_directory_uri() . '/js/25north.js', 
    	array( 'bootstrap-dropdown' ), $tfn_theme->get('Version'), true);
    	wp_localize_script(  'twentyfivenorth-js', 'tfn_vars', array(
        	'agentMapMarker'  => $agent_map_marker,
        	'agentMapLat' => $agent_map_lat,
        	'agentMapLng' => $agent_map_lng,
			'is_rtl'      => is_rtl()
    	));
		
		// and if map enabled
		if (get_theme_mod('agent_map') == 'enable' ) {
			$google_key = esc_html(get_theme_mod('google_key'));
			wp_enqueue_script( 'google-maps', 'https://maps.googleapis.com/maps/api/js?key=' . $google_key);
		}
	}

	// Not Front Page JS
	if (!is_page_template($templates)) {
		wp_enqueue_script( 'twentyfivenorth-pagejs', get_template_directory_uri() . '/js/25north-page.js',
        array( 'bootstrap-dropdown' ), $tfn_theme->get('Version'), true);
		$sending_msg = get_theme_mod('contact_form_sending_text');
		$about_map_marker = get_theme_mod('about_map_marker');
        $about_map_lat = trim(get_theme_mod('about_map_lat'));
        $about_map_lng = trim(get_theme_mod('about_map_lng'));
		// get agent counts for carousel display
		$agents_count = count(get_theme_mod('topagents_agents', array()));
		if ($agents_count > 3 ) {
			$max_view = 4;
			$med_view = 3;
			$sm_view = 2;
		} else {
			$max_view = $agents_count;
			$med_view = $agents_count;
			$sm_view = 2;
		}
		wp_localize_script( 'twentyfivenorth-pagejs', 'tfnpage_vars', array(
			'maxView'        => esc_js($max_view),
			'medView'        => esc_js($med_view),
			'smView'         => esc_js($sm_view),
			'sendingMsg'     => esc_js($sending_msg),
			'aboutMapMarker' => esc_js($about_map_marker),
			'aboutMapLat'	 => esc_js($about_map_lat),
			'aboutMapLng'	 => esc_js($about_map_lng),
			'tfnAdminUrl'    => admin_url(),
			'is_rtl'         => is_rtl()
		));

		// and if about map enabled
		$about_sections = get_theme_mod('about_sections');
		$map_enabled = false;
		if (!empty($about_sections)) {
			foreach ($about_sections as $section => $elem) {
				if ($elem['section'] == 'aboutmap') {
					$map_enabled = true;
				}
			}
		}
		if ($map_enabled) {
            $google_key = esc_html(get_theme_mod('google_key'));
            wp_enqueue_script( 'google-maps', 'https://maps.googleapis.com/maps/api/js?key=' . $google_key);
        }
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'twentyfivenorth_scripts' );

// contact form handled through admin
// creating Ajax call for WordPress  
add_action( 'wp_ajax_nopriv_tfn_contact_form', 'tfn_contact_form' );
add_action( 'wp_ajax_tfn_contact_form', 'tfn_contact_form' );

/**
 * Contact form handling
 */
function tfn_contact_form() {
	// check for email option, if not use the admin email
	$contact_form_email = esc_html(get_theme_mod('contact_form_email_address'));
	if (!$contact_form_email) {
    	$email_to = get_option('admin_email');
	} else {
		$email_to = $contact_form_email;
	}
	$success_text = esc_html(get_theme_mod('contact_form_success_msg'));
	$error_text = esc_html(get_theme_mod('contact_form_error_msg'));
    $jsonData = array();
    // Clean and convert post vars for html
    foreach ($_POST as $key => $value) {
        $key        = trim(htmlentities($key));
        $value      = trim(htmlentities($value));
        $post[$key] = $value;
    }

	// Alert messages
	$success = '<div class="alert alert-success" role="alert">'
         . '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'
         . $success_text . '</div>';

	$fail    = '<div class="alert alert-danger" role="alert">'
         . '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'
         . $error_text . '</div>';

	if ( isset( $_POST['from_form']) && $_POST['from_form'] == 'about-us-page') {
    	if (isset($_POST['email'])) {
        	$subject = esc_html(get_theme_mod('contact_form_subject'));
        	$message = send_mail_confirm( $email_to, $post['name'], $post['email'], $subject, $post['message'] );
    	}
    	if( $message ){
        	$message = $success;
    	} else {
        	$message = $fail;
    	}
	}
	die(json_encode($message)); // send back the response
}

/**
 * Sending the contact form email
 */
function send_mail_confirm( $email_to, $name, $email, $subject, $message){
    $msg      = '<p>Name : ' . $name . '</p>';
    $msg     .= '<p>Email : ' . $email . '</p>';
    $msg     .= '<p>Message : ' . $message . '</p>';

	$headers = '';
	$headers .= 'From: ' . $email . "\r\n";
	add_filter( 'wp_mail_content_type', 'tfn_html_content_type' );
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		return false;
    }
	$to = explode(',', $email);
	$sent = wp_mail($email_to, $subject, $msg, $headers);
	// Reset content-type to avoid conflicts 
	// -- https://core.trac.wordpress.org/ticket/23578
	remove_filter( 'wp_mail_content_type', 'tfn_html_content_type' );
	
	return $sent;
}

/**
 * Set email message to html
 */
function tfn_html_content_type() {
	return 'text/html';
}


/**
 * Enqueue Customizer scripts and styles.
 */
function twentyfivenorth_admin_scripts() {
	$tfn_theme = wp_get_theme();
    wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css' );
    wp_enqueue_style( 'linearicons', get_template_directory_uri() . '/css/linearicons.min.css' );
	wp_enqueue_style( 'tfn-customizer', get_template_directory_uri() . '/css/tfn-customizer.css' );
	wp_enqueue_script( 'twentyfivenorth_customizer_admin', 
		get_template_directory_uri() . '/js/customizer-admin.js', array(), $tfn_theme->get('Version'), true );
}
add_action( 'customize_controls_enqueue_scripts', 'twentyfivenorth_admin_scripts'); // only for the customizer
//add_action( 'admin_enqueue_scripts', 'twentyfivenorth_admin_scripts');

/**
 * Add Placeholders to the comment form
 */
function twentyfivenorth_comment_placeholders( $fields ) {
	$fields['author'] = str_replace(
		'<input', '<input placeholder="'
		. __('Name', 'twenty-five-north') . '"',
	$fields['author']
	);
	$fields['email'] = str_replace(
		'<input id="email"',
		'<input id="email" placeholder="'
		. __('Email', 'twenty-five-north') . '"',
	$fields['email']
	);		
	$fields['url'] = str_replace(
		'<input id="url"',
		'<input id="url" placeholder="' . __('Website', 'twenty-five-north') . '"',
	$fields['url']
	);
	return $fields;
}
add_filter( 'comment_form_default_fields', 'twentyfivenorth_comment_placeholders' );

/**
 * Move comment below other inputs
 * 
 */
function twentyfivenorth_comment_field_placeholder( $fields ) {
	$comment_field = str_replace(
		'<textarea id="comment"',
		'<textarea id="comment" placeholder="' . __('Comment', 'twenty-five-north') . '"',
		$fields['comment']
	);
	unset ( $fields['comment'] );

	$fields['comment'] = $comment_field;

	return $fields;
}
add_filter( 'comment_form_fields', 'twentyfivenorth_comment_field_placeholder' );

/**
 * Custom comment display for blog
 */
function twentyfivenorth_comments($comment, $args, $depth) {
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }
    ?>
    <<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
    <?php endif; ?>

    <div class="comment-meta comment-author vcard">
		<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
		<div class="comment-meta-content">
			<?php 
			$post_author = '';
			if (get_comment_author() == get_the_author()) {
				$post_author = '<span class="post-author">(' . __('Post author', 'twenty-five-north') . ')</span>';
			}
        	printf( '<cite class="fn">%s' . ' ' . $post_author . '</cite>', get_comment_author_link() ); ?>
    		<?php if ( $comment->comment_approved == '0' ) : ?>
         	<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'twenty-five-north' ); ?></em>
          	<br />
    		<?php endif; ?>

    		<p><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
        	<?php
        	/* translators: 1: date, 2: time */
        	printf( '%1$s - %2$s', get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'twenty-five-north' ), '  ', '' );
        	?>
			</p> 
		</div> <!-- .comment-meta-content -->
	
		<div class="comment-actions">
			<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div>
    </div> <!-- .comment-meta -->
	<div class="comment-content post-content">
    <?php comment_text(); ?>
	</div>
    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; ?>

<?php
}

/**
 * Custom template tags for this theme.
 */
require TWENTYFIVENORTH_INC_DIR . 'template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require TWENTYFIVENORTH_INC_DIR . 'extras.php';

/**
 * Font Selection functions for customizer
 */
require TWENTYFIVENORTH_INC_DIR . 'font-arrays.php';

/**
 * Kirki Dynamic styles
 */
require TWENTYFIVENORTH_INC_DIR . 'dynamic-styles.php';

/**
 * Recommend the Kirki plugin
 */
require_once TWENTYFIVENORTH_INC_DIR . 'include-kirki.php';

/**
 * Load the Kirki Fallback class (if Kirki is uninstalled, settings should still work on the frontend)
 */
require TWENTYFIVENORTH_INC_DIR . 'twenty-five-north-kirki.php';

/**
 * Customizer additions.
 */
require TWENTYFIVENORTH_INC_DIR . 'customizer.php';

/**
 * Theme Resources - common components used in the theme
 */
require_once TWENTYFIVENORTH_ADMIN_DIR . 'theme-resources.php';

/**
 * Theme Custom CSS and JS Code
 */
require_once TWENTYFIVENORTH_ADMIN_DIR . 'custom-code-output.php';
$custom_code_output = new tfn_custom_code_output;
add_action('wp_head', array($custom_code_output, 'output_custom_css') );
add_action('wp_footer', array($custom_code_output, 'output_custom_js') );


/**
 * Theme Hooks - hooks provided for development
 */
require_once TWENTYFIVENORTH_ADMIN_DIR . 'theme-hooks.php';

/**
 * TGMPA inclusion
 */
require_once TWENTYFIVENORTH_INC_DIR . 'class-tgm-plugin-activation.php';
require_once TWENTYFIVENORTH_INC_DIR . 'tgmpa-config.php';
add_action( 'tgmpa_register', 'twentyfivenorth_register_required_plugins' );

/**
 * Include our post like system
 */
require_once TWENTYFIVENORTH_INC_DIR . 'post-like.php';

/**
 * Admin Classes and functions
 */
if (is_admin()) {
    require_once TWENTYFIVENORTH_ADMIN_DIR . '/theme-admin.php';
    new tfn_themeAdmin();
}

/**
 * Disable MasterSlider Update Notifications
 */
add_filter( 'masterslider_disable_auto_update', '__return_true' );


/**
 * Load Jetpack compatibility file.
 */
require TWENTYFIVENORTH_INC_DIR . 'jetpack.php';
