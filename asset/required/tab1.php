<?php
require_once(ABSPATH.'wp-content/plugins/wp-missing-functions/asset/js/selectors.php');
echo"
    <html xmlns='http://www.w3.org/1999/xhtml' lang='en' xml:lang='en'>
<body onload='start()'>
<form id='wmf_save_options' name='wmf_save_options' method='post' action=''>
          <table class='wpmf100'>
          <thead id='fnt-14'>
          <tr><th width='9.5%'>".__("ON/OF", "wmf")."</th><th width='60%' style='text-align: center;'>".__("Description", "wmf")."</th><th width='30%' style='text-align: center;'>".__("Value", "wmf")."</th></tr>
          </thead>
          		  
		  <tr><td colspan='2'><input id='toggleHomeposts' onchange='homePagePostsStatus()' type='checkbox' name='wmf_home_results_check' value='1' ".checked($WPMFoption['wmf_home_results_check'], '1', false)." />".__("Change amount of posts on the home page", "wmf")."</td><td id='homepostsElement'><input type='text' placeholder='#Posts' size='14' name='wmf_home_results_per_page' value='".$WPMFoption['wmf_home_results_per_page']."' /></td></tr>
		  
		  <tr><td colspan='2'><input id='togglesearchposts' onchange='searchPagePostsStatus()' type='checkbox' name='wmf_search_results_check' value='1' ".checked($WPMFoption['wmf_search_results_check'], '1', false)." />".__("Change amount of posts on the search page", "wmf")."</td><td id='searchpostsElement'><input type='text' placeholder='#Posts' size='14' name='wmf_search_results_per_page' value='".$WPMFoption['wmf_search_results_per_page']."' /></td></tr>
		  
		  <tr><td colspan='2'><input id='toggleexcerpt' onchange='excerptStatus()' type='checkbox' name='wmf_excerpt_length_check' value='1' ".checked($WPMFoption['wmf_excerpt_length_check'], '1', false)." />".__("Change length of excerpt", "wmf")."<br/><small>".__("Set how many words you want.", "wmf")."</small></td><td id='excerptElement'><input type='text' placeholder='#Words' size='14' name='wmf_excerpt_length' value='".$WPMFoption['wmf_excerpt_length']."' /></td></tr>
		  
		  <tr><td colspan='2'><input id='togglespam' onchange='spamStatus()' type='checkbox' name='wmf_url_spam_check' value='1' ".checked($WPMFoption['wmf_url_spam_check'], '1', false)." />".__("Automatically mark as spam all comments with an url longer than set chars", "wmf")."</td><td id='spamElement'><input type='text' placeholder='#Charecters' size='14' name='wmf_url_spamcheck_length' value='".$WPMFoption['wmf_url_spamcheck_length']."' /></td></tr>
		  
		  <tr><td colspan='2'><input id='toggleAfooter' onchange='AfooterStatus()' type='checkbox' name='wmf_admin_footer' value='1' ".checked($WPMFoption['wmf_admin_footer'], '1', false)." />".__("Change Admin footer?", "wmf")."<br/><small>".__("Set your name", "wmf")."</small></td><td id='AfooterElement'><input type='text' placeholder='Text' size='14' name='wmf_admin_footer_name' value='".$WPMFoption['wmf_admin_footer_name']."' /></td></tr>
		  
		  <tr><td colspan='2'><input type='checkbox' name='wmf_add_favicon' value='1' ".checked($WPMFoption['wmf_add_favicon'], 1, false)." /> ".__("Add favicon to head?", "wmf")."<br /><small>".__("add your favicon.ico to base folder", "wmf")."</small></td></tr>
		  
		  <tr><td colspan='2'><input type='checkbox' name='wmf_own_media_only' value='1' ".checked($WPMFoption['wmf_own_media_only'], '1', false)." /> ".__("Show only own uploaded media in library?", "wmf")."<br /><small>".__("Admin can see all uploaded media", "wmf")."</small></td></tr>
		  
		  <tr><td colspan='2'><input type='checkbox' name='wmf_comment_count' value='1' ".checked($WPMFoption['wmf_comment_count'], '1', false)." /> ".__("Display the Most Accurate Comment Count?", "wmf")."<br /><small>".__("Will not count trackbacks, and pings as comments.", "wmf")."</small></td></tr>
		  
		  <tr><td colspan='2'><input type='checkbox' name='wmf_all_settings_link' value='1' ".checked($WPMFoption['wmf_all_settings_link'], '1', false)." /> ".__("Custom admin menu link for all settings?", "wmf")."<br /><small>".__("you will find a new link to settings>all settings for all settings.", "wmf")."</small></td></tr>
		  
		  <tr><td colspan='2'><input type='checkbox' name='wmf_custom_background' value='1' ".checked($WPMFoption['wmf_custom_background'], '1', false)." /> ".__("Enable admin to set custom background images in 'appearance > background'?", "wmf")."<br /><small>".__("you will find a new link to appearance > background for background image change.", "wmf")."</small></td></tr>
		  
		  <tr><td colspan='2'><input type='checkbox' name='wmf_prevent_email_change' value='1' ".checked($WPMFoption['wmf_prevent_email_change'], '1', false)." /> ".__("Prevent user email change from profile?", "wmf")."</td></tr>
		  
		  <tr><td colspan='2'><input type='checkbox' name='wmf_check_referrer' value='1' ".checked($WPMFoption['wmf_check_referrer'], '1', false)." /> ".__("Block comments with no-referrer?", "wmf")."<br /><small>".__("Reduce most of spam comments.", "wmf")."</small></td></tr>
		  
		  <tr><td colspan='2'><input type='checkbox' name='wmf_remove_word_private' value='1' ".checked($WPMFoption['wmf_remove_word_private'], '1', false)." /> ".__("Remove word \"Private: \" infront of title of private post/page?", "wmf")."</td></tr>
		  
		  <tr><td colspan='2'><input type='checkbox' name='wmf_disallow_file_mods' value='1' ".checked($WPMFoption['wmf_disallow_file_mods'], '1', false)." /> ".__("Disallow anything that creates, deletes, or updates core, plugin, or theme files.?", "wmf")."<br /><small>".__("Files in uploads are excepted.", "wmf")."</small></td></tr>
		  
		  <tr><td colspan='2'><input type='checkbox' name='wmf_no_more_jumping' value='1' ".checked($WPMFoption['wmf_no_more_jumping'], '1', false)." /> ".__("No more jumping for read more link?", "wmf")."</td></tr>
		  
		  <tr><td colspan='2'><input type='checkbox' name='wmf_disable_wp_search' value='1' ".checked($WPMFoption['wmf_disable_wp_search'], '1', false)." /> ".__("Disable Search in WordPress?", "wmf")."<br /><small>".__("It will disable wordpress default search.", "wmf")."</small></td></tr>
		  
		  <tr><td colspan='2'><input type='checkbox' name='wmf_disable_admin_nag' value='1' ".checked($WPMFoption['wmf_disable_admin_nag'], '1', false)." /> ".__("Disable Admin nag?", "wmf")."<br /><small>".__("Only shown to admin.", "wmf")."</small></td></tr>
		  
		  
          <tr><td colspan='2'><span><input class='button' type='submit' name='wmf_save_options' value='".__("Save Options", "wmf")."' /></span></td><td><span><input name='reset-wmf' class='button button-secondary' type='submit' value='Reset to default settings' ></span></td></tr>
          </table>
		  </form></body></html>"
                     ?>