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
		<div class='site-header__wrapper'>
			<div class='site-header__wrapper--inner'>
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
						<?php
							$title = get_the_title(); 
							if ( strlen($title) <= 60 ):
								echo $title;
							endif;
						?>
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

				</div><!-- .site-branding -->

				<nav id="site-navigation" class="main-navigation">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
						<i class='fa fa-chevron-left'></i>
						<i class='fa fa-chevron-right'></i>
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
			</div><!-- .site-header__wrapper--inner -->
		</div><!-- .site-header__wrapper -->
	</header><!-- #masthead -->