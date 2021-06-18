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
        <span class="svg-icon svg-icon-2x svg-icon-info"><!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-opened.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 Z M7.5,5 C7.22385763,5 7,5.22385763 7,5.5 C7,5.77614237 7.22385763,6 7.5,6 L13.5,6 C13.7761424,6 14,5.77614237 14,5.5 C14,5.22385763 13.7761424,5 13.5,5 L7.5,5 Z M7.5,7 C7.22385763,7 7,7.22385763 7,7.5 C7,7.77614237 7.22385763,8 7.5,8 L10.5,8 C10.7761424,8 11,7.77614237 11,7.5 C11,7.22385763 10.7761424,7 10.5,7 L7.5,7 Z" fill="#000000" opacity="0.3"/>
        <path d="M3.79274528,6.57253826 L12,12.5 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 Z" fill="#000000"/>
    </g>
</svg><!--end::Svg Icon--></span>
    
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
        <span class="svg-icon svg-icon-2x svg-icon-white"><!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
        <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
    </g>
</svg><!--end::Svg Icon--></span>
        @if($wallet)
        <span class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 d-block">₦ {{ number_format($wallet->pending_balance)}}</span> 
        @else
        <span class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 d-block">No pending balance yet</span>
        @endif
        <span class="font-weight-bold text-white  font-size-sm">Pending Balance</span>
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
        <span class="svg-icon svg-icon-2x svg-icon-white"><!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5"/>
        <rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5"/>
        <rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5"/>
        <rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5"/>
    </g>
</svg><!--end::Svg Icon--></span>
        @if($transs)
        <span class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 d-block">₦ {{ number_format($transs->amount)}}</span> 
        @else
        <span class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 d-block">No transaction yet</span>
        @endif
        <span class="font-weight-bold text-white  font-size-sm">Last Transaction</span>
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
        <span class="svg-icon svg-icon-2x svg-icon-white"><!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group-chat.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z" fill="#000000"/>
        <path d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z" fill="#000000" opacity="0.3"/>
    </g>
</svg><!--end::Svg Icon--></span>
        @if($transs)
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
            
            
        </ul>
        <!--end::Navigation-->
    </div>
    <!--end::Dropdown Menu-->
</div>
<!--end::Dropdown-->

<!--begin::Button-->

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#fundwallet"><i class="fa fa-plus"></i>Fund Wallet</button>
<!--end::Button-->
        </div>
    </div>
    <!-- Modal-->
                        <div class="modal fade" id="fundwallet" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Enter the amount you will like to add to your wallet.</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i aria-hidden="true" class="ki ki-close"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
@php
$array = array(array('metaname' => 'color', 'metavalue' => 'blue'),
                array('metaname' => 'size', 'metavalue' => 'big'));
@endphp
<form action="{{ route('pay') }}" method="POST" id="demoForm" accept-charset="UTF-8" role="form">
{{ csrf_field() }} 

                    <input type="hidden" name="currency" id="currency" value="NGN">
                    <input type="hidden" name="email" id="email" value="{{ Auth::user()->email }}">
                    <input type="hidden" name="firstname" id="firstname" value="{{ Auth::user()->name }}">
                    <input type="hidden" name="lastname" id="lastname" value="">
                    <input type="hidden" name="phonenumber" id="phonenumber" value="{{ Auth::user()->mobilenumber }}">
                    <input type="hidden" name="country" id="country" value="NG">
                    <input type="hidden" name="ref" value="" />
                    <input type="hidden" name="metadata" value="{{ json_encode($array = ['key_name' => 'value',]) }}" >
                <div class="form-group">
                        <label>Enter amount</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">₦</span>
                                
                            </div>
                            <input type="text" name="amount" id="digits" class="form-control" aria-label="Amount (to the nearest naira)"/>
                        </div>
                        <span class="form-text text-muted">Enter amount here</span>
                    </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary font-weight-bold">Fund Now</button>
                                        </form>
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
                            <option value="2">Failed</option>
                            <option value="1">Comfirmed</option>
                            
                        </select>
                    </div>
                </div>
                <div class="col-md-4 my-2 my-md-0">
                    <div class="d-flex align-items-center">
                        <label class="mr-3 mb-0 d-none d-md-block">Type:</label>
                        <select class="form-control" id="kt_datatable_search_type">
                            <option value="">All</option>
                            <option value="deposit">Deposit</option>
                            <option value="payment">Payment</option>
                            <option value="refund">Refund</option>
                            <option value="pending_payment">Pending Payment</option>
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
                @forelse($wallet->transaction->sortByDesc('id') as $wt)
                <tr>
                    
                    <td>₦ {{number_format($wt->amount)}}</td>
                    <td>{{$wt->currency}}</td>
                    <td>{{ \Carbon\Carbon::parse($wt->created_at)->format('j F, Y') }}</td>
                    <td>{{$wt->type}}</td>
                    <td>₦</td>
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
<script src="{{ url('public/assets/js/pages/crud/ktdatatable/base/html-table.js')}}"></script>
<script src="{{ url('public/assets/js/pages/crud/forms/validation/myforms.js?v=7')}}"></script>

@endsection

