<?php $link=$this->setting_model->get_all_setting();?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        <?php echo $link[0]->title ; ?> | All Theatre</title>
    <?php $this->load->view('admin/layout/head_css'); ?>
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/datatables/dataTables.bootstrap.css'); ?>"> </head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php $this->load->view('admin/layout/header'); ?>
        <?php $this->load->view('admin/layout/sidebar'); ?>
        <div class="content-wrapper">
            
            <section class="content-header">
                <h1><?php echo $RESULT[0]->title; ?>, <?php echo $RESULT[0]->location_title; ?> <?php echo $RESULT[0]->city_title; ?></h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a>
                    </li>
                    <li class="active">All Theatre</li>
                </ol>
            </section>
            <div class="box-footer">
                <a href="<?php echo base_url('admin/theatre/add_slots/').$RESULT[0]->id;?>">
                    <button type="submit" class="btn btn-primary" name="submitform">Add New Theatre Slots</button>
                </a>
            </div>
           
            <section class="content">
                <!-- Info boxes -->
                <div class="box">
                    <div class="box-body">
                        <?php echo $this->session->flashdata('msg'); ?>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SNo.</th>
                                    <th>Title</th>
                                    <th></th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php if(count($slots)>0){ ?>
                            <tbody>
                                <?php $no=0; foreach($slots as $record){ $no++; ?>
                                <tr>
                                    <td width="7%">
                                        <?php echo $no; ?>
                                    </td>
                                    <td><?php echo $record->title; ?></td>
                                    <td><?php echo $record->disabled_dates; ?></td>
                       
                                
                                    <td width="15%">
                                        <?php if($record->status==1){ ?> <span class="label label-success">Active</span>
                                        <?php }else{ ?> <span class="label label-danger">Inactive</span>
                                        <?php }?> </td>
                                    <td width="15%"> 
                                    <a href="<?php echo base_url('admin/theatre/edit_slots/'.$RESULT[0]->id.'/'.$record->id); ?>" class="btn  btn-success btn-xs"><i class="fa fa-fw fa-edit"></i>Edit</a>
                                  
                                    <!--<a href="<?php echo base_url('admin/theatre/delete/'.$record->id); ?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger btn-xs"><i class="fa fa-fw fa-trash"></i>Delete</a> </td>-->
                                </tr>
                                <?php } ?> </tbody>
                            <?php } ?> </table>
                    </div>
                </div>
            </section>
        </div>
        <!-- /.content-wrapper -->
        <?php $this->load->view('admin/layout/footer'); ?> </div>
    <!-- ./wrapper -->
    <?php $this->load->view('admin/layout/footer_js'); ?>
    <script src="<?php echo base_url('assets/admin/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/admin/plugins/datatables/dataTables.bootstrap.min.js'); ?>"></script>
    <script>
        $(function() {
            $("#example1")
                .DataTable();
        });

    </script>
</body>

</html>
