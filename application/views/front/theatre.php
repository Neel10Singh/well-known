<?php error_reporting(); ?>
<?php $link = $this->setting_model->get_all_setting();?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php  echo $RESULT[0]->meta_title ; ?></title>
<meta name="description" content="<?php  echo $RESULT[0]->meta_description ; ?>">
<meta name="keywords" content="<?php  echo $RESULT[0]->meta_keyword; ?>">
<link rel="canonical" href="<?php  echo $RESULT[0]->canonical; ?>">
 <?php $this->load->view('front/layout/head'); ?>

<body>
    <div class="page">
        <header id="masthead" class="header ttm-header-style-classic-box ttm-header-overlay">
            <?php $this->load->view('front/layout/top-menu'); ?>
            <?php $this->load->view('front/layout/header'); ?>
            
        </header>
        <div class="ttm-page-title-row text-center">
            <div class="title-box text-center">
                <div class="container">
                    <div class="page-title-heading">
                        <h1 class="title"><?php echo count($theatre) ; ?> in <?php echo $location[0]->title; ?></h1>
                    </div>
                      <div class="row text-center date-row">
                          <div class="col-lg-2"></div>
                        <div class="col-lg-2"><label class="form-label" >Select Date</label></div>
                        <div class="col-lg-3">
                                    
                                    <input type="text" id="datepicker" class="form-control" value="<?php echo $date ;?>" required  style="background:#fff">
                                   
                            
                        </div>
                        <div class="col-lg-3">
                                    <input type="text" id="alternate" class="form-control" value="<?php echo date( 'D, d F, Y' , strtotime( $date)) ; ?>"   size="30" style="background:#fff">
                                   
                            
                        </div>
                    </div>
                </div> 
            </div>
        </div>
        <div class="site-main">
            <section class="ttm-row team-section ttm-bgcolor-grey clearfix">
                <div class="container">
                    <div class="row pt-20" id="theatre"> 
                    <?php include('theatre-view.php') ; ?>
                    </div>
                </div>
            </section>
            <!--event-section end-->
        </div>
        <?php $this->load->view('front/layout/footer'); ?>
    </div>
    <?php $this->load->view('front/layout/footer-js'); ?>
         <script src="https://comersg.net/assets/front/jquery/jquery-ui.js"></script>
    <script>
    $(document).ready(function(){
          $("#datepicker").datepicker({
              chnageMonth: true,
              changeYear: true,
             altField: "#alternate",
             altFormat: "DD, d MM, yy",
             minDate: new Date("<?php echo $date ;?>"),
             maxDate: '+6M',
        });
    });
    $('#datepicker').on('change',function(){
              var date = $(this).val();
              if(date){
                  $.ajax({
                      type:'POST',
                      url:'<?php echo base_url('welcome/get_theatre_of_location_on_date') ?>',
                      data: {"date": date, "location_id": <?php echo $location[0]->id; ?>},
                      success:function(html){
                          $('#theatre').html(html);
                      }
                  }); 
              }
          });
   
        </script>
    </body>
    </html>
