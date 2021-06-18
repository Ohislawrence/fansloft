@extends('layouts.app5')

@section('title')
View Proposal
@parent
@stop

@section('bread1', 'Proposal')
@section('bread2', 'View Proposal')

@section('head')

@endsection


@section('content')
<div class="d-flex flex-column-fluid">
		<!--begin::Container-->
		<div class=" container ">
<!--alert-->
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
@php
if($proposal->link){
                $t1 = 35;
                }
                else{
                $t1 = 0;
                }
                if($proposal->powfile){
                $t2 = 25;
                }
                else{
                $t2 = 0;
                }

                if($proposal->numberoflikes){
                $t3 = 10;
                }
                else{
                $t3 = 0;
                }

                if($proposal->numberofviews){
                $t4 = 10;
                }
                else{
                $t4 = 0;
                }

                if($proposal->numberofclicks){
                $t5 = 10;
                }
                else{
                $t5 = 0;
                }

                if($proposal->retweets){
                $t6 = 10;
                }
                else{
                $t6 = 0;
                }

                $tasktotal = $t1 + $t2 + $t3 + $t4 + $t5 + $t6;
                @endphp




			<div class="card card-custom overflow-hidden gutter-b">
    			<div class="card-header">
		<div class="card-title">
			<h3 class="card-label">Proposal for - {{ $proposal->campaign->campaign_name}}</h3>
		</div>
	</div>
<div class="card-body">
<h3 class="display-4 font-weight mb-10">Submitted by {{ $proposal->user->name}}</h3>
<h6 class="">The Proposal</h6>
<p>{{ $proposal->proposal}}</p>
<p></p>

<p></p>
<div class="border-bottom w-100"></div>
<p></p>

<p><span class="font-weight-boldest mb-2">Creators Bid:</span><span class="opacity-70"> ₦ {{ number_format($proposal->bid)}}</span></p>

<p><span class="font-weight-boldest mb-2">Your Total Budget:</span><span class="opacity-70"> ₦ {{ number_format($proposal->campaign->budget)}}</span></p>

<p><span class="font-weight-boldest mb-2">Status:</span><span class="opacity-70"> {{ ucwords($proposal->status)}}</span></p>




				</div>
			</div>
		</div>
</div>
</div>


<div class="container">
    <div class="card card-custom gutter-b">
    <div class="card-body">
        <!--begin::Top-->
        <div class="d-flex">
            <!--begin::Pic-->
            <div class="flex-shrink-0 mr-7">
                <div class="symbol symbol-50 symbol-lg-120">
                <img src="{{ url('public/uploads/avatars/'.$proposal->user->avatar)}}">
                                        </div>
            </div>
            <!--end::Pic-->

            <!--begin: Info-->
            <div class="flex-grow-1">
                <!--begin::Title-->
                <div class="d-flex align-items-center justify-content-between flex-wrap mt-2">
                    <!--begin::User-->
                    <div class="mr-3">
                        <!--begin::Name-->
                        <a href="#" class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">
                            {{ $proposal->user->name}} <i class="flaticon2-correct text-success icon-md ml-2"></i>
                        </a>
                        <!--end::Name-->

                        <!--begin::Contacts-->
                        <div class="d-flex flex-wrap my-2">
                            <a href="#" class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
<i class="las la-transgender-alt text-info icon-lg"></i>{{ $proposal->user->gender}}
                            </a>
                            <a href="#" class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
<i class="las la-users text-info icon-lg"></i></i> {{ $proposal->user->maincategory}}
                            </a>
                            <a href="#" class="text-muted text-hover-primary font-weight-bold">
<i class="las la-map-marker text-info icon-lg"></i> {{ $proposal->user->country}}
                            </a>
                        </div>
                        <!--end::Contacts-->
                    </div>
                    <!--begin::User-->

                    <!--begin::Actions-->
                    <div class="my-lg-0 my-1 ">
                        <a href="{{url('loft/'.$proposal->user->brandname)}}" target="_blank" class="btn btn-sm btn-primary font-weight-bolder text-uppercase"><strong>View Profile <i class="fas fa-external-link-alt "></i></strong></a>
                        @if($proposal->status == 'approved' OR $proposal->status == 'completed')
                        <button class="btn btn-sm btn-primary font-weight-bolder text-uppercase">Approved</button>
                    	@else
                        <form method="POST" action="{{ route('viewproposalpost', $proposal->id)}}">
                            {{ method_field('PUT') }}
                        	@csrf
                        	
                    <button name="submit" type="submit" class="btn btn-sm btn-primary font-weight-bolder text-uppercase"><strong>Approve</strong>
                    </button>
                    </form>
                    @endif
                    </div>
                    <!--end::Actions-->
                </div>
                <!--end::Title-->

                <!--begin::Content-->
                <div class="d-flex align-items-center flex-wrap justify-content-between">
                    <!--begin::Description-->
                    <div class="flex-grow-1 font-weight-bold text-dark-50 py-2 py-lg-2 mr-5">
                        {{ $proposal->user->bio}}
                    </div>
                    <!--end::Description-->
                     @if($proposal->user->morecategory)
