<?php

/* Google Font
 ========================================================================== */

function ostraining_breeze_font_url() {
    return esc_url_raw( '//fonts.googleapis.com/css?family=' . esc_html(get_theme_mod( 'ostraining_breeze_font', 'Open+Sans' )) . ':400,300,300italic,700,600,800' );
}

function ostraining_breeze_font_name() {
    return str_replace( '+', ' ', esc_html(get_theme_mod( 'ostraining_breeze_font', 'Open+Sans' )) );
}

/* Load CSS & JS
 ========================================================================== */

function ostraining_breeze_scripts() {
    wp_enqueue_style( 'ostraining-breeze-template-style', get_template_directory_uri() . '/css/template.css', array(), null );
    wp_enqueue_style( 'ostraining-breeze-mobilemenu-style', get_template_directory_uri() . '/css/mobilemenu.css', array(), null );
    wp_enqueue_style( 'font-awesome-style', get_template_directory_uri() . '/css/font-awesome/css/font-awesome.min.css', array(), '4.0.3' );
    wp_enqueue_style( 'ostraining-breeze-main', get_stylesheet_uri(), array(), '1.2.4' );
    wp_enqueue_style( 'google-font', ostraining_breeze_font_url(), array(), null );
    wp_enqueue_script( 'jquery-mobile-menu', get_template_directory_uri() . '/js/jquery.mobilemenu.js', array('jquery'), '1.1' );
    wp_enqueue_script( 'ostraining-breeze-mobile-menu', get_template_directory_uri() . '/js/mobilemenu.js', array(), null );
}
add_action( 'wp_enqueue_scripts', 'ostraining_breeze_scripts' );

function ostraining_breeze_html5_shiv () {
    echo '<!--[if lt IE 9]><script src="' . get_template_directory_uri() . '/js/html5.js"></script><![endif]-->';
}
add_action('wp_head', 'ostraining_breeze_html5_shiv');

function ostraining_breeze_head(){
    if( !is_admin() ) {
        require_once( get_template_directory() . '/include/custom-css.php' );
    }
}
add_action('wp_head', 'ostraining_breeze_head');

/* Menus
 ========================================================================== */

function ostraining_breeze_register_my_menus(){
    register_nav_menus(array(
        'main-menu' => __( 'Main Menu', 'ostraining-breeze' ),
        'footer-menu' => __( 'Footer Menu', 'ostraining-breeze' )
    ));
}
add_action('init', 'ostraining_breeze_register_my_menus');


/* Read more links
 ========================================================================== */

function ostraining_breeze_add_p_tag($ostraining_breeze_link){
    return "<p class=\"readmore\">" . $ostraining_breeze_link . "</p>";
}
add_action('the_content_more_link', 'ostraining_breeze_add_p_tag');


/* Featured images
 ========================================================================== */

function ostraining_breeze_post_thumbnails() {
    add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'ostraining_breeze_post_thumbnails' );

/* Post formats
 ========================================================================== */
 
function ostraining_breeze_post_formats() {
	add_theme_support( 'post-formats',
        array( 
            'aside', 
            'link',
            'image',
            'quote'
        ) 
    );
}
add_action( 'after_setup_theme', 'ostraining_breeze_post_formats' );

/* Sidebars
 ========================================================================== */

function ostraining_breeze_widgets_init() {
    // top
    register_sidebar(
        array (
            'name' => __( 'Top', 'ostraining-breeze' ),
            'id' => 'top-side-bar',
            'description' => __( 'Top Sidebar', 'ostraining-breeze' ),
            'before_widget' => '<div class="well %2$s">',
            'after_widget' => "</div>",
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        )
    );
    // footer
    register_sidebar(
        array (
            'name' => __( 'Footer', 'ostraining-breeze' ),
            'id' => 'footer-side-bar',
            'description' => __( 'Footer Sidebar', 'ostraining-breeze' ),
            'before_widget' => '<div class="footer-widget %2$s">',
            'after_widget' => "</div>",
            'before_title' => '<div class="modtitle "><h3 class="page-header">',
            'after_title' => '</h3></div>',
        )
    );
    // right
    register_sidebar(
        array (
            'name' => __( 'Right', 'ostraining-breeze' ),
            'id' => 'right-side-bar',
            'description' => __( 'Right Sidebar', 'ostraining-breeze' ),
            'before_widget' => '<div class="right-widget %2$s">',
            'after_widget' => "</div>",
            'before_title' => '<div class="moduletable"><h3>',
            'after_title' => '</h3></div>',
        )
    );
    // showcase
    register_sidebar(
        array (
            'name' => __( 'Showcase', 'ostraining-breeze' ),
            'id' => 'showcase-side-bar',
            'description' => __( 'Showcase Sidebar', 'ostraining-breeze' ),
            'before_widget' => '<div class="showcase-widget %2$s">',
            'after_widget' => "</div>",
            'before_title' => '<div class="moduletable"><h3>',
            'after_title' => '</h3></div>',
        )
    );
    // bottom
    register_sidebar(
        array (
            'name' => __( 'Bottom', 'ostraining-breeze' ),
            'id' => 'bottom-side-bar',
            'description' => __( 'Bottom Sidebar', 'ostraining-breeze' ),
            'before_widget' => '<div class="bottom-widget well %2$s">',
            'after_widget' => "</div>",
            'before_title' => '<h3 class="page-header">',
            'after_title' => '</h3>',
        )
    );
}
add_action( 'widgets_init', 'ostraining_breeze_widgets_init' );

