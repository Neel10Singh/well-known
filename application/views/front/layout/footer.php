<?php $link = $this->setting_model->get_all_setting();?>
  <!--footer--> 
        <footer class="footer widget-footer ttm-bgcolor-black ttm-bg ttm-bgimage-yes clearfix">
            <div class="ttm-row-wrapper-bg-layer ttm-bg-layer"></div>
            <div class="second-footer">
                <div class="container">
                    <div class="second-footer-inner">
                        <div class="row">
                            <div class="widget-area col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                <div class="widget widget-out-link clearfix">
                                     <div class="company-info">
                                        
                                                <a href="<?php echo base_url() ;  ?>" >
                                             <?php if($link[0]->logo ){ ?>
                                              <img src="<?php echo base_url('uploads/').$link[0]->logo ?>"  alt=" <?php echo $link[0]->title ;  ?>" style="width:50%">
                                            <?php } else{  ?>
                                              <?php echo $link[0]->title ;  ?>
                                            <?php } ?>
                                             </a>
                                        </div>
                                           <div class="ttm-social-link-wrapper">
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
                           
                            <div class="widget-area col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                <div class="widget widget_nav_menu clearfix">
                                    <h4 class="widget-title">Useful Links</h4>
                                    <ul class="menu-footer-services">
                                        <li >
                                            <a href="<?php echo base_url('') ?>" >Home</a>
                                        </li>
                                        <li >
                                            <a href="<?php echo base_url('about-us') ?>" >About Us</a>
                                        </li>
                                        <li >
                                            <a href="<?php echo base_url('gallery') ?>" >Gallery</a>
                                        </li> 

                                        <li >
                                            <a href="<?php echo base_url('contact-us') ?>" >Contact Us</a>
                                        </li>
                                                                                  <li >
                                            <a href="<?php echo base_url('city') ?>" >Book Now</a>
                                        </li>
                                      
                                      
                                    </ul>
                                </div>
                            </div>
                            
                            
                          
                            <div class="widget-area col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                <div class="widget widget-out-link clearfix ">
                                    <h4 class="widget-title">Important links</h4>
                                    <ul class="widget-text">
                                          <li >
                                            <a href="<?php echo base_url('faq') ?>" >Frequently Asked Questions</a>
                                        </li>
                                        <li >
                                            <a href="<?php echo base_url('join-wait-list') ?>" >Join Wait List</a>
                                        </li>
                                        <li><a href="<?php echo base_url('privacy-policy') ?>" >Privacy Policy</a></li>
                                        <li><a href="<?php echo base_url('refund-policy') ?>" >Refund Policy</a></li>
                                        <li><a href="<?php echo base_url('terms-conditions') ?>" >Terms & Conditions</a></li>
                                    </ul>
                                </div>
                            </div>
                            
                             <div class="widget-area col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                <div class="widget widget-out-link clearfix">
                                    <h4 class="widget-title">Contact Us</h4>
                                    <ul class="widget-contact">
                                        <li><i class="fa fa-map-marker"></i><?php echo $link[0]->address_content ;  ?></li>
                                        <li><i class="fa fa-phone"></i>+<?php echo $link[0]->phone ;  ?></li>
                                        <li><i class="fa fa-envelope-o"></i><a href="mailto:<?php echo $link[0]->email ;  ?>"><?php echo $link[0]->email ;  ?></a></li>
                            
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom-footer-text">
                <div class="container-fluid">
                    <div class="row">
                 
                        <div class="col-sm-6 col-xs-12 col-md-7 ttm-footer2-right">
                        
                            <P class="text-center"><?php echo $link[0]->copyright; ?></P>
                        </div>
                        <div class="col-sm-6 col-xs-12 col-md-5 ttm-footer2-right">
                            
                            <a href="https://www.chahartechnologies.com" target="_blank" style="color: #ffff">Website Developed by Chahar Technologies </a>
                         
                           
                        </div>
                    </div>
                </div>
            </div>
        </footer>      
        <!--footer-END-->
<footer>
<a href="https://api.whatsapp.com/send?phone=<?php echo $link[0]->whatapp; ?>&amp;text=Hello, Welcome to <?php echo $link[0]->title; ?>" class="float-right hidden-xs" target="_blank" title="message us">

<div class="icon"> <i class="fa fa-whatsapp my-float"></i></div>

</a>
   