<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<h1>Add Report</h1>
<form method="post" action="http://localhost/kanhaiya/SMS%20panel/online/admin/sent-report.php" enctype="multipart/form-data">

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-bottom:20px;">
          <tbody><tr>
            <td>&nbsp;</td>
            <td>Date :eg:2014-12-10</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td width="21%"><select name="cuid" size="1" class="sel-box1" id="cuid">
                <option value=""> Select User</option>
 			    		 <option value="122">    </option>
 				 		 <option value="110">akashji</option>
 				 		 <option value="101">akshayvats</option>
 				 		 <option value="30">anandrealty</option>
 				 		 <option value="117">arya</option>
 				 		 <option value="92">chananarealestate</option>
 				 		 <option value="29">demo</option>
 				 		 <option value="80">dhara</option>
 				 		 <option value="57">dreamz</option>
 				 		 <option value="112">dwarkahomes</option>
 				 		 <option value="116">fuelstore</option>
 				 		 <option value="99">funfitness</option>
 				 		 <option value="100">funworldsports</option>
 				 		 <option value="76">indialoanpoint</option>
 				 		 <option value="93">jitenderji</option>
 				 		 <option value="91">lodhirealestate</option>
 				 		 <option value="108">lokshahiparty</option>
 				 		 <option value="44">mayfair</option>
 				 		 <option value="60">ncrheights</option>
 				 		 <option value="52">omsai</option>
 				 		 <option value="104">propertyexperts</option>
 				 		 <option value="107">ramagroup</option>
 				 		 <option value="119">ramaynimohit</option>
 				 		 <option value="120">ramaynipankaj</option>
 				 		 <option value="102">rupamtaneja</option>
 				 		 <option value="97">saltroomtherapy</option>
 				 		 <option value="98">satyamrealty</option>
 				 		 <option value="90">skelectronics</option>
 				 		 <option value="114">starworld</option>
 				 		 <option value="113">sudha</option>
 				 		 <option value="87">super</option>
 				 		 <option value="121">superclean</option>
 				 		 <option value="71">suraj</option>
 				 		 <option value="106">taruntravel</option>
 				 		 <option value="83">touchpoint</option>
 				 		 <option value="103">ulmgroup</option>
 				 		 <option value="40">ultimarealty</option>
 				 		 <option value="22">unisel</option>
 				 		 <option value="118">unmeshji</option>
 				 		 <option value="95">vijayji</option>
 				 		 <option value="111">vishwast</option>
 				          </select></td>
            <td width="23%"><input name="datefrom" type="text" class="textfield1" id="datefrom" value="" readonly="readonly">
                        <img src="./reports_files/cal.gif" width="16" height="16" id="f_btn1" border="0" alt="Pick a date"></td>
            <td width="24%"><input type="file" name="ImageFile" id="ImageFile"></td>
            <td width="32%"><input name="button" type="submit" class="btn1" id="button" value="Submit">
            &nbsp;</td>
        </tr>
      </tbody></table>
      <input type="hidden" name="applly" value="1">
