<div class="br-mainpanel">
      <div class="br-pageheader pd-y-15 pd-l-20">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
          <a class="breadcrumb-item" href="{{route('admin.home')}}">Dashboard</a>
          <a class="breadcrumb-item" href="{{action('Admin\CategoryController@index')}}">Category Management</a>
          @if(!empty($parentdata))
          <a class="breadcrumb-item" href="{{action('Admin\CategoryController@index',['parent'=>$parentdata->id])}}">{{$parentdata->name}}</a>
          @endif
          <span class="breadcrumb-item active">Add Category</span>
        </nav>
      </div><!-- br-pageheader -->
      <x-admin.alert/>
      <div class="br-pagebody">
        <div class="br-section-wrapper">
          <form method="post" action="{{route('admin.save-category')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="parent" value="{{empty($Parent)?0:$Parent}}">
            <input type="hidden" name="level" value="{{$level}}">
          <div class="form-layout form-layout-1">
            <div class="row mg-b-25">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Category Name: <span class="error">*</span></label>
                  <input class="form-control" type="text" name="category_name" value="{{old('category_name')}}" placeholder="Category Name Here...">
                  @error('category_name')<span class="error">{{$message}}<span> @enderror
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="p-1">Small IMAGE (Icon) Size is 50px * 50px</label>
                  <label class="custom-file">
                    <input type="file" id="imgInp" name="icon" class="custom-file-input">
                    <span class="custom-file-control"></span>
                  </label>
                  @error('icon')<span class="error">{{$message}}<span> @enderror
                </div>
              </div>
              <div class="col-lg-2">
                <img src="{{asset('admin/img/img12.jpg')}}" id="defaultimg" class="w-100 defaultimgcss">
              </div>
              <div class="col-lg-12">
                  <div class="form-group">
                  <label class="form-control-label">Category Description: </label>
                  <textarea class="form-control" name="category_decription" id="description" placeholder="Write Something Here..."></textarea>
                  </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="p-1">IMAGE Size is 312px * 468px</label>
                  <label class="custom-file">
                    <input type="file" id="imgInp2" name="image" class="custom-file-input">
                    <span class="custom-file-control"></span>
                  </label>
                  @error('image')<span class="error">{{$message}}<span> @enderror
                </div>
              </div>
              <div class="col-lg-2">
                  <img src="{{asset('admin/img/img12.jpg')}}" id="defaultimg2" class="w-100 defaultimgcss">
              </div>

              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Meta Title: <span class="error">*</span></label>
                  <input class="form-control" type="text" name="meta_title" value="{{old('meta_title')}}" placeholder="Meta Title Here...">
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

            <div class="form-layout-footer text-right">
              <button type="submit" id="svbtn" onclick="$('#svbtn').hide();$('#prcbtn').show();" class="btn btn-success">Confirm & Proceed</button>
              <button type="button" id="prcbtn" style="display:none;" disabled class="btn btn-success">Processing...</button>
              <a href="{{route('admin.category')}}" class="btn btn-dark">Cancel</a>
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
          </form>
        </div>
      </div>
      <x-admin.footer/>
    </div>
@push('style')
    <link href="{{asset('admin/lib/select2/css/select2.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('frontend/fonts/flaticon/flaticon.css')}}" />
    <title>New {{!empty($parentdata->name)? $parentdata->name.' Category' : 'Category Management'}} : Ebizzmart</title>
@endpush
@push('scripts')
<script src="{{asset('admin/lib/select2/js/select2.min.js')}}"></script>
<script src="{{asset('admin/ckeditor/ckeditor.js')}}"></script>

<script>
    CKEDITOR.replace('description');
    CKEDITOR.config.toolbar = [
    ['Styles','Format','Font','FontSize','Bold','Italic','Underline','StrikeThrough','Cut','Copy','Paste','Find','Replace','-','Outdent','Indent','-','Print','NumberedList','BulletedList','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
    ['Image','Table','-','Link','Flash','Smiley','TextColor','BGColor','Source']
    ] ;
    imgInp.onchange = evt => {
      const [file] = imgInp.files
      if (file) {
          defaultimg.src = URL.createObjectURL(file)
      }
    }
    imgInp2.onchange = evt => {
      const [file] = imgInp2.files
      if (file) {
        defaultimg2.src = URL.createObjectURL(file)
      }
    }
    
</script>

@endpush    