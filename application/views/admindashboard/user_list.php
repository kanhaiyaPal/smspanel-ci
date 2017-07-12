<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
	<div class="col-md-12">
		<div class="content-box-large">
			<div class="panel-body">
				<h1><span style="float:right"><a data-toggle="modal" data-target="#registeruser" href="#">Add User </a></span>User List</h1>
				<?php echo form_open('admindashboard/changestatus'); ?>
				<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="usertable">
					<thead>
						<tr>
							<th>Seller</th>
							<th>Name</th>
							<th>Username</th>
							<th>Credit Given</th>
							<th>Remaining Credit</th>
							<th>Expiry</th>
							<th>Actions <input type="checkbox" name="checkall" id="checkall" value="check all" /></th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$icon_sh = '';
							$new_val = '';
							if ($users){ 
								foreach ($users as $item) {
									echo '<tr>';
									echo '<td>'.$item['rm_name'].'</td>';
									echo '<td>'.$item['name'].'</td>';
									echo '<td>'.$item['username'].'</td>';
									echo '<td>'.$item['total_credits'].'</td>';
									echo '<td>'.$item['current_credits'].'</td>';
									echo '<td>'.$item['expiry_date'].'</td>';
									echo '<td>';
									if($item['status'] == '1'){
										$icon_sh = 'icon-activate';
										$new_val = '0';
									}else{
										$icon_sh = 'icon-acl-add';
										$new_val = '1';
									}
									echo '<table class="ed_tbl"><tr><td><a href="#" class="__web-inspector-hide-shortcut__" data-toggle="modal" data-target="#edituser" 
											data-uid = "'.$item['id'].'"
											data-expiry="'.$item['expiry_date'].'"
											data-name="'.$item['name'].'"
											data-email="'.$item['email'].'"
											data-mobile="'.$item['mobile'].'"
											data-address="'.$item['address'].'"
											data-city="'.$item['city'].'"
											data-company="'.$item['company'].'"
											data-rmname="'.$item['rm_name'].'"
											data-rmcontact="'.$item['rm_contact'].'"
											data-rmemail="'.$item['rm_email'].'"
											data-username = "'.$item['username'].'"
											data-password = "'.$item['password'].'"
											data-utype = "'.$item['user_type'].'"
											data-totalcredit = "'.$item['total_credits'].'"
											data-currentcredit = "'.$item['current_credits'].'"
									><img src="'.base_url().'assets/images/edit.gif" alt="edit" width="12" height="12"></a></td>
									<td><a href="'.base_url().'admindashboard/delete_user/'.$item['id'].'" onclick="return confirm(\'Are you Sure Want To Delete This Member Information\')" class="style1"><b><font color="#339933" size="2"><img src="'.base_url().'assets/images/del.gif" width="12" height="12" border="0" class="text12"></font></b></a></td>
									<td><a href="'.base_url().'admindashboard/change_status/'.$item['id'].'/'.$new_val.'"><b><img src="'.base_url().'assets/images/'.$icon_sh.'.gif" width="12" height="12" border="0" class="text12"></b></a></td>
									<td><input type="checkbox" name="mass_upd[]" id="checkbox[]" value="'.$item['id'].'"></td>
									</tr></table>';
									echo '</td>';
									echo '</tr>';
								}
							}
						?>
					</tbody>
				</table>
				<div class="row">
					<div class="col-md-8"></div>
					<div class="col-md-2"><input class="btn btn-primary" type="submit" name="activate" value="Activate Selected" /></div>
					<div class="col-md-2"><input class="btn btn-danger" type="submit" name="deactivate" value="Deactivate Selected" /></div>
				</div>
				<?php echo form_close(); ?>
				<div class="row"><div class="col-md-12"><hr/></div></div>
				<h1><span style="float:right"><a data-toggle="modal" data-target="#registeruser" href="#">Add Re Seller </a></span>Reseller List</h1>
				<?php echo form_open('admindashboard/changestatus'); ?>
				<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="resellertable">
					<thead>
						<tr>
							<th>Re-Seller</th>
							<th>Username</th>
							<th>Credit Given</th>
							<th>Remaining Credit</th>
							<th>Expiry</th>
							<th>Actions <input type="checkbox" name="checkall" id="checkallres" value="check all" /></th>
						</tr>
					</thead>
					<tbody>
						<?php 
							if ($resellers){ 
								foreach ($resellers as $item) {
									echo '<tr>';
									echo '<td>'.$item['name'].'</td>';
									echo '<td>'.$item['username'].'</td>';
									echo '<td>'.$item['total_credits'].'</td>';
									echo '<td>'.$item['current_credits'].'</td>';
									echo '<td>'.$item['expiry_date'].'</td>';
									echo '<td>';
									if($item['status'] == '1'){
										$icon_sh = 'icon-activate';
										$new_val = '0';
									}else{
										$icon_sh = 'icon-acl-add';
										$new_val = '1';
									}
									echo '<table class="ed_tbl"><tr><td><a href="#" class="__web-inspector-hide-shortcut__" data-toggle="modal" data-target="#edituser" 
											data-uid = "'.$item['id'].'"
											data-expiry="'.$item['expiry_date'].'"
											data-name="'.$item['name'].'"
											data-email="'.$item['email'].'"
											data-mobile="'.$item['mobile'].'"
											data-address="'.$item['address'].'"
											data-city="'.$item['city'].'"
											data-company="'.$item['company'].'"
											data-rmname="'.$item['rm_name'].'"
											data-rmcontact="'.$item['rm_contact'].'"
											data-rmemail="'.$item['rm_email'].'"
											data-username = "'.$item['username'].'"
											data-password = "'.$item['password'].'"
											data-utype = "'.$item['user_type'].'"
											data-totalcredit = "'.$item['total_credits'].'"
											data-currentcredit = "'.$item['current_credits'].'"
									><img src="'.base_url().'assets/images/edit.gif" alt="edit" width="12" height="12"></a></td>
									<td><a href="'.base_url().'admindashboard/delete_user/'.$item['id'].'" onclick="return confirm(\'Are you Sure Want To Delete This Member Information\')" class="style1"><b><font color="#339933" size="2"><img src="'.base_url().'assets/images/del.gif" width="12" height="12" border="0" class="text12"></font></b></a></td>
									<td><a href="'.base_url().'admindashboard/change_status/'.$item['id'].'/'.$new_val.'"><b><img src="'.base_url().'assets/images/'.$icon_sh.'.gif" width="12" height="12" border="0" class="text12"></b></a></td>
									<td><input type="checkbox" name="mass_updres[]" id="checkbox[]" value="'.$item['id'].'"></td>
									</tr></table>';
									echo '</td>';
									echo '</tr>';
								}
							}
						?>
					</tbody>
				</table>
				<div class="row">
					<div class="col-md-8"></div>
					<div class="col-md-2"><input class="btn btn-primary" type="submit" name="activaters" value="Activate Selected" /></div>
					<div class="col-md-2"><input class="btn btn-danger" type="submit" name="deactivaters" value="Deactivate Selected" /></div>
				</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
