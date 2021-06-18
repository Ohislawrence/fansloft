@extends('layouts.app5')

@section('title')
View Campaign
@parent
@stop

@section('bread1', 'Campaign')
@section('bread2', 'View Campaign')

@section('head')
<link href="{{ url('public/assets/css/pages/wizard/wizard-1.css?v=7.0.6')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('actions')
<!--begin::Toolbar-->
 <a href="{{url('admin/campaign/'.$campaign->id.'/view')}}" class="btn btn-transparent-white font-weight-bold  py-3 px-6 mr-2" target="_blank">
    <i class="la la-plus"></i>View this Campaign</a>
        
        <!--end::Toolbar-->
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
    @if ($errors->any())
      <div class="alert alert-custom alert-warning fade show" role="alert">
    <div class="alert-icon"><i class="flaticon-warning"></i></div>
    <div class="alert-text">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </div>
    <div class="alert-close">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="ki ki-close"></i></span>
        </button>
    </div>
</div>
@endif
              <div class="card card-custom">
    <div class="card-body p-0">
        <!--begin::Wizard-->
        <div class="wizard wizard-1" id="kt_wizard_v1" data-wizard-state="step-first" data-wizard-clickable="false">
            <!--begin::Wizard Nav-->
            <div class="wizard-nav border-bottom">
                <div class="wizard-steps p-8 p-lg-10">
                    <!--begin::Wizard Step 1 Nav-->
                    <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                        <div class="wizard-label">
                            <i class="wizard-icon flaticon-suitcase"></i>
                            <h3 class="wizard-title">1. Product or service</h3>
                        </div>
                        <span class="svg-icon svg-icon-xl wizard-arrow"><!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000) " x="11" y="5" width="2" height="14" rx="1"/>
        <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997) "/>
    </g>
</svg><!--end::Svg Icon--></span>                    </div>
                    <!--end::Wizard Step 1 Nav-->

                    <!--begin::Wizard Step 2 Nav-->
                    <div class="wizard-step" data-wizard-type="step">
                        <div class="wizard-label">
                            <i class="wizard-icon flaticon-list"></i>
                            <h3 class="wizard-title">2. Briefing</h3>
                        </div>
                        <span class="svg-icon svg-icon-xl wizard-arrow"><!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000) " x="11" y="5" width="2" height="14" rx="1"/>
        <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997) "/>
    </g>
