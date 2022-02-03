@extends('layouts.app')
@section('content')
<div class="contentp">
    <section class="grey Profile pt-1">
        <div class="container">
            <div class="row mb-2">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="fal fa-home-alt"></i></a></li>
                        <li class="breadcrumb-item"><a aria-current="page">Company Infomation</a></li>
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
                    <form class="card links mb-4 logosec" id="upload-company-logo" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <a class="EditText text-primary sws-top sws-bounce" data-title="Edit" id="edit-company-logo"><i class="far fa-edit"></i> </a>
                            <button class="EditText thm me-4 sws-top sws-bounce" id="save-company-logo" style="display:none" type="submit"><i class="far fa-check"></i></button>
                            <a class="EditText text-danger sws-top sws-bounce" data-title="Cancel" id="cancel-company-logo" style="display:none"><i class="far fa-times"></i></a>
                            <div class="d-flex edittextbox">
                                <div class="w-100">
                                    <h3 class="h5 thm">Logo and Banner</h3>
                                    <div class="row">
                                        <div class="col-3 border-end">
                                            <div class="row">
                                                <div class="col-12">
                                                    <ul class="prolist AllDetail">
                                                        <li>
                                                            <input type="hidden" name="prelogo" value="{{!empty($list->comp->logo) ? $list->comp->logo : ''}}">
                                                            <label class="pic"  style="display:none">
                                                                <input type="file" name="logo" multiple id="image-input" placeholder="" class="inputtext noeditt d-none" contenteditable="false" readonly="readonly">
                                                                <span>
                                                                    <img src="{{asset('frontend/img/upload-logo.svg')}}"><span>Upload Logo</span>
                                                                </span>
                                                                <span style="font-size: 10px;color: #dc3545!important;">BEST LOGO SIZE 200px * 200px </span>
                                                            </label>
                                                        </li>
                                                    </ul>
                                                    <div class="ComAlbums logobox">
                                                        @if(!empty($list->comp->logo) && file_exists(public_path('uploads/company/'.$list->comp->logo)))
                                                            <div><img src="{{asset('uploads/company/'.$list->comp->logo)}}"></div>
                                                        @else
                                                            <div><img src="{{asset('frontend/image/md-dimg.webp')}}"></div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-12">
                                                    <ul class="prolist AllDetail">
                                                        <li>
                                                            <label class="pic"  style="display:none">
                                                                <input type="file" name="banner[]" multiple id="image-input" placeholder="" class="inputtext noeditt d-none" contenteditable="false" readonly="readonly">
                                                                <span>
                                                                    <img src="{{asset('frontend/img/upload-logo.svg')}}">
                                                                    <span>Upload Banner Images </span>
                                                                </span>
                                                                <span style="font-size: 10px;color: #dc3545!important;">BEST BANNER SIZE 1350px * 350px</span>
                                                            </label>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="row bannerbox">
                                                @foreach($banners as $banner)
                                                <div class="col-3">
                                                    <div class="ComAlbums">
                                                        <a href="{{asset('uploads/company/banner/'.$banner->image)}}" data-fancybox="gallery"><img src="{{asset('uploads/company/banner/'.$banner->image)}}"></a>
                                                        <button type="button" onclick="RemoveCompanyBanner({{$banner->id}})" style="display:none;" class="btn btn-danger btn-close"><!-- <i class="fa fa-trash"></i> --></button>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <form class="card links mb-4 Cominfo" style="display:none;">
                        <div class="card-body">
                            <a class="EditText text-primary sws-top sws-bounce" data-title="Edit" id="edit-company"><i class="far fa-edit"></i> </a>
                            <a class="EditText thm me-4 sws-top sws-bounce" data-title="Save" id="save-company" style="display:none"><i class="far fa-check"></i></a>
                            <a class="EditText text-danger sws-top sws-bounce" data-title="Cancel" id="cancel-company" style="display:none"><i class="far fa-times"></i></a>
                            <div class="d-flex edittextbox">
                                <div class="w-100">
                                    <h3 class="h5 thm">Company Information</h3>
                                    <div class="row">
                                        <div class="col-6">
                                            <ul class="prolist AllDetail">
                                                <li><span>Company Name</span>
                                                    <input type="text" name="company_name" value="{{$list->comp->company_name}}" placeholder="" class="inputtext noeditt" contenteditable="false" readonly="readonly">
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-6">
                                            <ul class="prolist AllDetail">
                                                <li><span>Company Phone</span>
                                                    <input type="text" name="company_phone_no" value="{{$list->comp->company_phone_no}}" placeholder="" class="inputtext noeditt" contenteditable="false" readonly="readonly">
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-6">
                                            <ul class="prolist AllDetail">
                                                <li><span>Company Email</span>
                                                    <input type="email" name="company_email" value="{{$list->comp->company_email}}" placeholder="" class="inputtext noeditt" contenteditable="false" readonly="readonly">
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-6">
                                            <ul class="prolist AllDetail">
                                                <li><span>I am</span>
                                                    <select class="inputtext noeditt chosen" id="floatingSelect" name="iam" aria-label="">
                                                        <option value="">-- Select Type --</option>
                                                        @foreach($usertype as $type)
                                                        <option value="{{$type->id}}" {{$list->comp->iam==$type->id ? 'selected' : ''}} >{{$type->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-6">
                                            <ul class="prolist AllDetail">
                                                <li><span>Business Type</span>
                                                    <select class="inputtext noeditt chosen" id="floatingSelect" name="business_type" aria-label="">
                                                        <option value="">-- Select Business Type --</option>
                                                        @foreach($businesstype as $business)
                                                        <option value="{{$business->id}}" {{$list->comp->business_type==$business->id ? 'selected' : ''}} >{{$business->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-6">
                                            <ul class="prolist AllDetail">
                                                <li><span>GST Number</span>
                                                    <input type="text" name="gst" value="{{$list->comp->gst}}" placeholder="" class="inputtext noeditt" contenteditable="false" readonly="readonly">
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-12">
                                            <ul class="prolist AllDetail">
                                                <li><span>Business In</span>
                                                    <select class="inputtext noeditt chosen" multiple id="floatingSelect" name="business_in" aria-label="">
                                                        <option value="">Choose Business In</option>
                                                        {!! $categories !!}
                                                    </select>
                                                </li>
                                            </ul>
                                        </div>
                                    </div><hr class="border-secondary mb-2">
                                    <div class="row mt-3">
                                        <div class="col-12 col-md-12">
                                            <h3 class="h6 thm1"><strong>Location of Registration</strong></h3>
                                        </div>
                                        <div class="col col-md-6">
                                            <ul class="prolist AllDetail">
                                                <li><span>Country/Region</span>
                                                    <select class="inputtext noeditt chosen" id="floatingSelect" name="country" aria-label="">
                                                        <option value="">-- Select --</option>
                                                        @foreach($countries as $country)
                                                        <option value="{{$country->id}}" {{$list->comp->country==$country->id ? 'selected' : ''}}>{{$country->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col col-md-6">
                                            <ul class="prolist AllDetail">
                                                <li><span>Province/City</span>
                                                    <select class="inputtext noeditt chosen" id="floatingSelect" name="city" aria-label="">
                                                        <option value="">-- Select --</option>
                                                        @foreach($cities as $citi)
                                                        <option value="{{$citi->id}}" {{$list->comp->city==$citi->id ? 'selected' : ''}}>{{$citi->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </li>
                                            </ul>
                                        </div>
                                    </div><hr class="border-secondary mb-2">
                                    <div class="row mt-3">
                                        <div class="col-12 col-md-8">
                                            <h3 class="h6 thm1"><strong>Company Operational Address</strong></h3>
                                            <ul class="prolist AllDetail">
                                                <li><span>Address</span>
                                                    <input type="text" name="address" value="{{$list->comp->address}}" placeholder="" class="inputtext noeditt" contenteditable="false" readonly="readonly">
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col col-md-4">
                                            <h3 class="h6 thm1"><strong>&nbsp;&nbsp;&nbsp;&nbsp;</strong></h3>
                                            <ul class="prolist AllDetail">
                                                <li><span>Zip/Postal Code</span>
                                                    <input type="text" name="pincode" value="{{$list->comp->pincode > 0 ? $list->comp->pincode : ''}}" placeholder="" class="inputtext noeditt" contenteditable="false" readonly="readonly">
                                                </li>
                                            </ul>
                                        </div>
                                    </div><hr class="border-secondary mb-2">
                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <h3 class="h6 thm1"><strong>Basic information</strong></h3>
                                            <textarea name="about" id="editor" placeholder="Write About Company..." class="inputtext noeditt editor" contenteditable="false" readonly="readonly">{{$list->comp->about}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    
                    <form class="card links mb-4 ComOthinfo">
                        <div class="card-body">
                            <a class="EditText text-primary sws-top sws-bounce" data-title="Edit" id="edit-company-other"><i class="far fa-edit"></i> </a>
                            <a class="EditText thm me-4 sws-top sws-bounce" data-title="Save" id="save-company-other" style="display:none"><i class="far fa-check"></i></a>
                            <a class="EditText text-danger sws-top sws-bounce" data-title="Cancel" id="cancel-company-other" style="display:none"><i class="far fa-times"></i></a>
                            <div class="d-flex edittextbox">
                                <div class="w-100">
                                    <h3 class="h5 thm">Company Other Info</h3>
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <ul class="prolist AllDetail">
                                                <li><span>Year Established</span>
                                                <input type="number" name="established" value="{{$list->comp->established}}" placeholder="Year Established" class="inputtext noeditt" contenteditable="false" readonly="readonly">
                                                </li>
                                            </ul>
                                        </div> 
                                        <div class="col-12 col-md-6">
                                            <ul class="prolist AllDetail">
                                                <li><span>Total No. Employees</span>
                                                    <select class="inputtext noeditt" name="employees" contenteditable="false" readonly="readonly">
                                                        <option value="0">-- No. Of Employees ---</option>
                                                        <option value="10" {{$list->comp->employees==10 ? 'selected' : ''}}>10 Employees</option>
                                                        <option value="50" {{$list->comp->employees==50 ? 'selected' : ''}}>50 Employees</option>
                                                        <option value="100" {{$list->comp->employees==100 ? 'selected' : ''}}>100 Employees</option>
                                                        <option value="500" {{$list->comp->employees==500 ? 'selected' : ''}}>500 Employees</option>
                                                        <option value="1000" {{$list->comp->employees==1000 ? 'selected' : ''}}>1000 Employees</option>
                                                        <option value="1001" {{$list->comp->employees==1001 ? 'selected' : ''}}>1000+ Employees</option>
                                                    </select>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <ul class="prolist AllDetail">
                                                <li><span>Company Website URL</span>
                                                    <input type="url" name="website" value="{{$list->comp->website}}" placeholder="Company Website URL" class="inputtext noeditt" contenteditable="false" readonly="readonly">
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <ul class="prolist AllDetail">
                                                <li><span>Total Annual Revenue</span>
                                                    <input type="url" name="annual_revenue" value="{{$list->comp->annual_revenue}}" placeholder="Total Annual Revenue" class="inputtext noeditt" contenteditable="false" readonly="readonly">
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <ul class="prolist AllDetail">
                                                <li><span>Certifications</span>
                                                    <input type="url" name="certifications" value="{{$list->comp->certifications}}" placeholder="Certifications" class="inputtext noeditt" contenteditable="false" readonly="readonly">
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <ul class="prolist AllDetail">
                                                <li><span>Patents</span>
                                                    <input type="url" name="patents" value="{{$list->comp->patents}}" placeholder="Patents" class="inputtext noeditt" contenteditable="false" readonly="readonly">
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <form class="card links Comalbum" method="post" id="upload-image-form" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <a class="EditText text-primary sws-top sws-bounce" data-title="Edit" id="edit-company-album"><i class="far fa-edit"></i> </a>
                            <!-- <a class="EditText thm me-4 sws-top sws-bounce" data-title="Save" id="save-company-album" style="display:none"><i class="far fa-check"></i></a> -->
                            <button class="EditText thm me-4 sws-top sws-bounce" data-title="Save" id="save-company-album" style="display:none" type="submit"><i class="far fa-check"></i></button>
                            <a class="EditText text-danger sws-top sws-bounce" data-title="Cancel" id="cancel-company-album" style="display:none"><i class="far fa-times"></i></a>
                            <div class="d-flex edittextbox">
                                <div class="w-100">
                                    <h3 class="h5 thm">Company Albums</h3>
                                    <div class="row">
                                        <div class="col-12">
                                            <ul class="prolist AllDetail">
                                                <li>
                                                    <label class="pic" style="display:none;">
                                                        <input type="file" name="file[]" multiple id="image-input" placeholder="" class="inputtext noeditt d-none" contenteditable="false" readonly="readonly">
                                                        <span><img src="{{asset('frontend/img/upload-logo.svg')}}"><span>Upload Product Images</span></span>
                                                        <span style="font-size: 10px;color: #dc3545!important;">BEST IMAGE SIZE 900px * 900px</span>
                                                    </label>
                                                    <!-- <input type="file" name="file[]" multiple id="image-input" placeholder="" class="inputtext noeditt" contenteditable="false" readonly="readonly"> -->
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row albumbox">
                                        @foreach($albums as $album)
                                        <div class="col-2">
                                            <div class="ComAlbums">
                                                <a href="{{asset('uploads/company/'.$album->image)}}" data-fancybox="gallery"><img src="{{asset('uploads/company/thumb/'.$album->thumb_image)}}"></a>
                                                <button type="button" onclick="RemoveAlbum({{$album->id}})" style="display:none;" class="btn btn-danger btn-close"><!-- <i class="fa fa-trash"></i> --></button>
                                            </div>
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
<link href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" rel="stylesheet" media="all">
@endpush

@push('scripts')
<link rel="preload" as="style" rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" onload="this.rel='stylesheet'" />
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
<script src="{{asset('frontend/ckeditor/config.js')}}"></script>
<script src="{{asset('frontend/js/my-company.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    setTimeout(function(){
        $(".ck-editor .ck-content").attr("contenteditable", false);
    },1000);
    $('#edit-company').click(function(){
        $(".ck-editor .ck-content").attr("contenteditable", true);
    });
    $('#cancel-company').click(function(){
        $(".ck-editor .ck-content").attr("contenteditable", false);
    });
});
</script>
<script>
    var myEditor;
    $('.chosen').chosen();
    $('.Cominfo').show();
    $('.ComOthinfo').show();
    $('.Comalbum').show();
    $('.chosen-container-single').css('width','100%');
        $('.chosen-container-multi').css('width','100%');
    ClassicEditor
		.create( document.querySelector( '#editor' ), {
			extraPlugins: [ SimpleUploadAdapterPlugin ],
		} )
		.then( editor => {
			myEditor = editor;
            console.log( 'Editor was initialized', editor );
		} )
		.catch( err => {
			console.error( err.stack );
		} );
    const UpdateUserInfo = "{{route('account.update-user-information')}}";
    const UpdateCompanyInfo = "{{route('account.update-company-information')}}";
    const UpdateBankInfo = "{{route('account.update-bank-information')}}";
    const UpdateCompanyAlbum = "{{route('account.update-company-album')}}";
    const RemoveAlbumUrl = "{{route('account.remove-company-album')}}";
    const UpdateCompanyLogo = "{{route('account.update-company-logo')}}";
    const RemoveBannerUrl = "{{route('account.remove-company-banner')}}";
</script>
@endpush       