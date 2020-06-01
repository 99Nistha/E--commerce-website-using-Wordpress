<?php
/**
 * Template Name: Page Blog
 */
get_header(); 
?>
    
    <?php get_template_part( 'include/content', 'sidebar-top' ); ?>
    
    <div class="row-fluid">
        <div id="content" class="<?php echo ( is_active_sidebar( 'right-side-bar' ) ) ? 'span9' : 'span12'; ?>">

            <?php 
            // Get content from page
            if ( have_posts() ) :
            
                while ( have_posts() ) : the_post(); ?>

                    <div class="row-fluid">
                        <div class="span12 post-details">
                            <div class="page-header">
                                <h1><?php the_title(); ?></h1>
                            </div>
                            <?php if( has_post_thumbnail( $post->ID ) ): ?>
                                <div class="item-image"><?php echo get_the_post_thumbnail($post->ID, 'full'); ?></div>
                            <?php endif; ?>

                            <div class="page-textcontent">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>

                <?php endwhile;
                
            else:
                
                get_template_part( 'include/content', 'notfound' );
                
            endif; 
            
            // Get recent posts from all categories
            $args = array(
				'paged'             => get_query_var('paged'),
				'posts_per_page'    => get_option('posts_per_page')
			);
            query_posts($args); 
            
            // Force readmore
            global $ostraining_breeze_more;
            $ostraining_breeze_more = 0;
            ?>
            
            <div class="row-fluid">
                <div id="content" class="span12">

                    <?php get_template_part( 'loop', 'list' ); ?>

                </div>
            </div>
            
            <?php get_template_part( 'include/content', 'paginationlist' ); ?>
            
            <?php wp_reset_query(); ?>
        
        </div>
        
        <?php get_template_part( 'include/content', 'sidebar-right' ); ?>
    
    </div>
    
    <?php get_template_part( 'include/content', 'sidebar-bottom' ); ?>

<?php get_footer(); ?>