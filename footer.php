<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package RobynVeitch
 */

?>

	<footer id="colophon" class="site-footer">
		<div data-oddert='footer.php'></div>
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'RobynVeitch' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				#printf( esc_html__( 'Proudly powered by %s', 'RobynVeitch' ), 'WordPress' );
				?>
			</a>
			<?php #<span class="sep"> | </span> ?>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				#printf( esc_html__( 'Theme: %1$s by %2$s.', 'RobynVeitch' ), 'RobynVeitch', '<a href="http://underscores.me/">Underscores.me</a>' );
				printf( esc_html__( 'Theme %1$s by author %2$s.', 'RobynVeitch' ), 'RobynVeitch', '<a href="/robyn-veitch-cv/">Robyn Veitch</a>' );
				?>
		</div><!-- .site-info -->
		<div class='site-copyright'>
			<?php 
				printf( esc_html__( '© Copyright Robyn Veitch %1$s/%2$s. All rights reserved.', 'RobynVeitch' ), date("Y") - 1, date("Y") );
			?>
		</div>
		<div class='site-privacy-policy'>
			View the <a href='<?php echo get_site_url(); ?>/privacy-policy'>Privacy Policy</a>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
