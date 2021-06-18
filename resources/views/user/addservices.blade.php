@extends('layouts.app5')

@section('title')
Add Services
@parent
@stop

@section('bread1', 'My Services')
@section('bread2', 'Add Services/View Services')

@section('head')

@endsection

@section('actions')
<!--begin::Toolbar-->

                

                <div class="dropdown dropdown-inline ml-2" data-toggle="tooltip" title="" data-placement="top">
                    <a href="#" class="btn btn-white font-weight-bold py-3 px-6" data-toggle="modal" data-target="#post" class="navi-link">
                    <i class="la la-plus"></i>Add Services
                </a>
                </div>
                <!--end::Dropdown-->
        
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
<div class="alert alert-custom alert-white alert-shadow fade show gutter-b" role="alert">
    <div class="alert-icon">
        <span class="svg-icon svg-icon-primary svg-icon-xl"><!--begin::Svg Icon | path:assets/media/svg/icons/Tools/Compass.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M7.07744993,12.3040451 C7.72444571,13.0716094 8.54044565,13.6920474 9.46808594,14.1079953 L5,23 L4.5,18 L7.07744993,12.3040451 Z M14.5865511,14.2597864 C15.5319561,13.9019016 16.375416,13.3366121 17.0614026,12.6194459 L19.5,18 L19,23 L14.5865511,14.2597864 Z M12,3.55271368e-14 C12.8284271,3.53749572e-14 13.5,0.671572875 13.5,1.5 L13.5,4 L10.5,4 L10.5,1.5 C10.5,0.671572875 11.1715729,3.56793164e-14 12,3.55271368e-14 Z" fill="#000000" opacity="0.3"/>
        <path d="M12,10 C13.1045695,10 14,9.1045695 14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 C10,9.1045695 10.8954305,10 12,10 Z M12,13 C9.23857625,13 7,10.7614237 7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 C17,10.7614237 14.7614237,13 12,13 Z" fill="#000000" fill-rule="nonzero"/>
    </g>
</svg><!--end::Svg Icon--></span>   </div>

<div class="alert-text"><h4>Add Serives for: {{ $platform->platform}} <span class="opacity-70"><i class="fas fa-at text-dark"></i>{{ $platform->handle}}</span></h4></div>
</div>
</div>
<!--end::Notice-->


<!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class=" container ">
                            <!--begin::Advance Table Widget 1-->
<div class="card card-custom gutter-b">
    <!--begin::Header-->
    <div class="card-header border-0 py-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bolder text-dark">Your Services</span>
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
                    @forelse ($platformservices as $ps)
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
                            
                            <a data-toggle="modal" data-target="#deleteservice{{$ps->id}}" class="btn btn-icon btn-light btn-hover-primary btn-sm"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>

                    <div class="modal fade" id="deleteservice{{$ps->id}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">This action cannot be reversed!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                
                You are about to delete the <b>{{$ps->service}}</b> service, do you want to process?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">No</button>
                <form action="{{ url('add-services/'.$platform->id.'/delete')}}" method="post">
                  @csrf
                  @method('DELETE')
                  <input type="hidden" name="theid" value="{{$ps->id}}">
                  <button class="btn btn-primary font-weight-bold" type="submit"><span class="navi-text">
                <span class="">Yes!</span>
            </span></button>
                </form>
            </div>
        </div>
    </div>
</div>
                @empty
                <tr>
                <h4>No Service yet</h4>
                </tr>

                @endforelse
                <!-- Modal-->

                </tbody>
            </table>
        </div>
        <!--end::Table-->
    </div>
    <!--end::Body-->
</div>
<!--end::Advance Table Widget 1-->


</div>
</div>
</div>
</div>
</div>
<!--end::Card-->




<!-- Modal instagram-->
                        <div class="modal fade" id="post" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    
                                    
                                        <h5 class="modal-title" id="exampleModalLabel">Enter your cost per post. Note that 20% will be deduted as processing fee. </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i aria-hidden="true" class="ki ki-close"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
<form action="{{ url('add-services/'.$platform->id)}}" method="post" id="addservices">
@csrf
<input type="hidden" name="platform_id" id="platform_id" value="{{ $platform->id}}">


<div class="form-group">
<label>Select Service</label>
<div class="input-group">
</div>
<select name="service" class="form-control form-control-solid" >
    
                        @foreach ($service as $ser) 
                        {
            <option value="{{ $ser->service }}">{{ $ser->service}}</option>
                        }
                        @endforeach
                                </select>

</div>                  
<div class="form-group">
<label>Starting price</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">₦</span>
</div>
<input type="text" name="price" id="price" value=""  class="form-control" aria-label=""/>
</div>
</div>
<div class="form-group">
<label>Brief Service Description</label>
<div class="input-group">
<textarea class="form-control" rows="3" value="" name="description" id=""></textarea>
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
<script src="{{ url('public/assets/js/pages/widgets.js?v=7.0.6')}}"></script>
<script src="{{ url('public/assets/js/pages/crud/ktdatatable/base/html-table.js?v=7.0.6')}}"></script>
<script src="{{ url('public/assets/js/pages/crud/forms/addservices.js')}}"></script>
@endsection