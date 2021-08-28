<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

echo '<p>Send <a style="color: #3396cd" href="https://venmo.com/', esc_attr( wp_kses_post( $this->ReceiverVenmo ) ), '?txn=pay&amount=' , esc_attr( wp_kses_post( $amount  ) ), '&note=checkout at ', get_site_url(), '" target="_blank">the requested total to ', esc_attr( wp_kses_post( $this->ReceiverVenmo ) ), '</a> or click the Venmo button below</p>';

echo '<p><a href="https://venmo.com/', esc_attr( wp_kses_post( $this->ReceiverVenmo ) ), '?txn=pay&amount=' , esc_attr( wp_kses_post( $amount  ) ), '&note=checkout at ', get_site_url(), '" target="_blank"><img width="150" height="150" alt="Venmo link" src="' , esc_url( MOMOVENMO_PLUGIN_DIR_URL . 'assets/images/venmo.png' ) , '"></a></p>';

?>