<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<script language="javascript">



 	



	function closed()



					{



					document.getElementById("box-warning").style.display = 'none'



					



					}



</script>
    <link href="./notification_files/class.css" rel="stylesheet" type="text/css">
    <h1>Manage Notification</h1>
    <div id="content-content">
      <div class="link-group1"> <a href="javascript:history.back(-1)" class="link-top button2">Back</a> &nbsp;&nbsp;&nbsp; <a href="javascript:void(0)" onclick="showaddedit(&#39;add&#39;,0,0,0,0,0,0)" class="link-top button2">Add </a> &nbsp;&nbsp;&nbsp; <a href="javascript:void(0)" onclick="document.getElementById(&#39;addaward&#39;).style.display=&#39;none&#39;" class="link-top button2">Hide  add/edit window </a> </div>
            <fieldset id="addaward" style="display:none; width:500px" class="box1">
      &nbsp;
      <legend style="font-weight:bold;">Add </legend>
      <form name="kcr_constant" action="http://localhost/kanhaiya/SMS%20panel/online/admin/notification.php" method="POST" onsubmit="return validate()" style="margin:0px; padding: 0px;">
        <table width="500" cellpadding="2" cellspacing="0" border="0">
          <tbody><tr class="tr-form">
            <td width="129" align="right" nowrap="" class="td-form"><div class="label-form"><strong> Name	: </strong></div></td>
            <td width="363" align="left" class="td-form"><input name="name" type="text" class="textfield1" id="name" style="width:290px;" onclick="javascript:closed();">
            </td>
          </tr>
          <tr class="tr-form">
            <td align="right" nowrap="" class="td-form"><strong>Description:</strong></td>
            <td align="left" class="td-form"><textarea name="con" id="con" class="textarea2" style="height:100; width:290"></textarea></td>
          </tr>
          <tr class="tr-form">
            <td align="center" class="td-form">&nbsp;</td>
            <td align="left" class="td-form"><input type="submit" name="Submit" value="Submit" class="btn1">
              <input name="id" type="hidden" id="id">
              <input name="op" type="hidden" id="op"></td>
          </tr>
        </tbody></table>
      </form>
      </fieldset>
      
      <br>
      
      <div>Notification By admin</div>
      <table width="100%" border="0" cellpadding="0" cellspacing="1" class="tbl1">
        <tbody><tr class="headM link-top">
          <th width="27" align="center">Sn.</th>
          <th width="895" align="left" valign="top">Name</th>
          <th width="30">Edit</th>
          <!--<th>Middle Name</th>-->
          <th width="41">Delete</th>
        </tr>
                <tr align="center" style="font-weight:normal" class="tablebgHeadingrow">
          <td align="center">1</td>
          <td align="left" valign="top">NEW AVTAAR OF SMS PANEL</td>
          <td align="center"><a href="javascript:void(0)" onclick="showaddedit(&#39;edit&#39;, &#39;10&#39;, &#39;NEW AVTAAR OF SMS PANEL&#39; , &#39;Dear Users, Thank you very much for being patience and co-operation . Now you can see the New Avtaar of SMS Panel with many updations and new features.&#39;)" class="link-table"> <img src="./notification_files/edit.gif" border="0" alt="Click here to edit the Member" title="Click here to edit the Member"> </a></td>
          <td><a href="http://localhost/kanhaiya/SMS%20panel/online/admin/notification.php?id=10&amp;op=del" class="link-table" onclick="return confirm(&#39;Are you sure, want to delete this record&#39;);"> <img src="./notification_files/del.gif" width="16" height="16" border="0"> </a> </td>
        </tr>
                <tr align="center" style="font-weight:normal" class="tablebgHeadingrow">
          <td align="center">2</td>
          <td align="left" valign="top">MAXIMUM SMS SENDING LIMITATION</td>
          <td align="center"><a href="javascript:void(0)" onclick="showaddedit(&#39;edit&#39;, &#39;11&#39;, &#39;MAXIMUM SMS SENDING LIMITATION&#39; , &#39;As per the Updation in Server now you can send SMS on Maximum two files in a day. So, we request you to please send maximum SMS in two files. &#39;)" class="link-table"> <img src="./notification_files/edit.gif" border="0" alt="Click here to edit the Member" title="Click here to edit the Member"> </a></td>
          <td><a href="http://localhost/kanhaiya/SMS%20panel/online/admin/notification.php?id=11&amp;op=del" class="link-table" onclick="return confirm(&#39;Are you sure, want to delete this record&#39;);"> <img src="./notification_files/del.gif" width="16" height="16" border="0"> </a> </td>
        </tr>
                <tr align="center" style="font-weight:normal" class="tablebgHeadingrow">
          <td align="center">3</td>
          <td align="left" valign="top">SMS SERVER GUIDELINES</td>
          <td align="center"><a href="javascript:void(0)" onclick="showaddedit(&#39;edit&#39;, &#39;12&#39;, &#39;SMS SERVER GUIDELINES&#39; , &#39;As per SMS Server Regulations you will have to Schedule the SMS one day Earlier in between 9 AM - 4 PM. As SMS Scheduled after 4 PM will not be Delivered.&#39;)" class="link-table"> <img src="./notification_files/edit.gif" border="0" alt="Click here to edit the Member" title="Click here to edit the Member"> </a></td>
          <td><a href="http://localhost/kanhaiya/SMS%20panel/online/admin/notification.php?id=12&amp;op=del" class="link-table" onclick="return confirm(&#39;Are you sure, want to delete this record&#39;);"> <img src="./notification_files/del.gif" width="16" height="16" border="0"> </a> </td>
        </tr>
                <tr align="center" style="font-weight:normal" class="tablebgHeadingrow">
          <td align="center">4</td>
          <td align="left" valign="top">Reports not Generated</td>
          <td align="center"><a href="javascript:void(0)" onclick="showaddedit(&#39;edit&#39;, &#39;16&#39;, &#39;Reports not Generated&#39; , &#39;Dear User,

