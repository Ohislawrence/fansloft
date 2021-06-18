
<!DOCTYPE html>
<html lang="en" >
    <!--begin::Head-->
    <head><base href="../../../">
        <meta charset="utf-8"/>
        <title>Fansloft | No Access Page</title>
        <meta name="description" content=""/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

        <!--begin::Fonts-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>        <!--end::Fonts-->


                    <!--begin::Page Custom Styles(used by this page)-->
                             <link href="{{url('public/assets/css/pages/error/error-5.css?v=7.0.6')}}" rel="stylesheet" type="text/css"/>
                        <!--end::Page Custom Styles-->

        <!--begin::Global Theme Styles(used by all pages)-->
                    <link href="{{url('public/assets/plugins/global/plugins.bundle.css?v=7.0.6')}}" rel="stylesheet" type="text/css"/>
                    <link href="{{url('public/assets/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.6')}}" rel="stylesheet" type="text/css"/>
                    <link href="{{url('public/assets/css/style.bundle.css?v=7.0.6')}}" rel="stylesheet" type="text/css"/>
                <!--end::Global Theme Styles-->

        <!--begin::Layout Themes(used by all pages)-->
                <!--end::Layout Themes-->

        <link rel="shortcut icon" href="{{ url('public/uploads/icons/fav-small.png')}}"/>

            </head>
    <!--end::Head-->

    <!--begin::Body-->
    <body  id="kt_body" style="background-image: url({{url('public/assets/media/bg/bg-10.jpg')}})"  class="quick-panel-right demo-panel-right offcanvas-right header-fixed subheader-enabled page-loading"  >

    	<!--begin::Main-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Error-->
<div class="error error-5 d-flex flex-row-fluid bgi-size-cover bgi-position-center" style="background-image: url({{url('public/assets/media/error/bg5.jpg')}});">
	<!--begin::Content-->
	<div class="container d-flex flex-row-fluid flex-column justify-content-md-center p-12">
		<h1 class="error-title font-weight-boldest text-info mt-10 mt-md-0 mb-12">Oops!</h1>
		<p class="font-weight-boldest display-4">
			Something went wrong here.
		</p>
		<p class="font-size-h3">
			The page your requested can't be access </br>
			with your clearance.</br>
			You can back or <a href="{{ url('/')}}" class="btn btn-primary">Go to Homepage</a>
		</p>
	</div>
	<!--end::Content-->
</div>
<!--end::Error-->
	</div>
<!--end::Main-->