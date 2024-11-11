<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Orders Listing</title>
  <?php $this->load->view('admin/layout/head_css'); ?>
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/datatables/dataTables.bootstrap.css'); ?>">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php $this->load->view('admin/layout/header'); ?>	
  
<?php $this->load->view('admin/layout/sidebar'); ?>	
	
	<div class="content-wrapper">
    
    <section class="content-header">
		<h1>AllOrders</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">All Orders</li>			
		</ol>
    </section>

   
    <section class="content">
      <!-- Info boxes -->
		<div class="box">
			<div class="box-body">
			<?php echo $this->session->flashdata('msg'); ?>
			<table id="example1" class="table table-bordered table-striped">
                <thead>
					<tr>
					    <th>#</th>						
						<th>Order ID</th>
						<th>User</th>
						<th>Date/Time</th> 
						<th>Total Amount</th>
						<th>Order Status</th>
						<th>Payment Method</th>
                        <th>Payment Status</th>						
                      					
						<th>Action</th>	
					</tr>
                </thead>
				<?php if(count($RESULT)>0){ ?>
                <tbody>
				<?php $no=0; foreach($RESULT as $record){ $no++; ?>		
				<?php $user = $this->user_model->get_user_by_id($record->user_id);  ?>	
					<tr>
						<td><?php echo $no; ?></td>
						<td>Order-<?php echo $record->id; ?></td>
						<td>
							<?php if($user){ ?>
							<a href="<?php echo base_url('admin/user/profile/'.$user[0]->id); ?>" target="_blank">
							<?php 
								echo @$user[0]->fname.' '.@$user[0]->lname;
								?>
								</a></td>
								<?php 
							}
							 ?>
								
						<td><?php echo date('d-M-Y ',strtotime($record->create_date)); ?><?php echo date('h:i A',strtotime($record->create_date)); ?> </td>
						<td><?php echo CURRENCY_SYMBOL."  ".$record->final_amount; ?></td>
						
						<td>
							<?php if(  $record->status == 'Cancelled'){  ?>           
                            <button class="btn  btn-sm btn-danger "><?php Echo $record->status ?></button>
                    
                            <?php }elseif ($record->status == 'Pending') { ?>
                            <button class="btn  btn-sm btn-primary "><?php Echo $record->status ?></button>
                            <?php }elseif ($record->status == 'Confirmed') { ?>
                            <button class="btn btn-sm btn-info "><?php Echo $record->status ?></button>
                            <?php }elseif ($record->status == 'Delivered') { ?>
                            <button class="btn  btn-success  btn-sm  "><?php Echo $record->status ?></button>
                            <?php }elseif ($record->status == 'Shipped') { ?>
                            <button class="btn  btn-warning  btn-sm  "><?php Echo $record->status ?></button>
                             <?php }elseif ($record->status == 'Placed') { ?>
                            <button class="btn  btn-warning  btn-sm  "><?php Echo $record->status ?></button>
                            <?php  } ?>
						</td>	
							<td><?php echo $record->payment_method; ?></td>
                        <td>
                             <?php if(  $record->payment_status == 'Pending'){  ?>    
                            <button class="btn btn-sm btn-danger">     <?php Echo $record->payment_status ?></button>
                         
                             <?php }elseif ($record->payment_status == 'Paid') { ?>
                            <button class="btn btn-sm btn-success  "><?php Echo $record->payment_status ?></button>
                            
                             <?php }elseif ($record->payment_status == 'Failed') { ?>
                            <button class="btn btn-sm btn-danger  "><?php Echo $record->payment_status ?></button>
                            <?php  } ?>
                        </td>					
                     			
						<td width="15%">
						    <a type="button" data-book-id="<?php echo $record->order_no;?>" data-book-status="<?php echo $record->status;?>" data-book-payment="<?php echo $record->payment_status;?>"  class="btn btn-sm btn-success btn-sm showstatus" data-toggle="modal" data-target="#myModal1"> Change</a> &nbsp; 
							<a href="<?php echo base_url('admin/orders/view/'.$record->id); ?>" class="btn  btn-primary btn-xs"><i class="fa fa-fw fa-eye"></i> View</a><br>
						
						</td>	
					</tr>
				<?php } ?>	
                </tbody> 
				<?php } ?>	
            </table>
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
<script src="<?php echo base_url('assets/admin/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/admin/plugins/datatables/dataTables.bootstrap.min.js'); ?>"></script>
<script>
  $(function () {
    $("#example1").DataTable();    
  });
</script>
<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Change Order Status</h4> </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo base_url('admin/orders/processOrderStatus') ?>" enctype="multipart/form-data"> Order Id <span style="color:red;">*</span>
                    <div class="box-body">
                        <div class="form-group">
                            <input type="text" class="form-control" name="order_no" value="" readonly="readonly"> 
                        </div>
                         Payment Status <span style="color:red;">*</span>
                        <div class="form-group">
                            <select class="form-control" name="payment_status"  id="payment_status" required>
                                <option value=""></option>
                                <option >Pending</option>
                                <option  >Paid</option>
                                <option  >Unpaid</option>
                            
                            </select>
                        </div> 
                        Order Status <span style="color:red;">*</span>
                        <div class="form-group">
                            <select class="form-control" name="status"  id="status" required>
                                <option value=""></option>
                                <option >Pending</option>
                                <option  >Cancelled</option>
                                <option  >Confirmed</option>
                                <option  >Delivered</option>
                                <option >Shipped</option>
                                <option >Placed</option>
                            </select>
                        </div> Remarks <span style="color:red;">*</span>
                        <div class="form-group">
                            <textarea class="form-control" name="remarks" required></textarea>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" name="Update" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    $('.showstatus').on('click', function() {
        $('input[name="order_no"]').val();
        var bookId = $(this).attr('data-book-id');
        var bookstatus = $(this).attr('data-book-status');
        var bookpayment = $(this).attr('data-book-payment');
        $('input[name="order_no"]').val(bookId);
        $('#status').val(bookstatus).attr("selected", "selected")
        $('#payment_status').val(bookpayment).attr("selected", "selected")
    });

</script>

</body>
</html>
