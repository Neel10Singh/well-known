<?php $link = $this->setting_model->get_all_setting();?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $link[0]->title ;  ?> | Edit city</title>
    <?php $this->load->view('admin/layout/head_css'); ?>
    <script type="text/javascript">
          
            function show_preview()
            {
                var _URL = window.URL || window.webkitURL;
                var file = event.target.files[0];
                var ext = file.name.split('.').pop();
                   var allowed_exts = ['jpg','jpeg','png','webp'];
                if (allowed_exts.indexOf(ext)==-1) {

                    alert('invalid image file');
                    $('#logo').val('');
                    return false;

                }
                var img = new Image();
                img.onload = function()
                {
                   
                        $('#logo_preview').html("");
                        $('#logo_preview').append("<img style='height:auto; width:250px; margin-left:2%;' src='"+this.src+"'/>");
                    
                }
                img.src = _URL.createObjectURL(file);
            }
            
        </script>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php $this->load->view('admin/layout/header'); ?>
        <?php $this->load->view('admin/layout/sidebar'); ?>
        <div class="content-wrapper">
            <section class="content-header">
                <h1>Edit city</h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a>
                    </li>
                    <li><a href="<?php echo base_url('admin/city/listing'); ?>">All city</a>
                    </li>
                    <li class="active">Edit city</li>
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
                                        <input type="text" class="form-control" name="title" value="<?php echo $RESULT[0]->title; ?>" onkeyup="return set_slug(this.value);"  required placeholder="Enter Title">
                                        <?php echo form_error( 'title'); ?>
                                    </div>
                                     <div class="form-group col-sm-6">
                                              <label for="exampleInputEmail1">Url Slug</label>
                                              <input type="text" class="form-control" name="url_slug" id="url_slug" value="<?php echo $RESULT[0]->url_slug; ?>" readonly >
                                              
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="exampleInputEmail1">Image </label>
                                        <input type="file" class="form-control" name="image"  id="image" onchange="show_icon_preview();" accept="image/png, image/jpeg,image/png,image/JPEG,image/JPG,image/PNG" >
                                         <div class="" id="image_preview">
                                             <?php if(!empty($RESULT[0]->image)){ ?>
                                            <img src="<?php echo base_url('uploads/city/').$RESULT[0]->image; ?>" width="50%">
                                            <?php } ?>
                                         </div>
                                         
                                    </div> 
                                    <div class="form-group col-sm-6">
                                        <label for="exampleInputPassword1">Status</label>
                                        <select class="form-control" name="status" required>
                                            <option value='1' <?php echo($RESULT[0]->status==1)?'selected':''; ?> >Active</option>
                                            <option value='0' <?php echo($RESULT[0]->status==0)?'selected':''; ?>>Inactive</option>
                                        </select>
                                        <?php echo form_error( 'status'); ?>
                                    </div>
                               
                                 
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">Description</label>
                                        <textarea class="form-control" name="description" placeholder="Enter description"><?php echo $RESULT[0]->description; ?></textarea>
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
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php $this->load->view('admin/layout/footer'); ?>
    </div>
    <!-- ./wrapper -->
    <?php $this->load->view('admin/layout/footer_js'); ?>
    <script src="<?php echo base_url('assets/admin/parsley/parsley.js'); ?>"></script>
    <script class="example">
        $(document).ready(function() {
            $('#form').parsley();
        });
        
function set_slug(VALUE)
{
  //alert(VALUE);
  $("#url_slug").val(string_to_slug(VALUE));
}

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
    </script>
</body>

</html>