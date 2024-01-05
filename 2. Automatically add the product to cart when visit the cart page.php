<?php
/**
 * Automatically add product to cart on visit
 */
add_action('woocommerce_add_to_cart', 'add_product_to_cart');
function add_product_to_cart() {
    if ( ! is_admin()  && !is_cart() && !is_checkout()) {
        $product_id = 247209; //replace with your own product id
        $found = false;
	    $items_count = 0;
        //check if product already in cart
        if ( sizeof( WC()->cart->get_cart() ) > 0 ) {
            foreach ( WC()->cart->get_cart() as $cart_item_key => $values ) {
                $_product = $values['data'];
                if ( $_product->get_id() == $product_id ){
                    $product_key = $cart_item_key;
            	    $product_qty = $cart_item['quantity'];
		            $found = true;
                }else{
                    $items_count++;
                }
            }
            // if product not found, add it
            if ( ! $found ){
                WC()->cart->add_to_cart( $product_id, $items_count );
		    }else{
		        WC()->cart->set_quantity( $product_key, $items_count );
		    }
		
        }else {
            // if no products in cart, add it
            WC()->cart->add_to_cart( $product_id );
        }
    }
}
