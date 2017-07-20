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
	<script src="<?php echo base_url(); ?>assets/vendors/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/datatables/dataTables.bootstrap.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.0-RC1/js/bootstrap-datepicker.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.0-RC1/css/bootstrap-datepicker.css" rel="stylesheet" />
	
	<?php if(strtolower($this->uri->segment(1)) == 'userdashboard'): ?>
	<script src="<?php echo base_url(); ?>assets/vendors/jqcounter/jquery.jqEasyCharCounter.min.js"></script>
	<script>
	$(document).ready(function() {
		
		$('#templates_table').dataTable({ "bFilter": false });
		$('#contactsdata_table').dataTable({ "bFilter": false });
		$('#smshistory_user_table').dataTable();
		$('#userreports_table').dataTable();
		
		<?php 
			if(isset($unreads)):
			foreach($unreads as $unread):
		?>
		$('#collapse<?php echo $unread?>').on('shown.bs.collapse', function () {
			$.ajax({
				url: '<?php echo base_url() ?>userdashboard/index/notification/<?php echo $unread?>',
				type: 'get',
				success: function (data) {
					if(data == '1'){ 
						var n_c = $('#notification').html();
						if(parseInt(n_c)>0){
							var nw_c = parseInt(n_c)-1;
							$('#notification').html('');
							$('#notification').html(nw_c);
						}
						$('#heading<?php echo $unread?>').find('span.badge').remove();
					}else{ alert('err'); }
				}
			});
		});
		<?php endforeach; endif; ?>
		
		$('input[name="contact_file"]').change(function () {
			var val = $(this).val().toLowerCase();
			var regex = new RegExp("(.*?)\.(txt)$");
			if(!(regex.test(val))) {
				$(this).val('');
				alert('Please select correct file format');
			} 
		});
		
		$('#sms_txt').jqEasyCounter({
			'maxChars': 160,
			'maxCharsWarning': 150,
			'msgFontSize': '12px',
			'msgFontColor': '#000',
			'msgFontFamily': 'Verdana',
			'msgTextAlign': 'left',
			'msgWarningColor': '#F00',
			'msgAppendMethod': 'insertBefore'				
		});
		
		$('#textarea_selector_contacts').hide();
		$('div.radio_conta input').change(function(){
			var option = $(this).val();
			if(option == 'textarea'){
				$('#textarea_selector_contacts').show();
				$("textarea[name='textarea_input_contacts']").prop('required',true);
				$('#file_selector_contacts').hide();
				$("select[name='select_file']").prop('required',false);
			}
			if(option == 'file'){
				$('#textarea_selector_contacts').hide();
				$("textarea[name='textarea_input_contacts']").prop('required',false);
				$('#file_selector_contacts').show();
				$("select[name='select_file']").prop('required',true);
			}
		});
		
		$('.report_req_dt').datepicker({
			endDate:new Date(),
			format: 'dd-mm-yyyy',
			autoclose: true
		});
		
		var start_bt_date = '';
		var dt = new Date();
		var cur_hrs = dt.getHours();
		if(cur_hrs < 15){ start_bt_date = new Date(); }else{ start_bt_date='+1d' }

		$('.schedule_sms').datepicker({
				startDate:start_bt_date,
				format: 'dd-mm-yyyy',
				autoclose: true
		}).on('changeDate', function (selected) {
			var minDate = new Date(selected.date.valueOf());
			var today = new Date();
			today.setHours(0, 0, 0, 0);
			if(today.getTime() === minDate.getTime()){ 
				remove_morning_slot(1);
			}else{
				remove_morning_slot(0);
			}
		});

	});
	
	function remove_morning_slot(is_change)
	{
		var time_slots = '<option value="10AM-2PM">10AM - 2PM</option><option value="3PM-7PM">3PM - 7PM</option>';
		var evening_slot = '<option value="3PM-7PM">3PM - 7PM</option>';
		if(is_change){
			$('#sms_slot').html('');
			$('#sms_slot').html(evening_slot);
		}else{
			$('#sms_slot').html('');
			$('#sms_slot').html(time_slots);
		}
		
	}
	
	function show_edittemplate_collapse(anchor)
	{
		var id = $(anchor).attr("data-id"); 
		var name = $(anchor).attr("data-name"); 
		var description = $(anchor).attr("data-description"); 
		
		$('#template_name').val(name);
		$('#template_id').val(id);
		$('#template_description').html(description);
		
		$('#edittemplatecollapse').collapse('toggle');
	}
	
	function use_sms_content(content)
	{
		$('.nav-tabs a[href="#composesms"]').tab('show');
		$('textarea#sms_txt').val('');
		$('textarea#sms_txt').val(content);
	}
	</script>
	<style>
	.table-condensed>tbody>tr>td,.table-condensed>thead>tr>th{ color:#000; }
	</style> 
	<?php endif; ?>
	<?php if(strtolower($this->uri->segment(1)) == 'admindashboard'): ?>
	
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
		$('#reports_table').dataTable();
		
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
			  var sms = button.data('smstext'); 
			  var datetime = button.data('date'); 
			  var file = button.data('file');
			  var filepath = button.data('filename');
			 
			  
			  var modal = $(this)
			  
			  modal.find('.modal-body input#user_name_usersms').val(name);
			  modal.find('.modal-body textarea#user_text_usersms').val(sms);
			  modal.find('.modal-body input#user_date_usersms').val(datetime);
			 modal.find('.modal-body a#user_file_usersms').html(file);
			 modal.find('.modal-body a#user_file_usersms').attr("href",'<?php echo base_url().'uploads/contacts/'; ?>'+filepath);
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
		
		$('input[name="report_file"]').change(function () {
			var val = $(this).val().toLowerCase();
			var regex = new RegExp("(.*?)\.(xls|xlsx|csv)$");
			if(!(regex.test(val))) {
				$(this).val('');
				alert('Please select correct file format');
			} 
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