<?php

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function my_portfolio_setup() {
    load_theme_textdomain( 'my-portfolio', get_template_directory() . '/languages' );

    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'blog-post', 400, 200, true );

    register_nav_menus(
        array(
            'menu-1'   => esc_html__( 'Primary', 'my-portfolio' ),
            'footer-1' => esc_html__( 'Footer Menu', 'my-portfolio' ),
        )
    );

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

    add_theme_support(
        'custom-background',
        apply_filters(
            'my_portfolio_custom_background_args',
            array(
                'default-color' => 'ffffff',
                'default-image' => '',
            )
        )
    );

    // Add theme support for selective refresh for widgets
    add_theme_support( 'customize-selective-refresh-widgets' );

    add_theme_support(
        'custom-logo',
        array(
            'height'      => 100,
            'width'       => 400,
            'flex-height' => true,
            'flex-width'  => true,
        )
    );

    add_theme_support( 'align-wide' );
    add_theme_support( 'align-full' );
    //add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'my_portfolio_setup' );

// Customize archive titles
function custom_archive_title( $title ) {
    if ( is_category() || is_tag() || is_tax() || is_date() ) {
        $title = single_cat_title( '', false );
    }
    return $title;
}
add_filter( 'get_the_archive_title', 'custom_archive_title' );

// Setup logo
function my_portfolio_logo_setup() {
    $defaults = array(
        'height'               => 100,
        'width'                => 400,
        'flex-height'          => true,
        'flex-width'           => true,
        'unlink-homepage-logo' => true,
    );
    add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'my_portfolio_logo_setup' );

// Set content width
function my_portfolio_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'my_portfolio_content_width', 640 );
}
add_action( 'after_setup_theme', 'my_portfolio_content_width', 0 );

// Enqueue scripts and styles
function my_portfolio_scripts() {
    // Enqueue Google Fonts and custom stylesheet
    wp_enqueue_style(
        'my-portfolio-googlefonts',
        'https://fonts.googleapis.com/css2?family=Danfo&family=Dosis:wght@200..800&display=swap',
        array(),
        null,
        'all'
    );

    // Enqueue custom stylesheet from a different directory
    wp_enqueue_style(
        'my-portfolio-custom-style',
        get_template_directory_uri() . '/styles/styles.css',
        array(),
        filemtime( get_template_directory() . '/styles/styles.css' ),
        'all'
    );

    wp_enqueue_script( 
        'my-portfolio-navigation', 
        get_template_directory_uri() . '/js/navigation.js', 
        array(), 
        true
    );
}
add_action( 'wp_enqueue_scripts', 'my_portfolio_scripts' );

// defering the navigation script
function add_defer_attribute($tag, $handle) {

    if ('my-portfolio-navigation' === $handle) {
        return str_replace(' src', ' defer src', $tag);
    }
    return $tag;
}
add_filter('script_loader_tag', 'add_defer_attribute', 10, 2);


 // Register Projects CPT

require get_template_directory() . '/inc/custom-post-type.php';

/**
 * Defining block editor template for Projects CPT
 */
function my_portfolio_block_templates(){
    
    $project_post_type_object = get_post_type_object( 'my-portfolio-project' );
    $project_post_type_object->template = array(
        // array( 
        //     'core/gallery', 
        //     array( 
        //         'placeholder' => 'Add Images Here'
        //     ) 
        // ),

        // array( 
        //     'core/shortcode', 
        //     array( 
        //         'placeholder' => 'Add Images Here'
        //     ) 
        // ),

        array( 
            'core/button', 
            array( 
                'placeholder' => 'Add Link Here'
            ) 
        ),

        array( 
            'core/button', 
            array( 
                'placeholder' => 'Add Link Here'
            ) 
        ),

        array( 
            'core/paragraph', 
            array( 
                'placeholder' => 'Add Description Here'
            ) 
        ),
    );
    // $project_post_type_object->template_lock = 'all';


}
add_action( 'init', 'my_portfolio_block_templates' );

function my_portfolio_add_featured_image_support() {
    add_post_type_support( 'my-portfolio-project', 'thumbnail' );
}
add_action( 'init', 'my_portfolio_add_featured_image_support' );

// Customize excerpt length
function my_portfolio_excerpt_length( $length ) {
    return 150;
}
add_filter( 'excerpt_length', 'my_portfolio_excerpt_length', 999 );

// Customize excerpt more text
function my_portfolio_excerpt_more( $more ) {
    return '... <a href="' . esc_url( get_permalink() ) . '">Learn More</a>';
}
add_filter( 'excerpt_more', 'my_portfolio_excerpt_more', 10 );
