<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta http-equiv="Content-Type" content="text/html;" charset="<?php bloginfo('charset'); ?>">

        <?php wp_head(); ?>

    </head>
    <body <?php body_class(); ?>>

        <!-- Main container -->
        <div class="body">
            <!-- Container -->
            <div class="container-fluid" style="max-width: <?php echo absint(get_theme_mod( 'ostraining_breeze_maxwidth', 940 )); ?>px">

                <?php get_template_part( 'nav' ); ?>