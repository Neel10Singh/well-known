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
            <section class="ttm-row gallery-page-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ttm-tabs style2" data-effect="fadeIn">
                                <ul class="tabs clearfix gallery-tabs">
                                    <li class="tab active"><a href="#" class="shape-round"> All </a></li>
                                    <?php foreach($service as $key=>$value){ ?>
                                      <li class="tab"><a href="#" class="shape-round"><?php echo $value->title; ?></a></li>
                                    <?php } ?>
                      
                          
                                </ul><!-- flat-tab end -->
                                <div class="content-tab ">
                                    <!-- content-inner -->
                                     <div class="content-inner active">
                                        <div class="row multi-columns-row gallery-pictures">
                                             
                                            <?php foreach($gallery as $key=>$value){ ?>
                                           
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-6 mt-10">
                                                <div class="featured-imagebox featured-imagebox-portfolio">
                                                    <!-- featured-thumbnail-->
                                                    <div class="featured-thumbnail">
                                                          <?php if(!empty($value->image)){ ?> <img src="<?php echo base_url('uploads/gallery/').$value->image; ?>" class="img-fluid"><?php } ?>
                                                    </div><!-- featured-thumbnail END-->
                                                    <!-- ttm-box-view-overlay -->
                                                    <div class="ttm-box-view-overlay">
                                                        <div class="ttm-media-link">
                                                            <a class="ttm_prettyphoto ttm_image" data-gal="prettyPhoto[gallery1]" title="<?php echo $value->title; ?>" href="<?php echo base_url('uploads/gallery/').$value->image; ?>" data-rel="prettyPhoto">
                                                                <i class="ti ti-search"></i>
                                                            </a>
                                                        </div>
                                                        <div class="featured-content featured-content-portfolio">
                                                            <div class="featured-title">
                                                                <h5><?php echo $value->title; ?></h5>
                                                            </div>
                                                            <span class="category">
                                                                <?php echo $value->service_title; ?>
                                                            </span>
                                                        </div>
                                                    </div><!-- ttm-box-view-overlay end-->
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div><!-- content-inner end-->
                                     <?php foreach($service as $key=>$value){ ?>
                                    <?php   $gallery= $this->gallery_model->get_location_by_service_id($value->id); ?>
                                    <div class="content-inner ">
                                        <div class="row multi-columns-row  ">
                                             
                                            <?php foreach($gallery as $key=>$value){ ?>
                                           
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-6 mt-10">
                                                <div class="featured-imagebox featured-imagebox-portfolio">
                                                    <!-- featured-thumbnail-->
                                                    <div class="featured-thumbnail">
                                                          <?php if(!empty($value->image)){ ?> <img src="<?php echo base_url('uploads/gallery/').$value->image; ?>" class="img-fluid"><?php } ?>
                                                    </div><!-- featured-thumbnail END-->
                                                    <!-- ttm-box-view-overlay -->
                                                    <div class="ttm-box-view-overlay">
                                                        <div class="ttm-media-link">
                                                            <a class="ttm_prettyphoto ttm_image" data-gal="prettyPhoto[gallery1]" title="<?php echo $value->title; ?>" href="<?php echo base_url('uploads/gallery/').$value->image; ?>" data-rel="prettyPhoto">
                                                                <i class="ti ti-search"></i>
                                                            </a>
                                                        </div>
                                                        <div class="featured-content featured-content-portfolio">
                                                            <div class="featured-title">
                                                                <h5><a href="#"><?php echo $value->title; ?></a></h5>
                                                            </div>
                                                            <span class="category">
                                                                <a href="#"><?php echo $value->service_title; ?></a>
                                                            </span>
                                                        </div>
                                                    </div><!-- ttm-box-view-overlay end-->
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div><!-- content-inner end-->
                                     <!-- content-inner -->
                                     <?php } ?>
                                 
                                </div>
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
