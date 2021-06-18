@extends('layouts.app3')

@section('title')
Sign Up
@parent
@stop

@section('head')

@endsection

@section('content')
            <!--begin::Login Sign up form-->
            <div class="">
                <div class="mb-20">
                    <h3>Sign Up</h3>
                    <div class="text-muted font-weight-bold">Enter your details to create your account. </div>
                </div>
                <form method="POST" action="{{ route('register') }}" class="form" id="kt_login_signup_form">
                        @csrf
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
                        <select  id="role" type="role" class="form-control h-auto form-control-solid py-4 px-8 @error('role') is-invalid @enderror" name="role"  required autocomplete="role">
                                    <option value="creator">Creator</option>
                                    <option value="brand">Brand</option>
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
                            <label class="checkbox m-0">
                                <input type="checkbox" name="agree" />
                                <span></span>
                                I Agree the <a href="#" class="font-weight-bold ml-1">terms and conditions</a>.
                            </label>
                        </div>
                        <div class="form-text text-muted text-center"></div>
                    </div>
                    <div class="form-group d-flex flex-wrap flex-center mt-10">
                        <button id="kt_login_signup_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-2">Sign Up</button>
                        <button id="kt_login_signup_cancel" class="btn btn-light-primary font-weight-bold px-9 py-4 my-3 mx-2">Cancel</button>
                    </div>
                </form>
            </div>
            <!--end::Login Sign up form-->

            
        </div>
    </div>
</div>
@endsection