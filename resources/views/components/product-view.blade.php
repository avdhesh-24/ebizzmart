<div class="contentp">
    <section class="Detail grey pb-0 pt-1">
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
                        <li class="breadcrumb-item"><a aria-current="page">{{$list->title}}</a></li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card ProDBox">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-4"> 
                                    <div class="ZoomBox">
                                        <a href="{{asset('uploads/product/banner/'.$list->image)}}" data-fancybox="gallery"><img class="xzoom" src="{{asset('uploads/product/'.$list->thumb_image)}}" xoriginal="{{asset('uploads/product/banner/'.$list->image)}}"></a>
                                        <div id="thumimg" class="owl-carousel mt-3 xzoom-thumbs">
                                            <div class="item"><a href="{{asset('uploads/product/banner/'.$list->image)}}"><img class="xzoom-gallery" src="{{asset('uploads/product/banner/'.$list->image)}}" xpreview="{{asset('uploads/product/banner/'.$list->image)}}" /></a></div>
                                            @foreach($list->images as $images)
                                            <div class="item">
                                                <a href="{{asset('uploads/product/'.$images->image)}}">
                                                    <img class="xzoom-gallery" src="{{asset('uploads/product/'.$images->image)}}">
                                                </a>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-5">
                                    <h1 class="h5 mb-1">{{$list->title}}</h1>
                                    <p class="m-0 text-secondary hmenu"><small><strong>Category</strong> <span>{{$list->category->name}}</span> &nbsp; | &nbsp; <a href="#Ratings"><span class="star" title="star" data-title="3"></span> &nbsp; 4 Rating & 14 Reviews</a></small></p>
                                    <p class="mt-2"></p>
                                    <div class="pricebox">
                                        @if(empty($list->defaultprice->selling_price) && empty($list->defaultprice->mrp))
                                        <span class="askprice">ASK FOR PRICE</span>
                                        @endif
                                        @if(!empty($list->defaultprice->selling_price) && !empty($list->defaultprice->mrp))
                                        <span class="price thm1"><i class="rupee">&#8377;</i>{{$list->defaultprice->selling_price}} <span class="cutprice"><i class="rupee">&#8377;</i>{{$list->defaultprice->mrp}}</span></span>
                                        @endif
                                        @if(empty($list->defaultprice->selling_price) && !empty($list->defaultprice->mrp))
                                        <span class="price thm1"><i class="rupee">&#8377;</i>{{$list->defaultprice->mrp}}</span>
                                        @endif
                                        @if(!empty($list->defaultprice->selling_price) && empty($list->defaultprice->mrp))
                                        <span class="price thm1"><i class="rupee">&#8377;</i>{{$list->defaultprice->selling_price}}</span>
                                        @endif
                                        <!-- <span class="off">57% off</span> -->
                                        @if(!empty($list->defaultprice->selling_price) && !empty($list->defaultprice->mrp))
                                        <div class="dropdown ms-3">
                                            <a class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fal fa-info-circle"></i></a>
                                            <div class="dropdown-menu">
                                                <div>
                                                    <strong class="text-secondary">Maximum Retail Price</strong>
                                                    <span class="ms-3"><i class="rupee">&#8377;</i>{{$list->defaultprice->mrp}}</span>
                                                </div>
                                                <div>
                                                    <strong class="text-secondary">Selling Price</strong>
                                                    <span class="ms-3"><i class="rupee">&#8377;</i>{{$list->defaultprice->selling_price}}</span>
                                                </div>
                                                <div class="border-top"><strong class="mcolor">Overall you save <i class="rupee">&#8377;</i>{{$list->defaultprice->mrp - $list->defaultprice->selling_price}} ({{round(100 - ($list->defaultprice->selling_price/$list->defaultprice->mrp)*100)}}%) on this product</strong></div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                    <p><strong class="text-secondary">MOQ </strong> <span class="text-success">{{$list->minimum_order}} Piece(s)</span></p>
                                    
                                    <div class="Highlights mt-3">
                                        @if(count($list->attribute) > 0)
                                        <strong class="text-secondary d-block mb-1">Highlights</strong>
                                        <ul class="mb-2">
                                            @foreach($list->attribute as $attribute)
                                            <li><span>{{$attribute->attribute->title}}</span> {{$attribute->description}}</li>
                                            @endforeach
                                        </ul>
                                        @endif
                                        <p><small>{!! $list->short_description !!}</small></p>
                                        <p class="hmenu"><a href="#Specifications" class="thm"><small><u>View More Details</u></small></a></p>
                                    </div>
                                    
                                    <div class="BuyBtnBox mt-4">
                                        <div>
                                            <h3 class="h5 mb-0"><strong>Interested in this product?</strong></h3>
                                            <p class="mb-0">Ask for more details & Latest Price</p>
                                        </div>
                                        <a href="#SendInquiry" data-bs-toggle="modal" class="btn btn-main mt-0" title="Send Inquiry"><i class="fal fa-envelope me-2"></i>Send Inquiry</a>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-3">
                                    <div class="card ComanyBox">
                                        <div class="card-header">
                                            <div><img src="img/sam-logo.webp"></div>
                                            <div>
                                                <h3>Sam Web Studio Pvt Ltd.</h3>
                                                <p class="text-secondary mb-0"><i class="fad fa-map-marker-alt text-white me-1"></i> Badkhal, Faridabad</p>
                                            </div>
                                        </div>
                                        <div class="card-body text-center">
                                            <p><span class="text-secondary">Business Type :</span> Manufacturer</p>
                                            <a href="#ViewMobile" data-bs-toggle="modal" class="btn btn-main1 mt-2"><i class="fal fa-phone-volume me-1"></i> View Mobile</a>
                                        </div>
                                        <div class="card-footer text-center">
                                            <p class="text-secondary">Ask for more detail from the seller</p>
                                            <a href="#SendInquiry" data-bs-toggle="modal" class="h5 thm1">Contact Supplier <i class="fal fa-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="grey pt-4">
        <div class="container">
            <div class="row ListingPage">
                <div class="col-12">
                    <h3 class="h4 thm1 text-center"><strong>Similar Products</strong></h3>
                    <div class="owl-carousel CatCarousel text-center">
                        @foreach($products as $product)
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
                                    @if(empty($product->defaultprice->selling_price) && empty($product->defaultprice->mrp))
                                    <span class="askprice">ASK FOR PRICE</span>
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
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="Detail grey grey pb-0 pt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-lg-8">
                    <div class="accordion ProductDetail" id="ProductDetail">
                        @if(!empty($list->description))
                        <div class="accordion-item">
                            <div class="accordion-header" id="headingSpecifications">
                                <a class="accordion-button" data-bs-toggle="collapse" data-bs-target="#Specifications" aria-expanded="true" aria-controls="Specifications">Product Specifications</a>
                            </div>
                            <div id="Specifications" class="accordion-collapse collapse show" aria-labelledby="headingSpecifications">
                                <div class="accordion-body">
                                    {!! $list->description !!}
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="accordion-item">
                            <div class="accordion-header" id="headingCompany">
                                <a class="accordion-button" data-bs-toggle="collapse" data-bs-target="#Company" aria-expanded="true" aria-controls="Company">Company Information</a>
                            </div>
                            <div id="Company" class="accordion-collapse collapse show" aria-labelledby="headingCompany">
                                <div class="accordion-body">
                                    <h3>General</h3>
                                    <ul>
                                        <li><span>Business Type</span> Exporters / Suppliers</li>
                                        <li><span>Total Number of Employees</span> 50 - 100</li>
                                        <li><span>Member Since</span> 2012</li>
                                        <li><span>Year of Establishment</span> 2013</li>
                                    </ul><br>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                    <div class="BuyBtnBox mt-4">
                                        <div>
                                            <h2 class="h5 mb-0"><strong>Interested in this product?</strong></h2>
                                            <p class="mb-0">Ask for more details &amp; Latest Price</p>
                                        </div>
                                        <a href="#SendInquiry" data-bs-toggle="modal" class="btn btn-main mt-0" title="Send Inquiry"><i class="fal fa-envelope me-2"></i>Send Inquiry</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <div class="accordion-header" id="headingRatings">
                                <a class="accordion-button" data-bs-toggle="collapse" data-bs-target="#Ratings" aria-expanded="true" aria-controls="Ratings">Ratings & Reviews</a>
                            </div>
                            <div id="Ratings" class="accordion-collapse collapse show" aria-labelledby="headingRatings">
                                <div class="accordion-body">
                                    <h3>Be the first to review "Product Name"</h3>
                                    <p>Your email address will not be published. Required fields are marked *</p>
                                    <form action="" method="post" class=" ReviewForm mt-2 mb-1">
                                        <p><strong class="mcolor1">Your Rating</strong></p>
                                        <div class="rating mt-1">
                                            <input type="radio" name="rating" id="rating-5"><label for="rating-5"></label>
                                            <input type="radio" name="rating" id="rating-4"><label for="rating-4"></label>
                                            <input type="radio" name="rating" id="rating-3"><label for="rating-3"></label>
                                            <input type="radio" name="rating" id="rating-2"><label for="rating-2"></label>
                                            <input type="radio" name="rating" id="rating-1"><label for="rating-1"></label>
                                            <div class="emoji-wrapper">
                                                <div class="emoji"><img src="img/rating.svg" class="rating-0"> <img src="img/rating1.svg"> <img src="img/rating2.svg"> <img src="img/rating3.svg"> <img src="img/rating4.svg"> <img src="img/rating5.svg"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-9 col-lg-7">
                                                <div class="form-floating mt-3">
                                                    <input type="text" name="name" id="name" placeholder="Name" class="form-control">
                                                    <label for="name">Name <span class="text-danger">*</span></label>
                                                </div>
                                                <div class="form-floating mt-3">
                                                    <input type="text" name="email" id="email" placeholder="Email" class="form-control">
                                                    <label for="email">Email <span class="text-danger">*</span></label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-10">
                                                <div class="form-floating mt-3">
                                                    <textarea name="message" class="form-control" placeholder="Message" maxlength="300" data-length="300" id="message"></textarea>
                                                    <label for="message">Message <span class="text-danger">*</span></label>
                                                </div>
                                            </div>
                                            <div class="col-12"><button type="submit" class="btn btn-main">Submit</button></div>
                                        </div>
                                    </form>
                                    <div class="card ReviewBlock">
                                        <div class="card-body">
                                            <h4 class="mcolor">Balloon Features</h4>
                                            <p class="mt0">very happy with the product, however it's very delicate.. if you could include usage instructions it would make it perfect.</p>
                                            <div class="d-flex justify-content-between">
                                                <span class="star" title="star" data-title="4"></span>
                                                <span class="text-secondary">Monday, Jul 26, 2019</span>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <h4 class="mcolor">Balloon Features</h4>
                                            <p class="mt0">very happy with the product, however it's very delicate.. if you could include usage instructions it would make it perfect.</p>
                                            <div class="d-flex justify-content-between">
                                                <span class="star" title="star" data-title="4"></span>
                                                <span class="text-secondary">Monday, Jul 26, 2019</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-lg-4">
                    <div class="RightBar">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="h5">Looking for <strong>Dusky Gothic Long Skirt?</strong></h3>
                            </div>
                            <div class="card-body">
                                <div class="mb-2">
                                    <label for="lemail" class="form-label m-0"><small>Quantity</small></label>
                                    <div class="input-group">
                                      <input type="number" class="form-control" maxlength="3" oninput="maxLengthCheck(this)" name="quantity" placeholder="Enter quantity">
                                      <select class="form-control form-select">
                                          <option>-- Select Unit --</option>
                                          <option value="1">1</option>
                                          <option value="2">2</option>
                                          <option value="3">3</option>
                                      </select>
                                    </div>
                                </div>
                                <div class="text-center"><a href="#ViewMobile" data-bs-toggle="modal" class="btn btn-main"><i class="fal fa-phone-volume me-1"></i> View Mobile</a></div>
                            </div>
                        </div>
                        <h4 class="h6 mt-4 thm1">Seller Contact Details</h4>
                        <div class="card">
                            <div class="card-body">
                                <ul class="ConInfo">
                                    <li><i class="fal fa-user"></i> <span>Satish Sharma</span></li>
                                    <li><i class="fal fa-map-marker-alt"></i> <span>2161/T-6 , Office No: 3B, 1st Floor, Guru Arjun Nagar, Patel Nagar Main Road, New Delhi-110008, IN</span></li>
                                </ul>
                                <div class="d-flex"><a href="#ViewMobile" data-bs-toggle="modal" class="btn btn-main1 w-100 me-2"><i class="fal fa-phone-volume me-1"></i> View Mobile</a><a href="#SendInquiry" data-bs-toggle="modal" class="btn btn-main w-100 ms-2" title="Send Inquiry"><i class="fal fa-envelope me-2"></i>Send Inquiry</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class=" grey pt-4">
        <div class="container">
            <div class="row mt-3 ListingPage">
                <div class="col-12">
                    <h3 class="h4 thm1 text-center"><strong>Browse Related Categories</strong></h3>
                    <ul class="CompaniesList">
                        @foreach($childs as $child)
                        <li>
                            <a href="{{route('category',['alias'=>$child->alias])}}">
                                <img src="{{asset('uploads/category/icon/'.$child->icon)}}" width="64" height="64" alt="{{$child->name}}">
                                <span>{{$child->name}}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
</div>