<?php

require_once(ABSPATH.'wp-includes/pluggable.php');
require_once (ABSPATH. 'wp-content/plugins/wp-missing-functions/asset/required/options/tab1-ops.php');
$WPMFoption = WPMFgetOptions();


if ($WPMFoption['wmf_home_results_check'] == 1){
function wmf_home_results_per_page( $query ) {
$WPMFoption = WPMFgetOptions();
    if ( is_home() && $query->is_main_query() ) {
        $query->set( 'posts_per_page', $WPMFoption['wmf_home_results_per_page'] );
    }
}
add_action( 'pre_get_posts', 'wmf_home_results_per_page' );
}


if ($WPMFoption['wmf_search_results_check'] == 1){
function wmf_search_results_per_page( $query ) {
	global $wp_the_query;
	$WPMFoption = WPMFgetOptions();
	if ( ( ! is_admin() ) && ( $query === $wp_the_query ) && ( $query->is_search() ) ) {
	$query->set( 'posts_per_page', $WPMFoption['wmf_search_results_per_page'] );
	}
	return $query;
}
add_action( 'pre_get_posts',  'wmf_search_results_per_page'  );
}

if ($WPMFoption['wmf_excerpt_length_check'] == 1){
//custom excerpt length
function wmf_excerpt_length( $length ) {
$WPMFoption = WPMFgetOptions();
	//the amount of words to return
	return $WPMFoption['wmf_excerpt_length'];
}
add_filter( 'excerpt_length', 'wmf_excerpt_length');
}

if ($WPMFoption['wmf_url_spam_check'] == 1){
//This code will automatically mark as spam all comments with an url longer than set chars. This can be changed on line 2.
function wmf_url_spamcheck_length( $approved , $commentdata ) {
$WPMFoption = WPMFgetOptions();
    return ( strlen( $commentdata['comment_author_url'] ) > $WPMFoption['wmf_url_spamcheck_length'] ) ? 'spam' : $approved;
  }

  add_filter( 'pre_comment_approved', 'wmf_url_spamcheck_length', 99, 2 );
  }

  if ($WPMFoption['wmf_admin_footer'] == 1){
// Customise the footer in admin area
function wmf_admin_footer () {
$WPMFoption = WPMFgetOptions();
	echo 'Theme designed and developed by <a href="'.get_bloginfo('wpurl').'" target="_blank">'.$WPMFoption['wmf_admin_footer_name'].'</a> and powered by <a href="http://wordpress.org" target="_blank">WordPress</a>.';
}
add_filter('admin_footer_text', 'wmf_admin_footer');
}

	if ($WPMFoption['wmf_add_favicon'] == 1){
	function wmf_add_favicon() {
    echo '<link rel="shortcut icon" type="image/x-icon" href="'.site_url().'/favicon.ico" />' . "\n";
}
add_action( 'wp_head', 'wmf_add_favicon' );
}

	
if ($WPMFoption['wmf_own_media_only'] == 1){	

function wmf_own_media_only( $where ){
	global $current_user;
	
	if( !current_user_can( 'manage_options' ) ){
		if( isset( $_POST['action'] ) ){
			// library query
			if( $_POST['action'] == 'query-attachments' ){
			//restrict the query to current user
				$where .= ' AND post_author='.$current_user->data->ID;
			}
		}
	}

	return $where;
}
	add_filter( 'posts_where', 'wmf_own_media_only' );
}

	
if ($WPMFoption['wmf_comment_count'] == 1){	
	add_filter('get_comments_number', 'wmf_comment_count', 0);
function wmf_comment_count( $count ) {
if ( ! is_admin() ) {
global $id;
$comments_by_type = &separate_comments(get_comments('status=approve&post_id=' . $id));
return count($comments_by_type['comment']);
} else {
return $count;
}
}
}
if ($WPMFoption['wmf_all_settings_link'] == 1){	
// CUSTOM ADMIN MENU LINK FOR ALL SETTINGS   
function wmf_all_settings_link() {
    add_options_page(__('All Settings'), __('All Settings'), 'administrator', 'options.php');
	   }   
	   add_action('admin_menu', 'wmf_all_settings_link');
	   }
	   
if ($WPMFoption['wmf_custom_background'] == 1){
// Enable admin to set custom background images in 'appearance > background'
global $wp_version;
if ( version_compare( $wp_version, '3.4', '>=' ) ) 
	add_theme_support( 'custom-background' ); 
else
	add_custom_background( $args );
}


 if ($WPMFoption['wmf_prevent_email_change'] == 1) { 
  add_action( 'user_profile_update_errors', 'wmf_prevent_email_change', 10, 3 );

function wmf_prevent_email_change( $errors, $update, $user ) {

    $old = get_user_by('id', $user->ID);

    if( $user->user_email != $old->user_email )
        $user->user_email = $old->user_email;
}
}

 if ($WPMFoption['wmf_check_referrer'] == 1) {
//Block comments with no-referrer
function wmf_check_referrer() {
	if (!isset($_SERVER['HTTP_REFERER']) || $_SERVER['HTTP_REFERER'] == '') {
		wp_die(__('Please do not access this file directly.'));
	}
}
add_action('check_comment_flood', 'wmf_check_referrer');
}

 if ($WPMFoption['wmf_remove_word_private'] == 1) {
function wmf_remove_word_private($string) {
$string = str_replace('Private: ', '', $string);
return $string;
}
add_filter('the_title', 'wmf_remove_word_private');
}

 if ($WPMFoption['wmf_disallow_file_mods'] == 1) {
/** Disallow anything that creates, deletes, or updates core, plugin, or theme files.
* Files in uploads are excepted.
*/
if (!defined('DISALLOW_FILE_MODS'))
define( 'DISALLOW_FILE_MODS', true);
}

 if ($WPMFoption['wmf_no_more_jumping'] == 1) {
// no more jumping for read more link
function wmf_no_more_jumping($post) {
	return '<a href="'.get_permalink($post->ID).'" class="read-more">'.'Continue Reading'.'</a>';
}
add_filter('excerpt_more', 'wmf_no_more_jumping');
}


 if ($WPMFoption['wmf_disable_wp_search'] == 1) {
function wmf_disable_wp_search( $query, $error = true ) {

if ( is_search() ) {
$query->is_search = false;
$query->query_vars[s] = false;
$query->query[s] = false;

// to error
if ( $error == true )
$query->is_404 = true;
}
}

add_action( 'parse_query', 'wmf_disable_wp_search' );
add_filter( 'get_search_form', create_function( '$a', "return null;" ) );
}

 if ($WPMFoption['wmf_disable_admin_nag'] == 1) {
// kill the admin nag
if (!current_user_can('manage_options')) {
	add_action('init', create_function('$a', "remove_action('init', 'wp_version_check');"), 2);
	add_filter('pre_option_update_core', create_function('$a', "return null;"));
}
}

