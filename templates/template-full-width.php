<?php
/**
 * Template Name: Full Width
 * Template Post Type: post, page
 * 
 * @package Impact
 * 
 */

 get_header();
 ?>

 <main id="site-content" role="main">
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
