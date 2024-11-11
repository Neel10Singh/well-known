<?php $link = $this->setting_model->get_all_setting();?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $link[0]->title ;  ?>| Add New Theatre</title>
    <?php $this->load->view('admin/layout/head_css'); ?>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
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
                <h1>Add New Theatre</h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a>
                    </li>
                    <li><a href="<?php echo base_url('admin/Theatre/listing'); ?>">All Theatre</a>
                    </li>
                    <li class="active">All Theatre</li>
                </ol>
            </section>
            <section class="content">
                <div class="box">
                    <div class="box-body">
                        <div class="box box-primary">
                            <?php echo $this->session->flashdata('msg'); ?>
                            <!-- form start -->
                            <form role="form" method="post" id="form" autocomplete="off" enctype="multipart/form-data">
                                <div class="box-body row">
                         
                                     <div class="form-group col-sm-6">
                                        <label for="exampleInputEmail1">Title</label>
                                        <input type="text" class="form-control" name="title" value="<?php echo set_value('title'); ?>" onkeyup="return set_slug(this.value);"  required placeholder="Enter Title">
                                        <?php echo form_error( 'title'); ?>
                                    </div>
                                     <div class="form-group col-sm-6">
                                              <label for="exampleInputEmail1">Url Slug</label>
                                              <input type="text" class="form-control" name="url_slug" id="url_slug" readonly >
                                              
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label for="exampleInputPassword1">City</label>
                                        <select class="form-control" name="city_id"  id="city" required>
                                            
                                            <option value=''>Select</option>
                                            <?php foreach($city as $key=>$value){ ?>
                                            <option value='<?php echo $value->id; ?>'><?php echo $value->title; ?></option>
                                            <?php } ?>
                                            
                                        </select>
                                        <?php echo form_error( 'city'); ?>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label for="exampleInputPassword1">Location</label>
                                        <select class="form-control" name="location_id" id="location" required>
                                            
                                            <option value=''>Select</option>
                                           
                                        </select>
                                        <?php echo form_error( 'location'); ?>
                                    </div>
                                     <div class="form-group col-sm-3">
                                        <label for="exampleInputPassword1">Status</label>
                                        <select class="form-control" name="status" required>
                                            <option value='1'>Active</option>
                                            <option value='0'>Inactive</option>
                                        </select>
                                        <?php echo form_error( 'status'); ?>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label for="exampleInputEmail1">Person Range </label>
                                        <input type="text" class="form-control" name="person_range" value="<?php echo set_value('person_range'); ?>" required placeholder="Enter Person Range">
                                        <?php echo form_error( 'person_range'); ?>
                                    </div>  
                                    <div class="form-group col-sm-3">
                                        <label for="exampleInputEmail1">Min Fixed Price </label>
                                        <input type="number" class="form-control" name="min_price" value="<?php echo set_value('min_price'); ?>" required placeholder="Enter Minmum Price">
                                        <?php echo form_error( 'min_price'); ?>
                                    </div> 
                                       <div class="form-group col-sm-3">
                                        <label for="exampleInputEmail1">Min Person For Fixed Price</label>
                                        <input type="number" class="form-control" name="min_person" value="<?php echo set_value('min_person'); ?>"  required placeholder=" Price Per Person">
                                        <?php echo form_error( 'min_person'); ?>
                                    </div>
                                    <div class="form-group col-sm-2">
                                        <label for="exampleInputEmail1"> Price Per Person</label>
                                        <input type="number" class="form-control" name="price_per_person" value="<?php echo set_value('price_per_person'); ?>"  required placeholder=" Price Per Person">
                                        <?php echo form_error( 'price_per_person'); ?>
                                    </div> 
                                    <div class="form-group col-sm-2">
                                        <label for="exampleInputEmail1">Total Person </label>
                                        <input type="number" class="form-control" name="total_person" value="<?php echo set_value('total_person'); ?>" required placeholder=" Minmum Price">
                                        <?php echo form_error( 'min_price'); ?>
                                    </div> 
                                    <div class="form-group col-sm-2">
                                        <label for="exampleInputEmail1">Decoration Charges </label>
                                        <input type="number" class="form-control" name="decoration_charges" value=""  placeholder=" Decoration Charges">
                                        <?php echo form_error( 'decoration_charges'); ?>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label for="exampleInputEmail1">Image </label>
                                        <input type="file" class="form-control" name="image"  id="image" onchange="show_icon_preview();" required accept="image/png, image/jpeg,image/png,image/JPEG,image/JPG,image/PNG">
                                         <div class="" id="image_preview"></div>
                                         
                                    </div> 
                                    <div class="form-group col-sm-3">
                                        <label for="exampleInputEmail1">Image 2 </label>
                                        <input type="file" class="form-control" name="image_2"  id="image_2" onchange="show_icon_preview2();"  accept="image/png, image/jpeg,image/png,image/JPEG,image/JPG,image/PNG">
                                         <div class="" id="image_preview2"></div>
                                         
                                    </div> 
                                    <div class="form-group col-sm-3">
                                        <label for="exampleInputEmail1">Image 3</label>
                                        <input type="file" class="form-control" name="image_3"  id="image_3" onchange="show_icon_preview3();"  accept="image/png, image/jpeg,image/png,image/JPEG,image/JPG,image/PNG">
                                         <div class="" id="image_preview3"></div>
                                         
                                    </div> 
                                    <div class="form-group col-sm-3">
                                        <label for="exampleInputEmail1">Image 4</label>
                                        <input type="file" class="form-control" name="image_4"  id="image_4" onchange="show_icon_preview4();"  accept="image/png, image/jpeg,image/png,image/JPEG,image/JPG,image/PNG">
                                         <div class="" id="image_preview4"></div>
                                         
                                    </div> 
                                    
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">Short Description</label>
                                        <textarea class="form-control" name="short_description" placeholder="Enter description"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">Description</label>
                                        <textarea class="form-control" name="description" placeholder="Enter description"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">Terms Conditions</label>
                                        <textarea class="form-control" name="terms_conditions" placeholder="Enter description"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">Return Policy</label>
                                        <textarea class="form-control" name="return_policy" placeholder="Enter description"></textarea>
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
<script>
                        CKEDITOR.replace( 'description' );
                        CKEDITOR.replace( 'terms_conditions' );
                        CKEDITOR.replace( 'return_policy' );
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
</body>

</html>