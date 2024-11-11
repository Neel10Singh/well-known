<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> booking Listing</title>
  <?php $this->load->view('admin/layout/head_css'); ?>
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/datatables/dataTables.bootstrap.css'); ?>">
     <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets'); ?>/admin/jquery/jquery-ui.css">
     <style>
         .table td, .table th {
    padding: 3px;
    font-size: 14px;
         }
     </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php $this->load->view('admin/layout/header'); ?>	
  
<?php $this->load->view('admin/layout/sidebar'); ?>	
	
	<div class="content-wrapper">
    
    <section class="content-header">
		<h1>All Booking</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">All booking</li>			
		</ol>
    </section>

   
    <section class="content">
      <!-- Info boxes -->
		<div class="box">
			<div class="box-body table-responsive">
			        <form role="form"  id="form" autocomplete="off" enctype="multipart/form-data">
                    <div class="row">
        
                            <div class="form-group col-sm-2">
                                <label for="exampleInputPassword1">City</label>
                                <select class="form-control" name="city_id"  id="city" required>
                                    
                                    <option value=''>Select</option>
                                    <?php foreach($city as $key=>$value){ ?>
                                    <option value='<?php echo $value->id; ?>' <?php if(isset($_GET['city_id'])&&($_GET['city_id'] ==$value->id )){ echo " Selected" ;} ?>><?php echo $value->title; ?></option>
                                    <?php } ?>
                                    
                                </select>
                                <?php echo form_error( 'city'); ?>
                            </div>
                            <div class="form-group col-sm-2">
                                <label for="exampleInputPassword1">Location</label>
                                <select class="form-control" name="location_id" id="location" required>
                                    
                                    <option value=''>Select</option>
                                    <?php if(count($location) > 0){ ?>
                                     <?php foreach($location as $key=>$value){ ?>
                                    <option value='<?php echo $value->id; ?>' <?php if(isset($_GET['location_id'])&&($_GET['location_id'] ==$value->id )){ echo " Selected" ;} ?>><?php echo $value->title; ?></option>
                                    <?php } ?>
                                    <?php } ?>
                                   
                                </select>
                            </div>
                            <div class="form-group col-sm-2">
                                <label for="exampleInputPassword1">Theatre</label>
                                <select class="form-control" name="theatre_id" id="theatre" >
                                    
                                    <option value=''>Select</option>
                                        <?php if(count($theatre) > 0){ ?>
                                     <?php foreach($theatre as $key=>$value){ ?>
                                    <option value='<?php echo $value->id; ?>' <?php if(isset($_GET['theatre_id'])&&($_GET['theatre_id'] ==$value->id )){ echo " Selected" ;} ?>><?php echo $value->title; ?></option>
                                    <?php } ?>
                                    <?php } ?>
                                   
                                   
                                </select>
                            </div>  
                            <div class="form-group col-sm-2">
                                <label for="exampleInputEmail1">Date</label>
                                <input type="text" class="form-control" id="datepicker" name="date" value="<?php if(isset($_GET['date']) ){ echo $_GET['date'] ;} ?>"    placeholder="Enter Date">
                                <?php echo form_error( 'date'); ?>
                            </div>
                            <div class="form-group col-sm-2">
                                <label for="exampleInputEmail1">Status</label>
                                <select class="form-control" name="status"  id="status" >
                                <option value=""></option>
                                <option  <?php if(isset($_GET['status'])&&($_GET['status'] =='Pending' )){ echo " Selected" ;} ?>  >Pending</option>
                                <option  <?php if(isset($_GET['status'])&&($_GET['status'] =='Cancelled' )){ echo " Selected" ;} ?>  >Cancelled</option>
                                <option  <?php if(isset($_GET['status'])&&($_GET['status'] =='Booked' )){ echo " Selected" ;} ?>  >Booked</option>
                                <option  <?php if(isset($_GET['status'])&&($_GET['status'] =='Completed' )){ echo " Selected" ;} ?>  >Completed</option>
                            </select>
                            </div>
                            <div class="form-group col-sm-2">
                                <Br>
                               <input type="submit" class="btn btn-primary" value="submit"> 
                            </div>
                          
                            
                    </div>
                </form>
			<?php echo $this->session->flashdata('msg'); ?>
			<hr>
			<table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
					<tr>
					    <th>#</th>						
						<th>Booking ID</th>
						<th>Theatre</th>
						<th>Booking Date</th> 
						<th>Booking Slots</th> 
						<th>Total Amount</th>
						<th>Booking Amount</th>
						<th>Order Status</th>		
						<th>Name</th>		
						<th>Phone No</th>
						<th>Payment Status</th>
						<th>Date</th>		
						<th>Action</th>	
					</tr>
                </thead>
				<?php if(count($RESULT)>0){ ?>
                <tbody>
				<?php $no=0; foreach($RESULT as $record){ $no++; ?>	
					<?php if($record->user_id != 0){ $user = $this->user_model->get_user_by_id($record->user_id); } ?>	
					<?php $payment =  $this->db->get_where('tbl_payment' , array('booking_id'=>$record->id))->result() ;  ?>
					<?php if(count($payment) >0) { ?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $record->invoice_no; ?></td>
						<td><?php echo $record->theatre_title; ?> <br> <?php echo $record->location_title; ?></td>
					
						<td><?php echo date('d-M-Y ',strtotime($record->date)); ?></td>
				        <td><?php echo $record->slots_title; ?></td>
					
						<td><?php echo CURRENCY_SYMBOL."  ".$record->total_amount; ?></td>
						<td><?php  if($payment){ echo CURRENCY_SYMBOL."  ".@$payment[0]->amount; } ?></td>
						
						<td>
							<?php if(  $record->status == 'Cancelled'){  ?>           
                            <button class="btn  btn-sm btn-danger "><?php Echo $record->status ?></button>
                            <?php }elseif ($record->status == 'Pending') { ?>
                            <button class="btn  btn-sm btn-info "><?php Echo $record->status ?></button>
                            <?php }elseif ($record->status == 'Booked') { ?>
                            <button class="btn btn-sm btn-warning "><?php Echo $record->status ?></button>
                            <?php }elseif ($record->status == 'Completed') { ?>
                            <button class="btn  btn-success  btn-sm  "><?php Echo $record->status ?></button>
                            <?php } ?>
                            </td>
                        
						   <td>	<?php if($user){ ?>
							<a href="<?php echo base_url('admin/user/profile/'.$user[0]->id); ?>" target="_blank">
							<?php 
								echo ucwords($user[0]->fname).' '.ucwords($user[0]->lname);
								?>
								</a></td>
								<?php 
							}else{
							    
							    echo "Guest";
							}
							 ?></td>
						   <td><?php echo $record->phone; ?></td>
						   <td>
                            <?php echo @$payment[0]->status; ?>
                        </td>
                     	<td><?php echo date('d-M-Y ',strtotime($record->create_date)); ?></td>
						<td >
						    <a type="button" data-book-id="<?php echo $record->id;?>" data-book-status="<?php echo $record->status;?>"   class="btn btn-sm btn-success btn-sm showstatus" data-toggle="modal" data-target="#myModal1"> Change Status</a> &nbsp; 
						    <a  type="button" href="<?php echo base_url('admin/booking/change_theatre/'.$record->id); ?>"  class="btn  btn-primary btn-xs"  >Change Theatre</a><br>
					
						    <a href="<?php echo base_url('admin/booking/view/'.$record->id); ?>" class="btn  btn-primary btn-xs">View</a><br>
						   
						
						</td>	
					</tr>
					<?php } ?>
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
 <script src="<?php echo base_url();?>/assets/admin/jquery/jquery-ui.js"></script>
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
                <form method="POST" action="<?php echo base_url('admin/booking/processbookingtatus') ?>" enctype="multipart/form-data"> Order Id <span style="color:red;">*</span>
                    <div class="box-body">
                        <div class="form-group">
                            <input type="text" class="form-control" name="booking_id" value="" readonly="readonly"> 
                        </div>
                       
                        Order Status <span style="color:red;">*</span>
                        <div class="form-group">
                            <select class="form-control" name="status"  id="status" required>
                                <option value=""></option>
                                <option >Pending</option>
                                <option  >Cancelled</option>
                                <option  >Booked</option>
                                <option  >Completed</option>
                            </select>
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
        $('input[name="booking_id"]').val();
        var bookId = $(this).attr('data-book-id');
        var bookstatus = $(this).attr('data-book-status');
        $('input[name="booking_id"]').val(bookId);
        $('#status').val(bookstatus).attr("selected", "selected")
    });

</script>
    <script type="text/javascript">
            $('#city').on('change',function(){
                  var cityId = $(this).val();
                  if(cityId){
                      $.ajax({
                          type:'POST',
                          url:'<?php echo base_url('admin/location/get_location_of_city') ?>',
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
        <script type="text/javascript">
        $('#location').on('change',function(){
                      var locationId = $(this).val();
                      if(locationId){
                          $.ajax({
                              type:'POST',
                              url:'<?php echo base_url('admin/theatre/get_theatre_of_location') ?>',
                              data:'location_id='+locationId,
                              success:function(html){
                                  $('#theatre').html(html);
                              }
                          }); 
                      }else{
                          $('#theatre').html('<option value="">Select Location first</option>'); 
                      }
                  });
        </script>
         <script>
    $(document).ready(function(){
      $("#datepicker").datepicker({
         dateFormat: 'yy-mm-dd'
        }); 
    });
   
    </script>
</body>
</html>
