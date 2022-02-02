<div class="br-mainpanel">
      <div class="br-pageheader pd-y-15 pd-l-20">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
          <a class="breadcrumb-item" href="{{route('admin.home')}}">Dashboard</a>
          <a class="breadcrumb-item" href="{{action('Admin\ProductController@index')}}">Product Management</a>
          <span class="breadcrumb-item active">Edit Product</span>
        </nav>
      </div><!-- br-pageheader -->
      <x-admin.alert/>
      <div class="br-pagebody">
        <div class="br-section-wrapper">
          <form method="post" id="submitform"  action="{{route('admin.update-products')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="preId" value="{{$lists->id}}">
            <x-admin.page-loader/>
          <div id="wizard2" style="display:none">
            <h3>Basic Information</h3>
            <section>
              <div class="row mg-b-25">
                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label">Product Name: <span class="error">*</span></label>
                    <input class="form-control" type="text" name="product_name" id="product_name" value="{{$lists->title}}" placeholder="Product Name Here..." required>
                    @error('product_name')<span class="error">{{$message}}<span> @enderror
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label">Product Alias: <span class="error">*</span></label>
                    <input class="form-control" type="text" name="product_alias" value="{{$lists->alias}}" placeholder="Product Alias Here...">
                    @error('product_alias')<span class="error">{{$message}}<span> @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Product MRO: <span class="error">*</span></label>
                    <input class="form-control" type="text" onkeypress="return isNumberKey(event)" id="mro" name="mro" value="{{$lists->minimum_order}}" placeholder="Minimum Order Quantity Here..." required>
                    @error('mro')<span class="error">{{$message}}<span> @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Product Availability: <span class="error">*</span></label>
                    <select class="form-control" name="availability" id="availability" required>
                        <option value="">Choose One</option>
                        <option value="1" {{$lists->availability==1?'selected':''}}>In Stock</option>
                        <option value="0" {{$lists->availability==0?'selected':''}}>Out Of Stock</option>
                    </select>
                    @error('availability')<span class="error">{{$message}}<span> @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Company: <span class="error">*</span></label>
                    <select class="form-control select2-show-search" name="company" id="company" data-placeholder="Choose one (with searchbox)" required>
                      <option label="Choose one"></option>
                      @foreach($companies as $company)
                      <option value="{{$company->id}}" {{$lists->company_id==$company->id?'selected':''}}>{{$company->company_name}}</option>
                      @endforeach
                    </select>
                    @error('category')<span class="error">{{$message}}<span> @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Product Category: <span class="error">*</span></label>
                    <select class="form-control select2-show-search" onchange="getCateAttribute(event)" name="category" id="category" data-placeholder="Choose one (with searchbox)" required>
                      <option label="Choose one"></option>
                      {!! $category !!}
                    </select>
                    @error('category')<span class="error">{{$message}}<span> @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Product Brand: <span class="error">*</span></label>
                    <select class="form-control select2-show-search" name="brand" id="brand" data-placeholder="Choose one (with searchbox)" required>
                      <option label="Choose one"></option>
                      @foreach($brands as $brand)
                      <option value="{{$brand->id}}" {{$lists->brand_id==$brand->id?'selected':''}}>{{$brand->name}}</option>
                      @endforeach
                    </select>
                    @error('category')<span class="error">{{$message}}<span> @enderror
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label">Short Description: <span class="error"> (Only 255 Word Allowed)</span></label>
                    <textarea class="form-control" placeholder="Short Description Here..." name="short_description" >{{$lists->short_description}}</textarea>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                      <label class="form-control-label">IMAGE Size is 1000px * 1000px</label>
                    <label class="custom-file">
                      <input type="hidden" name="preimage" value="{{$lists->image}}">
                      <input type="file" id="imgInp" onchange="getImagePreview(event)" required name="image" class="custom-file-input">
                      <span class="custom-file-control"></span>
                    </label>
                    @error('image')<span class="error">{{$message}}<span> @enderror
                  </div>
                </div>
                <div class="col-lg-2">
                  @if(!empty($lists->thumb_image) && file_exists(public_path('uploads/product/'.$lists->thumb_image)))
                  <img src="{{asset('uploads/product/'.$lists->thumb_image)}}" id="defaultimg" class="w-100">
                  @else
                  <img src="{{asset('admin/img/img12.jpg')}}" id="defaultimg" class="w-100">
                  @endif
                </div>
              </div>
            </section>
            <h3>About Product</h3>
            <section>
              <div class="row mg-b-25">
                <div class="col-lg-12">
                  <div class="form-group desc">
                    <label class="form-control-label">Product Description: </label>
                    <textarea class="form-control" name="decription" id="description" placeholder="Write Something Here...">{{$lists->description}}</textarea>
                    @error('decription')<span class="error">{{$message}}<span> @enderror
                  </div>
                </div>
              </div>
            </section>
            <h3>Product Images</h3>
            <section>
              <div class="row mg-b-25">
                <div class="col-lg-4"></div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label">IMAGE Size is 1000px * 1000px</label>
                    <label class="custom-file">
                      <input type="file" name="moreimg[]" class="custom-file-input">
                      <span class="custom-file-control"></span>
                    </label>
                  </div>
                </div>
              </div>
              <div class="row" id="preImageBox">
                @foreach($lists->images as $image)
                  <div class="col-md-2">
                    <img src="{{asset('uploads/product/'.$image->image)}}" class="defaultimgcss">
                    <a href="javascript:void(0)" onclick="RemovePreImages({{$image->id}})"><i class="fa fa-trash"></i></a>
                  </div>
                @endforeach
              </div>
              <p><strong>NOTE:</strong> You can upload multiple images. if you want to upload muliple image then press ctrl and choose many images.</p>
            </section>
            <h3>Product Attributes</h3>
            <section class="attributebox"></section>
            <h3>Seo / Meta Information</h3>
            <section>
              <div class="row mg-b-25">
                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label">Meta Title: <span class="error">*</span></label>
                    <input class="form-control" type="text" name="meta_title" id="meta_title" required value="{{$lists->meta_title}}" placeholder="Meta Title Here...">
                    @error('meta_title')<span class="error">{{$message}}<span> @enderror
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label">Meta Keywords: </label>
                    <textarea class="form-control" placeholder="Meta Keywords Here..." name="meta_keywords" >{{$lists->meta_keywords}}</textarea>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label">Meta Description: </label>
                    <textarea class="form-control" placeholder="Meta Description Here..." name="meta_description" >{{$lists->meta_description}}</textarea>
                  </div>
                </div>
              </div><!-- row -->
            </section>
          </div>
          
          </form>
        </div>
      </div>
      <x-admin.footer/>
    </div>
