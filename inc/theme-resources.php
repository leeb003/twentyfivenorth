<?php
/*
 * Class theme_resources
 * Theme Resources
 * @theme_resources
 */

class theme_resources {

    //properties
	public $options = array();	

    //methods
    public function __construct() {

    }

	/*
	 * Options 
	 */
	public function return_options() {
		//global $tfn_options;
		$this->options = get_theme_mods();
		return $this->options;
	}

	/*
	 * Menu Exists Check
	 */
	/**
     * Check for the existance of our menu
     **/
    public function menu_check($menu_key) {
        $menu_name = false;
        $all_menus = wp_get_nav_menus();
        // We need the nav-menu location registered for 'Navigation Menu' in theme-settings.php
        $nav_menus = (get_nav_menu_locations());
        foreach ($nav_menus as $k => $v) {
            if ($k == $menu_key) {
                $menu_id = $v;
                foreach ($all_menus as $all => $m) {
                    if ($menu_id == $m->term_id) {
                        $menu_name = $m->name;
                    }
                }
            }
        }
        return $menu_name;
    }

	/*
     * Container layout
     */
	/*
	public function container() {
		$container_class = array();
		$container_class['container'] = 'container';
		$container_class['inner'] = 'inner-container';
		if (isset($this->options['ct-layout-select']) && $this->options['ct-layout-select'] == '1') {
			$container_class['container'] = 'container-fluid';
			$container_class['inner'] = 'nested-container';
		}
        return $container_class;
	}
	*/	
}
