<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
	<div class="col-md-12">
		<div class="content-box-large">
			<div class="panel-body">
				<?php if($this->session->flashdata('template_errors')){ ?>
				<div class="alert alert-danger alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<?php echo $this->session->flashdata('template_errors'); ?>
				</div>
				<?php } ?>
				<?php if($this->session->flashdata('template_success')){ ?>
				<div class="alert alert-success alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<?php echo $this->session->flashdata('template_success'); ?>
				</div>
				<?php } ?>
				<h1>Manage Templates</h1>
				<div class="link-group1">
					<a data-toggle="collapse" href="#addtemplatecollapse" aria-expanded="false" >Add New </a>
				</div>		
				<!--Add Template-->
				<div class="collapse" id="addtemplatecollapse">
				  <?php echo form_open('userdashboard/add_new_template'); ?>
				  <div class="row">
					<div class="col-md-12">
						<input type="text" class="form-control" name="template_name" required value="" placeholder="Name" />
					</div><div class="col-md-12"><br/></div>
					<div class="col-md-12">
						<textarea name="template_description" class="form-control" required placeholder="Description" ></textarea>
					</div><div class="col-md-12"><br/></div>
					<div class="col-md-10"></div>
					<div class="col-md-2"><input class="btn btn-primary" type="submit" name="addtemplate" value="Add" /> &nbsp;<input class="btn btn-default" data-toggle="collapse" href="#addtemplatecollapse" type="button" value="Cancel" /></div>
				  </div>
				  <?php echo form_close(); ?>
				</div>
				
				<!--Edit Notification-->
				<div class="collapse" id="edittemplatecollapse">
				  <?php echo form_open('userdashboard/edit_template'); ?>
				  <div class="row">
					<div class="col-md-12">
						<input type="text" class="form-control" name="template_name" id="template_name" required value="" placeholder="Name" />
					</div><div class="col-md-12"><br/></div>
					<div class="col-md-12">
						<textarea name="template_description" class="form-control" id="template_description" required placeholder="Description" ></textarea>
					</div><div class="col-md-12"><br/></div>
					<div class="col-md-10"><input type="hidden" name="template_id" id="template_id" value="" /></div>
					<div class="col-md-2"><input class="btn btn-primary" type="submit" name="edittemplate" value="Edit" /> &nbsp;<input class="btn btn-default" data-toggle="collapse" href="#edittemplatecollapse" type="button" value="Cancel" /></div>
				  </div>
				  <?php echo form_close(); ?>
				</div>
				<div class="col-md-12"><hr/></div>
				<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="templates_table">
					<thead>
						<tr>
							<th>Name</th>
							<th>Description</th>
							<th>Edit</th>
							<th>Delete</th>
							<th>Use As SMS</th>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach($templates as $item) {
								echo '<tr>';
								echo '<td>'.$item['name'].'</td>';
								echo '<td>'.$item['description'].'</td>';
								echo '<td><a href="#" onclick="show_edittemplate_collapse(this)" data-name="'.$item['name'].'" data-description ="'.$item['description'].'" data-id ="'.$item['id'].'" ><img src="'.base_url().'assets/images/edit.gif" alt="edit" width="12" height="12"></a></td>';
								echo '<td><a href="'.base_url().'userdashboard/delete_template/'.$item['id'].'" onclick="return confirm(\'Are you Sure Want To Delete This Template\')" class="style1"><b><font color="#339933" size="2"><img src="'.base_url().'assets/images/del.gif" width="12" height="12" border="0" class="text12"></font></b></a></td>';
								echo '<td><a href="#" onclick="use_sms_content(\''.$item['description'].'\')" data-name="'.$item['name'].'" data-description ="'.$item['description'].'" data-id ="'.$item['id'].'" ><img src="'.base_url().'assets/images/edit.gif" alt="edit" width="12" height="12"></a></td>';
								echo '</tr>';
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>