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
                    <div class="row profile">
                          <div class="col-lg-3 col-md-4 col-sm-12">
                            <ul class="tabs">
                                <?php $this->load->view('front/account/left-menu'); ?>
                               
                            </ul>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 sidebar-widget-area">
                            <div class="tab-contents sidebar-widget">
                                <div class="tab-content active" id="home-content">
                                    <div class="padding-12 box-shadow">
                                        <strong>Hello <?php echo @$user[0]->fname.' '.@$user[0]->lname; ?>,</strong>
                                        <br>
                                        <br>
                                        <p>From your account's dashboard you can view your recent purchased packages and edit your
                                            profile .</p>
                                    </div>
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
</body>
</html>