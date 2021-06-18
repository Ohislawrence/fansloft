@extends('layouts.app3')

@section('content')
<div class="login-signin">
                <div class="mb-20">
                    <h3>{{ __('Confirm Password') }}</h3>
                    <div class="text-muted font-weight-bold">{{ __('Please confirm your password before continuing.') }}</div>
                </div>

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="form-group mb-10">
                                <input id="password" type="password" class="form-control form-control-solid h-auto py-4 px-8 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        

         <div class="form-group d-flex flex-wrap flex-center mt-10">
                                <button type="submit" id="kt_login_forgot_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-2">
                                    {{ __('Confirm Password') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        
                    </form>
                </div>
            
@endsection
