@extends('layouts.app5')

@section('title')
Inbox
@parent
@stop

@section('bread1', 'Inbox')
@section('bread2', 'My Inbox')

@section('head')

       
@endsection

@section('actions')

@endsection

@section('content')

   
<!--begin::Entry-->
	<div class="d-flex flex-column-fluid">
		<!--begin::Container-->
		<div class=" container ">
			@if (Session::has('error_message'))
    <div class="alert alert-danger" role="alert">
        {{ Session::get('error_message') }}
    </div>
@endif




<h1>{{ LaravelGmail::user() }}</h1>
    @if(LaravelGmail::check())
        <a href="{{ url('oauth/gmail/logout') }}">logout</a>
    @else
        <a href="{{ url('oauth/gmail') }}">login</a>
    @endif


	
    </div>
</div>
<!--end::Compose-->


@endsection


@section('footer')


<script src="{{('public/assets/js/pages/custom/inbox/inbox.js?v=7.0.6')}}"></script>
<script src="{{url('public/assets/js/pages/crud/forms/widgets/tagify.js?v=7.0.6')}}"></script>
@endsection