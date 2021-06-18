@extends('layouts.app5')

@section('title')
Campaign Feed
@parent
@stop

@section('bread1', 'Campaign')
@section('bread2', 'Campaign Feed')

@section('head')

@endsection


@section('content')
<div class="container">
<!--begin::Card-->
@if(session()->has('message'))    
<div class="alert alert-custom alert-notice alert-light-primary fade show" role="alert">
    <div class="alert-icon"><i class="flaticon-warning"></i></div>
    <div class="alert-text">{{ session()->get('message')}}</div>
    <div class="alert-close">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="ki ki-close"></i></span>
        </button>
    </div>
</div>
@endif


<div class="card card-custom gutter-b">
   <div class="card-body">
<div class="">
    <div class="row align-items-center">
        <div class="col-lg-9 col-xl-8">
        
 <form action="{{ url('creator/campaigns')}}" method="GET">
            
<div class="row align-items-center">

    <div class="col-md-6 my-2 my-md-0 ">
            <div class="d-flex align-items-center">
        <label class="mr-3 mb-0 d-none d-md-block">Platform:</label>
                <select class="form-control" name="qualification" id="qualification" >
                    <option value="">Platform</option>
                    @foreach($platform as $platform)
                    <option>{{ ucfirst($platform) }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-6 my-2 my-md-0 ">
            <div class="d-flex align-items-center">
                <label class="mr-3 mb-0 d-none d-md-block">Category:</label>
                <select class="form-control" name="niche" id="niche" >
                    <option value="">Category</option>
                    @foreach($category as $category)
                    <option>{{ ucfirst($category) }}</option>
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

<!--begin::User-->
<div class="d-flex flex-column-fluid">
		<!--begin::Container-->
		<div class=" container " >
							<!--begin::Row-->
<div class="row" id="campaign-data">
    <!--begin::Col-->
    @forelse($campaign as $cp)
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
        <!--begin::Card-->
        <div class="card card-custom gutter-b card-stretch">
            <!--begin::Body-->
            <div class="card-body pt-4">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end">
                    <div class="dropdown dropdown-inline" data-toggle="tooltip" data-placement="left">
                        
                        <i class="ki ki-bold-more-hor"></i>
                        
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                            
                        </div>
                    </div>
                </div>
                <!--end::Toolbar-->
                <!--begin::User-->
                <div class="d-flex align-items-center mb-7">
                    <!--begin::Pic-->
                    <div class="flex-shrink-0 mr-4">
                        <div class="symbol symbol-circle symbol-lg-75">
                            <img src="{{url('public/uploads/avatars/'.$cp->user->avatar)}}" alt="image"/>
                        </div>
                    </div>
                    <!--end::Pic-->
                    <!--begin::Title-->
                    <div class="d-flex flex-column">
                        <a href="{{ url('creator/campaign/'.$cp->id.'/view/'.$cp->amount)}}" class="text-dark font-weight-bold text-hover-primary font-size-h4 mb-0">{{ ucwords($cp->campaign_name)}}</a>
                        <span class="text-muted font-weight-bold">By {{ ucfirst($cp->user->brandname)}}</span>
                    </div>
                    <!--end::Title-->
                </div>
                <!--end::User-->
                <!--begin::Desc-->
                <p class="mb-7">
                    {{ mb_strimwidth($cp->desc, 0, 170, "...")}}
                </p>
                <!--end::Desc-->
                <!--begin::Info-->
                <div class="mb-7">
                
                    <div class="d-flex justify-content-between align-items-cente my-1">
                        <span class="text-dark-75 font-weight-bolder mr-2">Platform:</span>
                        <a href="#" class="text-muted text-hover-primary">{{ ucfirst($cp->qualification)}}</a>
                    </div>
                    <div class="d-flex justify-content-between align-items-cente my-1">
                        <span class="text-dark-75 font-weight-bolder mr-2">Category:</span>
                        <a href="#" class="text-muted text-hover-primary">{{ ucfirst($cp->niche)}}</a>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-dark-75 font-weight-bolder mr-2">Posted:</span>
                        <span class="text-muted font-weight-bold">{{ $cp->created_at->diffForHumans() }}</span>
                    </div>
                </div>
                <!--end::Info-->
                <a href="{{ url('creator/campaign/'.$cp->id.'/view/'.$cp->amount)}}" class="btn btn-block btn-sm btn-light-danger font-weight-bolder text-uppercase py-4">View Campaign</a>
            </div>
            <!--end::Body-->
        </div>
        <!--end:: Card-->
    </div>
        @empty
        <h1>No Campaign Yet</h1>
        @endforelse
   
    <!--end::Col-->
    </div>

            {{ $campaign->links('vendor.pagination.default')}}
            


 </div>

<!--end::Row-->
</div>
</div>

@endsection


@section('footer')


@endsection