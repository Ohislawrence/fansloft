@extends('layouts.app5')

@section('title')
My Influencers List
@parent
@stop

@section('bread1', 'Influencers List')
@section('bread2', 'Lists')


@section('head')


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


<!--begin::Advance Table Widget 3-->
<div class="card card-custom gutter-b">
    <!--begin::Header-->
    <div class="card-header border-0 py-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bolder text-dark">My Influencer List</span>
            <span class="text-muted mt-3 font-weight-bold font-size-sm">Organise your influencers into lists</span>
        </h3>
        <div class="card-toolbar">
            <a data-toggle="modal" data-target="#newlist" class="btn btn-success font-weight-bolder font-size-sm"><span class="svg-icon svg-icon-md svg-icon-white"><!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
        <path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
    </g>
</svg><!--end::Svg Icon--></span>Create New List</a>
        </div>
    </div>
    <!--end::Header-->

    <!--begin::Body-->
    <div class="card-body pt-0 pb-3">
        <!--begin::Table-->
        <div class="table-responsive">
            <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                <thead>
                    <tr class="text-uppercase">
                        <th style="min-width: 200px" class="pl-7"><span class="text-dark-75">List Name</span></th>
                        
                        <th style="min-width: 50px">Members</th>
                        <th style="min-width: 100px"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($listnames as $list)
                    <tr>
                        <td class="pl-0 py-8">
                            <div class="d-flex align-items-center">
                                <div>
                                    <a href="{{url('brand/list/'.$list->id.'/myinfluencers')}}" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$list->listname}}</a>
                                    <span class="text-muted font-weight-bold d-block"><a href="{{url('brand/list/'.$list->id.'/myinfluencers')}}">View members</a></span>
                                </div>
                            </div>
                        </td>
                        
                        <td>
                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">
                                 {{number_format($list->listmember->count())}}
                            </span>
                            <span class="text-muted font-weight-bold">
                                Members
                            </span>
                        </td>
                        <td class="text-right pr-0">
                            
                            <a data-toggle="modal" data-target="#platform{{$list->id}}" class="btn btn-primary btn-sm">
                                Send Campaign
                            </a>
                        </td>
                    </tr>

<!-- Modal platform-->
                        <div class="modal fade" id="platform{{$list->id}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    
                                    
                                        <h5 class="modal-title" id="exampleModalLabel"><i>Send campaign to members of</i> {{$list->listname}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i aria-hidden="true" class="ki ki-close"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
<form action="{{ url('brand/list/view')}}" method="post" id="platform">
@csrf
<input type="hidden" name="uid" id="uid" value="{{ Auth::user()->id }}">


<div class="form-group">
<label>Select Campaign</label>
<div class="input-group">
<div class="input-group-prepend">

</div>
<select name="listname" class="form-control form-control-solid form-control-lg" >
<option hidden value="Select">Select Campaign</option>
                        @foreach ($campaign as $camp) 
                        {
            <option value="{{ $camp->campaign_name }}">{{ $camp->campaign_name }}</option>
                        }
                        @endforeach
</select>
</div>
</div>

<div class="form-group">
<label>Add Note <i class="text-muted">(optional)</i></label>
<div class="input-group">
<div class="input-group-prepend">

</div>
<textarea name="platform" rows="4" class="form-control form-control-solid form-control-lg" >
    
</textarea>
</div>
</div>

</div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary font-weight-bold">Send Now</button>
                                        </form>
                                        
                        
                        
                                    </div>
                                </div>
                            </div>
                        </div>

@empty
@endforelse
                   
                </tbody>
            </table>
        </div>
        <!--end::Table-->
    </div>
    <!--end::Body-->
</div>
<!--end::Advance Table Widget 3-->






                       



<!-- Modal platform-->

<div class="modal fade" id="newlist" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                                    
                                    
                <h5 class="modal-title" id="exampleModalLabel">Create a new list</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">

<form method="post" action="{{url('brand/list/view')}}">
    @csrf
<input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
<div class="form-group">
<label>List Name</label>
<div class="input-group">
<div class="input-group-prepend">
</div>
<input type="text" name="listname" value=""  class="form-control" aria-label=""/>
 @error('listname') <span class="text-danger error">{{ $message }}</span>@enderror
</div>
</div>


</div>
    <div class="modal-footer">
        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary font-weight-bold" close-modal>Add Now</button>
    </div>
        </div>
            </div>
                </div>

</form>
</div>
</div>
@endsection

@section('footer')



@endsection