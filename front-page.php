<?php
/*
Template Name: One Page Template
*/

get_header(); ?>

<div id="content" class="site-content">
    <?php
    // Defining the pages to include as sections
    $pages = array( 26, 6, 9, 11 );

    foreach ( $pages as $page_id ) {
        $post = get_post( $page_id );
        setup_postdata( $post ); ?>

        <section id="section-<?php echo $page_id; ?>" class="one-page-section">
            <?php if ( $page_id !== 26 ) : // Exclude the title for the landing page ?>
                <h2><?php echo get_the_title( $page_id ); ?></h2>
            <?php endif; ?>
            <div class="div-for-<?php echo $page_id; ?>">
                <?php 
                // Include the section content from corresponding PHP file
                get_template_part( 'section', $page_id ); 
                ?>
                <!-- Display the content of the page from the database -->
                <div><?php echo apply_filters( 'the_content', $post->post_content ); ?></div>
            </div>
        </section>

        <?php wp_reset_postdata();
    } ?>
</div>

<?php get_footer(); ?>
