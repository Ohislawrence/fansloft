@extends('layouts.app5')

@section('title')
{{$user->name}}
@parent
@stop

@section('bread1', 'Fansloft Creator')
@section('bread2', '')

@section('head')

@endsection

@section('actions')
@guest
<a href="{{url('login')}}" class="btn btn-transparent-white font-weight-bold  py-3 px-6 mr-2" data-placement="top"><i class="fas fa-sign-in-alt"></i>Sign in</a>
@else
	@if(Auth::user()->role == 'creator')
<a href="{{url('creator/profile')}}" class="btn btn-transparent-white font-weight-bold  py-3 px-6 mr-2" data-placement="top">
                    <i class="fas fa-edit"></i>Update Profile
                </a>
    @endif
@endguest
        
       
@endsection
 

@section('content')
<div class="container">
 
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
        <!--begin::Top-->
        <div class="d-flex">
            <!--begin::Pic-->
            <div class="flex-shrink-0 mr-7">
                <div class="symbol symbol-50 symbol-lg-120">
                    
                        <img src="{{url('public/uploads/avatars/'.$user->avatar)}}">
                        
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
                    @guest
                    <!-- AddToAny BEGIN -->
        <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
            <strong>Share Profile</strong>
        <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
        </div>
        <script async src="https://static.addtoany.com/menu/page.js"></script>
        <!-- AddToAny END -->

                    @else
                    @if(Auth::user()->role == 'brand')
                    <a data-toggle="modal" data-target="#addtolist{{$user->id}}" class="btn btn-sm font-weight-bolder text-uppercase  btn-primary"><strong>Add to list</strong></a>
                    @else

        <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
            <strong>Share Profile</strong>
        <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
        </div>
        <script async src="https://static.addtoany.com/menu/page.js"></script>
        <!-- AddToAny END -->
                    @endif

                    @endguest
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
   <span class="label label-info label-inline mr-2">{{ $cate }}</span>
  @endforeach

                    </div>
                    <!--end::Progress-->
                    @else
                    @endif
                    
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
                    <i class="fab fa-tiktok text-dark icon-2x"></i>
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
                    <span class="text-dark-75 font-weight-bolder font-size-sm">Done Tasks</span>
                    {{$user->proposal->where('is_complete', 1)->count()}}
                </div>
            </div>
            <!--end: Item-->

            
            </div>

            </div>
        </div>
        <!--end::Bottom-->

        <!--second segment-->
        <!--begin::Column-->

        

@forelse($platform->where('is_verify', 1) as $platform)

<div class="card card-custom gutter-b">
    <!--begin::Header-->
    <div class="card-header border-0 py-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bolder text-dark">{{ $user->name }}'s {{$platform->platform}} services</span>
            <span class="text-muted mt-3 font-weight-bold font-size-sm"></span>
        </h3>
        
    </div>
    <!--end::Header-->

    <!--begin::Body-->
    <div class="card-body py-0">
        <!--begin::Table-->
        <div class="table-responsive">
            <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_1">
                <thead>
                    <tr class="text-left">
                        
                        <th></th>
                        <th style="min-width: 140px">Service</th>
                        <th style="min-width: 100px">Price</th>
                        <th style="min-width: 300px">Description</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @forelse($platform->platformservice as $pps)
                    <tr>
                        <td class="pl-0">
                            @if($platform->platform == 'Twitter')                                      
                 <i class="socicon-twitter text-primary"></i>
                @elseif($platform->platform == 'Instagram')
                <i class="socicon-instagram text-danger"></i>
                @elseif($platform->platform == 'Tiktok')
                <i class="fab fa-tiktok text-dark"></i>
                @endif
                        </td>
                        <td class="pl-0">
                            <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$pps->service}}</a>
                            <span class="text-muted font-weight-bold text-muted d-block"></span>
                        </td>
                        <td >
                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">
                               ₦ {{number_format($pps->price)}}
                            </span>
                            <span class="text-muted font-weight-bold">
                                
                            </span>
                        </td>
                        <td>
                            <span class="text-dark-50 font-weight-normal font-size-sm">{{$pps->description}}</span>
                        </td>
                        
                    </tr>
                @empty
                <tr>
                <h4>No Service added</h4>
                </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <!--end::Table-->

    </div>
    <!--end::Body-->
</div>
<!--end::Advance Table Widget 1-->
@empty
            
        @endforelse


</div>
</div>
</div>
</div>
</div>
<!--end::Card-->
    </div>
            <!--end::Body-->
        </div>
    <!--end::Column-->

</div>
</div>
</div>
@guest

@else
@if(Auth::user()->role == 'brand')
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
            <option value="{{ $list->id }}">{{ $list->listname }}</option>
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
@endif
@endguest
@endsection


@section('footer')
<script src="{{ url('public/assets/js/pages/widgets.js?v=7.0.6')}}"></script>
@endsection