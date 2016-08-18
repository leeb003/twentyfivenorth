<?php
/**
 * Template Name: Home Page
 *
 * The template for displaying the home page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @packageTwentyFiveNorth
 */

get_header(); 
$home_top = get_theme_mod( 'home_top', 'topimage' );
$home_slider = get_theme_mod( 'home_slider', '' );
$home_features = get_theme_mod( 'home_features', 'off');
$home_sections = get_theme_mod( 'home_sections', array());
?>
	<section class="top-section">
	<?php if ($home_top == 'topimage') { // Top Image ?>
		<div class="main-image"></div>
	<?php } elseif ( $home_top == 'slider' ) { // Top slider 
			echo do_shortcode($home_slider);
		  } 
	?>
		<div class="top-info">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-xs-10 top-info-sect">
						<h3>
							<?php echo get_theme_mod( 'home_info_address', ''); ?>
						</h3>
						<h1><?php echo get_theme_mod( 'home_info_price', ''); ?></h1>
						<p>
							<?php echo get_theme_mod( 'home_info_desc', ''); ?>
						</p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6 col-xs-10 top-cta">
						<a href="<?php echo get_theme_mod( 'home_info_btn_url', ''); ?>" class="schedule">
							<?php echo get_theme_mod( 'home_info_btn_text', ''); ?>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php if ($home_features == 'on') { // display our top features ?>
	<!-- Features -->
    <section id="features" class="features">
    	<div class="container">
			<div class="row">
				<div class="col-xs-6 col-sm-6 col-md-3">
					 <div class="feature">
						<div class="feature-inner">
							<i class="<?php echo get_theme_mod( 'feature_1_icon'); ?>"></i><br />
							<span><?php echo get_theme_mod( 'feature_1_text'); ?></span>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-3">
					<div class="feature">
						<div class="feature-inner">
							<i class="<?php echo get_theme_mod( 'feature_2_icon'); ?>"></i><br />
							<span><?php echo get_theme_mod( 'feature_2_text'); ?></span>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-3">
					<div class="feature">
						<div class="feature-inner">
							<i class="<?php echo get_theme_mod( 'feature_3_icon'); ?>"></i><br />
							<span><?php echo get_theme_mod( 'feature_3_text'); ?></span>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-3">
					<div class="feature">
						<div class="feature-inner">
							<i class="<?php echo get_theme_mod( 'feature_4_icon'); ?>"></i><br />
							<span><?php echo get_theme_mod( 'feature_4_text'); ?></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php } // end top features check ?>

	<?php foreach ($home_sections as $k => $v) { // cycle through the page sections for display ?>
		<?php if ($v['section'] == 'highlights') { ?>
	<section id="details" class="details">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<h2 class="sectionh"><?php echo get_theme_mod( 'highlights_title', ''); ?></h2>
					<p><?php echo get_theme_mod( 'highlights_desc', ''); ?></p>
				</div>
			</div>
			<div class="row highlight-info">
				<div class="col-md-4">
					<div class="shape">
						<div class="decagon">
							<div class="rct"></div>
							<div class="rct"></div>
							<div class="rct"></div>
							<div class="rct"></div>
							<div class="rct"></div>
						</div>
						<i class="fa <?php echo get_theme_mod( 'highlight_1_icon', ''); ?>"></i>
					</div>
					<h4><?php echo get_theme_mod( 'highlight_1_title', ''); ?></h4>
					<p><?php echo get_theme_mod( 'highlight_1_text', ''); ?></p>
				</div>
				<div class="col-md-4">
					<div class="shape">
						<div class="decagon">
							<div class="rct"></div>
							<div class="rct"></div>
							<div class="rct"></div>
							<div class="rct"></div>
							<div class="rct"></div>
						</div>
						<i class="fa <?php echo get_theme_mod( 'highlight_2_icon', ''); ?>"></i>
					</div>
					<h4><?php echo get_theme_mod( 'highlight_2_title', ''); ?></h4>
					<p><?php echo get_theme_mod( 'highlight_2_text', ''); ?></p>
				</div>
				<div class="col-md-4">
					<div class="shape">
						<div class="decagon">
							<div class="rct"></div>
							<div class="rct"></div>
							<div class="rct"></div>
							<div class="rct"></div>
							<div class="rct"></div>
						</div>
						<i class="fa <?php echo get_theme_mod( 'highlight_3_icon', ''); ?>"></i>
					</div>
					<h4><?php echo get_theme_mod( 'highlight_3_title', ''); ?></h4>
					<p><?php echo get_theme_mod( 'highlight_3_text', ''); ?></p>
				</div>
			</div>
		<!-- Highlights slider -->
		<?php 
		$highlight_slides = get_theme_mod( 'highlight_slides', array() );
		$slide_count = count($highlight_slides);
		$curr_slide = 1;
		$prev_btn = '';
		$highlight_slides_enable = get_theme_mod('highlight_slides_enable', '');
		if ($highlight_slides_enable == 'enable') {  ?>
			<div id="owl-carousel-features" class="owl-carousel">
		<?php
			foreach ( $highlight_slides as $k => $v ) {
				if ($slide_count < 2) {
					$next_text = $v['slide_title'];
				} elseif ($curr_slide == $slide_count) { // last slide
					$next_text = $highlight_slides[0]['slide_title'];
				} else {
					$next_text = $highlight_slides[$curr_slide]['slide_title']; // use curr_slide because array starts at 0
				}
					
		?>
				<!-- Start slide -->
				<div class="slide">
            		<div class="row vcenter">
               			<div class="col-sm-12 col-md-5">
                    		<div class="sideimg">
                        		<img src="<?php echo wp_get_attachment_url($v['slide_image']) ;?>" alt="" />
                          		<div class="slide-count">
                               		<span class="current-slide"><?php echo $curr_slide; ?></span>/<?php echo $slide_count; ?>
                            	</div>
                        	</div>
                    	</div>
                    	<div class="col-sm-12 col-md-7">
                    		<div class="infoblock">
                        		<h3><?php echo $v['slide_title']; ?></h3>
                            	<p><?php echo $v['slide_text']; ?></p>
                            	<ul class="infoblock-feats">
								<?php 
								$feature_list = explode(',', $v['slide_feature_list']);
								foreach ($feature_list as $k1 => $v1) {
								?>
                            		<li><?php echo $v1; ?></li>
								<?php
								} 
								?>
                         	   </ul>
                        		<div class="info-actions">
                            		<a href="#" class="detail-switch">
                                		<i class="fa fa-angle-double-left"></i>
                                    	<span><?php echo $next_text; ?></span>
                                	</a>
                                	<div class="sqft-cont">
                                		<span class="sqft-desc"><?php echo $v['slide_feature_text'];?> : </span>
										<span class="sqft"><?php echo $v['slide_feature_text_2'];?></span>
                                	</div>
                           		</div>
                        	</div>
                   		</div>
               		</div>
           		</div>
           		<!-- \slide -->
		<?php
			$curr_slide++;
			} // end foreach slide 
		?>
			</div> <!-- \Owl Carousel -->
		<?php
		} // end if slides enabled check
		?>
		</div><!-- \container -->
	</section>
	<?php
		} elseif ($v['section'] == 'gallery') { // Gallery ?>

	<section id="images" class="media portfolio-section port-col">
    	<div class="overlay-col">
        	<div class="container">
            	<h2 class="sectionh"><?php echo get_theme_mod('gallery_title', '');?></h2>
               	<p><?php echo get_theme_mod('gallery_text', '');?></p>
                <div class="row">
                  	<div class="col-md-12">
                       	<div id="isotope-filters2" class="filter-container isotopeFilters2">
                           	<ul class="list-inline filter">
                               	<li class="active"><a href="#" data-filter="*"><?php echo __('All', 'twentyfivenorth');?></a></li>
				<?php
				// list terms in a given taxonomy
				$taxonomy = 'portcat';
				$tax_terms = get_terms($taxonomy);
				foreach ($tax_terms as $tax_term) { 
				?>
                                <li><a href="#" data-filter=".<?php echo $tax_term->slug;?>"><?php echo $tax_term->name; ?></a></li>
				<?php
				} // end categories link display
				?>
                            </ul>
                        </div>
                    </div>
                </div> <!-- End Filter -->
				<div class="row photos-row">
					<div id="isotope-container2" class="isotopeContainer2">

				<?php
				// display the gallery images
				$portfolio = '';
				$args = array(
            		'post_type' => 'portfolio_entry',
					'order'	=> 'ASC',
        		);

        		$my_query = new WP_Query( $args );
				$i = 0;
        		while ( $my_query->have_posts() ) : $my_query->the_post();
            		$i++;
					$column = 'col-sm-6';
					if ($i > 2) {
						$column = 'col-sm-4';
					}
            		// Pull category for each unique post using the ID 
            		$terms = get_the_terms( $post->ID, 'portcat' );

            		if ( $terms && ! is_wp_error( $terms ) ) {

                		$links = array();

                		foreach ( $terms as $term ) {
                       		$links[] = $term->slug;
                		}

                		$tax_links = join( " ", $links);
                		$tax = $tax_links;
            		} else {
                		$tax = '';
            		}
            		$thumbnail = get_the_post_thumbnail($post->ID);
            		//get post thumbnail id
            		$image_id = get_post_thumbnail_id();
            		//go get image attributes [0] => url, [1] => width, [2] => height
            		$image_url = wp_get_attachment_image_src($image_id,'', true);
					$full_image_url = $image_url[0];
            		$title = get_the_title($post->ID);
			?>
                        <div class="<?php echo $column; ?> isotopeSelector <?php echo $tax; ?>">
                            <article class="">
                                <figure>
                                    <img src="<?php echo $full_image_url;?>" alt="">
                                    <div class="overlay-background">
                                        <div class="inner"></div>
                                    </div>
                                    <div class="overlay">
                                        <div class="inner-overlay">
                                            <div class="inner-overlay-content with-icons">
                                                <a title="<?php echo $title; ?>" class="fancybox-pop" data-fancybox-group="<?php echo $tax; ?>" href="<?php echo $full_image_url; ?>"><span class="crosshair"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </figure>
                                <div class="article-title"><a href="#"><?php echo $title; ?></a></div>
                            </article>
                        </div> <!-- End isotopeSelector -->
				
		<?php
        endwhile;
        wp_reset_query()
		?>
					</div> <!-- End Isotope Container -->
				</div> <!-- End Row -->
            </div> <!-- End Container -->
        </div> <!-- End Overlay -->
    </section>
			<?php
			if (get_theme_mod('gallery_banner_enable', '') == 'enable') { ?>
	<!-- Virtual Tour Section -->
    <section class="virtual">
    	<div class="container-fluid color-back">
        	<div class="row text-center">
            	<div class="col-md-12">
                	<span><?php echo get_theme_mod('gallery_banner_text', ''); ?></span>
					<a href="<?php echo get_theme_mod('gallery_banner_btn_link', ''); ?>" target="_<?php echo get_theme_mod('gallery_banner_btn_window', ''); ?>" class="vtour btn-pri"><?php echo get_theme_mod('gallery_banner_btn_text', ''); ?></a>
                </div>
            </div>
		</div>
    </section>
			<?php
			}
			?>

	<?php
		} elseif ($v['section'] == 'additional') {
	?>
	<!-- Additional Information Section -->
    <section class="additional">
    	<div class="container">
        	<div class="row text-center">
            	<div class="col-md-12">
                	<h2 class="sectionh"><?php echo get_theme_mod('additional_title', ''); ?></h2>
                    <p><?php echo get_theme_mod('additional_text', ''); ?></p>
                </div>
            </div>
            <div class="row additional-items">
            	<div class="col-xs-6 col-sm-6 col-md-3">
                	<div class="add-item">
                    	<div class="add-inner">
                        	<i class="<?php echo get_theme_mod('additional_1_icon', ''); ?>"></i><br />
                            <span><?php echo get_theme_mod('additional_1_text', ''); ?></span>
                        </div>
                    </div>
                </div>
				<div class="col-xs-6 col-sm-6 col-md-3">
                    <div class="add-item">
                        <div class="add-inner">
                            <i class="<?php echo get_theme_mod('additional_2_icon', ''); ?>"></i><br />
                            <span><?php echo get_theme_mod('additional_2_text', ''); ?></span>
                        </div>
                    </div>
                </div>
				<div class="col-xs-6 col-sm-6 col-md-3">
                    <div class="add-item">
                        <div class="add-inner">
                            <i class="<?php echo get_theme_mod('additional_3_icon', ''); ?>"></i><br />
                            <span><?php echo get_theme_mod('additional_3_text', ''); ?></span>
                        </div>
                    </div>
                </div>
				<div class="col-xs-6 col-sm-6 col-md-3">
                    <div class="add-item">
                        <div class="add-inner">
                            <i class="<?php echo get_theme_mod('additional_4_icon', ''); ?>"></i><br />
                            <span><?php echo get_theme_mod('additional_4_text', ''); ?></span>
                        </div>
                    </div>
                </div>
			</div>
            <div class="row text-center">
            	<div class="col-md-12">
                  	<a class="btn-sec" 
					   href="<?php echo get_theme_mod('additional_btn_link', ''); ?>" 
					   target="<?php echo get_theme_mod('additional_btn_window', ''); ?>"><?php echo get_theme_mod('additional_btn_text', ''); ?></a>
                </div>
            </div>
        </div>
	</section>
	<?php
		} elseif ($v['section'] == 'posts') {
			$args = array(
				'numberposts' => get_theme_mod('posts_number', '2'),
				'order'       => get_theme_mod('posts_sort', 'asc'),
			);
			$postslist = get_posts( $args );
	?>
	<!-- Blog Section -->
    <section id="blog" class="blog-posts">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="sectionh"><?php echo get_theme_mod('posts_title', ''); ?></h2>
                    <p><?php echo get_theme_mod('posts_text', ''); ?></p>
                </div>
            </div>
			<div class="posts-container">

		<?php
			$i = 1;
			foreach ( $postslist as $post ) {
				//echo '<p>' . print_r($post) . '</p>';
				$featured = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
				$partial_content = strip_shortcodes($post->post_content);
				$partial_content = wp_trim_words( $partial_content, 35, '...');
				$theme_resources = new theme_resources;
				$meta = $theme_resources->tfn_meta($post, 'posts_atts'); // pass the post array and theme option to get
				if ($i&1) { // odd entries
		?>
				<div class="row vcenter">
					<div class="col-md-6 col-xs-12 post-image">
						<div class="bl-entry-img">
							<img class="img-responsive" src="<?php echo $featured; ?>" alt="" />
						</div>
					</div>
					<div class="col-md-6 col-xs-12">
						<div class="post-content">
							<div class="bl-title">
								<h3><?php echo $post->post_title;?></h3>
							</div>
							<div class="bl-excerpt">
								<p><?php echo $partial_content; ?></p>
							</div>
							<?php echo implode(' ', $meta);?>
							<a href="<?php echo get_permalink($post->ID);?>" 
								class="readmore"><?php echo __('Read more', 'twentyfivenorth');?></a>
						</div>
					</div>
				</div>
				<?php
				} else { // even entries
				?>
				<div class="row vcenter">
					<div class="col-md-6 col-xs-12 pull-left">
						<div class="post-content">
							<div class="bl-title">
								<h3><?php echo $post->post_title;?></h3>
							</div>
							<div class="bl-excerpt">
								<p><?php echo $partial_content; ?></p>
							</div>
							<a href="<?php echo get_permalink($post->ID);?>" 
								class="readmore"><?php echo __('Read more', 'twentyfivenorth');?></a>
							<?php echo implode(' ', array_reverse($meta, true));?>
						</div>
					</div>
					<div class="col-md-6 col-xs-12 post-image">
						<div class="bl-entry-img">
							<img class="img-responsive" src="<?php echo $featured; ?>" alt="" />
						</div>
					</div>
				</div>
				<?php 
				} // end odd even check
				$i++;
			} // end foreach post loop
			?>

			</div> <!-- /post container -->
		</div> <!-- /container -->
	</section>

		<?php			
		} elseif ($v['section'] == 'agent') {
		?>
	<!-- Agent Section -->
	<section id="agent" class="agent">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="sectionh"><?php echo get_theme_mod('agent_title', ''); ?></h2>
					<p><?php echo get_theme_mod('agent_desc', ''); ?></p>
				</div>
			</div>
			<div class="row vcenter agent-info">
				<div class="col-md-6 col-sm-12">
					<img class="img-responsive" src="<?php echo get_theme_mod('agent_photo', '') ;?>" alt="<?php echo __('agent','');?>" />
				</div>
				<div class="col-md-6 text-left agent-details">
					<h3><?php echo get_theme_mod('agent_name', ''); ?></h3>
					<span><?php echo get_theme_mod('agent_cred', ''); ?></span>
					<p><?php echo get_theme_mod('agent_info', ''); ?></p>
					<a class="btn-third" href="<?php echo get_theme_mod('agent_btn_link', ''); ?>" target="_<?php echo get_theme_mod('agent_btn_window', ''); ?>"><?php echo get_theme_mod('agent_btn_text', ''); ?></a>
				</div>
			</div>
		</div>
			<?php
			if (get_theme_mod('agent_infobar', '') == 'enable') { // show infobar
			?>
		<div class="contact-items">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-lg-4">
						<div class="icon-ring"><i class="fa <?php echo get_theme_mod('agent_1_icon', '');?>"></i></div>
						<p class="text"><?php echo get_theme_mod('agent_1_text', '');?></p>
					</div>
					<div class="col-md-6 col-lg-4">
						<div class="icon-ring"><i class="fa <?php echo get_theme_mod('agent_2_icon', '');?>"></i></div>
						<p class="text"><?php echo get_theme_mod('agent_2_text', '');?></p>
					</div>
					<div class="col-md-6 col-lg-4">
						<div class="icon-ring"><i class="fa <?php echo get_theme_mod('agent_3_icon', '');?>"></i></div>
						<p class="text"><?php echo get_theme_mod('agent_3_text', '');?></p>
					</div>
				</div>
			</div>
		</div>
			<?php
			} // end infobar display
			?>

			<?php
			if (get_theme_mod('agent_map', '') == 'enable') { // map display
			?>

		<div class="container-fluid">
			<div class="row">
				<div class="map-holder">
					<div id="mapSection"></div>
				</div>
			</div>
		</div>
			<?php
			} // end map display
			?>
	</section>
		<?php
		} elseif ($v['section'] == 'builder') {
			$builder_page = get_post(intval($v['page'])); ?>
	<section id="home-pb-<?php echo $v['page']; ?>">
		<div class="container">
			<?php echo do_shortcode($builder_page->post_content);?>
		</div>
	</section>
		<?php } // end page builder section ?>


	<?php } // end page sections ?>


<?php
get_footer();
