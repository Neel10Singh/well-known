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
                 <section class="ttm-row team-section  clearfix">
                <div class="container">
                 
                    <div class="row pt-20">
                          <?php foreach($city as $key=>$value){ ?>
                           <?php  $count =  count( $this->location_model->get_location_by_city_id($value->id));  ;?>
                        <div class="col-md-6 col-lg-6 col-6 mb-30">
                            <div class="featured-imagebox featured-imagebox-team ttm-team-box-view-overlay box-card">
                                <div class="featured-thumbnail">
                                    <a href="<?php echo base_url('location/').$value->url_slug ; ?>">
                                         <?php if(!empty($value->image)){ ?> <img src="<?php echo base_url('uploads/city/').$value->image; ?>" class="img-fluid"><?php } ?>
                                    </a>
                                </div>
                                <div class="featured-content featured-content-team">
                                    <div class="featured-title">
                                        <h5><a href="<?php echo base_url('location/').$value->url_slug ; ?>"> <?php echo $value->title; ?></a></h5>
                                    </div>
                                    <span class="category"><?php echo $count; ?> Locations</span>
                                </div>
                            </div>
                        </div>
                                    <?php } ?>
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
                                <h4><strong>Call Us</strong>:<a href="tel:<?php echo $link[0]->phone; ?>">  +<?php echo $link[0]->phone ; ?></a></h4>
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
