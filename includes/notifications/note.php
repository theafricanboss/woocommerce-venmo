<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $woocommerce, $total;
$order = wc_get_order( $order_id );
$woocommerce->cart->get_cart();
$total = $woocommerce->cart->get_total();

$note = esc_html__( 'Your order was received!', 'wc-venmo' ) .'<br><br>'.
	sprintf( __( 'We are checking our Venmo to confirm that we received the %s you sent so we can start processing your order.', 'wc-venmo' ), '<strong style="text-transform:uppercase;">' . wp_kses_post( $total ) . '</strong>'  ) .'<br><br>'.
	esc_html__( 'Thank you for doing business with us', 'wc-venmo' ) . '!<br> ' . esc_html__( 'You will be updated regarding your order details soon', 'wc-venmo' ) . '<br>'.
	esc_html__( 'Kindest Regards', 'wc-venmo' ) . ',<br>'.
	esc_html__( 'Store Assistant', 'wc-venmo' ) ;

// some notes to customer (replace true with false to make it private)
$order->add_order_note( $note , true );

?>