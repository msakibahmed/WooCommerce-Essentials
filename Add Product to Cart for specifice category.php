<?php
/*
* This is a Function off Dynamically add product by selected category
*/ 
add_action( 'woocommerce_add_to_cart', 'farhan_check_if_product_category_is_in_cart_page' );
function farhan_check_if_product_category_is_in_cart_page() {
// Modified Loop
foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
    // Check if catagory ABC Awards - Level 1 exists
    if(check_category_is_exists($cart_item['product_id'], 52362)){
        add_product_to_cart_page(406970);
    }
    // Check if catagory ABC Awards - Level 2 exists
    if(check_category_is_exists($cart_item['product_id'], 52363)){
        add_product_to_cart_page(406971);
    }
     // Check if catagory ABC Awards - Level 3 exists
     if(check_category_is_exists($cart_item['product_id'], 52364)){
        add_product_to_cart_page(406972);
    }
     // Check if catagory ABC Awards - Level 4 exists
     if(check_category_is_exists($cart_item['product_id'], 52365)){
        add_product_to_cart_page(406973);
    }
     // Check if catagory ABC Awards - Level 5 exists
     if(check_category_is_exists($cart_item['product_id'], 52366)){
        add_product_to_cart_page(406974);
    }
     // Check if catagory ABC Awards - Level 6 exists
     if(check_category_is_exists($cart_item['product_id'], 52367)){
        add_product_to_cart_page(406975);
    }
     // Check if catagory ABC Awards - Level 7 exists
     if(check_category_is_exists($cart_item['product_id'], 52368)){
        add_product_to_cart_page(406976);
    }
}
}
// Check if a category exists in product
function check_category_is_exists($product_id, $category_id){
    return has_term( $category_id, 'product_cat', $product_id );
}
// Add Product to Cart for specific category
function add_product_to_cart_page($product_id){
            $delete_product_id_here  = " ";
    		$found = false;
            //$product_check = 311361;
    		//check if product already in cart
    		if ( sizeof( WC()->cart->get_cart() ) > 0 ) {
    			foreach ( WC()->cart->get_cart() as $cart_item_key => $values ) {
    				$_product = $values['data'];
    				if ( $_product->get_id() == $product_id /*|| $_product->get_id() == $product_check*/)
    					$found = true;
    			}
    			// if product not found, add it
    			if ( ! $found )
    				WC()->cart->add_to_cart( $product_id );
    		} 
            foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                if ( $cart_item['product_id'] == $delete_product_id_here ) {
                     WC()->cart->remove_cart_item( $cart_item_key );
                }
           }
}