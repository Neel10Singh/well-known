<?php error_reporting(); ?>
<?php $link = $this->setting_model->get_all_setting();?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php  echo $RESULT[0]->meta_title ; ?></title>
<meta name="description" content="<?php  echo $RESULT[0]->meta_description ; ?>">
<meta name="keywords" content="<?php  echo $RESULT[0]->meta_keyword; ?>">
<link rel="canonical" href="<?php  echo $RESULT[0]->canonical; ?>">
 <?php $this->load->view('front/layout/head'); ?>

<body>
    <div class="page">
        <header id="masthead" class="header ttm-header-style-classic-box ttm-header-overlay">
            <?php $this->load->view('front/layout/top-menu'); ?>
            <?php $this->load->view('front/layout/header'); ?>
            
        </header>
        <div class="ttm-page-title-row text-center">
            <div class="title-box text-center">
                <div class="container">
                    <div class="page-title-heading">
                        <h1 class="title"><?php echo $RESULT[0]->title; ?></h1>
                    </div>
                </div> 
            </div>
        </div>
         <div class="site-main">
            <!--contact-intro-section-start-->
            <section class="ttm-row contact-details-section clearfix">
                <div class="container">
                  
                    <div class="row mt-25">
                        <div class="col-md-4">
                            <div class="featured-box style2 left-icon icon-align-top">
                                <div class="featured-icon">
                                    <div class="ttm-icon ttm-icon_element-size-sm ttm-icon_element-color-skincolor ttm-icon_element-style-round">
                                        <i class="ti ti-headphone-alt"></i>
                                    </div>
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h5>Phone</h5>
                                    </div>
                                    <div class="featured-desc">
                                        <p>   <a href="tel:<?php echo $link[0]->phone; ?>">  +<?php echo $link[0]->phone ; ?></a>
                            <br> <a href="tel:<?php echo $link[0]->phone2; ?>">  +<?php echo $link[0]->phone2 ; ?></a>
                            <br> <a href="tel:<?php echo $link[0]->phone3; ?>">  +<?php echo $link[0]->phone3 ; ?></a></p>
                                    </div>
                                </div>
                            </div><!-- featured-box end-->
                        </div>
                        <div class="col-md-4">
                            <div class="featured-box style2 left-icon icon-align-top">
                                <div class="featured-icon">
                                    <div class="ttm-icon ttm-icon_element-size-sm ttm-icon_element-color-skincolor ttm-icon_element-style-round">
                                        <i class="ti ti-location-pin"></i>
                                    </div>
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h5>Address</h5>
                                    </div>
                                    <div class="featured-desc">
                                        <p><a><?php echo $link[0]->address_content; ?></a></p>
                                    </div>
                                </div>
                            </div><!-- featured-box end-->
                        </div>
                        <div class="col-md-4">
                            <div class="featured-box style2 left-icon icon-align-top">
                                <div class="featured-icon">
                                    <div class="ttm-icon ttm-icon_element-size-sm ttm-icon_element-color-skincolor ttm-icon_element-style-round">
                                        <i class="ti ti-email"></i>
                                    </div>
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h5>E-Mail</h5>
                                    </div>
                                    <div class="featured-desc">
                                        <p> <a href="mailto:<?php echo $link[0]->email; ?>"> <?php echo $link[0]->email; ?></a></p>
                                    </div>
                                </div>
                            </div><!-- featured-box end-->
                        </div>
                    </div>
                </div>
            </section>
            <!--contact-intro-section-end-->
            <section class="ttm-row contact-form-section2 bg-layer break-991-colum clearfix">
                <div class="container">
                   <div class="row res-1199-mlr-15">
                        <div class="col-md-4 col-lg-4">
                            <!-- col-bg-img-three -->
                            <div class="col-bg-img-three ttm-col-bgimage-yes ttm-bg">
                                <div class="ttm-col-wrapper-bg-layer ttm-bg-layer"></div>
                                <div class="layer-content"></div>
                            </div><!-- col-bg-img-three end-->
                            <img src="<?php echo base_url('assets/front/') ; ?>images/bg-image/col-bgimage-3.jpg" class="ttm-equal-height-image" alt="bg-image">
                        </div>
                        <div class="col-md-8 col-lg-8">
                            <div class="padding-12 box-shadow">
                                <!-- section title -->
                                <div class="section-title clearfix mb-30">
                                    <h3 class="title">Get The Party Started</h3>
                                    <p>As the premier event planning company in the area. Each event and client is unique and we believe our services should be as well.</p>
                                </div><!-- section title end -->
                                <?php echo $this->session->flashdata('msg'); ?>
                                <form id="" class="row contactform wrap-form clearfix" method="post" action="#" n>
                                    <label class="col-md-6">
                                        <i class="ti ti-user"></i>
                                        <span class="ttm-form-control"><input class="text-input" name="name" type="text" value="" placeholder="Your Name:*" required="required"></span>
                                    </label>
                                    <label class="col-md-6">
                                        <i class="ti ti-email"></i>
                                        <span class="ttm-form-control"><input class="text-input" name="email" type="text" value="" placeholder="Your email-id:*" required="required"></span>
                                    </label>
                                     <label class="col-md-6">
                                        <i class="ti ti-location-pin"></i>
                                        <span class="ttm-form-control"><input class="text-input" name="subject" type="text" value="" placeholder="Subject" required="required"></span>
                                    </label>
                                    <label class="col-md-6">
                                        <i class="ti ti-mobile"></i>
                                        <span class="ttm-form-control"><input class="text-input" name="phone" type="text" value="" placeholder="Your Number:*" required="required"></span>
                                    </label>
                                    <label class="col-md-12">
                                        <i class="ti ti-comment"></i>
                                        <span class="ttm-form-control"><textarea class="text-area" name="message" placeholder="Your Message:*" required="required"></textarea></span>
                                    </label>
                                    <input name="submit" type="submit" value="Make a Reservation" class="ttm-btn ttm-btn-size-md ttm-btn-shape-round ttm-btn-style-fill ttm-btn-color-skincolor mt-20" id="submit" title="Make a Reservation">
                               </form>
                            </div>
                        </div>
                    </div> 
                </div>
            </section>

            <!--CTA-section-start-->
            <section class="ttm-row cta-section style2 ttm-bgcolor-skincolor clearfix">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="featured-box iconalign-before-heading">
                                <div class="featured-content">
                                    <div class="featured-icon">
                                        <div class="ttm-icon ttm-icon_element-color-white ttm-icon_element-size-sm"> 
                                            <i class="ti ti-headphone"></i>
                                        </div>
                                    </div>
                                    <div class="featured-title">
                                        <h6 class="ttm-textcolor-white">If you Have Any Questions Schedule an Booking</h6>
                                        <h5 class="ttm-textcolor-white">With our Team or call Us On <a href="tel:<?php echo $link[0]->phone; ?>">  +<?php echo preg_replace('/\d{2}/', '$0-', str_replace('.', null, trim($link[0]->phone)), 2); ; ?></a></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-round ttm-btn-style-border ttm-btn-color-white pull-right res-mt20-767" href="#">Booking Now!</a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
 <?php $this->load->view('front/layout/footer'); ?>
    </div>
    <?php $this->load->view('front/layout/footer-js'); ?>
</body>
</html>

