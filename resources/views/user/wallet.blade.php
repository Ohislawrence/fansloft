@extends('layouts.app5')

@section('title')
My Wallet
@parent
@stop

@section('bread1', 'Wallet')
@section('bread2', 'Balance')
@section('head')

@endsection


@section('content')

<!--Begin::Row-->
<div class=" container ">
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

<div class="row">
    <div class="col-xl-3">
        <!--begin::Stats Widget 29-->
<div class="card card-custom bgi-no-repeat card-stretch gutter-b"
    style="background-position: right top; background-size: 30% auto; background-image: url(assets/media/svg/shapes/abstract-1.svg)">
    <!--begin::Body-->
    <div class="card-body">
        <i class="fas fa-money-bill-alt icon-2x text-dark"></i>
        @if($wallet)
        <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">₦ {{ number_format($wallet->balance)}}</span> 
        @else
        <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">No transaction yet</span>
        @endif
        <span class="font-weight-bold text-muted  font-size-sm">Main Balance</span>
    </div>
    <!--end::Body-->
</div>
<!--end::Stats Widget 29-->
    </div>
    <div class="col-xl-3">
        <!--begin::Stats Widget 30-->
<div class="card card-custom bg-info card-stretch gutter-b">
    <!--begin::Body-->
    <div class="card-body">
        <i class="fas fa-money-bill icon-2x text-light"></i>
        @if($wallet)
        <span class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 d-block">₦ {{ number_format($wallet->pending_balance)}}</span> 
        @else
        <span class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 d-block">No pending balance yet</span>
        @endif
        <span class="font-weight-bold text-white  font-size-sm">Work in progress</span>
    </div>
    <!--end::Body-->
</div>

<!--end::Stats Widget 30-->
    </div>
    <div class="col-xl-3">
        <!--begin::Stats Widget 31-->
<div class="card card-custom bg-danger card-stretch gutter-b">
    <!--begin::Body-->
    <div class="card-body">
        <i class="fas fa-money-bill-wave icon-2x text-light"></i>
        @if($wallet)
        <span class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 d-block">₦ {{ number_format($wallet->balance2)}}</span> 
        @else
        <span class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 d-block">No transaction yet</span>
        @endif
        <span class="font-weight-bold text-white  font-size-sm">Pending Request</span>
    </div>
    <!--end::Body-->

</div>
<!--end::Stats Widget 31-->
    </div>
    <div class="col-xl-3">
        <!--begin::Stats Widget 32-->
<div class="card card-custom bg-dark card-stretch gutter-b">
    <!--begin::Body-->
    <div class="card-body">
        <i class="fas fa-compact-disc icon-2x text-light"></i>
        @if($wallet)
        <span class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 d-block">{{ number_format($wallet->transaction->count())}}</span> 
        @else
        <span class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 d-block">No transaction yet</span>
        @endif
        <span class="font-weight-bold text-white  font-size-sm">Number of transactions</span>
    </div>
    <!--end::Body-->
</div>
<!--end::Stats Widget 32-->
    </div>
</div>
<!--End::Row-->
</div>


<div class="container">
<!--begin::Card-->
<div class="card card-custom">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label">
                Transaction History
                <span class="d-block text-muted pt-2 font-size-sm">Search to get info</span>
            </h3>
        </div>
        <div class="card-toolbar">
            <!--begin::Dropdown-->
<div class="dropdown dropdown-inline mr-2">


    <!--begin::Dropdown Menu-->
    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
        <!--begin::Navigation-->
        <ul class="navi flex-column navi-hover py-2">
            <li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">
                Choose an option:
            </li>
            <li class="navi-item">
                <a href="#" class="navi-link">
                    <span class="navi-icon"><i class="la la-print"></i></span>
                    <span class="navi-text">Print</span>
                </a>
            </li>
            <li class="navi-item">
                <a href="#" class="navi-link">
                    <span class="navi-icon"><i class="la la-copy"></i></span>
                    <span class="navi-text">Copy</span>
                </a>
            </li>
            <li class="navi-item">
                <a href="#" class="navi-link">
                    <span class="navi-icon"><i class="la la-file-excel-o"></i></span>
                    <span class="navi-text">Excel</span>
                </a>
            </li>
            <li class="navi-item">
                <a href="#" class="navi-link">
                    <span class="navi-icon"><i class="la la-file-text-o"></i></span>
                    <span class="navi-text">CSV</span>
                </a>
            </li>
            <li class="navi-item">
                <a href="#" class="navi-link">
                    <span class="navi-icon"><i class="la la-file-pdf-o"></i></span>
                    <span class="navi-text">PDF</span>
                </a>
            </li>
        </ul>
        <!--end::Navigation-->
    </div>
    <!--end::Dropdown Menu-->
