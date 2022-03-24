<?php if ( ! defined( 'ABSPATH' ) ) { exit; }

echo '<h2>' . esc_html__( 'Venmo Notice', 'wcvenmo' ) . '</h2>';

$venmo_note = sprintf( esc_html__( 'checkout at %s', 'wcvenmo' ), get_site_url() );

echo '<p>' . esc_html__( 'Send', 'wcvenmo' ) . ' <a style="color: #3396cd" href="https://venmo.com/', esc_attr( wp_kses_post( $this->ReceiverVenmo ) ), '?txn=pay&amount=' , esc_attr( wp_kses_post( $amount  ) ), '&note=', urlencode($venmo_note), '" target="_blank">' . esc_html__( 'the requested total to', 'wcvenmo' ) . ' ', esc_attr( wp_kses_post( $this->ReceiverVenmo ) ), '</a> ' . esc_html__( 'or click the Venmo button below', 'wcvenmo' ) . '</p>';
echo '<p><a href="https://venmo.com/', esc_attr( wp_kses_post( $this->ReceiverVenmo ) ), '?txn=pay&amount=' , esc_attr( wp_kses_post( $amount  ) ), '&note=', urlencode($venmo_note), '" target="_blank"><img width="150" height="150" alt="Venmo link" src="' , esc_url( MOMOVENMO_PLUGIN_DIR_URL . 'assets/images/venmo.png' ) , '"></a></p>';

echo '<p><strong>' . esc_html__( 'Disclaimer', 'wcvenmo' ) . ': </strong>' . esc_html__( 'Your order will not be processed until funds have cleared in our Venmo account', 'wcvenmo' ) . '.</p>';

?>