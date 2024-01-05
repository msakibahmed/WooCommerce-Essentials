<?php
function subscription_price(){
    global  $woocommerce;
    $prodcut_id = 336479; // product id
    $regular_price = get_post_meta($prodcut_id, '_regular_price', true);
    $sale = get_post_meta($prodcut_id, '_sale_price', true);
    $currency=  get_woocommerce_currency_symbol();
    if (!empty($sale)) {
        $price_subs =  $currency.$sale.' <del>'.$currency.$regular_price.'</del>';
    }else{
        $price_subs = $currency.$regular_price;
    }
    return $price_subs;
}
