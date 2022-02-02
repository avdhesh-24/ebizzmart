<div class="br-mainpanel">
    <div class="br-pageheader pd-y-15 pd-l-20">
        <div class="col-md-6">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
              <a class="breadcrumb-item" href="{{route('admin.home')}}">Dashboard</a>
              <span class="breadcrumb-item active">Brand</span>
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
                <h6 class="card-title tx-uppercase tx-12 mg-b-0">Add Brand</h6>
                <span class="tx-12 tx-uppercase">{{date('F d, Y')}}</span>
              </div><!-- card-header -->
              <div class="card-body d-xs-flex justify-content-between align-items-center">
                <form method="post" action="{{route('admin.save-brand')}}" enctype="multipart/form-data">
                  @csrf
                  <div class="row mg-b-25">
                    <div class="col-lg-12">
                        <div class="form-group">
                        <label>Name <span class="error">*</span></label>
                        <input type="text" class="form-control" value="{{old('name')}}" name="name" placeholder="Brand Name Here...">
                        @error('name')<span class="error">{{$message}}<span> @enderror
                        </div>
                    </div> 
                    <div class="col-lg-8">
                        <div class="form-group">
                        <label class="p-1">Image Size is 200px * 200px</label>
                        <label class="custom-file">
                            <input type="file" id="imgInp" name="image" class="custom-file-input">
                            <span class="custom-file-control"></span>
                        </label>
                        @error('image')<span class="error">{{$message}}<span> @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <img src="{{asset('admin/img/img12.jpg')}}" id="defaultimg" class="w-100 defaultimgcss">
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                        <label>Meta Title <span class="error">*</span></label>
                        <input type="text" class="form-control" value="{{old('meta_title')}}" name="meta_title" placeholder="Meta Title Here...">
                        @error('meta_title')<span class="error">{{$message}}<span> @enderror
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                        <label>Meta Keywords <span class="error">*</span></label>
                        <input type="text" class="form-control" value="{{old('meta_keywords')}}" name="meta_keywords" placeholder="Meta Keywords Here...">
                        @error('meta_keywords')<span class="error">{{$message}}<span> @enderror
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                        <label>Meta Description <span class="error">*</span></label>
                        <input type="text" class="form-control" value="{{old('meta_description')}}" name="meta_description" placeholder="Meta Description Here...">
                        @error('meta_description')<span class="error">{{$message}}<span> @enderror
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
                    <div class="table-wrapper">
                        <table class="table table-hover">
                          <thead>
                              <tr>
                                  <th class="wd-5p">S.No</th>
                                  <th>Image</th>
                                  <th>Name</th>
                                  <th>Alias</th>
                                  <th>Status</th>
                                  <th>Action</th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach($lists as $list)
                            <tr>
                              <td>{{$loop->iteration}}</td>
                              <td><img src="{{asset('uploads/brand/'.$list->icon)}}" style="width:50px;"></td>
                              <td>{{$list->name}}</td>
                              <td>{{$list->alias}}</td>
                              <td>
                                @if($list->status==0)
                                <a href="{{action('Admin\BrandController@Status',['status'=>1,'id'=>$list->id])}}" class="btn btn-outline-danger btn-icon rounded-circle" data-toggle="tooltip" data-placement="top" title="Category Activate"><div><i class="fa fa-thumbs-down"></i></div></a>
                                @else
                                <a href="{{action('Admin\BrandController@Status',['status'=>0,'id'=>$list->id])}}" class="btn btn-outline-success btn-icon rounded-circle" data-toggle="tooltip" data-placement="top" title="Category Dectivate"><div><i class="fa fa-thumbs-up"></i></div></a>
                                @endif
                              </td>
                              
                              <td class="pd-r-0-force tx-center">
                                <a href="#editmodal" data-toggle="modal" onclick="getEditData({{$list->id}})" class="btn btn-outline-primary btn-icon rounded-circle"><div><i class="fa fa-pencil"></i></div></a>
                                <a href="javascript:void(0)" class="btn btn-outline-danger btn-icon rounded-circle" onclick="RemoveRecord({{$list->id}})"><div><i class="fa fa-trash"></i></div></a>
                              </td>
                            </tr>  
                            @endforeach                          
                          </tbody>
                        </table>
                        {{$lists->links()}}
                    </div>
              </div><!-- card-body -->
            </div><!-- card -->
          </div><!-- col-4 -->
          
        </div><!-- row -->
      </div>
    <x-admin.footer/>
