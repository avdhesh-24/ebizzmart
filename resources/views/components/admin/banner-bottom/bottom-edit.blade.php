<div>
    <!-- Order your soul. Reduce your wants. - Augustine -->
</div><div class="br-mainpanel">
      <div class="br-pageheader pd-y-15 pd-l-20">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
          <a class="breadcrumb-item" href="{{route('admin.home')}}">Dashboard</a>
          <a class="breadcrumb-item" href="{{route('admin.bottom')}}">Banner Bottom Management</a>
          <span class="breadcrumb-item active">Edit Banner Bottom</span>
        </nav>
      </div><!-- br-pageheader -->
      <x-admin.alert/>
      <div class="br-pagebody">
        <div class="br-section-wrapper">
          <form method="post" action="{{route('admin.update-bottom')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="preId" value="{{$list->id}}">
          <div class="form-layout form-layout-1">
            <div class="row mg-b-25">
                <div class="col-lg-8">
                    <div class="form-group">
                    <label class="form-control-label">Title: </label>
                    <input class="form-control" type="text" name="title" value="{{$list->title}}" placeholder="Banner Text Here...">
                    </div>
                </div><!-- col-4 -->
                
                <div class="col-lg-4">
                    <div class="form-group">
                    <label class="form-control-label">Button Name: </label>
                    <input class="form-control" type="text" name="button" value="{{$list->button}}" placeholder="Button Name Here...">
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-12">
                    <div class="form-group">
                    <label class="form-control-label">Button Link: </label>
                    <input class="form-control" type="text" name="link" value="{{$list->link}}" placeholder="Button Link Here...">
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label>Best Image Size 70*70px</label>
                    <label class="custom-file">
                        <input type="hidden" name="preimage" value="{{$list->image}}">
                        <input type="file" id="imgInp" name="image" class="custom-file-input">
                        <span class="custom-file-control"></span>
                    </label>
                    </div>
                </div>
                <div class="col-lg-2">
                    @if(!empty($list->image) && file_exists(public_path('uploads/banner-bottom/'.$list->image)))
                    <img src="{{asset('uploads/banner-bottom/'.$list->image)}}" id="defaultimg" class="defaultimgcss">
                    @else
                    <img src="{{asset('admin/img/img12.jpg')}}" id="defaultimg" class="w-100 defaultimgcss">
                    @endif
                </div>    
              
            </div><!-- row -->

            <div class="form-layout-footer text-right">
                <button type="submit" onclick="$('#svbtn').hide(); $('#prcbtn').show();" id="svbtn" class="btn btn-success">Confirm & Proceed</button>
                <button type="button" disabled style="display:none;" id="prcbtn" class="btn btn-success">Processing...</button>
                <a href="{{route('admin.bottom')}}" class="btn btn-dark">Cancel</a>
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
          </form>
        </div>
      </div>
      <x-admin.footer/>
      
    </div>
@push('style')
<title>Edit Banner Bottom Management : Ebizzmart</title>
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