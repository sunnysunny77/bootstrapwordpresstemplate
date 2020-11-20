<?php
function boot_scripts() {

  wp_enqueue_style('bootstrap4', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css');
  wp_enqueue_script( 'boot1','https://code.jquery.com/jquery-3.3.1.slim.min.js', array( 'jquery' ),'',true );
  wp_enqueue_script( 'boot2','https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', array( 'jquery' ),'',true );
  wp_enqueue_script( 'boot3','https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js', array( 'jquery' ),'',true );
}
add_action( 'wp_enqueue_scripts', 'boot_scripts' );

function my_script() {	

wp_register_script('scripts', get_template_directory_uri() . '/js/scripts.js', '', false, true);
wp_enqueue_script('scripts');
wp_register_style('screen', get_template_directory_uri() . '/style.css', array(), false, 'all');
wp_enqueue_style('screen');
}
add_action('wp_enqueue_scripts', 'my_script');

add_theme_support('menus');

register_nav_menus( 

array(
  'primary' => __( 'Primary Menu', 'THEMENAME' ),
) 
);

function register_navwalker(){

require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

add_theme_support( 'widget-customizer');

register_sidebar(

array(
  'name' => 'widget',
  'before_widget' => '<div class = "widget">',
  'after_widget' => '</div>',
  'before_title' => '<h3>',
  'after_title' => '</h3>',
)
);

register_sidebar(

array(
  'name' => 'widget1',
  'before_widget' => '<div class = "widget1">',
  'after_widget' => '</div>',
  'before_title' => '<h3>',
  'after_title' => '</h3>',
)
);

function remove_posts_menu() {
    remove_menu_page('edit.php');
}
add_action('admin_menu', 'remove_posts_menu');
