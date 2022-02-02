
@if(session()->has('success_msg'))
<div class="col-md-12">
  <div class="alert py-0">
    <div class="alert alert-success" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <strong class="d-block d-sm-inline-block-force">Well done!</strong> {{ session()->get('success_msg') }}
    </div>
  </div>
</div>
@endif
@if(session()->has('error_msg'))
<div class="col-md-12">
  <div class="alert py-0">
    <div class="alert alert-danger" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <strong class="d-block d-sm-inline-block-force">Sorry!</strong> {{ session()->get('error_msg') }}
    </div>
  </div>
</div>
@endif
@if(session()->has('warning_msg'))
<div class="col-md-12">
  <div class="alert py-0">
    <div class="alert alert-warning" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <strong class="d-block d-sm-inline-block-force">Opps!</strong> {{ session()->get('warning_msg') }}
    </div>
  </div>
</div>
@endif
