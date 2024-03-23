<?php
/**
 * School Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package School_Theme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function schoolsite_theme_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on School Theme, use a find and replace
		* to change 'schoolsite-theme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'schoolsite-theme', get_template_directory() . '/languages' );

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
	//custom crop sizes
	add_image_size('blog-post', 400, 200, true);
	add_image_size('student-photo', 200, 400, true);
	add_image_size('staff-photo', 400, 200, true);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'schoolsite-theme' ),
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
			'schoolsite_theme_custom_background_args',
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

	// ADDING THEME SUPPORT FOR ALIGNWIDE AND ALIGNFULL CLASSES
	add_theme_support( 'align-wide' );
    add_theme_support( 'align-full' );
}
add_action( 'after_setup_theme', 'schoolsite_theme_setup' );

// removing the archives word from page title

function custom_archive_title( $title ) {
    if ( is_category() || is_tag() || is_tax() || is_date() ) {
        $title = single_cat_title( '', false );
    }
    return $title;
}
add_filter( 'get_the_archive_title', 'custom_archive_title' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function schoolsite_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'schoolsite_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'schoolsite_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function schoolsite_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'schoolsite-theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'schoolsite-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'schoolsite_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function schoolsite_theme_scripts() {
	wp_enqueue_style( 'schoolsite-theme-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'schoolsite-theme-style', 'rtl', 'replace' );

	wp_enqueue_script( 'schoolsite-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'schoolsite_theme_scripts' );

/**
 * Register CPT Students & Staff
 */
require get_template_directory() . '/inc/custom-post-type.php';

/**
 * Functions for excerpts
 */
//Function for excerpt length:
function schoolsite_excerpt_length( $length){
	return 25; 
}
add_filter('excerpt_length', 'schoolsite_excerpt_length', 999);

//Function to change [...] to Read More About the Student...
function schoolsite_excerpt_more($more){
	$more='... <a href="'.esc_url(get_permalink()).'">Read More About the Student...</a>';
	return $more;
}
add_filter('excerpt_more', 'schoolsite_excerpt_more',10);

/**
 * Defining block editor template for Student CPT
 */
function schoolsite_block_templates(){
		$student_post_type_object = get_post_type_object( 'schoolsite-student' );
		$student_post_type_object->template = array(
            array( 
                'core/paragraph', 
                array( 
                    'placeholder' => 'Add student bio here..'
                ) 
            ),
            array( 
                'core/button', 
                array( 
                    'placeholder' => 'Add button portfolio here',
                ) 
            ),
        );
		$student_post_type_object->template_lock = 'all';

		// define similar rules for the staff cpt block editor

		$staff_post_type_object = get_post_type_object( 'schoolsite-staff' );
    // $staff_post_type_object->template = array(
    // );
    $staff_post_type_object->template_lock = 'all';
	
}
add_action( 'init', 'schoolsite_block_templates' );

/**
 * Change 'Add title' placeholder to Student CPT 
 */
if( is_admin() ) {
    add_filter( 'enter_title_here', function( $input ) {
        if( 'schoolsite-student' === get_post_type() ) {
            return __( 'Add Student Name', 'textdomain' );
        } elseif( 'schoolsite-staff' === get_post_type() ) {
            return __( 'Add Staff Name', 'textdomain' ); // Change placeholder for staff CPT
        } else {
            return $input;
        }
    } );
}

/**
 * Registering Taxonomies
 */
require get_template_directory() . '/inc/taxonomies.php';


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

