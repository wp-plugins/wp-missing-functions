<?php

$dir = dirname(__FILE__);
require_once(ABSPATH.'wp-includes/pluggable.php');
require_once (ABSPATH. 'wp-content/plugins/wp-missing-functions/asset/required/options/tab2-ops.php');
$COPFoption = COPFgetOptions();


if ($COPFoption['wmf_post_revision'] == 1){  
  /** * Set the post revisions unless the constant was set in wp-config.php */ 
if (!defined('WP_POST_REVISIONS')) 
define('WP_POST_REVISIONS', $COPFoption['wmf_post_revisions']);
}

if ($COPFoption['wmf_publish_later_on_feed'] == 1){ 
function wmf_publish_later_on_feed($where) {
$COPFoption = COPFgetOptions();
global $wpdb;

if ( is_feed() ) {
// timestamp in WP-format
$now = gmdate('Y-m-d H:i:s');

// value for wait; + device
$wait = $COPFoption['wmf_minutes_later_on_feed']; // integer

// http://dev.mysql.com/doc/refman/5.0/en/date-and-time-functions.html#function_timestampdiff
$device = 'MINUTE'; //MINUTE, HOUR, DAY, WEEK, MONTH, YEAR

// add SQL-sytax to default $where
$where .= " AND TIMESTAMPDIFF($device, $wpdb->posts.post_date_gmt, '$now') > $wait ";
}
return $where;
}

add_filter('posts_where', 'wmf_publish_later_on_feed');
}



if ($COPFoption['wmf_empty_trash'] == 1){
$COPFoption = COPFgetOptions();
/* Automatically delete WordPress trash after set days */
if (!defined('EMPTY_TRASH_DAYS'))
define( 'EMPTY_TRASH_DAYS', $COPFoption['wmf_empty_trash_days'] );
}


if ($COPFoption['wmf_redirect_after_login'] == 1){
function wmf_redirect_after_login() {
if ( isset( $_REQUEST['redirect_to'] ) ) 
$redirect_to = $_REQUEST['redirect_to'];
	else 
$redirect_to = site_url();
	return $redirect_to;
}
add_filter( 'login_redirect', 'wmf_redirect_after_login' );
}

if ($COPFoption['wmf_hide_admin_bar'] == 1){
if (!current_user_can('administrator')) {
	add_filter('show_admin_bar', '__return_false');
}
function wmf_hideAdminBar() { ?>
<style type="text/css">.show-admin-bar { display: none; }</style>
<?php }
add_action('admin_print_scripts-profile.php', 'wmf_hideAdminBar');

}


if ($COPFoption['wmf_back_access'] == 1){
add_action('admin_init', 'wmf_back_access');
function wmf_back_access() {
  if (!current_user_can('manage_options') && $_SERVER['DOING_AJAX'] != '/wp-admin/admin-ajax.php') {
  wp_redirect(home_url()); 
  exit;
  }
}}


if ($COPFoption['wmf_login_with_email'] == 1){
	function wmf_login_with_email($username) {
	$user = get_user_by('email',$username);
	if(!empty($user->user_login))
	$username = $user->user_login;
	return $username;
	}
	add_action('wp_authenticate','wmf_login_with_email');
	}

if ($COPFoption['wmf_restrict_media_upload'] == 1){	

if( !current_user_can( 'manage_options' ) ){
add_filter('upload_mimes','wmf_restrict_media_upload');

function wmf_restrict_media_upload($mimes) {
$mimes = array(
                'jpg|jpeg|jpe' => 'image/jpeg',
                'gif' => 'image/gif',
				'png' => 'image/png',
);
return $mimes;
}
}
}


if ($COPFoption['wmf_login_error_mgs'] == 1){
// Obscure login screen error messages
function wmf_login_error_mgs(){ 
return '<strong>Sorry</strong>: Think you have gone wrong somwhere!';
}
add_filter( 'login_errors', 'wmf_login_error_mgs' );
}


 if ($COPFoption['wmf_disallow_file_edit'] == 1) {
// Disable the theme / plugin text editor in Admin
if (!defined('DISALLOW_FILE_EDIT'))
define('DISALLOW_FILE_EDIT', true);
}


 if ($COPFoption['wmf_remove_version'] == 1) {
function wmf_remove_version() {
return '';
}
add_filter('the_generator', 'wmf_remove_version');
}
