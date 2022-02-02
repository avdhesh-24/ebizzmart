<?php
session_start();
ob_start();
$user='User Profile';
$active='Business Card';
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<title>Business Card : ebizzmart</title>
<link rel="preload" as="style" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" onload="this.rel='stylesheet'" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
<link rel="preload" as="style" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" onload="this.rel='stylesheet'" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />
<link rel="stylesheet" type="text/css" media="screen,projection" href="css/profile.css">
<?php include "header.php";?>
<div class="contentp">
    <section class="grey Profile pt-1">
        <div class="container">
            <div class="row mb-2">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php"><i class="fal fa-home-alt"></i></a></li>
                        <li class="breadcrumb-item"><a aria-current="page">Business Card</a></li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <?php include "account-left.php"; ?>
                <div class="col-md-10">
                    <form class="card links mb-4">
                        <div class="card-body">
                            <a class="EditText text-primary sws-top sws-bounce" title="Edit" id="edit"><i class="far fa-edit"></i> </a>
                            <a class="EditText thm me-4 sws-top sws-bounce" title="Save" id="save" style="display:none"><i class="far fa-check"></i></a>
                            <a class="EditText text-danger sws-top sws-bounce" title="Cancel" id="cancel" style="display:none"><i class="far fa-times"></i></a>
                            <h3 class="h5 thm">Business Card</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card vcard"><label class="pic"><input type="text" class="d-none"><img src="img/cardf.jpg" class="w-100"><div class="d-none"><span><img src="img/upload-card.svg"><span>Change and Upload Card Front</span></span></div></label></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card vcard"><label class="pic"><input type="text" class="d-none"><img src="img/cardb.jpg" class="w-100"><div class="d-none"><span><img src="img/upload-card.svg"><span>Change and Upload Card Back</span></span></div></label></div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <form class="card links mb-4">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="h5 thm">Customize VCard <span class="sws-top sws-bounce" title="Premium User"><i class="far fa-shield-check thm thm1 ms-2"></i></span></h3>
                                    <div class="owl-carousel VCard text-center">
                                        <div class="item">
                                            <div class="card p-0">
                                                <div class="card-body"><a href="product-details.php"><img src="img/card.jpg"></a></div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="card p-0">
                                                <div class="card-body"><a href="product-details.php"><img src="img/card.jpg"></a></div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="card p-0">
                                                <div class="card-body"><a href="product-details.php"><img src="img/card.jpg"></a></div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="card p-0">
                                                <div class="card-body"><a href="product-details.php"><img src="img/card.jpg"></a></div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="card p-0">
                                                <div class="card-body"><a href="product-details.php"><img src="img/card.jpg"></a></div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="card p-0">
                                                <div class="card-body"><a href="product-details.php"><img src="img/card.jpg"></a></div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="card p-0">
                                                <div class="card-body"><a href="product-details.php"><img src="img/card.jpg"></a></div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="card p-0">
                                                <div class="card-body"><a href="product-details.php"><img src="img/card.jpg"></a></div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="card p-0">
                                                <div class="card-body"><a href="product-details.php"><img src="img/card.jpg"></a></div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="card p-0">
                                                <div class="card-body"><a href="product-details.php"><img src="img/card.jpg"></a></div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="card p-0">
                                                <div class="card-body"><a href="product-details.php"><img src="img/card.jpg"></a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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
    $('#edit').click(function(){
        $(".vcard input").attr("type", 'file');
        $(".vcard label>div").removeClass('d-none');
        $("#edit").hide();
        $("#save").show();
        $("#cancel").show();
    });
    $('#save').click(function(){
        $(".vcard input").attr("type", 'text');
        $(".vcard label>div").addClass('d-none');
        $("#save").hide();
        $("#cancel").hide();
        $("#edit").show();
    });
    $('#cancel').click(function(){
        $(".vcard input").attr("type", 'text');
        $(".vcard label>div").addClass('d-none');
        $("#save").hide();
        $("#cancel").hide();
        $("#edit").show();
    });
});
</script>
</body>
</html>