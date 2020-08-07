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
	public function action_to_save_data() {
		

	}
	public function work_reap_extend_save_hours() {
		global $current_user, $wp_roles, $userdata, $post;
		$user_identity = $current_user->ID;
		// Linked Post Id
		$linked_profile = workreap_get_linked_profile_id( $user_identity );
		$monday    = $_POST['monday_timings'];
		$tuesday   = $_POST['tuesday_timings'];
		$wednesday = $_POST['wednesday_timings'];
		$thursday  = $_POST['thursday_timings'];
		$friday    = $_POST['friday_timings'];
		$saturday  = $_POST['saturday_timings'];
		$sunday    = $_POST['sunday_timings'];

		if ( isset( $_POST['monday_timings'] ) && $_POST['monday_timings'] !== '' ) {
			update_post_meta( $linked_profile, 'monday_timings', sanitize_text_field( $_POST['monday_timings'] ) );
		}
		if ( isset( $_POST['tuesday_timings'] ) && $_POST['tuesday_timings'] !== '' ) {
			update_post_meta( $linked_profile, 'tuesday_timings', sanitize_text_field( $_POST['tuesday_timings'] ) );
		}
		if ( isset( $_POST['wednesday_timings'] ) && $_POST['wednesday_timings'] !== '' ) {
			update_post_meta( $linked_profile, 'wednesday_timings', sanitize_text_field( $_POST['wednesday_timings'] ) );
		}
		if ( isset( $_POST['thursday_timings'] ) && $_POST['thursday_timings'] !== '' ) {
			update_post_meta( $linked_profile, 'thursday_timings', sanitize_text_field( $_POST['thursday_timings'] ) );
		}
		if ( isset( $_POST['friday_timings'] ) && $_POST['friday_timings'] !== '' ) {
			update_post_meta( $linked_profile, 'friday_timings', sanitize_text_field( $_POST['friday_timings'] ) );
		}
		if ( isset( $_POST['saturday_timings'] ) && $_POST['saturday_timings'] !== '' ) {
			update_post_meta( $linked_profile, 'saturday_timings', sanitize_text_field( $_POST['saturday_timings'] ) );
		}
		if ( isset( $_POST['sunday_timings'] ) && $_POST['sunday_timings'] !== '' ) {
			update_post_meta( $linked_profile, 'sunday_timings', sanitize_text_field( $_POST['sunday_timings'] ) );
		}

		wp_send_json( 'updated' );
	}

}

new Save_Data();
