@extends('layouts.app5')

@section('title')
Update Platforms
@parent
@stop

@section('bread1', 'Platform')
@section('bread2', 'Update Platform')

@section('head')

@endsection

@section('actions')

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

<div class="card card-custom gutter-b">
    <!--begin::Header-->
    <div class="card-header border-0 py-5">
           <h3 class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bolder text-dark">Update Platform Info for <i class="fa fa-at text-dark"></i>{{$platform->handle}} on {{$platform->platform}}</span>
            <span class="text-muted mt-3 font-weight-bold font-size-sm"></span>
        </h3>
             </div>
             <div class="card-body py-0">
                                    
<form action="{{ url('update/'.$platform->id.'/platform')}}" method="post" id="platform">
@csrf


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

</div>
                                    <div class="modal-footer">
                                        
                                        <button type="submit" class="btn btn-primary font-weight-bold">Update</button>
                                        </form>
                                        
                        
                        
                                    </div>
                                </div>
                            </div>
                        
</div>
</div>
</div>
@endsection

@section('footer')
<script src="{{ url('public/assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js?v=7.0')}}"></script>
<script src="{{ url('public/assets/js/pages/crud/forms/platform.js')}}"></script>
@endsection