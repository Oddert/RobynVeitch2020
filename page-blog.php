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
  <div data-oddert='page-blog.php'></div>
  <?php
    $pagenum = get_query_var('paged') < 1 ? 1 : get_query_var('paged') - 1;
    $perpage = 10;

    // echo $pagenum;

    $args = array(
      'post_type' => 'post',
      'posts_per_page' => $perpage,
      'paged' => get_query_var( 'paged' ),
      // 'offset' => $pagenum * $perpage,
    );

    $post_query = new WP_Query($args);

    if( $post_query->have_posts() ) {
      while( $post_query->have_posts() ) {
        $post_query->the_post();
				get_template_part('template-parts/post/list-content');
      }
    }

    $total_pages = $post_query->max_num_pages;

    ?>
      <div class='pagination'>
    <?php
      if ($total_pages > 1) {
        $curr_page = max( 1, get_query_var('paged') );

        echo paginate_links(array(
          'base' => get_pagenum_link(1) . '%_%',
          'format' => '/page/%#%',
          'current' => $curr_page,
          'total' => $total_pages,
          'prev_text' => __('previous'),
          'next_text' => __('next')
        ));
      } else {      
        echo "<h3>" . _e('404 Error&#58; Not Found', '') . "</h3>";
      }
	  ?>
    </div>
	</main><!-- #main -->

<?php
  get_sidebar();
  get_footer();
?>