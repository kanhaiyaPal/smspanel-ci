<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="content">
	<?php if($this->session->flashdata('admindash_success')): ?>
	<div class="alert alert-success alert-dismissible" role="alert">
	 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	  </button>
	  <?php echo $this->session->flashdata('admindash_success');  ?>
	</div>
	<?php endif; ?>
	<!-- Tab panes -->
	<div class="tab-content">
	  <div class="tab-pane active" id="userlist" role="tabpanel"><?php echo $userlist; ?></div>
	  <div class="tab-pane" id="registration" role="tabpanel"><?php echo $registrations; ?></div>
	  <div class="tab-pane" id="notification" role="tabpanel"><?php echo $notification; ?></div>
	  <div class="tab-pane" id="offers" role="tabpanel"><?php echo $offers; ?></div>
	  <div class="tab-pane" id="smsidea" role="tabpanel"><?php echo $smsidea; ?></div>
	  <div class="tab-pane" id="usersms" role="tabpanel"><?php echo $usersms; ?></div>
	  <div class="tab-pane" id="updatebalance" role="tabpanel"><?php echo $update_balance; ?></div>
	  <div class="tab-pane" id="report" role="tabpanel"><?php echo $report; ?>.</div>
	  <div class="tab-pane" id="changepassword" role="tabpanel"><?php echo $changepassword; ?>.</div>
	</div>
	<!--.Tab panes -->
</div>
<div style="clear:both">&nbsp;</div>