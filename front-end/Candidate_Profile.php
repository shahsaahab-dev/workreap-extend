<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if Access Directly.
}
/**
 * Adding a new Widget for Work Hours
 */
class Candidate_Profile {
	public function __construct() {
		add_action( 'workreap_print_languages', array( $this, 'work_reap_extend_work_hour_tab' ), 10 );
	}

	public function work_reap_extend_work_hour_tab() {?>

		<div class="wt-widget wt-effectiveholder work-hours">
			<div class="wt-widgettitle">
				<h2><?php esc_html_e( 'Work Hours', 'workreap' ); ?>:<span>( <em></em>
						<?php esc_html_e( 'Work Hours', 'workreap-extend' ); ?> )</span></h2>
			</div>
			<div class="wt-widgetcontent">
				<div class="wt-formtheme wt-formsearch">
					<button class="set_timings">Set Time</button>
				</div>
				<div class="search-widget">
					
					<table>
					<input type="hidden" value="<?php echo $_GET['monday']; ?>" name="monday"/>
					<input type="hidden" value="<?php echo $_GET['tuesday']; ?>" name="tuesday"/>
					<input type="hidden" value="<?php echo $_GET['wednesday']; ?>" name="wednesday"/>
					<input type="hidden" value="<?php echo $_GET['thursday']; ?>" name="thursday"/>
					<input type="hidden" value="<?php echo $_GET['friday']; ?>" name="friday"/>
					<input type="hidden" value="<?php echo $_GET['saturday']; ?>" name="saturday"/>
					<input type="hidden" value="<?php echo $_GET['sunday']; ?>" name="sunday"/>
						<thead>
							<th>&nbsp; &nbsp;</th>
							<?php
							$days = array( 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday' );
							foreach ( $days as $day ) {
								echo '<th data-day="' . $day . '">' . $day . '</th>';
							}

							?>
						</thead>
						<tbody>
						<?php
						for ( $x = 5;$x <= 24;$x++ ) {
							echo '<tr data-row-num="' . str_pad( $x, 2, '0', STR_PAD_LEFT ) . '" >
								<td>' . str_pad( $x, 2, '0', STR_PAD_LEFT ) . ':00</td>
								<td data-day="monday">&nbsp;&nbsp;</td>
								<td  data-day="tuesday">&nbsp;&nbsp;</td>
								<td data-day="wednesday">&nbsp;&nbsp;</td>
								<td data-day="thursday">&nbsp;&nbsp;</td>
								<td data-day="friday">&nbsp;&nbsp;</td>
								<td data-day="saturday">&nbsp;&nbsp;</td>
								<td data-day="sunday">&nbsp;&nbsp;</td>
								</tr>';
						}
						?>
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<?php
	}

	public function url_params_encode() {

	}
}

new Candidate_Profile();
