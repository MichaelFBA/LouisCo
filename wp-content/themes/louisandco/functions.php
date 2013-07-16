<?php
/**
 * Starkers functions and definitions
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package 		WordPress
 * @subpackage 	Starkers
 * @since 			False Behaving Animals 1.0
 */

/* ========================================================================================================================

Required external files

======================================================================================================================== */

require_once('external/starkers-utilities.php');
// Register Custom Navigation Walker
require_once('wp_bootstrap_navwalker.php');

/* ========================================================================================================================

Theme specific settings

Uncomment register_nav_menus to enable a single menu with the title of "Primary Navigation" in your theme

======================================================================================================================== */
//Add post thumbnails
add_theme_support('post-thumbnails');
//Add menu Support
add_theme_support('menus');
//Register Sidebar Widget
register_sidebar(array(
  'name' => 'First Widget',
  'before_widget' => '',
  'after_widget' => ''
));
//Add Custom image size
add_image_size('micro', 67, 67, true);

/* ========================================================================================================================

Actions and Filters

======================================================================================================================== */

add_action('wp_enqueue_scripts', 'starkers_script_enqueuer');

add_filter('body_class', array(
  'Starkers_Utilities',
  'add_slug_to_body_class'
));

/* ========================================================================================================================

Custom Post Types - include custom post types and taxonimies here e.g.

======================================================================================================================== */

require_once('custom-post-types/post-types.php');

/* ========================================================================================================================

Scripts

======================================================================================================================== */

