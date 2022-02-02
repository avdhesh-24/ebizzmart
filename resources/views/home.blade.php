@extends('layouts.app')
@section('content')
<div class="contentp">
    <section class="Slider"> 
        <div id="HomeBanner" class="carousel slide carousel-fade" data-bs-ride="carousel">
          <div class="carousel-inner">
            @foreach($sliders as $slider)
            <div class="carousel-item {{$loop->iteration==1?'active':''}}">
              <img src="{{asset('uploads/banner/'.$slider->image)}}" alt="{{$slider->image_alt}}" width="1400" height="100%">
            </div>
            @endforeach
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#HomeBanner" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#HomeBanner" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
    </section>
    @if(count($bottoms) > 0)
    <section class="SlidBottom">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-lg-2">
                    <div class="titlebox d-flex thmbg1 align-items-center justify-content-center h-100">
                        <h3 class="h6 text-uppercase text-white">New Trends Items</h3>
                    </div>
                </div>
                <div class="col-md-9 col-lg-10">
                    <div class="TrendsBox">
                        <div id="BannerBottom" class="owl-carousel">
                            @foreach($bottoms as $bottom)
                            <div class="item">
                                <div>
                                    <img src="{{asset('uploads/banner-bottom/'.$bottom->image)}}">
                                    <div>
                                        <h3 class="h6 thm1"><strong>{{$bottom->title}}</strong></h3>
                                        <a href="{{$bottom->link}}" class="btn btn-main1">{{$bottom->button}}</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    @if(count($advertisements) > 0)
    <section class="ads">
        <div class="container">
            <div class="row">
                @foreach($advertisements as $advertisement)
                <div class="col-md-6">
                    <a href="{{$advertisement->link}}">
                        <img src="{{asset('uploads/advertisement/'.$advertisement->image)}}" alt="{{$advertisement->image_alt}}" class="w-100">
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    
    @foreach($categories as $category)
    <section class="allCategory Home">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="Heading h3">{{$category->name}}</h2>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-12 col-md-3">
                    <div class="CatImg">
                        <div class="img"><img src="{{asset('uploads/category/'.$category->image)}}"></div>
                        <div class="Text">
                            <ul>
                                <li><a href="{{route('category',['alias'=>$category->alias])}}">{{$category->name}}</a></li>
                            </ul>
                            <a href="{{route('category',['alias'=>$category->alias])}}" class="btn btn-main">View all</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-9">
                    <div class="owl-carousel catblock">
                        @foreach($category->child as $subcategory)
                        <div class="item">
                            <div class="card CatBlock">
                                <a href="{{route('category',['alias'=>$subcategory->alias])}}"><div class="img"><img src="{{asset('uploads/category/'.$subcategory->image)}}"></div></a>
                                <div class="con">
                                    <h3><a href="{{route('category',['alias'=>$subcategory->alias])}}" class="thm1">{{$subcategory->name}}</a></h3>
                                    <ul>
                                        @foreach($subcategory->child as $child)
                                        <li><a href="{{route('category',['alias'=>$child->alias])}}">{{$child->name}}</a></li>
                                        @endforeach
                                    </ul>
                                    <a href="{{route('category',['alias'=>$subcategory->alias])}}">View More <i class="fal fa-chevron-double-right"></i></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endforeach
    
    @if(count($companies) > 0)
    <section class="Featured Home">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="Heading h4">Featured Catalogues</h2>
                </div>
            </div>
            <div class="owl-carousel CatCarousel" id="Featured">
                @foreach($companies as $company)
                <div class="item">
                    <div class="card FedBlock">
                        <div class="card-header">
                            <h3 class="m-0">
                                <a href="{{route('company',['alias'=>$company->company_alias])}}">{{$company->company_name}}</a>
                            </h3>
                        </div> 
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
            <div class="row">
                <div class="col-12 text-center"><a href="{{route('companies')}}" class="btn btn-main1">View all Category <i class="fal fa-chevron-double-right"></i></a></div>
            </div>
        </div>
    </section>
    @endif

    @if(count($featured) > 0)
    <section class="ProCategory Home">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="Heading h4">Featured Products</h2>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-12">
                    <div class="owl-carousel CatCarousel text-center">
                        @foreach($featured as $product)
                        @php 
                            $Off=0;
                            $startdate = $product->created_at; 
                            $enddate = date('Y-m-d h:i:s'); 
                            $diff = Helper::dateDifference($startdate, $enddate); 
                            if(!empty($product->defaultprice->selling_price) && !empty($product->defaultprice->mrp)):
                                $Off = round(100 - ($product->defaultprice->selling_price/$product->defaultprice->mrp)*100);
                            endif;
                        @endphp 
                        <div class="item">
                            <div class="card ProBlock {{$diff<=7?'New':''}} {{$Off>0 ? 'Off' : ''}}">
                                <span class="OffTag"><span>{{$Off}}% off</span></span>
                                <div class="NewTag"><span>New</span></div>
                                <div class="card-head"><a href="{{route('product',['alias'=>$product->alias])}}"><img src="{{asset('uploads/product/'.$product->thumb_image)}}"></a></div>
                                <div class="card-body">
                                    <h3 class="name"><a href="{{route('product',['alias'=>$product->alias])}}">{{$product->title}}</a></h3>
                                    <span class="star" title="star" data-title="3"></span>
                                    @if(empty($product->defaultprice->selling_price) && empty($product->defaultprice->mrp))
                                    <span class="price">ASK FOR PRICE</span>
                                    @endif
                                    @if(!empty($product->defaultprice->selling_price) && !empty($product->defaultprice->mrp))
                                    <span class="price">
                                        <i class="rupee">&#8377;</i>{{$product->defaultprice->selling_price}} 
                                        <span class="cutprice"><i class="rupee">&#8377;</i>{{$product->defaultprice->mrp}}</span>
                                    </span>
                                    @endif
                                    @if(!empty($product->defaultprice->mrp) && empty($product->defaultprice->selling_price))
                                    <span class="price">
                                        <i class="rupee">&#8377;</i>{{$product->defaultprice->mrp}} 
                                    </span>
                                    @endif
                                    @if(empty($product->defaultprice->mrp) && !empty($product->defaultprice->selling_price))
                                    <span class="price">
                                        <i class="rupee">&#8377;</i>{{$product->defaultprice->selling_price}} 
                                    </span>
                                    @endif
                                    <p class="m-0"><small>{{$product->minimum_order}} Pieces (Min Order)</small></p>
                                    <span class="supl"><a href="#SendInquiry" data-bs-toggle="modal" class="btn btn-main1">Contact Supplier</a></span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
