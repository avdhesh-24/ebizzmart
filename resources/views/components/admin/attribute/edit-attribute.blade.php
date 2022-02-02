<div class="br-mainpanel">
      <div class="br-pageheader pd-y-15 pd-l-20">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
          <a class="breadcrumb-item" href="{{route('admin.home')}}">Dashboard</a>
          <a class="breadcrumb-item" href="{{route('admin.attributes',['id'=>$group->id])}}">{{$group->title}}</a>
          <span class="breadcrumb-item active">Edit Attribute</span>
        </nav>
      </div><!-- br-pageheader -->
      <x-admin.alert/>
      <div class="br-pagebody">
        <div class="br-section-wrapper">
          <form method="post" action="{{route('admin.update-attributes')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="preId" value="{{$lists->id}}">
            <div class="form-layout form-layout-1">
                <div class="row mg-b-0 after-add-more">
                    <div class="col-lg-12">
                        <div class="form-group">
                        <label class="form-control-label">Attribute Name: <span class="error">*</span></label>
                        <input class="form-control" type="text" name="name" value="{{$lists->title}}" placeholder="Attribute Name Here...">
                        @error('name')<span class="error">{{$message}}<span> @enderror
                        </div>
                    </div>
                </div><!-- row -->

                <div class="form-layout-footer text-right">
                <button type="submit" id="svbtn" onclick="$('#svbtn').hide();$('#prcbtn').show();" class="btn btn-success">Confirm & Proceed</button>
                <button type="button" id="prcbtn" style="display:none;" disabled class="btn btn-success">Processing...</button>
                <a href="{{action('Admin\AttributeController@Group_index')}}" class="btn btn-dark">Cancel</a>
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
    <title>Edit Attribute : Ebizzmart</title>
@endpush