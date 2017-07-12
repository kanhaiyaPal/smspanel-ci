<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<script language="javascript">



 	



	function closed()



					{



					document.getElementById("box-warning").style.display = 'none'



					



					}



</script>
    
    <h1>Manage sms ideas</h1>
    <div id="content-content">
      <div class="link-group1"> <a href="javascript:history.back(-1)" class="link-top button2">Back</a> &nbsp;&nbsp;&nbsp; <a href="javascript:void(0)" onclick="showaddedit(&#39;add&#39;,0,0,0,0,0,0)" class="link-top button2">Add </a> &nbsp;&nbsp;&nbsp; <a href="javascript:void(0)" onclick="document.getElementById(&#39;addaward&#39;).style.display=&#39;none&#39;" class="link-top button2">Hide  add/edit window </a> </div>
            <fieldset id="addaward" style="display:none; width:500px" class="box1">
      &nbsp;
      <legend style="font-weight:bold;">Add </legend>
      <form name="kcr_constant" action="http://localhost/kanhaiya/SMS%20panel/online/admin/sms_ideas.php" method="POST" onsubmit="return validate()" style="margin:0px; padding: 0px;">
        <table width="500" cellpadding="0" cellspacing="0" border="0">
          <tbody><tr class="tr-form">
            <td width="129" align="right"><div class="label-form"><strong> Name	: </strong></div></td>
            <td width="363" align="left"><input name="name" type="text" class="textfield1" id="name" style="width:290px;" onclick="javascript:closed();">
            </td>
          </tr>
          <tr class="tr-form">
            <td align="right"><strong>Description:</strong></td>
            <td align="left"><textarea name="con" id="con" style="height:100px; width:289px" class="textarea1"></textarea></td>
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
          <th width="27" align="center">Sn.</th>
          <th width="900" align="left" valign="top">Name</th>
          <th width="30" align="center">Edit</th>
          <!--<th>Middle Name</th>-->
          <th width="41" align="center">Delete</th>
        </tr>
                <tr align="center" style="font-weight:normal" class="tablebgHeadingrow">
          <td align="center">1</td>
          <td align="left" valign="top">COMPETITIVE EXAMS SMS</td>
          <td align="center"><a href="javascript:void(0)" onclick="showaddedit(&#39;edit&#39;, &#39;3&#39;, &#39;COMPETITIVE EXAMS SMS&#39; , &#39;IN JUST 90 HOURS Learn Fluent English,PD Tips. Prepare 4 TOEFL IELTS Interviews GDs Banking etc Competitions at COMPANY NAME. Dial-9876543210&#39;)" class="link-table"> <img src="./sms_idea_files/edit.gif" border="0" alt="Click here to edit the Member" title="Click here to edit the Member"> </a></td>
          <td align="center"><a href="http://localhost/kanhaiya/SMS%20panel/online/admin/sms_ideas.php?id=3&amp;op=del" class="link-table" onclick="return confirm(&#39;Are you sure, want to delete this record&#39;);"> <img src="./sms_idea_files/del.gif" width="16" height="16" border="0"> </a> </td>
        </tr>
                <tr align="center" style="font-weight:normal" class="tablebgHeadingrow">
          <td align="center">2</td>
          <td align="left" valign="top">INDUSTRY SPECIFIC</td>
          <td align="center"><a href="javascript:void(0)" onclick="showaddedit(&#39;edit&#39;, &#39;4&#39;, &#39;INDUSTRY SPECIFIC&#39; , &#39;Auth. Distributor of EXIDE Battery, Invertor, Car UPs, Genset Battery. Call for Best Prices &amp; Best Services. ABC Distributors-9876543210,0124-9876543&#39;)" class="link-table"> <img src="./sms_idea_files/edit.gif" border="0" alt="Click here to edit the Member" title="Click here to edit the Member"> </a></td>
          <td align="center"><a href="http://localhost/kanhaiya/SMS%20panel/online/admin/sms_ideas.php?id=4&amp;op=del" class="link-table" onclick="return confirm(&#39;Are you sure, want to delete this record&#39;);"> <img src="./sms_idea_files/del.gif" width="16" height="16" border="0"> </a> </td>
        </tr>
                <tr align="center" style="font-weight:normal" class="tablebgHeadingrow">
          <td align="center">3</td>
          <td align="left" valign="top">POLITICS</td>
          <td align="center"><a href="javascript:void(0)" onclick="showaddedit(&#39;edit&#39;, &#39;5&#39;, &#39;POLITICS&#39; , &#39;Dear USER Main DHARAMBIR GABA Gurgaon ke vikas ke liye apse Niveden karta hu ki 13 october ko HAATH ke Nishan par Mohar laga kar CONGRESS Party ko Vijayi Banaye.&#39;)" class="link-table"> <img src="./sms_idea_files/edit.gif" border="0" alt="Click here to edit the Member" title="Click here to edit the Member"> </a></td>
          <td align="center"><a href="http://localhost/kanhaiya/SMS%20panel/online/admin/sms_ideas.php?id=5&amp;op=del" class="link-table" onclick="return confirm(&#39;Are you sure, want to delete this record&#39;);"> <img src="./sms_idea_files/del.gif" width="16" height="16" border="0"> </a> </td>
        </tr>
                <tr align="center" style="font-weight:normal" class="tablebgHeadingrow">
          <td align="center">4</td>
          <td align="left" valign="top">POLITICS NEW</td>
          <td align="center"><a href="javascript:void(0)" onclick="showaddedit(&#39;edit&#39;, &#39;6&#39;, &#39;POLITICS NEW&#39; , &#39;Dear Gajender Apke apne S.KATARIA ke Samarthan ke liye singer JASSI &amp; Film Star 11oct. 2PM Goushala Ground,ggn. me aa rahe hai,aap Amantrit hain.Nishan GLASS&#39;)" class="link-table"> <img src="./sms_idea_files/edit.gif" border="0" alt="Click here to edit the Member" title="Click here to edit the Member"> </a></td>
          <td align="center"><a href="http://localhost/kanhaiya/SMS%20panel/online/admin/sms_ideas.php?id=6&amp;op=del" class="link-table" onclick="return confirm(&#39;Are you sure, want to delete this record&#39;);"> <img src="./sms_idea_files/del.gif" width="16" height="16" border="0"> </a> </td>
        </tr>
                <tr align="center" style="font-weight:normal" class="tablebgHeadingrow">
          <td align="center">5</td>
          <td align="left" valign="top">RESTAURANTS</td>
          <td align="center"><a href="javascript:void(0)" onclick="showaddedit(&#39;edit&#39;, &#39;7&#39;, &#39;RESTAURANTS&#39; , &#39;Let d Festivities begin wid mouthwatrng cuisine of ur fav. Mughlai Restaurant La Ville Mughals.Order nd Pamper ur taste buds lyk u’ve done b4.Call-9876543210&#39;)" class="link-table"> <img src="./sms_idea_files/edit.gif" border="0" alt="Click here to edit the Member" title="Click here to edit the Member"> </a></td>
          <td align="center"><a href="http://localhost/kanhaiya/SMS%20panel/online/admin/sms_ideas.php?id=7&amp;op=del" class="link-table" onclick="return confirm(&#39;Are you sure, want to delete this record&#39;);"> <img src="./sms_idea_files/del.gif" width="16" height="16" border="0"> </a> </td>
        </tr>
                <tr align="center" style="font-weight:normal" class="tablebgHeadingrow">
          <td align="center">6</td>
          <td align="left" valign="top">PROPERTY</td>
          <td align="center"><a href="javascript:void(0)" onclick="showaddedit(&#39;edit&#39;, &#39;8&#39;, &#39;PROPERTY&#39; , &#39;Lkng 4 Dream home bt short of money.Dnt wry nw pay in instlmnt nd make ur dream true.Deals in al kind of Prop. &amp; To-let service.Dial-9876543210(Amit)&#39;)" class="link-table"> <img src="./sms_idea_files/edit.gif" border="0" alt="Click here to edit the Member" title="Click here to edit the Member"> </a></td>
          <td align="center"><a href="http://localhost/kanhaiya/SMS%20panel/online/admin/sms_ideas.php?id=8&amp;op=del" class="link-table" onclick="return confirm(&#39;Are you sure, want to delete this record&#39;);"> <img src="./sms_idea_files/del.gif" width="16" height="16" border="0"> </a> </td>
        </tr>
                <tr align="center" style="font-weight:normal" class="tablebgHeadingrow">
          <td align="center">7</td>
          <td align="left" valign="top">ENTERTAINMENT</td>
          <td align="center"><a href="javascript:void(0)" onclick="showaddedit(&#39;edit&#39;, &#39;9&#39;, &#39;ENTERTAINMENT&#39; , &#39;Bored of hectic schedule? Enjoy Rafting, Para Gliding, Trekking, Zipping &amp; other adventure sports in India. Contact COLORS ADVENTURE@9811658938&#39;)" class="link-table"> <img src="./sms_idea_files/edit.gif" border="0" alt="Click here to edit the Member" title="Click here to edit the Member"> </a></td>
          <td align="center"><a href="http://localhost/kanhaiya/SMS%20panel/online/admin/sms_ideas.php?id=9&amp;op=del" class="link-table" onclick="return confirm(&#39;Are you sure, want to delete this record&#39;);"> <img src="./sms_idea_files/del.gif" width="16" height="16" border="0"> </a> </td>
        </tr>
                <tr align="center" style="font-weight:normal" class="tablebgHeadingrow">
          <td align="center">8</td>
          <td align="left" valign="top">FASHION</td>
          <td align="center"><a href="javascript:void(0)" onclick="showaddedit(&#39;edit&#39;, &#39;10&#39;, &#39;FASHION&#39; , &#39;ABC Zone(Readymade &amp; Sarees) announces arrival of fresh festival collection in Menz,Ladies,Kids,Sarees &amp; Suits at Sadar Bazaar &amp; Omaxe Plaza.Call-9876543210.&#39;)" class="link-table"> <img src="./sms_idea_files/edit.gif" border="0" alt="Click here to edit the Member" title="Click here to edit the Member"> </a></td>
          <td align="center"><a href="http://localhost/kanhaiya/SMS%20panel/online/admin/sms_ideas.php?id=10&amp;op=del" class="link-table" onclick="return confirm(&#39;Are you sure, want to delete this record&#39;);"> <img src="./sms_idea_files/del.gif" width="16" height="16" border="0"> </a> </td>
        </tr>
                <tr align="center" style="font-weight:normal" class="tablebgHeadingrow">
          <td align="center">9</td>
          <td align="left" valign="top">COMPUTERS</td>
          <td align="center"><a href="javascript:void(0)" onclick="showaddedit(&#39;edit&#39;, &#39;11&#39;, &#39;COMPUTERS&#39; , &#39;Computers @ attractive price, Buy Branded old Computer at Rs.3500 Only. Contact–ABC Infoways (123/2, Madanpuri Road, Gurgaon). Call-9876543210&#39;)" class="link-table"> <img src="./sms_idea_files/edit.gif" border="0" alt="Click here to edit the Member" title="Click here to edit the Member"> </a></td>
          <td align="center"><a href="http://localhost/kanhaiya/SMS%20panel/online/admin/sms_ideas.php?id=11&amp;op=del" class="link-table" onclick="return confirm(&#39;Are you sure, want to delete this record&#39;);"> <img src="./sms_idea_files/del.gif" width="16" height="16" border="0"> </a> </td>
        </tr>
                <tr align="center" style="font-weight:normal" class="tablebgHeadingrow">
          <td align="center">10</td>
          <td align="left" valign="top">DENTIST</td>
          <td align="center"><a href="javascript:void(0)" onclick="showaddedit(&#39;edit&#39;, &#39;12&#39;, &#39;DENTIST&#39; , &#39;GOOD NEWS!Team of Expert Dentist Orgnsng a Free Dental Check- up Camp 4m 1st-15th Nov. at ABC Dental Care.123, Cntrl Arcade,DLF-2 GGN.DIAL- 4321234&#39;)" class="link-table"> <img src="./sms_idea_files/edit.gif" border="0" alt="Click here to edit the Member" title="Click here to edit the Member"> </a></td>
          <td align="center"><a href="http://localhost/kanhaiya/SMS%20panel/online/admin/sms_ideas.php?id=12&amp;op=del" class="link-table" onclick="return confirm(&#39;Are you sure, want to delete this record&#39;);"> <img src="./sms_idea_files/del.gif" width="16" height="16" border="0"> </a> </td>
        </tr>
                <tr align="center" style="font-weight:normal" class="tablebgHeadingrow">
          <td align="center">11</td>
          <td align="left" valign="top">CAR ACCESSORIES</td>
          <td align="center"><a href="javascript:void(0)" onclick="showaddedit(&#39;edit&#39;, &#39;13&#39;, &#39;CAR ACCESSORIES&#39; , &#39;Hurry!!Get FREE Air Freshner with garware front side sun control films.Offer ending soon.Call-XYZ Car,Sec.-50,Dial-9876543212 or visit-www.XYZ.com&#39;)" class="link-table"> <img src="./sms_idea_files/edit.gif" border="0" alt="Click here to edit the Member" title="Click here to edit the Member"> </a></td>
          <td align="center"><a href="http://localhost/kanhaiya/SMS%20panel/online/admin/sms_ideas.php?id=13&amp;op=del" class="link-table" onclick="return confirm(&#39;Are you sure, want to delete this record&#39;);"> <img src="./sms_idea_files/del.gif" width="16" height="16" border="0"> </a> </td>
        </tr>
                <tr align="center" style="font-weight:normal" class="tablebgHeadingrow">
          <td align="center">12</td>
          <td align="left" valign="top">FOOD JOINT</td>
          <td align="center"><a href="javascript:void(0)" onclick="showaddedit(&#39;edit&#39;, &#39;14&#39;, &#39;FOOD JOINT&#39; , &#39;ABC KURRIES OFFER SPL.BUTTER CHICKEN,KADAI CHICKEN,PANEER BUTTER MASALA,AFGANI CHICKEN,PANEER TIKKA,KABAB &amp; MANY MORE PUNJABI CUISINE.CAL 8765432,0987654321&#39;)" class="link-table"> <img src="./sms_idea_files/edit.gif" border="0" alt="Click here to edit the Member" title="Click here to edit the Member"> </a></td>
          <td align="center"><a href="http://localhost/kanhaiya/SMS%20panel/online/admin/sms_ideas.php?id=14&amp;op=del" class="link-table" onclick="return confirm(&#39;Are you sure, want to delete this record&#39;);"> <img src="./sms_idea_files/del.gif" width="16" height="16" border="0"> </a> </td>
        </tr>
                <tr align="center" style="font-weight:normal" class="tablebgHeadingrow">
          <td align="center">13</td>
          <td align="left" valign="top">PLAY SCHOOL</td>
          <td align="center"><a href="javascript:void(0)" onclick="showaddedit(&#39;edit&#39;, &#39;15&#39;, &#39;PLAY SCHOOL&#39; , &#39;Good news 4 working parents.Leave ur child @ Child’s Own Sweet Home @ XYZABC Kidz-A complete child care &amp; edu.sol.Call 9876543210.Mail-abcxyz@gmail.com&#39;)" class="link-table"> <img src="./sms_idea_files/edit.gif" border="0" alt="Click here to edit the Member" title="Click here to edit the Member"> </a></td>
          <td align="center"><a href="http://localhost/kanhaiya/SMS%20panel/online/admin/sms_ideas.php?id=15&amp;op=del" class="link-table" onclick="return confirm(&#39;Are you sure, want to delete this record&#39;);"> <img src="./sms_idea_files/del.gif" width="16" height="16" border="0"> </a> </td>
        </tr>
              </tbody></table>
    </div>
    <script language="javascript">



function showaddedit(oper, id, name,con)



{



//alert(id);



//alert(sms_ideas);



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