<?php

if ( ! defined( 'TREBAWP_VERSION' ) ) {
	define( 'TREBAWP_VERSION', '1.0.0' );
}

if ( ! function_exists( 'treba_wp_setup' ) ) :
	function treba_wp_setup() {
		load_theme_textdomain( 'treba-wp', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );
		// add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );

		register_nav_menus(
			array(
				'header' => esc_html__( 'Header', 'treba-wp' ),
        'footer' => esc_html__( 'Footer', 'treba-wp' ),
        'mobile' => esc_html__( 'Mobile', 'treba-wp' ),
        'lang_header' => esc_html__( 'Lang', 'treba-wp' ),
			)
		);

		add_theme_support(
			'html5',
			array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script')
		);
	}
endif;
add_action( 'after_setup_theme', 'treba_wp_setup' );

include('inc/enqueues.php');
include('inc/share-social.php');
include('inc/footer-links.php');
include('inc/comments-functions.php');
include('inc/post-vote.php');
include('inc/create-custom-posts.php');
include('inc/create-custom-taxonomy.php');

use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Block;

add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
    require_once __DIR__ . '/vendor/autoload.php';
    \Carbon_Fields\Carbon_Fields::boot();
    require_once get_template_directory() . '/inc/carbon-fields/carbon-fields-plugin.php';
    require_once get_template_directory() . '/inc/custom-fields/settings-meta.php';
    require_once get_template_directory() . '/inc/custom-fields/post-meta.php';
    require_once get_template_directory() . '/inc/custom-fields/page-meta.php';
    require_once get_template_directory() . '/inc/custom-fields/term-meta.php';
}

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

function itsme_disable_feed() {
 wp_die( __( 'No feed available, please visit the <a href="'. esc_url( home_url( '/' ) ) .'">homepage</a>!' ) );
}

add_action('do_feed', 'itsme_disable_feed', 1);
add_action('do_feed_rdf', 'itsme_disable_feed', 1);
add_action('do_feed_rss', 'itsme_disable_feed', 1);
add_action('do_feed_rss2', 'itsme_disable_feed', 1);
add_action('do_feed_atom', 'itsme_disable_feed', 1);
add_action('do_feed_rss2_comments', 'itsme_disable_feed', 1);
add_action('do_feed_atom_comments', 'itsme_disable_feed', 1);
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );

/**
 * Enqueue scripts and styles.
 */
function trebawp_scripts() {

	wp_enqueue_style( 'tailwind', get_stylesheet_directory_uri() . '/build/tailwind.css', false, time() );
	wp_enqueue_style( 'styles', get_stylesheet_directory_uri() . '/build/style.css', false, time() );
	
	wp_enqueue_script( 'all-scripts', get_template_directory_uri() . '/build/scripts.js', '','',true);

	// if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	// 	wp_enqueue_script( 'comment-reply' );
	// }
}
add_action( 'wp_enqueue_scripts', 'trebawp_scripts' );

function wpdocs_enqueue_custom_admin_style() {
  wp_register_style( 'admin-style', get_template_directory_uri() . '/build/admin-style.css', false, time() );
  wp_enqueue_style( 'admin-style' );
}
add_action( 'admin_enqueue_scripts', 'wpdocs_enqueue_custom_admin_style' );

// Создаем счетчик для записей
function tutCount($post_id) {
  if ( metadata_exists( 'post', $post_id, 'post_count' ) ) {
    $count_value = get_post_meta( $post_id, 'post_count', true );
    $count_value = $count_value + 1;
    update_post_meta( $post_id, 'post_count', $count_value );
  } else {
    $rand_post_count = mt_rand(50, 144);
    add_post_meta( $post_id, 'post_count', $rand_post_count, true);
  }
  $post_count = get_post_meta( $post_id, 'post_count', true );
  return $post_count;
}

