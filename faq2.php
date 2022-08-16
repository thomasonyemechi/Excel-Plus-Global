<!DOCTYPE html>
<html lang="en">


<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<title>GLG GLOBAL</title>

<!-- Fav Icon
<link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
 -->
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Arimo:400,400i,700,700i&amp;display=swap" rel="stylesheet">

<!-- Stylesheets -->
<link href="assets/css/font-awesome-all.css" rel="stylesheet">
<link href="assets/css/flaticon.css" rel="stylesheet">
<link href="assets/css/owl.css" rel="stylesheet">
<link href="assets/css/bootstrap.css" rel="stylesheet">
<link href="assets/css/jquery.fancybox.min.css" rel="stylesheet">
<link href="assets/css/animate.css" rel="stylesheet">
<link href="assets/css/color.css" rel="stylesheet">
<link href="assets/css/rtl.css" rel="stylesheet">
<link href="assets/css/style.css" rel="stylesheet">
<link href="assets/css/responsive.css" rel="stylesheet">


    <style type="text/css">
/*    p.title{
      text-align: center;
      font-size: 45px;
      color: #efdeff;
    }

    b{
      color: #FFFFFF;
      font-size: 55px;
    }

    p.remarks, a{
      text-align: center;
      margin-top: 100px;
      color: #FFFFFF;
    }

    .container{
      width: 100%;
      max-width: 700px;
      min-width: 300px;
      margin: 0 auto;
      padding: 0 5vh;
    }
*/
    /* accordion-1 */
    #accordion-1{
      position: relative;
      box-shadow: 0px 1px 7px #DBDBDB;
    }

    #accordion-1 .head{
      background-color: #FFFFFF;
      color: #563e6e;
      padding: 20px 30px;
      cursor: pointer;
      transition: 0.2s ease;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    #accordion-1 .arrow{
      color: #563e6e;
      font-size: 60px;
      transition: 0.25s ease;
      opacity: 0.3;
      transform: rotate(-90deg);
    }

    #accordion-1 .head:hover .arrow{
      opacity: 1;
    }

    #accordion-1 .head:hover, #accordion-1 .active{
      background-color: #FFE77AFF;
    }

    #accordion-1 .arrow-animate{
      transform: rotate(0deg);
      opacity: 1;
    }

    #accordion-1 .content{
      background-color: #FFFFFF;
      display: none;
      padding: 20px 30px;
      color: #333333;
    }




    /* accordion-1 */
    .accord {
      position: relative;
      box-shadow: 0px 1px 7px #DBDBDB;
    }

    .accord .head{
      background-color: #FFFFFF;
      color: #563e6e;
      padding: 20px 30px;
      cursor: pointer;
      transition: 0.2s ease;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .accord .arrow{
      color: #563e6e;
      font-size: 60px;
      transition: 0.25s ease;
      opacity: 0.3;
      transform: rotate(-90deg);
    }

    .accord .head:hover .arrow{
      opacity: 1;
    }

    .accord .head:hover, #accordion-1 .active{
      background-color: #FFE77AFF;
    }

    .accord .arrow-animate{
      transform: rotate(0deg);
      opacity: 1;
    }

    .accord .content{
      background-color: #FFFFFF;
      display: none;
      padding: 20px 30px;
      color: #333333;
    }






    /* accordion-2 */
    #accordion-2{
      position: relative;
      box-shadow: 0 1px 7px #DBDBDB;
    }

    #accordion-2 .head{
      background-color: #FFFFFF;
      color: #563e6e;
      padding: 20px 30px;
      cursor: pointer;
      transition: 0.25s;
    }

    #accordion-2 .arrow{
      content:'';
      position: absolute;
      right: 0;
      right: 30px;
      top: 65px;
      opacity: 1;
      border-left: 35px solid transparent;
      border-right: 35px solid transparent;
      border-top: 40px solid #FFFFFF;
      transition: 0.3s ease;
      z-index: 2;
    }

    #accordion-2 .head:hover .arrow, #accordion-2 .arrow-animate{
      border-top: 40px solid #FFE77AFF;
      transform: translateY(40px);
    }

    #accordion-2 .content{
      background-color: #FFFFFF;
      display: none;
      padding: 30px;
      color: #333333;
    }

    #accordion-2 .head:hover, #accordion-2 .active{
      background-color: #FFE77AFF; 
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


    <!-- banner-section -->
    <section class="banner-section">
        <div class="banner-carousel owl-theme owl-carousel owl-dots-none">
            <div class="slide-item">
                <div class="image-layer" style="background-image:url(assets/images/banner/banner-5.jpg)"></div>
                <div class="auto-container">
                    <div class="content-box">
                        <h5>get on track with GLG for</h5>
                        <h1>Financial Freedom<br />& Lasting Happiness</h1>
                        <div class="btn-box">
                    
                            <a href="account/signup.php" class="user-btn"><i class="far fa-user"></i><span>Join GLG Now</span></a>
                        </div>
                    </div>  
                </div>
            </div>
            <div class="slide-item">
                <div class="image-layer" style="background-image:url(assets/images/banner/banner-2.jpg)"></div>
                <div class="auto-container">
                    <div class="content-box centred">
                        <ul class="list-item clearfix">
                            <li>.&nbsp;<a href="">Experienced</a>&nbsp;.&nbsp;</li>
                            <li><a href="">Specialized</a>&nbsp;.&nbsp;</li>
                            <li><a href="">Professional</a>&nbsp;.&nbsp;</li>
                        </ul>
                        <h1>Join the league of <br />Business Minded People</h1>
                        <div class="btn-box">
 <a href="account/signup.php" class="user-btn"><i class="far fa-user"></i><span>Join GLG Now</span></a>                        </div>
                    </div> 
                </div>
            </div>
            <div class="slide-item">
                <div class="image-layer" style="background-image:url(assets/images/banner/banner-1.jpg)"></div>
                <div class="auto-container">
                    <div class="content-box">
                        <h5>Get empowered to Live</h5>
                        <h1>Your Dream Life <br />With Excitment</h1>
                        <div class="btn-box">
                          <a href="account/signup.php" class="user-btn"><i class="far fa-user"></i><span>Join GLG Now</span></a>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </section>
    <!-- banner-section end -->


    <!-- info-section -->
    <section class="info-section p-5">
      
    </section>
    <!-- info-section end -->


    <!-- feature-section -->
    <section class="feature-section">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                    <div class="feature-block-one wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <figure class="image-box"><img src="assets/images/resource/feature-1.jpg" alt=""></figure>
                            <div class="lower-content">
                                <div class="inner">
                                    <h3>Financial Empowerment</h3>
                                    <!-- <a href="javascript:;"><span>Empowering you to face the future with boldness</span></a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                    <div class="feature-block-one wow fadeInUp animated animated" data-wow-delay="300ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <figure class="image-box"><img src="assets/images/resource/feature-2.jpg" alt=""></figure>
                            <div class="lower-content">
                                <div class="inner">
                                    <h3>Free Skill Acquisition</h3>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                    <div class="feature-block-one wow fadeInUp animated animated" data-wow-delay="600ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <figure class="image-box"><img src="assets/images/resource/feature-3.jpg" alt=""></figure>
                            <div class="lower-content">
                                <div class="inner">
                                    <h3>Business Modeling</h3>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- feature-section end -->


    <!-- about-section -->
    <section class="about-section bg-color-1"> 
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-6 col-md-12 col-sm-12 video-column">
                    <div class="video-inner">
                        <figure class="image-box"><img src="assets/images/resource/about-1.jpg" alt=""></figure>
                        <div class="video-btn">
                            <a href="https://www.youtube.com/watch?v=nfP5N9Yc72A&amp;t=28s" class="lightbox-image" data-caption="" style="background-image: url(assets/images/resource/btn-bg.png);"><i class="fas fa-play"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                    <div id="content_block_one">
                        <div class="content-box">
                            <div class="sec-title left">
                                <h5>About GLG Marketing Ltd</h5>
                                <h2>The platform with capacity for massive skill empowerment</h2>
                            </div>
                            <div class="text">
                                <p>GLG Marketing Ltd is an organization with a mandate of empowering people globally to live the life of their dream through consistent financial freedom.</p>
                            </div>
                            <div class="inner-box">
                                <div class="single-item">
                                    <div class="icon-box">
                                        <span class="bg-box"></span>
                                        <i class="flaticon-computer-1"></i>
                                    </div>
                                    <h4><a href="javascript:;">Generate Consistent Cashflow</a></h4>
                                    <p>Helps you grow financially to meet the demand of building, funding and  managing sustainable businesses.</p>
                                </div>
                                <div class="single-item">
                                    <div class="icon-box">
                                        <span class="bg-box"></span>
                                        <i class="flaticon-browser-1"></i>
                                    </div>
                                    <h4><a href="javascript:;">Get Trained for Free</a></h4>
                                    <p>That's all you need to stand tall in our world of continously changing and unreliable economy. Become an expert through GLG</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about-section end -->


    <!-- service-section -->
    <section class="service-section">
        <div class="auto-container">
            <div class="title-box">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 title-column">
                        <div class="sec-title right">
                            <h5>What we provides</h5>
                            <h2>Get Exceptional <br />Training Opportunities</h2>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 text-column">
                        <div class="text">
                            <p>You can become an expert in your field. Our exceptional training platform with expert trainers and professional are ready to get you on track with new generation skill sets</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="inner-content">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-6 col-sm-12 service-block">
                        <div class="service-block-one wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <h4><a href="">Skills  Acquisition</a></h4>
                                <div class="inner">
                                    <div class="icon-box"><i class="flaticon-rocket"></i></div>
                                    <p>Get you started on the right skill to land the right job or build the business of your dream.</p>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 service-block">
                        <div class="service-block-one wow fadeInUp animated animated" data-wow-delay="300ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <h4><a href="">Property Acquisition</a></h4>
                                <div class="inner">
                                    <div class="icon-box"><i class="flaticon-innovation-1"></i></div>
                                    <p>Help you aquire smart properties to help you live a happy and exciting life you ahve always dreamed of.</p>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 service-block">
                        <div class="service-block-one wow fadeInUp animated animated" data-wow-delay="600ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <h4><a href="">Welfare service</a></h4>
                                <div class="inner">
                                    <div class="icon-box"><i class="flaticon-presentation"></i></div>
                                    <p>Your welfare is our concern because we want to see you do well in every area of your life and well-being.</p>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 service-block">
                        <div class="service-block-one wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <h4><a href="">Process Development</a></h4>
                                <div class="inner">
                                    <div class="icon-box"><i class="flaticon-target"></i></div>
                                    <p>The process of building a smart life can be tasking but with the help of a mentor it becomes tress free.</p>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 service-block">
                        <div class="service-block-one wow fadeInUp animated animated" data-wow-delay="300ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <h4><a href="">Wealth Marketing</a></h4>
                                <div class="inner">
                                    <div class="icon-box"><i class="flaticon-idea"></i></div>
                                    <p>This company will help you discover, develop and package your personal wealth and help deploy to the marketplace.</p>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 service-block">
                        <div class="service-block-one wow fadeInUp animated animated" data-wow-delay="600ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <h4><a href="">Free Medical service</a></h4>
                                <div class="inner">
                                    <div class="icon-box"><i class="flaticon-search"></i></div>
                                    <p>Medical service are often expensive and you should be a beneficiary of our benevolent medical support.</p>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- service-section end -->


    <!-- project-section -->
    <section class="project-section">
        <div class="fluid-container">
            <div class="project-carousel theme-carousel owl-theme owl-carousel owl-dots-none owl-nav-none">
                <div class="project-block-one">
                    <div class="inner-box">
                        <figure class="image-box"><img src="assets/images/gallery/project-1.jpg" alt=""></figure>
                        <div class="lower-content">
                            <p>Digital Empowerment</p>
                            <h2><a href="">Interactive Bootcamps and hackertons</a></h2>
                        </div>
                    </div>
                </div>
                <div class="project-block-one">
                    <div class="inner-box">
                        <figure class="image-box"><img src="assets/images/gallery/project-2.jpg" alt=""></figure>
                        <div class="lower-content">
                            <p>Financial Initiatives</p>
                            <h2><a href="">Masterclass Financial Workshop</a></h2>
                        </div>
                    </div>
                </div>
                <div class="project-block-one">
                    <div class="inner-box">
                        <figure class="image-box"><img src="assets/images/gallery/project-3.jpg" alt=""></figure>
                        <div class="lower-content">
                            <p>Vacations </p>
                            <h2><a href="">International Travel Opportunities</a></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- project-section end -->


    <!-- annual-stats -->
    <section class="annual-stats">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                    <div id="content_block_two">
                        <div class="content-box">
                            <div class="sec-title left">
                                <h5>Global Score</h5>
                                <h2>The excitement we create cuts across the globe</h2>
                            </div>
                            <div class="text">
                                <p>This company is driven by result and active financial empoerment and is focused on helping people realize their dreams in less time than they could ever thought possible.</p>
                            </div>
                            <div class="inner-box clearfix">
                                <div class="single-progress-box">
                                    <div class="box">
                                        <div class="piechart"  data-fg-color="#204669" data-value=".75">
                                            <span>.75</span>
                                        </div>
                                        <h5>General Financial <br />Empowerment</h5>
                                        <h3>Upto 75% Success</h3>
                                    </div>
                                </div>
                                <div class="single-progress-box">
                                    <div class="box">
                                        <div class="piechart"  data-fg-color="#da2c46" data-value=".85">
                                            <span>.85</span>
                                        </div>
                                        <h5>Skill Acquisition &<br /> Capacity Development</h5>
                                        <h3>Upto 85% Efficient</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                    <div id="image_block_one">
                        <div class="image-box">
                            <div class="pattern-layer" style="background-image: url(assets/images/shape/shape-1.png);"></div>
                            <figure class="image"><img src="assets/images/resource/state-1.jpg" alt=""></figure>
                            <div class="award-box">
                                <div class="box">
                                    <figure class="icon-box"><img src="assets/images/icons/icon-1.png" alt=""></figure>
                                    <span>Human Capacity Development Success Award</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- annual-stats end -->


    <!-- world-cyber -->
    <section class="world-cyber bg-color-1 p-10">
       
      
    </section>
    <!-- world-cyber end -->


    <!-- support-section -->
    <section class="support-section">
        <div class="auto-container">
            <div class="inner-container">
                <div class="row clearfix">
                    <div class="col-lg-7 col-md-12 col-sm-12 inner-column">
                        <div class="inner-box">
                            <div class="sec-title light left">
                                <h5>Join GLG Today</h5>
                                <h2>Start Building Capacity</h2>
                                <p>Provide som basic information get get you started on the GLG Network.</p>
                            </div>
                            <form action="account/signup.php" method="post" class="submit-form">
                                <div class="form-group">
                                    <input type="text" name="name" placeholder="Your Name" required="">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" placeholder="Email address" required="">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="phone" placeholder="Phone" required="">
                                </div>
                                
                                <div class="form-group message-btn">
                                    <button type="submit" class="theme-btn style-one">Get Started</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12 col-sm-12 info-column">
                        <div class="info-inner">
                            <figure class="image-box"><img src="assets/images/resource/info-1.jpg" alt=""></figure>
                            <div class="info-box">
                               
                                <div class="icon-box"><i class="fas fa-phone"></i></div>
                                <h2><a href="tel:2348053515175">234-805-351-5175</a></h2>
                                <div class="email"><a href="mailto:support@thegoodlifeglobal.com">support@thegoodlifeglobal.com</a></div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- support-section end -->


    <!-- testimonial-section -->
    <section class="testimonial-section" style="background-image: url(assets/images/background/testimonial-bg.jpg);">
        
         
    </section>
    <!-- testimonial-section end -->


    <!-- news-section end -->




    <!-- cta-section -->
    <section class="cta-section">
        <div class="pattern-layer" style="background-image: url(assets/images/shape/shape-3.png); background-color: purple;"></div>
        <div class="auto-container">
            <div class="inner-container clearfix">
                <div class="title pull-left">
                    <h2>We help you to unlock & unleash the power within.</h2>
                </div>
                <div class="btn-box pull-right">
                    <a href="account/signup.php">get in touch</a>
                </div>
            </div>
        </div>
    </section>
    <!-- cta-section end -->

    <section class="testimonial-style-two alterner-2 bg-color-1">
        <div class="auto-container p-0">
            
            <div>
                    <div id="accordion-1">
                        <div class="head">
                          <h5>What is the full meaning of GLG?</h5>
                        </div>
                        <div class="content">
                          <p>GLG is abbreviation of Good Life Global.</p>
                        </div>
                    </div>
                                    
                  <div class="accord">
                    <div class="head">
                      <h5>How can I be a member of GLG?</h5>
                    </div>
                    <div class="content">
                      <p>To be a member of GLG, login on to www.thegoodlifeglobal.com get referral ID of sponsor and register.</p>
                    </div>
                  </div>
                  
                  <div id="accordion-2">
                    <div class="head">
                      <h5>How much is the registration fee?</h5>
                    </div>
                    <div class="content">
                      <p>Registrations fee is $7.5/3100.</p>
                    </div>
                  </div>

                  <div id="accordion-2">
                    <div class="head">
                      <h5>What are the products of GLG?</h5>
                    </div>
                    <div class="content">
                      <p>GLG products are Skills Acquisition Program.</p>
                    </div>
                  </div>

                  <div id="accordion-2">
                    <div class="head">
                      <h5>What do you mean by single leg system?</h5>
                    </div>
                    <div class="content">
                      <p>Single leg systems simply mean having just one active person under you.</p>
                    </div>
                  </div>

                  <div id="accordion-2">
                    <div class="head">
                      <h5>Can I qualify for car with single leg system? </h5>
                    </div>
                    <div class="content">
                      <p>Yes, you can qualify for your car just with one single leg system. </p>
                    </div>
                  </div>

                  <div id="accordion-2">
                    <div class="head">
                      <h5>Do I need to work with all my three leg before I can move the next stage? </h5>
                    </div>
                    <div class="content">
                      <p>No, with one active leg you can from one stages to another. </p>
                    </div>
                  </div>

                  <div id="accordion-2">
                    <div class="head">
                      <h5>Do I need to complete a level before I get paid? </h5>
                    </div>
                    <div class="content">
                      <p>No, you get paid per head not when you fully complete a level. </p>
                    </div>
                  </div>

              

                  <div id="accordion-2">
                    <div class="head">
                      <h5>What is GLG conversion rate? </h5>
                    </div>
                    <div class="content">
                      <p>GLG conversion rate is #400. </p>
                    </div>
                  </div>

                  <div id="accordion-2">
                    <div class="head">
                      <h5>What is GLG minimum withdrawal? </h5>
                    </div>
                    <div class="content">
                      <p>You can your dollar withdraw from $5 </p>
                    </div>
                  </div>


                  <div id="accordion-2">
                    <div class="head">
                      <h5>Can I withdraw to my local bank account?</h5>
                    </div>
                    <div class="content">
                      <p>Yes.</p>
                    </div>
                  </div>

                 

                  <div id="accordion-2">
                    <div class="head">
                      <h5>How long does it take to get paid to my local bank account?</h5>
                    </div>
                    <div class="content">
                      <p>You get paid in less than 24 hours.</p>
                    </div>
                  </div>
            </div>
        </div>
    </section>




    <!-- main-footer -->
    <footer class="main-footer">
      
        <div class="footer-bottom">
            <div class="auto-container">
                <div class="copyright"><p>&copy; <?= date('Y') ?>. GLG MArketing Ltd. All rights reserved.</p></div>
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
<script src="assets/js/jquery.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/owl.js"></script>
<script src="assets/js/wow.js"></script>
<script src="assets/js/validation.js"></script>
<script src="assets/js/jquery.fancybox.js"></script>
<script src="assets/js/appear.js"></script>
<script src="assets/js/jquery.countTo.js"></script>
<script src="assets/js/scrollbar.js"></script>
<script src="assets/js/nav-tool.js"></script>
<script src="assets/js/TweenMax.min.js"></script>
<script src="assets/js/circle-progress.js"></script>
<script src="assets/js/jquery.nice-select.min.js"></script>

<!-- main-js -->
<script src="assets/js/script.js"></script>
<script type="text/javascript">
    $('.head').click(function(){
  $(this).toggleClass('active');
  $(this).parent().find('.arrow').toggleClass('arrow-animate');
  $(this).parent().find('.content').slideToggle(280);
});
</script>

</body><!-- End of .page_wrapper -->

</html>
