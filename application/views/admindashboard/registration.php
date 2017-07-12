<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
	<div class="col-md-12">
		<div class="content-box-large">
			<div class="panel-body">
				<h1>Registration:</h1>
				<?php echo form_open('admindashboard/delete_bulk_enquiry'); ?>
				<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="registerenquiry">
					<thead>
						<tr>
							<th>Name</th>
							<th>Mobile</th>
							<th>Email</th>
							<th>SMS Quantity</th>
							<th>Address</th>
							<th>Date Added</th>
							<th>Actions <input type="checkbox" id="checkallreg"  /></th>
						</tr>
					</thead>
					<tbody>
						<?php 
							if ($entries){ 
								foreach ($entries as $item) {
									echo '<tr>';
									echo '<td>'.$item['name'].'</td>';
									echo '<td>'.$item['mobile'].'</td>';
									echo '<td>'.$item['email'].'</td>';
									echo '<td>'.$item['sms_count'].'</td>';
									echo '<td>'.$item['address'].'</td>';
									echo '<td>'.date('d-m-Y',strtotime($item['date_added'])).'</td>';
									echo '<td><table class="ed_tbl"><tr>';
									echo '<td><a href="#" class="__web-inspector-hide-shortcut__" data-toggle="modal" data-target="#register_user_enquiry" 
											data-name="'.$item['name'].'"
											data-email="'.$item['email'].'"
											data-mobile="'.$item['mobile'].'"
											data-address="'.$item['address'].'"
											data-totalcredit = "'.$item['sms_count'].'"
											data-enqid = "'.$item['id'].'"
									><b><font color="#339933" size="2"><img src="'.base_url().'assets/images/icon-activate.gif" width="12" height="12" border="0" class="text12"></font></b></a></td>
									<td><a href="'.base_url().'admindashboard/delete_enquiry/'.$item['id'].'" onclick="return confirm(\'Are you Sure Want To Delete This Enquiry\')" class="style1"><b><font color="#339933" size="2"><img src="'.base_url().'assets/images/del.gif" width="12" height="12" border="0" class="text12"></font></b></a></td>
									<td><input type="checkbox" name="mass_updreg[]" id="checkbox[]" value="'.$item['id'].'"></td>';
									echo '</tr></table></td>';
									echo '</tr>';
								}
							}
						?>
					</tbody>
				</table>
				<div class="row">
					<div class="col-md-10"></div>
					<div class="col-md-2"><input class="btn btn-danger" type="submit" name="deactivate" value="Delete Selected" /></div>
				</div>
				<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>
	<!-- Register New User Modal -->
