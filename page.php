<?php
/**
 *
 * The default template for all other pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @packageTwentyFiveNorth
 */

get_header();
$about_sections = get_theme_mod('about_sections', '');
?>
	<?php do_action('before_page_header'); ?>
	<section id="top-section" class="top-section">
		<div class="tfn-page-header blog-header">
			<div class="blog-header-inner">
				<h1><?php echo get_the_title(); ?></h1>
			</div>
			<div class="blog-header-overlay"></div>
		</div>
	</section>
	<?php do_action('before_page_content'); ?>
	<section class="main-section">
		<div class="container">
		<?php
            while ( have_posts() ) : the_post();

                get_template_part( 'template-parts/content', 'page' );

                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;

            endwhile; // End of the loop.
        ?>
		</div>
	</section>

<?php
get_footer();
