<?php $all_users = $this->user_model->get_all_users_by_ststus('all'); ?>
<?php $module =$this->uri->segment(2); ?>

<aside class="main-sidebar">

  <section class="sidebar">
    <ul class="sidebar-menu">
      <li class="active treeview"> <a href="<?php echo base_url('admin/dashboard'); ?>"> <i class="fa fa-home"></i> <span>Dashboard</span> </a> </li>
      <?php   $ADMIN_AUTH = $this->session->userdata('ADMIN_AUTH'); 
              $subadminauthority=  explode('@',$ADMIN_AUTH ); ?>
     
          <li class="treeview"> <a href="<?php echo base_url('admin/user/all_mail'); ?>"> <i class="fa fa-envelope" aria-hidden="true"></i><span>All Mail</span> </a>
          <li class="treeview"> <a href="<?php echo base_url('admin/user/join_wait_list'); ?>"> <i class="fa fa-envelope" aria-hidden="true"></i><span>Join Wait List</span> </a>
          <li class="treeview"> <a href="<?php echo base_url('admin/user/listing'); ?>"> <i class="fa fa-users" aria-hidden="true"></i><span>All User</span> </a>
             <li class="treeview"> <a href="<?php echo base_url('admin/booking/review'); ?>"> <i class="fa fa-cog" aria-hidden="true"></i><span>All Review</span> </a>
          <li class="treeview"> <a href="<?php echo base_url('admin/booking/listing'); ?>"> <i class="fa fa-cog" aria-hidden="true"></i><span>All Booking</span> </a>
       
          <li class="treeview"> <a href="<?php echo base_url('admin/payment/listing'); ?>"> <i class="fa fa-cog" aria-hidden="true"></i><span>All Payment</span> </a>
   
      <li class="treeview <?php echo($module=='service')?'active':'' ?>"> <a href="#"> <i class="fa fa-wrench" aria-hidden="true"></i>
       <span>Manage Services </span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
        <li><a href="<?php echo base_url('admin/service/listing'); ?>"><i class="fa fa-circle-o"></i>All Services</a></li>
        <li><a href="<?php echo base_url('admin/service/add_new'); ?>"><i class="fa fa-circle-o"></i>Add New  Services</a></li>
        </ul>
      </li> 
  <li class="treeview <?php echo($module=='city')?'active':'' ?>"> <a href="#"> <i class="fa fa-wrench" aria-hidden="true"></i>
       <span>Manage City </span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
        <li><a href="<?php echo base_url('admin/city/listing'); ?>"><i class="fa fa-circle-o"></i>All  City</a></li>
        <li><a href="<?php echo base_url('admin/city/add_new'); ?>"><i class="fa fa-circle-o"></i>Add New  City</a></li>
        </ul>
      </li>
      <li class="treeview <?php echo($module=='location')?'active':'' ?>"> <a href="#"> <i class="fa fa-wrench" aria-hidden="true"></i>
       <span>Manage Location </span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
        <li><a href="<?php echo base_url('admin/location/listing'); ?>"><i class="fa fa-circle-o"></i>All  Location</a></li>
        <li><a href="<?php echo base_url('admin/location/add_new'); ?>"><i class="fa fa-circle-o"></i>Add New  Location</a></li>
        </ul>
      </li>
      <li class="treeview <?php echo($module=='theatre')?'active':'' ?>"> <a href="#"> <i class="fa fa-wrench" aria-hidden="true"></i>
       <span>Manage Theatre/Resturant </span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
        <li><a href="<?php echo base_url('admin/theatre/listing'); ?>"><i class="fa fa-circle-o"></i>All  Theatre</a></li>
        <li><a href="<?php echo base_url('admin/theatre/add_new'); ?>"><i class="fa fa-circle-o"></i>Add New  Theatre</a></li>
        </ul>
      </li> 
      <li class="treeview <?php echo($module=='cake')?'active':'' ?>"> <a href="#"> <i class="fa fa-wrench" aria-hidden="true"></i>
       <span>Manage Cake </span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
        <li><a href="<?php echo base_url('admin/cake/listing'); ?>"><i class="fa fa-circle-o"></i>All  Cake</a></li>
        <li><a href="<?php echo base_url('admin/cake/add_new'); ?>"><i class="fa fa-circle-o"></i>Add New  Cake</a></li>
        </ul>
      </li>
      <li class="treeview <?php echo($module=='extra_decoration')?'active':'' ?>"> <a href="#"> <i class="fa fa-wrench" aria-hidden="true"></i>
       <span>Manage Extra Decoration </span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
        <li><a href="<?php echo base_url('admin/extra_decoration/listing'); ?>"><i class="fa fa-circle-o"></i>All  Extra Decoration</a></li>
        <li><a href="<?php echo base_url('admin/extra_decoration/add_new'); ?>"><i class="fa fa-circle-o"></i>Add New  Extra Decoration</a></li>
        </ul>
      </li>
      <li class="treeview <?php echo($module=='gift')?'active':'' ?>"> <a href="#"> <i class="fa fa-wrench" aria-hidden="true"></i>
       <span>Manage Gift </span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
        <li><a href="<?php echo base_url('admin/gift/listing'); ?>"><i class="fa fa-circle-o"></i>All   Gift</a></li>
        <li><a href="<?php echo base_url('admin/gift/add_new'); ?>"><i class="fa fa-circle-o"></i>Add New   Gift</a></li>
        </ul>
      </li>
      <li class="treeview <?php echo($module=='gallery')?'active':'' ?>"> <a href="#"> <i class="fa fa-wrench" aria-hidden="true"></i>
       <span>Manage Gallery </span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
        <li><a href="<?php echo base_url('admin/gallery/listing'); ?>"><i class="fa fa-circle-o"></i>All  Gallery</a></li>
        <li><a href="<?php echo base_url('admin/gallery/add_new'); ?>"><i class="fa fa-circle-o"></i>Add New  Gallery</a></li>
        </ul>
      </li> 
      <li class="treeview <?php echo($module=='page')?'active':'' ?>"> <a href="#"> <i class="fa fa-wrench" aria-hidden="true"></i>
       <span>Manage page </span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
        <li><a href="<?php echo base_url('admin/page/listing'); ?>"><i class="fa fa-circle-o"></i>All  page</a></li>
        <li><a href="<?php echo base_url('admin/page/add_new'); ?>"><i class="fa fa-circle-o"></i>Add New  page</a></li>
        </ul>
      </li>
      <!--<li class="treeview <?php echo($module=='page')?'active':'' ?>"> <a href="#"> <i class="fa fa-wrench" aria-hidden="true"></i>-->
      <!-- <span>Manage Coupon </span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>-->
      <!--  <ul class="treeview-menu">-->
      <!--  <li><a href="<?php echo base_url('admin/Coupon/listing'); ?>"><i class="fa fa-circle-o"></i>All  Coupon</a></li>-->
      <!--  <li><a href="<?php echo base_url('admin/Coupon/add_new'); ?>"><i class="fa fa-circle-o"></i>Add New  Coupon</a></li>-->
      <!--  </ul>-->
      <!--</li> -->
      <li class="treeview <?php echo($module=='faq')?'active':'' ?>"> <a href="#"> <i class="fa fa-wrench" aria-hidden="true"></i>
       <span>Manage faq </span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
        <li><a href="<?php echo base_url('admin/faq/listing'); ?>"><i class="fa fa-circle-o"></i>All  faq</a></li>
        <li><a href="<?php echo base_url('admin/faq/add_new'); ?>"><i class="fa fa-circle-o"></i>Add New  faq</a></li>
        </ul>
      </li>
      <li class="treeview <?php echo($module=='slider')?'active':'' ?>"> <a href="#"> <i class="fa fa-wrench" aria-hidden="true"></i>
       <span>Manage Slider </span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
        <li><a href="<?php echo base_url('admin/slider/listing'); ?>"><i class="fa fa-circle-o"></i>All  slider</a></li>
        <!--<li><a href="<?php echo base_url('admin/slider/add_new'); ?>"><i class="fa fa-circle-o"></i>Add New  slider</a></li>-->
        </ul>
      </li>
    
      <li class="treeview"> <a href="<?php echo base_url('admin/setting/edit/1'); ?>"> <i class="fa fa-cog" aria-hidden="true"></i><span>Setting</span> </a>
     
      </li>
    </ul>
  </section>
</aside>
