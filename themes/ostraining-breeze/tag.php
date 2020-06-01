<?php get_header(); ?>

    <div class="row-fluid">
        <div id="content" class="<?php echo ( is_active_sidebar( 'right-side-bar' ) ) ? 'span9' : 'span12'; ?>">
            
            <div class="page-header">
                <h1><span class="muted"><?php _e('Tag:', 'ostraining-breeze'); ?></span> <?php echo single_tag_title(); ?></h1>
            </div>
        
            <?php get_template_part( 'loop', 'list' ); ?>
            
            <ul class="pager pagenav no-border-top no-padding-top">
                <li class="previous"><?php previous_posts_link( __( '&laquo; Prev Page', 'ostraining-breeze' ) ); ?></li>
                <li class="next"><?php next_posts_link( __( 'Next Page &raquo;', 'ostraining-breeze' ) ); ?></li>
            </ul>
            
        </div>
        
        <?php get_template_part( 'include/content', 'sidebar-right' ); ?>
        
    </div>

<?php get_footer(); ?>