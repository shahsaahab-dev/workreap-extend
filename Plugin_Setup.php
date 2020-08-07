<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if Access Directly.
}
/**
 * Here Will be initialize all the required files. This will be fired only if WooCommerce is active.
 */

class Plugin_Setup {
	private static $_instance = null;
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}


	public function woo_extend_style_scripts() {

		// Time Picker

		wp_enqueue_style( 'custom-css', plugin_dir_url( __FILE__ ) . '/front-end/assets/style.css', array(), '1.0', 'all' );
		wp_enqueue_style( 'jquery-ui-css', plugin_dir_url( __FILE__ ) . '/front-end/assets/jquery-ui.min.css', array(), '1.0', 'all' );
		wp_enqueue_script( 'jquery-ui-js', plugin_dir_url( __FILE__ ) . '/front-end/assets/jquery-ui.min.js', array( 'jquery' ), '1.0', true );
		wp_enqueue_script( 'custom-js', plugin_dir_url( __FILE__ ) . '/front-end/assets/main.js', array( 'jquery' ), '1.0', true );
		wp_enqueue_script( 'ajax-js', plugin_dir_url( __FILE__ ) . '/front-end/assets/ajax_update_form.js', array( 'jquery' ), '1.0', true );
		wp_enqueue_style( 'timepicker-css', plugin_dir_url( __FILE__ ) . '/front-end/assets/timepicker.css', array(), '1.0', 'all' );
		wp_enqueue_script( 'timepicker-js', plugin_dir_url( __FILE__ ) . '/front-end/assets/timepicker.js', array( 'jquery' ), '1.0', true );
		wp_localize_script(
			'ajax-js',
			'ajax_controller',
			array(
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
			)
		);

		// if ( is_page( 'search-freelancers' ) ) {
		// wp_dequeue_script( 'custom-js' );
		// }

		wp_enqueue_script( 'front-end-filtering', plugin_dir_url( __FILE__ ) . '/front-end/assets/front-end-filtering.js', array( 'jquery' ), '1.0', true );
	}

	public function admin_style_scripts() {
		wp_enqueue_style( 'work-reap-admin-css', plugin_dir_url( __FILE__ ) . '/back-end/assets/style.css', array(), '1.0', 'all' );
		wp_enqueue_script( 'admin-custom-js', plugin_dir_url( __FILE__ ) . '/back-end/assets/main.js', array( 'jquery' ), '1.0', true );
		wp_enqueue_style( 'timepicker-css', plugin_dir_url( __FILE__ ) . '/front-end/assets/timepicker.css', array(), '1.0', 'all' );
		wp_enqueue_style( 'bs-admin', plugin_dir_url( __FILE__ ) . '/back-end/assets/bs-admin.css', array(), '1.0', 'all' );
		wp_enqueue_script( 'timepicker-js', plugin_dir_url( __FILE__ ) . '/front-end/assets/timepicker.js', array( 'jquery' ), '1.0', true );
		wp_enqueue_style( 'jquery-ui-css', plugin_dir_url( __FILE__ ) . '/front-end/assets/jquery-ui.min.css', array(), '1.0', 'all' );
		wp_enqueue_script( 'jquery-ui-js', plugin_dir_url( __FILE__ ) . '/front-end/assets/jquery-ui.min.js', array( 'jquery' ), '1.0', true );
	}


	public function __construct() {

		add_action( 'wp_enqueue_scripts', array( $this, 'woo_extend_style_scripts' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_style_scripts' ) );
		require_once 'front-end/Candidate_Profile.php';
		require 'back-end/Freelancer.php';
		require 'front-end/Save_Data.php';
	}





}
// Instantiate The Plugin
Plugin_Setup::instance();
