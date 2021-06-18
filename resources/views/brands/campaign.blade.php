@extends('layouts.app5')

@section('title')
My Campaign
@parent
@stop

@section('bread1', 'My Campaign')
@section('bread2', 'View Campaign')
@section('head')

@endsection

@section('actions')
<!--begin::Toolbar-->

            @if($planis == 1)
            <a href="{{ url('brand/campaign/create')}}" class="btn btn-transparent-white font-weight-bold  py-3 px-6 mr-2">
                    <i class="fas fa-bullhorn"></i>New Campaign
                </a>
            @elseif($planis == 0)
            <a href="{{ url('brand/profile/plan')}}" class="btn btn-transparent-white font-weight-bold  py-3 px-6 mr-2">
                    <i class="fas fa-bullhorn"></i>New Campaign
                </a>
            @endif

                
                
                <!--<a href="#" class="btn btn-white font-weight-bold py-3 px-6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Actions
                </a>-->
        
        <!--end::Toolbar-->
@endsection

@section('content')


    
<!--begin::Card-->
<div class="container">
    @if(session()->has('message'))    
<div class="alert alert-custom alert-notice alert-light-primary fade show" role="alert">
    <div class="alert-icon"><i class="flaticon-info"></i></div>
    <div class="alert-text">{{ session()->get('message')}}</div>
    <div class="alert-close">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="ki ki-close"></i></span>
        </button>
    </div>
</div>
@endif
<!--begin::Notice-->
<div class="card card-custom gutter-b">
   <div class="card-body">

<div class="">
    <div class="row align-items-center">
        <div class="col-lg-9 col-xl-8">
 <form action="{{ url('brand/campaign')}}" method="GET">
            
    <div class="row align-items-center">
            <div class="col-md-4 my-2 my-md-0 ">
                    <div class="d-flex align-items-center">
        <label class="mr-3 mb-0 d-none d-md-block">Privacy:</label>
                <select class="form-control" name="hashtag" id="hashtag" >
                    <option value="">Privacy</option>
                    @foreach($privacy as $privacy)
                    <option>{{ ucfirst($privacy) }}</option>
                    @endforeach
                </select>
                </div>
            </div>

            <div class="col-md-4 my-2 my-md-0 ">
            <div class="d-flex align-items-center">
        <label class="mr-3 mb-0 d-none d-md-block">Plaform:</label>
                <select class="form-control" name="qualification" id="qualification" >
                    <option value="">Platform</option>
                    @foreach($platform as $platform)
                    <option>{{ ucfirst($platform) }}</option>
                    @endforeach
                </select>
                </div>
            </div>

            <div class="col-md-4 my-2 my-md-0">
                <div class="d-flex align-items-center">
                <label class="mr-3 mb-0 d-none d-md-block">Status:</label>
                <select class="form-control" name="status" id="status">
                    <option value="">Status</option>
                    @foreach($status as $status)
                    <option>{{ ucfirst($status) }}</option>
                    @endforeach
                </select>
                </div>
            </div>
            </div>
</div>



            <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
                <input type="submit" class="btn btn-primary" value="Filter" name="">
            </div>
        </div>
        </form>
        <!--end:: Pagination-->
    </div>
<!--end::Pagination-->

</div>
</div>
                                  
   



<div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="" >
                            <!--begin::Row-->
<div class="row" id="campaign-data">
    @forelse($campaign as $cp)
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
        <!--begin::Card-->
        <div class="card card-custom gutter-b card-stretch">
            <!--begin::Body-->
            <div class="card-body pt-4">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end">
                    <div class="dropdown dropdown-inline" data-toggle="tooltip" title="" data-placement="left">
                        <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="ki ki-bold-more-hor"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                            <!--begin::Navigation-->
<ul class="navi navi-hover">
    <li class="navi-header pb-1">
        <span class="text-primary text-uppercase font-weight-bold font-size-sm"></span>
    </li>
    <li class="navi-item">
        <a href="{{url('brand/campaign/'.$cp->id.'/update/'.$cp->amount)}}" class="navi-link">
            <span class="navi-icon"><i class="flaticon2-refresh"></i></span>
            <span class="navi-text">Edit</span>
        </a>
    </li>
    <li class="navi-item">
        <a data-toggle="modal" data-target="#deletethis{{$cp->id}}" class="navi-link">
            <span class="navi-icon"><i class="flaticon2-delete"></i></span>
            <span class="navi-text">Delete</span>
        </a>
    </li>
