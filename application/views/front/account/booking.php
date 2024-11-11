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
            <section class="ttm-row break-991-colum ttm-bgcolor-white clearfix faq-intro-section">
                <div class="container">
        <div class="row profile">
            <div class="col-lg-3 col-md-4 col-sm-12">
                <ul class="tabs">
                    <?php $this->load->view('front/account/left-menu'); ?>
                   
                </ul>
            </div>
            <div class="col-lg-9 col-md-8 col-sm-12 sidebar-widget-area">
                <div class="tab-contents sidebar-widget">
                    
                    <div class="tab-content active " id="History">
                        <div class=" padding-12 box-shadow ">
                            <h4 class="widget-title resom">Bookings History</h4>
                            
                    	<?php echo $this->session->flashdata('msg'); ?> 
                    	    <?php if(count($booking)>0 ){ ?>
                            <?php foreach($booking as $key => $value) { ?>
                            <?php $payment =  $this->db->get_where('tbl_payment' , array('booking_id'=>$value->id))->result() ;  ?>
				        	<?php if(count($payment) >0) { ?>
                                <div class="row booking">
                                    <div class="col-lg-3 col-0 mob-non">
                                        <div class=" mob-img ">
                                               <?php if($value->theatre_image) { ?> 
                                             <img src="<?php echo base_url('uploads/theatre/').$value->theatre_image ?>" alt="<?php echo $value->theatre_title; ?>" style="width:100%">
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-12 ">
                                        <div class="row">
                                            <div class="col-lg-12 col-12">
                                                <h5 class="mb-15 mob-view"><a href="<?php echo base_url('theatre-page//').$value->url_slug ?>"><?php echo ucwords($value->theatre_title); ?></a></h5>
                                            </div>
                                         
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4 col-sm-6 col-6">
                                                <span class="mob-text-class">₹ <?php echo  $value->total_amount ; ?></span>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-6">
                                                <p class="price mob-view-sm" style="margin-top: -2px;"><?php echo date('d M' , strtotime( $value->date)) ."'".date('y' , strtotime( $value->date)); ?>
                                                </p>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-6">
                                                <span class="mob-text-class clr-yelo">
                                                    <?php echo  $value->status ; ?></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4 col-sm-6 col-6">
                                                <div class="book-btns-ss">
                                                    <a href="<?php echo base_url('user/booking_details/').$value->invoice_no ; ?>" class="book-btn-new profie">Receipt</a>
                                                </div>
                                            </div>
                                             <?php if($value->status == 'Booked') { ?>
                                            <div class="col-lg-4 col-sm-6 col-6">
                                                <div class="book-btns-ss">
                                                   
                                                   Payment Status : <?php echo @$payment[0]->status; ?>
                                                   
                                                </div>
                                            </div>
                                            <?php } ?>
                                            <?php if($value->status == 'Completed') { ?>
                                            <div class="col-lg-4 col-sm-6 col-6">
                                                <div class="book-btns-ss">
                                                  
                                                    <?php 
                                                    $user_id = $this->session->userdata('USER_ID');
                                                    $count =  $this->db->get_where('tbl_booking_review' , array('booking_id'=> $value->id ,'user_id'=> $user_id ) )->num_rows() ;
    		                                         if($count == 0 ){  ?>
    		        
                                                    <a href="<?php echo base_url('user/add_review/').$value->invoice_no ; ?>" class="book-btn-new profie">Add Review</a>
                                                    <?php }else{  ?>
                                                    <a href="<?php echo base_url('user/add_review/').$value->invoice_no ; ?>" class="book-btn-new profie">Edit Review</a>
                                                    <?php } ?>
                                                   
                                                </div>
                                            </div>
                                             <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            <?php } ?>
                            <?php } ?>
                            
                           <?php }else{ ?>
                            <div>
                                <center><h3>Oops! No bookings Yet</h3></center>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    
                </div>
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
<script>
    const tabs = document.querySelectorAll("[data-tab-target]");
    const tabContents = document.querySelectorAll(".tab-content");

    tabs.forEach((tab) => {
        tab.addEventListener("click", () => {
            tabs.forEach((tab) => {
                tab.classList.remove("active");
            });
            tab.classList.add("active");
            tabContents.forEach((tabContent) => {
                tabContent.classList.remove("active");
            });
            const target = document.querySelector(tab.dataset.tabTarget);
            target.classList.add("active");
        });
    });
</script>

<script type="text/javascript">
	$(document).ready(function() {
		$('.showPopupBtn').click(function() {
		     $('#proceedBtn').attr('href' ,'' ) ; 
		     invoice =  $(this).attr('invoice');
		     const popupContainer = document.getElementById("popupContainer");
             popupContainer.style.display = "flex";
             url = "<?php echo base_url('user/booking_status/') ; ?>"+invoice;
             $('#proceedBtn').attr('href' ,url ) ; 
		});
	});
</script>
	
<!--<div id="popupContainer" class="popup-container">-->
    <!-- Popup Box -->
<!--    <div class="popup-box">-->
<!--        <h3>Do you want to cancel or proceed With<br> Your Booking?</h3>-->
<!--        <p>Select Go Back to edit your Booking</p>-->
<!--        <a href="" id="proceedBtn" ><button   class="popup-button btn-sm proceed-button">Proceed</button> </a>-->
<!--        <button  id="cancelBtn" class="popup-button btn-sm cancel-button">Go back</button>-->
<!--    </div>-->
<!--</div>-->

<script>
    const cancelButton = document.getElementById("cancelBtn");
    const proceedButton = document.getElementById("proceedBtn");

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