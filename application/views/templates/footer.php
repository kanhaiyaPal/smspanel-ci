<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="h-footer">
  <div style="width:1003px; margin:auto">
    <div style="float:right; padding-right:10px">&nbsp;</div>
    <div style="float:left; padding-left:10px">Copyrignt © 2009-2035, All rights reserved</div>
  </div>
</div>
</center>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap/bootstrap.min.js"></script>
	<?php if(($this->uri->segment(1) == 'admindashboard')||($this->uri->segment(1) == 'AdminDashboard')): ?>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.0-RC1/js/bootstrap-datepicker.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.0-RC1/css/bootstrap-datepicker.css" rel="stylesheet" />
	<script src="<?php echo base_url(); ?>assets/vendors/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/datatables/dataTables.bootstrap.js"></script>
	<script>
	$(document).ready(function() {

		$('.datepicker').datepicker({
				format: 'dd-mm-yyyy',
				startDate:new Date(),
				autoclose: true
		});
		
		$('.report_date').datepicker({
				format: 'dd-mm-yyyy',
				autoclose: true
		});
		
		$('#usertable').dataTable();
		$('#registerenquiry').dataTable();
		$('#resellertable').dataTable();
		$('#notification_table').dataTable();
		$('#smsideas_table').dataTable();
		$('#offers_table').dataTable();
		$('#usersms_table').dataTable();
		$('#balances_table').dataTable();
		
		$('#registeruser').on('shown.bs.modal', function (event) {
			  $('#register_user_form')[0].reset();
		});
		$('#edituser').on('shown.bs.modal', function (event) {
			  $('#edit_user_form')[0].reset();
			
			  var button = $(event.relatedTarget); 
			  var expiry = button.data('expiry'); 
			  var name = button.data('name'); 
			  var email = button.data('email'); 
			  var mobile = button.data('mobile'); 
			  var address = button.data('address');
			  var city = button.data('city'); 
			  var company = button.data('company'); 
			  var rm_name = button.data('rmname'); 
			  var rm_contact = button.data('rmcontact');
			  var rm_email = button.data('rmemail'); 
			  var u_id = button.data('uid');
			  var uname = button.data('username');
			  var u_pass = button.data('password');
			  var u_utype = button.data('utype');
			  var u_totalcredit = button.data('totalcredit');
			  var u_currentcredit = button.data('currentcredit');
			  
			  var modal = $(this)
			  
			  modal.find('.modal-body input#expiry').val(expiry);
			  modal.find('.modal-body input#name').val(name);
			  modal.find('.modal-body input#email').val(email);
			  modal.find('.modal-body input#mobile').val(mobile);
			  modal.find('.modal-body textarea#address').html(address);
			  modal.find('.modal-body input#city').val(city);
			  modal.find('.modal-body input#company').val(company);
			  modal.find('.modal-body input#rm_name').val(rm_name);
			  modal.find('.modal-body input#rm_contact').val(rm_contact);
			  modal.find('.modal-body input#rm_email').val(rm_email);
			  modal.find('.modal-body input#user_id').val(u_id);
			  modal.find('.modal-body input#user_name').val(uname);
			  modal.find('.modal-body input#user_pas').val(u_pass);
			  modal.find('.modal-body input#user_type').val(u_utype);
			  modal.find('.modal-body input#user_c_cr').val(u_currentcredit);
			  modal.find('.modal-body input#user_cr').val(u_totalcredit);
		});
		<?php 
			/*
			if(validation_errors() && ($this->uri->segment(2) == 'register_user')) { 
				if(set_value('enquiry_id') && (set_value('enquiry_id') != '')){
					echo "$('#register_user_enquiry').modal('show');";
				}else{ echo "$('#registeruser').modal('show');"; }
			} */
			if(validation_errors() && ($this->uri->segment(2) == 'register_user')) { echo "$('#registeruser').modal('show');"; }
		?>
		<?php if(validation_errors() && ($this->uri->segment(2)) == 'edit_user') { echo "$('#edituser').modal('show');"; } ?>
		
		$('#register_user_enquiry').on('shown.bs.modal', function (event) {
			  var button = $(event.relatedTarget); 
			  var name = button.data('name'); 
			  var mobile = button.data('mobile'); 
			  var email = button.data('email'); 
			  var address = button.data('address');
			  var sms_count = button.data('totalcredit');
			  var eid = button.data('enqid');
			  
			  var modal = $(this)
			  
			  modal.find('.modal-body input#enq_name').val(name);
			  modal.find('.modal-body textarea#enq_address').html(address);
			  modal.find('.modal-body input#enq_email').val(email);
			  modal.find('.modal-body input#enq_mobile').val(mobile);
			  modal.find('.modal-body input#enq_quant').val(sms_count);
			  modal.find('.modal-body input#enq_id').val(eid);
		});
		
		$('#showdetailusersms').on('shown.bs.modal', function (event) {
			  var button = $(event.relatedTarget); 
			  var name = button.data('name'); 
			  var sms = button.data('text'); 
			  var datetime = button.data('date'); 
			  var file = button.data('file');
			 
			  
			  var modal = $(this)
			  
			  modal.find('.modal-body input#user_name_usersms').val(name);
			  modal.find('.modal-body input#user_text_usersms').html(sms);
			  modal.find('.modal-body input#user_date_usersms').val(datetime);
			 modal.find('.modal-body a#user_date_usersms').html(file);
			 modal.find('.modal-body a#user_date_usersms').attr("href", "http://www.google.com/"+file);
		});
		
		$('#checkall').click(function() {

		  var _this = this;
		  $('td').find('input[name="mass_upd[]"]').each(function() {
		   
			if ($(_this).is(':checked')) {
			  $(this).prop('checked', true);
			} else {
			  $(this).prop('checked', false);
			}
		  });
		});
		$('#checkallres').click(function() {

		  var _this = this;
		  $('td').find('input[name="mass_updres[]"]').each(function() {
		   
			if ($(_this).is(':checked')) {
			  $(this).prop('checked', true);
			} else {
			  $(this).prop('checked', false);
			}
		  });
		});
		$('#checkallreg').click(function() {

		  var _this = this;
		  $('td').find('input[name="mass_updreg[]"]').each(function() {
		   
			if ($(_this).is(':checked')) {
			  $(this).prop('checked', true);
			} else {
			  $(this).prop('checked', false);
			}
		  });
		});
		
		$('#checkallusms').click(function() {

		  var _this = this;
		  $('td').find('input[name="mass_updusms[]"]').each(function() {
		   
			if ($(_this).is(':checked')) {
			  $(this).prop('checked', true);
			} else {
			  $(this).prop('checked', false);
			}
		  });
		});
		
	});
	
	/*Notification collapse*/
	function show_edit_collapse(anchor)
	{
		var id = $(anchor).attr("data-id"); 
		var name = $(anchor).attr("data-name"); 
		var description = $(anchor).attr("data-description"); 
		
		$('#notfy_name').val(name);
		$('#notify_id').val(id);
		$('#notfy_description').html(description);
		
		$('#editnotificationcollapse').collapse('toggle');
	}
	
	function show_smsedit_collapse(anchor)
	{
		var id = $(anchor).attr("data-id"); 
		var name = $(anchor).attr("data-name"); 
		var description = $(anchor).attr("data-description"); 
		
		$('#sms_name').val(name);
		$('#sms_id').val(id);
		$('#sms_description').html(description);
		
		$('#editsmsideacollapse').collapse('toggle');
	}
	
	function show_offeredit_collapse(anchor)
	{
		var id = $(anchor).attr("data-id"); 
		var name = $(anchor).attr("data-name"); 
		var description = $(anchor).attr("data-description"); 
		
		$('#offer_name').val(name);
		$('#offer_id').val(id);
		$('#offer_description').html(description);
		
		$('#editoffercollapse').collapse('toggle');
	}
	</script>
	<style>
	table.ed_tbl tr td{ padding:0 2px 0 2px; }
	</style>
	<?php endif; ?>

</body></html>