<div class="d-flex align-items-center flex-wrap justify-content-between">
<div class="d-flex flex-column text-dark-75">
            <span class="font-weight-bolder font-size-sm">Interests : </span></div>
  @foreach(json_decode($proposal->user->morecategory) as $cate)
   <span class="label label-info label-inline mr-2">{{ $cate }}</span>
  @endforeach

                    </div>
                    <!--end::Progress-->
                    @else
                    @endif

                    
                </div>
                <!--end::Content-->
            </div>
            <!--end::Info-->
        </div>
        <!--end::Top-->
        <!--begin::Separator-->
        <div class="separator separator-solid my-7"></div>
        <!--end::Separator-->
        <div class="d-flex align-items-center flex-wrap">
        <!--begin::Bottom-->
                    @forelse($proposal->user->platform as $pup)
                    @if($pup->platform == 'Twitter')    
            <!--begin: Item-->
            <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                <span class="mr-4">
                    <i class="socicon-twitter text-primary icon-2x"></i>
                    </span>

                <div class="d-flex flex-column text-dark-75">
                    <span class="font-weight-bolder font-size-sm">Followers</span>
                    <span class="font-weight-bolder font-size-h5">{{ thousandsCurrencyFormat($pup->followers)}}</span>
                </div>
            </div>
            @endif
                    @if($pup->platform == 'Instagram')
                    <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                <span class="mr-4">
                    <i class="socicon-instagram text-danger icon-2x"></i>
                    </span>

                <div class="d-flex flex-column text-dark-75">
                    <span class="font-weight-bolder font-size-sm">Followers</span>
                    <span class="font-weight-bolder font-size-h5">{{ thousandsCurrencyFormat($pup->followers)}}</span>
                </div>
            </div>
                    @endif
            @if($pup->platform == 'Tiktok')
                    <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                <span class="mr-4">
                    <i class="fab fa-tiktok text-dark icon-2x"></i>
                    </span>

                <div class="d-flex flex-column text-dark-75">
                    <span class="font-weight-bolder font-size-sm">Followers</span>
                    <span class="font-weight-bolder font-size-h5">{{ thousandsCurrencyFormat($pup->followers)}}</span>
                </div>
            </div>
                    @endif
                    
            
            @empty
            <h5>No platform added</h5>
            @endforelse
        
            <!--end: Item-->
            <!--end: Item-->
                                    <!--begin: Item-->
            <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                <span class="mr-4">
                    <i class="flaticon-file-2 icon-2x text-muted font-weight-bold"></i>
                </span>
                <div class="d-flex flex-column flex-lg-fill">
                    <span class="text-dark-75 font-weight-bolder font-size-sm">Completed Tasks</span>
                    <span class="font-weight-bolder font-size-h5">{{ thousandsCurrencyFormat($proposal->user->proposal->where('is_complete',1)->count())}}</span>
                </div>
            </div>
            <!--end: Item-->
            </div>

            </div>
        </div>
    
        <!--end::Bottom-->
@if($proposal->status == 'approved' || $proposal->status == 'completed')
            
        <div class="card card-custom overflow-hidden gutter-b">
                <div class="card-header">
        <div class="card-title">
            @if($proposal->status == 'approved')
            <h3 class="card-label">This task has been assigned to {{ $proposal->user->name}}</h3>
            @elseif($proposal->status == 'completed')
            <h3 class="card-label">{{ $proposal->user->name}} has completed this task</h3>
            @endif
        </div>
    </div>
<div class="card-body">

        <h6 class="">
            @if($proposal->is_complete == 1 )
            {{ $proposal->user->name }} has completed this task.
            @else
            This task is in progress.....
            @endif
            </h6>

<p>You can see the link to the campaign here and review the metrics here. The creator will only receive payments when the task has been done.</p>

<p>
    <!--begin::Progress-->
                <div class="d-flex mb-5 align-items-cente">
                    <span class="d-block font-weight-bold mr-5">Progress </span>
                    <div class="d-flex flex-row-fluid align-items-center">
                        <div class="progress progress-xs mt-2 mb-2 w-100">
                            <div class="progress-bar bg-success" role="progressbar" style="width: {{$tasktotal}}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="ml-3 font-weight-bolder">{{$tasktotal}}%</span>
                    </div>
                </div>
                <!--end::Progress-->
</p>
<div class="border-bottom w-100"></div>
<p></p>

<p><span class="font-weight-boldest mb-2">Task link:</span><span class="opacity-70"> <a href="{{ $proposal->link}}" target="_blank">{{ ($proposal->link)}}</a></span></p>

<p><span class="font-weight-boldest mb-2">Impression: </span><span class="opacity-70"> {{ number_format($proposal->impressions)}}</span></p>

<p><span class="font-weight-boldest mb-2">Reach: </span><span class="opacity-70"> {{ number_format($proposal->numberofviews)}}</span></p>

<p><span class="font-weight-boldest mb-2">Likes: </span><span class="opacity-70"> {{ number_format($proposal->numberoflikes)}}</span></p>

<p><span class="font-weight-boldest mb-2">Retweet/Reshare: </span><span class="opacity-70"> {{ number_format($proposal->retweets)}}</span></p>

<p><span class="font-weight-boldest mb-2">Clicks: </span><span class="opacity-70"> {{ number_format($proposal->numberofclicks)}}</span></p>




                </div>
            </div>
        </div>
@else

@endif     


</div>
<!--begin::Body-->
</div>
</div>
</div>
                                <!--end::Toolbar-->
                            </div>
                            <!--end::Header-->
                            
                                                <!--end::Actions-->

                                                <!--begin::Toolbar-->
                                                
                                                <!--end::Toolbar-->
                                            </div>
                                            <!--end::Footer-->
                                        </form>
                                        <!--end::Form-->
                                    </div>
                                </div>
                            </div>
                            <!--end::Reply-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Card-->

                </div>
            </div>
        </div>
        </div>


@endsection

@section('footer')
<!--begin::Page Scripts(used by this page)-->
<script src="{{ url('public/assets/js/pages/custom/todo/todo.js?v=7.0.6')}}"></script><!--end::Page Scripts-->
<!--begin::Page Vendors(used by this page)-->

                        <!--end::Page Scripts-->
@endsection