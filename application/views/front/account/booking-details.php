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
    .table td, .table th {
    padding: .5rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
    font-size: 12px;
}
</style>
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
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12">
                <ul class="tabs">
                    <?php $this->load->view('front/account/left-menu'); ?>
                   
                </ul>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12 ">

            <div class=" padding-12 box-shadow ">
                <h3 class="widget-title resom">Booking No: <?php echo  $booking[0]->invoice_no; ?></h3>
                <div class="order-tabel wite" id="invoice_print">
            
                        <div class="row">
                                <div class="col-sm-6">
                                     <h3>Booking Details</h3>
                                        <table class="table" >        
                                         <tr>
                                             <td>Theatre</td>
                                             <td><?php echo $booking[0]->theatre_title; ?></td>
                                         </tr>
                                        <tr>
                                             <td>Location</td>
                                             <td><?php echo $booking[0]->location_title; ?> <?php echo $booking[0]->city_title; ?></td>
                                         </tr>
                             
                                      
                                         <tr>
                                             <td>Booking Date</td>
                                             <td><?php echo date ('D, d  m, Y' ,strtotime($booking[0]->date)) ;; ?></td>
                                         </tr>
                                         <tr>
                                             <td>Booking Slots </td>
                                             <td><?php echo $booking[0]->slots_title; ?></td>
                                         </tr>
                                       
                                         
                                    </table>
                                </div>
                                 <div class="col-sm-6"> 
                                    <h3>Service Details</h3>
                                    <table class="table" >  
                                     <tr>
                                         <td>Want Decoration </td>
                                         <td><?php echo $booking[0]->want_decoartion; ?></td>
                                     </tr>
                                     <tr>
                                         <td>Decoration Details</td>
                                         <td><?php echo $booking[0]->service_title; ?></td>
                                     </tr> 
                                     <?php if($booking[0]->cake_option) { ?>
                                     <tr>
                                         
                                        
                                         <td>Cake</td>
                                         <td>
                                              <?php $cakeArray = explode(',' ,$booking[0]->cake_option ) ; ?>
                                              <?php foreach($cakeArray as $key=>$value2){ ?>
                                              <?php $cake = $this->cake_model->get_cake_by_id($value2); ; ?>
                                            <?php echo $cake[0]->title; ?><br>
                                             <?php } ?>
                                        </td>
                                     </tr> 
                                     <?php } ?>
                                        <?php if($booking[0]->extra_decoration_option) { ?>
                                     <tr>
                                         <td>Extra Decoration</td>
                                         <td>
                                              <?php $extraDecorationArray = explode(',' ,$booking[0]->extra_decoration_option ) ; ?>
                                               <?php foreach($extraDecorationArray as $key=>$value2){ ?>
                                              <?php $extra_decoration = $this->extra_decoration_model->get_extra_decoration_by_id($value2); ; ?>
                                             <?php echo $extra_decoration[0]->title; ?><br>
                                             <?php } ?>
                                             
                                             
                                        </td>
                                     </tr>
                                     <?php } ?>
                                        <?php if($booking[0]->gift_option) { ?>
                                     <tr>
                                         <td>Gift</td>
                                         <td>
                                              <?php $giftArray = explode(',' ,$booking[0]->gift_option ) ; ?>
                                               <?php foreach($giftArray as $key=>$value2){ ?>
                                              <?php $gift = $this->gift_model->get_gift_by_id($value2); ; ?>
                                            <?php echo $gift[0]->title; ?><br>
                                             <?php } ?>
                                         </td>
                                     </tr>
                                   <?php } ?>
                                     
                                </table>
                                </div>
                        </div>
                         <div class="row">
                                <div class="col-sm-6">
                                     <h3>User Details</h3>
                                   <table class="table table-responsive" >        
                                     <tr>
                                         <td>Name</td>
                                         <td><?php echo $booking[0]->name; ?> </td>
                                     </tr> 
                                     <tr>
                                         <td>Email</td>
                                         <td><?php echo $booking[0]->email; ?> </td>
                                     </tr> 
                                     <tr>
                                         <td>Phone Number</td>
                                         <td><?php echo $booking[0]->phone; ?> </td>
                                     </tr>
                                     <tr>
                                         <td>Whatsapp number</td>
                                         <td><?php echo $booking[0]->whatsapp_number; ?> </td>
                                     </tr>
                                    <tr>
                                         <td>No Of People</td>
                                         <td><?php echo $booking[0]->no_of_people; ?> </td>
                                     </tr> 
                                     <tr>
                                         <td>Nick Name</td>
                                         <td><?php echo $booking[0]->nick_name; ?> </td>
                                     </tr> 
                                     <tr>
                                         <td>Partner Nick Name</td>
                                         <td><?php echo $booking[0]->partner_nickname; ?> </td>
                                     </tr>
                                  
                                     
                                </table>
                                </div>
                               
                               
                                <div class="col-sm-6">
                                <h3>Payment Details</h3>
                                <table class="table" >        
                                
                                 <tr>
                                     <td>Basic  Amount</td>
                                     <td>₹ <?php echo $booking[0]->amount; ?> </td>
                                 </tr>  
                                <tr>
                                     <td>Extra Person  Amount</td>
                                     <td>₹ <?php echo $booking[0]->extra_person_amount; ?> </td>
                                 </tr>
                                 <?php if($booking[0]->cake_amount) { ?>
                                 <tr>
                                     <td>Decoration  Amount</td>
                                     <td>₹ <?php echo $booking[0]->cake_amount; ?> </td>
                                 </tr> 
                                    <?php } ?>
                                  <?php if($booking[0]->cake_amount) { ?>
                                 <tr>
                                     <td>Cake  Amount</td>
                                     <td>₹ <?php echo $booking[0]->cake_amount; ?> </td>
                                 </tr>
                                   <?php } ?>
                                 <?php if($booking[0]->extra_amount) { ?>
                                 <tr>
                                     <td>Extra Decoration  Amount</td>
                                     <td>₹ <?php echo $booking[0]->extra_amount ; ?> </td>
                                 </tr>
                                 <?php } ?>
                                  <?php if($booking[0]->gift_amount) { ?>
                                 <tr>
                                     <td>Gift  Amount</td>
                                     <td>₹ <?php echo $booking[0]->gift_amount; ?> </td>
                                 </tr>
                                <?php } ?>
                                 <tr>
                                                     <td>Total Amount To  Be Paid </td>
                                                     <th><b>₹ <?php echo $booking[0]->total_amount; ?></b> </th>
                                                 </tr> 
                                                 <?php $payment =  $this->db->get_where('tbl_payment' , array('booking_id'=>$booking[0]->id))->result() ;  ?>
                                                 <tr>
                                                     <td>Paid Amount/Booking Amount </td>
                                                     <th><b>₹ <?php echo $payment[0]->amount; ?> </b></th>
                                                 </tr>
                                                   <tr>
                                                     <td>Remaining Amount To  Be Paid </td>
                                                     <th><b>₹ <?php echo $booking[0]->total_amount-$payment[0]->amount; ?></b> </th>
                                                 </tr> 
                            </table>
                                </div>
                        </div>
            
                </div>
            </div>
            <center>
                <a href="<?php echo base_url('booking') ;?>" class="ttm-btn ttm-btn-size-md ttm-btn-shape-round ttm-btn-style-fill ttm-btn-color-skincolor mt-20">
                    Back To Page</a>
                     
            </center>
                  
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

