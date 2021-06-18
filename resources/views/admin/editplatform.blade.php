@extends('layouts.app5')

@section('title')
Campaign
@parent
@stop

@section('bread1', 'Campaign')
@section('bread2', 'All Campaign')

@section('head')

@endsection

@section('actions')
<!--begin::Toolbar-->
 <a href="" class="btn btn-transparent-white font-weight-bold  py-3 px-6 mr-2">
    <i class="la la-plus"></i>Campaign</a>
        
        <!--end::Toolbar-->
@endsection


@section('content')
<div class="container">
	@if ($errors->any())
      <div class="alert alert-custom alert-warning fade show" role="alert">
    <div class="alert-icon"><i class="flaticon-warning"></i></div>
    <div class="alert-text">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </div>
    <div class="alert-close">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="ki ki-close"></i></span>
        </button>
    </div>
</div>
@endif
            <!--alert message-->
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
	<div class="card">
		<div class="card-body">
<form action="{{ url('admin/platform/'.$platform->id.'/edit')}}" method="post" id="platform">
@csrf
<h3>{{$platform->user->brandname}}'s platform</h3>


<div class="form-group">
<label>Platform</label>
<div class="input-group">
<div class="input-group-prepend">

</div>
<select name="platform" class="form-control form-control-solid form-control-lg" >
	<option value="{{$platform->platform}}">{{$platform->platform}}</option>
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
<input type="text" name="username" id="username" value="{{$platform->handle}}"  class="form-control" aria-label=""/>
</div>
</div>

<div class="form-group">
<label>Followers</label>
<div class="input-group">
<div class="input-group-prepend">

</div>
<input type="text" name="followers" id="followers" value="{{$platform->followers}}"  class="form-control" aria-label=""/>
</div>
</div>

<div class="form-group">
<label>Following</label>
<div class="input-group">
<div class="input-group-prepend">

</div>
<input type="text" name="following" id="following" value="{{$platform->members}}"  class="form-control" aria-label=""/>
</div>
</div>

<div class="form-group">
<label>Join Date</label>
<div class="input-group">
<div class="input-group-prepend">

</div>
<input type="text" name="date" class="form-control" readonly  value="{{$platform->startdate}}" id="kt_datepicker_3"/>
</div>
</div>

<div class="form-group">
<label>Category</label>
<div class="input-group">
<div class="input-group-prepend">

</div>
<select name="category" class="form-control form-control-solid form-control-lg" >
<option hidden value="{{$platform->category}}">{{$platform->category}}</option>
                        @foreach ($niche as $niche) 
                        {
            <option value="{{ $niche->niche }}">{{ $niche->niche }}</option>
                        }
                        @endforeach
</select>
</div>
</div>

<div class="form-group">
<label>Verification</label>
<div class="input-group">
<div class="input-group-prepend">

</div>
<select name="verify" class="form-control form-control-solid form-control-lg" >
	<option value="{{$platform->is_verify}}">{{$platform->is_verify}}</option>
	<option value="0">New(0)</option>
    <option value="1">Verified(1)</option>
    <option value="2">Rejected(2)</option>
    
</select>
</div>
</div>

</div>
                                    <div class="modal-footer">
                                        
                                        <button type="submit" class="btn btn-primary font-weight-bold">Update !</button>
                                        </form>
                          </div>
                      </div>
</div>


<div class="card card-custom gutter-b">
    <!--begin::Header-->
    <div class="card-header border-0 py-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bolder text-dark">Services</span>
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
                        
                        
                        <th style="min-width: 140px">Service</th>
                        <th style="min-width: 110px">Price</th>
                        <th style="min-width: 300px">Description</th>
                        <th class="pr-0 text-right" style="min-width: 100px">action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($platform->platformservice as $ps)
                    <tr>
                        
                        <td class="pl-0">
                            <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$ps->service}}</a>
                            <span class="text-muted font-weight-bold text-muted d-block"></span>
                        </td>
                        <td >
                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">
                               ₦ {{number_format($ps->price)}}
                            </span>
                            <span class="text-muted font-weight-bold">
                                
                            </span>
                        </td>
                        <td>
                            <span class="text-dark-50 font-weight-normal font-size-sm">{{$ps->description}}</span>
                        </td>
                        <td class="pr-0 text-right">
                            <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3"><i class="fas fa-edit"></i> </a>
                            <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                @empty
                <tr>
                <h4>No Service yet</h4>
                </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <!--end::Table-->
    </div>
    <!--end::Body-->
</div>
</div>
</div>

@endsection



@section('footer')
<script src="{{ url('public/assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js?v=7.0')}}"></script>
<script src="{{ url('public/assets/js/pages/crud/forms/platform.js')}}"></script>

@endsection