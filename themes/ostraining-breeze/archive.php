<?php
/**
 * Template Name: Archives
 */
get_header();
?>

    <div class="row-fluid">
        <div id="content" class="<?php echo ( is_active_sidebar( 'right-side-bar' ) ) ? 'span9' : 'span12'; ?>">

            <?php
            // Get content from page
            if ( have_posts() ) :

                while ( have_posts() ) : the_post(); ?>

                    <div class="row-fluid">
                        <div class="span12 post-details">
                            <div class="page-header">
                                <h1><span class="muted"><?php _e('Archives:', 'ostraining-breeze'); ?></span> <?php the_title(); ?></h1>
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
            ?>

            <div class="row-fluid">
                <div class="span12 archive-categories">
                    <h2><?php _e( 'Categories', 'ostraining-breeze'); ?></h2>
                </div>
                <ul class="archive-categories-list">
                    <?php wp_list_categories('orderby=name&title_li=&show_count=1&feed_image=' . get_stylesheet_directory_uri() .'/images/rss.png'); ?>
                </ul>
            </div>
            
        </div>
        
        <?php get_template_part( 'include/content', 'sidebar-right' ); ?>
        
    </div>

<?php get_footer(); ?>