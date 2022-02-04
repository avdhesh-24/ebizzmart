@extends('layouts.app')
@section('content')
<div class="contentp">
    <section class="grey Profile pt-1">
        <div class="container">
            <div class="row mb-2">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="fal fa-home-alt"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{route('account.post-product')}}">Choose Product Category</a></li>
                        <li class="breadcrumb-item"><a aria-current="page">Manage Product</a></li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <x-account-left/>
                <div class="col-md-10">
                    <div class="card ProTop">
                        <div class="card-body d-flex justify-content-between">
                            <h3 class="h5 thm m-0">Add Product</h3>
                            <div class="btn-group" role="group" aria-label="Back to Product List"><a href="{{route('account.manage-product')}}" class="btn py-1 sws-left sws-bounce" data-title="Back to Product List"><i class="far fa-chevron-left"></i></a></div>
                        </div>
                    </div>
                    <div class="card">
                        <form id="add-product" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="company" value="{{Auth::user()->company}}">
                            <div class="card-body AddPro">
                                <div class="mb-3 product_namebox">
                                    <label for="name" class="form-label">Product Name <span class="error">*</span></label>
                                    <input type="text" class="form-control" autocomplete="off" name="product_name" placeholder="Enter Product Name">
                                    <span class="error formerror product_name"></span>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-6 default_imagebox">
                                            <label for="photo" class="form-label">Default Product Images <span class="error">*</span></label>
                                            <label class="pic">
                                                <input type="file" name="default_image" class="d-none">
                                                <span>
                                                    <img src="{{asset('frontend/img/upload-logo.svg')}}">
                                                    <span>Upload Product Images</span>
                                                </span>
                                                <span style="font-size: 10px;color: #dc3545!important;">BEST IMAGE SIZE 900px * 900px </span>
                                            </label>
                                            <span class="error formerror default_image"></span>
                                        </div>
                                        <div class="col-6">
                                            <label for="photo" class="form-label">All Product Photo </label>
                                            <label class="pic">
                                                <input type="file" class="d-none" name="moreimg[]" multiple>
                                                <span>
                                                    <img src="{{asset('frontend/img/upload-logo.svg')}}">
                                                    <span>Upload Product Images</span>
                                                </span>
                                                <span style="font-size: 10px;color: #dc3545!important;">BEST IMAGE SIZE 900px * 900px </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3 minimum_order_qtybox">
                                    <div class="col-6">
                                        <label for="name" class="form-label">Product MRO <span class="error">*</span></label>
                                        <input type="number" class="form-control" autocomplete="off" min="1" id="minimum_order_qty" name="minimum_order_qty" placeholder="Enter Product MRO">
                                        <span class="error formerror minimum_order_qty"></span>
                                    </div>
                                    <div class="col-6">
                                        <label for="name" class="form-label">Product Availability <span class="error">*</span></label>
                                        <div class="btn-group w-100" role="group" aria-label="Basic radio toggle button group">
                                            <input type="radio" class="btn-check" name="availability" value="1" id="btnradio1" autocomplete="off" checked>
                                            <label class="btn btn-outline-thm" for="btnradio1">In Stock</label>
                                            <input type="radio" class="btn-check" name="availability" value="0" id="btnradio2" autocomplete="off">
                                            <label class="btn btn-outline-thm" for="btnradio2">Out of Stock</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <label for="procat" class="form-label">Product Category <span class="error">*</span></label>
                                        <input type="hidden" name="category" value="{{$category->id}}">
                                        <input type="text" class="form-control" id="category" value="{{$category->name}}" readonly placeholder="Enter Product Name">
                                    </div>
                                    <div class="col-6 brandbox">
                                        <label for="bname" class="form-label">Brand Name <span class="error">*</span> </label>
                                        <select class="inputtext noeditt chosen" id="floatingSelect" name="brand" id="brand" aria-label="">
                                            <option value="">-- Select Brand --</option>
                                            @foreach($brands as $brand)
                                            <option value="{{$brand->id}}" >{{$brand->name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="error formerror brand"></span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="sdes" class="form-label">Short Description <span class="text-danger">(Only 250 Word Allowed)</span></label>
                                    <textarea class="form-control" id="sdes" name="short_description" placeholder="Enter Short Description"></textarea>
                                </div>
                                @if(count($category->catattribute)>0)
                                <div class="mb-3">
                                    <label for="proatt" class="form-label">Product Attributes</label>
                                    <div class="accordion" id="Attributes">
                                        @foreach($category->catattribute as $group)
                                        <div class="accordion-item">
                                            <div class="accordion-header {{$loop->iteration==1?'':'collapsed'}}" id="headingSize"><button class="accordion-button py-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$group->attribute_group->id}}" aria-expanded="true" aria-controls="collapseSize">{{$group->attribute_group->title}}</button></div>
                                            <div id="collapse{{$group->attribute_group->id}}" class="accordion-collapse collapse{{$loop->iteration==1?' show':''}}" aria-labelledby="headingSize" data-bs-parent="#Attributes">
                                                <div class="accordion-body">
                                                    <ul class="ProAttList">
                                                        @foreach($group->attribute_group->attributes as $attribute)
                                                        <li>
                                                            <div class="row">
                                                                <div class="col-2">{{$attribute->title}}</div>
                                                                <div class="col-10">
                                                                    <input type="hidden" name="attributegroup[]" value="{{$group->attribute_group->id}}">
                                                                    @if($group->attribute_group->id==1)
                                                                    <div class="input-group">
                                                                        <input type="hidden" name="attribute[]" value="{{$attribute->id}}">
                                                                        <input type="text" class="form-control" name="sku[]" placeholder="SKU / Modal No.">
                                                                        <input type="text" class="form-control" name="mrp[]" placeholder="Product Price">
                                                                        <input type="text" class="form-control" name="selling_price[]" placeholder="Product Selling Price">
                                                                    </div>
                                                                    @else
                                                                    <div class="input-group">
                                                                        <input type="hidden" name="attributeId[]" value="{{$attribute->id}}">
                                                                        <input type="text" class="form-control" name="attribute_title[]" placeholder="Write about {{$attribute->title}}...">
                                                                    </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endif
                                <div class="mb-3">
                                    <label for="prod" class="form-label">Product Description </label>
                                    <textarea name="description" class="form-control" id="editor"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="prod" class="form-label">FAQ </label>
                                    <div id="editorFAQ"></div>
                                </div>
                                <h3 class="h6 thmbg1 p-2 text-white">SEO / Mata Informaion</h3>
                                <div class="mb-3">
                                    <label for="matat" class="form-label">Mata Title </label>
                                    <input type="text" class="form-control" name="meta_title" placeholder="Enter Mata Title">
                                </div>
                                <div class="mb-3">
                                    <label for="matak" class="form-label">Mata Keywords </label>
                                    <textarea class="form-control" name="meta_keywords" placeholder="Enter Mata Keywords"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="matad" class="form-label">Mata Description </label>
                                    <textarea class="form-control"  name="meta_description" placeholder="Enter Mata Description"></textarea>
                                </div><hr class="border-secondary mb-2">
                                <div>
                                    <p>It's easier for high-quality products to get more exposure and inquiries! Want to know whether your product information needs to be optimized? Check now</p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="policies" id="stay">
                                        <label class="form-check-label" for="stay">By clicking submit, you acknowledge that your information does not violate any listing policies. You can edit the listing again once it is published onto the website or returned to you.</label>
                                        
                                    </div>
                                    <span class="error formerror policies"></span>
                                    <div class="text-center">
                                        <button type="submit" id="svbtn" class="btn btn-main2">Confirm and Proceed</button>
                                        <button type="button" id="prcbtn" style="display:none" disabled class="btn btn-main"><i class="fa fa-spinner"></i> Processing...</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@push('css')
<title>Add New Product : ebizzmart</title>
<link rel="stylesheet" type="text/css" media="screen,projection" href="{{asset('frontend/css/profile.css')}}">
<link rel="stylesheet" type="text/css" media="screen,projection" href="{{asset('frontend/css/pro-manage.css')}}">
<link href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" rel="stylesheet" media="all">
@endpush
@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
<script src="{{asset('frontend/ckeditor/config.js')}}"></script>
<script defer src="{{asset('frontend/js/manage-product.js')}}"></script>
<script>
$('.chosen').chosen();
$('.chosen-container-single').css('width','100%');
var myEditor;
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
const AddProduct = "{{route('account.save-product')}}";
</script>
@endpush       