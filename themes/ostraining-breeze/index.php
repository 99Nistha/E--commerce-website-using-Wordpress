<?php get_header(); ?>

    <?php get_template_part( 'include/content', 'sidebar-top' ); ?>

    <div class="row-fluid">
        <div id="content" class="<?php echo ( is_active_sidebar( 'right-side-bar' ) ) ? 'span9' : 'span12'; ?>">

            <?php get_template_part( 'loop', 'index' ); ?>

            <?php get_template_part( 'include/content', 'paginationlist' ); ?>

        </div>

        <?php get_template_part( 'include/content', 'sidebar-right' ); ?>

    </div>

    <?php get_template_part( 'include/content', 'sidebar-showcase' ); ?>

<?php get_footer(); ?>