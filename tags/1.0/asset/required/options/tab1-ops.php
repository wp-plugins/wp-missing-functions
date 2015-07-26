<?php

 function WPMFsave()
    {
      if (isset($_POST['wmf_save_options']))
      {
        $WPMFsaveOps = array('wmf_home_results_check' 	=> $_POST['wmf_home_results_check'],
                              'wmf_home_results_per_page' => $_POST['wmf_home_results_per_page'],
							  'wmf_search_results_check' => $_POST['wmf_search_results_check'],
							  'wmf_search_results_per_page' => $_POST['wmf_search_results_per_page'],
							  'wmf_excerpt_length_check' => $_POST['wmf_excerpt_length_check'],
							  'wmf_excerpt_length' => $_POST['wmf_excerpt_length'],
							  'wmf_url_spam_check' => $_POST['wmf_url_spam_check'],
							  'wmf_url_spamcheck_length' => $_POST['wmf_url_spamcheck_length'],
							  'wmf_admin_footer' => $_POST['wmf_admin_footer'],
							  'wmf_admin_footer_name' => $_POST['wmf_admin_footer_name'],
							  'wmf_add_favicon' => $_POST['wmf_add_favicon'],
							  'wmf_own_media_only' => $_POST['wmf_own_media_only'],
							  'wmf_comment_count' => $_POST['wmf_comment_count'],
							  'wmf_all_settings_link' => $_POST['wmf_all_settings_link'],
							  'wmf_custom_background' => $_POST['wmf_custom_background'],
							  'wmf_prevent_email_change' => $_POST['wmf_prevent_email_change'],
							  'wmf_check_referrer' => $_POST['wmf_check_referrer'],
							  'wmf_remove_word_private' => $_POST['wmf_remove_word_private'],
							  'wmf_disallow_file_mods' => $_POST['wmf_disallow_file_mods'],
							  'wmf_no_more_jumping' => $_POST['wmf_no_more_jumping'],
							  'wmf_disable_wp_search' => $_POST['wmf_disable_wp_search'],
							  'wmf_disable_admin_nag' => $_POST['wmf_disable_admin_nag'],

							  );
        update_option('wmf_options', $WPMFsaveOps);
        return true;
      }
      return false;
    }
    function WPMFgetOptions()
    {
      $WPMFoptions = array('wmf_home_results_check' => '0',
                          'wmf_home_results_per_page' => '',
						  'wmf_search_results_check' => '0',
						  'wmf_search_results_per_page' => '',
						  'wmf_excerpt_length_check' => '0',
						  'wmf_excerpt_length' => '',
						  'wmf_url_spam_check' => '0',
						  'wmf_url_spamcheck_length' => '',
						  'wmf_admin_footer' => '0',
						  'wmf_admin_footer_name' => '',
						  'wmf_add_favicon' => '0',
						  'wmf_own_media_only' => '0',
                          'wmf_comment_count' => '0',
						  'wmf_all_settings_link' => '0',
						  'wmf_custom_background' => '0',
						  'wmf_prevent_email_change' => '0',
						  'wmf_check_referrer' => '0',
                          'wmf_remove_word_private' => '0',
						  'wmf_disallow_file_mods' => '0',
						  'wmf_no_more_jumping' => '0',
						  'wmf_disable_wp_search' => '0',
						  'wmf_disable_admin_nag' => '0',
						 
      );

      //Get old values if they exist
      $WPMFops = get_option('wmf_options');
      if (!empty($WPMFops))
      {
        foreach ($WPMFops as $key => $option)
          $WPMFoptions[$key] = $option;
      }

      update_option('wmf_options', $WPMFoptions);
     
      return $WPMFoptions;
    }
    
    function WPMFreset() {
     if(isset($_POST['reset-wmf'])) {
 update_option('wmf_options', $WPMFoptions );
 echo "<div id='message' class='updated fade'><p>".__("Options successfully Reseted", "wmf")."</p></div>";
}
    }