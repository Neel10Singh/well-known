
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
                                <a href="<?php echo base_url('Home') ?>" class="brand-logo">
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
                            <?php $current_url = base_url('checkout/onepage'); ?>
                            <form id="forgot_form"  method="post">   
                                <div class="content">
                                    <div class="row">
                                        <div class="form-group col-sm-12">
                                            <div class="form-group__content mb-20">
                                                <i class="ti ti-email" style=" position:absolute; left:9px; top:35%; transform: translateY(-50%); color:#a8216b;"></i>
                                                    <input type="email" class="form-control" id="email" autocomplete="off" name="email" placeholder="Email" required="" value="<?php echo set_value('email'); ?>">
                                                    <?php echo form_error('email'); ?>

                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12  text-center "  id="forgot-box-msg" ></div>
                                          <div class="form-group__content mb-20">
                                             <button  class="ttm-btn ttm-btn-size-md ttm-btn-shape-round ttm-btn-style-fill ttm-btn-color-skincolor mt-20" id="registerButton" name="forgot_password"  id="forgot_password" type="submit"> Send Link</button>
                                        </div>
                                         
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="form-group col-sm-12"> <a href="<?php  echo base_url('login');?>">Login? <i class="fa fa-long-arrow-right"></i></a> </div>
                                                <div class="col-sm-1"></div> 
                                        
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
<script type="text/javascript">

    $(document).ready(function() {
 
    $('#forgot_form').submit(function () {   
         
      $.ajax({
            url: "<?php echo base_url('user/forgot_password_process') ?>",
            type: "POST",     
            data: $(this).serialize(),
            success: function (output) { 

                    $('#forgot-box-msg').html(output); 
                 
                }  
          });
      return false;
    });
}); 
 </script>
</body>
</html>