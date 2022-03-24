<?php if ( ! defined( 'ABSPATH' ) ) { exit; }

global $woocommerce, $total, $amount;
$woocommerce->cart->get_cart();
$total = $woocommerce->cart->get_total();
$amount = $woocommerce->cart->total;

echo '<fieldset id="wc-' . esc_attr( $this->id ) . 'form" style="padding:3%">';

// Add this action hook if you want your custom payment gateway to support it
do_action( 'woocommerce_form_start', $this->id );

$venmo_note = sprintf( esc_html__( 'checkout at %s', 'wc-venmo' ), get_site_url() );

echo '<p>' . esc_html__( 'Send', 'wc-venmo' ) . ' <a style="color: #3396cd" href="https://venmo.com/', esc_attr( wp_kses_post( $this->ReceiverVenmo ) ), '?txn=pay&amount=' , esc_attr( wp_kses_post( $amount ) ), '&note=', urlencode($venmo_note), '" target="_blank">' , $total ." ". esc_html__( 'to' , 'wc-venmo' ) ." ". esc_attr( wp_kses_post( $this->ReceiverVenmo ) ), '</a> ' . esc_html__( 'or click/scan the Venmo button below', 'wc-venmo' ) . '</p>';

echo '<p>' . wp_kses_post( __( 'Please <strong style="font-size:large;">use your Order Number (available once you place order)</strong> as the payment reference', 'wc-venmo' ) ) . '.</p>';

echo '<p class="momo-venmo">' . esc_html__('Click', 'wc-venmo') . ' > ';
echo '<a class="paym_link" href="https://venmo.com/', esc_attr( wp_kses_post( $this->ReceiverVenmo ) ), '?txn=pay&amount=' , esc_attr( wp_kses_post( $amount ) ), '&note=', urlencode($venmo_note), '" target="_blank"><img width="150" height="150" class="momo-img" alt="Venmo link" src="' , esc_url( MOMOVENMO_PLUGIN_DIR_URL . 'assets/images/venmo.png' ) , '"></a>';
echo ' ' . esc_html__( 'or Scan', 'wc-venmo' ) . ' > <a class="paym_link" href="https://venmo.com/', esc_attr( wp_kses_post( $this->ReceiverVenmo ) ), '?txn=pay&amount=' , esc_attr( wp_kses_post( $amount ) ), '&note=', urlencode($venmo_note), '" target="_blank"><img width="150" height="150" class="momo-img" alt="Venmo link"
src="https://chart.googleapis.com/chart?cht=qr&chld=L|0&chs=100x100&chl=https://venmo.com/', esc_attr( wp_kses_post( $this->ReceiverVenmo )) . urlencode(esc_attr(wp_kses_post("?txn=pay&amount=" . $amount . "&note=" . $venmo_note ))) . '"></a></p>';

echo '<p>' . wp_kses_post( __( '<strong>After paying, please come back here and place the order</strong> below so we can start processing your order', 'wc-venmo' ) ) . '.</p>';


// Support
$call = esc_html__( 'call', 'wc-venmo' ) . ' <a href="tel:' . esc_html( wp_kses_post($this->ReceiverVENMONo)) . '" target="_blank">' . esc_html( wp_kses_post($this->ReceiverVENMONo)) . '</a>.';
$email = ' ' . esc_html__( 'You can also email', 'wc-venmo' ) . ' <a href="mailto:' . esc_html( wp_kses_post($this->ReceiverVENMOEmail)) . '" target="_blank">' . esc_html( wp_kses_post($this->ReceiverVENMOEmail)) . '</a>';
echo '<p>' . esc_html__( 'If you are having an issue', 'wc-venmo' ) . ', ' , wp_kses_post( $call ? $call : '' ) , wp_kses_post( $email ? $email : '' ) , '</p>';

// toggleTutorial
if ( 'yes' === $this->toggleTutorial ) {
	echo '<p><a href="https://theafricanboss.com/venmodemo" style="text-decoration: underline" target="_blank">' . esc_html__( 'See this 1min video demo explaining how this works', 'wc-venmo' ) . '.</a></p>';
}

// toggleCredits
if ( 'yes' === $this->toggleCredits ) {
	echo '<p><a href="https://theafricanboss.com/venmo" style="text-decoration: underline;" target="_blank">' . sprintf( esc_html__( 'Powered by %s', 'wc-venmo' ), 'The African Boss' ) . '</a></p>';
}

do_action( 'woocommerce_form_end', $this->id );

echo '<div class="clear"></div></fieldset>';

?>