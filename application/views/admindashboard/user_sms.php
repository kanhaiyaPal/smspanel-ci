<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
	<div class="col-md-12">
		<div class="content-box-large">
			<div class="panel-body">
				<h1>Manage User SMS</h1>
				<?php if($this->session->flashdata('usersms_success')){ ?>
				<div class="alert alert-success alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<?php echo $this->session->flashdata('usersms_success'); ?>
				</div>
				<?php } ?>
				<table class="table table-striped table-bordered">
					<tr>
						<td>Filter By User</td>
						<td>
							<select class="form-control" id="admin_filter_username">
								<option value="">Please Select User</option>
								<?php foreach($users_st as $user):?>
								<option value="<?php echo $user['name']; ?>"><?php echo $user['name']; ?></option>
								<?php endforeach; ?>
							</select>
						</td>
						<td>Filter By Date:</td>
						<td><input type="text" id="admin_filter_bydate" class="form-control filter_date_smshistory" value="" /></td>
						<td><input type="button" onclick="clear_filters_usersms()" class="btn btn-primary" value="Clear" /> </td>
					</tr>
				</table>
				<?php echo form_open('admindashboard/delete_bulk_usersms'); ?>				
				<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="usersms_table">
					<thead>
						<tr>
							<th>Name</th>
							<th>SMS Text</th>
							<th>Schedule Date/Time</th>
							<th>Contact File</th>
							<th>Actions &nbsp;&nbsp;&nbsp; <input type="checkbox" name="checkall" id="checkallusms" value="check all" /></th>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach($smsdata as $item) {
								echo '<tr>';
								echo '<td>'.$item['name'].'</td>';
								echo '<td>'.$item['text'].'</td>';
								echo '<td>'.$item['date_time'].'</td>';
								echo '<td><a target="_blank" href="'.base_url().'uploads/contacts/'.$item['org_file'].'">'.$item['file_title'].'</a></td>';
								echo '<td><a href="#" data-toggle="modal" data-target="#showdetailusersms" 
								data-name="'.$item['name'].'" 
								data-smstext ="'.$item['text'].'" 
								data-date ="'.$item['date_time'].'" 
								data-file ="'.$item['file_title'].'"
								data-filename ="'.$item['org_file'].'"
								><img src="'.base_url().'assets/images/view.gif" alt="view" width="12" height="12"></a> &nbsp;&nbsp;&nbsp;&nbsp;
								<a href="'.base_url().'admindashboard/delete_usersms/'.$item['id'].'" onclick="return confirm(\'Are you Sure Want To Delete?\')" class="style1"><b><font color="#339933" size="2"><img src="'.base_url().'assets/images/del.gif" width="12" height="12" border="0" class="text12"></font></b></a> &nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="mass_updusms[]" id="checkbox[]" value="'.$item['id'].'">
								</td>';
								echo '</tr>';
							}
						?>
					</tbody>
				</table>
				<div class="row">
					<div class="col-md-10"></div>
					<div class="col-md-2"><input class="btn btn-danger" type="submit" name="deactivaters" value="Delete Selected" /></div>
				</div>
			  <?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
<!--Show Detail of User SMS Modal-->
<div class="modal fade" id="showdetailusersms" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="showdetailusersms">Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<div class="row">
			<div class="col-md-4">Name :</div><div class="col-md-6"><input class="form-control" type="text" disabled value="" id="user_name_usersms" /></div>
			<div class="col-md-4">Text :</div><div class="col-md-6"><textarea class="form-control" disabled id="user_text_usersms" /></textarea></div>
			<div class="col-md-4">Date/Time :</div><div class="col-md-6"><input class="form-control" type="text" disabled value="" id="user_date_usersms" /></div>
			<div class="col-md-4">Contact File :</div><div class="col-md-6"><a id="user_file_usersms" href="" target="_blank"></a></div>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
	  </form>
    </div>
  </div>
</div>