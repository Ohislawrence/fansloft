@extends('layouts.app6')

@section('title')
Updates - 
@parent
@stop


@section('content')
<!--       breadcrumb_area_two     -->
        <section class="breadcrumb_area_two parallaxie" data-background="img/bg.jpg" style="background: url({{url('public/home/img/blog_banner.jpg')}}) no-repeat;">
            <div class="overlay"></div>
            <div class="container">
                <div class="breadcrumb_content">
                    <h1>Our Updates</h1>
                    <ol class="nav">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li>Blog</li>
                    </ol>
                </div>
            </div>
        </section>
    <!--       blog_area     -->
        <section class="blog_area sec_pad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <div class="blog_inner">
                            @forelse($posts as $post)
                            <div class="blog_list_item">
                                <img src="{{asset('public/uploads/blogs/'.$post->image)}}" alt="">
                                <div class="b_inner">
                                    <div class="blog_list_content">
                                        <div class="b_post_info">
                                            <div class="p_tag">
                                                <a href="#">{{$post->category}}</a>
                                                
                                            </div>
                                            <div class="p_date"><img src="{{asset('public/home/img/blog/date_icon.png')}}" alt="">{{ \Carbon\Carbon::parse($post->created_at)->format('j F, Y') }}</div>
                                        </div>
                                        <a href="{{url('updates/'.$post->slug)}}">
                                            <h2>{{$post->title}}</h2>
                                        </a>
                                        <div class="d-flex justify-content-between">
                                            <a href="{{url('updates/'.$post->slug)}}" class="read_btn">Read More <i class="arrow_triangle-right"></i></a>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            @endforelse
                            
                            
                            
                            {{ $posts->links('vendor.pagination.default')}}

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
                            
                            <div class="widget widget_instragram">
                                <h3 class="sidebar_title">Instagram Feed</h3>
                                
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--       blog_area     -->
    @endsection