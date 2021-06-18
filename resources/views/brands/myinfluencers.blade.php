@extends('layouts.app5')

@section('title')
My Influencers
@parent
@stop

@section('bread1')
'{{$listnames->listname}}' List ({{$listnames->listmember->count()}})
@endsection

@section('bread2', 'members')


@section('head')

<link href="{{ url('public/assets/plugins/custom/datatables/datatables.bundle.css?v=7.0.6')}}" rel="stylesheet" type="text/css"/>

@endsection

@section('content')


<div class="container">
<div class="alert alert-success alert-block" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong class="success-msg"></strong>
                </div>
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

    @forelse($listnames->listmember as $user)
<div class="card card-custom gutter-b" >
    <div class="card-body">
        <!--begin::Top-->
        <div class="d-flex">
            <!--begin::Pic-->
            <div class="flex-shrink-0 mr-7">
                <div class="symbol symbol-50 symbol-lg-120">
                    @if($user->user->avatar)
                        <img src="{{url('public/uploads/avatars/'.$user->user->avatar)}}">
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
                            {{ $user->user->name }} <i class="flaticon2-correct text-success icon-md ml-2"></i>
                        </a>
                        <!--end::Name-->

                        <!--begin::Contacts-->
                        <div class="d-flex flex-wrap my-2">
                            <a href="#" class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
<i class="las la-transgender-alt text-info icon-lg"></i>{{ $user->user->gender }}
                            </a>
                            <a href="#" class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
<i class="las la-users text-info icon-lg"></i></i> {{ $user->user->maincategory }}
                            </a>
                            <a href="#" class="text-muted text-hover-primary font-weight-bold">
<i class="las la-map-marker text-info icon-lg"></i> {{ $user->user->country }}
                            </a>
                        </div>
                        <!--end::Contacts-->
                    </div>
                    <!--begin::User-->

                    <!--begin::Actions-->
                    <div class="my-lg-0 my-1 ">
                        <a href="{{ url('loft/'.$user->user->brandname)}}" class="btn btn-sm btn-light-primary font-weight-bolder text-uppercase mr-2">View Profile</a>
                        
                    </div>
                    <!--end::Actions-->
                </div>
                <!--end::Title-->

                <!--begin::Content-->
                <div class="d-flex align-items-center flex-wrap justify-content-between">
                    <!--begin::Description-->
                    <div class="flex-grow-1 font-weight-bold text-dark-50 py-2 py-lg-2 mr-5">
                        {{ $user->user->bio }}
                    </div>
                    <!--end::Description-->
                    <!--begin::Progress-->
                    @if($user->user->morecategory)
<div class="d-flex align-items-center flex-wrap justify-content-between">
<div class="d-flex flex-column text-dark-75">
            <span class="font-weight-bolder font-size-sm">Interests : </span></div>
  @foreach(json_decode($user->user->morecategory) as $cate)
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
        @foreach($user->user->platform as $uplat)
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
                    <span class="text-dark-75 font-weight-bolder font-size-sm">Done Tasks</span>{{$user->user->proposal->where('is_complete', 1)->count()}}
                </div>
            </div>
            <!--end: Item-->

            
            </div>

            </div>
        </div>




@empty
    <div class="container">
        <div class="card card-custom gutter-b">
    <div class="card-body">
            <h2>No members in this list, go to <a href="{{url('/brand/influencers/view')}}">Marketplace</a> to add members</h2>
        </div>
        </div>
    </div>
@endforelse

</div>
</div>



@endsection


@section('footer')


@endsection