This is to inform that according to TRAI guidelines there are some technical error due to which server is unable to generate the rpeorts. So, once it will be ok you will be notified again.

Till the time you can send SMS as there is no effect on sending the SMS in meanwhile.&#39;)" class="link-table"> <img src="./notification_files/edit.gif" border="0" alt="Click here to edit the Member" title="Click here to edit the Member"> </a></td>
          <td><a href="http://localhost/kanhaiya/SMS%20panel/online/admin/notification.php?id=16&amp;op=del" class="link-table" onclick="return confirm(&#39;Are you sure, want to delete this record&#39;);"> <img src="./notification_files/del.gif" width="16" height="16" border="0"> </a> </td>
        </tr>
                <tr align="center" style="font-weight:normal" class="tablebgHeadingrow">
          <td align="center">5</td>
          <td align="left" valign="top">Timing for SMS</td>
          <td align="center"><a href="javascript:void(0)" onclick="showaddedit(&#39;edit&#39;, &#39;19&#39;, &#39;Timing for SMS&#39; , &#39;As per SMS Server Regulations you will have to Schedule the SMS one day Earlier in between 9 AM - 4 PM. As SMS Scheduled after 4 PM will not be Delivered.&#39;)" class="link-table"> <img src="./notification_files/edit.gif" border="0" alt="Click here to edit the Member" title="Click here to edit the Member"> </a></td>
          <td><a href="http://localhost/kanhaiya/SMS%20panel/online/admin/notification.php?id=19&amp;op=del" class="link-table" onclick="return confirm(&#39;Are you sure, want to delete this record&#39;);"> <img src="./notification_files/del.gif" width="16" height="16" border="0"> </a> </td>
        </tr>
              </tbody></table><br>
       
    </div>
   
    <script language="javascript">



function showaddedit(oper, id, name,con)



{



//alert(id);



//alert(notification);



//alert(number);



document.getElementById('addaward').style.display='block';



	if(oper=='edit'){



		document.getElementById('id').value=id;
		document.getElementById('name').value=name;
 		document.getElementById('con').value=con;
  		document.getElementById('op').value="edit";



	}else{



		document.getElementById('id').value='';

 		document.getElementById('name').value='';

 		document.getElementById('con').value='';
		
  		document.getElementById('op').value="add";



	}



}







function validate()



{



	if(document.kcr_constant.name.value=='')



	{



		alert("Please Enter  name");



		document.kcr_constant.name.focus();



		return false;



	}



	 



}



</script>