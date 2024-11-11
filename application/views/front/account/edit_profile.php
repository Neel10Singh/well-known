<!DOCTYPE html>
<html lang="en">

<head>
   <title> <?php  echo $content[0]->meta_title; ?></title>

  <meta name="description" content="<?php  echo $content[0]->meta_description; ?>">
  <meta name="keywords" content="<?php echo  $content[0]->meta_keyword; ?>">
<?php $this->load->view('front/layout/head'); ?>

</head>

<body>
    
<?php $this->load->view('front/layout/top-menu'); ?>


<section class="page-header" style="background-image: url(<?php echo base_url('assets/front/') ?>images/backgrounds/page-header-contact.jpg);">
            <div class="container">
                <h1>  <?php  echo $content[0]->title; ?></h1>
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="<?php echo base_url('') ?>">Home</a></li>
                   
                    <li><span>  <?php  echo $content[0]->title; ?></span></li>
                </ul><!-- /.thm-breadcrumb -->
            </div><!-- /.container -->
</section>


<section class="blog-list">
    <div class="container">
        <div class="row">
             <div class="col-lg-3">
                <div class="sidebar">

                   
                    <div class="sidebar__single sidebar__category">
                    
                        <ul class="sidebar__category-list list-unstyled">
                           <?php $this->load->view('front/account/left-menu'); ?>
                        </ul><!-- /.sidebar__category-list list-unstyled -->
                    </div><!-- /.sidebar__single sidebar__category -->
                    
                </div><!-- /.sidebar -->
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-9">
                <div class="blog-details__content">
                 
                    <h3>Update Profile</h3>	
                    <hr>																												
							<?php echo $this->session->flashdata('msg'); ?>
							<form method="post" class="setting-form" id="profile_form">  
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<label class="field-label">First Name :</label>
											<input type="text" class="form-control" value="<?php echo $RESULT[0]->fname; ?>" name="fname" required>
										</div>
									</div>
								
									<div class="clearfix"></div>
									<div class="col-sm-6">
										 <div class="form-group">
											<label class="field-label">Gender :</label>
											<select class="form-control" name="gender">
												<option value="male" <?php echo($RESULT[0]->gender=='male')?'selected':''; ?> >Male</option>
												<option value='female' <?php echo($RESULT[0]->gender=='female')?'selected':''; ?>>Female</option>
											<select>	
										</div>
									</div>
									
									<div class="clearfix"></div>										
									<div class="col-sm-6">
										<div class="form-group">
											<label class="field-label">Contact No. :</label>


											<input type="text" class="form-control" id="phone" name="contact_no" value="<?php echo $RESULT[0]->contact_no; ?>" required minlength="10" maxlength="10"  >
											<p id="tel-msg" style="color: red ;font-size: 12px"></p>
										</div>
									</div>
									
								 
								
									<div class="clearfix"></div>
								
									
									<div class="col-sm-4">
										<div class="form-group">
											<label class="field-label">City :</label>
											<input type="text" class="form-control" name="city" value="<?php echo $RESULT[0]->city; ?>" required>
										</div>
									</div>
								
									<div class="col-sm-4">
										<div class="form-group">
											<label class="field-label">State :</label>
											<input type="text" class="form-control" name="state" value="<?php echo $RESULT[0]->state; ?>" required>
										</div>
									</div>
									
							    <div class="col-sm-4">
										<div class="form-group">
											<label class="field-label">Zip:</label>
											<input type="text" class="form-control" name="zip" value="<?php echo $RESULT[0]->zip; ?>" minlength="6" maxlength="6" required>
										</div>
									</div>
									<div class="clearfix"></div>
										<div class="col-sm-12">
										<div class="form-group">
											<label class="field-label">Address :</label>
											<input type="text" class="form-control" name="address" value="<?php echo $RESULT[0]->address; ?>" required>
										</div>
									</div>
								
									<div class="clearfix"></div>
									<div class="col-sm-12">
										<div class="form-group">	


											<button type="submit" class="thm-btn cta-four__btn" name="updateprofile" style="width: 40%">Update</button>
										</div>
									</div>                
								</div> <!--- Row End -->
							</form>
						
				</div>
            </div>
        </div>
    </div>
  
</section>
<!-- section end -->
<!-- breadcrumb End -->


<?php $this->load->view('front/layout/footer.php') ?>
<script src="<?php echo base_url('assets/admin/parsley/parsley.js'); ?>"></script>
<script class="example">
$(document).ready(function(){
	$('#profile_form').parsley();	
});
</script>
<script type="text/javascript">

$(document).ready(function(){

   $('#tel-msg').empty(); 
    $('#phone').keypress(validateNumber);
   
    $('#phone').keyup(function () {
        if ($('#phone').val().length != 10) {

             $('#tel-msg').html('Enter 10 Digits Phone Number.'); 
             return false ; 
        }else{

              $('#tel-msg').empty(); 
        }

          
    });
});  


function validateNumber(event) {
    var key = window.event ? event.keyCode : event.which;
    if (event.keyCode === 8 || event.keyCode === 46) {
        return true;
    } else if ( key < 48 || key > 57 ) {
        return false;
    } else {
        return true;
    }
};



</script>

</body>
</html>