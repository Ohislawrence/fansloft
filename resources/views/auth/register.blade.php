@extends('layouts.app3')

@section('title')
Sign Up
@parent
@stop

@section('head')

@endsection

@section('content')


            <!--begin::Login Sign in form-->
            <div class="login-signin">
                <div class="mb-20">
                    <h3>Sign Up</h3>
                    <div class="text-muted font-weight-bold">Select the type of account you want to build.</div>
                </div>
                <form class="form" id="kt_login_signin_form">
                    
                        <a href="javascript:;" id="kt_login_forgot" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">Sign Up as a Brand</a>
                
                </form>
                
                    <a href="javascript:;" id="kt_login_signup" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">Create a Creator/Influencer profile</a>


                
            </div>
            <!--end::Login Sign in form-->

            <!--begin::Login Sign up form-->
            <div class="login-signup">
                <div class="mb-20">
                    <h3>Create a free profile and get discovered.</h3>
                    <div class="text-muted font-weight-bold">Partner with industry-leading food, fashion, beauty, lifestyle and top brands around the world. </div>
                </div>
                <form method="POST" action="{{ route('register') }}" class="form" id="kt_login_signup_form">
                        @csrf
                        <input type="hidden" name="role" value="creator">
                    <div class="form-group mb-5">
                        <input class="form-control h-auto form-control-solid py-4 px-8 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" type="text" placeholder="Fullname" required autocomplete="name" autofocus />
                        @error('name')
       
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group mb-5">
                        <input class="form-control h-auto form-control-solid py-4 px-8 @error('brandname') is-invalid @enderror" name="brandname" value="{{ old('brandname') }}" type="text" placeholder="Username (no space)" required autocomplete="brandname" autofocus />
                        @error('brandname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group mb-5">
                        <input class="form-control h-auto form-control-solid py-4 px-8 @error('email') is-invalid @enderror" type="email" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" />
                        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="form-group mb-5">
                        <input class="form-control h-auto form-control-solid py-4 px-8 @error('mobilenumber') is-invalid @enderror" type="number" placeholder="Phone Number" name="mobilenumber" value="{{ old('mobilenumber') }}" required autocomplete="number" />
                        @error('pnumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror   
                    </div>
                    <div class="form-group mb-5">
                        <select  id="role" type="text" class="form-control h-auto form-control-solid py-4 px-8 @error('gender') is-invalid @enderror" name="gender"  required autocomplete="role">
                                    <option value="">Gender</option>
                                    <option value="Female">Female</option>
                                    <option value="Male">Male</option>
                                </select>

                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        
                    </div>
                    <div class="form-group mb-5">
                        <textarea class="form-control h-auto form-control-solid py-4 px-8 @error('bio') is-invalid @enderror" name="bio" value="{{ old('bio') }}" type="text" rows="5" required autocomplete="bio" autofocus />Describe what you do, your bio</textarea> 
                        @error('brandname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group mb-5">
                        <select  id="country" type="text" class="form-control h-auto form-control-solid py-4 px-8 @error('country') is-invalid @enderror" name="country"  required autocomplete="role">
                            <option value="" selected>Location</option>
                            @foreach($country as $countries)
                            <option value="{{$countries->country}}">{{$countries->country}}</option>
                            @endforeach
                                        </select>

                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group mb-5">
                        <input class="form-control h-auto form-control-solid py-4 px-8 @error('bod') is-invalid @enderror" type="text" placeholder="Birthday" name="bod" value="{{ old('bod') }}" readonly id="kt_datepicker_3" required />
                        @error('pnumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror   
                    </div>
                    <div class="form-group mb-5">
                        <select  id="country" type="text" class="form-control h-auto form-control-solid py-4 px-8 @error('maincategory') is-invalid @enderror" name="maincategory"  required autocomplete="role">
                            <option value="" selected>Category</option>
                            @foreach($niche as $niches)
                            <option value="{{$niches->niche}}">{{$niches->niche}}</option>
                            @endforeach
                                        </select>

                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group mb-5">
                        <input class="form-control h-auto form-control-solid py-4 px-8 @error('password') is-invalid @enderror" type="password" placeholder="Password" name="password" required autocomplete="new-password"/>
                        @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group mb-5">
                        <input class="form-control h-auto form-control-solid py-4 px-8" type="password" placeholder="Confirm Password" name="password_confirmation" />
                    </div>
                    <div class="form-group mb-5 text-left">
                        <div class="checkbox-inline">
                            <label class="">
                                
                                <span></span>
                                By clicking the sign up button, you agree to our<a href="{{url('terms-and-conditions')}}" target="_blank" class="font-weight-bold ml-1">terms and conditions</a>.
                            </label>
                        </div>
                        <div class="form-text text-muted text-center"></div>
                    </div>
                    <div class="form-group d-flex flex-wrap flex-center mt-10">
                        <button id="" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-2">Sign Up</button>
                        <button id="kt_login_signup_cancel" class="btn btn-light-primary font-weight-bold px-9 py-4 my-3 mx-2">Cancel</button>
                    </div>
                </form>
            </div>
            <!--end::Login Sign up form-->

            <!--begin::Login forgot password form-->
            <div class="login-forgot">
                <div class="mb-20">
                    <h3>Create your brand account</h3>
                    <div class="text-muted font-weight-bold">You will be able to create campaigns, manage influencers and pay for services.<p>
                        All services are activated upon verification of your email and you will have full access for free for 7 days.
                    </p></div>
                </div>
                <form method="POST" action="{{ route('register') }}" class="form" id="kt_login_signup_form">
                        @csrf
                        <input type="hidden" name="role" value="brand">
                        <input type="hidden" name="gender" value="business">
                        <input type="hidden" name="bod" value="2010">
                    <div class="form-group mb-5">
                        <input class="form-control h-auto form-control-solid py-4 px-8 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" type="text" placeholder="Fullname" required autocomplete="name" autofocus />
                        @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group mb-5">
                        <input class="form-control h-auto form-control-solid py-4 px-8 @error('brandname') is-invalid @enderror" name="brandname" value="{{ old('brandname') }}" type="text" placeholder="Business Name -no space" required autocomplete="brandname" autofocus />
                        @error('brandname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group mb-5">
                        <input class="form-control h-auto form-control-solid py-4 px-8 @error('email') is-invalid @enderror" type="email" placeholder="Business Email" name="email" value="{{ old('email') }}" required autocomplete="email" />
                        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="form-group mb-5">
                        <input class="form-control h-auto form-control-solid py-4 px-8 @error('mobilenumber') is-invalid @enderror" type="number" placeholder="Business Phone Number" name="mobilenumber" value="{{ old('mobilenumber') }}" required autocomplete="number" />
                        @error('pnumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror   
                    </div>
                    <div class="form-group mb-5">
                        <textarea class="form-control h-auto form-control-solid py-4 px-8 @error('bio') is-invalid @enderror" name="bio" value="{{ old('bio') }}" type="text" rows="5" required autocomplete="bio" autofocus />Tell us about your business' services or product</textarea> 
                        @error('brandname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="form-group mb-5">
                        <select  id="country" type="text" class="form-control h-auto form-control-solid py-4 px-8 @error('country') is-invalid @enderror" name="country"  required autocomplete="role">
                            <option value="" selected>Location</option>
                            @foreach($country as $countries)
                            <option value="{{$countries->country}}">{{$countries->country}}</option>
                            @endforeach
                                        </select>

                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group mb-5">
                        <select  id="country" type="text" class="form-control h-auto form-control-solid py-4 px-8 @error('maincategory') is-invalid @enderror" name="maincategory"  required autocomplete="role">
                            <option value="" selected>Business Category</option>
                            @foreach($niche as $niches)
                            <option value="{{$niches->niche}}">{{$niches->niche}}</option>
                            @endforeach
                                        </select>

                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group mb-5">
                        <input class="form-control h-auto form-control-solid py-4 px-8 @error('password') is-invalid @enderror" type="password" placeholder="Password" name="password" required autocomplete="new-password"/>
                        @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group mb-5">
                        <input class="form-control h-auto form-control-solid py-4 px-8" type="password" placeholder="Confirm Password" name="password_confirmation" />
                    </div>
                    <div class="form-group mb-5 text-left">
                        <div class="checkbox-inline">
                            <label class="">
                                By clicking the sign up button, you agree to our<a href="{{url('terms-and-conditions')}}" class="font-weight-bold ml-1" target="_blank">terms and conditions</a>.
                            </label>
                        </div>
                        <div class="form-text text-muted text-center"></div>
                    </div>
                    <div class="form-group d-flex flex-wrap flex-center mt-10">
                        <button id="" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-2">Sign Up</button>
                        <button id="kt_login_forgot_cancel" class="btn btn-light-primary font-weight-bold px-9 py-4 my-3 mx-2">Cancel</button>
                    </div>
                </form>
            </div>

            <!--end::Login Sign up form-->

        </div>
    </div>
</div>
<!--end::Login-->
    </div>
<!--end::Main-->
@endsection

@section('footer')
<!--end::Global Config-->

        <!--begin::Global Theme Bundle(used by all pages)-->
                   <script src="{{url('public/assets/plugins/global/plugins.bundle.js?v=7.0.6')}}"></script>
                   <script src="{{url('public/assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.6')}}"></script>
                   <script src="{{url('public/assets/js/scripts.bundle.js?v=7.0.6')}}"></script>
                <!--end::Global Theme Bundle-->
<script src="{{ url('public/assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js?v=7.0')}}"></script>

                    <!--begin::Page Scripts(used by this page)-->
                            <script src="{{url('public/assets/js/pages/custom/login/login-general.js')}}"></script>
                        <!--end::Page Scripts-->
@endsection