</form>
<table width="100%" border="0" cellpadding="3" cellspacing="0">

        <tbody><tr><td></td></tr>
                <tr> 
          <td><form name="frmSubscriber" method="post" enctype="multipart/form-data" onsubmit="makestring()">
              <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF" class="tbl1">
                <tbody><tr> 
                  <td colspan="5" align="right" bgcolor="#F0F0F0"> &nbsp;&nbsp;
                                        <span class="text10"> Page</span>:                    
                                        <strong><font color="#FF0000" style="font-size:20px;">
  1  </font></strong>
                    </td>
                </tr>
                
                <tr class="headM">
                  <th width="3%" align="center">SNo.</th>
                  <th width="38%" align="left" valign="middle">Name</th>
                  <th align="center"> Date </th>
                  <th align="center">Sent Report</th>
                  <th align="center" nowrap="nowrap">Delete</th>
                </tr> 
                                <tr> 
                  <td align="center"> 
                    1                  </td>
                  <td align="left"> 
                    unmeshji  
                      
       <br>         </td>
                  <td width="43%" align="center"> &nbsp;
                  2016-09-20</td>
                  <td width="11%" align="center">
				  <a href="http://localhost/kanhaiya/SMS%20panel/online/report/1124331854smsreport12712789-200916.csv" target="_blank">View</a></td>
                  <td width="5%" align="center"><a href="http://localhost/kanhaiya/SMS%20panel/online/admin/sent-report.php?op=del&amp;id=25&amp;page=1" onclick="return confirm(&#39;Are you Sure Want To Delete This Member Information&#39;)" class="style1"><b><font color="#339933" size="2"><img src="./reports_files/del.gif" width="12" height="12" border="0" class="text12">	</font></b></a></td>
                </tr>
                                <tr> 
                  <td align="center"> 
                    2                  </td>
                  <td align="left"> 
                    unmeshji  
                      
       <br>         </td>
                  <td width="43%" align="center"> &nbsp;
                  2016-09-14</td>
                  <td width="11%" align="center">
				  <a href="http://localhost/kanhaiya/SMS%20panel/online/report/776060559smsreport12712789-140916.csv" target="_blank">View</a></td>
                  <td width="5%" align="center"><a href="http://localhost/kanhaiya/SMS%20panel/online/admin/sent-report.php?op=del&amp;id=26&amp;page=1" onclick="return confirm(&#39;Are you Sure Want To Delete This Member Information&#39;)" class="style1"><b><font color="#339933" size="2"><img src="./reports_files/del.gif" width="12" height="12" border="0" class="text12">	</font></b></a></td>
                </tr>
                                <tr> 
                  <td align="center"> 
                    3                  </td>
                  <td align="left"> 
                    unmeshji  
                      
       <br>         </td>
                  <td width="43%" align="center"> &nbsp;
                  2016-09-16</td>
                  <td width="11%" align="center">
				  <a href="http://localhost/kanhaiya/SMS%20panel/online/report/125068947smsreport12712789-160916.csv" target="_blank">View</a></td>
                  <td width="5%" align="center"><a href="http://localhost/kanhaiya/SMS%20panel/online/admin/sent-report.php?op=del&amp;id=27&amp;page=1" onclick="return confirm(&#39;Are you Sure Want To Delete This Member Information&#39;)" class="style1"><b><font color="#339933" size="2"><img src="./reports_files/del.gif" width="12" height="12" border="0" class="text12">	</font></b></a></td>
                </tr>
                                <tr> 
                  <td align="center"> 
                    4                  </td>
                  <td align="left"> 
                    unmeshji  
                      
       <br>         </td>
                  <td width="43%" align="center"> &nbsp;
                  2016-09-17</td>
                  <td width="11%" align="center">
				  <a href="http://localhost/kanhaiya/SMS%20panel/online/report/553157042smsreport12712789-170916.csv" target="_blank">View</a></td>
                  <td width="5%" align="center"><a href="http://localhost/kanhaiya/SMS%20panel/online/admin/sent-report.php?op=del&amp;id=28&amp;page=1" onclick="return confirm(&#39;Are you Sure Want To Delete This Member Information&#39;)" class="style1"><b><font color="#339933" size="2"><img src="./reports_files/del.gif" width="12" height="12" border="0" class="text12">	</font></b></a></td>
                </tr>
                                <tr> 
                  <td align="center"> 
                    5                  </td>
                  <td align="left"> 
                    unmeshji  
                      
       <br>         </td>
                  <td width="43%" align="center"> &nbsp;
                  2016-09-21</td>
                  <td width="11%" align="center">
				  <a href="http://localhost/kanhaiya/SMS%20panel/online/report/7097962smsreport12712789-210916.csv" target="_blank">View</a></td>
                  <td width="5%" align="center"><a href="http://localhost/kanhaiya/SMS%20panel/online/admin/sent-report.php?op=del&amp;id=29&amp;page=1" onclick="return confirm(&#39;Are you Sure Want To Delete This Member Information&#39;)" class="style1"><b><font color="#339933" size="2"><img src="./reports_files/del.gif" width="12" height="12" border="0" class="text12">	</font></b></a></td>
                </tr>
                                <tr> 
                  <td align="center"> 
                    6                  </td>
                  <td align="left"> 
                    unmeshji  
                      
       <br>         </td>
                  <td width="43%" align="center"> &nbsp;
                  2016-09-21</td>
                  <td width="11%" align="center">
				  <a href="http://localhost/kanhaiya/SMS%20panel/online/report/1840055985smsreport12712789-210916-1.csv" target="_blank">View</a></td>
                  <td width="5%" align="center"><a href="http://localhost/kanhaiya/SMS%20panel/online/admin/sent-report.php?op=del&amp;id=30&amp;page=1" onclick="return confirm(&#39;Are you Sure Want To Delete This Member Information&#39;)" class="style1"><b><font color="#339933" size="2"><img src="./reports_files/del.gif" width="12" height="12" border="0" class="text12">	</font></b></a></td>
                </tr>
                                <tr> 
                  <td align="center"> 
                    7                  </td>
                  <td align="left"> 
                    unmeshji  
                      
       <br>         </td>
                  <td width="43%" align="center"> &nbsp;
                  2016-09-22</td>
                  <td width="11%" align="center">
				  <a href="http://localhost/kanhaiya/SMS%20panel/online/report/1074299158smsreport12712789-220916.csv" target="_blank">View</a></td>
                  <td width="5%" align="center"><a href="http://localhost/kanhaiya/SMS%20panel/online/admin/sent-report.php?op=del&amp;id=31&amp;page=1" onclick="return confirm(&#39;Are you Sure Want To Delete This Member Information&#39;)" class="style1"><b><font color="#339933" size="2"><img src="./reports_files/del.gif" width="12" height="12" border="0" class="text12">	</font></b></a></td>
                </tr>
                                <tr> 
                  <td align="center"> 
                    8                  </td>
                  <td align="left"> 
                    unmeshji  
                      
       <br>         </td>
                  <td width="43%" align="center"> &nbsp;
                  2016-09-22</td>
                  <td width="11%" align="center">
				  <a href="http://localhost/kanhaiya/SMS%20panel/online/report/1983366021smsreport12712789-220916-1.csv" target="_blank">View</a></td>
                  <td width="5%" align="center"><a href="http://localhost/kanhaiya/SMS%20panel/online/admin/sent-report.php?op=del&amp;id=32&amp;page=1" onclick="return confirm(&#39;Are you Sure Want To Delete This Member Information&#39;)" class="style1"><b><font color="#339933" size="2"><img src="./reports_files/del.gif" width="12" height="12" border="0" class="text12">	</font></b></a></td>
                </tr>
                                <tr> 
                  <td align="center"> 
                    9                  </td>
                  <td align="left"> 
                    unmeshji  
                      
       <br>         </td>
                  <td width="43%" align="center"> &nbsp;
                  2016-09-23</td>
                  <td width="11%" align="center">
				  <a href="http://localhost/kanhaiya/SMS%20panel/online/report/601242213smsreport12712789-230916.csv" target="_blank">View</a></td>
                  <td width="5%" align="center"><a href="http://localhost/kanhaiya/SMS%20panel/online/admin/sent-report.php?op=del&amp;id=33&amp;page=1" onclick="return confirm(&#39;Are you Sure Want To Delete This Member Information&#39;)" class="style1"><b><font color="#339933" size="2"><img src="./reports_files/del.gif" width="12" height="12" border="0" class="text12">	</font></b></a></td>
                </tr>
                                <tr> 
                  <td align="center"> 
                    10                  </td>
                  <td align="left"> 
                    unmeshji  
                      
       <br>         </td>
                  <td width="43%" align="center"> &nbsp;
                  2016-09-24</td>
                  <td width="11%" align="center">
				  <a href="http://localhost/kanhaiya/SMS%20panel/online/report/72812200smsreport12712789-240916.csv" target="_blank">View</a></td>
                  <td width="5%" align="center"><a href="http://localhost/kanhaiya/SMS%20panel/online/admin/sent-report.php?op=del&amp;id=34&amp;page=1" onclick="return confirm(&#39;Are you Sure Want To Delete This Member Information&#39;)" class="style1"><b><font color="#339933" size="2"><img src="./reports_files/del.gif" width="12" height="12" border="0" class="text12">	</font></b></a></td>
                </tr>
                                <tr> 
                  <td align="center"> 
                    11                  </td>
                  <td align="left"> 
                    unmeshji  
                      
       <br>         </td>
                  <td width="43%" align="center"> &nbsp;
                  2016-09-26</td>
                  <td width="11%" align="center">
				  <a href="http://localhost/kanhaiya/SMS%20panel/online/report/138613930smsreport12712789-260916.csv" target="_blank">View</a></td>
                  <td width="5%" align="center"><a href="http://localhost/kanhaiya/SMS%20panel/online/admin/sent-report.php?op=del&amp;id=35&amp;page=1" onclick="return confirm(&#39;Are you Sure Want To Delete This Member Information&#39;)" class="style1"><b><font color="#339933" size="2"><img src="./reports_files/del.gif" width="12" height="12" border="0" class="text12">	</font></b></a></td>
                </tr>
                                <tr> 
                  <td align="center"> 
                    12                  </td>
                  <td align="left"> 
                    unmeshji  
                      
       <br>         </td>
                  <td width="43%" align="center"> &nbsp;
                  2016-09-26</td>
                  <td width="11%" align="center">
				  <a href="http://localhost/kanhaiya/SMS%20panel/online/report/37921025smsreport12712789-260916-1.csv" target="_blank">View</a></td>
                  <td width="5%" align="center"><a href="http://localhost/kanhaiya/SMS%20panel/online/admin/sent-report.php?op=del&amp;id=36&amp;page=1" onclick="return confirm(&#39;Are you Sure Want To Delete This Member Information&#39;)" class="style1"><b><font color="#339933" size="2"><img src="./reports_files/del.gif" width="12" height="12" border="0" class="text12">	</font></b></a></td>
                </tr>
                                <tr> 
                  <td align="center"> 
                    13                  </td>
                  <td align="left"> 
                    unmeshji  
                      
       <br>         </td>
                  <td width="43%" align="center"> &nbsp;
                  2016-09-27</td>
                  <td width="11%" align="center">
				  <a href="http://localhost/kanhaiya/SMS%20panel/online/report/1091114553smsreport12712789-270916.csv" target="_blank">View</a></td>
                  <td width="5%" align="center"><a href="http://localhost/kanhaiya/SMS%20panel/online/admin/sent-report.php?op=del&amp;id=37&amp;page=1" onclick="return confirm(&#39;Are you Sure Want To Delete This Member Information&#39;)" class="style1"><b><font color="#339933" size="2"><img src="./reports_files/del.gif" width="12" height="12" border="0" class="text12">	</font></b></a></td>
                </tr>
                              </tbody></table>
             
            </form></td>
        </tr>
              </tbody></table>    