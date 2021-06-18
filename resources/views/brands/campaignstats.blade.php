@extends('layouts.app5')

@section('title')
Stats for {{$campaign->campaign_name}}
@parent
@stop


@section('bread1')
{{ $campaign->campaign_name}} - Stats
@endsection
@section('bread2', 'View Stats')

@section('head')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8">
</script>
@endsection


@section('actions')
<a type="button" href="{{ url('brand/campaign/stats/'.$campaign->id.'/'.$campaign->amount)}}" class="btn btn-transparent-white font-weight-bold  py-3 px-6 mr-2" onclick="window.print();">Print Report</a>
@endsection

@section('content')
<div class="container">
<!--begin::Row-->
<!--begin::Card-->
        <div class="card card-custom gutter-b">
            <div class="card-header card-header-tabs-line">
                <div class="card-toolbar">
                    <ul class="nav nav-tabs nav-bold nav-tabs-line">
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="" href="{{ url('brand/campaign/'.$campaign->id.'/view/'.$campaign->amount)}}">
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
                            <a class="nav-link active" data-toggle="" href="{{ url('brand/campaign/stats/'.$campaign->id.'/'.$campaign->amount)}}" role="button" aria-haspopup="true" aria-expanded="false">
                                <span class="nav-icon"><i class="flaticon-diagram"></i></span>
                                <span class="nav-text">Stats</span>
                            </a>
                            
                         </li>
                    </ul>
                </div>
                
            </div>
            </div>


    <div class="col-xl-12">
        <!--begin::Mixed Widget 16-->
<div class="card card-custom gutter-b card-stretch">
    <!--begin::Header-->
    
    <!--end::Header-->

    <!--begin::Body-->
    <div class="card-body d-flex flex-column">
        

<!--begin::Items-->
        <div class="mt-10 mb-5">
            <div class="row row-paddingless mb-10">
                <!--begin::Item-->
                <div class="col">
                    <div class="d-flex align-items-center mr-2">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-45 symbol-light-info mr-4 flex-shrink-0">
                            <div class="symbol-label">
                                <i class="fas fa-hand-point-right"></i>                           </div>
                        </div>
                        <!--end::Symbol-->

                        <!--begin::Title-->
                        <div>
                            <div class="font-size-h4 text-dark-75 font-weight-bolder">{{number_format($stats->where('status','approved')->sum('numberofviews'))}}</div>
                            <div class="font-size-sm text-muted font-weight-bold mt-1">Total Reach</div>
                        </div>
                        <!--end::Title-->
                    </div>
                </div>
                <!--end::Item-->

                <!--begin::Item-->
                <div class="col">
                    <div class="d-flex align-items-center mr-2">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-45 symbol-light-danger mr-4 flex-shrink-0">
                            <div class="symbol-label">
                                <i class="fas fa-money-bill-alt"></i>                            </div>
                        </div>
                        <!--end::Symbol-->

                        <!--begin::Title-->
                        <div>
                            <div class="font-size-h4 text-dark-75 font-weight-bolder">₦ {{number_format($stats->where('status','approved')->sum('bid'))}}</div>
                            <div class="font-size-sm text-muted font-weight-bold mt-1">Amount Spent</div>
                        </div>
                        <!--end::Title-->
                    </div>
                </div>
                <!--end::Item-->
            </div>

            <div class="row row-paddingless">
                <!--begin::Item-->
                <div class="col">
                    <div class="d-flex align-items-center mr-2">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-45 symbol-light-success mr-4 flex-shrink-0">
                            <div class="symbol-label">
                                <i class="fas fa-money-bill-alt"></i>                           </div>
                        </div>
                        <!--end::Symbol-->

                        <!--begin::Title-->
                        <div>
                            <div class="font-size-h4 text-dark-75 font-weight-bolder">₦ {{ number_format($campaign->budget)}}</div>
                            <div class="font-size-sm text-muted font-weight-bold mt-1">Your Budget</div>
                        </div>
                        <!--end::Title-->
                    </div>
                </div>
                <!--end::Item-->

                <!--begin::Item-->
                <div class="col">
                    <div class="d-flex align-items-center mr-2">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-45 symbol-light-primary mr-4 flex-shrink-0">
                            <div class="symbol-label">
                                <i class="fas fa-thumbs-up"></i>                            </div>
                        </div>
                        <!--end::Symbol-->

                        <!--begin::Title-->
                        <div>
                            <div class="font-size-h4 text-dark-75 font-weight-bolder">{{ ucfirst($campaign->qualification)}}</div>
                            <div class="font-size-sm text-muted font-weight-bold mt-1">Platform</div>
                        </div>
                        <!--end::Title-->
                    </div>
                </div>
                <!--end::Item-->
            </div>
        </div>
        <!--end::Items-->
    </div>
    <!--end::Body-->
</div>
<!--chart here-->
<!--begin::Row-->
<div class="row">
    <div class="col-xl-6">
        <!--begin::Charts Widget 3-->
<div class="card card-custom card-stretch gutter-b">
    <!--begin::Header-->
    <div class="card-header h-auto border-0">
        <div class="card-title py-5">
            <h3 class="card-label">
				<span class="d-block text-dark font-weight-bolder">Impression/Reach</span>
                <span class="d-block text-muted mt-2 font-size-sm">Compare total impressions to Reach</span>
			</h3>
        </div>
        <div class="card-toolbar">
            <ul class="nav nav-pills nav-pills-sm nav-dark-75" role="tablist">
                <li class="nav-item">
                    <div class="py-2 px-4" >
                    	<div class="font-size-h4 text-dark-75 font-weight-bolder">
                        {{$impress}}</div><span class="nav-text font-size-sm">Impressions</span>
                    </div>
                </li>
                <li class="nav-item">
                    <div class="py-2 px-4" >
                    	<div class="font-size-h4 text-dark-75 font-weight-bolder">
                        {{$reach}}</div><span class="nav-text font-size-sm">Reachs</span>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!--end::Header-->

    <!--begin::Body-->
    <div class="card-body">
        {!! $ImpressionstatCharts->container() !!}
    </div>
    <!--end::Body-->
