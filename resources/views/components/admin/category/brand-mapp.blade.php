<div class="br-mainpanel">
    <div class="br-pageheader pd-y-15 pd-l-20">
        <div class="col-md-6">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
              <a class="breadcrumb-item" href="{{route('admin.home')}}">Dashboard</a>
              @if($categorylist->parent==0)
              <a class="breadcrumb-item" href="{{route('admin.category')}}">{{$categorylist->name}}</a>
              @else
              <a class="breadcrumb-item" href="{{route('admin.category',['parent'=>$categorylist->id])}}">{{$categorylist->name}}</a>
              @endif
              <span class="breadcrumb-item active">Brand Mapp</span>
            </nav>
        </div>
        <div class="col-md-6">
            <div class="pull-right">
                
            </div>
        </div>
    </div>

      <x-admin.alert/>
      

      <div class="br-pagebody">
      <div class="row row-sm mg-t-20">
          <div class="col-sm-5">
            <div class="card shadow-base bd-0">
              <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
                <h6 class="card-title tx-uppercase tx-12 mg-b-0">Mapp Brand</h6>
                <span class="tx-12 tx-uppercase">{{date('F d, Y')}}</span>
              </div><!-- card-header -->
              <div class="card-body d-xs-flex justify-content-between align-items-center">
                <form method="post" action="{{route('admin.save-map-brand')}}" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="category" value="{{$categorylist->id}}">
                  <div class="row mg-b-25">
                    <div class="col-lg-12">
                        <div class="form-group">
                        <select class="form-control select2" name="brand[]" data-placeholder="Choose Brand" multiple>
                            @foreach($brandlist as $list)
                            <option value="{{$list->id}}">{{$list->name}}</option>
                            @endforeach
                        </select>
                        @error('brand')<span class="error">{{$message}}<span> @enderror
                        </div>
                    </div> 
                  </div>  
                  <div class="form-layout-footer text-right">
                    <button type="submit" id="svbtn" onclick="$('#svbtn').hide();$('#prcbtn').show();" class="btn btn-success">Confirm & Proceed</button>
                    <button type="button" id="prcbtn" style="display:none;" disabled class="btn btn-success">Processing...</button>
                  </div><!-- form-layout-footer -->
                
                </form>
              </div><!-- card-body -->
            </div><!-- card -->
          </div><!-- col-4 -->

          <div class="col-sm-7 mg-t-20 mg-sm-t-0">
            <div class="card shadow-base bd-0">
              <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
                <h6 class="card-title tx-uppercase tx-12 mg-b-0">Brand List</h6>
                <span class="tx-12 tx-uppercase">{{date('F d, Y')}}</span>
              </div><!-- card-header -->
              <div class="card-body d-xs-flex justify-content-between align-items-center">
                <div class=infinite-scroll>
                    <div class="row">
                        @foreach($lists as $list)
                        <div class="col-md-3">
                            <img src="{{asset('uploads/brand/'.$list->brand->icon)}}" alt="{{$list->brand->name}}" class="defaultimgcss">
                            <a href="javascript:void(0)" onclick="RemoveRecord({{$list->id}})" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                        </div>
                        @endforeach
                        <div style="display:none;">{{ $lists->appends(request()->all())->render('pagination') }}</div>
                    
                    </div>

                </div>
              </div><!-- card-body -->
            </div><!-- card -->
          </div><!-- col-4 -->
          
        </div><!-- row -->
      </div>
    <x-admin.footer/>
</div>
<form method="post" action="{{route('admin.remove-category-brand')}}" id="RemoveForm">@csrf<input type="hidden" name="removeId" id="removeId"></form>

@push('style')
<title>Brand Mapp With {{$categorylist->name}} : Ebizzmart</title>
<link href="{{asset('admin/lib/select2/css/select2.min.css')}}" rel="stylesheet">
@endpush
@push('scripts')

<script src="{{asset('admin/lib/select2/js/select2.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.jscroll.min.js')}}"></script>

<script>
  $(document).ready(function(){
    $('.select2-container').css('width','100%');
  });
  $(function() {
    $('.infinite-scroll').jscroll({
        autoTrigger: true,
        loadingHtml: '<div class="text-center"><img class="center-block" src="{{asset('frontend/img/spinning-loading.gif')}}" width="200px" alt="Loading..." /></div>', // MAKE SURE THAT YOU PUT THE CORRECT IMG PATH
        padding: 0,
        nextSelector: '.pagination li.active + li a',
        contentSelector: 'div.infinite-scroll',
    });
});
  function RemoveRecord(Id){
    if(confirm("Are you sure! You want to remove this record.")){
        $('#removeId').val(Id);
        $('#RemoveForm').submit();
    }
  }
  function getEditData(Id,Title,Icon){
    $('input[name=edittitle]').val(Title);
    $('input[name=editId]').val(Id);
    $('input[name=preicon]').val(Icon);
    $('#defaultimg2').attr('src','{{asset("uploads/facility/")}}/'+Icon);
  }
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