<div class="br-mainpanel">

      

      <div class="br-pageheader pd-y-15 pd-l-20">
        <div class="col-md-4">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('admin.home')}}">Dashboard</a>
            <span class="breadcrumb-item active">Product Management</span>
            </nav>
        </div>
        <div class="col-md-8">
            <div class="pull-right">
                <a href="{{action('Admin\ProductController@New')}}" class="btn btn-dark btn-with-icon">
                    <div class="ht-40">
                        <span class="icon wd-40"><i class="fa fa-plus"></i></span>
                        <span class="pd-x-15">Add New</span>
                    </div>
                </a>
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
                  <th>Category</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                
                @foreach($lists as $list)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td><img src="{{asset('uploads/product/'.$list->thumb_image)}}" width="50"></td>
                  <td>{{$list->title}}</td>
                  <td>{{$list->category->name}}</td>
                  <td>
                    @if($list->status==0)
                    <a href="{{action('Admin\ProductController@Status',['status'=>1,'id'=>$list->id])}}" class="btn btn-outline-danger btn-icon rounded-circle" data-toggle="tooltip" data-placement="top" title="Category Activate"><div><i class="fa fa-thumbs-down"></i></div></a>
                    @else
                    <a href="{{action('Admin\ProductController@Status',['status'=>0,'id'=>$list->id])}}" class="btn btn-outline-success btn-icon rounded-circle" data-toggle="tooltip" data-placement="top" title="Category Dectivate"><div><i class="fa fa-thumbs-up"></i></div></a>
                    @endif
                  </td>
                  <td class="pd-r-0-force tx-center">
                    <a href="{{action('Admin\ProductController@Edit',['id'=>$list->id])}}" class="btn btn-outline-primary btn-icon rounded-circle"><div><i class="fa fa-pencil"></i></div></a>
                    <a href="javascript:void(0)" class="btn btn-outline-danger btn-icon rounded-circle" onclick="RemoveRecord({{$list->id}})"><div><i class="fa fa-trash"></i></div></a>
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
<form method="post" action="{{route('admin.products-remove')}}" id="RemoveForm">@csrf<input type="hidden" name="removeId" id="removeId"></form>
@push('style')
<link href="{{asset('admin/lib/highlightjs/github.css')}}" rel="stylesheet">
<link href="{{asset('admin/lib/select2/css/select2.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('frontend/fonts/flaticon/flaticon.css')}}" />
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
    </script>
@endpush