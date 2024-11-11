
<?php $link = $this->setting_model->get_all_setting();?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Add New Coupon ||  <?php echo $link[0]->title ;  ?></title>
    <?php $this->load->view('admin/layout/head_css'); ?>

</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php $this->load->view('admin/layout/header'); ?>
        <?php $this->load->view('admin/layout/sidebar'); ?>
        <div class="content-wrapper">
            
            <section class="content-header">
                <h1>Add New Coupon</h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a>
                    </li>
                    <li><a href="<?php echo base_url('admin/Coupon/listing'); ?>">All Coupon</a>
                    </li>
                    <li class="active">All Coupon</li>
                </ol>
            </section>
            <section class="content">
                <div class="box">
                    <div class="box-body">
                        <div class="box box-primary">
                            <?php echo $this->session->flashdata('msg'); ?>
                            <form role="form" method="post" id="form" autocomplete="off" enctype="multipart/form-data">
                                <div class="box-body row">
                                        <div class="form-group col-sm-6">
                                        <label for="exampleInputEmail1">Title</label>
                                        <input type="text" class="form-control"  name="title" value="<?php echo set_value('title'); ?>" required placeholder="Enter Title">
                                        <?php echo form_error( 'title'); ?> </div>
                                   
                                       <div class="form-group col-sm-6">
                                        <label for="exampleInputEmail1">Code</label>
                                        <input type="text" class="form-control" maxlength="15" minlength="4" name="code" value="<?php echo set_value('code'); ?>" required placeholder="Enter CODE">
                                        <?php echo form_error( 'code'); ?> </div>
                                   
                                    <div class="form-group col-sm-6">
                                        <label for="exampleInputEmail1">Type</label>
                                            <select class="form-control" name="status" required>
                                            <option value='Percentage'>Percentage</option>
                                            <option value='Flat'>Flat</option>
                                        </select></div>
                                     <div class="form-group col-sm-6">
                                        <label for="exampleInputEmail1">Flat Amount or Percentage</label>
                                        <input type="number" class="form-control" name="amount" id="price" value="<?php echo set_value('amount'); ?>" required>
                                        <?php echo form_error( 'amount'); ?> 
                                    </div>    
                                
                                   
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">Short Description</label>
                                        <textarea class="form-control" name="description" placeholder="Enter short description"></textarea>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="exampleInputPassword1">Status</label>
                                        <select class="form-control" name="status" required>
                                            <option value='1'>Active</option>
                                            <option value='0'>Inactive</option>
                                        </select>
                                        <?php echo form_error( 'status'); ?> </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary" name="submitform" >Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php $this->load->view('admin/layout/footer'); ?>
    </div>
    <?php $this->load->view('admin/layout/footer_js'); ?>
    <script src="<?php echo base_url('assets/admin/parsley/parsley.js'); ?>"></script>
    
</body>

</html>
