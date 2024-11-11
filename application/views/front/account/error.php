<!doctype html>
<html>
  <?php $cms_page = $this->cms_model->get_cms_by_id(24);?>
 <title>   <?php  echo $cms_page[0]->meta_title; ?> </title>
    
    <meta name="description" content="<?php  echo $cms_page[0]->meta_description ; ?>">
    <meta name="keywords" content="<?php  echo $cms_page[0]->meta_keyword; ?>">
      <link rel="canonical" href="<?php  echo $cms_page[0]->canonical; ?>">
<head>
<?php $this->load->view('front/layout/head'); ?>
</head>
<body>
<!--- Start Header -->
<?php $this->load->view('front/layout/header'); ?>
<!--- End Header -->



<!-- section start -->
<section class="section-b-space">
    <div class="container">
        <div class="row">
 
            <div class="col-lg-12">
                <div class="dashboard-right">
                    <div class="dashboard">
                        
                       <?php echo $msg ;  ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- section end -->

<?php $this->load->view('front/layout/footer.php') ?>

</body>
</html>