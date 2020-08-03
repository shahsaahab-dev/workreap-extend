<?php
/**
 * Plugin Name: WorkReap-Extend
 * Author: DevSyed
 * Author URI: https://devsyed.com
 * Description: Integrating Client Required Functionalities into WorkReap.
 * Text Domain: workreap-extend
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if Access Directly.
}

final class Workreap_Extend {
	// some required checks.
	const VERSION             = '1.0';
	const MINIMUM_PHP_VERSION = '7.0';

	public function __construct() {
		add_action( 'plugins_loaded', array( $this, 'init' ) );
	}

	public function init() {

		// Check PHP version now
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notice', array( $this, 'php_version_message' ) );
			return;
		}

		// All Checks Done, its all good. Lets initialize the Plugin Now.
		require_once 'Plugin_Setup.php';
	}


	public function php_version_message() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'woo-extend' ),
			'<strong>' . esc_html__( 'WooExtend Plugin', 'woo-extend' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'woo-extend' ) . '</strong>',
			self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}
}

// Instantiate the Plugin
new Workreap_Extend();
