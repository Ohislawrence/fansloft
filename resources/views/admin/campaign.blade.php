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
	<div class="card">
		<div class="card-body">
		<!--begin: Datatable-->

		<table class="table table-bordered table-hover" id="kt_datatable">
			                    <thead>
                              <tr>
                                              <th>Record ID</th>
                                              <th>Campaign Name</th>
                                              <th>Owner</th>
                                              <th>Platform</th>
                                              <th>Services</th>
                                              <th>Budget</th>
                                              <th>Active?</th>
                                              <th>Start/Stop</th>
                                              <th>Status</th>
                                              <th>Posted</th>
                                              <th>Actions</th>
                                  </tr>
                    </thead>

                        <tbody>
                        	@forelse($campaign as $campaigns)
                            <tr>
                                              <td>{{$campaigns->id}}</td>
                                              <td>{{$campaigns->campaign_name}}</td>
                                              <td>{{$campaigns->user->brandname}}</td>
                                              <td>{{ucfirst($campaigns->qualification)}}</td>
                                              <td>{{ucfirst($campaigns->service)}}</td>
                                              <td> {{number_format($campaigns->budget)}}</td>
                                              <td>Casper-Kerluke</td>
                                              <td>{{$campaigns->duration}}</td>
                                              <td>{{$campaigns->status}}</td>
                                              <td>{{$campaigns->created_at}}</td>
                                              <td><a href="{{url('admin/campaign/'.$campaigns->id.'/edit')}}"><i class="fa fa-edit icon-2x"></i></a></td>
                                  </tr>
                            @empty
                            <tr>No campaign</tr>
                            @endforelse
                              </tbody>
                          </table>
                      </div>
                  </div>
                  {{ $campaign->links('vendor.pagination.default')}}
	</div>
</div>

@endsection



@section('footer')


@endsection