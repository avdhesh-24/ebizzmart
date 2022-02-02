<?php
session_start();
ob_start();
$active='Home';
?>
<!DOCTYPE html>
<html lang="en">
 
<head>
<meta charset="utf-8">
<title>Home : ebizzmart</title>
<link rel="preload" as="style" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" onload="this.rel='stylesheet'" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
<link rel="preload" as="style" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" onload="this.rel='stylesheet'" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />
<?php include "header.php";?>
<div class="contentp">
    <section class="Slider">
        <div id="HomeBanner" class="carousel slide carousel-fade" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="img/banner1.jpg" alt="banner1" width="1400" height="100%">
              <!-- <div class="carousel-caption">
                <div class="container" data-aos="fade-right" data-aos-duration="800">
                    <h2 class="h1 title">First slide label</h2>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
              </div> -->
            </div>
            <div class="carousel-item"><img src="img/banner2.jpg" alt="banner1" width="1400" height="100%"></div>
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
                            <div class="item">
                                <div>
                                    <img src="img/sbottom-img3.png">
                                    <div>
                                        <h3 class="h6 thm1"><strong>Electronic</strong></h3>
                                        <a href="#" class="btn btn-main1">Order Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div>
                                    <img src="img/sbottom-img2.png">
                                    <div>
                                        <h3 class="h6 thm1"><strong>Home & Garden</strong></h3>
                                        <a href="#" class="btn btn-main1">Order Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div>
                                    <img src="img/sbottom-img1.png">
                                    <div>
                                        <h3 class="h6 thm1"><strong>Lights & Lighting</strong></h3>
                                        <a href="#" class="btn btn-main1">Order Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="last">
                                    <img src="img/sbottom-img3.png">
                                    <div>
                                        <h3 class="h6 thm1"><strong>Electronic</strong></h3>
                                        <a href="#" class="btn btn-main1">Order Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div>
                                    <img src="img/sbottom-img2.png">
                                    <div>
                                        <h3 class="h6 thm1"><strong>Home & Garden</strong></h3>
                                        <a href="#" class="btn btn-main1">Order Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div>
                                    <img src="img/sbottom-img1.png">
                                    <div>
                                        <h3 class="h6 thm1"><strong>Lights & Lighting</strong></h3>
                                        <a href="#" class="btn btn-main1">Order Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ads">
        <div class="container">
            <div class="row">
                <div class="col-md-6"><a href="#"><img src="img/ads-1.jpg" class="w-100"></a></div>
                <div class="col-md-6"><a href="#"><img src="img/ads-3.jpg" class="w-100"></a></div>
            </div>
        </div>
    </section>
    <section class="allCategory Home">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="Heading h3">Building Construction Material & Equipment</h2>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-12 col-md-3">
                    <div class="CatImg">
                        <div class="img"><img src="img/pro-img16.jpg"></div>
                        <div class="Text">
                            <ul>
                                <li><a href="listing.php">Brick Making Mahines</a></li>
                                <li><a href="listing.php">Passenger Lifts</a></li>
                                <li><a href="listing.php">TMT Bars</a></li>
                                <li><a href="listing.php">Plywoods</a></li>
                            </ul>
                            <a href="#" class="btn btn-main">View all</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-9">
                    <div class="owl-carousel catblock">
                        <div class="item">
                            <div class="card CatBlock">
                                <a href="listing.php"><div class="img"><img src="img/pro-img10.jpg"></div></a>
                                <div class="con">
                                    <h3><a href="listing.php" class="thm1">Brick making Machines</a></h3>
                                    <ul>
                                        <li><a href="listing.php">Fly Ash Brick Making Machine</a></li>
                                        <li><a href="listing.php">Clay Brick Making Machine</a></li>
                                        <li><a href="listing.php">Cement Brick Making Machine</a></li>
                                    </ul>
                                    <a href="listing.php">View More <i class="fal fa-chevron-double-right"></i></a>
                                </div>
                            </div>
                            <div class="card CatBlock">
                                <a href="listing.php"><div class="img"><img src="img/pro-img9.jpg"></div></a>
                                <div class="con">
                                    <h3><a href="listing.php" class="thm1">Brick making Machines</a></h3>
                                    <ul>
                                        <li><a href="listing.php">Fly Ash Brick Making Machine</a></li>
                                        <li><a href="listing.php">Clay Brick Making Machine</a></li>
                                        <li><a href="listing.php">Cement Brick Making Machine</a></li>
                                    </ul>
                                    <a href="listing.php">View More <i class="fal fa-chevron-double-right"></i></a>
                                </div>
                            </div>
                            <div class="card CatBlock">
                                <a href="listing.php"><div class="img"><img src="img/pro-img8.jpg"></div></a>
                                <div class="con">
                                    <h3><a href="listing.php" class="thm1">Brick making Machines</a></h3>
                                    <ul>
                                        <li><a href="listing.php">Fly Ash Brick Making Machine</a></li>
                                        <li><a href="listing.php">Clay Brick Making Machine</a></li>
                                        <li><a href="listing.php">Cement Brick Making Machine</a></li>
                                    </ul>
                                    <a href="listing.php">View More <i class="fal fa-chevron-double-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card CatBlock">
                                <a href="listing.php"><div class="img"><img src="img/pro-img7.jpg"></div></a>
                                <div class="con">
                                    <h3><a href="listing.php" class="thm1">Brick making Machines</a></h3>
                                    <ul>
                                        <li><a href="listing.php">Fly Ash Brick Making Machine</a></li>
                                        <li><a href="listing.php">Clay Brick Making Machine</a></li>
                                        <li><a href="listing.php">Cement Brick Making Machine</a></li>
                                    </ul>
                                    <a href="listing.php">View More <i class="fal fa-chevron-double-right"></i></a>
                                </div>
                            </div>
                            <div class="card CatBlock">
                                <a href="listing.php"><div class="img"><img src="img/pro-img6.jpg"></div></a>
                                <div class="con">
                                    <h3><a href="listing.php" class="thm1">Brick making Machines</a></h3>
                                    <ul>
                                        <li><a href="listing.php">Fly Ash Brick Making Machine</a></li>
                                        <li><a href="listing.php">Clay Brick Making Machine</a></li>
                                        <li><a href="listing.php">Cement Brick Making Machine</a></li>
                                    </ul>
                                    <a href="listing.php">View More <i class="fal fa-chevron-double-right"></i></a>
                                </div>
                            </div>
                            <div class="card CatBlock">
                                <a href="listing.php"><div class="img"><img src="img/pro-img5.jpg"></div></a>
                                <div class="con">
                                    <h3><a href="listing.php" class="thm1">Brick making Machines</a></h3>
                                    <ul>
                                        <li><a href="listing.php">Fly Ash Brick Making Machine</a></li>
                                        <li><a href="listing.php">Clay Brick Making Machine</a></li>
                                        <li><a href="listing.php">Cement Brick Making Machine</a></li>
                                    </ul>
                                    <a href="listing.php">View More <i class="fal fa-chevron-double-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card CatBlock">
                                <a href="listing.php"><div class="img"><img src="img/pro-img4.jpg"></div></a>
                                <div class="con">
                                    <h3><a href="listing.php" class="thm1">Brick making Machines</a></h3>
                                    <ul>
                                        <li><a href="listing.php">Fly Ash Brick Making Machine</a></li>
                                        <li><a href="listing.php">Clay Brick Making Machine</a></li>
                                        <li><a href="listing.php">Cement Brick Making Machine</a></li>
                                    </ul>
                                    <a href="listing.php">View More <i class="fal fa-chevron-double-right"></i></a>
                                </div>
                            </div>
                            <div class="card CatBlock">
                                <a href="listing.php"><div class="img"><img src="img/pro-img3.jpg"></div></a>
                                <div class="con">
                                    <h3><a href="listing.php" class="thm1">Brick making Machines</a></h3>
                                    <ul>
                                        <li><a href="listing.php">Fly Ash Brick Making Machine</a></li>
                                        <li><a href="listing.php">Clay Brick Making Machine</a></li>
                                        <li><a href="listing.php">Cement Brick Making Machine</a></li>
                                    </ul>
                                    <a href="listing.php">View More <i class="fal fa-chevron-double-right"></i></a>
                                </div>
                            </div>
                            <div class="card CatBlock">
                                <a href="listing.php"><div class="img"><img src="img/pro-img2.jpg"></div></a>
                                <div class="con">
                                    <h3><a href="listing.php" class="thm1">Brick making Machines</a></h3>
                                    <ul>
                                        <li><a href="listing.php">Fly Ash Brick Making Machine</a></li>
                                        <li><a href="listing.php">Clay Brick Making Machine</a></li>
                                        <li><a href="listing.php">Cement Brick Making Machine</a></li>
                                    </ul>
                                    <a href="listing.php">View More <i class="fal fa-chevron-double-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card CatBlock">
                                <a href="listing.php"><div class="img"><img src="img/pro-img1.jpg"></div></a>
                                <div class="con">
                                    <h3><a href="listing.php" class="thm1">Brick making Machines</a></h3>
                                    <ul>
                                        <li><a href="listing.php">Fly Ash Brick Making Machine</a></li>
                                        <li><a href="listing.php">Clay Brick Making Machine</a></li>
                                        <li><a href="listing.php">Cement Brick Making Machine</a></li>
                                    </ul>
                                    <a href="listing.php">View More <i class="fal fa-chevron-double-right"></i></a>
                                </div>
                            </div>
                            <div class="card CatBlock">
                                <a href="listing.php"><div class="img"><img src="img/pro-img12.jpg"></div></a>
                                <div class="con">
                                    <h3><a href="listing.php" class="thm1">Brick making Machines</a></h3>
                                    <ul>
                                        <li><a href="listing.php">Fly Ash Brick Making Machine</a></li>
                                        <li><a href="listing.php">Clay Brick Making Machine</a></li>
                                        <li><a href="listing.php">Cement Brick Making Machine</a></li>
                                    </ul>
                                    <a href="listing.php">View More <i class="fal fa-chevron-double-right"></i></a>
                                </div>
                            </div>
                            <div class="card CatBlock">
                                <a href="listing.php"><div class="img"><img src="img/pro-img11.jpg"></div></a>
                                <div class="con">
                                    <h3><a href="listing.php" class="thm1">Brick making Machines</a></h3>
                                    <ul>
                                        <li><a href="listing.php">Fly Ash Brick Making Machine</a></li>
                                        <li><a href="listing.php">Clay Brick Making Machine</a></li>
                                        <li><a href="listing.php">Cement Brick Making Machine</a></li>
                                    </ul>
                                    <a href="listing.php">View More <i class="fal fa-chevron-double-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="allCategory Home">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="Heading h3">Building Construction Material & Equipment</h2>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-12 col-md-3">
                    <div class="CatImg">
                        <div class="img"><img src="img/pro-img16.jpg"></div>
                        <div class="Text">
                            <ul>
                                <li><a href="listing.php">Brick Making Mahines</a></li>
                                <li><a href="listing.php">Passenger Lifts</a></li>
                                <li><a href="listing.php">TMT Bars</a></li>
                                <li><a href="listing.php">Plywoods</a></li>
                            </ul>
                            <a href="#" class="btn btn-main">View all</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-9">
                    <div class="owl-carousel catblock">
                        <div class="item">
                            <div class="card CatBlock">
                                <a href="listing.php"><div class="img"><img src="img/pro-img10.jpg"></div></a>
                                <div class="con">
                                    <h3><a href="listing.php" class="thm1">Brick making Machines</a></h3>
                                    <ul>
                                        <li><a href="listing.php">Fly Ash Brick Making Machine</a></li>
                                        <li><a href="listing.php">Clay Brick Making Machine</a></li>
                                        <li><a href="listing.php">Cement Brick Making Machine</a></li>
                                    </ul>
                                    <a href="listing.php">View More <i class="fal fa-chevron-double-right"></i></a>
                                </div>
                            </div>
                            <div class="card CatBlock">
                                <a href="listing.php"><div class="img"><img src="img/pro-img9.jpg"></div></a>
                                <div class="con">
                                    <h3><a href="listing.php" class="thm1">Brick making Machines</a></h3>
                                    <ul>
                                        <li><a href="listing.php">Fly Ash Brick Making Machine</a></li>
                                        <li><a href="listing.php">Clay Brick Making Machine</a></li>
                                        <li><a href="listing.php">Cement Brick Making Machine</a></li>
                                    </ul>
                                    <a href="listing.php">View More <i class="fal fa-chevron-double-right"></i></a>
                                </div>
                            </div>
                            <div class="card CatBlock">
                                <a href="listing.php"><div class="img"><img src="img/pro-img8.jpg"></div></a>
                                <div class="con">
                                    <h3><a href="listing.php" class="thm1">Brick making Machines</a></h3>
                                    <ul>
                                        <li><a href="listing.php">Fly Ash Brick Making Machine</a></li>
                                        <li><a href="listing.php">Clay Brick Making Machine</a></li>
                                        <li><a href="listing.php">Cement Brick Making Machine</a></li>
                                    </ul>
                                    <a href="listing.php">View More <i class="fal fa-chevron-double-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card CatBlock">
                                <a href="listing.php"><div class="img"><img src="img/pro-img7.jpg"></div></a>
                                <div class="con">
                                    <h3><a href="listing.php" class="thm1">Brick making Machines</a></h3>
                                    <ul>
                                        <li><a href="listing.php">Fly Ash Brick Making Machine</a></li>
                                        <li><a href="listing.php">Clay Brick Making Machine</a></li>
                                        <li><a href="listing.php">Cement Brick Making Machine</a></li>
                                    </ul>
                                    <a href="listing.php">View More <i class="fal fa-chevron-double-right"></i></a>
                                </div>
                            </div>
                            <div class="card CatBlock">
                                <a href="listing.php"><div class="img"><img src="img/pro-img6.jpg"></div></a>
                                <div class="con">
                                    <h3><a href="listing.php" class="thm1">Brick making Machines</a></h3>
                                    <ul>
                                        <li><a href="listing.php">Fly Ash Brick Making Machine</a></li>
                                        <li><a href="listing.php">Clay Brick Making Machine</a></li>
                                        <li><a href="listing.php">Cement Brick Making Machine</a></li>
                                    </ul>
                                    <a href="listing.php">View More <i class="fal fa-chevron-double-right"></i></a>
                                </div>
                            </div>
                            <div class="card CatBlock">
                                <a href="listing.php"><div class="img"><img src="img/pro-img5.jpg"></div></a>
                                <div class="con">
                                    <h3><a href="listing.php" class="thm1">Brick making Machines</a></h3>
                                    <ul>
                                        <li><a href="listing.php">Fly Ash Brick Making Machine</a></li>
                                        <li><a href="listing.php">Clay Brick Making Machine</a></li>
                                        <li><a href="listing.php">Cement Brick Making Machine</a></li>
                                    </ul>
                                    <a href="listing.php">View More <i class="fal fa-chevron-double-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card CatBlock">
                                <a href="listing.php"><div class="img"><img src="img/pro-img4.jpg"></div></a>
                                <div class="con">
                                    <h3><a href="listing.php" class="thm1">Brick making Machines</a></h3>
                                    <ul>
                                        <li><a href="listing.php">Fly Ash Brick Making Machine</a></li>
                                        <li><a href="listing.php">Clay Brick Making Machine</a></li>
                                        <li><a href="listing.php">Cement Brick Making Machine</a></li>
                                    </ul>
                                    <a href="listing.php">View More <i class="fal fa-chevron-double-right"></i></a>
                                </div>
                            </div>
                            <div class="card CatBlock">
                                <a href="listing.php"><div class="img"><img src="img/pro-img3.jpg"></div></a>
                                <div class="con">
                                    <h3><a href="listing.php" class="thm1">Brick making Machines</a></h3>
                                    <ul>
                                        <li><a href="listing.php">Fly Ash Brick Making Machine</a></li>
                                        <li><a href="listing.php">Clay Brick Making Machine</a></li>
                                        <li><a href="listing.php">Cement Brick Making Machine</a></li>
                                    </ul>
                                    <a href="listing.php">View More <i class="fal fa-chevron-double-right"></i></a>
                                </div>
                            </div>
                            <div class="card CatBlock">
                                <a href="listing.php"><div class="img"><img src="img/pro-img2.jpg"></div></a>
                                <div class="con">
                                    <h3><a href="listing.php" class="thm1">Brick making Machines</a></h3>
                                    <ul>
                                        <li><a href="listing.php">Fly Ash Brick Making Machine</a></li>
                                        <li><a href="listing.php">Clay Brick Making Machine</a></li>
                                        <li><a href="listing.php">Cement Brick Making Machine</a></li>
                                    </ul>
                                    <a href="listing.php">View More <i class="fal fa-chevron-double-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card CatBlock">
                                <a href="listing.php"><div class="img"><img src="img/pro-img1.jpg"></div></a>
                                <div class="con">
                                    <h3><a href="listing.php" class="thm1">Brick making Machines</a></h3>
                                    <ul>
                                        <li><a href="listing.php">Fly Ash Brick Making Machine</a></li>
                                        <li><a href="listing.php">Clay Brick Making Machine</a></li>
                                        <li><a href="listing.php">Cement Brick Making Machine</a></li>
                                    </ul>
                                    <a href="listing.php">View More <i class="fal fa-chevron-double-right"></i></a>
                                </div>
                            </div>
                            <div class="card CatBlock">
                                <a href="listing.php"><div class="img"><img src="img/pro-img12.jpg"></div></a>
                                <div class="con">
                                    <h3><a href="listing.php" class="thm1">Brick making Machines</a></h3>
                                    <ul>
                                        <li><a href="listing.php">Fly Ash Brick Making Machine</a></li>
                                        <li><a href="listing.php">Clay Brick Making Machine</a></li>
                                        <li><a href="listing.php">Cement Brick Making Machine</a></li>
                                    </ul>
                                    <a href="listing.php">View More <i class="fal fa-chevron-double-right"></i></a>
                                </div>
                            </div>
                            <div class="card CatBlock">
                                <a href="listing.php"><div class="img"><img src="img/pro-img11.jpg"></div></a>
                                <div class="con">
                                    <h3><a href="listing.php" class="thm1">Brick making Machines</a></h3>
                                    <ul>
                                        <li><a href="listing.php">Fly Ash Brick Making Machine</a></li>
                                        <li><a href="listing.php">Clay Brick Making Machine</a></li>
                                        <li><a href="listing.php">Cement Brick Making Machine</a></li>
                                    </ul>
                                    <a href="listing.php">View More <i class="fal fa-chevron-double-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="allCategory Home">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="Heading h3">Building Construction Material & Equipment</h2>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-12 col-md-3">
                    <div class="CatImg">
                        <div class="img"><img src="img/pro-img16.jpg"></div>
                        <div class="Text">
                            <ul>
                                <li><a href="listing.php">Brick Making Mahines</a></li>
                                <li><a href="listing.php">Passenger Lifts</a></li>
                                <li><a href="listing.php">TMT Bars</a></li>
                                <li><a href="listing.php">Plywoods</a></li>
                            </ul>
                            <a href="#" class="btn btn-main">View all</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-9">
                    <div class="owl-carousel catblock">
                        <div class="item">
                            <div class="card CatBlock">
                                <a href="listing.php"><div class="img"><img src="img/pro-img10.jpg"></div></a>
                                <div class="con">
                                    <h3><a href="listing.php" class="thm1">Brick making Machines</a></h3>
                                    <ul>
                                        <li><a href="listing.php">Fly Ash Brick Making Machine</a></li>
                                        <li><a href="listing.php">Clay Brick Making Machine</a></li>
                                        <li><a href="listing.php">Cement Brick Making Machine</a></li>
                                    </ul>
                                    <a href="listing.php">View More <i class="fal fa-chevron-double-right"></i></a>
                                </div>
                            </div>
                            <div class="card CatBlock">
                                <a href="listing.php"><div class="img"><img src="img/pro-img9.jpg"></div></a>
                                <div class="con">
                                    <h3><a href="listing.php" class="thm1">Brick making Machines</a></h3>
                                    <ul>
                                        <li><a href="listing.php">Fly Ash Brick Making Machine</a></li>
                                        <li><a href="listing.php">Clay Brick Making Machine</a></li>
                                        <li><a href="listing.php">Cement Brick Making Machine</a></li>
                                    </ul>
                                    <a href="listing.php">View More <i class="fal fa-chevron-double-right"></i></a>
                                </div>
                            </div>
                            <div class="card CatBlock">
                                <a href="listing.php"><div class="img"><img src="img/pro-img8.jpg"></div></a>
                                <div class="con">
                                    <h3><a href="listing.php" class="thm1">Brick making Machines</a></h3>
                                    <ul>
                                        <li><a href="listing.php">Fly Ash Brick Making Machine</a></li>
                                        <li><a href="listing.php">Clay Brick Making Machine</a></li>
                                        <li><a href="listing.php">Cement Brick Making Machine</a></li>
                                    </ul>
                                    <a href="listing.php">View More <i class="fal fa-chevron-double-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card CatBlock">
                                <a href="listing.php"><div class="img"><img src="img/pro-img7.jpg"></div></a>
                                <div class="con">
                                    <h3><a href="listing.php" class="thm1">Brick making Machines</a></h3>
                                    <ul>
                                        <li><a href="listing.php">Fly Ash Brick Making Machine</a></li>
                                        <li><a href="listing.php">Clay Brick Making Machine</a></li>
                                        <li><a href="listing.php">Cement Brick Making Machine</a></li>
                                    </ul>
                                    <a href="listing.php">View More <i class="fal fa-chevron-double-right"></i></a>
                                </div>
                            </div>
                            <div class="card CatBlock">
                                <a href="listing.php"><div class="img"><img src="img/pro-img6.jpg"></div></a>
                                <div class="con">
                                    <h3><a href="listing.php" class="thm1">Brick making Machines</a></h3>
                                    <ul>
                                        <li><a href="listing.php">Fly Ash Brick Making Machine</a></li>
                                        <li><a href="listing.php">Clay Brick Making Machine</a></li>
                                        <li><a href="listing.php">Cement Brick Making Machine</a></li>
                                    </ul>
                                    <a href="listing.php">View More <i class="fal fa-chevron-double-right"></i></a>
                                </div>
                            </div>
                            <div class="card CatBlock">
                                <a href="listing.php"><div class="img"><img src="img/pro-img5.jpg"></div></a>
                                <div class="con">
                                    <h3><a href="listing.php" class="thm1">Brick making Machines</a></h3>
                                    <ul>
                                        <li><a href="listing.php">Fly Ash Brick Making Machine</a></li>
                                        <li><a href="listing.php">Clay Brick Making Machine</a></li>
                                        <li><a href="listing.php">Cement Brick Making Machine</a></li>
                                    </ul>
                                    <a href="listing.php">View More <i class="fal fa-chevron-double-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card CatBlock">
                                <a href="listing.php"><div class="img"><img src="img/pro-img4.jpg"></div></a>
                                <div class="con">
                                    <h3><a href="listing.php" class="thm1">Brick making Machines</a></h3>
                                    <ul>
                                        <li><a href="listing.php">Fly Ash Brick Making Machine</a></li>
                                        <li><a href="listing.php">Clay Brick Making Machine</a></li>
                                        <li><a href="listing.php">Cement Brick Making Machine</a></li>
                                    </ul>
                                    <a href="listing.php">View More <i class="fal fa-chevron-double-right"></i></a>
                                </div>
                            </div>
                            <div class="card CatBlock">
                                <a href="listing.php"><div class="img"><img src="img/pro-img3.jpg"></div></a>
                                <div class="con">
                                    <h3><a href="listing.php" class="thm1">Brick making Machines</a></h3>
                                    <ul>
                                        <li><a href="listing.php">Fly Ash Brick Making Machine</a></li>
                                        <li><a href="listing.php">Clay Brick Making Machine</a></li>
                                        <li><a href="listing.php">Cement Brick Making Machine</a></li>
                                    </ul>
                                    <a href="listing.php">View More <i class="fal fa-chevron-double-right"></i></a>
                                </div>
                            </div>
                            <div class="card CatBlock">
                                <a href="listing.php"><div class="img"><img src="img/pro-img2.jpg"></div></a>
                                <div class="con">
                                    <h3><a href="listing.php" class="thm1">Brick making Machines</a></h3>
                                    <ul>
                                        <li><a href="listing.php">Fly Ash Brick Making Machine</a></li>
                                        <li><a href="listing.php">Clay Brick Making Machine</a></li>
                                        <li><a href="listing.php">Cement Brick Making Machine</a></li>
                                    </ul>
                                    <a href="listing.php">View More <i class="fal fa-chevron-double-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card CatBlock">
                                <a href="listing.php"><div class="img"><img src="img/pro-img1.jpg"></div></a>
                                <div class="con">
                                    <h3><a href="listing.php" class="thm1">Brick making Machines</a></h3>
                                    <ul>
                                        <li><a href="listing.php">Fly Ash Brick Making Machine</a></li>
                                        <li><a href="listing.php">Clay Brick Making Machine</a></li>
                                        <li><a href="listing.php">Cement Brick Making Machine</a></li>
                                    </ul>
                                    <a href="listing.php">View More <i class="fal fa-chevron-double-right"></i></a>
                                </div>
                            </div>
                            <div class="card CatBlock">
                                <a href="listing.php"><div class="img"><img src="img/pro-img12.jpg"></div></a>
                                <div class="con">
                                    <h3><a href="listing.php" class="thm1">Brick making Machines</a></h3>
                                    <ul>
                                        <li><a href="listing.php">Fly Ash Brick Making Machine</a></li>
                                        <li><a href="listing.php">Clay Brick Making Machine</a></li>
                                        <li><a href="listing.php">Cement Brick Making Machine</a></li>
                                    </ul>
                                    <a href="listing.php">View More <i class="fal fa-chevron-double-right"></i></a>
                                </div>
                            </div>
                            <div class="card CatBlock">
                                <a href="listing.php"><div class="img"><img src="img/pro-img11.jpg"></div></a>
                                <div class="con">
                                    <h3><a href="listing.php" class="thm1">Brick making Machines</a></h3>
                                    <ul>
                                        <li><a href="listing.php">Fly Ash Brick Making Machine</a></li>
                                        <li><a href="listing.php">Clay Brick Making Machine</a></li>
                                        <li><a href="listing.php">Cement Brick Making Machine</a></li>
                                    </ul>
                                    <a href="listing.php">View More <i class="fal fa-chevron-double-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="Featured Home">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="Heading h4">Featured Catalogues</h2>
                </div>
            </div>
            <div class="owl-carousel CatCarousel" id="Featured">
                <div class="item">
                    <div class="card FedBlock">
                        <div class="card-header"><h3 class="m-0"><a href="company-detail.php">Sam Web Studio Pvt Ltd.</a></h3></div>
                        <div class="card-body"><a href="company-detail.php"><img src="img/pro-img7.jpg"></a></div>
                        <div class="card-footer">Category : <a href="company-detail.php">Fashion & Garments</a></div>
                    </div>
                </div>
                <div class="item">
                    <div class="card FedBlock">
                        <div class="card-header"><h3 class="m-0"><a href="company-detail.php">Sam Web Studio Pvt Ltd.</a></h3></div>
                        <div class="card-body"><a href="company-detail.php"><img src="img/pro-img7.jpg"></a></div>
                        <div class="card-footer">Category : <a href="company-detail.php">Fashion & Garments</a></div>
                    </div>
                </div>
                <div class="item">
                    <div class="card FedBlock">
                        <div class="card-header"><h3 class="m-0"><a href="company-detail.php">Sam Web Studio Pvt Ltd.</a></h3></div>
                        <div class="card-body"><a href="company-detail.php"><img src="img/pro-img7.jpg"></a></div>
                        <div class="card-footer">Category : <a href="company-detail.php">Fashion & Garments</a></div>
                    </div>
                </div>
                <div class="item">
                    <div class="card FedBlock">
                        <div class="card-header"><h3 class="m-0"><a href="company-detail.php">Sam Web Studio Pvt Ltd.</a></h3></div>
                        <div class="card-body"><a href="company-detail.php"><img src="img/pro-img7.jpg"></a></div>
                        <div class="card-footer">Category : <a href="company-detail.php">Fashion & Garments</a></div>
                    </div>
                </div>
                <div class="item">
                    <div class="card FedBlock">
                        <div class="card-header"><h3 class="m-0"><a href="company-detail.php">Sam Web Studio Pvt Ltd.</a></h3></div>
                        <div class="card-body"><a href="company-detail.php"><img src="img/pro-img7.jpg"></a></div>
                        <div class="card-footer">Category : <a href="company-detail.php">Fashion & Garments</a></div>
                    </div>
                </div>
                <div class="item">
                    <div class="card FedBlock">
                        <div class="card-header"><h3 class="m-0"><a href="company-detail.php">Sam Web Studio Pvt Ltd.</a></h3></div>
                        <div class="card-body"><a href="company-detail.php"><img src="img/pro-img7.jpg"></a></div>
                        <div class="card-footer">Category : <a href="company-detail.php">Fashion & Garments</a></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center"><a href="companies.php" class="btn btn-main1">View all Category <i class="fal fa-chevron-double-right"></i></a></div>
            </div>
        </div>
    </section>
    <section class="ProCategory Home">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="Heading h4">The Protein Supplements</h2>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-12 col-md-2">
                    <div class="CatImg">
                        <div class="img"><img src="img/pro-img16.jpg"></div>
                        <div class="Text">
                            <ul>
                                <li><a href="">Brick Making Mahines</a></li>
                                <li><a href="">Passenger Lifts</a></li>
                                <li><a href="">TMT Bars</a></li>
                                <li><a href="">Plywoods</a></li>
                            </ul>
                            <a href="#" class="btn btn-main">View all</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-10">
                    <div class="owl-carousel CatCarousel text-center">
                        <div class="item">
                            <div class="card ProBlock New">
                                <span class="OffTag"><span>20% off</span></span>
                                <div class="NewTag"><span>New</span></div>
                                <div class="card-head"><a href="product-details.php"><img src="img/pro-img1.jpg"></a></div>
                                <div class="card-body">
                                    <h3 class="name"><a href="product-details.php">Healing Nutrients for Back Pain and Spine Surgery Healing Nutrients for Back Pain and Spine Surgery</a></h3>
                                    <span class="star" title="star" data-title="3"></span>
                                    <span class="price"><i class="rupee">&#8377;</i> 95.00 <span class="cutprice"><i class="rupee">&#8377;</i> 115.00</span></span>
                                    <p class="m-0"><small>100 Pieces (Min Order)</small></p>
                                    <span class="supl"><a href="#SendInquiry" data-bs-toggle="modal" class="btn btn-main1">Contact Supplier</a></span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card ProBlock">
                                <span class="OffTag"><span>20% off</span></span>
                                <div class="NewTag"><span>New</span></div>
                                <div class="card-head"><a href="product-details.php"><img src="img/pro-img2.jpg"></a></div>
                                <div class="card-body">
                                    <h3 class="name"><a href="product-details.php">Healing Nutrients for Back Pain and Spine Surgery Healing Nutrients for Back Pain and Spine Surgery</a></h3>
                                    <span class="star" title="star" data-title="1"></span>
                                    <span class="price"><i class="rupee">&#8377;</i> 95.00 <span class="cutprice"><i class="rupee">&#8377;</i> 115.00</span></span>
                                    <p class="m-0"><small>100 Pieces (Min Order)</small></p>
                                    <span class="supl"><a href="#SendInquiry" data-bs-toggle="modal" class="btn btn-main1">Contact Supplier</a></span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card ProBlock Off">
                                <span class="OffTag"><span>20% off</span></span>
                                <div class="NewTag"><span>New</span></div>
                                <div class="card-head"><a href="product-details.php"><img src="img/pro-img3.jpg"></a></div>
                                <div class="card-body">
                                    <h3 class="name"><a href="product-details.php">Healing Nutrients for Back Pain and Spine Surgery Healing Nutrients for Back Pain and Spine Surgery</a></h3>
                                    <span class="star" title="star" data-title="4"></span>
                                    <span class="price"><i class="rupee">&#8377;</i> 95.00 <span class="cutprice"><i class="rupee">&#8377;</i> 115.00</span></span>
                                    <p class="m-0"><small>100 Pieces (Min Order)</small></p>
                                    <span class="supl"><a href="#SendInquiry" data-bs-toggle="modal" class="btn btn-main1">Contact Supplier</a></span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card ProBlock">
                                <span class="OffTag"><span>20% off</span></span>
                                <div class="NewTag"><span>New</span></div>
                                <div class="card-head"><a href="product-details.php"><img src="img/pro-img4.jpg"></a></div>
                                <div class="card-body">
                                    <h3 class="name"><a href="product-details.php">Healing Nutrients for Back Pain and Spine Surgery Healing Nutrients for Back Pain and Spine Surgery</a></h3>
                                    <span class="star" title="star" data-title="2"></span>
                                    <span class="price"><i class="rupee">&#8377;</i> 95.00 <span class="cutprice"><i class="rupee">&#8377;</i> 115.00</span></span>
                                    <p class="m-0"><small>100 Pieces (Min Order)</small></p>
                                    <span class="supl"><a href="#SendInquiry" data-bs-toggle="modal" class="btn btn-main1">Contact Supplier</a></span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card ProBlock">
                                <span class="OffTag"><span>20% off</span></span>
                                <div class="NewTag"><span>New</span></div>
                                <div class="card-head"><a href="product-details.php"><img src="img/pro-img5.jpg"></a></div>
                                <div class="card-body">
                                    <h3 class="name"><a href="product-details.php">Healing Nutrients for Back Pain and Spine Surgery Healing Nutrients for Back Pain and Spine Surgery</a></h3>
                                    <span class="star" title="star" data-title="5"></span>
                                    <span class="price"><i class="rupee">&#8377;</i> 95.00 <span class="cutprice"><i class="rupee">&#8377;</i> 115.00</span></span>
                                    <p class="m-0"><small>100 Pieces (Min Order)</small></p>
                                    <span class="supl"><a href="#SendInquiry" data-bs-toggle="modal" class="btn btn-main1">Contact Supplier</a></span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card ProBlock">
                                <span class="OffTag"><span>20% off</span></span>
                                <div class="NewTag"><span>New</span></div>
                                <div class="card-head"><a href="product-details.php"><img src="img/pro-img8.jpg"></a></div>
                                <div class="card-body">
                                    <h3 class="name"><a href="product-details.php">Healing Nutrients for Back Pain and Spine Surgery Healing Nutrients for Back Pain and Spine Surgery</a></h3>
                                    <span class="star" title="star" data-title="4"></span>
                                    <span class="price"><i class="rupee">&#8377;</i> 95.00 <span class="cutprice"><i class="rupee">&#8377;</i> 115.00</span></span>
                                    <p class="m-0"><small>100 Pieces (Min Order)</small></p>
                                    <span class="supl"><a href="#SendInquiry" data-bs-toggle="modal" class="btn btn-main1">Contact Supplier</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include "footer-catmenus.php";?>
