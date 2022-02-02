<?php include "inc/head.php";?>
<title>Company Detail : ebizzmart</title>
<link rel="preload" as="style" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" onload="this.rel='stylesheet'" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
<link rel="preload" as="style" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" onload="this.rel='stylesheet'" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />
<link rel="stylesheet" href="css/companies.css">
<?php include "inc/header.php";?>
<div class="contentp">
    <section class="Detail grey pt-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php"><i class="fal fa-home-alt"></i></a></li>
                        <li class="breadcrumb-item"><a href="companies.php">Companies</a></li>
                        <li class="breadcrumb-item"><a aria-current="page">Company Detail</a></li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card ComDBox">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <div class="CompanyLogo me-2"><img src="img/sam-logo.webp"></div>
                                <div class="CompanyName">
                                    <h1 class="h5">Sam Web Studio Pvt Ltd.</h1>
                                    <div class="CompanyAddress text-end"><p class="mb-0"><i class="fad fa-map-marker-alt thm text-white me-1"></i> Badkhal, Faridabad</p></div>
                                </div>
                            </div>
                            <menu class="d-flex">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation"><a class="nav-link active" href="#home" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Home</a></li>
                                    <li class="nav-item" role="presentation"><a class="nav-link" href="#product" id="product-tab" data-bs-toggle="tab" data-bs-target="#product" type="button" role="tab" aria-controls="product" aria-selected="false">Our Product</a></li>
                                    <li class="nav-item" role="presentation"><a class="nav-link" href="#about" id="about-tab" data-bs-toggle="tab" data-bs-target="#about" type="button" role="tab" aria-controls="about" aria-selected="false">About Us</a></li>
                                    <li class="nav-item" role="presentation"><a class="nav-link" href="#contact" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact Us</a></li>
                                </ul>
                                <div>
                                    <a href="#SendInquiry" data-bs-toggle="modal" class="btn btn-main mt-0 mb-2 me-3" title="Send Inquiry"><i class="fal fa-envelope me-2"></i>Send Inquiry</a>
                                    <div class="input-group mb-2"><input type="text" class="form-control" placeholder="Search Product / Services" aria-label="Recipient's username" aria-describedby="basic-addon2"><span class="input-group-text" id="basic-addon2"><i class="fal fa-search"></i></span></div>
                                </div>
                            </menu>
                        </div> 
                        <div class="card-body tab-content">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="text-center">
                                    <h2>Company Profile</h2>
                                    <div class="w-75 m-auto">
                                        <p class="text-secondary">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                    </div>
                                </div>
                                <div class="row justify-content-center mt-5">
                                    <div class="col-md-3">
                                        <div class="card IconBox">
                                            <div class="card-body text-center">
                                                <img src="img/companies/automotive-line.png" class="icon">
                                                <h4>Primary Business</h4>
                                                <p class="text-secondary">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card IconBox">
                                            <div class="card-body text-center">
                                                <img src="img/companies/automotive-line.png" class="icon">
                                                <h4>Primary Business</h4>
                                                <p class="text-secondary">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card IconBox">
                                            <div class="card-body text-center">
                                                <img src="img/companies/automotive-line.png" class="icon">
                                                <h4>Primary Business</h4>
                                                <p class="text-secondary">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="BuyBtnBox mt-5">
                                    <div>
                                        <h2 class="h5 mb-0"><strong>Interested in this product?</strong></h2>
                                        <p class="mb-0">Ask for more details &amp; Latest Price</p>
                                    </div>
                                    <div class="d-flex">
                                        <a href="#ViewMobile" data-bs-toggle="modal" class="btn btn-main1 mt-0 me-2"><i class="fal fa-phone-volume me-1"></i> View Mobile</a>
                                        <a href="#SendInquiry" data-bs-toggle="modal" class="btn btn-main mt-0" title="Send Inquiry"><i class="fal fa-envelope me-2"></i>Send Inquiry</a>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane Products fade" id="product" role="tabpanel" aria-labelledby="product-tab">
                                <h3 class="text-center">Product Category Name</h3>
                                <div class="owl-carousel CatCarousel text-center">
                                    <div class="item">
                                        <div class="card ProBlock New">
                                            <span class="OffTag"><span>20% off</span></span>
                                            <div class="NewTag"><span>New</span></div>
                                            <div class="card-head"><a href="company-product-detail.php"><img src="img/pro-img1.jpg"></a></div>
                                            <div class="card-body">
                                                <h3 class="name"><a href="company-product-detail.php">Healing Nutrients for Back Pain and Spine Surgery Healing Nutrients for Back Pain and Spine Surgery</a></h3>
                                                <span class="price"><i class="rupee">&#8377;</i>95.00 <span class="cutprice"><i class="rupee">&#8377;</i>115.00</span></span>
                                                <p class="m-0"><small>100 Pieces (Min Order)</small></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="card ProBlock">
                                            <span class="OffTag"><span>20% off</span></span>
                                            <div class="NewTag"><span>New</span></div>
                                            <div class="card-head"><a href="company-product-detail.php"><img src="img/pro-img2.jpg"></a></div>
                                            <div class="card-body">
                                                <h3 class="name"><a href="company-product-detail.php">Healing Nutrients for Back Pain and Spine Surgery Healing Nutrients for Back Pain and Spine Surgery</a></h3>
                                                <span class="price"><i class="rupee">&#8377;</i>95.00 <span class="cutprice"><i class="rupee">&#8377;</i>115.00</span></span>
                                                <p class="m-0"><small>100 Pieces (Min Order)</small></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="card ProBlock Off">
                                            <span class="OffTag"><span>20% off</span></span>
                                            <div class="NewTag"><span>New</span></div>
                                            <div class="card-head"><a href="company-product-detail.php"><img src="img/pro-img3.jpg"></a></div>
                                            <div class="card-body">
                                                <h3 class="name"><a href="company-product-detail.php">Healing Nutrients for Back Pain and Spine Surgery Healing Nutrients for Back Pain and Spine Surgery</a></h3>
                                                <span class="price"><i class="rupee">&#8377;</i>95.00 <span class="cutprice"><i class="rupee">&#8377;</i>115.00</span></span>
                                                <p class="m-0"><small>100 Pieces (Min Order)</small></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="card ProBlock">
                                            <span class="OffTag"><span>20% off</span></span>
                                            <div class="NewTag"><span>New</span></div>
                                            <div class="card-head"><a href="company-product-detail.php"><img src="img/pro-img4.jpg"></a></div>
                                            <div class="card-body">
                                                <h3 class="name"><a href="company-product-detail.php">Healing Nutrients for Back Pain and Spine Surgery Healing Nutrients for Back Pain and Spine Surgery</a></h3>
                                                <span class="price"><i class="rupee">&#8377;</i>95.00 <span class="cutprice"><i class="rupee">&#8377;</i>115.00</span></span>
                                                <p class="m-0"><small>100 Pieces (Min Order)</small></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="card ProBlock">
                                            <span class="OffTag"><span>20% off</span></span>
                                            <div class="NewTag"><span>New</span></div>
                                            <div class="card-head"><a href="company-product-detail.php"><img src="img/pro-img5.jpg"></a></div>
                                            <div class="card-body">
                                                <h3 class="name"><a href="company-product-detail.php">Healing Nutrients for Back Pain and Spine Surgery Healing Nutrients for Back Pain and Spine Surgery</a></h3>
                                                <span class="price"><i class="rupee">&#8377;</i>95.00 <span class="cutprice"><i class="rupee">&#8377;</i>115.00</span></span>
                                                <p class="m-0"><small>100 Pieces (Min Order)</small></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="card ProBlock">
                                            <span class="OffTag"><span>20% off</span></span>
                                            <div class="NewTag"><span>New</span></div>
                                            <div class="card-head"><a href="company-product-detail.php"><img src="img/pro-img8.jpg"></a></div>
                                            <div class="card-body">
                                                <h3 class="name"><a href="company-product-detail.php">Healing Nutrients for Back Pain and Spine Surgery Healing Nutrients for Back Pain and Spine Surgery</a></h3>
                                                <span class="price"><i class="rupee">&#8377;</i>95.00 <span class="cutprice"><i class="rupee">&#8377;</i>115.00</span></span>
                                                <p class="m-0"><small>100 Pieces (Min Order)</small></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="card ProBlock">
                                            <span class="OffTag"><span>20% off</span></span>
                                            <div class="NewTag"><span>New</span></div>
                                            <div class="card-head"><a href="company-product-detail.php"><img src="img/pro-img7.jpg"></a></div>
                                            <div class="card-body">
                                                <h3 class="name"><a href="company-product-detail.php">Healing Nutrients for Back Pain and Spine Surgery Healing Nutrients for Back Pain and Spine Surgery</a></h3>
                                                <span class="price"><i class="rupee">&#8377;</i>95.00 <span class="cutprice"><i class="rupee">&#8377;</i>115.00</span></span>
                                                <p class="m-0"><small>100 Pieces (Min Order)</small></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="card ProBlock">
                                            <span class="OffTag"><span>20% off</span></span>
                                            <div class="NewTag"><span>New</span></div>
                                            <div class="card-head"><a href="company-product-detail.php"><img src="img/pro-img6.jpg"></a></div>
                                            <div class="card-body">
                                                <h3 class="name"><a href="company-product-detail.php">Healing Nutrients for Back Pain and Spine Surgery Healing Nutrients for Back Pain and Spine Surgery</a></h3>
                                                <span class="price"><i class="rupee">&#8377;</i>95.00 <span class="cutprice"><i class="rupee">&#8377;</i>115.00</span></span>
                                                <p class="m-0"><small>100 Pieces (Min Order)</small></p>
                                            </div>
                                        </div>
                                    </div>
                                </div><hr>
                                <h3 class="text-center">Product Category Name</h3>
                                <div class="owl-carousel CatCarousel text-center">
                                    <div class="item">
                                        <div class="card ProBlock New">
                                            <span class="OffTag"><span>20% off</span></span>
                                            <div class="NewTag"><span>New</span></div>
                                            <div class="card-head"><a href="company-product-detail.php"><img src="img/pro-img1.jpg"></a></div>
                                            <div class="card-body">
                                                <h3 class="name"><a href="company-product-detail.php">Healing Nutrients for Back Pain and Spine Surgery Healing Nutrients for Back Pain and Spine Surgery</a></h3>
                                                <span class="price"><i class="rupee">&#8377;</i>95.00 <span class="cutprice"><i class="rupee">&#8377;</i>115.00</span></span>
                                                <p class="m-0"><small>100 Pieces (Min Order)</small></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="card ProBlock">
                                            <span class="OffTag"><span>20% off</span></span>
                                            <div class="NewTag"><span>New</span></div>
                                            <div class="card-head"><a href="company-product-detail.php"><img src="img/pro-img2.jpg"></a></div>
                                            <div class="card-body">
                                                <h3 class="name"><a href="company-product-detail.php">Healing Nutrients for Back Pain and Spine Surgery Healing Nutrients for Back Pain and Spine Surgery</a></h3>
                                                <span class="price"><i class="rupee">&#8377;</i>95.00 <span class="cutprice"><i class="rupee">&#8377;</i>115.00</span></span>
                                                <p class="m-0"><small>100 Pieces (Min Order)</small></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="card ProBlock Off">
                                            <span class="OffTag"><span>20% off</span></span>
                                            <div class="NewTag"><span>New</span></div>
                                            <div class="card-head"><a href="company-product-detail.php"><img src="img/pro-img3.jpg"></a></div>
                                            <div class="card-body">
                                                <h3 class="name"><a href="company-product-detail.php">Healing Nutrients for Back Pain and Spine Surgery Healing Nutrients for Back Pain and Spine Surgery</a></h3>
                                                <span class="price"><i class="rupee">&#8377;</i>95.00 <span class="cutprice"><i class="rupee">&#8377;</i>115.00</span></span>
                                                <p class="m-0"><small>100 Pieces (Min Order)</small></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="card ProBlock">
                                            <span class="OffTag"><span>20% off</span></span>
                                            <div class="NewTag"><span>New</span></div>
                                            <div class="card-head"><a href="company-product-detail.php"><img src="img/pro-img4.jpg"></a></div>
                                            <div class="card-body">
                                                <h3 class="name"><a href="company-product-detail.php">Healing Nutrients for Back Pain and Spine Surgery Healing Nutrients for Back Pain and Spine Surgery</a></h3>
                                                <span class="price"><i class="rupee">&#8377;</i>95.00 <span class="cutprice"><i class="rupee">&#8377;</i>115.00</span></span>
                                                <p class="m-0"><small>100 Pieces (Min Order)</small></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="card ProBlock">
                                            <span class="OffTag"><span>20% off</span></span>
                                            <div class="NewTag"><span>New</span></div>
                                            <div class="card-head"><a href="company-product-detail.php"><img src="img/pro-img5.jpg"></a></div>
                                            <div class="card-body">
                                                <h3 class="name"><a href="company-product-detail.php">Healing Nutrients for Back Pain and Spine Surgery Healing Nutrients for Back Pain and Spine Surgery</a></h3>
                                                <span class="price"><i class="rupee">&#8377;</i>95.00 <span class="cutprice"><i class="rupee">&#8377;</i>115.00</span></span>
                                                <p class="m-0"><small>100 Pieces (Min Order)</small></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="card ProBlock">
                                            <span class="OffTag"><span>20% off</span></span>
                                            <div class="NewTag"><span>New</span></div>
                                            <div class="card-head"><a href="company-product-detail.php"><img src="img/pro-img8.jpg"></a></div>
                                            <div class="card-body">
                                                <h3 class="name"><a href="company-product-detail.php">Healing Nutrients for Back Pain and Spine Surgery Healing Nutrients for Back Pain and Spine Surgery</a></h3>
                                                <span class="price"><i class="rupee">&#8377;</i>95.00 <span class="cutprice"><i class="rupee">&#8377;</i>115.00</span></span>
                                                <p class="m-0"><small>100 Pieces (Min Order)</small></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="card ProBlock">
                                            <span class="OffTag"><span>20% off</span></span>
                                            <div class="NewTag"><span>New</span></div>
                                            <div class="card-head"><a href="company-product-detail.php"><img src="img/pro-img7.jpg"></a></div>
                                            <div class="card-body">
                                                <h3 class="name"><a href="company-product-detail.php">Healing Nutrients for Back Pain and Spine Surgery Healing Nutrients for Back Pain and Spine Surgery</a></h3>
                                                <span class="price"><i class="rupee">&#8377;</i>95.00 <span class="cutprice"><i class="rupee">&#8377;</i>115.00</span></span>
                                                <p class="m-0"><small>100 Pieces (Min Order)</small></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="card ProBlock">
                                            <span class="OffTag"><span>20% off</span></span>
                                            <div class="NewTag"><span>New</span></div>
                                            <div class="card-head"><a href="company-product-detail.php"><img src="img/pro-img6.jpg"></a></div>
                                            <div class="card-body">
                                                <h3 class="name"><a href="company-product-detail.php">Healing Nutrients for Back Pain and Spine Surgery Healing Nutrients for Back Pain and Spine Surgery</a></h3>
                                                <span class="price"><i class="rupee">&#8377;</i>95.00 <span class="cutprice"><i class="rupee">&#8377;</i>115.00</span></span>
                                                <p class="m-0"><small>100 Pieces (Min Order)</small></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane About fade" id="about" role="tabpanel" aria-labelledby="about-tab">
                                <h2>Company Profile</h2>
                                <p class="text-secondary">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                <h4>Highlights</h4>
                                <div class="Highlights mt-3">
                                    <ul>
                                        <li><span>Color</span> Black</li>
                                        <li><span>Fabric</span> Viscos Lycra</li>
                                        <li><span>Supply Type</span> Exporters, Suppliers</li>
                                        <li><span>Color</span> Black</li>
                                        <li><span>Fabric</span> Viscos Lycra</li>
                                        <li><span>Supply Type</span> Exporters, Suppliers</li>
                                    </ul>
                                </div>
                                <div class="row justify-content-center mt-5">
                                    <div class="col-md-3">
                                        <div class="card IconBox">
                                            <div class="card-body text-center">
                                                <img src="img/companies/automotive-line.png" class="icon">
                                                <h4>Primary Business</h4>
                                                <p class="text-secondary">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card IconBox">
                                            <div class="card-body text-center">
                                                <img src="img/companies/automotive-line.png" class="icon">
                                                <h4>Primary Business</h4>
                                                <p class="text-secondary">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card IconBox">
                                            <div class="card-body text-center">
                                                <img src="img/companies/automotive-line.png" class="icon">
                                                <h4>Primary Business</h4>
                                                <p class="text-secondary">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card IconBox">
                                            <div class="card-body text-center">
                                                <img src="img/companies/automotive-line.png" class="icon">
                                                <h4>Primary Business</h4>
                                                <p class="text-secondary">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="BuyBtnBox mt-5">
                                    <div>
                                        <h2 class="h5 mb-0"><strong>Interested in this product?</strong></h2>
                                        <p class="mb-0">Ask for more details &amp; Latest Price</p>
                                    </div>
                                    <div class="d-flex">
                                        <a href="#ViewMobile" data-bs-toggle="modal" class="btn btn-main1 mt-0 me-2"><i class="fal fa-phone-volume me-1"></i> View Mobile</a>
                                        <a href="#SendInquiry" data-bs-toggle="modal" class="btn btn-main mt-0" title="Send Inquiry"><i class="fal fa-envelope me-2"></i>Send Inquiry</a>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane Contact fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                <div class="row">
                                    <div class="col-md-12 col-lg-7">
                                        <form action="#" class="card">
                                            <div class="card-header">
                                                <h3 class="mt-0 h5">Contact Us - Sam Web Studio Pvt Ltd.</h3>
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
                                                        <?php include "countrylist.php";?>
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
                                                    <h3 class="h5">Looking for <strong>Dusky Gothic Long Skirt?</strong></h3>
                                                </div>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include "inc/footer.php";?>
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
</script>
</body>
</html>