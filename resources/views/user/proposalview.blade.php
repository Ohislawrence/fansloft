@extends('layouts.app5')

@section('title')
My Proposal
@parent
@stop


@section('bread1', 'Proposal')
@section('bread2', 'My Proposals')

@section('head')

@endsection

@section('content')
<div class="d-flex flex-column-fluid">
		<!--begin::Container-->
		<div class=" container ">
			<div class="card card-custom gutter-b">
   <div class="card-body">
    <div class="row align-items-center">
        <div class="col-lg-9 col-xl-8">
        
 <form action="{{ url('creator/proposal/view')}}" method="GET">
            
<div class="row align-items-center">
        <div class="col-md-6 my-2 my-md-0 ">
            <div class="d-flex align-items-center">
                <label class="mr-3 mb-0 d-none d-md-block">Status:</label>
                <select class="form-control" name="status" id="status" >
                    <option value="">All</option>
                    @foreach($status as $status)
                    <option>{{ ucfirst($status) }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        

    <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
            <input type="submit" class="btn btn-light-primary px-6 font-weight-bold" value="Filter" name="">
        </div>
    </div>
    </div>
</div>   </form>

<!--end::Notice-->
</div></div></div></div>
<div class="d-flex flex-column-fluid">
		<!--begin::Container-->
		<div class=" container ">


<div class="row">
	@forelse($vproposal as $vp)
   	<div class="col-lg-6">
   		
<div class="bg-white rounded p-10 gutter-b">
       		<!--begin::Card-->
            <div class="card card-custom card-fit card-border">
            	<div class="card-header">
            		<div class="card-title">
                        <span class="card-icon">
                            <i class="fas fa-bullhorn"></i>
                        </span>
            			<h3 class="card-label">
            				{{ $vp->campaign->campaign_name}}
            				<small> - {{ ucfirst($vp->campaign->niche)}}</small>
            			</h3>
            		</div>
            	</div>
            	<p></p>
            	<div class="card-body pt-2">
            		Your Proposal<br/>
            		Initiated : <span class="opacity-70">{{ $vp->created_at->diffForHumans() }} </span><br/>
            		<a class="" href="{{ url('creator/myproposal/'. $vp->id.'/view')}}">{{ mb_strimwidth($vp->campaign->desc, 0, 170, "...more")}}</a><br/>
            		<span class="label label-info label-inline mr-2">{{ ucfirst($vp->status)}}</span>
            	</div>
            
            </div>
        </div>
    </div>
@empty
				<h1>You have not submitted any proposal yet.</h1>
				@endforelse
</div>

</div>

</div>

</div>
<div class="container">
	{{ $vproposal->links('vendor.pagination.default')}}
</div>

@endsection

@section('footer')

@endsection