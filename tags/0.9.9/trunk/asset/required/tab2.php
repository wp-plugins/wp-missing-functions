<?php
echo" 
    <form id='cop_save_options' name='cop_save_options' method='post' action=''>
          <table class='wpmf100'>
          <thead id='fnt-14'>
          <tr><th width='9.5%'>".__("ON/OF", "wmf")."</th><th width='60%' style='text-align: center;'>".__("Description", "wmf")."</th><th width='30%' style='text-align: center;'>".__("Value", "wmf")."</th></tr>
          </thead>
          		 		  
		  
                  <tr><td colspan='2'><input id='toggleRevisions' onchange='revisionsStatus()' type='checkbox' name='wmf_post_revision' value='1' ".checked($COPFoption['wmf_post_revision'], '1', false)." />".__("Set the post revisions unless the constant was set in wp-config.php already", "wmf")."<br/><small>".__("Set how many revisions you want to keep", "wmf")."</small></td><td id='revisionsElement'><input type='text' placeholder='#Revisions' size='14' name='wmf_post_revisions' value='".$COPFoption['wmf_post_revisions']."' /></td></tr>
		  
                  <tr><td colspan='2'><input id='toggleTrash' onchange='trashStatus()' type='checkbox' name='wmf_empty_trash' value='1' ".checked($COPFoption['wmf_empty_trash'], '1', false)." />".__("Automatically empty trash after set days?", "wmf")."<br/><small>".__("If not set in wp-config.php", "wmf")."</small></td><td id='trashElement'><input type='text' placeholder='# Days' size='14' name='wmf_empty_trash_days' value='".$COPFoption['wmf_empty_trash_days']."' /></td></tr>
                       
                  <tr><td colspan='2'><input id='toggleRssdelay' onchange='rssdelayStatus()' type='checkbox' name='wmf_publish_later_on_feed' value='1' ".checked($COPFoption['wmf_publish_later_on_feed'], '1', false)." />".__("Control When Your Posts are Available via RSS", "wmf")."<br/><small>".__("Set how many minutes wait", "wmf")."</small></td><td id='rssdelayElement'><input type='text' placeholder='# Minutes' size='14' name='wmf_minutes_later_on_feed' value='".$COPFoption['wmf_minutes_later_on_feed']."' /></td></tr>
                      
		  <tr><td colspan='2'><input type='checkbox' name='wmf_redirect_after_login' value='1' ".checked($COPFoption['wmf_redirect_after_login'], '1', false)." /> ".__("Redirect to home page after login?", "wmf")."</td></tr>
                      
		  <tr><td colspan='2'><input type='checkbox' name='wmf_back_access' value='1' ".checked($COPFoption['wmf_back_access'], '1', false)." /> ".__("Disable back end access for non admin users?", "wmf")."<br /><small>".__("They will be redirected to home page.", "wmf")."</small></td></tr>
                      
		  <tr><td colspan='2'><input type='checkbox' name='wmf_hide_admin_bar' value='1' ".checked($COPFoption['wmf_hide_admin_bar'], '1', false)." /> ".__("Hide admin bar from front end for non admin?", "wmf")."</td></tr>
		  
		  <tr><td colspan='2'><input type='checkbox' name='wmf_login_with_email' value='1' ".checked($COPFoption['wmf_login_with_email'], '1', false)." /> ".__("Login with both Email/username?", "wmf")."</td></tr>
                      
		  <tr><td colspan='2'><input type='checkbox' name='wmf_restrict_media_upload' value='1' ".checked($COPFoption['wmf_restrict_media_upload'], '1', false)." /> ".__("Restrict user to upload only jpg,jpeg,png,gif type of media?", "wmf")."<br /><small>".__("Admin can upload all type of media wordpress allow.", "wmf")."</small></td></tr>
                      
		  <tr><td colspan='2'><input type='checkbox' name='wmf_login_error_mgs' value='1' ".checked($COPFoption['wmf_login_error_mgs'], '1', false)." /> ".__("Change login screen error messages to \"Think you have gone wrong somwhere!\"?", "wmf")."<br /><small>".__("Add an extra layer of security.", "wmf")."</small></td></tr>
                      
		  <tr><td colspan='2'><input type='checkbox' name='wmf_disallow_file_edit' value='1' ".checked($COPFoption['wmf_disallow_file_edit'], '1', false)." /> ".__("Disable the theme/plugin editor in Admin?", "wmf")."<br /><small>".__("If not set in wp-config.php", "wmf")."</small></td></tr>
                      
		  <tr><td colspan='2'><input type='checkbox' name='wmf_remove_version' value='1' ".checked($COPFoption['wmf_remove_version'], '1', false)." /> ".__("Remove wordpress version number?", "wmf")."</td></tr>
                      
                  <tr><td colspan='2'><input type='checkbox' name='wmf_nocaptccha-recapatcha-tick' value='1' ".checked($COPFoption['wmf_nocaptccha-recapatcha-tick'], '1', false)." />".__("Activat No-Captcha reCaptcha", "wmf")."<br/><small>".__("You need to <a href='https://www.google.com/recaptcha/admin' target='_blank' rel='external'>register you domain</a> and get keys to make this plugin work.", "wmf")."</small></td><td><input type='text' placeholder='captcha site key' size='14' name='wmf_nocaptccha-recapatcha-key' value='".$COPFoption['wmf_nocaptccha-recapatcha-key']."' /><br><input type='text' placeholder='captcha site secret' size='14' name='wmf_nocaptccha-recapatcha-secret' value='".$COPFoption['wmf_nocaptccha-recapatcha-secret']."' /></td></tr>

                  <tr><td colspan='2'><input type='checkbox' name='wmf_nocaptccha-recapatcha-login-tick' value='1' ".checked($COPFoption['wmf_nocaptccha-recapatcha-login-tick'], '1', false)." />".__("Activat No-Captcha reCaptcha in login Forms", "wmf")."</td></tr>
                  <tr><td colspan='2'><input type='checkbox' name='wmf_nocaptccha-recapatcha-register-tick' value='1' ".checked($COPFoption['wmf_nocaptccha-recapatcha-register-tick'], '1', false)." />".__("Activat No-Captcha reCaptcha in Registeration Forms", "wmf")."</td></tr>
                      <tr><td colspan='2'><input type='checkbox' name='wmf_nocaptccha-recapatcha-comment-tick' value='1' ".checked($COPFoption['wmf_nocaptccha-recapatcha-comment-tick'], '1', false)." />".__("Activat No-Captcha reCaptcha in Comments", "wmf")."</td></tr>

           <tr><td colspan='2'><span><input class='button' type='submit' name='cop_save_options' value='".__("Save Options", "wmf")."' /></span></td><td><span><input name='reset-cop' class='button button-secondary' type='submit' value='Reset to default settings' ></span></td></tr>
          </table>
		  </form>       
                  " 
        ?>