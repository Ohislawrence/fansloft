<!doctype html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta property="fb:app_id" content="239021783812037">
<meta property="og:title" content="Fansloft -The ultimate influencer marketplace" />
<meta property="og:url" content="https://fansloft.com">
<meta property="og:image" content="{{url('public/home/assets/images/saas-img/fansloftfront.png')}}" />
<meta property="og:image:width" content="1200" />
<meta property="og:image:height" content="627" />
<meta property="og:description" content="Fansloft is a influencer marketplace that connects social media creators and brands in a unique way with both parties creating value for each other." />
<meta property="og:type" content="website" />

<link rel="stylesheet" href="public/home/assets/css/bootstrap.min.css">

<link rel="stylesheet" href="public/home/assets/css/animate.min.css">

<link rel="stylesheet" href="public/home/assets/css/magnific-popup.css">

<link rel="stylesheet" href="public/home/assets/css/owl.carousel.min.css">
<link rel="stylesheet" href="public/home/assets/css/owl.theme.default.min.css">

<link rel="stylesheet" href="public/home/assets/css/line-awesome.min.css">

<link rel="stylesheet" href="public/home/assets/css/odometer.css">

<link rel="stylesheet" href="public/home/assets/css/style.css">

<link rel="stylesheet" href="public/home/assets/css/responsive.css">

<link rel="icon" type="images/png" href="{{ asset('public/uploads/icons/fav-small.png')}}">

<title>Fansloft - The Creators and Influencers Hub</title>
</head>
<body data-spy="scroll" data-offset="70">

<div class="preloader">
<div class="d-table">
<div class="d-table-cell">
<div class="lds-hourglass"></div>
</div>
</div>
</div>


<nav class="navbar fixed-top navbar-expand-lg main-navbar bg-white">
<div class="container">
<a class="navbar-brand" href="{{url('/')}}">
<img src="{{ asset('public/uploads/icons/logo81.png')}}" alt="logo">
</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="icon-bar top-bar"></span>
<span class="icon-bar middle-bar"></span>
<span class="icon-bar bottom-bar"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav m-auto">
<li class="nav-item">
<a class="nav-link" href="#home">Home</a>
</li>
<li class="nav-item">
<a class="nav-link" href="{{url('/creators-influencers')}}">Influencers & Creators</a>
</li>
<li class="nav-item">
<a class="nav-link" href="{{url('/brands')}}">Brands</a>
</li>
<li class="nav-item">
<a class="nav-link" href="#pricing">Pricing</a>
</li>
<li class="nav-item">
<a class="nav-link" href="{{url('updates')}}">Blogs</a>
</li>
<li class="nav-item">
<a class="nav-link" href="#contact">Contact Us</a>
</li>
</ul>
<div class="nav-btn">
@guest
<a href="{{url('login')}}" class="default-btn bg-main mr-2" >Log In</a>
<a href="{{url('register')}}" class="default-btn bg-color">Get Started</a>
@else
<a href="" class="default-btn bg-color">Welcome {{ucfirst(Auth::user()->brandname)}}</a>

@endguest
</div>
</div>
</div>
</nav>




<div id="home" class="saas-banner-area">
<div class="container">
<div class="saas-banner-content">
<span><i class="fa fa-instagram"></i></span>
<h1>The Influencer Marketing Platform</h1>
<p>Build stronger collaborations and drive more sales with our all-in-one influencer marketing platform, we support Tiktok, Instagram and Twitter.</p>
<div class="saas-banner-btn">
@guest
<a href="{{url('login')}}" class="default-btn bg-white mr-2">Log In</a>
<a href="{{url('register')}}" class="default-btn bg-main">Get Started</a>
@else
    @if(Auth::user()->role == 'brand')
<a href="{{url('brand/dashboard')}}" class="default-btn bg-main">Go To Dashboard</a>
    @elseif(Auth::user()->role == 'creator')
<a href="{{url('creator/dashboard')}}" class="default-btn bg-main">Go To Dashboard</a>
    @else
<a href="" class="default-btn bg-main">Go To Dashboard</a>    
    @endif
@endif
</div>
</div>
<div class="saas-banner-img">
<img src="public/home/assets/images/saas-img/fansloftfront.png" class="saas-img-1" alt="Image">
<img src="public/home/assets/images/saas-img/fansloftfront33.png" class="saas-img-2" alt="Image">
</div>
<div class="saas-shape-content">
<img src="public/home/assets/images/shape/shape1.png" class="saas-shape-1" alt="Shape">
<img src="public/home/assets/images/shape/shape2.png" class="saas-shape-2" alt="Shape">
<img src="public/home/assets/images/shape/shape3.png" class="saas-shape-3" alt="Shape">
<img src="public/home/assets/images/shape/shape4.png" class="saas-shape-4" alt="Shape">
<img src="public/home/assets/images/shape/shape5.png" class="saas-shape-5" alt="Shape">
<img src="public/home/assets/images/shape/shape6.png" class="saas-shape-6" alt="Shape">
<img src="public/home/assets/images/shape/shape7.png" class="saas-shape-7" alt="Shape">
</div>
</div>
</div>


