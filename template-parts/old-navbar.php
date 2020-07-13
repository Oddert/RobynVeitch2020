<?php
/**
 * The navbar
 * 
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package RobynVeitch
 */

?>

<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
				the_custom_logo();
				if ( is_front_page() && is_home() ) :
			?>
			<h1 class="site-title">
				<!-- <a href="<?= esc_url( home_url( '/' ) ); ?>" rel="home">
					<?php //bloginfo( 'name' ); ?>
				</a> -->
				Robyn F H Veitch
			</h1>
			<?php
				else :
			?>
			<p class="site-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<?php bloginfo( 'name' ); ?>
				</a>
			</p>
			<?php
				endif;
				// $robynVeitch_description = get_bloginfo( 'description', 'display' );
				// if ( $robynVeitch_description || is_customize_preview() ) :
			?>
			<!--<p class="site-description">
				<?php //echo $robynVeitch_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			</p>-->
			<?php 
				// endif; 
      ?>
      
      <h1>
        <?= get_the_title(); ?>
      </h1>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
				<?php esc_html_e( 'Primary Menu', 'RobynVeitch' ); ?>
			</button>
			<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					)
				);
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->