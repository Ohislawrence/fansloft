
<!DOCTYPE html>
<html lang="en" >
    <!--begin::Head-->
    <head>
        <meta charset="utf-8"/>
        <title>@section('title')
        | Fansloft
        @show </title>
        <meta name="description" content="Wizard examples"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        
        <!--begin::Fonts-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>        <!--end::Fonts-->



        <!--begin::Global Theme Styles(used by all pages)-->
                    <link href="{{ url('public/assets/plugins/global/plugins.bundle.css?v=7.0.6')}}" rel="stylesheet" type="text/css"/>
                    <link href="{{ url('public/assets/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.6')}}" rel="stylesheet" type="text/css"/>
                    <link href="{{ url('public/assets/css/style.bundle.css?v=7.0.6')}}" rel="stylesheet" type="text/css"/>
                <!--end::Global Theme Styles-->

        <!--begin::Layout Themes(used by all pages)-->
                <!--end::Layout Themes-->

        <link rel="shortcut icon" href="{{ url('public/uploads/icons/fav-small.png')}}"/>
         <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
        
<meta name="csrf-token" content="{{ csrf_token() }}">
        @yield('head')

            </head>
    <!--end::Head-->

    <!--begin::Body-->
    <body  id="kt_body" style="background-image: url({{ url('public/assets/media/bg/bg-10.jpg')}})"  class="quick-panel-right demo-panel-right offcanvas-right header-fixed subheader-enabled page-loading"  >

    	<!--begin::Main-->
	<!--begin::Header Mobile-->
<div id="kt_header_mobile" class="header-mobile " >
	<!--begin::Logo-->
	<a href="{{url('/')}}">
		<img alt="Logo" src="{{ url('public/uploads/icons/3d.png')}}" class="logo-default max-h-30px"/>
	</a>
	<!--end::Logo-->

	<!--begin::Toolbar-->
	<div class="d-flex align-items-center">

					<button class="btn p-0 burger-icon burger-icon-left ml-4" id="kt_header_mobile_toggle">
				<span></span>
			</button>

		<button class="btn btn-icon btn-hover-transparent-white p-0 ml-3" id="kt_header_mobile_topbar_toggle">
			<span class="svg-icon svg-icon-xl"><!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
        <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
    </g>
</svg><!--end::Svg Icon--></span>		</button>
	</div>
	<!--end::Toolbar-->
</div>
<!--end::Header Mobile-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Page-->
		<div class="d-flex flex-row flex-column-fluid page">
			<!--begin::Wrapper-->
			<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
				<!--begin::Header-->
<div id="kt_header" class="header  header-fixed " >
	<!--begin::Container-->
	<div class=" container  d-flex align-items-stretch justify-content-between">
		<!--begin::Left-->
		<div class="d-flex align-items-stretch mr-3">
			<!--begin::Header Logo-->
			<div class="header-logo">
				<a href="{{url('/')}}">
					<img alt="Logo" src="{{ url('public/uploads/icons/3d.png')}}" class="logo-default max-h-40px"/>
					<img alt="Logo" src="{{ url('public/uploads/icons/3d.png')}}" class="logo-sticky max-h-40px"/>
				</a>
			</div>
			<!--end::Header Logo-->

							@include('inc.nav2')
					</div>
		<!--end::Left-->

		<!--begin::Topbar-->
		<div class="topbar">
		    	    	    <!--begin::Search-->
	    		<div class="dropdown">
	                <!--begin::Toggle-->
	                <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
	        			<div class="btn btn-icon btn-hover-transparent-white btn-lg btn-dropdown mr-1">
	        				<span class="svg-icon svg-icon-xl"><!--begin::Svg Icon | path:assets/media/svg/icons/General/Search.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
        <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"/>
    </g>
</svg><!--end::Svg Icon--></span>	        			</div>
	                </div>
	                <!--end::Toggle-->

	                <!--begin::Dropdown-->
	    			<div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
	    				<div class="quick-search quick-search-dropdown" id="kt_quick_search_dropdown">
    <!--begin:Form-->
    <form method="get" class="quick-search-form">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <span class="svg-icon svg-icon-lg"><!--begin::Svg Icon | path:assets/media/svg/icons/General/Search.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
        <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"/>
    </g>
</svg><!--end::Svg Icon--></span>                </span>
            </div>
            <input type="text" class="form-control" placeholder="Search..."/>
            <div class="input-group-append">
                <span class="input-group-text">
                    <i class="quick-search-close ki ki-close icon-sm text-muted"></i>
                </span>
            </div>
       	</div>
    </form>
    <!--end::Form-->

    <!--begin::Scroll-->
    <div class="quick-search-wrapper scroll" data-scroll="true" data-height="325" data-mobile-height="200">
    </div>
    <!--end::Scroll-->
