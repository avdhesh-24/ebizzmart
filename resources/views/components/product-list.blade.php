<div class="contentp">
    <section class="grey listing pt-1">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php"><i class="fal fa-home-alt"></i></a></li>
                        @foreach($breadcrem as $key=>$bread)
                            @if($key==Request::segment(2))
                            <li class="breadcrumb-item"><a aria-current="page">{{$bread}}</a></li>
                            @else
                            <li class="breadcrumb-item"><a href="{{url('category/'.$key)}}">{{$bread}}</a></li>
                            @endif
                        @endforeach
                    </ol>
                </div>
            </div>
            <div class="row mb-2 listing-text">
                <div class="col-12 text-center">
                    <h1 class="Heading h3">{{$list->name}}</h1>
                </div>
            </div>
            <div class="row ListingPage">
                <div class="col-md-4 col-lg-3">
                    <div>
                        <div class="card">
                            <div class="card-header">Select Category:</div>
                            <div class="card-body">
                                <ul>
                                    @foreach($categories as $category)
                                    <li><a href="{{route('category',['alias'=>$category->alias])}}">{{$category->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">Filter by:</div>
                            <div class="card-body p-0">
                                <div class="accordion ProductDetail" id="ProductDetail">
                                    <div class="accordion-item">
                                        <div class="accordion-header" id="headingBrands">
                                            <a class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#Brands" aria-expanded="true" aria-controls="Brands">Brands:</a>
                                        </div>
                                        <div id="Brands" class="accordion-collapse collapse show" aria-labelledby="headingBrands">
                                            <div class="accordion-body">
                                                <ul>
                                                    <li><div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="1">
                                                        <label class="form-check-label" for="1">Holland & Barrett <span>(7)</span></label>
                                                    </div></li>
                                                    <li><div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="2">
                                                        <label class="form-check-label" for="2">Meridian <span>(23)</span></label>
                                                    </div></li>
                                                    <li><div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="3">
                                                        <label class="form-check-label" for="3">Manuka Doctor <span>(22)</span></label>
                                                    </div></li>
                                                    <li><div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="4">
                                                        <label class="form-check-label" for="4">Thursday Cottage <span>(20)</span></label>
                                                    </div></li>
                                                    <li><div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="5">
                                                        <label class="form-check-label" for="5">Manuka Pharm <span>(19)</span></label>
                                                    </div></li>
                                                    <li><div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="6">
                                                        <label class="form-check-label" for="6">Manuka Lab <span>(18)</span></label>
                                                    </div></li>
                                                    <li><div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="7">
                                                        <label class="form-check-label" for="7">Biona <span>(11)</span></label>
                                                    </div></li>
                                                    <li><div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="8">
                                                        <label class="form-check-label" for="8">Pip & Nut <span>(11)</span></label>
                                                    </div></li>
                                                    <li><div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="9">
                                                        <label class="form-check-label" for="9">Egmont Honey <span>(9)</span></label>
                                                    </div></li>
                                                    <li><div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="10">
                                                        <label class="form-check-label" for="10">Orelia <span>(7)</span></label>
                                                    </div></li>
                                                    <li><div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="11">
                                                        <label class="form-check-label" for="11">Hilltop Honey <span>(6)</span></label>
                                                    </div></li>
                                                    <li><div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="12">
                                                        <label class="form-check-label" for="12">Granovita <span>(5)</span></label>
                                                    </div></li>
                                                    <li><div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="13">
                                                        <label class="form-check-label" for="13">Rowse <span>(5)</span></label>
                                                    </div></li>
                                                    <li><div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="14">
                                                        <label class="form-check-label" for="14">PPB <span>(4)</span></label>
                                                    </div></li>
                                                    <li><div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="15">
                                                        <label class="form-check-label" for="15">The Groovy Food Company <span>(4)</span></label>
                                                    </div></li>
                                                    <li><div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="16">
                                                        <label class="form-check-label" for="16">The Skinny Food Co <span>(4)</span></label>
                                                    </div></li>
                                                    <li><div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="17">
                                                        <label class="form-check-label" for="17">Yumello <span>(4)</span></label>
                                                    </div></li>
                                                    <li><div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="17">
                                                        <label class="form-check-label" for="17">Alemany <span>(3)</span></label>
                                                    </div></li>
                                                    <li><div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="18">
                                                        <label class="form-check-label" for="18">Grenade <span>(3)</span></label>
                                                    </div></li>
                                                    <li><div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="19">
                                                        <label class="form-check-label" for="19">London Honey Co <span>(3)</span></label>
                                                    </div></li>
                                                    <li><div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="20">
                                                        <label class="form-check-label" for="20">Manilife <span>(3)</span></label>
                                                    </div></li>
                                                    <li><div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="21">
                                                        <label class="form-check-label" for="21">Potters <span>(3)</span></label>
                                                    </div></li>
                                                    <li><div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="22">
                                                        <label class="form-check-label" for="22">Pure Gold <span>(3)</span></label>
                                                    </div></li>
                                                    <li><div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="23">
                                                        <label class="form-check-label" for="23">Raw Health <span>(3)</span></label>
                                                    </div></li>
                                                    <li><div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="24">
                                                        <label class="form-check-label" for="24">Sead <span>(3)</span></label>
                                                    </div></li>
                                                    <li><div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="25">
                                                        <label class="form-check-label" for="25">Wainwright's <span>(3)</span></label>
                                                    </div></li>
                                                    <li><div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="26">
                                                        <label class="form-check-label" for="26">Ginger Party <span>(2)</span></label>
                                                    </div></li>
                                                    <li><div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="27">
                                                        <label class="form-check-label" for="27">Naturya <span>(2)</span></label>
                                                    </div></li>
                                                    <li><div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="28">
                                                        <label class="form-check-label" for="28">Plamil <span>(2)</span></label>
                                                    </div></li>
                                                    <li><div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="29">
                                                        <label class="form-check-label" for="29">Sunita <span>(2)</span></label>
                                                    </div></li>
                                                    <li><div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="30">
                                                        <label class="form-check-label" for="30">Choc Chick <span>(1)</span></label>
                                                    </div></li>
                                                    <li><div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="31">
                                                        <label class="form-check-label" for="31">Equal Exchange <span>(1)</span></label>
                                                    </div></li>
                                                    <li><div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="32">
                                                        <label class="form-check-label" for="32">Golden Greens <span>(1)</span></label>
                                                    </div></li>
                                                    <li><div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="33">
                                                        <label class="form-check-label" for="33">jim jams <span>(1)</span></label>
                                                    </div></li>
                                                    <li><div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="34">
                                                        <label class="form-check-label" for="34">Picklecoombe House <span>(1)</span></label>
                                                    </div></li>
                                                    <li><div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="35">
                                                        <label class="form-check-label" for="35">The Raw Chocolate Company <span>(1)</span></label>
                                                    </div></li>
                                                    <li><div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="36">
                                                        <label class="form-check-label" for="36">Tiana <span>(1)</span></label>
                                                    </div></li>
                                                    <li><div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="37">
                                                        <label class="form-check-label" for="37">Vego Good Food <span>(1)</span></label>
                                                    </div></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <div class="accordion-header" id="headingPrice">
                                            <a class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#Price" aria-expanded="false" aria-controls="Price">Price</a>
                                        </div>
                                        <div id="Price" class="accordion-collapse collapse" aria-labelledby="headingPrice">
                                            <div class="accordion-body">
                                                <ul>
                                                    <li><div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="p1">
                                                        <label class="form-check-label" for="p1"><span>Less than <i class="rupee">&#8377;</i>5</span> <span>(100)</span></label>
                                                    </div></li>
                                                    <li><div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="p2">
                                                        <label class="form-check-label" for="p2"><span><i class="rupee">&#8377;</i>5 to <i class="rupee">&#8377;</i>10</span> <span>(44)</span></label>
                                                    </div></li>
                                                    <li><div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="p3">
                                                        <label class="form-check-label" for="p3"><span><i class="rupee">&#8377;</i>10 to <i class="rupee">&#8377;</i>15</span> <span>(4)</span></label>
                                                    </div></li>
                                                    <li><div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="p4">
                                                        <label class="form-check-label" for="p4"><span><i class="rupee">&#8377;</i>15 to <i class="rupee">&#8377;</i>20</span> <span>(3)</span></label>
                                                    </div></li>
                                                    <li><div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="p5">
                                                        <label class="form-check-label" for="p5"><span><i class="rupee">&#8377;</i>20 to <i class="rupee">&#8377;</i>30</span> <span>(9)</span></label>
                                                    </div></li>
                                                    <li><div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="p6">
                                                        <label class="form-check-label" for="p6"><span><i class="rupee">&#8377;</i>30 to <i class="rupee">&#8377;</i>40</span> <span>(12)</span></label>
                                                    </div></li>
                                                    <li><div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="p7">
                                                        <label class="form-check-label" for="p7"><span><i class="rupee">&#8377;</i>40 to <i class="rupee">&#8377;</i>50</span> <span>(10)</span></label>
                                                    </div></li>
                                                    <li><div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="p8">
                                                        <label class="form-check-label" for="p8"><span>Over <i class="rupee">&#8377;</i>50</span> <span>(40)</span></label>
                                                    </div></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <div class="accordion-header" id="headingStar">
                                            <a class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#Star" aria-expanded="false" aria-controls="Star">Rating</a>
                                        </div>
                                        <div id="Star" class="accordion-collapse collapse" aria-labelledby="headingStar">
                                            <div class="accordion-body">
                                                <ul>
                                                    <li><div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="s1">
                                                        <label class="form-check-label" for="s1"><span class="star" title="star" data-title="5"></span> <span>(2)</span></label>
                                                    </div></li>
                                                    <li><div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="s2">
                                                        <label class="form-check-label" for="s2"><span class="star" title="star" data-title="4"></span> <span>(5)</span></label>
                                                    </div></li>
                                                    <li><div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="s2">
                                                        <label class="form-check-label" for="s2"><span class="star" title="star" data-title="3"></span> <span>(5)</span></label>
                                                    </div></li>
                                                    <li><div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="s2">
                                                        <label class="form-check-label" for="s2"><span class="star" title="star" data-title="2"></span> <span>(5)</span></label>
                                                    </div></li>
                                                    <li><div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="s2">
                                                        <label class="form-check-label" for="s2"><span class="star" title="star" data-title="1"></span> <span>(5)</span></label>
                                                    </div></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <div class="accordion-header" id="headingAvailability-g">
                                            <a class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#Availability-g" aria-expanded="false" aria-controls="Availability-g">Availability</a>
                                        </div>
                                        <div id="Availability-g" class="accordion-collapse collapse" aria-labelledby="headingAvailability-g">
                                            <div class="accordion-body">
                                                <ul>
                                                    <li><div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="g1">
                                                        <label class="form-check-label" for="g1">Hide Out Of Stock</label>
                                                    </div></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-lg-9">
                    <div class="SortBy grey">
                        <div class="d-flex justify-content-between">
                            <div>
                                <div class="input-group">
                                  <input type="text" class="form-control" list="Location" placeholder="Search Location" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                  <datalist id="Location">
                                    <option value="Delhi">
                                    <option value="Mumbai">
                                    <option value="Chennai">
                                    <option value="Kolkata">
                                    <option value="Lucknow">
                                  </datalist>
                                  <span class="input-group-text thmbg text-white" id="basic-addon2"><i class="fal fa-search"></i></span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <label>Sort By</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Popularity</option>
                                        <option value="1">New In</option>
                                        <option value="2">Title A-Z</option>
                                        <option value="3">Title Z-A</option>
                                        <option value="3">Price High-Low</option>
                                        <option value="3">Price Low-High</option>
                                        <option value="3">Ratings High-Low</option>
                                    </select>
                                </div>
                            </div>
                            <div>
                                <span class="text-secondary">2438 Products Available</span>
                                <ul class="nav nav-pills ms-3" id="pills-tab" role="tablist">
                                  <li class="nav-item" role="presentation">
                                    <button class="nav-link" onclick="setCookie('listsection','grid',1)" id="grid-tab" data-bs-toggle="pill" data-bs-target="#grid" type="button" role="tab" aria-controls="grid" aria-selected="true"><i class="fas fa-th-large"></i></button>
                                  </li>
                                  <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="small-tab" onclick="setCookie('listsection','small',1)" data-bs-toggle="pill" data-bs-target="#smalllist" type="button" role="tab" aria-controls="small" aria-selected="true"><i class="fas fa-th"></i></button>
                                  </li>
                                  <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="list-tab" onclick="setCookie('listsection','list',1)" data-bs-toggle="pill" data-bs-target="#list" type="button" role="tab" aria-controls="list" aria-selected="false"><i class="fas fa-bars"></i></button>
                                  </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content Listings mt-3">
                        <div class="row GridListing tab-pane fade" id="grid" role="tabpanel" aria-labelledby="grid-tab">
                            <x-one-product-list :data="$products"/>
                        </div>
                        <div class="row SmallListing tab-pane fade" id="smalllist" role="tabpanel" aria-labelledby="small-tab">
                        @foreach($products as $list)
                        @php 
                            $Off=0;
                            $startdate = $list->created_at; 
                            $enddate = date('Y-m-d h:i:s'); 
                            $diff = Helper::dateDifference($startdate, $enddate);
                            if(!empty($list->defaultprice->selling_price) && !empty($list->defaultprice->mrp)):
                                $Off = round(100 - ($list->defaultprice->selling_price/$list->defaultprice->mrp)*100);
                            endif;
                        @endphp 
                        <div class="col-sm-6 col-md-3 col-lg-2">
                            <div class="card ProBlock {{$diff<=7?'New':''}} {{$Off>0 ? 'Off' : ''}}">
                                <span class="OffTag"><span>{{$Off}}% off</span></span>
                                <div class="NewTag"><span>New</span></div>
                                <div class="card-head">
                                    <a href="{{route('product',['alias'=>$list->alias])}}">
                                        <img src="{{asset('uploads/product/'.$list->thumb_image)}}">
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h3 class="name mb-0"><a href="{{route('product',['alias'=>$list->alias])}}">{{$list->title}}</a></h3>
                                    <p class="m-0"><small class="text-black-50">Manufacturers, Suppliers</small></p>
                                    <span class="star" title="star" data-title="5"></span>
                                    @if(empty($list->defaultprice->selling_price) && empty($list->defaultprice->mrp))
                                    <span class="askprice">ASK FOR PRICE</span>
                                    @endif
                                    @if(!empty($list->defaultprice->selling_price) && !empty($list->defaultprice->mrp))
                                    <span class="price">
                                        <i class="rupee">&#8377;</i>{{$list->defaultprice->selling_price}} 
                                        <span class="cutprice"><i class="rupee">&#8377;</i>{{$list->defaultprice->mrp}}</span>
                                    </span>
                                    @endif
                                    @if(!empty($list->defaultprice->mrp) && empty($list->defaultprice->selling_price))
                                    <span class="price">
                                        <i class="rupee">&#8377;</i>{{$list->defaultprice->mrp}} 
                                    </span>
                                    @endif
                                    @if(empty($list->defaultprice->mrp) && !empty($list->defaultprice->selling_price))
                                    <span class="price">
                                        <i class="rupee">&#8377;</i>{{$list->defaultprice->selling_price}} 
                                    </span>
                                    @endif
                                    <p class="m-0"><small>{{$list->minimum_order}} Pieces (Min Order)</small></p>
                                    <span class="supl">
                                        <a href="#ViewMobile" data-bs-toggle="modal" class="btn btn-main"><i class="fal fa-phone-alt me-2"></i> View Mobile</a>
                                        <a href="#SendInquiry" data-bs-toggle="modal" class="btn btn-main1"><i class="fal fa-envelope me-2"></i> Send Inquiry</a></span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        </div>
                        <div class="row ListListing tab-pane fade" id="list" role="tabpanel" aria-labelledby="list-tab">
                            <x-four-product-list :data="$products"/>
                        </div>
                        <div style="">{{ $products->appends(request()->all())->render('pagination') }}</div>
                    </div>
                </div>
            </div>
            <div>
            {!! $list->description !!}
            </div>
        </div>
    </section>
</div>