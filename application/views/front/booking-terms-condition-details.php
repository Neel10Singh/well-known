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
    .billing-fields li{
            list-style: decimal;
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
                                <form  method="post" action="<?php echo base_url('welcome/checkout') ; ?>" >
                                    <div class="billing-fields">
                                         <div class="row">
                                            <div class="col-sm-8">
                                                  <h3>Terms & Conditions</h3>
                                            </div> 
                                            <div class="col-sm-4">
                                                <a class="ttm-btn ttm-btn-size-xs ttm-btn-shape-square ttm-btn-style-border ttm-icon-btn-right ttm-btn-color-skincolor" href="<?php echo base_url('gift-information') ; ?>" title="">Back To Page </a>
                                            </div>
                                            <div class="col-sm-12">
                                                <?php echo $booking[0]->terms_conditions; ?>
                                            </div>
                                        </div>
                                         <div class="row">
                                             <div class="col-sm-12">
                                                   <h3> Refund Policy</h3>
                                                <?php echo $booking[0]->return_policy; ?>
                                            </div>
                                        </div>
                                         <div class="row">
                                                 <div class="col-sm-1 col-2">
                                                      <input type="checkbox" class="btn-check radioBtnClass" name="terms" id="option4" value="1"  required  >
                                   
                                                 </div>
                                                 <div class="col-sm-10 col-10">
                                                      
                                                      <label class="btn btn-light option_button" for="option4">I have read all <a href="<?php echo base_url('terms-conditions') ; ?>" target="_blank">  terms conditions</a> </label>
                                                 </div>
                                        </div>
                                        <table class="table" >
                                             <tr>
                                                 <td>Total  Amount</td>
                                                 <td>₹ <span id="amount"><?php echo $amount; ?></span> </td>
                                             </tr> 
                                             <tr>
                                                 <td>Slot Booking Amount</td>
                                                 <td>₹ <span id="amount"><?php echo $link[0]->booking_price; ?></span> </td>
                                             </tr> 
                                            
                                        </table>
                                        
                                        <div  class="row">
                                             <div class=" col-lg-12 col-sm-12">
                                                    <hr>
                                                    <p class="form-submit">
                                                        <input  type="submit"  class=" ttm-btn ttm-btn-size-md ttm-btn-shape-round ttm-btn-style-fill btn-block ttm-btn-color-black"  value="Pay Now">
                                                    </p>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php $this->load->view('front/layout/footer'); ?>
    </div>
    <?php $this->load->view('front/layout/footer-js'); ?>
    <script>

$(document).on("change", "#people", function () {
   var amount = <?php echo $booking[0]->min_price; ?> ;    
   var a =   $("select#people option").filter(":selected").val();
   if(a > <?php echo $booking[0]->min_person; ?>){
       var extra_person_charges = <?php echo $booking[0]->price_per_person; ?> ; 
       var extra_person = a-<?php echo $booking[0]->min_person; ?>;
       var total_person_charges = extra_person*extra_person_charges;
       var amount = total_person_charges +  amount;
        
   }
   $('#amount').text(amount) ; 
   
});
  
</script>
</body>
</html>
