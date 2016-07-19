<?php
/*
 * TGMPA register included plugins
 */

class tgmpa_config {
	
	// properties
 
	// methods
    public function tgmpa_register_plugins() {
        $storage = 'http://corner-plugins.sh-themes.com/';
        $plugins = array(
			// Redux Framework Plugin on wordpress.org
			array(
				'name'					=> 'Redux Framework',
				'slug'					=> 'redux-framework',
				'required'				=> true,
				'force_activation'		=> true,
				'force_deactivation'	=> false
			),

			// Menu Icons
			array(
				'name' 					=> 'Menu Icons',
				'slug'					=> 'menu-icons',
				'required'				=> false,
				'version'				=> '0.9.2',
				'force_activation'		=> false
			),

			// Cornerstone
			array(
				'name'					=> 'Cornerstone',
				'slug'					=> 'cornerstone',
				'source'				=> $storage . 'cornerstone.zip',
				'required'				=> false,
				'version'				=> '1.2.3',
				'force_activation'		=> false,
				'force_deactivation'	=> false,
				'external_url'			=> 'https://theme.co/cornerstone/'
			),

			// Slider Revolution
            array(
                'name'                  => 'Slider Revolution',
                'slug'                  => 'revslider',
                'source'                => $storage . 'revslider.zip',
                'required'              => false,
                'version'               => '5.2.5',
                'force_activation'      => false,
                'force_deactivation'    => false,
                'external_url'          => ''
            ),

            // Screets Live Chat
			/*
            array(
                'name'                  => 'Live Chat', // The plugin name
                'slug'                  => 'screets-chat', // The plugin slug (typically the folder name)
                'source'                => $storage . 'Live_Chat.zip',
                'required'              => false, // If false, the plugin is only 'recommended' instead of required
                'version'               => '1.5',
                'force_activation'      => false,
                'force_deactivation'    => false,
                'external_url'          => '', // If set, overrides default API URL and points to an external URL
            ),
			*/
        );

        $config = array(
            'id'           => 'tgmpa_brokerpro',     // Unique ID for hashing notices for multiple instances of TGMPA.
            'default_path' => '',                      // Default absolute path to bundled plugins.
            'menu'         => 'tgmpa-install-plugins', // Menu slug.
            'parent_slug'  => 'themes.php',            // Parent menu slug.
            'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
            'has_notices'  => true,                    // Show admin notices or not.
            'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
            'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
            'is_automatic' => false,                   // Automatically activate plugins after installation or not.
            'message'      => '',                      // Message to output right before the plugins table.
        );
        tgmpa( $plugins, $config );
    }
}