</svg><!--end::Svg Icon--></span>                    </div>
                    <!--end::Wizard Step 2 Nav-->

                    <!--begin::Wizard Step 3 Nav-->
                    <div class="wizard-step" data-wizard-type="step">
                        <div class="wizard-label">
                            <i class="wizard-icon flaticon-network"></i>
                            <h3 class="wizard-title">3. Influencers</h3>
                        </div>
                                           </div>
                    <!--end::Wizard Step 3 Nav-->

                    <!--begin::Wizard Step 4 Nav-->
                    
                    <!--end::Wizard Step 4 Nav-->

                    <!--begin::Wizard Step 5 Nav-->
                    
                    <!--end::Wizard Step 5 Nav-->
                </div>
            </div>
            <!--end::Wizard Nav-->

            <!--begin::Wizard Body-->
            <div class="row justify-content-center my-10 px-8 my-lg-15 px-lg-10">
                <div class="col-xl-12 col-xxl-7">
                    <!--begin::Wizard Form-->
                    <form class="form" id="kt_form" action="{{ url('admin/campaign/'.$campaign->id.'/edit')}}" method="post" enctype="multipart/form-data">
                      @csrf

                      
                        <!--begin::Wizard Step 1-->
                        <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                            <h3 class="mb-10 font-weight-bold text-dark">Describe your product or service to the influencers.</h3>
                            <!--begin::Input-->
                            <div class="form-group">
                                <label>Campaign Name</label>
                                <input type="text" class="form-control form-control-solid form-control-lg" name="campaign_name" id="campaign_name" value="{{$campaign->campaign_name}}" />
                                <span class="form-text text-muted">Give your campaign a name.</span>
                            </div>
                            <!--end::Input-->
                            <!--begin::Input-->
                            <div class="form-group">
                                <label>URL to the product/service if any</label>
                                <input type="text" class="form-control form-control-solid form-control-lg" name="url" id="url" value="{{$campaign->link}}"  />
                                <span class="form-text text-muted">Enter a website address to the product or service you wish to sell.</span>
                            </div>
                            <!--end::Input-->

                            <!--begin::Input-->
                            <div class="form-group">
                                <label>Description</label>
                                <textarea type="text" rows="3" class="form-control form-control-solid form-control-lg" name="desc" id="desc" value="{{$campaign->desc}}" />{{$campaign->desc}}</textarea> 
                                <span class="form-text text-muted">What is your campaign about.</span>
                            </div>
                            <!--end::Input-->
                            <div class="row">
                                <div class="col-xl-6">
                                    <!--begin::Input-->
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select type="text" class="form-control form-control-solid form-control-lg" name="category" id="category" />
            <option value="{{ $campaign->niche }}">{{ $campaign->niche }}</option>
                                          @foreach ($niches as $category) 
          
            <option value="{{ $category->niche }}">{{ $category->niche }}</option>
          
          @endforeach
                                        </select>
                                        <span class="form-text text-muted">Select your campaign main category.</span>
                                    </div>
                                    <!--end::Input-->
                                </div>
                                <div class="col-xl-6">
                                    <!--begin::Input-->
                                    <div class="form-group">
                                        <label>Privacy</label>
                                        <input type="text" class="form-control form-control-solid form-control-lg" name="" id="" value="{{$campaign->hashtag}}" />

                                        <span class="form-text text-muted">It can be a logo or a product image.</span>
                                    </div>
                                    <!--end::Input-->
                                </div>
                            </div>
                            
                                <!--begin::Input-->
                                    <div class="form-group">
                                        <label>Interests</label>
                <select name="interest[]" id="kt_select2_10" multiple="multiple" class="form-control form-control-solid form-control-lg"/>
        @foreach ($interest as $interests) 
          @if(in_array($interests->niche, $datathis))
                        <option value="{{ $interests->niche}}" selected="true">{{ $interests->niche }}</option>
                        @else
            <option value="{{ $interests->niche }}">{{ $interests->niche }}</option>
          				@endif
        @endforeach
               </select>
                   <span class="form-text text-muted">what interest groups would you like to reach?</span>
                                    </div>
                                    <!--end::Input-->


                    
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
                        <!--end::Wizard Step 1-->

                        <!--begin::Wizard Step 2-->
                        <div class="pb-5" data-wizard-type="step-content">
                            <h4 class="mb-10 font-weight-bold text-dark">Here's where you provide posting instructions to the influencers. Be as specific or broad as you'd like.</h4>
                            <!--begin::Input-->
                            <div class="form-group">
                                <label>Call for action </label>
                                <input type="text" class="form-control form-control-solid form-control-lg" name="cta" placeholder="" value="{{$campaign->cta}}" />
                                <span class="form-text text-muted">Summazied what you want the influencer to do.</span>
                            </div>
                            <!--end::Input-->

                            <!--begin::Input-->
                            <div class="form-group">
                                <label>Brief the creator about this campaign</label>
                                <textarea type="text" rows="4" class="form-control form-control-solid form-control-lg" name="details" value="{{$campaign->details}}" />{{$campaign->details}}</textarea>
                                <span class="form-text text-muted">You can give details to the creator here, things you want done, KPIs etc.</span>
                            </div>
                            <!--end::Input-->

                            <div class="row">
                                <div class="col-xl-4">
                                    <!--begin::Input-->
                                    <div class="form-group">
                                        <label>Does the influencer need the product ?</label>
                                        <select class="form-control form-control-solid form-control-lg" name="isproduct">
                                        	<option value="{{$campaign->isproduct}}">{{$campaign->isproduct}}</option>
                                            <option value="no">No</option>
                                            <option value="yes">Yes</option>
                                        </select>
                                        <span class="form-text text-muted">This is for product review?</span>
                                    </div>
                                    <!--end::Input-->
                                </div>
                                <div class="col-xl-4">
                                    <!--begin::Input-->
                                    <div class="form-group">
                                        <label>Tags to include in the post</label>
                            <input id="kt_tagify_3" class="form-control form-control-solid form-control-lg" name='tags' class='form-control tagify tagify--outside' value="{{$campaign->tags}}"/>
                            <span class="form-text text-muted">e.g #fansloft, seperate with comma</span>
                                    </div>
                                    <!--end::Input-->
                                </div>
                                <div class="col-xl-4">
                                    <!--begin::Input-->
                                    <div class="form-group">
                                        <label>Quote to include in the post</label>
                                        <input type="text" class="form-control form-control-solid form-control-lg" name="quotes" placeholder="@fansloft, @youtube, @apple" value="{{$campaign->quotes}}" />
                                        <span class="form-text text-muted">e.g @fansloft, seperate with comma</span>
                                    </div>
                                    <!--end::Input-->
                                </div>
                            </div>
                        </div>

                        <!--end::Wizard Step 2-->

                        <!--begin::Wizard Step 3-->
                        <div class="pb-5" data-wizard-type="step-content">
                            <h4 class="mb-10 font-weight-bold text-dark">Here you can set the criteria that will define the selection of influencers to whom your campaign will be visible to. Interested influencers will then send you post proposals for approval. </h4>
                    <div class="row">
                                <div class="col-xl-4">
                            <div class="form-group">
                                <label>Social Media</label>
                                <select name="platform" class="form-control form-control-solid form-control-lg" name="platform">
                                    <option value="twitter">Twitter</option>
                                    <option value="instagram">Instagram</option>
                                    <option value="tiktok">Tiktok</option>
                                </select>
                            </div>
                        </div>
                            <!--end::Select-->
                            <div class="col-xl-4">
                            <div class="form-group">
                                <label>How do you want your campaign broadcast </label>
                                <select class="form-control form-control-solid form-control-lg" name="service">
                                	<option value="{{$campaign->service}}" >{{$campaign->service}}</option>
                                	@foreach($services as $service)
                                    <option value="{{$service->service}}" >{{$service->service}}</option>
                                    @endforeach
                                
                                </select>
                            </div>
                        </div>
                            <!--begin::Select-->
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label>Gender</label>
                                <select name="gender" class="form-control form-control-solid form-control-lg">
                                	<option value="{{$campaign->gender}}" selected="">{{$campaign->gender}}</option>
                                    <option value="Both" >Both</option>
                                    <option value="Male" selected>Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                            <!--end::Select-->
                            <div class="row">
                        <div class="col-xl-6">
                            <!--begin::Select-->
                            <div class="form-group">
                                <label>Age</label>
                                <select name="age" class="form-control form-control-solid form-control-lg">
                                	<option value="{{$campaign->age}}">{{$campaign->age}}</option>
                                    <option value="">Age Range</option>
                                    <option value="regular">All age</option>
                                    <option value="regular">18 - 20</option>
                                    <option value="oversized">21 - 25</option>
                                    <option value="fragile">25 - 30</option>
                                    <option value="frozen">30 - above</option>
                                </select>
                                <span class="form-text text-muted">Select the age range of the creators you want</span>
                            </div>
                        </div>
                        <div class="col-xl-6">
                        <div class="form-group">
                                <label>Number of creator(s)</label>
                                <select name="age" class="form-control form-control-solid form-control-lg">
                                	<option value="{{$campaign->age}}">{{$campaign->age}}</option>
                                    <option value="1">1</option>
                                    <option value="2">2 - 4</option>
                                    <option value="5">5 - 10</option>
                                    <option value="11">11 - 20</option>
                                    <option value="21">21 - 30</option>
                                    <option value="31">31+</option>
                                </select>
                                <span class="form-text text-muted">How many creator do want to run this campaign?</span>
                            </div>
                        </div>
                    </div>

                            <!--end::Select-->
            <div class="row">
                        <div class="col-xl-6">
                            <!--begin::Select-->
                            <div class="form-group">
                                <label>Location</label>
                                <select name="country" id="country" class="form-control form-control-solid form-control-lg">
                          <option value="{{ $campaign->country }}">{{ $campaign->country }}</option>
            @foreach ($country as $country) 
            
            <option value="{{ $country->country }}">{{ $country->country }}</option>
            
            @endforeach
                                </select>
                            </div>
                        </div>
                            <!--end::Select-->
                            <div class="col-xl-6">
                            <div class="form-group">
                                <label>Minimum number of followers</label>
            <select class="form-control form-control-solid form-control-lg" name="minfollowers">
            						<option value="{{$campaign->minfollowers}}">{{$campaign->minfollowers}}</option>
                                    <option value="All">Any number</option>
                                    <option value="5000">5000</option>
                                    <option value="7000">7000</option>
                                    <option value="10000">10000</option>
                                    <option value="20000">20000</option>
                                    
                                </select>
                                <span class="form-text text-muted"></span>
                            </div>
                        </div>
            </div>
        
              
            
            <div class="form-group">
                                <label>Schedule your campaign</label>
                                <input type="text" class="form-control form-control-solid form-control-lg" name="duration" id="" value="{{$campaign->duration}}" />
                                <span class="form-text text-muted">Set the start and end time.</span>
                            
                        
                    </div>

                    <div class="row">
                <div class="col-xl-6">
                    <div class="form-group">
                                <label>How many times should your campaign be posted within this time?:</label>
                                <input type="text" rows="4" class="form-control form-control-solid form-control-lg" name="freq" value="{{$campaign->frequency}}" />
                                <span class="form-text text-muted">The frequency by one creator within the duration of the campaign</span>
                            </div>
                            </div>
                            <!--end::Section-->


                            <!--begin::Section-->
                            <div class="col-xl-6">
                            <div class="form-group">
                                <label>What's your budget?:</label>
                                <input type="text" class="form-control form-control-solid form-control-lg" name="budget"  value="{{$campaign->budget}}" />
                            
                                <span class="form-text text-muted">How much are you willing to spend.</span>
                            </div>
                        </div>
                        <div class="form-group">
                                <label>Approved Campaign</label>
                                <select class="form-control form-control-solid form-control-lg" name="status">
            						<option value="{{$campaign->status}}">{{$campaign->status}}</option>
                                    <option value="approved">Approved</option>
                                    <option value="rejected">Rejected</option>
                                    
                                </select>
                                <span class="form-text text-muted">Is campaign okay?.</span>
                            
                        
                    </div>
                    </div>
                        <!--end::Wizard Step 3-->

                        </div>

                        <!--begin::Wizard Step 5-->
                        
                    

                        <!--begin::Wizard Actions-->
                        <div class="d-flex justify-content-between border-top mt-5 pt-10">
                            <div class="mr-2">
                                <button type="button" class="btn btn-light-primary font-weight-bold text-uppercase px-9 py-4" data-wizard-type="action-prev">
                                    Previous
                                </button>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-success font-weight-bold text-uppercase px-9 py-4" data-wizard-type="action-submit">
                                    Submit
                                </button>
                                <button type="button" class="btn btn-primary font-weight-bold text-uppercase px-9 py-4" data-wizard-type="action-next">
                                    Next
                                </button>
                            </div>
                        </div>
                        <!--end::Wizard Actions-->
                    </form>
                    <!--end::Wizard Form-->
                </div>
            </div>
                
            <!--end::Wizard Body-->
        </div>
    </div>
</div>
</div>
</div>
</div>



@endsection



@section('footer')
<script src="{{ url('public/assets/js/pages/custom/wizard/wizard-1.js?v=7')}}"></script>
<script src="{{ url('public/assets/js/pages/crud/forms/widgets/tagify.js')}}"></script>
<script src="{{ url('public/assets/js/pages/crud/forms/widgets/bootstrap-daterangepicker.js?v=7.0.6')}}"></script>
<script src="{{ url('public/assets/js/pages/crud/forms/widgets/select2.js?v=7.0.6')}}"></script>

@endsection