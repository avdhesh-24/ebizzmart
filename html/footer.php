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
                    <img src="img/logo.svg" class="w-75">
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
                        <a href="#"><img src="img/img.png"></a>
                        <a href="#"><img src="img/img1.png"></a>
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
                    <img src="img/payment-cards.png">
                </div>
            </div>
        </div>
    </div>
</footer>
</div>

<div class="modal fade SendInquiry" id="ViewMobile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="SendInquiryLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
            <div class="modal-body p-0">
                <form action="#" class="card">
                    <div class="card-header thmbg"><h3 class="m-0 h5 text-white">Enter Your Details to View Contact</h3></div>
                    <div class="card-body">
                        <div class="mb-2">
                            <label for="name" class="form-label m-0"><small>Name</small></label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name">
                        </div>
                        <div class="mb-2">
                            <label for="lemail" class="form-label m-0"><small>Mobile No.</small></label>
                            <div class="input-group CountrySelect">
                              <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="flagicon me-1"></i> <span id="CountryName">Country</span></button>
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
                        <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" value="" id="stay">
                            <label class="form-check-label" for="stay">I agree to share <a href="#" class="thm1">my Business Card</a> to the supplier.</label>
                        </div>
                        <div class="text-center mt-3"><button class="btn btn-main m-0" type="submit">Submit</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade SendInquiry" id="SendInquiry" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="SendInquiryLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
            <div class="modal-body p-0">
                <div class="row">
                    <div class="col-md-4">
                        <div class="img"><img src="img/pro-img1.jpg"></div>
                        <div class="text p-3">
                            <h4 class="mb-0 h5">GALVANIZED FIREPLACE COAL BUCKET</h4>
                            <p><span class="text-secondary">by Deva International, Uttar Pradesh</span></p>
                            <p><span class="text-secondary">Business Type :</span> Manufacturer / Exporters / Suppliers</p>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <form action="#" class="card">
                            <div class="card-header"><h3 class="m-0 h5">Get a quick quote from this supplier</h3></div>
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
                                <div class="mb-2">
                                    <label for="subject" class="form-label m-0"><small>Subject</small></label>
                                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter Your Subject">
                                </div>
                                <div class="mb-1">
                                    <label for="message" class="form-label m-0"><small>Message</small></label>
                                    <textarea class="form-control" id="message" name="message"></textarea>
                                </div>
                                <div class="form-check mt-3">
                                    <input class="form-check-input" type="checkbox" value="" id="Rec">
                                    <label class="form-check-label" for="Rec">Recommend matching suppliers if this supplier doesn't contact me on Message Center within 24 hours.</label>
                                </div>
                                <div class="form-check mt-3">
                                    <input class="form-check-input" type="checkbox" value="" id="iagree">
                                    <label class="form-check-label" for="iagree">I agree to share <a href="#" class="thm1">my Business Card</a> to the supplier.</label>
                                </div>
                                <div class="text-center mt-3"><button class="btn btn-main m-0" type="submit">Submit</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="scroll-top"><i class="far fa-chevron-up"></i></div>
<!-- Optional JavaScript; choose one of the two! -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!-- Option 1: Bootstrap Bundle with Popper -->

<script async src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

<script async src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.0/lazysizes.min.js" integrity="sha512-JrL1wXR0TeToerkl6TPDUa9132S3PB1UeNpZRHmCe6TxS43PFJUcEYUhjJb/i63rSd+uRvpzlcGOtvC/rDQcDg==" crossorigin="anonymous"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js" integrity="sha512-A7AYk1fGKX6S2SsHywmPkrnzTZHrgiVT7GcQkLGDe2ev0aWb8zejytzS8wjo7PGEXKqJOrjQ4oORtnimIRZBtw==" crossorigin="anonymous"></script>
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/rellax/1.12.1/rellax.min.js" integrity="sha512-f5HTYZYTDZelxS7LEQYv8ppMHTZ6JJWglzeQmr0CVTS70vJgaJiIO15ALqI7bhsracojbXkezUIL+35UXwwGrQ==" crossorigin="anonymous"></script> -->
<script src="js/custom.js"></script>