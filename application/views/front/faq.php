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
         <section class="ttm-row break-991-colum ttm-bgcolor-white clearfix faq-intro-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-35">
                                <h2 class="ttm-textcolor-skincolor"><?php echo $RESULT[0]->title; ?></h2>
                                <p>  <?php echo $RESULT[0]->description; ?></a></p>
                            </div>
                            <!-- wrap-acadion -->
                            <div class="wrap-acadion">
                                <div class="accordion">
                                        <?php $no=0; foreach($faq as $record){ $no++; ?>
                                         <!-- toggle -->
                                            <div class="toggle ttm-style-classic ttm-toggle-title ttm-toggle-title-bgcolor-grey">
                                                <h4 class="toggle-title"><?php echo $record->title; ?></h4>
                                                <div class="toggle-content">
                                                   <?php echo $record->description; ?>
                                                </div>
                                            </div><!-- toggle end -->
                                          
                                       
                                <?php } ?>
                                
                                   
                                </div>                   
                            </div><!-- wrap-acadion end-->
                        </div>
                    </div><!-- row end -->
                </div>
            </section>
        </div>
        <?php $this->load->view('front/layout/footer'); ?>
    </div>
    <?php $this->load->view('front/layout/footer-js'); ?>
</body>
</html>
