<?php
// register taxonomies

function custom_taxonomies() {
    // Register taxonomy for 'schoolsite-student' CPT
    register_taxonomy(
        'student_category', // Taxonomy slug
        'schoolsite-student', // Associated post type slug
        array(
            'label' => __( 'Student Categories', 'textdomain' ),
            'hierarchical' => true, // Set to true for hierarchical taxonomy (like categories)
            'public' => true,
            'rewrite' => array( 'slug' => 'student-category' ), // Optional: customize the URL slug
        )
    );

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