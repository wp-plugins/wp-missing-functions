<?php
/*
Plugin Name: WP Missing Functions
Plugin URI: http://www.thainetworks.net/
Description: No need any more functions.php file editing. Just give a tick mark and this plugin will do the rest for you.
Version: 1.0
Author: Mark Elayan
Author URI: http://www.thainetworks.net/
Text Domain: wpmf
License: GPLv2
*/
$dir = dirname(__FILE__);
require($dir .'/asset/required/functions.php');
add_action('admin_menu', 'AddWPMFmenu');
add_action('plugins_loaded', 'wmf_translation');

function AddWPMFmenu()
    {
      add_menu_page('WP Missing Functions', 'WP Missing Functions','manage_options', basename(__FILE__), 'WPMFmenuPage');
    }
    
    
	
function wmf_translation()
	{
	//SETUP TEXT DOMAIN FOR TRANSLATIONS
	$plugin_dir = basename(dirname(__FILE__));
	load_plugin_textdomain('wmf', false, $plugin_dir.'/languages/');
	}

	function WPMFmenuPage(){
	if (WPMFsave() or COPFsave() or SEMFsave() or WOPFsave() or WOPFreset() or SEMFreset() or COPFreset() or WPMFreset() )
        echo "<div id='message' class='updated fade'><p>".__("Options successfully saved", "wmf")."</p></div>";
		$WPMFoption = WPMFgetOptions();
                $COPFoption = COPFgetOptions();
                $SEMFoption = SEMFgetOptions();
                $WOPFoption = WOPFgetOptions();
		$url = 'http://thainetworks.net/';
                $dir = dirname(__FILE__);
               
echo 
"<head>
<link rel='stylesheet' type='text/css' href='/wp-content/plugins/wp-missing-functions/asset/css/style.css'>
</head>
<div class='wrap'>
          <h2>".__("\"WP Missing Functions\" Settings", "wmf")."</h2>
		  <ul>".sprintf(__("For reporting bugs or featurs request please Send us an E-mail to <a href= 'mailto:wpmf@thainetworks.net?subject=WPMF Features and Bugs' title='WP Missing Functions'>WP Missing Functions</a>", "wmf"),esc_url($url))."</ul>
		  <h5>".__("Do not forget to click \"Save Options\" at the bottom after your change", "wpmf")."</h5>
		 
<div class='inner-form'>
  <div class='lsa'>
           <div class='wpmf-tabs'>
    <ul>
        <li>
        <input type='radio' name='wpmf-tabs-0' checked='checked' id='wpmf-tabs-0-0' /><label for='wpmf-tabs-0-0'>Simple WP Functions</label>
<div>            
          "; require ($dir .'/asset/required/tab1.php') ; echo"

</div><!**contecnt tab1**!>

        </li>
         <li>
        <input type='radio' name='wpmf-tabs-0' id='wpmf-tabs-0-1' /><label for='wpmf-tabs-0-1'>Core WP Functions</label>
<div>
   "; require ($dir .'/asset/required/tab2.php'); echo "    
</div><!**contecnt tab2**!>

        </li><!**finished tab2**!>
        <li>
        <input type='radio' name='wpmf-tabs-0' id='wpmf-tabs-0-2' /><label for='wpmf-tabs-0-2'>SEO Related Functions</label>
<div>
   "; require ($dir .'/asset/required/tab3.php'); echo "    
</div><!**contecnt tab3**!>

        </li><!**finished tab3**!>
        <li>
        <input type='radio' name='wpmf-tabs-0' id='wpmf-tabs-0-3' /><label for='wpmf-tabs-0-3'>Woocomerce Functions</label>
<div>
   "; require ($dir .'/asset/required/tab4.php'); echo "    
</div><!**contecnt tab4**!>            

        </li><!**finished tab4**!>
        </div><!**tabs**!>
</div> <!-- left side finished --!>
                <div class='rsa'>
                "; require ($dir .'/asset/required/rsa.php'); echo " 
                </div>
               </div>
         </div>";
		  }
	
	
    ?>
