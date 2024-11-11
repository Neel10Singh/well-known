<?php $RESULT = $this->cms_model->get_cms_by_id(24);?>
<?php $link = $this->setting_model->get_all_setting();?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php  echo $RESULT[0]->meta_title ; ?></title>
<meta name="description" content="<?php  echo $RESULT[0]->meta_description ; ?>">
<meta name="keywords" content="<?php  echo $RESULT[0]->meta_keyword; ?>">
<link rel="canonical" href="<?php  echo $RESULT[0]->canonical; ?>">
 <?php $this->load->view('front/layout/head'); ?>
</head>
<body>

    <?php $this->load->view('front/layout/header'); ?>
     <main>
            <!-- breadcrumb start -->
            <section class="breadcrumb-area">
                <div class="container">
                    <div class="col">
                        <div class="row">
                            <div class="breadcrumb-index">
                                <!-- breadcrumb main-title start-->
                                <div class="breadcrumb-title">
                                    <h2><?php echo $RESULT[0]->title; ?></h2>
                                </div>
                                <!-- breadcrumb main-title end-->
                                <!-- breadcrumb-list start -->
                                <ul class="breadcrumb-list">
                                    <li class="breadcrumb-item-link">
                                        <a href="<?php echo base_url() ;?>">Home</a>
                                    </li>
                                    <li class="breadcrumb-item-link">
                                        <span><?php echo $RESULT[0]->title; ?></span>
                                    </li>
                                </ul>
                                <!-- breadcrumb-list end -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- breadcrumb end -->
            <!-- order history start -->
            <section class="order-histry-area section-ptb">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="order-history">
                                <!-- order profile start -->
                                <div class="profile">
                                    <div class="order-pro">
                                      
                                        <div class="order-name">
                                            <h4><?php echo ucwords($user[0]->fname.' '.$user[0]->lname); ?></h4>
                                            <span>Joined <?php echo date('F, d, Y',strtotime($user[0]->create_date)) ;; ?></span>
                                        </div>
                                    </div>
                                    <div class="order-his-page">
                                        <?php $this->load->view('front/account/left-menu'); ?>
                                    </div>
                                </div>
                                <!-- order profile start -->
                                <!-- order info start -->
                                <div class="order-info">
                                    <div class="pro-add-title">
                                        <h4>Order</h4>
                                    </div>
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Order #</th>
                                                <th>Date purchased</th>
                                                <th>Status</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                   
                                          	<?php foreach($ORDER as $ord){ ?>
											<tr>
												<td><a href="<?php echo base_url('user/view_order/'.$ord->order_no); ?>"><?php echo $ord->order_no; ?></a></td>
												<td><?php echo date('F m Y',strtotime($ord->create_date)); ?></td>
												
											
												<td><?php echo ucfirst($ord->status); ?></td>	
												<td><?php echo CURRENCY_SYMBOL.$ord->final_amount; ?></td>		
											
											</tr>	
											<?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- order info end -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="order-histry-area section-ptb">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="order-history">
                                <!-- order profile start -->
                                <div class="profile">
                                    <div class="order-pro">
                                      
                                        <div class="order-name">
                                            <h4><?php echo ucwords($user[0]->fname.' '.$user[0]->lname); ?></h4>
                                            <span>Joined <?php echo date('F, d, Y',strtotime($user[0]->create_date)) ;; ?></span>
                                        </div>
                                    </div>
                                    <div class="order-his-page">
                                        <?php $this->load->view('front/account/left-menu'); ?>
                                    </div>
                                </div>
                                <!-- order profile start -->
                                <!-- profile-form start -->
                                <div class="profile-form">
                                    <div class="pro-add-title">
                                        <h4><?php echo $RESULT[0]->title; ?></h4>
                                    </div>
                                     <div class="ps-block__content">
        							     <?php echo $this->session->flashdata('msg'); ?>
                                            	<div class="table-responsive order_table">
									<?php if(count($ORDER)>0){ ?>
									<table class="table table-order table-bordered">
										<thead>
											<tr>
												<th>ORDER #</th>
												<th>DATE</th>
												
												<th> TOTAL</th>												
                                                <th>PAYMENT METHOD</th>                                                
                                                <th>PAYMENT STATUS</th>                                                
												<th>ORDER STATUS</th>
												
												<th></th>
												
											</tr>
										</thead>
										<tbody>
											<?php foreach($ORDER as $ord){ ?>
											<tr>
												<td>#<?php echo $ord->order_no; ?></td>
												<td><?php echo date('d-m-Y',strtotime($ord->create_date)); ?></td>
												
												<td><?php echo CURRENCY_SYMBOL.$ord->final_amount; ?></td>
                                                <td><?php echo $ord->payment_method; ?></td>
                                                <td><?php echo $ord->payment_status; ?></td>
												<td><?php echo ucfirst($ord->status); ?></td>	
														
												<td><a href="<?php echo base_url('user/view_order/'.$ord->order_no); ?>" class="btn btn-default btn-update btn-xs" style="margin-top:0px;">View Order</a>
												
												</td>
											</tr>	
											<?php } ?>
										</tbody>
									</table>
									<?php }else{ ?>
										You have no orders.
									<?php } ?>
								</div>
                                        <!--- Row End -->
                                    </form>
        							</div>
                                </div>
                                <!-- profile-form end -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- order history end -->
        </main>

    <?php $this->load->view('front/layout/footer'); ?>
<?php $this->load->view('front/layout/footer-js'); ?>
</body>

</html>