@extends('layouts.app6')

@section('title')
Creators - 
@parent
@stop

@section('header')
<meta property="og:title" content="Become an influencer on Fansloft.com" />
<meta property="og:url" content="{{url('creators-influencers')}}">
<meta property="og:description" content="Create a free profile and get the opportunity to partner with industry-leading food, fashion, beauty, and lifestyle brands from all over the world who wants to reach your followers. Don’t sell your influence short, get paid for your passion." />
<meta property="og:image" content="{{url('public/home/img/case_one/Influencer3types2.gif')}}" />

<meta property="og:type" content="website" />

<meta name="twitter:card" content="summary" />
<meta property="twitter:title" content="Become an influencer on Fansloft.com" />

<meta property="twitter:url" content="{{url('creators-influencers')}}">
<meta property="twitter:image" content="{{url('public/home/img/case_one/Influencer3types2.gif')}}" />


@endsection

@section('content')
<section class="breadcrumb_area_two breadcrumb_area_four parallaxie" data-background="{{asset('public/home/img/bg.jpg')}}" style="background: url({{asset('public/home/img/case_one/cases_banner.jpg')}}) no-repeat;">
            <div class="overlay"></div>
            <div class="container">
                <div class="breadcrumb_content d-flex justify-content-between align-items-center">
                    <h1>Create content.Get paid.</h1>
                    
                </div>
            </div>
        </section>
        <!--        breadcrumb      -->
        <!--        portfolio info area     -->
        <section class="portfolio_info_area">
            <div class="container">
                <div class="portfolio_info_slider">
                    <div class="item">
                        <div class="portfolio_img">
  <!--slider start-->
<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="{{asset('public/home/img/case_one/fansloft-trends.png')}}" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{asset('public/home/img/case_one/fansloftreviewbrands.png')}}" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{asset('public/home/img/case_one/fansloft-express-yourself.png')}}" alt="Third slide">
    </div>
  </div>
</div>
<!--slider end-->
                        </div>
                        <div class="row flex-row-reverse">
                            <div class="col-lg-4">
                                
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="portfolio_text">
                                    <p>Create a free profile and get the opportunity to partner with industry-leading food, fashion, beauty, and lifestyle brands from all over the world who wants to reach your followers. Don’t sell your influence short, get paid for your passion.</p>
                                    <a href="{{url('register')}}" class="g_hover">Join Now</a>
                                </div>
                            </div>
                        </div>
                    
                <div class="details_item row flex-row-reverse">
                    <div class="col-md-6">
                        <img class="img-fluid" src="{{asset('public/home/img/case_one/Influencer3types2.gif')}}" alt="">
                    </div>
                    <div class="col-md-6">
                        <div class="details_content">
                            <h3>Content Creators</h3>
                            <p>Get paid to create custom content for brands, advertisers, publishers, and ecommerce companies around the world. Join our creator marketplace full of freelance opportunities for :</p>
                            <ul class="list-unstyled">
                                <li>Journalists</li>
                                <li>Writers</li>
                                <li>Photographers</li>
                                <li>Videographers</li>
                                <li>Designers</li>
                                <li>Animators</li>
                                <li>Musicians</li>
                                <li>Composers</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <br/>
                <div class="row">
                    <div class="col-md-6">
                        <img class="img-fluid" src="{{asset('public/home/img/case_one/influencerphone.png')}}" alt="">
                    </div>
                    <br/>
                    <div class="col-md-6">
                        <div class="details_content details_content_two">
                            <h3>Influencers</h3>
                            <p>Monetize your content, creativity, and influence in the industry’s largest social media influencer marketplace. Connect with brands, advertisers, and publishers for sponsorship opportunities to create and share content across your social media accounts in exchange for compensation.
</p>
                            <p>Share branded content and earn money</p>
                            <a href="{{url('register')}}" class="g_hover">Join Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

@endsection
@section('footer')

@endsection