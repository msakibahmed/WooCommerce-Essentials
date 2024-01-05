<?php
function action_woocommerce_removed_coupon( $coupon_code ) { 
	if($coupon_code == 'skill99' OR $coupon_code == 'SKILL99') {
 
    //1st way
	  $product_id = 258189;
	  $product_cart_id = WC()->cart->generate_cart_id( $product_id );
	  $cart_item_key = WC()->cart->find_product_in_cart( $product_cart_id );
	  if ( $cart_item_key ) WC()->cart->remove_cart_item( $cart_item_key );
    //END 1st way
    
    //2nd Way
    foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
        if ( $cart_item['product_id'] == $product_id ) {
            WC()->cart->remove_cart_item( $cart_item_key );
        }
    }
    //2nd way end

	}
}; 
 
 // add the action 
 add_action( 'woocommerce_applied_coupon', 'action_woocommerce_removed_coupon', 10, 1 );
