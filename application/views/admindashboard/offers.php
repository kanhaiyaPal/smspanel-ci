<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
	<div class="col-md-12">
		<div class="content-box-large">
			<div class="panel-body">
				<h1><span style="float:right"><a data-toggle="collapse" href="#addoffercollapse" aria-expanded="false" aria-controls="addoffercollapse" >Add Offers </a></span>Manage Offers</h1>
				<?php if($this->session->flashdata('offer_errors')){ ?>
				<div class="alert alert-danger alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<?php echo $this->session->flashdata('offer_errors'); ?>
				</div>
				<?php } ?>
				<?php if($this->session->flashdata('offer_success')){ ?>
				<div class="alert alert-success alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<?php echo $this->session->flashdata('offer_success'); ?>
				</div>
				<?php } ?>
				
				<!--Add Offers-->
				<div class="collapse" id="addoffercollapse">
				  <?php echo form_open('admindashboard/add_new_offer'); ?>
				  <div class="row">
					<div class="col-md-12">
						<input type="text" class="form-control" name="mixdata_name" required value="" placeholder="Name" />
					</div><div class="col-md-12"><br/></div>
					<div class="col-md-12">
						<textarea name="mixdata_description" class="form-control" required placeholder="Description" ></textarea>
					</div><div class="col-md-12"><br/></div>
					<div class="col-md-11"></div>
					<div class="col-md-1"><input class="btn btn-primary" type="submit" name="addnotify" value="Add" /></div>
				  </div>
				  <?php echo form_close(); ?>
				</div>
				
				<!--Edit Offers-->
				<div class="collapse" id="editoffercollapse">
				  <?php echo form_open('admindashboard/edit_offer'); ?>
				  <div class="row">
					<div class="col-md-12">
						<input type="text" class="form-control" name="mixdata_name" id="offer_name" required value="" placeholder="Name" />
					</div><div class="col-md-12"><br/></div>
					<div class="col-md-12">
						<textarea name="mixdata_description" class="form-control" id="offer_description" required placeholder="Description" ></textarea>
					</div><div class="col-md-12"><br/></div>
					<div class="col-md-11"><input type="hidden" name="offer_id" id="offer_id" value="" /></div>
					<div class="col-md-1"><input class="btn btn-primary" type="submit" name="addnotify" value="Edit" /></div>
				  </div>
				  <?php echo form_close(); ?>
				</div>
				<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="offers_table">
					<thead>
						<tr>
							<th>Name</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach($offers as $item) {
								echo '<tr>';
								echo '<td>'.$item['name'].'</td>';
								echo '<td><a href="#" onclick="show_offeredit_collapse(this)" data-name="'.$item['name'].'" 
								data-description ="'.$item['description'].'" 
								data-id ="'.$item['id'].'" 
								><img src="'.base_url().'assets/images/edit.gif" alt="edit" width="12" height="12"></a> &nbsp;&nbsp;&nbsp;&nbsp;
								<a href="'.base_url().'admindashboard/delete_offer/'.$item['id'].'" onclick="return confirm(\'Are you Sure Want To Delete Information\')" class="style1"><b><font color="#339933" size="2"><img src="'.base_url().'assets/images/del.gif" width="12" height="12" border="0" class="text12"></font></b></a>
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