<!--<div id="popupContainer" class="popup-container">-->
    <!-- Popup Box -->
<!--    <div class="popup-box">-->
<!--          <h3>Do you want to cancel or proceed With<br> Your Booking?</h3>-->
<!--        <p>Select Go Back to edit your Booking</p>-->
<!--        <a href="<?php echo base_url('user/booking_status/').$booking[0]->invoice_no ;?>" id="proceedBtn" ><button   class="popup-button btn-sm proceed-button">Proceed</button> </a>-->
      
<!--        <button  id="cancelBtn" class="popup-button btn-sm cancel-button">Go back</button>-->
    
<!--    </div>-->
<!--</div>-->

<script>
    const showPopupButton = document.getElementById("showPopupBtn");
    const popupContainer = document.getElementById("popupContainer");
    const cancelButton = document.getElementById("cancelBtn");
    const proceedButton = document.getElementById("proceedBtn");

    showPopupButton.addEventListener("click", function () {
        popupContainer.style.display = "flex";
    });

    cancelButton.addEventListener("click", function () {
        popupContainer.style.display = "none";
        console.log("User clicked Cancel");
    });

    proceedButton.addEventListener("click", function () {
        popupContainer.style.display = "none";
        console.log("User clicked Proceed");
    });
</script>
</body>
</html>