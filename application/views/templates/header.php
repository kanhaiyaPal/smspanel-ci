<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo $title; ?></title>

<!-- jQuery UI -->
<link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" media="screen">
<!-- Bootstrap -->
<link href="<?php echo base_url(); ?>assets/css/bootstrap/bootstrap.min.css" rel="stylesheet">
<!-- Style -->
<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css">
</head>
<body style="background-color:#585957">
<center>
<div class="h-header">
  <div class="h-header-inner">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tbody>
        <tr>
          <td width="51%"><a href="<?php echo  base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/logo1.png" alt="sms plus" width="270" height="83" /></a></td>
          <td width="49%"><div>
			  <?php if(!$logged): ?>
			  <?php if(validation_errors()){ ?><span style="color:red; font-size:9px"><?php echo validation_errors(); ?></span><?php } ?>
			  <?php if($this->session->flashdata('login_error')){ ?><span style="color:red; font-size:9px"><?php echo $this->session->flashdata('login_error'); ?></span><?php }?>
              <?php echo form_open('welcome/login'); ?>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody>
                  <tr>
                    <td>User ID: </td>
                    <td>Password:</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td><label>
                      <input name="username" type="text" class="textfield1" id="username" value="<?php echo set_value('username'); ?>">
                      </label></td>
                    <td><input name="lpassword" type="password" class="textfield1" id="lpassword" value=""></td>
                    <td><label>
                      <input type="image" name="imageField" id="imageField" src="<?php echo base_url(); ?>assets/images/btn1.jpg">
                      </label></td>
                  </tr>
                  <tr>
                    <!--<td><input name="utype" type="radio" value="user" checked="checked">
                      User &nbsp;
                      <input name="utype" type="radio" value="reseller">
                      ReSeller </td>-->
					 <td>&nbsp;</td>
                    <td colspan="2"><a href="<?php echo base_url(); ?>register">Registration</a> | <a href="<?php echo base_url(); ?>forgotpassword">Forgot Your Password?</a></td>
                  </tr>
                </tbody>
              </table>
              </form>
			  <?php else: ?>
				<a class="btn btn-primary" href="<?php echo $dashboard_link; ?>">Go to Dashboard</a>
				<a class="btn btn-default" href="<?php echo $logout_link; ?>">Logout</a>
			  <?php endif; ?>
            </div></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
