<?php
session_start();
ob_start();
$menu='';
$active='faqs';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>FAQs : Rhodium Analytics</title>
<meta name="keywords" content="">
<meta name="description" content="">
<?php include "header.php";?>
  <!-- Slider -->
  <section class="inner-banner new-prellax svg-shape-color">
    <div class="bgimg"><img src="img/banner1.jpg" alt="FAQs" class="rellax" data-rellax-speed="1"></div>
    <div class="section">
      <svg class="svg-shape" viewBox="0 0 1365 120"><polygon points="1365 120 0 0 0 0 1365 0 1365 120"/></svg>
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h1 class="title">FAQs</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item"><a aria-current="page">FAQs</a></li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- All Sections -->
  <section class="faqs About1 pb-5">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center" data-aos="fade-down" data-aos-duration="900">
          <span class="SubTitle">Rhodium Analytics</span>
          <h2 class="Heading h1">Our <span>FAQs</span></h2>
          <p class="w-75 m-auto mb-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <div class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">What is Lorem Ipsum?</button>
              </div>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <div class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">What is Lorem Ipsum?</button>
              </div>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <div class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">What is Lorem Ipsum?</button>
              </div>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php include "footer.php";?>
</body>
</html>