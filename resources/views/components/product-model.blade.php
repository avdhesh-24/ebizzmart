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
                                <x-country-list/>
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
                                        <x-country-list/>
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