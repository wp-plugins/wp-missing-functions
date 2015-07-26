<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//save option 2
    function COPFsave()
    {
      if (isset($_POST['cop_save_options']))
      {
        $COPFsaveOps = array( 'wmf_post_revision' => $_POST['wmf_post_revision'],
                              'wmf_post_revisions' => $_POST['wmf_post_revisions'],
                              'wmf_publish_later_on_feed' => $_POST['wmf_publish_later_on_feed'],
                              'wmf_minutes_later_on_feed' => $_POST['wmf_minutes_later_on_feed'],
                              'wmf_empty_trash_days' => $_POST['wmf_empty_trash_days'],	
                              'wmf_remove_version' => $_POST['wmf_remove_version'],
                              'wmf_disallow_file_edit' => $_POST['wmf_disallow_file_edit'],
                              'wmf_login_error_mgs' => $_POST['wmf_login_error_mgs'],
                              'wmf_restrict_media_upload' => $_POST['wmf_restrict_media_upload'],
                              'wmf_login_with_email' => $_POST['wmf_login_with_email'],
                              'wmf_hide_admin_bar' => $_POST['wmf_hide_admin_bar'],
                              'wmf_back_access' => $_POST['wmf_back_access'],
                              'wmf_redirect_after_login' => $_POST['wmf_redirect_after_login'],
                             'wmf_empty_trash' => $_POST['wmf_empty_trash'],
            'wmf_nocaptccha-recapatcha-tick' => $_POST['wmf_nocaptccha-recapatcha-tick'],
            'wmf_nocaptccha-recapatcha-key' => $_POST['wmf_nocaptccha-recapatcha-key'],
            'wmf_nocaptccha-recapatcha-secret' => $_POST['wmf_nocaptccha-recapatcha-secret'],
            'wmf_nocaptccha-recapatcha-comment-tick' => $_POST['wmf_nocaptccha-recapatcha-comment-tick'],
            'wmf_nocaptccha-recapatcha-register-tick' => $_POST['wmf_nocaptccha-recapatcha-register-tick'],
            'wmf_nocaptccha-recapatcha-login-tick' => $_POST['wmf_nocaptccha-recapatcha-login-tick'],
                               
);
                                                                          
        update_option('cop_options', $COPFsaveOps);
        
        return true;
      }
      return false;
    }
    function COPFgetOptions()
    {
      $COPFoptions = array('wmf_post_revision' => '0',
                           'wmf_post_revisions' => '',
                           'wmf_publish_later_on_feed' => '0',
                           'wmf_minutes_later_on_feed' => '',
                           'wmf_empty_trash_days' => '',
                           'wmf_remove_version' => '0',
                           'wmf_disallow_file_edit' => '0',
          		   'wmf_login_error_mgs' => '0',
			   'wmf_restrict_media_upload' => '0',
			   'wmf_login_with_email' => '0',
			   'wmf_back_access' => '0',
			   'wmf_hide_admin_bar' => '0',
			   'wmf_redirect_after_login' => '0',
                           'wmf_empty_trash' => '0',
          'wmf_nocaptccha-recapatcha-tick' => '0',
          'wmf_nocaptccha-recapatcha-key' => '',
          'wmf_nocaptccha-recapatcha-secret' => '',
          'wmf_nocaptccha-recapatcha-login-tick' => '0',
          'wmf_nocaptccha-recapatcha-comment-tick' => '0',
          'wmf_nocaptccha-recapatcha-register-tick' => '0',

						 );

      //Get old values if they exist
      $COPFops = get_option('cop_options');
      if (!empty($COPFops))
      {
        foreach ($COPFops as $key => $option)
          $COPFoptions[$key] = $option;
      }

      update_option('cop_options', $COPFoptions);
     
      return $COPFoptions;
    }
    function COPFreset() {
     if(isset($_POST['reset-cop'])) {
 update_option('cop_options', $COPFoptions );
 echo "<div id='message' class='updated fade'><p>".__("Options successfully Reseted", "wmf")."</p></div>";
}
    }