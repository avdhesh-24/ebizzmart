@extends('layouts.app')
@section('content')
<div class="contentp">
    <section class="grey Profile pt-1">
        <div class="container">
            <div class="row mb-2">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php"><i class="fal fa-home-alt"></i></a></li>
                        <li class="breadcrumb-item"><a aria-current="page">Manage Product</a></li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <x-account-left/>
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-body">
                            <!-- <h3 class="h5 thm m-0">Product List</h3><hr class="border-secondary mb-2"> -->
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <ul class="prosearchmenu mb-0">
                                        <li><a href="#">All (0)</a></li>
                                        <li><a href="#">Approved (0)</a></li>
                                        <li><a href="#">Approval Pending (0)</a></li>
                                        <li><a href="#">Dis-approved (0)</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-4 text-end">
                                    <button type="button" class="btn btn-outline-success sws-top sws-bounce" data-title="Search Product"><i class="far fa-search"></i></button>
                                    <button type="button" class="btn btn-outline-danger sws-top sws-bounce" data-title="Bulk Remove"><i class="far fa-trash-alt"></i></button>
                                    <a href="{{route('account.post-product')}}" class="btn thmbg1 text-white sws-top sws-bounce" data-title="Add New Product"><i class="far fa-plus"></i> Add New Product</a>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <form class="card links TableBox">
                        <div class="card-body">
                            <table class="DataTable table table-striped w-100" id="datatable">
                                <colgroup>
                                    <col width="5%">
                                    <col width="35%">
                                    <col width="10%">
                                    <col width="15%">
                                    <col width="15%">
                                    <col width="10%">
                                    <col width="10%">
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th><div class="form-check"><input class="form-check-input" type="checkbox" value=""></div></th>
                                        <th>Products</th>
                                        <th>Price</th>
                                        <th>Brand</th>
                                        <th>Last Updated</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($lists as $list)
                                    <tr>
                                        <td><div class="form-check"><input class="form-check-input" type="checkbox" value=""></div></td>
                                        <td>
                                            <div class="ProTable">
                                                <div class="img"><img src="{{asset('uploads/product/'.$list->thumb_image)}}"></div>
                                                <div class="">
                                                    <h3>{{$list->title}}</h3>
                                                    <p><strong>Category:</strong> {{$list->category->name}}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            @if(!empty($list->defaultprice->selling_price))
                                            <i class="rupee">&#8377;</i> {{$list->defaultprice->selling_price}}
                                            @else
                                                -----
                                            @endif
                                        </td>
                                        <td>{{!empty($list->brand->name) ? $list->brand->name : '----'}}</td>
                                        <td><span class="badge bg-secondary">{{date('d F,Y',strtotime($list->updated_at))}}</span><br>On Display</td>
                                        <td>
                                            @if($list->status==1)<span class="badge bg-success">Approved</span>@endif
                                            @if($list->status==0)<span class="badge bg-warning">Pending</span>@endif
                                            @if($list->status==2)<span class="badge bg-danger">Dis-Approved</span>@endif
                                        </td>
                                        <td>
                                            <a href="manage-product-edit.php" class="btn btni btn-primary"><i class="fal fa-pencil"></i></a>
                                            <a href="#Delete" data-bs-toggle="modal" class="btn btni btn-danger"><i class="fal fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<x-delete-model/>

@endsection
 
@push('css')
<title>Manage Product : ebizzmart</title>
<link rel="stylesheet" type="text/css" media="screen,projection" href="{{asset('frontend/css/profile.css')}}">
<link rel="stylesheet" type="text/css" media="screen,projection" href="{{asset('frontend/css/pro-manage.css')}}">
<link rel="preload" as="style" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" onload="this.rel='stylesheet'" integrity="sha512-160haaGB7fVnCfk/LJAEsACLe6gMQMNCM3Le1vF867rwJa2hcIOgx34Q1ah10RWeLVzpVFokcSmcint/lFUZlg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@push('scripts')
<script defer type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-bs5/1.11.4/dataTables.bootstrap5.min.js" integrity="sha512-nfoMMJ2SPcUdaoGdaRVA1XZpBVyDGhKQ/DCedW2k93MTRphPVXgaDoYV1M/AJQLCiw/cl2Nbf9pbISGqIEQRmQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('.DataTable').DataTable({
        "bPaginate": false,
        searching: false,
        paging: false,
        info: false
    });
});

</script>
@endpush       