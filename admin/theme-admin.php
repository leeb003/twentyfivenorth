<?php
/*
   Admin Main Class
*/

class tfn_themeAdmin {
	//properties
	public $config = array();

	//methods

    public function __construct() {
		// enqueue admin scripts
		add_action( 'admin_enqueue_scripts', array($this, 'load_custom_wp_admin_style') );

		// import demo action
		add_action("wp_ajax_import_demo_content", array(&$this, "import_demo_content") );

		/**
		 * Include our demo import admin page
		 */
		require_once TWENTYFIVENORTH_ADMIN_DIR . 'theme-import-admin.php';
		new tfn_theme_import_admin();

	} // end construct

	/*
    * Enqueue admin scripts
    */
	public function load_custom_wp_admin_style() {
        wp_enqueue_media();
        wp_enqueue_script( 'jquery-ui-core',  false, array('jquery') );
        wp_enqueue_script( 'jquery-ui-slider' );
        wp_enqueue_script( 'jquery-ui-sortable' );
		wp_enqueue_script( 'jquery-ui-dialog' );
		wp_enqueue_style("wp-jquery-ui-dialog");  // styles for dialog

        wp_register_script( 'custom-admin-script', get_template_directory_uri() 
				. '/admin/js/theme-admin.js', false, '1.0.0' );
        wp_enqueue_script( 'custom-admin-script' );
		wp_localize_script(  'custom-admin-script', 'tfnAdmin', array(
            'adminUrl'       => admin_url('admin-ajax.php'),
        ));
        wp_register_style( 'custom-admin-css', get_template_directory_uri() . '/admin/css/theme-admin.css', false, '1.0.0' );
        wp_enqueue_style( 'custom-admin-css' );
    }

	/*
	 * Use wp_remote_get
	 */
	public function load_remote($url) {
		$result = wp_remote_get(
			$url,
			array(
				'timeout'  => 600
			)
		);
		return $result;
	}

	/*
	 * Import Demo Content
	 */
	public function import_demo_content() {
		if (!wp_verify_nonce( $_POST['nonce'], "import_demo_content")) {
			exit("Invalid Request");
		}


		$demo_choice = intval($_POST['demo_choice']);
		// 1 is Main
		if (!class_exists("WP_Import")) {
            if (!defined("WP_LOAD_IMPORTERS")) define("WP_LOAD_IMPORTERS",true);
            require_once(TWENTYFIVENORTH_ADMIN_DIR . 'inc/importer/wordpress-importer.php');
        }
		require_once(TWENTYFIVENORTH_ADMIN_DIR . 'theme-import.php');

        $this->importer = new tfn_import();
        $this->importer->fetch_attachments = true;

        $response = $this->importer->getDemo($demo_choice);

		$jsonData = array (
			'type'            => 'success',
			'success'         => $this->importer->success,
			'options_success' => $this->importer->options_success,
			'response'        => $this->importer->response
		);
		echo json_encode($jsonData);
		die();
	}
}
