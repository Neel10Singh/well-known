<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Page</title>
    <?php $this->load->view('admin/layout/head_css'); ?>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
       <script type="text/javascript">
  
    function show_preview_image()
    {
        var _URL = window.URL || window.webkitURL;
        var file = event.target.files[0];
        var ext = file.name.split('.').pop();
       var allowed_exts = ['jpg','jpeg','png','webp'];
        if (allowed_exts.indexOf(ext)==-1) {

            alert('invalid image file');
            $('#image').val('');
            return false;

        }

        var img = new Image();
        img.onload = function()
        {
            
                $('#image_preview').html("");
                $('#image_preview').append("<img style='height:auto; width:250px; margin-left:2%;' src='"+this.src+"'/>");
            
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
                <h1>Edit Page</h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a>
                    </li>
                    <li><a href="<?php echo base_url('admin/Page/listing'); ?>">All Page</a>
                    </li>
                    <li class="active">Edit Page</li>
                </ol>
            </section>
            <section class="content">
                <!-- Info boxes -->
                <div class="box">
                    <div class="box-body">
                        <div class="box box-primary">
                            <!-- /.box-header -->
                            <!-- form start -->
                            <form role="form" method="post" id="form" autocomplete="off" enctype="multipart/form-data">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Title</label>
                                        <input type="text" class="form-control" name="title" onkeyup="return set_slug(this.value);" value="<?php echo $RESULT[0]->title; ?>" required placeholder="Enter Title">
                                        <?php echo form_error( 'title'); ?> </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Url Slug</label>
                                        <input type="text" class="form-control" name="url_key" id="url_slug" readonly value="<?php echo $RESULT[0]->url_key; ?>"> </div>
                                        
                                          <div class="form-group ">
                                                <label for="exampleInputEmail1">Image</label>
                                                <input type="file" class="form-control" name="image"  id="image" onchange="show_preview_image();" accept="image/png, image/jpeg,image/png,image/JPEG,image/JPG,image/PNG">
        
                                                 <div class="" id="image_preview">
                                                    <?php if(!empty($RESULT[0]->image)){ ?>
                                                    <img src="<?php echo base_url('uploads/page/').$RESULT[0]->image; ?>" width="200px">
                                                    <?php } ?>
                                                 </div>
                                               
                                            </div> 
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Description</label>
                                        <textarea class="form-control" name="description" value="" placeholder="Enter description"><?php echo $RESULT[0]->description; ?></textarea>
                                    </div>
                                     <div class="form-group">
                                              <label for="exampleInputEmail1">Description 2nd</label>
                                              <textarea class="form-control" name="description_second" value="" placeholder="Enter description_second"><?php echo $RESULT[0]->description_second; ?></textarea>
                                            </div>
                                            <div class="form-group">
                                              <label for="exampleInputEmail1">Description 3rd</label>
                                              <textarea class="form-control" name="description_third" value="" placeholder="Enter description"><?php echo $RESULT[0]->description_third; ?></textarea>
                                            </div>  
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Meta Title</label>
                                        <input type="text" class="form-control" name="meta_title" value="<?php echo $RESULT[0]->meta_title; ?>" required placeholder="Enter Meta Title">
                                        <?php echo form_error( 'meta_title'); ?> </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Canonical</label>
                                        <input type="text" class="form-control" name="canonical" value="<?php echo $RESULT[0]->canonical; ?>" placeholder="Enter canonical ">
                                        <?php echo form_error( 'canonical'); ?> </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Meta Keywords</label>
                                        <input type="text" class="form-control" name="meta_keyword" value="<?php echo $RESULT[0]->meta_keyword; ?>" required placeholder="Enter Meta Keywords"> </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Meta Description</label>
                                        <input type="text" class="form-control" name="meta_description" value="<?php echo $RESULT[0]->meta_description; ?>" required placeholder="Enter Meta Description"> </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Status</label>
                                        <select class="form-control" name="status" required>
                                            <option value='1' <?php echo($RESULT[0]->status==1)?'selected':''; ?> >Active</option>
                                            <option value='0' <?php echo($RESULT[0]->status==0)?'selected':''; ?>>Inactive</option>
                                        </select>
                                        <?php echo form_error( 'status'); ?> </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary" name="submitform">Submit</button>
                                    <a href="<?php echo base_url()?>admin/Page/listing">
                                        <button type="button" class="btn btn-primary" name="submitform">Cancel </button>
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php $this->load->view('admin/layout/footer'); ?> </div>
    <!-- ./wrapper -->
    <?php $this->load->view('admin/layout/footer_js'); ?>
    <script src="<?php echo base_url('assets/admin/parsley/parsley.js'); ?>"></script>
    <script class="example">
        $(document)
            .ready(function() {
                $('#form')
                    .parsley();
            });

        function set_slug(VALUE) {
            //alert(VALUE);
            $("#url_slug")
                .val(string_to_slug(VALUE));
        }

        function string_to_slug(str) {
            str = str.replace(/^\s+|\s+$/g, ''); // trim
            str = str.toLowerCase();
            // remove accents, swap ñ for n, etc
            var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
            var to = "aaaaeeeeiiiioooouuuunc------";
            for (var i = 0, l = from.length; i < l; i++) {
                str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
            }
            str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
                .replace(/\s+/g, '-') // collapse whitespace and replace by -
                .replace(/-+/g, '-'); // collapse dashes
            return str;
        }

    </script>
<script>
                        CKEDITOR.replace( 'description' );
</script>
<script>
                        CKEDITOR.replace( 'description_second' );
</script>
<script>
                        CKEDITOR.replace( 'description_third' );
</script>
</body>

</html>
