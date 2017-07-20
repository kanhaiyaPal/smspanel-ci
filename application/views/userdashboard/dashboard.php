<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="content">
  <?php if($this->session->flashdata('dashboard_errors')){ ?>
  <div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
    <?php echo $this->session->flashdata('dashboard_errors'); ?> </div>
  <?php } ?>
  <?php if($this->session->flashdata('dashboard_success')){ ?>
  <div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
    <?php echo $this->session->flashdata('dashboard_success'); ?> </div>
  <?php } ?>
  <h1>Dashboard</h1>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tbody>
      <tr>
        <td width="48%" valign="top" class="box1"><h2>SMS &amp; Support Summary </h2>
          <table width="100%" border="0" cellpadding="0" cellspacing="1" class="tbl1">
            <tbody>
              <tr>
                <td width="149" valign="top"><p><strong>Total SMS Credit</strong></p></td>
                <td width="307" valign="top"><p> <?php echo $userdata['total_credit']; ?> </p></td>
              </tr>
              <tr>
                <td width="149" valign="top"><p><strong>Remaining SMS Credit</strong></p></td>
                <td width="307" valign="top"><p> <?php echo $userdata['remaining_credits']; ?> </p></td>
              </tr>
              <tr>
                <td width="149" valign="top"><p><strong>Expiry Date</strong></p></td>
                <td width="307" valign="top"><p> <?php echo $userdata['expiry_date']; ?> </p></td>
              </tr>
              <tr>
                <td width="149" valign="top"><p><strong>Customer Support</strong></p></td>
                <td width="307" valign="top"><p><?php echo $userdata['customer_support']; ?></p></td>
              </tr>
              <tr>
                <td width="149" valign="top"><p><strong>Relationship Manager</strong></p></td>
                <td width="307" valign="top"><p> <?php echo $userdata['relationship_manager']; ?> </p></td>
              </tr>
              <tr>
                <td width="149" valign="top"><p><strong>Manager Number</strong></p></td>
                <td width="307" valign="top"><p> <?php echo $userdata['relationship_manager_no']; ?> </p></td>
              </tr>
            </tbody>
          </table></td>
        <td width="4%">&nbsp;</td>
        <td width="48%" class="box1"><h2>User Information</h2>
          <?php echo form_open('userdashboard/modify_userinfo'); ?>
          <table width="100%" border="0" cellpadding="0" cellspacing="1" class="tbl1">
            <tbody>
              <tr>
                <td width="138" valign="top"><p><strong>User Name</strong></p></td>
                <td width="319" valign="top"><p> <?php echo $userdata['username']; ?> </p></td>
              </tr>
              <tr>
                <td width="138" valign="top"><p><strong>Company Name</strong></p></td>
                <td width="319" valign="top"><p>
                    <input required name="rmcopmany" type="text" class="textfield1" id="rmcopmany" value="<?php echo $userdata['company_name']; ?>">
                  </p></td>
              </tr>
              <tr>
                <td width="138" valign="top"><p><strong>Client Address</strong></p></td>
                <td width="319" valign="top"><p>
                    <input required name="rmaddress" type="text" class="textfield1" value="<?php echo $userdata['address']; ?>">
                  </p></td>
              </tr>
              <tr>
                <td width="138" valign="top"><p><strong>Client Mobile</strong></p></td>
                <td width="319" valign="top"><p><strong>
                    <input required name="mobile" type="text" pattern="\d{10}" class="textfield1" value="<?php echo $userdata['mobile']; ?>">
                    </strong></p></td>
              </tr>
              <tr>
                <td width="138" valign="top"><p><strong>Client Email</strong></p></td>
                <td width="319" valign="top"><p><strong>
                    <input required name="uemail" type="email" class="textfield1" value="<?php echo $userdata['email']; ?>">
                    </strong></p></td>
              </tr>
              <tr>
                <td width="138" valign="top"><p><strong>Client Name</strong></p></td>
                <td width="319" valign="top"><p><strong>
                    <input required name="name" type="text" class="textfield1" value="<?php echo $userdata['name']; ?>">
                    </strong></p></td>
              </tr>
              <tr>
                <td align="center" valign="top">&nbsp;</td>
                <td align="center" valign="top"><input name="button" type="submit" class="btn1" value="Update"></td>
              </tr>
            </tbody>
          </table>
          <?php echo form_close(); ?> </td>
      </tr>
      <tr>
        <td valign="top">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td valign="top" class="box1"><script language="JavaScript">
					function chk_pass()
					{
						if(document.change_pass.NewPass.value=="")
						{
							alert("Please Enter the New Password.");
							document.change_pass.NewPass.focus();
							return false;
						}
						if(document.change_pass.RePass.value=="")
						{
							alert("Please Re-Enter your New Password.");
							document.change_pass.RePass.focus();
							return false;
						}
						if(document.change_pass.RePass.value!=document.change_pass.NewPass.value)
						{
							alert("New Password and Re-Type Password should be same.");
							document.change_pass.NewPass.value="";
							document.change_pass.RePass.value="";
							document.change_pass.NewPass.focus();
							return false;
						}
					}

					</script>
          <h2>Change Your Password</h2>
          <table border="0" cellpadding="0" cellspacing="0" width="99%" height="135">
            <?php echo form_open('userdashboard/changepassword',array('onsubmit' => "return chk_pass()",'name'=>'change_pass')); ?>
            <tbody>
              <tr>
                <td width="26%" height="23" align="right"><strong>New Password</strong></td>
                <td width="7%" align="center"><strong>:</strong></td>
                <td width="67%" height="23" align="left"><input required pattern=".{4,}" title="4 characters minimum" name="NewPass" type="password" class="textfield1" size="20"></td>
              </tr>
              <tr>
                <td width="26%" height="23" align="right"><strong>Confirm Password</strong></td>
                <td align="center"><strong>:</strong></td>
                <td width="67%" height="23" align="left"><input required name="RePass" type="password" class="textfield1" size="20"></td>
              </tr>
              <tr>
                <td height="25" colspan="2">&nbsp;</td>
                <td width="67%" height="25"><input type="submit" value="Change" name="btnSubmit" class="btn1"></td>
              </tr>
            </tbody>
          </table></td>
        <td>&nbsp;</td>
        <td valign="top">&nbsp;</td>
      </tr>
    </tbody>
  </table>
  <?php echo form_close(); ?> 
</div>