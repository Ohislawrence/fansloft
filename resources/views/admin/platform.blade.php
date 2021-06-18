@extends('layouts.app5')

@section('title')
Platform
@parent
@stop

@section('bread1', 'Platform')
@section('bread2', 'All Platforms')

@section('head')

@endsection

@section('actions')
<!--begin::Toolbar-->
 <a href="" class="btn btn-transparent-white font-weight-bold  py-3 px-6 mr-2">
    <i class="la la-plus"></i>Add user Platforms</a>
        
        <!--end::Toolbar-->
@endsection


@section('content')
<div class="container">
	<div class="card">
		<div class="card-body">
		<!--begin: Datatable-->

		<table class="table table-bordered table-hover table-checkable" id="kt_datatable" style="margin-top: 13px !important">
			                    <thead>
                              <tr>
                                              <th>ID</th>
                                              <th>Platform</th>
                                              <th>Owner</th>
                                              <th>Handle</th>
                                              <th>Followers</th>
                                              <th>Following</th>
                                              <th>Approved?</th>
                                              <th>Category</th>
                                              <th>Join date</th>
                                              <th>Posted</th>
                                              <th>Actions</th>
                                  </tr>
                    </thead>

                        <tbody>
                        	@forelse($platform as $platforms)
                            <tr>
                                              <td>{{$platforms->id}}</td>
                                              <td>{{$platforms->platform}}</td>
                                              <td><a href="{{url('loft/'.$platforms->user->brandname)}}" target="_blank" >{{$platforms->user->brandname}}</a></td>
                                              <td>@ {{ucfirst($platforms->handle)}}</td>
                                              <td>{{number_format($platforms->followers)}}</td>
                                              <td>{{number_format($platforms->members)}}</td>
                                              <td>
                                                @if($platforms->is_verify == 1)
                                                Approved
                                                @elseif($platforms->is_verify == 0)
                                                Pending
                                                @else
                                                Rejected
                                              @endif</td>
                                              <td>{{$platforms->category}}</td>
                                              <td>{{$platforms->startdate}}</td>
                                              <td>{{$platforms->created_at}}</td>
                                              <td><a href="{{url('admin/platform/'.$platforms->id.'/edit')}}" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3"><i class="fa fa-edit"></i></a></td>
                                  </tr>
                            @empty
                            <tr>No campaign</tr>
                            @endforelse
                              </tbody>
                          </table>
                      </div>
                  </div>
                  {{ $platform->links('vendor.pagination.default')}}
	</div>
</div>
@endsection



@section('footer')


@endsection