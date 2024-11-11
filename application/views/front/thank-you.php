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
           
         <section class="ttm-row about-intro-section   ttm-bgimage-yes bg-img10 ttm-bg ttm-bgimage-yes">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <h3><?php echo $RESULT[0]->title; ?></h3>
                            <p><?php  echo $RESULT[0]->description ; ?></p>
                        </div>
                    </div>
                    
                                        <div class="row">
                                                <div class="col-sm-6">
                                                     <h3>Booking Details</h3>
                                                        <table class="table" >        
                                                         <tr>
                                                             <td>Booking NO:</td>
                                                             <td><?php echo $booking[0]->invoice_no; ?></td>
                                                         </tr>
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
                                                   <table class="table" >        
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
                                                     <th>₹ <?php echo $booking[0]->gift_amount; ?> </th>
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
            </section>
        </div>
        <?php $this->load->view('front/layout/footer'); ?>
    </div>
    <?php $this->load->view('front/layout/footer-js'); ?>
</body>
</html>
