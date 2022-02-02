<div class="br-mainpanel">
      <div class="br-pageheader pd-y-15 pd-l-20">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
          <a class="breadcrumb-item" href="{{route('admin.home')}}">Dashboard</a>
          <a class="breadcrumb-item" href="{{route('admin.banner')}}">Banner Management</a>
          <span class="breadcrumb-item active">Add Banner</span>
        </nav>
      </div><!-- br-pageheader -->
      <x-admin.alert/>
      <div class="br-pagebody">
        <div class="br-section-wrapper">
          <form method="post" action="{{route('admin.save-banner')}}" enctype="multipart/form-data">
            @csrf
          <div class="form-layout form-layout-1">
            <div class="row mg-b-25">
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Banner Title / Image Alt: </label>
                  <input class="form-control" type="text" name="banner_text" value="{{old('banner_text')}}" placeholder="Banner Text Here...">
                  @error('banner_text')<span class="error">{{$message}}</span>@enderror
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Button Link: </label>
                  <input class="form-control" type="text" name="banner_link" value="{{old('banner_link')}}" placeholder="Button Link Here...">
                  @error('banner_link')<span class="error">{{$message}}</span>@enderror
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Best Image Size 1900*400px</label>
                  <label class="custom-file">
                    <input type="file" id="imgInp" name="image" class="custom-file-input">
                    <span class="custom-file-control"></span>
                  </label>
                  @error('image')<span class="error">{{$message}}</span>@enderror
                </div>
              </div>
              <div class="col-lg-2">
                  <img src="{{asset('admin/img/img12.jpg')}}" id="defaultimg" class="w-100 defaultimgcss">
              </div>    
              
            </div><!-- row -->

            <div class="form-layout-footer text-right">
              <button type="submit" onclick="$('#svbtn').hide(); $('#prcbtn').show();" id="svbtn" class="btn btn-success">Confirm & Proceed</button>
              <button type="button" disabled style="display:none;" id="prcbtn" class="btn btn-success">Processing...</button>
              <a href="{{route('admin.banner')}}" class="btn btn-dark">Cancel</a>
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
          </form>
        </div>
      </div>
      <x-admin.footer/>
    </div>
@push('style')
<title>New Banner Management : Ebizzmart</title>
@endpush
@push('scripts')
    <script>
      imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {
          defaultimg.src = URL.createObjectURL(file)
        }
      }
    </script>
@endpush    