<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package RobynVeitch
 */

get_header();
get_template_part('template-parts/navigation/navbar');
?>

	<main id="primary" class="site-main">

		<section class="error-404 not-found">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Oh Dear! That page can&rsquo;t be found.', 'RobynVeitch' ); ?></h1>
			</header><!-- .page-header -->

			<div data-oddert='404.php'></div>

			<div class="page-content">
				<p class='nf-error-message'>
					<?php 
						global $wp;
							// $current_url = home_url(add_query_arg(array(), $wp->request));
							esc_html_e( 
								sprintf( 'Nothing was found at /%s.',  $wp->request ), 
								'RobynVeitch'
							); 
					?>
				</p>
				<p class='nf-error-suggestion'>
					<?php
						esc_html_e( 'Maybe the url was misstyped or try a search?' );
					?>
				</p>

					<?php
						get_search_form();
						
						__( 
							sprintf( '">do let me know</a>', $wp->request ), 
							'RobynVeitch' 
						);
					// the_widget( 'WP_Widget_Recent_Posts' );
					?>

					<p class='nf-contact'>
						If you think this is a mistake, please 
						<a href="<?php
							echo sprintf( 'mailto:robynfhveitch@gmail.com?subject=Missing page on robynveitch.com&body=I couldn\'t access the page at /%s and I think it\'s an error.', $wp->request );
						?>">
							do let me know
						</a>.
					</p>

					<!-- <div class="widget widget_categories">
						<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'RobynVeitch' ); ?></h2>
						<ul>
							<?php
							// wp_list_categories(
							// 	array(
							// 		'orderby'    => 'count',
							// 		'order'      => 'DESC',
							// 		'show_count' => 1,
							// 		'title_li'   => '',
							// 		'number'     => 10,
							// 	)
							// );
							?>
						</ul>
					</div><!-- .widget -->

					<?php
					/* translators: %1$s: smiley */
					// $robynVeitch_archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'RobynVeitch' ), convert_smilies( ':)' ) ) . '</p>';
					// the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$robynVeitch_archive_content" );

					// the_widget( 'WP_Widget_Tag_Cloud' );
					?>

			</div><!-- .page-content -->
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
