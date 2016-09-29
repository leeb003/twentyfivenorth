<?php
/**
 * The 404 template file.
 *
 * This is the page not found page template
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @packageTwentyFiveNorth
 */

get_header(); ?>
		<div class="wrapper">
			<main>
				<section class="nothing-found">
					<div class="overlay-col">
						<div class="container">
							<h1>404</h1>
							<h2 class="sectionh"><?php echo esc_html(get_theme_mod( 'page_404_heading', '' )); ?></h2>
							<p><?php echo esc_html(get_theme_mod( 'page_404_hdesc', '' )); ?></p>
						</div> <!-- End Container -->

						<div class="virtual upper80">
							<div class="container-fluid color-back">
                        		<div class="row text-center">
                            		<div class="col-md-12">
                                		<span><?php echo esc_html(get_theme_mod( 'page_404_banner', '' )); ?></span>
                                		<a href="<?php echo esc_url( home_url( '/' ) );?>" 
                                    		class="vtour btn-pri"><?php echo esc_html(get_theme_mod( 'page_404_btn', '' )); ?></a>
                            		</div>
                        		</div>
							</div>
                    	</div>
					</div> <!-- End Overlay -->
				</section>
			</main>
			<?php get_footer(); ?>

		</div><!-- End Wrapper -->
	</body>
</html>
