<?php error_reporting(); ?>
<?php $link = $this->setting_model->get_all_setting();?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php  echo $RESULT[0]->title ; ?></title>
 <?php $this->load->view('front/layout/head'); ?>
<style>
    .ui-widget.ui-widget-content {
    border: 1px solid #c5c5c5;
    width: 100%;
}
input[type=checkbox], input[type=radio] {
    box-sizing: border-box;
    padding: 0;
 visibility: hidden;
}
.option_button{
    padding: 5px;
    font-size: 12px;
}
.btn-check:checked ~ label {
        color: white;
    background: black;
}
.ttm-sidebar-section {
    padding: 60px 0 80px;
}


.undefined  .ui-state-default {
    border: 1px solid #cfc6c6;
    color:white;
     background: #a8216b;
}
 .ui-datepicker-unselectable .ui-state-default {
    border: 1px solid #cfc6c6;
   background: #c5c5c5;
   color:black;
}

.undefined .ui-state-active {
       border: 1px solid #131313;
    background: #141515;
    font-weight: normal;
    color: #ffffff;
}
.undefined .ui-state-active a {
    color: #ffffff;
}
</style>
<body>
    <div class="page">
        <header id="masthead" class="header ttm-header-style-classic-box ttm-header-overlay">
            <?php $this->load->view('front/layout/top-menu'); ?>
            <?php $this->load->view('front/layout/header'); ?>
        </header>
         <div class="site-main">
            <section class="ttm-sidebar clearfix ttm-sidebar-section product-details-section ttm-bgcolor-dark-grey">
                <div class="container">
                    <!-- row -->
                    <div class="row ttm-sidebar-right">
                        <div class="col-lg-7 col-md-7 content-area">
                            <div class="ttm-single-product-details product box-shadow1">
                                <div class="ttm-single-product-info clearfix">
                                     <div class="summary entry-summary">
                                        <h3 class="product_title entry-title"><?php echo $RESULT[0]->title; ?></h3>
                                        <p class="price">
                                            <span class="Price-amount amount">
                                           <?php echo $RESULT[0]->short_description; ?>
                                            </span>
                                        </p>
                                    </div>
                                    <div class="product-gallery images">
                                         <div class="post-img-slide owl-carousel owl-theme owl-loaded" data-item="1" data-nav="false" data-dots="true" data-auto="true">
                                               <?php if(!empty($RESULT[0]->image)){ ?><div class="featured-thumbnail"> <img src="<?php echo base_url('uploads/theatre/').$RESULT[0]->image; ?>" class="img-fluid"></div><?php } ?>
                                               <?php if(!empty($RESULT[0]->image_2)){ ?><div class="featured-thumbnail"> <img src="<?php echo base_url('uploads/theatre/').$RESULT[0]->image_2; ?>" class="img-fluid"></div><?php } ?>
                                               <?php if(!empty($RESULT[0]->image_3)){ ?><div class="featured-thumbnail"> <img src="<?php echo base_url('uploads/theatre/').$RESULT[0]->image_3; ?>" class="img-fluid"></div><?php } ?>
                                               <?php if(!empty($RESULT[0]->image_4)){ ?><div class="featured-thumbnail"> <img src="<?php echo base_url('uploads/theatre/').$RESULT[0]->image_4; ?>" class="img-fluid"></div><?php } ?>

                                        </div><!-- post-img-slide end -->  
                                       
                                    </div>
                                    <div class="summary entry-summary">
                                        <div class="product-details__short-description">
                                          <?php echo $RESULT[0]->description; ?>
                                        </div>
                                       
                                    </div>
                                </div>
                             
                            </div>
                           
                        </div>
                        <div class="col-lg-5 col-md-5 sidebar sidebar-right product-sidebar-right widget-area">
            
                           <aside class="widget widget-Categories" style="padding:15px">
                              
                                <form  method="post" action="<?php echo base_url('welcome/get_booking_information') ; ?>" id="bookingForm">
                                    <h3 class="widget-title">Choose Booking Date</h3>
                                   <div id="datepicker"></div>
                                    <br>
                                
                                     <h3 class="widget-title">Choose Booking Slots</h3>
                                     <div class="row" id="theatre_slots">
                                     
                                     
                                     </div>
                                      <hr>
                                     <div class="row">
                                         <div class="col-sm-4  col-4 text-center">
                                             
                                            <label class="btn btn-light option_button" style="border: 1px solid black;" ></label><span> Booked</span>
                                         </div>
                                          <div class="col-sm-4 col-4  text-center">
                                            <label class="btn btn-avail option_button"></label><span> Available</span>
                                         </div> 
                                         <div class="col-sm-4 col-4  text-center">
                                            <label class="btn btn-dark option_button"></label><span> Selected</span>
                                         </div>
                                         
                                     </div>
                                     <input type="hidden" name="date" value="<?php echo date( 'Y-m-d' , strtotime( $date)) ; ?>"  id="booking_date" >
                                     <input type="hidden" name="threatre_id" value="<?php echo $RESULT[0]->id; ?>"   >
                                    <hr>
                                
                                    <p class="form-submit">
                                        <button  type="button"  onClick='submitDetailsForm()' class="submit ttm-btn ttm-btn-size-md ttm-btn-shape-round ttm-btn-style-fill btn-block ttm-btn-color-black" >Book Now</button>
                                    </p>
                                </form>
                            </aside>
                        </div>
                          <div class="col-lg-12 col-md-12 content-area">
                        
                            <div class="related products">
                                <h2>Additional Services </h2>
                                <ul class="products row">
                                    <!-- product -->
                                    <li class="product col-md-4 col-sm-4 col-xs-4  col-lg-4 col-4">
                                        <div class="ttm-product-box">
                                            <!-- ttm-product-box-inner -->
                                            <div class="ttm-product-box-inner">
                                          
                                                <div class="ttm-product-image-box text-center">
                                                    <img class="img-fluid" src="<?php echo base_url('assets/front/') ;?>images/cake.png" alt="">
                                                </div>
                                            </div><!-- ttm-product-box-inner end -->
                                            <div class="ttm-product-content">
                                                <h3><a href="javascript:void()">Cake </a></h3>
                                               
                                            </div>
                                        </div>
                                    </li><!-- product end-->
                                    <!-- product -->
                                    <li class="product col-md-4 col-sm-4 col-xs-4 col-4">
                                        <div class="ttm-product-box">
                                            <!-- ttm-product-box-inner -->
                                            <div class="ttm-product-box-inner">
                                               
                                                <div class="ttm-product-image-box text-center">
                                                    <img class="img-fluid" src="<?php echo base_url('assets/front/') ;?>images/decor.png" alt="">
                                                </div>
                                            </div><!-- ttm-product-box-inner end -->
                                            <div class="ttm-product-content">
                                                <h3><a href="javascript:void()">Decoration</a></h3>
                                               
                                              
                                            </div>
                                        </div>
                                    </li>
                                    <!-- product end-->
                                    <!-- product -->
                                    <li class="product col-md-4 col-sm-4 col-xs-4 col-4">
                                        <div class="ttm-product-box">
                                            <!-- ttm-product-box-inner -->
                                            <div class="ttm-product-box-inner">
                                             
                                                <div class="ttm-product-image-box text-center">
                                                    <img class="img-fluid" src="<?php echo base_url('assets/front/') ;?>images/gift.png" alt="">
                                                </div>
                                            </div><!-- ttm-product-box-inner end -->
                                            <div class="ttm-product-content">
                                                <h3><a href="javascript:void()">Gift</a></h3>
                                         
                                            </div>
                                        </div>
                                    </li>
                                    <!-- product end-->
                                </ul>
                            </div>
                        </div>
                    </div><!-- row end -->
                </div>
            </section>

           
        </div><!-- site-main end --> 
        <?php $this->load->view('front/layout/footer'); ?>
    </div>
    <?php $this->load->view('front/layout/footer-js'); ?>
    <script src="<?php echo base_url();?>/assets/front/jquery/jquery-ui.js"></script>
 <script>