<?php include "footer.php";?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/owl.carousel2.thumbs@0.1.8/dist/owl.carousel2.thumbs.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $("#BannerBottom").owlCarousel({items:3, margin:12, loop:false, dots:false, nav:true, navText:['<span class="fal fa-chevron-double-left"></span>', '<span class="fal fa-chevron-double-right"></span>'], autoplay:false, autoplayTimeout:3000, autoplayHoverPause:true, responsiveClass:true, responsive:{250:{items:1}, 320:{items:1}, 460:{items:1}, 600:{items:1}, 768:{items:2}, 992:{items:3}, 1200:{items:4}, 1600:{items:5}}});
    $("#Featured").owlCarousel({items:5, margin:12, loop:false, dots:false, nav:true, navText:['<span class="icon fal fa-chevron-left"></span>', '<span class="fal fa-chevron-right"></span>'], autoplay:false, autoplayTimeout:3000, autoplayHoverPause:true, responsiveClass:true, responsive:{250:{items:1}, 320:{items:1}, 460:{items:2}, 600:{items:2}, 768:{items:3}, 992:{items:4}, 1200:{items:5}, 1600:{items:5}}});
    $(".CatCarousel").owlCarousel({items:5, margin:12, loop:false, dots:false, nav:true, navText:['<span class="icon fal fa-chevron-left"></span>', '<span class="fal fa-chevron-right"></span>'], autoplay:false, autoplayTimeout:4000, autoplayHoverPause:true, responsiveClass:true, responsive:{250:{items:1}, 320:{items:1, margin:9}, 460:{items:2, margin:12}, 600:{items:3, margin:15}, 768:{items:4, margin:18}, 992:{items:4, margin:20}, 1200:{items:5}, 1600:{items:5}}});
    $(".catblock").owlCarousel({items:3, margin:12, loop:false, dots:false, nav:false, navText:['<span class="icon fal fa-chevron-left"></span>', '<span class="fal fa-chevron-right"></span>'], autoplay:false, autoplayTimeout:4000, autoplayHoverPause:true, responsiveClass:true, responsive:{250:{items:1}, 320:{items:1, nav:true}, 460:{items:2, nav:true}, 600:{items:2, nav:true}, 768:{items:2, nav:true}, 992:{items:2, nav:true}, 1200:{items:3}, 1600:{items:3}}});
    $("#BrandLinksTop").owlCarousel({items:5, margin:30, loop:true, dots:false, nav:false, navText:['<span class="icon fal fa-chevron-left"></span>', '<span class="fal fa-chevron-right"></span>'], autoplay:false, autoplayTimeout:4000, autoplayHoverPause:true, responsiveClass:true, responsive:{250:{items:1}, 320:{items:1, margin:9}, 460:{items:2, margin:12}, 600:{items:3, margin:15}, 768:{items:4, margin:18}, 992:{items:4, margin:20}, 1200:{items:5}, 1600:{items:5}}});
});
</script>
</body>
</html>