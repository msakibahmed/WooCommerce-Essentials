<?php

//Sakib
add_filter( 'woocommerce_add_to_cart_redirect', 'woo_redirect_checkout' );
function woo_redirect_checkout() {
    global $woocommerce;
    $desire_product1 = 6543;
    $desire_product2 = 6545;
    $desire_product3 = 6549;
    //Get product ID
    $product_id = (int) apply_filters( 'woocommerce_add_to_cart_product_id', $_POST['add-to-cart'] );

    //Check if current product is subscription
    if ( $product_id == $desire_product1 OR $product_id == $desire_product2 OR $product_id == $desire_product3 ){
        $checkout_url = $woocommerce->cart->get_checkout_url();
        return $checkout_url;
        exit;
    } else {
        $cart_url = $woocommerce->cart->get_cart_url();
        return $cart_url;
        exit;
    }
}
