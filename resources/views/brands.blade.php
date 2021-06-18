@extends('layouts.app6')

@section('title')
Brands - 
@parent
@stop

@section('header')
<meta property="og:title" content="Manage your influencers with Fansloft.com" />
<meta property="og:url" content="{{url('brands')}}">
<meta property="og:description" content="Create influencer marketing campaign, analyze the performance, and amplify your best content." />
<meta property="og:image" content="{{url('public/home/img/case_one/fansloft-dashboard.PNG')}}" />

<meta property="og:type" content="website" />

<meta name="twitter:card" content="summary" />
<meta property="twitter:title" content="Manage your influencers with Fansloft.com" />

<meta property="twitter:url" content="{{url('brands')}}">
<meta property="twitter:image" content="{{url('public/home/img/case_one/fansloft-dashboard.PNG')}}" />


@endsection

@section('content')
<section class="breadcrumb_area_two breadcrumb_area_four parallaxie" data-background="{{asset('public/home/img/bg.jpg')}}" style="background: url({{asset('public/home/img/case_one/cases_banner.jpg')}}) no-repeat;">
            <div class="overlay"></div>
            <div class="container">
                <div class="breadcrumb_content d-flex justify-content-between align-items-center">
                    <h1>Create.Analyze.Amplify</h1>
                    
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
      <img class="d-block w-100" src="{{asset('public/home/img/case_one/fansloft-slider1.jpg')}}" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{asset('public/home/img/case_one/fansloft-slider2.jpg')}}" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{asset('public/home/img/case_one/fansloft-slider3.jpg')}}" alt="Third slide">
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
                                    <p>Create influencer marketing campaign, analyze the performance, and amplify your best content.</p>
                                    <p>Through an automated Influencer Marketing Platform, the time consuming, manual tasks are simplified. Our platform removes heavy lifting and inefficiencies so you can focus on the high value creative strategy that sets your business apart. </p>
                                    <a href="{{url('register')}}" class="g_hover">Start Now</a>
                                </div>
                            </div>
                        </div>
                        <br/>
                        <br/>

                <div class="row flex-row-reverse">
                    <div class="col-md-6">
                        <img class="img-fluid" src="{{asset('public/home/img/case_one/fansloft-dashboard.PNG')}}" alt="fansloft-dashboard">
                    </div>
                    <div class="col-md-6">
                        <div class="details_content">
                            <h3>Use our opt-in influencer network</h3>
                            <p>Access our existing global network of 100% opt-in influencers to develop and distribute content for your brand. Execute mixed campaigns with our network and yours within a single project. Create campaign for:</p>
                            <ul class="list-unstyled">
                                <li>Instagram</li>
                                <li>Twitter</li>
                                <li>Tiktok</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="details_item row">
                    <div class="col-md-6">
                        <img class="img-fluid" src="{{asset('public/home/img/case_one/creator-fansloft.jpg')}}" alt="">
                    </div>
                    <div class="col-md-6">
                        <div class="details_content details_content_two">
                            <h3>All-in-one solution </h3>
                            <p>Build your creator's network and pay them directly on the Fansloft platform, we also vet creators accounts and only pay when the campaign task has been achieved.</p>
                            <ul class="list-unstyled">
                                <li>Track campaign performance</li>
                                <li>Approve creator's proposal</li>
                                <li>Focus on what matters</li>
                            </ul>
                            <a href="{{url('register')}}" class="g_hover">Start Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

@endsection