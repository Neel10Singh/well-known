<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Invoice </title>
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
                <h1>Order #<?php echo $ORDER[0]->order_no ?></h1>

                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a>
                    </li>
                    <li class="active"><a href="<?php echo base_url('admin/orders/listing'); ?>">All Orders</a>
                    </li>

                </ol>
            </section>
            <section class="content">
                <!-- Info boxes -->
                <div class="box">
                    <div class="box-body">
                        <div class="box box-primary">
                            <div class="row" style="padding:10px 0px">
                                <div class="col-sm-6">
                                    <button class="btn btn-warning btn-update pull-right1" id="print_btn" onclick="return print_invoice('invoice_print'); " style="margin-bottom: 5px;">Print Invoice</button>
                                </div>
                                <div class="col-sm-6">

                                </div>
                            </div>
                            <div class="table-responsive order-tabel" id="invoice_print">
                                <br>


                                <?php $user=$this->user_model->get_user_by_id($ORDER[0]->user_id); $shipping = $this->order_model->get_shipping_data($ORDER[0]->id); $billing = $this->order_model->get_billing_data($ORDER[0]->id); $items_data = $this->order_model->get_item_data($ORDER[0]->id); ?>
                                <?php $link=$this->setting_model->get_all_setting();?>

                                <div class="table-responsive order-tabel" id="invoice_print">
                                    <table bgcolor="#FFFFFF" cellspacing="0" cellpadding="10" border="1" width="100%" style="border:1px solid #e0e0e0">
                                        <tbody>
                                            <tr>
                                                <td border="0">

                                                    <table width="100%">

                                                        <tbody>
                                                            <tr>
                                                                <td valign="top" style="font-size:12px;padding:7px 9px 9px 9px;width: 33%;">
                                                                    <?php if($link[0]->logo) { ?>
                                                                    <img src="<?php echo base_url('uploads/').$link[0]->logo; ?>" style="width: 50%;">
                                                                    <?php }else{ ?>

                                                                    <?php echo $link[0]->title; ?>
                                                                    <?php } ?>

                                                                </td>
                                                                <td style="font-size:12px;padding:7px 9px 9px 9px;width: 33%;">
                                                                    <h2 style="text-align:center"><b>INVOICE</b></h2>
                                                                </td>
                                                                <td valign="top" style="font-size:12px;padding:20px 9px 9px 9px;">
                                                                        <p>
                                                                            <?php if($link[0]->phone){ ?>
                                                                            Contact No. <strong> <?php echo $link[0]->phone; ?></strong>
                                                                            <?php } ?>
                                                                        <br> Email.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong> <?php echo $link[0]->email; ?></strong>
                                                                        <br> Address.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        <strong> <?php echo $link[0]->address_content; ?></strong>
                                                                        <br> GST No.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong><?php echo $link[0]->gst; ?></strong>
                                                                    </p>


                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <br>
                                                    <table cellspacing="0" cellpadding="0" border="1" width="100%" style="border:1px solid #eaeaea">
                                                        <thead>
                                                            <tr>
                                                                <th align="left" width="325" bgcolor="#EAEAEA" style="font-size:13px;padding:5px 9px 6px 9px;line-height:1em">Order Information</th>
                                                                <th width="10" style="border: none !important;"></th>
                                                                <th align="left" width="325" bgcolor="#EAEAEA" style="font-size:13px;padding:5px 9px 6px 9px;line-height:1em">Account Information</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td valign="top" style="font-size:12px;padding:7px 9px 9px 9px;border-left:1px solid #eaeaea;border-bottom:1px solid #eaeaea;border-right:1px solid #eaeaea">
                                                                    <p><strong>Order</strong> : #
                                                                        <?php echo $ORDER[0]->order_no ?>
                                                                        <br><strong>Order Date</strong> :
                                                                        <?php echo date( 'd-M-Y h:i:s a',strtotime($ORDER[0]->create_date)); ?>
                                                                        <p><strong>Order Status</strong> :
                                                                            <?php echo ucfirst($ORDER[0]->status); ?></p>
                                                                        <p><strong>Payment Status</strong> :
                                                                            <?php echo ucfirst($ORDER[0]->payment_status); ?></p>
                                                                        <p><strong>Payment Method</strong> :
                                                                            <?php echo ucfirst($ORDER[0]->payment_method); ?></p>
                                                                </td>
                                                                <td></td>
                                                                <td valign="top" style="font-size:12px;padding:7px 9px 9px 9px;border-left:1px solid #eaeaea;border-bottom:1px solid #eaeaea;border-right:1px solid #eaeaea">
                                                                    <p><strong>Customer Name</strong> :
                                                                        <a href="<?php echo base_url('admin/user/profile/'.$user[0]->id); ?>">
                                                                            <?php echo $user[0]->fname.' '.$user[0]->lname; ?></a>
                                                                        <br><strong>Email</strong> :
                                                                        <?php echo $user[0]->email; ?>
                                                                        <br><strong>Contact</strong> :
                                                                        <?php echo $user[0]->contact_no; ?>
                                                                    </p>


                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <bR>

                                                    <table cellspacing="0" cellpadding="0" border="1" width="100%" style="border:1px solid #eaeaea">
                                                        <thead>
                                                            <tr>
                                                                <th align="left" width="325" bgcolor="#EAEAEA" style="font-size:13px;padding:5px 9px 6px 9px;line-height:1em">Shipping Address</th>
                                                                <th width="10" style="border: none !important;"></th>
                                                                <th align="left" width="325" bgcolor="#EAEAEA" style="font-size:13px;padding:5px 9px 6px 9px;line-height:1em">Billing Address</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td valign="top" style="font-size:12px;padding:7px 9px 9px 9px;border-left:1px solid #eaeaea;border-bottom:1px solid #eaeaea;border-right:1px solid #eaeaea">


                                                                    <?php $shipping_details=$this->order_model->get_shipping_data($ORDER[0]->id) ; echo "
                                                                    <p><b>".$shipping_details[0]->fname." ". $shipping_details[0]->lname."</b> "; echo "
                                                                        <br> <b>Phone:  &nbsp;   &nbsp; </b>".$shipping_details[0]->phone.""; echo "
                                                                        <br> <b>Address: &nbsp;  &nbsp; </b>". $shipping_details[0]->address.", ". $shipping_details[0]->city.","; echo $shipping_details[0]->state.", ". $shipping_details[0]->country.",". $shipping_details[0]->pincode."
                                                                        <br>"; echo " <b>Landmark: &nbsp; &nbsp; </b> ".$shipping_details[0]->landmark."
                                                                        <br>"; if($shipping_details[0]->gst){ echo " <b>GST:  &nbsp;   &nbsp; </b>".$shipping_details[0]->gst.""; } echo "</p>" ; ?>

                                                                </td>
                                                                <td></td>
                                                                <td valign="top" style="font-size:12px;padding:7px 9px 9px 9px;border-left:1px solid #eaeaea;border-bottom:1px solid #eaeaea;border-right:1px solid #eaeaea">
                                                                    <?php $billing_details=$this->order_model->get_billing_data($ORDER[0]->id) ; if($billing_details) { ?>

                                                                    <?php echo "<p><b>".$billing_details[0]->fname." ". $billing_details[0]->lname."</b>"; echo "
                                                                    <br> <b>Phone:   &nbsp; &nbsp;</b>".$billing_details[0]->phone.""; echo "
                                                                    <br><b>Address:  &nbsp; &nbsp;</b>". $billing_details[0]->address.", ". $billing_details[0]->city.","; echo $billing_details[0]->state.", ". $billing_details[0]->country.",". $billing_details[0]->pincode.""; echo "
                                                                    <br><b>Landmark: &nbsp; &nbsp; </b> : ".$billing_details[0]->landmark.""; if($billing_details[0]->gst){ echo "
                                                                    <br> <b>GST:  </b>".$billing_details[0]->gst.""; } echo "</p>" ; } ?>


                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <br>
                                                    <table class="table table-responsive table-bordered">
														<thead  bgcolor="#F6F6F6">
															<tr>
									                            <th class="cart-product-name">Product</th>
									                            <th class="cart-product-name">Product</th>
									                            <th class="fb-product-quantity">Quantity</th>

									                            <th class="fb-product-subtotal">Sub Total</th>
									                            <th class="fb-product-subtotal">Total</th>
									                          </tr>
														</thead>
														<tbody>
															
														<?php if(count($items_data)>0){ ?>
														<?php foreach($items_data as $item): ?>
														 <?php
														   $product_data = $this->product_model->get_product_by_id($item->pro_id);  
														   $product_images = $this->product_model->select_product_images($item->pro_id);?>
															<?php include 'order-item.php'  ; ?>
														<?php endforeach; ?>	
														<?php } ?>	
														</tbody>					
														<tfoot >
															<tr>
																<td colspan="4" align="right" style="padding:3px 9px">Subtotal</td>
																<td align="center" style="padding:3px 9px"><span><?php echo CURRENCY_SYMBOL." ".round($ORDER[0]->total_amount); ?></span></td>
															</tr>
															<?php if(!empty($ORDER[0]->coupon)){ ?>
															<?php $coupon_data = json_decode($ORDER[0]->coupon); ?>
															<?php //print_r($coupon_data); ?>
															<tr>
																<td colspan="4" align="right" style="padding:3px 9px">Discount(<?php echo $coupon_data->discount; ?>%)</td>
																<td align="center" style="padding:3px 9px"><span>-<?php echo CURRENCY_SYMBOL." ".$ORDER[0]->discount_amount; ?></span></td>
															</tr>
															<?php } ?>
															<?php if($ORDER[0]->shipping_charge) {  ?>
															<tr>
																<td colspan="4" align="right" style="padding:3px 9px"><strong> Shipping Charges</strong></td>
																<td align="center" style="padding:3px 9px"><strong><span><?php echo CURRENCY_SYMBOL." ".$ORDER[0]->shipping_charge; ?></span></strong></td>
															</tr>
															<?php } ?>
															<tr>
																<td colspan="4" align="right" style="padding:3px 9px"><strong> Total</strong></td>
																<td align="center" style="padding:3px 9px"><strong><span><?php echo CURRENCY_SYMBOL." ".$ORDER[0]->final_amount; ?></span></strong></td>
															</tr>
														</tfoot>
													</table>
                                                  
                                                </td>
                                                 
                                            </tr>


                                        </tbody>
                                    </table>
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