<div class="modal fade" id="register_user_enquiry" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="register_user_enquiry">Register New User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	   <?php if(validation_errors() && ($this->uri->segment(2) == 'register_user')){
	   echo '<div class="alert alert-danger">'.validation_errors().'</div>'; 
	   } ?>
       <?php echo form_open('admindashboard/register_user', array('id' => 'register_enquiry_form')); ?>
		<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tbl1">
          <tr>
            <td width="10%" height="35" align="right" valign="middle">User / Reseller</td>
            <td width="1%" align="center" valign="middle">:</td>
            <td width="38%" align="left" valign="middle"> <select required name="u_type" size="1" class="sel-box1" id="u_type">
                       <option value="" >Select  User</option>
					  <option value="3" <?php echo  set_select('u_type', '3'); ?>>User</option>
                      <option value="2" <?php echo  set_select('u_type', '2'); ?>>Reseller</option>
                      </select>			    
			</td>
            <td width="19%" align="right" valign="middle">RM Email id </td>
            <td width="1%" align="center" valign="middle">:</td>
            <td width="31%" align="left" valign="middle"><input required name="remail" type="email" class="textfield1" value="<?php echo set_value('remail'); ?>"></td>
		  </tr>
		  
		  <tr>
            <td width="10%" align="right" valign="middle">Client  Name</td>
            <td width="1%" align="center" valign="middle">:</td>
            <td width="38%" align="left" valign="middle"><input required name="name" type="text" id="enq_name" class="textfield1" value="<?php echo set_value('name'); ?>"></td>
            <td width="19%" align="right" valign="middle">Relationship Manager</td>
            <td width="1%" align="center" valign="middle">:</td>
            <td width="31%" align="left" valign="middle"><input required name="rmanager" type="text" class="textfield1" value="<?php echo set_value('rmanager'); ?>"></td>
		  </tr>
          
          <tr>
            <td align="right" valign="middle">Username</td>
            <td align="center" valign="middle">:</td>
            <td align="left" valign="middle"><input required name="username" type="text" class="textfield1" value="<?php echo set_value('username'); ?>"></td>
            <td align="right" valign="middle">R.M. Number </td>
            <td align="center" valign="middle">:</td>
            <td align="left" valign="middle"><input required name="rmnumber" type="text" pattern="\d{10}" class="textfield1" value="<?php echo set_value('rmnumber'); ?>"></td>
          </tr>
          
          
          <tr>
            <td align="right" valign="top">Password</td>
            <td align="center" valign="top">:</td>
            <td align="left" valign="top"><input required name="password" type="text" class="textfield1" value=""></td>
            <td rowspan="2" align="right" valign="top">Client  Address </td>
            <td align="center" valign="top">:</td>
            <td rowspan="2" align="left" valign="middle"><textarea required id="enq_address" name="rmaddress" class="textarea2" ><?php echo set_value('rmaddress'); ?></textarea></td>
          </tr>
          

          <tr>
            <td align="right" valign="middle">Client Mobile</td>
            <td align="center" valign="middle">:</td>
            <td align="left" valign="middle"><input name="mobile" required type="text" id="enq_mobile" pattern="\d{10}" class="textfield1" value="<?php echo set_value('mobile'); ?>"></td>
            <td align="center" valign="middle">&nbsp;</td>
            </tr>
          <tr>
            <td align="right">Add Credit </td>
            <td align="center" valign="middle">:</td>
            <td align="left" valign="middle"><input name="smsCredit" required id="enq_quant" type="text" pattern ="\d*" class="textfield1" value="<?php echo set_value('smsCredit'); ?>"></td>
            <td align="right" valign="middle">Client City</td>
            <td align="center" valign="middle">:</td>
            <td align="left" valign="middle"><input name="rmcity" required type="text" class="textfield1" value="<?php echo set_value('rmcity'); ?>"></td>
          </tr>
          
          
          <tr>
            <td align="right">User Email Id </td>
            <td align="center" valign="middle">:</td>
            <td align="left" valign="middle"><input required name="uemail" id="enq_email" type="email" class="textfield1" value="<?php echo set_value('uemail'); ?>"></td>
            <td align="right" valign="middle">Client Company Name</td>
            <td align="center" valign="middle">:</td>
            <td align="left" valign="middle"><input required name="rmcopmany" type="text" class="textfield1" value="<?php echo set_value('rmcopmany'); ?>"></td>
          </tr>
          

          <tr>
            <td align="right" valign="middle">Expiry Date </td>
            <td align="center" valign="middle">:</td>
            <td align="left" valign="middle">
             <input style="margin:0" required type="text" name="expiry_date" class="form-control datepicker" value="<?=set_value('expiry_date')?>" >						     
			</td>
            <td align="left" valign="middle"><input type="hidden" name="enquiry_id" id="enq_id" value="<?=set_value('enquiry_id')?>" />&nbsp;</td>
            <td align="left" valign="middle">&nbsp;</td>
          </tr>
          
          <tr>
            <td><label></label></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
	   
      </div>
      <div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="save" class="btn btn-primary">Save changes</button>
      </div>
	  </form>
    </div>
  </div>
</div>