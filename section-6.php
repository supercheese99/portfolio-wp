<!-- section 6 - about me -->
<div class="about-me-container">
    <div class="about-me hidden" id="person">
        <?php
        $post_id = 129;
        $about_me_post = get_post($post_id);

        if ( $about_me_post ) :
            echo '<h1>' . esc_html( $about_me_post->post_title ) . '</h1>';
            echo apply_filters( 'the_content', $about_me_post->post_content );

        else :
            echo '<p>Sorry, no content available. ;(</p>';

        endif;
    ?>
    </div>
</div>

<div class="about-me hidden" id="technologies">
    <h3>My Toolkit</h3>
    <div class="toolkit-icons-container hidden">
        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/html5/html5-original-wordmark.svg" alt="HTML" title="HTML" />
        
        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/css3/css3-original-wordmark.svg" alt="CSS" title="CSS" />
        
        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/sass/sass-original.svg" alt="Sass" title="Sass" />
        
        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/javascript/javascript-original.svg" alt="JavaScript" title="JavaScript" />
        
        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/react/react-original-wordmark.svg" alt="React" title="React" />
          
        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/php/php-original.svg" alt="PHP" title="PHP" />
        
        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/wordpress/wordpress-original.svg" alt="WordPress" title="WordPress" />
        
        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/woocommerce/woocommerce-plain-wordmark.svg" alt="WooCommerce" title="WooCommerce" />
        
        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/photoshop/photoshop-original.svg" alt="Photoshop" title="Photoshop" />
        
        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/illustrator/illustrator-plain.svg" alt="Illustrator" title="Illustrator" />
        
        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/xd/xd-original.svg" alt="Adobe XD" title="Adobe XD" />
        
        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/figma/figma-original.svg" alt="Figma" title="Figma" />
          
    </div>
</div>
