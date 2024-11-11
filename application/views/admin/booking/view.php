<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Booking </title>
    <?php $this->load->view('admin/layout/head_css'); ?>
    <?php $this->load->view('admin/layout/tiny-mce'); ?>
    <style>
        @media print {
            a[href]:after {
                content: none !important;
            }
            #print_btn {
                display: none;
            }
        }
    </style>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php $this->load->view('admin/layout/header'); ?>

        <?php $this->load->view('admin/layout/sidebar'); ?>
        <?php $link=$this->setting_model->get_all_setting();?>
        <div class="content-wrapper">
            <section class="content-header">
                <h1>Booking No: #<?php echo $booking[0]->invoice_no ?></h1>

                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a>
                    </li>
                    <li class="active"><a href="<?php echo base_url('admin/Booking/listing'); ?>">All Booking</a>
                    </li>

                </ol>
            </section>
            <section class="content">
                <!-- Info boxes -->
                <div class="box">
                    <div class="box-body">
                        <div class="box box-primary">
         
                    <div class="row">
                        <div  class="col-sm-1" ></div>
                        <div class="col-sm-5">
                            <div>
                                 <h3>Booking Details</h3>
                                    <table class=" table table-bordered" >        
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
                            <div>
                                 <h3>User Details</h3>
                           <table class=" table table-bordered" >        
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
                                 <td>Whats App Number</td>
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
                           
                        </div>
                 
                        <div class="col-sm-5">
                            <div> 
                                <h3>Service Details</h3>
                                <table class=" table table-bordered" >        
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
                            <div>
                                 <h3>Payment Details</h3>
                           <table class=" table table-bordered" >        
                            
                             <tr>
                                 <td>Total  Amount</td>
                                 <td>₹ <?php echo $booking[0]->amount; ?> </td>
                             </tr>  
                             <tr>
                                 <td>Extra Person  Amount</td>
                                 <td>₹ <?php echo $booking[0]->extra_person_amount; ?> </td>
                             </tr> 
                             <tr>
                                 <td>Cake  Amount</td>
                                 <td>₹ <?php echo $booking[0]->cake_amount; ?> </td>
                             </tr>
                             <tr>
                                 <td>Extra Decoration  Amount</td>
                                 <td>₹ <?php echo $booking[0]->extra_amount; ?> </td>
                             </tr>
                             <tr>
                                 <td>Gift  Amount</td>
                                 <td>₹ <?php echo $booking[0]->gift_amount; ?> </td>
                             </tr>
                         
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
                    </div>
                </div>

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php $this->load->view('admin/layout/footer'); ?>
    </div>
    <!-- ./wrapper -->
    <?php $this->load->view('admin/layout/footer_js'); ?>
    <script class="example">
        function print_invoice(el) {
            var restorepage = document.body.innerHTML;
            var printcontent = document.getElementById(el).innerHTML;
            document.body.innerHTML = printcontent;
            window.print();
            document.body.innerHTML = restorepage;
        }
    </script>
</body>

</html>