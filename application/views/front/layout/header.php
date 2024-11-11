
<?php $user_id = $this->session->userdata('USER_ID'); ?>
<?php $userdata = $this->user_model->get_user_by_id($user_id);?>
<?php $link = $this->setting_model->get_all_setting();?>
<?php $cart_content = $this->cart->contents(); ?>

  <div id="ttm-header-wrap">
                <!-- ttm-stickable-header-w -->
                <div id="ttm-stickable-header-w" class="ttm-stickable-header-w clearfix">
                    <div id="site-header-menu" class="site-header-menu">
                        <div class="site-header-menu-inner ttm-stickable-header">
                            <div class="container">
                                <div class="site-header-main">
                                    <!-- site-branding -->
                                    <div class="site-branding">
                                        <a href="<?php echo base_url() ;  ?>" class="theme-header-logo">
                                             <?php if($link[0]->logo ){ ?>
                                              <img src="<?php echo base_url('uploads/').$link[0]->logo ?>" alt=" <?php echo $link[0]->title ;  ?>">
                                            <?php } else{  ?>
                                              <?php echo $link[0]->title ;  ?>
                                            <?php } ?>
                                             </a>
                                    </div><!-- site-branding end -->
                                    <!--site-navigation -->
                                    <div id="site-navigation" class="site-navigation">
                                        <!-- header-icins -->
                               
                                        <div class="ttm-menu-toggle">
                                            <input type="checkbox" id="menu-toggle-form" />
                                            <label for="menu-toggle-form" class="ttm-menu-toggle-block">
                                                <span class="toggle-block toggle-blocks-1"></span>
                                                <span class="toggle-block toggle-blocks-2"></span>
                                                <span class="toggle-block toggle-blocks-3"></span>
                                            </label>
                                        </div>
                                        <nav id="menu" class="menu">
                                            <ul class="dropdown">
                                                <li class="active"><a href="<?php echo base_url('') ?>">Home</a>
                                                  
                                                </li>
                                                <li><a href="<?php echo base_url('about-us') ?>">About Us</a></li>
                                                <li><a href="<?php echo base_url('city') ?>">Book Now</a></li>
                                                <li><a href="<?php echo base_url('gallery') ?>">Gallery</a></li>
                                                <li><a href="<?php echo base_url('contact-us') ?>">Contact Us</a></li>
                                                <li><a href="<?php echo base_url('faq') ?>">FAQ</a></li>
                                                <li><a href="<?php echo base_url('join-wait-list') ?>">Join Wait list</a></li>
                                                <?php if(empty($user_id)){ ?>
                                                 <li><a href="<?php echo base_url('login'); ?>" class="acc-ti">
                                                    <span class="user-icon"><i class="feather-user"></i></span>
                                                    <span class="user-title">Login</span>
                                                </a></li>
                                                <?php }else{ ?>
                                                   <li> <a href="<?php echo base_url('user/profile'); ?>" class="acc-ti">
                                                    <span class="user-icon"><i class="feather-user"></i></span>
                                                    <span class="user-title">Account</span>
                                                </a></li>
                                                <?php } ?>
                                                    </ul>
                                        </nav>
                                    </div>
                                    <!--site-navigation end-->
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div><!-- ttm-stickable-header-w end-->
            </div>
