<?php

 function SEMFsave()
    {
      if (isset($_POST['sef_save_options']))
      {
        $SEMFsaveOps = array(
            
                                  'wmf_google_analytics' => $_POST['wmf_google_analytics'],
                                  'wmf_google_analytics_code' => $_POST['wmf_google_analytics_code'],
				  'wmf_remove_head_link' => $_POST['wmf_remove_head_link'],
                                  'wmf_remove_img_ptags' => $_POST['wmf_remove_img_ptags'],
                                  'wmf_front_jquery_enqueue' => $_POST['wmf_front_jquery_enqueue'],
        			  'wmf_IEhtml5_shim' => $_POST['wmf_IEhtml5_shim'],
                		  'wmf_rss_post_thumbnail' => $_POST['wmf_rss_post_thumbnail'],
        			  'wmf_disable_feed' => $_POST['wmf_disable_feed'],
        			  'wmf_no_self_ping' => $_POST['wmf_no_self_ping'],
				  'wmf_ajx_sharpen_resize' => $_POST['wmf_ajx_sharpen_resize'],
				  'wmf_enable_gzip' => $_POST['wmf_enable_gzip'],
				  'wmf_defer_js_prasing' => $_POST['wmf_defer_js_prasing'],
                                  'wmf_remove_script_ver' => $_POST['wmf_remove_script_ver'],
                                  'wmf_feeds_to_header' => $_POST['wmf_feeds_to_header'],
                                  'wmf_include_jquery' => $_POST['wmf_include_jquery'],
                		  'wmf_custom_breadcrumbs' => $_POST['wmf_custom_breadcrumbs'],
                                  'wmf_rss_thump' => $_POST['wmf_rss_thump'],
							  );
        update_option('sef_options', $SEMFsaveOps);
        return true;
      }
      return false;
    }
    function SEMFgetOptions()
    {
      $SEMFoptions = array(
                                  'wmf_google_analytics' => '0',
                                  'wmf_google_analytics_code' => '',
				  'wmf_remove_head_link' => '0',
                                  'wmf_remove_img_ptags' => '0',
        			  'wmf_front_jquery_enqueue' => '0',
				  'wmf_IEhtml5_shim' => '0',
				  'wmf_rss_post_thumbnail' => '0',
				  'wmf_disable_feed' => '0',
				  'wmf_no_self_ping' => '0',
				  'wmf_ajx_sharpen_resize' => '0',
				  'wmf_enable_gzip' => '0',
                                  'wmf_defer_js_prasing' => '0',
                                  'wmf_remove_script_ver' => '0',
                                  'wmf_remove_script_ver' => '0',
				  'wmf_custom_breadcrumbs' => '0',
                                  'wmf_include_jquery' => '0',
                                  'wmf_rss_thump' => '0',
      );

      //Get old values if they exist
      $SEMFops = get_option('sef_options');
      if (!empty($SEMFops))
      {
        foreach ($SEMFops as $key => $option)
          $SEMFoptions[$key] = $option;
      }

      update_option('sef_options', $SEMFoptions);
     
      return $SEMFoptions;
    }
    
     function SEMFreset() {
     if(isset($_POST['reset-sef'])) {
 update_option('sef_options', $SEMFoptions );
 echo "<div id='message' class='updated fade'><p>".__("Options successfully Reseted", "wmf")."</p></div>";
}
    }