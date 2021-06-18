@extends('layouts.app5')

@section('title')
Send Proposal
@parent
@stop


@section('bread1', 'Proposal')
@section('bread2', 'Send Proposal')

@section('head')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@endsection



@section('content')
<div class="d-flex flex-column-fluid">
		<!--begin::Container-->
		<div class=" container ">
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
							<!-- begin::Card-->
<div class="card card-custom overflow-hidden gutter-b">
    <div class="card-body p-0">
        <!-- begin: Invoice-->
        <!-- begin: Invoice header-->
        <div class="row justify-content-center py-8 px-8 py-md-27 px-md-0">
            <div class="col-md-9">
                <div class="">
                    <h1 class="display-4 font-weight-boldest mb-10">{{ $campaign->campaign_name}}</h1>
                    <div class="d-flex flex-column  px-0">
                        <!--begin::Logo-->
                        <span class="opacity-50">By {{ $campaign->user->brandname}}</span>
                        <a href="" class="mb-5">

                            <img src="{{ url('public/uploads/campaign/'.$campaign->media )}}" width="70px" alt="logo"/>
                        </a>
                        <!--end::Logo-->
                        <h3>Description</h3>
                        <p><span class=" d-flex flex-column opacity-90">
                            {{ $campaign->desc}}
                        </span>
                    </p>
                    <p>
                        <h3>What you will do</h3>
                        <span class=" d-flex flex-column opacity-90">
                            {{ $campaign->details}}
                        </span>
                    </p>
                    <p>
                        <h3>Call To Action</h3>
                        <span class=" d-flex flex-column">
                            <h6><span class=" d-flex flex-column  opacity-80">{{ $campaign->cta}}</span></h6>
                        </span>
                    </p>
                    <p><h3>Product/Service website address</h3>
                            <p><a href="{{ $campaign->link}}" target="_blank">{{ $campaign->link}}</a></p>
                        
                    </p>
                    <p><h3>Hashtags #</h3>
                            <span class=" d-flex flex-column  opacity-80">{{ $campaign->tags}}</span>
                        
                    </p>
                    <p><h3>Quotes @</h3>
                            <span class=" d-flex flex-column  opacity-80">{{ $campaign->quotes}}</span>
                        
                    </p>
                    <p>
@if($campaign->interests)
<div class="d-flex mt-4 mt-sm-0">
<div class="d-flex flex-column text-dark-75">
            <span class="font-weight-bolder font-size-sm">Interests : </span></div>
  @forelse(json_decode($campaign->interests) as $cate)
   <span class="label label-info label-inline mr-2">{{ $cate }}</span>
   @empty
  @endforelse

                    </div>
                    <!--end::Progress-->
@else
@endif
                    </p>
                    </div>
                </div>
                
            </div>
        </div>
        <!-- end: Invoice header-->

        <!-- begin: Invoice body-->
        <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
            <div class="col-md-9">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="pl-0 font-weight-bold text-muted  text-uppercase"></th>
                                <th class="text-right font-weight-bold text-muted text-uppercase"></th>
                                <th class="text-right font-weight-bold text-muted text-uppercase">Info</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @php
                $data = $campaign->duration;
                $due = explode("-","$data");
                $due = $due[1];
                $start = substr($data, 0, 10);
                @endphp

                            <tr class="font-weight-boldest">
                                <td class="pl-0 pt-7">Campaign(Start-End)</td>
                                <td class="text-right pt-7 opacity-70">{{ $campaign->duration}}</td>
                                <td class="text-danger border-top-0 pr-0 py-4 text-right">
                                    @if($due <= date('m/d/Y'))
                                    
                                    @else
                                    
                                    @endif
                                </td>
                            
                            </tr>
                            
                            <tr class="font-weight-boldest border-bottom-0">
                                <td class="border-top-0 pl-0 py-4">Platform/Service</td>
                                <td class="border-top-0 text-right py-4 opacity-70">{{ ucfirst($campaign->qualification)}} / {{ ucfirst($campaign->service)}}</td>
                                <td class="text-danger border-top-0 pr-0 py-4 text-right">
                                    @if($campaign->qualification == Auth::user()->platform())
                                    <i class="fa fa-check text-primary mr-5"></i>
                                    @else
                                    <i class="fa fa-times text-danger mr-5"></i>
                                    @endif
                                </td>
                                
                            </tr>
                            <tr class="font-weight-boldest border-bottom-0">
                                <td class="border-top-0 pl-0 py-4">Category</td>
                                <td class="border-top-0 text-right py-4 opacity-70">{{ ucfirst($campaign->niche) }}</td>
                                <td class="text-danger border-top-0 pr-0 py-4 text-right">
                                    @if($campaign->niche == Auth::user()->maincategory)
                                    <i class="fa fa-check text-danger mr-5"></i>
                                    @else
                                    <i class="fa fa-times text-danger mr-5"></i>
                                    @endif</td>
                                
                            </tr>
                            <tr class="font-weight-boldest border-bottom-0">
                                <td class="border-top-0 pl-0 py-4">Gender</td>
                                <td class="border-top-0 text-right py-4 opacity-70">{{ ucfirst($campaign->gender)}}</td>
                                <td class="text-danger border-top-0 pr-0 py-4 text-right">
                                    @if($campaign->gender == Auth::user()->gender || $campaign->gender == 'Both')
                                    <i class="fa fa-check text-primary mr-5"></i>
                                    @else
                                    <i class="fa fa-times text-danger mr-5"></i>
                                    @endif
                                </td>
                                
                            </tr>
                            <tr class="font-weight-boldest border-bottom-0">
                                <td class="border-top-0 pl-0 py-4">Minimum Followers</td>
                                <td class="border-top-0 text-right py-4 opacity-70">{{ $campaign->minfollowers}}</td>
                                <td class="text-danger border-top-0 pr-0 py-4 text-right">
                                    @if($campaign->minfollowers <= Auth::user()->platform->sum('followers'))
                                    <i class="fa fa-check text-primary mr-5"></i>
                                    @else
                                    <i class="fa fa-times text-danger mr-5"></i>
                                    @endif
                                </td>
                                
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

@endsection

@section('footer')

    <script src="{{ url('public/assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js?v=7.0.6')}}"></script>
    <script src="{{ url('public/assets/js/pages/crud/forms/proposal.js')}}"></script>
@endsection