<div id="services" class="saas-services-area pt-260 pb-70">
<div class="container">
<div class="section-title">
<span>Our Services</span>
<h2>What we do!</h2>
<p>Fansloft is a close influencer marketplace that connects social media creators and brands uniquely with both parties creating values for each other.</p>
</div>
<div class="row">
<div class="col-lg-4 col-sm-6">
<div class="saas-service-card">
<div class="icon bg-1">
<i class="las la-bullhorn"></i>
</div>
<h3>Campaigns</h3>
<p>Brands create marketing campaigns, stating how they want their campaign to run with actionable KPIs.</p>
</div>
</div>
<div class="col-lg-4 col-sm-6">
<div class="saas-service-card">
<div class="icon bg-2">
<i class="las la-chart-pie"></i>
</div>
<h3>Tracking</h3>
<p>As a brand, you will always be in control, monitoring how multiple creators are promoting your brand across popular social networks, all in one place.</p>
</div>
</div>
<div class="col-lg-4 col-sm-6">
<div class="saas-service-card">
<div class="icon bg-3">
<i class="las la-stream"></i>
</div>
<h3>Approve</h3>
<p>Creators submit proposals on how they want to run campaigns for brands, these proposals are approved by brands if they like it.</p>
</div>
</div>
<div class="col-lg-4 col-sm-6">
<div class="saas-service-card">
<div class="icon bg-4">
<i class="las la-lock"></i>
</div>
<h3>Privacy</h3>
<p>Brands can choose to make their campaign public or private, limiting the creators that can see the campaign.</p>
</div>
</div>
<div class="col-lg-4 col-sm-6">
<div class="saas-service-card">
<div class="icon bg-5">
<i class="las la-project-diagram"></i>
</div>
<h3>Search</h3>
<p>Brands can search creators based on some search criteria and will be able to get the right creators for the job.</p>
</div>
</div>
<div class="col-lg-4 col-sm-6">
<div class="saas-service-card">
<div class="icon bg-6">
<i class="las la-database"></i>
</div>
<h3>Creator's Vetting</h3>
<p>All creators on the Fansloft platform are manually vetted, so we only present trusted online creators to brands on our platform.</p>
</div>
</div>
</div>
<div class="service-shape">
<img src="public/home/assets/images/shape/shape12.png" alt="Shape">
</div>
</div>
</div>





<div class="built-saas-app ptb-100">
<div class="container">
<div class="section-title">
<h2>Why sign up?</h2>
</div>
<div class="row">
<div class="col-lg-6">
<div class="saas-feature-two">
<i class="lab la-buffer bg-1"></i>
<h3>Reach your customers, faster!</h3>
<p>Create more genuine content & reach new audiences by identifying influencers that can take the news of your brand to the right customers.</p>
</div>
</div>
<div class="col-lg-6">
<div class="saas-feature-two">
<i class="las la-shield-alt bg-2"></i>
<h3>Easily search through vetted creators</h3>
<p>Filter your search by audience size, demographics, engagement rate, and more to find influencers in line with your target audience & campaign goals.</p>
</div>
</div>
<div class="col-lg-6">
<div class="saas-feature-two">
<i class="las la-crosshairs bg-3"></i>
<h3>Streamline your campaigns</h3>
<p>Run multiple campaigns at once and collaborate with your team to boost productivity.</p>
</div>
</div>
<div class="col-lg-6">
<div class="saas-feature-two">
<i class="las la-headset bg-4"></i>
 <h3>Measure your success</h3>
<p>Have a clear overview of your total clicks & views, calculate your click-through rate and easily download all results.</p>
</div>
</div>
</div>
<div class="parsonal-image">
<img src="public/home/assets/images/saas-img/fansloftfront2.png" alt="Image">
</div>
</div>
</div>

