<html lang="en">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-160412238-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-160412238-1');
</script>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{ asset('public/uploads/icons/fav-small.png')}}" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('public/home/vendors/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/home/vendors/fullpage/fullpage.css')}}">
    <link rel="stylesheet" href="{{asset('public/home/vendors/elagent-icon/style.css')}}">
    <link rel="stylesheet" href="{{asset('public/home/vendors/animation/animate.css')}}">
    <link rel="stylesheet" href="{{asset('public/home/vendors/slick/slick.css')}}">
    <link rel="stylesheet" href="{{asset('public/home/vendors/slick/slick-theme.css')}}">
    <link rel="stylesheet" href="{{asset('public/home/vendors/player-audio/mediaelementplayer.css')}}">
    <link rel="stylesheet" href="{{asset('public/home/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('public/home/css/responsive.css')}}">
    <title>@section('title')Fansloft @show </title>
    @yield('header')
</head>

<body>
    <div class="body_wrapper">
        <!--       header     -->
        <header class="header_area p_absoulte m_p sticky_nav">
            <nav class="navbar navbar-expand-lg" id="header">
                <div class="container-fluid">
                    <div class="logo_info">
                        <a href="{{url('/')}}" class="navbar-brand logo_two"><img src="{{asset('public/uploads/icons/logo81.png')}}" srcset="{{ asset('public/uploads/icons/logo91.png')}}" alt=""><img src="{{ asset('public/uploads/icons/logo81.png')}}" alt=""></a>
                        <div class="h_contact_info">
                            <a href="#"></a>
                            <a href="mailto:info@fansloft.com">info@fansloft.com</a>
                        </div>
                    </div>
                    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="menu_toggle">
                            <span class="hamburger">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                            <span class="hamburger-cross">
                                <span></span>
                                <span></span>
                            </span>
                        </span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto menu">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/')}}" role="button"   aria-expanded="">
                                    Home
                                </a>
                                
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('creators-influencers')}}" role="button" aria-expanded="">
                                    Influencers & Creators
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('brands')}}" role="button" data-toggle="" aria-expanded="">
                                    Brands
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('/#pricing')}}" role="button" aria-expanded="">
                                    Pricing
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('updates')}}" role="button" aria-expanded="">
                                    Blogs
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('/#contact')}}" role="button" aria-expanded="">
                                    Contact Us
                                </a>
                            </li>
                            
                            @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('login')}}" role="button" data-toggle="" aria-expanded="">
                                    Sign In
                                </a>
                            </li>
                            
                            @else
                            <li class="nav-item dropdown submenu">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->brandname }}
                                </a>
                                <ul class="dropdown-menu">
                                
                                <li class="nav-item"><a href="{{ route('logout') }}" class="nav-link"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"  target="_blank">{{__('Sign Out')}}</a><form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf
                                    </form></li>
                            </ul>
                            </li>
                            
                            @endguest
                            
                        </ul>
                    </div>
                    <div class="burger_menu side_menu">
                        <div class="dot_icon">
                            <span class="dot one"></span>
                            <span class="dot two"></span>
                            <span class="dot three"></span>
                            <span class="dot four"></span>
                            <span class="dot five"></span>
                            <span class="dot six"></span>
                            <span class="dot seven"></span>
                            <span class="dot eight"></span>
                            <span class="dot nine"></span>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <!--       header     -->
        
        <!--       breadcrumb_area_two     -->
        @yield('content')
                <!--       footer_area     -->
        <footer class="footer_area">
            <div class="container">
                <div class="footer_top">
                    <a href="#" class="f_logo"><img src="{{asset('public/uploads/icons/logo91.png')}}" srcset="{{asset('public/uploads/icons/logo91.png')}}" alt=""></a>
                    <h3>Connect with us <a href="/">We are social!</a></h3>
                    <ul class="list-unstyled social_link">
                        
                        <li><a href="https://instagram/fansloft"><i class="social_instagram"></i><i class="social_instagram"></i></a></li>
                        <li><a href="https://fb.com/fansloft" target="_blank"><i class="social_facebook"></i><i class="social_facebook"></i></a></li>
                        <li><a href="https://twitter.com/fansloft" target="_blank"><i class="social_twitter"></i><i class="social_twitter"></i></a></li>
                    </ul>
                </div>
                <div class="footer_bottom">
                    <p>Copyright © {{date("Y")}} <a href="https://fansloft.com">Fansloft Network</a> | All rights reserved</p>
                </div>
            </div>
        </footer>
        <!--       footer_area     -->
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('public/home/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{ asset('public/home/vendors/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{ asset('public/home/vendors/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('public/home/vendors/fullpage/scroll-overflow.js')}}"></script>
    <script src="{{ asset('public/home/vendors/fullpage/fullpage.js')}}"></script>
    <script src="{{ asset('public/home/js/parallax.js')}}"></script>
    <script src="{{ asset('public/home/js/custom.js')}}"></script>
    <script src="{{ asset('public/js/share.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
    @yield('footer')

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