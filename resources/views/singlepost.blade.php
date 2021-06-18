@extends('layouts.app6')

@section('title')
{{$post->title}} -
@parent
@stop


@section('header')
<meta property="og:title" content="{{$post->title}}" />
<meta property="og:url" content="{{url('updates/'.$post->slug)}}">
<meta property="og:image" content="{{url('public/uploads/blogs/'.$post->image)}}" />

<meta property="og:type" content="website" />

<meta name="twitter:card" content="summary" />
<meta property="twitter:title" content="{{$post->title}}" />

<meta property="twitter:url" content="{{url('updates/'.$post->slug)}}">
<meta property="twitter:image" content="{{url('public/uploads/blogs/'.$post->image)}}" />
@endsection

@section('content')
<!--        breadcrumb_area_six      -->
        <section class="breadcrumb_area_two breadcrumb_area_six parallaxie" data-background="img/bg.jpg" style="background: url({{asset('public/uploads/blogs/'.$post->image)}}) no-repeat;">
            <div class="overlay"></div>
            <div class="container">
                <div class="blog_details_br_content text-center">
                    <h2>{{$post->title}}</h2>
                </div>
            </div>
        </section>
<!--        blog_details_area_two      -->
        <section class="blog_details_area_two">
            <div class="container">
                <div class="blog_details_img">
                    <img src="{{url('public/uploads/blogs/'.$post->image)}}" width="1110px" alt="blogimage">
                </div>
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <div class="blog_inner">
                            <div class="blog_details">
                                <div class="b_post_info d-flex">
                                    <div class="p_tag">
                                        <a href="#" class="yellow">{{$post->category}}</a>
                                        <a href="#" class="green">Marketing</a>
                                    </div>
                                    <div class="post_details d-flex">
                                        <div class="p_date"><img src="img/blog/usser_gray.png" alt="">Fansloft </div>
                                        <div class="p_date"><img src="img/blog/date_icon.png" alt="">{{ \Carbon\Carbon::parse($post->created_at)->format('j F, Y') }}</div>
                                    </div>
                                </div>
                                {!!$post->body!!}
                                <div class="post_social_info">
                                    
                                    <ul class="list-unstyled social_link social_link_two">
                                        <li><a href="#"><i class="social_dribbble"></i><i class="social_dribbble"></i></a></li>
                                        <li><a href="#"><i class="social_googleplus"></i><i class="social_googleplus"></i></a></li>
                                        <li><a href=""><i class="social_facebook"></i><i class="social_facebook"></i></a></li>
                                        <li><a href="#"><i class="social_twitter"></i><i class="social_twitter"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="blog_sidebar">
                            <div class="widget widget_search">
                                <form action="#" class="search-form input-group">
                                    <input type="search" class="form-control widget_input" placeholder="Search">
                                    <button type="submit"><i class="icon_search"></i></button>
                                </form>
                            </div>
                            
                            <div class="widget widget_post">
                                <h3 class="sidebar_title">Latest Blogs</h3>
                                @forelse($latestpost as $lpost)
                                <div class="media post_item">
                                    <img src="{{asset('public/uploads/blogs/'.$lpost->image)}}" alt="" width="120px">
                                    <div class="media-body">
                                        <a href="{{url('updates/'.$lpost->slug)}}">
                                            <h5>{{$lpost->title}}</h5>
                                        </a>
                                        <div class="p_date"><img src="{{url('public/home/img/blog/date_icon.png')}}" alt="">{{ \Carbon\Carbon::parse($lpost->created_at)->format('j F, Y') }}</div>
                                    </div>
                                </div>
                                @empty
                                @endforelse
                                
                            </div>
                            
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--        blog_details_area_two      -->


@endsection