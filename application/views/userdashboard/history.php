<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
	<div class="col-md-12">
		<div class="content-box-large">
			<div class="panel-body">
				<h1>SMS History</h1>
				<table class="table table-striped table-bordered">
					<tr><td>Filter By Date:</td><td><input type="text" id="filter_history_bydate" class="form-control filter_date_smshistory" value="" /></td><td colspan="5">&nbsp;</td></tr>
				</table>
				<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="smshistory_user_table">
					<thead>
						<tr>
							<th>No. of Contacts</th>
							<th>Uploaded File</th>
							<th>SMS Text</th>
							<th>Schedule Date/Time</th>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach($smsitems as $item) {
								echo '<tr>';
								echo '<td>'.$item['cont_count'].'</td>';
								echo '<td><a href="'.base_url().'uploads/contacts/'.$item['orig_file'].'">'.$item['file_name'].'</a></td>';
								echo '<td>'.$item['sms'].'</td>';
								echo '<td>'.$item['schedule'].'</td>';
								echo '</tr>';
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>