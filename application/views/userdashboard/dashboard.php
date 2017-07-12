<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="content">
	<h1>Dashboard&nbsp;&nbsp;&nbsp;&nbsp;</h1>
   <table width="100%" border="0" cellspacing="0" cellpadding="0">
     <tbody><tr>
       <td width="48%" valign="top" class="box1">
       <h2>SMS &amp; Support Summary </h2>
         <table width="100%" border="0" cellpadding="0" cellspacing="1" class="tbl1">
  <tbody><tr>
    <td width="149" valign="top"><p><strong>Total SMS Credit</strong></p></td>
    <td width="307" valign="top"><p>
      10000    </p></td>
  </tr>
  <tr>
    <td width="149" valign="top"><p><strong>Remaining SMS Credit</strong></p></td>
    <td width="307" valign="top"><p>
      47    </p></td>
  </tr>
  <tr>
    <td width="149" valign="top"><p><strong>Expiry Date</strong></p></td>
    <td width="307" valign="top"><p>
      2030-06-20    </p></td>
  </tr>
  <tr>
    <td width="149" valign="top"><p><strong>Customer Support</strong></p></td>
    <td width="307" valign="top"><p>+91- 124-4010990</p></td>
  </tr>
  <tr>
    <td width="149" valign="top"><p><strong>Relationship Manager</strong></p></td>
    <td width="307" valign="top"><p>
      GAP Infotech    </p></td>
  </tr>
  <tr>
    <td width="149" valign="top"><p><strong>Manager Number</strong></p></td>
    <td width="307" valign="top"><p>
      +91-7503024772    </p></td>
  </tr>
</tbody></table>       </td>
       <td width="4%">&nbsp;</td>
       <td width="48%" class="box1">
       <h2>User Information</h2>
       <form action="http://localhost/kanhaiya/SMS%20panel/online/dashboard.php" method="post" name="frmcontact" id="frmcontact" onsubmit="">
 <input name="user_reg" type="hidden" id="hdn" value="1">

<table width="100%" border="0" cellpadding="0" cellspacing="1" class="tbl1">
  <tbody><tr>
    <td width="138" valign="top"><p><strong>User Name</strong></p></td>
    <td width="319" valign="top"><p>
      demo    </p></td>
  </tr>
  <tr>
    <td width="138" valign="top"><p><strong>Company Name</strong></p></td>
    <td width="319" valign="top"><p><input name="rmcopmany" type="text" class="textfield1" id="rmcopmany" value="GAP Infotech"></p></td>
  </tr>
  <tr>
    <td width="138" valign="top"><p><strong>Client Address</strong></p></td>
    <td width="319" valign="top"><p><input name="rmaddress" type="text" class="textfield1" id="rmaddress" value="Gurgaon"></p></td>
  </tr>
  <tr>
    <td width="138" valign="top"><p><strong>Client Mobile</strong></p></td>
    <td width="319" valign="top"><p><strong><input name="mobile" type="text" class="textfield1" id="mobile" value="9650145588"></strong></p></td>
  </tr>
  <tr>
    <td width="138" valign="top"><p><strong>Client Email</strong></p></td>
    <td width="319" valign="top"><p><strong><input name="uemail" type="text" class="textfield1" id="uemail" value="sales@gapinfotech.com"></strong></p></td>
  </tr>
 <!-- <tr>
    <td width="319" valign="top"><p><strong>CITY</strong></p></td>
    <td width="319" valign="top"><p><strong><input name="rmcity" type="text" class="textfield1" id="rmcity"   value="< ?php echo $resrecu[rmcity];?>" /></strong></p></td>
  </tr>-->
  <tr>
    <td width="138" valign="top"><p><strong>Client Name</strong></p></td>
    <td width="319" valign="top"><p><strong><input name="name" type="text" class="textfield1" id="name" value="GAP INFOTECH"></strong></p></td>
  </tr>
  <tr>
    <td align="center" valign="top">&nbsp;</td>
    <td align="center" valign="top"><input name="button" type="submit" class="btn1" id="button" value="Update"></td>
  </tr>
</tbody></table>
</form>       </td>
     </tr>
     <tr>
       <td valign="top">&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
     </tr>
     <tr>
       <td valign="top" class="box1">
       
					<script language="JavaScript">

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

	<form name="change_pass" method="POST" onsubmit="return chk_pass();"></form>

					  <input type="hidden" name="action" value="update">

						

								

									

							
									 

									<tbody><tr>

									<td width="26%" height="23" align="right"><strong>New Password</strong></td>

									<td width="7%" align="center"><strong>:</strong></td>

									<td width="67%" height="23" align="left"><input name="NewPass" type="password" class="textfield1" size="20"></td>

									</tr>

									<tr>

									<td width="26%" height="23" align="right"><strong>Confirm Password</strong></td>

									<td align="center"><strong>:</strong></td>

									<td width="67%" height="23" align="left"><input name="RePass" type="password" class="textfield1" size="20"></td>

									</tr>

									<tr>

									<td height="25" colspan="2">&nbsp;</td>

									<td width="67%" height="25"><input type="submit" value="Change" name="btnSubmit" class="btn1"></td>

									</tr>

	</tbody></table>
       </td>
       <td>&nbsp;</td>
       <td valign="top">&nbsp;</td>
     </tr>
   </tbody></table>
</div>
<div style="clear:both">&nbsp;</div>