<?php if ( have_posts() ) :

    while ( have_posts() ) : the_post();

        // Post format
        get_template_part( 'include/content', get_post_format() );

    endwhile;

else:
    // Not found
    get_template_part( 'include/content', 'notfound' );

endif; ?>