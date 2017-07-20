<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="content">
<h1>Notification List</h1>
<div class="row">
   <div class="col-md-12">
	<div id="accordion" role="tablist" aria-multiselectable="true">
	  <?php foreach($alldata as $data): ?>
	  <div class="card">
		<div class="card-header" role="tab" id="heading<?php echo $data['id'];?>">
		  <h5 class="mb-0">
			<a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $data['id'];?>" aria-expanded="false" aria-controls="collapse<?php echo $data['id'];?>">
			  <?php echo $data['name'];?>
			</a><?php if(in_array($data['id'],$unreads)) { ?><span class="badge badge-danger">New</span><?php } ?>
		  </h5>
		</div>
		<div id="collapse<?php echo $data['id'];?>" class="collapse" role="tabpanel" aria-labelledby="heading<?php echo $data['id'];?>">
		  <div class="card-block">
			<?php echo $data['description'];?>
		  </div>
		</div>
	  </div>
	  <?php endforeach; ?>	  
	</div>
  </div>
</div>
</div>