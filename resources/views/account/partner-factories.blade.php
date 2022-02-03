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
                        <li class="breadcrumb-item"><a aria-current="page">Partner Factories</a></li>
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
                    <form class="card links mb-4 AddFactories" id="partner-factories">
                        @csrf
                        <div class="card-body">
                            <a class="EditText text-primary sws-top sws-bounce" data-title="Add Factories" id="edit-partner-factories"><i class="far fa-plus-square"></i> </a>
                            <button class="EditText thm me-4 sws-top sws-bounce" id="save-partner-factories" style="display:none" type="submit"><i class="far fa-check"></i></button>
                            <a class="EditText text-danger sws-top sws-bounce" data-title="Cancel" id="cancel-partner-factories" style="display:none"><i class="far fa-times"></i></a>
                            <div class="d-flex edittextbox">
                                <div class="w-100">
                                    <h3 class="h5 thm">Partner Factories</h3>
                                    <div class="row addFactories" style="display:none;">
                                        <div class="col-12 col-md-6">
                                            <ul class="prolist AllDetail">
                                                <li><span>Factory Size</span>
                                                <input type="text" name="factory_size" placeholder="eg: 1,000-3,000 square meters" class="inputtext noeditt" contenteditable="false" readonly="readonly">
                                                </li>
                                            </ul>
                                        </div> 
                                        <div class="col-12 col-md-6">
                                            <ul class="prolist AllDetail">
                                                <li><span>Factory Address</span>
                                                <input type="text" name="factory_region" placeholder="eg: New Delhi, India" class="inputtext noeditt" contenteditable="false" readonly="readonly">
                                                </li>
                                            </ul>
                                        </div> 
                                        <div class="col-12 col-md-6">
                                            <ul class="prolist AllDetail">
                                                <li><span>Production Lines</span>
                                                    <input type="number" name="production_line" placeholder="No. of Production Lines" class="inputtext noeditt" contenteditable="false" readonly="readonly">
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <ul class="prolist AllDetail">
                                                <li><span>Annual Output</span>
                                                    <input type="text" name="annual_output"  placeholder="Annual Output Value" class="inputtext noeditt" contenteditable="false" readonly="readonly">
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-12">
                                            <ul class="prolist AllDetail">
                                                <li><span>Contract Manufacturing</span>
                                                    <input type="text" name="manufacturing" placeholder="OEM Service Offered, Design Service Offered" class="inputtext noeditt" contenteditable="false" readonly="readonly">
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="factoriesbox">
                        @foreach($list->comp->factories as $factorie)
                        <form class="card links mb-4 EditFactories{{$factorie->id}}" id="partner-factories{{$factorie->id}}">
                            @csrf
                            <input type="hidden" name="preId" value="{{$factorie->id}}">
                            <div class="card-body">
                                <a class="EditText text-primary sws-top sws-bounce" onclick="EditFactorie({{$factorie->id}})" data-title="Edit" id="edit-update-factories{{$factorie->id}}"><i class="far fa-edit"></i> </a>
                                <button class="EditText thm me-4 sws-top sws-bounce" onclick="SaveFactorie({{$factorie->id}})" id="save-update-factories{{$factorie->id}}" style="display:none" type="submit"><i class="far fa-check"></i></button>
                                <a class="EditText text-danger sws-top sws-bounce" onclick="CancelFactorie({{$factorie->id}})" data-title="Cancel" id="cancel-update-factories{{$factorie->id}}" style="display:none"><i class="far fa-times"></i></a>
                                <div class="d-flex edittextbox">
                                    <div class="w-100">
                                        <h3 class="h5 thm">&nbsp;&nbsp;&nbsp;</h3>
                                        <div class="row">
                                        <div class="col-12 col-md-6">
                                            <ul class="prolist AllDetail">
                                                <li><span>Factory Size</span>
                                                <input type="text" name="factory_size" value="{{$factorie->factory_size}}" placeholder="eg: 1,000-3,000 square meters" class="inputtext noeditt" contenteditable="false" readonly="readonly">
                                                </li>
                                            </ul>
                                        </div> 
                                        <div class="col-12 col-md-6">
                                            <ul class="prolist AllDetail">
                                                <li><span>Factory Address</span>
                                                <input type="text" name="factory_region" value="{{$factorie->factory_address}}" placeholder="eg: New Delhi, India" class="inputtext noeditt" contenteditable="false" readonly="readonly">
                                                </li>
                                            </ul>
                                        </div> 
                                        <div class="col-12 col-md-6">
                                            <ul class="prolist AllDetail">
                                                <li><span>Production Lines</span>
                                                    <input type="number" name="production_line" value="{{$factorie->production_line}}" placeholder="No. of Production Lines" class="inputtext noeditt" contenteditable="false" readonly="readonly">
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <ul class="prolist AllDetail">
                                                <li><span>Annual Output</span>
                                                    <input type="text" name="annual_output" value="{{$factorie->annual_output}}"  placeholder="Annual Output Value" class="inputtext noeditt" contenteditable="false" readonly="readonly">
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-12">
                                            <ul class="prolist AllDetail">
                                                <li><span>Contract Manufacturing</span>
                                                    <input type="text" name="manufacturing" value="{{$factorie->manufacturing}}" placeholder="OEM Service Offered, Design Service Offered" class="inputtext noeditt" contenteditable="false" readonly="readonly">
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
 
@push('css')
<title>Partner Factories : ebizzmart</title>
<link rel="stylesheet" type="text/css" media="screen,projection" href="{{asset('frontend/css/profile.css')}}">
<link rel="stylesheet" type="text/css" media="screen,projection" href="{{asset('frontend/css/company-info.css')}}">
<style>
.defaultimgcss{width:130px;border-radius: 5px;cursor: pointer;transition: 0.3s;border: 1px solid #ddd;border-radius: 3px;padding: 4px;}
</style>
@endpush

@push('scripts')
<script src="{{asset('frontend/js/my-company.js')}}"></script>
<script>
    const AddFactoriesUrl = "{{route('account.add-partner-factories')}}";
</script>
@endpush       