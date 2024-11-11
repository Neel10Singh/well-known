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
           <section class="ttm-row contact-form-section2 bg-layer break-991-colum clearfix">
                <div class="container">
                  
                   <div class="row res-1199-mlr-15">
                       
                        <div class="col-md-2 col-lg-2">
                         
                        </div>
                        <div class="col-md-8 col-lg-8">
                            <div class="padding-12 box-shadow">
                               
                                <?php echo $this->session->flashdata('msg'); ?>
                                <form id="" class="row " method="post" action="#" n>
                                   <div class=" col-lg-6 col-sm-12">
                                        <p class="checkout-form">
                                            <label>Name&nbsp;<abbr class="required" title="required">*</abbr></label>
                                            <input type="text" class="input-tex" name="name" required placeholder="" value="">
                                        </p>
                                    </div>
                                     <div class=" col-lg-6 col-sm-12">
                                         <p class="checkout-form">
                                            <label>WhatsApp Number&nbsp;<abbr class="required" title="required">*</abbr></label>
                                            <input type="text" class="input-text " name="whatsapp_number" placeholder="" value="" required>
                                        </p>
                                    </div>
                                   
                                     <div class=" col-lg-6 col-sm-12">
                                          <p class="checkout-form">
                                            <label>Phone&nbsp;<abbr class="required" title="required">*</abbr></label>
                                            <input type="tel" class="input-text " name="phone" placeholder="" value="">
                                        </p>
                                    </div>
                                    <div class=" col-lg-6 col-sm-12">
                                            <p class="checkout-form">
                                                <label>Email address&nbsp;<abbr class="required" title="required">*</abbr></label>
                                                <input type="email" class="input-text " name="email" placeholder="" value="" required>
                                            </p>
                                    </div>
                                    <div class=" col-lg-6 col-sm-12">
                                            <p class="checkout-form">
                                                <label>Date&nbsp;<abbr class="required" title="required">*</abbr></label>
                                                <input type="date" class="input-text " name="date" placeholder="" value="" required>
                                            </p>
                                    </div>
                                    
                                     <div class=" col-lg-6 col-sm-12">
                                         <p class="checkout-form">
                                            <label>Number Of People&nbsp;<abbr class="required" title="required">*</abbr></label>
                                                <select name="no_of_people" class="country_to_state" id="people" required>
                                                    <option value="">Number Of People</option>
                                                    <?php for($i=1; $i <=30 ; $i++){ ?>
                                                       <option value="<?php echo $i ; ?>"><?php echo $i ; ?></option>
                                                    <?php } ?>
                                                 
                                            </select>
                                        </p>
                                
                                    </div>
                                    
                                      <div class="form-group col-sm-6">
                                          <p class="checkout-form">
                                        <label for="exampleInputPassword1">City</label>
                                        <select class="country_to_state" name="city_id"  id="city" required>
                                            
                                            <option value=''>Select</option>
                                            <?php foreach($city as $key=>$value){ ?>
                                            <option value='<?php echo $value->id; ?>'><?php echo $value->title; ?></option>
                                            <?php } ?>
                                            
                                        </select>
                                        <?php echo form_error( 'city'); ?>
                                          </p>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <p class="checkout-form">
                                        <label for="exampleInputPassword1">Location</label>
                                        <select class=" country_to_state" name="location_id" id="location" required>
                                            
                                            <option value=''>Select</option>
                                           
                                        </select>
                                        <?php echo form_error( 'location'); ?>
                                          </p>
                                    </div>
                              
                                    <input name="submit" type="submit" value="Join Waiting List" class="ttm-btn ttm-btn-size-md ttm-btn-shape-round ttm-btn-style-fill ttm-btn-color-skincolor mt-20" id="submit" title="Join Waiting List">
                               </form>
                               <br>
                               <br>
                               <div>
                                   <?php echo $RESULT[0]->description; ?>
                               </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </section>
            </section>
        </div>
        <?php $this->load->view('front/layout/footer'); ?>
    </div>
    <?php $this->load->view('front/layout/footer-js'); ?>
</body>
</html>
<script type="text/javascript">
$('#city').on('change',function(){
              var cityId = $(this).val();
              if(cityId){
                  $.ajax({
                      type:'POST',
                      url:'<?php echo base_url('welcome/get_location_of_city') ?>',
                      data:'city_id='+cityId,
                      success:function(html){
                          $('#location').html(html);
                      }
                  }); 
              }else{
                  $('#location').html('<option value="">Select City first</option>'); 
              }
          });
</script>
