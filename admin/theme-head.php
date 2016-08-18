<?php

class theme_head {

    // Properties

    // Methods
    /* Header custom CSS output */
    public function output_custom() {
        if (get_theme_mod('css_code', '') ) { ?>
    <style>
        <?php echo get_theme_mod('css_code', ''); ?>
    </style>
    <?php
        }
    }

}
