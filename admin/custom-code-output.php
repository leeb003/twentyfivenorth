<?php

class tfn_custom_code_output {

	// Properties

	// Methods

	/* Custom CSS output 
	 * Not using since we are attaching it to kirki's output called in functions.php 
	 */
	public function output_custom_css() {
		if (get_theme_mod('css_code') ) {
			return(get_theme_mod('css_code')); 
		}
	}
	/* Custom Javascript output 
	 * being called in functions.php with wp_add_inline_script on main script
	 */
	public function output_custom_js() {
		if (get_theme_mod('js_code') ) { 
			return(get_theme_mod('js_code')); 
		}
	}
}
