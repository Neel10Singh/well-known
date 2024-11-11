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
		<h1>All Payment</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">All Payment</li>			
		</ol>
    </section>

   
    <section class="content">
      <!-- Info boxes -->
		<div class="box">
			<div class="box-body">
		
			<?php echo $this->session->flashdata('msg'); ?>
			<hr>
			<table id="example1" class="table table-bordered table-striped">
                <thead>
					<tr>
					    <th>#</th>						
						<th>Booking ID</th>
						<th>Paid Amount</th>
						<th>Payment Status</th>
						<th>Payment Id</th>
						<th>Date</th>	
					</tr>
                </thead>
				<?php if(count($RESULT)>0){ ?>
                <tbody>
				<?php $no=0; foreach($RESULT as $record){ $no++; ?>	
					<?php $booking =  $this->db->get_where('tbl_booking' , array('id'=>$record->booking_id))->result() ;  ?>	
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $booking[0]->invoice_no; ?></td>
						<td><?php echo $record->amount; ?></td>
						<td><?php echo $record->status; ?></td>
						<td><?php echo $record->txn_no; ?></td>
					
				
						 
                     	<td><?php echo date('d-M-Y ',strtotime($record->create_date)); ?></td>
					
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