</div>
<x-footer-cat-menu/>
@endsection

@push('css')
<title>Home : ebizzmart</title>
<link rel="preload" as="style" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" onload="this.rel='stylesheet'" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
<link rel="preload" as="style" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" onload="this.rel='stylesheet'" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/owl.carousel2.thumbs@0.1.8/dist/owl.carousel2.thumbs.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $("#BannerBottom").owlCarousel({items:3, margin:12, loop:false, dots:false, nav:true, navText:['<span class="fal fa-chevron-double-left"></span>', '<span class="fal fa-chevron-double-right"></span>'], autoplay:false, autoplayTimeout:3000, autoplayHoverPause:true, responsiveClass:true, responsive:{250:{items:1}, 320:{items:1}, 460:{items:1}, 600:{items:1}, 768:{items:2}, 992:{items:3}, 1200:{items:4}, 1600:{items:5}}});
    $("#Featured").owlCarousel({items:5, margin:12, loop:false, dots:false, nav:true, navText:['<span class="icon fal fa-chevron-left"></span>', '<span class="fal fa-chevron-right"></span>'], autoplay:false, autoplayTimeout:3000, autoplayHoverPause:true, responsiveClass:true, responsive:{250:{items:1}, 320:{items:1}, 460:{items:2}, 600:{items:2}, 768:{items:3}, 992:{items:4}, 1200:{items:5}, 1600:{items:5}}});
    $(".CatCarousel").owlCarousel({items:6, margin:12, loop:true, dots:false, nav:true, navText:['<span class="icon fal fa-chevron-left"></span>', '<span class="fal fa-chevron-right"></span>'], autoplay:false, autoplayTimeout:4000, autoplayHoverPause:true, responsiveClass:true, responsive:{250:{items:1}, 320:{items:1, margin:9}, 460:{items:2, margin:12}, 600:{items:3, margin:15}, 768:{items:4, margin:18}, 992:{items:4, margin:20}, 1200:{items:6}, 1600:{items:6}}});
    $(".catblock").owlCarousel({items:3, margin:12, loop:false, dots:false, nav:false, navText:['<span class="icon fal fa-chevron-left"></span>', '<span class="fal fa-chevron-right"></span>'], autoplay:false, autoplayTimeout:4000, autoplayHoverPause:true, responsiveClass:true, responsive:{250:{items:1}, 320:{items:1, nav:true}, 460:{items:2, nav:true}, 600:{items:2, nav:true}, 768:{items:2, nav:true}, 992:{items:2, nav:true}, 1200:{items:3}, 1600:{items:3}}});
    $("#BrandLinksTop").owlCarousel({items:5, margin:30, loop:true, dots:false, nav:false, navText:['<span class="icon fal fa-chevron-left"></span>', '<span class="fal fa-chevron-right"></span>'], autoplay:false, autoplayTimeout:4000, autoplayHoverPause:true, responsiveClass:true, responsive:{250:{items:1}, 320:{items:1, margin:9}, 460:{items:2, margin:12}, 600:{items:3, margin:15}, 768:{items:4, margin:18}, 992:{items:4, margin:20}, 1200:{items:5}, 1600:{items:5}}});
});
</script>
@endpush       