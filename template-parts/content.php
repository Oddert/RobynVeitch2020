<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package RobynVeitch
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div data-oddert='template-parts_content.php'></div>
			
	<header class="entry-header">
		<?php robynVeitch_post_thumbnail(); ?>
		<?php
			

			if ( 'post' === get_post_type() ) :
		?>
		
			<div class="entry-meta">
				<?php
					robynVeitch_posted_on();
				?>
			</div><!-- .entry-meta -->
		<?php 
			endif; 
			$title = the_title('', '', false);

			$title_should_hide = 'preffer-topbar';
			if ( strlen( $title ) > 60 ) {
				$title_should_hide = '';
			}

			if ( is_singular() ) {
				the_title( '<h1 class="entry-title ' . $title_should_hide . '">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title ' . $title_should_hide . '"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					// __() is translate
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'RobynVeitch' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				), // wp_keses() parses out dissallowed html
				wp_kses_post( get_the_title() )
			) // sprintf() replaces % with text
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'RobynVeitch' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php robynVeitch_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
