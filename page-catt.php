<?php
/**
 * Catt Page
 * 
 * @package RobynVeitch
 */
	get_header();
	get_template_part('template-parts/navigation/navbar');
?>

<h2>Test Page</h2>

<div>
  <?php 
    $cat_args = array(
      'orderby' => 'name',
      'order' => 'ASC',
      'parent' => get_cat_ID( 'portfolio' ),
    );

    ?>
      <!--<h2><?php #echo get_cat_ID( 'portfolio' ); ?></h2>-->
    <?php

    $categories = get_categories( $cat_args );

    foreach( $categories as $category ) {
      $args = array(
        'showposts' => 5,
        'category_in' => array( $category->term_id ),
        'caller_get_posts' => 1,
      );

      $posts = get_posts( $args );

      if ( $posts ) :
        ?>
          <h3>
            Category:
            <a 
              href="<?php get_category_link( $category->term_id ) ?>" 
              title="<?php sprintf( __( "View all posts in %s" ), $category_name ) ?>"
            >
              <?php echo $category->name; ?>
              (<?php echo $category->slug ?>)
            </a>
          </h3>
          <?php
            foreach( $posts as $post ) {
              setup_postdata( $post );
              ?>
                <!--
                <p>
                  <a 
                    href="<?php the_permalink(); ?>" 
                    rel="bookmark" 
                    title="Permanent Link to <?php the_title_attribute(); ?>"
                  >
                    <?php echo the_title(); ?>
                  </a>
                </p>
                -->
              <?php
            }
      endif;
    }
  ?>
</div>