<!-- Pricing Area -->
        <div id="pricing" class="prising-area pt-100 pb-70">
            <div class="container">
                <div class="section-title">
                    <span>Our Plans For Brands/Agencies</span>    
                    <h2>All features are open to you, choose the duration you want to use them.</h2>
                    <p>We offer freedom, no restictions.</p>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="prising-card">
                            <div class="price-header text-center">
                                <h3>Monthly</h3>
                                <h4>₦14,500</h4>
                                <p>Per Month</p>
                            </div>

                            <ul>
                                <li>
                                    <i class="las la-check"></i>
                                    Create & Manage Campaign
                                </li>
                                <li>
                                    <i class="las la-check"></i>
                                    Send Campaign invites to Creators/Influecers list
                                </li>
                                <li>
                                    <i class="las la-check"></i>
                                    Campaign Reports
                                </li>
                                <li>
                                    <i class="las la-check"></i>
                                    Manage Creators/Influecers
                                </li>
                                <li>
                                    <i class="las la-check"></i>
                                    Pay Creators/Influecers
                                </li>
                                <li>
                                    <i class="las la-check"></i>
                                    Download Campaign Stats
                                </li>
                                <li>
                                    <i class="las la-check"></i>
                                    Run Campaign for Twitter,Tiktok,instagram
                                </li>
                                <li>
                                    <i class="las la-check"></i>
                                    Creator's Marketplace
                                </li>
                                <li>
                                    <i class="las la-check"></i>
                                    ....and more
                                </li>
                            </ul>

                            <div class="price-btn text-center">
                                <a href="{{url('register')}}" class="default-btn bg-color">Start with 7 days free</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="prising-card active">
                            <div class="price-header text-center">
                                <h3>Quarterly</h3>
                                <h4>₦42,499</h4>
                                <p>Per quarter</p>
                            </div>

                            <ul>
                                <li>
                                    <i class="las la-check"></i>
                                    Create & Manage Campaign
                                </li>
                                <li>
                                    <i class="las la-check"></i>
                                    Send Campaign invites to Creators/Influecers list
                                </li>
                                <li>
                                    <i class="las la-check"></i>
                                    Campaign Reports
                                </li>
                                <li>
                                    <i class="las la-check"></i>
                                    Manage Creators/Influecers
                                </li>
                                <li>
                                    <i class="las la-check"></i>
                                    Pay Creators/Influecers
                                </li>
                                <li>
                                    <i class="las la-check"></i>
                                    Download Campaign Stats
                                </li>
                                <li>
                                    <i class="las la-check"></i>
                                    Run Campaign for Twitter,Tiktok,instagram
                                </li>
                                <li>
                                    <i class="las la-check"></i>
                                    Creator's Marketplace
                                </li>
                                <li>
                                    <i class="las la-check"></i>
                                    ....and more
                                </li>
                            </ul>

                            <div class="price-btn text-center">
                                <a href="{{url('register')}}" class="default-btn bg-color">Start with 7 days free</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0">
                        <div class="prising-card">
                            <div class="price-header text-center">
                                <h3>Biannually</h3>
                                <h4>₦83,499</h4>
                                <p>Per Biannual</p>
                            </div>

                            <ul>
                                <li>
                                    <i class="las la-check"></i>
                                    Create & Manage Campaign
                                </li>
                                <li>
                                    <i class="las la-check"></i>
                                    Send Campaign invites to Creators/Influecers list
                                </li>
                                <li>
                                    <i class="las la-check"></i>
                                    Campaign Reports
                                </li>
                                <li>
                                    <i class="las la-check"></i>
                                    Manage Creators/Influecers
                                </li>
                                <li>
                                    <i class="las la-check"></i>
                                    Pay Creators/Influecers
                                </li>
                                <li>
                                    <i class="las la-check"></i>
                                    Download Campaign Stats
                                </li>
                                <li>
                                    <i class="las la-check"></i>
                                    Run Campaign for Twitter,Tiktok,instagram
                                </li>
                                <li>
                                    <i class="las la-check"></i>
                                    Creator's Marketplace
                                </li>
                                <li>
                                    <i class="las la-check"></i>
                                    ....and more
                                </li>
                            </ul>

                            <div class="price-btn text-center">
                                <a href="{{url('register')}}" class="default-btn bg-color">Start with 7 days free</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Pricing Area -->

