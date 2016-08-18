<?php

/**
 * Our custom walker class -- Used for the primary menu
 *
 * @package WordPress
 * @subpackage twentyfivenorth
 * @since twentyfivenorth 1.0
 */

//exit if accessed directly
if(!defined('ABSPATH')) exit;

class TFN_Nav_Walker extends Walker_Nav_Menu {

	// Will hold the css namespace for our class.
	public $css_class = '';

	public function __construct() {

		// Set up the namespace for our class.
		$this -> css_class = strtolower( __CLASS__ );
	}

	/**
	 * Check for children elements so we can adjust the html in start_el
	 *
	 */
	function display_element ($element, &$children_elements, $max_depth, $depth = 0, $args, &$output)
    {
        // check, whether there are children for the given ID and append it to the element with a (new) ID
        $element->hasChildren = isset($children_elements[$element->ID]) && !empty($children_elements[$element->ID]);

        return parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }

	/**
	 * Append the opening html for a nav menu item, and the menu item itself.
	 *
	 * @param string $output Passed by reference. The output for all of the preceding menu items.
	 * @param object $item   The Post object for this menu item.
	 * @param int    $depth  The number of levels deep we are in submenu-land.
	 * @param array  $args   An array of arguments for wp_nav_menu().
	 * @param int    $id     Allegedly the current item ID -- seems to always just be 0.
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		global $wp_query;
		$this->item = $item;
		//print_r($item);
		// The CSS class for our menu.
		$class = $this->css_class;

		$item_class = strtolower( __CLASS__ ) . '-item';

		// The html that this method will append to the menu.
		$item_output = '';

		// Grab the class names for the menu item.
		$classes = $item->classes;

		// Rename them as per my preferences.
		//$classes = CSST_Nav_Formatting::rename_css_classes( __CLASS__, $classes );
		
		// Add our class for this method.
		$classes[]= $item_class;

		// Expose the classes to filtering.
		//apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth );

		// Convert the classes into a string for output.
		$classes_str  = implode( ' ', $classes );
	
		// Grab the opening html for the menu item, which we specified in wp_nav_menu() in our shortcode.
		$before = $args -> before;

		// Merge our css classes into the menu item.
		$before = sprintf( $before, $classes_str );

		// Add the opening html tag to the output for this item.
		$item_output .= $before;

		// Atts for the link itself.
		$atts = array();
		$atts['title']  = esc_attr( $item -> attr_title );
		$atts['target'] = esc_attr( $item -> target );
		$atts['rel']    = esc_attr( $item -> xfn );
		$atts['href']   = esc_url(  $item -> url );

		// Combine the atts into a string for inserting into the link tag.
		$atts_str = '';
		foreach ( $atts as $k => $v ) {
			if ( empty( $v ) ) { continue; }
			$atts_str .= " $k='$v' ";
		}

		// The clickable text for the link.
		$label = apply_filters( 'the_title', $item -> title, $item -> ID );

		// Finally!  Add the link to the menu item.
		if ($item->hasChildren) { // add the format for top level items
			$item_output .= '<li class="icon icon-arrow-left">' . "\r\n"
						 . "<a $atts_str class='$item_class-link $item_class-text_link'>$label</a>" . "\r\n";
		} else {
			$item_output .= "<li><a $atts_str class='$item_class-link $item_class-text_link'>$label</a></li>";
		}
		
		/**
		 * Append this menu item to the menu.
		 * Since output is passed by reference, we don't need to return anything.
		 */
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

	}

	/**
	 * Append the closing html for a menu item.
	 *
	 * @param string $output Passed by reference. @see start_el().
	 * @param int    $depth  Depth of menu item. @see start_el().
	 * @param array  $args   An array of arguments. @see start_el().
	 */
	public function end_el( &$output, $item, $depth = 0, $args = array() ) {
		
		// Grab the closing html that we defined in the shortcode cb.
		$after = "\r\n";

		// Passed by reference, thus no need to return a value.
		$output .= $after;
	
	}

	/**
	 * Provide the opening markup for a new menu within our menu (AKA a submenu).
	 * 
	 * @param string $output Passed by reference. @see start_el().
	 * @param int    $depth  Depth of menu item. @see start_el().
	 * @param array  $args   An array of arguments. @see start_el().
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		//print_r($args->walker->item);	
		//$item = $args->walker->item;
		// The CSS class for our menu.
		$class = $this -> css_class;

		// Get the post meta and icon (if set) to assign to the label and for display when menu is changed
		$icon = get_post_meta($this->item->ID, 'menu-icons');
		//print_r($icon);
		$icon_class="";
		if (isset($icon[0]['type'])) {
			$icon_class= $icon[0]['type'] . ' ' . $icon[0]['icon'];
		}

		$pre_submenu = '    <div class="mp-level depth-' . $depth . '">' . "\r\n"
					 . '    	<h2><i class="' . $icon_class . '"></i>' . $this->item->title . '</h2>' . "\r\n"
					 . '        <span class="vertical-text">' . $this->item->title . '</span>' . "\r\n"
					 . '        <a class="mp-back" href="#">' . __('back', 'twentyfivenorth') . '</a>' . "\r\n"
					 . '        <ul>' . "\r\n";

		$output .= "
			$pre_submenu
		";

	}

	/**
	 * This oddly named fellow does nothing other than end a submenu.
	 * 
	 * @param string $output Passed by reference. @see start_el().
	 * @param int    $depth  Depth of menu item. @see start_el().
	 * @param array  $args   An array of arguments. @see start_el().
	 */
	public function end_lvl( &$output, $depth = 0, $args = array() ) {

		// Grab the closing html for the submenu 
		$after_submenu = '        </ul>' . "\r\n"
			           . '    </div>' . "\r\n"
					   . '</li>' . "\r\n";       // li set in start_el for items with children

		// Passed by reference, thus no need to return a value.
		$output .= $after_submenu;
		
	}

}
