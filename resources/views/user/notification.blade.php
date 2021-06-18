@extends('layouts.app5')

@section('title')
Notification
@parent
@stop

@section('bread1', 'Notifications')
@section('bread2', '')

@section('head')

@endsection

@section('actions')

@endsection
@section('content')
<div class="d-flex flex-column-fluid">
		<!--begin::Container-->
		<div class=" container ">
            @if(session()->has('message'))    
<div class="alert alert-custom alert-notice alert-light-primary fade show" role="alert">
    <div class="alert-icon"><i class="flaticon-info"></i></div>
    <div class="alert-text">{{ session()->get('message')}}</div>
    <div class="alert-close">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="ki ki-close"></i></span>
        </button>
    </div>
</div>
@endif
<!--begin::Row-->
<div class="row">
   	<div class="col-lg-12">
        <!--begin::Example-->
        <!--begin::Card-->
        @forelse(Auth::user()->notifications as $notification)
        <div class="card card-custom gutter-b" data-card="true" id="kt_card_1">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label"><i class="flaticon2-bell-4 text-dark"></i> {{$notification->created_at->diffForHumans()}}</h3>
                </div>
				<div class="card-toolbar">
					
                    <a  class="btn btn-icon btn-sm btn-hover-light-primary" data-toggle="modal" data-target="#deletethis{{$notification->id}}" data-placement="top" title="Delete this Notification">
						<i class="ki ki-close icon-nm"></i>
					</a>
				</div>
            </div>
            <div class="card-body">
                <p>
                    {{$notification->data['message']}}
                </p>
                <p>
                    <h6 class="card-label">{{ \Carbon\Carbon::parse($notification->created_at)->format('j F, Y') }}</h6>
                </p>
            </div>
        </div>

        <!-- Modal-->
<div class="modal fade" id="deletethis{{$notification->id}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">This action cannot be reversed!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                
                You are about to remove this notification.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cancel</button>
                <form action="{{ url('deletenotification/'.$notification->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-primary font-weight-bold" type="submit"><span class="navi-text">
                <span class="">Continue</span>
            </span></button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end modal--> 
        @empty
        No New Notification!
        @endforelse
        <!--end::Card-->

        </div>
    </div>
</div>
</div>
</div>


@endsection


@section('footer')
<script src="{{url('public/assets/js/pages/features/cards/tools.js?v=7.0.6')}}"></script>
@endsection