@extends('layouts.app5')

@section('title')
Details - {{ $campaign->campaign_name}} 
@parent
@stop


@section('bread1')
{{ $campaign->campaign_name}} - Details
@endsection
@section('bread2', 'View My Campaign')

@section('head')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@endsection


@section('actions')
<!--begin::Toolbar-->

                <a href="{{url('brand/campaign/'.$campaign->id.'/update/'.$campaign->amount)}}" class="btn btn-transparent-white font-weight-bold  py-3 px-6 mr-2">
                    <i class="fas fa-edit"></i>Edit
                </a>
                
                <!--<a href="#" class="btn btn-white font-weight-bold py-3 px-6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Actions
                </a>-->
        
        <!--end::Toolbar-->
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
<!--begin::Card-->
        <div class="card card-custom">
            <div class="card-header card-header-tabs-line">
                <div class="card-toolbar">
                    <ul class="nav nav-tabs nav-bold nav-tabs-line">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="" href="{{ url('brand/campaign/'.$campaign->id.'/view/'.$campaign->amount)}}">
                                <span class="nav-icon"><i class="flaticon-browser"></i></span>
                                <span class="nav-text">Details</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="" href="{{url('brand/campaign/'.$campaign->id.'/proposal')}}">
                                <span class="nav-icon"><i class="flaticon-users"></i></span>
                                <span class="nav-text">Manage Proposals</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="" href="{{ url('brand/campaign/stats/'.$campaign->id.'/'.$campaign->amount)}}" role="button" aria-haspopup="true" aria-expanded="false">
                                <span class="nav-icon"><i class="flaticon-diagram"></i></span>
                                <span class="nav-text">Stats</span>
                            </a>
                            
                         </li>
                    </ul>
                </div>
                
            </div>
            <div class="card card-custom overflow-hidden gutter-b">
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="kt_tab_pane_1_4" role="tabpanel" aria-labelledby="kt_tab_pane_1_4">

        <!-- begin: Invoice-->
        <!-- begin: Invoice header-->
        <div class="row justify-content-center py-8 px-8 py-md-27 px-md-0">
            <div class="col-md-9">
                <div class="">
                    <h1 class="display-4 font-weight-boldest mb-10">{{ $campaign->campaign_name}}</h1>
                    <div class="d-flex flex-column px-0">
                        <!--begin::Logo
                        <span class="opacity-50">By {{ $campaign->user->brandname}}</span>
                        <a href="#" class="mb-5">

                            <img src="{{ url('public/uploads/campaign/'.$campaign->media )}}" width="70px" alt="logo"/>
                        </a>
                        end::Logo-->
                        <p> 
                            @if($today >= $due)
                            <span class="label label-inline label-light-danger font-weight-bold">This campaign has ended</span>
                            @else
                            <span class="label label-inline label-light-primary font-weight-bold">This campaign is active</span>
                            
                            @endif
                        </p>
                        <h3>Description</h3>
                        <p><span class=" d-flex flex-column  opacity-90">
                            {{ $campaign->desc}}
                        </span>
                    </p>
                    <h3>Creator's guide</h3>
                    <p><span class=" d-flex flex-column  opacity-90">
                            {{ $campaign->details}}
                        </span>
                    </p>
                    
                    <p><h3>Call To Action</h3>
                            <h5><span class=" d-flex flex-column  opacity-80">{{ $campaign->cta}}</span></h5>
                        
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
                    @if($campaign->interests)
                    <p>
                        <span class="font-weight-bolder font-size-sm">Interests : </span>
                        
  @foreach(json_decode($campaign->interests) as $cate)
   <span class="label label-info label-inline mr-2">{{ $cate }}</span>
   
  @endforeach
  @endif

                    
                    </p>
                    </div>
                </div>
                
  <!--begin::Image-->
  <p><h3>Campaign Assets </h3>
    <span class=" d-flex flex-column  opacity-60">click to download</span>
               <p> <div class="row">


                    
                    @forelse(json_decode($campaign->media) as $camassets)
                    <div class="col-xl-4 gutter-b">
                        <a href="{{ url('public/uploads/campaign/'.$camassets )}}" download="fanloft_campaign_asset">
                    <div class="bgi-no-repeat bgi-size-cover rounded min-h-180px w-180" style="background-image: url({{ url('public/uploads/campaign/'.$camassets )}})" ></div>
                     </div></a>
                    @empty
                    <span class=" d-flex flex-column  opacity-80">Non added</span>
                    @endforelse
                    </p>
                </p>
             
                    
                
                </div>
            
                    <!--end::Image-->
                
            </div>
        </div>
        <!-- end: Invoice header-->
        <!--begin::Image-->
            
            <!--end::Image-->

<!-- begin: Invoice body-->
        <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
            <div class="col-md-9">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="pl-0 font-weight-bold text-muted  text-uppercase"></th>
                                <th class="text-right font-weight-bold text-muted text-uppercase">Details</th>
                                <th class="text-right font-weight-bold text-muted text-uppercase"></th>
                                
                            </tr>
                        </thead>
                        <tbody>
        

                            <tr class="font-weight-boldest">
                                <td class="pl-0 pt-7">Campaign(Start-End)</td>
                                <td class="text-right pt-7 opacity-70">{{ $campaign->duration}}</td>
                                <td class="text-danger border-top-0 pr-0 py-4 text-right">
                                </td>
                            
                            </tr>
                            
                            <tr class="font-weight-boldest border-bottom-0">
                                <td class="border-top-0 pl-0 py-4">Platform/Service</td>
                                <td class="border-top-0 text-right py-4 opacity-70">{{ ucfirst($campaign->qualification)}} / {{ ucfirst($campaign->service)}}</td>
                                <td class="text-danger border-top-0 pr-0 py-4 text-right">
                                </td>
                                
                            </tr>
                            <tr class="font-weight-boldest border-bottom-0">
                                <td class="border-top-0 pl-0 py-4">Category</td>
                                <td class="border-top-0 text-right py-4 opacity-70">{{ ucfirst($campaign->niche) }}</td>
                                <td class="text-danger border-top-0 pr-0 py-4 text-right"></td>
                                
                            </tr>
                            <tr class="font-weight-boldest border-bottom-0">
                                <td class="border-top-0 pl-0 py-4">Gender</td>
                                <td class="border-top-0 text-right py-4 opacity-70">{{ ucfirst($campaign->gender)}}</td>
                                <td class="text-danger border-top-0 pr-0 py-4 text-right">
                                </td>
                                
                            </tr>
                            <tr class="font-weight-boldest border-bottom-0">
                                <td class="border-top-0 pl-0 py-4">Minimum Followers</td>
                                <td class="border-top-0 text-right py-4 opacity-70">{{ $campaign->minfollowers}}</td>
                                <td class="text-danger border-top-0 pr-0 py-4 text-right">
                                
                            </tr>
                            <tr class="font-weight-boldest border-bottom-0">
                                <td class="border-top-0 pl-0 py-4">Your Budget</td>
                                <td class="border-top-0 text-right py-4 opacity-70">₦ {{ number_format($campaign->budget)}}</td>
                                <td class="text-danger border-top-0 pr-0 py-4 text-right">
                                </td>
                                
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
        <!-- end: Invoice body-->
       
	
</div>
</div></div>
</div>
</div>
</div>
<!--end::Entry-->





@endsection

@section('footer')
<script src="{{url('public/assets/js/pages/widgets.js?v=7.0.6')}}"></script>

@endsection