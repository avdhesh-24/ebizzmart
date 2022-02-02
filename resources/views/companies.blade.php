@extends('layouts.app')
@section('content')
<div class="contentp">
    <section class="grey pt-1 Featured">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="fal fa-home-alt"></i></a></li>
                        <li class="breadcrumb-item"><a aria-current="page">Companies</a></li>
                    </ol>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 text-center">
                    <h1 class="Heading h3">Companies by Category</h1>
                </div>
            </div>
            <div class="infinite-scroll">
              <div class="row mt-3 Clisting">
                  @foreach($data as $company)
                  <div class="col-3">
                      <div class="card FedBlock">
                          <div class="card-header"><h3 class="m-0"><a href="{{route('company',['alias'=>$company->company_alias])}}">{{$company->company_name}}</a></h3></div>
                            <div class="card-body">
                                <a href="{{route('company',['alias'=>$company->company_alias])}}">
                                    @if(!empty($company->logo) && file_exists(public_path('uploads/company/'.$company->logo)))
                                        <img src="{{asset('uploads/company/'.$company->logo)}}">
                                    @else
                                        <img src="{{asset('frontend/image/sm-dimg.webp')}}">
                                    @endif
                                </a>
                            </div>
                            <div class="card-footer">Category : 
                                <a href="{{route('company',['alias'=>$company->company_alias])}}">
                                {!! Helper::CompanyCategory($company->business_in) !!}
                                </a>
                            </div>
                      </div>
                  </div>
                  @endforeach
              </div>
              <div style="display:none;">{{ $data->appends(request()->all())->render('pagination') }}</div>
                    
            </div>
        </div>
    </section>
</div>
@endsection

@push('css')
<title>Companies : Ebizzmart</title>
<meta name="description" content="Companies : Ebizzmart">
<meta name="keywords" content="Companies : Ebizzmart">
<link rel="stylesheet" href="{{asset('frontend/css/companies.css')}}">

@endpush

@push('scripts')
<script src="{{asset('frontend/js/jquery.jscroll.min.js')}}"></script>
<script>
  $(function() {
    $('.infinite-scroll').jscroll({
        autoTrigger: true,
        loadingHtml: '<div class="text-center"><img class="center-block" src="{{asset('frontend/image/load-more.gif')}}" width="300px" alt="Loading..." /></div>', // MAKE SURE THAT YOU PUT THE CORRECT IMG PATH
        padding: 0,
        nextSelector: '.pagination li.active + li a',
        contentSelector: 'div.infinite-scroll',
    });
});
</script>
@endpush       