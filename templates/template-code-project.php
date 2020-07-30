<?php
/**
 * Template Name: Code Project
 * Template Post Type: post, page
 * 
 * @package RobynVeitch
 * 
 */

	get_header();
	get_template_part('template-parts/navigation/navbar');
?>

	<main id="primary" class="site-main">
		<div data-oddert='single.php'></div>

			
		<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/post/content', get_post_type() );

				the_post_navigation(
					array(
						'prev_text' => '<span class="nav-wrapper"><span class="nav-title"><i class="fa fa-chevron-left"></i> %title</span> <span class="nav-subtitle">' . esc_html__( 'Previous', 'RobynVeitch' ) . '</span></span>',
						'next_text' => '<span class="nav-wrapper"><span class="nav-title">%title <i class="fa fa-chevron-right"></i></span><span class="nav-subtitle">' . esc_html__( 'Next', 'RobynVeitch' ) . '</span></span>',
					)
				);

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
