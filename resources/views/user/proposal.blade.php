@extends('layouts.app5')

@section('title')
Send Proposal
@parent
@stop


@section('bread1', 'Proposal')
@section('bread2', 'Send Proposal')

@section('head')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@endsection


@section('content')
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
							<!-- begin::Card-->
<div class="card card-custom overflow-hidden gutter-b">
    <div class="card-body p-0">
        <!-- begin: Invoice-->
        <!-- begin: Invoice header-->
        <div class="row justify-content-center py-8 px-8 py-md-27 px-md-0">
            <div class="col-md-9">
                <div class="">
                    <h1 class="display-4 font-weight-boldest mb-10">{{ $campaign->campaign_name}}</h1>
                    <div class="d-flex flex-column  px-0">
                        <!--begin::Logo-->
                        <span class="opacity-50">By {{ $campaign->user->brandname}}</span>
                        <a href="" class="mb-5">

                            <img src="{{url('public/uploads/avatars/'.$campaign->user->avatar)}}" width="70px" alt="logo"/>
                        </a>
                        <!--end::Logo-->
                        <p> 
                            @if(strtotime($today) > strtotime($due))
                            <span class="label label-inline label-light-danger font-weight-bold">This campaign has ended</span>
                            @else
                            <span class="label label-inline label-light-primary font-weight-bold">This campaign is active</span>
                            @endif
                        </p>
                        <h3>Description</h3>
                        <p><span class=" d-flex flex-column opacity-90">
                            {{ $campaign->desc}}
                        </span>
                    </p>
                    <p>
                        <h3>What you will do</h3>
                        <span class=" d-flex flex-column opacity-90">
                            {{ $campaign->details}}
                        </span>
                    </p>
                    <p>
                        <h3>Call To Action</h3>
                        <span class=" d-flex flex-column">
                            <h6><span class=" d-flex flex-column  opacity-80">{{ $campaign->cta}}</span></h6>
                        </span>
                    </p>
                    <p><h3>Product/Service website address</h3>
                            <p><a href="{{ $campaign->link}}" target="_blank">{{ $campaign->link}}</a></p>
                        
                    </p>
                    <p><h3>Hashtags #</h3>
                            <span class=" d-flex flex-column  opacity-80">{{ $campaign->tags}}</span>
                        
                    </p>
                    <p><h3>Quotes @</h3>
                            <span class=" d-flex flex-column  opacity-80">{{ $campaign->quotes}}</span>
                        
                    </p>
                    <p>
@if($campaign->interests)
<div class="d-flex align-items-center flex-wrap">
<div class="d-flex flex-column text-dark-75">
            <span class="font-weight-bolder font-size-sm">Interests : </span></div>
  @forelse(json_decode($campaign->interests) as $cate)
   <span class="label label-info label-inline mr-2">{{ $cate }}</span>
   @empty
  @endforelse

                    </div>
                    <!--end::Progress-->
@else
@endif
                    </p>
                    </div>
                </div>
                <!--begin::Image-->
  <p><h3>Campaign Assets </h3>
    <span class=" d-flex flex-column  opacity-60">click to download</span>

               <p> <div class="row">
 

                    
                    @forelse(json_decode($campaign->media) as $camassets)
                    <div class="col-xl-4 gutter-b">
                      <a href="{{ url('public/uploads/campaign/'.$camassets)}}" download="fansloft_dot_com_campaign_asset">   
                    <div class="bgi-no-repeat bgi-size-cover rounded min-h-180px w-180" style="background-image: url({{ url('public/uploads/campaign/'.$camassets)}})" ></div>
                     </div>
                 </a>
                    @empty
                    <span class=" d-flex flex-column  opacity-80">Non added</span>
                    @endforelse
                    </p>
                </p>


                
                </div>
            
                    <!--end::Image-->
            </div>
        </div>
        <!-- end: Invoice header-->

        <!-- begin: Invoice body-->
        <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
            <div class="col-md-9">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="pl-0 font-weight-bold text-muted  text-uppercase"></th>
                                <th class="text-right font-weight-bold text-muted text-uppercase"></th>
                                <th class="text-right font-weight-bold text-muted text-uppercase">Info</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            
                            <tr class="font-weight-boldest">
                                <td class="pl-0 pt-7">Campaign(Start-End)</td>
                                <td class="text-right pt-7 opacity-70">{{ $campaign->duration}}</td>
                                <td class="text-danger border-top-0 pr-0 py-4 text-right">
                                    @if(strtotime($today) >= strtotime($due))
                                    <i class="fa fa-times text-danger mr-5"></i>
                                    @else
                                    <i class="fa fa-check text-primary mr-5"></i>
                                    @endif
                                </td>
                            
                            </tr>
                            
                            <tr class="font-weight-boldest border-bottom-0">
                                <td class="border-top-0 pl-0 py-4">Platform/Service</td>
                                <td class="border-top-0 text-right py-4 opacity-70">{{ ucfirst($campaign->qualification)}} / {{ ucfirst($campaign->service)}}</td>
                                <td class="text-danger border-top-0 pr-0 py-4 text-right">
                                    
                                </td>
                                
                            </tr>
                            <tr class="font-weight-boldest border-bottom-0">
                                <td class="border-top-0 pl-0 py-4">Category</td>
                                <td class="border-top-0 text-right py-4 opacity-70">{{ ucfirst($campaign->niche) }}</td>
                                <td class="text-danger border-top-0 pr-0 py-4 text-right">
                                    @if($campaign->niche == Auth::user()->maincategory)
                                    <i class="fa fa-check text-danger mr-5"></i>
                                    @else
                                    <i class="fa fa-times text-danger mr-5"></i>
                                    @endif</td>
                                
                            </tr>
                            <tr class="font-weight-boldest border-bottom-0">
                                <td class="border-top-0 pl-0 py-4">Gender</td>
                                <td class="border-top-0 text-right py-4 opacity-70">{{ ucfirst($campaign->gender)}}</td>
                                <td class="text-danger border-top-0 pr-0 py-4 text-right">
                                    @if($campaign->gender == Auth::user()->gender || $campaign->gender == 'Both')
                                    <i class="fa fa-check text-primary mr-5"></i>
                                    @else
                                    <i class="fa fa-times text-danger mr-5"></i>
                                    @endif
                                </td>
                                
                            </tr>
                            <tr class="font-weight-boldest border-bottom-0">
                                <td class="border-top-0 pl-0 py-4">Minimum Followers</td>
                                <td class="border-top-0 text-right py-4 opacity-70">{{ $campaign->minfollowers}}</td>
                                <td class="text-danger border-top-0 pr-0 py-4 text-right">
                                    @if($campaign->minfollowers <= Auth::user()->platform->sum('followers'))
                                    <i class="fa fa-check text-primary mr-5"></i>
                                    @else
                                    <i class="fa fa-times text-danger mr-5"></i>
                                    @endif
                                </td>
                                
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
        <!-- end: Invoice body-->

        
        
		<!--begin::Container-->
		
