<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=1">
<link rel="icon" href="{{asset('frontend/img/favicon.ico')}}" type="image/x-icon">
<link rel="apple-touch-icon" href="{{asset('frontend/img/favicon.ico')}}">
<meta name="theme-color" content="#430206">

<link rel="preload" as="style" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" onload="this.rel='stylesheet'" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<link rel="preload" as="style" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" onload="this.rel='stylesheet'" integrity="sha512-1cK78a1o+ht2JcaW6g8OXYwqpev9+6GqOkz9xmBN9iUUhIndKtxwILGWYOSibOKjLsEdjyjZvYDq/cZwNeak0w==" crossorigin="anonymous" />
<link rel="stylesheet" type="text/css" media="screen,projection" href="{{asset('frontend/css/style.css')}}">
<link rel="stylesheet" type="text/css" media="screen,projection" href="{{asset('frontend/css/flag-icons.min.css')}}">
<link rel="preload" as="style" href="https://pro.fontawesome.com/releases/v5.15.4/css/all.css" onload="this.rel='stylesheet'" crossorigin="anonymous"/>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
@stack('css')
<style>
    .error{font-size: 13px;
    color: #f16262;}
    .success{color: #6ca844;}
</style>
<script>
    const CkeditorUpload = '{{route("ckeditor.image-upload")}}';
    const XCSRF_Token = "{{ csrf_token() }}";
</script>
</head>

<body>
<div class="main" id="butter">
    <div class="htop">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <ul class="navbar-nav justify-content-start">
                            <li class="nav-item dropdown">
                                <a title="Services" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">For Buyers</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">All</a></li>
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    <li><a class="dropdown-item" href="#">Separated link</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a title="Services" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">For Sellers</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">All</a></li>
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    <li><a class="dropdown-item" href="#">Separated link</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a title="Services" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">For Suppliers</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">All</a></li>
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    <li><a class="dropdown-item" href="#">Separated link</a></li>
                                </ul>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="#">Help & Community</a></li>
                        </ul>
                    </div>
                    <div class="col-md-2 text-center">
                        <!-- <p>Registered Users: 4335765</p> -->
                    </div>
                    <div class="col-md-5">
                        <ul class="navbar-nav justify-content-end">
                            <li class="nav-item"><a class="nav-link" href="#">Advertise with us</a></li>
                            <li class="nav-item"><a class="nav-link" href="#"><i class="fal fa-heart me-2 thm"></i> Favorites</a></li>
                            <li class="nav-item"><a class="nav-link" href="#"><i class="fal fa-user me-2 thm"></i> Join Free</a></li>
                            <!-- <li class="nav-item thmbg"><a class="nav-link" href="#"><i class="fal fa-sign-in-alt me-2 thm"></i> Sign in</a></li> -->
                            <li class="nav-item thmbg dropdown">
                                @guest
                                <a title="Services" class="nav-link" href="#" role="right button" data-bs-toggle="dropdown"><i class="fal fa-sign-in-alt me-2 thm"></i> Sign in</a>
                                @endguest
                                @auth 
                                <a title="{{Auth::user()->name}}" class="nav-link" href="#" role="right button" data-bs-toggle="dropdown">
                                    Hi` {{Auth::user()->name}}
                                </a>
                                @endauth
                                <ul class="dropdown-menu">
                                    @guest
                                    <li>
                                        <a href="{{route('login')}}" class="btn btn-main2">Sign in</a>
                                        <span>New to eBizzMart? <a href="{{route('register')}}">Join Now</a></span>
                                    </li>
                                    @endguest
                                    @auth
                                    <li><a class="dropdown-item" href="{{route('profile')}}"><i class="fal fa-user me-1"></i> My Profile</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fal fa-mail-bulk me-1"></i> Post Your Requirement </a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fal fa-cabinet-filing me-1"></i> Products/Services Directory</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fal fa-boxes me-1"></i> My Orders</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fal fa-box me-1"></i> Recent Activity</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fal fa-cog me-1"></i> Settings</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fal fa-mobile-android me-1"></i> Download App</a></li>
                                    @endauth
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <nav class="navbar navbar-expand-lg menu">
        <div class="st">
            <div class="container">
                <div>
                    <div class="col logom">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navigatin" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
                        <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('frontend/img/logo.svg')}}" alt="ebizzmart"></a>
                    </div>
                    <div class="col SearchBox">
                        <form class="input-group">
                            <input type="text" class="form-control" aria-label="Text input with dropdown button" placeholder="what are you looking for...">
                            <div class="SelectSearch">
                                <button class="btn SearchDrop dropdown-toggle border-top border-bottom" type="button" data-bs-toggle="dropdown" aria-expanded="false"><span id="search_concept">All</span></button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    <li><a class="dropdown-item" href="#">Separated link</a></li>
                                </ul>
                            </div>
                            <button type="submit" class="btn btn-search"><i class="fal fa-search me-1"></i> Search here</button>
                        </form>
                    </div>
                    <div class="col iconb d-flex align-items-center justify-content-end"><a href="#" class="btn">Post Your Requirement</a></div>
                </div>
            </div>
            <x-nav/>
        </div>
    </nav>
    @yield('content')
    <footer class="sectionb">
        <div class="FooterTop">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-4">
                        <div class="d-flex align-items-center">
                            <h3 class="h5 text-white m-0 me-3">Follow Us On</h3>
                            <ul class="icons">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-lg-8">
                        <div class="row align-items-center">
                            <div class="col-md-5">
                                <h3 class="h5 text-white m-0 me-3">Email Newsletter</h3>
                                <p class="m-0 text-white"><small>Subscribe to get all the Latest News, Update and Offers.</small></p>
                            </div>
                            <div class="col-md-7">
                                <form class="input-group">
                                    <input type="text" class="form-control" aria-label="Enter email address" placeholder="Enter email address">
                                    <button type="submit" class="btn thmbg text-white"><i class="fal fa-envelope m-0 h4"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="FooterMid">
            <div class="container">
                <div class="row menu mt-2">
                    <div class="col-12 col-lg-3 aboutsec">
                        <img src="{{asset('frontend/img/logo.svg')}}" class="w-75">
                        <p class="mt-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p><a href="" class="thm"><strong>read more</strong></a>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="row">
                            <div class="col-12 col-lg-4">
                                <h3 class="h6 title thm">About market</h3>
                                <ul class="links">
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Market Reviews</a></li>
                                    <li><a href="#">Terms of Use</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="#">Site Map</a></li>
                                </ul>
                            </div>
                            <div class="col-12 col-lg-4">
                                <h3 class="h6 title thm">Customer Service</h3>
                                <ul class="links">
                                    <li><a href="#">Shipping Policy</a></li>
                                    <li><a href="#">Compensation First</a></li>
                                    <li><a href="#">My Account</a></li>
                                    <li><a href="#">Return Policy</a></li>
                                    <li><a href="#">Contact Us </a></li>
                                </ul>
                            </div>
                            <div class="col-12 col-lg-4">
                                <h3 class="h6 title thm">Patment & Shipping</h3>
                                <ul class="links">
                                    <li><a href="#">Terms of Use</a></li>
                                    <li><a href="#">Patment Methods</a></li>
                                    <li><a href="#">Shipping Guide</a></li>
                                    <li><a href="#">Locations We Ship To</a></li>
                                    <li><a href="#">Estimated Delivery Time</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
                        <h3 class="h6 title thm">Contact Information</h3>
                        <ul class="ConInfo">
                            <li><i class="fal fa-phone-alt"></i> <a href="tel:+919898989898">(+91) 989 898 9898</a></li>
                            <li><i class="fal fa-envelope"></i> <a href="mailto:contact@ebizzmart.com">contact@ebizzmart.com</a></li>
                        </ul>
                        <h3 class="h6 title thm mt-3">Download the app</h3>
                        <p>Get 20% off your first order</p>
                        <div class="app-icon">
                            <a href="#"><img src="{{asset('frontend/img/img.png')}}"></a>
                            <a href="#"><img src="{{asset('frontend/img/img1.png')}}"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="fbottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-6 text-start">
                        <p>Copyright &copy; <strong>ebizzmart Store</strong>. All Rights Reserved. Made with &nbsp;<i class="fa fa-heart"></i>&nbsp; by <strong><a href="https://www.samwebstudio.com/" target="_blank" rel="noopener">SAM Web Studio</a></strong></p>
                    </div>
                    <!-- <div class="col-12 col-lg-4 text-center">
                        
                    </div> -->
                    <div class="col-12 col-lg-6 text-end">
                        <img src="{{asset('frontend/img/payment-cards.png')}}">
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>


<div id="scroll-top"><i class="far fa-chevron-up"></i></div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script async src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script async src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.0/lazysizes.min.js" integrity="sha512-JrL1wXR0TeToerkl6TPDUa9132S3PB1UeNpZRHmCe6TxS43PFJUcEYUhjJb/i63rSd+uRvpzlcGOtvC/rDQcDg==" crossorigin="anonymous"></script>
<script src="{{asset('frontend/js/custom.js')}}"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
@stack('scripts')

@if(Session::has('success_msg'))
    <script>
        toastr.options.positionClass = 'toast-bottom-right';
        toastr.success("{{ session('success_msg') }}");        
    </script>
@endif

@if(Session::has('error_msg'))
<script>
    toastr.options.positionClass = 'toast-bottom-right';
    toastr.error("{{ session('error_msg') }}");
</script>
@endif 