<?php

/**
 * Automatically add product to cart on visit
 */

add_action('woocommerce_add_to_cart', 'add_product_to_cart', 10, 10);
function add_product_to_cart()
{
    if (!is_admin()  && !is_cart() && !is_checkout()) {
        $product_id = 263654; //replace with your own product id

        $excloud_product = 380978;
        $excloud_product1 = 446740;
        $excloud_product2 = 379377;
        $ex1 = 436121;
        $ex2 = 436122;
        $ex3 = 436123;
        $ex4 = 436124;
        $ex5 = 436125;
        $ex6 = 436126;
        $ex7 = 436127;
        $ex8 = 491822;


        $found = false;
        $items_count = 0;
        //check if product already in cart
        if (sizeof(WC()->cart->get_cart()) > 0) {
            foreach (WC()->cart->get_cart() as $cart_item_key => $values) {
                $_product = $values['data'];


                // if($_product->get_id() === 446740){
                // 	$bundle = true;
                // 	$items_count = 4;
                // }

                if ($_product->get_id() == $product_id  || $_product->get_id() == $excloud_product || $_product->get_id() == $excloud_product2 || $_product->get_id() == $ex1 || $_product->get_id() == $ex2 || $_product->get_id() == $ex3 || $_product->get_id() == $ex4 || $_product->get_id() == $ex5 || $_product->get_id() == $ex6 || $_product->get_id() == $ex7) {
                    $product_key = $cart_item_key;
                    $product_qty = $cart_item['quantity'];
                    $found = true;
                } else {
                    $items_count++;
                }

                /* $product_category_id 	= 55653; // cricket bat category id
                    $product_cats_ids 	= wc_get_product_term_ids( $_product->get_id(), 'product_cat' );
                    if(in_array( $product_category_id, $product_cats_ids ) ){
                        return;
                    } */

                //Product category ->  Exclude Cross Sell = 57836
                $product_category_id = 57836; // 
                $product_cats_ids     = wc_get_product_term_ids($_product->get_id(), 'product_cat');
                if (in_array($product_category_id, $product_cats_ids)) {
                    $no_offer_item = 1;
                    $items_count = $items_count - $no_offer_item;
                    //return;
                }
            }
            // if product not found, add it
            if (!$found) {
                WC()->cart->add_to_cart($product_id, $items_count);
            } else {
                WC()->cart->set_quantity($product_key, $items_count);
            }
        } else {
            // if no products in cart, add it
            WC()->cart->add_to_cart($product_id);
        }
    }
}









Option 2


/**
 * Automatically add product to cart on visit
 */
add_action('woocommerce_add_to_cart', 'sa_add_product_to_cart');

function sa_add_product_to_cart() {
    if ( ! is_admin() && !is_cart() && !is_checkout() ) {
        $product_id = 49459; 
        $found = false;
        $items_count = 0;
        $excluded_sub_item = 176194;
        $no_offer_item = 0;
        
        // Check if product already in cart
        if ( sizeof( WC()->cart->get_cart() ) > 0 ) {
            $product_category_id = 64;
            foreach ( WC()->cart->get_cart() as $cart_item_key => $values ) {
                $_product = $values['data'];
                $product_cats_ids = wc_get_product_term_ids( $_product->get_id(), 'product_cat' );
                if ( $_product->get_id() == $product_id ){
                    $product_key = $cart_item_key;
                    $product_qty = $cart_item['quantity'];
                    $found = true;
                } elseif( in_array( $product_category_id, $product_cats_ids ) ){
                    $no_offer_item = 1; 
                } elseif ( $_product->get_id() != $excluded_sub_item ) {
                    $items_count += $values['quantity'];
                }

                $product_category_id 	= 1299; // 6166
                $product_cats_ids 	= wc_get_product_term_ids( $_product->get_id(), 'product_cat' );
                if(in_array( $product_category_id, $product_cats_ids ) ){
                    $no_offer_item = 1; 
                    $items_count = $items_count - $no_offer_item;
                    //return;
                }

            }
            
            // Calculate quantity to add
            $quantity_to_add = max( 1, $items_count );
            
            // If product not found, add it
            if ( ! $found && $no_offer_item != 1 ){
                WC()->cart->add_to_cart( $product_id, $quantity_to_add );
            }
            elseif ( $no_offer_item != 1 ){
                WC()->cart->set_quantity( $product_key, $quantity_to_add );
            }
        } else {
            // If no products in cart, add it
            WC()->cart->add_to_cart( $product_id );
        }
    }
}

