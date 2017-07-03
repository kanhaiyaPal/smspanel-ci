<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
  <div class="h-content">
    <div class="h-content-inner">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <td width="50%"><h1 style="padding-bottom:5px; border-bottom:solid 2px #ffffff;">Register Now</h1>
              <p>&nbsp;</p>
              <?php echo form_open('register_request'); ?>
                <p style="color:#FF0000; font-weight:bold;"></p>
                <!--------------------------------------------->
                <div id="dialog1" title="Registration Success" style="display:none;">
                  <p align="center"><strong>Thank you Registering With SMS Plus, One of our Support Executive will get back to you Soon!!</strong></p>
                  <p align="center"><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/icon-close.png" alt="close" style="margin-top:10px;"></a></p>
                </div>
                <!--------------------------------------------->
                <!--------------------------------------------->
                <div id="dialog9" title="Already Registered" style="display:none;">
                  <p align="center"><strong>Email Id Already Registered</strong></p>
                  <p align="center"><a href="<?php echo base_url(); ?>register"><img src="<?php echo base_url(); ?>assets/images/icon-close.png" alt="close" style="margin-top:10px;" onClick="hidediv();"></a></p>
                </div>
                <!--------------------------------------------->
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tbody>
                    <tr>
                      <td width="21%" align="right">Name <span class="error_txt">*</span></td>
                      <td width="4%" align="center">:</td>
                      <td width="75%" align="left" valign="top"><input name="aname" type="text" class="textfield1" id="aname" style="width:180px;" value=""></td>
                    </tr>
                    <tr>
                      <td align="right">Email <span class="error_txt">*</span></td>
                      <td align="center">:</td>
                      <td align="left" valign="top"><input name="aemailid" type="text" class="textfield1" id="aemailid" style="width:180px;" value="">
                        <span id="reguser"></span></td>
                    </tr>
                    <tr>
                      <td align="right">Mobile</td>
                      <td align="center">:</td>
                      <td align="left" valign="top"><input name="amob" type="text" class="textfield1" id="amob" style="width:180px;" value=""></td>
                    </tr>
                    <tr>
                      <td align="right">Quantity for SMS</td>
                      <td align="center">:</td>
                      <td align="left" valign="top"><input name="quantity" type="text" class="textfield1" id="quantity" style="width:180px;"></td>
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
                          <input name="contuser" type="hidden" id="contuser" value="2">
                          <input name="Reset" type="reset" class="btn1" id="btn-primary" value="Clear">
                        </div></td>
                    </tr>
                  </tbody>
                </table>
              </form></td>
            <td width="50%" align="right" valign="top"><img src="<?php echo base_url(); ?>assets/images/home1.png" alt="sms" width="519" height="334"></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>