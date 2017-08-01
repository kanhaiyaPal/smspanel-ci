<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="h-content">
  <div class="h-content-inner">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tbody>
        <tr>
          <td width="50%"><h1 style="padding-bottom:5px; border-bottom:solid 2px #ffffff;">Forgot Password</h1>
            <?php echo form_open('welcome/forgotpass_submit');?>
            <!--------------------------------------------->
			<?php if($this->session->flashdata('forgotpass_error')): ?>
            <div class="alert alert-danger">
			<?php echo $this->session->flashdata('forgotpass_error'); ?>
			</div>
			<?php endif; ?>
			<?php if($this->session->flashdata('forgotpass_success')): ?>
            <div id="dialog1" title="Forgot Password" >
              <p align="center"><strong>Password has been sent to your Registered Mobile and Email ID</strong></p>
              <p align="center"><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/icon-close.png" alt="close" style="margin-top:10px;"></a></p>
            </div>
			<?php endif; ?>
            <!--------------------------------------------->
            <table border="0" cellpadding="10" cellspacing="0" style="margin-top:5px; margin-bottom:5px;">
              <tbody>
                <tr>
                  <td width="166" align="left"><strong>Enter Registered Email ID:</strong></td>
                  <td colspan="3" align="left" valign="middle">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left"><input name="forgetemail" type="text" class="textfield1" id="email" style="width:300px;"></td>
                  <td width="61" align="center" valign="middle">&nbsp;</td>
                  <td width="156" align="center" valign="middle"><input name="forgot" type="hidden" id="forgot" value="1">
                    <label>
                    <input name="button" type="submit" class="btn1" id="button" value="Send Email">
                    </label>
                  </td>
                  <td width="37" align="left" valign="middle">&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="4" align="center" valign="middle"><p>&nbsp;</p></td>
                </tr>
              </tbody>
            </table>
            </form>
          </td>
          <td width="50%" align="right" valign="bottom">&nbsp;</td>
          <td width="50%" align="right" valign="bottom"><img src="<?php echo base_url(); ?>assets/images/home1.png" alt="sms" width="519" height="334"></td>
        </tr>
        <tr>
          <td><div class="register"><a href="<?php echo base_url(); ?>register"><img src="<?php echo base_url(); ?>assets/images/register_now1.png" alt="register" width="250" height="240"></a></div></td>
          <td align="right" valign="bottom">&nbsp;</td>
          <td align="right" valign="bottom">&nbsp;</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
