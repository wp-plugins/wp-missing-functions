<?php
echo"
    <form id='wop_save_options' name='wop_save_options' method='post' action=''>
          <table class='wpmf100'>
          <thead id='fnt-14'>
          <tr><th width='9.5%'>".__("ON/OF", "wmf")."</th><th width='45%' style='text-align: center;'>".__("Description", "wmf")."</th><th width='20%'>".__("Option", "wmf")."</th><th width='25%' style='text-align: center;'>".__("Value", "wmf")."</th></tr>
          </thead>
          	  
                                        
                  <tr><td colspan='2'><input id='toggleInfoTab' onchange='infotabStatus()' type='checkbox' name='wmf_woo_adetional_tab_tick' value='1' ".checked($WOPFoption['wmf_woo_adetional_tab_tick'], '1', false)." />".__("Rename Adettional Information Tab in Products to any Other name", "wmf")."<br/></td><td></td><td id='infotabelement'><input type='text' size='14' name='wmf_woo_adetional_tab_name' placeholder='Name Tag' value='".$WOPFoption['wmf_woo_adetional_tab_name']."' /></td></tr>
                      
                  <tr><td colspan='2'><input id='toggleExtcharge' onchange='extchargeStatus()'type='checkbox' name='wmf_woo_charge_tick' value='1' ".checked($WOPFoption['wmf_woo_charge_tick'], '1', false)." />".__("Add a Fixed Percentage charge to all your products on checkout. (Ex:Handling Fee)", "wmf")."<br/></td>

                                   <td id='extchargeElement'><input id='toggleElement' type='radio' class='form-radio' name='wmf_woo_charge_radio' onchange='toggleStatus()' value='2' ".checked($WOPFoption['wmf_woo_charge_radio'], '2', false)."/>".__("<br>Precentage Amount","wmf")."</td><td id='elementsToOperateOn'><input type='text'  size='14' name='wmf_woo_charge_name' placeholder='Name Tag' value='".$WOPFoption['wmf_woo_charge_name']."' /><input type='text' size='14' name='wmf_woo_charge_per' placeholder='Percentage' value='".$WOPFoption['wmf_woo_charge_per']."' /></td>
                      
                 <tr><td></td><td></td><td id='extchargeElement2'><br><br><input id='toggleElementB' type='radio' class='form-radio' name='wmf_woo_charge_radio' onchange='toggleStatusB()' value='1' ".checked($WOPFoption['wmf_woo_charge_radio'], '1', false)."/>".__("<br>Fixed Amount","wmf")."</td><td id='elementsToOperateOnB'><input type='text'  size='14' name='wmf_woo_charge_name' placeholder='Name Tag' value='".$WOPFoption['wmf_woo_charge_name']."' /><input type='text' size='14' name='wmf_woo_charge_fix' placeholder='Fixed Charge' value='".$WOPFoption['wmf_woo_charge_fix']."' /></td></tr>
                  
                 <tr><td colspan='2'><input id='togglepricetext' onchange='priceTextStatus()' type='checkbox' name='wmf_woo_text_after_tick' value='1' ".checked($WOPFoption['wmf_woo_text_after_tick'], '1', false)." />".__("Add Text beside the price of product and under it", "wmf")."<br/><small>".__("you can customize the text for each product seperatly by adding \"wpmf-text-after-price\" for Text After price directly or \"wpmf-text-under-price\" for Text under price (have the same link of the product it self) in Product custome fields and the text you want in the value field", "wmf")."</small></td><td></td><td id='pricetextElement'><p>Text After Price <input type='text' size='14' name='wmf_woo_text_after_direct_text' placeholder='After Price' value='".$WOPFoption['wmf_woo_text_after_direct_text']."' /></p><p>Text Under Price <input type='text' size='14' name='wmf_woo_text_after_under_text' placeholder='Under Price' value='".$WOPFoption['wmf_woo_text_after_under_text']."' /></p></td></tr>
		
                 <tr><td colspan='2'><input type='checkbox' name='wmf_woo_alt_paypal_tick' value='1' ".checked($WOPFoption['wmf_woo_alt_paypal_tick'], '1', false)." />".__("Activate Alternative PayPal E-Mail for each product on it's own", "wmf")."<br/><small>".__("you can customize the PayPal Email for each product seperatly by adding \"wmf_alt_paypal_email\" in each Product custome fields and the Alternative Email in the value field", "wmf")."</small></td></tr>
                     
                
                <tr><td colspan='2'><span><input class='button' type='submit' name='wop_save_options' value='".__("Save Options", "wmf")."' /></span></td><td><span><input name='reset-wop' class='button button-secondary' type='submit' value='Reset to default settings' ></span></td></tr>
          </table>
		  </form> </body> </html> "     
                ?>