<div id="contact" class="contact-area ptb-100">
<div class="container">
<div class="section-title">
<h2>Contact Us</h2>
<p>Will you like to run your campaign on a larger scale, or you just want to have a meeting with us, leave a message and we will contact you ASAP.</p>
</div>
<div class="contact-content">
<form id="contactForm">
<div class="row">
<div class="col-md-6">
<div class="form-group">
<input type="text" name="name" class="form-control" id="name" required data-error="Please enter your name" placeholder="Your name">
<div class="help-block with-errors"></div>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<input type="email" name="email" class="form-control" id="email" required data-error="Please enter your email" placeholder="Your email address">
<div class="help-block with-errors"></div>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<input type="text" name="msg_subject" id="msg_subject" class="form-control" required data-error="Please enter your subject" placeholder="Your Subject">
<div class="help-block with-errors"></div>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<input type="text" name="phone_number" class="form-control" id="phone_number" required data-error="Please enter your phone number" placeholder="Your phone number">
<div class="help-block with-errors"></div>
</div>
</div>
<div class="col-lg-12 col-md-12">
<div class="form-group">
<textarea name="message" id="message" class="form-control" cols="30" rows="6" required data-error="Please enter your message" placeholder="Write your message..."></textarea>
<div class="help-block with-errors"></div>
</div>
</div>
<div class="col-lg-12 col-md-12 text-center">
<button type="submit" class="default-btn">Send Message</button>
<div id="msgSubmit" class="h3 text-center hidden"></div>
<div class="clearfix"></div>
</div>
</div>
</form>
</div>
</div>
</div>





<footer class="footer-area pt-200 bor-radius-right">
<div class="container">
<div class="row">
<div class="col-lg-4 col-md-6 col-sm-6">
<div class="footer-widget">
<div class="logo">
<img src="{{ asset('public/uploads/icons/logo81.png')}}" alt="Fansloft">
</div>
<p>The Influencer Marketing Platform, build stronger collaborations & and drive more sales with our all-in-one influencer marketing platform..</p>
<ul class="footer-social">
<li>
<a class="bg-1" href="https://facebook.com/fansloft" target="_blank">
<i class="lab la-facebook-f bg-1"></i>
</a>
</li>
<li>
<a class="bg-2" href="https://twitter.com/fansloft" target="_blank">
<i class="lab la-twitter bg-2"></i>
</a>
</li>
<li>
<a class="bg-3" href="https://www.linkedin.com/company/fansloft" target="_blank">
<i class="lab la-linkedin-in bg-3"></i>
</a>
</li>
<li>
<a class="bg-4" href="https://instagram.com/fansloft" target="_blank">
<i class="lab la-instagram bg-4"></i>
</a>
</li>
</ul>
</div>
</div>
<div class="col-lg-5 col-md-6 col-sm-6">
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6">
<div class="footer-widget">
<h3 class="title">Company</h3>
<ul class="footer-text">

 <li>
<a href="{{url('terms-and-conditions')}}">
<i class="las la-angle-right"></i>
T&C
</a>
</li>
<li>
<a href="{{url('private-policy')}}">
<i class="las la-angle-right"></i>
Policy
</a>
</li>
<li>
<a href="{{url('#services')}}">
<i class="las la-angle-right"></i>
Services
</a>
</li>
</ul>
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6">
<div class="footer-widget">
<h3 class="title">Quick Links</h3>
<ul class="footer-text">
<li>
<a href="#home">
<i class="las la-angle-right"></i>
Home
</a>
</li>
<li>
<a href="{{url('#features')}}">
<i class="las la-angle-right"></i>
Features
</a>
</li>
<li>
<a href="{{url('updates')}}">
<i class="las la-angle-right"></i>
Blogs
</a>
</li>
</ul>
</div>
</div>
</div>
</div>

</div>
<div class="copyright-text">
<p>Copyright@ {{date("Y")}} . All Rights Reserved <a href="https://fansloft.com/">Fansloft Networking</a></p>
</div>
</div>
</footer>


<div class="go-top">
<i class="las la-angle-double-up"></i>
</div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="public/home/assets/js/jquery.min.js"></script>
        <script src="public/home/assets/js/popper.min.js"></script>
        <script src="public/home/assets/js/bootstrap.min.js"></script>
        <!-- Owl carousel JS -->
        <script src="public/home/assets/js/owl.carousel.min.js"></script>
        <!-- Magnific JS -->
        <script src="public/home/assets/js/jquery.magnific-popup.min.js"></script>
        <!-- Wow JS -->
        <script src="public/home/assets/js/wow.min.js"></script>
        <!-- Odometer JS -->
        <script src="public/home/assets/js/odometer.min.js"></script>
        <!-- Jquery Apper JS -->
        <script src="public/home/assets/js/jquery.appear.js"></script>
        <!-- Form Validator JS -->
        <script src="public/home/assets/js/form-validator.min.js"></script>
        <!-- Contact JS -->
        <script src="public/home/assets/js/contact-form-script.js"></script>
        <!-- Ajaxchimp JS -->
        <script src="public/home/assets/js/jquery.ajaxchimp.min.js"></script>
        <!-- Custom JS -->
        <script src="public/home/assets/js/custom.js"></script>


        <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/60356cb49c4f165d47c667e8/1ev8b1bmv';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
    </body>
</html>

