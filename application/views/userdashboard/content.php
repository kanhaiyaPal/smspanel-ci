<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
	<div class="col-md-12">
		<div class="content-box-large">
			<div class="panel-body">
				<h1>Upload Contact <span style="color:#999999">(Only .txt   file)</span></h1>
				<?php if($this->session->flashdata('contact_error')){ ?>
				<div class="alert alert-danger alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<?php echo $this->session->flashdata('contact_error'); ?>
				</div>
				<?php } ?>
				<?php if($this->session->flashdata('contact_success')){ ?>
				<div class="alert alert-success alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<?php echo $this->session->flashdata('contact_success'); ?>
				</div>
				<?php } ?>
				
				<!--Add Contacts-->
				<div class="row">
				  <?php echo form_open_multipart('userdashboard/addnew_contact_content',array('onsubmit'=>'checkFile(event)')); ?>
				  <div class="col-md-12">
					<div class="row">
					  <div class="col-md-3">
							<input type="text" name="file_title" class="form-control" required placeholder="Name of File" />
						</div>
						<div class="col-md-3">
							<input type="file" name="contact_file" class="form-control " required />
						</div>
						<div class="col-md-3"><input class="btn btn-primary" type="submit" name="addcontacts" value="Add" /></div>
					</div>
				  </div>
				  <?php echo form_close(); ?>
				</div>
				<div class="col-md-12"><hr/></div>
				
				<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="contactsdata_table">
					<thead>
						<tr>
							<th>File Name</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach($contacts as $item) {
								echo '<tr>';
								echo '<td>'.$item['file_title'].'</td>';
								echo '<td><a href="'.base_url().'userdashboard/deletecontact_content/'.$item['id'].'"><img src="'.base_url().'assets/images/del.gif" width="12" height="12" border="0" class="text12"></a></td>';
								echo '</tr>';
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>