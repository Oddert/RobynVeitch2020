<?php
/**
 * RobynVeitch functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package RobynVeitch
 */

if ( ! defined( '_ROBYNVEITCH_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_ROBYNVEITCH_VERSION', '1.0.0' );
}

if ( ! function_exists( 'robynVeitch_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function robynVeitch_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on RobynVeitch, use a find and replace
		 * to change 'RobynVeitch' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'RobynVeitch', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'RobynVeitch' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'robynVeitch_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'robynVeitch_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function robynVeitch_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'robynVeitch_content_width', 640 );
}
// add_action( 'after_setup_theme', 'robynVeitch_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function robynVeitch_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'RobynVeitch' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'RobynVeitch' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'robynVeitch_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function robynVeitch_scripts() {
	wp_enqueue_style( 'robynVeitch-style', get_stylesheet_uri(), array(), _ROBYNVEITCH_VERSION );
	wp_style_add_data( 'robynVeitch-style', 'rtl', 'replace' );

	wp_enqueue_script( 'robynVeitch-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _ROBYNVEITCH_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'robynVeitch_scripts' );
// function robynVeitch_styles() {
// 	wp.e
// }

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}


class Foo_Widget extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'foo-widget',
			'Foo_Widget',
			array('description' => __('A foo Widget', 'text_domain'))
		);
	}

	public function widget ($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		$desc = apply_filters('widget_desc', $instance['desc']);

		echo $before_widget;
		if (!empty($title)) {
			echo $before_title . $title . $after_title;
		}
		if (!empty($desc)) {
			echo $desc . '\n';
		}
		echo __('Hellow widget punks', 'text_domain');
		echo $after_widget;
	} 

	public function form ($instance) {
		if (isset($instance['title'])) {
			$title = $instance['title'];
		} else {
			$title = __('New Title', 'text domain');
		}
		if (isset($instance['desc'])) {
			$desc = $instance['desc'];
		} else {
			$desc = __('New Description', 'text domain');
		}
		?> 
			<p>
				<label for="<?php echo $this -> get_field_name('title'); ?>">
					<?php _e('Title:'); ?>
				</label>
				<input 
					class="widefat" 
					id="<?php echo $this -> get_field_id('title'); ?>"
					name="<?php echo $this -> get_field_name('title'); ?>"
					type="text"
					value="<?php echo esc_attr($title); ?>" 
				/>
			</p>
			<p>
				<label for="<?php echo $this -> get_field_name('desc'); ?>">
					<?php _e('Add Some more text:'); ?>
				</label>
				<input 
					class="widefat" 
					id="<?php echo $this -> get_field_id('desc'); ?>"
					name="<?php echo $this -> get_field_name('desc'); ?>"
					type="text"
					value="<?php echo esc_attr($desc); ?>" 
				/>
			</p>
		<?php
	}

	public function update($new_instance, $old_instance) {
		$instance = array();
		$instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
		$instance['desc'] = (!empty($new_instance['desc'])) ? strip_tags($new_instance['desc']) : '';

		return $instance;
	}
}

function register_foo() {
	register_widget('Foo_Widget');
}

add_action('widgets_init', 'register_foo');