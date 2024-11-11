<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Booking </title>
    <?php $this->load->view('admin/layout/head_css'); ?>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets'); ?>/admin/jquery/jquery-ui.css">
    <style>
        @media print {
            a[href]:after {
                content: none !important;
            }
            #print_btn {
                display: none;
            }
        }
    </style>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php $this->load->view('admin/layout/header'); ?>

        <?php $this->load->view('admin/layout/sidebar'); ?>
        <?php $link=$this->setting_model->get_all_setting();?>
        <div class="content-wrapper">
            <section class="content-header">
                <h1>Booking No: #<?php echo $booking[0]->invoice_no ?></h1>

                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a>
                    </li>
                    <li class="active"><a href="<?php echo base_url('admin/Booking/listing'); ?>">All Booking</a>
                    </li>
                </ol>
            </section>
            <section class="content">
                <div class="box">
                    <div class="box-body">
                        <div class="box box-primary">
                             <?php echo $this->session->flashdata('msg'); ?>
                            <form role="form" method="post" id="form" autocomplete="off" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-6">
                                    
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputPassword1">City</label>
                                        <select class="form-control" name="city_id"  id="city" required>
                                            
                                            <option value=''>Select</option>
                                            <?php foreach($city as $key=>$value){ ?>
                                            <option value='<?php echo $value->id; ?>' <?php echo($theatre[0]->city_id==$value->id)?'selected':''; ?>><?php echo $value->title; ?></option>
                                            <?php } ?>
                                            
                                        </select>
                                        <?php echo form_error( 'city'); ?>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputPassword1">Location</label>
                                        <select class="form-control" name="location_id" id="location" required>
                                            
                                            <option value=''>Select</option>
                                              <?php foreach($location as $key=>$value){ ?>
                                            <option value='<?php echo $value->id; ?>' <?php echo($theatre[0]->location_id==$value->id)?'selected':''; ?>><?php echo $value->title; ?></option>
                                            <?php } ?>
                                           
                                        </select>
                                        <?php echo form_error( 'location'); ?>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputPassword1">Theatre</label>
                                        <select class="form-control" name="theatre_id" id="theatre" required>
                                            
                                            <option value=''>Select</option>
                                              <?php foreach($theatreArray as $key=>$value){ ?>
                                            <option value='<?php echo $value->id; ?>' <?php echo($theatre[0]->id==$value->id)?'selected':''; ?>><?php echo $value->title; ?></option>
                                            <?php } ?>
                                           
                                        </select>
                                        <?php echo form_error( 'location'); ?>
                                    </div>  
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">Date</label>
                                        <input type="text" class="form-control" id="datepicker" name="date" value="<?php echo $booking[0]->date; ?>"   required placeholder="Enter Title">
                                        <?php echo form_error( 'date'); ?>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputPassword1">Theatre Slots</label>
                                        <select class="form-control" name="slots_id" id="slots" required>
                                            
                                            <option value=''>Select</option>
                                              <?php foreach($theatreSlots as $key=>$value){ ?>
                                            <option value='<?php echo $value->id; ?>' <?php echo($booking[0]->slots_id==$value->id)?'selected':''; ?>><?php echo $value->title; ?></option>
                                            <?php } ?>
                                           
                                        </select>
                                        <?php echo form_error( 'slots'); ?>
                                    </div>
                                
                                    <div class="form-group col-sm-12">
                                         <div class="form-group">
                                              <label for="exampleInputPassword1">Remark</label>
                                        <textarea class="form-control" name="remarks" required><?php echo $booking[0]->remarks ; ?></textarea>
                                    </div>
                                    </div>
                                    
                                    <div class="form-group col-sm-12">
                                        <button type="submit" class="btn btn-primary" name="submitform">Submit</button>
                                    </div>
                                </div>
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
    <script src="<?php echo base_url();?>/assets/admin/jquery/jquery-ui.js"></script>
    <script>
    var dates = [   
                <?php foreach($disabled_dates as $key=>$value){ ?>
                 "<?php echo $value ; ?>",
                <?php } ?>
    ];
    function DisableDates(date) {
    var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
    var res = [dates.indexOf(string) == -1]; 
    return res;
    }
    
    $(document).ready(function(){
      $("#datepicker").datepicker({
         dateFormat: 'yy-mm-dd',
         beforeShowDay: DisableDates,
         minDate: new Date("<?php echo date('Y-m-d'); ?>"),
         defaultDate: '<?php echo date( 'Y-m-d' , strtotime( $date)) ; ?>' ,
         maxDate: '+3M',
        });
       theatre_slots_view() ;  
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
        <script type="text/javascript">
         $('#theatre').on('change',function(){
             theatre_slots_view();
          });
           $(document).on("change", "#datepicker", function () {
                 theatre_slots_view();
            });
        </script>
        <script>
            
            function theatre_slots_view() {
                 var booking_date =     $('#datepicker').val() ; 
                 var theatreId = $('#theatre').val();
                 var slotsId = $('#slots').val();
                 $.ajax({
                      type:'POST',
                      url:'<?php echo base_url('admin/booking/get_slots_of_theatre_on_date') ?>',
                      data: {"date": booking_date, "theatre_id": theatreId,  "slots_id": slotsId},
                      success:function(html){
                          $('#slots').html(html);
                      }
                  }); 
            }
        </script>
</body>

</html>