</div>
<form method="post" action="{{route('admin.remove-brand')}}" id="RemoveForm">@csrf<input type="hidden" name="removeId" id="removeId"></form>
<div id="editmodal" class="modal fade">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content bd-0 tx-14">
      <form method="post" action="{{route('admin.edit-brand')}}">
        @csrf
        <input type="hidden" name="editId">
        <input type="hidden" name="preimage">
      <div class="modal-header pd-x-20">
        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Edit Brand</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body pd-20 spinnerbox"><x-admin.spinner/></div>
      <div class="modal-body pd-20 editbox">
            <div class="row mg-b-25">
                <div class="col-lg-12">
                    <div class="form-group">
                    <label>Name <span class="error">*</span></label>
                    <input type="text" class="form-control" name="edit_name" id="name" placeholder="Brand Name Here...">
                    @error('edit_name')<span class="error">{{$message}}<span> @enderror
                    </div>
                </div> 
                <div class="col-lg-12">
                    <div class="form-group">
                    <label>Alias <span class="error">*</span></label>
                    <input type="text" class="form-control" name="alias" id="alias" placeholder="Brand Alias Here...">
                    @error('alias')<span class="error">{{$message}}<span> @enderror
                    </div>
                </div> 
                <div class="col-lg-8">
                    <div class="form-group">
                    <label class="p-1">Image Size is 200px * 200px</label>
                    <label class="custom-file">
                        <input type="file" id="imgInp2" name="image" class="custom-file-input">
                        <span class="custom-file-control"></span>
                    </label>
                    @error('image')<span class="error">{{$message}}<span> @enderror
                    </div>
                </div>
                <div class="col-lg-4">
                    <img src="{{asset('admin/img/img12.jpg')}}" id="defaultimg2" class="w-100 defaultimgcss2">
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                    <label>Meta Title <span class="error">*</span></label>
                    <input type="text" class="form-control" id="metatitle" name="edit_meta_title" placeholder="Meta Title Here...">
                    @error('edit_meta_title')<span class="error">{{$message}}<span> @enderror
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                    <label>Meta Keywords <span class="error">*</span></label>
                    <input type="text" class="form-control" id="metakeywords" name="edit_meta_keywords" placeholder="Meta Keywords Here...">
                    @error('edit_meta_keywords')<span class="error">{{$message}}<span> @enderror
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                    <label>Meta Description <span class="error">*</span></label>
                    <input type="text" class="form-control" id="metadescription" name="edit_meta_description" placeholder="Meta Description Here...">
                    @error('edit_meta_description')<span class="error">{{$message}}<span> @enderror
                    </div>
                </div>
            </div> 
        </div>
      <div class="modal-footer justify-content-center">
        <button type="submit" id="Msvbtn" onclick="$('#Msvbtn').hide();$('#Mprcbtn').show();" class="btn btn-success tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium">Update & Proceed</button>
        <button type="button" disabled id="Mprcbtn" style="display:none;" class="btn btn-success tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium">Processing...</button>
        <button type="button" class="btn btn-dark tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div><!-- modal-dialog -->
</div>
@push('style')
<title>Brand Management : Ebizzmart</title>
<link href="{{asset('admin/lib/select2/css/select2.min.css')}}" rel="stylesheet">

<link href="{{asset('admin/lib/SpinKit/spinkit.css')}}" rel="stylesheet">
@endpush
@push('scripts')
<script src="{{asset('admin/lib/datatables/jquery.dataTables.js')}}"></script>

<script src="{{asset('admin/lib/select2/js/select2.min.js')}}"></script>

<script>
  $(document).ready(function(){
    $('.select2-container').css('width','100%');
    $('#datatable1').DataTable({
        responsive: true,
        language: {
        searchPlaceholder: 'Search...',
        sSearch: '',
        lengthMenu: '_MENU_ items/page',
        }
    });
    $('#datatable2').DataTable({
        bLengthChange: false,
        searching: false,
        responsive: true
    });
    $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });
  });
  function RemoveRecord(Id){
    if(confirm("Are you sure! You want to remove this record.")){
        $('#removeId').val(Id);
        $('#RemoveForm').submit();
    }
  }
  function getEditData(Id){
    $('.modal-footer').hide();
    $('.editbox').hide();
    $('.spinnerbox').css('width','450');
    $('.spinnerbox').show();
    var URL = "{{route('admin.brand-detail')}}";
    $.get(URL,{
        id:Id
    },function(data){
        $('.modal-footer').show();
        $('.spinnerbox').hide();
        $('.editbox').css('width','450');
        $('.editbox').show();
        $('input[name=editId]').val(data.id);
        $('input[name=preimage]').val(data.icon);
        $('#name').val(data.name);
        $('#alias').val(data.alias);
        $('#metatitle').val(data.meta_title);
        $('#metakeywords').val(data.meta_keywords);
        $('#metadescription').val(data.meta_description);
        $('#defaultimg2').attr('src','{{asset('uploads/brand/')}}/'+data.icon);
        imgInp2.onchange = evt => {
            const [file] = imgInp2.files
            if (file) {
            defaultimg2.src = URL.createObjectURL(file)
            }
        }
    });
  }
  imgInp.onchange = evt => {
    const [file] = imgInp.files
    if (file) {
      defaultimg.src = URL.createObjectURL(file)
    }
  }
  
</script>   
@endpush