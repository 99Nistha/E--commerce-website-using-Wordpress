<?php get_header(); ?>

    <div class="row-fluid">
        <div class="page-header">
            <h1><span class="muted"><?php _e( 'Page not found', 'ostraining-breeze' ); ?></span> <?php _e( '404', 'ostraining-breeze' ); ?></h1>
        </div>
    </div>

    <div class="row-fluid">
        <div id="content" class="span12">

            <div class="alert alert-warning aligncenter">
                <?php _e( 'Sorry, the page you were looking for doesn\'t exist or was deleted.', 'ostraining-breeze' ); ?>
            </div>

        </div>
    </div>

<?php get_footer(); ?>