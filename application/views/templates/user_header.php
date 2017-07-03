<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo $title; ?></title>
<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css">
</head>
<body style="background-color:#585957">
<center>
<div class="h-header">
  <div class="h-header-inner">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tbody>
        <tr>
          <td width="51%"><img src="<?php echo base_url(); ?>assets/images/logo1.png" alt="sms plus" width="270" height="83"></td>
          <td width="49%"><div>
              <div> </div>
              <?php echo form_open('login'); ?>
              <input name="login_frm" type="hidden" id="login_frm" value="1">
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody>
                  <tr>
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
                    <td><input name="redi" type="radio" value="uemp" checked="checked">
                      User &nbsp;
                      <input name="redi" type="radio" value="reemp">
                      ReSeller </td>
                    <td colspan="2"><a href="<?php echo base_url(); ?>register">Registration</a> | <a href="<?php echo base_url(); ?>forgotpassword">Forgot Your Password?</a></td>
                  </tr>
                </tbody>
              </table>
              </form>
            </div></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
