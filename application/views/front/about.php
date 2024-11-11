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
            <section class="ttm-row ttm-bgcolor-white about-intro-section clearfix">
                <div class="container">
                    <div class="row text-center">
                        <div class="col-lg-12">
                            <div class=" section-title clearfix">
                                <h4>WELCOME TO</h4>
                                <h2 class="title">About The Party Quest</h2>
                                <div class="title-img"><img src="<?php echo base_url('assets/front/images/'); ?>ds-1.png" alt="underline-img"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="ttm-tabs element-tab-style-horizontal width-shape-line clearfix">
                                <!-- tabs -->
                                <ul class="tabs connect-tabs clearfix mb-20">
                                    <li class="tab active"><a href="javascript:void()">Who We Are</a></li>
                                    <li class="tab"><a href="javascript:void()W">Our Mission!</a></li>
                                    <li class="tab"><a href="javascript:void()">Our Vision!</a></li>
                               
                                </ul>
                                <div class="content-tab">
                                    <div class="content-inner">
                                        <div class="row">
                                            <div class="col-md-12 col-lg-6">
                                                <div class="mb-30">
                                                     <?php if(!empty($RESULT[0]->image)){ ?>
                                                <img src="<?php echo base_url('uploads/page/').$RESULT[0]->image; ?>"alt="image" class="img-fluid">
                                                <?php } ?>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-lg-6 text-justify">
                                             <?php  echo $RESULT[0]->description ; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content-inner">
                                        <div class="row">
                                            <div class="col-md-12 col-lg-6 text-justify " >
                                               <?php  echo $RESULT[0]->description_second ; ?>
                                            </div>
                                            <div class="col-md-12 col-lg-6">
                                                <div class="mb-30">
                                                    <?php if(!empty($RESULT[0]->image)){ ?>
                                                <img src="<?php echo base_url('uploads/page/').$RESULT[0]->image; ?>"alt="image" class="img-fluid">
                                                <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content-inner">
                                        <div class="row">
                                            <div class="col-md-12 col-lg-6">
                                                <div class="image-box mb-30">
                                                     <?php if(!empty($RESULT[0]->image)){ ?>
                                                <img src="<?php echo base_url('uploads/page/').$RESULT[0]->image; ?>"alt="image" class="img-fluid">
                                                <?php } ?>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-lg-6 text-justify">
                                               <?php  echo $RESULT[0]->description_third ; ?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="ttm-row fid-section ttm-bgcolor-black clearfix">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-lg-3 counter-wrap">
                            <!--ttm-fid-content-->
                            <div class="ttm-fid text-center">
                                <div class="ttm-fid-icon-wrapper ttm-icon ttm-icon_element-color-white ttm-icon_element-size-md">
                                    <i class="ti ti-light-bulb"></i>
                                </div>
                                <div class="ttm-fid-contents">
                                    <h4><span   data-appear-animation = "animateDigits"
                                                data-from             = "0"
                                                data-to               = "878"
                                                data-interval         = "10"
                                                data-before           = ""
                                                data-before-style     = "sup"
                                                data-after            = ""
                                                data-after-style      = "sub"
                                            >878
                                        </span>
                                    </h4>
                                    <h3 class="ttm-fid-title"><span>GOOD COMMENTS<br></span></h3>
                                </div><!-- ttm-fld-contents end -->
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-3 counter-wrap">
                            <div class="ttm-fid text-center">
                                <div class="ttm-fid-icon-wrapper ttm-icon ttm-icon_element-color-white ttm-icon_element-size-md">
                                    <i class="ti ti-image"></i>
                                </div>
                                <div class="ttm-fid-contents">
                                    <h4><span   data-appear-animation = "animateDigits"
                                                data-from             = "0"
                                                data-to               = "175"
                                                data-interval         = "5"
                                                data-before           = ""
                                                data-before-style     = "sup"
                                                data-after            = ""
                                                data-after-style      = "sub"
                                            >175
                                        </span>
                                    </h4>
                                    <h3 class="ttm-fid-title"><span>FEACTURED EVENTS<br></span></h3>
                                </div><!-- ttm-fld-contents end -->
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-3 counter-wrap">
                            <!--ttm-fid-content-->
                            <div class="ttm-fid text-center">
                                <div class="ttm-fid-icon-wrapper ttm-icon ttm-icon_element-color-white ttm-icon_element-size-md">
                                    <i class="ti ti-crown"></i>
                                </div>
                                <div class="ttm-fid-contents">
                                    <h4><span   data-appear-animation = "animateDigits"
                                                data-from             = "0"
                                                data-to               = "878"
                                                data-interval         = "10"
                                                data-before           = ""
                                                data-before-style     = "sup"
                                                data-after            = ""
                                                data-after-style      = "sub"
                                            >878
                                        </span>
                                    </h4>
                                    <h3 class="ttm-fid-title"><span>AWARD WINNING<br></span></h3>
                                </div><!-- ttm-fld-contents end-->
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-3 counter-wrap">
                            <!--ttm-fid-content-->
                            <div class="ttm-fid text-center">
                                <div class="ttm-fid-icon-wrapper ttm-icon ttm-icon_element-color-white ttm-icon_element-size-md">
                                    <i class="ti ti-face-smile"></i>
                                </div>
                                <div class="ttm-fid-contents">
                                    <h4><span   data-appear-animation = "animateDigits"
                                                data-from             = "0"
                                                data-to               = "125"
                                                data-interval         = "10"
                                                data-before           = ""
                                                data-before-style     = "sup"
                                                data-after            = ""
                                                data-after-style      = "sub"
                                            >125
                                        </span>
                                    </h4>
                                    <h3 class="ttm-fid-title"><span>HAPPY CLIENT<br></span></h3>
                                </div><!-- ttm-fld-contents end-->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
           <section class="ttm-row row-text-section ttm-bgcolor-grey">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sep-box text-center">
                                <h2 class="title">We’ll Make Your Next Celebration Very Special!</h2>
                                <h6>Friendly customer service staff for your all questions!</h6>
                                <div class="sep_holder_box width-30 pt-10">
                                    <span class="sep_holder"><span class="sep_line"></span></span>
                                    <div class="ttm-icon ttm-icon_element-color-skincolor ttm-icon_element-size-md"> 
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <span class="sep_holder"><span class="sep_line"></span></span>
                                </div>
                                <h4><strong>Call Us</strong>:<a href="tel:<?php echo $link[0]->phone; ?>">  +<?php echo $link[0]->phone ; ?></h4>
                            </div>
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