// Set dynamic width for footer sidebar based on number of widgets
function ostraining_breeze_footer_set_dynamic_width($ostraining_breeze_params) {
    $ostraining_breeze_sidebar_id = $ostraining_breeze_params[0]['id'];
    if ( $ostraining_breeze_sidebar_id == 'footer-side-bar' ) {
        $ostraining_breeze_total_widgets = wp_get_sidebars_widgets();
        $ostraining_breeze_sidebar_widgets = count($ostraining_breeze_total_widgets[$ostraining_breeze_sidebar_id]);
        $ostraining_breeze_params[0]['before_widget'] = str_replace('class="', 'class="span' . floor(12 / $ostraining_breeze_sidebar_widgets) . ' ', $ostraining_breeze_params[0]['before_widget']);
    }
    return $ostraining_breeze_params;
}
add_filter('dynamic_sidebar_params','ostraining_breeze_footer_set_dynamic_width');

// Set dynamic width for showcase sidebar based on number of widgets
function ostraining_breeze_showcase_set_dynamic_width($ostraining_breeze_params) {
    $ostraining_breeze_sidebar_id = $ostraining_breeze_params[0]['id'];
    if ( $ostraining_breeze_sidebar_id == 'showcase-side-bar' ) {
        $ostraining_breeze_total_widgets = wp_get_sidebars_widgets();
        $ostraining_breeze_sidebar_widgets = count($ostraining_breeze_total_widgets[$ostraining_breeze_sidebar_id]);
        $ostraining_breeze_params[0]['before_widget'] = str_replace('class="', 'class="span' . floor(12 / $ostraining_breeze_sidebar_widgets) . ' ', $ostraining_breeze_params[0]['before_widget']);
    }
    return $ostraining_breeze_params;
}
add_filter('dynamic_sidebar_params','ostraining_breeze_showcase_set_dynamic_width');

// Set dynamic width for bottom sidebar based on number of widgets
function ostraining_breeze_bottom_set_dynamic_width($ostraining_breeze_params) {
    $ostraining_breeze_sidebar_id = $ostraining_breeze_params[0]['id'];
    if ( $ostraining_breeze_sidebar_id == 'bottom-side-bar' ) {
        $ostraining_breeze_total_widgets = wp_get_sidebars_widgets();
        $ostraining_breeze_sidebar_widgets = count($ostraining_breeze_total_widgets[$ostraining_breeze_sidebar_id]);
        $ostraining_breeze_params[0]['before_widget'] = str_replace('class="', 'class="span' . floor(12 / $ostraining_breeze_sidebar_widgets) . ' ', $ostraining_breeze_params[0]['before_widget']);
    }
    return $ostraining_breeze_params;
}
add_filter('dynamic_sidebar_params','ostraining_breeze_bottom_set_dynamic_width');


/* Search
 ========================================================================== */

function ostraining_breeze_search_form( $form ) {
    //check if there is a search query
    if( get_search_query() ){
        $ostraining_breeze_search_text = get_search_query();
    }
    else{
        $ostraining_breeze_search_text = esc_attr__( __( 'Search', 'ostraining-breeze' ) );
    }

    return '<form role="search" method="get" id="searchform" class="searchform form-inline" action="' . esc_url(home_url( '/' )) . '" >
        <input type="text" value="'. $ostraining_breeze_search_text .'" name="s" id="s" onblur="if (this.value==\'\') this.value=\''. $ostraining_breeze_search_text .'\';" onfocus="if (this.value==\''. $ostraining_breeze_search_text .'\') this.value=\'\';" />
    </form>';
}
add_filter( 'get_search_form', 'ostraining_breeze_search_form' );


/* Customization settings
 ========================================================================== */
 
