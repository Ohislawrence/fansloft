@extends('layouts.app5')

@section('title')
Proposals - {{ $campaign->campaign_name}} 
@parent
@stop


@section('bread1')
{{ $campaign->campaign_name}} - Proposals
@endsection
@section('bread2', 'Campaign')

@section('head')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@endsection


@section('actions')
@endsection

@section('content')
<div class="container">
           

<!--begin::Card-->
        <div class="card card-custom">
            <div class="card-header card-header-tabs-line">
                <div class="card-toolbar">
                    <ul class="nav nav-tabs nav-bold nav-tabs-line">
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="" href="{{ url('brand/campaign/'.$campaign->id.'/view/'.$campaign->amount)}}">
                                <span class="nav-icon"><i class="flaticon-browser"></i></span>
                                <span class="nav-text">Details</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="" href="{{url('brand/campaign/'.$campaign->id.'/proposal')}}">
                                <span class="nav-icon"><i class="flaticon-users"></i></span>
                                <span class="nav-text">Manage Proposals</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="" href="{{ url('brand/campaign/stats/'.$campaign->id.'/'.$campaign->amount)}}" role="button" aria-haspopup="true" aria-expanded="false">
                                <span class="nav-icon"><i class="flaticon-diagram"></i></span>
                                <span class="nav-text">Stats</span>
                            </a>
                            
                         </li>
                    </ul>
                </div>
                
            </div>
            <div class="card card-custom overflow-hidden gutter-b">
            <div class="card-body">
                <div class="tab-content">
                <!--begin::Accordion-->
                <div class="accordion accordion-solid accordion-toggle-plus" id="accordionExample3">
                    @forelse($proposal as $ps)
                    <div class="card">
                        <div class="card-header" id="headingTwo3">
                            <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseTwo{{$ps->id}}">
                               From {{$ps->user->name}} - Submitted {{ $ps->created_at->diffForHumans() }}  [{{ ucfirst($ps->status)}}]
                            </div>
                        </div>
                        <div id="collapseTwo{{$ps->id}}" class="collapse"  data-parent="#accordionExample3">
                            <div class="card-body">
                                <p>Bid - ₦{{$ps->bid}}</p>
                                <p>{{$ps->proposal}}</p>
            
                                <p><a href="{{ url('brand/campaign/proposal/'.$ps->id.'/view')}}" class="btn btn-primary">View Proposal</a></p>
                            
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="card">
                        <h3>No Proposal yet</h3>
                    </div>
                    @endforelse
                    
                </div>
                <!--end::Accordion-->	
			
	

</div>
</div>
</div>
</div>
</div>
</div>


@endsection

@section('footer')

<script src="{{url('public/assets/js/pages/widgets.js?v=7.0.6')}}"></script>
@endsection