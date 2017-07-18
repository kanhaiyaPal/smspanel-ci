<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
	<div class="col-md-12">
		<div class="content-box-large">
			<div class="panel-body">
				<h1>Update Balance</h1>
				<?php if($this->session->flashdata('balance_errors')){ ?>
				<div class="alert alert-danger alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<?php echo $this->session->flashdata('balance_errors'); ?>
				</div>
				<?php } ?>
				<?php if($this->session->flashdata('balance_success')){ ?>
				<div class="alert alert-success alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<?php echo $this->session->flashdata('balance_success'); ?>
				</div>
				<?php } ?>
				
				<!--Add Offers-->
				<div class="row">
				  <?php echo form_open('admindashboard/add_new_updbalance'); ?>
				  <div class="col-md-12">
					<div class="row">
					  <div class="col-md-4">
							<select name="balance_user_id" class="form-control" required>
								<option value="">Please Select User</option>
							<?php if(count($users) > 0): foreach($users as $user):?>
								<option value="<?=$user['id']?>"><?=$user['name']?></option>
							<?php endforeach; endif;?>
							</select>
						</div>
						<div class="col-md-4">
							<input type="text" name="balance_sms_count" pattern="\d*" class="form-control" required placeholder="Number of SMS" />
						</div>
						<div class="col-md-4"><input class="btn btn-primary" type="submit" name="addbalance" value="Add" /></div>
					</div>
				  </div>
				  <?php echo form_close(); ?>
				</div>
				<div class="col-md-12"><hr/></div>
				
				<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="balances_table">
					<thead>
						<tr>
							<th>Name</th>
							<th>Balance Updated</th>
							<th>Done By</th>
							<th>Done On</th>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach($balances as $item) {
								echo '<tr>';
								echo '<td>'.$item['name'].'</td>';
								echo '<td>'.$item['balance_updated'].'</td>';
								echo '<td>'.$item['updated_by'].'</td>';
								echo '<td>'.$item['date_added'].'</td>';
								echo '</tr>';
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>