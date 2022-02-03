@extends('layouts.app')
@section('content')
<div class="contentp">
    <section class="grey Profile pt-1">
        <div class="container">
            <div class="row mb-2">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="fal fa-home-alt"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{url('company-information')}}">Company Infomation</a></li>
                        <li class="breadcrumb-item"><a aria-current="page">Trade Capacity</a></li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <x-account-left/>
                <div class="col-md-10">
                    <div class="card links ComPro">
                        <x-company-profile-percentage/>
                    </div>
                    <x-company-menu/>

                    <form class="card links mb-4" id="trade-capacity" enctype="multipart-form/data">
                        @csrf
                        <div class="card-body">
                            <a class="EditText text-primary sws-top sws-bounce" data-title="Edit" id="edit-trade-capacity"><i class="far fa-edit"></i> </a>
                            <!-- <a class="EditText thm me-4 sws-top sws-bounce" data-title="Save" id="save-trade-capacity" style="display:none"><i class="far fa-check"></i></a> -->
                            <button class="EditText thm me-4 sws-top sws-bounce" id="save-trade-capacity" style="display:none" type="submit"><i class="far fa-check"></i></button>
                            <a class="EditText text-danger sws-top sws-bounce" data-title="Cancel" id="cancel-trade-capacity" style="display:none"><i class="far fa-times"></i></a>
                            <div class="d-flex edittextbox">
                                <div class="w-100">
                                    <h3 class="h5 thm">Trade Details</h3>
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <ul class="prolist AllDetail">
                                                <li class="d-block"><span>Total Annual Sales Volume</span>
                                                    <select class="inputtext noeditt" name="annual_sales" contenteditable="false" readonly="readonly">
                                                        <option value="1-50000" {{$list->comp->annual_sales=='1-50000' ? 'selected' : ''}}>Rs. 1 - 50,000</option>
                                                        <option value="50000-100000" {{$list->comp->annual_sales=='50000-100000' ? 'selected' : ''}}>Rs. 50,000 - 1,00,000</option>
                                                        <option value="100000-150000" {{$list->comp->annual_sales=='100000-150000' ? 'selected' : ''}}>Rs. 1,00,000 - 1,50,000</option>
                                                        <option value="150000-200000" {{$list->comp->annual_sales=='150000-200000' ? 'selected' : ''}}>Rs. 1,50,000 - 2,00,000</option>
                                                        <option value="200000-500000" {{$list->comp->annual_sales=='200000-500000' ? 'selected' : ''}}>Rs. 2,00,000 - 5,00,000</option>
                                                        <option value="50000" {{$list->comp->annual_sales=='50000' ? 'selected' : ''}}>Rs. 5,00,000+</option>
                                                    </select>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <ul class="prolist AllDetail">
                                                <li class="d-block"><span>Export Percentage</span>
                                                    <select class="inputtext noeditt" name="export_percentage" contenteditable="false" readonly="readonly">
                                                        <option value="1-10" {{$list->comp->export_percentage=='1-10' ? 'selected' : ''}}>1% - 10%</option>
                                                        <option value="10-20" {{$list->comp->export_percentage=='10-20' ? 'selected' : ''}}>11% - 20%</option>
                                                        <option value="20-30" {{$list->comp->export_percentage=='20-30' ? 'selected' : ''}}>21% - 30%</option>
                                                        <option value="30-40" {{$list->comp->export_percentage=='30-40' ? 'selected' : ''}}>31% - 40%</option>
                                                        <option value="40-50" {{$list->comp->export_percentage=='40-50' ? 'selected' : ''}}>41% - 50%</option>
                                                        <option value="50-60" {{$list->comp->export_percentage=='50-60' ? 'selected' : ''}}>51% - 60%</option>
                                                        <option value="60-70" {{$list->comp->export_percentage=='60-70' ? 'selected' : ''}}>61% - 70%</option>
                                                        <option value="70-80" {{$list->comp->export_percentage=='70-80' ? 'selected' : ''}}>71% - 80%</option>
                                                        <option value="80-90" {{$list->comp->export_percentage=='80-90' ? 'selected' : ''}}>81% - 90%</option>
                                                        <option value="90-100" {{$list->comp->export_percentage=='90-100' ? 'selected' : ''}}>91% - 100%</option>
                                                    </select>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-12 col-md-12 mt-3">
                                            <h3 class="h6 thm1"><strong>Main Markets and Distribution</strong></h3>
                                        </div>
                                        <div class="col col-lg-3 col-md-4 col-sm-6">
                                            <ul class="prolist AllDetail">
                                                <li><label><span>North America</span>
                                                    <input type="number" name="north_america" value="{{$markets->north_america}}" maxlength="3" oninput="maxLengthCheck(this)" placeholder="" class="inputtext noeditt" contenteditable="false" readonly="readonly"><span class="ms-1">%</span></label>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col col-lg-3 col-md-4 col-sm-6">
                                            <ul class="prolist AllDetail">
                                                <li><label><span>South America</span>
                                                    <input type="number" name="south_america" value="{{$markets->south_america}}" maxlength="3" oninput="maxLengthCheck(this)" placeholder="" class="inputtext noeditt" contenteditable="false" readonly="readonly"><span class="ms-1">%</span></label>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col col-lg-3 col-md-4 col-sm-6">
                                            <ul class="prolist AllDetail">
                                                <li><label><span>Central America</span>
                                                    <input type="number" name="central_america" value="{{$markets->central_america}}" maxlength="3" oninput="maxLengthCheck(this)" placeholder="" class="inputtext noeditt" contenteditable="false" readonly="readonly"><span class="ms-1">%</span></label>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col col-lg-3 col-md-4 col-sm-6">
                                            <ul class="prolist AllDetail">
                                                <li><label><span>Eastern Europe</span>
                                                    <input type="number" name="eastern_europe" value="{{$markets->eastern_europe}}" maxlength="3" oninput="maxLengthCheck(this)" placeholder="" class="inputtext noeditt" contenteditable="false" readonly="readonly"><span class="ms-1">%</span></label>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col col-lg-3 col-md-4 col-sm-6">
                                            <ul class="prolist AllDetail">
                                                <li><label><span>Northern Europe</span>
                                                    <input type="number" name="northern_europe" value="{{$markets->northern_europe}}" maxlength="3" oninput="maxLengthCheck(this)" placeholder="" class="inputtext noeditt" contenteditable="false" readonly="readonly"><span class="ms-1">%</span></label>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col col-lg-3 col-md-4 col-sm-6">
                                            <ul class="prolist AllDetail">
                                                <li><label><span>Southern Europe</span>
                                                    <input type="number" name="southern_europe" value="{{$markets->southern_europe}}" maxlength="3" oninput="maxLengthCheck(this)" placeholder="" class="inputtext noeditt" contenteditable="false" readonly="readonly"><span class="ms-1">%</span></label>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col col-lg-3 col-md-4 col-sm-6">
                                            <ul class="prolist AllDetail">
                                                <li><label><span>Southeast Asia</span>
                                                    <input type="number" name="southeast_asia" value="{{$markets->southeast_asia}}" maxlength="3" oninput="maxLengthCheck(this)" placeholder="" class="inputtext noeditt" contenteditable="false" readonly="readonly"><span class="ms-1">%</span></label>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col col-lg-3 col-md-4 col-sm-6">
                                            <ul class="prolist AllDetail">
                                                <li><label><span>Eastern Asia</span>
                                                    <input type="number" name="eastern_asia" value="{{$markets->eastern_asia}}" maxlength="3" oninput="maxLengthCheck(this)" placeholder="" class="inputtext noeditt" contenteditable="false" readonly="readonly"><span class="ms-1">%</span></label>
                                                </li>
                                            </ul>
                                        </div>
                                        
                                        
                                        <div class="col col-lg-3 col-md-4 col-sm-6">
                                            <ul class="prolist AllDetail">
                                                <li><label><span>South Asia</span>
                                                    <input type="number" name="south_asia" value="{{$markets->south_asia}}" maxlength="3" oninput="maxLengthCheck(this)" placeholder="" class="inputtext noeditt" contenteditable="false" readonly="readonly"><span class="ms-1">%</span></label>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col col-lg-3 col-md-4 col-sm-6">
                                            <ul class="prolist AllDetail">
                                                <li><label><span>Africa</span>
                                                    <input type="number" name="africa" value="{{$markets->africa}}" maxlength="3" oninput="maxLengthCheck(this)" placeholder="" class="inputtext noeditt" contenteditable="false" readonly="readonly"><span class="ms-1">%</span></label>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col col-lg-3 col-md-4 col-sm-6">
                                            <ul class="prolist AllDetail">
                                                <li><label><span>Oceania</span>
                                                    <input type="number" name="oceania" value="{{$markets->oceania}}" maxlength="3" oninput="maxLengthCheck(this)" placeholder="" class="inputtext noeditt" contenteditable="false" readonly="readonly"><span class="ms-1">%</span></label>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col col-lg-3 col-md-4 col-sm-6">
                                            <ul class="prolist AllDetail">
                                                <li><label><span>Mid East</span>
                                                    <input type="number" name="mid_east" value="{{$markets->mid_east}}" maxlength="3" oninput="maxLengthCheck(this)" placeholder="" class="inputtext noeditt" contenteditable="false" readonly="readonly"><span class="ms-1">%</span></label>
                                                </li>
                                            </ul>
                                        </div>
                                        
                                        <div class="col col-lg-3 col-md-4 col-sm-6">
                                            <ul class="prolist AllDetail">
                                                <li><label><span>Domestic Market</span>
                                                    <input type="number" name="domestic_market" value="{{$markets->domestic_market}}" maxlength="3" oninput="maxLengthCheck(this)" placeholder="" class="inputtext noeditt" contenteditable="false" readonly="readonly"><span class="ms-1">%</span></label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-6 mt-3">
                                            <ul class="prolist AllDetail">
                                                <li class="d-block"><span>Year when your company started exporting</span>
                                                <input type="number" name="start_exporting" value="{{$list->comp->start_exporting}}" maxlength="4" oninput="maxLengthCheck(this)" placeholder="" class="inputtext noeditt" contenteditable="false" readonly="readonly">
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-12 col-md-6 mt-3">
                                            <ul class="prolist AllDetail">
                                                <li class="d-block"><span>No. of Employees in Trade Department</span>
                                                <input type="number" name="trade_department" value="{{$list->comp->trade_department}}" maxlength="5" oninput="maxLengthCheck(this)" placeholder="" class="inputtext noeditt" contenteditable="false" readonly="readonly">
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-12 col-md-6 mt-3">
                                            <ul class="prolist AllDetail">
                                                <li class="d-block">
                                                    <span>Are you able to source across multiple industries ?</span>
                                                    <div class="radiob">
                                                        <div class="form-check">
                                                            <input type="radio" class="inputtext" {{$list->comp->multiple_industries==1?'checked':''}} name="multiple_industries" value="1"  id="mYes" disabled="disabled">
                                                            <label for="mYes">Yes</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input type="radio" class="inputtext" {{$list->comp->multiple_industries==0?'checked':''}} name="multiple_industries" value="0"  id="mNo" disabled="disabled">
                                                            <label for="mNo">No</label>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    
                                        <div class="col-12 col-md-6 mt-3">
                                            <ul class="prolist AllDetail">
                                                <li class="d-block">
                                                    <span>Does your company have an overseas office ?</span>
                                                    <div class="radiob">
                                                        <div class="form-check">
                                                            <input type="radio" class="inputtext" name="overseas_office" {{$list->comp->overseas_office==1?'checked':''}} value="1" id="oYes" disabled="disabled">
                                                            <label for="oYes">Yes </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input type="radio" class="inputtext" name="overseas_office" {{$list->comp->overseas_office==0?'checked':''}} value="0"  id="oNo" disabled="disabled">
                                                            <label for="oNo">No</label>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <ul class="prolist AllDetail">
                                                <li class="d-block">
                                                    <span>Accepted Payment Currency</span>
                                                    <div class="checkb">
                                                        @foreach($paymentcurrencies as $currency)
                                                        <div class="form-check">
                                                            <input type="checkbox" {{!empty($list->comp->currency) ? in_array($currency->id,json_decode($list->comp->currency)) ? 'checked' : '' : ''}} class="form-check-input inputtext" value="{{$currency->id}}" name="currency[]" id="currency{{$currency->name}}" disabled="disabled">
                                                            <label for="currency{{$currency->name}}">{{$currency->name}}</label>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <ul class="prolist AllDetail">
                                                <li class="d-block">
                                                    <span>Accepted Payment Type</span>
                                                    <div class="checkb">
                                                        @foreach($paymenttypes as $types)
                                                        <div class="form-check">
                                                            <input type="checkbox" {{!empty($list->comp->payment_type) ? in_array($types->id,json_decode($list->comp->payment_type)) ? 'checked' : '' : ''}} class="form-check-input inputtext" name="type[]" value="{{$types->id}}" id="payment{{$types->id}}" disabled="disabled">
                                                            <label for="payment{{$types->id}}">{{$types->name}}</label>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <ul class="prolist AllDetail">
                                                <li class="d-block">
                                                    <span>Language Spoken</span>
                                                    <div class="checkb">
                                                        @foreach($languages as $language)
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input inputtext" {{!empty($list->comp->language) ? in_array($language->id,json_decode($list->comp->language)) ? 'checked' : '' : ''}} value="{{$language->id}}" name="language[]" id="language{{$language->id}}" disabled="disabled">
                                                            <label for="language{{$language->id}}">{{$language->name}}</label>
                                                        </div>
                                                        @endforeach
                                                    </div>
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
<title>Trade Capacity : ebizzmart</title>
<link rel="stylesheet" type="text/css" media="screen,projection" href="{{asset('frontend/css/profile.css')}}">
<link rel="stylesheet" type="text/css" media="screen,projection" href="{{asset('frontend/css/company-info.css')}}">
<style>
.defaultimgcss{width:130px;border-radius: 5px;cursor: pointer;transition: 0.3s;border: 1px solid #ddd;border-radius: 3px;padding: 4px;}
</style>
@endpush

@push('scripts')
<script src="{{asset('frontend/js/my-company.js')}}"></script>
<script type="text/javascript">
const UpdateTradeCapacity = "{{route('account.update-trade-capacity')}}";
</script>
@endpush       