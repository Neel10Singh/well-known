
<?php $user_id = $this->session->userdata('USER_ID'); ?>
<?php $link = $this->setting_model->get_all_setting();?>
<?php $userdata = $this->user_model->get_user_by_id($user_id);?>
 <div class="ttm-topbar-wrapper ttm-bgcolor-skincolor ttm-textcolor-white clearfix">
                <div class="container">
                    <div class="ttm-topbar-content">
                        <ul class="top-contact text-left">
                           
                            <li class="list-inline-item"><strong><i class="fa fa-phone"></i>Call :</strong>
                         <a href="tel:<?php echo $link[0]->phone; ?>">  +<?php echo $link[0]->phone; ; ?></a>&nbsp; 
                         <a href="tel:<?php echo $link[0]->phone2; ?>">  +<?php echo $link[0]->phone2; ; ?></a>&nbsp; 
                         <a href="tel:<?php echo $link[0]->phone3; ?>">  +<?php echo $link[0]->phone3; ; ?></a>&nbsp; 
                            </li>
                        </ul>
                        <div class="topbar-right text-right">
                            <ul class="top-contact">
                                <li class="list-inline-item"><strong><i class="fa fa-envelope-o"></i>Email :</strong>
                                    <a href="mailto:<?php echo $link[0]->email; ?>"> <?php echo $link[0]->email; ?></a>
                                </li>
                            </ul>
                            <div class="ttm-social-links-wrapper list-inline">
                                <ul class="social-icons">
                                    <li><a href="<?php echo $link[0]->facebook_link; ?>"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li><a href="<?php echo $link[0]->twitter_link; ?>"><i class="fa fa-twitter"></i></a>
                                    </li> 
                                    <li><a href="<?php echo $link[0]->instagram_link; ?>"><i class="fa fa-instagram"></i></a>
                                    </li>
                                  
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
