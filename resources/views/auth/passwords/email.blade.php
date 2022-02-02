@extends('layouts.app')

@push('css')
<link rel="stylesheet" type="text/css" media="screen,projection" href="{{asset('frontend/css/profile-form.css')}}">
@endpush
@section('content')
<section class="ProForm">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="ProFormBlock">
                    <div class="FormBlock px-0 pb-0 login">
                        <div class="con-info">
                            <!-- <h3 class="mcolor h4">{{ __('Reset Password') }}</h3><hr> -->
                            @if (session('status'))
                                <div class="alert alert-success p-2 text-center" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <!-- <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="d-flex justify-content-center">
                                    <div class="form-group me-4 w-50">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-main">{{ __('Send Password Reset Link') }}</button>
                                    </div>
                                </div>
                            </form> -->
                            <div class="modal-body">
                                <div>
                                    <div class="text-center w-100">
                                        <img src="{{asset('frontend/img/logo-icon.png')}}" class="login-logo">
                                        <h3 class="h5 mt-3 mb-4">Forgot Password</h3>
                                    </div>
                                    <form action="{{ route('password.email') }}" method="post">
                                        <div class="form-floating mb-4">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            <label for="email" class="form-label">{{ __('E-Mail Address') }}</label>
                                        </div>
                                        <div class="form-floating text-center mb-3">
                                            <button type="submit" class="btn btn-main mb-4">{{ __('Send Password Reset Link') }}</button>
                                            <div class="text-center"><a href="{{ route('login') }}" class="mcolor1">Back to Login</a></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer text-center"><p class="w-100">New to Matrin? <a class="mcolor SignUpMobal" href="{{ url('register') }}"><strong>{{ __('Sign Up Free') }}</strong></a></p></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
