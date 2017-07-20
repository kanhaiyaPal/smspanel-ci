<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
	<div class="col-md-12">
		<div class="content-box-large">
			<div class="panel-body">
				<h1>SMS History</h1>
				<!--View Details-->
				<div class="collapse" id="smshistorycollapse">
				  <div class="row">
					<div class="col-md-12">
						<input type="text" class="form-control" name="template_name" id="template_name" required value="" placeholder="Name" />
					</div><div class="col-md-12"><br/></div>
					<div class="col-md-12">
						<textarea name="template_description" class="form-control" id="template_description" required placeholder="Description" ></textarea>
					</div><div class="col-md-12"><br/></div>
					<div class="col-md-10"><input type="hidden" name="template_id" id="template_id" value="" /></div>
					<div class="col-md-2"><input class="btn btn-primary" type="submit" name="edittemplate" value="Edit" /> &nbsp;<input class="btn btn-default" data-toggle="collapse" href="#edittemplatecollapse" type="button" value="Cancel" /></div>
					<div class="col-md-12"><hr/></div>
				  </div>
				</div>
				
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