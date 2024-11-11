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
<style>

input[type=checkbox], input[type=radio] {
    box-sizing: border-box;
    padding: 0;
 visibility: hidden;
 width: 100%;
}

.btn-check:checked ~ label {

   border: 2px solid black;
}
p {
    margin: 0 0 15px;
    font-size: 12px;
}

</style>
<body>
    <div class="page">
        <header id="masthead" class="header ttm-header-style-classic-box ttm-header-overlay">
            <?php $this->load->view('front/layout/top-menu'); ?>
            <?php $this->load->view('front/layout/header'); ?>
            
        </header>
      
        <div class="site-main">
              <section class="ttm-row checkout-section ttm-bgcolor-grey break-991-colum clearfix">
                <div class="container">
                    <!-- row -->
                    <div class="row">
                      
                        <div class="col-lg-7">
                            <div class="checkout  box-shadow1">
                            <form  method="post" action="<?php echo base_url('welcome/get_cake_booking_information/') ; ?>" >
                            <div class="billing-fields">
                                <div class="row">
                                    <div class="col-sm-8">
                                          <h3>Cake</h3>
                                    </div> 
                                    <div class="col-sm-4">
                                        <a class="ttm-btn ttm-btn-size-xs ttm-btn-shape-square ttm-btn-style-border ttm-icon-btn-right ttm-btn-color-skincolor" href="<?php echo base_url('decoration-information') ; ?>" title="">Back To Page></a>
                                    </div>
                                
                                </div>
                                 <div class="row">
                                    <?php foreach($cake as $key=>$value) {?>
                                         <div class="col-sm-4 col-6">
                                              <input type="checkbox" class="btn-check radioBtnClass" name="cake_option[]" id="option<?php echo $value->id; ?>" value="<?php echo $value->id; ?>"   >
                                              <label class="btn btn-light option_button" for="option<?php echo $value->id; ?>"><?php if(!empty($value->image)){ ?> <img src="<?php echo base_url('uploads/cake/').$value->image; ?>" style="width:100px"><?php } ?> <p><?php echo $value->title; ?><br>₹ <?php echo $value->price; ?></p></label>
                                         </div> 
                                    <?php } ?> 
                                        
                                         
                                        
                                     </div>
                                      <div class="row">
                                         
                                            <div class=" col-lg-12 col-sm-12">
                                                    <hr>
                                                    <p class="form-submit">
                                                        <input  type="submit"  class=" ttm-btn ttm-btn-size-md ttm-btn-shape-round ttm-btn-style-fill btn-block ttm-btn-color-black"  value="Next">
                                                    </p>
                                            </div>
                                    </div>
                                     
                          
                               
                            </div>
                            </form>
                        </div>
                               
                        </div>
                        <div class="col-lg-5" id="sidebar">
                              <?php include('booking-side-bar.php') ; ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php $this->load->view('front/layout/footer'); ?>
    </div>
    <?php $this->load->view('front/layout/footer-js'); ?>
    <script>

$(document).on("change", ".radioBtnClass", function () {
    
    var fruitArray = [];
    $.each($(".radioBtnClass:checked"), function (K, V) {    
        fruitArray.push(V.value); 
    });

      $.ajax({
          type:'POST',
          url:'<?php echo base_url('welcome/get_cake_booking_amount') ?>',
          data: {"cake": fruitArray},
          success:function(html){
               $('#table').html(html) ;
          }
      }); 

    
 
   
});
  
 
</script>
</body>
</html>
