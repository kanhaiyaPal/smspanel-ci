<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<center>
<div class="h-header">
<div class="h-header-inner">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tbody><tr>
      <td width="51%"><img src="<?php echo base_url(); ?>assets/images/logo1.png" alt="sms plus" width="270" height="83"></td>
      <td width="49%">
       
          <div>
          <div> </div>
          <?php echo form_open('login'); ?>

      <input name="login_frm" type="hidden" id="login_frm" value="1">

        <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody><tr>
          <td>User ID: </td>
          <td>Password:</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><label>
            <input name="username" type="text" class="textfield1" id="username" value="">
          </label></td>
          <td><input name="lpassword" type="password" class="textfield1" id="lpassword" value=""></td>
          <td><label>
            <input type="image" name="imageField" id="imageField" src="<?php echo base_url(); ?>assets/images/btn1.jpg">
          </label></td>
        </tr>
        
          <tr>
          <td><input name="redi" type="radio" value="uemp" checked="checked"> User &nbsp; <input name="redi" type="radio" value="reemp"> ReSeller
              </td>
          <td colspan="2"><a href="http://localhost/kanhaiya/SMS%20panel/online/registration.php">Registration</a> | <a href="http://localhost/kanhaiya/SMS%20panel/online/member_forgot_pass.php">Forgot Your Password?</a></td>
          </tr>	
      </tbody></table>
     </form> 
          </div>
          
          
       
        </td>
    </tr>
  </tbody></table>
</div>
</div>
<div class="h-content">
<div class="h-content-inner">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tbody><tr>
      <td width="37%">
      	<h1 align="center" style="font-size:25px; line-height:30px;">THERE IS A BETTER WAY</h1>
        <h1 align="center" style="font-size:45px; line-height:50px;">TO DO MARKETING</h1>
        <h2 align="center">Your business deserve it, we help you do it.</h2>
        <p>&nbsp;</p>
        <p align="center"><img src="<?php echo base_url(); ?>assets/images/mobile-home.png" alt="sms" width="370" height="201"></p></td>
      <td width="63%" align="right" valign="bottom"><img src="<?php echo base_url(); ?>assets/images/home1.png" alt="sms" width="519" height="344"></td>
    </tr>
    <tr>
      <td>
      <div class="register"><a href="http://localhost/kanhaiya/SMS%20panel/online/registration.php"><img src="<?php echo base_url(); ?>assets/images/register_now1.png" alt="register" width="250" height="240"></a></div></td>
      <td align="right" valign="bottom">&nbsp;</td>
    </tr>
  </tbody></table>
  </div>
  </div>
  <div class="h-footer">
<div style="width:1003px; margin:auto">
<div style="float:right; padding-right:10px">&nbsp;</div>
  <div style="float:left; padding-left:10px">Copyrignt © 2009-2035, All rights reserved</div>
</div>
</div>

  

</center>