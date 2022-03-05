<?php

if (!isset($content_width)) {
    $content_width = 1920;
}

if (!function_exists('boot_setup')) {

    function boot_setup()
    {
        register_nav_menus(
            array(
            'main-nav' => 'Main Navigation',
            'footer-nav' => 'Footer Navigation',)
        );

        add_theme_support('widget-customizer');

        add_theme_support('custom-logo', array('height' => 100, 'width' => 100, 'header-text' => array('site-title', 'site-description')));

        add_theme_support('title-tag');

        add_theme_support('html5', ['script', 'style', 'comment-form', 'search-form', 'gallery', 'caption']);

        add_theme_support('menus');

        // add_theme_support('post-formats', array('aside', 'gallery', 'quote', 'image', 'video'));

        // add_theme_support('automatic-feed-links');

        // add_theme_support('post-thumbnails');

        require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
    }
}
add_action('after_setup_theme', 'boot_setup');

function foundation_scripts()
{


    wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery.js');
 
    wp_enqueue_script('popper', get_template_directory_uri() . '/js/popper-js.js');
 
    wp_enqueue_script('bootstrap_js', get_template_directory_uri() . '/js/bootstrap.min.js');

    //theme styles
    if (is_front_page()) {
        wp_enqueue_style('home-css', get_template_directory_uri() . '/assets/css/home.css');
    }  else if (is_home()) {
        wp_enqueue_style('blog-css', get_template_directory_uri() . '/assets/css/blog.css');
    } else if (is_single()) {
        wp_enqueue_style('single-css', get_template_directory_uri() . '/assets/css/single.css');
    } else if (is_archive()) {
        wp_enqueue_style('archive-css', get_template_directory_uri() . '/assets/css/archive.css');
    } else if (is_search()) {
        wp_enqueue_style('search-css', get_template_directory_uri() . '/assets/css/search.css');
    } else if (is_404()) {
        wp_enqueue_style('notfound-css', get_template_directory_uri() . '/assets/css/notfound.css');
    }
}
add_action('wp_enqueue_scripts', 'foundation_scripts');

function boot_custom_sidebars()
{
    register_sidebar(
        array(
            'name' => 'widget one',
            'id' => 'widget_one',
            'before_widget' => '<li id="%1$s" class="widget %2$s">',
			'after_widget'  => '</li>',
			'before_title'  => '<h2 class="widgettitle">',
			'after_title'   => '</h2>',
        )
    );
}
add_action('widgets_init', 'boot_custom_sidebars');

function boot_post_limits($query)
{
    if (!is_admin() && $query->is_main_query()) {

        if (is_home()) {
            $query->set('posts_per_page', '1');
        }
    }
}
add_action('pre_get_posts', 'boot_post_limits');

function boot_session() {
    if ( ! session_id() ) {
        session_start();
    }
}
add_action( 'init', 'boot_session' );


function boot_on_theme_activation()
{

    if (!get_option('page_on_front')) {
        $page = array(
            'post_title'     => 'Home',
            'post_type'      => 'page',
            'post_name'      => 'Home',
            'post_status'    => 'publish',
        );
        wp_insert_post($page);
        update_option('page_on_front', get_page_by_title('Home')->ID);
        update_option('show_on_front', 'page');
    }

    if (!get_option('page_for_posts')) {
        $page = array(
            'post_title'     => 'Posts',
            'post_type'      => 'page',
            'post_name'      => 'Posts',
            'post_status'    => 'publish',
        );
        wp_insert_post($page);
        update_option('page_for_posts', get_page_by_title('Posts')->ID);
    }

	update_option( 'uploads_use_yearmonth_folders', 0 );
}
add_action('after_switch_theme', 'boot_on_theme_activation');

add_filter( 'pre_option_upload_path', function( $upload_path ) {
    return  get_template_directory() . '/files' ;
});

add_filter( 'pre_option_upload_url_path', function( $upload_url_path ) {
    return get_template_directory_uri() . '/files';
});

function boot_custom_logo_output( $html ) {
	$html = str_replace('custom-logo-link', 'navbar-brand', $html );
	return $html;
}
add_filter('get_custom_logo', 'boot_custom_logo_output', 10);
