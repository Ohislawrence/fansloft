@extends('layouts.app5')

@section('title')
Dashboard
@parent
@stop

@section('bread1', 'Dashboard')
@section('bread2', 'My Dashboard')

@section('head')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8">
</script>
@endsection

@section('content')
<div class="container">
    <div class="row">
<div class="col-xl-12">
                <!--begin::Tiles Widget 22-->
<div class="card card-custom bgi-no-repeat gutter-b"
    style="height: 150px; background-color: #1B283F; background-position: calc(100% + 0.5rem) calc(100% + 0.5rem); background-size: 100% auto; background-image: url({{url('public/assets/media/svg/patterns/taieri.svg')}})">
    <!--begin::Body-->
    <div class="card-body">
        <h3 class="text-white font-weight-bolder">Welcome {{ucfirst(Auth::user()->brandname)}},</h3>
        <!--if goes here -->
        @if(!Auth::user()->gender)
        <p class="text-white font-size-lg mt-5 mb-10">
            Update your profile so brands can see it and send you gigs, you will not be approved without a completed profile.
        </p>
        <a href="{{url('creator/profile')}}" class="btn btn-link btn-link-warning font-weight-bold">
            Update your profile <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
        @else 
        <p class="text-white font-size-lg mt-5 mb-10">
            You can start sending proposals to campaign.
        </p>
        <a href="{{url('creator/campaigns')}}" class="btn btn-link btn-link-warning font-weight-bold">
            Apply to Campaigns <i class="fa fa-arrow-right" aria-hidden="true"></i></a>  
        @endif
        
        
    </div>
    <!--end::Body-->
    </div>
</div>
</div>
<!--end::Row head-->
	<!--Begin::Row-->
<div class="row">
    <div class="col-xl-4">
        <!--begin::Stats Widget 22-->
<div class="card card-custom bgi-no-repeat card-stretch gutter-b"
    style="background-position: right top; background-size: 30% auto; background-image: url({{url('public/assets/media/svg/shapes/abstract-3.svg')}})">
    <!--begin::Body-->
    <div class="card-body my-4">
        <a href="#" class="card-title font-weight-bolder text-info font-size-h6 mb-4 text-hover-state-dark d-block">Your Earnings</a>

        <div class="font-weight-bold text-muted font-size-sm"><span class="text-dark-75 font-weight-bolder font-size-h2 mr-2">₦ {{number_format($earningthismonth)}}</span>Earnings this month</div>   
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
        <a href="#" class="card-title font-weight-bolder text-white font-size-h6 mb-4 text-hover-state-dark d-block">Your Earnings</a>

        <div class="font-weight-bold text-white font-size-sm"><span class="font-size-h2 mr-2">₦ {{number_format($earninglastmonth)}}</span>Earnings last month</div>
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
        <a href="#" class="card-title font-weight-bolder text-info font-size-h6 mb-4 text-hover-state-dark d-block">Open Tasks</a>

        <div class="font-weight-bold text-muted font-size-sm"><span class="text-dark-75 font-weight-bolder font-size-h2 mr-2">{{number_format($opentaskthismonth)}}</span>Open tasks this month</div>   
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
        				Platform Followers %
        				<small>summary</small>
        			</h3>
        		</div>
        	</div>
        	<div class="card-body">
        		{!! $PlatformFollowers->container() !!}
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
        				Your Task
        				<small>summary</small>
        			</h3>
        		</div>
        	</div>
        	<div class="card-body">
        		{!! $OpenTask->container() !!}
        	</div>
        </div>
    </div>
        <!--end::Card-->
        <!--end::Example-->
        </div>

<!--begin::Advance Table Widget 1-->
<div class="">
<div class="card card-custom card-stretch gutter-b">
    <!--begin::Header-->
    <div class="card-header border-0 py-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bolder text-dark">Active Tasks</span>
            <span class="text-muted mt-3 font-weight-bold font-size-sm">Your active tasks for the month.</span>
        </h3>
        <div class="card-toolbar">
            <a href="{{url('creator/campaigns')}}" class="btn btn-success font-weight-bolder font-size-sm"><i class="fas fa-bullhorn"></i> </span>View Campaigns
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
                        <th style="min-width: 150px">Due date</th>
                        <th style="min-width: 150px">% Completion</th>
                        
                    </tr>
                </thead>
                <tbody>
                	@forelse($taskthismonth->take(5) as $ttm)
                    <tr>
                        
                        <td class="pl-0">
                            <a href="" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$ttm->campaign->campaign_name}}</a>
                            <span class="text-muted font-weight-bold text-muted d-block">Category - {{$ttm->campaign->niche}}</span>
                        </td>
                        <td >
                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">
                @php
                $data = $ttm->campaign->duration;
                $due = explode("-","$data");
                $due = $due[1];
                $start = substr($data, 0, 10);
                @endphp
                                {{$due}}
                            </span>
                            <span class="text-muted font-weight-bold">
                                {{ucfirst($ttm->platform)}}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex flex-column w-100 mr-2">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                @php
                if($ttm->link){
                $t1 = 35;
                }
                else{
                $t1 = 0;
                }
                if($ttm->powfile){
                $t2 = 25;
                }
                else{
                $t2 = 0;
                }

                if($ttm->numberoflikes){
                $t3 = 10;
                }
                else{
                $t3 = 0;
                }

                if($ttm->numberofviews){
                $t4 = 10;
                }
                else{
                $t4 = 0;
                }

                if($ttm->numberofclicks){
                $t5 = 10;
                }
                else{
                $t5 = 0;
                }

                if($ttm->retweets){
                $t6 = 10;
                }
                else{
                $t6 = 0;
                }

                $tasktotal = $t1 + $t2 + $t3 + $t4 + $t5 + $t6;
            @endphp
				<!--begin::Progress-->
				<div class="d-flex mb-5 align-items-cente">
					
					<div class="d-flex flex-row-fluid align-items-center">
						{{$tasktotal}}%
						<progress value="{{$tasktotal}}" max="100">

						
					</div>
				</div>
				<!--end::Progress-->
                  </div>
                        </td>
                    </tr>
                @empty
                <h3>No active task</h3>
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
@endsection


@section('footer')
{!! $OpenTask->script() !!}
{!! $PlatformFollowers->script() !!}
@endsection