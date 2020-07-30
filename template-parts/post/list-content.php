<?php
/**
 * A banner item to display basic post details. Intened for use in a list of posts
 * 
 * @link https://developer.wordpress.org/themes/basic/temaplte-heirarchy/
 * 
 * @package RobynVeitch
 */

  get_header();
  // get_template_part('template-parts/navigation/navbar');
?>

<div class='post-list-content'>
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div data-oddert='template_parts__post__list-content.php'></div>

    <div class='image__wrapper'>
      <a href="' . esc_url( get_permalink() ) . '">
        <?php 
          the_post_thumbnail(); 
          // get_the_post_thumbnail(get_the_ID(), 'full');
        ?>
      </a>
    </div>
    <div class='details__wrapper'>
      <header class='entry-meta'>
        <div>
          <?php 
            robynVeitch_posted_on();
            robynVeitch_edit_link();
          ?>
        </div>
        <?php
          the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
        ?>
      </header>
  
      <div class='entry-content'>
        <?php
          
          the_excerpt();
        
          wp_link_pages(
            array(
              'before'      => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
              'after'       => '</div>',
              'link_before' => '<span class="page-number">',
              'link_after'  => '</span>',
            )
          );
        ?>
      </div>
    </div>

  </article>
</div>