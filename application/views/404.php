<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html>
<head>
  
 <title>   404  </title>
    
<?php $this->load->view('front/layout/head'); ?>
<style></style>
</head>
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
                        <h1 class="title">404 </h1>  
                    </div>
                </div> 
            </div>
        </div>
         <div class="site-main">
            <section class="ttm-row ttm-bgcolor-white about-intro-section clearfix">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <!-- faq title start -->
                            <div class="section-capture">
                                <div class="section-title">
                                  
                                  <h1>404</h1>
                                <h2>PAGE NOT BE FOUND</h2>
                                <p class="home-link">Sorry but the page you are looking for does not exist, have been removed, name changed or is temporarity unavailable.</p>
                                
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>

    </div>

<?php $this->load->view('front/layout/footer.php') ?>
<?php $this->load->view('front/layout/footer-js.php') ?>
</body>
</html>
