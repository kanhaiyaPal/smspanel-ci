<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="content">
	<script language="javascript">
 	function closed() {
 					document.getElementById("box-warning").style.display = 'none'
 					}
</script>

<h1>Manage Templates</h1>
<div id="content-content">
  <div class="link-group1"> <a href="javascript:history.back(-1)" class="link-top button2">Back</a> &nbsp; | &nbsp; <a href="javascript:void(0)" onclick="showaddedit(&#39;add&#39;,0,0,0,0,0,0)" class="link-top button2">Add </a> &nbsp; | &nbsp; <a href="javascript:void(0)" onclick="document.getElementById(&#39;addaward&#39;).style.display=&#39;none&#39;" class="link-top button2">Hide  add/edit window </a> </div>
    <fieldset id="addaward" style="display:none; width:500px" class="box1">
  &nbsp;
  <legend style="font-weight:bold;">Add </legend>
  <form name="kcr_constant" action="http://localhost/kanhaiya/SMS%20panel/online/sms_tpl.php" method="POST" onsubmit="return validate()" style="margin:0px; padding: 0px;">
    <table width="500" cellpadding="2" cellspacing="0" border="0" class="tablebgHeadingrow">
      <tbody><tr class="tr-form">
        <td width="129" align="right" nowrap="" class="td-form"><div class="label-form"><strong> Name	: </strong></div></td>
        <td width="363" align="left" class="td-form"><input name="name" type="text" class="textfield1" id="name" style="width:300px;" onclick="javascript:closed();">
        </td>
      </tr>
      <tr class="tr-form">
        <td align="right" nowrap="" class="td-form"><strong>Description:</strong></td>
        <td align="left" class="td-form"><textarea name="con" id="con" style="height:100px; width:300px" class="textarea1"></textarea></td>
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
  <table width="100%" border="0" cellpadding="0" cellspacing="1" class="tbl1">
    <tbody><tr class="headM link-top">
      <th width="56" align="center">Sn.</th>
      <th width="183" align="left" valign="top">Name</th>
      <th width="184" align="left" valign="top">Description</th>
      <th width="308" align="center">Edit</th>
     <!-- <th width="252" align="center">Show in Templates</th>-->
      <!--<th>Middle Name</th>-->
      <th width="223" align="center" style="width: 100px;">Delete</th>
      <th width="103" align="center" nowrap="nowrap" style="width: 100px;">Use as SMS</th>
    </tr>
        <tr align="center" style="font-weight:normal" class="tablebgHeadingrow">
      <td align="center">1</td>
      <td align="left" valign="top">Manish</td>
      <td align="left" valign="top">test from gap infotech&nbsp;</td>
      <td align="center">
	  <a href="http://localhost/kanhaiya/SMS%20panel/online/edit_template.php?op=temp_edit&amp;tid=12"> <img src="<?php echo base_url()?>assets/images/edit.gif" border="0"> </a>
	 <!--<a href="javascript:void(0)" onClick="showaddedit('edit', '< ?=$fetch1->id?>', '< ?=$fetch1->name?>' , '< ?=$fetch1->sdescription?>')" class="link-table"> <img src="admin/images/edit.gif" border="0" alt="Click here to edit the Member" title="Click here to edit the Member"> </a>--> </td>
            <td align="center"><a href="http://localhost/kanhaiya/SMS%20panel/online/sms_tpl.php?id=12&amp;op=del" class="link-table" onclick="return confirm(&#39;Are you sure, want to delete this record&#39;);"> <img src="<?php echo base_url()?>assets/images/del.gif" width="16" height="16" border="0"> </a> </td>
      <td align="center">
	  
	  	  <a href="http://localhost/kanhaiya/SMS%20panel/online/compose.php?temp_id=12&amp;temp_op=teop" class="link-table"> <img src="<?php echo base_url()?>assets/images/edit.gif" width="12" height="12" border="0"> </a>
	 	  </td>
    </tr>
      </tbody></table>
</div>
<script language="javascript">



function showaddedit(oper, id, name,con){
 
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


</div>
<div style="clear:both">&nbsp;</div>