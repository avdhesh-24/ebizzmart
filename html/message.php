<?php
session_start();
ob_start();
$user='User Profile';
$active='Message';
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<title>Message : ebizzmart</title>
<link rel="preload" as="style" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" onload="this.rel='stylesheet'" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
<link rel="preload" as="style" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" onload="this.rel='stylesheet'" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />
<link rel="stylesheet" type="text/css" media="screen,projection" href="css/profile.css">
<link rel="stylesheet" type="text/css" media="screen,projection" href="css/message.css">
<?php include "header.php";?>
<div class="contentp">
    <section class="grey Profile pt-1">
        <div class="container">
            <div class="row mb-2">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php"><i class="fal fa-home-alt"></i></a></li>
                        <li class="breadcrumb-item"><a aria-current="page">Message</a></li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <?php include "account-left.php"; ?>
                <div class="col-md-10">
                    <div class="MailBox card p-0">
                        <div class="MailBoxR">
                            <div class="MBThead">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="form-check mr-2"><input type="checkbox" id="AllCheck" class="form-check-input"><label for="AllCheck" class="form-check-label">All</label></div>
                                        <button type="button" class="btn btntag m-0 mr-2"><i class="fal fa-refresh"></i></button>
                                        <div class="dropdown mr-2"><button type="button" id="dd_id1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-light h-100 dropdown-toggle">Mark</button>
                                            <div aria-labelledby="dd_id1" class="dropdown-menu">
                                                <a href="#" class="dropdown-item">Mark 1</a>
                                                <a href="#" class="dropdown-item">Mark 2</a>
                                                <a href="#" class="dropdown-item">Mark 3</a>
                                            </div>
                                        </div>
                                        <div class="dropdown mr-2"><button type="button" id="dd_id1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-light h-100 dropdown-toggle">Move</button>
                                            <div aria-labelledby="dd_id1" class="dropdown-menu">
                                                <a href="#" class="dropdown-item">Move 1</a>
                                                <a href="#" class="dropdown-item">Move 2</a>
                                                <a href="#" class="dropdown-item">Move 3</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2 justify-content-center"><h3>Inbox</h3></div>
                                    <div class="col-5">
                                        <div class="SearchBar"><input type="text" placeholder="Search" class="form-control"><i class="fal fa-search"></i></div>
                                        <div class="dropdown mr-2"><button type="button" id="dd_id1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-light h-100 dropdown-toggle">Show</button>
                                            <div aria-labelledby="dd_id1" class="dropdown-menu">
                                                <a href="#" class="dropdown-item">Show 1</a>
                                                <a href="#" class="dropdown-item">Show 2</a>
                                                <a href="#" class="dropdown-item">Show 3</a>
                                            </div>
                                        </div>
                                        <span>1-50 of 451</span>
                                        <div class="NextPre">
                                            <a href="#"><i class="fal fa-angle-left"></i></a>
                                            <a href="#"><i class="fal fa-angle-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="MBmails">
                                <ul>
                                    <li class="unread"><span class="check"><input type="checkbox" class="form-check-input"></span>
                                        <a href="#">
                                            <span class="mstar org"><i class="far fa-star"></i></span>
                                            <div class="name"><span>Deepak Kumar</span><span class="badge bg-primary">Work</span></div>
                                            <div class="mail">New Tasks</div>
                                            <div class="attachment"><i class="fal fa-paperclip"></i></div>
                                            <div class="date">11:45 PM</div>
                                        </a>
                                    </li>
                                    <li class="unread"><span class="check"><input type="checkbox" class="form-check-input"></span>
                                        <a href="#">
                                            <span class="mstar"><i class="far fa-star"></i></span>
                                            <div class="name"><span>Mithun Parihar</span></div>
                                            <div class="mail">Hi man, How are you?</div>
                                            <div class="attachment"><i class="fal fa-paperclip"></i></div>
                                            <div class="date">Sep 19</div>
                                        </a>
                                    </li>
                                    <li><span class="check"><input type="checkbox" class="form-check-input"></span>
                                        <a href="#">
                                            <span class="mstar"><i class="far fa-star"></i></span>
                                            <div class="name"><span>Facebook</span><span class="badge bg-success">Design</span></div>
                                            <div class="mail">Lorem ipsum dolor sit amet</div>
                                            <div class="attachment"></div>
                                            <div class="date">Sep 17</div>
                                        </a>
                                    </li>
                                    <li><span class="check"><input type="checkbox" class="form-check-input"></span>
                                        <a href="#">
                                            <span class="mstar"><i class="far fa-star"></i></span>
                                            <div class="name"><span>Deepak Kumar</span></div>
                                            <div class="mail">New Tasks</div>
                                            <div class="attachment"></div>
                                            <div class="date">Sep 29</div>
                                        </a>
                                    </li>
                                    <li><span class="check"><input type="checkbox" class="form-check-input"></span>
                                        <a href="#">
                                            <span class="mstar"><i class="far fa-star"></i></span>
                                            <div class="name"><span>Mithun Parihar</span><span class="badge bg-warning">Family</span></div>
                                            <div class="mail">Hi man, How are you?</div>
                                            <div class="attachment"><i class="fal fa-paperclip"></i></div>
                                            <div class="date">Sep 19</div>
                                        </a>
                                    </li>
                                    <li><span class="check"><input type="checkbox" class="form-check-input"></span>
                                        <a href="#">
                                            <span class="mstar"><i class="far fa-star"></i></span>
                                            <div class="name"><span>Facebook</span><span class="badge bg-info">Friends</span></div>
                                            <div class="mail">Lorem ipsum dolor sit amet</div>
                                            <div class="attachment"></div>
                                            <div class="date">Sep 17</div>
                                        </a>
                                    </li>
                                    <li><span class="check"><input type="checkbox" class="form-check-input"></span>
                                        <a href="#">
                                            <span class="mstar org"><i class="far fa-star"></i></span>
                                            <div class="name"><span>Deepak Kumar</span></div>
                                            <div class="mail">New Tasks</div>
                                            <div class="attachment"><i class="fal fa-paperclip"></i></div>
                                            <div class="date">11:45 PM</div>
                                        </a>
                                    </li>
                                    <li class="unread"><span class="check"><input type="checkbox" class="form-check-input"></span>
                                        <a href="#">
                                            <span class="mstar"><i class="far fa-star"></i></span>
                                            <div class="name"><span>Mithun Parihar</span><span class="badge bg-secondary">Office</span></div>
                                            <div class="mail">Hi man, How are you?</div>
                                            <div class="attachment"><i class="fal fa-paperclip"></i></div>
                                            <div class="date">Sep 19</div>
                                        </a>
                                    </li>
                                    <li><span class="check"><input type="checkbox" class="form-check-input"></span>
                                        <a href="#">
                                            <span class="mstar"><i class="far fa-star"></i></span>
                                            <div class="name"><span>Facebook</span></div>
                                            <div class="mail">Lorem ipsum dolor sit amet</div>
                                            <div class="attachment"></div>
                                            <div class="date">Sep 17</div>
                                        </a>
                                    </li>
                                    <li><span class="check"><input type="checkbox" class="form-check-input"></span>
                                        <a href="#">
                                            <span class="mstar"><i class="far fa-star"></i></span>
                                            <div class="name"><span>Deepak Kumar</span><span class="badge bg-danger">Danger</span></div>
                                            <div class="mail">New Tasks</div>
                                            <div class="attachment"></div>
                                            <div class="date">Sep 29</div>
                                        </a>
                                    </li>
                                    <li><span class="check"><input type="checkbox" class="form-check-input"></span>
                                        <a href="#">
                                            <span class="mstar"><i class="far fa-star"></i></span>
                                            <div class="name"><span>Mithun Parihar</span></div>
                                            <div class="mail">Hi man, How are you?</div>
                                            <div class="attachment"><i class="fal fa-paperclip"></i></div>
                                            <div class="date">Sep 19</div>
                                        </a>
                                    </li>
                                    <li><span class="check"><input type="checkbox" class="form-check-input"></span>
                                        <a href="#">
                                            <span class="mstar"><i class="far fa-star"></i></span>
                                            <div class="name"><span>Facebook</span><span class="badge bg-info">Friends</span></div>
                                            <div class="mail">Lorem ipsum dolor sit amet</div>
                                            <div class="attachment"></div>
                                            <div class="date">Sep 17</div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include "footer.php";?>
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
<script type="text/javascript">
$(document).ready(function() {
    $(".VCard").owlCarousel({items:6, margin:12, loop:false, dots:false, nav:true, navText:['<span class="icon fal fa-chevron-left"></span>', '<span class="fal fa-chevron-right"></span>'], autoplay:false, autoplayTimeout:4000, autoplayHoverPause:true, responsiveClass:true, responsive:{250:{items:1.4}, 320:{items:2.4, margin:5}, 460:{items:2.4, margin:6}, 600:{items:3.4, margin:9}, 768:{items:4.4, margin:10}, 992:{items:5.4, margin:20}, 1200:{items:6.4}}});
});
</script>
<script type="text/javascript">
$(document).ready(function(){
    $("#AccMenuBar").removeClass('d-none');
    $("#AccountMenu").addClass('collapse');
    $("#MailBoxP").removeClass('d-none');
});
</script>
</body>
</html>