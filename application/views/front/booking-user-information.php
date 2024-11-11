<?php error_reporting(); ?>
<?php $link = $this->setting_model->get_all_setting();?>
<?php $user_id = $this->session->userdata('USER_ID'); ?>
<?php $userdata = $this->user_model->get_user_by_id($user_id) ;?>
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
            <section class="ttm-row checkout-section ttm-bgcolor-grey break-991-colum clearfix">
                <div class="container">
                    <!-- row -->
                    <div class="row">
                        
                        <div class="col-lg-7">
                            <div class="checkout  box-shadow1 ">
                            <form  method="post" action="<?php echo base_url('welcome/get_user_booking_information') ;?>" >
                            <div class="billing-fields">
                                <h3>Billing details</h3>
                                <div class="row">
                                
                                     <div class=" col-lg-6 col-sm-12">
                                         <p class="checkout-form">
                                            <label>WhatsApp Number&nbsp;<abbr class="required" title="required">*</abbr></label>
                                            <input type="text" class="input-text " name="whatsapp_number" placeholder="" value="" required>
                                        </p>
                                    </div>
                                   
                                   
                                    
                                     <div class=" col-lg-6 col-sm-12">
                                         <p class="checkout-form">
                                            <label>Number Of People&nbsp;<abbr class="required" title="required">*</abbr></label>
                                                <select name="no_of_people" class="country_to_state" id="people" required>
                                                    <option value="">Number Of People</option>
                                                    <?php for($i=1; $i <=$booking[0]->total_person ; $i++){ ?>
                                                       <option value="<?php echo $i ; ?>"><?php echo $i ; ?></option>
                                                    <?php } ?>
                                                 
                                            </select>
                                        </p>
                                
                                    </div>
                                    
                                    <div class=" col-lg-6 col-sm-12">
                                         <p class="checkout-form">
                                            <label>Do You Want Decoration&nbsp;<abbr class="required" title="required">*</abbr></label>
                                                <select name="want_decoartion" id="decoration" class="country_to_state "required>
                                                    <option value="">Select</option>
                                                    <option>Yes</option>
                                                    <option>No</option>
                                            </select>
                                        </p>
                                    </div>
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
                        <div class="col-lg-5">
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

$(document).on("change", ".country_to_state", function () {
   var amount = <?php echo $booking[0]->min_price; ?> ;    
   var person =   $("select#people option").filter(":selected").val();
   var decoration =   $("select#decoration option").filter(":selected").val();
   if(person > <?php echo $booking[0]->min_person; ?>){
       var extra_person_charges = <?php echo $booking[0]->price_per_person; ?> ; 
       var extra_person = person-<?php echo $booking[0]->min_person; ?>;
       var total_person_charges = extra_person*extra_person_charges;
       var amount = total_person_charges +  amount;
       
        
   }
   if(decoration == 'Yes'){
            var amount = <?php echo $booking[0]->decoration_charges; ?> +  amount;
   }
   $('#amount').text(amount) ; 
   
});
  
</script>
 
</body>
</html>
