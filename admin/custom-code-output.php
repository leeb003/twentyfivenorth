<?php

class tfn_custom_code_output {

    // Properties

    // Methods
    /* Header custom CSS output */
    public function output_custom_css() {
        if (get_theme_mod('css_code') ) { ?>
    <style>
        <?php print(get_theme_mod('css_code')); ?>
    </style>
    <?php
        }
    }
	/* Custom Javascript output */
	public function output_custom_js() {
		if (get_theme_mod('js_code') ) { ?>
	<script>
		<?php print(get_theme_mod('js_code')); ?>
	</script>
	<?php
		}
	}
}
