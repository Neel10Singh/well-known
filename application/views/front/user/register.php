
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
                    <div class=""style="margin:10px; padding:30px; background-color: rgb(255, 255, 255);border: 1px solid rgb(204, 204, 204);box-shadow: rgb(0 0 0 / 20%) 5px 5px 15px; border-radius: 10px;">
                        <header>
                            <center>
                               <a href="<?php echo base_url('Home') ?>" class="brand-logo">
                                   <?php if(!empty($link[0]->logo_black)){ ?>
                                        <img src="<?php echo base_url('uploads/logo/').$link[0]->logo_black; ?>" >
                                    <?php }else{
                                        echo $link[0]->title ; 
                                    } ?>
                                </a>
                                <h4 style="font-size:26px; margin-top:15px;">Profile Details</h4>
                            </center>
                        </header>
                        <hr>
                        <div class="content">
                            <form id="signup-form" method="post" method="post" enctype="multipart/form-data">
                                <div class="content">
                                    <div class="login-form row">
                         
                                        <div class="form-group col-sm-6 col-lg-6">
                                            <div class="form-group__content mb-20">
                                               <input class="form-control" type="text" id="fname" placeholder="First Name*" name='fname' required = "true"  pattern="[A-Za-z\s]+$"  value="" onkeypress="return nameValidation(event)" oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '').replace(/(\..*)\./g, '$1');" required value="" title="Allows only characters"   maxlength="30">
                                                 <?php echo form_error('fname'); ?>
                                            </div>
                                        </div>

                                        <div class="form-group col-sm-6 col-lg-6 ">
                                            <div class="form-group__content mb-20">
                                                <input class="form-control" type="text" id="lname" name="lname" placeholder="Last Name*"  value="" required = "true"  pattern="[A-Za-z\s]+$"  value="" onkeypress="return nameValidation(event)" oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '').replace(/(\..*)\./g, '$1');" title="Allows only characters"   maxlength="30">
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-6 col-lg-6 ">
                                              <div class="form-group  mb-20">
                                                 <input class="form-control" type="email" pattern="^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$" onblur="return checkEmail(this.value)" value="" title="example@mail.com" placeholder="Email*"  name="email" value="">
											 </div>
                                            
                                        </div>
                                  
                                        <div class="form-group col-sm-6 col-lg-6 ">
                                               <div class="form-group  mb-20">
                                                <input class="form-control" type="text" id="phone" required placeholder="Mobile Number*" name="contact_no" value="" required = "true" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"
                                                pattern="^\d{10}$" value="" title="Enter 10 Digit Mobile Number" min=10  max=10 autocomplete="off"  placeholder="Mobile Number*" />
											<p id="tel-msg" style="color:red"></p>
                                         </div>
                                        </div>
                                        <div class="form-group col-sm-6 col-lg-6 ">
                                             <div class="form-group  mb-20">
                                                <input type="password"   class="form-control" id="inputPassword" placeholder="Enter your Password*"  required  name="password" value="<?php echo set_value('password'); ?>">
                                             
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-6 col-lg-6 ">
                                            <div class="form-group__content mb-20">
                                                    <input type="password" class="form-control"  id="inputConfirmPassword" placeholder="Confirm Password*" required name="confirm_password" value="<?php echo set_value('confirm_password'); ?>">
                                                
                                            </div>
                                        </div>
                                         <div class="form-group col-sm-12 tet-alin-cent">
                                             <button  class="ttm-btn ttm-btn-size-md ttm-btn-shape-round ttm-btn-style-fill ttm-btn-color-skincolor mt-20" id="registerButton" type="submit" name="register"> Register</button>
                                        </div>
                                          <div class="form-group col-sm-12 mb-20">
											<div id="signup-box-msg"></div>
										</div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-6"> <a href="<?php  echo base_url('login');?>">Already have an account?<i class="fa fa-long-arrow-right"></i></a> </div>
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
<script>
function nameValidation(e) {
		var k = e.keyCode;
				$return = ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8 || k == 32  || (k >= 48 && k <= 57));
		  if(!$return) {
			return false;
		  }
                  return true;
	}


function checkEmail(str)
	{
		var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                  if(str.length == 0)
		   return true;
                
                if(!re.test(str))
		alert("Please enter a valid email address");
	}




</script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#signup-form').submit(function() {
			$('#registerButton').html(' Processing');
			var formData = new FormData(this);
			$.ajax({
				url: "<?php echo base_url() ; ?>/user/register_process",
				type: "POST",
				data: formData,
				cache: false,
				contentType: false,
				processData: false,
				dataType: 'json',
				success: function(response) {
					if(response.status == 1) {
						$('#signup-box-msg').html(response.message);
						window.location.replace(response.url);
					} else {
						$('#signup-box-msg').html(response.message);
					}
					$('#registerButton').html('Register');
				}
			});
			return false;
		});
	});
	</script>
	
	</body>
</html>