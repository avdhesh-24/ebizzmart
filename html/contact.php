<?php
session_start();
ob_start();
$menu='';
$active='Contact Us';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Contact Us : Rhodium Analytics</title>
<meta name="keywords" content="">
<meta name="description" content="">
<?php include "header.php";?>
  <!-- Slider -->
  <section class="inner-banner new-prellax svg-shape-color">
    <div class="bgimg"><img src="img/banner1.jpg" alt="Contact Us" class="rellax" data-rellax-speed="1"></div>
    <div class="section">
      <svg class="svg-shape" viewBox="0 0 1365 120"><polygon points="1365 120 0 0 0 0 1365 0 1365 120"/></svg>
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h1 class="title">Contact Us</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item"><a aria-current="page">Contact Us</a></li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- All Sections -->
  <!-- <section class="contact About1">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center" data-aos="fade-down" data-aos-duration="900">
          <span class="SubTitle">Rhodium Analytics</span>
          <h2 class="Heading h1">Contact Info</h2>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-sm-6 col-md-4" data-aos="fade" data-aos-duration="900">
          <div class="card conInfo">
            <i class="fa fa-map-marker"></i>
            <span>B-52, Site IV Industrial Area,<br>Sahibabad, Ghaziabad (UP).<br>India 201010</span>
          </div>
        </div>
        <div class="col-sm-6 col-md-4" data-aos="fade" data-aos-duration="900">
          <div class="card conInfo">
            <i class="fa fa-phone"></i>
            <span><a href="tel:+919898989898">+91-989 898 9898</a><br> <a href="tel:+911204545454">+91-120-4545454</a></span>
          </div>
        </div>
        <div class="col-sm-6 col-md-4" data-aos="fade" data-aos-duration="900">
          <div class="card conInfo">
            <i class="fa fa-envelope"></i>
            <span><a href="mailto:info@yourdomain.com">info@yourdomain.com</a></span>
          </div>
        </div>
      </div>
    </div>
  </section> -->
  <section class="contact">
    <div class="container">
      <div class="row">
        <div class="col-md-7 col-lg-8 order-lg-last" data-aos="zoom-out" data-aos-duration="900">
          <div class="con-form">
            <!-- <img src="img/contact-img.svg" class="order-last"> -->
            <form action="" method="post">
              <input type="hidden" name="contact" value="yes">
              <div class="row">
                <div class="col-sm-12"><h3 class="h4">Contact</h3></div>
                <div class="col-md-6 mb-3">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="name" name="Name" placeholder="Name">
                    <label for="name" class="form-label">Name</label>
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <div class="form-floating">
                    <input type="email" class="form-control" id="Email" name="Email" placeholder="Email ID">
                    <label for="Email" class="form-label">Email</label>
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <div class="form-floating">
                    <input type="number" class="form-control" id="Phone" name="Phone" placeholder="Phone No.">
                    <label for="Phone" class="form-label">Phone No.</label>
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="Subject" name="Subject" placeholder="Subject">
                    <label for="Subject" class="form-label">Subject</label>
                  </div>
                </div>
                <div class="col-sm-12 mb-3">
                  <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" name="Message" id="Comments"></textarea>
                    <label for="Comments">Comments</label>
                  </div>
                </div>
                <div class="col-sm-12">
                  <button type="submit" class="btn btn-main">Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-5 col-lg-4" data-aos="zoom-out" data-aos-duration="900">
          <img src="img/contact-img1.svg">
          <div class="card ConInfoBlock">
            <div class="card-body">
              <ul class="ConInfo">
                <li><i class="fal fa-map-marker-alt"></i> <span>161/T-6, Office No: 3B, 1st Floor,<br>Guru Arjun Nagar, Patel Nagar Main Road,<br>New Delhi, Delhi 110008</span></li>
                <li><i class="fal fa-phone-alt"></i> <a href="tel:+919898989898">(+91) 989 898 9898</a></li>
                <li><i class="fal fa-envelope"></i> <a href="mailto:contact@rhodiumanalytics.com">contact@rhodiumanalytics.com</a></li>
                <li><i class="fal fa-link"></i> <a href="" target="_blank" rel="noopener">www.rhodiumanalytics.com</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php include "footer.php";?>
</body>
</html>