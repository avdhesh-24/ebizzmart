<div class="br-mainpanel">
      <div class="br-pageheader pd-y-15 pd-l-20">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
          <a class="breadcrumb-item" href="{{route('admin.home')}}">Dashboard</a>
          <a class="breadcrumb-item" href="{{route('admin.addvertisment')}}">Advertisement Management</a>
          <span class="breadcrumb-item active">Edit Advertisement</span>
        </nav>
      </div><!-- br-pageheader -->
      <x-admin.alert/>
      <div class="br-pagebody">
        <div class="br-section-wrapper">
          <form method="post" action="{{route('admin.update-advertisement')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="preId" value="{{$list->id}}">
          <div class="form-layout form-layout-1">
            <div class="row mg-b-25">
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Title / Image Alt: </label>
                  <input class="form-control" type="text" name="title" value="{{$list->image_alt}}" placeholder="Text Here...">
                  @error('title')<span class="error">{{$message}}</span>@enderror
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Link: </label>
                  <input class="form-control" type="text" name="link" value="{{$list->link}}" placeholder="Link Here...">
                  @error('link')<span class="error">{{$message}}</span>@enderror
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-3">
                <div class="form-group">
                  <label class="form-control-label">Addvertisment Start</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                    <input type="text" name="start_date" value="{{date('m/d/Y',strtotime($list->start_date))}}" class="form-control fc-datepicker" placeholder="MM/DD/YYYY">
                  </div>
                  @error('start_date')<span class="error">{{$message}}</span>@enderror
                </div><!-- wd-200 -->  
              </div>
              <div class="col-lg-3">
                <div class="form-group">
                  <label class="form-control-label">Addvertisment End</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                    <input type="text" name="end_date" value="{{date('m/d/Y',strtotime($list->end_date))}}" class="form-control fc-datepicker" placeholder="MM/DD/YYYY">
                  </div>
                  @error('end_date')<span class="error">{{$message}}</span>@enderror
                </div><!-- wd-200 -->  
              </div>
              <div class="col-lg-3">
                <div class="form-group">
                  <label class="form-control-label">Best Image Size 1900*150px</label>
                  <label class="custom-file">
                      <input type="hidden" name="preimage" value="{{$list->image}}">
                    <input type="file" id="imgInp" name="image" class="custom-file-input">
                    <span class="custom-file-control"></span>
                  </label>
                  @error('image')<span class="error">{{$message}}</span>@enderror
                </div>
              </div>
              <div class="col-lg-3">
                    @if(!empty($list->image) && file_exists(public_path('uploads/advertisement/'.$list->image)))
                        <img src="{{asset('uploads/advertisement/'.$list->image)}}" id="defaultimg"  class="w-100 mt-4 defaultimgcss">
                    @else
                        <img src="{{asset('admin/img/img12.jpg')}}" id="defaultimg" class="w-100 defaultimgcss">
                    @endif
              </div>    
              
            </div><!-- row -->

            <div class="form-layout-footer text-right">
              <button type="submit" onclick="$('#svbtn').hide(); $('#prcbtn').show();" id="svbtn" class="btn btn-success">Confirm & Proceed</button>
              <button type="button" disabled style="display:none;" id="prcbtn" class="btn btn-success">Processing...</button>
              <a href="{{route('admin.addvertisment')}}" class="btn btn-dark">Cancel</a>
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
          </form>
        </div>
      </div>
      <x-admin.footer/>
    </div>
@push('style')
<title>Edit Advertisement Management : Ebizzmart</title>
@endpush
@push('scripts')
    <script>
       $('.fc-datepicker').datepicker({
          showOtherMonths: true,
          selectOtherMonths: true
        });
      imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {
          defaultimg.src = URL.createObjectURL(file)
        }
      }
    </script>
@endpush    