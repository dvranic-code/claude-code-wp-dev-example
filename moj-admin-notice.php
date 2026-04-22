<?php
/**
 * Plugin Name: Moj Admin Notice
 * Plugin URI:  https://example.com/moj-admin-notice
 * Description: Displays a custom admin notice in wp-admin.
 * Version:     1.0.0
 * Author:      Dejan Rudic Vranic
 * Text Domain: moj-admin-notice
 * Domain Path: /languages
 * Requires PHP: 8.1
 * Requires at least: 6.5
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'MAN_VERSION', '1.0.0' );
define( 'MAN_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'MAN_TEXT_DOMAIN', 'moj-admin-notice' );

require_once MAN_PLUGIN_DIR . 'includes/class-admin-notice.php';

add_action( 'admin_init', 'man_register_settings' );
add_action( 'admin_notices', 'man_display_notice' );