@if(strtotime($today) > strtotime($due))
<div class="card card-custom gutter-b">
            
            <div class="card-header">
                <h3 class="card-title">
                    This Campaign has ended.
                </h3>
            </div>
        </div>
@else			
	
		<!--begin::Card-->
		<div class="card card-custom gutter-b">
            @if($campaign->proposal->where('user_id', Auth::user()->id)->isEmpty())
			<div class="card-header">
				<h3 class="card-title">
					Submit a proposal for this campaign.
				</h3>
			</div>
            
        <form class="form" action="{{ url('creator/campaign/'.$campaign->id.'/view/'.$campaign->amount)}}" method="POST" id="proposal">
        	@csrf
<input type="hidden" name="campaign_id" id="campaign_id" value="{{ $campaign->id}}">
<input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id}}">
		<div class="card-body">
			
			<div class="form-group row">
			<div class="col-lg-6">
			<label>Your Bid</label>
			<div class="input-group input-group-lg">
				<div class="input-group-prepend"><span class="input-group-text" >₦</span></div>
				<input type="number" name="bid" class="form-control form-control-solid" id="cBalance"/>
			</div>
			</div>
			

			
			<div class="col-lg-6">
			<label>You will receive</label>
			<div class="input-group input-group-lg">
				<div class="input-group-prepend"><span class="input-group-text" >₦</span></div>
				<input type="number" class="form-control form-control-solid"  id="result" readonly="" />
			</div>
			</div>
			</div>

			<div class="form-group">
			<label>Cover Letter</label>
			<div class="input-group input-group-lg">
				<textarea type="text" class="form-control form-control-solid" placeholder="A short description of how you will promote this campaign, you can make realitic promises" rows="5" name="proposal" /></textarea>
			</div>
			</div>

			<div class="form-group row">
			<div class="col-lg-6">
			<label>When can you post this?</label>
			<div class="input-group input-group-lg">
				<input type="text" name="duration" class="form-control form-control-solid" readonly  value="{{date('d/m/Y')}}" id="kt_datepicker_3"/>
			</div>
			</div>
			

			
			<div class="col-lg-6">
			<label>Apply with what Platform?</label>
			<div class="input-group input-group-lg">
				<select name="platform" class="form-control form-control-solid form-control-lg" >
                        @foreach ($platform as $platforms) 
                        {
            <option value="{{ $platforms->platform }}">{{ $platforms->platform }} - {{$platforms->handle}}</option>
                        }
                        @endforeach
                                </select>
			</div>
			</div>
			</div>
	
            <div class="form-group">
            <label>Attachment, if any</label>
            <div class="input-group input-group-lg">
                <div class="input-group input-group-lg">
                <input type="file" class="form-control form-control-solid" name="proposalfile" />
            </div>
            </div>
            </div>
        

        <!-- begin: Invoice action-->
        <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
            <div class="col-md-9">
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary font-weight-bold" >Submit Proposal</button>
                </div>
            </div>
        </div>
        </form>
        <!-- end: -->
    </div>
    
        @else
        <div class="card-header">
                <h3 class="card-title">
                    You have submitted a proposal for this campaign.
                </h3>
            </div>

        @endif

        <!-- end: -->
    </div>

<!-- end::Card-->
@endif
</div>
					</div>
		<!--end::Container-->
	</div>
<!--end::Entry-->





@endsection

@section('footer')
<script>
        $(document).on("change keyup blur", "#cBalance", function() {
            var main = $('#cBalance').val();
            var dec = 0.20; //its convert 10 into 0.10
            var mult = main * dec; // gives the value for subtract from main value
            var discont = main - mult;
            $('#result').val(discont);
        });
    </script>
    <script src="{{ url('public/assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js?v=7.0.6')}}"></script>
    <script src="{{ url('public/assets/js/pages/crud/forms/proposal.js')}}"></script>
@endsection