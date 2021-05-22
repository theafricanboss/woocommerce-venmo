<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $order;
$order = wc_get_order( $order_id );
$amount = $order->get_total();

if ( 'venmo' === $order->get_payment_method() ) {

	echo '<h2>Venmo Notice</h2>';

	echo '<p>Pay by clicking the venmo button or scanning the QR code below.</p>';
	// echo '<br>';

	echo '<p>Click > ';
	
	echo '<a href="https://venmo.com/', esc_attr( wp_kses_post( $this->ReceiverVenmo ) ), '?txn=pay&amount=' , esc_attr( wp_kses_post( $amount  ) ), '&note=Order ' , $order_id , ' checkout at ', get_site_url(), '" target="_blank"><img style="float: none!important; max-height:150px!important; max-width:150px!important;" alt="Venmo link" src="' , esc_url( MOMOVENMO_PLUGIN_DIR_URL . 'assets/images/venmo.png' ) , '"></a>';
	
	echo ' or Scan > <a href="https://venmo.com/', esc_attr( wp_kses_post( $this->ReceiverVenmo ) ), '?txn=pay&amount=' , esc_attr( wp_kses_post( $amount  ) ), '&note=Order ' , $order_id , ' checkout at ', get_site_url(), '" target="_blank"><img style="float: none!important; max-height:150px!important; max-width:150px!important;" alt="Venmo link" src="https://chart.googleapis.com/chart?cht=qr&chld=L|0&chs=150x150&chl=https://venmo.com/', esc_attr( wp_kses_post( $this->ReceiverVenmo ) ), '?txn=pay&amount=' , esc_attr( wp_kses_post( $amount  ) ), '&note=Order ' , $order_id , ' checkout at ', get_site_url(), '"></a></p>';
	// echo '<br>';

	echo '<p><strong>Disclaimer: </strong>Your order will not be processed until funds have cleared in our Venmo account.</p>';

	echo '<br><hr><br>';

}

?>