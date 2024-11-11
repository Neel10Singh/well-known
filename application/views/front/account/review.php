<!doctype html>
<html class="no-js" lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <title><?php  echo $RESULT[0]->meta_title ; ?></title>
   <meta name="description" content="<?php  echo $RESULT[0]->meta_description ; ?>">
   <meta name="keywords" content="<?php  echo $RESULT[0]->meta_keyword; ?>">
    <?php $this->load->view('front/layout/head'); ?>
</head>

<body>
<?php $this->load->view('front/layout/header'); ?>
<section class="pt-50 pb-0 bg-gray-2">
    <div class="container">
        <!--<nav aria-label="breadcrumb">-->
        <!--    <ol class="breadcrumb breadcrumb-site py-0 d-flex justify-content-center">-->
        <!--        <li class="breadcrumb-item active pl-0 d-flex align-items-center font-siz pt-8 pb-5" aria-current="page">My-->
        <!--            Account</li>-->
        <!--    </ol>-->
        <!--</nav>-->
    </div>
</section>
<section class="tvrave-tab">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-4">
                <ul class="tabs">
                    <?php $this->load->view('front/account/left-menu'); ?>
                   
                </ul>
            </div>
            <div class="col-lg-9 col-sm-8 sidebar-widget-area">
                <div class="tab-contents sidebar-widget">
                 	<?php echo $this->session->flashdata('msg'); ?>
                    <div class="tab-content active" id="Password">
                        <div class=" category-widget mb-30 ">
                            <h4 class="widget-title">Review</h4>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $this->load->view('front/layout/footer.php') ?>
<?php $this->load->view('front/layout/footer-js.php') ?>

</body>
</html>