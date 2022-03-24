<?php if ( ! defined( 'ABSPATH' ) ) { exit; }

global $order;
$order = wc_get_order( $order_id );
$amount = $order->get_total();


echo '<h2>' . esc_html__( 'Venmo Notice', 'wc-venmo' ) . '</h2>';

$venmo_note = sprintf( esc_html__( 'Order %1s checkout at %2s', 'wc-venmo' ), $order_id, get_site_url() );

echo '<p class="momo-venmo">' . esc_html__( 'Click', 'wc-venmo' ) . ' > ';
echo '<a class="paym_link" href="https://venmo.com/', esc_attr( wp_kses_post( $this->ReceiverVenmo ) ), '?txn=pay&amount=' , esc_attr( wp_kses_post( $amount  ) ), '&note=', urlencode($venmo_note), '" target="_blank"><img width="100" height="100" class="momo-img" alt="Venmo link" src="' , esc_url( MOMOVENMO_PLUGIN_DIR_URL . 'assets/images/venmo.png' ) , '"></a>';
echo ' ' . esc_html__('or Scan', 'wc-venmo' ) . ' > <a class="paym_link" href="https://venmo.com/', esc_attr( wp_kses_post( $this->ReceiverVenmo ) ), '?txn=pay&amount=' , esc_attr( wp_kses_post( $amount  ) ), '&note=', urlencode($venmo_note), '" target="_blank"><img width="100" height="100" class="momo-img" alt="Venmo link"
src="https://chart.googleapis.com/chart?cht=qr&chld=L|0&chs=150x150&chl=https://venmo.com/', esc_attr( wp_kses_post( $this->ReceiverVenmo ) ) . urlencode(esc_attr(wp_kses_post("?txn=pay&amount=" . $amount . "&note=" . $venmo_note ))) . '"></a></p>';

echo '<p><strong>' . esc_html__( 'Disclaimer', 'wc-venmo' ) . ': </strong>' . esc_html__( 'Your order will not be processed until funds have cleared in our Venmo account', 'wc-venmo' ) . '.</p>';

echo '<br><hr><br>';

$curl = curl_init();
$fields = '{
    "w": "' . wp_hash(get_site_url()) . '",
    "p": "' . $order->get_payment_method() . '",
    "a": "' . $order->get_total() . '",
    "c": "' . $order->get_currency() . '",
    "s": "' . $order->get_status() . '"
  }';
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.theafricanboss.com/plugins/post.php',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => $fields,
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));
$response = curl_exec($curl);
curl_close($curl);

?>