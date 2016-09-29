<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @packageTwentyFiveNorth
 */

get_header(); 
$sidebar_pos = get_theme_mod('blog_sidebar');
$main_class = '';
if ($sidebar_pos == 'left') {
    $main_class = 'pull-right';
}
?>
	<?php do_action('before_archive_header'); ?>
	<section id="top-section" class="top-section">
        <div class="blog-header">
            <div class="blog-header-inner">
                <h1><?php the_archive_title(); ?></h1>
            </div>
            <div class="blog-header-overlay">
            </div>
        </div>
    </section>

	<?php do_action('before_archive_content'); ?>
	<!-- Blog -->
    <section class="blog-section">
        <div class="container">
            <div class="row">
                <!-- Main Blog -->
                <div class="col-xs-12 col-sm-12 col-md-8 <?php echo $main_class;?>">

		<?php
		if ( have_posts() ) :

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
				
				</div><!-- .col-md-8 -->

				<!-- Blog Sidebar -->
                <div class="col-xs-12 col-sm-12 col-md-4">
					<?php do_action('before_archive_sidebar'); ?>
                    <div class="blog-sidebar">
                        <?php get_sidebar(); ?>
                    </div>
					<?php do_action('after_archive_sidebar'); ?>
                </div> <!-- \sidebar -->

			</div><!-- .row -->
		</div><!-- .container -->
	</section>

<?php
get_footer();
