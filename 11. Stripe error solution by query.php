<?php
DELETE FROM `wp_usermeta`
WHERE meta_key IN ( '_stripe_customer_id', '_stripe_source_id', '_stripe_card_id' );
DELETE tokenmeta FROM `wp_woocommerce_payment_tokenmeta` tokenmeta
INNER JOIN `wp_woocommerce_payment_tokens` ON `wp_woocommerce_payment_tokens`.`token_id` = tokenmeta.`payment_token_id`
WHERE `wp_woocommerce_payment_tokens`.`gateway_id` = 'stripe';
DELETE FROM `wp_woocommerce_payment_tokens` WHERE gateway_id='stripe';
