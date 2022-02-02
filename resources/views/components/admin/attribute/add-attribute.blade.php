<div class="br-mainpanel">
      <div class="br-pageheader pd-y-15 pd-l-20">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
          <a class="breadcrumb-item" href="{{route('admin.home')}}">Dashboard</a>
          <a class="breadcrumb-item" href="{{route('admin.attributes',['id'=>$group->id])}}">{{$group->title}}</a>
          <span class="breadcrumb-item active">Add Attribute</span>
        </nav>
      </div><!-- br-pageheader -->
      <x-admin.alert/>
      <div class="br-pagebody">
        <div class="br-section-wrapper">
          <form method="post" action="{{route('admin.save-attributes')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="group" value="{{$list}}">
            <div class="form-layout form-layout-1">
                <div class="row mg-b-0 after-add-more">
                    <div class="col-lg-11">
                        <div class="form-group">
                        <label class="form-control-label">Attribute Name: <span class="error">*</span></label>
                        <input class="form-control" type="text" id="name" name="name[]" value="{{old('name')}}" placeholder="Attribute Name Here...">
                        @error('name')<span class="error">{{$message}}<span> @enderror
                        </div>
                    </div>
                    <div class="col-lg-1">
                        <div class="form-group change">
                            <label class="form-control-label">&nbsp;</label>
                            <button type="button" class="btn btn-dark morbtn"><i class="fa fa-plus"></i></button>
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
    <title>Add Attribute : Ebizzmart</title>
@endpush
@push('scripts')
<script src="{{asset('admin/lib/select2/js/select2.min.js')}}"></script>
<script src="{{asset('admin/ckeditor/ckeditor.js')}}"></script>

<script>
$('.morbtn').click(function(){
    var html = $(".after-add-more").first().clone();
    $(html).find(".change").html("<label for=''>&nbsp;</label><br/><a class='btn btn-danger remove'><i class='fa fa-trash'></i></a>");
    $(".after-add-more").last().after(html);
});
$("body").on("click",".remove",function(){ 
    $(this).parents(".after-add-more").remove();
});
</script>

@endpush    