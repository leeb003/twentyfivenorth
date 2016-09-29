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

	/**
	 * tfn_meta
	 * Post meta layout (date, comments etc.) used in front page and in blog sections
	 */
	public function tfn_meta($post, $theme_mod) {
		$posts_atts = get_theme_mod($theme_mod, array());
		$comments_text = __('Comments', 'twenty-five-north');
		$meta = array();
		foreach ($posts_atts as $k => $v) {
			if ($v == 'comments') {
				$comments_link = get_comments_link();
				$meta[] = <<<EOT
					<div class="bl-comments">
						<i class="icon-bubbles"></i>
							$post->comment_count <a href="$comments_link">$comments_text</a>
						</div>
EOT;
	        } elseif ($v == 'like') {
				$like = getPostLikeLink( $post->ID );
				$meta[] = <<<EOT
					<div class="bl-views">$like</div>
EOT;
			} elseif ($v == 'date') {
			$format_prefix = '%2$s';
			$date = sprintf( '<div class="bl-views"><i class="icon-calendar-text"></i> <time class="entry-date updated" datetime="%3$s">%4$s</time></div>',
				esc_url( get_permalink() ),
				esc_attr( sprintf( __( 'Permalink to %s', 'twenty-five-north' ), the_title_attribute( 'echo=0' ) ) ),
				esc_attr( get_the_date( 'c' ) ),
				esc_html( sprintf( $format_prefix, get_post_format_string( get_post_format() ),
					get_the_date( get_option( 'date_format') ) ) )
				);
				$meta[] = $date;
			} elseif ($v == 'author') {
				$meta[] = sprintf( '<div class="bl-views"><i class="icon-user"></i> <a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></div>',
					esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
					esc_attr( sprintf( __( 'View all posts by %s', 'twenty-five-north' ), get_the_author() ) ),
					get_the_author()
				);
			}
		}
		return $meta;
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
