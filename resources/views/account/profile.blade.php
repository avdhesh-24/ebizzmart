@extends('layouts.app')
@section('content')
<div class="contentp">
    <section class="grey Profile pt-1">
        <div class="container">
            <div class="row mb-2">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="fal fa-home-alt"></i></a></li>
                        <li class="breadcrumb-item"><a aria-current="page">User Profile</a></li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <x-account-left/>
                <div class="col-md-10">
                    <form class="card links mb-4 UserD">
                        <div class="card-body">
                            <a class="EditText text-primary sws-top sws-bounce" title="Edit" id="edit-user"><i class="far fa-edit"></i> </a>
                            <a class="EditText thm me-4 sws-top sws-bounce" title="Save" id="save-user" style="display:none"><i class="far fa-check"></i></a>
                            <a class="EditText text-danger sws-top sws-bounce" title="Cancel" id="cancel-user" style="display:none"><i class="far fa-times"></i></a>
                            <div class="d-flex edittextbox">
                                <div class="PhotoBox me-4"><label><input type="text" class="d-none"><span><img src="{{asset('frontend/img/man-colored.svg')}}"></span></label>Profile Picture</div>
                                <div class="w-100">
                                    <h3 class="h5 thm">User Information</h3>
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <ul class="prolist AllDetail">
                                                <li><span>User Name</span>
                                                    <input type="text" name="name" value="{{Auth::user()->name}}" placeholder="User Name" class="inputtext noeditt" contenteditable="false" readonly="readonly">
                                                </li>
                                                <li><span>Primary Email <span class="sws-top sws-bounce" title="Verified"><i class="fas fa-shield-check thm"></i></span></span>
                                                    <input type="text" name="age" value="{{Auth::user()->email}}" readonly placeholder="Primary Email" class="inputtext noeditt" contenteditable="false" readonly="readonly">
                                                </li>
                                                <li><span>Primary Phone No. <span class="sws-top sws-bounce" title="Verified"><i class="fas fa-shield-check thm"></i></span></span>
                                                    <input type="text" name="age" value="{{Auth::user()->mobile}}" readonly placeholder="Primary Phone No." class="inputtext noeditt" contenteditable="false" readonly="readonly">
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col col-md-6">
                                            <ul class="prolist AllDetail">
                                                <li><span>Alternative Email</span>
                                                    <input type="text" name="alternative_email" value="{{Auth::user()->alternative_email}}" placeholder="Alternative Email" class="inputtext noeditt" contenteditable="false" readonly="readonly">
                                                </li>
                                                <li><span>Alternative Phone No.</span>
                                                    <input type="text" name="alternative_phone" value="{{Auth::user()->alternative_phone}}" placeholder="Alternative Phone No" class="inputtext noeditt" contenteditable="false" readonly="readonly">
                                                </li>
                                                <li class="d-none"><span>Country</span>
                                                    <select class="inputtext noeditt chosen-select" id="floatingSelect" name="country" aria-label="">
                                                        <option value="">-- Select --</option>
                                                        @foreach($countries as $country)
                                                        <option value="{{$country->id}}" {{Auth::user()->country==$country->id ? 'selected' : ''}}>{{$country->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col col-md-6 d-none">
                                            <ul class="prolist AllDetail">
                                                <li><span>City</span>
                                                    <select class="inputtext noeditt chosen-select" id="floatingSelect" name="city" aria-label="">
                                                        <option value="">-- Select --</option>
                                                        @foreach($cities as $citi)
                                                        <option value="{{$citi->id}}" {{Auth::user()->city==$citi->id ? 'selected' : ''}}>{{$citi->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col col-md-6 d-none">
                                            <ul class="prolist AllDetail">
                                                <li><span>Address</span>
                                                    <input type="text" name="address" value="{{Auth::user()->address}}" placeholder="Address" class="inputtext noeditt" contenteditable="false" readonly="readonly">
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <form class="card links mb-4 Cominfo d-none">
                        <div class="card-body">
                            <a class="EditText text-primary sws-top sws-bounce" title="Edit" id="edit-company"><i class="far fa-edit"></i> </a>
                            <a class="EditText thm me-4 sws-top sws-bounce" title="Save" id="save-company" style="display:none"><i class="far fa-check"></i></a>
                            <a class="EditText text-danger sws-top sws-bounce" title="Cancel" id="cancel-company" style="display:none"><i class="far fa-times"></i></a>
                            <div class="d-flex edittextbox">
                                <div class="w-100">
                                    <h3 class="h5 thm">Company Information</h3>
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <ul class="prolist AllDetail">
                                                <li><span>Company Name</span>
                                                    <input type="text" name="company_name" value="{{$list->comp->company_name}}" placeholder="Company Name" class="inputtext noeditt" contenteditable="false" readonly="readonly">
                                                </li>
                                                <li><span>Company Phone</span>
                                                    <input type="text" name="company_phone_no" value="{{$list->comp->company_phone_no}}" placeholder="Company Phone No" class="inputtext noeditt" contenteditable="false" readonly="readonly">
                                                </li>
                                                <li><span>Website</span>
                                                    <input type="text" name="website" value="{{$list->comp->website}}" placeholder="Company Website" class="inputtext noeditt" contenteditable="false" readonly="readonly">
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <ul class="prolist AllDetail">
                                                <li><span>I am</span>
                                                    <select class="inputtext noeditt" id="floatingSelect" name="iam" aria-label="">
                                                        <option value="">-- Select Type --</option>
                                                        @foreach($usertype as $type)
                                                        <option value="{{$type->id}}" {{$list->comp->iam==$type->id ? 'selected' : ''}} >{{$type->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </li>
                                                <li><span>GSTIN</span>
                                                    <input type="text" name="gst" value="{{$list->comp->gst}}" placeholder="Gst Number" class="inputtext noeditt" contenteditable="false" readonly="readonly">
                                                </li>
                                                <li><span>Business Type</span>
                                                    <select class="inputtext noeditt" id="floatingSelect" name="business_type" aria-label="">
                                                        <option value="">-- Select Business Type --</option>
                                                        @foreach($businesstype as $business)
                                                        <option value="{{$business->id}}" {{$list->comp->business_type==$business->id ? 'selected' : ''}} >{{$business->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <form class="card links BankD  d-none">
                        <div class="card-body">
                            <a class="EditText text-primary sws-top sws-bounce" title="Edit" id="edit-bank"><i class="far fa-edit"></i> </a>
                            <a class="EditText thm me-4 sws-top sws-bounce" title="Save" id="save-bank" style="display:none"><i class="far fa-check"></i></a>
                            <a class="EditText text-danger sws-top sws-bounce" title="Cancel" id="cancel-bank" style="display:none"><i class="far fa-times"></i></a>
                            <div class="d-flex edittextbox">
                                <div class="w-100">
                                    <h3 class="h5 thm">Bank Account Details</h3>
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <ul class="prolist AllDetail">
                                                <li><span>IFSC Code</span>
                                                    <input type="text" name="ifsc_code" value="{{!empty($list->banks->ifsc_code) ? $list->banks->ifsc_code:''}}" placeholder="" class="inputtext noeditt" contenteditable="false" readonly="readonly">
                                                </li>
                                                <li><span>Bank Name</span>
                                                    <input type="text" name="bank_name" value="{{!empty($list->banks->bank_name) ?$list->banks->bank_name:''}}" placeholder="" class="inputtext noeditt" contenteditable="false" readonly="readonly">
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col col-md-6">
                                            <ul class="prolist AllDetail">
                                                <li><span>Account Number</span>
                                                    <input type="text" name="account_number" value="{{!empty($list->banks->account_number) ?$list->banks->account_number:''}}" placeholder="" class="inputtext noeditt" contenteditable="false" readonly="readonly">
                                                </li>
                                                <li><span>Account Type</span>
                                                    <input type="text" name="account_type" value="{{!empty($list->banks->account_type) ?$list->banks->account_type:''}}" placeholder="" class="inputtext noeditt" contenteditable="false" readonly="readonly">
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('css')
<title>User Profile : ebizzmart</title>
<link rel="stylesheet" type="text/css" media="screen,projection" href="{{asset('frontend/css/profile.css')}}">
@endpush

@push('scripts')
<script src="{{asset('frontend/js/my-company.js')}}"></script>
<script>
    const UpdateUserInfo = "{{route('account.update-user-information')}}";
    const UpdateCompanyInfo = "{{route('account.update-company-information')}}";
    const UpdateBankInfo = "{{route('account.update-bank-information')}}";
</script>
@endpush       