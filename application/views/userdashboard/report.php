<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
	<div class="col-md-12">
		<div class="content-box-large">
			<div class="panel-body">
				<h1>View Reports</h1>
				<?php if($this->session->flashdata('userreport_error')){ ?>
				<div class="alert alert-danger alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<?php echo $this->session->flashdata('userreport_error'); ?>
				</div>
				<?php } ?>
				<?php if($this->session->flashdata('userreport_success')){ ?>
				<div class="alert alert-success alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<?php echo $this->session->flashdata('userreport_success'); ?>
				</div>
				<?php } ?>
				
				<!--Add Contacts-->
				<div class="row">
				  <?php echo form_open('userdashboard/send_report_requistion'); ?>
				  <div class="col-md-12">
					<div class="row">
						<div class="col-md-3">
							Report Required For: 
						</div>
						<div class="col-md-3">
							<input type="text" name="report_request_period" class="form-control report_req_dt" placeholder="Select Date" required />
						</div>
						<div class="col-md-3">
							<input type="text" name="report_request_notes" class="form-control" placeholder="Note for admin" />
						</div>
						<div class="col-md-3"><input class="btn btn-primary" type="submit" name="sendreportrequest" value="Send Request" /></div>
					</div>
				  </div>
				  <?php echo form_close(); ?>
				</div>
				<div class="col-md-12"><hr/></div>
				<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="userreports_table">
					<thead>
						<tr>
							<th>Name</th>
							<th>Date</th>
							<th>File</th>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach($reports as $item) {
								echo '<tr>';
								echo '<td>'.$item['name'].'</td>';
								echo '<td>'.date('d-m-Y',strtotime($item['date'])).'</td>';
								echo '<td><a target="_blank" href="'.base_url().'uploads/reports/'.$item['file_name'].'">'.$item['file_name'].'</a></td>';
								echo '</tr>';
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>