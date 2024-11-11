
<?php error_reporting(); ?>
<?php $link = $this->setting_model->get_all_setting();?>
 <?php $slider = $this->slider_model->get_all_active_slider();?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php  echo $RESULT[0]->meta_title ; ?></title>
<meta name="description" content="<?php  echo $RESULT[0]->meta_description ; ?>">
<meta name="keywords" content="<?php  echo $RESULT[0]->meta_keyword; ?>">
<link rel="canonical" href="<?php  echo $RESULT[0]->canonical; ?>">
 <?php $this->load->view('front/layout/head'); ?>
</head>
<body>
 <?php $this->load->view('front/layout/header'); ?>
<main>
    <!-- home-slider start -->
    <section class="slider-content">
        <div class="home-slider owl-carousel owl-theme" id="home-slider">
           
            <?php foreach($slider as $sliders ){ ?>
               <div class="item">
                    <div class="slide-image">
                        <img src="<?php echo base_url();?>uploads/slider/<?php echo $sliders->web_image?>" class="img-fluid desk-img" alt="<?php echo $sliders->title?>">
                        <img src="<?php echo base_url();?>uploads/slider/<?php echo $sliders->mobile_image?>" class="img-fluid mobile-img" alt="<?php echo $sliders->title?>">
                        <div class="container slider-info-content">
                            <div class="row">
                                <div class="col">
                                    <div class="slider-text-info slider-content-center slider-text-center">
                                        <span class="sub-title e1"><?php echo $sliders->title?></span>
                                        <h2 class="e1"><?php echo $sliders->description?></h2>
                                        <a href="<?php echo $sliders->button_link?>" class="btn btn-style e1"><?php echo $sliders->button_title?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                  
            <?php }?>
         
        </div>
    </section>
    <!-- home-slider end -->    <!-- custom-text start -->
    <section class="custom-text">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="custom-text-wrapper">
                        <div class="custom-text-img">
                            <div class="offer-img">
                                <!-- <a href="about-us.html"> -->
                                    <img src="<?php echo base_url('assets/front/'); ?>img/about-us/backer.jpg" class="img-fluid" alt="backery-about-img">
                                <!-- </a> -->
                            </div>
                        </div>
                        <div class="custom-text-content">
                            <div class="custom-width">
                            <span class="sub-title">About Us</span>
                                <h2>Crafting Sweet Memories, One Treat at a Time</h2>
                                <p class="jus">Welcome to Babu ji Namkeen, where our love for baking transcends the ordinary, giving rise to a culinary haven defined by craftsmanship, creativity, and community. Established in 1987, we curate a symphony of flavors using the finest ingredients, ensuring each bite is an experience in itself. More than a bakery, we are storytellers, weaving tales of tradition and innovation into every delectable creation. From our warm and inviting space to our personalized custom creations, Babu ji Namkeen is a celebration of life's sweetest moments. Join us on a journey where passion meets perfection, and every visit is an indulgent escape into the art of baking. Welcome to the Babu ji Namkeen family, where sweetness knows no bounds.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- custom-text end -->

    <!-- our-service-area start -->
    <section class="our-service-area section-ptb">
        <div class="container">
                <div class="single-service">
                    <div class="row">
                        <div class="col-lg-3 service-content">
                            <div class="ser-block text-center">
                                <a href="javascript:void(0)"><i class="feather-award"></i></a>
                                <div class="service-text">
                                    <h6>A Best Quality</h6>
                                    <p>Pinnacle of perfection, our commitment to best quality shines in every detail.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 service-content">
                            <div class="ser-block text-center">
                                <a href="javascript:void(0)"><i class="feather-calendar"></i></a>
                                <div class="service-text">
                                    <h6>Online Booking</h6>
                                    <p>Effortless enjoyment with our quick and easy online booking.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 service-content">
                            <div class="ser-block text-center">
                                <a href="javascript:void(0)"><i class="feather-git-merge"></i></a>
                                <div class="service-text">
                                    <h6>Ingredient Supply</h6>
                                    <p>Purity in every ingredient, sourced for your culinary delight.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 service-content">
                            <div class="ser-block text-center">
                                <a href="javascript:void(0)"><i class="feather-truck"></i></a>
                                <div class="service-text">
                                    <h6>Fast Delivered</h6>
                                    <p>Swift and seamless, our commitment to fast delivery ensures your satisfaction.</p>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </section>
    <!-- our-service-area end -->
    <!-- product start -->
    <section class="special-category collection-category-template section-ptb">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="collection-category">
                        <div class="section-capture">
                            <div class="section-title">
                                <span class="sub-title">Our Bakery Products</span>
                                <h2><span>Sweet Alchemy, Pure Delight</span></h2>
                            </div>
                        </div>
                        <div class="collection-wrap">
                            <div class="collection-slider swiper" id="pro-template">
                                <div class="swiper-wrapper">
                                     <?php if(count($featured)>0){ ?>
                                        <?php foreach($featured as $product){ ?>
                                            <div class="swiper-slide">
                                                    <?php $data['product'] = $product ; ?>
                                                   <?php $this->load->view('front/product/listing-view' , $data) ; ?>
                                               
                                            </div>
                                        <?php } ?>
                                    <?php } ?>
               
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product end -->
    <!-- tab stat -->
    <section class="category-sub category-sub-template section-ptb">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section-capture">
                        <div class="section-title">
                            <span class="sub-title">Our category</span>
                            <h2>Spicy Tales, Tangy Trails</h2>
                        </div>
                        <!-- product-tab start -->
                        <div class="tab tab-grp">
                            <ul class="nav nav-tabs">
                                <li role="presentation">
                                    <a href="#bread" class="active" role="tab" data-bs-toggle="tab" aria-selected="true">
                                        <span class="tab-img">
                                            <img src="<?php echo base_url('assets/front/'); ?>img/logo/tab-2.png" class="img-fluid" alt="tab-2">
                                        </span>
                                        <span class="tab-title">Bakery</span>
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="#cakes" role="tab" data-bs-toggle="tab" aria-selected="true">
                                        <span class="tab-img">
                                        <img src="<?php echo base_url('assets/front/'); ?>img/logo/tab-3.png" class="img-fluid" alt="tab-3">
                                        </span>
                                        <span class="tab-title">Namkeen</span>
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="#bun" role="tab" data-bs-toggle="tab" aria-selected="true">
                                        <span class="tab-img">
                                        <img src="<?php echo base_url('assets/front/'); ?>img/logo/tab-1.png" class="img-fluid" alt="tab-1">
                                        </span>
                                        <span class="tab-title">Chatpati Batein</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- product-tab end -->
                    </div>
                    <div class="tab-content tabs">
                        <div class="tab-pane fade show active" id="bread">
                            <ul class="grid-wrap">
                                <li class="grid-wrapper">
                                    <a href="cookies.php" class="sub-cat-block">
                                        <span class="cat-img">
                                            <img src="<?php echo base_url('assets/front/'); ?>img/collection/cookies.jpg" class="img-fluid" alt="bun-collection-01">
                                        </span>
                                        <div class="text-content">
                                            <h6>Cookies</h6>
                                            <p>Indulge in the simple joy of life with our delicious cookies.</p>
                                        </div>
                                        <span class="icon"><i class="feather-arrow-right"></i></span>
                                    </a>
                                </li>
                                <li class="grid-wrapper">
                                    <a href="biscotti.php" class="sub-cat-block">
                                        <span class="cat-img">
                                            <img src="<?php echo base_url('assets/front/'); ?>img/collection/biscotti-2.jpg" class="img-fluid" alt="bun-collection-02">
                                        </span>
                                        <div class="text-content">
                                            <h6>Biscotti</h6>
                                            <p>Savor the timeless elegance of our handcrafted biscotti.</p>
                                        </div>
                                        <span class="icon"><i class="feather-arrow-right"></i></span>
                                    </a>
                                </li>
                                <li class="grid-wrapper">
                                    <a href="rusk.php" class="sub-cat-block">
                                        <span class="cat-img">
                                            <img src="<?php echo base_url('assets/front/'); ?>img/collection/suji-rusk.jpg" class="img-fluid" alt="bun-collection-03">
                                        </span>
                                        <div class="text-content">
                                            <h6>Rusk</h6>
                                            <p>Embark on a journey of crisp perfection with our artisanal rusks.</p>
                                        </div>
                                        <span class="icon"><i class="feather-arrow-right"></i></span>
                                    </a>
                                </li>
                                <li class="grid-wrapper">
                                    <a href="khari.php" class="sub-cat-block">
                                        <span class="cat-img">
                                            <img src="<?php echo base_url('assets/front/'); ?>img/collection/khari-1.jpg" class="img-fluid" alt="bun-collection-04">
                                        </span>
                                        <div class="text-content">
                                            <h6>Khari</h6>
                                            <p>Elevate your snacking experience with our Khari.</p>
                                        </div>
                                        <span class="icon"><i class="feather-arrow-right"></i></span>
                                    </a>
                                </li>
                                <li class="grid-wrapper">
                                    <a href="nan-khatai.php" class="sub-cat-block">
                                        <span class="cat-img">
                                            <img src="<?php echo base_url('assets/front/'); ?>img/collection/nan-khataif.jpg" class="img-fluid" alt="bun-collection-05">
                                        </span>
                                        <div class="text-content">
                                            <h6>Nan Khatai</h6>
                                            <p>Experience the delicate melt-in-your-mouth magic of our Nan Khatai.</p>
                                        </div>
                                        <span class="icon"><i class="feather-arrow-right"></i></span>
                                    </a>
                                </li>
                                <li class="grid-wrapper">
                                    <a href="cake-rusk.php" class="sub-cat-block">
                                        <span class="cat-img">
                                            <img src="<?php echo base_url('assets/front/'); ?>img/collection/backery-img-01.jpg" class="img-fluid" alt="bun-collection-06">
                                        </span>
                                        <div class="text-content">
                                            <h6>Cake Rusk</h6>
                                            <p>Indulge in the divine harmony of softness and crunch with our Cake Rusk.</p>
                                        </div>
                                        <span class="icon"><i class="feather-arrow-right"></i></span>
                                    </a>
                                </li>
                                <li class="grid-wrapper">
                                    <a href="cake.php" class="sub-cat-block">
                                        <span class="cat-img">
                                            <img src="<?php echo base_url('assets/front/'); ?>img/collection/cakes.jpeg" class="img-fluid" alt="bun-collection-06">
                                        </span>
                                        <div class="text-content">
                                            <h6>Cakes</h6>
                                            <p>Celebrate life's sweetest moments with our decadent cakes.</p>
                                        </div>
                                        <span class="icon"><i class="feather-arrow-right"></i></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="cakes">
                            <ul class="grid-wrap">
                                <li class="grid-wrapper">
                                    <a href="roasted-namkeen.php" class="sub-cat-block">
                                        <span class="cat-img">
                                        <img src="<?php echo base_url('assets/front/'); ?>img/collection/roasted-namkeen.jpeg" class="img-fluid" alt="cake-collection-02">
                                        </span>
                                        <div class="text-content">
                                            <h6>Roasted Namkeen</h6>
                                            <p>The irresistible crunch and bold flavors of our Roasted Namkeen.</p>
                                        </div>
                                        <span class="icon"><i class="feather-arrow-right"></i></span>
                                    </a>
                                </li>
                                <li class="grid-wrapper">
                                    <a href="south-indian.php" class="sub-cat-block">
                                        <span class="cat-img">
                                            <img src="<?php echo base_url('assets/front/'); ?>img/collection/south-indian.jpg" class="img-fluid" alt="cake-collection-02">
                                        </span>
                                        <div class="text-content">
                                            <h6>South Indian</h6>
                                            <p>Indulge in the bold and spicy charm of our South Indian Namkeen.</p>
                                        </div>
                                        <span class="icon"><i class="feather-arrow-right"></i></span>
                                    </a>
                                </li>
                                <li class="grid-wrapper">
                                    <a href="north-india.php" class="sub-cat-block">
                                        <span class="cat-img">
                                            <img src="<?php echo base_url('assets/front/'); ?>img/collection/north-indian.jpeg" class="img-fluid" alt="cake-collection-03">
                                        </span>
                                        <div class="text-content">
                                            <h6>North Indian</h6>
                                            <p>The rich tapestry of flavors with our North Indian Namkeen.</p>
                                        </div>
                                        <span class="icon"><i class="feather-arrow-right"></i></span>
                                    </a>
                                </li>
                                <li class="grid-wrapper">
                                    <a href="tea-snakes.php" class="sub-cat-block">
                                        <span class="cat-img">
                                            <img src="<?php echo base_url('assets/front/'); ?>img/collection/tea.jpg" class="img-fluid" alt="cake-collection-04">
                                        </span>
                                        <div class="text-content">
                                            <h6>Tea Snacks</h6>
                                            <p>Tea time experience with our exquisite tea snacks.</p>
                                        </div>
                                        <span class="icon"><i class="feather-arrow-right"></i></span>
                                    </a>
                                </li>
                                <li class="grid-wrapper">
                                    <a href="navratri-special.php" class="sub-cat-block">
                                        <span class="cat-img">
                                            <img src="<?php echo base_url('assets/front/'); ?>img/collection/navratri.jpeg" class="img-fluid" alt="cake-collection-05">
                                        </span>
                                        <div class="text-content">
                                            <h6>Navratri Special</h6>
                                            <p>The festive spirit with our Navratri Special Namkeen.</p>
                                        </div>
                                        <span class="icon"><i class="feather-arrow-right"></i></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="bun">
                            <ul class="grid-wrap">
                                <li class="grid-wrapper">
                                    <a href="gol-gappa.php" class="sub-cat-block">
                                        <span class="cat-img">
                                            <img src="<?php echo base_url('assets/front/'); ?>img/collection/pani-puri.jpg" class="img-fluid" alt="bun-collection-01">
                                        </span>
                                        <div class="text-content">
                                            <h6>Gol Gappa</h6>
                                            <p>Dive into the burst of flavors with our Gol Gappa.</p>
                                        </div>
                                        <span class="icon"><i class="feather-arrow-right"></i></span>
                                    </a>
                                </li>
                                <li class="grid-wrapper">
                                    <a href="bhelpuri.php" class="sub-cat-block">
                                        <span class="cat-img">
                                            <img src="<?php echo base_url('assets/front/'); ?>img/collection/bhel-puri.jpg" class="img-fluid" alt="bun-collection-02">
                                        </span>
                                        <div class="text-content">
                                            <h6>Bhelpuri</h6>
                                            <p>Savor the crunch of the streets with our Bhelpuri.</p>
                                        </div>
                                        <span class="icon"><i class="feather-arrow-right"></i></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- tab end -->
    <!-- testimonial start -->
    <section class="testimonial-area section-ptb">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section-capture">
                        <div class="section-title">
                            <span class="sub-title">Our Reviews</span>
                            <h2><span>Unfiltered Testimonials</span></h2>
                        </div>
                    </div>
                    <div class="testi-slider">
                        <div class="product-detail-slider">
                            <div class="pro-slider">
                                <div class="slider-for slick-slider">
                                    <div class="slick-slide">
                                        <div class="testi-content">
                                            <span class="quote-icon">
                                                <img src="<?php echo base_url('assets/front/'); ?>img/logo/quote-icon.png" class="img-fluid" alt="quote-icon">
                                            </span>
                                            <div class="testi-desc">
                                                <p>Babuji Namkeen brings joy to our taste buds! Their bakery delights are a symphony of flavors, leaving us craving more. A perfect blend of tradition and innovation!</p>
                                            </div>
                                            <div class="testi-review">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slick-slide">
                                        <div class="testi-content">
                                            <span class="quote-icon">
                                                <img src="<?php echo base_url('assets/front/'); ?>img/logo/quote-icon.png" class="img-fluid" alt="quote-icon">
                                            </span>
                                            <div class="testi-desc">
                                                <p>We're hooked on Babuji Namkeen's bakery treats! Every bite is a reminder of exceptional quality and irresistible taste. Our favorite stop for heavenly desserts.</p>
                                            </div>
                                            <div class="testi-review">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slick-slide">
                                        <div class="testi-content">
                                            <span class="quote-icon">
                                                <img src="<?php echo base_url('assets/front/'); ?>img/logo/quote-icon.png" class="img-fluid" alt="quote-icon">
                                            </span>
                                            <div class="testi-desc">
                                                <p>As a bakery enthusiast, I can confidently say that Babuji Namkeen surpasses expectations. From cookies to cakes, their treats are a delightful journey for the palate. Highly recommended!</p>
                                            </div>
                                            <div class="testi-review">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slick-slide">
                                        <div class="testi-content">
                                            <span class="quote-icon">
                                                <img src="<?php echo base_url('assets/front/'); ?>img/logo/quote-icon.png" class="img-fluid" alt="quote-icon">
                                            </span>
                                            <div class="testi-desc">
                                                <p>Babuji Namkeen's bakery is a haven for those with a sweet tooth. Impeccable taste, freshness, and a wide variety make it our go-to for all things delicious.</p>
                                            </div>
                                            <div class="testi-review">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="slider-nav slick-slider">
                                    <div class="slick-slide">
                                        <div class="author-info">
                                            <div class="testi-img">
                                                <img src="<?php echo base_url('assets/front/'); ?>img/testimonial/review1.png" class="img-fluid" alt="testi-1">
                                            </div>
                                            <div class="author-title">
                                                <h6>Anna domino</h6>
                                                <!-- <span>Store customer</span> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slick-slide">
                                        <div class="author-info">
                                            <div class="testi-img">
                                                <img src="<?php echo base_url('assets/front/'); ?>img/testimonial/review2.png" class="img-fluid" alt="testi-2">
                                            </div>
                                            <div class="author-title">
                                                <h6>Miranda joy</h6>
                                                <!-- <span>Store customer</span> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slick-slide">
                                        <div class="author-info">
                                            <div class="testi-img">
                                                <img src="<?php echo base_url('assets/front/'); ?>img/testimonial/review3.png" class="img-fluid" alt="testi-3">
                                            </div>
                                            <div class="author-title">
                                                <h6>Ventila tomy</h6>
                                                <!-- <span>Store customer</span> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slick-slide">
                                        <div class="author-info">
                                            <div class="testi-img">
                                                <img src="<?php echo base_url('assets/front/'); ?>img/testimonial/review4.png" class="img-fluid" alt="testi-3">
                                            </div>
                                            <div class="author-title">
                                                <h6>Jenson khen</h6>
                                                <!-- <span>Store customer</span> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- testimonial end -->
   <!-- instra start -->
   <section class="instagram-warp section-ptb">
                <div class="container-fluid">
                    <div class="row">
                        <div lang="col">
                            <div class="section-capture">
                                <div class="section-title">
                                    <span class="sub-title">Our Gallery</span>
                                    <h2>Gallery of Brilliance</h2>
                                </div>
                            </div>
                            <div class="insta-slider owl-carousel owl-theme" id="insta-slider">
                                <div class="item">
                                    <div class="banner-hover">
                                        <img src="<?php echo base_url('assets/front/'); ?>img/insta/backery-instagram-01.jpg" class="backery-instagram-01" alt="backery-instagram-01">
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="banner-hover">
                                        <img src="<?php echo base_url('assets/front/'); ?>img/insta/backery-instagram-02.jpg" class="img-fluid" alt="backery-instagram-02">
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="banner-hover">
                                        <img src="<?php echo base_url('assets/front/'); ?>img/insta/backery-instagram-03.jpg" class="img-fluid" alt="backery-instagram-03">
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="banner-hover">
                                        <img src="<?php echo base_url('assets/front/'); ?>img/insta/backery-instagram-04.jpg" class="img-fluid" alt="backery-instagram-04">
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="banner-hover">
                                        <img src="<?php echo base_url('assets/front/'); ?>img/insta/backery-instagram-05.jpg" class="img-fluid" alt="backery-instagram-05">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    <!-- instra end -->
</main>
<?php $this->load->view('front/layout/footer'); ?>
<?php $this->load->view('front/layout/footer-js'); ?>
</body>
</html>