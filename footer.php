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
$footer_text = get_theme_mod( 'footer_text', __('Your Footer Text Here', 'twenty-five-north') );
$footer_social = get_theme_mod( 'footer_social', '' );
$footer_social_pick = get_theme_mod( 'footer_social_pick', array() );
?>

	</main><!-- #main content -->
	<?php do_action('before_footer'); ?>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="footer">
			<div class="container">
				<div class="col-md-12">
					<?php if (isset($footer_social) && $footer_social == 1) { ?>	
					<div class="footer_text">
						<?php echo wp_kses_post($footer_text); ?>
					</div>
					<span class="footer_icons">
						<?php 
						foreach ($footer_social_pick as $k => $v) {
							echo '<a href="' . esc_url($v['social_url']) . '" target="_blank"><i class="fa ' 
								. esc_html($v['social_choice']) . '"> </i></a>';
						}
						?>
					</span>
				<?php } else { // no social links ?>
					<div class="footer_text text-center">
						<?php echo wp_kses_post($footer_text); ?>
					</div>
				<?php } ?>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php do_action('after_wrapper'); ?>

<?php wp_footer(); ?>

</body>
</html>
