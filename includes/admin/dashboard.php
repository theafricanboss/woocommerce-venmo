<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
 * Dashboard Menu Button
 */
function venmo_admin_menu(){
	$parent_slug = 'wc-settings&tab=checkout&section=venmo';
	$capability = 'manage_options';

	add_menu_page( null, 'VENMO', $capability , $parent_slug, 'venmo_admin_menu', 'dashicons-money-alt', 56 );
	add_submenu_page( $parent_slug , 'Upgrade VENMO' , '<span style="color:#99FFAA">Go Pro >> </span>' , $capability  , 'https://theafricanboss.com/venmo' , null, null );
	add_submenu_page( $parent_slug , 'Feature my store' , 'Get Featured' , $capability  , 'https://theafricanboss.com/featured' , null, null );
	add_submenu_page( $parent_slug , 'Review VENMO' , 'Review' , $capability  , 'https://wordpress.org/support/plugin/wc-venmo/reviews/?filter=5' , null, null );
	add_submenu_page( $parent_slug , 'Recommended' , 'Recommended' , $capability  , 'momo_venmo_recommended_menu_page' , 'momo_venmo_recommended_menu_page', null );
	add_submenu_page( $parent_slug , 'Tutorials' , 'Tutorials' , $capability  , 'momo_venmo_tutorials_menu_page' , 'momo_venmo_tutorials_menu_page', null );
	// add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, callable $function = '', int $position = null )
}
add_action('admin_menu','venmo_admin_menu');

function momo_venmo_recommended_menu_page() {
	require_once MOMOVENMO_PLUGIN_DIR . 'includes/admin/recommended.php';
}

function momo_venmo_tutorials_menu_page() {
	require_once MOMOVENMO_PLUGIN_DIR . 'includes/admin/tutorials.php';
}

?>