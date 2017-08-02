<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="homebg2">
  <div class="home_login">
	<?php if(!$logged): ?>
	  <?php if(validation_errors()){ ?><span style="color:red; font-size:9px"><?php echo validation_errors(); ?></span><?php } ?>
	  <?php if($this->session->flashdata('login_error')){ ?><span style="color:red; font-size:9px"><?php echo $this->session->flashdata('login_error'); ?></span><?php }?>
	  <?php echo form_open('welcome/login', array('name'=>'login','onsubmit' => 'return checkuser()')); ?>
	  <table width="100%" border="0" cellspacing="10" cellpadding="0">
		<tbody>
		  <tr>
			<td>User ID: </td>
			<td><label>
			  <input name="username" type="text" class="textfield1" id="username" value="<?php echo set_value('username'); ?>">
			  </label></td>
		  </tr>
		  <tr>
			<td>Password:</td>
			<td><input name="lpassword" type="password" class="textfield1" id="lpassword" value=""></td>
		  </tr>
		  <tr>
			<td>&nbsp;</td>		
			<td><label>
			  <input type="image" name="imageField" id="imageField" src="<?php echo base_url(); ?>assets/images/btn1.jpg">
			  </label></td>
		  </tr>
		  <tr>
			<!--<td><input name="utype" type="radio" value="user" checked="checked">
			  User &nbsp;
			  <input name="utype" type="radio" value="reseller">
			  ReSeller </td>
			 <td>&nbsp;</td>
			 <td><a href="<?php echo base_url(); ?>forgotpassword">Forgot Your Password?</a></td>-->
		  </tr>
		</tbody>
	  </table>
	  </form>
	  <?php else: ?>
		<a class="btn btn-primary" href="<?php echo $dashboard_link; ?>">Go to Dashboard</a>
	  <?php endif; ?>
  </div>
</div>
<script>
function checkuser()
{
	var name = document.getElementById('username').value;
	if(name != 'admin'){
		 alert('You are not allowed to login with this form');
		 return false;
	}
	return true;
}
</script>