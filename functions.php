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

    wp_enqueue_style('app-min', get_template_directory_uri() . '/assets/css/app.min.css');

    wp_enqueue_script('app-min', get_template_directory_uri() . '/assets/js/app.min.js','', '', true);

    wp_localize_script( 'app-min', 'frontend_ajax_object', array(
        'ajax_url' => admin_url( 'admin-ajax.php' ),
        //'data_var_1' => 'test',
    ));
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

function boot_on_theme_activation()
{

    function boot_remove_post($page_path, $output, $post_type)
    {

        $post = get_page_by_path($page_path, $output, $post_type);

        if ($post) {
            wp_delete_post($post->ID, true);
        }
    }

    boot_remove_post('hello-world', 'OBJECT', 'post');

    boot_remove_post('Sample Page', 'OBJECT', 'page');

    boot_remove_post('Privacy Policy', 'OBJECT', 'page');

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

    if (!get_page_template_slug(256)) {
        $page = array(
            'import_id'         =>  256,
            'post_title'     => 'Example',
            'post_type'      => 'page',
            'post_name'      => 'Example',
            'post_status'    => 'publish',
            'page_template' => 'page-example.php',
        );
        $id = wp_insert_post($page);
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

function boot_contact_form()
{
    $to_email = $_POST['to_email'];
    $subject = $_POST['subject'];
    $name = $_REQUEST["name"];
    $email = $_REQUEST["email"];
    $message = $_REQUEST["message"];
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $body = "
    <html>
    <p>You have a message from the contact us page on your website:</p>
    <b>Name: </b>".$name."
    <br><b>Email: </b>".$email."
    <br><b>Message: </b>".$message."
    </html>";
    $mail = mail($to_email, $subject, $body, $headers);
    if (!$mail) {
        print_r(error_get_last()['message']);
    } else {
        echo "Thanks, message sent.";
    }
    exit();
}
//add_action('wp_ajax_contact_form', "boot_contact_form");
//add_action('wp_ajax_nopriv_contact_form', 'boot_contact_form');

function boot_register_my_service_worker() {   
    echo '<link rel="manifest" href="'.get_template_directory_uri().'/manifest.json">';
    echo '<link rel="apple-touch-icon"" href="'.get_template_directory_uri().'assets/images/pwa-logo-small.png">';
}
add_action( 'wp_head', 'boot_register_my_service_worker' );

function boot_cptui_register_my_cpts()
{

    $labels = [
        "name" => __("products", "custom-post-type-ui"),
        "singular_name" => __("product", "custom-post-type-ui"),
    ];

    $args = [
        "label" => __("products", "custom-post-type-ui"),
        "labels" => $labels,
        "description" => "products",
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
        "rewrite" => ["slug" => "products", "with_front" => true],
        "query_var" => true,
        "supports" => ["title"],
        "menu_icon" => "dashicons-products",
        "show_in_graphql" => false,
    ];
    register_post_type("products", $args);
}
//add_action('init', 'boot_cptui_register_my_cpts');