</div>
	    			</div>
	                <!--end::Dropdown-->
	    		</div>
	            <!--end::Search-->

@guest
<div class="topbar-item" data-toggle="dropdown" data-offset="0px,0px">
                        <div class="btn btn-icon btn-hover-transparent-white d-flex align-items-center btn-lg px-md-2 w-md-auto">
                            <span class="text-white opacity-70 font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span>
                            <span class="text-white opacity-90 font-weight-bolder font-size-base d-none d-md-inline mr-4">there</span>
                            <span class="symbol symbol-35">
                                <span class="symbol-label text-white font-size-h5 font-weight-bold bg-white-o-30">
                                    <img src="{{ url('public/uploads/avatars/user.png')}}" alt="image" width="30">
                                    
                                </span>
                            </span>
                        </div>
                    </div>

@else
		    	    	    <!--begin::Notifications-->
	    		<div class="dropdown">
	                <!--begin::Toggle-->
	                <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
	        			<div class="btn btn-icon btn-hover-transparent-white btn-dropdown btn-lg mr-1 pulse pulse-primary">
	        				<span class="svg-icon svg-icon-xl"><!--begin::Svg Icon | path:assets/media/svg/icons/Code/Compiling.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z" fill="#000000" opacity="0.3"/>
        <path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z" fill="#000000"/>
    </g>
</svg><!--end::Svg Icon--></span>	                        <span class="pulse-ring"></span>
	        			</div>
	                </div>
	                <!--end::Toggle-->

	                <!--begin::Dropdown-->
	    			<div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
	                    <form>
	    	                <!--begin::Header-->
    <div class="d-flex flex-column pt-12 bgi-size-cover bgi-no-repeat rounded-top" style="background-image: url({{ url('public/assets/media/misc/bg-3.jpg')}})">
        <!--begin::Title-->
        <h4 class="d-flex flex-center rounded-top">
            <span class="text-white">Notifications</span>
            <span class="btn btn-text btn-success btn-sm font-weight-bold btn-font-md ml-2">{{Auth::user()->notifications->count()}}</span>
        </h4>
        <!--end::Title-->

        <!--begin::Tabs-->
        <ul class="nav nav-bold nav-tabs nav-tabs-line nav-tabs-line-3x nav-tabs-line-transparent-white nav-tabs-line-active-border-success mt-3 px-8" role="tablist">
            <li class="nav-item">
                <a class="nav-link active show" data-toggle="tab" href="#topbar_notifications_notifications"  ></a>
            </li>
            
            
        </ul>
        <!--end::Tabs-->
    </div>
<!--end::Header-->

<!--begin::Content-->
<div class="tab-content">
    <div class="tab-content">
    <!--begin::Tabpane-->
    <div class="tab-pane active show p-8" id="topbar_notifications_notifications" role="tabpanel">
        <!--begin::Scroll-->
        <div class="navi navi-hover scroll my-4" data-scroll="true" data-height="200" data-mobile-height="150">
            <!--begin::Item-->
            
                @forelse(Auth::user()->notifications as $notification)
            <a href="#" class="navi-item">
                <div class="navi-link">
                    <div class="navi-icon mr-2">
                        <i class="flaticon2-line-chart text-success"></i>
                    </div>
                    <div class="navi-text">
                        <div class="font-weight-bold">
                            {{$notification->data['message']}}
                        </div>
                        <div class="text-muted">
                            {{$notification->created_at->diffForHumans()}}
                        </div>
                    </div>
                </div>
            </a>
        @empty
        No New Notification!
        @endforelse

            </div>
        </div></div>

    


