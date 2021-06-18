@extends('layouts.app5')

@section('title')
Withdrawal request edit
@parent
@stop

@section('bread1', 'Withdrawal request')
@section('bread2', 'Withdrawal request edit')

@section('head')

@endsection

@section('actions')
 
@endsection


@section('content')

<div class="d-flex flex-column-fluid">
		<!--begin::Container-->
		<div class=" container ">
			<!--alert message-->
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
<!--alert end-->
<div class="card card-custom gutter-b example example-compact">
			<div class="card-header">
				<h3 class="card-title">
					Withdrawal request for 
				</h3>
	
			</div>
			<!--begin::Form-->
			<form method="post" action="{{url('admin/bank/withdrawalrequest/'.$transaction->id.'/edit')}}">
				{{ csrf_field() }} 
				<div class="card-body">
				
					<div class="form-group">
						<label>Request Amount</label>
						<input type="text" name="amount" class="form-control"  value="{{$transaction->amount}}" />
						<span class="form-text text-muted">Amount requested for</span>
					</div>
					
					<div class="form-group">
						<label>Description:</label>
						<p class="form-control-plaintext text-muted">{{$transaction->desc}}</p>
					</div>
					<div class="form-group">
						<label for="exampleSelect1">Status</label>
						<select class="form-control" name="status" id="exampleSelect1">
							<option value="{{$transaction->comfirmed}}">{{$transaction->comfirmed}}</option>
							<option value="1">1- success</option>
							<option value="2">2- fail</option>
							<option value="3">3- Under Review</option>
							
						</select>
					</div>
					<div class="form-group">
						<label for="exampleSelect2">Type</label>
						<select class="form-control" name="type" id="exampleSelect2">
							<option value="{{$transaction->type}}">{{$transaction->type}}</option>
							<option value="paid">Paid</option>
							<option value="payment_request">Payment Request</option>
							
							
						</select>
					</div>
				</div>
				<div class="card-footer">
					<button type="submit" class="btn btn-primary mr-2">Submit</button>
					<button type="reset" class="btn btn-secondary">Cancel</button>
				</div>
			</form>
			<!--end::Form-->
		</div>
		<!--end::Card-->


</div>
</div>
</div>
@endsection




@section('footer')

@endsection