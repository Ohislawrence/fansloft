@extends('layouts.app5')

@section('title')
Update Task
@parent
@stop

@section('bread1', 'Tasks')
@section('bread2', 'Update Your Tasks')


@section('head')
@endsection

@section('actions')
<!--begin::Toolbar-->
@php
                if($task->link){
                $t1 = 35;
                }
                else{
                $t1 = 0;
                }
                if($task->powfile){
                $t2 = 25;
                }
                else{
                $t2 = 0;
                }

                if($task->numberoflikes){
                $t3 = 10;
                }
                else{
                $t3 = 0;
                }

                if($task->numberofviews){
                $t4 = 10;
                }
                else{
                $t4 = 0;
                }

                if($task->numberofclicks){
                $t5 = 10;
                }
                else{
                $t5 = 0;
                }

                if($task->retweets){
                $t6 = 10;
                }
                else{
                $t6 = 0;
                }

                $tasktotal = $t1 + $t2 + $t3 + $t4 + $t5 + $t6;

                if($task->is_complete == 1){
                $done = 'readonly';
            }else{
            $done = '';
            	}
            
            @endphp

                

            @if ($task->is_complete == 1)
            <button class="btn btn-transparent-white font-weight-bold  py-3 px-6 mr-2">
                    <i class="fas fa-thumbs-up"></i>Done
                </button> 
            @else
            	@if ($tasktotal > '90')
            <form action="{{ url('creator/tasks/'.$task->id.'/update')}}" method="post">
            @csrf
                <button type="submit" name="taskdone" class="btn btn-transparent-white font-weight-bold  py-3 px-6 mr-2">
                    <i class="fas fa-thumbs-up"></i>Mark as done
                </button> 
                </form>
                @else
                <button type="submit" class="btn btn-transparent-white font-weight-bold  py-3 px-6 mr-2" data-toggle="tooltip" title="Your progress is less than 90 %" data-placement="top">
                    <i class="fas fa-thumbs-up"></i>Mark as done
                </button>
                @endif
            @endif
            
        

        <!--end::Toolbar-->
@endsection

@section('content')
<!--begin::Entry-->
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
	<div class="card-body p-0">
							
				<!--end::Wizard Nav-->
			</div>
			<div class="row justify-content-center my-10 px-8 my-lg-15 px-lg-10">
				<div class="col-xl-12 col-xxl-7">
					<!--begin::Form Wizard-->
					
						<!--begin::Step 1-->
						<div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">

							<h3 class="mb-10 font-weight-bold text-dark">{{ ucfirst($task->campaign->campaign_name)}}
								<br><span class="font-size-lg">Update this task.</span></h3>
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
								<hr>
							<div class="row">
								<div class="col-xl-12">
			<form class="form" id="kt_projects_add_form" action="{{ url('creator/tasks/'.$task->id.'/update')}}" method="post" enctype="multipart/form-data">
            @csrf
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">Link to post</label>
										<div class="col-lg-9 col-xl-9">
											<input class="form-control form-control-lg form-control-solid" name="link" type="text" value="{{$task->link}}" {{$done}} />
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">Number of likes</label>
										<div class="col-lg-9 col-xl-9">
											<input class="form-control form-control-lg form-control-solid" name="numberoflikes" type="text" value="{{$task->numberoflikes}}" {{$done}} />
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">Number of retweets/share</label>
										<div class="col-lg-9 col-xl-9">
											<input class="form-control form-control-lg form-control-solid" name="retweets" type="text" value="{{$task->retweets}}" {{$done}} />
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">Number of impressions</label>
										<div class="col-lg-9 col-xl-9">
											<input class="form-control form-control-lg form-control-solid" name="impressions" type="text" value="{{$task->impressions}}" {{$done}} />
											<span class="form-text text-muted">How many times has the post being viewed.</span>
										</div>
									</div>
									
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">Number of reach</label>
										<div class="col-lg-9 col-xl-9">
											<div class="input-group input-group-lg input-group-solid">
												
												<input type="text" class="form-control form-control-lg form-control-solid" name="numberofviews" value="{{$task->numberofviews}}" placeholder="Number of Views"  {{$done}} />
											</div>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">Clicks</label>
										<div class="col-lg-9 col-xl-9">
											
												<input type="text" class="form-control form-control-lg form-control-solid" name="numberofclicks" placeholder="number of clicks" value="{{$task->numberofclicks}}"  {{$done}}/>
												
											</div>
										</div>

<div class="form-group row">
	<label class="col-xl-3 col-lg-3 col-form-label">Screen shot of analytics</label>
		<div class="col-lg-9 col-xl-9">

<div class="image-input" id="kt_image_2">
	<div class="image-input-wrapper" style="background-image: url({{ url('public/uploads/proveofwork/'.$task->powfile)}})"></div>


	<label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Add a analytics screen">
		<i class="fa fa-pen icon-sm text-muted"></i>
		<input type="file" name="powfile" accept=".png, .jpg, .jpeg"/>
		<input type="hidden" name="profile_avatar_remove"/>
	</label>

	<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
		<i class="ki ki-bold-close icon-xs text-muted"></i>
	</span>
</div>
</div></div>



									</div>
								</div>
							</div>
							

						<!--begin::Actions-->
						<div class="d-flex justify-content-between border-top mt-5 pt-10">
                            
                            <div>
                                <button type="submit" id="submit-data" name="updatedate" class="btn btn-success font-weight-bold text-uppercase px-9 py-4" data-wizard-type="action-submit">
                                    Update this task
                                </button>
                            </div>
                        </div>
                        <!--end::Actions-->
					</form>
					<!--end::Form Wizard-->
				</div>
			</div>
		</div>
	</div>
</div>
<!--end::Card-->
					</div>
		<!--end::Container-->
	</div>
<!--end::Entry-->
				</div>
			
		</div>
				<!--end::Content-->
						</div>
						<!--end::Step 1-->



</div>
@endsection

@section('footer')
<script type="text/javascript">
var avatar2 = new KTImageInput('kt_image_2');
</script>


@endsection