<!-- Register New User Modal -->
<div class="modal fade" id="registeruser" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="registeruser">Register New User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	   <?php if(validation_errors() && ($this->uri->segment(2) == 'register_user')){
	   echo '<div class="alert alert-danger">'.validation_errors().'</div>'; 
	   } ?>
       <?php echo form_open('admindashboard/register_user', array('id' => 'register_user_form')); ?>
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
            <td width="31%" align="left" valign="middle"><input required name="remail" type="email" class="textfield1" id="remail" value="<?php echo set_value('remail'); ?>"></td>
		  </tr>
		  
		  <tr>
            <td width="10%" align="right" valign="middle">Client  Name</td>
            <td width="1%" align="center" valign="middle">:</td>
            <td width="38%" align="left" valign="middle"><input required name="name" type="text" class="textfield1" id="textfield" value="<?php echo set_value('name'); ?>"></td>
            <td width="19%" align="right" valign="middle">Relationship Manager</td>
            <td width="1%" align="center" valign="middle">:</td>
            <td width="31%" align="left" valign="middle"><input required name="rmanager" type="text" class="textfield1" id="rmanager" value="<?php echo set_value('rmanager'); ?>"></td>
		  </tr>
          
          <tr>
            <td align="right" valign="middle">Username</td>
            <td align="center" valign="middle">:</td>
            <td align="left" valign="middle"><input required name="username" type="text" class="textfield1" value="<?php echo set_value('username'); ?>"></td>
            <td align="right" valign="middle">R.M. Number </td>
            <td align="center" valign="middle">:</td>
            <td align="left" valign="middle"><input required name="rmnumber" type="text" pattern="\d{10}" class="textfield1" id="rmnumber" value="<?php echo set_value('rmnumber'); ?>"></td>
          </tr>
          
          
          <tr>
            <td align="right" valign="top">Password</td>
            <td align="center" valign="top">:</td>
            <td align="left" valign="top"><input required name="password" type="text" class="textfield1" value=""></td>
            <td rowspan="2" align="right" valign="top">Client  Address </td>
            <td align="center" valign="top">:</td>
            <td rowspan="2" align="left" valign="middle"><textarea required name="rmaddress" class="textarea2" id="rmaddress"><?php echo set_value('rmaddress'); ?></textarea></td>
          </tr>
          

          <tr>
            <td align="right" valign="middle">Client Mobile</td>
            <td align="center" valign="middle">:</td>
            <td align="left" valign="middle"><input name="mobile" required type="text" pattern="\d{10}" class="textfield1" value="<?php echo set_value('mobile'); ?>"></td>
            <td align="center" valign="middle">&nbsp;</td>
            </tr>
          <tr>
            <td align="right">Add Credit </td>
            <td align="center" valign="middle">:</td>
            <td align="left" valign="middle"><input name="smsCredit" required type="text" pattern ="\d*" class="textfield1" value="<?php echo set_value('smsCredit'); ?>"></td>
            <td align="right" valign="middle">Client City</td>
            <td align="center" valign="middle">:</td>
            <td align="left" valign="middle"><input name="rmcity" required type="text" class="textfield1" id="rmcity" value="<?php echo set_value('rmcity'); ?>"></td>
          </tr>
          
          
          <tr>
            <td align="right">User Email Id </td>
            <td align="center" valign="middle">:</td>
            <td align="left" valign="middle"><input required name="uemail" type="email" class="textfield1" id="uemail" value="<?php echo set_value('uemail'); ?>"></td>
            <td align="right" valign="middle">Client Company Name</td>
            <td align="center" valign="middle">:</td>
            <td align="left" valign="middle"><input required name="rmcopmany" type="text" class="textfield1" id="rmcopmany" value="<?php echo set_value('rmcopmany'); ?>"></td>
          </tr>
          

          <tr>
            <td align="right" valign="middle">Expiry Date </td>
            <td align="center" valign="middle">:</td>
            <td align="left" valign="middle">
             <input style="margin:0" required type="text" name="expiry_date" class="form-control datepicker" value="<?=set_value('expiry_date')?>" >						     
			</td>
            <td align="left" valign="middle">&nbsp;</td>
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
<!-- Edit User Modal -->
<div class="modal fade" id="edituser" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edituser">EditUser</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	   <?php if(validation_errors() && ($this->uri->segment(2) == 'edit_user')){
	   echo '<div class="alert alert-danger">'.validation_errors().'</div>'; 
	   } ?>
       <?php echo form_open('admindashboard/edit_user', array('id' => 'edit_user_form')); ?>
		<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tbl1">
          <tr>
            <td width="19%" align="right" valign="middle">RM Email id </td>
            <td width="1%" align="center" valign="middle">:</td>
            <td width="31%" align="left" valign="middle"><input required name="remail" type="email" class="textfield1" id="rm_email" value="<?php echo set_value('remail'); ?>"></td>
		  </tr>
		  
		  <tr>
            <td width="10%" align="right" valign="middle">Client  Name</td>
            <td width="1%" align="center" valign="middle">:</td>
            <td width="38%" align="left" valign="middle"><input required name="name" type="text" class="textfield1" id="name" value="<?php echo set_value('name'); ?>"></td>
            <td width="19%" align="right" valign="middle">Relationship Manager</td>
            <td width="1%" align="center" valign="middle">:</td>
            <td width="31%" align="left" valign="middle"><input required name="rmanager" type="text" class="textfield1" id="rm_name" value="<?php echo set_value('rmanager'); ?>"></td>
		  </tr>
          
          <tr>
            <td align="right" valign="middle">R.M. Number </td>
            <td align="center" valign="middle">:</td>
            <td align="left" valign="middle"><input required name="rmnumber" type="text" pattern="\d{10}" class="textfield1" id="rm_contact" value="<?php echo set_value('rmnumber'); ?>"></td>
          </tr>
          
          
          <tr>
            <td align="right" valign="middle">Expiry Date </td>
            <td align="center" valign="middle">:</td>
            <td align="left" valign="middle">
             <input style="margin:0" required type="text" id="expiry" name="expiry_date" class="form-control datepicker" value="<?=set_value('expiry_date')?>" />						     
			</td>
            <td rowspan="2" align="right" valign="top">Client  Address </td>
            <td align="center" valign="top">:</td>
            <td rowspan="2" align="left" valign="middle"><textarea required name="rmaddress" class="textarea2" id="address"><?php echo set_value('rmaddress'); ?></textarea></td>
          </tr>
          

          <tr>
            <td align="right" valign="middle">Client Mobile</td>
            <td align="center" valign="middle">:</td>
            <td align="left" valign="middle"><input name="mobile" required id="mobile" type="text" pattern="\d{10}" class="textfield1" value="<?php echo set_value('mobile'); ?>"></td>
            <td align="center" valign="middle">&nbsp;</td>
		  </tr>
          <tr>
			<td align="right" valign="top">Change Password</td>
            <td align="center" valign="top">:</td>
            <td align="left" valign="top"><input name="password" type="text" class="textfield1" value=""></td>
            <td align="right" valign="middle">Client City</td>
            <td align="center" valign="middle">:</td>
            <td align="left" valign="middle"><input name="rmcity" required type="text" class="textfield1" id="city" value="<?php echo set_value('rmcity'); ?>"></td>
          </tr>
          
          
          <tr>
            <td align="right">User Email Id </td>
            <td align="center" valign="middle">:</td>
            <td align="left" valign="middle"><input required name="uemail" type="email" class="textfield1" id="email" value="<?php echo set_value('uemail'); ?>"></td>
            <td align="right" valign="middle">Client Company Name</td>
            <td align="center" valign="middle">:</td>
            <td align="left" valign="middle"><input required name="rmcopmany" type="text" class="textfield1" id="company" value="<?php echo set_value('rmcopmany'); ?>"></td>
          </tr>
          
			<input type="hidden" name="user_id" value="" id="user_id" />
			<input type="hidden" name="username" value="" id="user_name" />
			<input type="hidden" name="old_password" value="" id="user_pas" />
			<input type="hidden" name="u_type" value="" id="user_type" />
			<input type="hidden" name="current_credit" value="" id="user_c_cr" />
			<input type="hidden" name="smsCredit" value="" id="user_cr" />
          
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
<style>

.table-condensed>tbody>tr>td, .table-condensed>tbody>tr>th, .table-condensed>tfoot>tr>td, .table-condensed>tfoot>tr>th, .table-condensed>thead>tr>td, .table-condensed>thead>tr>th{ color:#000; }
</style>