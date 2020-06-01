<div class="row-fluid <?php echo ( is_single() ) ? '' : 'post-list'; ?>">
    <div <?php post_class('span12 post-details link'); ?>>
        
        <?php
        // Title
        get_template_part( 'include/content', 'title' );
        
        // Post info
        get_template_part( 'include/content', 'info' ); 
        ?>
        
        <div class="post-tags pull-right">
            <a href="javascript:void(0)"><i class="fa fa-link"></i> <?php _e( 'Link', 'ostraining-breeze' ); ?></a>
        </div>
        
        <?php if( has_post_thumbnail( $post->ID ) ): ?>
            <div class="pull-left item-image"><?php echo get_the_post_thumbnail($post->ID, 'full'); ?></div>
        <?php endif; 
        
        // Content + Readmore
        get_template_part( 'include/content', 'readmore' );
        
        // Tags
        get_template_part( 'include/content', 'tags' ); 
        ?>
    </div>
</div>