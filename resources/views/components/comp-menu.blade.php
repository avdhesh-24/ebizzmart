<section class="Detail grey p-0 CompanyTop">
        <div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card ComDBox">
                            <menu class="card-header">
                                <div class="d-flex align-items-center">
                                    <div class="CompanyLogo me-2">
                                        @if(!empty($company->logo) && file_exists(public_path('uploads/company/'.$company->logo)))
                                        <img src="{{asset('uploads/company/'.$company->logo)}}">
                                        @else
                                        <img src="{{asset('frontend/image/sm-dimg.webp')}}">
                                        @endif
                                    </div>
                                    <div class="CompanyName">
                                        <h1 class="h5">{{$company->company_name}}</h1>
                                        <div class="CompanyAddress">
                                            @if(!empty($company->countries) || !empty($company->cities))
                                            <p class="mb-0">
                                                <i class="fad fa-map-marker-alt thm text-white me-1"></i>
                                                 {{$company->countries->name}} {{!empty($company->cities->name) ? ','.$company->cities->name : ''}}
                                            </p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <nav class="navbar navbar-expand-lg">
                                    <ul class="navbar-nav" id="myTab" role="tablist">
                                        <li class="nav-item"><a class="nav-link " href="{{url(Request::segment(1).'/'.Request::segment(2))}}">Home</a></li>
                                        <li class="nav-item dropdown">
                                            <a title="Services" class="nav-link dropdown-toggle " href="{{url(Request::segment(1).'/'.Request::segment(2))}}/products" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Product</a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="{{url(Request::segment(1).'/'.Request::segment(2))}}/products">Category 1</a></li>
                                            </ul>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a title="Services" class="nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Profile</a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="{{url(Request::segment(1).'/'.Request::segment(2))}}/about#1">Company Overview</a></li>
                                                <li><a class="dropdown-item" href="{{url(Request::segment(1).'/'.Request::segment(2))}}/about#2">Production Capacity</a></li>
                                                <li><a class="dropdown-item" href="{{url(Request::segment(1).'/'.Request::segment(2))}}/about#3">Trade Capacity</a></li>
                                                <li><a class="dropdown-item" href="{{url(Request::segment(1).'/'.Request::segment(2))}}/about#4">Trade Ability</a></li>
                                                <li><a class="dropdown-item" href="{{url(Request::segment(1).'/'.Request::segment(2))}}/about#5">Business Terms</a></li>
                                            </ul>
                                        </li>
                                        <li class="nav-item"><a class="nav-link" href="{{url(Request::segment(1).'/'.Request::segment(2))}}/contact">Contact Us</a></li>
                                    </ul>
                                </nav>
                                <div>
                                    <a href="#SendInquiry" data-bs-toggle="modal" class="btn btn-main mt-0 me-3" title="Send Inquiry"><i class="fal fa-envelope me-2"></i>Send Inquiry</a>
                                    <div class="input-group"><input type="text" class="form-control" placeholder="Search Product / Services" aria-label="Recipient's username" aria-describedby="basic-addon2"><span class="input-group-text" id="basic-addon2"><i class="fal fa-search"></i></span></div>
                                </div>
                            </menu>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>