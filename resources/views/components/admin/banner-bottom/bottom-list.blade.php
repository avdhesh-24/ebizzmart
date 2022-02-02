<div class="br-mainpanel">
    <div class="br-pageheader pd-y-15 pd-l-20">
        <div class="col-md-6">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('admin.home')}}">Dashboard</a>
            <span class="breadcrumb-item active">Bottom Management</span>
            </nav>
        </div>
        <div class="col-md-6">
            <div class="text-right">
                <a href="{{route('admin.add-bottom')}}" class="btn btn-dark btn-with-icon">
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
                  <th class="wd-20p">Image</th>
                  <th class="wd-20p">Title</th>
                  <th class="wd-20p">Button</th>
                  <th class="wd-10p">Status</th>
                  <th class="wd-10p">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($lists as $list)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td><img src="{{asset('uploads/banner-bottom/'.$list->image)}}" class="defaultimgcss2"></td>
                  <td>{{$list->title}}</td>
                  <td>{{$list->button}}</td>
                  <td>
                    @if($list->status==0)
                    <a href="{{action('Admin\BottomController@Status',['status'=>1,'id'=>$list->id])}}" class="btn btn-outline-danger btn-icon rounded-circle" data-toggle="tooltip" data-placement="top" title="Tooltip on top"><div><i class="fa fa-thumbs-down"></i></div></a>
                    @else
                    <a href="{{action('Admin\BottomController@Status',['status'=>0,'id'=>$list->id])}}" class="btn btn-outline-success btn-icon rounded-circle"><div><i class="fa fa-thumbs-up"></i></div></a>
                    @endif
                  </td>
                    <td class="pd-r-0-force tx-center">
                        <a href="{{route('admin.edit-bottom',['id'=>$list->id])}}" class="btn btn-outline-primary btn-icon rounded-circle"><div><i class="fa fa-pencil"></i></div></a>
                        <a href="#" class="btn btn-outline-danger btn-icon rounded-circle" onclick="RemoveRecord({{$list->id}})"><div><i class="fa fa-trash"></i></div></a>
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
<form method="post" action="{{route('admin.banner-bottom-remove')}}" id="RemoveForm">@csrf<input type="hidden" name="removeId" id="removeId"></form>
@push('style')
<link href="{{asset('admin/lib/datatables/jquery.dataTables.css')}}" rel="stylesheet">
<title>Banner Bottom Management : Ebizzmart</title>
@endpush

@push('scripts')
<script src="{{asset('admin/lib/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('admin/lib/datatables-responsive/dataTables.responsive.js')}}"></script>
<script>
    function RemoveRecord(Id){
        if(confirm("Are you sure! You want to remove this record.")){
            $('#removeId').val(Id);
            $('#RemoveForm').submit();
        }
    }
</script>
@endpush