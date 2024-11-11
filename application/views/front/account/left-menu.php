<?php $act = $this->uri->segment(1); ?>
<div class="ttm-tabs element-tab-style-vertical ">
<ul class="tabs">
<li><a href="<?php echo base_url('dashboard') ;?>" class="tab <?php echo($act=='dashboard')?'active':'' ?>">Dashboard </a></li>
<li><a href="<?php echo base_url('booking') ;?>" class="tab <?php echo($act=='booking')?'active':'' ?>">Bookings </a> </li>
<li><a href="<?php echo base_url('profile ') ;?>" class="tab <?php echo($act=='profile')?'active':'' ?>">Settings </a></li>
<li><a href="<?php echo base_url('user/logout/ ') ;?>" class="tab <?php echo($act=='profile')?'active':'' ?>">Logout </a></li>
</ul>    
</div>
