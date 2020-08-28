@extends('layouts.auth')
@section('title', 'Supervise - LOGIN')
@section('content')
<div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9 my-5">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                            </div>
                            <form class="user" action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="email" id="email" class="form-control form-control-user @error('email') is-invalid @enderror" 
                                        name="email" value="{{ old('email') }}" required placeholder="Enter Email Address..." autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" id="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                                        name="password" placeholder="Password" autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <input type="checkbox" class="custom-control-input"  name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="remember">Remember Me</label>
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-user btn-block">
                                    {{ __('Login') }}
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                @if (Route::has('password.request'))
                                <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
