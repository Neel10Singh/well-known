<?php $link = $this->setting_model->get_all_setting();?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title> All Coupon ||  <?php echo $link[0]->title ;  ?></title>
		<?php $this->load->view('admin/layout/head_css'); ?>
		<link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/datatables/dataTables.bootstrap.css'); ?>">
	</head>
	<body class="hold-transition skin-blue sidebar-mini">
		<div class="wrapper">
			<?php $this->load->view('admin/layout/header');?>	
			<?php $this->load->view('admin/layout/sidebar'); ?>		
			<div class="content-wrapper">
				
				<section class="content-header">
					<h1>All Coupon</h1>
					<ol class="breadcrumb">
						<li><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
						<li class="active">All Coupon</li>
					</ol>
				</section>

				<div class="box-footer">
              <a href="add_new">  <button type="submit" class="btn btn-primary" name="submitform">Add New Coupon</button></a>
              </div>

				<!-- Main content -->
				<section class="content">
				  <!-- Info boxes -->
					<div class="box">
						<div class="box-body">
						<?php echo $this->session->flashdata('msg'); ?>
						 <table id="example1" class="table table-bordered table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>#.</th>
                                        <th>Type</th>
                                        <th>Title</th>
                                        <th>Code</th>
                                        <th>Price
                                        <br>Percentage</th>
                                     
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <?php if(count($RESULT)>0){ ?>
                                <tbody>
                                    <?php $no=0; foreach($RESULT as $record){ $no++; ?>
                                    <tr>
                                        <td>
                                            <?php echo $no; ?> </td>
                                        <td>
                                            <?php echo $record->type; ?></td>
                                        <td>
                                            <?php echo $record->title; ?></td>   <td>
                                            <?php echo $record->code; ?></td>
                                        <td>
                                            <?php echo $record->amount; ?></td>
                                       
                                        <td>
                                            <?php if($record->status==1){ ?> <span class="label label-success">Active</span>
                                            <?php }else{ ?> <span class="label label-danger">Inactive</span>
                                            <?php }?> </td>
                                        <td width="">
                                             <a href="<?php echo base_url('admin/coupon/edit/'.$record->id); ?>" class="btn  btn-info btn-xs"><i class="fa fa-fw fa-edit"></i>  &nbsp; Edit</a> 
                                             <a href="<?php echo base_url('admin/coupon/delete_coupon/'.$record->id); ?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger btn-xs"><i class="fa fa-fw fa-trash"></i>   &nbsp; Delete</a> </td>
                                    </tr>
                                    <?php } ?> </tbody>
                                <?php } ?> </table>
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
	</body>
</html>
