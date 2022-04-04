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

        add_theme_support('custom-logo', array('height' => 100, 'width' => 100,  'unlink-homepage-logo' => true,  'header-text' => array('site-title', 'site-description')));

        add_theme_support('title-tag');

        add_theme_support('html5', ['script', 'style', 'comment-form', 'search-form', 'gallery', 'caption']);

        add_theme_support('menus');

        // add_theme_support('post-formats', array('aside', 'gallery', 'quote', 'image', 'video'));

        // add_theme_support('automatic-feed-links');

        add_theme_support('post-thumbnails');

        require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
    }
}
add_action('after_setup_theme', 'boot_setup');

function boot_scripts()
{

    wp_deregister_script('jquery');

    wp_enqueue_script('jquery', get_template_directory_uri() . '/js/bs/jquery.js', '', '', false);

    wp_enqueue_script('bootstrap_js', get_template_directory_uri() . '/js/bs/bootstrap.bundle.min.js',  array( 'jquery' ), '', true);
    
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css');

    wp_enqueue_script('jquery-form','', array( 'jquery' ), '', true); 
   
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
add_action('wp_enqueue_scripts', 'boot_scripts');

function boot_custom_sidebars()
{
    register_sidebar(
        array(
            'name' => 'widget one',
            'id' => 'widget_one',
            'before_widget' => '<li id="%1$s" class="widget %2$s">',
			'after_widget'  => '</li>',
			'before_title'  => '<h3 class="widgettitle">',
			'after_title'   => '</h3>',
        )
    );
}
add_action('widgets_init', 'boot_custom_sidebars');

function boot_post_limits($query)
{
    if (!is_admin() && $query->is_main_query()) {

        if (is_home()) {
            $query->set('posts_per_page', '3');
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

/*

function boot_submit_form()
{
 
   require_once(get_template_directory() . '/'); 
    
    =

    <form class="grid-x align-center" method="post" id="submit_form">   
        <input type="hidden" name="action" value="submit_form" >  
    </form>
    
   
  
    exit();
}
add_action('wp_ajax_submit_form', "boot_submit_form");
add_action('wp_ajax_nopriv_submit_form', 'boot_submit_form');

function boot_cptui_register_my_cpts()
{

    $labels = [
        "name" => __("", "custom-post-type-ui"),
        "singular_name" => __("", "custom-post-type-ui"),
    ];

    $args = [
        "label" => __("", "custom-post-type-ui"),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive" => false,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "can_export" => false,
        "rewrite" => ["slug" => "", "with_front" => true],
        "query_var" => true,
        "supports" => ["title"],
        "show_in_graphql" => false,
    ];

    register_post_type("products", $args);
}

add_action('init', 'boot_cptui_register_my_cpts');

*/

function boot_on_theme_activation()
{

    function foundation_post_meta($id, $key, $val)
    {
        add_post_meta($id, $key, $val, true);
    }

    /*
       $ = [ '' => [ , ],;

    if (get_post_type_object("")) {
        foreach ($ as $x => $) {
            $page = array(
                'post_type'      => '',
                'post_status'    => 'publish',
                'post_title' =>  $x,
            );
            $id = wp_insert_post($page);
           foundation_post_meta($id, '', '');
        }
    }

     if (!get_page_template_slug(256)) {
        $page = array(
            'import_id'         =>  256,
            'post_title'     => '',
            'post_type'      => 'page',
            'post_name'      => '',
            'post_status'    => 'publish',
            'page_template' => 'page-.php',
        );
        $id = wp_insert_post($page);
        // foundation_post_meta($id, '', '');
    }

    */

    if (!get_option('page_on_front')) {
        $page = array(
            'post_title'     => 'Home',
            'post_type'      => 'page',
            'post_name'      => 'Home',
            'post_status'    => 'publish',
        );
        $id = wp_insert_post($page);
        update_option('page_on_front', $id);
        update_option('show_on_front', 'page');
        // foundation_post_meta($id, '', '');
    }

    if (!get_option('page_for_posts')) {
        $page = array(
            'post_title'     => 'Posts',
            'post_type'      => 'page',
            'post_name'      => 'Posts',
            'post_status'    => 'publish',
        );
        $id = wp_insert_post($page);
        update_option('page_for_posts', $id);
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