@push('style')
    <title>Edit {{$lists->title}} Product : Ebizzmart</title>
    <link href="{{asset('admin/lib/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/lib/highlightjs/github.css')}}" rel="stylesheet">
    <link href="{{asset('admin/lib/jquery.steps/jquery.steps.css')}}" rel="stylesheet">
    <link href="{{asset('admin/lib/SpinKit/spinkit.css')}}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="{{asset('admin/lib/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('admin/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('admin/lib/highlightjs/highlight.pack.js')}}"></script>
    <script src="{{asset('admin/lib/jquery.steps/jquery.steps.js')}}"></script>
    <script src="{{asset('admin/lib/parsleyjs/parsley.js')}}"></script>
    
    <script>
      setTimeout(function(){
        $('.select2-container').css('width','100%');
        $('.loaderbox').hide();
        $('#wizard2').show();
        getProductPreAttr();
        CKEDITOR.replace('description');
        CKEDITOR.config.toolbar = [
          ['Styles','Format','Font','FontSize','Bold','Italic','Underline','StrikeThrough','Cut','Copy','Paste','Find','Replace','-','Outdent','Indent','-','Print','NumberedList','BulletedList','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
          ['Image','Table','-','Link','Flash','Smiley','TextColor','BGColor','Source']
        ] ;
        $('.steps ul li').addClass('done');
        $('.steps ul li').removeClass('disabled');
      },1000);
      
      $(function(){
        'use strict'

        $('.form-layout .form-control').on('focusin', function(){
          $(this).closest('.form-group').addClass('form-group-active');
        });

        $('.form-layout .form-control').on('focusout', function(){
          $(this).closest('.form-group').removeClass('form-group-active');
        });

        // Select2
        $('#select2-a, #select2-b').select2({
          minimumResultsForSearch: Infinity
        });

        $('#select2-a').on('select2:opening', function (e) {
          $(this).closest('.form-group').addClass('form-group-active');
        });

        $('#select2-a').on('select2:closing', function (e) {
          $(this).closest('.form-group').removeClass('form-group-active');
        });

        $('#wizard2').steps({
          headerTag: 'h3',
          bodyTag: 'section',
          autoFocus: true,
          titleTemplate: '<span class="number">#index#</span> <span class="title">#title#</span>',
          onStepChanging: function (event, currentIndex, newIndex) {
            if(currentIndex < newIndex) {
              // Step 1 form validation
              if(currentIndex === 0) {
                var product = $('#product_name').parsley();
                var MOQ = $('#mro').parsley();
                var category = $('#category').parsley();
                var company = $('#company').parsley();
                var brand = $('#brand').parsley();
                if(product.isValid() && MOQ.isValid() && category.isValid() && company.isValid() && brand.isValid()) {
                  return true;
                } else {
                  product.validate();
                  category.validate();
                  MOQ.validate();
                  company.validate();
                  brand.validate();
                }
              }
              // Step 3 form validation
              if(currentIndex === 1) { return true; }
              if(currentIndex === 2) { return true; }
              if(currentIndex === 3) { return true; }
              if(currentIndex === 4) { return true; }
              
            // Always allow step back to the previous step even if the current step is not valid.
            } else { return true; }
          }
        });

      });
      imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {
          defaultimg.src = URL.createObjectURL(file)
        }
      }
      function isNumberKey(evt){
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
      }
      function getCateAttribute(e){
        $.get("{{route('admin.get-product-category-attributes')}}",{
          category:e.target.value,
          product:@json($lists->id)
        },function(data){
          $('.attributebox').html(data);
        });
      }
      function getProductPreAttr(){
        $.get("{{route('admin.get-product-category-attributes')}}",{
          category:@json($lists->category_id),
          product:@json($lists->id)
        },function(data){
          $('.attributebox').html(data);
        });
      }
      function RemovePreImages(Id){
        var URL = "{{route('admin.get-product-images')}}";
        $.get(URL,{
          Id:Id
        },function(data){
          $('#preImageBox').html(data);
        });
      }
    </script>
@endpush    