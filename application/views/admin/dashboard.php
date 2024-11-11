<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard</title>
  <?php $this->load->view('admin/layout/head_css'); ?>	
   <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets'); ?>/admin/jquery/jquery-ui.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php $this->load->view('admin/layout/header'); ?>	

<?php $this->load->view('admin/layout/sidebar'); ?>	
  

  
  <div class="content-wrapper">
    
    <section class="content-header">
      <h1>Dashboard</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
			  <span class="info-box-number">
			    <span class="badge bg-aqua">Total Members ( <?php echo count($All_USERS); ?> )</span>
                <span class="badge bg-green">Active Members ( <?php echo count($ACTIVE_USERS); ?> )</span>
                <span class="badge bg-red">Inactive Members ( <?php echo count($INACTIVE_USERS); ?> )</span>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        
      </div>
      <div class="row">
            <div class="col-sm-12">
               <div class="box box-primary" style="padding:15px"> 
                 <?php echo $this->session->flashdata('msg'); ?>
                <form role="form" method="post" id="form" autocomplete="off" enctype="multipart/form-data">
                    <div class="row">
        
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
                                <label for="exampleInputPassword1">Theatre</label>
                                <select class="form-control" name="theatre_id" id="theatre" >
                                    
                                    <option value=''>Select</option>
                                   
                                   
                                </select>
                                <?php echo form_error( 'location'); ?>
                            </div>  
                            <div class="form-group col-sm-3">
                                <label for="exampleInputEmail1">Date</label>
                                <input type="text" class="form-control" id="datepicker" name="date" value=""    placeholder="Enter Title">
                                <?php echo form_error( 'date'); ?>
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="exampleInputPassword1">Theatre Slots</label>
                                <div class="row" id="slots"></div>
                            </div> 
                            <div class="form-group col-sm-12">
                                
                                <label class="btn btn-info"></label> Available
        
                                <label class="btn btn-danger"></label> Booked 
                               
                            </div>
                    </div>
                </form>
            </div>
          </div>
          <div class="col-sm-6"></div>
          <div class="col-sm-6"></div>
      </div>

    </section>
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
        </script>
        <script>
             $(document).on("change", "#datepicker", function () {
                 theatre_slots_view();
            });
            function theatre_slots_view() {
                 var booking_date =     $('#datepicker').val() ; 
                 var theatreId = $('#theatre').val();
                 var slotsId = $('#slots').val();
                 $.ajax({
                      type:'POST',
                      url:'<?php echo base_url('admin/booking/get_slots_of_theatre_on_date_html') ?>',
                      data: {"date": booking_date, "theatre_id": theatreId,  "slots_id": slotsId},
                      success:function(html){
                          $('#slots').html(html);
                      }
                  }); 
            }
        </script>
</body>
</html>
