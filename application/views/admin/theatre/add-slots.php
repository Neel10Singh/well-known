<?php $link = $this->setting_model->get_all_setting();?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $link[0]->title ;  ?>| Add New slots</title>
    <?php $this->load->view('admin/layout/head_css'); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php $this->load->view('admin/layout/header'); ?>
        
        <?php $this->load->view('admin/layout/sidebar'); ?>
 
        <div class="content-wrapper">
            <section class="content-header">
                <h1>Add New slots</h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a>
                    </li>
                    <li><a href="<?php echo base_url('admin/theatre/listing'); ?>">All Theatre</a>
                    </li> 
                    <li><a href="<?php echo base_url('admin/theatre/slots'); ?>">All slots</a>
                    </li>
                    <li class="active">All slots</li>
                </ol>
            </section>
            <section class="content">
                <div class="box">
                    <div class="box-body">
                        <div class="box box-primary">
                            <h4><?php echo $RESULT[0]->title; ?>, <?php echo $RESULT[0]->location_title; ?> <?php echo $RESULT[0]->city_title; ?></h4>
                            <?php echo $this->session->flashdata('msg'); ?>
                            <!-- form start -->
                            <form role="form" method="post" id="form" autocomplete="off" enctype="multipart/form-data">
                                <div class="box-body row">
                         
                                     <div class="form-group col-sm-6">
                                        <label for="exampleInputEmail1">Slots Timing</label>
                                        <input type="text" class="form-control" name="title" value="<?php echo set_value('title'); ?>"   required placeholder="Enter Slots Timing">
                                        <?php echo form_error( 'title'); ?>
                                    </div>
                               
                                    <div class="form-group col-sm-6">
                                        <label for="exampleInputPassword1">Status</label>
                                        <select class="form-control" name="status" required>
                                            <option value='1'>Active</option>
                                            <option value='0'>Inactive</option>
                                        </select>
                                        <?php echo form_error( 'status'); ?>
                                    </div>
                                    
                                     <div class="form-group col-sm-12 ">
                                         <div class="box box-success box-solid">
                                               <div class="box-header with-border">Add Disabled Date</div>
                                                <div class="box-body">
                                                    <div id="append_diabled_date"></div> <span class="clearfix"></span>
                                                    <div class="col-md-2" style="margin-top:10px;"> <a type="button" onclick="addDisabledDate();" class="btn btn-primary" title="Add Image"><i class="fa fa-plus-circle"></i> Add Disabled Date</a> </div>
                                                </div>
                                         </div>
                                      
                                    </div>
                                   
                               
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary" name="submitform">Submit</button>
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
   <script class="example">
$(document).ready(function(){
  $('#form').parsley();
  
});


   $(document)
            .ready(function() {
                $('#form')
                    .parsley();
                $("form")
                    .on('click', '.removedata', function() {
                        $(this)
                            .parents(".fille_group")
                            .remove();
                    });
            });

function string_to_slug(str) {
    str = str.replace(/^\s+|\s+$/g, ''); // trim
    str = str.toLowerCase();  
    // remove accents, swap ñ for n, etc
    var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
    var to   = "aaaaeeeeiiiioooouuuunc------";
    for (var i=0, l=from.length ; i<l ; i++) {
        str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
    }
    str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
        .replace(/\s+/g, '-') // collapse whitespace and replace by -
        .replace(/-+/g, '-'); // collapse dashes
    return str;
}

 function addDisabledDate() {
            $('#append_diabled_date')
                .append('<span class="fille_group"><div class="col-md-3"><input type="date" class="form-control" name="disabled_dates[]" required></div><div class="col-md-1" style="padding-bottom:5px"><a class="btn btn-danger removedata"><i class="fa fa-fw fa-trash"></i></a></div><span>');
        }
</script>

    <
</body>

</html>