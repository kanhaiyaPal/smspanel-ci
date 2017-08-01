<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
	<div class="col-md-12">
		<div class="content-box-large">
			<div class="panel-body">
				<h1>Change Password</h1>
				<div class="alert alert-warning alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					You will be logged out once you submit this form.
				</div>
				<!--Change Password-->
				<div class="row">
				  <?php echo form_open('admindashboard/changeadmin_password'); ?>
				  <div class="col-md-12">
					<div class="row">
					    <div class="col-md-3">
							<input type="text" name="new_password" class="form-control" required placeholder="Set New Password" />
						</div>
						<div class="col-md-3"><input class="btn btn-primary" type="submit" name="chagepass" value="Change" /></div>
					</div>
				  </div>
				  <?php echo form_close(); ?>
				</div>
				<div class="col-md-12"><hr/></div>
					
			</div>
		</div>
	</div>
</div>