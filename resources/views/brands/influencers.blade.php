@extends('layouts.app5')

@section('title')
Creators
@parent
@stop

@section('bread1', 'Creators')
@section('bread2', 'Search Creators')


@section('head')

<link href="{{ url('public/assets/plugins/custom/datatables/datatables.bundle.css?v=7.0.6')}}" rel="stylesheet" type="text/css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
@endsection

@section('content')
<!--begin::Content-->
<!--begin::Pagination-->
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
<div class="card card-custom gutter-b">
   <div class="card-body">
        <!--begin: Search Form-->
        <!--begin::Search Form-->

<div class="">
    <div class="row align-items-center">
        <div class="col-lg-9 col-xl-8">
 <form action="{{ url('brand/influencers/view')}}" method="GET">
            
    <div class="row align-items-center">
            <div class="col-md-4 my-2 my-md-0 ">
                    <div class="d-flex align-items-center">
        <label class="mr-3 mb-0 d-none d-md-block">Location:</label>
                <select class="form-control" name="country" id="country" >
                    <option value="">Location</option>
                    @foreach($location as $location)
                    <option>{{ $location }}</option>
                    @endforeach
                </select>
                </div>
            </div>

            <div class="col-md-4 my-2 my-md-0 ">
            <div class="d-flex align-items-center">
        <label class="mr-3 mb-0 d-none d-md-block">Category:</label>
                <select class="form-control" name="maincategory" id="maincategory" >
                    <option value="">Category</option>
                    @foreach($category as $category)
                    <option>{{ $category }}</option>
                    @endforeach
                </select>
                </div>
            </div>

            <div class="col-md-4 my-2 my-md-0">
                <div class="d-flex align-items-center">
                <label class="mr-3 mb-0 d-none d-md-block">Gender:</label>
                <select class="form-control" name="gender" id="gender">
                    <option value="">Gender(both)</option>
                    @foreach($gender as $gender)
                    <option>{{ $gender }}</option>
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
</div>

<!--begin::Entry-->
    
<div class="container">
    @forelse($users as $user)
<div class="card card-custom gutter-b" >
    <div class="card-body">
        <!--begin::Top-->
        <div class="d-flex">
            <!--begin::Pic-->
            <div class="flex-shrink-0 mr-7">
                <div class="symbol symbol-50 symbol-lg-120">
                    @if($user->avatar)
                        <img src="{{url('public/uploads/avatars/'.$user->avatar)}}">
                        @else
                        <span class="font-size-h3 symbol-label font-weight-boldest">N/A</span>
                        @endif
                </div>
            </div>
            <!--end::Pic-->

            <!--begin: Info-->
            <div class="flex-grow-1">
                <!--begin::Title-->
                <div class="d-flex align-items-center justify-content-between flex-wrap mt-2">
                    <!--begin::User-->
                    <div class="mr-3">
                        <!--begin::Name-->
                        <a href="#" class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">
                            {{ $user->name }} <i class="flaticon2-correct text-success icon-md ml-2"></i>
                        </a>
                        <!--end::Name-->

                        <!--begin::Contacts-->
                        <div class="d-flex flex-wrap my-2">
                            <a href="#" class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
<i class="las la-transgender-alt text-info icon-lg"></i>{{ $user->gender }}
                            </a>
                            <a href="#" class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
<i class="las la-users text-info icon-lg"></i></i> {{ $user->maincategory }}
                            </a>
                            <a href="#" class="text-muted text-hover-primary font-weight-bold">
<i class="las la-map-marker text-info icon-lg"></i> {{ $user->country }}
                            </a>
                        </div>
                        <!--end::Contacts-->
                    </div>
                    <!--begin::User-->

                    <!--begin::Actions-->
                    <div class="my-lg-0 my-1 ">
                        <a href="{{ url('loft/'.$user->brandname)}}" class="btn btn-sm btn-light-primary font-weight-bolder text-uppercase mr-2">View Profile</a>
                        
                        <a data-toggle="modal" data-target="#addtolist{{$user->id}}" class="btn btn-sm font-weight-bolder text-uppercase  btn-primary"><strong>Add to list</strong></a>
                        
                    </div>
                    <!--end::Actions-->
                </div>
                <!--end::Title-->

                <!--begin::Content-->
                <div class="d-flex align-items-center flex-wrap justify-content-between">
                    <!--begin::Description-->
                    <div class="flex-grow-1 font-weight-bold text-dark-50 py-2 py-lg-2 mr-5">
                        {{ $user->bio }}
                    </div>
                    <!--end::Description-->
                    <!--begin::Progress-->
                    @if($user->morecategory)
