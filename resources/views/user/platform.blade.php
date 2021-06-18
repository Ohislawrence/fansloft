@extends('layouts.app5')

@section('title')
Platforms
@parent
@stop

@section('bread1', 'Platform')
@section('bread2', 'My Platforms')

@section('head')
@endsection

@section('actions')
<!--begin::Toolbar-->

                

                <a data-toggle="modal" data-target="#platform" class="btn btn-transparent-white font-weight-bold  py-3 px-6 mr-2">
                    <i class="la la-plus"></i>Add Platform
                </a>
        
        <!--end::Toolbar-->
@endsection
 


@section('content')             
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
    
<div class="d-flex flex-column-fluid">
    <div class=" container ">
    <div class="row">
    

    



    <!--begin::Column-->
    @forelse($platform as $platforms)
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
        <div class="card card-custom gutter-b card-stretch">
            <!--begin::Body-->
            <div class="card-body text-center pt-4">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end">
                    <div class="dropdown dropdown-inline" data-toggle="tooltip"  data-placement="left">
                        <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ki ki-bold-more-hor"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                            <!--begin::Navigation-->

<ul class="navi navi-hover">
    <li class="navi-header font-weight-bold py-4">
        <span class="font-size-lg">Choose:</span>
        <i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="Click to learn more..."></i>
    </li>
    <li class="navi-separator mb-3 opacity-70"></li>
    <li class="navi-item">
        <a href="{{ url('update/'.$platforms->id.'/platform')}}" class="navi-link">
            <span class="navi-text">
                <span class="navi-icon"><i class="flaticon2-refresh"></i></span><span class="">Update</span>
            </span>
        </a>
    </li>
    <li class="navi-item">
        <a data-toggle="modal" data-target="#deletethis{{$platforms->id}}" class="navi-link">
            <span class="navi-text">
                <span class="navi-icon"><i class="flaticon2-delete"></i></span><span class="">Remove</span>
            </span>
        </a>
    </li>
    
</ul>
<!--end::Navigation-->
                        </div>
                    </div>
                </div>
                <!--end::Toolbar-->
<!-- Modal-->
<div class="modal fade" id="deletethis{{$platforms->id}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">This action cannot be reversed!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                
                You are about to remove your {{$platforms->platform}}@ {{$platforms->handle}} platform.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cancel</button>
                <form action="{{ url('user-platform/delete/'.$platforms->id)}}" method="post">
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

                <!--begin::User-->
                <div class="mt-7">
                    <div class="symbol symbol-circle symbol-lg-90">
                @if($platforms->platform == 'Twitter')                                      
                 <i class="socicon-twitter text-primary icon-4x"></i>
                @elseif($platforms->platform == 'Instagram')
                <i class="socicon-instagram text-danger icon-4x"></i>
                @elseif($platforms->platform == 'Tiktok')
                <i class="fab fa-tiktok text-dark icon-5x"></i>
                @endif
                        
                    </div>
                </div>
                <!--end::User-->

                <!--begin::Name-->
                <div class="my-4">
                    <a href="#" class="text-dark font-weight-bold text-hover-primary font-size-h4"><i class="fas fa-at text-dark"></i>{{$platforms->handle}}</a>
                </div>
                <!--end::Name-->
                @if($platforms->is_verify == 1)
                <span class="btn btn-text btn-light-success btn-sm font-weight-bold">Verified</span>
                @elseif($platforms->is_verify == 2)
                <span class="btn btn-text btn-light-warning btn-sm font-weight-bold">Rejected</span>
                @else
                <span class="btn btn-text btn-light-primary btn-sm font-weight-bold">Under Review</span>
                @endif
                <div class="my-4">
                <div class="d-flex justify-content-center">
                    
                <div class="row">
                <div class="pr-5">
                    <h4>
                    {{thousandsCurrencyFormat($platforms->followers)}}
                    <span class="d-block text-muted pt-2 font-size-sm">Followers</span>
                    </h4>
                </div>
                
                <div class="pl-5">
                    <h4>
                    {{$platforms->category}}
                    
                    <span class="d-block text-muted pt-2 font-size-sm">Category</span>
                    </h4>
                </div>
                </div>
                </div>
            </div>
                <!--begin::Buttons-->
                <div class="mt-9">
                    <a href="{{ url('add-services/'.$platforms->id)}}" class="btn btn-light-primary font-weight-bolder btn-sm py-3 px-6 text-uppercase">Add/View Services </a>
                </div>
                <!--end::Buttons-->
            </div>
        </div>
    </div>
           
        <!--end::Card-->

        

        @empty
        <div class="col-xl-12">
        <!--begin::Notice-->
