@extends('layouts.app3')

@section('content')
<div class="login-signin">
                <div class="mb-20">
                    <h3>Forggotten Password ?</h3>
                    <div class="text-muted font-weight-bold">Enter your email to reset your password</div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

<div class="form-group mb-10">
<input class="form-control form-control-solid h-auto py-4 px-8 @error('email') is-invalid @enderror" id="email" type="email" placeholder="Email" name="email" autocomplete="off" value="{{ old('email') }}" required autocomplete="email" autofocus/>
@error('email')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>

<div class="form-group d-flex flex-wrap flex-center mt-10">
<button type="submit" id="kt_login_forgot_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-2">Request</button>
<button id="kt_login_forgot_cancel" class="btn btn-light-primary font-weight-bold px-9 py-4 my-3 mx-2">Cancel</button>
                    </div>

                        
                    </form>
                </div>
            
@endsection
