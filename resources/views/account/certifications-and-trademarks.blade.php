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
                        <li class="breadcrumb-item"><a aria-current="page">Certifications Trademarks</a></li>
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

                    <form class="card links mb-4 CertificationsAlbum" style="display:none;" method="post" id="certifications-image" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <a class="EditText text-primary sws-top sws-bounce" data-title="Edit" id="edit-certifications"><i class="far fa-edit"></i> </a>
                            <button class="EditText thm me-4 sws-top sws-bounce" id="save-certifications" style="display:none" type="submit"><i class="far fa-check"></i></button>
                            <a class="EditText text-danger sws-top sws-bounce" data-title="Cancel" id="cancel-certifications" style="display:none"><i class="far fa-times"></i></a>
                            <div class="d-flex edittextbox">
                                <div class="w-100">
                                    <h3 class="h5 thm">Company Certifications</h3>
                                    <div class="row">
                                        <div class="col-6">
                                            <ul class="prolist AllDetail">
                                                <li>
                                                    <label class="pic" style="display:none;">
                                                        <input type="file" name="file[]"  id="image-input" placeholder="" class="inputtext noeditt d-none" contenteditable="false" readonly="readonly">
                                                        <span><img src="{{asset('frontend/img/upload-logo.svg')}}"><span>Upload Certificate Image</span></span>
                                                        <span style="font-size: 10px;color: #dc3545!important;">BEST IMAGE SIZE 900px * 900px</span>
                                                    </label>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-6">
                                            <ul class="prolist AllDetail">
                                                <li class="certificateName" style="display:none;">
                                                    <input type="text" name="certificate_name[]"  placeholder="Certificate Name Here..." class="inputtext noeditt" contenteditable="false" readonly="readonly">
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row certificationsbox">
                                        @foreach($certifications as $album)
                                        <div class="col-3">
                                            <div class="ComAlbums">
                                                <a href="{{asset('uploads/company/certifications/'.$album->image)}}" data-fancybox="gallery"><img src="{{asset('uploads/company/certifications/thumb/'.$album->thumb_image)}}"></a>
                                                <button type="button" onclick="RemoveCertifications()" style="display:none;" class="btn btn-danger btn-close"><!-- <i class="fa fa-trash"></i> --></button>
                                            </div>
                                            <h3 class="h6 text-center thm1">{{$album->name}}</h3>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <form class="card links ProductCertificationsAlbum" style="display:none;" method="post" id="product-certifications-image" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <a class="EditText text-primary sws-top sws-bounce" data-title="Edit" id="edit-product-certifications"><i class="far fa-edit"></i> </a>
                            <button class="EditText thm me-4 sws-top sws-bounce" id="save-product-certifications" style="display:none" type="submit"><i class="far fa-check"></i></button>
                            <a class="EditText text-danger sws-top sws-bounce" data-title="Cancel" id="cancel-product-certifications" style="display:none"><i class="far fa-times"></i></a>
                            <div class="d-flex edittextbox">
                                <div class="w-100">
                                    <h3 class="h5 thm">Product Certifications</h3>
                                    <div class="row">
                                        <div class="col-6">
                                            <ul class="prolist AllDetail">
                                                <li>
                                                    <label class="pic" style="display:none;">
                                                        <input type="file" name="file[]"  id="image-input" placeholder="" class="inputtext noeditt d-none" contenteditable="false" readonly="readonly">
                                                        <span><img src="{{asset('frontend/img/upload-logo.svg')}}"><span>Upload Product Certificate Image</span></span>
                                                        <span style="font-size: 10px;color: #dc3545!important;">BEST IMAGE SIZE 900px * 900px</span>
                                                    </label>
                                                    <!-- <input type="file" name="file[]" multiple id="image-input" placeholder="" class="inputtext noeditt" contenteditable="false" readonly="readonly"> -->
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-6">
                                            <ul class="prolist AllDetail">
                                                <li class="productcertificateName" style="display:none;">
                                                    <input type="text" name="certificate_name[]"  placeholder="Certificate Name Here..." class="inputtext noeditt" contenteditable="false" readonly="readonly">
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row productcertificationsbox">
                                        @foreach($productcertifications as $album)
                                        <div class="col-3">
                                            <div class="ComAlbums">
                                                <a href="{{asset('uploads/company/product-certifications/'.$album->image)}}" data-fancybox="gallery"><img src="{{asset('uploads/company/product-certifications/thumb/'.$album->thumb_image)}}"></a>
                                                <button type="button" onclick="RemoveProductCertifications({{$album->id}})" style="display:none;" class="btn btn-danger btn-close"><!-- <i class="fa fa-trash"></i> --></button>
                                            </div>
                                            <h3 class="h6 text-center thm1">{{$album->name}}</h3>
                                        </div>
                                        @endforeach
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
<link rel="stylesheet" type="text/css" media="screen,projection" href="{{asset('frontend/css/company-info.css')}}">
<style>
.defaultimgcss{width:130px;border-radius: 5px;cursor: pointer;transition: 0.3s;border: 1px solid #ddd;border-radius: 3px;padding: 4px;}
</style>
@endpush

@push('scripts')
<link rel="preload" as="style" rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" onload="this.rel='stylesheet'" />
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<script>
    var myEditor;
    $('.CertificationsAlbum').show();
    $('.ProductCertificationsAlbum').show();
    const CertificationsAlbum = "{{route('account.upload-company-certifications')}}";
    const RemoveCertificationsAlbum = "{{route('account.remove-company-certifications')}}";
    const ProductCertifications = "{{route('account.upload-company-product-certifications')}}";
    const RemoveProductCertification = "{{route('account.remove-company-product-certifications')}}";
</script>
@endpush       