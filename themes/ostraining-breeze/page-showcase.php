<?php
/**
 * Template Name: Page Showcase
 */
get_header();
?>

    <?php get_template_part( 'include/content', 'sidebar-top' ); ?>
    
    <div class="row-fluid">
        <div id="content" class="span12">

            <?php
            if ( have_posts() ) :

                while ( have_posts() ) : the_post();
                    ?>

                    <div class="row-fluid">
                        <div <?php post_class('span12 page-details'); ?>>

                            <?php if( has_post_thumbnail( $post->ID ) ): ?>
                                <div class="pull-left item-image"><?php echo get_the_post_thumbnail($post->ID, 'full'); ?></div>
                            <?php endif;

                            // Content + Readmore
                            get_template_part( 'include/content', 'readmore' );
                            ?>

                        </div>
                    </div>

                <?php
                endwhile;

            else:

                get_template_part( 'include/content', 'notfound' );

            endif;

            ?>

        </div>
    </div>
    
    <?php get_template_part( 'include/content', 'sidebar-showcase' ); ?>

<?php get_footer(); ?>