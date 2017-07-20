<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="content">
	<h1>Offers</h1>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="100%" colspan="3" valign="top">
	<?php foreach($offers as $offer): ?>
	<div class="offer" style="background-image:url(<?php echo base_url(); ?>assets/images/offer-bg<?php echo rand(1,6); ?>.jpg)">
		<h3><?php echo $offer['name']; ?></h3>
		<div style="padding:0 25px 0 15px;"><?php echo $offer['description']; ?></div>
	</div>
	<?php endforeach; ?>
     </td>
    </tr>
</table>
</div>
<div style="clear:both">&nbsp;</div>