</div>
<!--end::Content-->
	    	            </form>
	    			</div>
	                <!--end::Dropdown-->
	    		</div>
	            <!--end::Notifications-->

		    	            

		    	            <!--begin::User-->
	            <div class="dropdown">
	                <!--begin::Toggle-->
	                <div class="topbar-item" data-toggle="dropdown" data-offset="0px,0px">
	                    <div class="btn btn-icon btn-hover-transparent-white d-flex align-items-center btn-lg px-md-2 w-md-auto">
							<span class="text-white opacity-70 font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span>
						   	<span class="text-white opacity-90 font-weight-bolder font-size-base d-none d-md-inline mr-4">{{ Auth::user()->name}}</span>
	                        <span class="symbol symbol-35">
	                            <span class="symbol-label text-white font-size-h5 font-weight-bold bg-white-o-30">
                                    @if(Auth::user()->avatar)
                                    <img src="{{ url('public/uploads/avatars/'.Auth::user()->avatar)}}" alt="" width="30">
                                    @else
                                    <img src="{{ url('public/uploads/avatars/user.png')}}" alt="image" width="30">
                                    @endif
                                </span>
	                        </span>
	                    </div>
	                </div>
	                <!--end::Toggle-->

	                <!--begin::Dropdown-->
	        	    <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg p-0">
	        	            <!--begin::Header-->
    <div class="d-flex align-items-center p-8 rounded-top">
        <!--begin::Symbol-->
        <div class="symbol symbol-md bg-light-primary mr-3 flex-shrink-0">
            <img src="{{ url('public/uploads/avatars/'.Auth::user()->avatar)}}" alt="" width="30">
        </div>
        <!--end::Symbol-->

        <!--begin::Text-->
        <div class="text-dark m-0 flex-grow-1 mr-3 font-size-h5">{{ Auth::user()->name}}</div>
        <span class="label label-light-success label-lg font-weight-bold label-inline"></span>
        <!--end::Text-->
    </div>
    <div class="separator separator-solid"></div>
    <!--end::Header-->
@php $role = Auth::user()->role @endphp

@if($role == 'creator')
<!--begin::Nav-->
<div class="navi navi-spacer-x-0 pt-5">
    <!--begin::Item-->
    <a href="{{ url('loft/'.Auth::user()->brandname)}}" class="navi-item px-8">
        <div class="navi-link">
            <div class="navi-icon mr-2">
                <i class="flaticon2-calendar-3 text-success"></i>
            </div>
            <div class="navi-text">
                <div class="font-weight-bold">
                    My Profile
                </div>
                <div class="text-muted">
                    Account settings and more
                    <span class="label label-light-danger label-inline font-weight-bold">update</span>
                </div>
            </div>
        </div>
    </a>
    <!--end::Item-->

    <!--begin::Item-->
    <a href="{{url('inbox')}}"  class="navi-item px-8">
        <div class="navi-link">
            <div class="navi-icon mr-2">
                <i class="flaticon2-mail text-warning"></i>
            </div>
            <div class="navi-text">
                <div class="font-weight-bold">
                    My Messages
                </div>
                <div class="text-muted">
                    Inbox@php $count = Auth::user()->newThreadsCount(); @endphp
@if($count > 0)
    <span class="label label-danger">{{ $count }}</span>
@endif
                </div>
            </div>
        </div>
    </a>
    <!--end::Item-->

    <!--begin::Item-->
    <a href="{{url('notifications')}}"  class="navi-item px-8">
        <div class="navi-link">
            <div class="navi-icon mr-2">
                <i class="flaticon2-rocket-1 text-danger"></i>
            </div>
            <div class="navi-text">
                <div class="font-weight-bold">
                    My Activities
                </div>
                <div class="text-muted">
                    Notifications
                </div>
            </div>
        </div>
    </a>
    <!--end::Item-->

    <!--begin::Item-->
    <a href="{{ url('creator/tasks/view')}}" class="navi-item px-8">
        <div class="navi-link">
            <div class="navi-icon mr-2">
                <i class="flaticon2-hourglass text-primary"></i>
            </div>
            <div class="navi-text">
                <div class="font-weight-bold">
                    My Tasks
                </div>
                <div class="text-muted">
                    latest tasks and contacts
                </div>
            </div>
        </div>
    </a>
    <!--end::Item-->

    <!--begin::Footer-->
    <div class="navi-separator mt-3"></div>
    <div class="navi-footer  px-8 py-5">
        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"  target="_blank" class="btn btn-light-primary font-weight-bold">Sign Out</a><form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
        
    </div>
    <!--end::Footer-->
</div>
@elseif($role == 'brand')
<!--begin::Nav-->
<div class="navi navi-spacer-x-0 pt-5">
    <!--begin::Item-->
    <a href="{{ url('brand/profile')}}" class="navi-item px-8">
        <div class="navi-link">
            <div class="navi-icon mr-2">
                <i class="flaticon2-calendar-3 text-success"></i>
            </div>
            <div class="navi-text">
                <div class="font-weight-bold">
                    My Profile
                </div>
                <div class="text-muted">
                    Account settings and more
                    <span class="label label-light-danger label-inline font-weight-bold">update</span>
                </div>
            </div>
        </div>
    </a>
    <!--end::Item-->

    <!--begin::Item-->
    <a href="{{url('inbox')}}"  class="navi-item px-8">
        <div class="navi-link">
            <div class="navi-icon mr-2">
                <i class="flaticon2-mail text-warning"></i>
            </div>
            <div class="navi-text">
                <div class="font-weight-bold">
                    My Messages
                </div>
                <div class="text-muted">
                    Inbox@php $count = Auth::user()->newThreadsCount(); @endphp
