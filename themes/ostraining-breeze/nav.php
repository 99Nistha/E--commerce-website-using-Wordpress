<!-- Header -->
<div class="row-fluid">
    <div class="span5">
        
        <?php if ( get_theme_mod( 'ostraining_breeze_logo' ) ) : ?>
            <a class="brand pull-left" href="<?php echo esc_url( home_url() ); ?>">
                <img src="<?php echo esc_url( get_theme_mod( 'ostraining_breeze_logo' ) ); ?>" alt="<?php bloginfo( 'name' ); ?>">
            </a>
            <br/>
        <?php else : ?>
            <h1 class="site-title">
                <a href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                    <?php bloginfo( 'name' ); ?>
                </a>
            </h1>
        <?php endif; ?>
        
        <span class="ost-tagline"><?php echo get_bloginfo ( 'description' );  ?></span>
        
    </div>
    <div class="span7">
        <div class="header-search pull-right">
            <div class="search">

                <?php get_search_form(); ?>

            </div>
        </div>
    </div>
</div>
<nav class="navigation" role="navigation">
    <?php
    wp_nav_menu(array(
        'theme_location' => 'main-menu',
        'container' => '',
        'menu_class' => 'nav menu nav-pills',
        'menu_id' => 'mainmenu',
        'fallback_cb' => false,
        'depth' => 2
    ));
    ?>
    <div class="mobilemenu_wrapper"></div>
</nav>
<!-- /Header -->