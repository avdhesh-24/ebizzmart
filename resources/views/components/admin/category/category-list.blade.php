<div class="br-mainpanel">
    <div class="br-pageheader pd-y-15 pd-l-20">
        <div class="col-md-6">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
              <a class="breadcrumb-item" href="{{route('admin.home')}}">Dashboard</a>
              @if(!empty($parentdata))
              <a class="breadcrumb-item" href="{{route('admin.category')}}">Category Management</a>
              @if($parentdata->parent==0)
              <a class="breadcrumb-item active" href="{{route('admin.category')}}">{{$parentdata->name}}</a>
              @else
              <a class="breadcrumb-item active" href="{{route('admin.category',['parent'=>$parentdata->parent])}}">{{$parentdata->name}}</a>
              @endif
              
              @else
              <span class="breadcrumb-item active">Category Management</span>
              @endif
            </nav>
        </div>
        <div class="col-md-6">
            <div class="pull-right">
                <a href="{{action('Admin\CategoryController@New',['parent'=>$Parent])}}" class="btn btn-dark btn-with-icon">
                    <div class="ht-40">
                        <span class="icon wd-40"><i class="fa fa-plus"></i></span>
                        <span class="pd-x-15">Add New</span>
                    </div>
                </a>
                <!-- <a href="{{action('Admin\CategoryController@New',['parent'=>$Parent])}}" class="btn btn-dark btn-with-icon">
                    <div class="ht-40">
                        <span class="icon wd-40"><i class="fa fa-file-excel-o"></i></span>
                        <span class="pd-x-15">Export</span>
                    </div>
                </a> -->
            </div>
        </div>
    </div><!-- br-pageheader -->

      <x-admin.alert/>
      

      <div class="br-pagebody">
        <div class="br-section-wrapper">
          <div class="table-wrapper">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th class="wd-5p">S.No</th>
                  <th>Image</th>
                  <th>Title</th>
                  <th>Alias</th>
                  <th>Sub Category</th>
                  <th>Status</th>
                  @if($Parent==0)<th>Home</th>@endif
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                
                @foreach($lists as $list)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td><img src="{{asset('uploads/category/'.$list->image)}}" style="width:80px" class="defaultimgcss"></td>
                  <td>{{$list->name}}</td>
                  <td>{{$list->alias}}</td>
                  <td>
                    <a href="{{action('Admin\CategoryController@index',['parent'=>$list->id])}}" class="btn btn-outline-danger btn-icon rounded-circle" data-toggle="tooltip" data-placement="top" title="Sub-Category"><div>{{count($list->child)}}</div></a>
                  </td>
                  <td>
                    @if($list->status==0)
                    <a href="{{action('Admin\CategoryController@Status',['status'=>1,'id'=>$list->id])}}" class="btn btn-outline-danger btn-icon rounded-circle" data-toggle="tooltip" data-placement="top" title="Activate"><div><i class="fa fa-thumbs-down"></i></div></a>
                    @else
                    <a href="{{action('Admin\CategoryController@Status',['status'=>0,'id'=>$list->id])}}" class="btn btn-outline-success btn-icon rounded-circle" data-toggle="tooltip" data-placement="top" title="Dectivate"><div><i class="fa fa-thumbs-up"></i></div></a>
                    @endif
                  </td>
                  @if($list->parent==0)
                  <td>
                    @if($list->home==0)
                    <a href="{{action('Admin\CategoryController@HomeStatus',['status'=>1,'id'=>$list->id])}}" class="btn btn-outline-danger btn-icon rounded-circle" data-toggle="tooltip" data-placement="top" title="Activate"><div><i class="fa fa-thumbs-down"></i></div></a>
                    @else
                    <a href="{{action('Admin\CategoryController@HomeStatus',['status'=>0,'id'=>$list->id])}}" class="btn btn-outline-success btn-icon rounded-circle" data-toggle="tooltip" data-placement="top" title="Dectivate"><div><i class="fa fa-thumbs-up"></i></div></a>
                    @endif
                  </td>
                  @endif
                  <td class="pd-r-0-force tx-center">
                    @if(count($list->child)==0)
                    <a href="#attribute" onclick="getAttributeGroup({{$list->id}})" data-toggle="modal" class="btn btn-outline-warning btn-icon rounded-circle" data-toggle="tooltip" data-placement="top" title="Map Attribute"><div><i class="fa fa-cubes"></i></div></a>
                    <a href="{{action('Admin\CategoryController@Brand',['category'=>$list->id])}}" class="btn btn-outline-info btn-icon rounded-circle" data-toggle="tooltip" data-placement="top" title="Map Brand"><div><i class="fa fa-sitemap"></i></div></a>
                    @endif
                    <a href="{{action('Admin\CategoryController@Edit',['id'=>$list->id])}}" class="btn btn-outline-primary btn-icon rounded-circle" data-toggle="tooltip" data-placement="top" title="Edit"><div><i class="fa fa-pencil"></i></div></a>
                    <a href="javascript:void(0)" class="btn btn-outline-danger btn-icon rounded-circle" onclick="RemoveRecord({{$list->id}})" data-toggle="tooltip" data-placement="top" title="Remove"><div><i class="fa fa-trash"></i></div></a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    <x-admin.footer/>
</div>
<div id="attribute" class="modal fade">
  <div class="modal-dialog modal-dialog-vertical-center" role="document">
    <div class="modal-content bd-0 tx-14">
      <form method="post" action="{{route('admin.mapped-category-attribute-group')}}">
        @csrf
      <div class="modal-header pd-y-20 pd-x-25">
        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Mapp Attribute Group</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <x-admin.page-loader/>
        <div class="attrobutebox"></div>
      </div>
      <div class="modal-footer">
        <button type="submit" id="svbtn" onclick="$('#svbtn').hide();$('#prcbtn').show();"  class="btn btn-success tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium">Confirm & Proceed</button>
        <button type="button" id="prcbtn" style="display:none;" disabled class="btn btn-success">Processing...</button>
        <button type="button" class="btn btn-dark tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div><!-- modal-dialog -->
</div>
<form method="post" action="{{route('admin.category-remove')}}" id="RemoveForm">@csrf<input type="hidden" name="removeId" id="removeId"></form>
@push('style')
<link href="{{asset('admin/lib/highlightjs/github.css')}}" rel="stylesheet">
<link href="{{asset('admin/lib/select2/css/select2.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('frontend/fonts/flaticon/flaticon.css')}}" />
<link href="{{asset('admin/lib/highlightjs/github.css')}}" rel="stylesheet">
    <link href="{{asset('admin/lib/jquery.steps/jquery.steps.css')}}" rel="stylesheet">
    <link href="{{asset('admin/lib/SpinKit/spinkit.css')}}" rel="stylesheet">
<title>{{!empty($parentdata->name)? $parentdata->name.' Category' : 'Category Management'}} : Ebizzmart</title>
@endpush
@push('scripts')
<script src="{{asset('admin/lib/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('admin/lib/highlightjs/highlight.pack.js')}}"></script>

<script>
  function RemoveRecord(Id){
    if(confirm("Are you sure! You want to remove this record.")){
        $('#removeId').val(Id);
        $('#RemoveForm').submit();
    }
  }
  function getAttributeGroup(Id){
    $('.loaderbox').show();
    $('.attrobutebox').html('');
    $.get("{{route('admin.get-category-attribute-group')}}",{
      category:Id
    },function(data){
      $('.attrobutebox').html(data);
      $('.loaderbox').hide();
    });
  }
</script>
   
@endpush