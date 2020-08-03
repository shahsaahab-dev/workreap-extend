<?php

class Freelancer {
	public function __construct() {
		add_filter( 'manage_freelancers_posts_columns', array( &$this, 'new_columns_freelancer' ) );
		add_action( 'add_meta_boxes', array( $this, 'new_freelancer_metabox' ) );
		add_action( 'save_post', array( $this, 'save_time' ) );
	}

	public function new_columns_freelancer( $columns ) {
		$columns['availibility'] = esc_html__( 'Time Availibility', 'workreap-extend' );
		return $columns;
	}

	public function new_freelancer_metabox() {
		add_meta_box( 'time-avail', __( 'Time Availibility', 'textdomain' ), array( $this, 'work_reap_extend_custom_time_avail' ), 'freelancers' );
	}

	public function cgm( $day ) {
		$post_id = get_the_ID();
		return get_post_meta( $post_id, $day . '_timings', true );

	}


	public function work_reap_extend_custom_time_avail() {
		echo '<h1>Hello World from Freelancer.php</h1>';
	}


	public function save_time() {
	}



}

new Freelancer();
