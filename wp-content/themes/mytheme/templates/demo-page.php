<?php 
/*
* Template Name: Demo page
*/

$customer_orders = get_posts( array(
    'numberposts' => -1,
    'meta_key'    => '_customer_user',
    'meta_value'  => get_current_user_id(),
    'post_type'   => wc_get_order_types(),
    'post_status' => array_keys( wc_get_order_statuses() ),
) );

$order = new WC_Order( '284' );
    // var_dump($order);
    
echo '<pre>'.__FILE__.'::'.__METHOD__.'('.__LINE__.')<br>';
	print_r($order);
echo '</pre>';