<div class="alert alert-custom alert-white alert-shadow fade show gutter-b" role="alert">
    <div class="alert-icon">
        <span class="svg-icon svg-icon-primary svg-icon-xl"><!--begin::Svg Icon | path:assets/media/svg/icons/Tools/Compass.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M7.07744993,12.3040451 C7.72444571,13.0716094 8.54044565,13.6920474 9.46808594,14.1079953 L5,23 L4.5,18 L7.07744993,12.3040451 Z M14.5865511,14.2597864 C15.5319561,13.9019016 16.375416,13.3366121 17.0614026,12.6194459 L19.5,18 L19,23 L14.5865511,14.2597864 Z M12,3.55271368e-14 C12.8284271,3.53749572e-14 13.5,0.671572875 13.5,1.5 L13.5,4 L10.5,4 L10.5,1.5 C10.5,0.671572875 11.1715729,3.56793164e-14 12,3.55271368e-14 Z" fill="#000000" opacity="0.3"/>
        <path d="M12,10 C13.1045695,10 14,9.1045695 14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 C10,9.1045695 10.8954305,10 12,10 Z M12,13 C9.23857625,13 7,10.7614237 7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 C17,10.7614237 14.7614237,13 12,13 Z" fill="#000000" fill-rule="nonzero"/>
    </g>
</svg><!--end::Svg Icon--></span>   </div>

<div class="">
<h3>Your platforms will be shown here</h3>
<p>
    Platforms are your social media accounts, to add a new platform, click the 'Add Platforn' button at the top of this message. Your platform will be manually vetted before brands can see it, to avoid being rejected, use only your social media account.
</p>
</div>    
</div>
</div>

<!--end::Notice-->
        @endforelse
    </div>
            <!--end::Body-->
        </div>
    <!--end::Column-->
    </div>
</div>
</div>





<!-- Modal platform-->
                        <div class="modal fade" id="platform" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    
                                    
                                        <h5 class="modal-title" id="exampleModalLabel">Add a new platform</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i aria-hidden="true" class="ki ki-close"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
<form action="{{ url('user-platform')}}" method="post" id="platform">
@csrf
<input type="hidden" name="uid" id="uid" value="{{ Auth::user()->id }}">


<div class="form-group">
<label>Platform</label>
<div class="input-group">
<div class="input-group-prepend">

</div>
<select name="platform" class="form-control form-control-solid form-control-lg" >
    <option value="Twitter">Twitter <i class="socicon-twitter"></i></option>
    <option value="Instagram">Instagram</option>
    <option value="Tiktok">Tiktok</option>
</select>
</div>
</div>
                    
<div class="form-group">
<label>Username</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">@</span>
</div>
<input type="text" name="username" id="username" value=""  class="form-control" aria-label=""/>
</div>
</div>

<div class="form-group">
<label>Followers</label>
<div class="input-group">
<div class="input-group-prepend">

</div>
<input type="text" name="followers" id="followers" value=""  class="form-control" aria-label=""/>
</div>
</div>

<div class="form-group">
<label>Following</label>
<div class="input-group">
<div class="input-group-prepend">

</div>
<input type="text" name="following" id="following" value=""  class="form-control" aria-label=""/>
</div>
</div>

<div class="form-group">
<label>Join Date</label>
<div class="input-group">
<div class="input-group-prepend">

</div>
<input type="text" name="date" class="form-control" readonly  value="{{ date("m/d/y") }}" id="kt_datepicker_3"/>
</div>
</div>

<div class="form-group">
<label>Category</label>
<div class="input-group">
<div class="input-group-prepend">

</div>
<select name="category" class="form-control form-control-solid form-control-lg" >
<option hidden value="Select">Choose Category</option>
                        @foreach ($niche as $niche) 
                        {
            <option value="{{ $niche->niche }}">{{ $niche->niche }}</option>
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
                                        
                        
                        
                                    </div>
                                </div>
                            </div>
                        </div>



@endsection

@section('footer')
<script src="{{ url('public/assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js?v=7.0')}}"></script>
<script src="{{ url('public/assets/js/pages/crud/forms/platform.js')}}"></script>
@endsection