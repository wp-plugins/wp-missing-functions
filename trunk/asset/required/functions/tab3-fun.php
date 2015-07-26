<?php

$dir = dirname(__FILE__);
require_once(ABSPATH.'wp-includes/pluggable.php');
require_once (ABSPATH. 'wp-content/plugins/wp-missing-functions/asset/required/options/tab3-ops.php');
$SEMFoption = SEMFgetOptions();


if ($SEMFoption['wmf_remove_head_link'] == 1){
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
}

if ($SEMFoption['wmf_remove_img_ptags'] == 1){
// Stop images getting wrapped up in p tags when they get dumped out with the_content() for easier theme styling
function wmf_remove_img_ptags($content){
	return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter('the_content', 'wmf_remove_img_ptags');
}

if ($SEMFoption['wmf_google_analytics'] == 1){
// google ana;ytics code
    
    function add_google_analytics() {
        $SEMFoption = SEMFgetOptions();
	echo '<script src="http://www.google-analytics.com/ga.js" type="text/javascript"></script>';
	echo '<script type="text/javascript">';
	echo 'var pageTracker = _gat._getTracker("UA-'.$SEMFoption['wmf_google_analytics_code'].'");';
	echo 'pageTracker._trackPageview();';
	echo '</script>';
}
add_action('wp_footer', 'add_google_analytics');
}

if ($SEMFoption['wmf_google_analytics'] == 1){
function rss_post_thumbnail($content) {
global $post;
if(has_post_thumbnail($post->ID)) {
$content = '<p>' . get_the_post_thumbnail($post->ID) .
'</p>' . get_the_content();
}
return $content;
}
add_filter('the_excerpt_rss', 'rss_post_thumbnail');
add_filter('the_content_feed', 'rss_post_thumbnail');
}


if ($SEMFoption['wmf_front_jquery_enqueue'] == 1){
function wmf_front_jquery_enqueue() {
	wp_deregister_script('jquery');
	wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js", false, null);
	wp_enqueue_script('jquery');
}
if (!is_admin()) add_action("wp_enqueue_scripts", "wmf_front_jquery_enqueue", 11);
}

if ($SEMFoption['wmf_IEhtml5_shim'] == 1){
// Call Googles HTML5 Shim, but only for users on old versions of IE
function wmf_IEhtml5_shim () {
	global $is_IE;
	if ($is_IE)
	echo '<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->';
}
add_action('wp_head', 'wmf_IEhtml5_shim');
}


if ($SEMFoption['wmf_rss_post_thumbnail'] == 1){
function wmf_rss_post_thumbnail($content) {
    global $post;
    if(has_post_thumbnail($post->ID)) {
        $content = '<p>' . get_the_post_thumbnail($post->ID) .
        '</p>' . get_the_content();
    }

    return $content;
}
add_filter('the_excerpt_rss', 'wmf_rss_post_thumbnail');
add_filter('the_content_feed', 'wmf_rss_post_thumbnail');
}

if ($SEMFoption['wmf_disable_feed'] == 1){
function wmf_disable_feed() {
	wp_die( __('No feed available,please visit our <a href="'. get_bloginfo('wpurl') .'">homepage</a>!') );
	}
	 
	add_action('do_feed', 'wmf_disable_feed', 1);
	add_action('do_feed_rdf', 'wmf_disable_feed', 1);
	add_action('do_feed_rss', 'wmf_disable_feed', 1);
	add_action('do_feed_rss2', 'wmf_disable_feed', 1);
	add_action('do_feed_atom', 'wmf_disable_feed', 1);
	}


if ($SEMFoption['wmf_no_self_ping'] == 1){  
	   //remove pings to self
function wmf_no_self_ping( &$links ) {
    $home = get_option( 'home' );
	    foreach ( $links as $l => $link )
		        if ( 0 === strpos( $link, $home ) )
            unset($links[$l]); 
			} 
add_action( 'pre_ping', 'wmf_no_self_ping' );
}

if ($SEMFoption['wmf_ajx_sharpen_resize'] == 1){ 
//This function sharpening resized jpg images.
function wmf_ajx_sharpen_resize( $resized_file ) {
    $image = wp_load_image( $resized_file );
	    if ( !is_resource( $image ) )
		        return new WP_Error( 'error_loading_image', $image, $file );
    $size = @getimagesize( $resized_file );
	    if ( !$size )
        return new WP_Error('invalid_image', __('Could not read image size'), $file);
		    list($orig_w, $orig_h, $orig_type) = $size;
    switch ( $orig_type ) {
        case IMAGETYPE_JPEG:
            $matrix = array(
	                array(-1, -1, -1),
	                array(-1, 16, -1),
	                array(-1, -1, -1),
		            );
            $divisor = array_sum(array_map('array_sum', $matrix));
            $offset = 0;
            imageconvolution($image, $matrix, $divisor, $offset);
            imagejpeg($image, $resized_file,apply_filters( 'jpeg_quality', 90, 'edit_image' ));
            break;
        case IMAGETYPE_PNG:
            return $resized_file;
        case IMAGETYPE_GIF:
            return $resized_file;
			    }
    return $resized_file;
	 }   
add_filter('image_make_intermediate_size','wmf_ajx_sharpen_resize',900);
}

if ($SEMFoption['wmf_enable_gzip'] == 1){
//Enable Gzip
if(extension_loaded("zlib") && (ini_get("output_handler") != "ob_gzhandler"))
   add_action('wp', create_function('', '@ob_end_clean();@ini_set("zlib.output_compression", 1);'));
   }
   
   if ($SEMFoption['wmf_defer_js_prasing'] == 1){
// defer js
function defer_parsing_of_js ( $url ) {
if ( FALSE === strpos( $url, '.js' ) ) return $url;
if ( strpos( $url, 'jquery.js' ) ) return $url;
return "$url' defer ";
}
add_filter( 'clean_url', 'defer_parsing_of_js', 11, 1 );

   }
   
    if ($SEMFoption['wmf_remove_script_ver'] == 1){
// remove script version
function _remove_script_version( $src ){
$parts = explode( '?', $src );
return $parts[0];
}
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );

   }
 
   if ($SEMFoption['wmf_feeds_to_header'] == 1){
// Add Feeds to Header
if (function_exists('automatic_feed_links')) {
	automatic_feed_links();
} else {
	return;
}
   }
   
    if ($SEMFoption['wmf_include_jquery'] == 1){
// smart jquery inclusion
if (!is_admin()) {
	wp_deregister_script('jquery');
	wp_register_script('jquery', ("https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"), false);
	wp_enqueue_script('jquery');
}
   }

 if ($SEMFoption['wmf_custom_breadcrumbs'] == 1) {
//Breadcrumbs
/* you have to add <?php if (function_exists('wmf_custom_breadcrumbs')) wmf_custom_breadcrumbs(); ?> where you want to show breadcrumbs */
function wmf_custom_breadcrumbs() {
 
  $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
  $delimiter = '&raquo;'; // delimiter between crumbs
  $home = 'Home'; // text for the 'Home' link
  $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
  $before = '<span class="current">'; // tag before the current crumb
  $after = '</span>'; // tag after the current crumb
 
  global $post;
  $homeLink = get_bloginfo('url');
 
  if (is_home() || is_front_page()) {
 
    if ($showOnHome == 1) echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a></div>';
 
  } else {
 
    echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
 
    if ( is_category() ) {
      $thisCat = get_category(get_query_var('cat'), false);
      if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
      echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;
 
    } elseif ( is_search() ) {
      echo $before . 'Search results for "' . get_search_query() . '"' . $after;
 
    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('d') . $after;
 
    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('F') . $after;
 
    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;
 
    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
        if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
        echo $cats;
        if ($showCurrent == 1) echo $before . get_the_title() . $after;
      }
 
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after;
 
    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
 
    } elseif ( is_page() && !$post->post_parent ) {
      if ($showCurrent == 1) echo $before . get_the_title() . $after;
 
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      for ($i = 0; $i < count($breadcrumbs); $i++) {
        echo $breadcrumbs[$i];
        if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';
      }
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
 
    } elseif ( is_tag() ) {
      echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
 
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before . 'Articles posted by ' . $userdata->display_name . $after;
 
    } elseif ( is_404() ) {
      echo $before . 'Error 404' . $after;
    }
 
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
 
    echo '</div>';
 
  }
} // end wmf_custom_breadcrumbs()
}