</div>
<!--end::Charts Widget 3-->
    </div>
    <div class="col-xl-6">
        <!--begin::Charts Widget 4-->
<div class="card card-custom  card-stretch gutter-b">
    <!--begin::Header-->
    <div class="card-header h-auto border-0">
        <div class="card-title py-5">
            <h3 class="card-label">
                <span class="d-block text-dark font-weight-bolder">Likes/Share</span>
                <span class="d-block text-muted mt-2 font-size-sm">Compare likes to share</span>
			</h3>
        </div>
        <div class="card-toolbar">
            <ul class="nav nav-pills nav-pills-sm nav-dark-75" role="tablist">
                <li class="nav-item">
                   <div class="py-2 px-4" >
                    	<div class="font-size-h4 text-dark-75 font-weight-bolder">
                        {{$likes}}</div><span class="nav-text font-size-sm">Likes</span>
                    </div>
                </li>
                <li class="nav-item">
                    <div class="py-2 px-4" >
                    	<div class="font-size-h4 text-dark-75 font-weight-bolder">
                        {{$shares}}</div><span class="nav-text font-size-sm">Shares</span>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!--end::Header-->

    <!--begin::Body-->
    <div class="card-body">
        {!! $LikestatCharts->container() !!}
    </div>
    <!--end::Body-->
</div>
</div>

<!--chart ends-->


<!--begin the second stats card-->
<div class="col-xl-12">
        <!--begin::Mixed Widget 16-->
<div class="card card-custom gutter-b card-stretch">
    <!--begin::Header-->
    
    <!--end::Header-->

    <!--begin::Body-->
    <div class="card-body d-flex flex-column">
        

<!--begin::Items-->
        <div class="mt-10 mb-5">
            <div class="row row-paddingless mb-10">
                <!--begin::Item-->
                <div class="col">
                    <div class="d-flex align-items-center mr-2">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-45 symbol-light-info mr-4 flex-shrink-0">
                            <div class="symbol-label">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                        </div>
                        <!--end::Symbol-->

                        <!--begin::Title-->
                        <div>
                            <div class="font-size-h4 text-dark-75 font-weight-bolder">{{$campaign->country}}</div>
                            <div class="font-size-sm text-muted font-weight-bold mt-1">Country</div>
                        </div>
                        <!--end::Title-->
                    </div>
                </div>
                <!--end::Item-->

                <!--begin::Item-->
                <div class="col">
                    <div class="d-flex align-items-center mr-2">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-45 symbol-light-danger mr-4 flex-shrink-0">
                            <div class="symbol-label">
                                <i class="far fa-heart"></i>
                            </div>
                        </div>
                        <!--end::Symbol-->

                        <!--begin::Title-->
                        <div>
                            <div class="font-size-h4 text-dark-75 font-weight-bolder">@if($campaign->interests)
                            	@foreach(json_decode($campaign->interests) as $cate)
   <span class="label label-info label-inline mr-2">{{ $cate }}</span>
   
  @endforeach
  @endif</div>
                            <div class="font-size-sm text-muted font-weight-bold mt-1">Interests</div>
                        </div>
                        <!--end::Title-->
                    </div>
                </div>
                <!--end::Item-->
            </div>

            <div class="row row-paddingless">
                <!--begin::Item-->
                <div class="col">
                    <div class="d-flex align-items-center mr-2">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-45 symbol-light-success mr-4 flex-shrink-0">
                            <div class="symbol-label">
                                <i class="fas fa-calendar-day"></i>                           </div>
                        </div>
                        <!--end::Symbol-->

                        <!--begin::Title-->
                        <div>
                            <div class="font-size-h6 text-dark-75">{{$start}} to {{$due}}</div>
                            <div class="font-size-sm text-muted font-weight-bold mt-1">Duration</div>
                        </div>
                        <!--end::Title-->
                    </div>
                </div>
                <!--end::Item-->

                <!--begin::Item-->
                <div class="col">
                    <div class="d-flex align-items-center mr-2">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-45 symbol-light-primary mr-4 flex-shrink-0">
                            <div class="symbol-label">
                                <i class="fas fa-user-friends"></i>                           </div>
                        </div>
                        <!--end::Symbol-->

                        <!--begin::Title-->
                        <div>
                            <div class="font-size-h4 text-dark-75 font-weight-bolder">{{$stats->where('status', 'approved')->count()}}</div>
                            <div class="font-size-sm text-muted font-weight-bold mt-1">Number of creators</div>
                        </div>
                        <!--end::Title-->
                    </div>
                </div>
                <!--end::Item-->
            </div>
        </div>
        <!--end::Items-->
    </div>
    <!--end::Body-->
</div>
</div>
<!--end the 2nd card-->
</div>
</div>
</div>
</div>
@endsection

@section('footer')
<script src="{{url('public/assets/js/pages/widgets.js?v=7.0.6')}}"></script>
{!! $ImpressionstatCharts->script() !!}
{!! $LikestatCharts->script() !!}
@endsection