<?php
/*
Plugin Name: Checkout with Venmo on Woocommerce
Plugin URI: https://theafricanboss.com/venmo
Description: The top finance app in the App Store now on WordPress. Receive Venmo payments on your website with WooCommerce + Venmo
Author: The African Boss
Author URI: https://theafricanboss.com
Version: 3.0
WC requires at least: 4.0.0
WC tested up to: 6.3.1
Text Domain: wc-venmo
Domain Path: languages
Created: 2021
Copyright 2021 theafricanboss.com All rights reserved
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
define('MOMOVENMOPRO_PLUGIN_DIR', plugin_dir_path( 'wc-venmo-pro' ) );

if( ! is_plugin_active ( 'woocommerce/woocommerce.php' ) ){
	deactivate_plugins( MOMOVENMO_PLUGIN_BASENAME );
	require_once MOMOVENMO_PLUGIN_DIR . 'includes/notifications/notices.php';
}

if( ! (class_exists( 'WCSMS_WooCommerce_Notification', false ) || is_plugin_active( 'wc-sms/wc-sms.php' ) || is_plugin_active( 'wc-sms-pro/wc-sms.php' )) ) {
    add_action( 'admin_notices', function () {
        echo '<div id="message" class="notice wpml-notice otgs-is-dismissible">
                <p>You are currently not using <strong>SMS for WooCommerce</strong> with WC Venmo. You can use it to send the Venmo notice, order notifications and more. You can also use it for other payment methods</p>
                <p>
                    <a class="button-primary" href="' . esc_url(admin_url('plugin-install.php?s=theafricanboss&tab=search&type=author')) . '">Add SMS for Woocommerce for a better Venmo checkout experience</a>
                    &nbsp;
                    <a href="https://theafricanboss.com/sms" target="_blank">Check it out</a>
                </p>
                <span title="Stop showing this message" id="icl_dismiss_help" class="notice-dismiss"><span class="screen-reader-text">Dismiss</span></span>
            </div>';
    });
}

// translations
function momo_venmo_load_textdomain() {
	load_plugin_textdomain( 'wc-venmo', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'momo_venmo_load_textdomain' );

if ( current_user_can( 'manage_options' ) ) {

	// add_action( 'admin_enqueue_scripts', function () {
	// 	$currentScreen = get_current_screen();
	// 	// var_dump($currentScreen);
	// 	if ($currentScreen->id == 'venmo_page_momo_venmo_recommended_menu_page' || $currentScreen->id == 'venmo_page_momo_venmo_tutorials_menu_page' ) {
	// 		wp_register_style( 'bootstrap', MOMOVENMO_PLUGIN_DIR_URL . 'assets/css/bootstrap.min.css');
	// 		wp_enqueue_style( 'bootstrap' );
	// 	} else {
	// 		return;
	// 	}
	// });

	if ( is_plugin_active( 'wc-venmo-pro/venmo.php' ) ) {
		deactivate_plugins( MOMOVENMO_PLUGIN_BASENAME );
		activate_plugin( 'wc-venmo-pro/venmo.php');
		wp_die( '<div><p>Checkout with Venmo has been deactivated because the PRO version is activated.
		<strong>Enjoy the upgrade</strong></p></div>
		<div><a href="' . admin_url('admin.php?page=wc-settings&tab=checkout&section=venmo') . '">Set up the plugin</a> | <a href="' . admin_url('plugins.php') . '">Return</a></div>' );
	}
	include_once MOMOVENMO_PLUGIN_DIR . 'pro/index.php';
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