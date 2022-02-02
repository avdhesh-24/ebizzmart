<div class="br-mainpanel">
    <div class="br-pageheader pd-y-15 pd-l-20">
        <div class="col-md-6">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
              <a class="breadcrumb-item" href="{{route('admin.home')}}">Dashboard</a>
              <span class="breadcrumb-item active">Region Suppliers</span>
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
                <h6 class="card-title tx-uppercase tx-12 mg-b-0">Add Supplier Region</h6>
                <span class="tx-12 tx-uppercase">{{date('F d, Y')}}</span>
              </div><!-- card-header -->
              <div class="card-body d-xs-flex justify-content-between align-items-center">
                <form method="post" action="{{route('admin.save-region-suppliers')}}">
                  @csrf
                  <div class="row mg-b-25">
                    <div class="col-lg-12">
                        <div class="form-group">
                        <select class="form-control select2" name="region[]" data-placeholder="Choose Region" multiple>
                            @foreach($lists as $list)
                            <option value="{{$list->id}}">{{$list->name}}</option>
                            @endforeach
                        </select>
                        @error('region')<span class="error">{{$message}}<span> @enderror
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
                <h6 class="card-title tx-uppercase tx-12 mg-b-0">Supplier Region List</h6>
                <span class="tx-12 tx-uppercase">{{date('F d, Y')}}</span>
              </div><!-- card-header -->
              <div class="card-body d-xs-flex justify-content-between align-items-center">
                    <div class="table-wrapper">
                        <table class="table table-hover">
                          <thead>
                              <tr>
                                  <th class="wd-5p">S.No</th>
                                  <th>Flag</th>
                                  <th>Name</th>
                                  <th>Phone Code</th>
                                  <th>Status</th>
                                  <th>Action</th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach($regions as $region)
                            <tr>
                              <td>{{$loop->iteration}}</td>
                              <td><img src="{{asset('frontend/country-flag/svg/'.strtolower($region->regioncountry->sortname).'.svg')}}"></td>
                              <td>{{$region->regioncountry->name}}</td>
                              <td>{{$region->regioncountry->phonecode}}</td>
                              <td>
                                @if($region->status==0)
                                <a href="{{action('Admin\HomeController@Region_Supplier_Status',['status'=>1,'id'=>$region->id])}}" class="btn btn-outline-danger btn-icon rounded-circle" data-toggle="tooltip" data-placement="top" title="Category Activate"><div><i class="fa fa-thumbs-down"></i></div></a>
                                @else
                                <a href="{{action('Admin\HomeController@Region_Supplier_Status',['status'=>0,'id'=>$region->id])}}" class="btn btn-outline-success btn-icon rounded-circle" data-toggle="tooltip" data-placement="top" title="Category Dectivate"><div><i class="fa fa-thumbs-up"></i></div></a>
                                @endif
                              </td>
                              
                              <td class="pd-r-0-force tx-center">
                                <a href="#editmodal" data-toggle="modal" onclick="getEditData({{$region->id}},{{$region->country_id}})" class="btn btn-outline-primary btn-icon rounded-circle"><div><i class="fa fa-pencil"></i></div></a>
                                <a href="javascript:void(0)" class="btn btn-outline-danger btn-icon rounded-circle" onclick="RemoveRecord({{$region->id}})"><div><i class="fa fa-trash"></i></div></a>
                              </td>
                            </tr>  
                            @endforeach                          
                          </tbody>
                        </table>
                        {{$regions->links()}}
                    </div>
              </div><!-- card-body -->
            </div><!-- card -->
          </div><!-- col-4 -->
          
        </div><!-- row -->
      </div>
    <x-admin.footer/>
</div>
<form method="post" action="{{route('admin.remove-region-suppliers')}}" id="RemoveForm">@csrf<input type="hidden" name="removeId" id="removeId"></form>
<div id="editmodal" class="modal fade">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content bd-0 tx-14">
      <form method="post" action="{{route('admin.edit-supplier-region')}}">@csrf
      <div class="modal-header pd-x-20">
        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Edit Supplier Region</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body pd-20">
        <input type="hidden" name="editId">
        <select class="form-control" name="editregion" data-placeholder="Choose Region">
            @foreach($lists as $list)
            <option value="{{$list->id}}">{{$list->name}}</option>
            @endforeach
        </select>
        @error('editregion')<span class="error">{{$message}}<span> @enderror
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
<title>Region Suppliers : Ebizzmart</title>
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
  function getEditData(Id,Country){
    $('select[name=editregion]').val(Country);
    $('input[name=editId]').val(Id);
  }
</script>   
@endpush