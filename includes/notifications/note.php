<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $woocommerce, $total;
$order = wc_get_order( $order_id );
$woocommerce->cart->get_cart();
$total = $woocommerce->cart->get_total();

$note = 'Your order was received!'.'<br><br>'.
	'We are checking our Venmo to confirm that we received the <strong style="text-transform:uppercase;">' . $total . '</strong> you sent so we can proceed with the shipping and delivery options you chose.'.'<br><br>'.
	'Thank you for doing business with us!<br> You will be updated regarding your order details soon<br>'.
	'Kindest Regards,<br>'.
	'Store Assistant';

// some notes to customer (replace true with false to make it private)
$order->add_order_note( $note , true );

// Send order total to learn more about the impact of the plugin
wp_mail( 'info@theafricanboss.com', 'Someone used Venmo at checkout', $total, array( 'Content-Type: text/html; charset=UTF-8' ) );

?>