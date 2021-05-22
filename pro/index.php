<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_filter( 'plugin_action_links_' . MOMOVENMO_PLUGIN_BASENAME , 'venmo_settings_link' );

if ( ! is_plugin_active( 'wc-venmo-pro/venmo.php' ) ) {
	// add_action( 'admin_notices', 'wc_venmo_pro_available_notice' );
} else {
	deactivate_plugins( MOMOVENMO_PLUGIN_BASENAME );
	echo '<div class="notice notice-success is-dismissible"><p>MOMO Venmo has been deactivated because the PRO version is activated. Enjoy the upgrade</p></div>';
}

// Settings Button
function venmo_settings_link( $links_array ){
	array_unshift( $links_array, '<a href="' .  esc_url( admin_url( 'admin.php?page=wc-settings&tab=checkout&section=venmo', __FILE__ ) ) . '">Settings</a>' );
	
	if( ! is_plugin_active( 'wc-venmo-pro/venmo.php' ) ) {
		$links_array['wc_venmo_pro'] = sprintf('<a href="https://theafricanboss.com/venmo/" target="_blank" style="color: #3396cd; font-weight: bold;">' . esc_html__('Go Pro for $29','wc-venmo') . '</a>');
	}
	
	return $links_array;
}

function wc_venmo_pro_available_notice() {
	echo '<div class="notice notice-warning is-dismissible"><p>You are currently not using our MOMO Venmo PRO plugin. <strong>Please upgrade for a better experience</strong></p></div>';
}

?>