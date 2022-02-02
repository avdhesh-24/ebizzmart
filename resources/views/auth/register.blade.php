@extends('layouts.app')
@push('css')
<link rel="stylesheet" type="text/css" media="screen,projection" href="{{asset('frontend/css/login.css')}}">
@endpush
@section('content')
<div class="contentp">
    <section class="CartP LoginBlock">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="fal fa-home-alt"></i></a></li>
                        <li class="breadcrumb-item"><a aria-current="page">Sign Up</a></li>
                    </ol>
                </div>
            </div>
            <div class="row align-items-center LoginRow">
                <div class="col-md-6">
                    <div class="">
                        <!-- <div class="logo"><a href="#"><img src="img/logo.png"></a></div> -->
                        <div class="img"><img src="{{asset('frontend/img/login-img.svg')}}" class="w-md-50"></div>
                        <h1 class="h5">One place to track all your business data</h1>
                        <ul>
                            <li><i class="fas fa-check-circle"></i>Generate and update E-WayBills easily</li>
                            <li><i class="fas fa-check-circle"></i>Convert to e-invoices in 1-click</li>
                            <li><i class="fas fa-check-circle"></i>Email and share your invoices</li>
                        </ul>
                        <a href="#" class="btn btn-main1">Need help?</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div>
                        <div class="login">
                            <div>
                                <div class="text-center w-100 mb-5">
                                    <img src="{{asset('frontend/img/logo.svg')}}" class="login-logo">
                                </div>
                                <h3 class="thm1 h6 mb-1">Welcome!</h3>
                                <h2 class="thm h5">Let's Create your Business Profile with this Sign up</h2>
                                <form class="" action="{{route('register')}}" method="post">
                                    @csrf
                                    <div class="form-floating mb-4">
                                        <input type="name" class="form-control" id="name" name="name" value="{{old('name')}}" placeholder="Name">
                                        <label for="name" class="form-label">Name</label>
                                        @error('name') <span class="error">{{$message}}</span> @enderror
                                    </div>
                                    <div class="form-floating mb-4">
                                        <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" placeholder="Mobile No. / Email ID">
                                        <label for="email" class="form-label">Email ID</label>
                                        @error('email') <span class="error">{{$message}}</span> @enderror
                                    </div>
                                    <div class="form-floating mb-4">
                                        <input type="number" class="form-control" maxlength="10" value="{{old('mobile')}}" oninput="maxLengthCheck(this)" id="mobile" name="mobile" placeholder="Mobile No. / Email ID">
                                        <label for="mobile" class="form-label">Mobile No.</label>
                                        @error('mobile') <span class="error">{{$message}}</span> @enderror
                                    </div>
                                    <div class="form-floating mb-1">
                                        <input type="password" class="form-control lpass" id="password" name="password" placeholder="Password">
                                        <label for="password" class="form-label">Create New Password</label>
                                        <i id="lpass-icon" class="mt10px fa fa-eye-slash"></i>
                                        @error('password') <span class="error">{{$message}}</span> @enderror
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="stay">
                                                <label class="form-check-label" for="stay">By clicking on 'Register me', you confirm that you accept the <a href="#" class="thm1">Terms of Use</a> and <a href="#" class="thm1">Privacy Policy</a></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center mb-4">
                                        <button type="submit" id="svbtn" onclick="$('#svbtn').hide(); $('#prcbtn').show();" class="btn btn-main w-100">Register me</button>
                                        <button type="button" id="prcbtn" style="display:none;" disabled class="btn btn-main w-100"><i class="fa fa-spinner"></i> Processing...</button>
                                    </div>
                                    <div class="or"><span>OR Continue With</span></div>
                                    <div class="text-center login-icon mb-0">
                                        <a href="#" title="" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Login with Facebook" aria-label="Login with Facebook"><img src="{{asset('frontend/img/fb-c.svg')}}"></a>
                                        <a href="#" title="" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Login with Google" aria-label="Login with Google"><img src="{{asset('frontend/img/google-icon.svg')}}"></a>
                                        <a href="#" title="" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Login with Twitter" aria-label="Login with Twitter"><img src="{{asset('frontend/img/t-c.svg')}}"></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="text-center"><p class="w-100 m-0">Returning Customer? <a class="mcolor" href="{{route('login')}}"><strong>Login</strong></a></p></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
  
@endsection
