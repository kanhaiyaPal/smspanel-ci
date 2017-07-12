<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

 <script language="javascript">



 	



	function closed()



					{



					document.getElementById("box-warning").style.display = 'none'



					



					}



</script>
    <link href="./offers_files/class.css" rel="stylesheet" type="text/css">
    <h1>Manage offers</h1>
    <div id="content-content">
      <div class="link-group1"> <a href="javascript:history.back(-1)" class="link-top button2">Back</a> &nbsp;&nbsp;&nbsp; <a href="javascript:void(0)" onclick="showaddedit(&#39;add&#39;,0,0,0,0,0,0)" class="link-top button2">Add </a> &nbsp;&nbsp;&nbsp; <a href="javascript:void(0)" onclick="document.getElementById(&#39;addaward&#39;).style.display=&#39;none&#39;" class="link-top button2">Hide  add/edit window </a> </div>
            <fieldset id="addaward" style="display:none; width:500px" class="box1">
      &nbsp;
      <legend style="font-weight:bold;">Add </legend>
      <form name="kcr_constant" action="http://localhost/kanhaiya/SMS%20panel/online/admin/offers.php" method="POST" onsubmit="return validate()" style="margin:0px; padding: 0px;">
        <table width="500" cellpadding="2" cellspacing="0" border="0">
          <tbody><tr>
            <td width="129" align="right" nowrap="" class="td-form"><div class="label-form"><strong> Name	: </strong></div></td>
            <td width="363" align="left" class="td-form"><input name="name" type="text" class="textfield1" id="name" style="width:290px;" onclick="javascript:closed();">
            </td>
          </tr>
          <tr class="tr-form">
            <td align="right" nowrap="" class="td-form"><strong>Description:</strong></td>
            <td align="left" class="td-form"><textarea name="con" id="con" class="textarea1" style="width:290px;"></textarea></td>
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
      
      <div>Offers By admin</div>      
      <table width="100%" border="0" cellpadding="0" cellspacing="1" class="tbl1">
        <tbody><tr class="headM link-top">
          <th width="27" align="center">Sn.</th>
          <th width="900" align="left" valign="top">Name</th>
          <th width="30" align="center">Edit</th>
          <!--<th>Middle Name</th>-->
          <th width="41" align="center">Delete</th>
        </tr>
                <tr align="center" style="font-weight:normal" class="tablebgHeadingrow">
          <td align="center">1</td>
          <td align="left" valign="top">CURRENT OFFER!!!</td>
          <td align="center"><a href="javascript:void(0)" onclick="showaddedit(&#39;edit&#39;, &#39;4&#39;, &#39;CURRENT OFFER!!!&#39; , &#39;Buy 1 LAC SMS @ Just Rs. 12,000&#39;)" class="link-table"> <img src="./offers_files/edit.gif" border="0" alt="Click here to edit the Member" title="Click here to edit the Member"> </a></td>
          <td align="center"><a href="http://localhost/kanhaiya/SMS%20panel/online/admin/offers.php?id=4&amp;op=del" class="link-table" onclick="return confirm(&#39;Are you sure, want to delete this record&#39;);"> <img src="./offers_files/del.gif" width="16" height="16" border="0"> </a> </td>
        </tr>
                <tr align="center" style="font-weight:normal" class="tablebgHeadingrow">
          <td align="center">2</td>
          <td align="left" valign="top">ALL INDIA DATABASE</td>
          <td align="center"><a href="javascript:void(0)" onclick="showaddedit(&#39;edit&#39;, &#39;5&#39;, &#39;ALL INDIA DATABASE&#39; , &#39;Get All INDIA DATABASE in EXCEL FORMAT with Emails &amp; Mobile Numbers @ Rs. 3500/-&#39;)" class="link-table"> <img src="./offers_files/edit.gif" border="0" alt="Click here to edit the Member" title="Click here to edit the Member"> </a></td>
          <td align="center"><a href="http://localhost/kanhaiya/SMS%20panel/online/admin/offers.php?id=5&amp;op=del" class="link-table" onclick="return confirm(&#39;Are you sure, want to delete this record&#39;);"> <img src="./offers_files/del.gif" width="16" height="16" border="0"> </a> </td>
        </tr>
                <tr align="center" style="font-weight:normal" class="tablebgHeadingrow">
          <td align="center">3</td>
          <td align="left" valign="top">NCR DATABASE</td>
          <td align="center"><a href="javascript:void(0)" onclick="showaddedit(&#39;edit&#39;, &#39;8&#39;, &#39;NCR DATABASE&#39; , &#39;Get NCR DATABASE in EXCEL FORMAT with Emails &amp; Mobile Numbers @ Rs. 2200/-&#39;)" class="link-table"> <img src="./offers_files/edit.gif" border="0" alt="Click here to edit the Member" title="Click here to edit the Member"> </a></td>
          <td align="center"><a href="http://localhost/kanhaiya/SMS%20panel/online/admin/offers.php?id=8&amp;op=del" class="link-table" onclick="return confirm(&#39;Are you sure, want to delete this record&#39;);"> <img src="./offers_files/del.gif" width="16" height="16" border="0"> </a> </td>
        </tr>
                <tr align="center" style="font-weight:normal" class="tablebgHeadingrow">
          <td align="center">4</td>
          <td align="left" valign="top">GURGAON REAL ESTATE DEALERS &amp; BROKERS SMS</td>
          <td align="center"><a href="javascript:void(0)" onclick="showaddedit(&#39;edit&#39;, &#39;11&#39;, &#39;GURGAON REAL ESTATE DEALERS &amp; BROKERS SMS&#39; , &#39;Get 25000 SMS @ Rs. 5,500/- on Real Estate Dealers &amp; Brokers of GURGAON. Total Quantity- 7,000 (Mobile No./ City/ Company Name/ Concern Person)&#39;)" class="link-table"> <img src="./offers_files/edit.gif" border="0" alt="Click here to edit the Member" title="Click here to edit the Member"> </a></td>
          <td align="center"><a href="http://localhost/kanhaiya/SMS%20panel/online/admin/offers.php?id=11&amp;op=del" class="link-table" onclick="return confirm(&#39;Are you sure, want to delete this record&#39;);"> <img src="./offers_files/del.gif" width="16" height="16" border="0"> </a> </td>
        </tr>
                <tr align="center" style="font-weight:normal" class="tablebgHeadingrow">
          <td align="center">5</td>
          <td align="left" valign="top">NCR REAL ESTATE DEALERS &amp; BROKERS SMS</td>
          <td align="center"><a href="javascript:void(0)" onclick="showaddedit(&#39;edit&#39;, &#39;10&#39;, &#39;NCR REAL ESTATE DEALERS &amp; BROKERS SMS&#39; , &#39;Get 50000 SMS @ Rs. 10,000/- on Real Estate Dealers &amp; Brokers of NCR. Total Quantity- 22,000 (Mobile No./ City/ Company Name/ Concern Person)&#39;)" class="link-table"> <img src="./offers_files/edit.gif" border="0" alt="Click here to edit the Member" title="Click here to edit the Member"> </a></td>
          <td align="center"><a href="http://localhost/kanhaiya/SMS%20panel/online/admin/offers.php?id=10&amp;op=del" class="link-table" onclick="return confirm(&#39;Are you sure, want to delete this record&#39;);"> <img src="./offers_files/del.gif" width="16" height="16" border="0"> </a> </td>
        </tr>
                <tr align="center" style="font-weight:normal" class="tablebgHeadingrow">
          <td align="center">6</td>
          <td align="left" valign="top">HNI DATABASE</td>
          <td align="center"><a href="javascript:void(0)" onclick="showaddedit(&#39;edit&#39;, &#39;12&#39;, &#39;HNI DATABASE&#39; , &#39;1 LAC Mobile Database of NCR (10 LAC - 1 CR. Income Group) @ Rs. 4000/-&#39;)" class="link-table"> <img src="./offers_files/edit.gif" border="0" alt="Click here to edit the Member" title="Click here to edit the Member"> </a></td>
          <td align="center"><a href="http://localhost/kanhaiya/SMS%20panel/online/admin/offers.php?id=12&amp;op=del" class="link-table" onclick="return confirm(&#39;Are you sure, want to delete this record&#39;);"> <img src="./offers_files/del.gif" width="16" height="16" border="0"> </a> </td>
        </tr>
              </tbody></table> <br>
      
    </div>
    <script language="javascript">



function showaddedit(oper, id, name,con)



{



//alert(id);



//alert(offers);



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