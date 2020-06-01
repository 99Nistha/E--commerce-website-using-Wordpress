<?php get_header(); ?>

    <?php  get_template_part( 'include/content', 'sidebar-top' ); ?>
    
    <div class="row-fluid">
        <div id="content" class="<?php echo ( is_active_sidebar( 'right-side-bar' ) ) ? 'span9' : 'span12'; ?>" itemscope itemtype="http://schema.org/Article">

            <?php if ( have_posts() ) :
                
                while ( have_posts() ) : the_post();
                    ?>

                    <div itemprop="articleBody">
                        <?php get_template_part( 'include/content', get_post_format() ); ?>
                    </div>

                    <?php wp_link_pages();
                    
                    comments_template();

                    get_template_part( 'include/content', 'pagination' );

                endwhile;
                
            else: ?>
            
                <p><?php _e('No posts were found. Sorry!', 'ostraining-breeze'); ?></p>
                
            <?php endif; ?>

        </div>
        
        <?php get_template_part( 'include/content', 'sidebar-right' ); ?>
        
    </div>
    
    <?php  get_template_part( 'include/content', 'sidebar-bottom' ); ?>

<?php get_footer(); ?>