</div>
<!--end::Dropdown-->

<!--begin::Button-->
@if(Auth::user()->acc_number && Auth::user()->acc_name && Auth::user()->acc_bank)
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#fundwallet">Request Payment</button>
@else
<div class="dropdown dropdown-inline ml-2" data-toggle="tooltip" title="You have not saved your bank details, go to profile-edit to complete them" data-placement="top">
<button class="btn btn-primary" >Request Payment</button></div>
@endif

<!--end::Button-->
        </div>
    </div>
    <!-- Modal-->
                        <div class="modal fade" id="fundwallet" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    @if($user->wallet)
                                    
                                        <h5 class="modal-title" id="exampleModalLabel">Enter your request amount.</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i aria-hidden="true" class="ki ki-close"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{url('creator/wallet')}}" method="post" id="demoForm">
                                        @csrf

                                        <div class="form-group">
                        <label>Request amount</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">₦</span>
                                
                            </div>
                            <input type="text" name="amount" value="" id="amount" class="form-control" aria-label="Amount (to the nearest dollar)"/>
                        </div>
                    </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary font-weight-bold">Request Now</button>
                                        </form>
                                        @else
                        <h5 class="modal-title" id="exampleModalLabel">Your wallet is empty.</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i aria-hidden="true" class="ki ki-close"></i>
                                        </button>
                                    
                        <div class="modal-footer">
                                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                                        </div>
                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
<div class="card-body">
        <!--begin: Search Form-->
        <!--begin::Search Form-->
<div class="mb-7">
    <div class="row align-items-center">
        <div class="col-lg-9 col-xl-8">
            <div class="row align-items-center">
                <div class="col-md-4 my-2 my-md-0">
                    <div class="input-icon">
                        <input type="text" class="form-control" placeholder="Search..." id="kt_datatable_search_query" />
                        <span><i class="flaticon2-search-1 text-muted"></i></span>
                    </div>
                </div>

                                <div class="col-md-4 my-2 my-md-0">
                    <div class="d-flex align-items-center">
                        <label class="mr-3 mb-0 d-none d-md-block">Status:</label>
                        <select class="form-control" id="kt_datatable_search_status">
                            <option value="">All</option>
                            <option value="1">Comfirmed</option>
                            <option value="2">Failed</option>
                            <option value="3">Cancelled</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4 my-2 my-md-0">
                    <div class="d-flex align-items-center">
                        <label class="mr-3 mb-0 d-none d-md-block">Type:</label>
                        <select class="form-control" id="kt_datatable_search_type">
                            <option value="">All</option>
                            <option value="payment_request">Payment Request</option>
                            <option value="pending_payment">Work in progress</option>
                            <option value="paid">Paid</option>

                        </select>
                    </div>
                </div>
                            </div>
        </div>
        <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
            <a href="#" class="btn btn-light-primary px-6 font-weight-bold">
                Search
            </a>
        </div>
    </div>
</div>
<!--end::Search Form-->
        <!--end: Search Form-->

        <!--begin: Datatable-->
        <table class="datatable datatable-bordered datatable-head-custom" id="kt_datatable">
            <thead>
                <tr>
                    
                    <th title="Field #2">Amount</th>
                    <th title="Field #3">Currency</th>
                    <th title="Field #4">Date</th>
                    <th title="Field #5">Type</th>
                    <th title="Field #6">Country</th>
                    <th title="Field #7">Status</th>
                    
                </tr>
            </thead>
            <tbody>
                @if($wallet)
                @forelse($wallet->transaction->sortByDesc('updated_at') as $wt)
                <tr>
                    
                    <td>₦ {{number_format($wt->amount)}}</td>
                    <td>{{$wt->currency}}</td>
                    <td>{{ \Carbon\Carbon::parse($wt->updated_at)->format('j F, Y') }}</td>
                    <td>{{$wt->type}}</td>
                    <td>NG</td>
                    <td class="text-right">{{$wt->comfirmed}}</td>
                    
                </tr>
                @empty
                <tr>
                    <td>
                        No Transaction yet
                    </td>
                </tr>
                @endforelse
                @endif
                
            </tbody>
        </table>
        <!--end: Datatable-->
    </div>
</div>
<!--end::Card-->

                    </div>
        <!--end::Container-->
    </div>
<!--end::Entry-->


</div>


</div>        
 
@endsection

@section('footer')
<script src="{{ url('public/assets/js/pages/widgets.js?v=7.0.6')}}"></script>
<script src="{{ url('public/assets/js/pages/crud/ktdatatable/base/html-tablecreator.js?v=7.0.6')}}"></script>
<script src="{{ url('public/assets/js/pages/crud/forms/validation/myforms.js?v=7')}}"></script>

@endsection
