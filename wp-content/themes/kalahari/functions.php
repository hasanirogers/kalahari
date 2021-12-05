<?php

// includes
// include_once('inc/admin/gutenberg.php');
include_once('inc/admin/customize.php');
include_once('inc/utilities/get-user-role.php');
include_once('inc/post-types/featured.php');

// disable admin bar
add_filter('show_admin_bar', '__return_false');

// enqueue font end bundles
if (!is_admin()) {
  wp_enqueue_style('bundle-css', get_theme_file_uri('/bundles/frontend.css'));
  wp_enqueue_script('bundle-js', get_theme_file_uri('/bundles/frontend.js'), array(), false, true);

  wp_enqueue_style('parent-css', get_template_directory_uri() . '/style.css');
}

// enqueue admin bundles
if (is_admin()) {
  wp_enqueue_style('admin-css', get_theme_file_uri('/bundles/admin.css'));
  wp_enqueue_script('admin-js', get_theme_file_uri('/bundles/admin.js'), array('wp-blocks', 'wp-block-editor', 'wp-components', 'wp-element'), false, true);
}

// enqueue fonts
function kalahari_add_fonts() {
  wp_enqueue_style( 'poiret-one', 'https://fonts.googleapis.com/css2?family=Poiret+One&display=swap', false );
  wp_enqueue_style( 'nunito', 'https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap', false );
}
add_action( 'wp_enqueue_scripts', 'kalahari_add_fonts' );

// meta info
function kalahari_add_meta_tags() {
  echo '<meta name="author" content="Hasani Rogers">';
  echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
  echo '<base href="/">';
  echo '<link rel="icon" href="'. get_theme_file_uri('/images/favicon.ico') .'">';
  echo '<meta name="theme-color" content="#2557a7"/>';
  echo '<meta name="mobile-web-app-capable" content="yes">';
  echo '<meta name="application-name" content="Kalahari African Cuisine">';
  echo '<meta name="apple-mobile-web-app-capable" content="yes">';
  echo '<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">';
  echo '<meta name="apple-mobile-web-app-title" content="Kalahari African Cuisine">';
  echo '<link rel="apple-touch-icon" href="'. get_theme_file_uri('/images/manifest/icon-48x48.png') .'">';
  echo '<link rel="apple-touch-icon" sizes="72x72" href="'. get_theme_file_uri('/images/manifest/icon-72x72.png') .'">';
  echo '<link rel="apple-touch-icon" sizes="96x96" href="'. get_theme_file_uri('/images/manifest/icon-96x96.png') .'">';
  echo '<link rel="apple-touch-icon" sizes="144x144" href="'. get_theme_file_uri('/images/manifest/icon-144x144.png') .'">';
  echo '<link rel="apple-touch-icon" sizes="192x192" href="'. get_theme_file_uri('/images/manifest/icon-192x192.png') .'">';
}
add_action('wp_head', 'kalahari_add_meta_tags', '1');

// body class
function kalahari_body_classes($classes) {
  global $post;

  $slug = $post->post_name;
  $classes[] = 'kalahari';
  $classes[] = 'kalahari--' . $slug;

  return $classes;
}
add_filter('body_class', 'kalahari_body_classes');

// menu
register_nav_menu('primary-menu', 'Primary Menu');

// title tag
add_theme_support('title-tag');

// thumbnail
add_theme_support('post-thumbnails');
