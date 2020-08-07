<?php

class Freelancer {
	public function __construct() {
		add_filter( 'manage_freelancers_posts_columns', array( &$this, 'new_columns_freelancer' ) );
		add_action( 'add_meta_boxes', array( $this, 'new_freelancer_metabox' ) );
		add_action( 'save_post', array( $this, 'work_reap_extend_save_time' ) );
	}

	public function new_columns_freelancer( $columns ) {
		$columns['availibility'] = esc_html__( 'Time Availibility', 'workreap-extend' );
		return $columns;
	}

	public function new_freelancer_metabox() {
		add_meta_box( 'time-avail', __( 'Time Availibility', 'textdomain' ), array( $this, 'work_reap_extend_custom_time_avail' ), 'freelancers' );
	}

	public function cgm( $time ) {
		return get_post_meta( get_the_ID(), $time, true );

	}


	public function work_reap_extend_custom_time_avail() {?>
	<h4>Choose Dates and Hours <?php echo get_the_title(); ?> available at: </h4>
					<form>
						<div class="row">
							<div class="col">
								<input name="start" type="text" id="start_date" class="form-control" placeholder="From" autocomplete="off" value="<?php echo $this->cgm( 'start_date' ); ?>">
							</div>
							<div class="col">
								<input name="end" type="text" id="end_date" class="form-control" placeholder="To" value="<?php echo $this->cgm( 'end_date' ); ?>">
							</div>
						</div>
						<div class="row">
							<div class="col">
								<label for="work_hours">Start Hours</label>
								<input name="start_hours" type="text" class="form-control" id="start_hours" placeholder="From" value="<?php echo $this->cgm( 'start_hour' ); ?>">
							</div>
							<div class="col">
								<label for="work_hours">End Hours</label>
								<input name="end_hours" type="text"  class="form-control" id="end_hours" placeholder="To" value="<?php echo $this->cgm( 'end_hour' ); ?>">
							</div>
						</div>
						<button id="save_work_hours" class="btn btn-primary">Save Work Hours</button>
					</form>
		<?php
	}


	public function work_reap_extend_save_time() {
		if ( isset( $_POST['start'] ) && $_POST['start'] !== '' ) {
			update_post_meta( get_the_ID(), 'start_date', sanitize_text_field( $_POST['start'] ) );
		}
		if ( isset( $_POST['end'] ) && $_POST['end'] !== '' ) {
			update_post_meta( get_the_ID(), 'end_date', sanitize_text_field( $_POST['end'] ) );
		}
		if ( isset( $_POST['start_hours'] ) && $_POST['start_hours'] !== '' ) {
			update_post_meta( get_the_ID(), 'start_hour', sanitize_text_field( $_POST['start_hours'] ) );
		}
		if ( isset( $_POST['end_hours'] ) && $_POST['end_hours'] !== '' ) {
			update_post_meta( get_the_ID(), 'end_hour', sanitize_text_field( $_POST['end_hours'] ) );
		}
	}



}

new Freelancer();
