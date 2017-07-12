<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="h-content">
  <div class="h-content-inner">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tbody>
        <tr>
          <td width="37%"><h1 align="center" style="font-size:25px; line-height:30px;">THERE IS A BETTER WAY</h1>
            <h1 align="center" style="font-size:45px; line-height:50px;">TO DO MARKETING</h1>
            <h2 align="center">Your business deserve it, we help you do it.</h2>
            <p>&nbsp;</p>
            <p align="center"><img src="<?php echo base_url(); ?>assets/images/mobile-home.png" alt="sms" width="370" height="201"></p></td>
          <td width="63%" align="right" valign="bottom"><img src="<?php echo base_url(); ?>assets/images/home1.png" alt="sms" width="519" height="344"></td>
        </tr>
        <tr>
          <td>
		  <?php if(!$logged): ?>
		  <div class="register"><a href="<?php echo base_url(); ?>register"><img src="<?php echo base_url(); ?>assets/images/register_now1.png" alt="register" width="250" height="240"></a></div>
		  <?php else: ?>
		  
		  <?php endif; ?></td>
          <td align="right" valign="bottom">&nbsp;</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
