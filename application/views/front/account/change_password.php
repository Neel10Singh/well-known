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
                             
                                <div class="tab-content active" id="Password"  id="msg">
                                    <div class=" category-widget mb-30 ">
                                        		<?php echo $this->session->flashdata('msg'); ?>
                                        <h4 class="widget-title">Change Password</h4>
                                        	<form class="changepassword" id="profile_form" method="post">
            								
            								    <div class="form-group__content mb-20">
            										<label>Old Password</label>
            										<input type="password" name="opwd" placeholder="Enter old password" class="form-control custom-size" required> 
            									</div>
            					
            								    <div class="form-group__content mb-20">
            										<label>New Password</label>
            										<input type="password" name="npwd" placeholder="Enter new password" class="form-control custom-size" id='npwd' required> 
            									</div>
            					
            									 <div class="form-group__content mb-20">
            										<label>Confirm Password</label>
            										<input type="password" name="cpwd" placeholder="Enter confirm password" class="form-control custom-size" data-parsley-equalto="#npwd" required> 
            									</div> 
            									<div class="form-group col-sm-12 tet-alin-cent">
                                                    	<button class="ttm-btn ttm-btn-size-md ttm-btn-shape-round ttm-btn-style-fill ttm-btn-color-skincolor mt-20" name="changepass" type="submit"> Submit</button>
                                                </div>
            								</form>
                                       
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