<div class="d-flex align-items-center flex-wrap justify-content-between">
<div class="d-flex flex-column text-dark-75">
            <span class="font-weight-bolder font-size-sm">Interests : </span></div>
  @foreach(json_decode($user->morecategory) as $cate)
   <span class="label label-info label-inline mr-2"> {{ $cate }}</span>
  @endforeach

                    </div>
                    @else
                    @endif
                    <!--end::Progress-->

                    
                </div>
                <!--end::Content-->
            </div>
            <!--end::Info-->
        </div>
        <!--end::Top-->
        <!--begin::Separator-->
        <div class="separator separator-solid my-7"></div>
        <!--end::Separator-->
        <div class="d-flex align-items-center flex-wrap">
        <!--begin::Bottom-->
        @foreach($user->platform as $uplat)
        @if($uplat->platform == 'Twitter')
        
            <!--begin: Item-->
            <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                <span class="mr-4">
                    <i class="socicon-twitter text-primary icon-2x"></i>
                </span>
                <div class="d-flex flex-column text-dark-75">
                    <span class="font-weight-bolder font-size-sm">Followers</span>
                    <span class="font-weight-bolder font-size-h5">{{ thousandsCurrencyFormat($uplat->followers)}}</span>
                </div>
            </div>
        
            <!--end: Item-->
            @endif

        @if($uplat->platform == 'Instagram')
        
            <!--begin: Item-->
            <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                <span class="mr-4">
                    <i class="socicon-instagram text-danger icon-2x"></i>
                </span>
                <div class="d-flex flex-column text-dark-75">
                    <span class="font-weight-bolder font-size-sm">Followers</span>
                    <span class="font-weight-bolder font-size-h5">{{ thousandsCurrencyFormat($uplat->followers)}}</span>
                </div>
            </div>
       
            <!--end: Item-->
            @endif
            @if($uplat->platform == 'Tiktok')
       
            <!--begin: Item-->
            <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                <span class="mr-4">
                    <i class="fab fa-tiktok text-danger icon-2x"></i>
                </span>
                <div class="d-flex flex-column text-dark-75">
                    <span class="font-weight-bolder font-size-sm">Followers</span>
                    <span class="font-weight-bolder font-size-h5">{{ thousandsCurrencyFormat($uplat->followers)}}</span>
                </div>
            </div>
       
            <!--end: Item-->
            @endif
            @endforeach
            <!--begin: Item-->
            <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                <span class="mr-4">
                    <i class="flaticon-calendar-1 icon-2x text-muted font-weight-bold"></i>
                </span>
                <div class="d-flex flex-column flex-lg-fill">
                    <span class="text-dark-75 font-weight-bolder font-size-sm">Done Tasks</span>{{$user->proposal->where('is_complete', 1)->count()}}
                </div>
            </div>
            <!--end: Item-->

            
            </div>

            </div>
        </div>
        <!--end::Bottom-->
   <!-- Modal platform-->
                        <div class="modal fade" id="addtolist{{$user->id}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    
                                    
                                        <h5 class="modal-title" id="exampleModalLabel"><i>Add</i>  {{$user->name}} <i>to</i></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i aria-hidden="true" class="ki ki-close"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
@if($listnames->count())
<form action="{{ route('myinfluencerspost')}}" method="post" id="platform">
@csrf
<input type="hidden" name="uid" id="uid" value="{{$user->id }}">


<div class="form-group">
<label>Select list</label>
<div class="input-group">
<div class="input-group-prepend">

</div>

<select name="listname" class="form-control form-control-solid form-control-lg" >
<option hidden value="Select">Select list</option>
                        @foreach ($listnames as $list) 
                        {
            <option value="{{$list->id}}">{{$list->listname}}</option>
                        }
                        @endforeach
</select>

</div>
</div>

</div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary font-weight-bold">Add Now</button>
                                        </form>
                                        
@else
<h3>You have not created any list, go to Influecers>My list on the menu to start.</h3>
@endif                        
                        
                                    </div>
                                </div>
                            </div>
                        </div>

@empty
    <div class="container">
        <div class="card card-custom gutter-b">
    <div class="card-body">
            <h2>No result found, try a different combination.</h2>
        </div>
        </div>
    </div>
@endforelse
<!--end::Card-->





                {{ $users->links('vendor.pagination.default')}}
<!--end::Pagination-->
</div>
</div>
</div>
</div>





@endsection

@section('footer')

@livewireScripts

@endsection