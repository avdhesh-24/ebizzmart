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
    <section class="Detail grey">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if(!empty($data->banners))
                    <section class="Slider">
                        <div id="HomeBanner" class="carousel slide carousel-fade" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach($data->banners as $banner)
                                <div class="carousel-item {{$loop->iteration==1 ? 'active' : ''}}">
                                    <img src="{{asset('uploads/company/banner/'.$banner->image)}}" alt="{!! $data->company_name !!}" width="1400" height="100%">
                                </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#HomeBanner" data-bs-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="visually-hidden">Previous</span></button>
                            <button class="carousel-control-next" type="button" data-bs-target="#HomeBanner" data-bs-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="visually-hidden">Next</span></button>
                        </div>
                    </section>
                    @endif
                    <section class="ComDBox">
                        <div class="HomeBlock">
                            <div class="container">
                                <h2>Company Profile</h2>
                                {!! $data->about !!}
                                <div class="Highlights Hcol2 mt-3">
                                    <ul>
                                        <li><span>Business Type</span> <span>{!! !empty($data->business) ? $data->business->name : '' !!}</span></li>
                                        <li><span>Business In</span> <span>{!! Helper::CompanyCategory($data->business_in) !!}</span></li>
                                        <li><span>GST Number</span> <span>{!! !empty($data->gst) ? $data->gst : '-----' !!}</span></li>
                                        <li><span>I am</span> <span>{!! !empty($data->type) ? $data->type->name : '-----' !!}</span></li>
                                        <li><span>No. Employees</span> <span>{{$data->employees=='1001' ? '1000+ Employees' : $data->employees}}</span></li>
                                        <li><span>Year Established</span> <span>{{$data->established}}</span></li>
                                    </ul>
                                </div>
                                <div class="mt-3"><a href="{{url()->current()}}/about#1" class="btn btn-main mt-1">Read More</a></div>
                            </div>
                        </div>
                        <div class="HomeBlock Featured grey">
                            <div class="container">

                                @if(!empty($data->certification))
                                <h3 class="text-center">Company Certifications</h3>
                                <div class="row justify-content-center mt-5">
                                    @foreach($data->certification as $certification)
                                    <div class="col-md-2">
                                        <div class="card FedBlock">
                                            <div class="card-body"><a href="{{asset('uploads/company/certifications/'.$certification->image)}}" data-fancybox="gallery"><img src="{{asset('uploads/company/certifications/thumb/'.$certification->thumb_image)}}" class="w-100"></a></div>
                                            <div class="card-footer"><h3>{{$certification->name}}</h3></div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @endif

                                @if(!empty($data->productcertification))
                                <h3 class="text-center mt-3">Product Certifications</h3>
                                <div class="row justify-content-center mt-5">
                                    @foreach($data->productcertification as $certification)
                                    <div class="col-md-2">
                                        <div class="card FedBlock">
                                            <div class="card-body"><a href="{{asset('uploads/company/product-certifications/'.$certification->image)}}" data-fancybox="gallery"><img src="{{asset('uploads/company/product-certifications/thumb/'.$certification->thumb_image)}}" class="w-100"></a></div>
                                            <div class="card-footer"><h3>{{!empty($certification->name) ? $certification->name : 'Product Certificate'}}</h3></div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @endif
                                
                            </div>
                        </div>
                        <div class="HomeBlock">
                            <div class="container">
                                <h3 class="text-center">Product Posted By <strong>{{$data->company_name}}</strong></h3>
                                <div class="owl-carousel CatCarousel text-center">
                                    <div class="item">
                                        <div class="card ProBlock New">
                                            <span class="OffTag"><span>20% off</span></span>
                                            <div class="NewTag"><span>New</span></div>
                                            <div class="card-head"><a href="company-product-detail.php"><img src="{{asset('frontend/img/pro-img1.jpg')}}"></a></div>
                                            <div class="card-body">
                                                <h3 class="name"><a href="company-product-detail.php">Healing Nutrients for Back Pain and Spine Surgery Healing Nutrients for Back Pain and Spine Surgery</a></h3>
                                                <span class="price"><i class="rupee">&#8377;</i>95.00 <span class="cutprice"><i class="rupee">&#8377;</i>115.00</span></span>
                                                <p class="m-0"><small>100 Pieces (Min Order)</small></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="BuyBtnBox mt-5">
                                <div>
                                    <h2 class="h5 mb-0"><strong>Interested in these product?</strong></h2>
                                    <p class="mb-0">Ask for more details &amp; Latest Price</p>
                                </div>
                                <div class="d-flex">
                                    <a href="#ViewMobile" data-bs-toggle="modal" class="btn btn-main1 mt-0 me-2"><i class="fal fa-phone-volume me-1"></i> View Mobile</a>
                                    <a href="#SendInquiry" data-bs-toggle="modal" class="btn btn-main mt-0" title="Send Inquiry"><i class="fal fa-envelope me-2"></i>Send Inquiry</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="HomeBlock Ccontact grey">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 col-lg-7">
                                        <form action="#" class="card">
                                            <div class="card-header">
                                                <h3 class="m-0 py-3 h5">Contact Us - {{$data->company_name}}</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="mb-2">
                                                    <label for="name" class="form-label m-0"><small>Name</small></label>
                                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name">
                                                </div>
                                                <div class="mb-2">
                                                    <label for="lemail" class="form-label m-0"><small>Mobile No.</small></label>
                                                    <div class="input-group CountrySelect">
                                                      <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="flagicon me-1"></i> <span id="CountryName">India</span></button>
                                                      <ul class="dropdown-menu countrylist">
                                                          <x-country-list/>
                                                      </ul>
                                                      <input type="text" class="form-control CountryCode" maxlength="8" oninput="maxLengthCheck(this)" value="+91" readonly name="ccode" id="ccode" aria-label="ccode">
                                                      <input type="number" class="form-control" maxlength="10" oninput="maxLengthCheck(this)" name="mobile" placeholder="Enter Your Phone No.">
                                                    </div>
                                                </div>
                                                <div class="mb-2">
                                                    <label for="email" class="form-label m-0"><small>Email ID</small></label>
                                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email ID">
                                                </div>
                                                <div class="mb-2">
                                                    <label for="subject" class="form-label m-0"><small>Subject</small></label>
                                                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter Your Subject">
                                                </div>
                                                <div class="mb-1">
                                                    <label for="message" class="form-label m-0"><small>Message</small></label>
                                                    <textarea class="form-control" id="message" name="message"></textarea>
                                                </div>
                                                <div class="text-center mt-3 mb-3"><button class="btn btn-main m-0" type="submit">Submit</button></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-12 col-lg-5">
                                        <div class="RightBar">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="m-0 py-3 h5">Looking for <strong>{{$data->company_name}}?</strong></h3>
                                                </div>
                                                <div class="card-body">
                                                    <ul class="ConInfo">
                                                        @if(!empty($data->user->name))
                                                        <li><i class="fal fa-user"></i> <span>{{$data->user->name}}</span></li>
                                                        @endif
                                                        @if(!empty($data->address))
                                                        <li><i class="fal fa-map-marker-alt"></i> <span>{{$data->address}}</span></li>
                                                        @endif
                                                        @if(!empty($data->company_phone_no))
                                                        <li><i class="fal fa-phone"></i> <span>{{substr($data->company_phone_no,0,2)}}******{{substr($data->company_phone_no,8)}}</span></li>
                                                        @endif
                                                        @if(!empty($data->website))
                                                        <li><i class="fal fa-link"></i> <span>{{$data->website}}</span></li>
                                                        @endif
                                                    </ul>
                                                    <div class="d-flex"><a href="#ViewMobile" data-bs-toggle="modal" class="btn btn-main1 w-100 me-2"><i class="fal fa-phone-volume me-1"></i> View Mobile</a><a href="#SendInquiry" data-bs-toggle="modal" class="btn btn-main w-100 ms-2" title="Send Inquiry"><i class="fal fa-envelope me-2"></i>Send Inquiry</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
<link rel="preload" as="style" rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" onload="this.rel='stylesheet'" />
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<script src="{{asset('frontend/js/jquery.jscroll.min.js')}}"></script>
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
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