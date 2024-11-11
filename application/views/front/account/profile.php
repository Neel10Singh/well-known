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
                        <h1 class="title"><?php echo $RESULT[0]->title; ?></h1>
                    </div>
                </div> 
            </div>
        </div>

        <div class="site-main">
            <section class="ttm-row break-991-colum ttm-bgcolor-white clearfix faq-intro-section">
                    <div class="row profile">
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <ul class="tabs">
                                <?php $this->load->view('front/account/left-menu'); ?>
                               
                            </ul>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-12 sidebar-widget-area">
                            <div class="tab-contents sidebar-widget">
                          
                                <?php echo $this->session->flashdata('msg'); ?>
                                <div class="tab-content active" id="Profile">
                                    <div class="padding-12 box-shadow">
                                        <h4 class="widget-title">My Profile</h4>
                           
                                        <table class="table table-responsive">
                                            <tbody>
                                                <tr class="mob-bil">
                                                    <th>Name</th>
                                                    <th><?php echo @$user[0]->fname.' '.@$user[0]->lname; ?></th>
                                                </tr>
                                                <tr class="mob-bil">
                                                    <th>Email</th>
                                                    <th><?php echo @$user[0]->email; ?></th>
                                                </tr>
                                                <tr class="mob-bil">
                                                    <th>Phone Number</th>
                                                    <th><?php echo @$user[0]->contact_no; ?> </th>
                                                </tr>
                                            </tbody>
                                        </table>
                                     
                                         <div class="profile-img"><a  href="<?php echo base_url('user/change_password') ;?>"> <button  class="ttm-btn ttm-btn-size-md ttm-btn-shape-round ttm-btn-style-fill ttm-btn-color-skincolor mt-20" > Change Password </button></a></div>
                                            
                                          
                                    </div>
                                    
                                </div>
                                <div class="tab-content" id="edit">
                                    <div class=" padding-12 box-shadow ">
                                        <h4 class="widget-title">Edit Profile</h4>
            							<form method="post" class="setting-form" id="profile_form">  
                                            <div class="contact-forms">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group__content mb-20">
                                                            <label> First Name</label>
                                                            <input class="form-control" type="text" name="fname" id="first-name" placeholder="" required="" value="<?php echo @$user[0]->fname; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group__content mb-20">
                                                            <label> Last Name</label>
                                                            <input class="form-control" type="text" name="lname" id="Last-name" placeholder="" required="" value="<?php echo @$user[0]->lname; ?>">
                                                        </div>
            
                                                    </div>
                                                   
                                                    <div class="col-lg-12">
                                                        <div class="form-group__content mb-20">
                                                            <label> Phone Number </label>
                                                            <input class="form-control" type="text" name="contact_no" id="contact"  placeholder="" required="" value="<?php echo @$user[0]->contact_no; ?>">
                                                        </div>
                                                    </div>
                                                    
                                                   
                									<div class="form-group col-sm-12 tet-alin-cent">
                                                        	<button class="ttm-btn ttm-btn-size-md ttm-btn-shape-round ttm-btn-style-fill ttm-btn-color-skincolor mt-20" name="updateprofile" type="submit">Update Profile</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                    </div>
            </section>
        </div>
        <?php $this->load->view('front/layout/footer'); ?>
    </div>
    <?php $this->load->view('front/layout/footer-js'); ?>
</body>
</html>

<script>
    const tabs = document.querySelectorAll("[data-tab-target]");
    const tabContents = document.querySelectorAll(".tab-content");

    tabs.forEach((tab) => {
        tab.addEventListener("click", () => {
            tabs.forEach((tab) => {
                tab.classList.remove("active");
            });
            tab.classList.add("active");
            tabContents.forEach((tabContent) => {
                tabContent.classList.remove("active");
            });
            const target = document.querySelector(tab.dataset.tabTarget);
            target.classList.add("active");
        });
    });
</script>

</body>
</html>