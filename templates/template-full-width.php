<?php
/**
 * Template Name: Full Width
 * Template Post Type: post, page
 * 
 * @package RobynVeitch
 * 
 */

 get_header();
get_template_part('template-parts/navigation/navbar');
 ?>

 <main id="site-content" role="main">
     <div data-oddert='templates/template-full-width.php'></div>
    <?php
    
    if (have_posts()) {
        while (have_posts()) {
            the_post();
        }
    }

    ?>

</main> <!-- #site-content -->

<h3>template-full-width.php</h3>

<?php get_footer(); ?>
