<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @packageTwentyFiveNorth
 */

get_header(); 
$sidebar_pos = get_theme_mod('blog_sidebar');
$main_class = '';
$sidebar_class = '';
if ($sidebar_pos == 'left') {
    $main_class = 'pull-right';
	$sidebar_class = 'left-sidebar';
}
?>

	<section id="top-section" class="top-section">
        <div class="blog-header">
            <div class="blog-header-inner">
                <h1><?php echo esc_html(get_theme_mod('blog_title')); ?></h1>
            </div>
            <div class="blog-header-overlay">
            </div>
        </div>
    </section>

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
				do_action('before_post_header');
				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );
				do_action('after_post_excerpt');

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
				
				</div><!-- .col-md-8 -->

				<!-- Blog Sidebar -->
                <div class="col-xs-12 col-sm-12 col-md-4">
                    <div class="blog-sidebar <?php echo $sidebar_class; ?>">
                        <?php get_sidebar(); ?>
                    </div>
                </div> <!-- \sidebar -->

			</div><!-- .row -->
		</div><!-- .container -->
	</section>

<?php
get_footer();
