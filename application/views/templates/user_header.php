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
<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<center>
<div class="top">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
   <tr>
      <td width="52%" align="left"><a href="<?php echo  base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/logo1.png" alt="sms plus" width="270" height="83" /></a></td>
      <td width="17%" align="center" style="padding-top:17px;">Total Credit: <strong><?php echo $userdata['remaining_credits'];?> </strong> </td>
      <td width="14%" align="center"><a href="<?php echo base_url().'userdashboard/index/notification';?>">Notification:<span class="notification" id="notification"><?php echo $userdata['notification_count'];?></span></a></td>
      <td width="17%" align="center" style="padding-top:17px;">Expiry Date: <strong><?php echo $userdata['expiry_date'];?></strong></td>
    </tr>
	<tr>
	<td colspan="4">
	<ul class="nav nav-tabs topmenu" role="tablist">
	  <li class="nav-item <?php if(isset($pageset) && $pageset!=''){ }else{ echo 'active'; }?>">
		<a class="nav-link <?php if(isset($pageset) && $pageset!=''){ }else{ echo 'active'; }?>" data-toggle="tab" href="#dashboard" role="tab">Dashboard</a>
	  </li>
	  <li class="nav-item">
		<a class="nav-link" data-toggle="tab" href="#managetemplates" role="tab">Manage Templates</a>
	  </li>
	  <li class="nav-item">
		<a class="nav-link" data-toggle="tab" href="#uploadcontact" role="tab">Upload Contact</a>
	  </li>
	  <li class="nav-item">
		<a class="nav-link" data-toggle="tab" href="#composesms" role="tab">Compose SMS</a>
	  </li>
	  <li class="nav-item">
		<a class="nav-link" data-toggle="tab" href="#smshistory" role="tab">SMS History</a>
	  </li>
	  <li class="nav-item">
		<a class="nav-link" data-toggle="tab" href="#offers" role="tab">Offers</a>
	  </li>
	  <li class="nav-item">
		<a class="nav-link" data-toggle="tab" href="#smsidea" role="tab">SMS Idea</a>
	  </li>
	  <li class="nav-item">
		<a class="nav-link" data-toggle="tab" href="#report" role="tab">Report</a>
	  </li>
	  <li class="nav-item">
		<a class="nav-link" href="<?php echo base_url(); ?>userdashboard/logout" role="tab">Logout</a>
	  </li>
	</ul>
	</td>
</tr>
</table>
</div><!--.top-->
