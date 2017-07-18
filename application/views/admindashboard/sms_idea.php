<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
	<div class="col-md-12">
		<div class="content-box-large">
			<div class="panel-body">
				<h1><span style="float:right"><a data-toggle="collapse" href="#addsmsideacollapse" aria-expanded="false" aria-controls="addsmsideacollapse" >Add SMS Idea </a></span>Manage SMS Ideas</h1>
				<?php if($this->session->flashdata('sms_errors')){ ?>
				<div class="alert alert-danger alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<?php echo $this->session->flashdata('sms_errors'); ?>
				</div>
				<?php } ?>
				<?php if($this->session->flashdata('sms_success')){ ?>
				<div class="alert alert-success alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<?php echo $this->session->flashdata('sms_success'); ?>
				</div>
				<?php } ?>
				
				<!--Add SMS Idea-->
				<div class="collapse" id="addsmsideacollapse">
				  <?php echo form_open('admindashboard/add_new_smsidea'); ?>
				  <div class="row">
					<div class="col-md-12">
						<input type="text" class="form-control" name="mixdata_name" required value="" placeholder="Name" />
					</div><div class="col-md-12"><br/></div>
					<div class="col-md-12">
						<textarea name="mixdata_description" class="form-control" required placeholder="Description" ></textarea>
					</div><div class="col-md-12"><br/></div>
					<div class="col-md-11"></div>
					<div class="col-md-1"><input class="btn btn-primary" type="submit" name="addsms" value="Add" /></div>
				  </div>
				  <?php echo form_close(); ?>
				</div>
				
				<!--Edit SMS Idea-->
				<div class="collapse" id="editsmsideacollapse">
				  <?php echo form_open('admindashboard/edit_smsidea'); ?>
				  <div class="row">
					<div class="col-md-12">
						<input type="text" class="form-control" name="mixdata_name" id="sms_name" required value="" placeholder="Name" />
					</div><div class="col-md-12"><br/></div>
					<div class="col-md-12">
						<textarea name="mixdata_description" class="form-control" id="sms_description" required placeholder="Description" ></textarea>
					</div><div class="col-md-12"><br/></div>
					<div class="col-md-11"><input type="hidden" name="sms_id" id="sms_id" value="" /></div>
					<div class="col-md-1"><input class="btn btn-primary" type="submit" name="addsms" value="Edit" /></div>
				  </div>
				  <?php echo form_close(); ?>
				</div>
				<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="smsideas_table">
					<thead>
						<tr>
							<th>Name</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach($smsideas as $item) {
								echo '<tr>';
								echo '<td>'.$item['name'].'</td>';
								echo '<td><a href="#" onclick="show_smsedit_collapse(this)" data-name="'.$item['name'].'" 
								data-description ="'.$item['description'].'" 
								data-id ="'.$item['id'].'" 
								><img src="'.base_url().'assets/images/edit.gif" alt="edit" width="12" height="12"></a> &nbsp;&nbsp;&nbsp;&nbsp;
								<a href="'.base_url().'admindashboard/delete_smsidea/'.$item['id'].'" onclick="return confirm(\'Are you Sure Want To Delete This Member Information\')" class="style1"><b><font color="#339933" size="2"><img src="'.base_url().'assets/images/del.gif" width="12" height="12" border="0" class="text12"></font></b></a>
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