<?php
/**
 * Template Name: About Us
 *
 * The template for displaying the About Us Page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @packageTwentyFiveNorth
 */

get_header();
$about_sections = get_theme_mod('about_sections', '');
$contact_form = get_theme_mod( 'contact_form_shortcode', '' );
?>
	<?php do_action('before_about_header'); ?>
	<section id="top-section" class="top-section">
		<div class="tfn-page-header blog-header">
			<div class="blog-header-inner">
				<h1><?php echo get_the_title(); ?></h1>
			</div>
			<div class="blog-header-overlay"></div>
		</div>
	</section>
	<?php do_action('before_about_content'); ?>
	<?php foreach ($about_sections as $k => $v) { // cycle through the page sections for display ?>
        <?php if ($v['section'] == 'topagents') { ?>

    <!-- Agents -->
    <section class="agents-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="sectionh"><?php echo esc_html(get_theme_mod('topagents_title', '')); ?></h2>
                    <p><?php echo esc_html(get_theme_mod('topagents_text', '')); ?></p>
                </div>
            </div>
            <div class="row">
                <div id="owl-carousel-agents" class="owl-carousel-agents">
			<?php
				$topagents_agents = get_theme_mod('topagents_agents', array());
				foreach ( $topagents_agents as $agent => $details ) {
					$agent_photo = $details['agent_photo'];
					if (is_numeric($agent_photo)) { 
						$agent_photo = wp_get_attachment_image_src($agent_photo, 'full');
						$agent_photo = $agent_photo[0];
					}
			?>
                    <div class="agent-slide">
                        <div class="agent-photo">
                            <img src="<?php echo esc_url($agent_photo);?>" alt="" />
                        </div>
                        <div class="agent-data text-center">
                            <h4><?php echo esc_html($details['agent_name']); ?></h4>
                            <p><?php echo esc_html($details['agent_title']); ?></p>
                            <div class="agent-contact">
                                <div class="agent-contact-row">
                                    <div class="icon-holder"><i class="icon-telephone"></i></div>
                                    <div class="contact-details"><span><?php echo esc_html__('PHONE', 'twenty-five-north');?></span><?php echo esc_html($details['agent_phone']);?></div>
                                </div>
                                <div class="agent-contact-row">
                                    <div class="icon-holder"><i class="icon-envelope"></i></div>
                                    <div class="contact-details"><span><?php echo esc_html__('EMAIL', 'twenty-five-north');?></span><?php echo esc_html($details['agent_email']);?></div>
                                </div>
                            </div>
                            <div class="agent-social">
                                <ul>
								<?php if ($details['social_choice_1'] != 'na') { ?>
                                    <li><a href="<?php echo esc_url($details['social_url_1']);?>" target="_blank"><i class="fa <?php echo esc_html($details['social_choice_1']);?>"></i></a></li>
								<?php } 
									  if ($details['social_choice_2'] != 'na') { ?>
                                    <li><a href="<?php echo esc_url($details['social_url_2']);?>" target="_blank"><i class="fa <?php echo esc_html($details['social_choice_2']);?>"></i></a></li>
								<?php }
									  if ($details['social_choice_3'] != 'na') { ?>
                                    <li><a href="<?php echo esc_url($details['social_url_3']);?>" target="_blank"><i class="fa <?php echo esc_html($details['social_choice_3'])?>"></i></a></li>
								<?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
			<?php
				} // end agents loop
			?>
                </div>
            </div>
        </div>
    </section> <!-- End Agents -->

		<?php
			} elseif ($v['section'] == 'testimonials') { ?>

    <!-- Testimonials -->
    <section class="testimonials-section">
        <div class="testimonials-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3><?php echo get_theme_mod('testimonial_title'); ?></h3>
                </div>
            </div>
			<div id="owl-carousel-testimonials" class="owl-carousel-testimonials">
			<?php
				$testimonials = get_theme_mod('testimonials', array() ); 
				foreach ($testimonials as $testimonial => $entry) {
			?>
            	<div class="slide">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="stars">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <p class="quote"><?php echo esc_html($entry['testimonial']);?></p>
                            <div class="quote-person">
                                <?php echo esc_html($entry['name']); ?> - <span><?php echo esc_html($entry['title']);?></span>
                            </div>
                        </div>
                    </div>
                </div><!-- End Slide -->
			<?php
				} // end foreach testimonial
			?>

                </div>
            </div>

        </section> <!-- End Testimonials -->

		
		<?php
			} elseif ($v['section'] == 'contact') { ?>
		<!-- Contact Section -->
        <section class="contact-section">
            <div class="container">
                <div class="row vcenter">
                    <div class="col-lg-4 col-md-6 statement">
                        <div>
                            <h4><?php echo esc_html(get_theme_mod('contact_title_1', '')); ?></h4>
                            <p><?php echo esc_html(get_theme_mod('contact_text_1', '')); ?></p>
                        </div>

                        <div>
                            <h4><?php echo esc_html(get_theme_mod('contact_title_2', '')); ?></h4>
                            <p><?php echo esc_html(get_theme_mod('contact_text_2', '')); ?></p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 contactus">
                        <div class="contactus-details">
                            <div class="icon-holder">
                                <span class="icon-surround"><i class="<?php echo esc_html(get_theme_mod('contact_1_icon', '')); ?>"></i></span>
                            </div>
                            <div class="contactus-detail">
								<?php echo esc_html(get_theme_mod('contact_1_text', '')); ?>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="contactus-details">
                            <div class="icon-holder">
                                <span class="icon-surround"><i class="<?php echo esc_html(get_theme_mod('contact_2_icon', '')); ?>"></i></span>
                            </div>
                            <div class="contactus-detail">
								<?php echo esc_html(get_theme_mod('contact_2_text', '')); ?>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="contactus-details">
                            <div class="icon-holder">
                                <span class="icon-surround"><i class="<?php echo esc_html(get_theme_mod('contact_3_icon', '')); ?>"></i></span>
                            </div>
                            <div class="contactus-detail">
                                <?php echo esc_html(get_theme_mod('contact_3_text', '')); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 contact-form">
                        <h3><?php echo esc_html(get_theme_mod('contact_form_title', '')); ?></h3>
						<?php echo do_shortcode($contact_form);?>
					</div>
                </div>
            </div>
    </section>

		<?php
			} elseif ($v['section'] == 'aboutmap') { ?>
				
	<!-- Map Section -->
    <section class="map-section">
        <div class="container-fluid">
            <div class="row">
                <div class="map-holder">
                    <div id="mapSection"></div>
                </div>
            </div>
        </div>
    </section>

		<?php 
			} elseif ($v['section'] == 'builder') {
				$builder_page = get_post(intval($v['page'])); ?>
    <section id="about-pb-<?php echo $v['page']; ?>">
        <div class="container">
            <?php echo do_shortcode($builder_page->post_content);?>
        </div>
    </section>

		<?php
			}  // end builder section

		} // end sections
		?>
	<?php do_action('after_about_content'); ?>
<?php
get_footer();
