<?php

$dir = dirname(__FILE__);
require_once(ABSPATH.'wp-includes/pluggable.php');
require_once (ABSPATH. 'wp-content/plugins/wp-missing-functions/asset/required/options/tab4-ops.php');
$WOPFoption = WOPFgetOptions();


if ($WOPFoption['wmf_woo_charge_tick'] == 1){
    if ($WOPFoption['wmf_woo_charge_radio'] == 2){
add_action( 'woocommerce_cart_calculate_fees','woocommerce_custom_surcharge_per' );
function woocommerce_custom_surcharge_per() {
  global $woocommerce;
    if ( is_admin() && ! defined( 'DOING_AJAX' ) )
        return;
    $WOPFoption = WOPFgetOptions();
    $percentage = ($WOPFoption['wmf_woo_charge_per'] / 100);
    $wmftag = $WOPFoption['wmf_woo_charge_name'];
    $surcharge = ( $woocommerce->cart->cart_contents_total) * $percentage;    
    $woocommerce->cart->add_fee( $wmftag, $surcharge, true, 'standard' );
    }
    
    }
    elseif ($WOPFoption['wmf_woo_charge_radio'] == 1) {
  add_action( 'woocommerce_cart_calculate_fees','woocommerce_custom_surcharge_fix' );
function woocommerce_custom_surcharge_fix() {
  global $woocommerce;
    if ( is_admin() && ! defined( 'DOING_AJAX' ) )
        return;
    $WOPFoption = WOPFgetOptions();
    $wmftag = $WOPFoption['wmf_woo_charge_name'];
    $surcharge = $WOPFoption['wmf_woo_charge_fix'];    
    $woocommerce->cart->add_fee( $wmftag, $surcharge, true, 'standard' );
    }
    }
}

if ($WOPFoption['wmf_woo_adetional_tab_tick'] == 1){
//rename addettional info tab

add_filter( 'woocommerce_product_tabs', 'woo_rename_tabs', 98 );
 
function woo_rename_tabs( $tabs ) {
 
	global $product;
	
	if( $product->has_attributes() || $product->has_dimensions() || $product->has_weight() ) { // Check if product has attributes, dimensions or weight
            $WOPFoption = WOPFgetOptions();
            $wootabname = $WOPFoption['wmf_woo_adetional_tab_name'];
            $tabs['additional_information']['title'] = __( $wootabname );	// Rename the additional information tab
	}
 
	return $tabs;
 
}
}

//price after product price
if ($WOPFoption['wmf_woo_text_after_tick'] == 1){
    function themeprefix_custom_price_message( $price ) { 
	global $post;
		
	$product_id = $post->ID;
        $WOPFoption = WOPFgetOptions();
        if ( get_post_meta(get_the_ID(),'wpmf-text-after-price' , TRUE)) {
            $WOPFoption = WOPFgetOptions();
            $directtext = get_post_meta(get_the_ID(),'wpmf-text-after-price' , TRUE);
            $undertext = get_post_meta(get_the_ID(),'wpmf-text-under-price' , TRUE);
		return $price . '&nbsp;<span class="price-description">' .$directtext .'</span><br /><a class="textafter" href="'.get_permalink($product_id).'">'. $undertext. '</a>' ;
	}
	 
	else { 
             $textafterdirect = $WOPFoption['wmf_woo_text_after_direct_text'];
             $textafterunder = $WOPFoption['wmf_woo_text_after_under_text'];
	$textafter = '&nbsp;' .$textafterdirect .'<br /><a class="textafter" href="'.get_permalink($product_id).'">'. $textafterunder. '</a>'; //add your text
		return $price .  $textafter ;
	} 
}
add_filter( 'woocommerce_get_price_html', 'themeprefix_custom_price_message' );
}


/* ===================================================================
 *
 * Function to enable item-specific paypal email addresses
 *
 * ================================================================ */
if ($WOPFoption['wmf_woo_alt_paypal_tick'] == 1){
function find_alt_paypal_emails() {
    global $woocommerce;
    // loop over the items in the cart
    foreach ( $woocommerce->cart->cart_contents as $item ) {
        // check to see if any of them has the `wmf_alt_paypal_email` meta value
        $override_email = get_post_meta($item['product_id'], 'wmf_alt_paypal_email', true);
        // if there is an override val, build an array of each item name and the
        // paypal email associated with that item
        if ( ! empty( $override_email ) ) {
            $paypal_override = array(
                'item_title' => $item['data']->post->post_title,
                'email' => $override_email
                );
            $paypal_overrides[] = $paypal_override;
            // error_log(print_r($paypal_overrides,true));
        }
    }
    // if there are override emails indicated
    if ( ! empty( $paypal_overrides ) ) {
        // loop through and build an error message to warn the user of multiple payees
        if ( count( $paypal_overrides ) > 1 ) {
            $error_list = '';
            foreach ( $paypal_overrides as $override ) {
                $error_list .= $override['item_title'] . ' &rarr; ' . $override['email'] . ', ';
            }
            $error_list = rtrim($error_list, ', ');
            $woocommerce->add_error( __( 'The following items send payment to different '
                . 'PayPal Users, please place separate orders: (' . $error_list . ')', 'woocommerce' ) );
        } else {
            return $paypal_overrides[0]['email'];
        }
    }
}
add_action( 'woocommerce_after_cart_contents', 'find_alt_paypal_emails' );
add_action( 'woocommerce_after_checkout_form', 'find_alt_paypal_emails' );
add_action( 'woocommerce_after_order_total', 'find_alt_paypal_emails' );

$paypal_args = apply_filters( 'woocommerce_paypal_args', $paypal_args );
// Hook in
add_filter( 'woocommerce_paypal_args' , 'custom_override_paypal_email' );

// Our hooked in function is passed via the filter!
function custom_override_paypal_email( $paypal_args ) {
    $alt_email = find_alt_paypal_emails();
    error_log(print_r($alt_email,true));
    if ( empty( $alt_email ) ) {
        return $paypal_args;
    }
    $paypal_args['business'] = find_alt_paypal_emails();
    print_r( $paypal_args['business'],true );
    return $paypal_args;
}
}
