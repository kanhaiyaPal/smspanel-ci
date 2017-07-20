<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
	<div class="col-md-12">
		<div class="content-box-large">
			<div class="panel-body">
			<?php if($this->session->flashdata('compose_error')){ ?>
				<div class="alert alert-danger alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<?php echo $this->session->flashdata('compose_error'); ?>
				</div>
				<?php } ?>
				<?php if($this->session->flashdata('compose_success')){ ?>
				<div class="alert alert-success alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<?php echo $this->session->flashdata('compose_success'); ?>
				</div>
				<?php } ?>
			<h1>Compose SMS</h1>
			<?php if($limit_reached): ?>
			<div class="row">
				<div class="col-md-9">
					<?php echo form_open('userdashboard/addnew_user_sms'); ?>
					<div class="row">
						<div class="col-md-12">
						Upload Contact:
						</div>
						<div class="col-md-5 radio_conta">
							<label><input type="radio" name="file_type" value="file" checked /> File Selected</label>
							<label><input type="radio" name="file_type" value="textarea" /> Copy Text File</label>
						</div>
						<div class="col-md-7">
							<div class="row" id="file_selector_contacts">
							<div class="col-md-6">Choose Existing Uploaded File : </div>
							<div class="col-md-6"><select class="form-control" required name="select_file" >
								<option value="">Please Select File</option>
								<?php foreach($files as $file): ?>
								<option value="<?php echo $file['id']; ?>"><?php echo $file['file_title']; ?></option>
								<?php endforeach; ?>
							</select></div>
							</div>
						</div>
						<div class="col-md-12"><br/></div>
						<div class="col-md-12" id="textarea_selector_contacts">
							<h2>Copy/ Paste</h2>
							<textarea placeholder="Copy Paste Contacts" cols="100" rows="5"  name="textarea_input_contacts" ></textarea>
						</div>
						<div class="col-md-12">
							<h2>Type SMS:</h2>
							<textarea name="sms_txt" cols="100" rows="5" id="sms_txt" required ></textarea>
						</div>
						<div class="col-md-4">Schedule Message: <input type="text" name="sms_schedule" required class="form-control schedule_sms" /></div>
						<div class="col-md-4">Time Slot: <select required class="form-control" name="sms_slot" id="sms_slot"><option value="10AM-2PM">10AM - 2PM</option><option value="3PM-7PM">3PM - 7PM</option></select></div>
						<div class="col-md-4">&nbsp;<input type="submit" class="btn btn-primary btn-block" value="Send SMS" /></div>
					</div>
					<?php echo form_close();?>
				</div>
				<div class="col-md-3"></div>
			</div>
			<?php else: ?>
			<div class="alert alert-warning">
				SMS Compose facility is not available for you. Possible reasons can be:
				<ul>
					<li>You don't have enough credits available to send SMS.</li>
				</ul>
			</div>
			<?php endif; ?>
			</div>
		</div>
	</div>
</div>