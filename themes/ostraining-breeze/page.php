<?php get_header(); ?>
    
    <?php get_template_part( 'include/content', 'sidebar-top' ); ?>
    
    <div class="row-fluid">
        <div id="content" class="<?php echo ( is_active_sidebar( 'right-side-bar' ) ) ? 'span9' : 'span12'; ?>">

            <?php if ( have_posts() ) :
                
                while ( have_posts() ) : the_post(); ?>

                    <div class="row-fluid">
                        <div class="span12 post-details">
                            <div class="page-header">
                                <h1><?php the_title(); ?></h1>
                            </div>
                            <?php if( has_post_thumbnail( $post->ID ) ): ?>
                                <div class="pull-left item-image"><?php echo get_the_post_thumbnail($post->ID, 'full'); ?></div>
                            <?php endif; ?>

                            <?php the_content(); ?>
                        </div>
                    </div>

                <?php endwhile;

            else:
                
                get_template_part( 'include/content', 'notfound' );
                
            endif; ?>

        </div>
        
        <?php get_template_part( 'include/content', 'sidebar-right' ); ?>
        
    </div>
    
    <?php get_template_part( 'include/content', 'sidebar-bottom' ); ?>

<?php get_footer(); ?>