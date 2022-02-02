<div class="br-mainpanel">
    <div class="br-pageheader pd-y-15 pd-l-20">
        <div class="col-md-6">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
              <a class="breadcrumb-item" href="{{route('admin.home')}}">Dashboard</a>
              <span class="breadcrumb-item active">Our Facility</span>
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
                <h6 class="card-title tx-uppercase tx-12 mg-b-0">Add Facility</h6>
                <span class="tx-12 tx-uppercase">{{date('F d, Y')}}</span>
              </div><!-- card-header -->
              <div class="card-body d-xs-flex justify-content-between align-items-center">
                <form method="post" action="{{route('admin.save-our-facility')}}" enctype="multipart/form-data">
                  @csrf
                  <div class="row mg-b-25">
                    <div class="col-lg-12">
                        <div class="form-group">
                        <label>Title <span class="error">*</span></label>
                        <input type="text" class="form-control" value="{{old('title')}}" name="title" placeholder="Title Here...">
                        @error('title')<span class="error">{{$message}}<span> @enderror
                        </div>
                    </div> 
                    <div class="col-lg-10">
                        <div class="form-group">
                        <label class="p-1">Icon Size is 50px * 50px</label>
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
                <h6 class="card-title tx-uppercase tx-12 mg-b-0">Facility List</h6>
                <span class="tx-12 tx-uppercase">{{date('F d, Y')}}</span>
              </div><!-- card-header -->
              <div class="card-body d-xs-flex justify-content-between align-items-center">
                    <div class="table-wrapper">
                        <table class="table table-hover">
                          <thead>
                              <tr>
                                  <th class="wd-5p">S.No</th>
                                  <th>Icon</th>
                                  <th>Title</th>
                                  <th>Status</th>
                                  <th>Action</th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach($lists as $list)
                            <tr>
                              <td>{{$loop->iteration}}</td>
                              <td><img src="{{asset('uploads/facility/'.$list->icon)}}" style="width:50px;"></td>
                              <td>{{$list->title}}</td>
                              <td>
                                @if($list->status==0)
                                <a href="{{action('Admin\FacilityController@Status',['status'=>1,'id'=>$list->id])}}" class="btn btn-outline-danger btn-icon rounded-circle" data-toggle="tooltip" data-placement="top" title="Category Activate"><div><i class="fa fa-thumbs-down"></i></div></a>
                                @else
                                <a href="{{action('Admin\FacilityController@Status',['status'=>0,'id'=>$list->id])}}" class="btn btn-outline-success btn-icon rounded-circle" data-toggle="tooltip" data-placement="top" title="Category Dectivate"><div><i class="fa fa-thumbs-up"></i></div></a>
                                @endif
                              </td>
                              
                              <td class="pd-r-0-force tx-center">
                                <a href="#editmodal" data-toggle="modal" onclick="getEditData({{$list->id}},'{{$list->title}}','{{$list->icon}}')" class="btn btn-outline-primary btn-icon rounded-circle"><div><i class="fa fa-pencil"></i></div></a>
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
<form method="post" action="{{route('admin.remove-our-facility')}}" id="RemoveForm">@csrf<input type="hidden" name="removeId" id="removeId"></form>
<div id="editmodal" class="modal fade">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content bd-0 tx-14">
      <form method="post" action="{{route('admin.edit-our-facility')}}">@csrf
      <div class="modal-header pd-x-20">
        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Edit Facility</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body pd-20">
        <input type="hidden" name="editId">
        <input type="hidden" name="preicon">
        <div class="col-lg-12">
            <div class="form-group">
            <label>Title <span class="error">*</span></label>
            <input type="text" class="form-control" name="edittitle" placeholder="Title Here...">
            @error('edittitle')<span class="error">{{$message}}<span> @enderror
            </div>
        </div> 
        <div class="col-lg-10">
            <div class="form-group">
            <label class="p-1">Icon Size is 50px * 50px</label>
            <label class="custom-file">
                <input type="file" id="imgInp2" name="icon" class="custom-file-input">
                <span class="custom-file-control"></span>
            </label>
            @error('icon')<span class="error">{{$message}}<span> @enderror
            </div>
        </div>
        <div class="col-lg-4">
            <img src="{{asset('admin/img/img12.jpg')}}" id="defaultimg2" class="w-100 defaultimgcss">
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
<title>Our Facility : Ebizzmart</title>
<link href="{{asset('admin/lib/select2/css/select2.min.css')}}" rel="stylesheet">
@endpush
@push('scripts')

<script src="{{asset('admin/lib/select2/js/select2.min.js')}}"></script>

<script>
  $(document).ready(function(){
    $('.select2-container').css('width','100%');
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