@if($count > 0)
    <span class="label label-danger">{{ $count }}</span>
@endif
                </div>
            </div>
        </div>
    </a>
    <!--end::Item-->

    <!--begin::Item-->
    <a href="{{url('notifications')}}"  class="navi-item px-8">
        <div class="navi-link">
            <div class="navi-icon mr-2">
                <i class="flaticon2-rocket-1 text-danger"></i>
            </div>
            <div class="navi-text">
                <div class="font-weight-bold">
                    My Activities
                </div>
                <div class="text-muted">
                    Notifications
                </div>
            </div>
        </div>
    </a>
    <!--end::Item-->

    <!--begin::Item-->
    
    <!--end::Item-->

    <!--begin::Footer-->
    <div class="navi-separator mt-3"></div>
    <div class="navi-footer  px-8 py-5">
        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"  target="_blank" class="btn btn-light-primary font-weight-bold">Sign Out</a><form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
        
    </div>
    <!--end::Footer-->
</div>

@elseif($role == 'admin')
<!--begin::Nav-->
<div class="navi navi-spacer-x-0 pt-5">
    <!--begin::Item-->
    <a href="{{ url('creator/profile')}}" class="navi-item px-8">
        <div class="navi-link">
            <div class="navi-icon mr-2">
                <i class="flaticon2-calendar-3 text-success"></i>
            </div>
            <div class="navi-text">
                <div class="font-weight-bold">
                    My Profile
                </div>
                <div class="text-muted">
                    Account settings and more
                    <span class="label label-light-danger label-inline font-weight-bold">update</span>
                </div>
            </div>
        </div>
    </a>
    <!--end::Item-->

    <!--begin::Item-->
    <a href="{{url('inbox')}}"  class="navi-item px-8">
        <div class="navi-link">
            <div class="navi-icon mr-2">
                <i class="flaticon2-mail text-warning"></i>
            </div>
            <div class="navi-text">
                <div class="font-weight-bold">
                    My Messages
                </div>
                <div class="text-muted">
                     Inbox@php $count = Auth::user()->newThreadsCount(); @endphp
@if($count > 0)
    <span class="label label-danger">{{ $count }}</span>
@endif
                </div>
            </div>
        </div>
    </a>
    <!--end::Item-->

    <!--begin::Item-->
    <a href=""  class="navi-item px-8">
        <div class="navi-link">
            <div class="navi-icon mr-2">
                <i class="flaticon2-rocket-1 text-danger"></i>
            </div>
            <div class="navi-text">
                <div class="font-weight-bold">
                    My Activities
                </div>
                <div class="text-muted">
                    Logs and notifications
                </div>
            </div>
        </div>
    </a>
    <!--end::Item-->

    <!--begin::Item-->
    <a href="{{ url('creator/tasks/view')}}" class="navi-item px-8">
        <div class="navi-link">
            <div class="navi-icon mr-2">
                <i class="flaticon2-hourglass text-primary"></i>
            </div>
            <div class="navi-text">
                <div class="font-weight-bold">
                    My Tasks
                </div>
                <div class="text-muted">
                    latest tasks and projects
                </div>
            </div>
        </div>
    </a>
    <!--end::Item-->

    <!--begin::Footer-->
    <div class="navi-separator mt-3"></div>
    <div class="navi-footer  px-8 py-5">
        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"  target="_blank" class="btn btn-light-primary font-weight-bold">Sign Out</a><form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
        
    </div>
    <!--end::Footer-->
</div>

@else
<h3>Bad request</h3>
@endif
<!--end::Nav-->
@endguest
	        	    </div>
	                <!--end::Dropdown-->
	            </div>

	            <!--end::User-->
		    		</div>
		<!--end::Topbar-->
	</div>
	<!--end::Container-->
</div>
<!--end::Header-->

				<!--begin::Content-->
				<div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
											<!--begin::Subheader-->
