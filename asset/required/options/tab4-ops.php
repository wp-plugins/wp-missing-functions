<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//save option 2
    function WOPFsave()
    {
      if (isset($_POST['wop_save_options']))
      {
        $WOPFsaveOps = array( 'wmf_woo_charge_tick' => $_POST['wmf_woo_charge_tick'],
                              'wmf_woo_charge_name' => $_POST['wmf_woo_charge_name'],
                              'wmf_woo_charge_per' => $_POST['wmf_woo_charge_per'],
                              'wmf_woo_charge_fix' => $_POST['wmf_woo_charge_fix'],
                              'wmf_woo_charge_radio' => $_POST['wmf_woo_charge_radio'],
                              'wmf_woo_adetional_tab_tick' => $_POST['wmf_woo_adetional_tab_tick'],
                              'wmf_woo_adetional_tab_name' => $_POST['wmf_woo_adetional_tab_name'],
                              'wmf_woo_text_after_tick' => $_POST['wmf_woo_text_after_tick'],
                              'wmf_woo_text_after_direct_text' => $_POST['wmf_woo_text_after_direct_text'],
                              'wmf_woo_text_after_under_text' => $_POST['wmf_woo_text_after_under_text'],
            
            
            
                              
                               
);
                                                                          
        update_option('wop_options', $WOPFsaveOps);
        
        return true;
      }
      return false;
    }
    function WOPFgetOptions()
    {
      $WOPFoptions = array('wmf_woo_charge_tick' => '0',
                           'wmf_woo_charge_name' => '',
                           'wmf_woo_charge_per' => '',
                           'wmf_woo_charge_fix' => '',
                           'wmf_woo_charge_radio' => '2',
                           'wmf_woo_adetional_tab_tick' => '0',
                           'wmf_woo_adetional_tab_name' => '',
                           'wmf_woo_text_after_tick' => '',
                           'wmf_woo_text_after_direct_text' => '',
                           'wmf_woo_text_after_under_text' => '',
          
          );

      //Get old values if they exist
      $WOPFops = get_option('wop_options');
      if (!empty($WOPFops))
      {
        foreach ($WOPFops as $key => $option)
          $WOPFoptions[$key] = $option;
      }

      update_option('wop_options', $WOPFoptions);
     
      return $WOPFoptions;
    }
    
    function WOPFreset() {
     if(isset($_POST['reset-wop'])) {
 update_option('wop_options', $WOPFoptions );
 echo "<div id='message' class='updated fade'><p>".__("Options successfully Reseted", "wmf")."</p></div>";
}
    }