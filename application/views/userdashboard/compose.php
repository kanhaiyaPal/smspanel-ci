<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="content">
	<h1>Compose SMS</h1>
    <form id="form1" name="form1" method="post" action="http://localhost/kanhaiya/SMS%20panel/online/compose.php">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody><tr>
    <td width="73%">

 <input type="hidden" name="applly" value="1">
 <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tbody><tr>
        <td align="left" valign="middle">&nbsp;    </td>   
      </tr>
      <tr>
        <td>
        <div class="link-group1">
        <a href="http://localhost/kanhaiya/SMS%20panel/online/ag_up_con.php">Upload Contact :</a>
        <table width="100%" border="0" cellspacing="2" cellpadding="0">
          <tbody><tr>
            <td width="27%">
            <a href="http://localhost/kanhaiya/SMS%20panel/online/compose.php">
          <input name="radio" type="radio" id="radio" value="radio" checked="checked">
          File Selected</a> 
          <a href="http://localhost/kanhaiya/SMS%20panel/online/compose_copy.php">
          <input type="radio" name="radio" id="radio2" value="radio">
          Copy Text File  </a>            </td>
            <td width="32%" align="right">Choose Existing Uploaded File : </td>
            <td width="41%"><label>
          <select name="f_name" class="sel-box1" id="f_name">
             		 <option value="2972123.txt"> 2972123.txt</option>
 				 		 <option value="2947contact.txt"> 2947contact.txt</option>
 				 		 <option value="2929contact.txt"> 2929contact.txt</option>
 				 		 <option value="2986phone.txt"> 2986phone.txt</option>
 				 		 <option value="2955phone.txt"> 2955phone.txt</option>
 				 		 <option value="2981contact.txt"> 2981contact.txt</option>
 				 		 <option value="2964New_Text_Document.txt"> 2964New_Text_Document.txt</option>
 				 		 <option value="2995contact.txt"> 2995contact.txt</option>
 				 		 <option value="2933contact.txt"> 2933contact.txt</option>
 				 		 <option value="2956txt_1.txt"> 2956txt_1.txt</option>
 				 		 <option value="2937contact.txt"> 2937contact.txt</option>
 				 		 <option value="2952contact.txt"> 2952contact.txt</option>
 				 		 <option value="2992contact.txt"> 2992contact.txt</option>
 				 		 <option value="2939contact.txt"> 2939contact.txt</option>
 				 		 <option value="2928contact.txt"> 2928contact.txt</option>
 				 		 <option value="296contact.txt"> 296contact.txt</option>
 				 		 <option value="2988contact.txt"> 2988contact.txt</option>
 				 		 <option value="2983contact.txt"> 2983contact.txt</option>
 				 		 <option value="2985contact.txt"> 2985contact.txt</option>
 				 		 <option value="297contact.txt"> 297contact.txt</option>
 				 		 <option value="2985contact.txt"> 2985contact.txt</option>
 				 		 <option value="2921contact.txt"> 2921contact.txt</option>
 				          </select>
        </label></td>
            </tr>
        </tbody></table>
        </div>          </td>
      </tr>
      <tr>
        <td>&nbsp;
<!--------------------------------------------->

<div id="dialog" title="Compose Limit Exceed" style="display:none;">
<p align="center"><strong>You have exceded your limit for the day</strong></p>
<p align="center">You Can Send 2 Times Messages in a Day Maximum.</p>
<p align="center"><a href="http://localhost/kanhaiya/SMS%20panel/online/dashboard.php"><img src="./compose_sms_files/icon-close.png" alt="close" style="margin-top:10px;"></a></p>
</div>

<!--------------------------------------------->  
<!--------------------------------------------->

<div id="dialog1" title="Compose Success" style="display:none;">
<p align="center"><strong>Congratulations!! Your SMS has been scheduled successfully and You will receive confirmation SMS also</strong></p>
<p align="center"><a href="http://localhost/kanhaiya/SMS%20panel/online/dashboard.php"><img src="./compose_sms_files/icon-close.png" alt="close" style="margin-top:10px;"></a></p>
</div>

<!---------------------------------------------> 
<!--------------------------------------------->

<div id="dialog2" title="Not Allow Compose" style="display:none;">
<p align="center"><strong>As per SMS Server Regulations you will have to Schedule the SMS one day Earlier in between 9 AM - 4 PM. As SMS Scheduled after 4 PM will not be Delivered.</strong></p>
<p align="center"><a href="http://localhost/kanhaiya/SMS%20panel/online/dashboard.php"><img src="./compose_sms_files/icon-close.png" alt="close" style="margin-top:10px;"></a></p>
</div>

<!--------------------------------------------->        
        </td>
      </tr>
      
      
      <tr>
        <td class="box1"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tbody><tr>
            <td width="52%">
            <h2>Type SMS:</h2>
            <div class="jqEasyCounterMsg" style="font-size: 12px; font-family: Verdana; color: rgb(0, 0, 0); text-align: left; width: 700px; opacity: 0;">&nbsp;</div><textarea name="sms_txt" cols="80" rows="10" class="textarea1" id="sms_txt">test from gap infotech</textarea>
			
			</td>
            </tr>
          <tr>
            <td style="padding:5px 0;">
            <label>
          <input name="button" type="submit" class="btn1" id="button" value="SEND SMS" style="float:right">
        </label>
             <strong>Schedule Message:</strong> 
          <input name="datefrom" type="text" class="textfield1" id="datefrom" value="" readonly="readonly">
                        <img src="./compose_sms_files/cal.gif" width="16" height="16" id="f_btn1" border="0" alt="Pick a date">
            <label>
             &nbsp; &nbsp; <select name="schedule_time" class="sel-box1" id="schedule_time">
              <!--<option value="09:00 AM - 12:00 PM">09:00 AM - 12:00 PM</option>
              <option value="12:00 PM - 03:00 PM">12:00 PM - 03:00 PM</option>
              <option value="03:00 PM - 06:00 PM">03:00 PM - 06:00 PM</option> -->
              <option value="10 AM to 2 PM">10 AM to 2 PM</option> 
              <option value="3 PM to 7 PM">3 PM to 7 PM</option>              
            </select>
          </label>            </td>
            </tr>
        </tbody></table></td>
      </tr>      
    </tbody></table>

    </td>
    <td width="25%">&nbsp;</td>
    <td width="2%">&nbsp;</td>
  </tr>
</tbody></table>
</form>
</div>
<div style="clear:both">&nbsp;</div>