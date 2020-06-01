<div class="row-fluid <?php echo ( is_single() ) ? '' : 'post-list'; ?>">
    <div <?php post_class('span12 post-details'); ?>>
        
        <?php
        // Title
        get_template_part( 'include/content', 'title' );
        
        // Post info
        get_template_part( 'include/content', 'info' ); 
        ?>
        
        <?php if( has_post_thumbnail( $post->ID ) ): ?>
            <div class="pull-left item-image">
                <?php echo get_the_post_thumbnail(
                    $post->ID,
                    'full',
                    array(
                        'itemprop'=>'image',
                        'content' => get_the_post_thumbnail_url()
                    )
                ); ?>
            </div>
        <?php endif; 
        
        // Content + Readmore
        get_template_part( 'include/content', 'readmore' );
        
        // Tags
        get_template_part( 'include/content', 'tags' ); 
        ?>

    </div>
</div>