<?php

function schoolsite_register_custom_post_types() {
    $labels = array(
        'name'               => _x( 'Student', 'post type general name' ),
        'singular_name'      => _x( 'Student', 'post type singular name'),
        'menu_name'          => _x( 'Student', 'admin menu' ),
        'name_admin_bar'     => _x( 'Student', 'add new on admin bar' ),
        'add_new'            => _x( 'Add New', 'student' ),
        'add_new_item'       => __( 'Add New Student' ),
        'new_item'           => __( 'New Student' ),
        'edit_item'          => __( 'Edit Student' ),
        'view_item'          => __( 'View Student' ),
        'all_items'          => __( 'All Students' ),
        'search_items'       => __( 'Search Students' ),
        'parent_item_colon'  => __( 'Parent Students:' ),
        'not_found'          => __( 'No student found.' ),
        'not_found_in_trash' => __( 'No student found in Trash.' ),
        'archives'           => __( 'Student Archives'),
        'insert_into_item'   => __( 'Insert into student'),
        'uploaded_to_this_item' => __( 'Uploaded to this student'),
        'filter_item_list'   => __( 'Filter student list'),
        'items_list_navigation' => __( 'Student list navigation'),
        'items_list'         => __( 'Students list'),
        'featured_image'     => __( 'Student featured image'),
        'set_featured_image' => __( 'Set student featured image'),
        'remove_featured_image' => __( 'Remove student featured image'),
        'use_featured_image' => __( 'Use as featured image'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'show_in_admin_bar'  => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'student' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-archive',
        'supports'           => array( 'title', 'thumbnail', 'editor' ),
    );
    register_post_type( 'schoolsite-student', $args );
}

add_action( 'init', 'schoolsite_register_custom_post_types' );