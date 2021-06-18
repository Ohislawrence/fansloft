@extends('layouts.app2')

@section('title')
Add Twitter
@parent
@stop

@section('bread1', 'Platform')
@section('bread2', 'Add Platform')

@section('content')
<!--  BEGIN MAIN CONTAINER  -->
   

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="container">
                
                    
                    <div class="row">
                        <div id="flStackForm" class="col-lg-12 layout-spacing layout-top-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">                                
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Add Twitter</h4>
                                        </div>                                                                        
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <form action="{{ url('add-twitter')}}" method="post">
                                    	@csrf

                                    	@if(session()->has('message'))
                                    	<div class="alert alert-primary mb-4" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button> {{ session()->get('message')}}</div>
                                    	
                                    
                                    	@endif
                                    	<input type="hidden" name="uid" id="uid" value="{{ Auth::user()->id }}">
                                    	<input type="hidden" name="platform" id="platform" value="Twitter">
                                        <div class="input-group mb-4">
  										<div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon5">@</span>
  </div>
  <input type="text" name="username" id="username" class="form-control" placeholder="Username" aria-label="Username">
</div>
                                        <div class="input-group mb-4">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-default">Followers</span>
  </div>
  <input type="text" name="followers" id="followers" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
</div>

<div class="input-group mb-4">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-default">Following</span>
  </div>
  <input type="text" name="following" id="following" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
</div>

<div class="input-group mb-4">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-default">Join Date</span>
  </div>
  <input type="text" name="date" id="date" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
</div>

<div class="input-group mb-4">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-default">Category</span>
  </div>
  <input type="text" name="category" id="category" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
</div>
                                        <div class="form-group form-check pl-0">
                                            <div class="custom-control custom-checkbox checkbox-info">
                                                <input type="checkbox" class="custom-control-input" id="sChkbox">
                                                <label class="custom-control-label" for="sChkbox">Post at @fansloft on your account and we will verify ownership, after verification you should be able to add price and services under this account.</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                                    </form>

                                    
                                </div>
                            </div>
                        </div>
                        
                        
        <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->

@endsection
