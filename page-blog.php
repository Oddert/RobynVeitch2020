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

	<main id="primary" class="site-main page-blog">
	<?php
    $args = array(
      'post_type' => 'post'
    );

    $post_query = new WP_Query($args);

    if($post_query->have_posts() ) {
      while($post_query->have_posts() ) {
        $post_query->the_post();

					get_template_part('template-parts/post/list-content')
				?>
    <?php
        }
    	}
		?>
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
