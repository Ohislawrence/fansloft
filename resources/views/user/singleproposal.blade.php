@extends('layouts.app5')

@section('title')
Proposal View
@parent
@stop


@section('bread1', 'Proposal')
@section('bread2', 'View')

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
			<div class="card card-custom overflow-hidden gutter-b">
    			<div class="card-header">
		<div class="card-title">
			<h3 class="card-label">Details</h3>
		</div>
	</div>
<div class="card-body">
<h1 class="display-4 font-weight-bold mb-10">{{ $myproposal->campaign->campaign_name}}</h1>
<p>{{ $myproposal->campaign->desc }}</p>

<a href="{{ url('creator/campaign/'.$myproposal->campaign->id.'/view/'.$myproposal->campaign->amount)}}"> View Campaign</a>
<p></p>
<div class="border-bottom w-100"></div>
<p></p>



<p><span class="font-weight-boldest mb-2">Your Bid:</span><span class="opacity-70"> ₦ {{ number_format($myproposal->bid)}}</span></p>
@php
$bids = $myproposal->bid ;
$bi = $bids * 0.20;
$bb = $bids - $bi;

@endphp
<p><span class="font-weight-boldest mb-2">You will receive:</span><span class="opacity-70"> ₦ {{ number_format($bb)}}</span></p>

<p><span class="font-weight-boldest mb-2">Status:</span><span class="opacity-70"> {{ ucfirst($myproposal->status)}}</span></p>


<p></p>
<div class="border-bottom w-100"></div>
<p></p>
<p>
	<span class="font-weight-boldest mb-2">Your cover letter</span>
	<br/>
	<span class="opacity-70">{{ $myproposal->proposal}}</span>
</p>
</div>
</div>
				</div>
			</div>
		</div>
</div>
</div>
<!--begin::View-->

                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Card-->
                </div>
            </div>
@endsection

@section('footer')
<!--begin::Page Scripts(used by this page)-->
<script src="{{ url('public/assets/js/pages/custom/todo/todo.js?v=7.0.6')}}"></script><!--end::Page Scripts-->

@endsection