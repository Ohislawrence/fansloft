@extends('layouts.app5')

@section('title')
My Task
@parent
@stop

@section('bread1', 'Tasks')
@section('bread2', 'View Your Tasks')


@section('head')
@endsection

@section('content')

<div class="container">
<!--begin::Card-->
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

<div class="d-flex flex-column-fluid">
		<!--begin::Container-->
		<div class=" container " >
							<!--begin::Row-->
<div class="row" id="campaign-data">
    <!--begin::Col-->
    @forelse($task as $tk)
    <div class="col-xl-4">
		<!--begin::Card-->
		<div class="card card-custom gutter-b card-stretch">
			<!--begin::Body-->
            <div class="card-body">
				<!--begin::Info-->
				<div class="d-flex align-items-center">
                    
                    <!--begin::Info-->
                    <div class="d-flex flex-column mr-auto">
                        <!--begin: Title-->
						<div class="d-flex flex-column mr-auto">
						   <a href="#" class="text-dark text-hover-primary font-size-h4 font-weight-bolder mb-1">
							   {{ $tk->campaign->campaign_name}}
						   </a>
						   <span class="text-muted font-weight-bold">
							  Created By: {{ ucfirst($tk->campaign->user->brandname)}}
						   </span>
					   </div>
                        <!--end::Title-->
                    </div>
                    <!--end::Info-->
                    <!--begin::Toolbar-->
					<div class="card-toolbar mb-7">
					   <div class="dropdown dropdown-inline" data-toggle="tooltip"  data-placement="left">
						   <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							   <i class="ki ki-bold-more-hor"></i>
						   </a>
						   
					   </div>
				   </div>
                    <!--end::Toolbar-->
                </div>
                <!--end::Info-->
				<!--begin::Description-->
                <div class="mb-10 mt-5 font-weight-bold ">
                	{{mb_strimwidth($tk->campaign->desc, 0, 150, "...")}}
                </div>
                <!--end::Description-->
                @php
                $data = $tk->campaign->duration;
                $due = explode("-","$data");
                $due = $due[1];
                $start = substr($data, 0, 10);
                @endphp

				<!--begin::Data-->
				<div class="d-flex mb-5">
					<div class="d-flex align-items-center mr-7">
						<span class="font-weight-bold mr-4">
							Start
						</span>
						<span class="btn btn-light-primary btn-sm font-weight-bold btn-upper btn-text">{{$start}}</span>
					</div>
					<div class="d-flex align-items-center">
						<span class="font-weight-bold mr-4">
							Due
						</span>
						<span class="btn btn-light-danger btn-sm font-weight-bold btn-upper btn-text">{{$due}}</span>
					</div>
				</div> 
				<!--end::Data-->
            @php
                if($tk->link){
                $t1 = 35;
                }
                else{
                $t1 = 0;
                }
                if($tk->powfile){
                $t2 = 25;
                }
                else{
                $t2 = 0;
                }

                if($tk->numberoflikes){
                $t3 = 10;
                }
                else{
                $t3 = 0;
                }

                if($tk->numberofviews){
                $t4 = 10;
                }
                else{
                $t4 = 0;
                }

                if($tk->numberofclicks){
                $t5 = 10;
                }
                else{
                $t5 = 0;
                }

                if($tk->retweets){
                $t6 = 10;
                }
                else{
                $t6 = 0;
                }

                $tasktotal = $t1 + $t2 + $t3 + $t4 + $t5 + $t6;
            @endphp
				<!--begin::Progress-->
				<div class="d-flex mb-5 align-items-cente">
					<span class="d-block font-weight-bold mr-5">Updates </span>
					<div class="d-flex flex-row-fluid align-items-center">
						<div class="progress progress-xs mt-2 mb-2 w-100">
							<div class="progress-bar bg-success" role="progressbar" style="width: {{$tasktotal}}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
						<span class="ml-3 font-weight-bolder">{{$tasktotal}}%</span>
					</div>
				</div>
				<!--end::Progress-->
                <p> 
                            @if(strtotime($today) > strtotime($due))
                            <span class="label label-inline label-light-danger font-weight-bold">This campaign has ended</span>
                            @else
                            <span class="label label-inline label-light-primary font-weight-bold">This campaign is active</span>
                            @endif
                        </p>
			</div>
			<!--end::Body-->

			<!--begin::Footer-->
            <div class="card-footer d-flex align-items-center">
                <div class="d-flex">
                    <div class="d-flex align-items-center mr-7">
                                               
<a href="{{ url('creator/tasks/'.$tk->id.'/update')}}" class="btn btn-primary">Update Task</a>
                    </div>
                    
                </div>
            </div>
            <!--end::Footer-->
		</div>
		<!--end:: Card-->
	</div>
        @empty
        <div class="col-xl-12">
        <!--begin::Card-->
        <div class="card card-custom gutter-b card-stretch">
            <!--begin::Body-->
            <div class="card-body">
        <h1>You do not have tasks, yet</h1>
        <p>
            Your tasks are created when brands approve your proposal. To submit proposals, click on 'proposal' on the menu.
        </p>
    </div>
</div>
</div>
        @endforelse
   
    <!--end::Col-->
    </div>

            {{ $task->links('vendor.pagination.default')}}
            


 </div>

<!--end::Row-->
</div>
</div>
</div>

@endsection

@section('footer')



@endsection