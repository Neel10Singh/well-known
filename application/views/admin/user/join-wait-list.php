<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> All Join Wait List</title>
    <?php $this->load->view('admin/layout/head_css'); ?>
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/datatables/dataTables.bootstrap.css'); ?>"> </head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php $this->load->view('admin/layout/header'); ?>
        
        <?php $this->load->view('admin/layout/sidebar'); ?>
        
        <div class="content-wrapper">
            
            <section class="content-header">
                <h1>All Join Wait List</h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a>
                    </li>
                    <li class="active"> Join Wait List</li>
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
                                    <th>SNo.</th>
                                    <th> Email</th>
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>Whatsapp</th>
                                    <th>Date</th>
                                    <th>No Of<br> People</th>
                                    <th>Location</th>
                                    <th> Date/Time</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <?php if(count($RESULT)>0){ ?>
                            <tbody>
                                <?php $no=0; foreach($RESULT as $record){ $no++; ?>
                                <tr>
                                    <td width="7%">
                                        <?php echo $no; ?>
                                    </td>
                                    <td><?php echo $record->email ?></td>
                                    <td><?php echo $record->name ?></td>
                                    <td><?php echo $record->phone; ?></td>
                                    <td><?php echo $record->whatsapp_number; ?></td>
                                    <td><?php echo $record->date; ?></td>
                                    <td><?php echo $record->no_of_people; ?></td>
                                    <td><?php echo $record->location_title; ?> <?php echo $record->city_title; ?></td>
                                    <td><?php echo $record->create_date; ?></td>
                                    <td> <a href="<?php echo base_url('admin/user/delete_join_list/'.$record->id); ?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger btn-xs"><i class="fa fa-fw fa-trash"></i></a></td>
                                </tr>
                                <?php } ?> </tbody>
                            <?php } ?> </table>
                    </div>
                </div>
            </section>
            <!-- /.content -->
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
