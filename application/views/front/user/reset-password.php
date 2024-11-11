
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
        <div class="site-main">
            
            <section class="ttm-row ttm-bgcolor-white about-intro-section clearfix">

                 <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <div class="bor">
                    <div class=""
                        style="margin:10px; padding:30px; background-color: rgb(255, 255, 255);border: 1px solid rgb(204, 204, 204);box-shadow: rgb(0 0 0 / 20%) 5px 5px 15px; border-radius: 10px;">
                        <header>
                            <center>
                                    <a href="<?php echo base_url('') ?>" class="brand-logo">
                                   <?php if(!empty($link[0]->logo_black)){ ?>
                                        <img src="<?php echo base_url('uploads/logo/').$link[0]->logo_black; ?>" >
                                    <?php }else{
                                        echo $link[0]->title ; 
                                    } ?>
                                </a>
                                <h4 style="font-size:26px; margin-top:15px;">Create New Password</h4>
                            </center>
                        </header>
                        <hr>
                        <div class="content">
                             <form class="theme-form form-signin" id="login-form" method="post">
                                <div class="login-form content">
                                    <?php echo $this->session->flashdata('msg'); ?>
                                    <div class="row mb-30">
                                        <div class="col-md-12 ">
                                            <div class="form-group">
                                                <label for="email">New Password</label>
                                                <input type="password" id="npwd" class="form-control" onchange="validatePassword() " placeholder="******" required name="npwd" name="npwd" value="<?php echo set_value('npwd'); ?>">
                                                <?php echo form_error( 'password'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-30">
                                        <div class="col-md-12  ">    
                                            <div class="form-group">
                                                <label for="review">Confirm Password</label>
                                                <input type="password" id="cpwd" class="form-control" placeholder="******" required name="cpwd" value="<?php echo set_value('cpwd'); ?>" data-parsley-equalto="#npwd" parsley-required="true" data-parsley-trigger="blur">
                                                <?php echo form_error( 'confirm_password'); ?> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                       <div class="form-group col-sm-12 tet-alin-cent">
                                             <button  class="ttm-btn ttm-btn-size-md ttm-btn-shape-round ttm-btn-style-fill ttm-btn-color-skincolor mt-20" id="registerButton" name="reset_password"  id="reset_password" type="submit">Reset Password</button>
                                        </div>
                                       
                                    </div>
                            
                                </div>
                            </form>
                          
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3"></div>
        </div>
  </section>
        </div>
        <?php $this->load->view('front/layout/footer'); ?>
    </div>
    <?php $this->load->view('front/layout/footer-js'); ?>
</body>
</html>
