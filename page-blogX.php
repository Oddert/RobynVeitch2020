<?php
/**
 * The blog template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package RobynVeitch
 */

get_header();
get_template_part('template-parts/navigation/navbar');
?>

	<main id="primary" class="site-main" style='min-height:500px;border:1px solid steelblue;padding:50px;'>
		<div data-oddert='page-blog.php'></div>
	
		<?php
		if ( have_posts() ) :
			echo 'have_posts()';
			if ( is_home() && ! is_front_page() ) :
				echo 'is_home() && !is_front_page()';
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/post/list-content', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :
			echo '!have_posts()';

			get_template_part( 'template-parts/post/list-content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
