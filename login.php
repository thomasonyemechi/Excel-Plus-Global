<?php
session_start(); ob_start();  
require_once('account/includes/connection.php');
if(isset($_SESSION['user_id'])){header('location: account/'); }
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title>Log In</title>

<!-- Fav Icon
<link rel="icon" href="lanasset/images/favicon.ico" type="image/x-icon">
-->
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Arimo:400,400i,700,700i&amp;display=swap" rel="stylesheet">

<!-- Stylesheets -->
<link href="lanasset/css/font-awesome-all.css" rel="stylesheet">
<link href="lanasset/css/flaticon.css" rel="stylesheet">
<link href="lanasset/css/owl.css" rel="stylesheet">
<link href="lanasset/css/bootstrap.css" rel="stylesheet">
<link href="lanasset/css/jquery.fancybox.min.css" rel="stylesheet">
<link href="lanasset/css/animate.css" rel="stylesheet">
<link href="lanasset/css/color.css" rel="stylesheet">
<link href="lanasset/css/rtl.css" rel="stylesheet">
<link href="lanasset/css/style.css" rel="stylesheet">
<link href="lanasset/css/responsive.css" rel="stylesheet">

<style type="text/css">
  .inner-container .inner-box .submit-form .form-group input[type='password']{
  position: relative;
  width: 100%;
  height: 55px;
  background: #fff;
  font-size: 16px;
  padding: 10px 20px;
  border: 2px solid #fff;
  transition: all 500ms ease;
}
</style>
</head>


<!-- page wrapper -->
<body class="boxed_wrapper ltr">




    <?php include('header1.php')  ?>

    <!-- Mobile Menu  -->
    <div class="mobile-menu">
      <!--   <div class="menu-backdrop"></div> -->
      <div class="close-btn"><i class="fas fa-times"></i></div>
      
      <nav class="menu-box">
        <div class="nav-logo"><a href="index.php"><img src="glg2.png" alt="" title=""></a></div>
        <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
        
    </nav>
</div><!-- End Mobile Menu -->



<!-- support-section -->
  <section class="page-title centred" style="background-image: url(lanasset/images/banner/banner-9.jpg);">
        <div class="auto-container">
            <div class="content-box clearfix">
                <h1>Log In</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="javascript:;">Log in to manage your account information</a></li>
                </ul>
            </div>
        </div>
    </section>
<!-- support-section end -->


<!-- world-cyber -->
<section class="world-cyber bg-color-1 p-5">
    <div class="auto-container">
        </div>
  
</section>
<!-- world-cyber end -->


<!-- support-section -->
<section class="support-section">
    <div class="auto-container">
        <div class="inner-container">
            <div class="row clearfix">
                <div class="col-lg-6 col-md-12 col-sm-12 inner-column">
                    <div class="inner-box">
                        <div class="sec-title light left">
                            <h5>Welcome Back</h5>
                            <h2>Log In</h2>
                            <p> Log in to start your session</p>
                        </div>
                        	<?php if(isset($report)){ $pro->Alert();} ?>
                        <form method="post" class="submit-form">
                           
                            <div class="form-group">
                                <input type="text" name="username" placeholder="Username" required="">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" placeholder="Password" required="">
                            </div>
                            
                            <div class="form-group message-btn">
                                <button type="submit" class="theme-btn style-one" name="LoginUsers">Log In</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 info-column">
                    <div class="info-inner">
                        <figure class="image-box"><img src="lanasset/images/resource/info-1.jpg" alt=""></figure>
                        <div class="info-box" class="height:100%">
                         
                            <div class="icon-box"><i class="fas fa-phone"></i></div>
                            <h2><a href="tel:2349038772366">234-903-877-2366</a></h2>
                            <div class="email"><a href="mailto:support@excelplusglobal.com">support@excelplusglobal.com</a></div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- support-section end -->


<!-- testimonial-section -->
<section class="testimonial-section" style="background-image: url(lanasset/images/background/testimonial-bg.jpg);">
    
</section>
<!-- testimonial-section end -->


<!-- news-section end -->





<!-- main-footer -->
<footer class="main-footer">
  
    <div class="footer-bottom">
        <div class="auto-container">
            <div class="copyright"><p>&copy; <?= date('Y') ?>. EPG MArketing Ltd. All rights reserved.</p></div>
        </div>
    </div>
</footer>
<!-- main-footer end -->



<!--Scroll to top-->
<button class="scroll-top scroll-to-target" data-target="html">
    <span class="fa fa-arrow-up"></span>
</button>



<!-- END sidebar widget item -->


<!-- jequery plugins -->
<script src="lanasset/js/jquery.js"></script>
<script src="lanasset/js/popper.min.js"></script>
<script src="lanasset/js/bootstrap.min.js"></script>
<script src="lanasset/js/owl.js"></script>
<script src="lanasset/js/wow.js"></script>
<script src="lanasset/js/validation.js"></script>
<script src="lanasset/js/jquery.fancybox.js"></script>
<script src="lanasset/js/appear.js"></script>
<script src="lanasset/js/jquery.countTo.js"></script>
<script src="lanasset/js/scrollbar.js"></script>
<script src="lanasset/js/nav-tool.js"></script>
<script src="lanasset/js/TweenMax.min.js"></script>
<script src="lanasset/js/circle-progress.js"></script>
<script src="lanasset/js/jquery.nice-select.min.js"></script>

<!-- main-js -->
<script src="lanasset/js/script.js"></script>

</body><!-- End of .page_wrapper -->

</html>
