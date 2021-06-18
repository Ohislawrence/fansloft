@extends('layouts.app5')

@section('title')
Your Dashboard
@parent
@stop

@section('bread1', 'Dashboard')
@section('bread2', '')

@section('head')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8">
</script>
@endsection


@section('content')
<div class="container">
	<!--Begin::Row-->
    <div class="row">
<div class="col-xl-12">
                <!--begin::Tiles Widget 22-->
<div class="card card-custom bgi-no-repeat gutter-b"
    style="height: 150px; background-color: #1B283F; background-position: calc(100% + 0.5rem) calc(100% + 0.5rem); background-size: 100% auto; background-image: url({{url('public/assets/media/svg/patterns/taieri.svg')}})">
    <!--begin::Body-->
    <div class="card-body">
        <h3 class="text-white font-weight-bolder">Welcome {{ucfirst(Auth::user()->brandname)}},</h3>
        <!--if goes here -->
        <p class="text-white font-size-lg mt-5 mb-10">
            Your {{ucfirst($plan)}} plan {{$planis}}. You can start creating your campaign. 
            @if($remainingdays < 4)
            You have {{$remainingdays}} days of access before your next renewal.

            @endif
        </p>
        <a href="{{url('brand/campaign/create')}}" class="btn btn-link btn-link-warning font-weight-bold">
            Create Campaign <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
        
    </div>
    <!--end::Body-->
    </div>
</div>
</div>
<!--end::Row head-->
<div class="row">
    <div class="col-xl-4">
        <!--begin::Stats Widget 22-->
<div class="card card-custom bgi-no-repeat card-stretch gutter-b"
    style="background-position: right top; background-size: 30% auto; background-image: url({{url('public/assets/media/svg/shapes/abstract-3.svg')}})">
    <!--begin::Body-->
    <div class="card-body my-4">
        <a href="#" class="card-title font-weight-bolder text-info font-size-h6 mb-4 text-hover-state-dark d-block">Posts</a>

        <div class="font-weight-bold text-muted font-size-sm"><span class="text-dark-75 font-weight-bolder font-size-h2 mr-2">{{number_format($postnumber)}}</span>Post this month</div>   
    </div>
    <!--end::Body-->
</div>
<!--end::Stats Widget 22-->
</div>
    <div class="col-xl-4">
        <!--begin::Stats Widget 23-->
<div class="card card-custom bg-info card-stretch gutter-b">
    <!--begin::Body-->
    <div class="card-body my-4">
        <a href="#" class="card-title font-weight-bolder text-white font-size-h6 mb-4 text-hover-state-dark d-block">Impression</a>

        <div class="font-weight-bold text-white font-size-sm"><span class="font-size-h2 mr-2">{{number_format($impression)}}</span>Impression this month</div>
    </div>
    <!--end::Body-->
</div>
<!--end::Stats Widget 23-->
    </div>
<div class="col-xl-4">
        <!--begin::Stats Widget 22-->
<div class="card card-custom bgi-no-repeat card-stretch gutter-b"
    style="background-position: right top; background-size: 30% auto; background-image: url({{url('public/assets/media/svg/shapes/abstract-3.svg')}})">
    <!--begin::Body-->
    <div class="card-body my-4">
        <a href="#" class="card-title font-weight-bolder text-info font-size-h6 mb-4 text-hover-state-dark d-block">Clicks</a>

        <div class="font-weight-bold text-muted font-size-sm"><span class="text-dark-75 font-weight-bolder font-size-h2 mr-2">{{number_format($click)}}</span>Clicks this month</div>   
    </div>
    <!--end::Body-->
</div>
<!--end::Stats Widget 22-->
</div>
</div>
<!--End::Row-->
<!--begin::Row-->
<div class="row">
   	<div class="col-lg-6">
        <!--begin::Example-->
   		<!--begin::Card-->
        <div class="card card-custom gutter-b">
        	<div class="card-header">
        		<div class="card-title">
        			<span class="card-icon">
                        <i class="flaticon2-line-chart text-primary"></i>
                    </span>
        			<h3 class="card-label">
        				Content Engagement
        				<small>summary</small>
        			</h3>
        		</div>
        	</div>
        	<div class="card-body">
        		{!! $usersChart->container() !!}
        	</div>
        </div>
    </div>
        <!--end::Card-->
        
        
   		<!--begin::Card-->
   		<div class="col-lg-6">
        <div class="card card-custom gutter-b">
        	<div class="card-header">
        		<div class="card-title">
                    <span class="card-icon">
                        <i class="flaticon2-line-chart text-primary"></i>
                    </span>
        			<h3 class="card-label">
        				Platform Reach
        				<small>summary</small>
        			</h3>
        		</div>
        	</div>
        	<div class="card-body">
        		{!! $platformReach->container() !!}
        	</div>
        </div>
    </div>
        <!--end::Card-->
        <!--end::Example-->
        </div>


 




</div>
<!--begin::Advance Table Widget 1-->
<div class="container">
<div class="card card-custom card-stretch gutter-b">
    <!--begin::Header-->
    <div class="card-header border-0 py-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bolder text-dark">Active Campaigns</span>
            <span class="text-muted mt-3 font-weight-bold font-size-sm">These are your 5 campaigns that are currently running</span>
        </h3>
        <div class="card-toolbar">
            <a href="{{url('brand/campaign/create')}}" class="btn btn-success font-weight-bolder font-size-sm"><i class="fas fa-bullhorn"></i> </span>Create Campaign
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
                        
                        
                        <th style="min-width: 200px">Campaign Name</th>
                        <th style="min-width: 150px">Platform</th>
                        <th style="min-width: 150px">tags</th>
                        
                    </tr>
                </thead>
                <tbody>
                	@forelse($campaign->take(5) as $cp)
                    <tr>
                        
                        <td class="pl-0">
                            <a href="{{url('brand/campaign/'.$cp->id.'/view')}}" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$cp->campaign_name}}</a>
                            <span class="text-muted font-weight-bold text-muted d-block">Category - {{$cp->niche}}</span>
                        </td>
                        <td >
                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">
                                {{ucfirst($cp->qualification)}}
                            </span>
                            <span class="text-muted font-weight-bold">
                                {{ucfirst($cp->service)}}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex flex-column w-100 mr-2">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                {{$cp->tags}}
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
<!--end::Advance Table Widget 1-->

</div>

</div>
</div>
</div>
@endsection


@section('footer')
{!! $usersChart->script() !!}
{!! $platformReach->script() !!}
@endsection