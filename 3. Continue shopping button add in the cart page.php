<?php

add_action('woocommerce_cart_coupon', 'themeprefix_back_to_store');
    // add_action( 'woocommerce_cart_actions', 'themeprefix_back_to_store' );
    function themeprefix_back_to_store() { ?>
    <br>
    <br>
    <a class="button wc-backward" href="https://coursegate.co.uk/courses/"> <?php _e( 'Continue Shopping', 'woocommerce' ) ?> </a>
    <?php
}
