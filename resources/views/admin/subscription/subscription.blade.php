@extends('layouts.app5')

@section('title')
All Subscription
@parent
@stop

@section('bread1', 'Subscription')
@section('bread2', 'All Subscription')

@section('head')

@endsection

@section('actions')
 
@endsection


@section('content')

<!--begin::Advance Table Widget 1-->
<div class="container">
<div class="card card-custom card-stretch gutter-b">
    <!--begin::Header-->
    <div class="card-header border-0 py-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bolder text-dark">Subscriptions</span>
            <span class="text-muted mt-3 font-weight-bold font-size-sm">These are all transactions</span>
        </h3>
        <div class="card-toolbar">
            <a href="{{url('admin/createplan')}}" class="btn btn-success font-weight-bolder font-size-sm"><i class="fas fa-money-alt"></i> </span>Create New Plan
            </a>
        </div>
    </div>
    <!--end::Header-->
<!--begin::Body-->
    <div class="card-body py-0">
        <!--begin::Table-->
        <div class="table-responsive">
            <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_1">
                <thead>
                    <tr class="text-left">
                       
                        <th style="min-width: 200px">Plan Name</th>
                        <th style="min-width: 150px">Signup Fee</th>
                        <th style="min-width: 150px">Currency</th>
                        <th style="min-width: 150px">Grace Period</th>
                        <th style="min-width: 150px">Active</th>
                        <th style="min-width: 150px">Action</th>

                        
                    </tr>
                </thead>
                <tbody>
                	@forelse($monthly as $wt)
                    <tr>
                    	<td class="pl-0">
                            <a href="" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$wt->name}}</a>
                            <span class="text-muted font-weight-bold text-muted d-block">Price - {{$wt->price}}</span>
                        </td>
                        
                        <td class="pl-0">
                            <a href="" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$wt->signup_fee}}</a>
                            <span class="text-muted font-weight-bold text-muted d-block">Trial Period - {{$wt->trial_period}}</span>
                        </td>
                        <td >
                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">
                                {{ucfirst($wt->currency)}}
                            </span>
                            <span class="text-muted font-weight-bold">
                               Interval -  {{ucfirst($wt->invoice_interval)}}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex flex-column w-100 mr-2">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                {{$wt->grace_period}}
                                </div>
                                
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-column w-100 mr-2">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                {{$wt->is_active}}
                                </div>
                                
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-column w-100 mr-2">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                	<a href="{{url('admin/editplan/'.$wt->id)}}">
                                <i class="fa fa-edit"></i>
                                </a>
                                </div>
                                
                            </div>
                        </td>
                    </tr>
                @empty
                <h3>Empty</h3>
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

@endsection