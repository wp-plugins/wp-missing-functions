<?php

echo"
<form id='wmf_save_options' name='wmf_save_options' method='post' action=''>
          <table class='wpmf100'>
          <thead id='fnt-14'>
          <tr><th width='9.5%'>".__("ON/OF", "wmf")."</th><th width='60%' style='text-align: center;'>".__("Description", "wmf")."</th><th width='30%' style='text-align: center;'>".__("Value", "wmf")."</th></tr>
          </thead>
   
          <tr><td colspan='2'><input id='togglegglAnlytics' onchange='gglAnlyticsStatus()' type='checkbox' name='wmf_google_analytics' value='1' ".checked($SEMFoption['wmf_google_analytics'], '1', false)." />".__("Add Google Analytics to the footer", "wmf")."</td><td id='gglAnlyticselement'><input type='text' size='14' name='wmf_google_analytics_code' placeholder='UA-XXXXX-X' value='".$SEMFoption['wmf_google_analytics_code']."' /></td></tr>

          <tr><td colspan='2'><input type='checkbox' name='wmf_include_jquery' value='1' ".checked($SEMFoption['wmf_include_jquery'], '1', false)." /> ".__("Automatically call and ensures that only one copy of jQuery is included, and calls it from Google’s servers to save bandwidth.", "wmf")."</td></tr>

          <tr><td colspan='2'><input type='checkbox' name='wmf_defer_js_prasing' value='1' ".checked($SEMFoption['wmf_defer_js_prasing'], '1', false)." /> ".__("Eliminate render-blocking JavaScript in above-the-fold content", "wmf")."</td></tr>
              
          <tr><td colspan='2'><input type='checkbox' name='wmf_feeds_to_header' value='1' ".checked($SEMFoption['wmf_feeds_to_header'], '1', false)." /> ".__("Add all relevant feed links (main, comments, categories, et al) to your <head> area", "wmf")."</td></tr>
              
          <tr><td colspan='2'><input type='checkbox' name='wmf_remove_script_ver' value='1' ".checked($SEMFoption['wmf_remove_script_ver'], '1', false)." /> ".__("Remove Script Version From URLs", "wmf")."</td></tr>
              
	  <tr><td colspan='2'><input type='checkbox' name='wmf_remove_head_link' value='1' ".checked($SEMFoption['wmf_remove_head_link'], '1', false)." /> ".__("Remove unnecessary links from wp_head?", "wmf")."</td></tr>
		  
	  <tr><td colspan='2'><input type='checkbox' name='wmf_remove_img_ptags' value='1' ".checked($SEMFoption['wmf_remove_img_ptags'], '1', false)." /> ".__("Stop images getting wrapped up in p tags when they get dumped out with the_content() for easier theme styling?", "wmf")."</td></tr>
		  
	  <tr><td colspan='2'><input type='checkbox' name='wmf_front_jquery_enqueue' value='1' ".checked($SEMFoption['wmf_front_jquery_enqueue'], '1', false)." /> ".__("Call the google CDN version of jQuery for the frontend?", "wmf")."<br /><small>".__("Make sure you have wp_enqueue_script('jquery') in your header.", "wmf")."</small></td></tr>
		  
	  <tr><td colspan='2'><input type='checkbox' name='wmf_IEhtml5_shim' value='1' ".checked($SEMFoption['wmf_IEhtml5_shim'], '1', false)." /> ".__("Call Googles HTML5 Shim, but only for users on old versions of IE?", "wmf")."</td></tr>
		  
	  <tr><td colspan='2'><input type='checkbox' name='wmf_rss_post_thumbnail' value='1' ".checked($SEMFoption['wmf_rss_post_thumbnail'], '1', false)." /> ".__("Show post thumbnail in RSS Feeds?", "wmf")."</td></tr>
		  
	  <tr><td colspan='2'><input type='checkbox' name='wmf_disable_feed' value='1' ".checked($SEMFoption['wmf_disable_feed'], '1', false)." /> ".__("Disable RSS Feeds?", "wmf")."</td></tr>
		  
	  <tr><td colspan='2'><input type='checkbox' name='wmf_no_self_ping' value='1' ".checked($SEMFoption['wmf_no_self_ping'], '1', false)." /> ".__("Remove pings to self?", "wmf")."</td></tr>
		  
	  <tr><td colspan='2'><input type='checkbox' name='wmf_ajx_sharpen_resize' value='1' ".checked($SEMFoption['wmf_ajx_sharpen_resize'], '1', false)." /> ".__("Sharpening resized jpg images?", "wmf")."<br /><small>".__("Quality of your jpg image will be increased.", "wmf")."</small></td></tr>
		  
	  <tr><td colspan='2'><input type='checkbox' name='wmf_enable_gzip' value='1' ".checked($SEMFoption['wmf_enable_gzip'], '1', false)." /> ".__("Enable Gzip?", "wmf")."</td></tr>
		  
	  <tr><td colspan='2'><input type='checkbox' name='wmf_custom_breadcrumbs' value`='1' ".checked($SEMFoption['wmf_custom_breadcrumbs'], '1', false)." /> ".__("Enable custom Breadcrumbs?", "wmf")."<br /><small>".__("you have to add \"< ?php if (function_exists('wmf_custom_breadcrumbs')) wmf_custom_breadcrumbs(); ?>\" where you want to show Breadcrumbs", "wmf")."</small></td></tr>
              
          <tr><td colspan='2'><input type='checkbox' name='wmf_rss_thump' value='1' ".checked($SEMFoption['wmf_rss_thump'], '1', false)." /> ".__("Add Post Thumbnails to Your RSS Feeds", "wmf")."</td></tr>
		  
		  
          <tr><td colspan='2'><span><input class='button' type='submit' name='sef_save_options' value='".__("Save Options", "wmf")."' /></span></td><td><span><input name='reset-sef' class='button button-secondary' type='submit' value='Reset to default settings' ></span></td></tr>
          </table>
		  </form>"
                     ?>