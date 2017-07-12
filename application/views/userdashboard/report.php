<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="content">
	<script language="javascript">
 	function closed() {
 					document.getElementById("box-warning").style.display = 'none'
 					}
</script>

<h1>View Report</h1>

<table width="100%" border="0" cellpadding="3" cellspacing="0">

        <tbody><tr><td></td></tr>
                <tr> 
          <td align="center"><font color="#FF0000">There is no Report.</font></td>
        </tr>
              </tbody></table>

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