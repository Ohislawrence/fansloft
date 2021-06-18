@extends('layouts.app5')

@section('title')
Withdrawal Request
@parent
@stop

@section('bread1', 'Withdrawal Request')
@section('bread2', 'All Withdrawal Request')

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
            <span class="card-label font-weight-bolder text-dark">Transactions</span>
            <span class="text-muted mt-3 font-weight-bold font-size-sm">These are all transactions</span>
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
                       
                        <th style="min-width: 200px">User</th>
                        <th style="min-width: 200px">requested Amount</th>
                        <th style="min-width: 150px">Type</th>
                        <th style="min-width: 150px">Description</th>
                        <th style="min-width: 150px">action</th>
                        
                    </tr>
                </thead>
                <tbody>
                	@forelse($transaction as $wt)
                    <tr>
                    	<td class="pl-0">
                            <a href="" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$wt->user->brandname}}</a>
                            <span class="text-muted font-weight-bold text-muted d-block">Acc type - {{$wt->user->role}}</span>
                        </td>
                        
                        <td class="pl-0">
                            <a href="" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">₦ {{$wt->amount}}</a>
                            <span class="text-muted font-weight-bold text-muted d-block">Date - {{$wt->created_at}}</span>
                        </td>
                        <td >
                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">
                                {{ucfirst($wt->type)}}
                            </span>
                            <span class="text-muted font-weight-bold">
                               Status -  {{ucfirst($wt->comfirmed)}}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex flex-column w-100 mr-2">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                {{$wt->desc}}
                                </div>
                                
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-column w-100 mr-2">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                	<a href="{{url('admin/bank/withdrawalrequest/'.$wt->id.'/edit')}}">
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