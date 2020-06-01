<?php
if ( post_password_required() ) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php if ( have_comments() ) : ?>

        <h3 class="comments-title">
            <?php
            printf( _n( 'One comment', '%1$s comments', get_comments_number(), 'ostraining-breeze' ),
                number_format_i18n( get_comments_number() ), get_the_title() );
            ?>
        </h3>

        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
            <nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
                <h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'ostraining-breeze'); ?></h1>
                <div class="nav-previous"><?php previous_comments_link( _e( '&larr; Older Comments', 'ostraining-breeze' ) ); ?></div>
                <div class="nav-next"><?php next_comments_link( _e( 'Newer Comments &rarr;', 'ostraining-breeze' ) ); ?></div>
            </nav><!-- #comment-nav-above -->
        <?php endif; // Check for comment navigation. ?>

        <ol class="comment-list">
            <?php
            wp_list_comments( array(
                'style'      => 'ol',
                'short_ping' => true,
                'avatar_size'=> 34,
            ) );
            ?>
        </ol><!-- .comment-list -->

        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
            <nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
                <h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'ostraining-breeze' ); ?></h1>
                <div class="nav-previous"><?php previous_comments_link( _e( '&larr; Older Comments', 'ostraining-breeze' ) ); ?></div>
                <div class="nav-next"><?php next_comments_link( _e( 'Newer Comments &rarr;', 'ostraining-breeze' ) ); ?></div>
            </nav><!-- #comment-nav-below -->
        <?php endif; // Check for comment navigation. ?>

        <?php if ( ! comments_open() ) : ?>
            <p class="no-comments"><?php _e( 'Comments are closed.', 'ostraining-breeze' ); ?></p>
        <?php endif; ?>

    <?php endif; // have_comments() ?>

    <?php comment_form(); ?>

</div><!-- #comments -->
