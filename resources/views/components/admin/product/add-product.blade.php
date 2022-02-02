<div class="br-mainpanel">
      <div class="br-pageheader pd-y-15 pd-l-20">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
          <a class="breadcrumb-item" href="{{route('admin.home')}}">Dashboard</a>
          <a class="breadcrumb-item" href="{{action('Admin\ProductController@index')}}">Product Management</a>
          <span class="breadcrumb-item active">Add Product</span>
        </nav>
      </div><!-- br-pageheader -->
      <x-admin.alert/>
      <div class="br-pagebody">
        <div class="br-section-wrapper">
          <form method="post" action="{{route('admin.save-products')}}" id="submitform" enctype="multipart/form-data">
            @csrf
            <x-admin.page-loader/>
            <div id="wizard2" style="display:none">
            <h3>Basic Information</h3>
            <section>
              <div class="row mg-b-25">
                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label">Product Name: <span class="error">*</span></label>
                    <input class="form-control" type="text" name="product_name" id="product_name" value="{{old('product_name')}}" placeholder="Product Name Here..." required>
                    @error('product_name')<span class="error">{{$message}}<span> @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Product MRO: <span class="error">*</span></label>
                    <input class="form-control" type="text" onkeypress="return isNumberKey(event)" id="mro" name="mro" value="{{old('mro')}}" placeholder="Minimum Order Quantity Here..." required>
                    @error('mro')<span class="error">{{$message}}<span> @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Product Availability: <span class="error">*</span></label>
                    <select class="form-control" name="availability" id="availability" required>
                          <option value="">Choose One</option>
                          <option value="1" {{old('availability')==1?'selected':''}}>In Stock</option>
                          <option value="0" {{old('availability')==0?'selected':''}}>Out Of Stock</option>
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
                      <option value="{{$company->id}}" {{old('company')==$company->id?'selected':''}}>{{$company->company_name}}</option>
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
                      <option value="{{$brand->id}}" {{old('brand')==$brand->id?'selected':''}}>{{$brand->name}}</option>
                      @endforeach
                    </select>
                    @error('category')<span class="error">{{$message}}<span> @enderror
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label">Short Description: <span class="error"> (Only 255 Word Allowed)</span></label>
                    <textarea class="form-control" placeholder="Short Description Here..." name="short_description" >{{old('short_description')}}</textarea>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                      <label class="form-control-label">IMAGE Size is 1000px * 1000px</label>
                    <label class="custom-file">
                      <input type="file" id="imgInp" onchange="getImagePreview(event)" required name="image" class="custom-file-input">
                      <span class="custom-file-control"></span>
                    </label>
                    @error('image')<span class="error">{{$message}}<span> @enderror
                  </div>
                </div>
                <div class="col-lg-2">
                    <img src="{{asset('admin/img/img12.jpg')}}" id="defaultimg" class="w-100">
                </div>
              </div>
            </section>
            <h3>About Product</h3>
            <section>
              <div class="row mg-b-25">
                <div class="col-lg-12">
                  <div class="form-group desc">
                    <label class="form-control-label">Product Description: </label>
                    <textarea class="form-control" name="decription" id="description" placeholder="Write Something Here...">{{old('description')}}</textarea>
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
              <p><strong>NOTE:</strong> You can upload multiple images. if you want to upload muliple image then press ctrl and choose many images.</p>
            </section>
            <h3>Product Attributes</h3>
            <section class="attributebox">

            </section>
            <h3>Seo / Meta Information</h3>
            <section>
              <div class="row mg-b-25">
                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label">Meta Title: <span class="error">*</span></label>
                    <input class="form-control" type="text" name="meta_title" id="meta_title" required value="{{old('meta_title')}}" placeholder="Meta Title Here...">
                    @error('meta_title')<span class="error">{{$message}}<span> @enderror
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label">Meta Keywords: </label>
                    <textarea class="form-control" placeholder="Meta Keywords Here..." name="meta_keywords" >{{old('meta_keywords')}}</textarea>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label">Meta Description: </label>
                    <textarea class="form-control" placeholder="Meta Description Here..." name="meta_description" >{{old('meta_description')}}</textarea>
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
    <title>Add New Product : Ebizzmart</title>
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
        CKEDITOR.replace('description');
        CKEDITOR.config.toolbar = [
          ['Styles','Format','Font','FontSize','Bold','Italic','Underline','StrikeThrough','Cut','Copy','Paste','Find','Replace','-','Outdent','Indent','-','Print','NumberedList','BulletedList','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
          ['Image','Table','-','Link','Flash','Smiley','TextColor','BGColor','Source']
        ] ;
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
                var image = $('#imgInp').parsley();
                var category = $('#category').parsley();
                var company = $('#company').parsley();
                var brand = $('#brand').parsley();
                if(product.isValid() && MOQ.isValid() && image.isValid() && company.isValid() && brand.isValid() && category.isValid()) {
                  return true;
                } else {
                  product.validate();
                  company.validate();
                  brand.validate();
                  image.validate();
                  category.validate();
                  MOQ.validate();
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
      function getCateAttribute(e){
        $.get("{{route('admin.get-product-category-attributes')}}",{
          category:e.target.value
        },function(data){
          $('.attributebox').html(data);
        });
      }
      function getImagePreview(event) {
        var output = document.getElementById('defaultimg');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
          URL.revokeObjectURL(output.src) // free memory
        }
      };
      function isNumberKey(evt){
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }
       var Count=1;
       function AddMoreSpecification(){
        Count = ++
        $('.morespecification').append('<div class="row" id="boxId'+Count+'"><div class="col-lg-4"><div class="form-group"><label class="form-control-label">Title: </label><input class="form-control" type="text" name="Spacificationtitle[]" placeholder="Spacification Title Here..."></div></div><div class="col-lg-7"><div class="form-group"><label class="form-control-label">Write Something: </label><input class="form-control" type="text" name="Spacification[]" placeholder="Write Something about Spacification..."></div></div><div class="col-lg-1"><div class="form-group"><label class="form-control-label">&nbsp;&nbsp;&nbsp;&nbsp;</label><button class="btn btn-danger" type="button" onclick="RemoveMoreSpecification('+Count+')"><i class="icon ion-trash-a"></i></button></div></div></div>');
       }

       function RemoveMoreSpecification(){
        $('#boxId'+Count).remove();
        // Count = --
       }
    </script>
@endpush    