// Создаем счетчик для категорій
function termCount($term_id) {
  $tr_array_id = array();
  $tr_ids = pll_get_term_translations($term_id);
  foreach ($tr_ids as $tr_id) {
    array_push($tr_array_id, $tr_id);
  }
  foreach ($tr_array_id as $id) {
    if ( metadata_exists( 'term', $id, 'term_count' ) ) {
      $count_value = get_term_meta( $id, 'term_count', true );
      $count_value = $count_value + 1;
      update_term_meta( $id, 'term_count', $count_value );
    } else {
      $rand_term_count = mt_rand(50, 144);
      add_term_meta( $id, 'term_count', $rand_term_count, true);
    }
    $term_count = get_term_meta( $id, 'term_count', true );
  }
  return $term_count;
}



function get_page_url($template_name) {
  $pages = get_posts([
    'post_type' => 'page',
    'post_status' => 'publish',
    'meta_query' => [
      [
        'key' => '_wp_page_template',
        'value' => $template_name.'.php',
        'compare' => '='
      ]
    ]
  ]);
  if(!empty($pages))
  {
    foreach($pages as $pages__value)
    {
      return get_permalink($pages__value->ID);
    }
  }
  return get_bloginfo('url');
}

//Add Ajax
add_action('wp_head', 'myplugin_ajaxurl');
function myplugin_ajaxurl() {
  echo '<script type="text/javascript">
    var ajaxurl = "' . admin_url('admin-ajax.php') . '";
  </script>';
}

//Update TimeToRead 
function update_time_read( ) {
  //Get data
  $post_id = stripslashes_deep($_POST['post_id']);
  $time_var = stripslashes_deep($_POST['time_var']);
  update_post_meta( $post_id, 'post_time_read', $time_var );
  wp_die();
}
add_action( 'wp_ajax_nopriv_update_time_read_action', 'update_time_read' );
add_action( 'wp_ajax_update_time_read_action', 'update_time_read' );

add_filter('get_the_archive_title', function ($title) {
  if (is_category()) {
    $title = single_cat_title('', false);
  } elseif (is_tag()) {
    $title = single_tag_title('', false);
  } elseif (is_author()) {
    $title = '<span class="vcard">' . get_the_author() . '</span>';
  } elseif (is_tax()) { //for custom post types
    $title = sprintf(__('%1$s'), single_term_title('', false));
  } elseif (is_post_type_archive()) {
    $title = post_type_archive_title('', false);
  }
  return $title;
});

function get_city_min_price($query) {
  $posts = $query->posts;
  $min_value_array = [];
  foreach($posts as $post) {
    $post_id = $post->ID;
    $hotel_min_price = get_post_meta( $post_id, '_crb_places_price', true );
    if ($hotel_min_price) {
      $min_price = str_replace([' ', 'грн', 'грн.', '$'], ' ', $hotel_min_price);
      $min_price = str_replace(' ', '', $min_price);
      $min_price = (int)$min_price;
      array_push($min_value_array, $min_price);
    }
    
  }
  return min($min_value_array);
}

function get_city_max_price($query) {
  $posts = $query->posts;
  $max_value_array = [];
  foreach($posts as $post) {
    $post_id = $post->ID;
    $hotel_max_price = get_post_meta( $post_id, '_crb_places_price', true );
    if ($hotel_max_price) {
      $max_price = str_replace([' ', 'грн', 'грн.', '$'], ' ', $hotel_max_price);
      $max_price = str_replace(' ', '', $max_price);
      $max_price = (int)$max_price;
      array_push($max_value_array, $max_price);
    }
    
  }
  return max($max_value_array);
}

function get_city_average_price($query) {
  $posts = $query->posts;
  $average_value_array = [];
  foreach($posts as $post) {
    $post_id = $post->ID;
    $hotel_average_price = get_post_meta( $post_id, '_crb_places_price', true );
    if ($hotel_average_price) {
      $average_price = str_replace([' ', 'грн', 'грн.', '$'], ' ', $hotel_average_price);
      $average_price = str_replace(' ', '', $average_price);
      $average_price = (int)$average_price;
      array_push($average_value_array, $average_price);
    }
    
  }
  $average_value_array = array_filter($average_value_array);
  $average = array_sum($average_value_array)/count($average_value_array);
  return $average;
}