function ostraining_breeze_theme_customizer( $ostraining_breeze_wp_customize ) {
    // Logo
    $ostraining_breeze_wp_customize->add_section( 'ostraining_breeze_logo_section' ,
        array(
            'title'       => __( 'Logo', 'ostraining-breeze' ),
            'priority'    => 20,
            'description' => __( 'Upload a logo to replace the default site name and description in the header', 'ostraining-breeze' )
        )
    );
    $ostraining_breeze_wp_customize->add_setting(
        'ostraining_breeze_logo',
        array(
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $ostraining_breeze_wp_customize->add_control(
        new WP_Customize_Image_Control(
            $ostraining_breeze_wp_customize,
            'ostraining_breeze_logo',
            array(
                'label'    => __( 'Logo', 'ostraining-breeze' ),
                'section'  => 'ostraining_breeze_logo_section',
                'settings' => 'ostraining_breeze_logo'
            )
        )
    );
    // Color
    $ostraining_breeze_wp_customize->add_section( 'ostraining_breeze_color_section' ,
        array(
            'title'       => __( 'Theme color', 'ostraining-breeze' ),
            'priority'    => 30,
            'description' => __( 'Choose the theme colors', 'ostraining-breeze' )
        ) 
    );
    $ostraining_breeze_wp_customize->add_setting( 'ostraining_breeze_color' ,
        array(
            'default' => '#2184cd',
            'sanitize_callback' => 'sanitize_hex_color'
        ) 
    );
    $ostraining_breeze_wp_customize->add_setting(
        'ostraining_breeze_color_hover' ,
        array(
            'default' => '#41a1d6',
            'sanitize_callback' => 'sanitize_hex_color',
        ) 
    );
    $ostraining_breeze_wp_customize->add_control(
        new WP_Customize_Color_Control( 
            $ostraining_breeze_wp_customize,
            'ostraining_breeze_color',
            array(
                'label'      => __( 'Main color', 'ostraining-breeze' ),
                'section'    => 'ostraining_breeze_color_section',
                'settings'   => 'ostraining_breeze_color'
            ) 
        )
    );
    $ostraining_breeze_wp_customize->add_control(
        new WP_Customize_Color_Control( 
            $ostraining_breeze_wp_customize,
            'ostraining_breeze_color_hover',
            array(
                'label'      => __( 'Main menu active color', 'ostraining-breeze' ),
                'section'    => 'ostraining_breeze_color_section',
                'settings'   => 'ostraining_breeze_color_hover'
            ) 
        )
    );
    // Google Font
    $ostraining_breeze_wp_customize->add_section(
        'ostraining_breeze_font_section' ,
        array(
            'title'       => __( 'Font', 'ostraining-breeze' ),
            'priority'    => 40,
            'description' => __( 'Choose a Google font', 'ostraining-breeze' )
        ) 
    );
    $ostraining_breeze_wp_customize->add_setting(
        'ostraining_breeze_font',
        array(
            'default'     => 'Open+Sans',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $ostraining_breeze_wp_customize->add_control(
        'ostraining_breeze_font',
        array(
            'section' => 'ostraining_breeze_font_section',
            'type'    => 'select',
            'choices' => array(
                'Open+Sans' => 'Open Sans',
                'Droid+Sans' => 'Droid Sans',
                'Lato' => 'Lato',
                'Ubuntu' => 'Ubuntu'
            )
        ) 
    );
    // Maximum Width
    $ostraining_breeze_wp_customize->add_section( 'ostraining_breeze_maxwidth_section' ,
        array(
            'title'       => __( 'Maximum Width', 'ostraining-breeze' ),
            'priority'    => 40,
            'description' => __( 'Set a maximum width value for the theme', 'ostraining-breeze' )
        )
    );
    $ostraining_breeze_wp_customize->add_setting( 'ostraining_breeze_maxwidth' ,
        array(
            'default' => 940,
            'sanitize_callback' => 'ostraining_breeze_sanitize_mywidth',
        )
    );
    $ostraining_breeze_wp_customize->add_control(
        'ostraining_breeze_maxwidth',
        array(
            'section'  => 'ostraining_breeze_maxwidth_section',
            'settings' => 'ostraining_breeze_maxwidth',
        )
    );
}
add_action('customize_register', 'ostraining_breeze_theme_customizer');

// Sanitize integer
function ostraining_breeze_sanitize_mywidth( $ostraining_breeze_input ) {
    $ostraining_breeze_input = preg_replace("/[^0-9]/","",$ostraining_breeze_input);
    if( !$ostraining_breeze_input ) $ostraining_breeze_input = 940;
    return $ostraining_breeze_input;
}


/* Title tag
 ========================================================================== */

function ostraining_breeze_title_for_home() {
    add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'ostraining_breeze_title_for_home' );


/* Feed links
 ========================================================================== */

function ostraining_breeze_feed_links() {
    add_theme_support( 'automatic-feed-links' );
}
add_action( 'after_setup_theme', 'ostraining_breeze_feed_links' );


/* Comments
 ========================================================================== */

function ostraining_breeze_comments_script(){
    if ( is_singular() ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'ostraining_breeze_comments_script' );

function ostraining_breeze_preprocess_comment_handler( $ostraining_breeze_commentdata ) {
    $ostraining_breeze_commentdata['comment_content'] = strip_tags( $ostraining_breeze_commentdata['comment_content'] );
    return $ostraining_breeze_commentdata;
}
add_filter( 'preprocess_comment' , 'ostraining_breeze_preprocess_comment_handler' );


/* Text Domain
 ========================================================================== */

function ostraining_breeze_textdomain(){
    load_theme_textdomain( 'ostraining-breeze', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'ostraining_breeze_textdomain' );


/* Content width
 ========================================================================== */

if ( ! isset( $content_width ) ) {
    $content_width = 920;
}