</ul>
<!--end::Navigation-->
                        </div>
                    </div>
                </div>
                <!--end::Toolbar-->
                <!--begin::User-->
                <div class="d-flex align-items-center mb-7">
                    <!--begin::Pic-->
                    <div class="flex-shrink-0 mr-4">
                        <div class="symbol symbol-circle symbol-lg-75">
                            <img src="{{ url('public/uploads/avatars/'.Auth::user()->avatar )}}" alt="image"/>
                        </div>
                    </div>
                    <!--end::Pic-->
                    <!--begin::Title-->
                    <div class="d-flex flex-column">
                        <a href="#" class="text-dark font-weight-bold text-hover-primary font-size-h4 mb-0">{{ ucwords($cp->campaign_name)}}</a>
                        <span class="text-muted font-weight-bold">By {{ $cp->user->brandname}}</span>
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
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-dark-75 font-weight-bolder mr-2">Status:</span>
                        <span class="text-muted font-weight-bold">{{ ucfirst($cp->status) }}</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-dark-75 font-weight-bolder mr-2">My Budget:</span>
                        <a href="#" class="text-muted text-hover-primary">₦ {{ number_format($cp->budget)}}</a>
                    </div>
                    <div class="d-flex justify-content-between align-items-cente my-1">
                        <span class="text-dark-75 font-weight-bolder mr-2">Platform:</span>
                        <a href="#" class="text-muted text-hover-primary">{{ ucfirst($cp->qualification)}}</a>
                    </div>
                    <div class="d-flex justify-content-between align-items-cente my-1">
                        <span class="text-dark-75 font-weight-bolder mr-2">Category:</span>
                        <a href="#" class="text-muted text-hover-primary">{{ ucfirst($cp->niche)}}</a>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-dark-75 font-weight-bolder mr-2">Posted On:</span>
                        <span class="text-muted font-weight-bold">{{ \Carbon\Carbon::parse($cp->created_at)->format('j F, Y') }}</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-dark-75 font-weight-bolder mr-2">Privacy:</span>
                        <span class="text-muted font-weight-bold">
                            @if($cp->hashtag == 'on')
                            Private
                            @else
                            Public
                            @endif
                        </span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-dark-75 font-weight-bolder mr-2">Proposal(s):</span>
                        <span class="text-muted font-weight-bold">{{ $cp->proposal->count() }}</span>
                    </div>
                </div>
                <!--end::Info-->
                <a href="{{ url('brand/campaign/'.$cp->id.'/view/'.$cp->amount)}}" class="btn btn-block btn-sm btn-light-danger font-weight-bolder text-uppercase py-4">View this campaign</a>
            </div>
            <!--end::Body-->
        </div>
        <!--end:: Card-->
    </div>

<!-- Modal-->
<div class="modal fade" id="deletethis{{$cp->id}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">This action cannot be reversed!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                
                You are about to remove your <b>{{$cp->campaign_name}}</b> campaign.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cancel</button>
                <form action="{{ url('brand/campaign/'.$cp->id.'/delete')}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-primary font-weight-bold" type="submit"><span class="navi-text">
                <span class="">Continue</span>
            </span></button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end modal--> 
        @empty
        <h1>Your campaigns will be shown here, use the button at the top to create a new campaign.</h1>
        @endforelse
   
    <!--end::Col-->
    
    </div>
        <!--end: Datatable-->
    </div>
</div>
<!--end::Card-->
{{ $campaign->links('vendor.pagination.default')}}
</div>
</div>
            

@endsection


@section('footer')
<!--begin::Page Scripts(used by this page)-->

<script src="{{ url('public/assets/js/pages/crud/ktdatatable/base/html-table.js?v=7.0.6')}}"></script>
                        <!--end::Page Scripts-->

@endsection