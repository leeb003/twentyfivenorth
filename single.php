<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
                <h1><?php echo get_theme_mod('blog_title'); ?></h1>
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
        			while ( have_posts() ) : the_post();

            			get_template_part( 'template-parts/content', get_post_format() );

            			// If comments are open or we have at least one comment, load up the comment template.
            			if ( comments_open() || get_comments_number() ) :
                			comments_template();
            			endif;

						the_post_navigation();

        			endwhile; // End of the loop.
        			?>
				</div>

				<!-- Blog Sidebar -->
    	   		<div class="col-xs-12 col-sm-12 col-md-4">
        	   		<div class="blog-sidebar <?php echo $sidebar_class;?>">
						<?php get_sidebar(); ?>
					</div>
				</div> <!-- \sidebar -->
			</div> 
		</div>
	</section>

<?php
get_footer();
