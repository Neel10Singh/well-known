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
<link rel="preload" as="image" href="<?php echo base_url('uploads/page/').$RESULT[0]->image; ?>">
<link rel="preload" as="image" href="<?php echo base_url();?>uploads/slider/<?php echo $slider[0]->image; ?>">
 <?php $this->load->view('front/layout/head'); ?>

<body>
    <div class="page">
        <header id="masthead" class="header ttm-header-style-classic-box ttm-header-overlay">
            <?php $this->load->view('front/layout/top-menu'); ?>
            <?php $this->load->view('front/layout/header'); ?>
            <div id="rev_slider_4_5_wrapper" class="rev_slider_wrapper fullwidthbanner-container slide-overlay" data-alias="classic4export" data-source="gallery">

                <!-- START REVOLUTION SLIDER 5.3.0.2 auto mode -->
                <div id="rev_slider_4_5" class="rev_slider fullwidthabanner" data-version="5.3.0.2">
                    <div class="slotholder"></div>

                        <ul>
                            <li  data-index="rs-4" data-transition="slotzoom-horizontal" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="default" data-thumb="" data-delay="10010" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="" >

                                <img src="<?php echo base_url();?>uploads/slider/<?php echo $slider[0]->image?>" alt="" title="slider-mainbg-005" width="1920" height="915" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>

                                <div class="tp-caption tp-shapewrapper ttm-bgcolor-skincolor tp-resizeme" id="slide-1-layer-1" data-x="['left','left','left','left']" data-hoffset="['50','50','40','40']" data-y="['top','top','top','top']" data-voffset="['240','240','70','100']"

                                data-fontsize="['15','15','8','8']"
                                data-lineheight="['26','26','20','20']"
                                data-width="10"
                                data-height="200"
                                data-whitespace="nowrap"
                                data-visibility="['on','on','on','on']"
                                data-type="shape"
                                data-responsive_offset="on"
                                data-frames='[{"delay":220,"speed":470,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                data-textAlign="['inherit','inherit','inherit','inherit']"
                                data-paddingtop="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]"
                                data-paddingbottom="[0,0,0,0]"
                                data-paddingleft="[0,0,0,0]"
                                ></div>

                               <div class="tp-caption tp-resizeme" id="slide-1-layer-2" data-x="['left','left','left','center']" data-hoffset="['90','90','71','20']" data-y="['top','top','top','middle']" data-voffset="['234','234','200','10']"

                                data-fontsize="['60','40','30','20']"
                                data-lineheight="['60','40','30','20']"
                                data-fontweight="[600,600,600,600]"
                                data-color="['#fff','#fff','#fff','#fff']"
                                data-width="none"
                                data-height="none"
                                data-whitespace="nowrap"
                                data-type="text"
                                data-responsive_offset="on"
                                data-frames='[{"delay":380,"speed":1500,"frame":"0","from":"x:[175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:1;","mask":"x:[-100%];y:0;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                data-textAlign="['inherit','inherit','inherit','inherit']"
                                data-paddingtop="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]"
                                data-paddingbottom="[0,0,0,0]"
                                data-paddingleft="[0,0,0,0]"
                                ><?php  echo $slider[0]->title ; ?> </div>
                                
                              

                                <div class="tp-caption tp-resizeme" id="slide-1-layer-5" data-x="['left','left','left','left']" data-hoffset="['50','50','50','50']" data-y="['top','top','top','top']" data-voffset="['460','460','500','440']"

                                data-fontsize="['20','16','14','12']"
                                data-lineheight="['28','28','28','28']"
                                data-color="['#fff','#fff','#fff','#fff']"
                                data-width="none"
                                data-height="none"
                                data-whitespace="nowrap"
                                data-visibility="['on','on','off','off']"
                                data-type="text"
                                data-responsive_offset="on"
                                data-frames='[{"delay":1460,"speed":1500,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                data-textAlign="['inherit','inherit','inherit','inherit']"
                                data-paddingtop="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]"
                                data-paddingbottom="[0,0,0,0]"
                                data-paddingleft="[0,0,0,0]"
                                ><?php  echo $slider[0]->description ; ?></div>

                              

                            </li>
                            <li data-index="rs-3" data-transition="slotzoom-horizontal" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="default" data-thumb="" data-delay="10010" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                <img src="<?php echo base_url();?>uploads/slider/<?php echo $slider[1]->image?>" alt="" title="slider-mainbg-004" width="1920" height="915" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>

                                <div class="tp-caption tp-resizeme tp-shapewrapper ttm-textcolor-white" id="slide-2-layer-1" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['10','0','10','-10']"

                                data-width="['280','280','262','182']"
                                data-height="['15','15','15','15']"
                                data-whitespace="nowrap"
                                data-type="shape"
                                data-responsive_offset="on"
                                data-frames='[{"delay":1400,"speed":700,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                data-textAlign="['inherit','inherit','inherit','inherit']"
                                data-paddingtop="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]"
                                data-paddingbottom="[0,0,0,0]"
                                data-paddingleft="[0,0,0,0]"
                                ></div>
                                
                                <div class="tp-caption tp-resizeme head-font" id="slide-2-layer-2" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['-70','-65','-50','-50']"

                                data-fontsize="['60','40','30','20']"
                                data-lineheight="['60','40','30','20']"
                                data-fontweight="['400','400','400','400']"
                                data-color="['#fff','#fff','#fff','#fff']"
                                data-width="none"
                                data-height="none"
                                data-whitespace="nowrap"
                                data-type="text"
                                data-responsive_offset="on"
                                data-frames='[{"delay":260,"split":"chars","splitdelay":0.05,"speed":1500,"split_direction":"forward","frame":"0","from":"y:[100%];z:0;rZ:-35deg;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                data-textAlign="['inherit','inherit','inherit','inherit']"
                                data-paddingtop="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]"
                                data-paddingbottom="[0,0,0,0]"
                                data-paddingleft="[0,0,0,0]"
                                ><?php  echo $slider[1]->title ; ?>
                                </div>

                    
                                <div class="tp-caption tp-resizeme cross-text" id="slide-2-layer-12" data-x="['center','center','center','center']" data-hoffset="['-14','1','-1','-1']" data-y="['middle','middle','middle','middle']" data-voffset="['67','42','59','10']"

                                data-fontsize="['18','16','14','12']"
                                data-lineheight="['32','32','32','18']"
                                data-fontweight="['300','300','300','300']"
                                data-color="['rgb(244,244,244)','rgb(244,244,244)','rgb(244,244,244)','rgb(221,221,221)']"
                                data-width="none"
                                data-height="none"
                                data-whitespace="nowrap"
                                data-type="text"
                                data-responsive_offset="on"
                                data-frames='[{"delay":1210,"speed":1500,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                data-textAlign="['center','center','center','center']"
                                data-paddingtop="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]"
                                data-paddingbottom="[0,0,0,0]"
                                data-paddingleft="[0,0,0,0]"
                                ><?php  echo $slider[1]->description ; ?> </div>

                               
                            </li>
                        </ul>
                <div class="tp-loader off"><div class="dot1"></div><div class="dot2"></div><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div><div class="tp-bannertimer"></div></div>
            </div>
        </header>
        <div class="site-main">

            <!--intro-section start-->
            <section class="ttm-row welcome-section clearfix ttm-bgcolor-white">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-lg-6">
                            <div class="ttm_single_image_wrapper mt_20 res-991-mt-0">
                                  <?php if(!empty($RESULT[0]->image)){ ?>
                                    <div style="position: relative;">
                                        <img src="<?php echo base_url('uploads/page/').$RESULT[0]->image; ?>"alt="image" class="welcome-image">
                                        <div class="image-shadow"></div>
                                    </div>  
                                    
                                <?php } ?>
              
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <div class="row box-card">
                                <div class="col-md-12 col-lg-12">
                                    <div class="res-991-pt-30">
                                        <div class="section-title">
                                            <h2 class="title">About The Party Quest</h2>
                                            
                                            <div class="mb-25 welcome-description"><?php  echo $RESULT[0]->description ; ?></div>
                                        </div>
                                        <div class="mt_19 mb-30 welcome-description">
                                            <?php  echo $RESULT[0]->description_second ; ?>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row box-card about-party-quest-metrics">
                                <div class="col-md-4 col-sm-4 col-6 ">
                                    <!-- ttm-fid -->
                                    <div class="ttm-fid inside ttm-fid-view-topicon">
                                        <div class="ttm-fid-contents">
                                            <h4><span   data-appear-animation = "animateDigits"
                                                        data-from             = "0"
                                                        data-to               = "50"
                                                        data-interval         = "10"
                                                        data-before           = ""
                                                        data-before-style     = "sup"
                                                        data-after            = ""
                                                        data-after-style      = "sub"
                                                    >5
                                                </span><sub>k</sub>
                                            </h4>
                                            <h3 class="ttm-fid-title"><span>Customers</span></h3>
                                        </div><!-- ttm-fid-contents end -->
                                    </div><!-- ttm-fid end -->
                                </div>
                                <div class="col-md-4 col-sm-4 col-6 ">
                                    <!-- ttm-fid -->
                                    <div class="ttm-fid inside ttm-fid-view-topicon">
                                        <div class="ttm-fid-contents">
                                            <h4><span   data-appear-animation = "animateDigits"
                                                        data-from             = "0"
                                                        data-to               = "15"
                                                        data-interval         = "5"
                                                        data-before           = ""
                                                        data-before-style     = "sup"
                                                        data-after            = ""
                                                        data-after-style      = "sub"
                                                    >2
                                                </span><sub>Years</sub>
                                            </h4>
                                            <h3 class="ttm-fid-title"><span>Experience</span></h3>
                                        </div><!-- ttm-fid-contents end -->
                                    </div><!-- ttm-fid end -->
                                </div>
                                <div class="col-md-4 col-sm-4 col-6 ">
                                    <!-- ttm-fid -->
                                    <div class="ttm-fid inside ttm-fid-view-topicon">
                                        <div class="ttm-fid-contents">
                                            <h4><span   data-appear-animation = "animateDigits"
                                                        data-from             = "0"
                                                        data-to               = "70"
                                                        data-interval         = "10"
                                                        data-before           = ""
                                                        data-before-style     = "sup"
                                                        data-after            = ""
                                                        data-after-style      = "sub"
                                                    >70
                                                </span><sub>k</sub>
                                            </h4>
                                            <h3 class="ttm-fid-title"><span>Project Done</span></h3>
                                        </div><!-- ttm-fid-contents end-->
                                    </div><!-- ttm-fid end -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--intro-section end-->
            
        
            
            <section class="ttm-row service-process-section bg-img8 ttm-bgcolor-black ttm-bg ttm-bgimage-yes clearfix">
                <div class="ttm-row-wrapper-bg-layer ttm-bg-layer"></div>
                <div class="container">
                    <div class="row text-center">
                        <div class="col-lg-12">
                            <div class=" section-title clearfix">
                                <!--<h4>OUR BEST SERVICES</h4>-->
                                <h2 class="title">Our Working Process</h2>
                                <div class="title-img">
                                    <img src="<?php echo base_url('assets/front/images/'); ?>ds-2.png" alt="underline-img">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-6">
                            <div class="featured-box text-center res-991-mt-20">
                                <div class="icon-outline-border">
                                    <div class="featured-icon">
                                        <div class="ttm-icon ttm-icon_element-size-lg ttm-icon_element-fill ttm-icon_element-background-skincolor ttm-icon_element-style-rounded icon1">
                                            <i class="flaticon flaticon-stage"></i>
                                        </div>
                                    </div>
                                    <div class="featured-title ttm-textcolor-white">
                                        <h5>Find The Available Theater </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-6">
                            <div class="featured-box text-center res-991-mt-20">
                                <div class="icon-outline-border">
                                    <div class="featured-icon">
                                        <div class="ttm-icon ttm-icon_element-size-lg ttm-icon_element-fill ttm-icon_element-background-skincolor ttm-icon_element-style-rounded icon2">
                                            <i class="flaticon flaticon-table"></i>
                                        </div>
                                    </div>
                                    <div class="featured-title ttm-textcolor-white">
                                        <h5>Book Theater</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-6">
                            <div class="featured-box text-center res-991-mt-20">
                                <div class="icon-outline-border">
                                    <div class="featured-icon">
                                        <div class="ttm-icon ttm-icon_element-size-lg ttm-icon_element-fill ttm-icon_element-background-skincolor ttm-icon_element-style-rounded icon3">
                                            <i class="flaticon flaticon-confetti"></i>
                                        </div>
                                    </div>
                                    <div class="featured-title ttm-textcolor-white">
                                        <h5>Pay  Amount </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-6">
                            <div class="featured-box text-center res-991-mt-20">
                                <div class="icon-outline-border">
                                    <div class="featured-icon">
                                        <div class="ttm-icon ttm-icon_element-size-lg ttm-icon_element-fill ttm-icon_element-background-skincolor ttm-icon_element-style-rounded icon4">
                                            <i class="flaticon flaticon-party-dj"></i>
                                        </div>
                                    </div>
                                    <div class="featured-title ttm-textcolor-white">
                                        <h5>Enjoy The Party </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="mt-30">
                                <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-round ttm-btn-style-border ttm-btn-color-white mt-20" href="<?php echo base_url('city') ; ?>">Book Now</a>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            
                   <!--event-section start-->
            <section class="ttm-row team-section ttm-bgcolor-grey clearfix">
                <div class="container">
                    <div class="row text-center">
                        <div class="col-lg-12">
                            <div class=" section-title clearfix">
                                <h4>SEE OUR LOCATION</h4>
                                <h2 class="title">Indian Cities</h2>
                                <div class="title-img">
                                    <img src="<?php echo base_url('assets/front/images/'); ?>ds-1.png" alt="underline-img">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row pt-20">
                        
                             <?php foreach($city as $key=>$value){ ?>
                        <div class="col-md-6 col-lg-6 col-6 mb-30 featurebox box-card">
                            <div class="featured-imagebox featured-imagebox-team ttm-team-box-view-overlay">
                                <div class="featured-thumbnail">
                                    <a href="<?php echo base_url('location/').$value->url_slug ; ?>">
                                         <?php if(!empty($value->image)){ ?> <img src="<?php echo base_url('uploads/city/').$value->image; ?>" class="img-fluid"><?php } ?>
                                    </a>
                                </div>
                                <div class="featured-content featured-content-team">
                                    <div class="featured-title">
                                        <h5><a href="<?php echo base_url('location/').$value->url_slug ; ?>"> <?php echo $value->title; ?></a></h5>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                        
                                    <?php } ?>
                       
                    </div>
                </div>
            </section>
            <!--event-section end-->
            
            
             <!--service-section start-->
            <section class="ttm-row bg-img1 ttm-bgcolor-black service-section ttm-bg ttm-bgimage-yes clearfix">
                <div class="ttm-row-wrapper-bg-layer ttm-bg-layer"></div>
                <div class="container">
                    <div class="row text-center">
                        <div class="col-lg-12">
                            <div class=" section-title clearfix">
                                <h4>WHAT WE OFFER</h4>
                                <h2 class="title">Provide Best Services</h2>
                                <div class="title-img">
                                    <img src="<?php echo base_url('assets/front/images/'); ?>ds-2.png" alt="underline-img">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php foreach($service as $key=>$value){ ?>
                        <div class="col-md-4 col-lg-4 col-6">
                            <div class="featured-imagebox static-title mb-20 ">
                                <div class="featured-thumbnail service-card">
                                    <?php if(!empty($value->image)){ ?> <img src="<?php echo base_url('uploads/service/').$value->image; ?>" class="img-fluid service-image"><?php } ?>
          
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h5><a href="#"> <?php echo $value->title; ?></a></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                      
                       
                    </div>
                </div>
            </section>
            <!--service-section end-->
     
     
               <!--service-section.style2 start-->
            <section class="ttm-row service-section style2 bg-layer clearfix bg-layer-equal-height break-991-colum">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-lg-5">
                            <!-- col-bg-img-three -->
                            <div class="col-bg-img-three ttm-col-bgimage-yes ttm-bg ttm-left-span res-991-mt-0 mt_60">
                                <div class="ttm-col-wrapper-bg-layer ttm-bg-layer"></div>
                                <div class="layer-content">
                                </div>
                            </div><!-- col-bg-img-three end-->
                            <img src="<?php echo base_url('assets/front/images/'); ?>bg-image/col-bgimage-3.jpg" class="ttm-equal-height-image" alt="bg-image">
                        </div>
                        <div class="col-lg-7 col-md-12">
                        <!-- about-content -->
                        <div class="about-content ttm-bg ttm-col-bgcolor-yes ttm-right-span ttm-bgcolor-skincolor padding-15">
                            <div class="ttm-col-wrapper-bg-layer ttm-bg-layer"></div>
                            <div class="layer-content">
                                <!-- section title -->
                                <div class="section-title with-desc clearfix">
                                    <div class="title-header">
                                        <h4>WHAT WE DO</h4>
                                        <h2 class="title">Get  Our Premium Services</h2>
                                    </div>
                                    <p>We have a huge range of suppliers and contacts in the industry that work closely with us to not only ensure you get the special day.</p>
                                </div><!-- section title end -->
                                <div class="separator clearfix">
                                    <div class="sep-line mb-50"></div>
                                </div>
                                <div class="row services-text">
                                    <div class="col-md-6">
                                        <div class="featured-box style2 left-icon icon-align-top">
                                            <div class="featured-icon">
                                                <div class="ttm-icon ttm-icon_element-size-sm ttm-icon_element-color-white">
                                                    <i class="flaticon flaticon-cake"></i>
                                                </div>
                                            </div>
                                            <div class="featured-content">
                                                <div class="featured-title">
                                                    <h5>Cakes</h5>
                                                </div>
                                                <div class="featured-desc">
                                                    <p>Celebrate your loved one's birthday / Anniversay / Farewell by   fresh and decoarated B'day cake.</p>
                                                </div>
                                               
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="featured-box style2 left-icon icon-align-top">
                                            <div class="featured-icon">
                                                <div class="ttm-icon ttm-icon_element-size-sm ttm-icon_element-color-white">
                                                    <i class="flaticon flaticon-balloons"></i>
                                                </div>
                                            </div>
                                            <div class="featured-content">
                                                <div class="featured-title">
                                                    <h5>Decorations</h5>
                                                </div>
                                                <div class="featured-desc">
                                                    <p> A private movie theater decorated with balloons, lights, occasion neon light, rose petals.</p>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="featured-box style2 left-icon icon-align-top">
                                            <div class="featured-icon">
                                                <div class="ttm-icon ttm-icon_element-size-sm ttm-icon_element-color-white">
                                                    <i class="flaticon flaticon-gift"></i>
                                                </div>
                                            </div>
                                            <div class="featured-content">
                                                <div class="featured-title">
                                                    <h5>Gift</h5>
                                                </div>
                                               <div class="featured-desc">
                                                    <p>Get unique gift ideas, discover this year's top gifts and choose the best gift for everyone.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="featured-box style2 left-icon icon-align-top">
                                            <div class="featured-icon">
                                                <div class="ttm-icon ttm-icon_element-size-sm ttm-icon_element-color-white">
                                                    <i class="flaticon flaticon-confetti"></i>
                                                </div>
                                            </div>
                                            <div class="featured-content">
                                                <div class="featured-title">
                                                    <h5>Bouquet</h5>
                                                </div>
                                                <div class="featured-desc">
                                                    <p>Our exclusive range of freshly cut flowers like roses in various colors, fresh carnations.</p>
                                                </div>
                                              
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="featured-box style2 left-icon icon-align-top">
                                            <div class="featured-icon">
                                                <div class="ttm-icon ttm-icon_element-size-sm ttm-icon_element-color-white">
                                                    <i class="flaticon flaticon-pizza"></i>
                                                </div>
                                            </div>
                                            <div class="featured-content">
                                                <div class="featured-title">
                                                    <h5>Catering</h5>
                                                </div>
                                                <div class="featured-desc">
                                                    <p> With years of experience of running cuisines in  Modest dinner parties, birthday celebrations.</p>
                                                </div>
                                              
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="featured-box style2 left-icon icon-align-top">
                                            <div class="featured-icon">
                                                <div class="ttm-icon ttm-icon_element-size-sm ttm-icon_element-color-white">
                                                    <i class="flaticon flaticon-party-dj"></i>
                                                </div>
                                            </div>
                                            <div class="featured-content">
                                                <div class="featured-title">
                                                    <h5>Music</h5>
                                                </div>
                                                <div class="featured-desc">
                                                    <p> Music service with official albums, singles, videos, remixes, live performances also book theatre.</p>
                                                </div>
                                              
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- about-content end-->
                    </div>
                    </div>
                </div>
            </section>
            <!--service-section.style2 end-->
            
         
 <!--gallery-section2 start-->
            <section class="ttm-row ttm-bgcolor-grey gallery-section2 clearfix">
                <div class="container">
                    <div class="row text-center">
                        <div class="col-lg-12">
                            <div class=" section-title clearfix">
                                <h4>SEE OUR BEST</h4>
                                <h2 class="title">Check Out Photo Gallery</h2>
                                <div class="title-img">
                                    <img src="<?php echo base_url('assets/front/images/'); ?>ds-1.png" alt="underline-img">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-wrapper">
                        <div class="carousel">
                            <?php foreach($gallery as $key=>$value){ ?>
                                <div class="carousel-item <?php echo ($key == 0) ? 'active' : ''; ?>">
                                    
                                            <?php if(!empty($value->image)){ ?>
                                                <img src="<?php echo base_url('uploads/gallery/').$value->image; ?>" class="img-fluid">
                                            <?php } ?>
                                            <div class="carousel-shadow"></div>
                                        
                                </div>
                            <?php } ?>
                        </div>
                        <!-- Navigation buttons -->
                        <button class="carousel-control prev">&#10094;</button>
                        <button class="carousel-control next">&#10095;</button>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-round ttm-btn-style-fill ttm-btn-color-black mt-50" href="<?php echo base_url('gallery') ; ?>">View Gallery</a>
                        </div>
                    </div>
                </div>
            </section>
            <!--gallery-section2 end-->

            <!--testimonial-->
            <section class="testimonial-section ttm-row bg-layer break-991-colum">
                <div class="container">
                    <div class="row">
                        <!--Testimonials-->
                        <div class="col-md-12 col-lg-7">
                            <div class="ttm-col-bgcolor-yes ttm-bg ttm-left-span ttm-bgcolor-skincolor padding-3 res-1199-pl-15">
                                <div class="ttm-col-wrapper-bg-layer ttm-bg-layer">
                                    <div class="ttm-bg-layer-inner"></div>
                                </div>
                                <div class="layer-content">
                                    <div class="carousel-outer pr-10">
                                        <div class="section-title clearfix mb-30">
                                            <h4>TESTIMONAL</h4>
                                            <h2 class="title ttm-textcolor-white">Clients feedback</h2>
                                        </div>
                                        <!-- wrap-testimonial -->
                                        <div class="testimonial-slide owl-carousel" data-item="1" data-nav="false" data-dots="false" data-auto="false">
                                                <?php $no=1;$user=''; 
                            				foreach($review as $record){ ?>	
                            				<?php if($record->user_id != 0){ $user = $this->user_model->get_user_by_id($record->user_id); } ?>	
                                            <div class="testimonials"> 
                                                <div class="testimonial-content mb-35">
                                                  
                                                     <div class="testimonial-caption">
                                                        <h6><?php echo  ucwords($record->fname .' '.$record->lname); ?></h6>
                                                        <label><?php echo  @ucwords($record->title); ?></label>
                                                    </div>
                                                    <blockquote><?php echo  @$record->comment; ?>.</blockquote>
                                                </div>
                                            </div><!-- testimonials end -->
                                            <?php } ?>
                                        </div><!-- wrap-testimonial end-->
                                    </div>
                                </div>
                            </div>
                        </div><!--left Column-end-->
                        <div class="col-md-12 col-lg-5">
                            <div class="col-bg-img-four ttm-col-bgimage-yes ttm-bg ttm-right-span ml_165 mt-60 res-991-mt-0">
                                <div class="ttm-col-wrapper-bg-layer ttm-bg-layer"></div>
                                <div class="layer-content"></div>
                            </div>
                            <img src="<?php echo base_url('assets/front/images/'); ?>bg-image/col-bgimage-4.jpg" class="ttm-equal-height-image" alt="bg-image">
                        </div>
                        <!--Testimonials-end-->
                    </div>
                </div>
            </section>
            <!--End testimonial-->
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
        
    <!-- Revolution Slider -->
    <script src="<?php echo base_url('assets/front/revolution/'); ?>js/jquery.themepunch.tools.min.js"></script>
    <script src="<?php echo base_url('assets/front/revolution/'); ?>js/jquery.themepunch.revolution.min.js"></script>
    <script src="<?php echo base_url('assets/front/revolution/'); ?>js/slider.js"></script>

    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->    

    <script src="<?php echo base_url('assets/front/revolution/'); ?>js/extensions/revolution.extension.actions.min.js"></script>
    <script src="<?php echo base_url('assets/front/revolution/'); ?>js/extensions/revolution.extension.carousel.min.js"></script>
    <script src="<?php echo base_url('assets/front/revolution/'); ?>js/extensions/revolution.extension.kenburn.min.js"></script>
    <script src="<?php echo base_url('assets/front/revolution/'); ?>js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script src="<?php echo base_url('assets/front/revolution/'); ?>js/extensions/revolution.extension.migration.min.js"></script>
    <script src="<?php echo base_url('assets/front/revolution/'); ?>js/extensions/revolution.extension.navigation.min.js"></script>
    <script src="<?php echo base_url('assets/front/revolution/'); ?>js/extensions/revolution.extension.parallax.min.js"></script>
    <script src="<?php echo base_url('assets/front/revolution/'); ?>js/extensions/revolution.extension.slideanims.min.js"></script>
</body>
</html>