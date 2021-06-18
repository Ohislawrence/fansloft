@extends('layouts.app5')

@section('title')
All User
@parent
@stop

@section('bread1', 'User')
@section('bread2', 'All Users')

@section('head')

@endsection

@section('actions')
 
@endsection


@section('content')
<div class="container">
<div class="card card-custom gutter-b">
   <div class="card-body">
<div class="">
    <div class="row align-items-center">
        <div class="col-lg-9 col-xl-8">
        
 <form action="{{ url('admin/userlist')}}" method="GET">
            
<div class="row align-items-center">

    <div class="col-md-6 my-2 my-md-0 ">
            <div class="d-flex align-items-center">
        <label class="mr-3 mb-0 d-none d-md-block">Role:</label>
                <select class="form-control" name="role" id="role" >
                    <option value="">Role</option>
                    @foreach($role as $roles)
                    <option>{{ ucfirst($roles) }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-6 my-2 my-md-0 ">
            <div class="d-flex align-items-center">
                <label class="mr-3 mb-0 d-none d-md-block">Category:</label>
                <select class="form-control" name="maincategory" id="maincategory" >
                    <option value="">Category</option>
                    @foreach($maincategory as $categorys)
                    <option>{{ ucfirst($categorys) }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        </div>
</div>
    <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
            <input type="submit" class="btn btn-light-primary px-6 font-weight-bold" value="Filter" name="">
        </div>
    </div>
</div>   </form>

<!--end::Notice-->
</div></div></div>
<!--begin::Entry-->
	<div class="d-flex flex-column-fluid">
		<!--begin::Container-->
		<div class=" container ">
							<!--begin::Row-->
<div class="row">
    <!--begin::Col-->
     @forelse($allusers as $user)
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
        <!--begin::Card-->
        <div class="card card-custom gutter-b card-stretch">
            <!--begin::Body-->

            <div class="card-body pt-4">
                
                <!--begin::User-->
                <div class="d-flex align-items-end mb-7">
                    <!--begin::Pic-->
                    <div class="d-flex align-items-center">
                        <!--begin::Pic-->
                        <div class="flex-shrink-0 mr-4 mt-lg-0 mt-3">
                            <div class="symbol symbol-circle symbol-lg-75">
                                <img src="{{url('public/uploads/avatars/'.$user->avatar)}}" alt="image"/>
                            </div>
                            <div class="symbol symbol-lg-75 symbol-circle symbol-primary d-none">
                                <span class="font-size-h3 font-weight-boldest"></span>
                            </div>
                        </div>
                        <!--end::Pic-->
                        <!--begin::Title-->
                        <div class="d-flex flex-column">
                            <a href="#" class="text-dark font-weight-bold text-hover-primary font-size-h4 mb-0">{{ $user->name }}</a>
                            <span class="text-muted font-weight-bold">{{ $user->role }}</span>
                        </div>
                        <!--end::Title-->
                    </div>
                    <!--end::Title-->
                </div>
                <!--end::User-->
                <!--begin::Desc-->
                <p class="mb-7">
                    
                </p>
                <!--end::Desc-->
                <!--begin::Info-->
                <div class="mb-7">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-dark-75 font-weight-bolder mr-2">Email:</span>
                        <a href="#" class="text-muted text-hover-primary">{{ $user->email }}</a>
                    </div>
                    <div class="d-flex justify-content-between align-items-cente my-1">
                        <span class="text-dark-75 font-weight-bolder mr-2">Phone:</span>
                        <a href="#" class="text-muted text-hover-primary">{{ $user->mobilenumber }}</a>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-dark-75 font-weight-bolder mr-2">Location:</span>
                        <span class="text-muted font-weight-bold">{{ $user->state }} {{ $user->country }}</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-dark-75 font-weight-bolder mr-2">Platform:</span>
                        <span class="text-muted font-weight-bold">
                        	@forelse($user->platform as $platform)
                        	<span class="label label-info label-inline mr-2">{{$platform->platform}}</span>
                        	@empty
                    		@endforelse</span>
                    </div>
                </div>
                <!--end::Info-->
                <a href="{{url('admin/userlist/'.$user->id)}}" class="btn btn-block btn-sm btn-light-warning font-weight-bolder text-uppercase py-4">Edit User</a>
            </div>
            <!--end::Body-->

        </div>
        <!--end::Card-->
        
    </div>


    <!--end::Col-->
@empty
    @endforelse



    
    </div>
</div>

</div>
</div>
{{ $allusers->links('vendor.pagination.default')}}
@endsection




@section('footer')

@endsection