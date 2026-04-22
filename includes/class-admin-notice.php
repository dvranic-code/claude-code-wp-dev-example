<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function man_register_settings() {
	register_setting(
		'man_settings_group',
		'man_notice_text',
		array( 'sanitize_callback' => 'sanitize_text_field' )
	);

	register_setting(
		'man_settings_group',
		'man_notice_type',
		array( 'sanitize_callback' => 'sanitize_text_field' )
	);
}

function man_display_notice() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	$text = get_option( 'man_notice_text', __( 'Hello from Claude Code', 'moj-admin-notice' ) );
	$type = get_option( 'man_notice_type', 'info' );

	$allowed_types = array( 'info', 'success', 'warning', 'error' );
	if ( ! in_array( $type, $allowed_types, true ) ) {
		$type = 'info';
	}

	printf(
		'<div class="notice notice-%s is-dismissible"><p>%s</p></div>',
		esc_attr( $type ),
		esc_html( $text )
	);
}
