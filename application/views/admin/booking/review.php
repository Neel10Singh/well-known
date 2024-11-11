<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Review Listing</title>
  <?php $this->load->view('admin/layout/head_css'); ?>
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/datatables/dataTables.bootstrap.css'); ?>">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php $this->load->view('admin/layout/header'); ?>	
  
<?php $this->load->view('admin/layout/sidebar'); ?>	
	
	<div class="content-wrapper">
    
    <section class="content-header">
		<h1>All Review</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">All Review</li>			
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
					    <th>Booking No</th>	
						<th>Theratre</th>
						<th>User</th>
						<th>Review</th>
						<th>Comment</th>
						<th>Status</th>
						<th>Date</th>
						<th></th>
					</tr>
                </thead>
				<?php if(count($RESULT)>0){ ?>
                <tbody>
				<?php $no=1;$user=''; 
				foreach($RESULT as $record){ ?>	
				<?php if($record->user_id != 0){ $user = $this->user_model->get_user_by_id($record->user_id); } ?>	
		
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo  @$record->invoice_no; ?></td>
						<td><?php echo  @$record->title; ?></td>
						<td>
							<?php if($user){ ?>
							<a href="<?php echo base_url('admin/user/profile/'.$user[0]->id); ?>" target="_blank">
							<?php 
								echo ucwords($user[0]->fname).' '.ucwords($user[0]->lname);
								?>
								</a></td>
								<?php 
							}else{
							    
							    echo "Guest";
							}
							 ?>
								
						<td><?php echo  @$record->rating; ?></td>
						<td><?php echo  @$record->comment; ?></td>
						<td><?php echo  @$record->home_view; ?></td>
						<td><?php echo date('d-M-Y ',strtotime($record->create_date)); ?></td>
						<td>
						     <a type="button" data-book-id="<?php echo $record->id;?>" data-book-status="<?php echo $record->home_view;?>"   class="btn btn-sm btn-success btn-sm showstatus" data-toggle="modal" data-target="#myModal1">  Status</a> &nbsp; 
						</td>
					</tr>
	
				<?php $no++ ; } ?>	
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
                <form method="POST" action="<?php echo base_url('admin/booking/processReviewStatus') ?>" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Id Number <span style="color:red;">*</span></label>
                            <input type="text" class="form-control" name="id" value="" readonly="readonly"> 
                        </div>
                         
                      
                       
                        <div class="form-group">
                            <label> Home Status <span style="color:red;">*</span></label>
                            <select class="form-control" name="home_view"  id="home_view" required>
                                <option value=""></option>
                                <option >Active</option>
                                <option >Inactive</option>
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
        var bookId = $(this).attr('data-book-id');
        var bookstatus = $(this).attr('data-book-status');
        $('input[name="id"]').val(bookId);
        $('#home_view').val(bookstatus).attr("selected", "selected")
    });

</script>

</body>
</html>
