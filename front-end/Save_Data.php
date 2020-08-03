<?php
/**
 * wt-update-profile-freelancer - On hook.
 * Saving the work hours from profile dashboard to the database.
 * Saving Data through Ajax
 */

class Save_Data {
	public function __construct() {
		add_action( 'wp_ajax_work_reap_extend_save_hours', array( $this, 'work_reap_extend_save_hours' ) );
		add_action( 'wp_ajax_nopriv_work_reap_extend_save_hours', array( $this, 'work_reap_extend_save_hours' ) );
	}
	public function work_reap_extend_save_hours() {
		global $current_user, $wp_roles, $userdata, $post;
		$user_identity = $current_user->ID;
		// Linked Post Id
		$linked_profile = workreap_get_linked_profile_id( $user_identity );
	}

}

new Save_Data();
