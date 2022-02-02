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
                    <div class="FormBlock">
                        <div class="con-info">
                            <h3 class="mcolor h4">{{ __('Reset Password') }}</h3><hr>
                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf

                                <input type="hidden" name="token" value="{{ $token }}">
                                <div class="form-floating">
                                    <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                    <label for="email" class="form-label">{{ __('E-Mail Address') }}</label>
                                </div>
                                <div class="form-floating">
                                    <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    <label for="password" class="form-label">{{ __('Password') }}</label>
                                </div>
                                <div class="form-floating">
                                    <input id="password-confirm" type="password" placeholder="Password Confirm" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-main">
                                            {{ __('Reset Password') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
