
<?php $link = $this->setting_model->get_all_setting();?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php Echo $ORDER[0]->order_no ?></title>
 <?php $this->load->view('front/layout/head'); ?>
 <style>
      th, td{
 padding:10px;
 }
 </style>

</head>
<body>

    <?php $this->load->view('front/layout/header'); ?>

    <section class="our-dashbord dashbord">
        <div class="container">
            <div class="row">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-10">  
                		<div class="login-form">
	                        <?php $link = $this->setting_model->get_all_setting();?>
	                        <div class="row">
								<div class="col-md-12">
									<div class="welcome-msg" style="padding:30px"> 
										<div class="table-responsive order-tabel" id="invoice_print" >
											<?php
											$shipping = $this->order_model->get_shipping_data($ORDER[0]->id);
											$billing = $this->order_model->get_billing_data($ORDER[0]->id);
											$items_data = $this->order_model->get_item_data($ORDER[0]->id);
											?>
											<table bgcolor="#FFFFFF" cellspacing="0" cellpadding="10" border="1" width="100%" style="border:1px solid #e0e0e0;">
												<tbody>		
													<tr >
														<td >
															<table style="width:100%">
																<tr>
																	<td style="width:60%">
																		<h4>Order Information</h4>
																		<p><strong>Order Number</strong> : <?php Echo $ORDER[0]->order_no ?>
																		
																		<br><strong>Order Status</strong> : <?php echo ucfirst($ORDER[0]->status); ?>
																		<br><strong>Payment Status</strong> : <?php echo ucfirst($ORDER[0]->payment_status); ?>		
																		<br><strong>Payment Method</strong> : <?php echo ucfirst($ORDER[0]->payment_method); ?></p>
																	</td>
																	<td>
																		<p><strong>Order Date</strong> : <?php echo date('d-m-Y h:i:s',strtotime($ORDER[0]->create_date)); ?></p>
																		
																	</td>
																</tr>
															</table>				
														</td>
													</tr>
													<tr>
														<td border="0">
															<table cellspacing="0" cellpadding="0" border="1" width="100%" style="border:1px solid #eaeaea">
																<thead>
																	<tr>
																		<th align="left" width="325"  bgcolor="#F6F6F6" style="font-size:13px;padding:5px 9px 6px 9px;line-height:1em"> Shipping Address</th>
																		<th width="10" style="border: none !important;"></th>
																		<th align="left" width="325" bgcolor="#F6F6F6" style="font-size:13px;padding:5px 9px 6px 9px;line-height:1em"> Billing Address</th>
																	</tr>
																</thead>
																<tbody>
																	<tr>
																		<td valign="top" style="font-size:12px;padding:7px 9px 9px 9px;border-left:1px solid #eaeaea;border-bottom:1px solid #eaeaea;border-right:1px solid #eaeaea">
																			<strong>Name : </strong><?php echo $shipping[0]->fname.' '.$shipping[0]->lname; ?> <br>
																			<strong>Contact Number : </strong><?php echo $shipping[0]->phone; ?><br>
																			<strong>Address : </strong> <?php echo $shipping[0]->address.', '.$shipping[0]->landmark.',<br> '.$shipping[0]->city.', '.$shipping[0]->state.', <br>'.$shipping[0]->country.' '.$shipping[0]->pincode; ?>
	                                        								<br>
	                                        								<?php if( $shipping[0]->gst){ ?>
	                                        							   <strong>GST : </strong> <?php echo $shipping[0]->gst; ?>
	                                        							   <?php } ?>
																		</td>
																		<td style="border: none !important;">&nbsp;</td>
																		<td valign="top" style="font-size:12px;padding:7px 9px 9px 9px;border-left:1px solid #eaeaea;border-bottom:1px solid #eaeaea;border-right:1px solid #eaeaea">
																			<strong>Name : </strong><?php echo $billing[0]->fname.' '.$billing[0]->lname; ?> <br>
																			<strong>Contact Number : </strong><?php echo $billing[0]->phone; ?><br>
																		<strong>Address : </strong> <?php echo $billing[0]->address.', '. $billing[0]->landmark.',<br>  '. $billing[0]->city.', '.$billing[0]->state.',<br> '.$billing[0]->country.', '.$billing[0]->pincode; ?>
	                                                                        <br>
	                                                                        <?php if($billing[0]->gst){ ?>
	                                        							   <strong>GST : </strong> <?php echo $shipping[0]->gst; ?>
	                                        							   <?php } ?>
																		</td>
																	</tr>
																</tbody>
															</table>
															<br>
															<table class="table table-responsive table-bordered">
																<thead  bgcolor="#F6F6F6">
																	<tr>
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
																		<td colspan="3" align="right" style="padding:3px 9px">Subtotal</td>
																		<td align="center" style="padding:3px 9px"><span><?php echo CURRENCY_SYMBOL." ".round($ORDER[0]->total_amount); ?></span></td>
																	</tr>
																	<?php if(!empty($ORDER[0]->coupon)){ ?>
																	<?php $coupon_data = json_decode($ORDER[0]->coupon); ?>
																	<?php //print_r($coupon_data); ?>
																	<tr>
																		<td colspan="3" align="right" style="padding:3px 9px">Discount(<?php echo $coupon_data->discount; ?>%)</td>
																		<td align="center" style="padding:3px 9px"><span>-<?php echo CURRENCY_SYMBOL." ".$ORDER[0]->discount_amount; ?></span></td>
																	</tr>
																	<?php } ?>
																	<?php if($ORDER[0]->shipping_charge) {  ?>
        															<tr>
        																<td colspan="3" align="right" style="padding:3px 9px"><strong> Shipping Charges</strong></td>
        																<td align="center" style="padding:3px 9px"><strong><span><?php echo CURRENCY_SYMBOL." ".$ORDER[0]->shipping_charge; ?></span></strong></td>
        															</tr>
        															<?php } ?>
																	<tr>
																		<td colspan="3" align="right" style="padding:3px 9px"><strong> Total</strong></td>
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
                    </div>
                </div>
            </div>
        </div>
    </section>
    
<?php $this->load->view('front/layout/footer'); ?>
        </div>
       <?php $this->load->view('front/layout/footer-js'); ?>
<script>
$(document).ready(function(){
	$('#print_btn').click({
		//$('#invoice_print').print();
	});
	//$('#invoice_print').print();
});

function print_invoice(el){
    var restorepage = document.body.innerHTML;
    var printcontent = document.getElementById(el).innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
    document.body.innerHTML = restorepage;
}
</script>
</body>
</html>