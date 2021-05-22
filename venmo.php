<?php
/*
 * Plugin Name: MOMO Venmo
 * Plugin URI: https://theafricanboss.com/venmo
 * Description: The top finance app in the App Store now on WordPress. Receive Venmo payments on your website with WooCommerce + Venmo
 * Author: The African Boss
 * Author URI: https://theafricanboss.com
 * Version: 1.0
 * WC requires at least: 3.0.0
 * WC tested up to: 5.3.0
 * Version Date: May 15, 2021
 * Created: 2021
 * Copyright 2021 theafricanboss.com All rights reserved
 */
 
// Reach out to The African Boss for website and mobile app development services at theafricanboss@gmail.com
// or at www.TheAfricanBoss.com or download our app at www.TheAfricanBoss.com/app

// If you are using this version, please send us some feedback
// via email at theafricanboss@gmail.com on your thoughts and what you would like improved

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
require_once( ABSPATH . 'wp-includes/pluggable.php');

define('MOMOVENMO_PLUGIN_DIR', plugin_dir_path(__FILE__) );
define('MOMOVENMO_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
define('MOMOVENMO_PLUGIN_DIR_URL', plugins_url( '/' , __FILE__ ));
define('MOMOVENMO_PRO_PLUGIN_DIR', plugin_dir_path( 'wc-venmo-pro' ) );

if( ! is_plugin_active ( 'woocommerce/woocommerce.php' ) ){
	deactivate_plugins( MOMOVENMO_PLUGIN_BASENAME );
	require_once MOMOVENMO_PLUGIN_DIR . 'includes/notifications/notices.php';
}

if ( current_user_can( 'manage_options' ) ) {
	require_once MOMOVENMO_PLUGIN_DIR . 'pro/index.php';
	require_once MOMOVENMO_PLUGIN_DIR . 'includes/admin/dashboard.php';
}

add_filter( 'woocommerce_payment_gateways', 'venmo_add_gateway_class' );
add_action( 'plugins_loaded', 'venmo_init_gateway_class' );


//This action hook registers our PHP class as a WooCommerce payment gateway
function venmo_add_gateway_class( $gateways ) {
	$gateways[] = 'wc_venmo_gateway'; // your class name is here
	return $gateways;
}

//The class itself, please note that it is inside plugins_loaded action hook
function venmo_init_gateway_class() {
	require_once MOMOVENMO_PLUGIN_DIR . 'includes/class-wc_venmo_gateway.php';
}

?>