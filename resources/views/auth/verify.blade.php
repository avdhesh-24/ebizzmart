@extends('layouts.app')
@push('css')
<link rel="stylesheet" type="text/css" media="screen,projection" href="{{asset('frontend/css/profile-form.css')}}">
@endpush
@section('content')
<section class="ProForm">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="ProFormBlock">
                    <div class="FormBlock">
                        <div class="con-info">
                            <h3 class="mcolor h4">{{ __('Verify Your Email Address') }}</h3><hr>
                            @if (session('resent'))
                                <div class="alert alert-success" role="alert">
                                    {{ __('A fresh verification link has been sent to your email address.') }}
                                </div>
                            @endif

                            {{ __('Before proceeding, please check your email for a verification link.') }}
                            {{ __('If you did not receive the email') }},
                            <form class="d-inline text-center" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit" class="btn btn-main mt-4">{{ __('click here to request another') }}</button>.
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
