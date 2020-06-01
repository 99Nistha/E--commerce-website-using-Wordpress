<?php get_header(); ?>

    <div class="row-fluid">
        <div id="content" class="<?php echo ( is_active_sidebar( 'right-side-bar' ) ) ? 'span9' : 'span12'; ?>">
            
            <div class="page-header">
                <h1><?php printf( _e( '<span class="muted">Search Results</span>', 'ostraining-breeze' ), get_search_query() ); ?></h1>
            </div>
        
            <?php get_template_part( 'loop', 'list' ); ?>
            
            <ul class="pager pagenav no-border-top no-padding-top">
                <li class="previous"><?php previous_posts_link(); ?></li>
                <li class="next"><?php next_posts_link(); ?></li>
            </ul>
            
        </div>
        
        <?php get_template_part( 'include/content', 'sidebar-right' ); ?>
        
    </div>

<?php get_footer(); ?>