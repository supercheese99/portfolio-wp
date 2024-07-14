<!-- section 9 - my work -->

   <?php
   // Define the custom query arguments
   $args = array(
      'post_type'      => 'my-portfolio-project', // Your custom post type
      'posts_per_page' => 3,          // Number of posts to display
      'post_status'    => 'publish'   // Only fetch published posts
   );

   // Instantiate the custom query
   $projects_query = new WP_Query($args);

   // Check if there are any posts to display
   if ($projects_query->have_posts()) :
      // Loop through the posts
      while ($projects_query->have_posts()) : $projects_query->the_post(); ?>

         <div id="post-<?php the_ID(); ?>" class="project-item">
               <?php if (has_post_thumbnail()) : ?>
                  <img src="<?php the_post_thumbnail_url('blog-post'); ?>" alt="<?php the_title(); ?>">
               <?php endif; ?>
               <h3><?php the_title(); ?></h3>
               <p><?php the_excerpt(); ?></p>
               <a href="<?php the_permalink(); ?>">Read More</a>
         </div>

      <?php endwhile;
      wp_reset_postdata(); // Reset the global post object
   else : ?>
      <p><?php _e('No projects found.', 'my-portfolio'); ?></p>
   <?php endif; ?>

