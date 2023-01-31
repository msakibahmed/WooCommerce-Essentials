<?php

add_action( 'woocommerce_after_cart_table', 'add_remove_coupon_button' );
function add_remove_coupon_button() {
    if ( WC()->cart->has_discount( 'JAN6' ) OR WC()->cart->has_discount( 'JAN4' )) {
        $coupons = WC()->cart->get_coupons();
        $coupon_code = '';
        if ( ! empty( $coupons ) ) {
            foreach ( $coupons as $code => $coupon ) {
                $coupon_code = esc_html( $code );
                break;
            }
        }
        echo '<a href="' . esc_url( add_query_arg( 'remove_coupon',  $coupon_code ) ) . '" class="remove_coupon button">Remove Coupon</a>';
    }
}
