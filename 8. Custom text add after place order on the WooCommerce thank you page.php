
<?php

add_filter('woocommerce_thankyou_order_received_text', 'woo_change_order_received_text', 10, 2 );
function woo_change_order_received_text( $str, $order ) {
   $new_str = '<b>Thank you. Your order has been received.</b><br> <div class="alert alert-success sa-checkout-page"><b>Congratulations!</b> ​If you want you can purchase​ another​ course for only <b>£7.99</b>. <br><a class="naim-btn" href="https://coursegate.co.uk/shop/uncategorized/a-gift-course-for-7-99/">Click Here</a> to purchase your next course for £7.99.</div> <br><br>';
   return $new_str;
}