function starkers_script_enqueuer()
{
  /* Javascripts */
  wp_deregister_script('jquery');
  wp_register_script('jQuery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js', '', '', false);
  wp_enqueue_script('jQuery');
  wp_register_script('site', get_template_directory_uri() . '/js/site.js', '', '', false);
  wp_enqueue_script('site');
  wp_register_script('bootstrapJS', get_template_directory_uri() . '/js/bootstrap.js', '', '', true);
  wp_enqueue_script('bootstrapJS');
  wp_register_script('imagesLoaded', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', '', '', true);
  wp_enqueue_script('imagesLoaded');
  wp_register_script('packery', get_template_directory_uri() . '/js/packery.pkgd.js', '', '', true);
  wp_enqueue_script('packery');
  
  
  
  /* Style Sheets */
  wp_register_style('reset', get_template_directory_uri() . '/css/reset.css', '', '', 'screen');
  wp_enqueue_style('reset');
  wp_register_style('screen', get_template_directory_uri() . '/style.css', '', '', 'screen');
  wp_enqueue_style('screen');
  wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css', '', '', 'screen');
  wp_enqueue_style('bootstrap');
  wp_register_style('responsiveCSS', get_template_directory_uri() . '/css/bootstrap-responsive.min.css', '', '', 'screen');
  wp_enqueue_style('responsiveCSS');  
  wp_register_style('oo', get_template_directory_uri() . '/css/oo.css', '', '', 'screen');
  wp_enqueue_style('oo');
  wp_register_style('css', get_template_directory_uri() . '/css/site.css', '', '', 'screen');
  wp_enqueue_style('css');
  wp_register_style('fonts', get_template_directory_uri() . '/css/fonts.css', '', '', 'screen');
  wp_enqueue_style('fonts');
}


/* ========================================================================================================================

Custom Excerpt Length

======================================================================================================================== */
/**
 * Custom Excerpt length
 * @parameters - String, number of words
 * @return string
 * @author Michael Bell
 */


//Custom Excerpt Length
function string_excerpt_length($passedSentence, $wordLength)
{
  // strip tags to avoid breaking any html
  $string = strip_tags($passedSentence);
  
  if (strlen($string) > $wordLength) {
    
    // truncate string
    $stringCut = substr($string, 0, $wordLength);
    
    // make sure it ends in a word so assassinate doesn't become ass...
    $string = substr($stringCut, 0, strrpos($stringCut, ' ')) . '...';
  }
  return $string;
}


/* ========================================================================================================================

Ajax

======================================================================================================================== */

// AJAX POSTS
add_action('wp_ajax_nopriv_do_ajax', 'our_ajax_function');
add_action('wp_ajax_do_ajax', 'our_ajax_function');
function our_ajax_function()
{
  
  switch ($_REQUEST['fn']) {
    case 'get_more_galleries':
      $output = ajax_get_more_galleries($_REQUEST['category'], $_REQUEST['trackOffset']);
      break;
    
    default:
      $output = 'No function specified, check your jQuery.ajax() call';
      break;
      
  }
  
  // at this point, $output contains some sort of valuable data!
  // Now, convert $output to JSON and echo it to the browser 
  // That way, we can recapture it with jQuery and run our success function
  
  $output = json_encode($output);
  if (is_array($output)) {
    print_r($output);
  } else {
    echo $output;
  }
  die;
}

// AJAX FUNCTIONS

function ajax_get_more_galleries($category, $trackOffset)
{
  $args = array(
    'cat' => $category,
    'posts_per_page' => 2,
    'post_status' => 'publish',
    'offset' => $trackOffset
  );
  
  $arr = array();
  
  $catloop = new WP_Query($args);
  
  while ($catloop->have_posts()):
    $catloop->the_post(); {
    $queryAttachments   = array();
    $entry              = array();
    $entry['id']        = get_the_ID();
    $entry['category']  = get_the_category();
    $entry['link']      = get_permalink();
    $entry['title']     = get_the_title();
    $entry['thumbnail'] = get_the_post_thumbnail(null, 'medium');
    
    $attachments = get_posts(array(
      'post_type' => 'attachment',
      'posts_per_page' => -1,
      'post_parent' => get_the_ID()
    ));
    
    if ($attachments) {
      foreach ($attachments as $attachment) {
        $queryAttachments[] = wp_get_attachment_image($attachment->ID, 'large');
      }
      $entry['attachments'] = $queryAttachments;
    }
    
    $entry['acf'] = get_fields();
    $arr[]        = $entry;
  }
  endwhile;
  return $arr;
  
}

/* ========================================================================================================================

Pagination Links (Bootstap)	

======================================================================================================================== */

function bootstrap_pagination($pages = '', $range = 2)
{
  $showitems = ($range * 2) + 1;
  
  global $paged;
  if (empty($paged))
    $paged = 1;
  
  if ($pages == '') {
    global $wp_query;
    $pages = $wp_query->max_num_pages;
    if (!$pages) {
      $pages = 1;
    }
  }
  
  if (1 != $pages) {
    echo "<div class='pagination pagination-centered'><ul>";
    if ($paged > 2 && $paged > $range + 1 && $showitems < $pages)
      echo "<li><a href='" . get_pagenum_link(1) . "'>&laquo;</a></li>";
    if ($paged > 1 && $showitems < $pages)
      echo "<li><a href='" . get_pagenum_link($paged - 1) . "'>&lsaquo;</a></li>";
    
    for ($i = 1; $i <= $pages; $i++) {
      if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
        echo ($paged == $i) ? "<li class='active'><span class='current'>" . $i . "</span></li>" : "<li><a href='" . get_pagenum_link($i) . "' class='inactive' >" . $i . "</a></li>";
      }
    }
    
    if ($paged < $pages && $showitems < $pages)
      echo "<li><a href='" . get_pagenum_link($paged + 1) . "'>&rsaquo;</a></li>";
    if ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages)
      echo "<li><a href='" . get_pagenum_link($pages) . "'>&raquo;</a></li>";
    echo "</ul></div>\n";
  }
}

/* ========================================================================================================================

Extras

======================================================================================================================== */


/* Customise Navigation classes */
//	Reduce nav classes, leaving only 'current-menu-item'
function nav_class_filter( $var ) {
	return is_array($var) ? array_intersect($var, array('current-menu-item')) : '';
}
add_filter('nav_menu_css_class', 'nav_class_filter', 100, 1);

//	Add page slug as nav IDs
function nav_id_filter( $id, $item ) {
	//print_r($item);
	return 'page-'.$item->object_id;
}
add_filter( 'nav_menu_item_id', 'nav_id_filter', 10, 2 );


?>