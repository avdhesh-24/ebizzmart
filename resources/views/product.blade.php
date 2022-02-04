@extends('layouts.app')
@section('content')
    <x-product-view  :data="$data"/>
    <x-product-model/>
@endsection

@push('css')
<title>{{$data->meta_title}}</title>
<meta name="description" content="{{$data->meta_description}}">
<meta name="keywords" content="{{$data->meta_keywords}}">
<link rel="preload" as="style" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" onload="this.rel='stylesheet'" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
<link rel="preload" as="style" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" onload="this.rel='stylesheet'" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />

<link rel="stylesheet" type="text/css" media="screen,projection" href="{{asset('frontend/css/product-detail.css')}}">
@endpush

@push('scripts')
<link rel="preload" as="style" rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" onload="this.rel='stylesheet'" />
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
<script src="{{asset('frontend/js/xzoom.min.js')}}"></script>
<script src="{{asset('frontend/js/setup.js')}}"></script>
<script type="text/javascript">
$(document).ready(function() {
    $("#thumimg").owlCarousel({items:7, margin:5, lazyLoad:true, loop:false, dots:false, nav:true, navText:['<span class="icon fal fa-chevron-left"></span>', '<span class="fal fa-chevron-right"></span>'], autoplay:false, autoplayTimeout:3000, autoplayHoverPause:true, responsiveClass:true, responsive:{250:{items:3}, 320:{items:3}, 460:{items:4}, 550:{items:4}, 768:{items:5}, 992:{items:5}, 1200:{items:6}, 1600:{items:6}}});
    $(".CatCarousel").owlCarousel({items:6, margin:12, loop:true, dots:false, nav:true, navText:['<span class="icon fal fa-chevron-left"></span>', '<span class="fal fa-chevron-right"></span>'], autoplay:false, autoplayTimeout:4000, autoplayHoverPause:true, responsiveClass:true, responsive:{250:{items:1.4}, 320:{items:2.4, margin:5}, 460:{items:2.4, margin:6}, 600:{items:3.4, margin:9}, 768:{items:4.4, margin:10}, 992:{items:5.4, margin:20}, 1200:{items:6.4}}});
});
$('.xzoom-thumbs a').click(function () {
    if ($(this).find('img').hasClass('active')){
        $(this).find('img').removeClass('xactive');
    } else {
        $('.xzoom-thumbs a').find('img').removeClass('xactive');
        $(this).find('img').addClass('xactive');
    }
});
</script>
@endpush       