@extends('layouts.app6')

@section('title')
Top Creators - 
@parent
@stop


@section('content')
<!--        testimonial_area     -->
        <section class="testimonial_area">
            <div class="container custom_container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="clients_inner">
                            <img class="quote_img" src="img/about/quote2.png" alt="">
                            <h2 class="s_section_title">Clients Love</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiu smod tempor incididunt ut labore et dolore magnan aliqua. Quis ipsum suspendisse ultrices gravida. </p>
                            <div class="ab_clients_logo">
                                <div class="ab_clients_logo_item">
                                    <a href="#"><img src="img/about/clients_1.png" alt=""></a>
                                </div>
                                <div class="ab_clients_logo_item">
                                    <a href="#"><img src="img/about/clients_2.png" alt=""></a>
                                </div>
                                <div class="ab_clients_logo_item">
                                    <a href="#"><img src="img/about/clients_3.png" alt=""></a>
                                </div>
                            </div>
                            <a href="#" class="p_btn p_btn_w">Contact Us</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="testimonial_slider">
                            <div class="item">
                                <div class="media">
                                    <div class="img">
                                        <img src="img/about/testimonial_1.png" alt="">
                                    </div>
                                    <div class="media-body">
                                        <img class="quote_img p_absoulte" src="img/about/quote.png" alt="">
                                        <h5>Zuttow Rold</h5>
                                        <p>We strategically design beautiful brands and websites, and digital products</p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="media">
                                    <div class="img">
                                        <img src="img/about/testimonial_1.png" alt="">
                                    </div>
                                    <div class="media-body">
                                        <img class="quote_img p_absoulte" src="img/about/quote.png" alt="">
                                        <h5>Zuttow Rold</h5>
                                        <p>We strategically design beautiful brands and websites, and digital products</p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="media">
                                    <div class="img">
                                        <img src="img/about/testimonial_1.png" alt="">
                                    </div>
                                    <div class="media-body">
                                        <img class="quote_img p_absoulte" src="img/about/quote.png" alt="">
                                        <h5>Zuttow Rold</h5>
                                        <p>We strategically design beautiful brands and websites, and digital products</p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="media">
                                    <div class="img">
                                        <img src="img/about/testimonial_1.png" alt="">
                                    </div>
                                    <div class="media-body">
                                        <img class="quote_img p_absoulte" src="img/about/quote.png" alt="">
                                        <h5>Zuttow Rold</h5>
                                        <p>We strategically design beautiful brands and websites, and digital products</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--        testimonial_area     -->
@endsection
@section('footer')
<script src="{{ url('public/home/js/parallaxie.js')}}"></script>
<script src="{{ url('public/home/vendors/slick/slick.min.js')}}"></script>
    <script src="{{ url('public/home/vendors/magnify-popup/jquery.magnific-popup.min.js')}}"></script>
    

@endsection