var dates = [   
                <?php foreach($disabled_dates as $key=>$value){ ?>
                 "<?php echo $value ; ?>",
                <?php } ?>
            ];


function DisableDates(date) {
var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
var res = [dates.indexOf(string) == -1]; 
return res;
}

$(document).ready(function(){
  $("#datepicker").datepicker({
     dateFormat: 'yy-mm-dd',
     beforeShowDay: DisableDates,
     minDate: new Date("<?php echo date('Y-m-d'); ?>"),
     defaultDate: '<?php echo date( 'Y-m-d' , strtotime( $date)) ; ?>' ,
     maxDate: '+3M',
    });
   theatre_slots_view('<?php echo $date ; ?>') ;  
});
$(document).on("change", "#datepicker", function () {
    var booking_date =     $(this).val() ; 
    if(booking_date){
      $('#booking_date').val(booking_date) ; 
       theatre_slots_view(booking_date);
    }
});
function theatre_slots_view(booking_date) {
     $.ajax({
          type:'POST',
          url:'<?php echo base_url('welcome/get_slots_of_theatre_on_date') ?>',
          data: {"date": booking_date, "theatre_id": <?php echo $RESULT[0]->id; ?>},
          success:function(html){
              $('#theatre_slots').html(html);
          }
      }); 
}
</script>
<script language="javascript" type="text/javascript">
    function submitDetailsForm() {
       var a =    $('#booking_date').val() ; 
       if(a == '' ){
         alert('Choose Booking Date') ;  
       }else{
            var b ='' ; 
            if( $("input[name='slots_id']").is(":checked") ){ // check if the radio is checked
                 b = $("input[name='slots_id']:checked").val(); // retrieve the value
            }
           if(b == ''){
                 alert('Select Booking Slots Time') ;  
           }else{
                $("#bookingForm").submit();
           }
          
       }
    
    }
</script>
</body>
</html>
