@extends('layouts.app3')

@section('title')
Sign In
@parent
@stop

@section('content')

            <!--begin::Login Sign in form-->
            <div class="">
                <div class="mb-20">
                    <h3>Sign In To Fansloft Network</h3>
                    <div class="text-muted font-weight-bold">Enter your details to login to your account:</div>
                </div>
                
                <form method="POST" action="{{ route('login') }}" class="form" id="kt_login_signin_form">
                        @csrf
                    <div class="form-group mb-5">
                        <input class="form-control h-auto form-control-solid py-4 px-8 @error('email') is-invalid @enderror" id="email" type="email" placeholder="Email" name="email" autocomplete="off" value="{{ old('email') }}" required autocomplete="email" autofocus/>
                        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group mb-5">
                        <input class="form-control h-auto form-control-solid py-4 px-8 @error('password') is-invalid @enderror" type="password" id="password" placeholder="Password" name="password" required autocomplete="current-password"/>

                        @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group d-flex flex-wrap justify-content-between align-items-center">
                        <div class="checkbox-inline">
                            <label class="checkbox m-0 text-muted">
                                <input type="checkbox" name="remember" />
                                <span></span>
                                Remember me
                            </label>
                        </div>
                        <a href="{{ route('password.request') }}" id="kt_login_forgot" class="text-muted text-hover-primary">Forget Password ?</a>
                    </div>
                    <button id="kt_login_signin_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">Sign In</button>
                </form>
                <div class="mt-10">
                    <span class="opacity-70 mr-4">
                        Don't have an account yet?
                    </span>
                    <a href="{{('register')}}" id="kt_login_signup" class="text-muted text-hover-primary font-weight-bold">Sign Up!</a>
                </div>
            </div>
            <!--end::Login Sign in form-->

            
        </div>
    </div>
@endsection