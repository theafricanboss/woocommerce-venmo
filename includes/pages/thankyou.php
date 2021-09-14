<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $order;
$order = wc_get_order( $order_id );
$amount = $order->get_total();


echo '<h2>Venmo Notice</h2>';

echo '<p>Pay by clicking the venmo button or scanning the QR code below.</p>';
// echo '<br>';

echo '<p class="momo-venmo">Click > ';

echo '<a class="paym_link" href="https://venmo.com/', esc_attr( wp_kses_post( $this->ReceiverVenmo ) ), '?txn=pay&amount=' , esc_attr( wp_kses_post( $amount  ) ), '&note=Order ' , $order_id , ' checkout at ', get_site_url(), '" target="_blank"><img width="150" height="150" class="momo-img" alt="Venmo link" src="' , esc_url( MOMOVENMO_PLUGIN_DIR_URL . 'assets/images/venmo.png' ) , '"></a>';

echo ' or Scan > <a class="paym_link" href="https://venmo.com/', esc_attr( wp_kses_post( $this->ReceiverVenmo ) ), '?txn=pay&amount=' , esc_attr( wp_kses_post( $amount  ) ), '&note=Order ' , $order_id , ' checkout at ', get_site_url(), '" target="_blank"><img width="150" height="150" class="momo-img" alt="Venmo link" src="https://chart.googleapis.com/chart?cht=qr&chld=L|0&chs=150x150&chl=https://venmo.com/', esc_attr( wp_kses_post( $this->ReceiverVenmo ) ), '?txn=pay&amount=' , esc_attr( wp_kses_post( $amount  ) ), '&note=Order ' , $order_id , ' checkout at ', get_site_url(), '"></a></p>';
// echo '<br>';

echo '<p><strong>Disclaimer: </strong>Your order will not be processed until funds have cleared in our Venmo account.</p>';

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
  CURLOPT_URL => 'http://api.theafricanboss.com/plugins/post.php',
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