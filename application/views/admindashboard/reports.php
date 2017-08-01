<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
	<div class="col-md-12">
		<div class="content-box-large">
			<div class="panel-body">
				<h1>Add Report</h1>
				<?php if($this->session->flashdata('report_errors')){ ?>
				<div class="alert alert-danger alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<?php echo $this->session->flashdata('report_errors'); ?>
				</div>
				<?php } ?>
				<?php if($this->session->flashdata('report_success')){ ?>
				<div class="alert alert-success alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<?php echo $this->session->flashdata('report_success'); ?>
				</div>
				<?php } ?>
				
				<!--Add Offers-->
				<div class="row">
				  <?php echo form_open_multipart('admindashboard/addnew_report',array('onsubmit'=>'checkFile(event)')); ?>
				  <div class="col-md-12">
					<div class="row">
					  <div class="col-md-3">
							<select name="report_user_id" class="form-control" required>
								<option value="">Please Select User</option>
							<?php if(count($users) > 0): foreach($users as $user):?>
								<option value="<?=$user['id']?>"><?=$user['name']?></option>
							<?php endforeach; endif;?>
							</select>
						</div>
						<div class="col-md-3">
							<input type="text" name="report_date" class="form-control report_date" required placeholder="Date of Report" />
						</div>
						<div class="col-md-3">
							<input type="file" name="report_file" class="form-control" required />
						</div>
						<div class="col-md-3"><input class="btn btn-primary" type="submit" name="addreport" value="Add" /></div>
					</div>
				  </div>
				  <?php echo form_close(); ?>
				</div>
				<div class="col-md-12"><hr/></div>
				
				<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="reports_table">
					<thead>
						<tr>
							<th>Name</th>
							<th>Date</th>
							<th>File</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach($reports as $item) {
								echo '<tr>';
								echo '<td>'.$item['name'].'</td>';
								echo '<td>'.date('d-m-Y',strtotime($item['date'])).'</td>';
								echo '<td><a target="_blank" href="'.base_url().'uploads/reports/'.$item['file_name'].'">'.$item['file_name'].'</a></td>';
								echo '<td><a href="'.base_url().'admindashboard/delete_reportgen/'.$item['id'].'"><img src="'.base_url().'assets/images/del.gif" width="12" height="12" border="0" class="text12"></a></td>';
								echo '</tr>';
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>