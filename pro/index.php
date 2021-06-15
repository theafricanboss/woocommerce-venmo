<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_filter( 'plugin_action_links_' . MOMOVENMO_PLUGIN_BASENAME , 'venmo_settings_link' );


// Settings Button
function venmo_settings_link( $links_array ){
	array_unshift( $links_array, '<a href="' .  esc_url( admin_url( 'admin.php?page=wc-settings&tab=checkout&section=venmo', __FILE__ ) ) . '">Settings</a>' ); // <a href="' . esc_html__( admin_url("plugin-install.php?s=theafricanboss&tab=search&type=author") ) . '" style="color: blue; font-weight: bold;">Recommended Plugins</a>
	
	if( ! is_plugin_active( 'wc-venmo-pro/venmo.php' ) ) {
		$links_array['wc_venmo_pro'] = sprintf('<a href="https://theafricanboss.com/venmo/" target="_blank" style="color: #3396cd; font-weight: bold;">' . esc_html__('Go Pro for $29','wc-venmo') . '</a>');
	}
	
	return $links_array;
}

function wc_venmo_pro_available_notice() {
	echo '<div class="notice notice-warning is-dismissible"><p>You are currently not using our Checkout with Venmo PRO plugin. <strong>Please upgrade for a better experience</strong></p></div>';
}

?>