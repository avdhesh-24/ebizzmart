@extends('layouts.app')
@push('css')
<title>Complete Account Registration : Ebizzmart</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="stylesheet" type="text/css" media="screen,projection" href="{{asset('frontend/css/login.css')}}">
<link href="{{asset('frontend/css/choosen/chosen.css')}}" rel="stylesheet">
@endpush
@section('content')
<div class="contentp">
    <section class="CartP LoginBlock">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="fal fa-home-alt"></i></a></li>
                        <li class="breadcrumb-item"><a aria-current="page">Complete Account Registration</a></li>
                    </ol>
                </div>
            </div>
            <div class="row LoginRow">
                <div class="col-md-4">
                    <div>
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
                <div class="col-md-8">
                    <div class="fullw">
                        <div class="login">
                            <div>
                                <div class="text-center w-100 mb-4">
                                    <img src="{{asset('frontend/img/logo.svg')}}" class="login-logo">
                                </div>
                                <form action="{{route('account.save-profile')}}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-4">
                                                <input type="text" class="form-control" id="name" name="name" value="{{Auth::user()->name}}" placeholder="First Name">
                                                <label for="name" class="form-label">Your Name</label>
                                                @error('name') <span class="error">{{$message}}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-4">
                                                <input type="email" class="form-control" id="email" readonly name="email" value="{{Auth::user()->email}}" placeholder="Email ID">
                                                <label for="email" class="form-label">Email ID*</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-4">
                                                <input type="email" class="form-control" id="email" name="alternative_email" value="{{old('alternative_email')}}" placeholder="Alternative Email ID">
                                                <label for="alternative_email" class="form-label">Alternative Email</label>
                                                @error('alternative_email') <span class="error">{{$message}}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-4">
                                                <input type="text" class="form-control" id="email" readonly value="{{Auth::user()->mobile}}" name="email" placeholder="Mobile No.">
                                                <label for="text" class="form-label">Mobile Number*</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-4">
                                                <input type="text" class="form-control" id="alternative_phone" value="{{old('alternative_phone')}}" name="alternative_phone" placeholder="Alternative Phone.">
                                                <label for="alternative_phone" class="form-label">Alternative Phone</label>
                                                @error('alternative_phone') <span class="error">{{$message}}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-4">
                                                <input type="text" class="form-control" id="company" value="{{old('company_name')}}" name="company_name" placeholder="Company Name">
                                                <label for="fname" class="form-label">Company Name</label>
                                                @error('company_name') <span class="error">{{$message}}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div><p class="fw-bold m-0 thm1">Business Location*</p></div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-4">
                                                <select class="form-select chosen-select" id="floatingSelect" name="country" aria-label="">
                                                    <option value="">-- Select --</option>
                                                    @foreach($countries as $country)
                                                    <option value="{{$country->id}}" {{old('country')==$country->id ? 'selected' : ''}}>{{$country->name}}</option>
                                                    @endforeach
                                                </select>
                                                <label for="mobile" class="form-label">Country</label>
                                                @error('country') <span class="error">{{$message}}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-4">
                                                <select class="form-select" id="floatingSelect" name="city" aria-label="">
                                                    <option value="">-- Select --</option>
                                                </select>
                                                <label for="mobile" class="form-label">City</label>
                                                @error('city') <span class="error">{{$message}}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-floating mb-4">
                                                <p class="fw-bold m-0 thm1">I am a*</p>
                                                <div class="radiob">
                                                    @foreach($usertype as $type)
                                                    <div class="form-check">
                                                        <input type="radio" name="iam" value="{{$type->id}}" id="Iam{{$type->id}}" {{old('iam')==$type->id ? 'checked' : ''}}>
                                                        <label for="Iam{{$type->id}}">{{$type->name}}</label>
                                                    </div>
                                                    @endforeach
                                                </div>
                                                @error('iam') <span class="error">{{$message}}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-4">
                                                <input type="number" class="form-control" maxlength="10" value="{{old('company_phone_no')}}" oninput="maxLengthCheck(this)" id="company_phone_no" name="company_phone_no" placeholder="Contact No.">
                                                <label for="company_phone_no" class="form-label">Company Phone No.*</label>
                                                @error('company_phone_no') <span class="error">{{$message}}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-4">
                                                <select class="form-select" id="floatingSelect" name="business_type" aria-label="">
                                                    <option value="">-- Select Business Type --</option>
                                                    @foreach($businesstype as $business)
                                                    <option value="{{$business->id}}" {{old('business_type')==$business->id ? 'selected' : ''}} >{{$business->name}}</option>
                                                    @endforeach
                                                </select>
                                                <label for="mobile" class="form-label">Business Type</label>
                                                @error('business_type') <span class="error">{{$message}}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-12 d-block">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" name="free_membership_agreement" id="stay">
                                                <label class="form-check-label" for="stay">The <a href="#" class="thm1">ebizzmart.com</a> Free Membership Agreement</label>
                                                @error('free_membership_agreement') <span class="error">{{$message}}</span> @enderror
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"  value="1" name="receive_emails" id="stay">
                                                <label class="form-check-label" for="stay">Receive emails relating to membership and services from <a href="#" class="thm1">ebizzmart.com</a></label>
                                                @error('receive_emails') <span class="error">{{$message}}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" id="svbtn" onclick="$('#svbtn').hide(); $('#prcbtn').show(); " class="btn btn-main w-100">Register me</button>
                                        <button type="button" id="prcbtn" style="display:none;" disabled class="btn btn-main w-100">Processing...</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- <div class="text-center"><p class="w-100 m-0">Returning Customer? <a class="mcolor" href="login.php"><strong>Login</strong></a></p></div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@push('scripts')
<script src="{{asset('frontend/js/choosen/chosen.jquery.js')}}" type="2bdaca99c5e6f61c87d5ffcf-text/javascript"></script>
<script>
    $(document).ready(function(){
        @if(!empty(old('country')))
            $.get("{{route('country-city')}}",{
                country : "{{old('country')}}"
            },function(data){
                var Html='<option value="">-- Select --</option>';
                for(var A=0;A<data.length;A++){
                    var Select ='';
                    if(@json(old('city')) == data[A].id){ Select='selected'; }
                    Html +='<option value="'+data[A].id+'" '+Select+'>'+data[A].name+'</option>';     
                }
                $('select[name=city]').html(Html);
            });
        @endif
    });

    $('select[name=country]').change(function(e){
        $.get("{{route('country-city')}}",{
            country : e.target.value
        },function(data){
            var Html='<option value="">-- Select --</option>';
            for(var A=0;A<data.length;A++){
                Html +='<option value="'+data[A].id+'">'+data[A].name+'</option>';     
            }
            $('select[name=city]').html(Html);
        })
    });
</script>
@endpush
