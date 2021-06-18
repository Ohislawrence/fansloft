@extends('layouts.app5')

@section('title')
Edit Plan
@parent
@stop

@section('bread1', 'Edit Plan')
@section('bread2', ' Subscription')

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
					Create New Plan 
				</h3>
	
			</div>
			<!--begin::Form-->
			<form method="post" action="{{url('admin/editplan/'.$plan->id)}}">
				{{ csrf_field() }}
				 
				<div class="card-body">
				
					<div class="form-group">
						<label>Plan Name</label>
						<input type="text" name="name" class="form-control" value="{{$plan->name}}" />
						<span class="form-text text-muted">Name of plan</span>
					</div>

					<div class="form-group">
						<label>Description</label>
						<textarea type="text" name="description" rows="5" class="form-control" value="{{$plan->description}}" >{{$plan->description}}</textarea>
						<span class="form-text text-muted"></span>
					</div>

					<div class="form-group">
						<label>Price</label>
						<input type="text" name="price" class="form-control" value="{{$plan->price}}" />
						<span class="form-text text-muted"></span>
					</div>

					<div class="form-group">
						<label>Signup Fee</label>
						<input type="text" name="signup_fee" class="form-control" value="{{$plan->signup_fee}}" />
						<span class="form-text text-muted"></span>
					</div>

					<div class="form-group">
						<label>Invoice Period</label>
						<input type="text" name="invoice_period" class="form-control" value="{{$plan->invoice_period}}" />
						<span class="form-text text-muted"></span>
					</div>

					<div class="form-group">
						<label>Trial Period</label>
						<input type="text" name="trial_period" class="form-control" value="{{$plan->trial_period}}" />
						<span class="form-text text-muted"></span>
					</div>

					<div class="form-group">
						<label>Trial Interval</label>
						<input type="text" name="trial_interval" class="form-control" value="{{$plan->trial_interval}}" />
						<span class="form-text text-muted"></span>
					</div>

					<div class="form-group">
						<label>Sort Order</label>
						<input type="number" name="sort_order" class="form-control" value="{{$plan->sort_order}}" />
						<span class="form-text text-muted"></span>
					</div>

					<div class="form-group">
						<label for="exampleSelect1">Currency</label>
						<select class="form-control" name="currency" id="exampleSelect1">
							<option value="{{$plan->currency}}">{{$plan->currency}}</option>
							<option value="USD">USD</option>
							<option value="NGN">NGN</option>
							<option value="CAD">CAD</option>
							</select>
					</div>

					<div class="form-group">
						<label for="exampleSelect1">Active?</label>
						<select class="form-control" name="is_active" id="exampleSelect1">
							<option value="{{$plan->is_active}}">{{$plan->is_active}}</option>
							<option value="0">No</option>
							<option value="1">Yes</option>
							
							</select>
					</div>
					
				</div>
				<div class="card-footer">
					<button type="submit" class="btn btn-primary mr-2">Save</button>
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