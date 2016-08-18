<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @packageTwentyFiveNorth
 */
$footer_text = get_theme_mod( 'footer_text', 'Your Footer Text Here' );
$footer_social = get_theme_mod( 'footer_social', '' );
$footer_social_pick = get_theme_mod( 'footer_social_pick', array() );
?>

	</main><!-- #main content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="footer">
			<div class="container">
				<div class="col-md-12">
					<div class="footer_text">
						<?php echo $footer_text; ?>
					</div>
				<?php if (isset($footer_social) && $footer_social == 1) { ?>
					<span class="footer_icons">
						<?php 
						foreach ($footer_social_pick as $k => $v) {
							echo '<a href="' . $v['social_url'] . '"><i class="fa ' . $v['social_choice'] . '"> </i></a>';
						}
						?>
					</span>
				<?php } ?>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
