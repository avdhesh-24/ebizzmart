@extends('layouts.app')
@section('content')
<div class="contentp">
    <section class="grey Profile pt-1">
        <div class="container">
            <div class="row mb-2">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="fal fa-home-alt"></i></a></li>
                        <li class="breadcrumb-item"><a aria-current="page">Choose Product Category</a></li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <x-account-left/>
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-body">
                            <div class="w-75 mx-auto position-relative">
                                <form method="get" action="{{url()->current()}}">
                                     @csrf
                                    <div class="input-group">
                                        <input type="text" autocomplete="off" value="{{!empty($_GET['search'])?$_GET['search']:''}}" required name="search" class="form-control searchproductcategory" placeholder="Search Category Name Here..."  aria-label="Recipient's username" aria-describedby="SearchBox">
                                        <button class="btn btn-main mt-0" id="SearchBox">Go!</button>
                                        @if(!empty($_GET['search']))
                                        <a href="{{url()->current()}}" class="btn btn-main2 ml-5 mt-0">Refresh</a>
                                        @endif
                                    </div>
                                    <div class="searchbox"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <form class="card">
                        <div class="card-body">
                            <ul class="PostStep"></ul>
                            <div class="row CatBoxs">
                                <div class="col-md-4">
                                    @if(count($category)>0)
                                    <div class="CatBox" id="CatBox1">
                                        <ul>
                                            @foreach($category as $cat)
                                            <li onclick="getChildCategory({{$cat->id}},{{$cat->level + 1 }},{{count($cat->child)}})"><span>{{$cat->name}} </span></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <div class="CatBox childBox" id="CatBox2" style="display:none"></div>
                                </div>
                                <div class="col-md-4">
                                    <div class="CatBox childBox" id="CatBox3" style="display:none"></div>
                                </div>
                            </div>
                            <div class="text-center">
                                <a href="" id="nextprocess" class="btn btn-main2 mt-4 disabled">I have choose category & continue to next process</a>
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
<title>Product Category : ebizzmart</title>
<link rel="stylesheet" type="text/css" media="screen,projection" href="{{asset('frontend/css/profile.css')}}">
<link rel="stylesheet" type="text/css" media="screen,projection" href="{{asset('frontend/css/pro-manage.css')}}">
@endpush
@push('scripts')
<script defer src="{{asset('frontend/js/manage-product.js')}}"></script>
<script> 
const ChooseProductCategory = "{{route('account.choose-product-category')}}";
const SearchProductCategory = "{{route('account.search-product-category')}}";
</script>
@endpush       