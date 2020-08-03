<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if Access Directly.
}
/**
 * Adding a new Widget for Work Hours
 */
class Candidate_Profile {
	public function __construct() {
		// Hook for View Freelancers Page on Sidebar Left.
		add_action( 'workreap_print_languages', array( $this, 'work_reap_extend_work_hour_tab' ), 10 );
	}

	public function work_reap_extend_work_hour_tab() {

	}
}

new Candidate_Profile();
