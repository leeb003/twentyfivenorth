<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @packageTwentyFiveNorth
 */
$entry_img = wp_get_attachment_url(get_post_thumbnail_id(), 'full');
// Post Date format for date tile
// M m Y
$tile_date = esc_html(get_the_date('M'));
$tile_month = esc_html(get_the_date('m'));
$tile_year = esc_html(get_the_date('Y'));
$theme_resources = new tfn_theme_resources;
$meta = $theme_resources->tfn_meta($post, 'blog_meta'); // pass the post array and theme option to get
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row">
		<?php
		if ( is_single() ) {
		?>

		<div class="col-md-12 col-sm-12 col-xs-12">
            <div class="bl-entry-img">
                <img class="img-responsive" src="<?php echo $entry_img; ?>" alt="" />
            </div>
			<?php if ($entry_img) { ?>
            <div class="top-space"></div>
			<?php } ?>
    		<header class="entry-header">
				<div class="bl-date-holder inline-date">
            		<div class="bl-date">
                		<h2>
                    		<span><?php echo $tile_date; ?></span><br />
                        	<?php echo $tile_month; ?><br />
                        	<span><?php echo $tile_year; ?></span>
                    	</h2>
                	</div>
            	</div>
				<div class="bl-title">
					<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
					<?php echo implode(' ', $meta);?>
        		</div>
			</header>
			<div class="entry-content bl-excerpt">
        <?php
            the_content( sprintf(
                /* translators: %s: Name of current post. */
                wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'twenty-five-north' ), array( 'span' => array( 'class' => array() ) ) ),
                the_title( '<span class="screen-reader-text">"', '"</span>', false )
            ) );

            wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'twenty-five-north' ),
                'after'  => '</div>',
            ) );
        ?>
    		</div><!-- .entry-content -->

    		<footer class="entry-footer">
        		<?php twentyfivenorth_entry_footer(); ?>
    		</footer><!-- .entry-footer -->

        </div> <!-- .col -->

		<?php
		} else {  // blog roll
			$get_permalink = esc_url( get_permalink() );
		?>
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="bl-entry-img">
				<img class="img-responsive" src="<?php echo $entry_img; ?>" alt="" />
			</div>
			<?php 
				$top_space = '';
				if ($entry_img) {
					$top_space = 'top-space';
				}
			?>
			<div class="row <?php echo $top_space; ?>">
				<div class="col-sm-2 col-xs-4">
					<div class="bl-date-holder">
						<div class="bl-date">
							<h2> 
								<span><?php echo $tile_date; ?></span><br />
                       			<?php echo $tile_month; ?><br />
                       			<span><?php echo $tile_year; ?></span>
							</h2>
						</div>
						<p class="featured"><?php echo esc_html__('Featured', 'twenty-five-north');?></p>
					</div>
				</div>

				<div class="col-sm-10 col-xs-8">
					<header class="entry-header">
						<div class="bl-title">
						<?php the_title( '<h2 class="entry-title"><a href="' 
							. $get_permalink . '" rel="bookmark">', '</a></h2>' ); ?>
						</div>
					</header>
					<div class="entry-content bl-excerpt">
			
						<?php
            			$content = get_the_content( sprintf(
                			/* translators: %s: Name of current post. */
                			wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'twenty-five-north' ), 
							array( 'span' => array( 'class' => array() ) ) ),
                			the_title( '<span class="screen-reader-text">"', '"</span>', false )
            			) );
						if (get_theme_mod('blog_summary') == 'summary') {
							$words = get_theme_mod('blog_summary_length');
							echo wp_trim_words($content, $words, '...');
						} else {
							echo do_shortcode($content);
						}
        				?>

					</div>
					<?php echo implode(' ', $meta);?>
					<a class="readmore" 
						href="<?php echo $get_permalink;?>"><?php echo esc_html__('Read more', 'twenty-five-north');?></a>
				</div>
			</div>
		</div><!-- .col -->
		<div class="blog-sep"><hr /></div>
		<?php
		}
		?>
	</div><!-- \row -->
</article><!-- #post-## -->
