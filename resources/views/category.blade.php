@extends('layouts.app')
@section('content')
    @if($childs > 0)
        <x-category-list :data="$data"/>
    @else
        <x-product-list :list="$data"/>
    @endif
    <x-product-model/>
@endsection

@push('css')
<title>{{$data->meta_title}}</title>
<meta name="description" content="{{$data->meta_description}}">
<meta name="keywords" content="{{$data->meta_keywords}}">
<link rel="preload" as="style" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" onload="this.rel='stylesheet'" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
<link rel="preload" as="style" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" onload="this.rel='stylesheet'" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />
<link rel="stylesheet" type="text/css" media="screen,projection" href="{{asset('frontend/css/pro-cat.css')}}">
@endpush

@push('scripts')
<script src="{{asset('frontend/js/jquery.jscroll.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/owl.carousel2.thumbs@0.1.8/dist/owl.carousel2.thumbs.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    checkCookie();
    $(".CatCarousel").owlCarousel({items:5, margin:12, loop:true, dots:false, nav:true, navText:['<span class="icon fal fa-chevron-left"></span>', '<span class="fal fa-chevron-right"></span>'], autoplay:false, autoplayTimeout:4000, autoplayHoverPause:true, responsiveClass:true, responsive:{250:{items:1.2}, 320:{items:2.2, margin:5}, 460:{items:2.2, margin:6}, 600:{items:3.2, margin:9}, 768:{items:4.5, margin:10}, 992:{items:4.5, margin:20}, 1200:{items:5.5}}});
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
function setCookie(cname,cvalue,exdays) {
  const d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  let expires = "expires=" + d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
function checkCookie() {
  let user = getCookie("listsection");
  if (user != "") {
    if(user=='grid'){ $('#grid-tab').addClass('active'); $('#grid').addClass('show active'); }
    if(user=='small'){ $('#small-tab').addClass('active'); $('#smalllist').addClass('show active');}
    if(user=='list'){ $('#list-tab').addClass('active'); $('#list').addClass('show active');}
  } else {
    user = setCookie('listsection','grid',1)
     if (user != "" && user != null) {
       setCookie("listsection", user, 30);
     }
  }
}
function getCookie(cname) {
  let name = cname + "=";
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(';');
  for(let i = 0; i < ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}
</script>
@endpush       