<div class="subheader py-2 py-lg-12  subheader-transparent " id="kt_subheader">
    <div class=" container  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-1">


            <!--begin::Heading-->
            <div class="d-flex flex-column">
                <!--begin::Title-->
                <h2 class="text-white font-weight-bold my-2 mr-5">@yield('bread1')</h2>
                <!--end::Title-->

                                    <!--begin::Breadcrumb-->
                    <div class="d-flex align-items-center font-weight-bold my-2">
                        <!--begin::Item-->
                        <a onclick="goBack()" class="opacity-75 hover-opacity-100">
                            <i class="flaticon2-shelter text-white icon-1x"></i>
                        </a>
                        <!--end::Item-->
                                                    <!--begin::Item-->
                            <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                            <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">@yield('bread1')</a>
                            <!--end::Item-->
                                                    <!--begin::Item-->
                            <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                            <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">@yield('bread2')</a>
                            <!--end::Item-->
                                            </div>
    				<!--end::Breadcrumb-->
                            </div>
            <!--end::Heading-->

                    </div>
        <!--end::Info-->
            
        <!--begin::Toolbar-->
        <div class="d-flex align-items-center">
            @yield('actions')

                            
                    </div>
        <!--end::Toolbar-->
    </div>
</div>
<!--end::Subheader-->

					@yield('content')

		
	
	<!--end::Content-->
    <!--begin::Footer-->
<div class="footer bg-white py-4 d-flex flex-lg-column " id="kt_footer">
    <!--begin::Container-->
    <div class=" container  d-flex flex-column flex-md-row align-items-center justify-content-between">
        <!--begin::Copyright-->
        <div class="text-dark order-2 order-md-1">
            <span class="text-muted font-weight-bold mr-2"><?php echo date("Y"); ?>&copy;</span>
            <a href="https://fansloft.com" target="_blank" class="text-dark-75 text-hover-primary">Fansloft.com</a>
        </div>
        <!--end::Copyright-->

        <!--begin::Nav-->
        <div class="nav nav-dark order-1 order-md-2">
            <a href="{{url('/')}}" target="_blank" class="nav-link pr-3 pl-0">Home</a>
            <a href="{{url('/')}}" target="_blank" class="nav-link px-3">T&C</a>
            <a href="{{url('updates')}}" target="_blank" class="nav-link pl-3 pr-0">Blogs</a>
        </div>
        <!--end::Nav-->
    </div>
    <!--end::Container-->
</div>
<!--end::Footer-->
</div>
<!--end::Demo Panel-->

       
        <!--begin::Global Config(global config for global JS scripts)-->
        <script>
            var KTAppSettings = {
    "breakpoints": {
        "sm": 576,
        "md": 768,
        "lg": 992,
        "xl": 1200,
        "xxl": 1200
    },
    "colors": {
        "theme": {
            "base": {
                "white": "#ffffff",
                "primary": "#6993FF",
                "secondary": "#E5EAEE",
                "success": "#1BC5BD",
                "info": "#8950FC",
                "warning": "#FFA800",
                "danger": "#F64E60",
                "light": "#F3F6F9",
                "dark": "#212121"
            },
            "light": {
                "white": "#ffffff",
                "primary": "#E1E9FF",
                "secondary": "#ECF0F3",
                "success": "#C9F7F5",
                "info": "#EEE5FF",
                "warning": "#FFF4DE",
                "danger": "#FFE2E5",
                "light": "#F3F6F9",
                "dark": "#D6D6E0"
            },
            "inverse": {
                "white": "#ffffff",
                "primary": "#ffffff",
                "secondary": "#212121",
                "success": "#ffffff",
                "info": "#ffffff",
                "warning": "#ffffff",
                "danger": "#ffffff",
                "light": "#464E5F",
                "dark": "#ffffff"
            }
        },
        "gray": {
            "gray-100": "#F3F6F9",
            "gray-200": "#ECF0F3",
            "gray-300": "#E5EAEE",
            "gray-400": "#D6D6E0",
            "gray-500": "#B5B5C3",
            "gray-600": "#80808F",
            "gray-700": "#464E5F",
            "gray-800": "#1B283F",
            "gray-900": "#212121"
        }
    },
    "font-family": "Poppins"
};
        </script>
        <!--end::Global Config-->

    	<!--begin::Global Theme Bundle(used by all pages)-->
    	    	   <script src="{{ url('public/assets/plugins/global/plugins.bundle.js?v=7.0.6')}}"></script>
		    	   <script src="{{ url('public/assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.6')}}"></script>
		    	   <script src="{{ url('public/assets/js/scripts.bundle.js?v=7.0.6')}}"></script>
				<!--end::Global Theme Bundle-->




@yield('footer')

    
            </body>
    <!--end::Body-->
    <script>
function goBack() {
  window.history.back();
}
</script>

</html>
