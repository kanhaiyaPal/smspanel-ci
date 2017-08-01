<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
	<div class="col-md-12">
		<div class="content-box-large">
			<div class="panel-body">
				<h1><span style="float:right"><a data-toggle="collapse" href="#addnotificationcollapse" aria-expanded="false" aria-controls="addnotificationcollapse" >Add Notification </a></span>Manage Notification</h1>
				<?php if($this->session->flashdata('notify_errors')){ ?>
				<div class="alert alert-danger alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<?php echo $this->session->flashdata('notify_errors'); ?>
				</div>
				<?php } ?>
				<?php if($this->session->flashdata('notify_success')){ ?>
				<div class="alert alert-success alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<?php echo $this->session->flashdata('notify_success'); ?>
				</div>
				<?php } ?>
				
				<!--Add Notification-->
				<div class="collapse" id="addnotificationcollapse">
				  <?php echo form_open('admindashboard/add_new_notification'); ?>
				  <div class="row">
					<div class="col-md-12">
						<input type="text" class="form-control" name="notfy_name" required value="" placeholder="Name" />
					</div><div class="col-md-12"><br/></div>
					<div class="col-md-12">
						<textarea name="notfy_description" class="form-control" required placeholder="Description" ></textarea>
					</div><div class="col-md-12"><br/></div>
					<div class="col-md-10"></div>
					<div class="col-md-2"><input class="btn btn-primary" type="submit" name="addnotify" value="Add" /> &nbsp; <input data-toggle="collapse" href="#addnotificationcollapse" class="btn btn-default" type="button" value="Cancel" /></div>
				  </div>
				  <?php echo form_close(); ?>
				</div>
				
				<!--Edit Notification-->
				<div class="collapse" id="editnotificationcollapse">
				  <?php echo form_open('admindashboard/edit_notification'); ?>
				  <div class="row">
					<div class="col-md-12">
						<input type="text" class="form-control" name="notfy_name" id="notfy_name" required value="" placeholder="Name" />
					</div><div class="col-md-12"><br/></div>
					<div class="col-md-12">
						<textarea name="notfy_description" class="form-control" id="notfy_description" required placeholder="Description" ></textarea>
					</div><div class="col-md-12"><br/></div>
					<div class="col-md-10"><input type="hidden" name="notify_id" id="notify_id" value="" /></div>
					<div class="col-md-2"><input class="btn btn-primary" type="submit" name="addnotify" value="Edit" /> &nbsp; <input data-toggle="collapse" href="#editnotificationcollapse" class="btn btn-default" type="button" value="Cancel" /></div>
				  </div>
				  <?php echo form_close(); ?>
				</div>
				<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="notification_table">
					<thead>
						<tr>
							<th>Name</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach($notifications as $item) {
								echo '<tr>';
								echo '<td>'.$item['name'].'</td>';
								echo '<td><a href="#" onclick="show_edit_collapse(this)" data-name="'.$item['name'].'" 
								data-description ="'.$item['description'].'" 
								data-id ="'.$item['id'].'" 
								><img src="'.base_url().'assets/images/edit.gif" alt="edit" width="12" height="12"></a> &nbsp;&nbsp;&nbsp;&nbsp;
								<a href="'.base_url().'admindashboard/delete_notification/'.$item['id'].'" onclick="return confirm(\'Are you Sure Want To delete this?\')" class="style1"><b><font color="#339933" size="2"><img src="'.base_url().'assets/images/del.gif" width="12" height="12" border="0" class="text12"></font></b></a>
								</td>';
								echo '</tr>';
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>