<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
  <div class="h-content">
    <div class="h-content-inner">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <td width="50%"><h1 style="padding-bottom:5px; border-bottom:solid 2px #ffffff;">Register Now</h1>
              <p>&nbsp;</p>
			  <?php if(!$logged): ?>
			  <?php if($this->session->flashdata('register_success')):?>
			  <!--------------------------------------------->
                <div id="dialog1" title="Registration Success" >
                  <p align="center"><strong><?php echo $this->session->flashdata('register_success'); ?></strong></p>
                  <p align="center"><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/icon-close.png" alt="close" style="margin-top:10px;"></a></p>
                </div>
                <!--------------------------------------------->
				<?php endif; ?>
				<?php if($this->session->flashdata('register_error')):?>
                <!--------------------------------------------->
                <div id="dialog9" title="Already Registered" >
                  <p align="center"><?php echo $this->session->flashdata('register_error'); ?></p>
                  <p align="center"><a href="<?php echo base_url(); ?>register"><img src="<?php echo base_url(); ?>assets/images/icon-close.png" alt="close" style="margin-top:10px;" onClick="hidediv();"></a></p>
                </div>
                <!--------------------------------------------->
				<?php endif; ?>
              <?php echo form_open('welcome/register_submit'); ?>
                <p style="color:#FF0000; font-weight:bold;"></p>
                 <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tbody>
                    <tr>
                      <td width="21%" align="right">Name <span class="error_txt">*</span></td>
                      <td width="4%" align="center">:</td>
                      <td width="75%" align="left" valign="top"><input required name="aname" type="text" class="textfield1" id="aname" style="width:180px;" value=""></td>
                    </tr>
                    <tr>
                      <td align="right">Email <span class="error_txt">*</span></td>
                      <td align="center">:</td>
                      <td align="left" valign="top"><input name="aemailid" required type="email" class="textfield1" id="aemailid" style="width:180px;" value="">
                        <span id="reguser"></span></td>
                    </tr>
                    <tr>
                      <td align="right">Mobile</td>
                      <td align="center">:</td>
                      <td align="left" valign="top"><input name="amob" type="text" pattern="\d{10}" class="textfield1" id="amob" style="width:180px;" value=""></td>
                    </tr>
                    <tr>
                      <td align="right">Quantity for SMS</td>
                      <td align="center">:</td>
                      <td align="left" valign="top"><input name="quantity" type="text" pattern="\d*" class="textfield1" id="quantity" style="width:180px;"></td>
                    </tr>
                    <tr>
                      <td align="right" valign="top">Address</td>
                      <td align="center" valign="top">:</td>
                      <td align="left" valign="top"><strong>
                        <textarea name="adescption" class="textarea1" id="adescption" style="width:180px;"></textarea>
                        </strong></td>
                    </tr>
                    <tr>
                      <td align="left" valign="top">&nbsp;</td>
                      <td align="left" valign="top">&nbsp;</td>
                      <td align="left" valign="top"><div style="float:left">
                          <input name="button" type="submit" class="btn1" id="btn-primary" value="Submit">
                          <input name="Reset" type="reset" class="btn1" id="btn-primary" value="Clear">
                        </div></td>
                    </tr>
                  </tbody>
                </table>
              </form><?php else: echo "You are already registered"; endif; ?></td>
            <td width="50%" align="right" valign="top"><img src="<?php echo base_url(); ?>assets/images/home1.png" alt="sms" width="519" height="334"></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>