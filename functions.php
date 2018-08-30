<?php
/**
 * rotous18 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package rotous18
 */

if ( ! function_exists( 'rotous18_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function rotous18_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on rotous18, use a find and replace
		 * to change 'rotous18' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'rotous18', get_template_directory() . '/languages' );

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
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'rotous18' ),
		) );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-2' => esc_html__( 'Footer', 'rotous18' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'rotous18_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'rotous18_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function rotous18_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'rotous18_content_width', 640 );
}
add_action( 'after_setup_theme', 'rotous18_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function rotous18_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'rotous18' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'rotous18' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'rotous18_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function rotous18_scripts() {
	wp_enqueue_style( 'rotous18-style', get_stylesheet_uri() );

	wp_enqueue_script( 'rotous18-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'rotous18-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'rotous18_scripts' );

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


/******************************
 * CUSTOM FUNCTIONS
 ******************************/
$rtcolors = array('green', 'yellow', 'orange', 'red', 'purple', 'marine', 'blue', 'black', 'grey');
/**
 * Returns one of the predefined colors for a given string
 */
function get_string_color($s) {
	global $rtcolors;
	return $rtcolors[intval(substr(md5($s), 0, 4), 16) % 7]; // No black or grey
}

/**
 * Returns the html for the tag list
 */
function get_tag_labels() {
	$tags = get_the_tag_list('', ',');
	if ( !$tags && is_wp_error($tags) || empty($tags) ) {
		return '';
	}

	$tags = explode(',', $tags);
	foreach ($tags as $i => $tag) {
		$tags[$i] = '<li class="rt-bg-' . get_string_color($tag) . ' rt-label">' . $tag . '</li>';
	}
	return '<ul class="rt-tag-labels">' . implode('', $tags) . '</ul>';
}

/**
 * Returns the html for the category list
 */
function get_category_labels() {
	$categories = get_the_category_list(',');
	if ( !$categories && is_wp_error($categories) || empty($categories) ) {
		return '';
	}

	$categories = explode(',', $categories);
	foreach ($categories as $i => $category) {
		$categories[$i] = '<li class="rt-bg-' . get_string_color($category) . ' rt-label">' . $category . '</li>';
	}
	return '<ul class="rt-category-labels">' . implode('', $categories) . '</ul>';
}
