<?php
// register taxonomies

function custom_taxonomies() {
    // Register taxonomy for 'schoolsite-student' CPT
    $labels = array(
        'name'              => _x( 'Student Categories', 'taxonomy general name' ),
        'singular_name'     => _x( 'Student Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Student Categories' ),
        'all_items'         => __( 'All Student Category' ),
        'parent_item'       => __( 'Parent Student Category' ),
        'parent_item_colon' => __( 'Parent Student Category:' ),
        'edit_item'         => __( 'Edit Student Category' ),
        'view_item'         => __( 'View Student Category' ),
        'update_item'       => __( 'Update Student Category' ),
        'add_new_item'      => __( 'Add New Student Category' ),
        'new_item_name'     => __( 'New Student Category Name' ),
        'menu_name'         => __( 'Student Category' ),
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_in_nav_menu'  => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'student-categories' ),
    );
    register_taxonomy( 'student-category', array( 'schoolsite-student' ), $args );

    // Register taxonomy for 'schoolsite-staff' CPT
    register_taxonomy(
        'staff_position', // Taxonomy slug
        'schoolsite-staff', // Associated post type slug
        array(
            'label' => __( 'Staff Positions', 'textdomain' ),
            'hierarchical' => false, // Set to false for non-hierarchical taxonomy (like tags)
            'public' => true,
            'rewrite' => array( 'slug' => 'staff-position' ), // Optional: customize the URL slug
        )
    );

    // You can register more taxonomies here as needed
}
add_action( 'init', 'custom_taxonomies' );

//if client changes to new theme, wp will make sure permalinks of new theme will work?
function schoolsite_rewrite_flush() {
    schoolsite_register_custom_post_types();
    custom_taxonomies();
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'schoolsite_rewrite_flush' );
