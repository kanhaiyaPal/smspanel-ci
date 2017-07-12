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
     
    </tr>
	<tr>
	<td >
	<ul class="nav nav-tabs topmenu" role="tablist">
	  <li class="nav-item active">
		<a class="nav-link active" data-toggle="tab" href="#userlist" role="tab">User List</a>
	  </li>
	  <li class="nav-item">
		<a class="nav-link" data-toggle="tab" href="#registration" role="tab">Registration</a>
	  </li>
	  <li class="nav-item">
		<a class="nav-link" data-toggle="tab" href="#notification" role="tab">Notification</a>
	  </li>
	  <li class="nav-item">
		<a class="nav-link" data-toggle="tab" href="#offers" role="tab">Offers</a>
	  </li>
	  <li class="nav-item">
		<a class="nav-link" data-toggle="tab" href="#smsidea" role="tab">SMS Idea</a>
	  </li>
	  <li class="nav-item">
		<a class="nav-link" data-toggle="tab" href="#usersms" role="tab">User SMS</a>
	  </li>
	  <li class="nav-item">
		<a class="nav-link" data-toggle="tab" href="#updatebalance" role="tab">Update Balance</a>
	  </li>
	  <li class="nav-item">
		<a class="nav-link" data-toggle="tab" href="#report" role="tab">Report</a>
	  </li>
	  <li class="nav-item">
		<a class="nav-link" href="<?php echo base_url(); ?>admindashboard/logout" role="tab">Logout</a>
	  </li>
	</ul>
	</td>
</tr>
</table>
</div><!--.top-->
