<?php
//Set Stripe as the default selection on the checkout page.

add_action( 'template_redirect', 'define_default_payment_gateway' );
function define_default_payment_gateway(){
    if( is_checkout() && ! is_wc_endpoint_url() ) {
        // HERE define the default payment gateway ID
        $default_payment_id = 'stripe';

        WC()->session->set( 'chosen_payment_method', $default_payment_id );
    }
}
