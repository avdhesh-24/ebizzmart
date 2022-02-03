@extends('layouts.app')
@section('content')
<div class="contentp">
    <section class="Detail grey p-0 pt-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="fal fa-home-alt"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{url('companies')}}">Companies</a></li>
                        <li class="breadcrumb-item"><a aria-current="page">Company Detail</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <x-comp-menu :data="$data"/>
    <section class="Detail grey CompanyP">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <div class="LeftPanelSec">
                        <div class="card cardbox mb-4" id="AccountMenu">
                            <div class="card-body Leftpanel">
                                <ul class="hmenu">
                                    <li class="active"><a title="Company Overview" href="#1"><i class="fal fa-building me-2"></i> Company Overview</a></li>
                                    <li><a title="Production Capacity" href="#2"><i class="fal fa-wrench me-2"></i> Production Capacity</a></li>
                                    <li><a title="Trade Capacity" href="#3"><i class="fal fa-chart-bar me-2"></i> Trade Capacity</a></li>
                                    <li><a title="Trade Ability" href="#4"><i class="fal fa-chart-pie-alt me-2"></i> Trade Ability</a></li>
                                    <li><a title="Business Terms" href="#5"><i class="fal fa-file-signature me-2"></i> Business Terms</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <section class="ComDBox mb-4" id="1">
                        <div class="HomeBlock">
                            <div class="container">
                                <h2>Company Profile</h2><hr class="border-secondary">
                                <div class="row">
                                    <div class="col-md-10">
                                        {!! $data->company_introduction !!}
                                        <div class="Highlights Hcol2 mt-3">
                                            <ul>
                                                <li><span>Business Type</span> <span>{!! !empty($data->business) ? $data->business->name : '' !!}</span></li>
                                                <li><span>Business In</span> <span>{!! Helper::CompanyCategory($data->business_in) !!}</span></li>
                                                <li><span>GST Number</span> <span>{!! !empty($data->gst) ? $data->gst : '-----' !!}</span></li>
                                                <li><span>I am</span> <span>{!! !empty($data->type) ? $data->type->name : '-----' !!}</span></li>
                                                <li><span>No. Employees</span> <span>{{$data->employees=='1001' ? '1000+ Employees' : $data->employees}}</span></li>
                                                <li><span>Year Established</span> <span>{{!empty($data->established) ? $data->established : '-----'}}</span></li>
                                            </ul>
                                        </div>
                                        <h4 class="mt-4 h5">Location of Registration</h4>
                                        <div class="Highlights Hcol2 mt-2">
                                            <ul>
                                                <li><span>Country/Region</span> <span>{{!empty($data->countries) ? $data->countries->name : '-----'}}</span></li>
                                                <li><span>Province/City</span> <span>{{!empty($data->cities) ? $data->cities->name : '-----'}}</span></li>
                                            </ul>
                                        </div>
                                        <h4 class="mt-4 h5">Company Operational Address</h4>
                                        <div class="Highlights Hcol2 mt-2">
                                            <ul>
                                                <li><span>Address</span> <span>{{!empty($data->address) ? $data->address : '-----'}}</span></li>
                                                <li><span>Zip/Postal Code</span> <span>{{!empty($data->pincode) ? $data->pincode : '-----'}}</span></li>
                                            </ul>
                                        </div>
                                        <h4 class="thm2 mt-4">Company Albums</h4>
                                        <div class="row ComAlbums">
                                            @foreach($data->albums as $album)
                                            <div class="col-md-3">
                                                <div class="card">
                                                    <a href="{{asset('uploads/company/'.$album->image)}}" data-fancybox="gallery">
                                                        <img src="{{asset('uploads/company/thumb/'.$album->thumb_image)}}">
                                                    </a>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card ComCard">
                                            <div class="card-body thmbg text-white text-center">
                                                <h3 class="thm2 mb-0"><strong class="h1">4</strong>/5</h3>
                                                <span class="star" title="star" data-title="4"></span>
                                                <span>Satisfied</span>
                                                <a href="#" class="text-white">110 Reviews</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="ComDBox mb-4" id="2">
                        <div class="HomeBlock">
                            <div class="container">
                                <h2 class="m-0 h3 thm2">Partner Factories</h2><hr class="border-secondary">
                                @foreach($data->factories as $factorie)
                                <h3 class="mt-4 h5">{{$loop->iteration}} Factory Information</h3>
                                <div class="Highlights mt-2">
                                    <ul>
                                        <li><span>Factory Size</span> <span>{{$factorie->factory_size}}</span></li>
                                        <li><span>Factory Country/Region</span> <span>{{$factorie->factory_address}}</span></li>
                                        <li><span>No. of Production Lines</span> <span>{{$factorie->production_line}}</span></li>
                                        <li><span>Contract Manufacturing</span> <span>{{$factorie->manufacturing}}</span></li>
                                        <li><span>Annual Output Value</span> <span>{{$factorie->annual_output}}</span></li>
                                    </ul>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </section>
                    <section class="ComDBox mb-4" id="3">
                        <div class="HomeBlock">
                            <div class="container">
                                <h2 class="m-0 h3 thm2"> Trade Capacity</h2><hr class="border-secondary">
                                <h3 class="mt-4 h5">Main Markets and Distribution</h3>
                                <div class="Highlights Hcol2 mt-2">
                                    <ul>
                                        <li><span>North America</span> <span>{{!empty($data->trademarketdistribution->north_america) ? $data->trademarketdistribution->north_america.'%' : ''}}</span></li>
                                        <li><span>Central America</span> <span>{{!empty($data->trademarketdistribution->central_america) ? $data->trademarketdistribution->central_america.'%' : ''}}</span></li>
                                        <li><span>South America</span> <span>{{!empty($data->trademarketdistribution->south_america) ? $data->trademarketdistribution->south_america.'%' : ''}}</span></li>
                                        <li><span>Eastern Europe</span> <span>{{!empty($data->trademarketdistribution->eastern_europe) ? $data->trademarketdistribution->eastern_europe.'%' : ''}}</span></li>
                                        <li><span>Northern Europe</span> <span>{{!empty($data->trademarketdistribution->northern_europe) ? $data->trademarketdistribution->northern_europe.'%' : ''}}</span></li>
                                        <li><span>Southern Europe</span> <span>{{!empty($data->trademarketdistribution->southern_europe) ? $data->trademarketdistribution->southern_europe.'%' : ''}}</span></li>
                                        <li><span>Eastern Asia</span> <span>{{!empty($data->trademarketdistribution->eastern_asia) ? $data->trademarketdistribution->eastern_asia.'%' : ''}}</span></li>
                                        <li><span>South Asia</span> <span>{{!empty($data->trademarketdistribution->south_asia) ? $data->trademarketdistribution->south_asia.'%' : ''}}</span></li>
                                        <li><span>Southeast Asia</span> <span>{{!empty($data->trademarketdistribution->southeast_asia) ? $data->trademarketdistribution->southeast_asia.'%' : ''}}</span></li>
                                        <li><span>Africa</span> <span>{{!empty($data->trademarketdistribution->africa) ? $data->trademarketdistribution->africa.'%' : ''}}</span></li>
                                        <li><span>Oceania</span> <span>{{!empty($data->trademarketdistribution->oceania) ? $data->trademarketdistribution->oceania.'%' : ''}}</span></li>
                                        <li><span>Mid East</span> <span>{{!empty($data->trademarketdistribution->mid_east) ? $data->trademarketdistribution->mid_east.'%' : ''}}</span></li>
                                        <li><span>Domestic Market</span> <span>{{!empty($data->trademarketdistribution->domestic_market) ? $data->trademarketdistribution->domestic_market.'%' : ''}}</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="ComDBox mb-4" id="4">
                        <div class="HomeBlock">
                            <div class="container">
                                <h2 class="m-0 h3 thm2">Trade Ability</h2><hr class="border-secondary">
                                <div class="Highlights Hcol2 mt-2">
                                    <ul>
                                        <li><span>Year Established</span> <span>{{$data->established}}</span></li>
                                        <li><span>Total Employees</span> <span>{{$data->employees=='1001' ? '1000+ Employees' : $data->employees}}</span></li>
                                        <li><span>Company Website </span> <span>{{$data->website}}</span></li>
                                        <li><span>Annual Revenue</span> <span>{{$data->annual_revenue}}</span></li>
                                        <li><span>Certifications</span> <span>{{$data->certifications}}</span></li>
                                        <li><span>Patents</span> <span>{{$data->patents}}</span></li>
                                        <li><span>Export (%)</span> <span>{{$data->export_percentage}}%</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="ComDBox" id="5">
                        <div class="HomeBlock">
                            <div class="container">
                                <h2 class="m-0 h3 thm2">Business Terms</h2><hr class="border-secondary">
                                <p><i class="fa fa-{{$data->multiple_industries==0 ? 'times-circle error' : 'check-circle success'}}"></i> <strong>Are you able to source across multiple industries.</strong> </p>
                                <p><i class="fa fa-{{$data->overseas_office==0 ? 'times-circle error' : 'check-circle success'}}"></i> <strong>Does your company have an overseas office.</strong></p>
                                <div class="Highlights mt-2">
                                    <ul>
                                        <li>
                                            <span>Accepted Currency</span>
                                            <span>
                                                @if(!empty($data->currency))
                                                    @php $C=1; @endphp
                                                    @foreach($paymentcurrencies as $currencies)
                                                        @if(in_array($currencies->id,json_decode($data->currency)))
                                                            {{$currencies->name}} {{$C==count(json_decode($data->currency)) ? '' : ','}}
                                                            @php $C++; @endphp 
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </span>
                                        </li>
                                        <li>
                                            <span>Accepted Payment Type</span> 
                                            <span>
                                                @if(!empty($data->payment_type))
                                                    @php $T=1; @endphp
                                                    @foreach($paymenttypes as $type)
                                                        @if(in_array($type->id,json_decode($data->payment_type)))
                                                            {{$type->name}} {{$T==count(json_decode($data->payment_type)) ? '' : ','}}
                                                            @php $T++; @endphp 
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </span>
                                        </li>
                                        <li>
                                            <span>Language Spoken</span>
                                            <span>
                                                @if(!empty($data->language))
                                                    @php $L=1; @endphp
                                                    @foreach($languages as $language)
                                                        @if(in_array($language->id,json_decode($data->language)))
                                                            {{$language->name}} {{$L==count(json_decode($data->language)) ? '' : ','}} 
                                                            @php $L++; @endphp
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('css')
<title>{{$data->company_name}} : Ebizzmart</title>
<meta name="description" content="Companies : Ebizzmart">
<meta name="keywords" content="Companies : Ebizzmart">
<link rel="stylesheet" href="{{asset('frontend/css/companies-page.css')}}">
<link rel="preload" as="style" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" onload="this.rel='stylesheet'" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
<link rel="preload" as="style" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" onload="this.rel='stylesheet'" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />
@endpush

@push('scripts')
<script src="{{asset('frontend/js/jquery.jscroll.min.js')}}"></script>
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
<link rel="preload" as="style" rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" onload="this.rel='stylesheet'" />
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $(".CatCarousel").owlCarousel({items:6, margin:12, loop:true, dots:false, nav:true, navText:['<span class="icon fal fa-chevron-left"></span>', '<span class="fal fa-chevron-right"></span>'], autoplay:false, autoplayTimeout:4000, autoplayHoverPause:true, responsiveClass:true, responsive:{250:{items:1.4}, 320:{items:2.5, margin:5}, 460:{items:2.5, margin:6}, 600:{items:2.5, margin:9}, 768:{items:3.5, margin:10}, 992:{items:4.5, margin:20}, 1200:{items:5.5}}});
    if ($(window).width() > 992){
        $(window).scroll(function () {
            if ($(this).scrollTop() >65) {
                $('.ComDBox>div').addClass('is-fixed');
            } else {
                $('.ComDBox>div').removeClass('is-fixed');
            }
        });
    };
});
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