<?php
function boot_scripts()
{

  wp_enqueue_style('bootstrap4', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css');
  wp_enqueue_script('boot1', 'https://code.jquery.com/jquery-3.5.1.js', array('jquery'), '', true);
  wp_enqueue_script('boot2', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', array('jquery'), '', true);
  wp_enqueue_script('boot3', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js', array('jquery'), '', true);
}
add_action('wp_enqueue_scripts', 'boot_scripts');

function my_script()
{

  wp_register_script('scripts', get_template_directory_uri() . '/js/scripts.js', '', false, true);
  wp_enqueue_script('scripts');
  wp_register_style('screen', get_template_directory_uri() . '/style.css', array(), false, 'all');
  wp_enqueue_style('screen');
}
add_action('wp_enqueue_scripts', 'my_script');

add_theme_support('menus');

register_nav_menus(

  array(
    'primary' => __('Primary Menu', 'THEMENAME'),
  )
);

function register_navwalker()
{

  require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action('after_setup_theme', 'register_navwalker');

add_theme_support('widget-customizer');

function register_my_custom_sidebars()
{
  register_sidebar(
    array(
      'name' => 'widget',
      'id' => 'sidebar-1',
      'before_widget' => '<div class = "widget">',
      'after_widget' => '</div>',
      'before_title' => '<h3>',
      'after_title' => '</h3>',
    )
  );
  register_sidebar(
    array(
      'name' => 'widget1',
      'id' => 'sidebar-2',
      'before_widget' => '<div class = "widget1">',
      'after_widget' => '</div>',
      'before_title' => '<h3>',
      'after_title' => '</h3>',
    )
  );
}
add_action('widgets_init', 'register_my_custom_sidebars');

function remove_posts_menu()
{
  remove_menu_page('edit.php');
}
add_action('admin_menu', 'remove_posts_menu');


function target_main_category_query_with_conditional_tags($query)
{
  if (!is_admin() && $query->is_main_query()) {

    if (is_home()) {
      $query->set('post_type', 'blog_posts');
      $query->set('posts_per_page', '1');
    }
  
    if (is_archive()) {
      $query->set('post_type', 'blog_posts');
      $query->set('posts_per_page', '3');
    }
   
  }
}
add_action('pre_get_posts', 'target_main_category_query_with_conditional_tags');


add_filter('sp_wp_carousel_post_type_args', 'show_to_editor');
function show_to_editor( $args ) {
	unset( $args['show_ui'] );
	$editor_compatible = array( 'show_ui' => current_user_can( 'edit_others_pages' ) ? true : false );
	return array_merge( $args, $editor_compatible );
}

add_action( 'admin_init', 'add_gf_cap' );

add_filter( 'gform_submit_button', 'form_submit_button', 10, 2 );
function form_submit_button( $button, $form ) {
    return "<button class='btn-dark' id='gform_submit_button_{$form['id']}'><span>Submit</span></button>";
}



/**
 * Gravity Forms Bootstrap Styles
 *
 * Applies bootstrap classes to various common field types.
 * Requires Bootstrap to be in use by the theme.
 *
 * Using this function allows use of Gravity Forms default CSS
 * in conjuction with Bootstrap (benefit for fields types such as Address).
 *
 * @see  gform_field_content
 * @link http://www.gravityhelp.com/documentation/page/Gform_field_content
 *
 * @return string Modified field content
 */
add_filter("gform_field_content", "bootstrap_styles_for_gravityforms_fields", 10, 5);
function bootstrap_styles_for_gravityforms_fields($content, $field, $value, $lead_id, $form_id){

	// Currently only applies to most common field types, but could be expanded.

	if($field["type"] != 'hidden' && $field["type"] != 'list' && $field["type"] != 'multiselect' && $field["type"] != 'checkbox' && $field["type"] != 'fileupload' && $field["type"] != 'date' && $field["type"] != 'html' && $field["type"] != 'address') {
		$content = str_replace('class=\'medium', 'class=\'form-control medium', $content);
	}

	if($field["type"] == 'name' || $field["type"] == 'address') {
		$content = str_replace('<input ', '<input class=\'form-control\' ', $content);
	}

	if($field["type"] == 'textarea') {
		$content = str_replace('class=\'textarea', 'class=\'form-control textarea', $content);
	}

	if($field["type"] == 'checkbox') {
		$content = str_replace('li class=\'', 'li class=\'form-check ', $content);
		$content = str_replace('<input ', '<input style=\'margin-top:-2px\' ', $content);
		$content = str_replace('<label ', '<label class=\'form-check-label\' ', $content);
	}

	if($field["type"] == 'radio') {
		$content = str_replace('li class=\'', 'li class=\'radio ', $content);
		$content = str_replace('<input ', '<input style=\'margin-left:1px;\' ', $content);
	}

	return $content;

} // End bootstrap_styles_for_gravityforms_fields()


